<!DOCTYPE html>
<html>
  <head> 
    <base href='/public'>
    @include('admin.css')
    <style>
    label {
        display: inline-block;
        width: 200px;
        font-weight: 600;
        font-size: 20px !important;
        text-align: left;
        margin-right: 10px;
    }

    input[type="text"],
    input[type="number"],
    select,
    textarea {
        width: 350px;
        padding: 10px;
        border: none;
        border-radius: 5px;
        /* background-color: #2e2e2e; */
        /* color: #fff; */
        font-size: 14px;
        outline: none;
    }

    input[type="file"] {
        color: #fff;
    }

    textarea {
        height: 100px;
        resize: vertical;
    }

    .div_deg {
        padding: 15px 0;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap
    }

    .main_div {
        text-align: center;
        padding-top: 40px;
        background-color: #3a3c3e;
        border-radius: 10px;
        max-width: 700px;
        margin: 0 auto;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
        padding-bottom: 30px;
    }

    .btn.btn-primary {
        background-color: #e91e63;
        border-color: #e91e63;
        padding: 10px 25px;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn.btn-primary:hover {
        background-color: #c2185b;
    }

    h1 {
        color: #fff;
        margin-bottom: 20px;
    }
</style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <div class="main_div">
                <h1 style="font-size: 30px; font-weight:700; ">Update Room</h1>
                <form action="{{url('edit_room',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="div_deg">
                        <label for="title">Room Title -</label>
                        <input type="text" name="title" id="title" value="{{$data->room_title}}">
                    </div>
                    <div class="div_deg">
                        <label for="description"> Description -</label>
                        <textarea name="description" id="description" >{{$data->description}}</textarea>                    
                    </div>
                    <div class="div_deg">
                        <label for="price">Price -</label>
                        <input type="number" name="price" id="price" value="{{$data->price}}">
                    </div>
                     <div class="div_deg">
                        <label for="room_type">Room Type -</label>
                        <select name="room_type" id="room_type">

                            <option  {{ $data->room_type == 'regular' ? 'selected' : '' }} value="regular">Regular</option>
                            <option {{ $data->room_type == 'premium' ? 'selected' : '' }} value="premium">Premium</option>
                            <option {{ $data->room_type == 'deluxe' ? 'selected' : '' }} value="deluxe">Deluxe</option>

                        </select>
                    </div>
                     <div class="div_deg">
                        <label for="wifi">Free Wifi -</label>
                        <select name="wifi" id="wifi">

                            <option {{ $data->wifi == 'yes' ? 'selected' : '' }} value="yes">Yes</option>
                            <option {{ $data->wifi == 'no' ? 'selected' : '' }} value="no">No</option>

                        </select>
                    </div>
                    <div class="div_deg" style="gap: 22%">
                        <label for="image">Current Image</label>
                        <img width="200" src="room/{{$data->image}}" alt="image">
                    </div>
                    <div class="div_deg">
                        <label for="image">Upload Image</label>
                        <input type="file" name="image" id="image">
                    </div>
                   <div class="div_deg">
                        <input class="btn btn-primary" style="margin-right: 15px;" type="submit" value="Update Room">
                        <button class="btn btn-secondary">
                            <a href="{{url('view_room')}}">Cancel</a>
                        </button>
                    </div>
                </form>
            </div>

          </div>
          </div>
          </div>

    @include('admin.footer')
  </body>
</html>