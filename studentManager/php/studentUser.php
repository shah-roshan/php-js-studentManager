<?php
/**
 *This php file contains the class for students with different properties
 * By Roshan Shah,000793559
 */
Class student implements JsonSerializable{
    /**
     * firstname of the student
     */
private $firstname;
/**
     * lastname of the student
     */
private $lastname;
/**
     * dob of the student
     */
private $dob;
/**
     * email of the student
     */
private $email;
/**
     * password of the student
     */
private $password;
/**
     * programcode of the student
     */
private $programcode;

/**
     * Constructor function for the class that sets all the values
     * @param {firstname of the student} firstname
     * @param {lastname of the student} lastname
     * @param {dob of the student} dob
     * @param {email of the student} email
     * @param {password of the student} password
     * @param {programcode of the student} programcode
     */

public function __construct($firstname,$lastname,$dob,$email,$password,$programcode){

$this->firstname=$firstname;
$this->lastname=$lastname;
$this->dob=$dob;
$this->email=$email;
$this->password=$password;
$this->programcode=$programcode;

}
/**
     * gives the programcode of the student
     * @returns programcode of the student
     */
public function getProgramCode(){
    return $this->programcode;
}
/**
     * gives the firstname of the student
     * @returns firstname of the student
     */
public function getFirstName(){
    return $this->firstname;
}
/**
     * gives the lastname of the student
     * @returns lastname of the student
     */
public function getLastName(){
    return $this->lastname;
}
/**
     * gives the email of the student
     * @returns email of the student
     */
public function getEmail(){
    return $this->email;
}
/**
     * gives the dob of the student
     * @returns dob of the student
     */
public function getdob(){
    return $this->dob;
}
/**
     * gives the password of the student
     * @returns password of the student
     */
public function getPassword(){
    return $this->password;
}
 /**
     * boiler plate code for the  JsonSerializable
     */
public function jsonSerialize()
{
    return get_object_vars($this);
}


}
