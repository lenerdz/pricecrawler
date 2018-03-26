<?php
    function salvarEdicoes() {
        $target_url = "https://www.mtggoldfish.com/prices/select";
        $html = new simple_html_dom();
        $html->load_file($target_url);

        preg_match_all("/<a href='\/index\/([A-z,0-9]*)'.*\n<img.*>\n(.*)/", $html,$result);

        $insertinto = "INSERT INTO edicoes (nome, code) VALUES ";

        for ($i=0; $i < count($result[0]); $i++) { 
            $link = $result[1][$i];
            $nome = $result[2][$i];
            if($i > 0) $insertinto = $insertinto.",";
            $insertinto = $insertinto." ('$nome','$link')";
            echo "Carta: {$nome} - Links: {$link}<br>";
        }
        DBExecute($insertinto);
    }
?>