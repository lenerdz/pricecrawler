<?php
    function criaBancos() {
        $query = array("
        CREATE TABLE IF NOT EXISTS `teste1` (
        `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `nome` varchar(150) NOT NULL,
        `code` varchar(10) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;",
        
        
        "CREATE TABLE IF NOT EXISTS `teste2` (
        `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `nome` varchar(150) NOT NULL,
        `code` varchar(10) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8",
        
        
        "CREATE TABLE IF NOT EXISTS `teste3` (
        `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `nome` varchar(150) NOT NULL,
        `code` varchar(10) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8");

        foreach ($query as $key => $value) {
            echo DBExecute($value);
        }
    }
?>