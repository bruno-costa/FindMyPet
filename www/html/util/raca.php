<?php
	//<!-- USAR apenas para ADD no bd e gerar JSON -->
	require '../../defaults/connectionDB.php';

	function RacaInsert($conn, $especie_ID, $nome){

		$sql = "INSERT INTO Raca(especie_ID, nome) VALUES ($especie_ID, '$nome')";

		return $conn->query($sql);
	}

	function RacaJSON_Especie($conn){

		$saida = '';

		$sql_classe = "SELECT nome, ID FROM Especie";

		$result_classe = $conn->query($sql_classe);

		if ($result_classe->num_rows > 0) {
			$saida .= '{"result":{"":[]';
			
			while($row_classe = $result_classe->fetch_assoc()) {

				$saida .= ',"'.$row_classe["nome"].'":[""';
				
				$sql = "SELECT nome, ID FROM Raca WHERE especie_ID = ".$row_classe["ID"];

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

	function RacaJSON($conn){
		$saida = '';

		$sql = "SELECT nome
				FROM Raca";

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

	$request = is_null($_GET['m']) ? file_get_contents('php://input') : $_GET['m'] ;

	if ($request == 'json') {
		echo RacaJSON($conn);
	} elseif ($request == 'json-especie') {
		echo RacaJSON_Especie($conn);
	} else {
		echo '{"msg":"erro@parametro"}';
	}
	

	$conn->close();

?>