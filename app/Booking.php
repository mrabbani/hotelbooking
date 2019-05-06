<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Carbon\Carbon;

class Booking extends Model
{
    const PENDING = 0;
    const BOOKED = 1;
    const CANCELLED = 3;
    const UNPAID = 0;
    const PAID = 1;
    const REFUNDED = 2;

    protected $fillable = [
        'user_id',
        'room_id',
        'check_in',
        'check_out',
        'price_per_night',
        'properties',
        'payment_status',
        'status'
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
            self::REFUNDED => 'Refunded',
        ];

        return $labels[$this->payment_status] ?? '';
    }

    public function getInvoiceIdAttribute()
    {
        return str_pad('' .$this->id, 4, '0', STR_PAD_LEFT);
    }

    public function getPropertiesAttribute($value)
    {
        return json_decode($value, true);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNights() 
    {
        $count  = Carbon::parse($this->check_in)->diffInDays(Carbon::parse($this->check_out));

        return $count ?: 1;
    }

    public function getTotalChargeAttribute($value)
    {
        return $this->price_per_night * $this->getNights();
    }
}
