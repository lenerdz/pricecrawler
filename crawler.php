<?php
include_once('simple_html_dom.php');
include_once('functions/banco.php');
include_once('functions/functions.php');

$regexEdicoes = "<a href='\/index\/([A-z,0-9]*)'.*\n<img.*>\n(.*)"; //mudar a captura pra antes do index
$regexCartas = 'href="(\/price\/.*paper")>(.*)<\/a>';
$regexMTGgoldfish = '/n(2.*?),(.*?)";/i';
$regexLigaMagic =  '(\[new Date\(([0-9, ]*)?\), ([0-9.]*)],?)';
$regexLigaMagic2 = '(\[new Date\([0-9, ]*\)(, ?[0-9.]*|null)*],?)';
$regexLigaMagicSets = "dataTable.addColumn\('number', '(.*?)'\); ?";
$regexLigaMagicCompleto = "(dataTable.addColumn\('number', '(.*?)'\); ?)+[\n ]*dataTable.addRows.*[\n ]*(\[new Date\(([0-9, ]*)\)(, ?[0-9.]*|null)*],?)*";


$link1 = "/price/Ixalan/Vraska+Relic+Seeker#paper";
$edicao = "Ixalan";

ini_set('max_execution_time', 3000); //300 seconds = 5 minutes

//http://www.mtggoldfish.com/price/Revised+Edition/Underground+Sea#paper

// $nomes = getNomes();
// var_dump($nomes);

//salvarCartas('HOU', 'paper');

//salvarEdicoes();

// $local = 'https://cdn1.mtggoldfish.com/images/gf/Insectile%2BAberration%2B%255BV17%255D.jpg';
// saveimg($local, './img', 'aberracao', 'LEB');

// $target_url = "https://www.mtggoldfish.com/index/V17";
// $html = new simple_html_dom();
// $html->load_file($target_url);

// preg_match_all('/data-full-image="(.*?)"(.*data-full-image1="(.*?)")*/', $html,$result);

// var_dump($result);

criaBancos();

?>