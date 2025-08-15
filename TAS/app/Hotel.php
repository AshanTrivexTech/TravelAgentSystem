<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    //
   // protected $fillable = [''];
     protected $fillable = array('supplier_id', 'hotel_type_id','desc','postal_code','hotel_group_id','star_rate','web_url');
    
   // protected $primaryKey='id';

    
    public function hotelType()
    {
     
        return $this->hasOne('App\HotelType');
    }

    public function hotelGroup()
    {
     
        return $this->hasOne('App\HotelGroup');
    }

   

}
