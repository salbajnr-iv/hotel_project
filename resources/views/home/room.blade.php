<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Our Room | {{ config('app.name', 'Hotel') }}</title>
      <meta name="keywords" content="hotel rooms, booking, accommodations">
      <meta name="description" content="Browse and book our available hotel rooms.">
      <meta name="author" content="{{ config('app.name', 'Hotel') }}">
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
      <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
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
         }
         .btn-book:hover {
            background-color: #ff5252;
            text-decoration: none;
         }
         .newsletter-form .enter {
            width: 100%;
            max-width: 100%;
            margin-bottom: 10px;
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
                              <li class="nav-item active">
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
                              @if (Route::has('login'))
                              <li class="nav-item">
                                <a
                                    href="{{ route('login') }}"
                                    class="inline-block px-5 py-1.5 text-[#1b1b18] border border-transparent hover:border-[#19140035] rounded-sm text-sm leading-normal"
                                >
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal">
                                        Register
                                    </a>
                                @endif
                              </li>
                              @endif
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
                     <h2>Our Room</h2>
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
                     <p class="margin_0">Discover comfort and luxury with our handpicked accommodations.</p>
                  </div>
               </div>
            </div>
            <div class="row">
               @forelse($rooms as $room)
                  <div class="col-md-4 col-sm-6">
                     <div class="room serv_hover">
                        <div class="room_img">
                           <figure>
                              <img src="{{ $room->image_url }}" alt="{{ $room->display_title }}" />
                           </figure>
                        </div>
                        <div class="bed_room">
                           <h3>{{ $room->display_title }}</h3>
                           <p>{{ $room->description ?? 'Enjoy our beautifully appointed accommodations for a memorable stay.' }}</p>
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
                           <a href="{{ route('booking.create', ['room_id' => $room->id]) }}" class="btn-book">Book Now</a>
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
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class=" col-md-4">
                     <h3>Contact US</h3>
                     <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Address</li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> +01 1234569540</li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:demo@gmail.com"> demo@gmail.com</a></li>
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
                     <h3>News letter</h3>
                     <form class="bottom_form newsletter-form" method="POST" action="{{ route('newsletter.subscribe') }}">
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
                           © {{ now()->year }} All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a>
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
   </body>
</html>

      <script src="js/custom.js"></script>
   </body>
</html>

