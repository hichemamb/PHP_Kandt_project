<?php
/**
 * Created by PhpStorm.
 * User: hichemamb
 * Date: 01/05/2018
 * Time: 16:50
 */
require_once "doadd.php";
require_once "../includes/connection.php";

?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/bootstrap/css/style.css">
    <title>Gestion</title>
</head>

<body>
<?php
$reqSql = 'SELECT
  `id`,`title` 
FROM 
  `page`';
$req = $pdo->prepare($reqSql);
$req->execute();

$pages=$req->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Liste des pages</h1>
<a class="lien" href="index.php">Revenir à l'accueil</a>


<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Action</th>
    </tr>

    <?php foreach ($pages as $thepage): ?>
        <tr>
            <td><?=$thepage['id']?></td>
            <td><?= $thepage['title']?></td>
            <td><a href="show.php?id=<?= $thepage['id']?>">Afficher</a></td>

        </tr>
    <?php endforeach; ?>
</table>

<?php require_once "../public/add.php"; ?>

</body>

</html>