<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelPackage extends Model
{
    //

    public function compulsory_sup()
    {
        return $this->hasOne('App\CompulsorySupliment');
    }

    public function optional_sup()
    {
        return $this->belongsToMany('App\OptionalSupliment');
    }


}
