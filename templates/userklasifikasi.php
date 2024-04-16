<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Sentyment Analysis</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{url_for('static', filename='images/iglogo.png')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{url_for('static', filename='images/iglogo.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url_for('static', filename='css/bootstrap.min.css')}}" >
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{url_for('static', filename='css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{url_for('static', filename='css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{url_for('static', filename='css/custom.css')}}">

    <!-- [if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif] -->

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="our-link">
                        <ul>
                            <!-- <li><a href="#login"><i class="fa fa-user s_color"></i> Admin Login</a></li> -->
                            <div class="text-center">
                                <!-- <li><a href="#login" class="trigger-btn" data-toggle="modal">Log In</a></li> -->
                                <!-- <a href="#login" class="trigger-btn" data-toggle="modal">Click To Log In</a> -->
                            </div>
                            
                            <div id="login" class="modal fade">
                                <div class="modal-dialog modal-login">
                                    <div class="modal-content"> </div>
                                        <div class="modal-header">
                                            <div class="avatar">
                                                <img src="{{url_for('static', filename='images/admin-2.png')}}" alt="Avatar">
                                            </div>				
                                            <div class="login">
                                                <h1>Login</h1>
                                        
                                                <div class="links">
                                                    <a href="{{ url_for('login') }}" class="active">Login</a>
                                                
                                                </div>
                                                <form action="{{ url_for('login') }}" method="post">
                                                    <label for="username">
                                                        <i class="fas fa-user"></i>
                                                    </label>
                                                    <input type="text" name="username" placeholder="Username" id="username" required>
                                                    <label for="password">
                                                        <i class="fas fa-lock"></i>
                                                    </label>
                                                    <input type="password" name="password" placeholder="Password" id="password" required>
                                                    <input type="submit" value="Login">
                                                </form>
                                            </div>
                                            </form>
                                        </div>

                                        

                                    </div>
                                <!-- </div> -->
                            </div>
                            <li class="nav-item active"><a class="nav-link" href="{{ url_for('user') }}">Home</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="login-box">
						<select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
							<!-- <option>Register Here</option> -->
							<option><li><a href="{{ url_for('login') }}"></li>Login</option>
						</select>
					</div>
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Sentyment Analysis
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Opini Reviewer
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <!-- <a class="navbar-brand" href="index.html"><img src="images/iglogo.png" class="logo" alt=""></a> -->
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="{{ url_for('user') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url_for('userabout') }}">Detail System</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Data</a>
                            <ul class="dropdown-menu">
                                <!-- <li><a href="\admin">Data Admin</a></li> -->
                                <!-- <li><a href="{{ url_for('admin') }}">Data Admin</a></li> -->
                                <li><a href="{{ url_for('userCek') }}">Data Cek Opini</a></li>
                                <!-- <li><a href="{{ url_for('user') }}">Data Pengujian</a></li> -->
                            </ul>
                        </li>
                        <!-- <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Master Dataset</a>
                            <ul class="dropdown-menu">
								<li><a href="\input2">Data Mentah</a></li>
                                <li><a href="{{ url_for('dataLatih') }}">Data Training</a></li>
                                <li><a href="{{ url_for('dataUji') }}">Data Testing</a></li>
                            </ul> -->
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Pengujian</a>
                            <ul class="dropdown-menu">
								<li><a href="\userklasifikasi">Pengujian Kalimat</a></li>
                                <!-- <li><a href="{{ url_for('dataPengujian') }}">Pengujian Sistem</a></li> -->
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="\usergallery">Go to Website</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li> -->
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <!-- <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
							<a href="#">
								<i class="fa fa-shopping-bag"></i>
								<span class="badge">3</span> -->
								<!-- <p>My Cart</p> -->
                                <!-- <li><a href="cart.html">Cart</a></li> -->
							</a>
						</li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Pengujian Kalimat</h2>
                    </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
    <div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
      </div>
    </div>
</div>
<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-navy card-outline">
            <div class="card-body">
<form method="GET" action={{url_for('userhasiluji')}}>
    <h1 class="card-title"><b>Input Data Uji</b></h1><br></br>
		<div class="subject">
            <textarea class="form-control" rows="3" name="sub" placeholder="Input your comments here ..."></textarea>
        </div><br>
		<input type="submit" name="sub" class="btn btn-primary py-1 px-2" value="Analisis">
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<aside class="control-sidebar control-sidebar-dark">
<div class="p-3">

</div>
</aside>

   

            

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{url_for('static', filename='images/8.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{url_for('static', filename='images/9.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{url_for('static', filename='images/10.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{url_for('static', filename='images/11.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{url_for('static', filename='images/12.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{url_for('static', filename='images/13.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{url_for('static', filename='images/14.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            <!-- </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->


     

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2022 <a href="#">SentimenAnalisis</a> Design By :
            <a href="https://html.design/">ikaahsni</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{url_for('static', filename='js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{url_for('static', filename='js/popper.min.js')}}"></script>
    <script src="{{url_for('static', filename='js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{url_for('static', filename='js/jquery.superslides.min.js')}}"></script>
    <script src="{{url_for('static', filename='js/bootstrap-select.js')}}"></script>
    <script src="{{url_for('static', filename='js/inewsticker.js')}}"></script>
    <script src="{{url_for('static', filename='js/bootsnav.js.')}}"></script>
    <script src="{{url_for('static', filename='js/images-loded.min.js')}}"></script>
    <script src="{{url_for('static', filename='js/isotope.min.js')}}"></script>
    <script src="{{url_for('static', filename='js/owl.carousel.min.js')}}"></script>
    <script src="{{url_for('static', filename='js/baguetteBox.min.js')}}"></script>
    <script src="{{url_for('static', filename='js/form-validator.min.js')}}"></script>
    <script src="{{url_for('static', filename='js/contact-form-script.js')}}"></script>
    <script src="{{url_for('static', filename='js/custom.js')}}"></script>
</body>

</html>