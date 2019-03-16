<!DOCTYPE html>
<html>
<head>
        <title>NERDo GAWD || Homepage</title>
        <link rel="stylesheet" href="NERDGAWD1.css"media="screen and (min-width:1024px)"/>
        <link rel="stylesheet" href="NERDGAWD1.css"media="screen and (min-width:80px)"/>
         <meta charset="utf-8">
          <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>

<?php
error_reporting(E_ALL);

ini_set('display_errors', 1);

require_once 'ytlogin.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die ($conn->connect_error);

$query = "SELECT * FROM MYANIME";
$result = $conn->query($query);

if (!$result) die ("database access failed: " . $conn->error);

$rows = $result->num_rows;

echo 
    '<html>
    <body>
        <table border = "2">';
        echo '<tr>
                <th>ID</th>
                <th>AgeGroup</th>
                <th>Geography</th>
                <th>FavoriteCharacter</th>
                <th>Source</th>
                <th>Genre</th>
                <th>Signup</th>
                <th>Action</th>';
        for ($j = 0 ; $j < $rows ; ++$j)
        {
            echo"<tr>";
            $result->data_seek($j);
            $row = $result->fetch_array(MYSQLI_NUM);
            echo "<td>";
            echo $row[0];
            echo "</td><td>";
            echo $row[1];
            echo "</td><td>";
            echo $row[2];
            echo "</td><td>";
            echo $row[3];
            echo "</td><td>";
            echo $row[4];
            echo "</td><td>";
            echo $row[5];
            echo "</td><td>";
            echo $row[6];
            echo "</td><td>";
            echo '<a href= "nerdgawd_edit.php?id='.$row[0].'">Revise</a>';
            echo '</td></tr>';
        }
echo    '</table>
    </body>
    </html>';

$result->close();

$conn->close();

function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
}

?>


                </div>
</div>
</body>
</html>

