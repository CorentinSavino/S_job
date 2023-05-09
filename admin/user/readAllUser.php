<?php
//connexion 

$host="localhost";
$dbname="s_job";
$port="3306";

$dsn= "mysql:host=".$host.";dbname=".$dbname.";port=".$port.";charset=UTF8";

try{
    $dbh=new PDO($dsn, "root", "");

    $stmt= $dbh->query("SELECT * FROM user INNER JOIN `address` ON user.id_user=id_address");

    $users=$stmt->fetchAll();


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
    <title>Tableau de contrôle</title>
    <link rel="stylesheet" href="./readAll.css">
</head>
<body>
    <header>
        <h1>S_Job<hr></h1>
        <ul>
            <li><i class="fa-solid fa-user"></i> Utilisateurs</li>
            <li><i class="fa-solid fa-user-tie"></i> Conseillers</li>
            <li><i class="fa-solid fa-industry"></i> Entreprises</li>
        </ul>
    </header>
    <table>
            <thead>
                <tr>
                    <th colspan="16">Utilisateurs</th>
                </tr>
            </thead>
            <tbody>
                <tr class="tableHead">
                    <th scope=col>Nom</th>
                    <th scope=col>Prénom</th>
                    <!--<th scope=col>email</th>
                   <th scope=col>Mot de passe</th>
                    <th scope="col">tél</th>
                    <th scope="col">cv</th>
                    <th scope="col">N° d'adresse</th>
                    <th scope="col">Nom de la rue</th>
                    <th scope="col">complément d'adresse</th>
                    <th scope="col">code postal</th>-->
                    <th scope="col">ville</th>
                    <!--<th scope="col">rayon</th>
                    <th scope="col">secteur</th>-->
                    <th>en savoir +</th>
                    <th>modifier</th>
                    <th>supprimmer</th>
                </tr>
            <?php foreach($users as $user):?>
                <tr classs="userRow">
                    <td><?=$user["lastname"]?></td>
                    <td><?=$user["firstname"]?></td>
                    <!--<td><?=$user["email"]?></td>
                    <td><?=$user["password"]?></td>
                    <td><?=$user["phone_number"]?></td>
                    <td><?=$user["cv"]?></td>
                    <td><?=$user["street_number"]?></td>
                    <td><?=$user["street_name"]?></td>
                    <td><?=$user["additional"]?></td>
                    <td><?=$user["zip"]?></td>-->
                    <td><?=$user["city"]?></td>
                    <!--<td><?=$user["radius"]?></td>
                    <td><?=$user["sector"]?></td>-->
                    <td><a href="./readUser.php?id=<?=$user["id_user"];?>"><i class="fa-solid fa-ellipsis"></i></a></td>
                    <td><a href="./updateFormUser.php?id=<?=$user["id_user"];?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="./deleteUser.php?id=<?=$user["id_user"];?>"><i class="fa-solid fa-trash-can"></i></a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
<script src="https://kit.fontawesome.com/9f228ec7eb.js" crossorigin="anonymous"></script>
</body>
</html>