<?php


require_once'../vendor/autoload.php';

use App\Classes\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$auth = new Auth();
$mail = new PHPMailer(true);


 if(isset($_POST['action']) && $_POST['action'] === 'register' ){ 
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['r_password'], PASSWORD_DEFAULT);
     
    
    if($auth->user_exist($email) == 1 ){
      echo $auth->showMessage('warning', 'This ' .$email. ' exist in our system');
    }else{
        
      if($auth->register($name, $email, $password )){
        
      $_SESSION['user_email'] = $email;
      // echo"1";
     echo json_encode(['status'=> 'done']);
      }else{
        echo $auth->showMessage('warning', 'something wrong');
      }

    }

    // print_r( $auth->user_exist($email));
   //  var_dump($auth->register($name, $email, $password ));
 }


 if(isset($_POST['action']) && $_POST['action'] === 'login' ){ 

  $email             = $_POST['email'];
  $password          = $_POST['password'];
  $rememberMe        = isset($_POST['rememberMe']) ? 1 : 0;

  $result = $auth->login($email); 

  if( $result->num_rows == 1){
    $row =  $result->fetch_assoc();
    if( password_verify($password, $row['password'])){
      if($row['status'] === '1'){

        echo json_encode(['status'=> 'done']);
        // echo "1";

        if( $rememberMe ){
          setcookie('user_email', $email, time()+(7*24*60*60));
          setcookie('user_pass', $password, time()+(7*24*60*60));
        }else{
          setcookie('user_email', '' , -time()+(7*24*60*60));
          setcookie('user_pass',  '' , -time()+(7*24*60*60));
        }
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name']  = $row['name'];
        $_SESSION['user_id']    = $row['id'];
      }else{
        echo $auth->showMessage('warning', 'your account is inactive ');
      }
    } else{
    echo $auth->showMessage('warning', 'this credential do not match our records ');
  }
  }

  else{
    echo $auth->showMessage('warning', 'this credential do not match our records ');
  }
 
 }
 

 if(isset($_POST['action']) && $_POST['action'] === 'reset-password' ){
  $email  = $_POST['email'];
  $result = $auth->getUser($email);
 if(  $result->num_rows === 1 ){
  $token = rand(22222,99999);
  if($auth->tokenUpdate($token, $email)){
    try {
      //Server settings                                            //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'ed3d3d4f3aebe0';                     //SMTP username
      $mail->Password   = 'f6078f111f4d28';                              //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
      $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('abramkhan029@gmail.com', 'Abrams Apps');
      $mail->addAddress($email);     //Add a recipient

    
      //Content
      $mail->isHTML(true);                                  
      $mail->Subject = 'Rest Password';
      $mail->Body    = '`<div style="margin:auto; width: 50%; background:#dddddd; border:1px solid #dddddd; padding:10px; 
                          border-radius:5px; text-align:center">
                              Reset Your Password ?
                              <a href="http://localhost/ssit5-project/admin/reset-password.php?email=' . $email . '&token=' .$token. ' ">click here</a>
                         </div>`';
  
      $mail->send();
      echo $auth->showMessage('success', 'Message has been sent');
  } catch (Exception $e) {
    echo $auth->showMessage('danger', 'Message could not be sent' .$mail->ErrorInfo );
     
  }
    // var_dump( $auth->tokenUpdate( $token, $email));
  } else{
    echo $auth->showMessage('danger', 'something went wrong');
  }


 }  else{
    echo $auth->showMessage('danger', 'this email not found');
  }

 }


 if(isset($_POST['action']) && $_POST['action'] === 'reset'){
      $email            = $_POST['email'];
      $password         = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];
      if($email !== null || $password !== null || $confirm_password !== null ){

        $password = password_hash($password, PASSWORD_DEFAULT);
        echo $auth->reset_password($email, $password) ?  $auth->showMessage('success', 'password reset success. please login <a href="login.php">login</a>') : $auth->showMessage('danger', 'somthing wrong');
      }else{
        $auth->showMessage('danger', 'somthing wrong');
      }
  
 }