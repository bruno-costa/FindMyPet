<?php
	//<!-- USAR apenas para ADD no bd e gerar JSON -->
	require '../../defaults/connectionDB.php';

	function RedeSocialInsert($conn, $nome){

		$sql = "INSERT INTO RedeSocial(nome) VALUES ('$nome')";

		return $conn->query($sql);
	}

	function RedeSocialJSON($conn){
		$saida = '';

		$sql = "SELECT nome
				FROM RedeSocial";

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
		echo RedeSocialJSON($conn);
	} else {
		echo '{"msg":"erro@parametro"}';
	}

	$conn->close();

?>