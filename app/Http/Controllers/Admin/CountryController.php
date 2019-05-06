<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends CrudController
{
    protected function getModel(): \Illuminate\Database\Eloquent\Model
    {
        return new Country();
    }

    protected function getViewPath(): string
    {
        return 'admin.countries';
    }
}
