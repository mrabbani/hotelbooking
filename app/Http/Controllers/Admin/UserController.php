<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Country;
use App\User;

class UserController extends CrudController
{
    protected function getModel(): \Illuminate\Database\Eloquent\Model
    {
        return new User();
    }

    protected function getViewPath(): string
    {
        return 'admin.users';
    }
}
