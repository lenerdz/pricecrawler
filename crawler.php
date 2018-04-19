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

//criaBancos();

// $insertinto = "INSERT INTO `tb_setlist` (`code`, `mtgo_code`, `name`, `set_type`, `released_at`, `block_code`, `block`, `parent_set_code`, `card_count`, `digital`, `foil_only`, `icon_svg_uri`, `search_uri`, `uri`, `scryfall_uri`) VALUES ";

// for ($i=0; $i < count($obj['data']); $i++) { 
//     //var_dump($obj['data'][$i]);
//     $insert = $obj['data'][$i];
//     if($i > 0) $insertinto = $insertinto.",";
//     @$insertinto = $insertinto."  ('$insert[code]', '$insert[mtgo_code]', '$insert[name]', '$insert[set_type]', '$insert[released_at]', '$insert[block_code]', '$insert[block]', '$insert[parent_set_code]', '$insert[card_count]', '$insert[digital]', '$insert[foil_only]', '$insert[icon_svg_uri]', '$insert[search_uri]', '$insert[uri]', '$insert[scryfall_uri]')";
//     // echo("DONE");
// }
// //DBExecute($insertinto);
// echo ($insertinto);

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <button type="button" class="btn btn-primary" id="att">atualiza</button>
    <div id="destino"></div>
    <div id="test"></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    $( document ).ready(function() {
        $('#att').click(function () {
            elemento = $(this);
            elemento.toggle();
            for (let index = 1; index <= 229; index++) {
                $("#test").load("salvacards.php?page="+index);
            }
            elemento.toggle();
        });

    });
    </script>
  </body>
</html>