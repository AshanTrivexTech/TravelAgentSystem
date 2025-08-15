<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionalSupliment extends Model
{
    //

    public function hotel_package()
    {
        return $this->belongsToMany('App\HotelPackage');
    }
}
