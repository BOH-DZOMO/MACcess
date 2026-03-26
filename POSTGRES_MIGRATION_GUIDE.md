# PostgreSQL Migration Guide & Troubleshooting

This document outlines common issues encountered when running Laravel migrations on a PostgreSQL (Neon) database and how to resolve them.

## 1. Redundant Indexing on Primary Keys
**Issue**: Using `$table->increments('id')->index()` or `$table->id()->index()`.
**Cause**: In PostgreSQL, an auto-incrementing primary key (SERIAL/BIGSERIAL) automatically creates an index. Adding `->index()` tries to create a duplicate, which Postgres rejects.
**Solution**: Remove the explicit `->index()` call on ID columns.
**Example**:
```php
// WRONG
$table->increments('id')->index();

// CORRECT
$table->increments('id');
```

## 2. Spatial Data (PostGIS)
**Issue**: `SQLSTATE[42704]: Undefined type: 7 ERROR: type "geography" does not exist`.
**Cause**: The `geography` and `geometry` types are not native to standard Postgres; they require the PostGIS extension.
**Solution**: Enable the extension in your database.
**Command**: `php artisan tinker --execute="DB::statement('CREATE EXTENSION IF NOT EXISTS postgis;');"`

## 3. Transaction Abort (Silent Errors)
**Issue**: `SQLSTATE[25P02]: In failed sql transaction: 7 ERROR: current transaction is aborted, commands ignored until end of transaction block`.
**Cause**: Laravel wraps each migration file in a single transaction. If any statement fails (even a small one), all subsequent commands in that file will report this generic "aborted" error, hiding the real cause.
**Solution**: Add `public $withinTransaction = false;` to the migration class to see the original error.

## 4. Datatype Mismatch (JSON Casting)
**Issue**: `SQLSTATE[42804]: Datatype mismatch: 7 ERROR: column "column_name" cannot be cast automatically to type json`.
**Cause**: Postgres is strict about changing column types (e.g., from String/Enum to JSON). It requires an explicit `USING` clause that Laravel's `->change()` doesn't always provide.
**Solution**: In a fresh environment, `dropColumn()` and then re-add it as `json()`. In an environment with data, use a raw SQL statement with the `USING` clause.
**Example**:
```php
Schema::table('rooms', function (Blueprint $table) {
    if (config('database.default') === 'pgsql') {
        DB::statement('ALTER TABLE rooms ALTER COLUMN verification_type TYPE JSON USING verification_type::JSON');
    }
    $table->json('verification_type')->nullable()->change();
});
```

## 5. Anonymous vs Named Migrations
**Best Practice**: While Laravel supports anonymous migrations, named migrations (e.g., `class CreateUsersTable extends Migration`) are often more robust when dealing with complex vendor overrides or custom transaction logic.
