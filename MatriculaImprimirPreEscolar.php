<?php
    include('../db.php');
    
	if (isset($_GET['id']) && is_numeric($_GET['id'])) {
		$id = intval($_GET['id']);
	} else {
		echo "<script>alert('Ocorreu um erro durante a recolha do ID')</script>";
		echo "<script>history.back()</script>";
	}

	$sql = "SELECT * FROM matriculas_ficha_pre_escolar WHERE id = $id";
	$result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
			$ESCOLA_1 = $row["id_escola1"];
			$ESCOLA_2 = $row["id_escola2"];
			$ESCOLA_3 = $row["id_escola3"];

			$ALUNO_NOME = $row["aluno_nome"];
			$ALUNO_DATA_DE_NASCIMENTO = $row["aluno_data_de_nascimento"];
			$ALUNO_CARTAO_DE_CIDADAO = $row["aluno_cartao_de_cidadao"];
			$ALUNO_VALIDADE_CARTAO_DE_CIDADAO = $row["aluno_validade_do_cartao_de_cidadao"];
			$ALUNO_NIF = $row["aluno_nif"];
			$ALUNO_NUMERO_DE_SEGURANCA_SOCIAL = $row["aluno_numero_seguranca_social"];
			$ALUNO_INSTITUICAO_DE_SEGURANCA_SOCIAL = $row["aluno_instituito_seguranca_social"];
			$ALUNO_NUMERO_DE_UTENTE = $row["aluno_numero_de_utente"];
			$ALUNO_NATURALIDADE = $row["aluno_naturalidade"];
			$ALUNO_CONSELHO = $row["aluno_conselho"];
			$ALUNO_MORADA = $row["aluno_morada"];

			$PAI_NOME = $row["pai_nome"];
			$PAI_CARTAO_DE_CIDADAO = $row["pai_cartao_de_cidadao"];
			$PAI_VALIDADE_DO_CARTAO_DE_CIDADAO = $row["pai_validade_cartao_de_cidadao"];
			$PAI_NIF = $row["pai_nif"];
			$PAI_ESTADO_CIVIL = $row["pai_estado_civil"];
			$PAI_NATURALIDADE = $row["pai_naturalidade"];
			$PAI_MORADA = $row["pai_morada"];
			$PAI_CODIGO_POSTAL = $row["pai_codigo_postal"];
			$PAI_EMAIL = $row["pai_email"];
			$PAI_NUMERO_DE_TELEFONE = $row["pai_numero_de_telefone"];
			$PAI_LOCAL_DE_TRABALHO = $row["pai_local_de_trabalho"];
			$PAI_TELEFONE_DO_LOCAL_DE_TRABALHO = $row["pai_telefone_do_local_de_trabalho"];

			$MAE_NOME = $row["mae_nome"];
			$MAE_CARTAO_DE_CIDADAO = $row["mae_cartao_de_cidadao"];
			$MAE_VALIDADE_DO_CARTAO_DE_CIDADAO = $row["mae_validade_do_cartao_de_cidadao"];
			$MAE_NIF = $row["mae_nif"];
			$MAE_ESTADO_CIVIL = $row["mae_estado_civil"];
			$MAE_NATURALIDADE = $row["mae_naturalidade"];
			$MAE_MORADA = $row["mae_morada"];
			$MAE_CODIGO_POSTAL = $row["mae_codigo_postal"];
			$MAE_EMAIL = $row["mae_email"];
			$MAE_NUMERO_DE_TELEFONE = $row["mae_numero_de_telefone"];
			$MAE_LOCAL_DE_TRABALHO = $row["mae_local_de_trabalho"];
			$MAE_TELEFONE_DO_LOCAL_DE_TRABALHO = $row["mae_telefone_do_local_de_trabalho"];

			$EE_GRAU_DE_PARENTESCO = $row["ee_grau_de_parentesco"];
			$EE_OUTRO_GRAU_DE_PARENTESCO = $row["ee_outro_grau_de_parentesco"];
			$EE_NOME = $row["ee_nome"];
			$EE_CARTAO_DE_CIDADAO = $row["ee_cartao_de_cidadao"];
			$EE_VALIDADE_DO_CARTAO_DE_CIDADAO = $row["ee_validade_do_cartao_de_cidadao"];
			$EE_NIF = $row["ee_nif"];
			$EE_ESTADO_CIVIL = $row["ee_estado_civil"];
			$EE_NATURALIDADE = $row["ee_naturalidade"];
			$EE_MORADA = $row["ee_morada"];
			$EE_CODIGO_POSTAL = $row["ee_codigo_postal"];
			$EE_EMAIL = $row["ee_email"];
			$EE_NUMERO_DE_TELEFONE = $row["ee_numero_de_telefone"];
			$EE_CONTACTO_DE_EMERGENCIA = $row["ee_contacto_de_emergencia"];

			$ALUNO_JA_FREQUENTOU = $row["aluno_ja_frequentou"];

			$DOENCAS_TEM_PROBLEMAS_DE_SAUDE = $row["doencas_tem_problemas_de_saude"];
			$DOENCAS_DIABETES = $row["doencas_diabetes"];
			$DOENCAS_DOENCAS_MENTAIS = $row["doencas_mentais"];
			$DOENCAS_DEFICIENCIA_FISICA = $row["doencas_deficiencia_fisica"];
			$DOENCAS_ALCOOLISMO = $row["doencas_alcoolismo"];
			$DOENCAS_OUTRAS = $row["doencas_outras"];
			$DOENCAS_QUAIS_OS_CUIDADOS_A_TER_EM_CONTA = $row["doencas_cuidados"];
			
			$ALERGIAS_TEM = $row["alergias_tem"];
			$ALERGIAS_QUAIS = $row["alergias_quais"];
			$ALERGIAS_COMO_MANIFESTAM = $row["alergias_como_manifestam"];
			
			$APRESENTA_NECESSIDADES_EDUCATIVAS_ESPECIAIS = $row["apresenta_necessidades_educativas_especiais"];
		
			$TEVE_ALGUM_IRMAO_A_FREQUENTAR_ANTES = $row["teve_algum_irmao_a_frequentar_antes"];
			$IRMAO_FREQUENCIA_ANTERIOR = $row["irmao_frequencia_anterior"];
		
			$ALMOCO_EM_CASA = $row["almoco_em_casa"];
			$ALMOCO_NA_ESCOLA = $row["almoco_na_escola"];
			$ALMOCO_DE_CASA = $row["almoco_de_casa"];
			$ALMOCO_DA_ESCOLA = $row["almoco_da_escola"];
		
			$QUEM_VEM_TRAZER_O_ALUNO = $row["quem_vem_trazer_o_aluno"];
			$QUEM_VEM_BUSCAR_O_ALUNO = $row["quem_ver_buscar_o_aluno"];
		
			$PESSOA_DE_CONFIANCA_NOME = $row["pessoa_de_confianca_nome"];
			$PESSOA_DE_CONFIANCA_MORADA = $row["pessoa_de_confianca_morada"];
			$PESSOA_DE_CONFIANCA_NUMERO = $row["pessoa_de_confianca_numero"];
			
			$ATL_VAI_FREQUENTAR = $row["atl_vai_frequentar"];
			$ATL_ONDE = $row["atl_onde"];
		
			$AUTORIZACAO_DE_IMAGENS_DO_ALUNO = $row["autorizacao_de_imagens_do_aluno"];
			$CONCORDO_REGULAMENTO = $row["concordo_regulamento"];
			$CONCORDAR_REGULAMENTO_DA_ESCOLA = $row["concordar_regulamento_da_escola"];
		
			$OBSERVACOES = $row["observacoes"];   
        }
	}
?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- readonly meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<!-- CSS só das Matrículas -->
	<link rel="stylesheet" href="../Matriculas/Matricula.css">
    <title>Matrícula para Imprimir</title>
</head>

<body>
	<div class="header">
		<img src="../images/ManualRAA.jpg" alt="Logo" class="logo">

		<label>SECRETARIA REGIONAL DA EDUCAÇÃO E DOS ASSUNTOS CULTURAIS</label>
		<label>DIREÇÃO REGIONAL DA EDUCAÇÃO</label>
		<label>ESCOLA BÁSICA INTEGRADA DE ARRIFES</label>
		<label>Rua Cardeal D. Humberto de Medeiros</label>
		<label>9500-376 - Ponta Delgada</label>
		<label>FICHA DE INSCRIÇÃO EDUCAÇÃO PRÉ-ESCOLAR</label>

	</div>
		<fieldset>
			<legend>Matrícula - Ano Letivo 2025/2026</legend>
			<div class="collumn">
				<div class="row">
					<h1>1ª Prioridade na escola de 1º ciclo</h1>
					<select disabled>
						<option <?php if ($ESCOLA_1 == 1) echo 'selected';?> >EB1/JI Cardeal Humberto de Medeiros</option>
						<option <?php if ($ESCOLA_1 == 2) echo 'selected';?> >EB1/JI da Covoada</option>
						<option <?php if ($ESCOLA_1 == 3) echo 'selected';?> >EB1/JI dos Milagres</option>
						<option <?php if ($ESCOLA_1 == 4) echo 'selected';?> >EB1/JI do Outeiro</option>
						<option <?php if ($ESCOLA_1 == 5) echo 'selected';?> >EB1/JI da Relva</option>
						<option <?php if ($ESCOLA_1 == 6) echo 'selected';?> >EB1/JI do Engº. José Cordeiro</option>
						<option <?php if ($ESCOLA_1 == 7) echo 'selected';?> >EB 2,3 de Arrifes</option>
					</select>
				</div>
				<div class="row">
					<h1>2ª Prioridade na escola de 1º ciclo</h1>
					<select disabled>
						<option <?php if ($ESCOLA_2 == 1) echo 'selected';?> >EB1/JI Cardeal Humberto de Medeiros</option>
						<option <?php if ($ESCOLA_2 == 2) echo 'selected';?> >EB1/JI da Covoada</option>
						<option <?php if ($ESCOLA_2 == 3) echo 'selected';?> >EB1/JI dos Milagres</option>
						<option <?php if ($ESCOLA_2 == 4) echo 'selected';?> >EB1/JI do Outeiro</option>
						<option <?php if ($ESCOLA_2 == 5) echo 'selected';?> >EB1/JI da Relva</option>
						<option <?php if ($ESCOLA_2 == 6) echo 'selected';?> >EB1/JI do Engº. José Cordeiro</option>
						<option <?php if ($ESCOLA_2 == 7) echo 'selected';?> >EB 2,3 de Arrifes</option>
					</select>
				</div>
				<div class="row">
					<h1>3ª Prioridade na escola de 1º ciclo</h1>
					<select disabled>
						<option <?php if ($ESCOLA_3 == 1) echo 'selected';?> >EB1/JI Cardeal Humberto de Medeiros</option>
						<option <?php if ($ESCOLA_3 == 2) echo 'selected';?> >EB1/JI da Covoada</option>
						<option <?php if ($ESCOLA_3 == 3) echo 'selected';?> >EB1/JI dos Milagres</option>
						<option <?php if ($ESCOLA_3 == 4) echo 'selected';?> >EB1/JI do Outeiro</option>
						<option <?php if ($ESCOLA_3 == 5) echo 'selected';?> >EB1/JI da Relva</option>
						<option <?php if ($ESCOLA_3 == 6) echo 'selected';?> >EB1/JI do Engº. José Cordeiro</option>
						<option <?php if ($ESCOLA_3 == 7) echo 'selected';?> >EB 2,3 de Arrifes</option>
					</select>
				</div>
			</div>
		</fieldset>
	</div>

	<fieldset>
		<legend>Identificação do(a) Aluno(a)</legend>
		<div class="collumn">
			<div class="row">
				<p>Nome do Aluno:</p>
				<input type="text" value="<?php echo $ALUNO_NOME;?>" readonly>
				<p>Data de Nascimento:</p>
				<input type="date" value="<?php echo $ALUNO_DATA_DE_NASCIMENTO;?>" readonly>
			</div>
			<div class="row">
				<p>Cartão de Cidadão:</p>
				<input type="text" value="<?php echo $ALUNO_CARTAO_DE_CIDADAO;?>" readonly>
				<p>Validade do Cartão de Cidadão:</p>
				<input type="date" value="<?php echo $ALUNO_VALIDADE_CARTAO_DE_CIDADAO;?>" readonly>
			</div>
			<div class="row">
				<p>NIF - Número de Identificação Fiscal:</p>
				<input type="number" value="<?php echo $ALUNO_NIF;?>" readonly>
				<p>Número de Segurança Social:</p>
				<input type="number" value="<?php echo $ALUNO_NUMERO_DE_SEGURANCA_SOCIAL;?>" readonly>
			</div>
			<div class="row">
				<p>Instituito de Segurança Social:</p>
				<input type="text" value="<?php echo $ALUNO_INSTITUICAO_DE_SEGURANCA_SOCIAL;?>" readonly>
				<p>Numero de Utente:</p>
				<input type="number" value="<?php echo $ALUNO_NUMERO_DE_UTENTE;?>" readonly>
			</div>
			<div class="row">
				<p>Naturalidade:</p>
				<input type="text" value="<?php echo $ALUNO_NATURALIDADE;?>" readonly>
				<p>Conselho:</p>
				<input type="text" value="<?php echo $ALUNO_CONSELHO;?>" readonly>
			</div>
			<div class="row">
				<p class="ultimo_unico">Morada:</p>
				<input type="text" value="<?php echo $ALUNO_MORADA;?>" readonly>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Filiação - Pai</legend>
		<div class="collumn">
			<div class="row">
				<p>Nome do Pai</p>
				<input type="text" value="<?php echo $PAI_NOME;?>" readonly>									
				<p>Cartão de Cidadão</p>
				<input type="text" value="<?php echo $PAI_CARTAO_DE_CIDADAO;?>" readonly>
			</div>
			<div class="row">
				<p>Validade do Cartão de Cidadão</p>
				<input type="date" value="<?php echo $PAI_VALIDADE_DO_CARTAO_DE_CIDADAO;?>" readonly>
				<p>Numero de Identificação Fiscal</p>
				<input type="number" value="<?php echo $PAI_NIF;?>" readonly>
			</div>
			<div class="row">
				<p>Estado Civil</p>
				<input type="text" value="<?php echo $PAI_ESTADO_CIVIL;?>" readonly>
				<p>Naturalidade</p>
				<input type="text" value="<?php echo $PAI_NATURALIDADE;?>" readonly>
			</div>
			<div class="row">
				<p>Morada</p>
				<input type="text" value="<?php echo $PAI_MORADA;?>" readonly>
				<p>Código Postal</p>
				<input type="text" value="<?php echo $PAI_CODIGO_POSTAL;?>" readonly>
			</div>
			<div class="row">
				<p>Endereço de Email</p>
				<input type="email" value="<?php echo $PAI_EMAIL;?>" readonly>
				<p>Telefone/Telemóvel</p>
				<input type="number" value="<?php echo $PAI_NUMERO_DE_TELEFONE;?>" readonly>
			</div>
			<div class="row">
				<p>Local de Trabalho</p>
				<input type="text" value="<?php echo $PAI_LOCAL_DE_TRABALHO;?>" readonly>
				<p>Telefone do Local de Trabalho</p>
				<input type="number" value="<?php echo $PAI_TELEFONE_DO_LOCAL_DE_TRABALHO;?>" readonly>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Filiação - Mae</legend>
		<div class="collumn">
			<div class="row">
				<p>Nome da Mãe</p>
				<input type="text" value="<?php echo $MAE_NOME;?>" readonly>
				<p>Cartão de Cidadão</p>
				<input type="text" value="<?php echo $MAE_CARTAO_DE_CIDADAO;?>" readonly>
			</div>
			<div class="row">
				<p>Validade do Cartão de Cidadão</p>
				<input type="date" value="<?php echo $MAE_VALIDADE_DO_CARTAO_DE_CIDADAO;?>" readonly>
				<p>Numero de Identificação Fiscal</p>
				<input type="number" value="<?php echo $MAE_NIF;?>" readonly>
			</div>
			<div class="row">
				<p>Estado Civil</p>
				<input type="text" value="<?php echo $MAE_ESTADO_CIVIL;?>" readonly>
				<p>Naturalidade</p>
				<input type="text" value="<?php echo $MAE_NATURALIDADE;?>" readonly>
			</div>
			<div class="row">
				<p>Morada</p>
				<input type="text" value="<?php echo $MAE_MORADA;?>" readonly>
				<p>Código Postal</p>
				<input type="text" value="<?php echo $MAE_CODIGO_POSTAL;?>" readonly>
			</div>
			<div class="row">
				<p>Endereço de Email</p>
				<input type="email" value="<?php echo $MAE_EMAIL;?>" readonly>
				<p>Telefone/Telemóvel</p>
				<input type="number" value="<?php echo $MAE_NUMERO_DE_TELEFONE;?>" readonly>
			</div>
			<div class="row">
				<p>Local de Trabalho</p>
				<input type="text" value="<?php echo $MAE_LOCAL_DE_TRABALHO;?>" readonly>
				<p>Telefone do Local de Trabalho</p>
				<input type="number" value="<?php echo $MAE_TELEFONE_DO_LOCAL_DE_TRABALHO;?>" readonly>
			</div>
		</div>
	</fieldset>
	<fieldset>
		<legend>Encarregado de Educação</legend>
		<div class="collumn">
			<div class="row">
				<p class="p_radio" style="width:85px;">Grau de Parentesco:</p>
				<input type="radio" <?php if ($EE_GRAU_DE_PARENTESCO == "Pai") echo 'checked';?> disabled>
				<p class="p_radio">Pai</p>
				<input type="radio" <?php if ($EE_GRAU_DE_PARENTESCO == "Mae") echo 'checked';?> disabled>
				<p class="p_radio">Mãe</p>
				<input type="radio" <?php if ($EE_GRAU_DE_PARENTESCO != "Pai" && $EE_GRAU_DE_PARENTESCO != "Mae") echo 'checked';?> disabled>
				<p class="p_radio">Outro</p>
				<p class="p_radio">Qual?</p>
				<input readonly value="<?php echo $EE_OUTRO_GRAU_DE_PARENTESCO;?>">
			</div>
			<div class="row">
				<p>Nome:</p>
				<input type="text" value="<?php echo $EE_NOME;?>" readonly>
				<p>Cartão de Cidadão</p>
				<input type="text" value="<?php echo $EE_CARTAO_DE_CIDADAO;?>" readonly>
			</div>
			<div class="row">
				<p>Validade do Cartão de Cidadão</p>
				<input type="date" value="<?php echo $EE_VALIDADE_DO_CARTAO_DE_CIDADAO;?>" readonly>
				<p>Numero de Identificação Fiscal</p>
				<input type="number" value="<?php echo $EE_NIF;?>" readonly>
			</div>
			<div class="row">
				<p>Estado Civil</p>
				<input type="text" value="<?php echo $EE_ESTADO_CIVIL;?>" readonly>
				<p>Naturalidade</p>
				<input type="text" value="<?php echo $EE_NATURALIDADE;?>" readonly>
			</div>
			<div class="row">
				<p>Morada</p>
				<input type="text" value="<?php echo $EE_MORADA;?>" readonly>
				<p>Código Postal</p>
				<input type="text" value="<?php echo $EE_CODIGO_POSTAL;?>" readonly>
			</div>
			<div class="row">
				<p>Endereço de Email</p>
				<input type="email" value="<?php echo $EE_EMAIL;?>" readonly>
				<p>Telefone/Telemóvel</p>
				<input type="number" value="<?php echo $EE_NUMERO_DE_TELEFONE;?>" readonly>
			</div>
			<div class="row">
				<p class="ultimo_unico">Contacto de Emergência</p>
				<input type="number" value="<?php echo $EE_CONTACTO_DE_EMERGENCIA;?>" readonly>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Frequentação</legend>
		<p>A crianaça frequentou:</p>
		<div class="collumn">
			<div class="row">
				<input type="radio" <?php if ($ALUNO_JA_FREQUENTOU == "Ama") echo 'checked';?> disabled>
				<p class="p_radio">Ama</p>
				<input type="radio" <?php if ($ALUNO_JA_FREQUENTOU == "Creche") echo 'checked';?> disabled>
				<p class="p_radio">Creche</p>
				<input type="radio" <?php if ($ALUNO_JA_FREQUENTOU == "Jardim de Infância") echo 'checked';?> disabled>
				<p class="p_radio">Jardim de Infância</p>
				<input type="radio" <?php if ($ALUNO_JA_FREQUENTOU != "Ama" && $ALUNO_JA_FREQUENTOU != "Creche" && $ALUNO_JA_FREQUENTOU != "Jardim de Infância") echo 'checked';?> disabled>
				<p class="p_radio">Outro</p>
				<p class="p_radio">Qual?</p>
				<input type="text" value="<?php if ($ALUNO_JA_FREQUENTOU != "Ama" && $ALUNO_JA_FREQUENTOU != "Creche" && $ALUNO_JA_FREQUENTOU != "Jardim de Infância") echo $ALUNO_JA_FREQUENTOU;?>" readonly>
			</div>
	</fieldset>

	<fieldset>
		<legend>Antecedentes Heredutários:</legend>
		<div class="collumn">
			<div class="row">
				<p style="width: auto;">Tem problemas de saúde?</p>
				<input type="radio" <?php if ($DOENCAS_TEM_PROBLEMAS_DE_SAUDE == "Não") echo 'checked';?> disabled>
				<p class="p_radio">Não</p>
				<input type="radio" <?php if ($DOENCAS_TEM_PROBLEMAS_DE_SAUDE == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim</p>
			</div>
			<div class="row">
				<input type="checkbox" <?php if ($DOENCAS_DIABETES == "Sim") echo 'checked';?> disabled>
				<p>Diabetes</p>
				<input type="checkbox" <?php if ($DOENCAS_DOENCAS_MENTAIS == "Sim") echo 'checked';?> disabled>
				<p>Doenças Mentais</p>
				<input type="checkbox" <?php if ($DOENCAS_DEFICIENCIA_FISICA == "Sim") echo 'checked';?> disabled>
				<p>Deficiência Física</p>
				<input type="checkbox" <?php if ($DOENCAS_ALCOOLISMO == "Sim") echo 'checked';?> disabled>
				<p>Alcoolismo</p>
			</div>
			<div class="row">
				<p>Outras:</p>
				<input type="text" value="<?php echo $DOENCAS_OUTRAS;?>" readonly>
			</div>
			<div class="row">
				<p>Quais os cuidados de saúde a ter em conta ou medidas de prevenção para com a criança?</p>
				<input type="text" value="<?php echo $DOENCAS_QUAIS_OS_CUIDADOS_A_TER_EM_CONTA;?>" readonly>
			</div>
			<div class="row">
				<p>Tem alguma alergia?</p>
				<input type="radio" <?php if ($ALERGIAS_TEM == "Não") echo 'checked';?> disabled>
				<p  class="p_radio">Não</p>
				<input type="radio" <?php if ($ALERGIAS_TEM == "Sim") echo 'checked';?> disabled>
				<p  class="p_radio">Sim</p>
			</div>
			<div class="row">
				<p>Quais?</p>
				<input type="text" value="<?php echo $ALERGIAS_QUAIS;?>" readonly>
			</div>
			<div class="row">
				<p>Como se manifesta?</p>
				<input type="text" value="<?php echo $ALERGIAS_COMO_MANIFESTAM;?>" readonly>
			</div>
			<div class="row">
				<p>Apresenta Necessidades Educativas Especiais?</p>
				<input type="radio" <?php if ($APRESENTA_NECESSIDADES_EDUCATIVAS_ESPECIAIS == "Não") echo 'checked';?> disabled>
				<p class="p_radio">Não</p>
				<input type="radio" <?php if ($APRESENTA_NECESSIDADES_EDUCATIVAS_ESPECIAIS == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim</p>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Núcleo Escola</legend>
		<div class="collumn">
			<div class="row">
				<p>Tem algum irmão a frequentar este Núcleo Escolar?</p>
				<input type="radio" <?php if ($TEVE_ALGUM_IRMAO_A_FREQUENTAR_ANTES == "Não") echo 'checked';?> disabled>
				<p class="p_radio">Não</p>
				<input type="radio" <?php if ($TEVE_ALGUM_IRMAO_A_FREQUENTAR_ANTES == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim</p>
			</div>
			<div class="row">
				<p>Se sim em qual escola?</p>
				<input type="text" value="<?php echo $IRMAO_FREQUENCIA_ANTERIOR;?>" readonly>
			</div>
	</fieldset>

	<fieldset>
		<legend>Período de Almoço</legend>
		<div class="collumn">
			<div class="row">
				<p>Onde vai almoçar durante o período escolar?</p>
				<input type="checkbox" <?php if ($ALMOCO_EM_CASA == "Sim") echo 'checked';?> disabled>
				<p>Em Casa</p>
				<input type="checkbox" <?php if ($ALMOCO_NA_ESCOLA == "Sim") echo 'checked';?> disabled>
				<p>Na Escola</p>
			</div>
			<div class="row">
				<p>Na Escola:</p>
				<input type="checkbox" <?php if ($ALMOCO_DE_CASA == "Sim") echo 'checked';?> disabled>
				<p>Almoco de Casa</p>
				<input type="checkbox" <?php if ($ALMOCO_DA_ESCOLA == "Sim") echo 'checked';?> disabled>
				<p>Almoco servido pela Escola</p>
			</div>
	</fieldset>

	<fieldset>
		<legend>Transporte e A.T.L</legend>
		<div class="collumn">
			<div class="row">
				<p>Quem normalmente vem trazer o Aluno?</p>
				<input type="text" value="<?php echo $QUEM_VEM_TRAZER_O_ALUNO;?>" readonly>
			</div>
			<div class="row">
				<p>Quem normalmente vem buscar o Aluno?</p>
				<input type="text" value="<?php echo $QUEM_VEM_BUSCAR_O_ALUNO;?>" readonly>
			</div>
			<div class="row">
				<p>Qual a pessoa a quem se pode confiar a criança?</p>
			</div>
			<div class="row">
				<p>Nome</p>
				<input type="text" value="<?php echo $PESSOA_DE_CONFIANCA_NOME;?>" readonly>
				<p>Morada</p>
				<input type="text" value="<?php echo $PESSOA_DE_CONFIANCA_MORADA;?>" readonly>
			</div>
			<div class="row">
				<p  class="ultimo_unico">Telefone</p>
				<input type="number" value="<?php echo $PESSOA_DE_CONFIANCA_NUMERO;?>" readonly>
			</div>
			<div class="row">
				<p>Vai Frequentar A.T.L?</p>
				<input type="radio" <?php if ($ATL_VAI_FREQUENTAR == "Não") echo 'checked';?> disabled>
				<p class="p_radio">Não</p>
				<input type="radio" <?php if ($ATL_VAI_FREQUENTAR == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim</p>
			</div>
			<div class="row">
				<p>Se sim, onde?</p>
				<input type="radio" <?php if ($ATL_ONDE == "Na Escola") echo 'checked';?> disabled>
				<p class="p_radio">Na Escola</p>
				<input type="radio" <?php if ($ATL_ONDE == "Outro Local") echo 'checked';?> disabled>
				<p class="p_radio">Outro Local</p>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Autorização de Imagens do Aluno</legend>
		<div class="collumn">
			<div class="row">
				<p class="texto_longo">Respeitando a legislação em vigor, solicita-se a V.Exª autorização para captação e utilização de imagens do seu educando, para fins escolares (trabalhos, páginas na Internet, exposições e jornais escolares).</p>
			</div>
			<div class="row">
				<input type="radio" <?php if ($AUTORIZACAO_DE_IMAGENS_DO_ALUNO == "Autorizo") echo 'checked';?> disabled>
				<p class="p_radio">Autorizo</p>
				<input type="radio" <?php if ($AUTORIZACAO_DE_IMAGENS_DO_ALUNO == "Não Autorizo") echo 'checked';?> disabled>
				<p class="p_radio">Não Autorizo</p>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Assinatura da Matrícula</legend>
		<div class="collumn">
			<p class="texto_longo">
				Declaro para os efeitos previstos no dispositivo no art 13º do Regulamento Geral de Proteção de Dados (EU)2016/679 do P.E. do
				Conselho de 27 de Abril (RGPD) prestar, por este meio, o meu consentimento para o tratamento dos meus dados pessoais acima
				indicados bem como os do meu educando para efeitos pedagógicos e de gestão escolar. A presente declaração constitui título
				bastante para conferir autorização para o tratamento dos meus dados pessoas, assim como do meu educando no âmbito do Sistema
				Geral Escolar para fins de suporte de decisão pedagógica e administrativa da escola e da tutela. Tomei conhecimento de que a
				falta de consentimento para o tratamento dos meus dados pessoais terá como resultado falta da verificação dos pressupostos
				exigidos para exerver a figura de Encarregado de Educação, assim como para o meu educando poder ser, devidamente, matriculado
				em unidade orgânica do sistema educativo regional.
			</p>
			<div class="row">
				<input type="radio" <?php if ($CONCORDO_REGULAMENTO == "Concordo") echo 'checked';?> disabled>
				<p class="p_radio">Concordo</p>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>REGULAMENTO DA ESCOLA</legend>
		<p style="width: 650px;">
			Confirmo as declarações acima apresentadas e declaro que conheço, concordo e cumprirei integralmente o estatuto do aluno
			e o regulamento interno da unidade orgânica.
		</p>
		<div class="row">
			<input type="radio" name="concordar_regulamento_da_escola" value="Concordo" required <?php if ($CONCORDAR_REGULAMENTO_DA_ESCOLA == "Concordo") echo 'checked'?> disabled>
			<label style="padding: 7px;" for="concordar_regulamento_da_escola" class="col-form-label">Concordo</label>
		</div>
	</fieldset>

	<fieldset>
		<legend>Observações</legend>
		<div class="collumn">
			<div class="row">
				<p class="texto_longo"><?php echo $OBSERVACOES;?></p>
			</div>
	</fieldset>
</body>
</html>

<script>
	window.onload = function () {
    window.print();
    
    window.onafterprint = function () {
        history.back();
    };
};
</script>