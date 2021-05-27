<?php
require('inc/pdo.php');
require('inc/function.php');
////////////////////////
// TRAITEMENT PHP
////////////////////////
$page = 1;
$parPage = 3;
$offset = 0;
if (!empty($_GET['page'])) {
    $page = $_GET['page'];
    $offset = ($page - 1) * $parPage;
}
// nombre total de "reves" dans la BDD
$sql = "SELECT COUNT(id) FROM reves;";
$query = $pdo->prepare($sql);
$query->execute();
$count = $query->fetchColumn();
//debug($count);

// creation de la requete
$sql = "SELECT * FROM reves ORDER BY created_at DESC LIMIT $parPage OFFSET $offset";
// preparation de la requete
$query = $pdo->prepare($sql);
// j'execute la requete
$query->execute();
$reves = $query->fetchAll();
//debug($reves);

//////////////////////////
// AFFICHAGE
//////////////////////////
include('inc/header.php');
?>
<p>Nombre de rêves dans la base : <?php echo $count; ?></p>
<div class="link">
    <?php pagination($page, $parPage, $count) ?>
</div>
<?php
foreach ($reves as $reve) : ?>
    <div class="reves">
        <p class="reve">Le rêve : <?php echo $reve['reve']; ?></p>
        <p class="author">Auteur : <?php echo $reve['author']; ?></p>
        <p class="date">Le : <?php echo date('d/m/Y H:i', strtotime($reve['created_at'])); ?></p>
        <a href="likes.php?id=<?php echo $reve['id']; ?>">likes <?php echo $reve['likes']; ?></a>
        <a href="dislikes.php?id=<?php echo $reve['id']; ?>">dislikes <?php echo $reve['dislikes']; ?></a>
        <br>
        <a href="add.php">Ajouter un rêve</a>
    </div>
    <div class="link">
        <?php pagination($page, $parPage, $count) ?>
    </div>
<?php endforeach;






include('inc/footer.php');
