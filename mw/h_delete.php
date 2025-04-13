<?php
require_once("../connect/connect.php");
$response = [
    "success" => [
        "status"=>0
    ]
];

$id = $_POST["id"];
$sql = "SELECT * FROM `user` WHERE `user`.`id` = $id;";
$pictures = [];
$results = $mysqli->query($sql);
if($results->num_rows > 0){
    while($row = $results->fetch_assoc()){
        array_push($pictures,$row);
    }
}

if(is_array($pictures) && !empty($pictures)){
    foreach($pictures As $picture){
        if(file_exists("../uploads/".$picture["image_name"])){
            unlink("../uploads/".$picture["image_name"]);
        }
    }
}

$sql = "DELETE FROM `user` WHERE `user`.`id` = $id;";
if($mysqli->query($sql)){
    $response["success"]["status"] = 200;
} else $response["success"]["status"] = 404;

echo json_encode($response["success"]);
?>