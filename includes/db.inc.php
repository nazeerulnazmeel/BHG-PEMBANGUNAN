<?php

    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASS = '';
    $DB_NAME = 'pembangunan_db';


    $db = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if ( !$db ) {
	    // If there is an error with the connection, stop the script and display the error.
	    die ('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

?>