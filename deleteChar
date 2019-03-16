<!DOCTYPE html>
<html>
<head>
        <title>NERDo GAWD || Homepage</title>
        <link rel="stylesheet" href="NERDGAWD1.css"media="screen and (min-width:1024px)"/>
        <link rel="stylesheet" href="NERDGAWD1.css"media="screen and (min-width:80px)"/>
         <meta charset="utf-8">
</head>
<body>

<?php
error_reporting(E_ALL);

ini_set('display_errors', 1);

require_once 'ytlogin.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die ($conn->connect_error);

if (isset($_POST['delete']) && isset($_POST['id'])){

    $id = get_post($conn, 'id');

    $query = "DELETE FROM MYANIME WHERE id = '$id'";

    $result = $conn->query($query);

    if (!$result){
        echo "UNSUCCESSFUL DELETE: $query <br />" . $conn->error . "<br /><br />";
    }else{
        echo "RECORD HAS BEEN DELETED";
    }

}

$query = "SELECT * FROM MYANIME";
$result = $conn->query($query);

if (!$result) die ("database access failed: " . $conn->error);

$rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j){
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
    <pre>
        id $row[0]
        AgeGroup $row[1]
        Geography $row[2]
        FavoriteCharacter $row[3]
        Source $row[4]
        Genre $row[5] 
        Signup $row[6]
    </pre>
    <form action="nerdgawd_delete.php" method="post">
    <input type="hidden" name="delete" value="yes">
    <input type="hidden" name="id" value="$row[0]">
    <input type="submit" value="DELETION"></form><br /><br />
_END;
}

$result->close();

$conn->close();

function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
}

?>
                </div>
<footer>
        <div class = foot>
                <ul>
                        <li><a href=#>Subscribe!</a></li>
                        <li><a href="NDsurvey.html">Survey</a></li>
                        <li><a href=#>Contact Us</a></li>
                        <li><a href=#>About Us</a></li>
                        <li><a href="NerdGawd.html">Home</a></li>
                </ul>
        </div>
</footer>
</div>
</body>
</html>

