<?php

// Traitement du formulaire lorsqu'il est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des valeurs du formulaire
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
    $prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : '';
    $utilisateur= isset($_POST['utilisateur']) ? trim($_POST['utilisateur']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

    $errors = [];

    // Validation des champs
    if (empty($nom) || empty($prenom) || empty($utilisateur)|| empty($email) || empty($password) || empty($confirm_password)) {
        $errors[] = "Tous les champs sont obligatoires.";
    }

    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'adresse email n'est pas valide.";
    }

    // Vérification de la correspondance des mots de passe
    if ($password !== $confirm_password) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    // Affichage des messages de succès ou d'erreur
    if (empty($errors)) {
        echo "<p style='color:green;'>Utilisateur créé avec succès!</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>
    <link rel="stylesheet" href="CSS/styleRegister.css">
</head>
<body>
<form action="registration_form">
<div class="wrapper">
        <form action="">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" placeholder="Nom"  value = "<?php echo isset($nom) ? htmlspecialchars($nom) : ''; ?>">
             
            </div>
            <div class="input-box">
                <input type="text" placeholder="Prenom"  value = "<?php echo isset($prenom) ? htmlspecialchars($prenom) : ''; ?>">
             
            </div>
            <div class="input-box">
                <input type="text" placeholder="Nom Utilisateur"  value = "<?php echo isset($utilisateur) ? htmlspecialchars($utilisateur) : ''; ?>">
             
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email"  value = "<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
             
            </div>
            <div class="input-box">
           
                <input type="password" name ="password" placeholder="Password" required >
              
            </div>
            <div class="input-box" >
                
               
                <input type="password" name="confirm_password"  placeholder= "confirm_password"   id="confirm_password"><br><br>
            </div>
            <button type="submit" class="btn"><a href="Login.php">Regisrer</a></button>
            <p>Vous avez deja un compte <a href="Login.php">Login</a></p>
            
        </form>
    </div>




</form>
</body>
</html>