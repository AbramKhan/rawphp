<?php 
 header('Content-type:application/json;charset=utf-8');

require_once '../../vendor/autoload.php';
use App\classes\Slider;
$slider = new Slider();
$data = ['error' => false];


if(isset($_POST['action']) && $_POST['action'] === 'save-slider') {

$title      = $_POST['title'];
$sub_title  = $_POST['sub_title'];
$start_date = $_POST['start_date'];
$end_date   = $_POST['end_date'];
$url_1      = $_POST['url_1'];
$status     = $_POST['status'];

$image      = $_FILES['image']['name'];
$image      =  explode('.', $image);
$imageEx    = end($image);
$image      = uniqid() . rand(2222222, 999999) . '.' . $imageEx;
print_r( $_FILES['image']);

if( $slider->save_slider($title, $sub_title, $start_date, $end_date, $url_1, $status, $image)){

    var_dump($title, $sub_title, $start_date, $end_date, $url_1, $status, $imag);
   
    move_uploaded_file($_FILES['image']['tmp_name'], '../../uploads/sliders/' . $image);
    $data['massage'] = 'slider save success.';

}else{
    $data['error'] = true;

    $data['massage'] = 'slider not save.';

}
// echo json_encode(['status'=> 'done']);
echo json_encode($data);

}