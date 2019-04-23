<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
 
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getAddress()
    {
        $city = $this->city->name ?? '';
        $country = $this->city->country->name ?? '';
        
        return $this->address . ', ' . $city . ', '. $country;
    }
}
