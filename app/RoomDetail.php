<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomDetail extends Model
{
    protected $table = 'room_detail';

    public function rooms()
    {
        return $this->belongsToMany('App\Room', 'room_detail_link');
    }
}
