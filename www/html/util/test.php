<?php
//inicialização e tranformação de JSON para objeto
	require '../../defaults/connectionDB.php';

	$animal_ID = 14;
	$pedido = "Achado" ; //verifica se é pra rem em perdido ou achado
	$contato = "fulanofdscigrano";

//Geração do SQL para concluir o animal
 	//primeiro - obter o DATA do animal de perdido ou achado
	$sql = "SELECT data FROM $pedido WHERE animal_ID=$animal_ID";

	$result = $conn->query($sql);

	if ($result->num_rows == 1) {
		$data = $result->fetch_assoc()["data"];
		echo $data;
		echo "<br>";
		echo "pedido_val";
		//segundo - remover o animal de perdido ou achado
		$sql = "INSERT INTO Achado (animal_ID, data)
				VALUES (1, '$data')";
		echo $sql;
		if ($conn->query($sql) === TRUE) {
		    echo "Record test successfully";
		} else {
			echo "<br>fail";
		}

	} else {
		echo '{"sucess":false, "msg":"'.$conn->error.'"}';
		die();
	}
?>