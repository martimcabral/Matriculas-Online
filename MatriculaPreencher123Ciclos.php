<?php
	# Funcionamento dos Estados das Matriculas
	/*
		0 - Primeira vez a ser criada, pode ser aleterada
		1 - Pertence a Secretaria, NAO pode ser alterada
		2 - Pertence ao Diretor de Turma, NAO pode ser alterada
		3 - Pertence à Informatica, NAO pode ser alterada
	*/

	include('../db.php');

	$sql_ano_escolar_ativo = "SELECT * FROM anoescolar WHERE ativo = '1' AND id_azores_escola = 1";
	$result_ano_escolar_ativo = $conn->query($sql_ano_escolar_ativo);

	if ($result_ano_escolar_ativo && $result_ano_escolar_ativo->num_rows > 0) {
		$AnoEscolarAtivo = $result_ano_escolar_ativo->fetch_assoc();
		$IAnoSelecionado = $AnoEscolarAtivo['id'];
		echo "Ano Letivo: " . $IAnoSelecionado;
	} else {
		$IAnoSelecionado = null;
	}
	
	$sql_ano_letivo_atual = "SELECT anoescolar FROM anoescolar WHERE id = $IAnoSelecionado";
	$result_ano_letivo_atual = $conn->query($sql_ano_letivo_atual);

	if ($result_ano_letivo_atual && $result_ano_letivo_atual->num_rows > 0) {
		$row = $result_ano_letivo_atual->fetch_assoc();
		$ANO_LETIVO_ATUAL = $row['anoescolar'];
	} else {
		$ANO_LETIVO_ATUAL = null;
	}

	session_start();
    $NIF_ALUNO = $_SESSION['NIF_ALUNO'];
	$NIF_EE = $_SESSION['NIF_EE'];

	$ano_escolar = $IAnoSelecionado - 1;

	$sql_detetar_matricula_anterior = "SELECT * 
		FROM dadosescolares 
		WHERE processo = (
			SELECT processo 
			FROM alunos 
			WHERE nif_aluno = " . $NIF_ALUNO . " AND nifee = " . $NIF_EE . "
		) 
		AND id_azores_escola = 1 
		AND anoescolar = " . $ano_escolar . ";
		";

	$result_detetar_matricula_anterior = $conn->query($sql_detetar_matricula_anterior);

	if ($result_detetar_matricula_anterior && $result_detetar_matricula_anterior->num_rows > 0) {
		while ($row = $result_detetar_matricula_anterior->fetch_assoc()) {
			$ENCONTROU_MATRICULA_ANTERIOR = true;
		}
	} else {
		$ENCONTROU_MATRICULA_ANTERIOR = false;
	}
    
    $sql_matriculas = "SELECT * FROM matriculas_ficha_123_ciclos WHERE aluno_nif = $NIF_ALUNO AND ee_nif = $NIF_EE";
    $result_matriculas = $conn->query($sql_matriculas);

	$sql_alunos = "SELECT * FROM alunos WHERE nif_aluno = $NIF_ALUNO AND nifee = $NIF_EE";
    $result_alunos = $conn->query($sql_alunos);
    
    if ($result_matriculas->num_rows >0) {
        while($row = $result_matriculas->fetch_assoc()) {
            $ENCONTROU_NAS_MATRICULAS = true;

			$UNIDADE_ORGANICA = $row["unidade_organica"];
			$NOME_DA_ESCOLA = $row["nome_da_escola"];
			$LOCALIDADE = $row["localidade"];
			$ANO_DE_ESCOLARIDADE = $row["ano_de_escolaridade"];
			$TURMA = $row["turma"];
			$CURSO = $row["curso"];

			$ALUNO_NUMERO_DE_PROCESSO = $row["aluno_numero_de_processo"];
			$ALUNO_NIF = $row["aluno_nif"];
			$ALUNO_IDADE = $row["aluno_idade"];
			$ALUNO_NOME_COMPLETO = $row["aluno_nome_completo"];
			$ALUNO_NUMERO_DE_UTENTE = $row["aluno_numero_de_utente"];
			$ALUNO_CARTAO_DE_CIDADAO = $row["aluno_cartao_de_cidadao"];
			$ALUNO_NATURALIDADE = $row["aluno_naturalidade"];
			$ALUNO_CONSELHO = $row["aluno_conselho"];
			$ALUNO_DATA_DE_NASCIMENTO = $row["aluno_data_de_nascimento"];
			$ALUNO_NOME_DA_MAE = $row["aluno_nome_da_mae"];
			$ALUNO_NOME_DO_PAI = $row["aluno_nome_do_pai"];
			$ALUNO_RESIDENTE_EM = $row["aluno_residente_em"];
			$ALUNO_NUMERO_DA_RESIDENCIA = $row["aluno_numero_da_residencia"];
			$ALUNO_ANDAR_DA_RESIDENCIA = $row["aluno_andar_da_residencia"];
			$ALUNO_FREGUESIA = $row["aluno_freguesia"];
			$ALUNO_CODIGO_POSTAL = $row["aluno_codigo_postal"];
			$ALUNO_TELEMOVEL = $row["aluno_telemovel"];
			$ALUNO_TELEFONE = $row["aluno_telefone"];
			$ALUNO_EMAIL = $row["aluno_email"];
			$ALUNO_SEGURANCA_SOCIAL_BENEFICIARIO_NUMERO = $row["aluno_seguranca_social_beneficiario_numero"];
			$ALUNO_SEGURANCA_SOCIAL_INSTITUICAO = $row["aluno_seguranca_social_instituicao"];
			
			$EE_NOME_COMPLETO = $row["ee_nome_completo"];
			$EE_CARTAO_DE_CIDADAO = $row["ee_cartao_de_cidadao"];
			$EE_NIF = $row["ee_nif"];
			$EE_NUMERO_DE_UTENTE = $row["ee_numero_de_utente"];
			$EE_RESIDENTE_EM = $row["ee_residente_em"];
			$EE_NUMERO_DA_RESIDENCIA = $row["ee_numero_da_residencia"];
			$EE_ANDAR_DA_RESIDENCIA = $row["ee_andar_da_residencia"];
			$EE_FREGUESIA = $row["ee_freguesia"];
			$EE_CODIGO_POSTAL = $row["ee_codigo_postal"];
			$EE_TELEMOVEL = $row["ee_telemovel"];
			$EE_TELEFONE = $row["ee_telefone"];
			$EE_EMAIL = $row["ee_email"];
			$EE_GRAU_DE_PARENTESCO = $row["ee_grau_de_parentesco"];
			
			$EDUCACAO_MORAL_E_RELIGIOSA_CATOLICA = $row["educacao_moral_e_religiosa_catolica"];
			$OUTRA_CONFISSAO_RELIGIOSA = $row["outra_confissao_religiosa"];
			$OUTRA_CONFISSAO_RELIGIOSA_QUAL = $row["outra_confissao_religiosa_qual"];
			$AUXILIOS_ESCOLARES = $row["auxilios_escolares"];
			$ALUNO_ESCALAO = $row["aluno_escalao"];
			$TRANSPORTE_ESCOLAR = $row["transporte_escolar"];
			$LOCAL_DESEMBARQUE_FREGUESIA = $row["local_desembarque_freguesia"];
			$MANUAIS_ESCOLARES = $row["manuais_escolares"];

			$BOLETIM_SAUDE_ATUALIZADO = $row["boletim_saude_atualizado"];
			$PROBLEMAS_ESPECIFICOS_SAUDE = $row["problemas_especificos_saude"];
			$PROBLEMAS_ESPECIFICOS_SAUDE_QUAIS = $row["problemas_especificos_saude_quais"];
			$PROBLEMAS_VISAO_AUDICAO = $row["problemas_visao_audicao"];
			$PROBLEMAS_VISAO_AUDICAO_QUAIS = $row["problemas_visao_audicao_quais"];
			$AUTORIZACAO_PARTICIPAR_ATIVIDADES_DE_SAUDE = $row["autorizacao_participar_atividades_de_saude"];

			$AUTORIZACAO_IMAGENS_DO_ALUNO = $row["autorizacao_imagens_do_aluno"];
			$AUTORIZACAO_ATIVIDADES_PROMOVIDAS_PELA_ESCOLA = $row["autorizacao_atividades_promovidas_pela_escola"];
			$AUTORIZACAO_COPIA_DO_CARTAO_DE_CIDADAO = $row["autorizacao_copia_do_cartao_de_cidadao"];
			$AUTORIZA_ENTRADA_SAIDA_LIVRE = $row["autoriza_entrada_saida_livre"];
			$AUTORIZA_SAIDA_ULTIMO_TEMPO = $row["autoriza_saida_ultimo_tempo"];
			$AUTORIZA_SAIDA_ACOMPANHADO = $row["autoriza_saida_acompanhado"];
			$AUTORIZA_SAIDA_FUROS = $row["autoriza_saida_furos"];
			$AUTORIZA_SAIDA_HORA_ALMOCO = $row["autoriza_saida_hora_almoco"];
			$AUTORIZA_SAIDA_INTERVALOS = $row["autoriza_saida_intervalos"];
			$SAIDA_DIA_SEG = $row["saida_dia_seg"];
			$SAIDA_DIA_TER = $row["saida_dia_ter"];
			$SAIDA_DIA_QUA = $row["saida_dia_qua"];
			$SAIDA_DIA_QUI = $row["saida_dia_qui"];
			$SAIDA_DIA_SEX = $row["saida_dia_sex"];
			$SAIDA_DIA_SAB = $row["saida_dia_sab"];
			$SAIDA_DIA_DOM = $row["saida_dia_dom"];
			$AUTORIZACAO_PROSUCESSO = $row["autorizacao_prosucesso"];
			
			$CONCORDAR_REGULAMENTO_DA_MARTICULA = $row["concordar_regulamento_da_matricula"];
			$CONCORDAR_REGULAMENTO_DA_ESCOLA = $row["concordar_regulamento_da_escola"];
			$OBSERVACOES = $row["observacoes"];
			$ESTADO = $row["estado"];

        }
    } else  {
        $ENCONTROU_NAS_MATRICULAS = false;

		if ($result_alunos->num_rows >0) {
			while($row = $result_alunos->fetch_assoc()) {
				$ENCONTROU_NOS_ALUNOS = true;

				$ALUNO_NOME_COMPLETO = $row["nome"];
				$ALUNO_CARTAO_DE_CIDADAO = $row["ccaluno"];
				$EE_NOME_COMPLETO = $row["nomeee"];
				$EE_CARTAO_DE_CIDADAO = $row["ccee"];
				$ALUNO_NATURALIDADE = $row["naturalidade"];
				$ALUNO_CONSELHO = $row["freguesia"];
				$EE_TELEMOVEL = $row["telemovelee"];
				$EE_EMAIL = $row["emailee"];
				$ALUNO_DATA_DE_NASCIMENTO = $row["datanascimento"];
    		}
		} else {
			$ENCONTROU_NOS_ALUNOS = false;
		}
	}
?>

<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/circular-std/style.css">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="../assets/vendor/inputmask/css/inputmask.css" />
    <title><?php echo $nomesite; ?></title>
</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand"><?php echo $TituloAplicacao; ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                    </ul>
                </div>
            </nav>
        </div>

		<?php 
			if ($ENCONTROU_NAS_MATRICULAS == true) {
				echo "<form action='MatriculaAtualizar123Ciclos.php' method='POST'>";
			} else {
				echo "<form action='MatriculaNova123Ciclos.php' method='POST'>";
			}
		?>
        <div class="container-fluid dashboard-content">
			<div class="dashboard-short-list">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-header">ANO LETIVO DE <?php echo $ANO_LETIVO_ATUAL;?> </h5>
								<div class="form-group">
									<label class="col-form-label">Unidade Orgânica</label>
									<input type="text" class="form-control" name="unidade_organica" value="<?php echo $UNIDADE_ORGANICA;?>">
								</div>
								<div class="from-group">
									<label class="col-form-label">Nome da Escola</label>
									<select class="form-control" id="nome_da_escola" name="nome_da_escola" required>
										<option value="">-- Selecionar --</option>
										<option value="EB 2,3 de Arrifes" <?php if ($NOME_DA_ESCOLA == 'EB 2,3 de Arrifes') echo 'selected';?> >EB 2,3 de Arrifes</option>
										<option value="EB1/JI Cardeal Humberto de Medeiros" <?php if ($NOME_DA_ESCOLA == 'EB1/JI Cardeal Humberto de Medeiros') echo 'selected';?> >EB1/JI Cardeal Humberto de Medeiros</option>
										<option value="EB1/JI da Covoada" <?php if ($NOME_DA_ESCOLA == 'EB1/JI da Covoada') echo 'selected';?> >EB1/JI da Covoada</option>
										<option value="EB1/JI da Relva" <?php if ($NOME_DA_ESCOLA == 'EB1/JI da Relva') echo 'selected';?> >EB1/JI da Relva</option>
										<option value="EB1/JI do Outeiro" <?php if ($NOME_DA_ESCOLA == 'EB1/JI do Outeiro') echo 'selected';?> >EB1/JI do Outeiro</option>
										<option value="EB1/JI dos Milagres" <?php if ($NOME_DA_ESCOLA == 'EB1/JI dos Milagres') echo 'selected';?> >EB1/JI dos Milagres</option>
										<option value="EB1/JI do Engº. José Cordeiro" <?php if ($NOME_DA_ESCOLA == 'EB1/JI do Engº. José Cordeiro') echo 'selected';?> >EB1/JI do Engº. José Cordeiro</option>
									</select>
								</div>
								<div class="form-group">
									<label class="col-form-label">Localidade</label>
									<input type="text" class="form-control" name="localidade" value="<?php echo $LOCALIDADE;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Ano de Escolaridade</label>
									<input type="number" class="form-control" name="ano_de_escolaridade" value="<?php echo $ANO_DE_ESCOLARIDADE;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Turma</label>
									<input type="text" class="form-control" name="turma" value="<?php echo $TURMA;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Curso</label>
									<input type="text" class="form-control" name="curso" value="<?php echo $CURSO;?>">
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-header">IDENTIFICAÇÃO DO ALUNO</h5>
								<div class="form-group">
									<label class="col-form-label">Aluno - Número de Processo</label>
									<input type="number" class="form-control" name="aluno_numero_de_processo" value="<?php echo $ALUNO_NUMERO_DE_PROCESSO;?>">
								</div>
								<div class="from-group">
									<label class="col-form-label">Aluno - NIF</label>
									<input type="number" class="form-control" name="aluno_nif" value="<?php echo $NIF_ALUNO;?>" readonly required>
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Idade (até 31/08)</label>
									<input type="number" class="form-control" name="aluno_idade" value="<?php echo $ALUNO_IDADE;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Nome Completo</label>
									<input type="text" class="form-control" name="aluno_nome_completo" value="<?php echo $ALUNO_NOME_COMPLETO;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Nº de Utente</label>
									<input type="number" class="form-control" name="aluno_numero_de_utente" value="<?php echo $ALUNO_NUMERO_DE_UTENTE;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Número de Cartão de Cidadão</label>
									<input type="text" class="form-control" name="aluno_cartao_de_cidadao" value="<?php echo $ALUNO_CARTAO_DE_CIDADAO;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Naturalidade</label>
									<input type="text" class="form-control" name="aluno_naturalidade" value="<?php echo $ALUNO_NATURALIDADE;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Conselho</label>
									<input type="text" class="form-control" name="aluno_conselho" value="<?php echo $ALUNO_CONSELHO;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Data de Nascimento</label>
									<input type="date" class="form-control" name="aluno_data_de_nascimento" value="<?php echo $ALUNO_DATA_DE_NASCIMENTO;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Nome da Mãe</label>
									<input type="text" class="form-control" name="aluno_nome_da_mae" value="<?php echo $ALUNO_NOME_DA_MAE;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Nome do Pai</label>
									<input type="text" class="form-control" name="aluno_nome_do_pai" value="<?php echo $ALUNO_NOME_DO_PAI;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Residente em</label>
									<input type="text" class="form-control" name="aluno_residente_em" value="<?php echo $ALUNO_RESIDENTE_EM;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Número da Residência</label>
									<input type="text" class="form-control" name="aluno_numero_da_residencia" value="<?php echo $ALUNO_NUMERO_DA_RESIDENCIA;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Andar da Residência</label>
									<input type="text" class="form-control" name="aluno_andar_da_residencia" value="<?php echo $ALUNO_ANDAR_DA_RESIDENCIA;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Freguesia</label>
									<input type="text" class="form-control" name="aluno_freguesia" value="<?php echo $ALUNO_FREGUESIA;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Código Postal</label>
									<input type="text" class="form-control" name="aluno_codigo_postal" value="<?php echo $ALUNO_CODIGO_POSTAL;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Telemóvel</label>
									<input type="number" class="form-control" name="aluno_telemovel" value="<?php echo $ALUNO_TELEMOVEL;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Telefone</label>
									<input type="number" class="form-control" name="aluno_telefone" value="<?php echo $ALUNO_TELEFONE;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Email</label>
									<input type="email" class="form-control" name="aluno_email" value="<?php echo $ALUNO_EMAIL;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Segurança Social: Beneficiário Nº</label>
									<input type="number" class="form-control" name="aluno_seguranca_social_beneficiario_numero" value="<?php echo $ALUNO_SEGURANCA_SOCIAL_BENEFICIARIO_NUMERO;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">Aluno - Segurança Social: Instituição</label>
									<input type="text" class="form-control" name="aluno_seguranca_social_instituicao" value="<?php echo $ALUNO_SEGURANCA_SOCIAL_INSTITUICAO;?>">
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-header">IDENTIFICAÇÃO DO ENCARREGADO DE EDUCAÇÃO</h5>
								<div class="form-group">
									<label class="col-form-label">E.E - Nome Completo:</label>
									<input type="text" class="form-control" name="ee_nome_completo" value="<?php echo $EE_NOME_COMPLETO;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">E.E - Número do Cartão de Cidadão:</label>
									<input type="text" class="form-control" name="ee_cartao_de_cidadao" value="<?php echo $EE_CARTAO_DE_CIDADAO;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">E.E - NIF:</label>
									<input type="number" class="form-control" name="ee_nif" value="<?php echo $NIF_EE;?>" readonly>
								</div>
								<div class="form-group">
									<label class="col-form-label">E.E - Número de Utente:</label>
									<input type="number" class="form-control" name="ee_numero_de_utente" value="<?php echo $EE_NUMERO_DE_UTENTE;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">E.E - Residente em:</label>
									<input type="text" class="form-control" name="ee_residente_em" value="<?php echo $EE_RESIDENTE_EM;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">E.E - Número da Residência:</label>
									<input type="text" class="form-control" name="ee_numero_da_residencia" value="<?php echo $EE_NUMERO_DA_RESIDENCIA;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">E.E - Andar da Residência:</label>
									<input type="text" class="form-control" name="ee_andar_da_residencia" value="<?php echo $EE_ANDAR_DA_RESIDENCIA;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">E.E - Freguesia:</label>
									<input type="text" class="form-control" name="ee_freguesia" value="<?php echo $EE_FREGUESIA;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">E.E - Código Postal:</label>
									<input type="text" class="form-control" name="ee_codigo_postal" value="<?php echo $EE_CODIGO_POSTAL;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">E.E - Telemóvel:</label>
									<input type="number" class="form-control" name="ee_telemovel" value="<?php echo $EE_TELEMOVEL;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">E.E - Telefone:</label>
									<input type="number" class="form-control" name="ee_telefone" value="<?php echo $EE_TELEFONE;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">E.E - Email:</label>
									<input type="email" class="form-control" name="ee_email" value="<?php echo $EE_EMAIL;?>">
								</div>
								<div class="form-group">
									<label class="col-form-label">E.E - Grau de Parentesco:</label>
									<input type="text" class="form-control" name="ee_grau_de_parentesco" value="<?php echo $EE_GRAU_DE_PARENTESCO;?>">
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-header">OPÇÕES</h5>
								<div class="form-group">
									<br>
									<label class="col-form-label">Educação Moral e Religiosa Católica:</label>
									<label style="padding: 7px;" for="educacao_moral_e_religiosa_catolica" class="col-form-label">Sim</label>
									<input type="radio" name="educacao_moral_e_religiosa_catolica" value="Sim" <?php if ($EDUCACAO_MORAL_E_RELIGIOSA_CATOLICA == "Sim") echo 'checked'?>>
									<label style="padding: 7px;" for="educacao_moral_e_religiosa_catolica" class="col-form-label">Não</label>
									<input type="radio" name="educacao_moral_e_religiosa_catolica" value="Não" <?php if ($EDUCACAO_MORAL_E_RELIGIOSA_CATOLICA == "Não") echo 'checked'?>>
								</div>
								<div class="form-group">
									<div style="display: flex; flex-direction: row">
										<label class="col-form-label" style="width: 260px;">Outra Confissão Relegiosa:</label>
										<label style="padding: 7px;" for="outra_confissao_religiosa" class="col-form-label">Sim</label>
										<input type="radio" name="outra_confissao_religiosa" value="Sim" <?php if ($OUTRA_CONFISSAO_RELIGIOSA == "Sim") echo 'checked'?>>
										<label style="padding: 7px;" for="outra_confissao_religiosa" class="col-form-label">Não</label>
										<input type="radio" name="outra_confissao_religiosa" value="Não" <?php if ($OUTRA_CONFISSAO_RELIGIOSA == "Não") echo 'checked'?>>
										<input style="margin-left: 15px;" type="text" class="form-control" name="outra_confissao_religiosa_qual" value="<?php echo $OUTRA_CONFISSAO_RELIGIOSA_QUAL;?>">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-header">AÇÃO SOCIAL ESCOLAR</h5>
								<div class="form-group">
									<br>
									<div style="display: flex; flex-direction: row">
										<label class="col-form-label" style="width: 560px;">O aluno é beneficiário dos Auxílios Escolares?</label>
										<label style="padding: 7px;" for="auxilios_escolares" class="col-form-label">Sim</label>
										<input type="radio" name="auxilios_escolares" value="Sim" <?php if ($AUXILIOS_ESCOLARES == "Sim") echo 'checked'?>>
										<label style="padding: 7px;" for="auxilios_escolares" class="col-form-label">Não</label>
										<input type="radio" name="auxilios_escolares" value="Não" <?php if ($AUXILIOS_ESCOLARES == "Não") echo 'checked'?>>

										<label style="padding: 7px;" class="col-form-label">Escalão:</label>
										
										<select name="aluno_escalao" class="form-control" style="margin-left: 15px;">
											<option value="">-- Selecionar Escalão --</option>
											<?php
												$sql_escaloes = "SELECT nome FROM alunos_escaloes WHERE id_azores_escola = 1";
												$result_escaloes = $conn->query($sql_escaloes);
												if ($result_escaloes->num_rows > 0) {
													while($row = $result_escaloes->fetch_assoc()) {
														$selected = ($row['nome'] == $ALUNO_ESCALAO) ? 'selected' : '';
														echo "<option value='" . $row['nome'] . "' $selected>" . $row['nome'] . "</option>";
													}
												}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-form-label">Pretende que seu educando utilize o transporte escolar?</label>
									<label style="padding: 7px;" for="transporte_escolar" class="col-form-label">Sim</label>
									<input type="radio" name="transporte_escolar" value="Sim" <?php if ($TRANSPORTE_ESCOLAR == "Sim") echo 'checked'?>>
									<label style="padding: 7px;" for="transporte_escolar" class="col-form-label">Não</label>
									<input type="radio" name="transporte_escolar" value="Não" <?php if ($TRANSPORTE_ESCOLAR == "Não") echo 'checked'?>>
								</div>
								<div class="form-group">
									<div style="display: flex; flex-direction: row">
										<label class="col-form-label" style="width: 330px;">Local de (des)embarque - freguesia:</label>
										<input type="text" class="form-control" name="local_desembarque_freguesia" value="<?php echo $LOCAL_DESEMBARQUE_FREGUESIA;?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-form-label">Pretende requisitar manuais escolares?</label>
									<label style="padding: 7px;" for="manuais_escolares" class="col-form-label">Sim</label>
									<input type="radio" name="manuais_escolares" value="Sim" <?php if ($MANUAIS_ESCOLARES == "Sim") echo 'checked'?>>
									<label style="padding: 7px;" for="manuais_escolares" class="col-form-label">Não</label>
									<input type="radio" name="manuais_escolares" value="Não" <?php if ($MANUAIS_ESCOLARES == "Não") echo 'checked'?>>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-header">SAÚDE ESCOLAR</h5>
								<br>
								<div class="form-group">
									<div style="display: flex; flex-direction: row">
										<label class="col-form-label">Boletim de Saude atualizado:</label>
										<label style="padding: 7px;" for="boletim_saude_atualizado" class="col-form-label">Sim</label>
										<input type="radio" name="boletim_saude_atualizado" value="Sim" <?php if ($BOLETIM_SAUDE_ATUALIZADO == "Sim") echo 'checked'?>>
										<label style="padding: 7px;" for="boletim_saude_atualizado" class="col-form-label">Não</label>
										<input type="radio" name="boletim_saude_atualizado" value="Não" <?php if ($BOLETIM_SAUDE_ATUALIZADO == "Não") echo 'checked'?>>
									</div>
								</div>
								<div class="form-group">
									<div style="display: flex; flex-direction: row">
										<label style="width: 375px" class="col-form-label">Problemas Especificos de saude:</label>
										<label style="padding: 7px;" for="problemas_especificos_saude" class="col-form-label">Sim</label>
										<input type="radio" name="problemas_especificos_saude" value="Sim" <?php if ($PROBLEMAS_ESPECIFICOS_SAUDE == "Sim") echo 'checked'?>>
										<label style="padding: 7px;" for="problemas_especificos_saude" class="col-form-label">Não</label>
										<input type="radio" name="problemas_especificos_saude" value="Não" <?php if ($PROBLEMAS_ESPECIFICOS_SAUDE == "Não") echo 'checked'?>>
										<label class="col-form-label" style="margin-left: 15px;">Quais?</label>
										<input style="margin-left: 15px;" type="text" class="form-control" name="problemas_especificos_saude_quais" value="<?php echo $PROBLEMAS_ESPECIFICOS_SAUDE_QUAIS;?>">
									</div>
								</div>
								<div class="form-group">
									<div style="display: flex; flex-direction: row">
										<label style="width: 375px" class="col-form-label">Tem problemas de visao/Audiçao:</label>
										<label style="padding: 7px;" for="problemas_visao_audicao" class="col-form-label">Sim</label>
										<input type="radio" name="problemas_visao_audicao" value="Sim" <?php if ($PROBLEMAS_VISAO_AUDICAO == "Sim") echo 'checked'?>>
										<label style="padding: 7px;" for="problemas_visao_audicao" class="col-form-label">Não</label>
										<input type="radio" name="problemas_visao_audicao" value="Não" <?php if ($PROBLEMAS_VISAO_AUDICAO == "Não") echo 'checked'?>>
										<label class="col-form-label" style="margin-left: 15px;">Quais?</label>
										<input style="margin-left: 15px;" type="text" class="form-control" name="problemas_visao_audicao_quais" value="<?php echo $PROBLEMAS_VISAO_AUDICAO_QUAIS;?>">
									</div>
								</div>
								<div class="form-group">
									<div style="display: flex; flex-direction: row">
										<label class="col-form-label">Autorizo o meu Educando a participar nas atividades de Saúde Escolar: </label>
										<label style="padding: 7px;" for="autorizacao_participar_atividades_de_saude" class="col-form-label">Sim</label>
										<input type="radio" name="autorizacao_participar_atividades_de_saude" value="Sim" <?php if ($AUTORIZACAO_PARTICIPAR_ATIVIDADES_DE_SAUDE == "Sim") echo 'checked'?>>
										<label style="padding: 7px;" for="autorizacao_participar_atividades_de_saude" class="col-form-label">Não</label>
										<input type="radio" name="autorizacao_participar_atividades_de_saude" value="Não" <?php if ($AUTORIZACAO_PARTICIPAR_ATIVIDADES_DE_SAUDE == "Não") echo 'checked'?>>
									</div>	
									<p>(ratreios, sessões de educação para a saúde, prevenção de situações de risco relaionados com a saúde)</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-header">AUTORIZAÇÕES E SAÍDAS</h5>
								<div class="form-group">
									<label class="col-form-label">
										As fotografias registadas no âmbito das atividades escolares poderão ser reproduzidas em qualquer suporte.
										As imagens caotadas em vídeo poderão, de igual modo, ser utilizadas para qualquer divulgação do trabalho
										da Escola, através da sua página Web ou da participação nas redes sociais.<br>
										Autoriza a utilização das fotografias e das imagens captadas durante as atividades escolares que envolvam o
										seu educando?
									</label>
									<input type="radio" name="autorizacao_imagens_do_aluno" value="Sim" <?php if ($AUTORIZACAO_IMAGENS_DO_ALUNO == "Sim") echo 'checked'?>>
									<label style="padding: 7px;" for="autorizacao_imagens_do_aluno" class="col-form-label">Sim Autorizo</label>
									<input type="radio" name="autorizacao_imagens_do_aluno" value="Não" <?php if ($AUTORIZACAO_IMAGENS_DO_ALUNO == "Não") echo 'checked'?>>
									<label style="padding: 7px;" for="autorizacao_imagens_do_aluno" class="col-form-label">Não Autorizo</label>
								</div>
								<div class="form-group">
									<label class="col-form-label">
										Autorizo o meu educando a participar nas atividades promovidas pela escola ou por outra entidade parceira,
										quer se realize dentro ou fora do recinto escolar.
									</label><br>
									<input type="radio" name="autorizacao_atividades_promovidas_pela_escola" value="Sim" <?php if ($AUTORIZACAO_ATIVIDADES_PROMOVIDAS_PELA_ESCOLA == "Sim") echo 'checked'?>>
									<label style="padding: 7px;" for="autorizacao_atividades_promovidas_pela_escola" class="col-form-label">Sim Autorizo</label>
									<input type="radio" name="autorizacao_atividades_promovidas_pela_escola" value="Não" <?php if ($AUTORIZACAO_ATIVIDADES_PROMOVIDAS_PELA_ESCOLA == "Não") echo 'checked'?>>
									<label style="padding: 7px;" for="autorizacao_atividades_promovidas_pela_escola" class="col-form-label">Não Autorizo</label>
								</div>
								<div class="form-group">
									<label class="col-form-label">
										Autorizo a leitura e cópia do cartão de cidadão do meu educando, somente para fins escolares.
									</label><br>
									<input type="radio" name="autorizacao_copia_do_cartao_de_cidadao" value="Sim" <?php if ($AUTORIZACAO_COPIA_DO_CARTAO_DE_CIDADAO == "Sim") echo 'checked'?>>
									<label style="padding: 7px;" for="autorizacao_copia_do_cartao_de_cidadao" class="col-form-label">Sim Autorizo</label>
									<input type="radio" name="autorizacao_copia_do_cartao_de_cidadao" value="Não" <?php if ($AUTORIZACAO_COPIA_DO_CARTAO_DE_CIDADAO == "Não") echo 'checked'?>>
									<label style="padding: 7px;" for="autorizacao_copia_do_cartao_de_cidadao" class="col-form-label">Não Autorizo</label>
									<br><br>
								</div>
								<div class="form-group">
									<div class="form-group">
										<input type="checkbox" id="autoriza_entrada_saida_livre" name="autoriza_entrada_saida_livre" value="Sim" <?php if ($AUTORIZA_ENTRADA_SAIDA_LIVRE == "Sim") echo 'checked'?>>
										<label class="col-form-label">Autoriza entrada / saída livre</label>
									</div>
									<script>
										document.querySelectorAll('input[name="autoriza_entrada_saida_livre"]').forEach(radio => {
											radio.addEventListener("change", update_todas_as_autorizaoes);
										});
										
										function update_todas_as_autorizaoes() {
											const OpcaoSaidaLivre = document.getElementById("autoriza_entrada_saida_livre")
											const OpcaoSaidaHoraDeAlmoco = document.getElementById("autoriza_saida_hora_almoco")
											
											if (OpcaoSaidaLivre.checked) {
												document.getElementById("autoriza_saida_ultimo_tempo").disabled = true
												document.getElementById("autoriza_saida_acompanhado").disabled = true
												document.getElementById("autoriza_saida_furos").disabled = true
												document.getElementById("autoriza_saida_intervalos").disabled = true
												document.getElementById("autoriza_saida_hora_almoco").disabled = true
												document.getElementById("saida_dia_seg").disabled = true
												document.getElementById("saida_dia_ter").disabled = true
												document.getElementById("saida_dia_qua").disabled = true
												document.getElementById("saida_dia_qui").disabled = true
												document.getElementById("saida_dia_sex").disabled = true
												document.getElementById("saida_dia_sab").disabled = true
												document.getElementById("saida_dia_dom").disabled = true
											} else {
												document.getElementById("autoriza_saida_ultimo_tempo").disabled = false
												document.getElementById("autoriza_saida_acompanhado").disabled = false
												document.getElementById("autoriza_saida_furos").disabled = false
												document.getElementById("autoriza_saida_intervalos").disabled = false
												document.getElementById("autoriza_saida_hora_almoco").disabled = false

												if (OpcaoSaidaHoraDeAlmoco.checked) {
													document.getElementById("saida_dia_seg").disabled = false
													document.getElementById("saida_dia_ter").disabled = false
													document.getElementById("saida_dia_qua").disabled = false
													document.getElementById("saida_dia_qui").disabled = false
													document.getElementById("saida_dia_sex").disabled = false
													document.getElementById("saida_dia_sab").disabled = false
													document.getElementById("saida_dia_dom").disabled = false
												}
											}
										}
									</script>
									<div class="form-group">
										<input type="checkbox" id="autoriza_saida_ultimo_tempo" name="autoriza_saida_ultimo_tempo" value="Sim" <?php if ($AUTORIZA_SAIDA_ULTIMO_TEMPO == "Sim") echo 'checked'?>>
										<label class="col-form-label">Autoriza saída ao último tempo</label>
									</div>
									<div class="form-group">
										<input type="checkbox" id="autoriza_saida_acompanhado" name="autoriza_saida_acompanhado" value="Sim" <?php if ($AUTORIZA_SAIDA_ACOMPANHADO == "Sim") echo 'checked'?>>
										<label class="col-form-label">Autoriza saída se acompanhado</label>
									</div>
									<div class="form-group">
										<input type="checkbox" id="autoriza_saida_furos" name="autoriza_saida_furos" value="Sim" <?php if ($AUTORIZA_SAIDA_FUROS == "Sim") echo 'checked'?>>
										<label class="col-form-label">Autoriza saída em furos</label>
									</div>
									<div class="form-group">
										<input type="checkbox" id="autoriza_saida_intervalos" name="autoriza_saida_intervalos" value="Sim" <?php if ($AUTORIZA_SAIDA_INTERVALOS == "Sim") echo 'checked'?>>
										<label class="col-form-label">Autoriza saída em intervalos</label>
									</div>
									<div class="form-group">
										<input type="checkbox" id="autoriza_saida_hora_almoco" name="autoriza_saida_hora_almoco" value="Sim"  <?php if ($AUTORIZA_SAIDA_HORA_ALMOCO == "Sim") echo 'checked'?>>
										<label class="col-form-label">Autoriza saída a hora de almoço</label>
									</div>
									<script>
										document.querySelectorAll('input[name="autoriza_saida_hora_almoco"]').forEach(radio => {
											radio.addEventListener("change", update_dias_de_almoco);
										});
										
										function update_dias_de_almoco() {
											const OpcaoSaidaHoraDeAlmoco = document.getElementById("autoriza_saida_hora_almoco")
											
											if (OpcaoSaidaHoraDeAlmoco.checked) {
												document.getElementById("saida_dia_seg").disabled = false
												document.getElementById("saida_dia_ter").disabled = false
												document.getElementById("saida_dia_qua").disabled = false
												document.getElementById("saida_dia_qui").disabled = false
												document.getElementById("saida_dia_sex").disabled = false
												document.getElementById("saida_dia_sab").disabled = false
												document.getElementById("saida_dia_dom").disabled = false
											} else {
												document.getElementById("saida_dia_seg").disabled = true
												document.getElementById("saida_dia_ter").disabled = true
												document.getElementById("saida_dia_qua").disabled = true
												document.getElementById("saida_dia_qui").disabled = true
												document.getElementById("saida_dia_sex").disabled = true
												document.getElementById("saida_dia_sab").disabled = true
												document.getElementById("saida_dia_dom").disabled = true
											}
										}
									</script>
									<script>
										document.querySelectorAll('input[name="autoriza_saida_ultimo_tempo"]').forEach(radio => {
											radio.addEventListener("change", update_saida_livre);
										});

										document.querySelectorAll('input[name="autoriza_saida_acompanhado"]').forEach(radio => {
											radio.addEventListener("change", update_saida_livre);
										});

										document.querySelectorAll('input[name="autoriza_saida_furos"]').forEach(radio => {
											radio.addEventListener("change", update_saida_livre);
										});

										document.querySelectorAll('input[name="autoriza_saida_intervalos"]').forEach(radio => {
											radio.addEventListener("change", update_saida_livre);
										});
										
										document.querySelectorAll('input[name="autoriza_saida_hora_almoco"]').forEach(radio => {
											radio.addEventListener("change", update_saida_livre);
										});
										
										function update_saida_livre() {
											const OpcaoUltimoTempo = document.getElementById("autoriza_saida_ultimo_tempo")
											const OpcaoAcompanhado = document.getElementById("autoriza_saida_acompanhado")
											const OpcaoFuros = document.getElementById("autoriza_saida_furos")
											const OpcaoIntervalos = document.getElementById("autoriza_saida_intervalos")
											const OpcaoAlmoco = document.getElementById("autoriza_saida_hora_almoco")
											
											if (OpcaoUltimoTempo.checked || OpcaoAcompanhado.checked || OpcaoFuros.checked || OpcaoIntervalos.checked || OpcaoAlmoco.checked) {
												document.getElementById("autoriza_entrada_saida_livre").disabled = true
											} else {
												document.getElementById("autoriza_entrada_saida_livre").disabled = false
											}
										}
									</script>
									
								</div>
								<div class="form-group">
									<label style="margin-right: 10px;">Dias Especificos:</label>
									<input type="checkbox" id="saida_dia_seg" name="saida_dia_seg" value="Sim" <?php if ($SAIDA_DIA_SEG == "Sim") echo 'checked'?>>
									<label style="margin-right: 10px;" class="col-form-label">Seg.</label>
									<input type="checkbox" id="saida_dia_ter" name="saida_dia_ter" value="Sim" <?php if ($SAIDA_DIA_TER == "Sim") echo 'checked'?>>
									<label style="margin-right: 10px;" vclass="col-form-label">Ter.</label>
									<input type="checkbox" id="saida_dia_qua" name="saida_dia_qua" value="Sim" <?php if ($SAIDA_DIA_QUA == "Sim") echo 'checked'?>>
									<label style="margin-right: 10px;" class="col-form-label">Qua.</label>
									<input type="checkbox" id="saida_dia_qui" name="saida_dia_qui" value="Sim" <?php if ($SAIDA_DIA_QUI == "Sim") echo 'checked'?>>
									<label style="margin-right: 10px;" class="col-form-label">Qui.</label>
									<input type="checkbox" id="saida_dia_sex" name="saida_dia_sex" value="Sim" <?php if ($SAIDA_DIA_SEX == "Sim") echo 'checked'?>>
									<label style="margin-right: 10px;" class="col-form-label">Sex.</label>
									<input type="checkbox" id="saida_dia_sab" name="saida_dia_sab" value="Sim" <?php if ($SAIDA_DIA_SAB == "Sim") echo 'checked'?>>
									<label style="margin-right: 10px;" class="col-form-label">Sab.</label>
									<input type="checkbox" id="saida_dia_dom" name="saida_dia_dom" value="Sim" <?php if ($SAIDA_DIA_DOM == "Sim") echo 'checked'?>>
									<label style="margin-right: 10px;" class="col-form-label">Dom.</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-header">PROSUCESSO</h5>
								<div class="form-group">
									<label class="col-form-label">
										A Comissão Coordenadora do Plano Integrado de Promoção do Sucesso Escolar - ProSucesso, criada pelo Despacho
										n.9 691/2017 de 6 de abril, propõe-se, aquando das suas visitas de acompanhamento às escolas, ouvir os alunos
										sobre a sua vida escolar, para recolher informação que ajude a escola a responder às necessidades da sua população
										escolar e a incrementar a qualidade das aprendizagens. A informação recolhida não colide com os dados pessoais
										Iegalmente protegidos.
									</label>
									<input type="radio" name="autorizacao_prosucesso" value="Sim" <?php if ($AUTORIZACAO_PROSUCESSO == "Sim") echo 'checked'?>>
									<label style="padding: 7px;" for="autorizacao_prosucesso" class="col-form-label">Sim Autorizo</label>
									<input type="radio" name="autorizacao_prosucesso" value="Não" <?php if ($AUTORIZACAO_PROSUCESSO == "Não") echo 'checked'?>>
									<label style="padding: 7px;" for="autorizacao_prosucesso" class="col-form-label">Não Autorizo</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-header">REGULAMENTO DA MATRÍCULA</h5>
								<div class="form-group">
									<p>
										<br>
										Declaro para os efeitos previstos no dispositivo no artigoº 13º do Regulamento Geral de Proteção de Dados (EU)2016/679
										do P.E. e do Conselho de 27 de abril (RGPD) prestar, por este meio, o meu consentimento para o tratamento dos meus dados
										pessoais, bem como os do meu educando para efeitos pedagógicos e de gestão escolar.
										<br><br>
										A presente declaração constitui título bastante para conferir autorização para o tratamento dos dados pessoais, assim
										como do meu educando no âmbito do Sistema de Gestão Escolar para fins de suporte de decisão pedagógica e adminitrativa
										da escola e da tutela. 
										<br>
										Tomei conhecimento de que a falta de consentimento para o tratamento dos meus dados pessoais terá como resultado a falta
										da verificação dos pressupostos exigidos para exercer a figura de Encarregado de Educação, assim como para o meu educando
										poder ser, devidamente, matriculado em unidade orgânica do sistema educativo regional.
									</p>
									<input type="radio" name="concordar_regulamento_da_matricula" value="Sim" required <?php if ($CONCORDAR_REGULAMENTO_DA_MARTICULA == "Sim") echo 'checked'?>>
									<label style="padding: 7px;" for="concordar_regulamento_da_matricula" class="col-form-label">Concordo</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-header">REGULAMENTO DA ESCOLA</h5>
								<div class="form-group">
									<p>
										<br>
										Confirmo as declarações acima apresentadas e declaro que conheço, concordo e cumprirei integralmente o estatuto do aluno
										e o regulamento interno da unidade orgânica.
									</p>
									<input type="radio" name="concordar_regulamento_da_escola" value="Concordo" required <?php if ($CONCORDAR_REGULAMENTO_DA_ESCOLA == "Concordo") echo 'checked'?>>
									<label style="padding: 7px;" for="concordar_regulamento_da_escola" class="col-form-label">Concordo</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
								<h5 class="card-header">OBSERVAÇÕES</h5>
									<div class="form-group">
										<input style="padding: 7px; height: 180px;" type="text" class="form-control" id="observacoes" name="observacoes" value="<?php echo $OBSERVACOES;?>">
									</div>
								</div>	
							</div>	
						</div>
						<div class="col-sm-12 pl-0">
							<div class="text-center">
								<?php
								if ($ESTADO == 0) {
									if ($ENCONTROU_MATRICULA_ANTERIOR == true) {
										echo '<button type="submit" class="btn btn-space btn-primary" id="AtulizarMatricula" name="estado" value="0">Atualizar Matrícula</button>';
										echo '<button type="submit" class="btn btn-space btn-primary" id="EnviarDT" name="estado" value="2">Enviar para o Diretor de Turma</button>';
									} else if ($ENCONTROU_NAS_MATRICULAS == true) {
										echo '<button type="submit" class="btn btn-space btn-primary" id="AtulizarMatricula" name="estado" value="0">Atualizar Matrícula</button>';
										echo '<button type="submit" class="btn btn-space btn-primary" id="EnviarSecretaria" name="estado" value="1">Enviar para a Secretaria</button>';
									} else {
										echo '<button type="submit" class="btn btn-space btn-primary" id="AtulizarMatricula" name="estado" value="0">Criar Matrícula</button>';
									}

								} else {
									echo '<script>
									const inputsAndSelects = document.querySelectorAll("input, select");
								
									inputsAndSelects.forEach(element => {
										if (["text", "number", "date", "email"].includes(element.type)) {
											element.readOnly = true;
										} else if (["radio", "checkbox"].includes(element.type)) {
											element.disabled = true; 
										} 
									});
									</script>';
								}
								?>
							</div>
							<script>
								document.getElementById("EnviarSecretaria").addEventListener("click", function(event) {
									if (!confirm("Ao enviar para a Secretaria, não poderá fazer qualquer mudança. Tem a certeza que deseja enviar?")) {
										event.preventDefault();
										return;
									}

									if (!confirm("Este é o último aviso! Tem mesmo a certeza que deseja enviar para a Secretaria? Nenhuma mudança poderá ser efutuada depois!")) {
										event.preventDefault();
									}
								});
							</script>
							<script>
								document.getElementById("EnviarDT").addEventListener("click", function(event) {
									if (!confirm("Ao enviar para o Diretor de Turma, não poderá fazer qualquer mudança. Tem a certeza que deseja enviar?")) {
										event.preventDefault();
										return;
									}

									if (!confirm("Este é o último aviso! Tem mesmo a certeza que deseja enviar para o Diretor de Turma? Nenhuma mudança poderá ser efutuada depois!")) {
										event.preventDefault();
									}
								});
							</script>
						</div>
				</div>
			</div>
		</div>
	</form>
	<script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../assets/vendor/shortable-nestable/Sortable.min.js"></script>
    <script src="../assets/vendor/shortable-nestable/sort-nest.js"></script>
    <script src="../assets/vendor/shortable-nestable/jquery.nestable.js"></script>
</body>
</html>

<script>
	const OpcaoSaidaLivre = document.getElementById("autoriza_entrada_saida_livre")
	const OpcaoSaidaHoraDeAlmoco = document.getElementById("autoriza_saida_hora_almoco")
	
	if (OpcaoSaidaLivre.checked) {
		document.getElementById("autoriza_saida_ultimo_tempo").disabled = true
		document.getElementById("autoriza_saida_acompanhado").disabled = true
		document.getElementById("autoriza_saida_furos").disabled = true
		document.getElementById("autoriza_saida_intervalos").disabled = true
		document.getElementById("autoriza_saida_hora_almoco").disabled = true
		document.getElementById("saida_dia_seg").disabled = true
		document.getElementById("saida_dia_ter").disabled = true
		document.getElementById("saida_dia_qua").disabled = true
		document.getElementById("saida_dia_qui").disabled = true
		document.getElementById("saida_dia_sex").disabled = true
		document.getElementById("saida_dia_sab").disabled = true
		document.getElementById("saida_dia_dom").disabled = true

	} else {
		document.getElementById("autoriza_saida_ultimo_tempo").disabled = false
		document.getElementById("autoriza_saida_acompanhado").disabled = false
		document.getElementById("autoriza_saida_furos").disabled = false
		document.getElementById("autoriza_saida_intervalos").disabled = false
		document.getElementById("autoriza_saida_hora_almoco").disabled = false

		if (OpcaoSaidaHoraDeAlmoco.checked) {
			document.getElementById("saida_dia_seg").disabled = false
			document.getElementById("saida_dia_ter").disabled = false
			document.getElementById("saida_dia_qua").disabled = false
			document.getElementById("saida_dia_qui").disabled = false
			document.getElementById("saida_dia_sex").disabled = false
			document.getElementById("saida_dia_sab").disabled = false
			document.getElementById("saida_dia_dom").disabled = false
		}
	}

</script>

<script>
	const OpcaoUltimoTempo = document.getElementById("autoriza_saida_ultimo_tempo")
	const OpcaoAcompanhado = document.getElementById("autoriza_saida_acompanhado")
	const OpcaoFuros = document.getElementById("autoriza_saida_furos")
	const OpcaoIntervalos = document.getElementById("autoriza_saida_intervalos")
	const OpcaoAlmoco = document.getElementById("autoriza_saida_hora_almoco")
	
	if (OpcaoUltimoTempo.checked || OpcaoAcompanhado.checked || OpcaoFuros.checked || OpcaoIntervalos.checked || OpcaoAlmoco.checked) {
		document.getElementById("autoriza_entrada_saida_livre").disabled = true
	} else {
		document.getElementById("autoriza_entrada_saida_livre").disabled = false
	}
</script>