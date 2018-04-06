<?php
    function salvarPrecos($nome, $link, $tipo, $edicao) {

        $fixedlink = str_replace(" ", "+", $link);
        $fixedlink .= "#".$tipo;
        $target_url = "https://www.mtggoldfish.com{$fixedlink}";
        $html = new simple_html_dom();
        $html->load_file($target_url);
        $teste = [];
        $paper = true;

        //echo $fixedlink;

        preg_match_all('/n(2.*?),(.*?)";/i', $html,$result);
        //teste do regex pra achar #tab-paper, senão ativa o online

        $insertinto = "INSERT INTO precos (nome, edicao, data, preco, site, link, tipo) VALUES ";

        for ($i=0; $i < count($result[0]); $i++) { 
            //echo $result[1][$i] . " - " . $result[2][$i];
            $data = $result[1][$i];
            $preco = $result[2][$i];
            if($i > 0) $insertinto = $insertinto.",";
            $insertinto = $insertinto." ('$nome','$edicao', '$data', '$preco', 'mtggoldfish', '$fixedlink'";
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
        //echo "Card {$nome} ok!<br>";
    }
?>