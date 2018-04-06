<?php
    // include_once('simple_html_dom.php');
    // include_once('functions/banco.php');
    include_once('functions/functions.php');

    if(!isset($_GET['card'])){
        header( "Location: localhost/preco" );
    }else{
        include_once('pages/header.php');
        listaPrecos($_GET['tipo'], $_GET['card']);
        include_once('pages/footer.php');
    }
?>