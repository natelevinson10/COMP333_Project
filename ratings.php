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

<body>
     <?php
        //display errors (for debugging)
        //error_reporting(E_ALL);
        //ini_set('display_errors', '1');
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
            $user = $_REQUEST['userid'];
            $pass = $_REQUEST['login_password_1'];

            //prepared statement
            $sql_query = "SELECT password FROM users WHERE username = ?";
            $stmt = mysqli_prepare($conn, $sql_query);
            mysqli_stmt_bind_param($stmt, "s", $user);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $num = mysqli_num_rows($result);

            //check if a matching username exists
            if ($num > 0) {
                //if yes, retrieve stored hashed password
                //this works because there should only ever be one row since usernames are unique
                $row = mysqli_fetch_assoc($result);
                $hashed_pass = $row["password"];

                //check if the user-provided password matches the stored hashed password
                $password_match = password_verify($pass, $hashed_pass);
                if ($password_match) {
                    //success!!
                    //set session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["username"] = $user;
                    $_SESSION["password"] = $hashed_pass;
                    //redirect (will eventually be ratings page)
                    header('Location: index.html');
                }
            }
            //if either if statement returns false, then something was incorrect
            $out_value = "Your username or password was incorrect!";
        }
        //close connection
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
                <h1 style="font-size:80px; color: rgb(4, 57, 94);";>Welcome, username</h1>
        </div>

        <table style="width: 100%; margin-top: 20px;">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Artist</th>
                <th>Song</th>
                <th>Rating</th>
                <th>Action</th>
            </tr>
            <tbody id="ratingTableBody">
                <!-- Table body to be populated -->
            </tbody>
            
        </table>
    </div>
</body>