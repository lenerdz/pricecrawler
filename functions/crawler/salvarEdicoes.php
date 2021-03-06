<?php
    function salvarEdicoes() {
        $target_url = "https://www.mtggoldfish.com/prices/select";
        $html = new simple_html_dom();
        $html->load_file($target_url);

        preg_match_all("/<a href='\/index\/([A-z,0-9,-]*)'.*\n<img.*>\n(.*)/", $html,$result);
        preg_match_all('/sprite-set_symbols_(.*?)" src="(.*?)"/', $html,$icones);

        $insertinto = "INSERT INTO edicoes (nome, code) VALUES ";
        $initalQuery = "INSERT INTO edicoes (nome, code) VALUES ";
        $currentBank = DBRead('edicoes',null,'code');

        for ($i=0; $i < count($icones[0]); $i++) { 
            saveimg($icones[2][$i], 'img', $icones[1][$i], 'seticons');
        }

        for ($i=0; $i < count($result[0]); $i++) { 
            $link = $result[1][$i];
            $nome = $result[2][$i];
            if(in_array_r($link, $currentBank)){
                //echo "Edição: {$nome} - Já existe no banco!<br>";
            } else {
                if($i > 0) $insertinto = $insertinto.",";
                $insertinto = $insertinto." ('$nome','$link')";
                //echo "Carta: {$nome} - Links: {$link}<br>";
            }
        }
        if($insertinto != $initalQuery) DBExecute($insertinto);
    }
?>