<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .view-table{
            border: 2px solid white;
            margin: auto;
            width: 90%;
            text-align: center;
            margin-top: 40px;
        }
        .table-heading{
            background-color: skyblue;
            padding: 15px;
            width: 0px;
        }
        tr{
            border: 3px solid white;

        }
        td{
            padding: 10px;
        }
        td img{
            margin: auto;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div style="overflow-x: auto">
            <h1 style="font-size: 30px; font-weight:700; ">Your all room listed here:</h1>
            <table class="view-table">
                <tr>
                    <th class="table-heading">Room Title</th>
                    <th class="table-heading">Description</th>
                    <th class="table-heading">Price</th>
                    <th class="table-heading">Wifi</th>
                    <th class="table-heading">Room Type</th>
                    <th class="table-heading">Image</th>
                     <th class="table-heading">Action</th>
                </tr>
                @foreach ($data as $item)
                    <tr>
                        <td>{{$item->room_title}}</td>
                        <td>{!! Str::limit($item->description, 150, '...') !!}</td>
                        <td>{{$item->price}}$</td>
                        <td>{{$item->wifi}}</td>
                        <td>{{$item->room_type}}</td>
                        <td>
                            <img width="100"  src="room/{{$item->image}}" alt="{{$item->image}}">
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure, you want to delete this room!')" style="margin-right: 5px;" class="btn btn-danger"  href="{{url('delete_room',$item->id)}}">Delete</a>
                            <a class="btn btn-info"  href="{{url('edit_room',$item->id)}}">Edit</a>

                        </td>
                    </tr>
                @endforeach
            </table>
            </div>
          </div>
        </div>
      </div>
    @include('admin.footer')
  </body>
</html>