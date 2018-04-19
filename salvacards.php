<?php
include_once('functions/banco.php');
include_once('functions/functions.php');
ini_set('max_execution_time', 3000);

cardSave($_GET['page']);
echo "Salvo página ".$_GET['page']."<br>";

?>