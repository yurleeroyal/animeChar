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

if($conn->connect_error){
        die("Connect Failed: " .$conn->connect_error);
        }

if (isset($_POST['AgeGroup']) &&
    isset($_POST['Geography']) &&
    isset($_POST['FavoriteCharacter']) &&
    isset($_POST['Source']) &&
    isset($_POST['Genre']) &&
    isset($_POST['Signup'])){
$AgeGroup = get_post($conn, 'AgeGroup');
$Geography = get_post($conn, 'Geography');
$FavoriteCharacter = get_post($conn, 'FavoriteCharacter');
$Source = get_post($conn, 'Source');
$Genre = get_post($conn, 'Genre');
$Signup = get_post($conn, 'Signup');
$query = "INSERT INTO MYANIME (AgeGroup, Geography, FavoriteCharacter, Source, Genre, Signup) VALUES" .
        "('$AgeGroup', '$Geography', '$FavoriteCharacter', '$Source', '$Genre', '$Signup')";
        $result = $conn->query($query);
        if (!$result){
         echo "INSERT failed: $query<br>" .
        $conn->error . "<br><br>";
        }else{
                echo "Successful Add<br /><br />";
        }
}
$conn->close();

function get_post($conn, $var) {
        return $conn->real_escape_string($_POST[$var]);
}

?>







<?php
$AgeGroup = $Geography = $FavoriteCharacter = $Source = $Genre = $Signup = "";
$AgeGroupERR = $GeographyERR = $FavoriteCharacterERR = $SourceERR = $GenreRR = $SignupERR = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["AgeGroup"])){
                $AgeGroupERR = "SELECT AGE";
        }else{
        $AgeGroup = my_input($_POST["AgeGroup"]);
        }
        if(empty($_POST["Geography"])){
                $Geography = "";
        }else{
        $Geography = my_input($_POST["Geography"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $Geography)){
        $GeographyERR = "*ALPHABET ONLY";
        }
        }
        if(empty($_POST["FavoriteCharacter"])){
                $FavoriteCharacter = "";
        }else{
        $FavoriteCharacter = my_input($_POST["FavoriteCharacter"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $FavoriteCharacter)){
        $FavoriteCharacterERR = "ALPHABET ONLY";
        }
        }
        if(empty($_POST["Source"])){

                $SourceERR = "SELECT MAIN SOURCE";
        }else{
        $Source = my_input($_POST["Source"]);
        }
        if(empty($_POST["Genre"])){
                $GenreERR = "CHOOSE A GENRE";
        }else{
        $Genre = my_input($_POST["Genre"]);
        }
        if(empty($_POST["Signup"])){
                $Signup = "";
        }else{
        $Signup = my_input($_POST["Signup"]);
        if (!filter_var($Signup, FILTER_VALIDATE_EMAIL)){
        $SignupERR = "Incorrect email";
        }
        }
}
function my_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>


<p> <span class="error">* Mandatory!</span></p>
<form id = "test" method="post" action="nerdgawd_add.php">
        <fieldset>
                <legend>Fill In</legend>
                 <p>
                        <label>Age Group:</label>
                        <input type="radio" name="AgeGroup" <?php if (isset($AgeGroup) && $AgeGroup == "kid") echo "checked";?> value="kid">7-12
                        <input type="radio" name="AgeGroup" <?php if (isset($AgeGroup) && $AgeGroup == "teen") echo "checked";?> value="teen">13-17
                        <input type="radio" name="AgeGroup" <?php if (isset($AgeGroup) && $AgeGroup == "young") echo "checked";?> value="young">18-23
                        <input type="radio" name="AgeGroup" <?php if (isset($AgeGroup) && $AgeGroup == "middle") echo "checked";?> value="middle">24-31
                        <input type="radio" name="AgeGroup" <?php if (isset($AgeGroup) && $AgeGroup == "old") echo "checked";?> value="old">32 & Older
                        <span class="error">* <?php echo $AgeGroupERR;?></span>
                </p>
                 <p>
                        <label>Geography:</label>
                        <input type= "text" id = "Geography" name= "Geography" value= "<?php echo $Geography;?>" />
                        <span class="error"> <?php echo $GeographyERR;?></span>
                </p>
                <p>
                        <label>Favorite Character Name:</label>
                        <input type= "text" id ="FavoriteCharacter"  name= "FavoriteCharacter" value="<?php echo $FavoriteCharacter;?>"  />
                        <span class="error"> <?php echo $FavoriteCharacterERR;?></span>
                </p>
                 <p>
                        <label>Source:</label>
                        <input type="radio" name="Source" <?php if (isset($Source) && $Source == "Anime") echo "checked";?> value="Anime">Anime
                        <input type="radio" name="Source" <?php if (isset($Source) && $Source == "TVShow") echo "checked";?> value="TVShow">TV Show
                        <input type="radio" name="Source" <?php if (isset($Source) && $Source == "Comics") echo "checked";?> value="Comics">Comic Books
                        <input type="radio" name="Source" <?php if (isset($Source) && $Source == "Cartoons") echo "checked";?> value="Cartoons">Cartoons
                        <input type="radio" name="Source" <?php if (isset($Source) && $Source == "Movies") echo "checked";?> value="Movies">Movies
                        <span class="error">* <?php echo $SourceERR;?></span>
                </p>

                        <label>Genre(Select One):</label></br>
                        <input type= "checkbox" name = "Genre" value= "Action">Action
                        <input type= "checkbox" name = "Genre" value= "Horror">Horror
                        <input type= "checkbox" name = "Genre" value= "Love">Love</br>
                        <input type= "checkbox" name = "Genre" value= "Kids">Kids
                        <input type= "checkbox" name = "Genre" value= "Fantasy">Fantasy
                        <input type= "checkbox" name = "Genre" value= "Game">Game</br>
                        <input type= "checkbox" name = "Genre" value= "Detective">Detective
                        <input type= "checkbox" name = "Genre" value= "Magic">Magic
                        <span class="error">* <?php echo $GenreERR;?></span>
                </P>
                 <p>
                        <label>Sign-Up:</label>
                        <input type= "text" id = "Signup" name= "Signup" value="<?php echo $Signup;?>" />
                        <span class="error"> <?php echo $SignupERR;?></span>
                </p>
                <input type= "submit" value="Add Record" />
        </fieldset>
</form>     

<a href='nerdgawd_delete.php'>Delete Anime</a>
<a href='nerdgawd_display.php'>Anime Display</a>
<a href='nerdgawd_update.php'>Edit Anime Records</a>
<a href='nerdgawd_home.html'>Home Page</a>                   

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

