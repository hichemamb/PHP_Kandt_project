<?php
/**
 * Created by PhpStorm.
 * User: hichemamb
 * Date: 01/05/2018
 * Time: 16:50
 */
require_once "../includes/connection.php";
?>


<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion</title>
</head>

<body>
<?php
$show = $pdo->prepare('SELECT `id`,`slug`,`title`,`h1`,`p`,`span-class`,`span-text`,`img-alt`,`img-src`,`nav-title` FROM `page` WHERE `id`=:id');
$show->bindValue(':id',$_GET['id'], PDO::PARAM_INT);
$show->execute();

$pages=$show; ?>

<h1>Liste des pages</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Slug</th>
        <th>Title</th>
        <th>h1</th>
        <th>p</th>
        <th>span-class</th>
        <th>span-text</th>
        <th>img-alt</th>
        <th>img-src</th>
        <th>nav-title</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($pages as $thepage): ?>
        <tr>
            <td><?=$thepage['id']?></td>
            <td><?= $thepage['slug']?></td>
            <td><?= $thepage['title']?></td>
            <td><?= $thepage['h1']?></td>
            <td><?= $thepage['p']?></td>
            <td><?= $thepage['span-class']?></td>
            <td><?= $thepage['span-text']?></td>
            <td><?= $thepage['img-alt']?></td>
            <td><?= $thepage['img-src']?></td>
            <td><?= $thepage['nav-title']?></td>
            <td><a href="remove.php?id=<?= $thepage['id']?>">Supprimer</a></td>
            <td><a href="edit.php?id=<?= $thepage['id']?>">Modifier</a></td>


        </tr>

    <?php endforeach; ?>
</table>




</body>

</html>