<?php
session_start();
require 'fonction.php';

$base = connecterBase();

// Récupérer tous les objets avec leur catégorie, propriétaire et emprunt en cours (si existant)
$requete = "
SELECT o.nom_objet, c.nom_categorie, m.nom AS proprietaire, e.date_retour
FROM emp_objet o
JOIN emp_categorie_objet c ON o.id_categorie = c.id_categorie
JOIN emp_membre m ON o.id_membre = m.id_membre
LEFT JOIN emp_emprunt e ON o.id_objet = e.id_objet AND (e.date_retour IS NULL OR e.date_retour > CURDATE())
ORDER BY o.id_objet DESC
";
$result = mysqli_query($base, $requete);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des objets</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Liste des objets</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nom de l'objet</th>
                    <th>Catégorie</th>
                    <th>Propriétaire</th>
                    <th>Date de retour (si emprunt en cours)</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nom_objet']) ?></td>
                        <td><?= htmlspecialchars($row['nom_categorie']) ?></td>
                        <td><?= htmlspecialchars($row['proprietaire']) ?></td>
                        <td>
                            <?php
                            if ($row['date_retour']) {
                                echo htmlspecialchars($row['date_retour']);
                            } else {
                                echo '<span class="text-success">Disponible</span>';
                            }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
