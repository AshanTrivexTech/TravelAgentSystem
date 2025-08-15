<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    //
    protected $fillable=['no_of_seats','rate_per_km','type'];
}
