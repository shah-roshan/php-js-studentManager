<?php 
session_start();
/**
 * This php file first gets the program code of the student using the email, then deletes the user from the student 
 * table and then uses the progam code to remove the student from his program table again using the email
 * By Roshan Shah,000793559
 */
include "connect.php";
$email=filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS);
$command="SELECT programcode  FROM students WHERE email = ?" ;
$stmt=$dbh->prepare($command);
$params=[$email];
$success=$stmt->execute($params);
if($success){
   $student=[];
    while($row=$stmt->fetch()){
$student=["programcode"=>$row["programcode"]];

    }



    
$command="DELETE  FROM students WHERE email = ?" ;
$stmt=$dbh->prepare($command);
$params=[$email];
$success=$stmt->execute($params);
if($success){
   
    
    $command="DELETE  FROM $student[programcode] WHERE email = ?" ;
    $stmt=$dbh->prepare($command);
    $params=[$email];
    $success=$stmt->execute($params);
    echo json_encode("successfully deleted");
}
else{
    echo json_encode("unable to delete student");
}

}
