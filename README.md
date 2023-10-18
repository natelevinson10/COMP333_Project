# LoveNotes

What is LoveNotes❤️🎵?\
LoveNotes is a platform that allows users to share, rate, and discover new music. After creating an account, LoveNotes users can display their favorite songs on their profile for everyone to see, and rate tracks to share their music taste. Users can also search for their friends' accounts and discover just how similar their music taste is. More coming soon, stay tuned!🚀

Noteworthy Files🛠️:\
**Images**: folder of website images\
**Index.html**: HTML code for LoveNotes' landing page. This is the page users are greeted with upon visiting the website.\
**Login.php**: The login page of our website.\
**Logout.php**: Confirms that a user wants to log out. If yes, ends the current session and user is redirected to landing page.
**Style.css**: CSS code used to style the landing page (index.html), including the background colors, fonts, font sizes, and overall aesthetic.\
**Registration.php**: The registration page of our website. Users choose a username and password that is stored securely in our backend.\
**Ratings.php**: Home page, displays all of the ratings given on LoveNotes from all users in an HTML body. Users are able to view all ratings, and edit/delete their own ratings on this page through PHP code establishing and editing the ratings database.\
**Addrating.php, Updaterating.php, Deleterating.php**: Accessible from the ratings page, these enable users to actually add, edit, and delete, their own ratings as they are displayed in HTML and establish connections to the users and ratings databases with PHP.\
**Viewrating.php**: Allows users to look specifically at any given rating shown on ratings.php.

How To Run💻:\
Our website is currently deployed [here](https://lovenotes.great-site.net/?i=1), but InfinityFree is currently having [issues](https://forum.infinityfree.net/t/php-session-variable-not-carried-through-pages/84536) with maintaining php session variables, so any functionality of the site directly related to whether a user is logged in or not may not be currently working as intended. You can avoid these problems by cloning the repo and running the code locally with XAMPP.

Development Environment🛠️:\
<img width="1440" alt="Screenshot 2023-10-17 at 4 27 06 PM" src="https://github.com/natelevinson10/COMP333_Project/assets/78764811/a990bbb6-5360-4c51-ba5c-0f785a8acdd3">
<img width="1440" alt="Screenshot 2023-10-17 at 4 27 27 PM" src="https://github.com/natelevinson10/COMP333_Project/assets/78764811/f8076e61-9745-4c22-b348-ca620651c06e">


Developers🧑‍🔬:\
Nate Levinson and Bella Tassone

HW1 participation📝: 50/50 split\
HW2 participation📝: 50/50 split


**NOTE**: In our updating ratings page, users are only allowed to change the rating of any given entry (not song or artist). This is what made most sense to us, as a user should never need to edit a song and artist, considering they already have the ability to add new entries and delete current ones. We talked to Sebastian about this and got the OK to go ahead with it!
