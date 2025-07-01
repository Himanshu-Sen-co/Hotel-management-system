<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallary;
use App\Models\Contact;


use Notification;
use App\Notifications\SendEmailNotification;


use Illuminate\Support\facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
            if($usertype == 'user'){
                $data = Room::all();
                $gallary = Gallary::all();
                return view('home.index', ['data'=>$data, 'gallary'=>$gallary]);
            }else if($usertype == 'admin'){
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function home(){
        $data = Room::all();
        $gallary = Gallary::all();
        return view('home.index', ['data'=>$data, 'gallary'=>$gallary]);
    }

    public function create_room(){
        return view('admin.create_room');
    }

    public function add_room(Request $request){
        $data = new Room();
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->room_type;
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();;
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect('view_room');
    }

    public function view_room(){
        $data = Room::all();
        return view('admin.view_room',['data' => $data]);
    }
    public function delete_room($id){
        $data = Room::destroy($id);
        return redirect()->back();
    }

    public function edit_room($id){
        $data = Room::find($id);
        return view('admin.edit_room', ['data'=>$data]);
    }

    public function update_room(Request $request, $id){
        $data = Room::find($id);
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->room_type;
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();;
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        // return redirect()->back();
           return redirect('view_room');
    }

    public function bookings(){
        $bookings = Booking::all();
        return view('admin.bookings', ['bookings'=>$bookings]);
    }

    public function delete_booking($id){
        $bookings = Booking::destroy($id);
        return redirect()->back();
        // return view('admin.bookings', ['bookings'=>$bookings]);
    }

    public function approve_booking($id){
        $booking = Booking::find($id);
        $booking->status = "Approved";
        $booking->save();
        return redirect()->back();
    }

    public function reject_booking($id){
        $booking = Booking::find($id);
        $booking->status = "Rejected";
        $booking->save();
        return redirect()->back();
    }

    public function gallaries(){
        $gallary = Gallary::all();
        return view('admin.gallaries', ['gallary'=>$gallary]);
    }

    public function upload_gallary(Request $request){
        $data = new Gallary;
        $image = $request->image;
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('gallary',$imagename);
            $data->image = $imagename;
            $data->save();

        }
        return redirect()->back();
    }
    public function delete_gallary($id){
        $image = Gallary::find($id);
        $image->delete();
        return redirect()->back();
    }

    public function all_messages(){
        $messages = Contact::all();
        return view('admin.all_messages', ['messages'=>$messages]);
    }

    public function send_mail($id){
        $message = Contact::find($id);
        return view('admin.send_mail', ['message'=>$message]);
    }

    public function mail(Request $request, $id){
        $data = Contact::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'end_line' => $request->end_line
        ];

        Notification::send($data, new SendEmailNotification($details));
        return redirect()->back()->with('message', 'Email send Successfully.');
    }
}
