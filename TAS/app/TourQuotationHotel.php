<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourQuotationHotel extends Model
{
    //
    protected $fillable = ['tour_quotation_header_id','tour_id','tour_date','tour_day'];

    public function hotelDetails(){

        return $this->hasMany('App\TourQuotationHotelDetails');
    }
}
