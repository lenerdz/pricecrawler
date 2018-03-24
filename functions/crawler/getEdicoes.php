<?php
    function getEdicoes() {
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
?>