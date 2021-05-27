<?php

function debug($x)
{
    echo '<pre>';
    print_r($x);
    echo '</pre>';
}

function validInput(array $errors, string $data, string $key, int $min, int $max)
{
    if(!empty($data)) {
        if (mb_strlen($data) < $min) {
            $errors[$key] = 'Entrez au minimum ' . $min . ' caractères';
        } elseif (mb_strlen($data) > $max) {
            $errors[$key] = 'Entrrez au maximum ' . $max . ' caractères';
        } else {
            // pas d'erreurs
        }
    } else {
        $errors[$key] = 'Veuillez renseigner ce champ';
    }
    return $errors;
}

function pagination(int $page, int $parPage, int $count)
{
    echo '<ul>';
    if ($page > 1) {
        echo '<li><a href="index.php?page='. ($page -1) .'">Précédent</a></li>';
    } if ($page * $parPage < $count) {
        echo '<li><a href="index.php?page='. ($page +1) .'">Suivant</a></li>';
    }
    echo '</ul>';
}