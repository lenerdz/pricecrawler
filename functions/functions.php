<?php
include_once('simple_html_dom.php');
include_once('functions/banco.php');
include_once('crawler/salvarPrecos.php');
include_once('crawler/salvarEdicoes.php');
include_once('crawler/salvarCartas.php');
include_once('crawler/listaEdicoes.php');
include_once('crawler/listaCartas.php');
include_once('crawler/listaPrecos.php');
include_once('crawler/scryfall/setSave.php');
include_once('crawler/scryfall/cardSave.php');

function in_array_r($needle, $haystack, $strict = false) {
    if($haystack) {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
                return true;
            }
        }
    }
    return false;
}

function saveimg($img, $nome, $edicao) {
    if ($img) {
        $folder = 'img';
        $content = file_get_contents($img);
        $dir = $folder . "/{$edicao}/";
        //echo $dir;
        if (!file_exists($dir)) {
            mkdir($dir);
        }
        file_put_contents($dir . "{$nome}.jpg", $content);
    } else {
        echo "O caminho da imagem não pode ser vazio";
    }
}

function issaved($var, $table, $column) {
    $bank = DBRead($table,null,$column);
    return in_array_r($var, $bank);
}
?>