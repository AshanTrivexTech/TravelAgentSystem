<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourQuotationHotelDetails extends Model
{
    protected $fillable = ['tour_quotation_hotel_id','tour_id','pos','supplier_id','hotel_package_id','ss_rate','ss_com',
    'db_rate','db_com','trp_rate','trp_com','qtb_rate','qtb_com','sql_splm','dbl_splm','tbl_splm',
    'qd_splm','currency_id','rate_to_base','status'];
}
