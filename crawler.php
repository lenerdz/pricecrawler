<?php
include_once('simple_html_dom.php');
include_once('config.php');
include_once('connection.php');
include_once('database.php');

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
function salvarPrecos($nome, $link, $edicao) {


	$target_url = "https://www.mtggoldfish.com/{$link}";
	$html = new simple_html_dom();
	$html->load_file($target_url);
	$teste = [];
	$paper = true;

	preg_match_all('/n(2.*?),(.*?)";/i', $html,$result);
	//teste do regex pra achar #tab-paper, senão ativa o online

	$insertinto = "INSERT INTO price (nome, edicao, data, preco, site, tipo) VALUES ";

	for ($i=0; $i < count($result[0]); $i++) { 
		//echo $result[1][$i] . " - " . $result[2][$i];
		$data = $result[1][$i];
		$preco = $result[2][$i];
		if($i > 0) $insertinto = $insertinto.",";
		$insertinto = $insertinto." ('$nome','$edicao', '$data', '$preco', 'mtggoldfish'";
		if (in_array($result[1][$i], $teste)) {
			$paper = false;
		} else {
			array_push($teste, $result[1][$i]);
		}
		if($paper){
			$insertinto = $insertinto.", 'papel')";
		} else {
			$insertinto = $insertinto.", 'online')";
		}
		//echo "Data: {$data}<br>Preço:{$preco}<br><br>";
	}

	DBExecute($insertinto);
	echo "Card {$nome} ok!<br>";
}

function salvarNomes() {
	//$target_url = "https://www.mtggoldfish.com/index/XLN#paper";
	$target_url = "https://www.mtggoldfish.com/index/LEB";
	$html = new simple_html_dom();
	$html->load_file($target_url);

	preg_match_all('/href=.(\/price\/.*paper).>(.*)<\/a>/', $html,$result);

	for ($i=0; $i < count($result[0]); $i++) { 
		$link = $result[1][$i];
		$nome = $result[2][$i];
		echo "Carta: {$nome} - Link: {$link}<br>";
	}
	return $result;
}

function salvarEdicoes() {
	$target_url = "https://www.mtggoldfish.com/prices/select";
	$html = new simple_html_dom();
	$html->load_file($target_url);

	preg_match_all("/<a href='\/index\/([A-z,0-9]*)'.*\n<img.*>\n(.*)/", $html,$result);

	for ($i=0; $i < count($result[0]); $i++) { 
		$link = $result[1][$i];
		$nome = $result[2][$i];
		echo "Carta: {$nome} - Link: {$link}<br>";
	}
}
/*
$nomes = salvarNomes();
//var_dump($nomes);

for ($i=0; $i < count($nomes[0]); $i++) { 
	salvarPrecos($nomes[2][$i],$nomes[1][$i],$edicao);
}*/
$target_url = "http://ligamagic.com.br/?view=cards/card&card=Terror&show=2&mesHistoricoInicio=2012-11&mesHistoricoFim=2017-11&campo=1";
$html = new simple_html_dom();
$html->load_file($target_url);

preg_match_all('(\[new Date\(([0-9, ]*)\)((, ?[0-9.]*|null)*)],?)', $html,$result);

var_dump($result);
?>