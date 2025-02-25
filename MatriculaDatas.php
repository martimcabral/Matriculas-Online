<?php
	include('../db.php');
    
    $DATA_INICIO = $_POST['DataDeInicio'];
	$DATA_FIM = $_POST['DataDoFim'];

    if (empty($DATA_INICIO) || empty($DATA_FIM)) {
		echo "<script>alert('Erro: Datas não podem ser vazias!');</script>";
		echo "<script>history.back();</scrtipt>";
    }

    if (strtotime($DATA_INICIO) >= strtotime($DATA_FIM)) {
        echo "<script>alert('Erro: Data de início não pode ser posterior à data de fim!');</script>";
		echo "<script>history.back();</scrtipt>";
    }

	$sql = "UPDATE matriculas_configuracao SET 
		data_de_inicio = ?, 
		data_de_fim = ?
    WHERE id = 1";

	$stmt = $conn->prepare($sql);
	
	if (!$stmt) {
		die("Erro na preparação: " . $conn->error);
	}

 	$stmt->bind_param(
		'ss',
		$DATA_INICIO, $DATA_FIM
	);
	
	if ($stmt->execute()) {
		echo "<script>alert('Datas atualizadas com sucesso!');</script>";
		echo "<script>history.back();</script>";
	} else {
		echo "<script>alert('Erro na execução: " . $stmt->error . "');</script>";
		echo "<script>history.back();</script>";
	}
	
	$stmt->close();
	$conn->close();
?>