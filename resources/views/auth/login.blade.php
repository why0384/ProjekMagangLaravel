<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> {{ $title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (CDN) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- SB Admin 2 CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/gh/StartBootstrap/startbootstrap-sb-admin-2@master/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-6 order-1 order-lg-1 hero-img d-flex align-items-center justify-content-center"
                                data-aos="zoom-out" data-aos-delay="100">
                                <img src="{{ asset('sbadmin2/img/login.png') }}"
                                class="img-fluid animated" alt="">
                            </div>

                            <div class="col-lg-6 order-2 order-lg-2">
                                <div class="p-5">
                                    <div class="text-center">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4 font-weight-bold d-flex justify-content-center align-items-center">
                                                <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                <span>Log In</span>
                                            </h1>
                                        </div>

                                    </div>
                                    <form class="user" method="POST" action="{{ route('loginProses') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                                placeholder="Masukkan Email" 
                                                name="email" value="{{ old('email') }}">
                                                @error('email')
                                                    <small class="text-danger mt-2">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                        </div>
                                        <div class="form-group method="POST" action="{{ route('loginProses') }}">
                                            @csrf
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                                placeholder="Masukkan Password" 
                                                name="password">
                                                @error('password')
                                                    <small class="text-danger mt-2">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                        </div>
                                        
                                        <button type= "submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    
                                    <div class="text-center">
                                        <div class="small">
                                            Belum Punya Akun? <a href="#">Hubungi Admin</a>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.easing@1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/StartBootstrap/startbootstrap-sb-admin-2@master/js/sb-admin-2.min.js"></script>

</body>

</html>