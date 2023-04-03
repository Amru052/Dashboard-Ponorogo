<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbsurvey";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

/*
//azure
$host = "mbd-052.postgres.database.azure.com";
$port = 5432;
$user = "mbd_052";
$pass = "dsb_fv_its_10";
$db = "postgres";

$conn = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass");*/

?>