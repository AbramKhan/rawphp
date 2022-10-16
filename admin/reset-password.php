<?php


  require_once'../vendor/autoload.php';
  use App\Classes\Auth;
  $auth = new Auth();

  $auth->isLogin() ? header("location: index.php") : false ; 
 
  if(isset($_GET['email']) && isset($_GET['token'])){
    $email =$_GET['email'];
    $token =$_GET['token'];
    $result = $auth->check_token($email, $token);
    if($result->num_rows !== 1){
      header("location: index.php");
    }
  }else{
    header("location: index.php");
  }
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
  <!-- new password set form start -->
    <div class="row justify-content-center h-100vh" id="forgot-password-form-box" >
        <div class="col-lg-10 my-auto" >
           <div class="card-group">
           <div class="card p-4 justify-content-center" style="background:#363c43;">
                <h2 class="text-center text-white font-wei ght-bold">Welcome Back</h2>
                <hr class="my-3 bg-light"> 
                <p class="text-center text-light lead">please login using your email and password.
                  if you haven't registered yet, you can reg ister
                  for free.
                </p>
            </div>
            <div class="card p-4" style="flex: grow 1.3;">
                <h2 class="text-center text-primary font-wei ght-bold">Rest Your Password</h2>
                <hr class="my-3">
                <div id="forgotError"></div>
                <form action="#" method="post" class="px-3" id="forgot-password-form">
                  <input type="hidden" value="<?= $email ?>" name="email">
                  <div class="input-group input-group-lg form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-key"></i>
                          </span>
                        </div>
                        <input type="password" class="form-control" name="password" id="password" placeholder="new password" >
                  </div>

                  <div class="input-group input-group-lg form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-key"></i>
                          </span>
                        </div>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="confirm password">
                  </div>

                  <div class="form-group">
                    <input type="submit" value="Reset password" id="forgotBtn" class="btn btn-block btn-primary">
                  </div>
                </form>
            </div>
           </div>
        </div>
    </div>
    <!--  new password set form end -->
  
  </div>

<script src="../assets/js/jquery-3.6.0.min.js" ></script>
<script src="../assets/js/popper.min.js" ></script>
<script src="../assets/js/bootstrap.bundle.min.js" ></script>
<script src="../assets/js/admin/login.js"></script>

</body>
</html> 

<!-- -->