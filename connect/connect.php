<?php
 $mysqli = new mysqli("localhost","root","","user_image_db");
 if(!$mysqli) {
    echo "DB Connection Failed";
 }
?>