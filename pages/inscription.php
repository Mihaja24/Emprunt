<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title mb-4 text-center">Inscription</h3>
                        <form action="traitements/traitement_incription.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                            <div class="mb-3">
                                <label for="date_naissance" class="form-label">Date de naissance</label>
                                <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
                            </div>
                            <div class="mb-3">
                                <label for="genre" class="form-label">Genre</label>
                                <select class="form-select" id="genre" name="genre" required>
                                    <option value="">Sélectionner</option>
                                    <option value="M">Homme</option>
                                    <option value="F">Femme</option>
                                    <option value="Autre">Autre</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="ville" class="form-label">Ville</label>
                                <input type="text" class="form-control" id="ville" name="ville" required>
                            </div>
                            <div class="mb-3">
                                <label for="mdp" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="mdp" name="mdp" required>
                            </div>
                            <div class="mb-3">
                                <label for="image_profil" class="form-label">Image de profil</label>
                                <input type="file" class="form-control" id="image_profil" name="image_profil">
                            </div>
                            <button type="submit" class="btn btn-success w-100">S'inscrire</button>
                        </form>
                        <div class="mt-3 text-center">
                            <a href="login.php">Déjà inscrit ? Se connecter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
