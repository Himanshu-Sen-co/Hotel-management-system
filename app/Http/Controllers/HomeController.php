<?php

namespace App\Http\Controllers;
use App\Models\Room;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function room_details($id){
        $room = Room::find($id);
        return view('home.room_details', ['room'=>$room]);
    }
}
