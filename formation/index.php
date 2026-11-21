
<?php

require_once "../database/connexion.php";

$sql = "SELECT * FROM formation";
$stmt = $pdo->query($sql);
$formations = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formation</title>
</head>

<body>

    <h2>Liste des Formations</h2>

    <table border="1">

        <tr>
            <th>id_formation</th>
            <th>nom_formation</th>
            <th>description</th>
            <th>Actions</th>
        </tr>

        <?php foreach($formations as $formation) { ?>

        <tr>

            <td>
                <?php echo htmlspecialchars($formation["id_formation"]); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($formation["nom_formation"]); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($formation["description"]); ?>
            </td>

            <td>
                <a href="edit.php?id=<?php echo $formation["id_formation"]; ?>">Modifier</a>

                <a href="delete.php?id=<?php echo $formation["id_formation"]; ?>">Supprimer</a>
            </td>

        </tr>

        <?php } ?>

    </table>

</body>
</html>
