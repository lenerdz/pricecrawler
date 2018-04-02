<?php
    function salvarCartas($edicao, $tipo) {
        //$target_url = "https://www.mtggoldfish.com/index/XLN#paper";
        $target_url = "https://www.mtggoldfish.com/index/{$edicao}#{$tipo}";
        $html = new simple_html_dom();
        $html->load_file($target_url);

        preg_match_all('/href=.(\/price\/.*'.$tipo.').>(.*)<\/a>/', $html,$result);
        preg_match_all('/data-full-image="(.*?)"( data-full-image1="(.*?)")?/', $html,$imagens);

        $insertinto = "INSERT INTO cartas (edicao, nome, link, tipo) VALUES ";
        $initalQuery = "INSERT INTO cartas (edicao, nome, link, tipo) VALUES ";
        var_dump($result);

        for ($i=0; $i < count($result[0]); $i++) { 
            $link = $result[1][$i];
            $nome = $result[2][$i];
            saveimg($imagens[1][$i], $nome, $edicao);
            if($imagens[3][$i]) saveimg($imagens[3][$i], $nome, $edicao);
            if(issaved($link, 'cartas', 'link')){
                //echo "Card: {$nome} - Já existe no banco!<br>";
            } else {
                if($i > 0) $insertinto = $insertinto.",";
                $insertinto = $insertinto." ('$edicao','$nome','$link', '$tipo')";
                //echo "Carta: {$nome} - Links: {$link}<br>";
            }
        }
        if($insertinto != $initalQuery) DBExecute($insertinto);
    }
?>