<?php

/*
 * Отримує дані з views і обробляє їх за допомогою models
 * для забезпечення виводу новин
 */
$view = empty($_GET['view']) ? 'index' : $_GET['view'];
switch ($view) {
    //вивід новин
    case('NewsMethod'):
        $res = NewsModel::GetNews();
        break;
}
?>