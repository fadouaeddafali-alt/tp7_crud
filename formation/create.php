
<?php

require_once "../database/connexion.php";

if (isset($_POST["Ajouter"])) {

    $nom_formation = $_POST["nom_formation"];
    $description = $_POST["description"];

    $sql = "INSERT INTO formation (nom_formation, description)
            VALUES (:nom_formation, :description)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":nom_formation" => $nom_formation,
        ":description" => $description
    ]);

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter une formation</title>
</head>

<body>

    <h2>Ajouter une formation</h2>

    <form method="POST">

        <label>Nom de formation :</label>
        <input type="text" name="nom_formation" required>

        <br><br>

        <label>Description :</label>
        <textarea name="description"></textarea>

        <br><br>

        <button type="submit" name="Ajouter">Ajouter</button>

    </form>

    <a href="index.php">Retour</a>

</body>
</html>
