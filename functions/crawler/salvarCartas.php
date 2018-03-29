<?php
    function salvarCartas($edicao) {
        //$target_url = "https://www.mtggoldfish.com/index/XLN#paper";
        $target_url = "https://www.mtggoldfish.com/index/{$edicao}";
        $html = new simple_html_dom();
        $html->load_file($target_url);

        preg_match_all('/href=.(\/price\/.*paper).>(.*)<\/a>/', $html,$result);

        $insertinto = "INSERT INTO cartas (edicao, nome, link) VALUES ";
        $initalQuery = "INSERT INTO cartas (edicao, nome, link) VALUES ";

        for ($i=0; $i < count($result[0]); $i++) { 
            $link = $result[1][$i];
            $nome = $result[2][$i];
            if(issaved($link, 'cartas', 'link')){
                echo "Card: {$nome} - Já existe no banco!<br>";
            } else {
                if($i > 0) $insertinto = $insertinto.",";
                $insertinto = $insertinto." ('$edicao','$nome','$link')";
                echo "Carta: {$nome} - Links: {$link}<br>";
            }
        }
        if($insertinto != $initalQuery) DBExecute($insertinto);
    }
?>