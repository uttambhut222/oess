<?php

//Database

/*
$servername = "DevAERECourses.db.11797364.2d8.hostedresource.net";
$username = "DevAERECourses";
$password = "W3lc0m3@2018";
$databasename = "DevAERECourses";
*/

/*
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "oess";
*/

///*
$servername = "localhost";
$username = "devbyo5_OESS";
$password = "!^X#T]sHXYl)";
$databasename = "devbyo5_OESS";
//*/

/*
$servername = "localhost";
$username = "uatbyo5_OESS";
$password = "0vsE[wSNJy3Y";
$databasename = "uatbyo5_OESS";
*/

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//SMTP Details for inmotion
/*
define('HOST', 'mail.uatbyopeneyes.com');
define('PORT', 465);
define('FROMNAME', 'OpenEyes Software Solutions Pvt.Ltd');
define('USERNAME', 'noreply.allinstitute@uatbyopeneyes.com');
define('USERPASSWORD', '@ere1234');
define('SETFROM', 'noreply.allinstitute@uatbyopeneyes.com');
*/

//SMTP Details for local & godaddy
///*
define('HOST', 'smtp.gmail.com');
define('PORT', 465);
define('FROMNAME', 'OpenEyes Software Solutions Pvt.Ltd');
define('USERNAME', 'myopeneyes3937@gmail.com');
define('USERPASSWORD', 'W3lc0m3@2018');
//*/


//To Email
//define('INQUIRETO', 'tmehta@theopeneyes.com');
define('INQUIRETO', 'uttam.bhut@theopeneyes.in');
?>