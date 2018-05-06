<?php
    include_once('functions/functions.php');
    ini_set('max_execution_time', 3000);
    
    if(isset($_GET['set'])){
        salvarCartas($_GET['set'], $_GET['tipo']);
    }

    include_once('pages/header.php');

    listaEdicoes();

    include_once('pages/footer.php');
?>
