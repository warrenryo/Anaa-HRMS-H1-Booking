<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anaa Hotel & Restaurant</title>

    <link rel="icon" href="img/ANAA_LOGO.png" type="image/png">
    <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="vendors/magnefic-popup/magnific-popup.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- ================ header section start ================= -->
    <header class="header_area">
        <div class="header-top">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div id="logo">
                        <a href="{{ url('home') }}"></a><img src="img/anaa_logs.png" alt="anaa_logo"
                            title="" /></a>
                    </div>
                    <div class="ml-auto d-none d-md-block d-md-flex">
                        <div class="media header-top-info">
                            <span class="header-top-info__icon"><i class="fas fa-phone-volume"></i></span>
                            <div class="media-body">
                                <p>Have any question?</p>

                                <p>Free: <a href="tel:+12 365 5233">+63 0956027019</a></p>
                            </div>
                        </div>
                        <div class="media header-top-info">
                            <span class="header-top-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <p>Have any question?</p>
                                <p>Free: <a href="tel:+12 365 5233">+Anaa@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav">
                            <li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('') }}">Rooms</a></li>
                        </ul>

                    </div>

                    <ul class="social-icons ml-auto flex">
                        @if (Route::has('login'))
                            @auth

                                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                    class="mr-4 nav-item flex text-white items-center "
                                    type="button">{{Auth::user()->name}}<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-center text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownDefaultButton">
                                        <li class="flex items-center">
                                            @csrf
                                            <a href="{{ url('user-profile') }}">Avail VIP</a>
                                        </li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            <li class="flex items-center">
                                                @csrf
                                                <a class="py-2 flex items-center" href="{{ route('logout')}}" onclick="event.preventDefault();
                                                        this.closest('form').submit();" class=" text-danger !py-3" @click="toggle">
                                                    <svg class="mr-2 w-4.5 h-4.5 ltr:mr-2 rtl:ml-2 rotate-90" width="18" height="18"
                                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.5"
                                                            d="M17 9.00195C19.175 9.01406 20.3529 9.11051 21.1213 9.8789C22 10.7576 22 12.1718 22 15.0002V16.0002C22 18.8286 22 20.2429 21.1213 21.1215C20.2426 22.0002 18.8284 22.0002 16 22.0002H8C5.17157 22.0002 3.75736 22.0002 2.87868 21.1215C2 20.2429 2 18.8286 2 16.0002L2 15.0002C2 12.1718 2 10.7576 2.87868 9.87889C3.64706 9.11051 4.82497 9.01406 7 9.00195"
                                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                        <path d="M12 15L12 2M12 2L15 5.5M12 2L9 5.5" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    Sign Out
                                                </a>
                                            </li>
                                        </form>
                                        
                                    </ul>
                                </div>
                            @else
                                <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('register') }}">Register</a></li>
                            @endauth
                        @endif
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="#"><i class="fas fa-rss"></i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- ================ header section end ================= -->

    <main class="site-main">


        <!-- ================ start banner area ================= -->
        <section class=" home-banner-area" id="home">
            <div class="container h-100">
                <div class=" home-banner">
                    <div class="text-center">
                        <h4 class="hide">WELCOME TO:</h4>
                        <h1 class="hide">ANAA : <em>Hotel and Restaurant</em></h1>
                        <a class="button home-banner-btn" href="#booking">Book Now</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ end banner area ================= -->


        <!-- ================ start banner form ================= -->

        <!-- ================ end banner form ================= -->

        <!-- ================ welcome section start ================= -->
        <section class="welcome">
            <div class="container">
                <div class="row align-items-center">
                    <div class="hide_2 col-lg-5 mb-4 mb-lg-0">
                        <div class="row no-gutters welcome-images">
                            <div class="col-sm-7">
                                <div class="card">
                                    <img class="" src="img/home/welcomeBanner1.png" alt="Card image cap">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="card">
                                    <img class="" src="img/home/welcomeBanner2.png" alt="Card image cap">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <img class="" src="img/home/welcomeBanner3.png" alt="Card image cap">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hide_3 col-lg-7">
                        <div class="welcome-content">
                            <h2 class="mb-4"><span class="d-block">Welcome</span> to our residence</h2>
                            <p>Beginning blessed second a creepeth. Darkness wherein fish years good air whose after
                                seed appear midst evenin, appear void give third bearing divide one so blessed moved
                                firmament gathered </p>
                            <p>Beginning blessed second a creepeth. Darkness wherein fish years good air whose after
                                seed appear midst evenin, appear void give third bearing divide one so blessed</p>
                            <a class="button button--active home-banner-btn mt-4" href="#">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ welcome section end ================= -->


        <!-- ================ Explore section start ================= -->
        <section id="booking" class="section-margin">
            <div class="container">
                <div class="section-intro text-center pb-80px">
                    <div class="section-intro__style">
                        <img src="img/home/bed-icon.png" alt="">
                    </div>
                    <h2>Rooms Available</h2>
                </div>

                <div class="row">
                    @foreach ($rooms as $room)
                        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                            <div class="card card-explore">
                                <div class="card-explore__img">
                                    <img class="card-img" src="{{ asset($room->roomImages[0]->images) }}"
                                        alt="">
                                </div>
                                <div class="card-body">
                                    <h3 class="card-explore__price">₱ {{ $room->roomPrice->three_hours }}
                                        <sub>{{ $room->RoomNumber }}</sub></h3>
                                    <h4 class="card-explore__title"><a
                                            href="{{ url('booknowIndex/' . $room->id) }}">{{ $room->RoomType }}</a></h4>
                                    <p>{{ $room->Description }}</p>
                                    <a class="card-explore__link" href="{{ url('booknowIndex/' . $room->id) }}">Book
                                        Now <i class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- ================ Explore section end ================= -->



        <!-- ================ video section start ================= -->

        <!-- ================ video section end ================= -->

        <!-- ================ special section start ================= -->
        <section class="section-padding bg-porcelain">
            <div class="container">
                <div class="section-intro text-center pb-80px">
                    <div class="section-intro__style">
                        <img src="img/home/bed-icon.png" alt="">
                    </div>
                    <h2>Special Facilities</h2>
                </div>
                <div class="special-img mb-30px">
                </div>

                <div class="row">
                    <div class="con1 hide col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card card-special">
                            <div class="media align-items-center mb-1">
                                <span class="card-special__icon"><i class="ti-home"></i></span>
                                <div class="media-body">
                                    <h4 class="card-special__title">Conference Room</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>Built purse maids cease her ham new seven among and. Pulled coming wooded tended it
                                    answer remain</p>
                            </div>
                        </div>
                    </div>
                    <div class="con1 hide col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card card-special">
                            <div class="media align-items-center mb-1">
                                <span class="card-special__icon"><i class="ti-home"></i></span>
                                <div class="media-body">
                                    <h4 class="card-special__title">Spare Rooms</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>Private bathroom with shower/tub combination. Fresh towels and basic toiletries. Air
                                    conditioning/heating controls</p>
                            </div>
                        </div>
                    </div>
                    <div class="con1 hide col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card card-special">
                            <div class="media align-items-center mb-1">
                                <span class="card-special__icon"><i class="ti-home"></i></span>
                                <div class="media-body">
                                    <h4 class="card-special__title">Suites</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>Private bathroom with shower/tub combination Comfortable bed(s). Private bathroom
                                    with shower/tub combination</p>
                            </div>
                        </div>
                    </div>
                    <div class="con1 hide col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card card-special">
                            <div class="media align-items-center mb-1">
                                <span class="card-special__icon"><i class="ti-home"></i></span>
                                <div class="media-body">
                                    <h4 class="card-special__title">Accessible Rooms</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>Wheelchair-accessible features (e.g., wider doorways, roll-in shower). Comfortable
                                    bed(s). Private bathroom with shower/tub combination</p>
                            </div>
                        </div>
                    </div>

                    <div class="con1 hide col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card card-special">
                            <div class="media align-items-center mb-1">
                                <span class="card-special__icon"><i class="ti-bell"></i></span>
                                <div class="media-body">
                                    <h4 class="card-special__title">Swimming Pool</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>Built purse maids cease her ham new seven among and. Pulled coming wooded tended it
                                    answer remain</p>
                            </div>
                        </div>
                    </div>

                    <div class="con1 hide col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card card-special">
                            <div class="media align-items-center mb-1">
                                <span class="card-special__icon"><i class="ti-car"></i></span>
                                <div class="media-body">
                                    <h4 class="card-special__title">Sports Culb</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>Built purse maids cease her ham new seven among and. Pulled coming wooded tended it
                                    answer remain</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ special section end ================= -->

        <!-- ================ carousel section start ================= -->
        <section class="section-margin">
            <div class="container">
                <div class="section-intro text-center pb-20px">
                    <div class="section-intro__style">
                        <img src="img/home/bed-icon.png" alt="">
                    </div>
                    <h2>Our Guest Love Us</h2>
                </div>
                <div class="owl-carousel owl-theme testi-carousel">
                    <div class="testi-carousel__item">
                        <div class="media">
                            <div class="testi-carousel__img">
                                <img src="img/home/testimonial1.png" alt="">
                            </div>
                            <div class="media-body">
                                <p>Hotels that prioritize guest safety and security, with measures such as well-lit
                                    parking areas, security personnel, and secure key card access, receive high marks
                                    from guests.</p>
                                <div class="testi-carousel__intro">
                                    <h3>Robert Mack</h3>
                                    <p>guest</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testi-carousel__item">
                        <div class="media">
                            <div class="testi-carousel__img">
                                <img src="img/home/testimonial2.png" alt="">
                            </div>
                            <div class="media-body">
                                <p> Hotels located in convenient or picturesque locations, close to attractions,
                                    transportation hubs, or business centers, are highly valued by guests.</p>
                                <div class="testi-carousel__intro">
                                    <h3>David Alone</h3>
                                    <p>guest</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testi-carousel__item">
                        <div class="media">
                            <div class="testi-carousel__img">
                                <img src="img/home/testimonial3.png" alt="">
                            </div>
                            <div class="media-body">
                                <p>Comfortable beds, cozy linens, and well-appointed rooms contribute to a relaxing and
                                    enjoyable stay.</p>
                                <div class="testi-carousel__intro">
                                    <h3>Adam Pallin</h3>
                                    <p>guest</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testi-carousel__item">
                        <div class="media">
                            <div class="testi-carousel__img">
                                <img src="img/home/testimonial1.png" alt="">
                            </div>
                            <div class="media-body">
                                <p> Guests often appreciate hotels that offer a range of amenities such as a gym, spa,
                                    pool, restaurants, and business facilities, enhancing their overall experience.</p>
                                <div class="testi-carousel__intro">
                                    <h3>Robert Mack</h3>
                                    <p>guest</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testi-carousel__item">
                        <div class="media">
                            <div class="testi-carousel__img">
                                <img src="img/home/testimonial2.png" alt="">
                            </div>
                            <div class="media-body">
                                <p>Incidunt deleniti blanditiis quas aperiam recusandae consillo ullam quibusdam cum
                                    libero illo repell endus!</p>
                                <div class="testi-carousel__intro">
                                    <h3>David Alone</h3>
                                    <p>CEO & Founder</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testi-carousel__item">
                        <div class="media">
                            <div class="testi-carousel__img">
                                <img src="img/home/testimonial3.png" alt="">
                            </div>
                            <div class="media-body">
                                <p>Incidunt deleniti blanditiis quas aperiam recusandae consillo ullam quibusdam cum
                                    libero illo repell endus!</p>
                                <div class="testi-carousel__intro">
                                    <h3>Adam Pallin</h3>
                                    <p>CEO & Founder</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testi-carousel__item">
                        <div class="media">
                            <div class="testi-carousel__img">
                                <img src="img/home/testimonial1.png" alt="">
                            </div>
                            <div class="media-body">
                                <p>Incidunt deleniti blanditiis quas aperiam recusandae consillo ullam quibusdam cum
                                    libero illo repell endus!</p>
                                <div class="testi-carousel__intro">
                                    <h3>Robert Mack</h3>
                                    <p>CEO & Founder</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testi-carousel__item">
                        <div class="media">
                            <div class="testi-carousel__img">
                                <img src="img/home/testimonial2.png" alt="">
                            </div>
                            <div class="media-body">
                                <p>Incidunt deleniti blanditiis quas aperiam recusandae consillo ullam quibusdam cum
                                    libero illo repell endus!</p>
                                <div class="testi-carousel__intro">
                                    <h3>David Alone</h3>
                                    <p>CEO & Founder</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ carousel section end ================= -->


        <!-- ================ news section start ================= -->
        <section class="section-margin">
            <div class="container">
                <div class="section-intro text-center pb-80px">
                    <div class="section-intro__style">
                        <img src="img/home/bed-icon.png" alt="">
                    </div>
                    <h2>News & Events</h2>
                </div>

                <div class="row">
                    <div class="events hide_2 col-md-6 col-lg-4 mb-4 mb-md-0">
                        <div class="card card-news">
                            <div class="card-news__img">
                                <img class="card-img" src="img/home/explore1.png" alt="">
                            </div>
                            <div class="card-body">
                                <h4 class="card-news__title"><a href="#">Hotel companies tipped the scales</a>
                                </h4>
                                <ul class="card-news__info">
                                    <li><a href="#"><span class="news-icon"><i class="ti-notepad"></i></span>
                                            20th Nov, 2018</a></li>
                                    <li><a href="#"><span class="news-icon"><i class="ti-comment"></i></span>
                                            03 Comments</a></li>
                                </ul>
                                <p>Not thoughts all exercise blessing Indulgence way everything joy alteration
                                    boisterous the attachment party we years to order</p>
                                <a class="card-news__link" href="#">Read More <i
                                        class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="events hide_2 col-md-6 col-lg-4 mb-4 mb-md-0">
                        <div class="card card-news">
                            <div class="card-news__img">
                                <img class="card-img" src="img/home/explore2.png" alt="">
                            </div>
                            <div class="card-body">
                                <h4 class="card-news__title"><a href="#">Try your hand inaugural industry
                                        crossword</a></h4>
                                <ul class="card-news__info">
                                    <li><a href="#"><span class="news-icon"><i class="ti-notepad"></i></span>
                                            20th Nov, 2018</a></li>
                                    <li><a href="#"><span class="news-icon"><i class="ti-comment"></i></span>
                                            03 Comments</a></li>
                                </ul>
                                <p>Not thoughts all exercise blessing Indulgence way everything joy alteration
                                    boisterous the attachment party we years to order</p>
                                <a class="card-news__link" href="#">Read More <i
                                        class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="events hide_2 col-md-6 col-lg-4 mb-4 mb-md-0">
                        <div class="card card-news">
                            <div class="card-news__img">
                                <img class="card-img" src="img/home/explore3.png" alt="">
                            </div>
                            <div class="card-body">
                                <h4 class="card-news__title"><a href="#">Hoteliers resolve to invest in
                                        guests</a></h4>
                                <ul class="card-news__info">
                                    <li><a href="#"><span class="news-icon"><i class="ti-notepad"></i></span>
                                            20th Nov, 2018</a></li>
                                    <li><a href="#"><span class="news-icon"><i class="ti-comment"></i></span>
                                            03 Comments</a></li>
                                </ul>
                                <p>Not thoughts all exercise blessing Indulgence way everything joy alteration
                                    boisterous the attachment party we years to order</p>
                                <a class="card-news__link" href="#">Read More <i
                                        class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ news section end ================= -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    </main>



    <!-- ================ start footer Area ================= -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Contributors</h4>
                    <ul>
                        <li><a href="#">Richard Ysalina</a></li>
                        <li><a href="#">Marifel Laynesa</a></li>
                        <li><a href="#">Adrian Makilan</a></li>
                        <li><a href="#">Mary Jane Bando</a></li>
                        <li><a href="#">Mark Steeven S. Silva</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Contributors</h4>
                    <ul>
                        <li><a href="#">All rigths reserved by ANAA corporation 2024</a></li>

                    </ul>
                </div>




                <div class="info"></div>
                </form>
            </div>
        </div>
        </div>

        </div>
        </div>
    </footer>
    <!-- ================ End footer Area ================= -->
    @include('sweetalert::alert')


    <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="vendors/magnefic-popup/jquery.magnific-popup.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendors/easing.min.js"></script>
    <script src="vendors/superfish.min.js"></script>
    <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
    <script src="vendors/jquery.ajaxchimp.min.js"></script>
    <script src="vendors/mail-script.js"></script>
    <script src="js/main.js"></script>

    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                console.log(entry)
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                    entry.target.classList.add('show_2');
                    entry.target.classList.add('show_3');
                } else {
                    entry.target.classList.remove('show');
                    entry.target.classList.remove('show_2');
                    entry.target.classList.remove('show_3');
                }
            })
        })

        const hiddenElements = document.querySelectorAll('.hide');
        const hiddenElements2 = document.querySelectorAll('.hide_2');
        const hiddenElements3 = document.querySelectorAll('.hide_3');
        hiddenElements.forEach((el) => observer.observe(el));
        hiddenElements2.forEach((el) => observer.observe(el));
        hiddenElements3.forEach((el) => observer.observe(el));
    </script>
</body>

</html>
