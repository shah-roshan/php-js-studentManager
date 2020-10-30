<?php
session_start();
/** this php responds to the javascripts fetch request and updates the course status 
 * By Roshan Shah,000793559
*/
include "connect.php";
$currentStatus=filter_input(INPUT_POST,"currentStatus",FILTER_SANITIZE_STRING);
$course=filter_input(INPUT_POST,"course",FILTER_SANITIZE_SPECIAL_CHARS);
$value="";
if($currentStatus!="" && $currentStatus!==null){

if($currentStatus=="true"){
    $value="Enrolled";

}
if($currentStatus=="false"){
    $value="notEnrolled";
}


$command="UPDATE $_SESSION[program] SET $course=? WHERE email='$_SESSION[email]' ";
$stmt=$dbh->prepare($command);
$params=[$value];
$success=$stmt->execute($params);
if($success){
    echo json_encode("changes saved");
}

}

