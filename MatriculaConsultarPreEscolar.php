<?php
	include('../aut.php');
	include('../iniSis.php');
	include('../dbaSis.php');
	include('../Configs.php');
	include('../UtilizadoresOnline.php');
	viewManager();

	if ($modulo_contatos == 1){
		
		$ReadEscondeMenuBarra = read('utilizador_esconde_barra',"where utilizador = '$username' and tipo = 2");
		if ($ReadEscondeMenuBarra){
			foreach($ReadEscondeMenuBarra as $EscondeMenuBarra);
			$EstadoMenuBarra = $EscondeMenuBarra['ativo'];
			$IdMenuBarra	 = $EscondeMenuBarra['id'];
		}
		
		if(!empty($_GET['IDMostra'])){
			if (!empty($IdMenuBarra)){
				$AtualizaBarraMostra['ativo'] 	= '0';
				update('utilizador_esconde_barra',$AtualizaBarraMostra, "id = '$IdMenuBarra'");
				echo "<script>alert('Configuração mostra barra com sucesso!');window.location.href='".$link.$Dir_Contactos."Docentes.php';</script>";
			}else{
				$CriarBarraMostra['ativo'] 			= '0';
				$CriarBarraMostra['utilizador ']	= $username;
				$CriarBarraMostra['tipo'] 			= '2';
				create('utilizador_esconde_barra',$CriarBarraMostra);
				echo "<script>alert('Configuração mostra barra com sucesso!');window.location.href='".$link.$Dir_Contactos."Docentes.php';</script>";
			}	
		}	
			
		if(!empty($_GET['IDEsconde'])){
			if (!empty($IdMenuBarra)){
				$AtualizaBarraEsconde['ativo'] 	= '1';
				update('utilizador_esconde_barra',$AtualizaBarraEsconde, "id = '$IdMenuBarra'");
				echo "<script>alert('Configuração esconde barra com sucesso!');window.location.href='".$link.$Dir_Contactos."Docentes.php';</script>";
			}else{
				$CriarBarraEsconde['ativo'] 		= '1';
				$CriarBarraEsconde['utilizador ']	= $username;
				$CriarBarraEsconde['tipo'] 			= '2';
				create('utilizador_esconde_barra',$CriarBarraEsconde);
				echo "<script>alert('Configuração esconde barra com sucesso!');window.location.href='".$link.$Dir_Contactos."Docentes.php';</script>";
			}	
		}
	}
?>

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
	<link rel="stylesheet" href="../Matriculas/Matriculas.css">

	<!-- Bootstrap CSS -->
	
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/circular-std/style.css">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="../assets/vendor/inputmask/css/inputmask.css" />
    <title><?php echo $nomesite; ?></title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
		<div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand"><?php echo $TituloAplicacao; ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="<?php echo $link; ?>logout.php" >Sair</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
		<?php 
			if ($EstadoMenuBarra <> 1 or empty($EstadoMenuBarra)){
				include('../menu.php'); 
				echo '<div class="dashboard-wrapper">';
				}	
		?>
		<form action='MatriculaImprimir.php' method='POST'></form>
            <div class="container-fluid dashboard-content">
				<div class="dashboard-short-list">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<h5 class="card-header">Matrícula - Ano Letivo 2025/2026</h5>
								<div class="card-body">
									<div class="form-group">
										<label for="inputText3" class="col-form-label">1ª Prioridade na escola de 1º ciclo (Obrigatório)</label>

										<select id="select1" class="form-control" name="escola1" readonly>
											<option value="">-- Selecionar --</option>
											<option value="cardeal" <?php if ($ESCOLA_1 == 1) echo 'selected';?> >EB1/JI Cardeal Humberto de Medeiros</option>
											<option value="covoada" <?php if ($ESCOLA_1 == 2) echo 'selected';?> >EB1/JI da Covoada</option>
											<option value="milagres" <?php if ($ESCOLA_1 == 3) echo 'selected';?> >EB1/JI dos Milagres</option>
											<option value="outeiro" <?php if ($ESCOLA_1 == 4) echo 'selected';?> >EB1/JI do Outeiro</option>
											<option value="relva" <?php if ($ESCOLA_1 == 5) echo 'selected';?> >EB1/JI da Relva</option>
											<option value="cordeiro" <?php if ($ESCOLA_1 == 6) echo 'selected';?> >EB1/JI do Engº. José Cordeiro</option>
											<option value="arrifes" <?php if ($ESCOLA_1 == 7) echo 'selected';?> >EB 2,3 de Arrifes</option>
										</select>

										<label for="inputText3" class="col-form-label">2ª Prioridade na escola de 1º ciclo (Obrigatório)</label>
										<select id="select2" class="form-control" name="escola2" id="escola2" readonly>
											<option value="">-- Selecionar --</option>
											<option value="cardeal" <?php if ($ESCOLA_2 == 1) echo 'selected';?> >EB1/JI Cardeal Humberto de Medeiros</option>
											<option value="covoada" <?php if ($ESCOLA_2 == 2) echo 'selected';?> >EB1/JI da Covoada</option>
											<option value="milagres" <?php if ($ESCOLA_2 == 3) echo 'selected';?> >EB1/JI dos Milagres</option>
											<option value="outeiro" <?php if ($ESCOLA_2 == 4) echo 'selected';?> >EB1/JI do Outeiro</option>
											<option value="relva" <?php if ($ESCOLA_2 == 5) echo 'selected';?> >EB1/JI da Relva</option>
											<option value="cordeiro" <?php if ($ESCOLA_2 == 6) echo 'selected';?> >EB1/JI do Engº. José Cordeiro</option>
											<option value="arrifes" <?php if ($ESCOLA_2 == 7) echo 'selected';?> >EB 2,3 de Arrifes</option>
										</select>

										<label for="inputText3" class="col-form-label">3ª Prioridade na escola de 1º ciclo (Obrigatório)</label>
										<select id="select3" class="form-control" name="escola3" id="escola3" readonly>
											<option value="">-- Selecionar --</option>
											<option value="cardeal" <?php if ($ESCOLA_3 == 1) echo 'selected';?> >EB1/JI Cardeal Humberto de Medeiros</option>
											<option value="covoada" <?php if ($ESCOLA_3 == 2) echo 'selected';?> >EB1/JI da Covoada</option>
											<option value="milagres" <?php if ($ESCOLA_3 == 3) echo 'selected';?> >EB1/JI dos Milagres</option>
											<option value="outeiro" <?php if ($ESCOLA_3 == 4) echo 'selected';?> >EB1/JI do Outeiro</option>
											<option value="relva" <?php if ($ESCOLA_3 == 5) echo 'selected';?> >EB1/JI da Relva</option>
											<option value="cordeiro" <?php if ($ESCOLA_3 == 6) echo 'selected';?> >EB1/JI do Engº. José Cordeiro</option>
											<option value="arrifes" <?php if ($ESCOLA_3 == 7) echo 'selected';?> >EB 2,3 de Arrifes</option>
										</select>
									</div>	
								</div>
							</div>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-header">Identificação do(a) Aluno(a)</h5> <!-- Identificação do(a) Aluno(a) -->
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Nome do Aluno</label>
										<input type="text" class="form-control" name="AlunoNome" value="<?php echo $ALUNO_NOME;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Aluno - Data de Nascimento</label>
										<input type="date" class="form-control" name="AlunoDataDeNascimento" value="<?php echo $ALUNO_DATA_DE_NASCIMENTO;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Aluno - Cartão de Cidadão</label>
										<input type="text" class="form-control" name="AlunoCartaoDeCidadao" value="<?php echo $ALUNO_CARTAO_DE_CIDADAO;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Aluno - Validade do Cartão de Cidadão</label>
										<input type="date" class="form-control" name="AlunoValidadeDoCartaoDeCidadao" value="<?php echo $ALUNO_VALIDADE_CARTAO_DE_CIDADAO;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Aluno - NIF - Número de Identificação Fiscal</label>
										<input type="number" class="form-control" name="AlunoNIF" value="<?php echo $ALUNO_NIF;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Aluno - Número de Segurança Social</label>
										<input type="number" class="form-control" name="AlunoNumeroDeSegurancaSocial" value="<?php echo $ALUNO_NUMERO_DE_SEGURANCA_SOCIAL;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Aluno - Instituito de Segurança Social</label>
										<input type="text" class="form-control" name="AlunoInstituicaoDeSegurancaSocial" value="<?php echo $ALUNO_INSTITUICAO_DE_SEGURANCA_SOCIAL;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Aluno - Numero de Utente</label>
										<input type="number" class="form-control" name="AlunoNumeroDeUtente" value="<?php echo $ALUNO_NUMERO_DE_UTENTE;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Aluno - Naturalidade</label>
										<input type="text" class="form-control" name="AlunoNaturalidadeFreguesia" value="<?php echo $ALUNO_NATURALIDADE;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Aluno - Conselho</label>
										<input type="text" class="form-control" name="AlunoConselho" value="<?php echo $ALUNO_CONSELHO;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Aluno - Morada</label>
										<input type="text" class="form-control" name="AlunoMorada" value="<?php echo $ALUNO_MORADA;?>" readonly>
									</div>
								</div>
							</div>	
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-header">Filiação - Pai</h5> <!-- Filiação -->
									<div class="form-group"> <!-- Identificação do Pai -->
										<label for="inputText3" class="col-form-label">Nome do Pai</label>
										<input type="text" class="form-control" name="PaiNome" id="PaiNome" value="<?php echo $PAI_NOME;?>" readonly>									
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Pai - Cartão de Cidadão</label>
										<input type="text" class="form-control" name="PaiCartaoDeCidadao" id="PaiCartaoDeCidadao" value="<?php echo $PAI_CARTAO_DE_CIDADAO;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Pai - Validade do Cartão de Cidadão</label>
										<input type="date" class="form-control" name="PaiValidadeDoCartaoDeCidadao" id="PaiValidadeDoCartaoDeCidadao" value="<?php echo $PAI_VALIDADE_DO_CARTAO_DE_CIDADAO;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Pai - Numero de Identificação Fiscal</label>
										<input type="number" class="form-control" name="PaiNumeroDeIdentificacaoFiscal" id="PaiNumeroDeIdentificacaoFiscal" value="<?php echo $PAI_NIF;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Pai - Estado Civil</label>
										<input type="text" class="form-control" name="PaiEstadoCivil" id="PaiEstadoCivil" value="<?php echo $PAI_ESTADO_CIVIL;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Pai - Naturalidade</label>
										<input type="text" class="form-control" name="PaiNaturalidade" id="PaiNaturalidade" value="<?php echo $PAI_NATURALIDADE;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Pai - Morada</label>
										<input type="text" class="form-control" name="PaiMorada" id="PaiMorada" value="<?php echo $PAI_MORADA;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Pai - Código Postal</label>
										<input type="text" class="form-control" name="PaiCodigoPostal" id="PaiCodigoPostal" maxlength="8" value="<?php echo $PAI_CODIGO_POSTAL;?>" readonly>
									</div>
										<div class="form-group">
									<label for="inputText3" class="col-form-label">Pai - Endereço de Email</label>
										<input type="email" class="form-control" name="PaiEnderecoEmail" id="PaiEnderecoEmail" value="<?php echo $PAI_EMAIL;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Pai - Telefone/Telemóvel</label>
										<input type="number" class="form-control" name="PaiTelefoneTelemovel" id="PaiTelefoneTelemovel" value="<?php echo $PAI_NUMERO_DE_TELEFONE;?>" readonly maxlength="9" minlength="9">
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Pai - Local de Trabalho</label>
										<input type="text" class="form-control" name="PaiLocalDeTrabalho" id="PaiLocalDeTrabalho" value="<?php echo $PAI_LOCAL_DE_TRABALHO;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Pai - Telefone do Local de Trabalho</label>
										<input type="number" class="form-control" name="PaiTelefoneDoLocalDeTrabalho" id="PaiTelefoneDoLocalDeTrabalho" value="<?php echo $PAI_TELEFONE_DO_LOCAL_DE_TRABALHO;?>" readonly maxlength="9" minlength="9">
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-header">Filiação - Mãe</h5> <!-- Filiação -->
									<div class="form-group"> <!-- Identificação da Mãe -->
										<label for="inputText3" class="col-form-label">Nome da Mãe</label>
										<input type="text" class="form-control" name="MaeNome" id="MaeNome" value="<?php echo $MAE_NOME;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Mãe - Cartão de Cidadão</label>
										<input type="text" class="form-control" name="MaeCartaoDeCidadao" id="MaeCartaoDeCidadao" value="<?php echo $MAE_CARTAO_DE_CIDADAO;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Mãe - Validade do Cartão de Cidadão</label>
										<input type="date" class="form-control" name="MaeValidadeDoCartaoDeCidadao" id="MaeValidadeDoCartaoDeCidadao" value="<?php echo $MAE_VALIDADE_DO_CARTAO_DE_CIDADAO;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Mãe - Numero de Identificação Fiscal</label>
										<input type="number" class="form-control" name="MaeNumeroDeIdentificacaoFiscal" id="MaeNumeroDeIdentificacaoFiscal" value="<?php echo $MAE_NIF;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Mãe - Estado Civil</label>
										<input type="text" class="form-control" name="MaeEstadoCivil" id="MaeEstadoCivil" value="<?php echo $MAE_ESTADO_CIVIL;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Mãe - Naturalidade</label>
										<input type="text" class="form-control" name="MaeNaturalidade" id="MaeNaturalidade" value="<?php echo $MAE_NATURALIDADE;?>" readonly>
									</div>
										<div class="form-group">
										<label for="inputText3" class="col-form-label">Mãe - Morada</label>
										<input type="text" class="form-control" name="MaeMorada" id="MaeMorada" value="<?php echo $MAE_MORADA;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Mãe - Código Postal</label>
										<input type="text" class="form-control" name="MaeCodigoPostal" id="MaeCodigoPostal" maxlength="8" value="<?php echo $MAE_CODIGO_POSTAL;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Mãe - Endereço de Email</label>
										<input type="email" class="form-control" name="MaeEnderecoEmail" id="MaeEnderecoEmail" value="<?php echo $MAE_EMAIL;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Mãe - Telefone/Telemóvel</label>
										<input type="number" class="form-control" name="MaeTelefoneTelemovel" id="MaeTelefoneTelemovel" value="<?php echo $MAE_NUMERO_DE_TELEFONE;?>" readonly maxlength="9" minlength="9">
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Mãe - Local de Trabalho</label>
										<input type="text" class="form-control" name="MaeLocalDeTrabalho" id="MaeLocalDeTrabalho" value="<?php echo $MAE_LOCAL_DE_TRABALHO;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Mãe - Telefone do Local de Trabalho</label>
										<input type="number" class="form-control" name="MaeTelefoneDoLocalDeTrabalho" id="MaeTelefoneDoLocalDeTrabalho" value="<?php echo $MAE_TELEFONE_DO_LOCAL_DE_TRABALHO;?>" readonly maxlength="9" minlength="9">
									</div>
								</div>	
							</div>	
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<h5 class="card-header">Encarregado de Educação</h5> <!-- Encarregado de Educação -->
								<div class="card-body">
									<label for="inputText3" class="col-form-label">Grau de Parentesco:</label>
									<div class="form-group">
										<div style="display: flex; flex-direction: row">
											<input style="padding: 7px;" id="forPai" type="radio" value="Pai" name="GrauDeParentesco" <?php if ($EE_GRAU_DE_PARENTESCO == "Pai") echo 'checked';?> disabled>
        									<label style="padding: 7px;" for="forPai" class="col-form-label">Pai</label>

											<input style="padding: 7px;" id="forMae" type="radio" value="Mae" name="GrauDeParentesco" <?php if ($EE_GRAU_DE_PARENTESCO == "Mae") echo 'checked';?> disabled>
											<label style="padding: 7px;" for="forMae" class="col-form-label">Mãe</label>

											<input style="padding: 7px;" id="forEE" type="radio" value="Outro" name="GrauDeParentesco" <?php if ($EE_GRAU_DE_PARENTESCO != "Pai" && $EE_GRAU_DE_PARENTESCO != "Mae") echo 'checked';?> disabled>
											<label style="padding: 7px;" for="forEE" class="col-form-label">Outro</label>

											<label style="padding: 7px;" for="QualGrauDeParentescoTextInput" class="col-form-label" >Qual?</label>
											<input style="padding: 7px;" type="text" class="form-control" id="QualGrauDeParentescoTextInput" name="OutroGrauDeParentesco" readonly value="<?php echo $EE_OUTRO_GRAU_DE_PARENTESCO;?>">
										</div>
										<div class="form-group">
											<label for="inputText3" class="col-form-label">Nome:</label>
											<input type="text" class="form-control" name="EENome" id="EENome" value="<?php echo $EE_NOME;?>" readonly readonly>
										</div>
										<div class="form-group">
											<label for="inputText3" class="col-form-label">Cartão de Cidadão</label>
											<input type="text" class="form-control" name="EECartaoDeCidadao" id="EECartaoDeCidadao" value="<?php echo $EE_CARTAO_DE_CIDADAO;?>" readonly readonly>
										</div>	
										<div class="form-group">
											<label for="inputText3" class="col-form-label">Validade do Cartão de Cidadão</label>
											<input type="date" class="form-control" name="EEValidadeDoCartaoDeCidadao" id="EEValidadeDoCartaoDeCidadao" value="<?php echo $EE_VALIDADE_DO_CARTAO_DE_CIDADAO;?>" readonly readonly>
										</div>	
										<div class="form-group">
											<label for="inputText3" class="col-form-label">Numero de Identificação Fiscal</label>
											<input type="number" class="form-control" name="EENumeroDeIdentificacaoFiscal" id="EENumeroDeIdentificacaoFiscal" value="<?php echo $EE_NIF;?>" readonly>
										</div>	
										<div class="form-group">
											<label for="inputText3" class="col-form-label">Estado Civil</label>
											<input type="text" class="form-control" name="EEEstadoCivil" id="EEEstadoCivil" value="<?php echo $EE_ESTADO_CIVIL;?>" readonly readonly>
										</div>
										<div class="form-group">
											<label for="inputText3" class="col-form-label">Naturalidade</label>
											<input type="text" class="form-control" name="EENaturalidade" id="EENaturalidade" value="<?php echo $EE_NATURALIDADE;?>" readonly readonly>
										</div>
											<div class="form-group">
											<label for="inputText3" class="col-form-label">Morada</label>
											<input type="text" class="form-control" name="EEMorada" id="EEMorada" value="<?php echo $EE_MORADA;?>" readonly readonly>
										</div>
										<div class="form-group">
											<label for="inputText3" class="col-form-label">Código Postal</label>
											<input type="text" class="form-control" name="EECodigoPostal" id="EECodigoPostal" value="<?php echo $EE_CODIGO_POSTAL;?>" maxlength="8" readonly readonly>
										</div>
										<div class="form-group">
											<label for="inputText3" class="col-form-label">Endereço de Email</label>
											<input type="email" class="form-control" name="EEEnderecoEmail" id="EEEnderecoEmail" value="<?php echo $EE_EMAIL;?>" readonly readonly>
										</div>
										<div class="form-group">
											<label for="inputText3" class="col-form-label">Telefone/Telemóvel</label>
											<input type="number" class="form-control" name="EETelefoneTelemovel" id="EETelefoneTelemovel" value="<?php echo $EE_NUMERO_DE_TELEFONE;?>" readonly readonly maxlength="9" minlength="9">
										</div>
										<div class="form-group">
											<label for="inputText3" class="col-form-label">Contacto de Emergência</label>
											<input type="number" class="form-control" name="EEContactoDeEmergencia" id="EEContactoDeEmergencia" value="<?php echo $EE_CONTACTO_DE_EMERGENCIA;?>" readonly>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-header">Frequentação</h5>
									<label for="inputText3" class="col-form-label">A criança frequentou: </label>
									<div class="form-group">
										<div style="display: flex; flex-direction: row">
											<input style="padding: 7px;" id="Ama" type="radio" value="Ama" name="Frequentacao" <?php if ($ALUNO_JA_FREQUENTOU == "Ama") echo 'checked';?> disabled>
											<label style="padding: 7px;" for="Ama" class="col-form-label">Ama</label>

											<input style="padding: 7px;" id="Creche" type="radio" value="Creche" name="Frequentacao" <?php if ($ALUNO_JA_FREQUENTOU == "Creche") echo 'checked';?> disabled>
											<label style="padding: 7px;" for="Creche" class="col-form-label">Creche</label>
											
											<input style="padding: 7px;" id="JardimDeInfancia" type="radio" value="Jardim de Infância" name="Frequentacao" <?php if ($ALUNO_JA_FREQUENTOU == "Jardim de Infância") echo 'checked';?> disabled>
											<label style="padding: 7px; width: 250px;" for="JardimDeInfancia" class="col-form-label">Jardim de Infância</label>
										</div>
										<div>
											<input style="padding: 7px;" id="frequentacaoOutro" type="radio" value="Outro" name="Frequentacao" <?php if ($ALUNO_JA_FREQUENTOU != "Ama" && $ALUNO_JA_FREQUENTOU != "Creche" && $ALUNO_JA_FREQUENTOU != "Jardim de Infância") echo 'checked';?> disabled>
											<label style="padding: 7px;" for="frequentacaoOutro" class="col-form-label">Outro</label>

											<label style="padding: 7px;" for="inputText3" class="col-form-label">Qual?</label>
											<input style="padding: 7px;" type="text" class="form-control" id="QualFrequentacaoTextInput" name="Frequentacao" disabled value="<?php if ($ALUNO_JA_FREQUENTOU != "Ama" && $ALUNO_JA_FREQUENTOU != "Creche" && $ALUNO_JA_FREQUENTOU != "Jardim de Infância") echo $ALUNO_JA_FREQUENTOU;?>">
										</div>
									</div>
								</div>	
							</div>	
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-header">Antecedentes Hereditários:</h5>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Tem problemas de saúde?</label>
										<div class="form-group" style="display: flex; flex-direction: row">
											<input style="padding: 7px;" id="ProblemasDeSaudeNao" type="radio" name="ProblemasDeSaude" value="Não" <?php if ($DOENCAS_TEM_PROBLEMAS_DE_SAUDE == "Não") echo 'checked';?> disabled>
											<label style="padding: 7px;" for="ProblemasDeSaudeNao" class="col-form-label">Não</label>

											<input style="padding: 7px;" id="ProblemasDeSaudeSim" type="radio" name="ProblemasDeSaude" value="Sim" <?php if ($DOENCAS_TEM_PROBLEMAS_DE_SAUDE == "Sim") echo 'checked';?> disabled>
											<label style="padding: 7px;" for="ProblemasDeSaudeSim" class="col-form-label">Sim</label>
										</div>
										<div class="form-group">
											<input type="checkbox" id="OpcaoDiabetes" name="Diabetes" <?php if ($DOENCAS_DIABETES == "Sim") echo 'checked';?> disabled>
											<label for="inputText3">Diabetes</label>
										</div>
										<div class="form-group">
											<input type="checkbox" id="OpcaoDoencasMentais" name="DoencasMentais" <?php if ($DOENCAS_DOENCAS_MENTAIS == "Sim") echo 'checked';?> disabled>
											<label for="inputText3">Doenças Mentais</label>
										</div>
										<div class="form-group">
											<input type="checkbox" id="OpcaoDeficienciaFisica" name="DeficienciaFisica" <?php if ($DOENCAS_DEFICIENCIA_FISICA == "Sim") echo 'checked';?> disabled>
											<label for="inputText3">Deficiência Física</label>
										</div>
										<div class="form-group">
											<input type="checkbox" id="OpcaoAlcoolismo" name="Alcoolismo" <?php if ($DOENCAS_ALCOOLISMO == "Sim") echo 'checked';?> disabled>
											<label for="inputText3">Alcoolismo</label>
										</div>
										<div class="form-group">
											<label style="padding: 7px;" for="inputText3" class="col-form-label">Outras:</label>
											<input style="padding: 7px;" type="text" class="form-control" id="OutrosProblemasDeSaude" name="OutrosProblemasDeSaude" readonly value="<?php echo $DOENCAS_OUTRAS;?>">
										</div>
										<div class="form-group">
											<label style="padding: 7px;" for="inputText3" class="col-form-label">Quais os cuidados de saúde a ter em conta ou medidas de prevenção para com a criança?:</label>
											<input style="padding: 7px;" type="text" class="form-control" id="QuaisOsCuidadosDeSaudeATerEmConta" name="QuaisOsCuidadosDeSaudeATerEmConta" readonly value="<?php echo $DOENCAS_QUAIS_OS_CUIDADOS_A_TER_EM_CONTA;?>">
										</div>

										<label for="inputText3" class="col-form-label">Tem alguma alergia?</label>
										<div class="form-group" style="display: flex; flex-direction: row">
											<input style="padding: 7px;" id="TemAlgumaAlergiaNao" type="radio" name="TemAlgumaAlergia" value="Não" <?php if ($ALERGIAS_TEM == "Não") echo 'checked';?> disabled>
											<label style="padding: 7px;" for="TemAlgumaAlergiaNao" class="col-form-label">Não</label>

											<input style="padding: 7px;" id="TemAlgumaAlergiaSim" type="radio" name="TemAlgumaAlergia" value="Sim" <?php if ($ALERGIAS_TEM == "Sim") echo 'checked';?> disabled>
											<label style="padding: 7px;" for="TemAlgumaAlergiaSim" class="col-form-label">Sim</label>
										</div>
										<div class="form-group">
											<label style="padding: 7px;" for="inputText3" class="col-form-label">Quais?:</label>
											<input style="padding: 7px;" type="text" class="form-control" id="QuaisAlergias" name="QuaisAlergias" readonly value="<?php echo $ALERGIAS_QUAIS;?>">
										</div>
										<div class="form-group">
											<label style="padding: 7px;" for="inputText3" class="col-form-label">Como se manifesta?:</label>
											<input style="padding: 7px;" type="text" class="form-control" id="ComoSeManifestaAlergias" name="ComoSeManifestaAlergias" readonly value="<?php echo $ALERGIAS_COMO_MANIFESTAM;?>">
										</div>
									</div>
								</div>	
							</div>	
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-header">Necessidades Educativas Especiais</h5>
									<label for="inputText3" class="col-form-label">Apresenta Necessidades Educativas Especiais?</label>
									<div class="form-group">
										<input style="padding: 7px;" id="NecessidadesEducativasEspeciaisNao" type="radio" name="NecessidadesEducativasEspeciais" value="Não" <?php if ($APRESENTA_NECESSIDADES_EDUCATIVAS_ESPECIAIS == "Não") echo 'checked';?> disabled>
										<label style="padding: 7px;" for="NecessidadesEducativasEspeciaisNao" class="col-form-label">Não</label>
											
										<input style="padding: 7px;" id="NecessidadesEducativasEspeciaisSim" type="radio" name="NecessidadesEducativasEspeciais" value="Sim" <?php if ($APRESENTA_NECESSIDADES_EDUCATIVAS_ESPECIAIS == "Sim") echo 'checked';?> disabled>
										<label style="padding: 7px;" for="NecessidadesEducativasEspeciaisSim" class="col-form-label">Sim</label>
										<p>(Se sim anexar Relatório Comprovativo)</p>
									</div>
								</div>	
							</div>	
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-header">Núcleo Escolar</h5>
									<label for="inputText3" class="col-form-label">Tem algum irmão a frequentar este Núcleo Escolar?</label>
									<div class="form-group">
										<input style="padding: 7px;" id="IrmaoFrequentarNucleoEscolarNao" type="radio" name="IrmaoFrequentarNucleoEscolar" value="Não" <?php if ($TEVE_ALGUM_IRMAO_A_FREQUENTAR_ANTES == "Não") echo 'checked';?> disabled>
										<label style="padding: 7px;" for="IrmaoFrequentarNucleoEscolarNao" class="col-form-label">Não</label>

										<input style="padding: 7px;" id="IrmaoFrequentarNucleoEscolarSim" type="radio" name="IrmaoFrequentarNucleoEscolar" value="Sim" <?php if ($TEVE_ALGUM_IRMAO_A_FREQUENTAR_ANTES == "Sim") echo 'checked';?> disabled>
										<label style="padding: 7px;" for="IrmaoFrequentarNucleoEscolarSim" class="col-form-label">Sim</label>
									</div>
									<div>
										<label style="padding: 7px;" for="inputText3" class="col-form-label">Se sim em qual escola?:</label>
										<input style="padding: 7px;" type="text" class="form-control" id="IrmaoFrequentarNucleoEscolarEmQualEscola" name="IrmaoFrequentarNucleoEscolarEmQualEscola"  value="<?php echo $IRMAO_FREQUENCIA_ANTERIOR;?>" readonly>
									</div>
								</div>	
							</div>	
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-header">Período de Almoço</h5>
									<label for="inputText3" class="col-form-label">Onde vai almoçar durante o período escolar?</label>
									<div class="form-group">
   										<input style="padding: 7px;" type="checkbox" id="AlmocoEmCasa" name="AlmocoEmCasa" <?php if ($ALMOCO_EM_CASA == "Sim") echo 'checked';?> disabled>
   										<label style="padding: 7px;" for="inputText3">Em Casa</label>
										   
										<input style="padding: 7px;" type="checkbox" id="AlmocoNaEscola" name="AlmocoNaEscola" <?php if ($ALMOCO_NA_ESCOLA == "Sim") echo 'checked';?> disabled>
   										<label style="padding: 7px;" for="inputText3">Na Escola</label>
									</div>
									<div>
										<label style="padding-right: 7px;" for="inputText3" class="col-form-label">Na Escola:</label>
										<input style="padding: 7px;" type="checkbox" id="AlmocoDeCasa" name="AlmocoDeCasa" disabled <?php if ($ALMOCO_DE_CASA == "Sim") echo 'checked';?> disabled>
   										<label style="padding: 7px;" for="inputText3">Almoco de Casa</label>
										   
										<input style="padding: 7px;" type="checkbox" id="AlmocoDaEscola" name="AlmocoDaEscola" disabled  <?php if ($ALMOCO_DA_ESCOLA == "Sim") echo 'checked';?> disabled>
   										<label style="padding: 7px;" for="inputText3">Almoco servido pela Escola</label>
									</div>
								</div>	
							</div>	
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-header">Transporte e A.T.L</h5>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Quem normalmente vem <b>trazer</b> o Aluno?</label>
										<input style="padding: 7px;" type="text" class="form-control" id="QuemNormalmenteVemTrazer" name="QuemNormalmenteVemTrazer" value="<?php echo $QUEM_VEM_TRAZER_O_ALUNO;?>" readonly>
										
										<label for="inputText3" class="col-form-label">Quem normalmente vem <b>buscar</b> o Aluno?</label>
										<input style="padding: 7px;" type="text" class="form-control" id="QuemNormalmenteVemBuscar" name="QuemNormalmenteVemBuscar" value="<?php echo $QUEM_VEM_BUSCAR_O_ALUNO;?>" readonly>
									</div>
									<div>
										<b><label for="inputText3" class="col-form-label">Qual a pessoa a quem se pode confiar a criança?</label></b>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Nome</label>
										<input type="text" class="form-control" name="NomeDeQuemSePodeConfiar" id="NomeDeQuemSePodeConfiar" value="<?php echo $PESSOA_DE_CONFIANCA_NOME;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Morada</label>
										<input type="text" class="form-control" name="MoradaDeQuemSePodeConfiar" id="MoradaDeQuemSePodeConfiar" value="<?php echo $PESSOA_DE_CONFIANCA_MORADA;?>" readonly>
									</div>
									<div class="form-group">
										<label for="inputText3" class="col-form-label">Telefone</label>
										<input type="number" class="form-control" name="TelefoneDeQuemSePodeConfiar" id="TelefoneDeQuemSePodeConfiar" value="<?php echo $PESSOA_DE_CONFIANCA_NUMERO;?>" readonly maxlength="9" minlength="9">
									</div>
									<div class="form-group">
										<label style="padding: 7px;" for="inputText3" class="col-form-label">Vai Frequentar A.T.L?</label>
										<input style="padding: 7px;" id="VaiFrequentarATLNao" type="radio" name="VaiFrequentarATL" value="Não" <?php if ($ATL_VAI_FREQUENTAR == "Não") echo 'checked';?> disabled>
										<label style="padding: 7px;" for="VaiFrequentarATLNao" class="col-form-label">Não</label>

										<input style="padding: 7px;" id="VaiFrequentarATLSim" type="radio" name="VaiFrequentarATL" value="Sim" <?php if ($ATL_VAI_FREQUENTAR == "Sim") echo 'checked';?> disabled>
										<label style="padding: 7px;" for="VaiFrequentarATLSim" class="col-form-label">Sim</label>
									</div>
									<div class="form-group">
										<label style="padding-right: 7px;" for="inputText3" class="col-form-label">Se sim, onde?</label>

										<input style="padding: 7px;" id="SeSimOndeATLnaEscola" type="radio" name="SeSimOndeATL" value="Na Escola" disabled <?php if ($ATL_ONDE == "Na Escola") echo 'checked';?> disabled>
										<label style="padding: 7px;" for="SeSimOndeATLnaEscola" class="col-form-label">Na Escola</label>

										<input style="padding: 7px;" id="SeSimOndeATLOutroLocal" type="radio" name="SeSimOndeATL" value="Outro Local" disabled <?php if ($ATL_ONDE == "Outro Local") echo 'checked';?> disabled>
										<label style="padding: 7px;" for="SeSimOndeATLOutroLocal" class="col-form-label">Outro Local</label>
									</div>
								</div>	
							</div>	
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-header">Autorização de Imagens do Aluno</h5>
									<div class="form-group">
										<label style="padding-right: 7px;" for="inputText3" class="col-form-label">Respeitando a legislação em vigor, solicita-se a V.Exª 
											autorização para captação e utilização de imagens do seu educando, para fins escolares (trabalhos, páginas na Internet, 
											exposições e jornais escolares).
										</label>
									</div>
									
									<div class="form-group">
										<input style="padding: 7px;" id="SimImagensAutorizacao" type="radio" name="AutorizacaoDeImagens" value="Autorizo" <?php if ($AUTORIZACAO_DE_IMAGENS_DO_ALUNO == "Autorizo") echo 'checked';?> disabled>
										<label style="padding: 7px;" for="inputText3" class="col-form-label">Autorizo</label>

										<input style="padding: 7px;" id="NaoImagensAutorizacao" type="radio" name="AutorizacaoDeImagens" value="Não Autorizo" <?php if ($AUTORIZACAO_DE_IMAGENS_DO_ALUNO == "Não Autorizo") echo 'checked';?> disabled>
										<label style="padding: 7px;" for="inputText3" class="col-form-label">Não Autorizo</label>
									</div>
			
								</div>	
							</div>	
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-header">Assinatura da Matrícula</h5>
									<div class="form-group">
										<br>

										<label style="padding-right: 7px;" for="inputText3" class="col-form-label">
											Declaro para os efeitos previstos no dispositivo no art 13º do Regulamento Geral de Proteção de Dados (EU)2016/679 do P.E. do
											Conselho de 27 de Abril (RGPD) prestar, por este meio, o meu consentimento para o tratamento dos meus dados pessoais acima
											indicados bem como os do meu educando para efeitos pedagógicos e de gestão escolar. A presente declaração constitui título
											bastante para conferir autorização para o tratamento dos meus dados pessoas, assim como do meu educando no âmbito do Sistema
											Geral Escolar para fins de suporte de decisão pedagógica e administrativa da escola e da tutela. Tomei conhecimento de que a
											falta de consentimento para o tratamento dos meus dados pessoais terá como resultado falta da verificação dos pressupostos
											exigidos para exerver a figura de Encarregado de Educação, assim como para o meu educando poder ser, devidamente, matriculado
											em unidade orgânica do sistema educativo regional.
										</label>
										
										<br><br>

										<input style="padding: 7px;" id="SimImagensAutorizacao" type="radio" name="ConcordoRegulamento" value="Concordo" <?php if ($CONCORDO_REGULAMENTO == "Concordo") echo 'checked';?> disabled>
										<label style="padding: 7px;" for="inputText3" class="col-form-label">Concordo</label>
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
										<input type="radio" name="concordar_regulamento_da_escola" value="Concordo" required <?php if ($CONCORDAR_REGULAMENTO_DA_ESCOLA == "Concordo") echo 'checked'?> disabled>
										<label style="padding: 7px;" for="concordar_regulamento_da_escola" class="col-form-label">Concordo</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-header">Observações</h5>
									<div class="form-group">
										<input style="padding: 7px; height: 180px;" type="text" class="form-control" id="Observacoes" name="Observacoes" value="<?php echo $OBSERVACOES;?>" readonly>
									</div>
								</div>	
							</div>	
						</div>
					</div>
				</div>
			</div>
		</form>
    </div>
	<script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../assets/vendor/shortable-nestable/Sortable.min.js"></script>
    <script src="../assets/vendor/shortable-nestable/sort-nest.js"></script>
    <script src="../assets/vendor/shortable-nestable/jquery.nestable.js"></script>
</body>
</html>