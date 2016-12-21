<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Admob</title>
    <?php /* Bootstrap */ ?>
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/dist/css/bootstrap.min.css')); ?>">
    <?php /* Font Awesome */ ?>
    <link rel="stylesheet" href="<?php echo e(asset('font-awesome/css/font-awesome.min.css')); ?>">
    <?php /* NProgress */ ?>
    <link rel="stylesheet" href="<?php echo e(asset('nprogress/nprogress.css')); ?>">
    <?php /* Animate.css */ ?>
    <link rel="stylesheet" href="<?php echo e(asset('build/css/custom.min.css')); ?>">
</head>
<body class="login">
    <div>
        <a class="hiddenancor" id="signup"></a>
        <a class="hiddenancor" id="signin"></a>
        <div class="login_wrapper">
            <div class="animate form login_form">
            <h1 class="text-center"><i class="fa fa-paw"></i> Adsense Mobile</h1>
                <section class="login_content">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <h1>Login Form</h1>
                        <?php /* input email */ ?>
                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <input id="email" type="email" class="form-control" name="email" placeholder="Email...">
                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <?php /* input password */ ?>
                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password...">
                            <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <?php /* submit */ ?>
                        <div>
                            <button type="submit" class="btn btn-default pull-left">
                                <i class="fa fa-btn fa-sign-in"></i> Login
                            </button>
                            <a class="reset_pass pull-right" href="<?php echo e(url('/password/reset')); ?>">Forgot Your Password?</a>
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