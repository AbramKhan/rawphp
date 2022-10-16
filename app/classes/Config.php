<?php
namespace App\Classes;
use mysqli;

class Config {


    public $conn;
    public function __construct(){
        session_start();

        $this->conn = new mysqli( 'localhost', 'root', '', 'ssit5-project' );
        if($this->conn->connect_error){
            die($this->conn->connect_error);
    }
 }

 public function showMessage($type, $message){
    $outPut  =  '';
    $outPut .=  '<div class="alert alert-'. $type . ' alert-dismissible fade show" role="alert">';
    $outPut .=   $message;
    $outPut .=  ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    $outPut .=  '<span aria-hidden="true">&times;</span>';
    $outPut .=  '</button>';
    $outPut .=  '</div>';
    return $outPut;
 }


}

