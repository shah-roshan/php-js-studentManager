<?php

/**
 * This php file inserts a student to the student table
 * By Roshan Shah,000793559
 */
include "connect.php";
$first = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING);
$last = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
$dob = filter_input(INPUT_POST, "dob", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$program = filter_input(INPUT_POST, "program", FILTER_SANITIZE_SPECIAL_CHARS);

if (($first !== null && $first !== "" && $first !== false) && ($last !== null && $last !== "" && $last !== false) && ($dob !== null && $dob !== "" && $dob !== "yyyy-mm-dd") && ($email !== null && $email !== "" && $email !== false)
    && ($password !== null && $password !== "" && $password !== false)
) {

    //checking for the same email to maintain uniqueness..

    $command = "SELECT email from students ";
    $stmt = $dbh->prepare($command);
    $success = $stmt->execute();
    if ($success) {
        $allEmails = [];
        while ($row = $stmt->fetch()) {
            array_push($allEmails, $row["email"]);
        }
        $unique = true;
        for ($i = 0; $i < count($allEmails); $i++) {
            if ($allEmails[$i] == $email) {
                $unique = false;
            }
        }
    }



    if ($unique === true) {

        $command = "INSERT INTO students (firstname,lastname,email,dob,password,programcode) VALUES('$first','$last','$email','$dob','$password','$program')";
        //$params=[$first,$last,$email,$dob,$password,$program];
        $stmt = $dbh->prepare($command);
        $success = $stmt->execute();
        if ($success) {

            $command = "INSERT INTO $program (email) VALUES(?)";
            $params = [$email];
            $stmt = $dbh->prepare($command);
            $success = $stmt->execute($params);
            echo json_encode(" successfully inserted student");
        }
    } else {
        echo json_encode("Please make  sure to fill all fields properly and try again");
    }
} else {
    echo json_encode("Email already registered by another user!");
}
