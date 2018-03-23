<?php
	function DBRead($table, $params = null, $fields = '*'){ //Pesquisa automática
		$params = ($params) ? " {$params}" : null;

		$query = "SELECT {$fields} FROM {$table}{$params}";
		$result = DBExecute($query);

		if(!mysqli_num_rows($result))
			return false;
		else {
			while ($res = mysqli_fetch_assoc($result)){
				$data[] = $res;
			}

			return $data;
		}
	}

	function DBPureQuery($query){	//Pesquisa Manual
		$query = DBProtect($query);	
		$result = DBExecute($query);

		if(!mysqli_num_rows($result))
			return false;
		else {
			while ($res = mysqli_fetch_assoc($result)){
				$data[] = $res;
			}

			return $data;
		}
	}

	function DBCreate($table, array $data){	// Inserção de valores na tabela
		$data = DBProtect($data);

		$fields = implode(', ', array_keys($data));
		$values = "'".implode(', ', $data)."'";

		$query = "INSERT INTO {$table} ( {$fields} ) VALUES ( {$values} )";

		return $query;
	}

	function DBExecute($query){	//Executa uma query
		$link = DBConnect();
		$result = @mysqli_query($link, $query) or die(mysqli_error($link));

		DBClose($link);
		return $result;
	}

?>