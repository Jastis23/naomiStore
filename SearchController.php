<?php

/*
 * Отримує дані з views і обробляє їх за допомогою models
 * для забезпечення пошуку 
 */
session_start();
$view = empty($_GET['view']) ? 'index' : $_GET['view'];
switch ($view) {
    case('SearchMethod'):
        $text = $_GET['text'];
        $_SESSION['search'] = SearchModel::Search($text);
        header('location:index.php?view=search');
        break;
}
?>