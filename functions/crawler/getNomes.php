<?php
    function getNomes() {
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
?>