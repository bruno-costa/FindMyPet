<?php
	//<!-- USAR apenas para ADD no bd e gerar JSON -->
	require '../../defaults/connectionDB.php';

	function EspecieInsert($conn, $classe_ID, $nome){

		$sql = "INSERT INTO Especie(classe_ID, nome) VALUES ($classe_ID, '$nome')";

		return $conn->query($sql);
	}

	function EspecieJSON_Classe($conn){

		$saida = '';

		$sql_classe = "SELECT nome, ID FROM Classe";

		$result_classe = $conn->query($sql_classe);

		if ($result_classe->num_rows > 0) {
			$saida .= '{"result":{"":[]';
			
			while($row_classe = $result_classe->fetch_assoc()) {

				$saida .= ',"'.$row_classe["nome"].'":[""';
				
				$sql = "SELECT nome, ID FROM Especie WHERE classe_ID = ".$row_classe["ID"];

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					
					while ($row = $result->fetch_assoc()) {

						$saida .= ',{"id":'.$row['ID'].',"nome":"'.$row["nome"].'"}';
					}

				}

				$saida .= ']';
				
			}


			$saida .= '}}';
		}

		return $saida;
	}

	function EspecieJSON($conn){
		$saida = '';

		$sql = "SELECT nome
				FROM Especie";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$saida .=  '{"result":["zero"';
			
			while($row = $result->fetch_assoc()) {

				$saida .= ',"'.$row["nome"].'"';
			}

			$saida .= ']}';
		}

		return $saida;
	}

	
	/*if (file_get_contents('php://input') == "json" || $_GET['m'] == 'json') {
		echo ClasseJSON($conn);
	} else {
		echo '{"msg":"erro@parametro"}';
	}*/

	$request = is_null($_GET['m']) ? file_get_contents('php://input') : $_GET['m'] ;

	if ($request == 'json') {
		echo EspecieJSON($conn);
	} elseif ($request == 'json-classe') {
		echo EspecieJSON_Classe($conn);
	} else {
		echo '{"msg":"erro@parametro"}';
	}
	

	$conn->close();

?>