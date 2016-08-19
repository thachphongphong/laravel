<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingRoom extends Model
{
    protected $table = 'booking_room';
    public $timestamps = false;
    protected $guarded = array('id');
    public function room()
    {
        return $this->belongsTo('App\Room');
    }
}
