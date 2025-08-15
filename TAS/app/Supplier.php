<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $fillable = array('code', 'sup_name', 'type','address','city_id','district_id','country_id','status');
    
    
    public function hotel()
    {
     
        return $this->hasOne('App\Hotel');
    }
    
    public function city()
    {
     
        return $this->hasOne('App\City');
    }
    
    public function district()
    {
     
        return $this->hasOne('App\District');
    }

    public function country()
    {
     
        return $this->hasOne('App\Country');
    }

    public function contacts()
    {
        return $this->hasMany('App\SupContactDetails');
    }
    
    public function vehicles()
    {
        return $this->hasMany('App\Vehicle');
    }

    public function miscellanies()
    {
        return $this->hasOne('App\Miscellanie');
    }
}
