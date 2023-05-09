<?php

//get 

$id=$_GET["id"];

// connexion to the DB


$host="localhost";
$dbname="cinema";
$port="3306";

$dsn= "mysql:host=".$host.";dbname=".$dbname.";port=".$port.";charset=UTF8";

try{

$dbh=new PDO($dsn, "root", "");

$stmt=$dbh->prepare("SELECT * FROM movie WHERE id_movie=?;");
$stmt->bindParam(1, $id);
$stmt->execute();

$user=$stmt->fetch();

var_dump($user);

}catch(PDOException $error){
    echo $error->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormMovie</title>
</head>
<body>

<form action="./updateMovie.php" method="post" enctype="multipart/form-data">

<input type="hidden" name="id_movie" id="id_movie" value="<?=$user["id_movie"];?>">

<div class="divForm">
    <label for="name">name of the movie</label>
    <input type="text" name="name" id="name" value="<?=$user["name"];?>">
</div>

<div class="divForm">
    <label for="time">length</label>
    <input type="number" name="time" id="time" value="<?=$user["time"];?>">
</div>

<div class="divForm">
    <label for="category">category</label>
    <input type="text" name="category" id="category" value="<?=$user["category"];?>">
</div>

<div class="divForm">
    <label for="director">director</label>
    <input type="text" name="director" id="director" value="<?=$user["director"];?>">
</div>

<div class="divForm">
    <label for="rated">rated</label>
    <input type="number" name="rated" id="rated" min="7" max="18" value="<?=$user["rated"];?>">
</div>


<div class="divForm">
    <label for="studio">studio</label>
    <input type="text" name="studio" id="studio" value="<?=$user["studio"];?>">
</div>

<div class="divForm">
    <select class="language" name="language" id="language" value="<?=$user["language"];?>">
        <option disabled selected value="">language</option>
        <option value="<?=$user["language"];?>" selected="selected"><?=$user["language"];?></option>
        <option value="V.O">V.O</option>
        <option value="V.O ST.FR">V.O.ST.FR</option>
        <option value="V.F">V.F</option>
    </select>
</div>

<div class="divForm">
    <label for="plot">plot</label>
    <textarea name="plot" id="plot" cols="30" rows="15"><?=$user["plot"];?></textarea>
</div>

<div class="divForm">
    <label for="poster">poster</label>
    <input type="file" name="poster" id="poster" placeholder="poster" required file="<?=$user["poster"];?>">
</div>

<input type="submit" value="Update" name="submit" id="submit">



</form>
    
</body>
</html>