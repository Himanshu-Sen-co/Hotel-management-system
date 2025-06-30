<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;
            if($usertype == 'user'){
                $data = Room::all();
                return view('home.index', ['data'=>$data]);
            }else if($usertype == 'admin'){
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function home(){
        $data = Room::all();
        return view('home.index', ['data'=>$data]);
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
}
