<?php
	include('../db.php');
	
    session_start();
    $ALUNO_NIF = $_SESSION['NIF_ALUNO'];
	$EE_NIF = $_SESSION['NIF_EE'];
	
	$UNIDADE_ORGANICA = $_POST["unidade_organica"];
	$NOME_DA_ESCOLA = $_POST["nome_da_escola"];
	$LOCALIDADE = $_POST["localidade"];
	$ANO_DE_ESCOLARIDADE = $_POST["ano_de_escolaridade"];
	$TURMA = $_POST["turma"];
	$CURSO = $_POST["curso"];

	$ALUNO_NUMERO_DE_PROCESSO = $_POST["aluno_numero_de_processo"];
	$ALUNO_IDADE = $_POST["aluno_idade"];
	$ALUNO_NOME_COMPLETO = $_POST["aluno_nome_completo"];
	$ALUNO_NUMERO_DE_UTENTE = $_POST["aluno_numero_de_utente"];
	$ALUNO_CARTAO_DE_CIDADAO = $_POST["aluno_cartao_de_cidadao"];
	$ALUNO_NATURALIDADE = $_POST["aluno_naturalidade"];
	$ALUNO_CONSELHO = $_POST["aluno_conselho"];
	$ALUNO_DATA_DE_NASCIMENTO = $_POST["aluno_data_de_nascimento"];
	$ALUNO_NOME_DA_MAE = $_POST["aluno_nome_da_mae"];
	$ALUNO_NOME_DO_PAI = $_POST["aluno_nome_do_pai"];
	$ALUNO_RESIDENTE_EM = $_POST["aluno_residente_em"];
	$ALUNO_NUMERO_DA_RESIDENCIA = $_POST["aluno_numero_da_residencia"];
	$ALUNO_ANDAR_DA_RESIDENCIA = $_POST["aluno_andar_da_residencia"];
	$ALUNO_FREGUESIA = $_POST["aluno_freguesia"];
	$ALUNO_CODIGO_POSTAL = $_POST["aluno_codigo_postal"];
	$ALUNO_TELEMOVEL = $_POST["aluno_telemovel"];
	$ALUNO_TELEFONE = $_POST["aluno_telefone"];
	$ALUNO_EMAIL = $_POST["aluno_email"];
	$ALUNO_SEGURANCA_SOCIAL_BENEFICIARIO_NUMERO = $_POST["aluno_seguranca_social_beneficiario_numero"];
	$ALUNO_SEGURANCA_SOCIAL_INSTITUICAO = $_POST["aluno_seguranca_social_instituicao"];
	
	$EE_NOME_COMPLETO = $_POST["ee_nome_completo"];
	$EE_CARTAO_DE_CIDADAO = $_POST["ee_cartao_de_cidadao"];
	$EE_NUMERO_DE_UTENTE = $_POST["ee_numero_de_utente"];
	$EE_RESIDENTE_EM = $_POST["ee_residente_em"];
	$EE_NUMERO_DA_RESIDENCIA = $_POST["ee_numero_da_residencia"];
	$EE_ANDAR_DA_RESIDENCIA = $_POST["ee_andar_da_residencia"];
	$EE_FREGUESIA = $_POST["ee_freguesia"];
	$EE_CODIGO_POSTAL = $_POST["ee_codigo_postal"];
	$EE_TELEMOVEL = $_POST["ee_telemovel"];
	$EE_TELEFONE = $_POST["ee_telefone"];
	$EE_EMAIL = $_POST["ee_email"];
	$EE_GRAU_DE_PARENTESCO = $_POST["ee_grau_de_parentesco"];
	
	$EDUCACAO_MORAL_E_RELIGIOSA_CATOLICA = get_checkbox_value($_POST["educacao_moral_e_religiosa_catolica"]);
	$OUTRA_CONFISSAO_RELIGIOSA = get_checkbox_value($_POST["outra_confissao_religiosa"]);
	$OUTRA_CONFISSAO_RELIGIOSA_QUAL = $_POST["outra_confissao_religiosa_qual"];
	$AUXILIOS_ESCOLARES = get_checkbox_value($_POST["auxilios_escolares"]);
	$ALUNO_ESCALAO = $_POST["aluno_escalao"];
	$TRANSPORTE_ESCOLAR = get_checkbox_value($_POST["transporte_escolar"]);
	$LOCAL_DESEMBARQUE_FREGUESIA = $_POST["local_desembarque_freguesia"];
	$MANUAIS_ESCOLARES = get_checkbox_value($_POST["manuais_escolares"]);

	$BOLETIM_SAUDE_ATUALIZADO = get_checkbox_value($_POST["boletim_saude_atualizado"]);
	$PROBLEMAS_ESPECIFICOS_SAUDE = get_checkbox_value($_POST["problemas_especificos_saude"]);
	$PROBLEMAS_ESPECIFICOS_SAUDE_QUAIS = $_POST["problemas_especificos_saude_quais"];
	$PROBLEMAS_VISAO_AUDICAO = get_checkbox_value($_POST["problemas_visao_audicao"]);
	$PROBLEMAS_VISAO_AUDICAO_QUAIS = $_POST["problemas_visao_audicao_quais"];
	$AUTORIZACAO_PARTICIPAR_ATIVIDADES_DE_SAUDE = $_POST["autorizacao_participar_atividades_de_saude"];

	$AUTORIZACAO_IMAGENS_DO_ALUNO = get_checkbox_value($_POST["autorizacao_imagens_do_aluno"]);
	$AUTORIZACAO_ATIVIDADES_PROMOVIDAS_PELA_ESCOLA = get_checkbox_value($_POST["autorizacao_atividades_promovidas_pela_escola"]);
	$AUTORIZACAO_COPIA_DO_CARTAO_DE_CIDADAO = get_checkbox_value($_POST["autorizacao_copia_do_cartao_de_cidadao"]);
	$AUTORIZA_ENTRADA_SAIDA_LIVRE = get_checkbox_value($_POST["autoriza_entrada_saida_livre"]);
	$AUTORIZA_SAIDA_ULTIMO_TEMPO = get_checkbox_value($_POST["autoriza_saida_ultimo_tempo"]);
	$AUTORIZA_SAIDA_ACOMPANHADO = get_checkbox_value($_POST["autoriza_saida_acompanhado"]);
	$AUTORIZA_SAIDA_FUROS = get_checkbox_value($_POST["autoriza_saida_furos"]);
	$AUTORIZA_SAIDA_HORA_ALMOCO = get_checkbox_value($_POST["autoriza_saida_hora_almoco"]);
	$AUTORIZA_SAIDA_INTERVALOS = get_checkbox_value($_POST["autoriza_saida_intervalos"]);
	$SAIDA_DIA_SEG = get_checkbox_value($_POST["saida_dia_seg"]);
	$SAIDA_DIA_TER = get_checkbox_value($_POST["saida_dia_ter"]);
	$SAIDA_DIA_QUA = get_checkbox_value($_POST["saida_dia_qua"]);
	$SAIDA_DIA_QUI = get_checkbox_value($_POST["saida_dia_qui"]);
	$SAIDA_DIA_SEX = get_checkbox_value($_POST["saida_dia_sex"]);
	$SAIDA_DIA_SAB = get_checkbox_value($_POST["saida_dia_sab"]);
	$SAIDA_DIA_DOM = get_checkbox_value($_POST["saida_dia_dom"]);
	$AUTORIZACAO_PROSUCESSO = get_checkbox_value($_POST["autorizacao_prosucesso"]);
	
	$CONCORDAR_REGULAMENTO_DA_MATRICULA = $_POST["concordar_regulamento_da_matricula"];
	$CONCORDAR_REGULAMENTO_DA_ESCOLA = $_POST["concordar_regulamento_da_escola"];
	$OBSERVACOES = $_POST["observacoes"];
	$ESTADO = $_POST["estado"];

	$sql = "INSERT INTO matriculas_ficha_123_ciclos SET
		aluno_nif = ?,
		unidade_organica = ?,
		nome_da_escola = ?,
		localidade = ?,
		ano_de_escolaridade = ?,
		turma = ?,
		curso = ?,
		aluno_numero_de_processo = ?,
		aluno_idade = ?,
		aluno_nome_completo = ?,
		aluno_numero_de_utente = ?,
		aluno_cartao_de_cidadao = ?,
		aluno_naturalidade = ?,
		aluno_conselho = ?,
		aluno_data_de_nascimento = ?,
		aluno_nome_da_mae = ?,
		aluno_nome_do_pai = ?,
		aluno_residente_em = ?,
		aluno_numero_da_residencia = ?,
		aluno_andar_da_residencia = ?,
		aluno_freguesia = ?,
		aluno_codigo_postal = ?,
		aluno_telemovel = ?,
		aluno_telefone = ?,
		aluno_email = ?,
		aluno_seguranca_social_beneficiario_numero = ?,
		aluno_seguranca_social_instituicao = ?,
		ee_nome_completo = ?,
		ee_cartao_de_cidadao = ?,
		ee_nif = ?,
		ee_numero_de_utente = ?,
		ee_residente_em = ?,
		ee_numero_da_residencia = ?,
		ee_andar_da_residencia = ?,
		ee_freguesia = ?,
		ee_codigo_postal = ?,
		ee_telemovel = ?,
		ee_telefone = ?,
		ee_email = ?,
		ee_grau_de_parentesco = ?,
		educacao_moral_e_religiosa_catolica = ?,
		outra_confissao_religiosa = ?,
		outra_confissao_religiosa_qual = ?,
		auxilios_escolares = ?,
		aluno_escalao = ?,
		transporte_escolar = ?,
		local_desembarque_freguesia = ?,
		manuais_escolares = ?,
		boletim_saude_atualizado = ?,
		problemas_especificos_saude = ?,
		problemas_especificos_saude_quais = ?,
		problemas_visao_audicao = ?,
		problemas_visao_audicao_quais = ?,
		autorizacao_participar_atividades_de_saude = ?,
		autorizacao_imagens_do_aluno = ?,
		autorizacao_atividades_promovidas_pela_escola = ?,
		autorizacao_copia_do_cartao_de_cidadao = ?,
		autoriza_entrada_saida_livre = ?,
		autoriza_saida_ultimo_tempo = ?,
		autoriza_saida_acompanhado = ?,
		autoriza_saida_furos = ?,
		autoriza_saida_hora_almoco = ?,
		autoriza_saida_intervalos = ?,
		saida_dia_seg = ?,
		saida_dia_ter = ?,
		saida_dia_qua = ?,
		saida_dia_qui = ?,
		saida_dia_sex = ?,
		saida_dia_sab = ?,
		saida_dia_dom = ?,
		autorizacao_prosucesso = ?,
		concordar_regulamento_da_matricula = ?,
		concordar_regulamento_da_escola = ?,
		observacoes = ?,
		estado = ?
		";
	
	// Preparar a instrução
	$stmt = $conn->prepare($sql);
	
	if (!$stmt) {
		die("Erro na preparação: " . $conn->error);
	}
	
	// Vincular os parâmetros
	$stmt->bind_param(
		'issssssiisisssssssssssiisissssisssssiissssssssssssssssssssssssssssssssssssi',
		$ALUNO_NIF, $UNIDADE_ORGANICA, $NOME_DA_ESCOLA, $LOCALIDADE, $ANO_DE_ESCOLARIDADE, $TURMA, $CURSO, $ALUNO_NUMERO_DE_PROCESSO, // 8
		$ALUNO_IDADE, $ALUNO_NOME_COMPLETO, $ALUNO_NUMERO_DE_UTENTE, $ALUNO_CARTAO_DE_CIDADAO, $ALUNO_NATURALIDADE, $ALUNO_CONSELHO, // 6
		$ALUNO_DATA_DE_NASCIMENTO, $ALUNO_NOME_DA_MAE, $ALUNO_NOME_DO_PAI, $ALUNO_RESIDENTE_EM, $ALUNO_NUMERO_DA_RESIDENCIA, $ALUNO_ANDAR_DA_RESIDENCIA, // 6
		$ALUNO_FREGUESIA, $ALUNO_CODIGO_POSTAL, $ALUNO_TELEMOVEL, $ALUNO_TELEFONE, $ALUNO_EMAIL, $ALUNO_SEGURANCA_SOCIAL_BENEFICIARIO_NUMERO, // 6
		$ALUNO_SEGURANCA_SOCIAL_INSTITUICAO, $EE_NOME_COMPLETO, $EE_CARTAO_DE_CIDADAO, $EE_NIF, $EE_NUMERO_DE_UTENTE, $EE_RESIDENTE_EM, $EE_NUMERO_DA_RESIDENCIA, // 7
		$EE_ANDAR_DA_RESIDENCIA, $EE_FREGUESIA, $EE_CODIGO_POSTAL, $EE_TELEMOVEL, $EE_TELEFONE, $EE_EMAIL, $EE_GRAU_DE_PARENTESCO, // 7
		$EDUCACAO_MORAL_E_RELIGIOSA_CATOLICA, $OUTRA_CONFISSAO_RELIGIOSA, $OUTRA_CONFISSAO_RELIGIOSA_QUAL, $AUXILIOS_ESCOLARES, $ALUNO_ESCALAO, // 5
		$TRANSPORTE_ESCOLAR, $LOCAL_DESEMBARQUE_FREGUESIA, $MANUAIS_ESCOLARES, $BOLETIM_SAUDE_ATUALIZADO, $PROBLEMAS_ESPECIFICOS_SAUDE, // 5
		$PROBLEMAS_ESPECIFICOS_SAUDE_QUAIS, $PROBLEMAS_VISAO_AUDICAO, $PROBLEMAS_VISAO_AUDICAO_QUAIS, $AUTORIZACAO_PARTICIPAR_ATIVIDADES_DE_SAUDE, // 4
		$AUTORIZACAO_IMAGENS_DO_ALUNO, $AUTORIZACAO_ATIVIDADES_PROMOVIDAS_PELA_ESCOLA, $AUTORIZACAO_COPIA_DO_CARTAO_DE_CIDADAO, // 3
		$AUTORIZA_ENTRADA_SAIDA_LIVRE, $AUTORIZA_SAIDA_ULTIMO_TEMPO, $AUTORIZA_SAIDA_ACOMPANHADO, $AUTORIZA_SAIDA_FUROS, $AUTORIZA_SAIDA_HORA_ALMOCO, // 5
		$AUTORIZA_SAIDA_INTERVALOS, $SAIDA_DIA_SEG, $SAIDA_DIA_TER, $SAIDA_DIA_QUA, $SAIDA_DIA_QUI, $SAIDA_DIA_SEX, $SAIDA_DIA_SAB, $SAIDA_DIA_DOM, // 8
		$AUTORIZACAO_PROSUCESSO, $CONCORDAR_REGULAMENTO_DA_MATRICULA, $CONCORDAR_REGULAMENTO_DA_ESCOLA, $OBSERVACOES, $ESTADO // 5
	);
	
	// Executar a instrução
	if ($stmt->execute()) {
		echo '<script>alert("Matrícula inserida com sucesso!")</script>';
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