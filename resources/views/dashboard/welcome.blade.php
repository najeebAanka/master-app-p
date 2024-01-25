
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{url('public')}}/dist/assets/img/fav.ico" type="image/x-icon">
    <link rel="shortcut icon" href="{{url('public')}}/dist/assets/img/fav.ico" type="image/x-icon">
    <title>Masterpiece properties :: Dashboard Login</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{url('public/dashboard/assets')}}/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{url('public/dashboard/assets')}}/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{url('public/dashboard/assets')}}/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{url('public/dashboard/assets')}}/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{url('public/dashboard/assets')}}/css/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{url('public/dashboard/assets')}}/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{url('public/dashboard/assets')}}/css/style.css">
    <link id="color" rel="stylesheet" href="{{url('public/dashboard/assets')}}/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{url('public/dashboard/assets')}}/css/responsive.css">
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-7"><img class="bg-img-cover bg-center" src="{{url('public/dashboard/assets')}}/master.jpg" alt="looginpage"></div>
          <div class="col-xl-5 p-0">
            <div class="login-card">
                <form class="theme-form login-form" action="{{url('admin/login')}}" method="post">
                      {{ csrf_field() }}
                <h4>Login</h4>
                
                
                      @if ($message = Session::get('error'))
                                          <div class="alert alert-warning noborder text-center weight-400 nomargin noradius">
                                              <button type="button" class="close" data-dismiss="alert">×</button>
                                              <strong>{{ $message }}</strong>
                                          </div>
                                          @endif

                                          @if (count($errors) > 0)
                                          <div class="alert alert-danger noborder text-center weight-400 nomargin noradius">
                                              <ul>
                                                  @foreach($errors->all() as $error)
                                                  <li>{{ $error }}</li>
                                                  @endforeach
                                              </ul>
                                          </div>
                                          @endif
                
                <h6>Welcome back! Log in to your account.</h6>
                <div class="form-group">
                  <label>Email Address</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                      <input class="form-control" type="email" required="" placeholder="Test@gmail.com" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                    <input class="form-control" type="password" name="password" required="" placeholder="*********" >
                    <div class="show-hide"><span class="show">                         </span></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="checkbox">
                    <input id="checkbox1" type="checkbox">
                    <label class="text-muted" for="checkbox1">Remember password</label>
                  </div><a class="link" href="forget-password.html">Forgot password?</a>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                </div>
                <div class="login-social-title">                
                  <h5>Sign in with</h5>
                </div>
                <div class="form-group">
                  <ul class="login-social">
                    <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="linkedin"></i></a></li>
                    <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/login" target="_blank"><i data-feather="instagram">                  </i></a></li>
                  </ul>
                </div>
                <p>Don't have account?<a class="ms-2" href="sign-up.html">Create Account</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- page-wrapper end-->
    <!-- latest jquery-->
    <script src="{{url('public/dashboard/assets')}}/js/jquery-3.5.1.min.js"></script>
    <!-- feather icon js-->
    <script src="{{url('public/dashboard/assets')}}/js/icons/feather-icon/feather.min.js"></script>
    <script src="{{url('public/dashboard/assets')}}/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="{{url('public/dashboard/assets')}}/js/sidebar-menu.js"></script>
    <script src="{{url('public/dashboard/assets')}}/js/config.js"></script>
    <!-- Bootstrap js-->
    <script src="{{url('public/dashboard/assets')}}/js/bootstrap/popper.min.js"></script>
    <script src="{{url('public/dashboard/assets')}}/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{url('public/dashboard/assets')}}/js/script.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>