<?php 
session_start();
/**
 * This php sends back the list of students in the current program
 */
include "connect.php";
$email=filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS);
//$email="";
$newfirstname=filter_input(INPUT_POST,"firstname",FILTER_SANITIZE_STRING);

$newlastname=filter_input(INPUT_POST,"lastname",FILTER_SANITIZE_STRING);
$newpassword=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
$newdob=filter_input(INPUT_POST,"dob",FILTER_SANITIZE_SPECIAL_CHARS);
$newprogramcode=filter_input(INPUT_POST,"programcode",FILTER_SANITIZE_SPECIAL_CHARS);

$command="SELECT firstname,lastname,password,dob,programcode  FROM students WHERE email = ?" ;
$stmt=$dbh->prepare($command);
$params=["roshanrupeshkumar.shah@mohawkcollege.ca"];
$success=$stmt->execute($params);
if($success){
   $student=[];
    while($row=$stmt->fetch()){
$student=["firstname"=>$row["firstname"],"lastname"=>$row["lastname"],"password"=>$row["password"],"dob"=>$row["dob"],"programcode"=>$row["programcode"]];

    }
    if($newfirstname!==null){
        $student["firstname"]=$newfirstname;
    }
    if($newlastname!==null){
        $student["lastname"]=$newlastname;
    }
    if($newpassword!==null){
        $student["password"]=$newpassword;
    }
    if($newdob!==null){
        $student["dob"]=$newdob;
    }
  
        $student["programcode"]=$newprogramcode;
    

   
    
    $command="UPDATE students SET firstname=?,lastname=?,password=?,dob=?,programcode=?   WHERE email = ?" ;
    $stmt=$dbh->prepare($command);
    $params=[$student["firstname"],$student["lastname"],$student["password"],$student["dob"],$student["programcode"],$email];
    $success=$stmt->execute($params);
    if($success){



    echo json_encode($student);
  
}
}
else{
    echo json_encode("unable to update student");
}



?>