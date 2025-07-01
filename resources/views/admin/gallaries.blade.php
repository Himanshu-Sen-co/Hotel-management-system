<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .form-input{
            padding: 30px;
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
            <h1 style="font-size: 3rem; font-weight:bold; margin:6px 2px;">Gallary</h1>
            <div class="row">
                @foreach ($gallary as $gal)
                    <div class="col-md-4 mb-3">
                        <img style="width: 300px; height: 200px" src="gallary/{{$gal->image}}" alt="uploaded Image">
                        <a href="{{url('delete_gallary',$gal->id)}}" class="btn btn-danger">Delete Image</a>
                    </div>
                @endforeach
            </div>
            <form action="{{url('upload_gallary')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-input">
                    <label for="image" style="font-weight: bold; color:white; margin-right:10px">Upload Image</label>
                    <input type="file" name="image" id="image" required>
                    <button class="btn btn-info">Add image</button>
                </div>
            </form>
            </center>
          </div>
          </div>
          </div>
    @include('admin.footer')
  </body>
</html>