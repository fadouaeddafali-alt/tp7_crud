
<?php

require_once "../database/connexion.php";

// Récupérer les formations
$sql = "SELECT * FROM formation";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$formations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Ajouter un module
if (isset($_POST["Ajouter"])) {

    $nom_module = $_POST["nom_module"];
    $coefficient = $_POST["coefficient"];
    $id_formation = $_POST["id_formation"];

    $sql = "INSERT INTO module (nom_module, coefficient, id_formation)
            VALUES (:nom_module, :coefficient, :id_formation)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":nom_module" => $nom_module,
        ":coefficient" => $coefficient,
        ":id_formation" => $id_formation
    ]);

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un module</title>
</head>

<body>

    <h2>Ajouter un module</h2>

    <form method="POST">

        <label>Nom du module :</label>
        <input type="text" name="nom_module" required>

        <br><br>

        <label>Coefficient :</label>
        <input type="number" name="coefficient" required>

        <br><br>

        <label>Formation :</label>

        <select name="id_formation" required>

            <option value="">Choisir une formation</option>

            <?php

            foreach ($formations as $formation) {

                echo '<option value="' . $formation["id_formation"] . '">';
                echo htmlspecialchars($formation["nom_formation"]);
                echo '</option>';

            }

            ?>

        </select>

        <br><br>

        <button type="submit" name="Ajouter">Ajouter</button>

    </form>

    <a href="index.php">Retour</a>

</body>
</html>
