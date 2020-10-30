<!DOCTYPE html>
<?php
session_start();
/** 
 * This php file is for the admin user.
 * The admin user can insert or delete any student user.
 * By Roshan Shah,000793559.
 */
?>
<html>

<head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/manageStudents.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/manageStudents.js"></script>

</head>

<body>

    <?php

    if (isset($_SESSION["firstname"]) === true && isset($_SESSION["lastname"]) === true && isset($_SESSION["program"]) === true) {
        echo "<div id='welcome'>Welcome $_SESSION[firstname]</div>";

        echo "<nav id='navigation'>
<br><br><br>

<a href='logout.php'>Logout</a>
</nav>";
        echo "<div id='mainframe'>";
        echo "<span id=insert>";
        echo "</span>";

        echo "<span id='insertMessage'>";
        echo "</span>";

        echo "<span id=students>";
        echo "</span>";

        echo "<span id=edit>";
        echo "</span>";
        echo "</div>";
    }

    ?>


</body>

</html>