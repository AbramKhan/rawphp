<?php


  require_once'../vendor/autoload.php';
  use App\Classes\Auth;
  $auth = new Auth();

  $auth->isLogin() ? header("location: index.php") : false ; 
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/css/admin/login.css">

</head>
<body>
 <div class="container">
  <!-- Admin login form start -->
    <div class="row justify-content-center h-100vh" id="login-form-box" >
        <div class="col-lg-10 my-auto" >
           <div class="card-group">
            <div class="card p-4">
                <h2 class="text-center text-primary font-wei ght-bold">Login to your account</h2>
                <hr class="my-3">
                <div id="loginError"></div>
                <form action="#" method="post" class="px-3" id="login-form">
                  <div class="input-group input-group-lg form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-envelope"></i>
                          </span>
                        </div>
               <input type="email" class="form-control" name="email" id="email1" placeholder="Enter your email" required
               value="<?= isset($_COOKIE['user_email']) ? $_COOKIE['user_email']: '' ?> ">
              
                  </div>
                  <div class="input-group input-group-lg form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-key"></i>
                          </span>
                        </div>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required   value="<?= isset($_COOKIE['user_pass']) ? $_COOKIE['user_pass']: '' ?> ">
                  </div>

                  <div class="form-group">
                    <div class="float-left custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="rememberMe" name="rememberMe"  <?= isset($_COOKIE['user_email']) ? 'checked' : '' ?>  >
                      <label for="rememberMe" class="custom-control-label">Remember Me</label>
                    </div>
                    <div class="float-right">
                        <a href="javascript:" id="showForgetForm" class="text-decoration-none">Forget Password?</a>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="form-group">
                    <input type="submit" value="Sign in" id="loginBtn" class="btn btn-block btn-primary">
                  </div>
                </form>
            </div>
            <div class="card p-4 justify-content-center" style="background:#363c43;">
                <h2 class="text-center text-white font-wei ght-bold">Welcome Back</h2>
                <hr class="my-3 bg-light"> 
                <p class="text-center text-light lead">please login using your email and password.
                  if you haven't registered yet, you can reg ister
                  for free.
                </p>
                <button class="btn btn-outline-light btn-lg align-self-center mt-4" id="showSignUpForm">Sign up</button>
            </div>
           </div>
        </div>
    </div>
    <!-- Admin login form end -->

      <!--Admin Register form start --> 
      <div class="row justify-content-center h-100vh" id="register-form-box" style="display:none;"> 
        <div class="col-lg-10 my-auto" >
           <div class="card-group">
            <div class="card p-4">
                <h2 class="text-center text-primary font-wei ght-bold">Create New Account</h2>
                <hr class="my-3">
                <!-- error managing -->
                <div id="registerError"></div>
                <form action="#" method="post" class="px-3" id="register-form">
                  <div class="input-group input-group-lg form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-user"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control " name="name" id="name" placeholder="Enter your name" >
                        <div class="invalid-feedback">This name filed is required!</div>
                  </div>
                  <div class="input-group input-group-lg form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-envelope"></i>
                          </span>
                        </div>
                        
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email"  minlength="8">
                        <div class="invalid-feedback">This name filed is required!</div>
                  </div>
                  <div class="input-group input-group-lg form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-key"></i>
                          </span>
                        </div>
                        <input type="password" class="form-control" name="r_password" id="r_password" placeholder="Enter your password"  >
                        <div class="invalid-feedback">This name filed is required!</div>
                  </div>

                  <div class="input-group input-group-lg form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-key"></i>
                          </span>
                        </div>
                        <input type="password" class="form-control" name="c_password" id="c_password" placeholder="confirm your password" >
                        <div class="invalid-feedback">This confirm password filed is required!</div>
                        <div class="passerror"></div>
                  </div>


                  <div class="form-group">
                    <input type="submit" value="Register" id="registerUser"  class="btn btn-block btn-primary">
                  </div>
                </form>
            </div>
            <div class="card p-4 justify-content-center" style="background:#363c43;">
                <h2 class="text-center text-white font-wei ght-bold">Welcome Back!</h2>
                <hr class="my-3 bg-light"> 
                <p class="text-center text-light lead">enter your email and check your inbox for 
                  instruction. please also check your spam folder
                </p>
                <button class="btn btn-outline-light btn-lg align-self-center mt-4" id="showSignInForm">Sign In</button>
            </div>
           </div> 
        </div>
    </div>
   <!--admin register form end -->

   <!--Admin Forgotten Password start -->
    <div class="row justify-content-center h-100vh" id="forgotten-form-box" style="display:none">
        <div class="col-lg-10 my-auto" >
           <div class="card-group">
            <div class="card p-4">
                <h2 class="text-center text-primary font-wei ght-bold">Foegotten Password?</h2>
                <hr class="my-3">
                <div id="restPasswordError"></div>
                <form action="#" method="post" class="px-3" id="forgotten-form">
                  <div class="input-group input-group-lg form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-envelope"></i>
                          </span>
                        </div>
                        <input type="email" class="form-control" name="email" id="email2" placeholder="Enter your email">
                        <div class="invalid-feedback">this email field is required</div>
                  </div>
                
                  <div class="form-group">
                    <input type="submit" id="resetPassword" value="Reset Password" class="btn btn-block btn-primary">
                  </div>
                </form>
            </div>
            <div class="card p-4 justify-content-center" style="background:#363c43;">
                <h2 class="text-center text-white font-wei ght-bold">Welcome Back!</h2>
                <hr class="my-3 bg-light"> 
                <p class="text-center text-light lead">enter your email and check your inbox for 
                  instruction. please also check your spam folder
                </p>
                <button class="btn btn-outline-light btn-lg align-self-center mt-4" id="back">Back</button>
            </div>
           </div> 
        </div>
    </div>
   <!--Admin Forgotten Password end -->
  
  </div>

<script src="../assets/js/jquery-3.6.0.min.js" ></script>
<script src="../assets/js/popper.min.js" ></script>
<script src="../assets/js/bootstrap.bundle.min.js" ></script>
<script src="../assets/js/admin/login.js"></script>

</body>
</html> 

<!-- -->