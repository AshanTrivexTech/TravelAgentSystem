<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourQuotationHeader extends Model
{   
    public $page_ls_pos = 10;

    //

    public function store_ls_pagePos($pos){
        $this->page_ls_pos = $pos;
    }

    public function get_ls_pagePos($pos){

       return $this->page_ls_pos;
    }

    public function suppliers(){

        return $this->hasMany('App\TourQuotationSupplier');        
    }
    
    public function hotels(){

        return $this->hasMany('App\TourQuotationHotel');        
    }
    
    public function misc(){

        return $this->hasMany('App\TourQuotationMiscellaneous');

    }

    public function transport(){

        return $this->hasMany('App\TourQuotationTransport');                
    }
}
