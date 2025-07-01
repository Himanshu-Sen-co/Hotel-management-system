<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        .view-table{
            border: 2px solid white;
            margin: auto;
            width: 100%;
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
                <h1 style="font-size: 30px; font-weight:700; ">Your all bookings listed here:</h1>
            <table class="view-table">
                <tr>
                    <th class="table-heading">Room ID</th>
                    <th class="table-heading">Customer Name</th>
                    <th class="table-heading"> Email</th>
                    <th class="table-heading">Phone</th>
                    <th class="table-heading">Arrival Date</th>
                    <th class="table-heading">Leaving Date</th>
                    <th class="table-heading">Status</th>
                    <th class="table-heading">Room Title</th>
                    <th class="table-heading">Price</th>
                    <th class="table-heading">Image</th>
                    <th class="table-heading">Action</th>

                </tr>
                @foreach ($bookings as $booking)
                   <tr>
                        <td>{{$booking->room_id}} </td>
                        <td>{{$booking->name}} </td>
                        <td>{{$booking->email}} </td>
                        <td>{{$booking->phone}} </td>
                        <td>{{$booking->startDate}} </td>
                        <td>{{$booking->EndDate}} </td>
                        <td>
                            @if ($booking->status == 'Approved')
                                <span style="color: skyblue">Approved</span>
                            @endif 
                            @if ($booking->status == 'Rejected')
                                <span style="color: red">Rejected</span>
                            @endif
                            @if ($booking->status == 'waiting')
                                <span style="color: yellow">Waiting</span>
                            @endif   
                        </td>
                        <td>{{$booking->room->room_title}} </td>
                        <td>{{$booking->room->price}} </td>
                        <td>
                            <img src="room/{{$booking->room->image}}" alt="image">
                        </td>
                        <td class="flex justify-center">
                            <a onclick="return confirm('are you sure to want to delete this booking ?')" style="margin-right: 3px" href="{{url('delete_booking', $booking->id)}}" class="btn btn-danger">Delete</a>
                            @if ($booking->status == 'waiting')
                             <a onclick="return confirm('are you sure to want to approve this booking ?')" style="margin-right: 3px" href="{{url('approve_booking', $booking->id)}}" class="btn btn-info">Approve</a>
                            <a onclick="return confirm('are you sure to want to reject this booking ?')" href="{{url('reject_booking', $booking->id)}}" class="btn btn-warning">Reject</a>   
                            @endif
                            
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