<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hotel;
use App\City;

class HotelController extends CrudController
{
    protected function getModel(): \Illuminate\Database\Eloquent\Model
    {
        return new Hotel();
    }

    protected function getViewPath(): string
    {
        return 'admin.hotels';
    }

    protected function getData(): array
    {
        $data['cityList'] = City::orderBy('name')->pluck('name', 'id');

        return $data;
    }
}
