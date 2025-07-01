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
                <h1 style="font-size: 30px; font-weight:700; ">Your all Messages listed here:</h1>
                    <table class="view-table">
                        <tr>
                            <th class="table-heading">Name</th>
                            <th class="table-heading">Email</th>
                            <th class="table-heading">Phone</th>
                            <th class="table-heading">Messages</th>
                            <th class="table-heading">Action</th>
                        </tr>
                        @foreach ($messages as $message)
                            <tr>
                                <td>{{$message->name}}</td>
                                <td>{{$message->email}}</td>
                                <td>{{$message->phone}}</td>
                                <td>{{$message->message}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{url('send_mail',$message->id)}}">Send Mail</a>
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