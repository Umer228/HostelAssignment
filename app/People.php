<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $dates = ['deleted_at'];
    //

    protected $guarded = [];

    public function hostel(){
        return $this->belongsTo(Hostel::class);
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }

}
