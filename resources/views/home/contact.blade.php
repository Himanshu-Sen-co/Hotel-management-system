      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Contact Us</h2>
                  </div>
               </div>
            </div>
            @if (session()->has('message'))
                     <div class="alert alert-success">
                           <button class="close" data-bs-dismiss="alert">X</button>
                           {{ session()->get('message') }}
                        </div>
                     @endif
            {{-- @if ($errors->any())
                 @foreach ($errors->all() as $error)
                          <li style="color: red;">
                           {{$error}}
                          </li>
                      @endforeach
            @endif --}}
            <div class="row">
               <div class="col-md-6">
                  <form id="request" class="main_form" action="{{url('contact')}}" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Name" type="text" name="name" required> 
                           @error('name')
                              <span class="text-danger" style="color:red;">{{ $message }}</span>
                           @enderror
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="email" name="email" required> 
                           @error('email')
                              <span class="text-danger" style="color:red;">{{ $message }}</span>
                           @enderror
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Phone Number" type="number" name="phone" required>
                           @error('phone')
                              <span class="text-danger" style="color:red;">{{ $message }}</span>
                           @enderror                          
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Message" type="type" name="message" required></textarea>
                           @error('message')
                              <span class="text-danger" style="color:red;">{{ $message }}</span>
                           @enderror
                        </div>
                        <div class="col-md-12">
                           <button type="submit" class="send_btn">Send</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-6">
                  <div class="map_main">
                     <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>