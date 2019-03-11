<?php
require_once 'ytlogin.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM MYANIME";
$result = $conn->query($query);
$rows = array();

        $numrows = $result->num_rows;
        while ($row = $result->fetch_assoc()){
                $rows[] = $row;}

echo json_encode($rows);
?>
