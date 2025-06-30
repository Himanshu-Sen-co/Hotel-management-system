<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
    @include('home.css')
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
            </div>
         </div>
      </div>
      <!--  footer -->
    @include('home.footer')
   </body>
</html>