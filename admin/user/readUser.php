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
    <title>Document</title>
</head>
<body>
   <ul>
    <li><?= $user["lastname"];?></li>
    <li><?= $user["firstname"];?></li>
    <li><?= $user["email"];?></li>
    <li><?= $user["phone_number"];?></li>
    <li><?= $user["cv"];?></li>
    <li><?= $user["street_number"];?></li>
    <li><?= $user["street_name"];?></li>
    <li><?= $user["additional"];?></li>
    <li><?= $user["zip"];?></li>
    <li><?= $user["city"];?></li>
    <li><?= $user["radius"];?></li>
    <li><?= $user["sector"];?></li>
    </ul>
</body>
</html>