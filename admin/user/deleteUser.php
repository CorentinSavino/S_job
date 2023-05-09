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

$stmt= $dbh->prepare("DELETE FROM user Where id_user=?");

$stmt->bindParam(1, $user);

$stmt->execute();

$user= $stmt->fetch();

$stmt2= $dbh->prepare("DELETE FROM address Where id_address=?");

$stmt2->bindParam(1, $user);

$stmt2->execute();

$user= $stmt2->fetch();


}
catch(PDOException $error){
    echo $error->getMessage();
}

?>