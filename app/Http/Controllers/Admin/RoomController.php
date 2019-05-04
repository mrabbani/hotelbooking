<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hotel;
use App\City;
use App\Room;

class RoomController extends CrudController
{
    protected function getModel(): \Illuminate\Database\Eloquent\Model
    {
        return new Room();
    }

    protected function getViewPath(): string
    {
        return 'admin.rooms';
    }

    protected function getData(): array
    {
        $data['hotelList'] = Hotel::orderBy('name')->pluck('name', 'id');

        return $data;
    }
}
