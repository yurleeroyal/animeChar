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

if($_SERVER['REQUEST_METHOD']==='POST'){
$id = $_POST["id"];
echo"id=".$id."<br>";
if(isset($_POST['AgeGroup']) &&
    isset($_POST['Geography']) &&
    isset($_POST['FavoriteCharacter']) &&
    isset($_POST['Source']) &&
    isset($_POST['Genre']) &&
    isset($_POST['Signup']))
{
$AgeGroup = get_post($conn, 'AgeGroup');
$Geography = get_post($conn, 'Geography');
$FavoriteCharacter = get_post($conn, 'FavoriteCharacter');
$Source = get_post($conn, 'Source');
$Genre = get_post($conn, 'Genre');
$Signup = get_post($conn, 'Signup');
$query = 'UPDATE MYANIME SET AgeGroup = "'.$AgeGroup.'", Geography = "'.$Geography.'", FavoriteCharacter = "'.$FavoriteCharacter.'", Source = "'.$Source.'", Genre = "'.$Genre.'", Signup = "'.$Signup.'" WHERE id ='.$id;
if(!$result){
    echo "UPDATE FAILURE: $query<br>" .$conn->error."<br><br>";
}else {echo "UPDATE COMPLETED";
 }
}
}else{
    $id = $_GET["id"];
    $query = "SELECT * FROM MYANIME WHERE id =".$id;
    $result=$conn->query($query);
    if (!$result) die ("Failed to Access database:".$conn->error);

    $rows = $result->num_rows;
    $row = $result->fetch_array(MYSQLI_NUM);

    echo'<html><body><form method ="POST" target=nerdgawd_edit.php>';
    echo'AgeGroup: <input type="text" name=AgeGroup value="'.$row[1].'"><br>';
    echo'Geography: <input type="text" name=Geography value="'.$row[2].'"><br>';
    echo'FavoriteCharacter: <input type="text" name=FavoriteCharacter value="'.$row[3].'"><br>';
    echo'Source: <input type="text" name=Source value="'.$row[4].'"><br>';
    echo'Genre: <input type="text" name=Genre value="'.$row[5].'"><br>';
    echo'Signup: <input type="text" name=Signup value="'.$row[6].'"><br>';
    echo'<input type="hidden" name=update value="yes">';
    echo'<input type="hidden" name=id value="'.$id.'">';
    echo'<input type="submit" name=update value="Save">';
    echo'<input type="reset" name=update value="Release">';

    $result->close();
    $conn->close();

}
function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
}
?>


<a href='nerdgawd_delete.php'>Delete Anime</a>
<a href='nerdgawd_display.php'>Anime Display</a>
<a href='nerdgawd_update.php'>Edit Anime Records</a>
<a href='nerdgawd_add.php'>Add Anime</a>
<a href='nerdgawd_home.html'>Home Page</a> 



                </div>
</body>
</html>

