<?php
/**
 * Created by PhpStorm.
 * User: hichemamb
 * Date: 01/05/2018
 * Time: 16:50
 */

if(isset($_POST['submit']))
{
    $slug = $_POST['slug'];
    $title = $_POST['title'];
    $h1 = $_POST['h1'];
    $p = $_POST['p'];
    $spanClass = $_POST['span-class'];
    $spanText = $_POST['span-text'];
    $imgAlt = $_POST['img-alt'];
    $imgSrc = $_POST['img-src'];
    $navTitle= $_POST['nav-title'];

    if(!empty($slug) && !empty($title) && !empty($h1) && !empty($p) && !empty($spanClass) && !empty($spanText) && !empty($imgAlt) && !empty($imgSrc) && !empty($navTitle)){

        require_once "../includes/connection.php";
        $reqSql = 'INSERT INTO 
          `page` (`id`,`slug`,`title`,`h1`,`p`,`span-class`,`span-text`,`img-alt`,`img-src`,`nav-title`) 
        VALUES
          (NULL, :slug, :title, :h1, :p, :spanClass, :spanText, :imgAlt, :imgSrc, :navTitle);';
        $req = $pdo->prepare($reqSql);
        $req->execute(array(
            'slug' => $slug,
            'title' => $title,
            'h1' => $h1,
            'p' => $p,
            'spanClass' => $spanClass,
            'spanText' => $spanText,
            'imgAlt' => $imgAlt,
            'imgSrc' => $imgSrc,
            'navTitle' => $navTitle));

        header("Location: gestion.php");

    } else echo '<script type="text/javascript">window.alert("Veuillez saisir tout les champs");</script>';
}
