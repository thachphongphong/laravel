<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'room';
    public $timestamps = false;

    public function roomdetails()
    {
        return $this->belongsToMany('App\RoomDetail', 'room_detail_link');
    }

    public function bookings()
    {
        return $this->hasMany('App\BookingRoom');
    }
}
