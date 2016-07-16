<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomService extends Model
{
    protected $table = 'room_service';
    public function roomServiceDetail()
    {
        return $this->hasMany('App\RoomServiceDetail')->orderBy('rate');
    }
    public function bestRoomServiceDetail()
    {
        return $this->hasMany('App\RoomServiceDetail')->orderBy('rate')->take(6);
    }
}
