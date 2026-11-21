<?php
require_once "../database/connexion.php"; 
$sql= "SELECT etudiant.* , formation.id_formation FROM etudiant 
join formation on etudiant.id_formation=formation.id_formation";
$stmt = $pdo->query($sql);
$etudiants =$stmt ->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants</title>
</head>
<body>
    <h2>Liste des etudiants</h2>
    <table border="1">
        <tr>
            <th>id_etudiant</th>
            <th>nom</th>
            <th>prenom </th>
            <th>id_formation</th>
            <th>Actions</th>
        </tr>
        <?php foreach($etudiants as $etudiant){ ?>
        <tr>
            <td><?php echo htmlspecialchars($etudiant["id_etudiant"]); ?></td>
            <td><?php echo htmlspecialchars($etudiant["nom"]); ?></td>
            <td><?php echo htmlspecialchars($etudiant["prenom"]); ?></td>
            <td><?php echo htmlspecialchars($etudiant["id_formation"]) ?></td>
            <td><a href="edit.php?id=<?= $etudiant['id_etudiant'] ?>">Modifier</a>
            |
            <a href="delete.php?id=<?= $etudiant['id_etudiant'] ?>">Supprimer</a>
        </td>
        </tr>
        <?php } ?>
    </table>
    
</body>
</html>