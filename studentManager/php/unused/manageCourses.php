<?php
session_start();
/**
 * This php file enables the user to select or deselect the courses in his program.
 * By Roshan Shah,000793559
 */

include "connect.php";



$command="SELECT * FROM 559 WHERE email=roshanrupeshkumar.shah@mohawkcollege.ca";
$stmt=$dbh->prepare($command);
//$params=[$_SESSION['email']];
$success=$stmt->execute();

if($success){    $array=[];
    $i=0;
    echo "in";
    while ($row=$stmt->fetch()){
       echo $row;
       

    }
    echo json_encode($array);
    

}









?>