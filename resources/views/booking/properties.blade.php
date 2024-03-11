
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
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">

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
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav">
              <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="{{url('about')}}">About</a></li>
              <li class="nav-item"><a class="nav-link" href="{{url('properties')}}">Properties</a></li>
              <li class="nav-item"><a class="nav-link" href="{{url('gallery')}}">Gallery</a></li>
              <li class="nav-item submenu dropdown">
                <a href="{{url('blogs')}}" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false">blogs</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="{{url('blogs')}}">Blog</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{url('blogdetails')}}">Blog Details</a></li>
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="{{url('contact')}}">Contact</a></li>
            </ul>
          </div>
          </div>

          <ul class="social-icons ml-auto">
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
  
  <!-- ================ start banner area ================= -->	
	<section class="contact-banner-area" id="contact">
		<div class="container h-100">
			<div class="contact-banner">
				<div class="text-center">
					<h1>Reservation</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
           
          </nav>
				</div>
			</div>
    </div>
	</section>
  <!-- ================ end banner area ================= -->
  

  <!-- ================ start banner form ================= -->	
  
	<!-- ================ end banner form ================= -->	


  <!-- ================ Explore section start ================= -->
  <section class="section-margin section-margin--small">
    <div class="container">
      <div class="section-intro text-center pb-80px">
        <div class="section-intro__style">
          <img src="img/home/1.jpg" alt="">
        </div>
        <h2>Explore Our Rooms</h2>
      </div>

      <div class="row pb-4">
        <div class="col-md-6 col-xl-4 mb-5">
          <div class="card card-explore">
            <div class="card-explore__img">
              <img class="card-img" src="img/home/explore1.png" alt="">
            </div>
            <div class="card-body">
              <h3 class="card-explore__price">$150.00 <sub>/ Per Night</sub></h3>
              <h4 class="card-explore__title"><a href="#">Classic Bed Room</a></h4>
              <p>Beginning fourth dominion creeping god was. Beginning, which fly yieldi dry beast moved blessed </p>
              <a class="card-explore__link" href="#">Book Now <i class="ti-arrow-right"></i></a>
            </div>
          </div>
        </div>

        
    </div>
  </section>
	<!-- ================ Explore section end ================= -->	





  <!-- ================ start footer Area ================= -->
  <footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<h4>Top Products</h4>
					<ul>
						<li><a href="#">Managed Website</a></li>
						<li><a href="#">Manage Reputation</a></li>
						<li><a href="#">Power Tools</a></li>
						<li><a href="#">Marketing Service</a></li>
					</ul>
				</div>
		
				
				<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<h4>Resources</h4>
					<ul>
						<li><a href="#">Guides</a></li>
						<li><a href="#">Research</a></li>
						<li><a href="#">Experts</a></li>
						<li><a href="#">Agencies</a></li>
					</ul>
				</div>
				<div class="col-xl-4 col-md-8 mb-4 mb-xl-0 single-footer-widget">
					<h4>Newsletter</h4>
					<p>You can trust us. we only send promo offers,</p>
					<div class="form-wrap" id="mc_embed_signup">
						<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
						 method="get" class="form-inline">
							<input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
							 required="" type="email">
							<button class="click-btn btn btn-default text-uppercase">subscribe</button>
							<div style="position: absolute; left: -5000px;">
								<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
							</div>

							<div class="info"></div>
						</form>
					</div>
				</div>
			</div>
			<div class="footer-bottom row align-items-center text-center text-lg-left">

				<div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-dribbble"></i></a>
					<a href="#"><i class="fab fa-behance"></i></a>
				</div>
			</div>
		</div>
	</footer>
  <!-- ================ End footer Area ================= -->



  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/magnefic-popup/jquery.magnific-popup.min.js"></script>
	<script src="vendors/easing.min.js"></script>
  <script src="vendors/superfish.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>