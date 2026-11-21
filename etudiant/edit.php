
<?php
require_once "../database/connexion.php";

// Recuperer l'ID de l'etudiant
$id = $_GET["id"] ?? null;

if ($id === null) {
    die("Identifiant manquant !");
}

// Recuperer les informations de l'etudiant
$sql = "SELECT * FROM etudiant WHERE id_etudiant = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$etudiant) {
    die("Etudiant introuvable !");
}

// Recuperer la liste des formations
$sql2 = "SELECT * FROM formation";
$stmt2 = $pdo->query($sql2);
$formations = $stmt2->fetchAll(PDO::FETCH_ASSOC);

// Modifier l'etudiant apres l'envoi du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $id_formation = $_POST["id_formation"];

    $sql3 = "UPDATE etudiant
             SET nom = ?, prenom = ?, id_formation = ?
             WHERE id_etudiant = ?";

    $stmt3 = $pdo->prepare($sql3);

    $stmt3->execute([
        $nom,
        $prenom,
        $id_formation,
        $id
    ]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier Etudiant</title>
</head>

<body>

    <h2>Modifier un Etudiant</h2>

    <form method="POST">

        <label>Nom :</label>
        <input type="text" name="nom"
               value="<?php echo htmlspecialchars($etudiant['nom']); ?>"
               required>
        <br><br>

        <label>Prenom :</label>
        <input type="text" name="prenom"
               value="<?php echo htmlspecialchars($etudiant['prenom']); ?>"
               required>
        <br><br>

        <label>Formation :</label>

        <select name="id_formation" required>

            <?php foreach ($formations as $formation) { ?>

                <option value="<?php echo $formation['id_formation']; ?>"
                    <?php
                    if ($formation['id_formation'] == $etudiant['id_formation']) {
                        echo "selected";
                    }
                    ?>>

                    <?php echo htmlspecialchars($formation['nom_formation']); ?>

                </option>

            <?php } ?>

        </select>

        <br><br>

        <button type="submit">Modifier</button>

    </form>

    <br>

    <a href="index.php">Retour à la liste</a>

</body>
</html>
