<?php

//inicialização e tranformação de JSON para objeto
	require '../../defaults/connectionDB.php';
	$novo = json_decode( file_get_contents('php://input') );
	$animal = $novo->animal;
	$pedido = ($novo->pedido == "p") ? "Perdido" : "Achado" ; //verifica se é pra add em perdido ou achado

//Geração do SQL para inserir novo animal
	$colName = "";
	$colValu = "";

	$colName .= "raca_ID, especie_ID, redeSocial_ID, link, sexo";
	$colValu .= "$animal->raca, $animal->especie, $animal->redeSocial, '$animal->link', '$animal->sexo'";

	//vefica se tem descrição
	if ( isset($animal->descricao) and $animal->descricao != "" ) {
		$colName .= ", descricao";
		$colValu .= ", '$animal->descricao'";
	}

	$sql = "INSERT INTO Animal ($colName) VALUES ($colValu)";
		//echo $sql; //debug


//execução a query gerada
	if ($conn->query($sql) === TRUE) {
		

	//faz a relação com perdido ou achado
		$animalID = $conn->insert_id;
		$sql = "INSERT INTO $pedido (animal_ID, data) VALUES ($animalID, CURDATE())";
		
			//echo $sql;//debug
		if ($conn->query($sql) === TRUE) {
			echo '{"sucess":true}';
		} else {
			echo '{"sucess":false, "msg":"'.$conn->error.'"}'; //refazer depois que tiver pronto
				//echo "Error: " . $sql . "<br>" . $conn->error; //debug
		}
	} else {
		echo '{"sucess":false, "msg":"'.$conn->error.'"}'; //refazer depois que tiver pronto
			//echo "Error: " . $sql . "<br>" . $conn->error; //debug
	}

	$conn->close();
?>