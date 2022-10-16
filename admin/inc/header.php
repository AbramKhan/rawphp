<?php
  require_once'../vendor/autoload.php';
  use App\Classes\Auth;
  $auth = new Auth();

  $auth->isLogin() ? false  : header("location: login.php") ; 
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')) ?> | Web Builder</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/css/datepicker.css">
    <link rel="stylesheet" href="../assets/css/admin/style.css">
    
</head>
<body>

<!-- <h1>Admin</h1>  
<a href="logout.php">logout</a> -->


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php">Web Builder</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item <?= (basename($_SERVER['PHP_SELF'])) === 'dashboard.php' ? 'active' : '' ?>"><a class="nav-link" href="dashboard.php"><i class="fa fa-home"></i>Dashboard</a>  </li>
        <li class="nav-item <?= (basename($_SERVER['PHP_SELF'])) === 'sliders.php' ? 'active' : '' ?>"><a class="nav-link" href="sliders.php"><i class="fa fa-sliders-h"></i> Sliders</a>  </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= strtr($_SESSION['user_name'] , ' ', true) ?></a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
        
          </div>
        </li>

   
      
      </ul>

    </div>
  </div>
</nav>