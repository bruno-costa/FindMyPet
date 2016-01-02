<?php
	//<!-- USAR apenas para ADD no bd e gerar JSON -->
	require '../../defaults/connectionDB.php';

	function ClasseInsert($conn, $nome){

		$sql = "INSERT INTO Classe(nome) VALUES ('$nome')";

		return $conn->query($sql);
	}

	function ClasseJSON($conn){
		$saida = '';

		$sql = "SELECT nome
				FROM Classe";

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


	

	if (file_get_contents('php://input') == "json" || $_GET['m'] == 'json') {
		echo ClasseJSON($conn);
	} else {
		echo '{"msg":"erro@parametro"}';
	}

	//echo ClasseJSON($conn);
	//echo ClasseInsert($conn, "béçãô");

	$conn->close();

?>