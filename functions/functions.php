<?php
include_once('crawler/getEdicoes.php');
include_once('crawler/getNomes.php');
include_once('crawler/salvarPrecos.php');
include_once('crawler/salvarEdicoes.php');
include_once('crawler/salvarCartas.php');

function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }
    return false;
}

function saveimg($img, $folder) {
    if ($img) {
        $content = file_get_contents($img);
        file_put_contents($folder . '/image.jpg', $content);
    } else {
        echo "O caminho da imagem não pode ser vazio";
    }
}

function issaved($var, $table, $column) {
    $bank = DBRead($table,null,$column);
    return in_array_r($var, $bank);
}
?>