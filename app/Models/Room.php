<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    protected $casts = [
        'verification_type' => 'array',
        'metadata' => 'array',
    ];

    public function users(){
        return $this->belongsToMany(User::class,"room_memberships","room_id","user_id")
            ->withPivot('joined_at');
            // ->withTimestamps();
    }

    public function pendingValidations(){
        return $this->hasmany(PendingValidation::class);
    }

    public function timeWindows(){
        return $this->hasMany(TimeWindow::class);
    }

    public function geofence(){
        return $this->hasOne(RoomGeofence::class)
            ->selectRaw('*, ST_Y(boundary::geometry) as latitude, ST_X(boundary::geometry) as longitude, ST_AsGeoJSON(boundary) as polygon_json');
    }

    // --- Accessors for Easy Edit Mode ---

    /**
     * Get latitude from the geofence boundary.
     */
    public function getLatitudeAttribute() {
        return $this->geofence->latitude ?? null;
    }

    /**
     * Get longitude from the geofence boundary.
     */
    public function getLongitudeAttribute() {
        return $this->geofence->longitude ?? null;
    }

    /**
     * Get radius from the geofence.
     */
    public function getGeofenceRadiusAttribute() {
        return $this->geofence->radius ?? 50;
    }

    /**
     * Get shape from the geofence.
     */
    public function getGeofenceShapeAttribute() {
        return $this->geofence->shape_type ?? 'circle';
    }

    /**
     * Get polygon JSON from the geofence.
     * Note: ST_AsGeoJSON returns only the geometry part, we might need to format it.
     */
    public function getGeofencePolygonAttribute() {
        if (!$this->geofence || !$this->geofence->polygon_json) return null;
        
        // If it's a polygon, we need to extract the coordinates array from GeoJSON
        $geo = json_decode($this->geofence->polygon_json, true);
        if ($geo && $geo['type'] === 'Polygon') {
            return json_encode($geo['coordinates'][0]);
        }
        return null;
    }

    /**
     * Get label from first time window.
     */
    public function getTimeframeLabelAttribute() {
        return $this->timeWindows->first()->name ?? '';
    }

    /**
     * Get start time from first time window.
     */
    public function getTimeframeStartAttribute() {
        return $this->timeWindows->first() ? substr($this->timeWindows->first()->start_time, 0, 5) : '';
    }

    /**
     * Get end time from first time window.
     */
    public function getTimeframeEndAttribute() {
        return $this->timeWindows->first() ? substr($this->timeWindows->first()->end_time, 0, 5) : '';
    }

    /**
     * Get selected days as an array of indices [0-6] for Alpine.js.
     */
    public function getTimeframeDaysAttribute() {
        $dayMapping = ['Mon' => 0, 'Tue' => 1, 'Wed' => 2, 'Thu' => 3, 'Fri' => 4, 'Sat' => 5, 'Sun' => 6];
        return $this->timeWindows->map(fn($tw) => $dayMapping[$tw->day] ?? null)->filter(fn($d) => !is_null($d))->values()->all();
    }
}
