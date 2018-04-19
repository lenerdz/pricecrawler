<?php
    function cardSave() {
        $url = "https://api.scryfall.com/cards?page=1";     //URL Alvo
        $json = file_get_contents($url);                    //Objeto com o conteúdo da URL
        $obj = json_decode($json, TRUE);                    //Objeto decodificado

        var_dump($obj['data'][0]);

        $fields = [];                                       //Inicializa a variável com os campos
        $data = "";                                         //Inicializa a variável com os dados

        for ($i=0; $i < count($obj['data']); $i++) {        //Primeiro loop, para extrair todas as cartas
            foreach ($obj['data'][$i] as $key => $value) {  //Primeiro loop aninhado, para percorrer todos os campos
                if(!in_array_r($key, $fields)) {            //Se o campo atual não existir na array, o adiciona
                    array_push($fields, $key); 
                }
            }
        }
        for ($i=0; $i < count($obj['data']); $i++) {        //Segundo loop, para extrair os dados
            if($i > 0) $data .= ", ";                       //Se não for o primeiro item, adiciona uma vírgula entre eles
            $data .= "(";                                   //Parentese inicial
            foreach ($fields as $key => $value) {           //Segundo loop aninhado, percorre todas as cartas, buscando
                if($value != $fields[0]) $data .= ", ";     //      cada um dos campos
                if(is_array(@$obj['data'][$i][$value])){    //Se o dado for um array, o converte em String
                    $obj['data'][$i][$value] = serialize($obj['data'][$i][$value]);
                }
                $data .= '"'.@$obj['data'][$i][$value].'"';
            }
            $data .= ")";
        }
        var_dump($fields);
        var_dump($obj['data'][0]);
        // $query = "INSERT INTO tb_setlist (".implode(", ", $fields).") VALUES ".$data;
        // DBExecute("TRUNCATE `tb_setlist`");
        // DBExecute($query);
    }
?>