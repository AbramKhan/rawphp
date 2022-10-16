<?php
namespace App\classes;

class Slider extends Config {



    public function save_slider($title, $sub_title, $start_date, $end_date, $url_1, $status, $image){
        $id =$_SESSION['user_id'];
        return $this->conn->query("INSERT INTO `sliders`(`title`, `sub_title`, `start_date`, `end_date`, `url_1`, `image`, `status`, `create_by`) VALUES ('$title', '$sub_title', '$start_date', '$end_date', ' $url_1', '$image', '$status','$id') ");
    }

} 