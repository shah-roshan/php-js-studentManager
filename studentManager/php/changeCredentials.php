<?php
include "connect.php";
/**
 * This is the php file for changing the email and password of the user account.
 * By Roshan Shah,000793559
 */
?>

<!DOCTYPE html>
<?php
session_start();
?>
<html>

<head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/changeCredentials.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/changeCredentials.js"></script>



</head>

<body>

    <?php

    if (isset($_SESSION["firstname"]) === true && isset($_SESSION["lastname"]) === true && isset($_SESSION["email"]) === true && isset($_SESSION["password"]) === true) {
        echo "<div id='welcome'> $_SESSION[firstname], select a new Password.</div>";

        echo "<nav id='navigation'>
    <br><br><br>
    <a href='loggedinhome.php'>Home </a> 
    <a href='mycoursesNew.php'>Courses</a> 
  
    <a href='logout.php'>Logout</a>
    </nav>";


        echo "<div id=mainframe>";
        echo "<div id='criteria'>You can easily change your password anytime. Your password must satisfy the following criterias-
<li>Atleast 1 upper case Character</li>
<li>Atleast 1 Lower Case Character</li>
<li>Atleast 1 Special Character</li>
<li>Atleast 5 characters  long</li>
<li>Atleast 1 number</li></div>";

        echo " <form action='loggedinhome.php' id='changepassword'>
<label>New Pasword</label>
<br>
<input type='password' name='newpassword' id='newpassword' placeholder='new password'>
<br>
<label>Confirm Pasword</label>
<br>
<input type='password' name='confirmnewpassword' id='confirmnewpassword' placeholder='confirm new password'>
<div id='message'></div>
<br>


<input type='submit' name='ok' value='ok' id='ok'>
<input type='submit' name='cancel' value='cancel' id='cancel'>
</form>";

        echo "</div>";
    }
    ?>








</body>

</html>