<?php
    function setSave() {
        $url = "https://api.scryfall.com/sets/";
        $json = file_get_contents($url);
        $obj = json_decode($json, TRUE);

        $fields = [];
        $data = "";

        for ($i=0; $i < count($obj['data']); $i++) { 
            foreach ($obj['data'][$i] as $key => $value) {
                if(!in_array_r($key, $fields)) {
                    array_push($fields, $key);
                }
            }
        }
        for ($i=0; $i < count($obj['data']); $i++) { 
            if($i > 0) $data .= ", ";
            $data .= "(";
            foreach ($fields as $key => $value) {
                if($value != $fields[0]) $data .= ", ";
                $data .= '"'.@$obj['data'][$i][$value].'"';
            }
            $data .= ")";
        }
        $query = "INSERT INTO tb_setlist (".implode(", ", $fields).") VALUES ".$data;
        DBExecute("TRUNCATE `tb_setlist`");
        DBExecute($query);
    }
?>