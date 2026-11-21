
<?php
require_once "../database/connexion.php";

$sql = "SELECT module.*, formation.nom_formation
        FROM module
        JOIN formation
        ON module.id_formation = formation.id_formation";

$stmt = $pdo->query($sql);
$modules = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modules</title>
</head>
<body>

    <h2>Liste des Modules</h2>

    <table border="1">
        <tr>
            <th>id_module</th>
            <th>nom_module</th>
            <th>coefficient</th>
            <th>nom_formation</th>
            <th>Actions</th>
        </tr>

        <?php foreach($modules as $module) { ?>
        <tr>
            <td><?php echo htmlspecialchars($module["id_module"]); ?></td>

            <td><?php echo htmlspecialchars($module["nom_module"]); ?></td>

            <td><?php echo htmlspecialchars($module["coefficient"]); ?></td>

            <td><?php echo htmlspecialchars($module["nom_formation"]); ?></td>

            <td>
                <a href="edit.php?id=<?php echo $module["id_module"]; ?>">Modifier</a>

                <a href="delete.php?id=<?php echo $module["id_module"]; ?>"
                   onclick="return confirm('Voulez-vous supprimer ce module ?')">
                   Supprimer
                </a>
            </td>
        </tr>
        <?php } ?>

    </table>

    <br>
    <a href="create.php">Ajouter un module</a>

</body>
</html>
