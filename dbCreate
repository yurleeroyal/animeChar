<?php

require_once 'ytlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);

if($conn->connect_error){
        die("Connect Failed: " .$conn->connect_error);
        }

$sql = "CREATE DATABASE YRT";
if ($conn->query($sql) === TRUE){
        echo "Database created perfectly";
} else{
        echo "Error creating database: " . $conn->error;
}



        $sql = "CREATE TABLE MYANIME (" .
        "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,".
        "AgeGroup VARCHAR(30) NOT NULL,".
        "Geography VARCHAR(30) NOT NULL,".
        "FavoriteCharacter VARCHAR(30) NOT NULL,".
        "Source VARCHAR(30)NOT NULL,".
        "Genre VARCHAR(30) NOT NULL,".
        "Signup VARCHAR(30) NOT NULL)";


 if ($conn->query($sql) === TRUE){
        echo "Table MYANIME created successfully";
 } else {
        echo "Error creating table Anime:" . $conn->error;
 }




$conn->close();
?>
