<?php

$userName = "root";
$password = "Tc@19720228";
$databaseName = "general_election";
$hostUrl = "127.0.0.1";
$port = 3307;

$connection = new mysqli($hostUrl, $userName, $password, $databaseName, $port);

/* $x = "ABC";
$y = "DEF";
// if java , String z = x + y;
$z = $x.$y;  */

if ($connection->connect_error){
    echo "Error !, Not Connected." . $connection->connect_error;
}else{
//   echo "Connected Successfully !";
}

//insert query
//$sql = "INSERT INTO users (name,birthday,email) values('Hehan','1995-02-24','mhmkulasooriyatc@gmail.com')";
//$isSaved = mysqli_query($connection, $sql);
//echo "Is Saved ?". $isSaved;
//
//mysqli_close($connection);

?>