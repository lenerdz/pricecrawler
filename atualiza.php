<?php
    include_once('functions/functions.php');
    salvarPrecos($_GET['nome'], $_GET['link'], $_GET['tipo'], $_GET['set']);
    $set = $_GET['set'];
    echo $set;
    header( "Location: lista.php?set=$set" );
?>