<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
    @include('home.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
   .form-input {
      margin-bottom: 15px;
      display: flex;
      justify-content: center;
      gap: 5px;
      flex-direction: column;
   }

   .form-input label {
      font-weight: 600;
      margin-bottom: 5px;
      font-size: 16px;
      color: #333;
   }

   .form-input input[type="text"],
   .form-input input[type="email"],
   .form-input input[type="number"],
   .form-input input[type="date"] {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
      transition: all 0.3s ease-in-out;
      width: 90%;
      /* max-width: 300px; */
      /* margin-left: 20px; */
   }

   .form-input input:focus {
      border-color: #e91e63;
      box-shadow: 0 0 5px rgba(233, 30, 99, 0.4);
      outline: none;
   }

   .form-input input[type="submit"] {
      background-color: #e91e63;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-top: 10px;
      width: 150px;
   }

   .form-input input[type="submit"]:hover {
      background-color: #d81b60;
   }

   /* Form section spacing */
   .form-section {
      padding: 20px 40px;
      background-color: #f8f8f8;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);

      /* margin-top: 20px; */
   }
   .form-section form {
      display: flex;
      flex-direction: column;
      justify-content: center;

      /* margin-top: 20px; */
   }

   @media (max-width: 768px) {
      .form-section {
         padding: 15px 20px;
      }

      .form-input input[type="text"],
      .form-input input[type="email"],
      .form-input input[type="number"],
      .form-input input[type="date"] {
         max-width: 100%;
      }

      .form-input input[type="submit"] {
         width: 100%;
      }
   }
</style>

   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
    @include('home.header')
      </header>
      <!-- end header inner -->
      <!-- end header -->
            <div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>
            <div class="row">
               
               <div class="col-md-6">
                  <div id="serv_hover"  class="room">
                     <div class="room_img" style="padding: 20px;">
                        <figure><img style="height: 300px; width: 800px;" src="room/{{$room->image}}" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h2 style="font-size: 2rem; font-weight: bold;">{{$room->room_title}}</h2>
                        <p style="padding: 10px;"> {{$room->description}} </p>
                        <h4 style="padding: 10px;"> Free Wifi : {{$room->Wifi}} </h4>
                        <h4 style="padding: 10px;"> Room Type : {{$room->room_type}} </h4>
                        <h3 style="padding: 10px;"> Room Price : {{$room->price}} </h3>
                     </div>
                  </div>
               </div>

               <div class=" col-md-6">
                  <div class="form-section">
                  <h1 style="font-size: 35px; font-weight: bold; margin:10px 0px;">Book Room</h1>
                  <div>
                     @if (session()->has('message'))
                     <div class="alert alert-success">
                           <button class="close" data-bs-dismiss="alert">X</button>
                           {{ session()->get('message') }}
                        </div>
                     @endif

                  </div>
                  {{-- @if ($errors->any())
                      @foreach ($errors->all() as $error)
                          <li style="color: red;">
                           {{$error}}
                          </li>
                      @endforeach
                  @endif --}}
                  <form action="{{url('room_booking',$room->id)}}" method="post">
                     @csrf
                     <div class="form-input">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" @if (Auth::id())
                            value="{{Auth::user()->name}}"
                        @endif>
                        @error('name')
                              <span class="text-danger" style="color:red;">{{ $message }}</span>
                           @enderror
                     </div>
                     <div class="form-input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" @if (Auth::id())
                            value="{{Auth::user()->email}}"
                        @endif>
                        @error('email')
                              <span class="text-danger" style="color:red;">{{ $message }}</span>
                           @enderror
                     </div>
                     <div class="form-input">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" id="phone" @if (Auth::id())
                            value="{{Auth::user()->phone}}"
                        @endif>
                        @error('phone')
                              <span class="text-danger" style="color:red;">{{ $message }}</span>
                           @enderror
                     </div>
                     <div class="form-input">
                        <label for="startDate">Start Date</label>
                        <input type="date" name="startDate" id="startDate">
                        @error('startDate')
                              <span class="text-danger" style="color:red;">{{ $message }}</span>
                           @enderror
                     </div>
                     <div class="form-input">
                        <label for="endDate">End Date</label>
                        <input type="date" name="endDate" id="endDate">
                        @error('endDate')
                              <span class="text-danger" style="color:red;">{{ $message }}</span>
                           @enderror
                     </div>
                     <div class="form-input" style="margin-top:10px; max-width:100px">
                        <button class="btn btn-primary">Book Room</button>
                     </div>

                  </form>
               </div>
               </div>
            </div>
         </div>
      </div>
      <!--  footer -->
    @include('home.footer')

    <script>
      $(function(){
         var dtToday = new Date();
         var month = dtToday.getMonth() + 1;
         var day = dtToday.getDate();
         var year = dtToday.getFullYear();
         if(month<10)
            month = '0' + month.toString();
         
         if(day<10)
            day = '0' + day.toString();
         var maxDate = year + '-' + month + '-' + day;
         $('#startDate').attr('min',maxDate);
         $('#endDate').attr('min',maxDate);

      })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
   </body>
</html>