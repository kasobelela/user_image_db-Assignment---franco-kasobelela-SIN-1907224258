<?php
    require_once("./connect/connect.php");
    $sql = "SELECT * FROM `user`;";
    $pictures = [];
    $results = $mysqli->query($sql);
    if($results->num_rows > 0){
        while($row = $results->fetch_assoc()){
            array_push($pictures,$row);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css" />
    <link rel="stylesheet" href="./styles/fontawesome/css/all.css" />
    <link rel="stylesheet" href="./styles/bootstrap/css/bootstrap.css" />
    <title>My Gallery</title>
    <style>
        #bd-bg {
            background-image:url("./images/1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body id="bd-bg">
    <main>
        <div class="wrapper">
            <div class="wrapper-form">
                <div class="form-wrapper">
                    <h4><b>Franco's Gallery </b></h4>
                    <div class="errors-display">
                        <?php
                           if(isset($_GET["err_name"])){
                                echo '<div class="alert-error error-failed">Please Enter Your Name</div>';
                           }
                           if(isset($_GET["err_email"])){
                                echo '<div class="alert-error error-failed">Please Enter Your Email Address</div>';
                           }
                           if(isset($_GET["err_upload"])){
                                echo '<div class="alert-error error-failed">Please, Attach an Image To Upload</div>';
                           }
                           if(isset($_GET["failed"])){
                               echo '<div class="alert-error error-failed">Upload process failed, try again</div>';
                           }
                           if(isset($_GET["success"])){
                              echo '<div class="alert-error error-success">Cool! Picture saved to Frank\'s Gallery</div>';
                           }
                        ?>
                    </div>
                    <form action="./mw/h_upload.php" method="POST" enctype="multipart/form-data">
                        <div class="cluster">
                            <div class="input-straight">
                                <input type="text" 
                                        name="name" 
                                        id="name" 
                                        placeholder="Enter Your Name" 
                                        class="form-control" />
                            </div>
                        </div>
                        <div class="cluster">
                            <div class="input-straight">
                                <input type="text" 
                                        name="email" 
                                        id="email" 
                                        placeholder="Enter Email Address" 
                                        class="form-control" />
                            </div>
                        </div>
                        <div class="cluster cluster-mr-top">
                            <div class="input-straight">
                                <label for="file" style="color:white;"><i class="fa fa-image"></i> Choose Picture</label>
                                <input type="file" name="file" id="file" accept=".jpg, .jpeg, .png" />
                            </div>
                        </div>
                        <div class="cluster cluster-mr-top">
                            <div class="input-straight">
                                <button type="submit" class="btn btn-danger">SAVE IN FRANCO's GALLERY</button>
                            </div>
                        </div>
                        <div class="cluster cluster-mr-top">
                            <div class="input-straight">
                                <a href="./table.php" class="btn btn-success btn-sm btn-block" style="width: 100%;">See Frank's Pictures</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>


