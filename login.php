<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login page of the LoveNotes site.">
    <meta http-equiv='cache-control' content='no-cache'> 
    <meta http-equiv='expires' content='0'> 
    <meta http-equiv='pragma' content='no-cache'>
    <title>LoveNotes</title>
    <link rel="stylesheet" href="style.css" />
    <script src="landing.js"></script> 
    <link rel="icon" href= "public/music.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/289e976bd2.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "music_db";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_REQUEST["submit"])){
      $out_value = "";
      $s_username = $_REQUEST['userid'];
      $s_password = $_REQUEST['login_password_1'];

        $sql_query = "SELECT * FROM users WHERE username = ('$s_username') AND password = ('$s_password')";
        $result = mysqli_query($conn, $sql_query);
        $row = mysqli_fetch_assoc($result);
        if(!(is_null($row))) {
            $out_value = "yay";
        }
        else {
            $out_value = "bad info!";
        }
    }
    $conn->close();
  ?>
    <!-- Navigation Bar -->
    <div id="navbar" class="row navbar">
        <div class="navbar_logo" style= "padding-top:20px;">
            <p style="margin: 0; height: 60px;"><a href="index.html" style="cursor: pointer;" aria-label="Return to top of landing page">
            <img src="images/logo.webp" id="logo" alt="lovenotes logo" style="width: 178px; height: 50px;" loading="lazy"/>
            </a></p>
        </div>
        <ul id="navbar_items">
            <li><a id="features-btn" href="index.html#features">Features</a></li>
            <li><a id="testimonals-btn" href="index.html#testimonials">Testimonials</a></li>
            <li><a id="about-btn" href="index.html#about">The Team</a></li>
            <li><a id="login-btn" href="login.html">Login</a></li>
        </ul>
        <button id="more-button" aria-label="Show navigation links" onclick="showNavItems()">
            <i id="more-icon" class="fa-solid fa-list" style="color:rgb(233, 175, 204); font-size: 25px;"></i>
        </button>
        <ul id="navbar_list">
            <li><a id="nav_item_list" href="index.html#features">Features</a></li>
            <li><a id="nav_item_list" href="index.html#testimonials">Testimonials</a></li>
            <li><a id="nav_item_list" href="index.html#about">The Team</a></li>
            <li style="margin-bottom: 10px;"><a id="nav_item_list" href="login.html">Login</a></li>
        </ul>
    </div>

    <!-- Home section -->
    <div id="home" class="container">
        <div class="row home">
            <div id="form">
                <h1 style="font-size:50px; text-align:center; color: rgb(4, 57, 94);">Login</h1>
                <form name="form" action="" method="GET">
                <div class = "login_info">
                    <label class="user_text"> Username* </label>
                    <input required type="text" class="user" name="userid"/>
                </div>
                <div class="login_info">
                    <label class="pass_text"> Password* </label>
                    <input required type="password" class="pass" name="login_password_1"/>
                </div>
                <div style="text-align: center;">
                    <input type="submit" name="submit" id="log_in_btn" value="Login" style="padding:10px 30px; font-size: 22px;"/>
                </div>
                <p><?php 
                    if(!empty($out_value)){
                        echo $out_value;
                    }
                ?></p>
                <div class="sign_in_text" style="text-align: center; font-size: 20px;">
                    <span>Don't have an account?</span>
                    <a href="registration.html">Sign up here.</a>
                </div>
                <p class="sign_in_text" style="text-align: center; font-size: 17px;">*Required</p>
                </form>
            </div>
        </div>
    </div>
</body>