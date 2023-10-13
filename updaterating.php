<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoveNotes</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href= "public/music.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/289e976bd2.js" crossorigin="anonymous"></script>
</head>

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
        <li><a id="login-btn" href="login.php">Login</a></li>
    </ul>
    <button id="more-button" aria-label="Show navigation links" onclick="showNavItems()">
        <i id="more-icon" class="fa-solid fa-list" style="color:rgb(233, 175, 204); font-size: 25px;"></i>
    </button>
    <ul id="navbar_list">
        <li><a id="nav_item_list" href="index.html#features">Features</a></li>
        <li><a id="nav_item_list" href="index.html#testimonials">Testimonials</a></li>
        <li><a id="nav_item_list" href="index.html#about">The Team</a></li>
        <li style="margin-bottom: 10px;"><a id="nav_item_list" href="login.php">Login</a></li>
    </ul>
</div>

<!-- Rating section -->
<div id="Rating" class="container">
    <div class="row home">
            <h1 style="font-size:80px; color: rgb(4, 57, 94);";>Update Rating</h1>
    </div>
</div>