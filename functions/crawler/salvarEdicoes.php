<?php
    function in_array_r($needle, $haystack, $strict = false) {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
                return true;
            }
        }
        return false;
    }

    function salvarEdicoes() {
        $target_url = "https://www.mtggoldfish.com/prices/select";
        $html = new simple_html_dom();
        $html->load_file($target_url);

        preg_match_all("/<a href='\/index\/([A-z,0-9]*)'.*\n<img.*>\n(.*)/", $html,$result);

        $insertinto = "INSERT INTO edicoes (nome, code) VALUES ";
        $currentBank = DBRead('edicoes',null,'code');

        for ($i=0; $i < count($result[0]); $i++) { 
            $link = $result[1][$i];
            $nome = $result[2][$i];
            if(in_array_r($link, $currentBank)){
                echo "Edição: {$nome} - Já existe no banco!<br>";
            } else {
                if($i > 0) $insertinto = $insertinto.",";
                $insertinto = $insertinto." ('$nome','$link')";
                echo "Carta: {$nome} - Links: {$link}<br>";
            }
        }
        DBExecute($insertinto);
    }
?>