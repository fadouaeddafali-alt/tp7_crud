
<?php
require_once "../database/connexion.php";

$id = $_GET["id"] ?? null;

if ($id === null) {
    die("Identifiant manquant !");
}


$sql = "SELECT * FROM module WHERE id_module = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$module = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$module) {
    die("Module introuvable !");
}


$sql2 = "SELECT * FROM formation";
$stmt2 = $pdo->query($sql2);
$formations = $stmt2->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom_module"];
    $coefficient = $_POST["coefficient"];
    $id_formation = $_POST["id_formation"];

    $sql3 = "UPDATE module SET nom_module = ?, coefficient = ?, id_formation = ? WHERE id_module = ?";
    $stmt3 = $pdo->prepare($sql3);
    $stmt3->execute([$nom, $coefficient, $id_formation, $id]);

    header("Location: index.php");
    exit();
}
?>

<h2>Modifier un Module</h2>

<form method="POST">
    Nom du module :
    <input type="text" name="nom_module"
           value="<?php echo htmlspecialchars($module['nom_module']); ?>"
           required><br><br>

    Coefficient :
    <input type="number" name="coefficient"
           value="<?php echo htmlspecialchars($module['coefficient']); ?>"
           required><br><br>

    Formation :
    <select name="id_formation" required>
        <?php foreach ($formations as $formation) { ?>
            <option value="<?php echo $formation['id_formation']; ?>"
                <?php if ($formation['id_formation'] == $module['id_formation']) echo "selected"; ?>>
                <?php echo htmlspecialchars($formation['nom_formation']); ?>
            </option>
        <?php } ?>
    </select><br><br>

    <button type="submit">Modifier</button>
</form>
