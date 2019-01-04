<?php

//Database

// $servername = "PRDOpenEyesSite.db.11797364.2e3.hostedresource.net";
// $username = "PRDOpenEyesSite";
// $password = "W3lc0m3@2018";
// $databasename = "PRDOpenEyesSite";

$servername = "DevAERECourses.db.11797364.2d8.hostedresource.net";
$username = "DevAERECourses";
$password = "W3lc0m3@2018";
$databasename = "DevAERECourses";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $databasename = "oeti";


/*
$servername = "localhost";
$username = "devbyo5_OETIWebsite";
$password = "])Mz5*u[8W1]";
$databasename = "devbyo5_OETIWebsite";
*/

/*
$servername = "localhost";
$username = "uatbyo5_OETIWebsite";
$password = "h^],5eTbF;LJ";
$databasename = "uatbyo5_OETIWebsite";
*/

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//SMTP Details
/*
define('HOST', 'mail.uatbyopeneyes.com');
define('PORT', 465);
define('FROMNAME', 'OpenEyes Software Solutions Pvt.Ltd');
define('USERNAME', 'noreply.allinstitute@uatbyopeneyes.com');
define('USERPASSWORD', '@ere1234');
define('SETFROM', 'noreply.allinstitute@uatbyopeneyes.com');
*/

//SMTP Details 2

define('HOST', 'smtp.gmail.com');
define('PORT', 465);
define('FROMNAME', 'OpenEyes Software Solutions Pvt.Ltd');
define('USERNAME', 'myopeneyes3937@gmail.com');
define('USERPASSWORD', 'W3lc0m3@2018');


//To Email
//define('INQUIRETO', 'info@theopeneyes.com');
//define('CAREERTO', 'info@theopeneyes.com');
//define('INQUIRETO', 'tmehta@theopeneyes.com');
//define('CAREERTO', 'tmehta@theopeneyes.com');
define('INQUIRETO', 'uttam.bhut@theopeneyes.in');
define('CAREERTO', 'uttam.bhut@theopeneyes.in');
?>