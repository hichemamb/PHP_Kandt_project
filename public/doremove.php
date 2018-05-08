<?php
/**
 * Created by PhpStorm.
 * User: hichemamb
 * Date: 06/05/2018
 * Time: 15:36
 */



require_once "../includes/connection.php";

$delete = $pdo->prepare('DELETE FROM `page` WHERE `id`=:id LIMIT 1');
$delete->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

$delete->execute();