<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./form.css">
</head>
<body>
    <section class="form_sect">
    <form action="../../admin/user/createUser.php" method="post" enctype="multipart/form-data">

        <h1>Inscription</h1>
    
    <div class="inputBox">
        <label for="lastname">Nom de Famille :</label>
        <input type="text" name="lastname" id="lastname">
    </div>

    <div class="inputBox">
        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname" id="firstname">
    </div>

    <div class="inputBox">
        <label for="email">E-mail :</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div class="inputBox">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>
    </div>

    <div class="inputBox">
        <label for="phone_number">Numéro de téléphone</label>
        <input type="phone_number" name="phone_number" id="phone_number">
    </div>

    <div class="inputBox">
        <label for="cv">Curriculum Vitae</label>
        <input type="file" name="cv" id="cv">
    </div>

    <input type="hidden" name="role" id="role" value="user"> 

    <div class="inputBox">
        <label for="street_number">Numéro d'adresse :</label>
        <input type="text" name="street_number" id="street_number">
    </div>

    <div class="inputBox">
        <label for="street_name">Nom de la rue :</label>
        <input type="text" name="street_name" id="street_name">
    </div>

    <div class="inputBox">
        <label for="additional">Complément</label>
        <input type="text" name="additional" id="additional">
    </div>

    
    <div class="inputBox">
        <label for="zip">Code postal</label>
        <input type="text" name="zip" id="zip">
    </div>

      
    <div class="inputBox">
        <label for="city">Ville :</label>
        <input type="text" name="city" id="city">
    </div>

         
    <div class="inputBox">
        <label for="radius">Rayon de recherche :</label>
        <input type="number" name="radius" id="radius">
    </div>

    <div class="inputBox">
        <label for="sector">Secteur :</label>
        <input type="text" name="sector" id="sector">
    </div>

    <input type="submit" value="envoyer" name="submit" id="submit" >
    
</form>
</section>
</body>
</html>