<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    // Local server
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "scis";
    // Real server
    // $servername = "localhost";
    // $username = "jaironla_scis";
    // $password = "3@AHPi*q._d#";
    // $db = "jaironla_scis";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>