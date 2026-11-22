
<?php
require_once "../database/connexion.php";

$id = $_GET["id"];

$sql = "DELETE FROM formation WHERE id_formation = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("location:index.php");
exit();
?>
