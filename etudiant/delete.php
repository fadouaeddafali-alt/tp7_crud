
<?php
require_once "../database/connexion.php";


$id = $_GET["id"] ?? null;

if ($id === null) {
    die("Identifiant manquant !");
}


$sql = "DELETE FROM etudiant WHERE id_etudiant = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);


header("Location: index.php");
exit();
?>
