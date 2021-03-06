<?php
/**
 * Created by PhpStorm.
 * User: hichemamb
 * Date: 07/05/2018
 * Time: 01:01
 */


if(isset($_POST['submit']))
{
    $id = $_GET['id'];
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
        $reqSql = ' UPDATE 
          `page` 
        SET 
          `slug` = :slug,`title` = :title,`h1` = :h1,`p` = :p,`span-class`= :spanClass,`span-text`= :spanText,`img-alt`= :imgAlt,`img-src`= :imgSrc,`nav-title`= :navTitle 
        WHERE 
          `id` = :id;';
        $req = $pdo->prepare($reqSql);
        $req->execute(array(
            'id'=>$id,
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
    }
}