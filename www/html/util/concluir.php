<?php

//inicialização e tranformação de JSON para objeto
	require '../../defaults/connectionDB.php';
	$novo = json_decode( file_get_contents('php://input') );

	$animal_ID = $novo->animalID;
	$pedido_val = $novo->pedido;
	$pedido = $pedido_val == "p" ? "Perdido" : "Achado" ; //verifica se é pra rem em perdido ou achado
	$contato = $novo->contato;

//Geração do SQL para concluir o animal
 	//primeiro - obter o DATA do animal de perdido ou achado
	$sql = "SELECT data FROM $pedido WHERE animal_ID=$animal_ID";

	$result = $conn->query($sql);

	if ($result->num_rows == 1) {
		$data = $result->fetch_assoc()["data"];
	} else {
		echo '{"sucess":false, "msg":"'.$conn->error.'"}';
		die();
	}

	//segundo - inserir o animal em concluido
	$sql = "INSERT INTO Concluido (animal_ID, contato, como_cadastrado, data_entrada, data_saida)
			VALUES ($animal_ID, '$contato', '$pedido_val', '$data', CURDATE())";

//Salvar no BD
	if ($conn->query($sql) === TRUE) {
		//por ultimo - remover o animal de perdido ou achado
		$sql = "DELETE FROM $pedido WHERE animal_ID=$animal_ID";

		if ($conn->query($sql) === TRUE) {
			echo '{"sucess":true}';
		} else {
			echo '{"sucess":false, "msg":"'.$conn->error.'"}';
		}
	} else {
		echo '{"sucess":false, "msg":"'.$conn->error.'"}'; //refazer depois que tiver pronto
			//echo "Error: " . $sql . "<br>" . $conn->error; //debug
	}

	$conn->close();
?>