<?php
    include_once('functions/functions.php');

        $cardid = $_POST['cardid'];
        $query = DBRead("cartas","where id=$cardid", "link");
        var_dump($query);
        //select
        $target_url = "https://www.mtggoldfish.com{$query[0]['link']}";
        $html = new simple_html_dom();
        $html->load_file($target_url);
        $teste = [];
        $paper = true;

        //echo $fixedlink;

        preg_match_all('/n(2.*?),(.*?)";/i', $html,$result);
        //teste do regex pra achar #tab-paper, senão ativa o online

        $insertinto = "INSERT INTO newprices (cardid, price, date) VALUES ";

        for ($i=0; $i < count($result[0]); $i++) { 
            //echo $result[1][$i] . " - " . $result[2][$i];
            $data = $result[1][$i];
            $preco = $result[2][$i];
            if($i > 0) $insertinto = $insertinto.",";
            $insertinto = $insertinto." ('$cardid','$preco', '$data')";
        }

        DBExecute($insertinto);
        //echo "Card {$nome} ok!<br>";
?>