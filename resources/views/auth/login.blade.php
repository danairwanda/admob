<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Admob</title>
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    {{-- NProgress --}}
    <link rel="stylesheet" href="{{ asset('nprogress/nprogress.css') }}">
    {{-- Animate.css --}}
    <link rel="stylesheet" href="{{ asset('build/css/custom.min.css') }}">
</head>
<body class="login">
    <div>
        <a class="hiddenancor" id="signup"></a>
        <a class="hiddenancor" id="signin"></a>
        <div class="login_wrapper">
            <div class="animate form login_form">
            <h1 class="text-center"><i class="fa fa-paw"></i> Adsense Mobile</h1>
                <section class="login_content">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <h1>Login Form</h1>
                        {{-- input email --}}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" name="email" placeholder="Email...">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{-- input password --}}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password...">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{-- submit --}}
                        <div>
                            <button type="submit" class="btn btn-default pull-left">
                                <i class="fa fa-btn fa-sign-in"></i> Login
                            </button>
                            <a class="reset_pass pull-right" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </div>

                        <div class="clearfix"></div>
                        
                        <div class="separator">
                            <p class="change_link">New to site?
                                <a href="#signup" class="to_rogister"> Create Account </a>
                            </p>
                            <div class="clearfix"></div>
                            <br>
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>