<?php

/**
 * This file responses to the ajax request and sends the detailed list of courses for the progam.
 * By Roshan Shah,000793559
 */
include "connect.php";


$command = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$_SESSION[program]'";
$stmt = $dbh->prepare($command);

$success = $stmt->execute();
if ($stmt->rowCount()) {

   $courseList = [];


   while ($row = $stmt->fetch()) {


      array_push($courseList, $row["COLUMN_NAME"]);
   }
   unset($courseList[0]);
   $newArray = [];
   $checkValues = [];
   foreach ($courseList as $key => $value) {
      // echo " <tr><td id='$value'>$value</td><td id='check'><input type='checkbox' name='$value' id='$value'></td></tr><br>";
      array_push($newArray, $value);
   }


   // enrolled.php code

   $command = "SELECT * FROM `$_SESSION[program]` WHERE email='$_SESSION[email]'";
   $stmt = $dbh->prepare($command);
   //$params=[$_SESSION["program"]];
   $success = $stmt->execute();
   if ($success) {
      $i = 0;
      $enrolledArray = [];






      while ($row = $stmt->fetch()) {
         while ($i < count($newArray)) {
            // echo $row[$newArray[$i]]; 
            array_push($enrolledArray, $row[$newArray[$i]]);
            $i++;
         }
      }

      $j = 0;
      echo "<table id='courseTable'> ";
      while ($j <= count($newArray) - 1) {
         if ($enrolledArray[$j] == "Enrolled") {

            echo " <tr><td id='$newArray[$j]'>$newArray[$j]</td><td id='check'><input type='checkbox' name='$newArray[$j]' id='$newArray[$j]' checked='checked'></td></tr><br>";
         } else if ($enrolledArray[$j] == "notEnrolled") {

            echo " <tr><td id='$newArray[$j]'>$newArray[$j]</td><td id='check'><input type='checkbox' name='$newArray[$j]' id='$newArray[$j]' ></td></tr><br>";
         }

         $j++;
      }
      echo "</table>";
   }
}
