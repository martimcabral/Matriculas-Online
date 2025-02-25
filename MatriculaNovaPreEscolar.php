<?php
	include('../db.php');
	
    session_start();
    $NIF_ALUNO = $_SESSION['NIF_ALUNO'];
	$NIF_EE = $_SESSION['NIF_EE'];
	
	$ESCOLA_1 = get_id($_POST["escola1"]);
	$ESCOLA_2 = get_id($_POST["escola2"]);
	$ESCOLA_3 = get_id($_POST["escola3"]);
	$ID_AZORES_ESCOLA = 1;

	$ALUNO_NOME = $_POST["AlunoNome"];
	$ALUNO_DATA_DE_NASCIMENTO = $_POST["AlunoDataDeNascimento"];
	$ALUNO_CARTAO_DE_CIDADAO = $_POST["AlunoCartaoDeCidadao"];
	$ALUNO_VALIDADE_CARTAO_DE_CIDADAO = $_POST["AlunoValidadeDoCartaoDeCidadao"];
	$ALUNO_NUMERO_DE_SEGURANCA_SOCIAL = $_POST["AlunoNumeroDeSegurancaSocial"];
	$ALUNO_INSTITUICAO_DE_SEGURANCA_SOCIAL = $_POST["AlunoInstituicaoDeSegurancaSocial"];
	$ALUNO_NUMERO_DE_UTENTE = $_POST["AlunoNumeroDeUtente"];
	$ALUNO_NATURALIDADE = $_POST["AlunoNaturalidadeFreguesia"];
	$ALUNO_CONSELHO = $_POST["AlunoConselho"];
	$ALUNO_MORADA = $_POST["AlunoMorada"];

	$PAI_NOME = $_POST["PaiNome"];
	$PAI_CARTAO_DE_CIDADAO = $_POST["PaiCartaoDeCidadao"];
	$PAI_VALIDADE_DO_CARTAO_DE_CIDADAO = $_POST["PaiValidadeDoCartaoDeCidadao"];
	$PAI_NIF = $_POST["PaiNumeroDeIdentificacaoFiscal"];
	$PAI_ESTADO_CIVIL = $_POST["PaiEstadoCivil"];
	$PAI_NATURALIDADE = $_POST["PaiNaturalidade"];
	$PAI_MORADA = $_POST["PaiMorada"];
	$PAI_CODIGO_POSTAL = $_POST["PaiCodigoPostal"];
	$PAI_EMAIL = $_POST["PaiEnderecoEmail"];
	$PAI_NUMERO_DE_TELEFONE = $_POST["PaiTelefoneTelemovel"];
	$PAI_LOCAL_DE_TRABALHO = $_POST["PaiLocalDeTrabalho"];
	$PAI_TELEFONE_DO_LOCAL_DE_TRABALHO = $_POST["PaiTelefoneDoLocalDeTrabalho"];

	$MAE_NOME = $_POST["MaeNome"];
	$MAE_CARTAO_DE_CIDADAO = $_POST["MaeCartaoDeCidadao"];
	$MAE_VALIDADE_DO_CARTAO_DE_CIDADAO = $_POST["MaeValidadeDoCartaoDeCidadao"];
	$MAE_NIF = $_POST["MaeNumeroDeIdentificacaoFiscal"];
	$MAE_ESTADO_CIVIL = $_POST["MaeEstadoCivil"];
	$MAE_NATURALIDADE = $_POST["MaeNaturalidade"];
	$MAE_MORADA = $_POST["MaeMorada"];
	$MAE_CODIGO_POSTAL = $_POST["MaeCodigoPostal"];
	$MAE_EMAIL = $_POST["MaeEnderecoEmail"];
	$MAE_NUMERO_DE_TELEFONE = $_POST["MaeTelefoneTelemovel"];
	$MAE_LOCAL_DE_TRABALHO = $_POST["MaeLocalDeTrabalho"];
	$MAE_TELEFONE_DO_LOCAL_DE_TRABALHO = $_POST["MaeTelefoneDoLocalDeTrabalho"];

	$EE_GRAU_DE_PARENTESCO = $_POST["GrauDeParentesco"];
	$EE_OUTRO_GRAU_DE_PARENTESCO = $_POST["OutroGrauDeParentesco"];
	$EE_NOME = $_POST["EENome"];
	$EE_CARTAO_DE_CIDADAO = $_POST["EECartaoDeCidadao"];
	$EE_VALIDADE_DO_CARTAO_DE_CIDADAO = $_POST["EEValidadeDoCartaoDeCidadao"];
	$EE_ESTADO_CIVIL = $_POST["EEEstadoCivil"];
	$EE_NATURALIDADE = $_POST["EENaturalidade"];
	$EE_MORADA = $_POST["EEMorada"];
	$EE_CODIGO_POSTAL = $_POST["EECodigoPostal"];
	$EE_EMAIL = $_POST["EEEnderecoEmail"];
	$EE_NUMERO_DE_TELEFONE = $_POST["EETelefoneTelemovel"];
	$EE_CONTACTO_DE_EMERGENCIA = $_POST["EEContactoDeEmergencia"];

	$ALUNO_JA_FREQUENTOU = $_POST["Frequentacao"];

	$DOENCAS_TEM_PROBLEMAS_DE_SAUDE = $_POST["ProblemasDeSaude"];
	$DOENCAS_DIABETES = get_checkbox_value($_POST["Diabetes"]);
	$DOENCAS_DOENCAS_MENTAIS = get_checkbox_value($_POST["DoencasMentais"]);
	$DOENCAS_DEFICIENCIA_FISICA = get_checkbox_value($_POST["DeficienciaFisica"]);
	$DOENCAS_ALCOOLISMO = get_checkbox_value($_POST["Alcoolismo"]);
	$DOENCAS_OUTRAS = $_POST["OutrosProblemasDeSaude"];
	$DOENCAS_QUAIS_OS_CUIDADOS_A_TER_EM_CONTA = $_POST["QuaisOsCuidadosDeSaudeATerEmConta"];
	
	$ALERGIAS_TEM = get_checkbox_value($_POST["TemAlgumaAlergia"]);
	$ALERGIAS_QUAIS = $_POST["QuaisAlergias"];
	$ALERGIAS_COMO_MANIFESTAM = $_POST["ComoSeManifestaAlergias"];
	
	$APRESENTA_NECESSIDADES_EDUCATIVAS_ESPECIAIS = $_POST["NecessidadesEducativasEspeciais"];

	$TEVE_ALGUM_IRMAO_A_FREQUENTAR_ANTES = $_POST["IrmaoFrequentarNucleoEscolar"];
	$IRMAO_FREQUENCIA_ANTERIOR = $_POST["IrmaoFrequentarNucleoEscolarEmQualEscola"];

	$ALMOCO_EM_CASA = get_checkbox_value($_POST["AlmocoEmCasa"]);
	$ALMOCO_NA_ESCOLA = get_checkbox_value($_POST["AlmocoNaEscola"]);
	$ALMOCO_DE_CASA = get_checkbox_value($_POST["AlmocoDeCasa"]);
	$ALMOCO_DA_ESCOLA = get_checkbox_value($_POST["AlmocoDaEscola"]);

	$QUEM_VEM_TRAZER_O_ALUNO = $_POST["QuemNormalmenteVemTrazer"];
	$QUEM_VEM_BUSCAR_O_ALUNO = $_POST["QuemNormalmenteVemBuscar"];

	$PESSOA_DE_CONFIANCA_NOME = $_POST["NomeDeQuemSePodeConfiar"];
	$PESSOA_DE_CONFIANCA_MORADA = $_POST["MoradaDeQuemSePodeConfiar"];
	$PESSOA_DE_CONFIANCA_NUMERO = $_POST["TelefoneDeQuemSePodeConfiar"];
	
	$ATL_VAI_FREQUENTAR = $_POST["VaiFrequentarATL"];
	$ATL_ONDE = $_POST["SeSimOndeATL"];

	$AUTORIZACAO_DE_IMAGENS_DO_ALUNO = $_POST["AutorizacaoDeImagens"];
	$CONCORDO_REGULAMENTO = $_POST["ConcordoRegulamento"];
	$CONCORDAR_REGULAMENTO_DA_ESCOLA = $_POST["concordar_regulamento_da_escola"];

	$OBSERVACOES = $_POST["Observacoes"];
	$ESTADO = $_POST["Estado"];

	$sql = "INSERT INTO matriculas_ficha_pre_escolar SET
		aluno_nif = ?,
		ee_nif = ?, 
		id_escola1 = ?, 
		id_escola2 = ?, 
		id_escola3 = ?, 
		id_azores_escola = ?, 
		aluno_nome = ?, 
		aluno_data_de_nascimento = ?, 
		aluno_cartao_de_cidadao = ?, 
		aluno_validade_do_cartao_de_cidadao = ?, 
		aluno_numero_seguranca_social = ?, 
		aluno_instituito_seguranca_social = ?, 
		aluno_numero_de_utente = ?, 
		aluno_naturalidade = ?, 
		aluno_conselho = ?, 
		aluno_morada = ?,
		pai_nome = ?,
		pai_cartao_de_cidadao = ?,
		pai_validade_cartao_de_cidadao = ?,
		pai_nif = ?,
		pai_estado_civil = ?,
		pai_naturalidade = ?,
		pai_morada = ?,
		pai_codigo_postal = ?,
		pai_email = ?,
		pai_numero_de_telefone = ?,
		pai_local_de_trabalho = ?,
		pai_telefone_do_local_de_trabalho = ?,
		mae_nome = ?,
		mae_cartao_de_cidadao = ?,
		mae_validade_do_cartao_de_cidadao = ?,
		mae_nif = ?,
		mae_estado_civil = ?, 
		mae_naturalidade = ?,
		mae_morada = ?,
		mae_codigo_postal = ?,
		mae_email =?,
		mae_numero_de_telefone = ?,
		mae_local_de_trabalho = ?,
		mae_telefone_do_local_de_trabalho = ?,
		ee_grau_de_parentesco = ?,
		ee_outro_grau_de_parentesco = ?,
		ee_nome = ?,
		ee_cartao_de_cidadao = ?,
		ee_validade_do_cartao_de_cidadao = ?,
		ee_estado_civil = ?,
		ee_naturalidade = ?,
		ee_morada = ?,
		ee_codigo_postal = ?,
		ee_email = ?,
		ee_numero_de_telefone = ?,
		ee_contacto_de_emergencia = ?,
		aluno_ja_frequentou = ?,
		doencas_tem_problemas_de_saude = ?,
		doencas_diabetes = ?,
		doencas_mentais = ?,
		doencas_deficiencia_fisica = ?,
		doencas_alcoolismo = ?,
		doencas_outras = ?,
		doencas_cuidados = ?,
		alergias_tem = ?,
		alergias_quais = ?,
		alergias_como_manifestam = ?,
		apresenta_necessidades_educativas_especiais = ?,
		teve_algum_irmao_a_frequentar_antes = ?,
		irmao_frequencia_anterior = ?,
		almoco_em_casa = ?, 
		almoco_na_escola = ?,
		almoco_de_casa = ?,
		almoco_da_escola = ?,
		quem_vem_trazer_o_aluno = ?,
		quem_ver_buscar_o_aluno = ?,
		pessoa_de_confianca_nome = ?,
		pessoa_de_confianca_morada = ?,
		pessoa_de_confianca_numero = ?,
		atl_vai_frequentar = ?,
		atl_onde = ?,
		autorizacao_de_imagens_do_aluno = ?,
		concordo_regulamento = ?,
		concordar_regulamento_da_escola = ?,
		observacoes = ?,
		estado = ?";
	
	// Preparar a instrução
	$stmt = $conn->prepare($sql);
	
	if (!$stmt) {
		die("Erro na preparação: " . $conn->error);
	}
	
	// Vincular os parâmetros
	$stmt->bind_param(
		'iiiiiissssisissssssisssssisisssisssssisissssssssssiissssssssssssssssssssssissssssi',
		$NIF_ALUNO, $NIF_EE, $ESCOLA_1, $ESCOLA_2, $ESCOLA_3, $ID_AZORES_ESCOLA, $ALUNO_NOME , $ALUNO_DATA_DE_NASCIMENTO, // 7
		$ALUNO_CARTAO_DE_CIDADAO, $ALUNO_VALIDADE_CARTAO_DE_CIDADAO, $ALUNO_NUMERO_DE_SEGURANCA_SOCIAL, $ALUNO_INSTITUICAO_DE_SEGURANCA_SOCIAL, // 4
		$ALUNO_NUMERO_DE_UTENTE, $ALUNO_NATURALIDADE, $ALUNO_CONSELHO, $ALUNO_MORADA, $PAI_NOME, $PAI_CARTAO_DE_CIDADAO, //  6
		$PAI_VALIDADE_DO_CARTAO_DE_CIDADAO, $PAI_NIF, $PAI_ESTADO_CIVIL, $PAI_NATURALIDADE, $PAI_MORADA, $PAI_CODIGO_POSTAL, // 6
		$PAI_EMAIL, $PAI_NUMERO_DE_TELEFONE, $PAI_LOCAL_DE_TRABALHO, $PAI_TELEFONE_DO_LOCAL_DE_TRABALHO, $MAE_NOME, // 5
		$MAE_CARTAO_DE_CIDADAO, $MAE_VALIDADE_DO_CARTAO_DE_CIDADAO, $MAE_NIF, $MAE_ESTADO_CIVIL, $MAE_NATURALIDADE, // 5
		$MAE_MORADA, $MAE_CODIGO_POSTAL, $MAE_EMAIL, $MAE_NUMERO_DE_TELEFONE, $MAE_LOCAL_DE_TRABALHO, $MAE_TELEFONE_DO_LOCAL_DE_TRABALHO, // 6
		$EE_GRAU_DE_PARENTESCO, $EE_OUTRO_GRAU_DE_PARENTESCO, $EE_NOME, $EE_CARTAO_DE_CIDADAO, $EE_VALIDADE_DO_CARTAO_DE_CIDADAO, $EE_ESTADO_CIVIL, // 6
		$EE_NATURALIDADE, $EE_MORADA, $EE_CODIGO_POSTAL, $EE_EMAIL, $EE_NUMERO_DE_TELEFONE, $EE_CONTACTO_DE_EMERGENCIA, // 6
		$ALUNO_JA_FREQUENTOU, $DOENCAS_TEM_PROBLEMAS_DE_SAUDE, $DOENCAS_DIABETES, $DOENCAS_DOENCAS_MENTAIS, $DOENCAS_DEFICIENCIA_FISICA, // 5
		$DOENCAS_ALCOOLISMO, $DOENCAS_OUTRAS, $DOENCAS_QUAIS_OS_CUIDADOS_A_TER_EM_CONTA, $ALERGIAS_TEM, $ALERGIAS_QUAIS, $ALERGIAS_COMO_MANIFESTAM, // 6
		$APRESENTA_NECESSIDADES_EDUCATIVAS_ESPECIAIS, $TEVE_ALGUM_IRMAO_A_FREQUENTAR_ANTES, $IRMAO_FREQUENCIA_ANTERIOR, // 3
		$ALMOCO_EM_CASA, $ALMOCO_NA_ESCOLA, $ALMOCO_DE_CASA, $ALMOCO_DA_ESCOLA, $QUEM_VEM_TRAZER_O_ALUNO, // 5
		$QUEM_VEM_BUSCAR_O_ALUNO, $PESSOA_DE_CONFIANCA_NOME, $PESSOA_DE_CONFIANCA_MORADA, $PESSOA_DE_CONFIANCA_NUMERO, // 4
		$ATL_VAI_FREQUENTAR, $ATL_ONDE, $AUTORIZACAO_DE_IMAGENS_DO_ALUNO, $CONCORDO_REGULAMENTO, $CONCORDAR_REGULAMENTO_DA_ESCOLA, $OBSERVACOES, $ESTADO // 7
	);
	
	// Executar a instrução
	if ($stmt->execute()) {
		echo '<script>alert("Matrícula inserida com sucesso!")</script>';
		echo '<script>history.back()</script>';
	} else {
		echo '<script>alert("Erro ao inserir os dados: "' . $stmt->error . ')</script>';
		echo '<script>history.back()</script>';
	}

	// Fechar a instrução e a conexão
	$stmt->close();
	$conn->close();

	// No caso da checkbox quando ela não é assinalada, retorna nulo, este código certefiqua que returna Sim ou Não.
	function get_checkbox_value($VAR) {
		if ($VAR == "") {
			return "Não";
		} else {
			return "Sim";
		}
	}

	function get_id($ESCOLA) {
		switch ($ESCOLA) {
			case "cardeal": return 1;
			case "covoada": return 2;
			case "milagres": return 3;
			case "outeiro": return 4;
			case "relva": return 5;
			case "cordeiro": return 6;
			case "arrifes": return 7;
		}
	}
?>