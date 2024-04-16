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
                            <li><a href="\login"><i class="fa fa-user s_color"></i> Admin Login</a></li>
                            <li class="nav-item active"><a class="nav-link" href="{{ url_for('main') }}">Home</a></li>
                            <!-- <li><a href="#"><i class="fas fa-location-arrow"></i> Our location</a></li>
                            <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li>  -->
                        
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="login-box">
						<select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
							<!-- <option>Register Here</option> -->
							<option>Login</option>
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

                <!-- Begin Page Content -->
<div class="container-fluid">
<div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Data Hasil Pengujian</h6>
 </div> 
<div class="card-body">
  <!-- <a class="collapse-item" href="{{ url_for('modelV2') }}">Test Learned Model with data 70:30</a> -->
  <!-- <ul class="breadcrumb" width="100%">
        <li class="breadcrumb-item"><a href="{{ url_for('modelV2') }}">Test Learned Model with data 70:30</a></li>
        <li class="breadcrumb-item"><a href="{{ url_for('modelV3') }}">Uji data dengan data terpisah</a></li>
        <li class="breadcrumb-item"><a href="/splitdata">Split Dataset</a></li>
  </ul> -->

  <form action="{{ url_for('modelV3') }}" method="POST">
    <div class="form-group">
        <h6>Untuk melakukan pengujian pada model dengan n-gram, masukkan jumlah n-gram dibawah ini </h6>
        <p> Jumlah n-gram (kernel) : </p>
        <input type="text" class="form-control" name="kernel" width="30%">
        <br><button class="btn btn-primary" type="submit">Proses</button>
    </div>
 </form> 

  <!-- <button type="submit" class="btn btn-info btn-lg" href="{{ url_for('modelV2') }}" >Test Learned Model with data 70:30</button><br> -->
  <table class="table css-serial">
    <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>Jumlah Data</th>
        <th>Data Latih</th>
        <th>Data Uji</th>
        <th>Size Embedding</th>
        <th>Filter</th>
        <th>Kernel</th>
        <th>Akurasi</th>
        <th width="10%" colspan="1">Aksi</th>
      </tr>
    </thead>
    <tbody>
    {% for row in data %}  
    <tr>
        <td> </td>
        <td>{{ row[1] }}</td>
        <td>{{ row[2] }}</td>
        <td>{{ row[3] }}</td>
        <td>{{ row[4] }}</td>
        <td>{{ row[5] }}</td>
        <td>{{ row[6] }}</td>
        <td>{{ row[7] }}</td>
        <td>{{ row[8] }}</td>
        <td><a href="/hapus_pengujian/{{ row.0 }}" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a></td> 
        </tr>

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
</div>

</div>


</body>
</html>
