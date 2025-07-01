<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
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
            <center>
                <h1 style="font-size: 30px; font-weight:bold">Mail send to {{$message->name}}</h1>
                <form action="{{url('mail',$message->id)}}" method="post">
                    @csrf
                    <div class="div_deg">
                        <label for="greeting">Greeting -</label>
                        <input type="text" name="greeting" id="greeting">
                    </div>
                    <div class="div_deg">
                        <label for="body"> Mail Body -</label>
                        <textarea name="body" id="body" ></textarea>                    
                    </div>
                    <div class="div_deg">
                        <label for="action_text">Action Text -</label>
                        <input type="text" name="action_text" id="action_text">
                    </div>
                    <div class="div_deg">
                        <label for="action_url">Action Url -</label>
                        <input type="text" name="action_url" id="action_url">
                    </div>
                    <div class="div_deg">
                        <label for="end_line">End Line -</label>
                        <input type="text" name="end_line" id="end_line">
                    </div>
                   <div class="div_deg">
                        <input class="btn btn-info" type="submit" value="Send Mail">
                    </div>
                </form>
            </center>

        </div>
    </div>
    </div>
    @include('admin.footer')
  </body>
</html>