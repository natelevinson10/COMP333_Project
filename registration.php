<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registration page of the LoveNotes site.">
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
        //create and check  connection

        if ($_SESSION["loggedin"]) {
            header('Location: ratings.php');
        }
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "music_db";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        // if submit button is hit
        if(isset($_REQUEST["submit"])){
            $out_value = "";
            $user =  $_POST['userid'];
            $password_1 = $_POST['reg_password_1'];
            $password_2 =  $_POST['reg_password_2'];
            $hashed_password = password_hash($password_1, PASSWORD_DEFAULT);

            //parameterized query to prevent SQL Injections
            $sql_query1 = "SELECT * FROM users WHERE username = ?";
            $stmt = mysqli_prepare($conn, $sql_query1);
            mysqli_stmt_bind_param($stmt, "s", $user);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

            // if there's an entry found, username is taken
            if(!(is_null($row))) {
                $out_value = "Username is taken! Please pick a different username.";
            }
            // else if the password length is less than 10 characters, send error saying it must be made longer
            elseif (strlen($password_1)<10) {
                $out_value = "Password must be at least 10 characters long!";
            }
            // else if passwords don't match, send error saying they must match
            elseif ($password_1 != $password_2) {
                $out_value = "Passwords must match!";
            }
            // else insert into user table
            else {
                //parameterized query to prevent SQL Injections
                $sql_query2 = "INSERT INTO users (username, password) VALUES (?, ?)";
                $stmt = mysqli_prepare($conn, $sql_query2);
                mysqli_stmt_bind_param($stmt, "ss", $user, $hashed_password);
                mysqli_stmt_execute($stmt);
                $num = mysqli_affected_rows($conn);

                if($num == 0){
                    $out_value = "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
                }
                else {
                    // assign global sesssion variables and redirect to ratings home
                    $_SESSION["loggedin"] = true;
                    $_SESSION["username"] = $user;
                    $_SESSION["password"] = $hashed_password;

                    header('Location: ratings.php');
                }
            }

        }
        // Close connection
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
        </ul>
        <button id="more-button" aria-label="Show navigation links" onclick="showNavItems()">
            <i id="more-icon" class="fa-solid fa-list" style="color:rgb(233, 175, 204); font-size: 25px;"></i>
        </button>
        <ul id="navbar_list">
            <li><a id="nav_item_list" href="index.html#features">Features</a></li>
            <li><a id="nav_item_list" href="index.html#testimonials">Testimonials</a></li>
            <li><a id="nav_item_list" href="index.html#about">The Team</a></li>
        </ul>
    </div>

    <!-- Home section -->
    <div id="home" class="container">
        <div class="row home">
            <div id="form">
                <h1 style="font-size:50px; text-align:center; color: rgb(4, 57, 94);">Sign up</h1>
                <form name="form" method="POST" action="">
                <div class="login_info">
                    <label class="label_text"> Username* </label>
                    <input required type="text" class="user" name="userid"/>
                </div>
                <div class="login_info">
                    <label class="label_text"> Password* </label>
                    <input required type="password" class="pass" name="reg_password_1"/>
                </div>
                <div class="login_info">
                    <label class="label_text"> Reenter Password* </label>
                    <input required type="password" class="pass" name="reg_password_2"/>
                </div>
                <p class="label_text" style="text-align: center; font-size: 17px; color: rgb(221, 84, 84);"><?php 
                    if(!empty($out_value)){
                        echo $out_value;
                    }
                ?></p>
                <div style="text-align: center;">
                    <input name="submit" type="submit" class="submit_btn" value="Sign up" style="padding:10px 30px; font-size: 22px;"/>
                </div>
                <div class="label_text" style="text-align: center; font-size: 20px; margin-right:0px;">
                    <span>Have an account?</span>
                    <a href="login.php">Log in here.</a>
                </div>
                <p class="label_text" style="text-align: center; font-size: 17px; margin-right:0px;">*Required</p>
                </form>
            </div>
        </div>
    </div>
</body>