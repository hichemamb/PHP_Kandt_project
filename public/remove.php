<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/bootstrap/css/style.css">
    <title>Supprimer</title>
</head>

<body>
<?php
require_once "../includes/connection.php";

$reqSql = 'SELECT
  `id`,`slug`,`title`,`h1`,`p`,`span-class`,`span-text`,`img-alt`,`img-src`,`nav-title` 
FROM 
  `page` 
WHERE 
  `id`=:id 
LIMIT 1';
$req = $pdo->prepare($reqSql);
$req->bindValue(':id',$_GET['id'], PDO::PARAM_INT);
$req->execute();

$pages=$req;

?>
<?php foreach ($pages as $thepage): ?>
<h1>Êtes vous sur de vouloir supprimer la page : <?= $thepage['nav-title']?> ? </h1>

<?php endforeach; ?>

<form method="post">
    <input type="submit" name="yes" value="Oui">
    <input type="submit" name="no" value="Non">
</form>


<?php

if(isset($_POST['yes']))
{
    require_once "doremove.php";
    header("Location: gestion.php");
}

if(isset($_POST['no']))
{
    header("Location: gestion.php");

}

?>

</body>

</html>