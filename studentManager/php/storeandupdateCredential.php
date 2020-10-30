<?php
session_start();
/**This php file stores the new password in the session variable and updates the password in the database.
 * By Roshan Shah,000793559
 */
include "connect.php";
if(isset($_SESSION["email"])===true){
$newpassword=filter_input(INPUT_POST,"newpassword",FILTER_SANITIZE_SPECIAL_CHARS);

$command="UPDATE students SET password=?  WHERE email=?";
$params=[$newpassword,$_SESSION["email"]];
$stmt=$dbh->prepare($command);
$success=$stmt->execute($params);

if($success){
$_SESSION['password']=$newpassword;

$result=true;


}
else{
    $result=false;
}

echo json_encode($result);
}
