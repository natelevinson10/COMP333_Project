<?php
// Start the session
session_start();
?>
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
        // check to make sure user is logged in
        // if not, redirect to login page (should only happen if page is requested manually)
        if (!$_SESSION["loggedin"]) {
            header('Location: login.php');
        }
        
        // if submit button is hit, end session and redirect to landing
        if(isset($_REQUEST["confirm"])){
            session_destroy(); 
            header("Location: index.html"); 
        }
        // if cancel button is hit, go back to ratings home
        elseif(isset($_REQUEST["reject"])) {
            header("Location: ratings.php"); 
        }
    ?>

    <!-- Navigation Bar -->
    <div id="navbar" class="row navbar">
        <div class="navbar_logo" style= "padding-top:20px;">
            <p style="margin: 0; height: 60px;"><a href="logout.php" style="cursor: pointer;" aria-label="Return to top of landing page">
            <img src="images/logo.webp" id="logo" alt="lovenotes logo" style="width: 178px; height: 50px;" loading="lazy"/>
            </a></p>
        </div>
        <ul id="navbar_items">
            <li><a id="login-btn" href="ratings.php">Home</a></li>
        </ul>
        <button id="more-button" aria-label="Show navigation links" onclick="showNavItems()">
            <i id="more-icon" class="fa-solid fa-list" style="color:rgb(233, 175, 204); font-size: 25px;"></i>
        </button>
        <ul id="navbar_list">
            <li style="margin-bottom: 10px;"><a id="nav_item_list" href="ratings.php">Home</a></li>
        </ul>
    </div>

    <!-- Rating section -->
    <div id="Rating" class="container">
        <div class="row home">
            <div class="update_form" id="form" style="text-align:center;">
                <h1 style="font-size:60px; color: rgb(4, 57, 94); text-align:center;";>Log Out</h1>
                <form name="logout"  method="POST" action="">
                    <p class="label_text" style="margin-right: 0px;">Are you sure you want to log out?</p>
                    <input class="submit_btn" style="padding:10px 30px; font-size: 22px;" type="submit" name="confirm" value="Yes"/>
                    <input class="submit_btn" style="padding:10px 30px; font-size: 22px;" type="submit" name="reject" value="No"/>
                </form>
            </div>
        </div>
    </div>
</body>