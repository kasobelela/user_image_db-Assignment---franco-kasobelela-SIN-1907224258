<?php
require_once("../connect/connect.php");
$name = 0;
$email = 0;
$event = 0;

//Checking if form inputs are not empty
if (isset($_POST["name"]) && !empty($_POST["name"])){
    $name = $_POST["name"];
} else header("location:../index.php?err_name");

if (isset($_POST["email"]) && !empty($_POST["email"])){
    $email = $_POST["email"];
} else header("location:../index.php?err_email");

//check if file is selected
if(is_array($_FILES["file"]) && !empty($_FILES["file"]) && sizeof($_FILES["file"])>0){
    $path = "../uploads/";
    $img_name = $_FILES["file"]["name"];
    $img_tmp_name = $_FILES["file"]["tmp_name"];
    $img_size = $_FILES["file"]["size"];
    $destination = $path.$img_name;
    if(move_uploaded_file($img_tmp_name,$destination)){
        $sql = "INSERT INTO `user`(`name`, `email`, `image_name`, 
            `image_size`, `image_path`) VALUES ('$name','$email','$img_name','$img_size','$path');";
            if($mysqli->query($sql)){
                header("location:../index.php?success");
            }else header("location:../index.php?failed");
    } else header("location:../index.php?err_upload");
} else header("location:../index.php?err_file");
?>