<!DOCTYPE html>
<html lang="en">
   <head>
@include('home.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
      <!-- gallery -->
    @include('home.gallery')
      <!-- end gallery -->

      <!--  footer -->
    @include('home.footer')
   </body>
</html>