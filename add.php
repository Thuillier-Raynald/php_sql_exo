<?php
require('inc/pdo.php');
require('inc/function.php');
////////////////////////
// TRAITEMENT PHP
////////////////////////
// je declare un tableau pour les erreurs
$errors = array();
// je creer une variable pour la validation du formulaire
$success = FALSE;
// verification et securisation du formulaire
// le formulaire est-il vide ?
if (!empty($_POST['submitted'])) {
    // je securise (faille XSS)
    $author = trim(strip_tags($_POST['author']));
    $reve = trim(strip_tags($_POST['reve']));
    //////////////////////////////
    // VALIDATION DES CHAMPS
    //////////////////////////////
    // "author" => min 2 caracteres , max 100
    // methode sans fonction
    if (!empty($author)) {
        if (mb_strlen($author) < 2) {
            $errors['author'] = 'Minimum 2 caractères'; 
        } elseif (mb_strlen($author) >= 100) {
            $errors['author'] = 'Maximum 100 caractères';
        } else {
            // pas d'erreurs
        }
    } 
    else {
        $errors['author'] = 'Veuillez renseigner ce champ !!!';
    }
    // methode avec fonction
    // $errors = validInput($errors, $author, 'author', 2, 100);

    // "reve" => min 10 caracteres , max 255
    $errors = validInput($errors, $reve, 'reve', 10, 255);
    debug($errors);
    //////////////////////////////
    // INSERTION DANS LA BDD
    /////////////////////////////
    // je verifie si le tableau "errors" est vide
    if (count($errors) == 0) {
        // j'ecris la requete
        $sql = "INSERT INTO reves (author, reve, created_at) VALUES (:author, :reve, NOW())";
        // prepare la requete
        $query = $pdo->prepare($sql);
        // je securise
        $query->bindValue(':author', $author, PDO::PARAM_STR);
        $query->bindValue(':reve', $reve, PDO::PARAM_STR);
        // j execute
        $query->execute();
        // je redirige vers la page d'accueil
        header('Location: index.php');
        die();
    } else {
        echo 'Formulaire invalide';
    }
}   
//////////////////////////
// AFFICHAGE
//////////////////////////
include('inc/header.php');
?>

    <a href="index.php">ACCUEIL</a>
    <div class="wrap">
        <h1>Ajouter un rêve</h1>
        <hr>
        <form action="" method="POST">
            <label for="reve">Décrivez votre rêve</label>
            <br>
            <textarea name="reve" id="reve" cols="30" rows="10"><?php if(!empty($_POST['reve'])) { echo $_POST['reve']; }?></textarea>
            <span class="error"><?php if (!empty($errors['reve'])) { echo $errors['reve']; } ?></span>
            <br>
            <label for="author">Entrez le nom de l'auteur</label>
            <br>
            <input type="text" name="author" id="author" value="<?php if(!empty($_POST['author'])) { echo $_POST['author']; }?>">
            <span class="error"><?php if (!empty($errors['author'])) { echo $errors['author']; } ?></span>
            <br>
            <input type="submit" name="submitted" value="Envoyer">
        </form>
    </div>
    
    
    



  

<?php include('inc/footer.php');