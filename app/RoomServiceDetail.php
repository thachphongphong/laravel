<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomServiceDetail extends Model
{
    protected $table = 'room_service_detail';
    public function roomService() {
        return $this->belongsTo('App\RoomService');
    }
}
