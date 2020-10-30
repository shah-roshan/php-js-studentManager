<!DOCTYPE html>
<?php
session_start();
?>
<html>

<head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loggedinhome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/main.js"></script>

</head>

<body>

    <?php
    /**
     * This php file loads the page for the user after he is logged in 
     * BY Roshan Shah,000793559
     * 
     */
    if ($_SESSION["firstname"] === "admin") {
        header("Location: manageStudents.php");
    }
    if (isset($_SESSION["firstname"]) === true && isset($_SESSION["lastname"]) === true && isset($_SESSION["program"]) === true) {
        echo "<div id='welcome'>Welcome $_SESSION[firstname]" . "  " . $_SESSION["lastname"] . "</div>";

        echo "<nav id='navigation'>
<br><br><br>
<a href='loggedinhome.php'>Home </a> 
<a href='mycoursesNew.php'>Courses</a> 

<a href='logout.php'>Logout</a>
</nav>";



        //echo"<div id='floateditprofile'>Edit</div>";
        echo "<span id='mainFrame'>";
        echo "<span id='profile'>
<h1 id='profileinformation'>Your Profile <img id='changeCredentials' src='../images/edit.png'></h1> 

Email:<br>
$_SESSION[email]
<br>
<br>


Name : <br>
$_SESSION[firstname] $_SESSION[lastname]

<br>
<br>
Program:
<p id='program'> $_SESSION[program] </p>


</span>"; //profile ends


        echo "<span id='courseList'>

</span>"; // courselist ends
        echo "</span>"; //mainframe ends


    } else {
        header("Location: ../index.html");
    }


    ?>


</body>

</html>