
<?php

require_once "../database/connexion.php";


$id = $_GET["id"] ?? null;

if ($id === null) {
    die("Identifiant manquant !");
}

$sql = "SELECT * FROM formation WHERE id_formation = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([":id" => $id]);

$formation = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST["Modifier"])) {

    $nom_formation = $_POST["nom_formation"];
    $description = $_POST["description"];

    $sql = "UPDATE formation
            SET nom_formation = :nom_formation,
                description = :description
            WHERE id_formation = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":nom_formation" => $nom_formation,
        ":description" => $description,
        ":id" => $id
    ]);

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une formation</title>
</head>
<body>

<h2>Modifier une formation</h2>

<form method="POST">

    <label>Nom de formation :</label>

    <input type="text" name="nom_formation"
    value="<?php echo htmlspecialchars($formation['nom_formation']); ?>"
    required>

    <br><br>

    <label>Description :</label>

    <textarea name="description"><?php
    echo htmlspecialchars($formation['description'] ?? '');
    ?></textarea>

    <br><br>

    <button type="submit" name="Modifier">Modifier</button>

</form>

<a href="index.php">Retour</a>

</body>
</html>
