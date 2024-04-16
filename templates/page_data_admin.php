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

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<!-- <div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
							<option>¥ JPY</option>
							<option>$ USD</option>
							<option>€ EUR</option>
						</select>
                    </div> 
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +628XXXXXX</a></p>
                    </div> -->
                    <div class="our-link">
                        <ul>
                            <li class="nav-item active"><a class="nav-link" href="\index2">Home</a></li>
                            <li class="nav-item active"><a class="nav-link" href="{{ url_for('logout') }}">Logout</a></li>

                        
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="login-box">
						<select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
							<!-- <option>Register Here</option> -->
							<option>Admin</option>
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
                        <li class="nav-item active"><a class="nav-link" href="\index2">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="\about">Detail System</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Data</a>
                            <ul class="dropdown-menu">
                                <li><a href="\page_data_admin">Data Admin</a></li>
                                <li><a href="page_data_cek.php">Data Cek Opini</a></li>
                                <li><a href="page_data_uji.php">Data Pengujian</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Master Dataset</a>
                            <ul class="dropdown-menu">
								<li><a href="\input2">Data Mentah</a></li>
                                <li><a href="cart.php">Data Training</a></li>
                                <li><a href="cart.php">Data Testing</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Uji Kalimat Opini</a>
                            <ul class="dropdown-menu">
								<li><a href="\page_klasifikasi">Pengujian</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="about.html">Go to Website</a></li>
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
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="{{url_for('static', filename='images/1.jpg')}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="{{url_for('static', filename='images/2.jpg')}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="{{url_for('static', filename='images/3.jpg')}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                    <div class="container">
                        {% with messages = get_flashed_messages() %}
                        {% if messages %}

                        {% for message in messages %}
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <span>{{ message }}</span>
                            </div>
                        {% endfor %}
                        {% endif %}

                        {% endwith %}
                    </div>
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah Data</button><br>
                            <!--  -->
                            <br><br>
                            <table class="table css-serial">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Password</th>
                                        <th width="10%" colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {% for row in data %}
                                    <tr>
                                        <td> </td>
                                        <td>{{ row[1] }}</td>
                                        <td>{{ row[2] }}</td>
                                        <td><a href="#edit" class="btn btn-outline-warning" data-toggle="modal" data-target="#modalEdit{{ row[0] }}">Edit</a></td>
                                        <td><a href="/hapus_admin/{{ row.0 }}" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a></td>
                                    </tr>

                                    <!-- Modal Button Edit -->
                                    <div id="modalEdit{{ row[0] }}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url_for('updateAdmin') }}" method="POST">
                                                        <div class="form-group">
                                                            <label for="username">
                                                                <i class="fas fa-user"></i> Username
                                                            </label>
                                                            <input type="hidden" name="id_admin" value="{{ row.0 }}">
                                                            <input type="text" class="form-control" name="username" value="{{ row[1]}}">
                                                            <br><label for="password">
                                                                <i class="fas fa-lock"></i> Password
                                                            </label>
                                                            <input type="password" class="form-control" name="password" value="{{ row[2]}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <button class="btn btn-primary" type="submit">Update</button>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {% else %}
                                    <tr>
                                        <td colspan="3">Unbelievable. No entries here so far</td>
                                    </tr>
                                    {% endfor %}
                                </tbody>
                            </table>
                            <!-- </div> -->
                        </div>
                    </div>
                    <!-- The ADD Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Data Admin</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="{{ url_for('insertAdmin') }}" method="POST">
                                        <div class="form-group">
                                            <label for="username">
                                                <i class="fas fa-user"></i> Username
                                            </label>
                                            <input type="text" class="form-control" name="username" placeholder="Username" id="username">
                                            <br><label for="password">
                                                <i class="fas fa-lock"></i> Password
                                            </label>
                                            <input type="password" class="form-control" name="password" placeholder="Password" id="password">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-outline-primary" type="submit">Simpan</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->
            </div>
        </div>
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
</body>

</html>