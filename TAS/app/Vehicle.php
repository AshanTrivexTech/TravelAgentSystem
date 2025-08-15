<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    protected $fillable = [
        'supplier_id', 'vehicle_type_id', 'driver_id','reg_no',
    'licence_exp_date','insurance_exp_date'];
}
