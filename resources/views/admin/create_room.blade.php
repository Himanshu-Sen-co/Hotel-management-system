<!DOCTYPE html>
<html>
  <head> 
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
        color: #fff;
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
                <h1 style="font-size: 30px; font-weight:700; ">Add Rooms</h1>
                <form action="{{url('add_room')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="div_deg">
                        <label for="title">Room Title -</label>
                        <input type="text" name="title" id="title">
                    </div>
                    <div class="div_deg">
                        <label for="description"> Description -</label>
                        <textarea name="description" id="description" ></textarea>                    
                    </div>
                    <div class="div_deg">
                        <label for="price">Price -</label>
                        <input type="number" name="price" id="price">
                    </div>
                     <div class="div_deg">
                        <label for="room_type">Room Type -</label>
                        <select name="room_type" id="room_type">

                            <option selected value="regular">Regular</option>
                            <option value="premium">Premium</option>
                            <option value="deluxe">Deluxe</option>

                        </select>
                    </div>
                     <div class="div_deg">
                        <label for="wifi">Free Wifi -</label>
                        <select name="wifi" id="wifi">

                            <option selected value="yes">Yes</option>
                            <option value="no">No</option>

                        </select>
                    </div>
                    <div class="div_deg">
                        <label for="image">Upload Image</label>
                        <input type="file" name="image" id="image">
                    </div>
                   <div class="div_deg">
                        <input class="btn btn-primary" type="submit" value="Add Room">
                    </div>
                </form>
            </div>

          </div>
          </div>
          </div>

    @include('admin.footer')
  </body>
</html>