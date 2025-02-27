<?php
	include('../db.php');

	$id = $_GET['id'];
	$matricula = $_GET['matricula'];
	$ESTADO = $_GET['estado'];

	echo $id . "<br>" . $matricula . "<br>" . $ESTADO;


	if ($matricula == 1) {
		$sql = "UPDATE matriculas_ficha_pre_escolar SET estado = ? WHERE id = ?";
	} else if ($matricula == 2) {
		$sql = "UPDATE matriculas_ficha_123_ciclos SET estado = ? WHERE id = ?";
	} else if ($matricula == 3) {
		$sql = "UPDATE matriculas_ficha_9ano_dss SET estado = ? WHERE id = ?";
	} else {
		die("Valor da Matricula Inválido.");
	}

	$stmt = $conn->prepare($sql);
	if (!$stmt) {
		die("Erro na preparação: " . $conn->error);
	}

	$stmt->bind_param('si', $ESTADO, $id);

	if ($stmt->execute()) {
		echo "<script>alert('Matrícula enviada com sucesso!');</script>";
		echo "<script>history.back();</script>";
	} else {
		echo "<script>alert('Erro na execução: " . $stmt->error . "');</script>";
		echo "<script>history.back();</script>";
	}

	$stmt->close();
	$conn->close();
?>