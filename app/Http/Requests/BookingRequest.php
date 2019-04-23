<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class BookingRequest extends FormRequest
{
    protected $redirect = '/';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'adult' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            // 'city' => 'required',
        ];
    }

    public function getNights() 
    {
        $count  = Carbon::parse($this->check_in)->diffInDays(Carbon::parse($this->check_out));

        return $count ?: 1;
    }

    /**
     * Check whether the request passes validation
     *
     * @return bool
     */
    public function passes()
    {
        $validator = Validator::make($this->all(), $this->rules());

        return !$validator->fails();
    }
}
