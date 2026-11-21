<?php

require_once "../database/connexion.php";
$sql="SELECT * FROM formation";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$formations=$stmt->fetchAll(PDO::FETCH_ASSOC);
if(isset($_POST["Ajouter"])){
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $id_formation=$_POST["id_formation"];
    $sql="INSERT INTO formation(nom,prenom,id_formation) VALUES (:nom, :prenom, :id_formation)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([":name"=> $nom, ":prenom"=> $prenom, "id_formation"=>$id_formation]);
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout des enregistrements</title>
</head>
<body>
    <h2>Ajout d'un enregistrement</h2>
    <form method="POST">
        <label for="">nom :</label>
        <input type="text" name="nom" id="" required><br><br>
        <label for="">prenom :</label>
        <input type="text" name="prenom" id="" required><br><br>
        <label for="">formations:</label>
        <select name="id_formation" id="" required>
        <option value="">Choisir</option>
        <?php foreach($formations as $formation){?>
        <option value="<?php echo $formation["id_formation"]; ?>"><?php echo htmlspecialchars($formation["nom_formation"]); ?>
        </option>
        <?php } ?>
    </select>
    <br><br>
    <button type="submit" name="Ajouter">Ajouter</button>
    </form>
    
</body>
</html>