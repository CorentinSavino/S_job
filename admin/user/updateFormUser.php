<?php

//get 

$user=$_GET["id"];


//connexion 

$host="localhost";
$dbname="s_job";
$port="3306";

$dsn= "mysql:host=".$host.";dbname=".$dbname.";port=".$port.";charset=UTF8";

//try read

try{

$dbh = new PDO($dsn, "root", "");

$stmt= $dbh->prepare("SELECT * FROM `address` INNER JOIN user ON id_address=? WHERE id_user= ?;");

$stmt->bindParam(1, $user);
$stmt->bindParam(2, $user);

$stmt->execute();

$user= $stmt->fetch();

}
catch(PDOException $error){
    echo $error->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/user/form.css">
    <title>Document</title>
</head>
<body>
    <form action="../../admin/user/updateUser.php" method="post" enctype="multipart/form-data">
    
    <h1>Modifier utilisateur</h1>
    
    <div class="inputBox">
        <label for="lastname">Nom de Famille :</label>
        <input type="text" name="lastname" id="lastname" value="<?=$user["lastname"]?>">
    </div>

    <div class="inputBox">
        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname" id="firstname" value="<?=$user["firstname"]?>">
    </div>

    <div class="inputBox">
        <label for="email">E-mail :</label>
        <input type="email" name="email" id="email" required value="<?=$user["email"]?>">
    </div>

    <div class="inputBox">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required value="<?=$user["password"]?>">
    </div>

    <div class="inputBox">
        <label for="phone_number">Numéro de téléphone</label>
        <input type="phone_number" name="phone_number" id="phone_number" value="<?=$user["phone_number"]?>">
    </div>

    <div class="inputBox">
        <label for="cv">Curriculum Vitae</label>
        <input type="file" name="cv" id="cv">
    </div>

    <input type="hidden" name="role" id="role" value="user"> 

    <div class="inputBox">
        <label for="street_number">Numéro d'adresse :</label>
        <input type="text" name="street_number" id="street_number" value="<?=$user["street_number"]?>">
    </div>

    <div class="inputBox">
        <label for="street_name">Nom de la rue :</label>
        <input type="text" name="street_name" id="street_name" value="<?=$user["street_name"]?>">
    </div>

    <div class="inputBox">
        <label for="additional">Complément</label>
        <input type="text" name="additional" id="additional" value="<?=$user["additional"]?>">
    </div>

    
    <div class="inputBox">
        <label for="zip">Code postal</label>
        <input type="text" name="zip" id="zip" value="<?=$user["zip"]?>">
    </div>

      
    <div class="inputBox">
        <label for="city">Ville :</label>
        <input type="text" name="city" id="city" value="<?=$user["city"]?>">
    </div>

         
    <div class="inputBox">
        <label for="radius">Rayon de recherche :</label>
        <input type="number" name="radius" id="radius" value="<?=$user["radius"]?>">
    </div>

    <div class="inputBox">
        <label for="sector">Secteur :</label>
        <input type="text" name="sector" id="sector" value="<?=$user["sector"]?>">
    </div>

    <input type="hidden" name="id_user" id="id_user" value="<?=$user["id_user"]?>" >
    <input type="hidden" name="id_address" id="id_address" value="<?=$user["id_address"]?>" >

    <input type="submit" value="envoyer" name="submit" id="submit" >
    
</form>
</body>
</html>