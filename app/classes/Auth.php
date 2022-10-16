<?php
namespace App\Classes;

class Auth extends Config{
/**
 * Undocumented function
 *
 * @param [type] $name
 * @param [type] $email
 * @param [type] $password
 * @return void
 */
    public function register($name, $email, $password)
    {
    // $result =  $this->conn->query("INSERT INTO `users`(`name`,`email`, `password`) VALUES ('$name','$email','$password') ");

    $result = $this->conn->query("INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name','$email','$password')");
    
    return $result ? true : false;
}

/**
 * Undocumented function
 *
 * @param [type] $email
 * @return void
 */
public function user_exist($email)
{
   $result = $this->conn->query("SELECT `email` FROM `users` WHERE `email` = '$email' ");
   return $result->num_rows ;
}

/**
 * Undocumented function
 *
 * @param [type] $email
 * @return void
 */
public function login($email)
{
    return $this->conn->query("SELECT `id`, `name`, `email`, `password`, `status` FROM `users` WHERE `email` = '$email' ");
}


/**
 * Undocumented function
 *
 * @param [type] $email
 * @return void
 */ 
public function getUser($email)
{
    return $this->conn->query("SELECT * FROM `users` WHERE `email` = '$email' ");
}

/**
 * Undocumented function
 *
 * @param [type] $email
 * @return void
 */ 
public function tokenUpdate($token,$email)
{
    return $this->conn->query("UPDATE `users` SET `token`='$token' WHERE `email`='$email'");
}


/**
 * Undocumented function
 *
 * @param [type] $email
 * @return void
 */ 

 public function check_token($email, $token){
    return $this->conn->query("SELECT * FROM `users` WHERE `email` = '$email' AND `token`='$token' ");
 }

 /**
 * Undocumented function
 *
 * @param [type] $email
 * @return void
 */ 
public function reset_password($email, $password){
    return $this->conn->query("UPDATE `users` SET `password`='$password' WHERE `email`='$email' ");
}


public function isLogin()
{
  
    return isset($_SESSION['user_email']) ? true : false;

}



}