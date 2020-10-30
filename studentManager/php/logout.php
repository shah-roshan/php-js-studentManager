<?php

/**
 * This php file destroys the session and redirects the user to the login page.
 * By Roshan Shah,000793559
 * 
 */ session_start();
session_destroy();
header("Location: ../index.html");
