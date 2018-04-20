<?php
    function rulingSave($offset) {
        $qtd = DBExecute("SELECT tc.nid, tr.id, tr.card_id FROM tb_cardlist tc, tb_rulings tr WHERE tr.card_id = tc.id ORDER BY tr.id DESC LIMIT 1");
        var_dump($qtd);
        $ids = DBRead('tb_cardlist','LIMIT 10 OFFSET '.$offset,'id');
        
        $data = '';

        for ($i=0; $i < count($ids); $i++) {
            
            usleep(10000);
            $url = "https://api.scryfall.com/cards/".$ids[$i]['id']."/rulings";     //URL Alvo
            $json = file_get_contents($url);                    //Objeto com o conteúdo da URL
            $obj = json_decode($json, TRUE);
            var_dump($obj);

            for ($j=0; $j < count($obj['data']); $j++) { 

                $data .= ' ("'.$ids[$i]['id'].'", ';

                foreach ($obj['data'][$j] as $key => $value) {
                    $data .= '"'.$value.'"';
                    if($key != 'comment') $data .= ", ";
                    //echo ($key.": ".$value."<br>");
                }

                $data .= ")";
                
                if (!($i == count($ids)-1 && $j == count($obj['data'])-1)) {
                    $data .= ",";
                }

            }
                       
            //echo ($url);
            echo "<br><br>---------------------------------$i------------------------------------<br><br>";
        }

        echo $data;

        $query = "INSERT INTO tb_rulings (card_id, object, source, published_at, comment) VALUES".$data;
        //DBExecute("TRUNCATE `tb_rulings`");
        //DBExecute($query);
    }

    function cardRuleSave($id) {
        $url = "https://api.scryfall.com/cards/".$id."/rulings";     //URL Alvo
        $json = file_get_contents($url);                    //Objeto com o conteúdo da URL
        $obj = json_decode($json, TRUE);
        $data = '';

        for ($j=0; $j < count($obj['data']); $j++) { 

            if ($j != 0) {
                $data .= ",";
            }

            $data .= ' ("'.$ids[$i]['id'].'", ';

            foreach ($obj['data'][$j] as $key => $value) {
                $data .= '"'.$value.'"';
                if($key != 'comment') $data .= ", ";
            }

            $data .= ")";

        }
        $query = "INSERT INTO tb_rulings (card_id, object, source, published_at, comment) VALUES".$data;
        //Verificar se existe antes de apagar
        DBExecute($query);
    }
?>