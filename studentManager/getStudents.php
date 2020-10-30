<?php 
session_start();
/**
 * This php sends back the list of students in the current program along with a delete image besides the id
 * By Roshan Shah,000793559.
 */
include "connect.php";
//$programTable=filter_input(INPUT_POST,"programTable",FILTER_SANITIZE_STRING);
$command="SELECT * FROM students";
$stmt=$dbh->prepare($command);
$success=$stmt->execute();
if($success){
    $students=[];
    
    while($row=$stmt->fetch()){
        array_push($students,"<tr><td><img src='../images/delete.png' id=".$row["email"]." class='delete'>".$row["id"]."</td>","<td>".$row["firstname"]."</td>","<td>".$row["lastname"]."</td>","<td>".$row["dob"]."</td>","<td>".$row["email"]."</td>","<td>".$row["password"]."</td>","<td>".$row["programcode"]."</td></tr>");
    }
   
    echo json_encode($students);
}
