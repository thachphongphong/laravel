<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'room';

    public function roomdetails()
    {
        return $this->belongsToMany('App\RoomDetail', 'room_detail_link');
    }
}
