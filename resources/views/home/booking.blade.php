<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Room Booking | {{ config('app.name', 'Hotel') }}</title>
      <meta name="keywords" content="hotel booking, room reservation">
      <meta name="description" content="Book your perfect room with us.">
      <meta name="author" content="{{ config('app.name', 'Hotel') }}">
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
      <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif" />
      <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <style>
         .room-meta {
            margin: 10px 0;
            font-size: 14px;
         }
         .room-quality {
            color: #ff9800;
            font-weight: bold;
         }
         .room-price {
            font-size: 18px;
            font-weight: bold;
            color: #ff5252;
            margin-top: 5px;
         }
         .btn-book {
            display: inline-block;
            background-color: #0f1521;
            color: #ffffff !important;
            padding: 8px 20px;
            margin-top: 15px;
            border-radius: 5px;
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s ease;
            cursor: pointer;
         }
         .btn-book:hover {
            background-color: #ff5252;
            text-decoration: none;
         }
         .form-control {
            display: block;
            width: 100%;
            padding: 8px 12px;
            margin-bottom: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
         }
         .form-control:focus {
            outline: none;
            border-color: #0f1521;
            box-shadow: 0 0 5px rgba(15, 21, 33, 0.2);
         }
      </style>
   </head>
   <body class="main-layout">
      <div class="loader_bg">
         <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#"/></div>
      </div>
      <header>
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('home') }}">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('about') }}">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('rooms.index') }}">Our room</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>Select & Book Room</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <p  class="margin_0">Discover comfort and luxury with our handpicked accommodations.</p>
                  </div>
               </div>
            </div>
            <div class="row">
               @forelse($rooms as $room)
                  <div class="col-md-4 col-sm-6">
                     <div class="room serv_hover">
                        <div class="room_img">
                           <figure>
                              <img src="{{ $room->image_path ? asset('storage/'.$room->image_path) : asset('images/room1.jpg') }}" alt="{{ $room->display_title }}" style="max-width: 100%; display:block;" />
                           </figure>
                        </div>
                        <div class="bed_room">
                           <h3>{{ $room->display_title }}</h3>
                           <p>{{ $room->description ?? 'Experience comfort and luxury in this beautiful room.' }}</p>
                           <div class="room-meta">
                              <div class="room-quality">
                                 Quality:
                                 @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $room->stars)
                                       ★
                                    @else
                                       ☆
                                    @endif
                                 @endfor
                                 @if ($room->quality_label)
                                    ({{ $room->quality_label }})
                                 @endif
                              </div>
                              <div class="room-price">${{ number_format($room->price_per_night, 2) }} / Night</div>
                           </div>
                           <a href="#booking_form" onclick="selectRoom({{ $room->id }}, '{{ $room->display_title }}', {{ $room->price_per_night }})" class="btn-book">Book Now</a>
                        </div>
                     </div>
                  </div>
               @empty
                  <div class="col-md-12">
                     <p>No rooms available at this time. Please check back later.</p>
                  </div>
               @endforelse
            </div>
         </div>
      </div>

      <div class="container" id="booking_form" style="margin: 40px auto; padding: 30px 0;">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h3 style="margin-bottom: 10px;">Complete Your Booking</h3>
                  <p class="margin_0">Fill in your details below to complete your reservation.</p>
               </div>
            </div>
         </div>

         @if(session('booking_success'))
            <div style="padding: 12px 15px; border-radius: 6px; margin-bottom: 15px; background: #e9f7ef; color: #155724; border: 1px solid #b7ebc7;">
               {{ session('booking_success') }}
            </div>
         @endif

         @if($errors->any())
            <div style="padding: 12px 15px; border-radius: 6px; margin-bottom: 15px; background: #fdecec; color: #721c24; border: 1px solid #f5b7b7;">
               <strong>Please fix the following errors:</strong>
               <ul style="margin: 8px 0 0 18px;">
                  @foreach($errors->all() as $err)
                     <li>{{ $err }}</li>
                  @endforeach
               </ul>
            </div>
         @endif

         <form method="POST" action="{{ route('book.store') }}" style="background: white; padding: 25px; border-radius: 8px; border: 1px solid #eee;">
            @csrf

            <input type="hidden" name="room_id" id="room_id" value="{{ $selectedRoom?->id ?? '' }}">

            <div class="row">
               <div class="col-md-6" style="margin-bottom: 15px;">
                  <label style="display: block; margin-bottom: 5px; font-weight: bold;"><strong>Selected Room</strong></label>
                  <input type="text" id="room_display" class="form-control" style="background: #f5f5f5;" readonly placeholder="Select a room from above">
               </div>
               <div class="col-md-6" style="margin-bottom: 15px;">
                  <label style="display: block; margin-bottom: 5px; font-weight: bold;"><strong>Price per Night</strong></label>
                  <input type="text" id="room_price" class="form-control" style="background: #f5f5f5;" readonly placeholder="$0.00">
               </div>
               <div class="col-md-6" style="margin-bottom: 15px;">
                  <label style="display: block; margin-bottom: 5px; font-weight: bold;"><strong>Arrival Date</strong></label>
                  <input type="date" name="arrival" class="form-control" value="{{ old('arrival') }}" required>
                  @error('arrival')<div style="color: #ff5252; font-size: 13px;">{{ $message }}</div>@enderror
               </div>
               <div class="col-md-6" style="margin-bottom: 15px;">
                  <label style="display: block; margin-bottom: 5px; font-weight: bold;"><strong>Departure Date</strong></label>
                  <input type="date" name="departure" class="form-control" value="{{ old('departure') }}" required>
                  @error('departure')<div style="color: #ff5252; font-size: 13px;">{{ $message }}</div>@enderror
               </div>
               <div class="col-md-6" style="margin-bottom: 15px;">
                  <label style="display: block; margin-bottom: 5px; font-weight: bold;"><strong>Full Name</strong></label>
                  <input type="text" name="full_name" class="form-control" value="{{ old('full_name') }}" required>
                  @error('full_name')<div style="color: #ff5252; font-size: 13px;">{{ $message }}</div>@enderror
               </div>
               <div class="col-md-6" style="margin-bottom: 15px;">
                  <label style="display: block; margin-bottom: 5px; font-weight: bold;"><strong>Email</strong></label>
                  <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                  @error('email')<div style="color: #ff5252; font-size: 13px;">{{ $message }}</div>@enderror
               </div>
               <div class="col-md-6" style="margin-bottom: 15px;">
                  <label style="display: block; margin-bottom: 5px; font-weight: bold;"><strong>Phone</strong></label>
                  <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                  @error('phone')<div style="color: #ff5252; font-size: 13px;">{{ $message }}</div>@enderror
               </div>
               <div class="col-md-6" style="margin-bottom: 15px;">
                  <label style="display: block; margin-bottom: 5px; font-weight: bold;"><strong>Special Requests (optional)</strong></label>
                  <input type="text" name="notes" class="form-control" value="{{ old('notes') }}" maxlength="1000" placeholder="Any special requests...">
                  @error('notes')<div style="color: #ff5252; font-size: 13px;">{{ $message }}</div>@enderror
               </div>
               <div class="col-md-12" style="margin-top: 20px;">
                  <button type="submit" class="btn-book" style="padding: 12px 30px; font-size: 16px;">Submit Booking Request</button>
               </div>
            </div>
         </form>
      </div>

      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class=" col-md-4">
                     <h3>Contact US</h3>
                     <ul class="contact">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Address</li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> +01 1234569540</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> demo@gmail.com</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>Menu Link</h3>
                     <ul class="link_menu">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li class="active"><a href="{{ route('rooms.index') }}">Our Room</a></li>
                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                     </ul>
                  </div>
<div class="col-md-4">
                     <h3>Newsletter</h3>
                     <form class="bottom_form" method="POST" action="{{ route('newsletter.subscribe') }}">
                        @csrf
                        <input class="enter" placeholder="Enter your email" type="email" name="email" required>
                        <button class="sub_btn" type="submit">subscribe</button>
                     </form>
                     <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        <p>
                           © 2019 All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a>
                           <br><br>
                           Distributed by <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
                           </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>

      <script>
         function selectRoom(roomId, roomTitle, roomPrice) {
            document.getElementById('room_id').value = roomId;
            document.getElementById('room_display').value = roomTitle;
            document.getElementById('room_price').value = '$' + Number(roomPrice).toFixed(2);
            document.getElementById('booking_form').scrollIntoView({ behavior: 'smooth' });
         }

         // Pre-select room if one was passed
         @if($selectedRoom)
         selectRoom({{ $selectedRoom->id }}, '{{ $selectedRoom->display_title }}', {{ $selectedRoom->price_per_night }});
         @endif
      </script>
   </body>
</html>