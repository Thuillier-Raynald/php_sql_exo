<?php
require('inc/pdo.php');
require('inc/function.php');
////////////////////////
// TRAITEMENT PHP
////////////////////////
//echo $_GET['id'];

// je verifie que l'id n'est pas vide
if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
    // je recupere l'id
    $id = $_GET['id'];
    //echo $_GET['id'];
    // je verifie que l'id existe dans la BDD
    $sql = "SELECT * FROM reves WHERE id = :id";    
    // je prepare
    $query = $pdo->prepare($sql);
    // je securise
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    // j'execute
    $query->execute();
    // je recupere
    $result = $query->fetch();
    // je teste si vide 
    if(empty($result)) {
       die('L\'id n\'existe pas !!!');
    } else {
        // je fais la requete
        $sql = "UPDATE reves SET dislikes = dislikes + 1 WHERE id = :id";
        // je prepare
        $query = $pdo->prepare($sql);
        // je securise
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        // j'execute
        $query->execute();
        debug($result);
    }
}   
// redirection vers la page accueil
header('Location: index.php');
die();

//////////////////////////
// AFFICHAGE
//////////////////////////
include('inc/header.php');
?>

    <a href="index.php">ACCUEIL</a>
  



  

<?php include('inc/footer.php');