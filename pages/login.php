<?php 
require('../pages/fonction.php');
$erreur = [
    1 => 'Verifier votre mot de passe ou votre email.',
    2 => 'Veuillez remplir tous les champs.'
]

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="erreur">
        <?php 
        if (isset($_GET['erreur'])) { ?>
            <div class="alert alert-danger text-center" role="alert"> <?= $erreur[$_GET['erreur']] ?> </div>
        <?php }
        ?>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title mb-4 text-center">Connexion</h3>
                        <form action="traitements/traitement_login.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email/Nom d'utilisateur</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="mdp" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="mdp" name="mdp" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                        </form>
                        <div class="mt-3 text-center">
                            <a href="inscription.php">Créer un compte</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>