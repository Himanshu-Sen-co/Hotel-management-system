<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;

use Illuminate\Http\Request;
// use Illuminate\Support\facades\validate;


class HomeController extends Controller
{
    public function room_details($id){
        $room = Room::find($id);
        return view('home.room_details', ['room'=>$room]);
    }
    public function room_booking(Request $request, $id){
        $data = new Booking;

        $request->validate([
            'name'      => 'required|min:3|max:50',
            'email'     => 'required|email',
            'phone'     => 'required|digits_between:7,15', 
            'startDate' => 'required|date',
            'endDate'   => 'required|date|after:startDate',
        ],[
            'name.required'=>'Name is required!!'  //make custom message
        ]);

        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $checkBooking = Booking::where('room_id', $id)->where('startDate','<=',$request->endDate)->where('endDate','>=', $request->startDate)->exists();
        if ($checkBooking) {
            return redirect()->back()->with('message','This room already booked at this selection dates!');   
        }
        $data->startDate = $request->startDate;
        $data->endDate = $request->endDate;

        $data->save();

        return redirect()->back()->with('message','Room booked successfully, congrats!');  
     }

     public function contact(Request $request){
        $data = new Contact;
        $request->validate([
            'name'=>'required|min:3|max:40',
            'email'=>'required|email',
            'phone'=>'required|digits_between:7,15',
            'message'=>'required|min:10|max:200'
        ]);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->save();
        return redirect()->back()->with('message', 'your message send successfully.');
     }

     public function hotel_room(){
        $data = Room::all();
        return view('home.our_room', ['data'=>$data]);
     }

     public function hotel_gallary(){
        $gallary = Gallary::all();
        return view('home.our_gallary', ['gallary'=>$gallary]);
     }

     public function contact_us(){
        return view('home.contact_us');
     }
}
