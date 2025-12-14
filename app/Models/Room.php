<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    protected function users(){
        return $this->belongsToMany(User::class,"room_memberships","room_id","user_id");
    }
        
}
