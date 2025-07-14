<?php
require('../fonction.php');
session_start();
$email = isset($_POST['email']) ? $_POST['email'] : null;
$mdp = isset($_POST['mdp']) ? $_POST['mdp'] : null;

if ($email === null || $mdp === null) {
    rediriger('login.php?erreur=2');
}
$verifier_membre = verifier_membre($email, $mdp);
if ($verifier_membre != false) {
    $_SESSION['id'] = $verifier_membre['id_membre'];
    $_SESSION['nom'] = $verifier_membre['nom'];
    $_SESSION['email'] = $verifier_membre['email'];
    $_SESSION['image_profil'] = $verifier_membre['image_profil'];
    rediriger('../liste.php');
} else {
    rediriger('../login.php?erreur=1');
}