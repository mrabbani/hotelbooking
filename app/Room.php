<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\BookingRequest;

class Room extends Model
{
    protected $fillable = [
        'title',
        'hotel_id',
        'adult_capacity',
        'child_capacity',
        'price_per_night',
        'apartment_description',
        'check_in_process',
        'description',
        'is_active',
        'other_info',
        'contact_person',
        'contact_number',
        'contact_email',
    ];

    public function setOtherInfoAttribute($info) 
    {
        if (is_array($info)) {
            $info = json_encode($info);
        }

        $this->attributes['other_info'] = $info;

        return $this->attributes;
    }

    public function scopeCity($query, ?string $city) 
    {
        if ($city) {
            $query->whereHas('hotel.city', function($subQuery) use($city) {
                $subQuery->where('name', 'LIKE', "%$city%");
            });
        }
    }

    public function scopeHotelType($query, ?string $type) 
    {
        if ($type) {
            $query->whereHas('hotel', function($subQuery) use($type) {
                $subQuery->where('type', $type);
            });
        }
    }

    public function scopeAvailableForRequest($query, BookingRequest $request) 
    {
        $query->city($request->city)
            ->capacity($request->adult, $request->child)
            ->hotelType($request->type)
            ->available($request->check_in, $request->check_out);
    }

    public function scopeCapacity($query,  $adult, $child = null) 
    {
        $query = $query->where('adult_capacity', '>=', $adult);
        
        if ($child) {
            $query->where('child_capacity', '>=', $child);
        }
    }

    public function scopeAvailable($query, string $checkIn, string $checkOut) 
    {
        $query->where('is_active', 1)
            ->whereDoesntHave('bookings', function($subQuery) use($checkIn, $checkOut) {
                $subQuery->where(function($q) use($checkIn, $checkOut) {
                    $q->where('check_in', '<=', $checkIn)
                    ->where('check_out', '>', $checkIn)
                    ->orWhere(function($q2) use($checkIn, $checkOut) {
                        $q2->where('check_in', '<=', $checkOut)
                        ->where('check_out', '>', $checkOut);
                    });
                })
                ->whereIn('status', [Booking::PENDING, Booking::BOOKED]);
            });
    }

    public function getOtherInfoAttribute($info) 
    {
        if (is_array($info)) {
            return $info;
        }

        return json_decode($info, true);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, null, 'imageable_type', 'imageable_id');
    }

    public function getAddressAttribute()
    {
        return $this->hotel ? $this->hotel->getAddress() : '';
    }

    public function getAmenitiesAttribute()
    {
        return $this->other_info['amenities'] ?? $this->other_info['Amenities'] ??  [];
    }

    public function getBannerAttribute()
    {
        if (count($this->images ?? [])) {
            return $this->images->first()->path;
        }

        return 'img/upload/room.jpg';
    }

    public function getHotelNameAttribute()
    {
        return $this->hotel->name ?? '';
    }

    public function getAccommodationAttribute($value)
    {
        return $value ?? $this->apartment_description ?? '';
    }

    public function getTotalCharge($nights) 
    {
        return $this->price_per_night * $nights;
    }
}
