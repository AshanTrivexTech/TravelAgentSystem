<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    //

  
    public function guest_contact()
    {
     
        return $this->hasOne('App\GuestContact');
    }

}
