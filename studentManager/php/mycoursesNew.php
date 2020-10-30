<!DOCTYPE html>
<?php
session_start();
/**
 * This php file loads the courses and enables the user to select/deselect any courses by clicking the checkboxes.
 * 
 * BY Roshan Shah,000793559
 * 
 */
?>
<html>

<head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mycourses.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/mycoursesnew.js"></script>
</head>

<body>

    <?php

    if (isset($_SESSION["firstname"]) === true && isset($_SESSION["lastname"]) === true && isset($_SESSION["program"]) === true) {
        echo "<div id='welcome'>Welcome $_SESSION[firstname]" . "  " . $_SESSION["lastname"] . "</div>";

        echo "<nav id='navigation'>
<br><br><br>
<a href='loggedinhome.php'>Home </a> 
<a href='mycoursesNew.php'>Courses</a> 
<a href='logout.php'>Logout</a>
</nav>";
        echo "<span id='message'></span>";
        echo "<span id=mycourses><h1 id='selectHeading'>Select Courses</h1>";
        include "getCoursesForHomeNew.php";
        echo "</span>";
    } else {
        echo "not logged in";
    }


    ?>


</body>

</html>