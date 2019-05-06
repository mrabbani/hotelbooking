<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\City;
use App\Country;

class CityController extends CrudController
{
    protected function getModel(): \Illuminate\Database\Eloquent\Model
    {
        return new City();
    }

    protected function getViewPath(): string
    {
        return 'admin.cities';
    }

    protected function getData(): array
    {
        $data['countryList'] = Country::orderBy('name')->pluck('name', 'id');

        return $data;
    }
}
