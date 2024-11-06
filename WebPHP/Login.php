<?php
require_once'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des valeurs du formulaire
    $nom = isset($_POST['Username']) ? trim($_POST['Username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    $errors = [];

    // Validation des champs
    if (empty($nom)  || empty($password) ) {
        $errors[] = "Tous les champs sont obligatoires.";
    }else{
        $sql = "SELECT * FROM users WHERE email ='$nom' AND mot_passe ='$password' ";
 
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)){
            echo $nom;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login QUIZZ</title>
    <link rel="stylesheet" href="CSS/styleLogin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username"  value = "<?php echo isset($nom) ? htmlspecialchars($nom) : ''; ?>"required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required >
                <i class='bx bxs-lock-alt'></i>
            </div>

           
            <button type="submit" class="btn"><a href="index.html">Login</a></button>
            <div class="register-link">
                <p>Don't have an account? <a href="Register.php">Register</a></p>
            </div>
            
        </form>
    </div>
</body>
</html>