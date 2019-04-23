<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    const PENDING = 0;
    const BOOKED = 1;
    const CANCELLED = 3;
    const UNPAID = 0;
    const PAID = 1;

    protected $fillable = [
        'user_id',
        'room_id',
        'check_in',
        'check_out',
        'price_per_night',
        'properties',
        'properties',
    ];

    public $dates = [
        'check_in',
        'check_out',
    ];

    public function setPropertiesAttribute($value)
    {
        if (is_array($value)) {
            $value = json_encode($value);
        }
        
        $this->attributes['properties'] = $value;

        return $this->attributes;
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function getStatusLabelAttribute()
    {
        $labels = [
            self::PENDING => 'Pending',
            self::BOOKED => 'Booked',
            self::CANCELLED => 'Cancelled',
        ];

        return $labels[$this->status] ?? '';
    }

    public function getPaymentLabelAttribute()
    {
        $labels = [
            self::UNPAID => 'Unpaid',
            self::PAID => 'Paid',
        ];

        return $labels[$this->payment_status] ?? '';
    }
}
