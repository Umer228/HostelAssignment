<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //

    protected $guarded = [];

    public function hostel(){
        $this->belongsTo(Hostel::class);
    }
    public function peoples(){
        $this->hasMany(People::class);
    }

}
