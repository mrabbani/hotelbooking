<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Case_;

class Hotel extends Model
{
 
    protected $fillable = [
        'name',
        'city_id',
        'address',
        'type',
    ];

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

    public function getType()
    {
        switch($this->type) {
            case '1':
            case 1:
                return 'Hotel';
            case '2': 
            case 2: 
                return 'Home';
        }
        
        return '';
    }
    
}
