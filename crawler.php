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

getEdicoes();

/*
for ($i=0; $i < count($nomes[0]); $i++) { 
	salvarPrecos($nomes[2][$i],$nomes[1][$i],$edicao);
}
$target_url = "http://ligamagic.com.br/?view=cards/card&card=Terror&show=2&mesHistoricoInicio=2012-11&mesHistoricoFim=2017-11&campo=1";
$html = new simple_html_dom();
$html->load_file($target_url);

preg_match_all('(\[new Date\(([0-9, ]*)\)((, ?[0-9.]*|null)*)],?)', $html,$result);

var_dump($result);
*/
?>