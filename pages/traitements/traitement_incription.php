<?php
require('../fonction.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? '';
    $date_naissance = $_POST['date_naissance'] ?? '';
    $genre = $_POST['genre'] ?? '';
    $email = $_POST['email'] ?? '';
    $ville = $_POST['ville'] ?? '';
    $mdp = $_POST['mdp'] ?? '';
    $image_file = $_FILES['image_profil'] ?? null;

    if ($nom && $date_naissance && $genre && $email && $ville && $mdp) {
        $result = inscrire_membre($nom, $date_naissance, $genre, $email, $ville, $mdp, $image_file);
        if ($result) {
            rediriger('../login.php');
        } else {
            rediriger('../inscription.php?erreur=1');
        }
    } else {
        rediriger('../inscription.php?erreur=2');
    }
}
