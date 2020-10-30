<?php
session_start();
/**
 * This file responses to the ajax request and sends the list of course headings for the progam.
 * It checks if the user is logged in and redirects to the login page if not logged in
 * By Roshan Shah,000793559
 */
include "connect.php";




if (isset($_SESSION["program"]) === true) {
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
      foreach ($courseList as $key => $value) {
         array_push($newArray, $value);
      }
      $_SESSION["courses"] = $newArray;

      echo json_encode($newArray);
   }
} else {
   header("Location: ../index.html");
}
