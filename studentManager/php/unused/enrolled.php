<?php 
/**
 * This php document returns the enrollemnet status of each courses.
 * 
 */
session_start();

include "connect.php";


/*$command="SELECT * FROM `559` WHERE email='roshanrupeshkumar.shah@mohawkcollege.ca'";
$stmt=$dbh->prepare($command);
//$params=[$_SESSION["program"]];
$success=$stmt->execute();
if($success){
    $i=0;
    $enrolledArray=[];
    $courseList=[];
   
   

 
    $a=["java","python"];
  while($row=$stmt->fetch()){
      echo $row[$a[$i]];
      echo $row[$a[$i+1]] ;
     
      $i+=1;

     
  }

  echo json_encode($courseList);
}
else{
    echo"problem";
}*/


$command="SELECT * FROM $_SESSION[program] WHERE email=?";
$stmt=$dbh->prepare($command);
$params=[$_SESSION["email"]];
$success=$stmt->execute($params);
if(isset($_SESSION["program"])===true){
    $i=0;
    $enrolledArray=[];
    echo "hi";
   
   

 
   
  while($row=$stmt->fetch()){
      while($i<count($newArray)){
         echo $row[$newArray[$i]]; 
         array_push($enrolledArray, $row[$newArray[$i]]);
         $i++;  
      }
     
     

     
  }
  echo count($enrolledArray);
$j=0;
  while($j<=count($newArray)-1){
   echo " <tr><td id='course'>$newArray[$j]</td><td id='status'>$enrolledArray[$j]</td></tr><br>";
$j++;
  }


 // echo json_encode($courseList);
}
else{
   echo "not success";
}


