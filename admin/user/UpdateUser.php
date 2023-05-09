<?php
if(isset($_POST["submit"])){
//post USER

$lastname=$_POST["lastname"];
$firstname=$_POST["firstname"];
$email=$_POST["email"];
$password=$_POST["password"];
$phone_number=$_POST["phone_number"];
$role=$_POST["role"];
$id_user=$_POST["id_user"];

// move file to folder

$cv=$_FILES["cv"];
$cv=$_FILES['cv']['name'];
$cv_tmp=$_FILES['cv']['tmp_name'];

move_uploaded_file($cv_tmp, "../../static/file/$cv");

//post Address

$street_number=$_POST["street_number"];
$street_name=$_POST["street_name"];
$additional=$_POST["additional"];
$zip=$_POST["zip"];
$city=$_POST["city"];
$radius=$_POST["radius"];
$sector=$_POST["sector"];
$id_address=$_POST["id_address"];

// witness

$index=true;

// connexion to Data base 

$host="localhost";
$dbname="s_job";
$port="3306";
$dsn="mysql:host=".$host.";dbname=".$dbname.";port=".$port.";charset=UTF8";

try{
    
    $dbh=new PDO($dsn, "root", "");

    //user resquest

    $stmt1 = $dbh->prepare("UPDATE user SET firstname=?, lastname=?, email=?, `password`=?, phone_number=?, cv=?, role=? WHERE id_user=?");

    $stmt1->bindParam(1, $firstname);
    $stmt1->bindParam(2, $lastname);
    $stmt1->bindParam(3, $email);
    $stmt1->bindParam(4, $password);
    $stmt1->bindParam(5, $phone_number);
    $stmt1->bindParam(6, $cv);
    $stmt1->bindParam(7, $role);
    $stmt1->bindParam(8, $id_user);

    $stmt1->execute();

    //their second majestic satanic request (adress)

    $stmt2 = $dbh->prepare("UPDATE address SET street_number=?, street_name=?, additional=?, zip=?, city=?, radius=?, sector=?, user=?  WHERE id_address=?");

    $stmt2->bindParam(1, $street_number);
    $stmt2->bindParam(2, $street_name);
    $stmt2->bindParam(3, $additional);
    $stmt2->bindParam(4, $zip);
    $stmt2->bindParam(5, $city);
    $stmt2->bindParam(6, $radius);
    $stmt2->bindParam(7, $sector);
    $stmt2->bindParam(8, $id_user);
    $stmt2->bindParam(9, $id_address);

    $stmt2->execute();

    $index=false;

}catch(PDOException $error){
   echo $error->getMessage();
}if($index==false){
    $witness="Tout s'est bien passé";
}else{
    $witness="On a eu une erreur";
}}
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
    <h1><?php echo $witness; ?></h1>
</body>
</html>