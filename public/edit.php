<?php
/**
 * Created by PhpStorm.
 * User: hichemamb
 * Date: 07/05/2018
 * Time: 01:01
 */


require_once "../includes/connection.php";

$show = $pdo->prepare('SELECT `slug`,`title`,`h1`,`p`,`span-class`,`span-text`,`img-alt`,`img-src`,`nav-title` FROM `page` WHERE `id`=:id');
$show->bindValue(':id',$_GET['id'], PDO::PARAM_INT);
$show->execute();

$row = $show ->fetch(PDO::FETCH_ASSOC);

?>


<h1>Modification de la page </h1>

<form method="POST">
    <label>slug:</label>
    <input type="text" name="slug" value="<?= $row['slug']?>"></br></br>

    <label>title:</label>
    <input type="text" name="title" value="<?= $row['title']?>"></br></br>

    <label>h1:</label>
    <input type="text" name="h1" value="<?= $row['h1']?>"></br></br>

    <label>p:</label>
    <input type="text" name="p" value="<?= $row['p']?>"></br></br>

    <label>span-class:</label>
    <input type="text" name="span-class" value="<?= $row['span-class']?>"></br></br>

    <label>span-text:</label>
    <input type="text" name="span-text" value="<?= $row['span-text']?>"></br></br>

    <label>img-alt:</label>
    <input type="text" name="img-alt" value="<?= $row['img-alt']?>"></br></br>

    <label>img-src:</label>
    <input type="text" name="img-src" value="<?= $row['img-src']?>"></br></br>

    <label>nav-title:</label>
    <input type="text" name="nav-title" value="<?= $row['nav-title']?>"></br></br>

    <input type="submit" name="submit" value="Envoyer"></br></br>
</form>
