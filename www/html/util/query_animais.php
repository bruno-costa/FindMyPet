<?php 
	require '../../defaults/connectionDB.php';
	$pedido = (file_get_contents('php://input') == "p") ? "Perdido" : "Achado"; //verifica se é pra add em perdido ou achado
	
//Fazer a query e obter todos os animais relacionados
	$sql = "SELECT Animal.*
			FROM Animal
			INNER JOIN $pedido
			ON Animal.ID=$pedido.animal_ID";

	$result = $conn->query($sql);

//Construindo o JSON
	if ($result->num_rows > 0) {
			// echo $result->num_rows; //debug
		$resultArray = array();
		while($row = $result->fetch_assoc()) {
			// echo print_r($row); //debug
			$resultArray[] = $row;
		}

		echo json_encode($resultArray);
	} else {
		echo "{}";
	}
	$conn->close();
?>