<?php
/**
 * This php file inserts a student to the student table
 */
include "connect.php";
$first=filter_input(INPUT_POST,"firstname",FILTER_SANITIZE_STRING);
$last=filter_input(INPUT_POST,"lastname",FILTER_SANITIZE_STRING);
$dob=filter_input(INPUT_POST,"dob",FILTER_SANITIZE_SPECIAL_CHARS);
$email=filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS);
$password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING);
$program=filter_input(INPUT_POST,"program",FILTER_SANITIZE_SPECIAL_CHARS);

$command="UPDATE students SET email='$email',dob='$dob',password='$password',programcode='$program' WHERE firstname='$first',lastname='$last'";
//$params=[$email,$dob,$password,$program,$first,$last];
$stmt=$dbh->prepare($command);
$success=$stmt->execute();
if($success){
    echo json_encode( " successfully updated student");
}
else{
    echo json_encode( "unable to update student");
}
?>