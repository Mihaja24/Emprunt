<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function connecterBase(){
    $base = mysqli_connect("localhost", "root", "", "emprunt");
    return $base;
}

function rediriger($url){
    header("Location: $url");
    exit;
}

function inscrire_membre($nom, $date_naissance, $genre, $email, $ville, $mdp, $image_file){
    $base = connecterBase();
    $image_path = null;
    if ($image_file && $image_file['error'] == UPLOAD_ERR_OK) {
        $image_path = upload($image_file);
    }

    $requete = "INSERT INTO emp_membre (nom, date_naissance, genre, email, ville, mdp, image_profil) VALUES ('$nom', '$date_naissance', '$genre', '$email', '$ville', '$mdp', '$image_path')";
    return mysqli_query($base, $requete);    
}

function upload($file)
{
    $uploadDir = dirname(__DIR__, 1) . '/uploads/';
    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0777, true)) {
            die('Impossible de créer le dossier uploads.');
        }
    }
    $maxSize = 40 * 1024 * 1024; // 40 Mo
    $allowedMimeTypesImg = ['image/jpeg', 'image/png'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die('Erreur upload : ' . $file['error']);
    }
    if ($file['size'] > $maxSize) {
        die('Fichier trop volumineux.');
    }
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    if (!in_array($mime, $allowedMimeTypesImg)) {
        die('Type de fichier non autorisé : ' . $mime);
    }
    $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = $originalName . '_' . uniqid() . '.' . $extension;
    $absolutePath = $uploadDir . $newName;
    if (move_uploaded_file($file['tmp_name'], $absolutePath)) {
        return "uploads/" . $newName;
    } else {
        die('Erreur lors du déplacement du fichier vers ' . $absolutePath);
    }
}

function verifier_membre($email, $mdp){
    $base = connecterBase();
    $requete = "SELECT * FROM emp_membre WHERE email='$email' AND mdp='$mdp'";
    $result = mysqli_query($base, $requete);
    if ($result && mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}
