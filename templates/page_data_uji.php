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
                            <li class="nav-item active"><a class="nav-link" href="{{ url_for('main') }}">Home</a></li>
                            <li class="nav-item active"><a class="nav-link" href="{{ url_for('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="login-box">
						<select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
							<!-- <option>Register Here</option> -->
							<option><li><a href="{{ url_for('login') }}"></li>Admin</option>
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
                        <li class="nav-item active"><a class="nav-link" href="{{ url_for('main') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="\about">Detail System</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Data</a>
                            <ul class="dropdown-menu">
                                <!-- <li><a href="\admin">Data Admin</a></li> -->
                                <li><a href="{{ url_for('admin') }}">Data Admin</a></li>
                                <li><a href="{{ url_for('dataCek') }}">Data Cek Opini</a></li>
                                <li><a href="{{ url_for('dataPengujian') }}">Data Pengujian</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Master Dataset</a>
                            <ul class="dropdown-menu">
								<li><a href="\input2">Data Mentah</a></li>
                                <li><a href="{{ url_for('dataLatih') }}">Data Training</a></li>
                                <li><a href="{{ url_for('dataUji') }}">Data Testing</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Pengujian</a>
                            <ul class="dropdown-menu">
								<li><a href="\page_klasifikasi">Pengujian Kalimat</a></li>
                                <li><a href="{{ url_for('dataPengujian') }}">Pengujian Sistem</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="\gallery">Go to Website</a></li>
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

                <!-- Content Row -->
                    </br>
                    <td>
                        <a href="{url_for('addUji') }}" class="btn btn-success" data-toggle="modal" data-target="#addModal">Tambah Data</a>
                    </td>
                    <div class="container"></div>
                    
                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Import file csv </h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="/import_data" enctype="multipart/form-data" method="POST">
                                            <input type="file" name="file">
                                            <input type="submit" class="btn btn-link" name="" value="Submit">
                                        </form>
                                    </div>
                                    <!-- Modal footer  -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </div>
                        </div>


                        <!-- The Modal -->
                        <div class="modal fade" id="addModal">
                            <div class="modal-dialog modal-lg modal-centered">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Data Uji</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="chart-area">
                                            <form action="/add_uji" method="POST">
                                                <p>Username : </p>
                                                <input name="username" class="form-control" placeholder="username">
                                                <p>Komentar : </p>
                                                <textarea name="comment" class="form-control" placeholder="Kalimat komentar ....." id="floatingTextarea2" style="height: 100px"></textarea><br>
                                                <p>Label : </p>
                                                <input name="Label" class="form-control" placeholder="Label ....">
                                                <p> Note : </p>
                                                <h6>Label = POSITIF </h6>
                                                <h6>Label = NETRAL </h6>
                                                <h6>Label = NEGATIF </h6>
                                                </p><br>
                                                <button type="submit" class="btn btn-primary">Submit</button><br>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Begin Page Content -->
                </br>
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
                            <h6 class="m-0 font-weight-bold text-primary">Data Test</h6>
                        </div>
                        <div class="card-body">
                        <!-- table css-serial -->
                            <div style="overflow-x: auto;">
                                <table class="table css-serial">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Username</th>
                                            <th>Komentar</th>
                                            <th>Label</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {% for row in data %}
                                        <tr>
                                        <td>{{ loop.index }}</td>
                                            <td>{{ row[1] }}</td>
                                            <td>{{ row[2] }}</td>
                                            <td>{{ row[3] }}</td>
                                        <td>
                                            <a href="#edit" class="btn btn-outline-warning" data-toggle="modal" data-target="#modalEdit{{ row[0] }}">Edit</a>
                                            <a href="/hapusuji/{{ row.0 }},{{ row.1 }}" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                                        </td>
                                        </tr>
                                        
                                        <!-- Modal Button Edit -->
                                        <div id="modalEdit{{ row[0] }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-lg modal-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Data</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="chart-area">
                                                            <form action="{{ url_for('editUji') }}" method="POST">
                                                                <input type="hidden" name="id_test" value="{{ row.0 }}">
                                                                <input type="hidden" name="id" value="{{ row.1 }}">
                                                                <p>Kalimat Komentar : </p>
                                                                <input name="comment" type="text" class="form-control form-control-lg" value="{{ row[2] }}" width="100%" height="200px"><br>
                                                                <p>Label : </p>
                                                                <input name="Label" class="form-control" placeholder="Label 1 or 0" value="{{ row[3] }}">
                                                                <p> Note : </p>
                                                                <h6>Label = POSITIF </h6>
                                                                <h6>Label = NETRAL </h6>
                                                                <h6>Label = NEGATIF </h6>
                                                                </p><br>
                                                                <div class="form-group">
                                                                    <button class="btn btn-primary" type="submit">Update</button> <br><br>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- </form> -->
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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add File</button><br>
</br>
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
    
    </div>
        </div>
</body>

</html>