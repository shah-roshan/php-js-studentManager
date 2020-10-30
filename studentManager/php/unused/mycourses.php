<!DOCTYPE html>
<?php
session_start();
?>
<html>

<head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mycourses.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/mycourses.js"></script> 
    
</head>

<body>
   
<?php 
/**
 * This php file loads the page for the user after he is logged in 
 * BY Roshan Shah,000793559
 * 
 */
if(isset($_SESSION["firstname"])===true && isset($_SESSION["lastname"])===true && isset($_SESSION["program"])===true){
    echo "<div id='welcome'>Welcome $_SESSION[firstname]"."  ".$_SESSION["lastname"]."</div>";

echo"<nav id='navigation'>
<br><br><br>
<a href='loggedinhome.php'>Home </a> 
<a href=''>Courses</a> 
<a href=''>Connect/Ask a Question</a> 
<a href='logout.php'>Logout</a>
</nav>";


echo"<span id='coursetable'></span>";
echo"<span id='enrolled'></span>";

}







else{
    echo"not logged in";
}


?>


</body>

</html>