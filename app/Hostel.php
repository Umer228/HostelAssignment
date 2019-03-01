<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Hostel extends Model
{
    use Notifiable;
    //
    protected $guarded = [];
    //protected $fillable = ['name', 'phone', 'address'];

    public function rooms(){
        return $this->hasMany(Room::class);
    }
    public function peoples(){
        return $this->hasMany(People::class);
    }

}
