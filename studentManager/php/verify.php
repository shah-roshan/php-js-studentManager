<?php
session_start();
/**
 *This php file checks the credentials and lets the student login
 * in case of successful login, it starts a session and stores all necessary information in it.
 * By Roshan Shah,000793559
 * 
 * 
 */
include "connect.php";
include "studentUser.php";
$id=filter_input(INPUT_POST,"id",FILTER_SANITIZE_SPECIAL_CHARS);
$password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);


$command="SELECT * FROM students WHERE email=?";
$stmt=$dbh->prepare($command);
$params=[$id];
$success=$stmt->execute($params);

if($success && $stmt->rowCount()){
    
$currentUserArray=[];
while($row=$stmt->fetch()){
   $currentUser=new  student($row["firstname"],$row["lastname"],$row["dob"],$row["email"]
   ,$row["password"],$row["programcode"]);
}
if( $currentUser->getEmail()===$id && $currentUser->getPassword()===$password){
    $result=["valid"=>true, "firstname"=>$currentUser->getFirstName(),"lastname"=>$currentUser->getLastName(),"program"=>$currentUser->getProgramCode()];
   
   
   
   $_SESSION["firstname"]=$currentUser->getFirstName();
   $_SESSION["lastname"]=$currentUser->getLastName();
   $_SESSION["program"]=$currentUser->getProgramCode();
   $_SESSION['email']=$currentUser->getEmail();
   $_SESSION['password']=$currentUser->getPassword();
}
else{
    $result=["valid"=>false];
    session_destroy();
}

}
else{
   
    $result=["valid"=>false];
    session_destroy();
}
echo json_encode($result);
