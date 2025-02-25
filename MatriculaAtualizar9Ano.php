<?php
	include('../db.php');
	
    $ALUNO_NIF = $_POST['aluno_nif'];
	$EE_NIF = $_POST['ee_nif'];
	
	$ALUNO_NOME = $_POST['aluno_nome'];
	$EE_NOME = $_POST['ee_nome'];

	$PORTUGUES = get_checkbox_value($_POST['portugues']);
	$INGLES = get_checkbox_value($_POST['ingles']);
	$FRANCES = get_checkbox_value($_POST['frances']);
	$HISTORIA = get_checkbox_value($_POST['historia']);
	$HGCA = get_checkbox_value($_POST['hgca']);
	$MATEMATICA = get_checkbox_value($_POST['matematica']);
	$CIENCIAS_NATURAIS = get_checkbox_value($_POST['ciencias_naturais']);
	$FISICO_QUIMICA = get_checkbox_value($_POST['fisico_quimica']);
	$EDUCACAO_VISUAL = get_checkbox_value($_POST['educacao_visual']);
	$EDUCACAO_TECNOLOGICA = get_checkbox_value($_POST['educacao_tecnologica']);
	$TIC = get_checkbox_value($_POST['tecnologia_da_informacao_e_Comunicacao']);
	$EDUCACAO_FISICA = get_checkbox_value($_POST['educacao_fisica']);
	$CIDADANIA = get_checkbox_value($_POST['cidadania']);
	$DPS = get_checkbox_value($_POST['dps']);
	$EDUCACAO_MUSICAL = get_checkbox_value($_POST['educacao_musical']);
	$FOTOGRAFIA_E_VIDEO = get_checkbox_value($_POST['fotografia_e_video']);
	$MORAL = get_checkbox_value($_POST['moral']);

	$CONCORDAR_REGULAMENTO_DA_ESCOLA = $_POST["concordar_regulamento_da_escola"];
	$OBSERVACOES = $_POST["observacoes"];
	$ESTADO = $_POST["estado"];

	// Query SQL com placeholders
	$sql = "UPDATE matriculas_ficha_9ano_dss SET 
		aluno_nome = ?,
		ee_nif = ?,
		ee_nome = ?,
		portugues = ?,
		ingles = ?,
		frances = ?,
		historia = ?,
		hgca = ?,
		matematica = ?,
		ciencias_naturais = ?,
		fisico_quimica = ?,
		educacao_visual = ?,
		educacao_tecnologica = ?,
		tic = ?,
		educacao_fisica = ?,
		cidadania = ?,
		dps = ?,
		educacao_musical = ?,
		fotografia_e_video = ?,
		moral = ?,
		concordar_regulamento_da_escola = ?,
		observacoes = ?,
		estado = ?
	WHERE aluno_nif = ?";

	// Preparar a instrução
	$stmt = $conn->prepare($sql);
	
	if (!$stmt) {
		die("Erro na preparação: " . $conn->error);
	}

	$stmt->bind_param(
		'sissssssssssssssssssssii',
		$ALUNO_NOME, $EE_NIF, $EE_NOME, $PORTUGUES, $INGLES, $FRANCES, // 6
		$HISTORIA, $HGCA, $MATEMATICA, $CIENCIAS_NATURAIS, $FISICO_QUIMICA, $EDUCACAO_VISUAL,  // 6
		$EDUCACAO_TECNOLOGICA, $TIC, $EDUCACAO_FISICA, $CIDADANIA, $DPS, $EDUCACAO_MUSICAL, // 6
		$FOTOGRAFIA_E_VIDEO, $MORAL, $CONCORDAR_REGULAMENTO_DA_ESCOLA, $OBSERVACOES, $ESTADO, $ALUNO_NIF // 6
	);
	
	// Executar a consulta
	if ($stmt->execute()) {
		echo '<script>alert("Matrícula atualizada com sucesso!")</script>';
		echo '<script>history.back()</script>';
	} else {
		echo '<script>alert("Erro na execução: "' . $stmt->error . '")</script>';
		echo '<script>history.back()</script>';
	}
	
	// Fechar a instrução e a conexão
	$stmt->close();
	$conn->close();

	function get_checkbox_value($VAR) {
		switch ($VAR) {
			case "Sim": return "Sim";
			case "Não": return "Não";
			case null: return "Não";

		}
	}
?>