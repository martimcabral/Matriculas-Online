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

    $sql_matriculas = "SELECT * FROM matriculas_ficha_9ano_dss WHERE id = $id";
    $result_matriculas = $conn->query($sql_matriculas);
    
    if ($result_matriculas->num_rows >0) {
		while($row = $result_matriculas->fetch_assoc()) {
			$ENCONTROU_NAS_MATRICULAS = true;

			$ALUNO_NIF = $row['aluno_nif'];
			$EE_NIF = $row['ee_nif'];
			$ALUNO_NOME = $row['aluno_nome'];
			$EE_NOME = $row['ee_nome'];

			$PORTUGUES = $row['portugues'];
			$INGLES = $row['ingles'];
			$FRANCES = $row['frances'];
			$HISTORIA = $row['historia'];
			$HGCA = $row['hgca'];
			$MATEMATICA = $row['matematica'];
			$CIENCIAS_NATURAIS = $row['ciencias_naturais'];
			$FISICO_QUIMICA = $row['fisico_quimica'];
			$EDUCACAO_VISUAL = $row['educacao_visual'];
			$EDUCACAO_TECNOLOGICA = $row['educacao_tecnologica'];
			$TIC = $row['tic'];
			$EDUCACAO_FISICA = $row['educacao_fisica'];
			$CIDADANIA = $row['cidadania'];
			$DPS = $row['dps'];
			$EDUCACAO_MUSICAL = $row['educacao_musical'];
			$FOTOGRAFIA_E_VIDEO = $row['fotografia_e_video'];
			$MORAL = $row['moral'];

			$CONCORDAR_REGULAMENTO_DA_ESCOLA = $row["concordar_regulamento_da_escola"];
			$OBSERVACOES = $row['observacoes'];
			$ESTADO = $row['estado'];
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
			if ($EstadoMenuBarra <> 1 or empty($EstadoMenuBarra)){
				include('../menu.php'); 
				echo '<div class="dashboard-wrapper">';
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
									<label class="col-form-label">NIF do Aluno:</label>
									<input type="text" class="form-control" name="aluno_nif" value="<?php echo $ALUNO_NIF;?>" readonly>
									<label class="col-form-label">NIF do Encarregado de Educação:</label>
									<input type="text" class="form-control" name="ee_nif" value="<?php echo $EE_NIF;?>" readonly>

									<label class="col-form-label">Nome do(a) Aluno(a):</label>
									<input onchange="updateAlunoNome()" type="text" class="form-control" id="aluno_nome" name="aluno_nome" value="<?php echo $ALUNO_NOME;?>" readonly>
									<label class="col-form-label">Nome do(a) Encarregado(a) de Educação:</label>
									<input onchange="updateEENome()" type="text" class="form-control" id="ee_nome" name="ee_nome" value="<?php echo $EE_NOME;?>" readonly>

									<br>

									<p>Eu, <b><span id="nome_ee"></span></b>, Encarregado(a) de Educação do(a) aluno(a), <b><span id="nome_aluno"></span></b>, 
										concordo com a proposta do Conselho de Turma segundo a qual o meu educando matricular-se-á apenas nas  
										disciplinas em que não obteve sucesso de acordo com a Portaria nº 102/2016 de 18 de Outubro de 2016,
										artigo 15º, ponto 6, alínea b, respeitando as condições que a escola puder oferecer.
									</p>

									<script>
										function updateAlunoNome() {
											document.getElementById('nome_aluno').textContent = document.getElementById('aluno_nome').value;
										}

										function updateEENome() {
											document.getElementById('nome_ee').textContent = document.getElementById('ee_nome').value;
										}

										updateAlunoNome();
										updateEENome();
									</script>
								</div>

								<!--
								<select class="form-control" id="concordar" name="concordar" required>
									<option value="">--Selecionar--</option>
									<option value="concordo">concordo</option>
									<option value="não concordo">não concordo</option>
								</select>
								-->

								<div class="form-group" style="display: flex; flex-direction: column;">				
									<b><p>Pretendo que o meu educando se matricule nas seguintes disciplinas:</p></b>
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="portugues" value="Sim" <?php if ($PORTUGUES == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Português</label>
									</div>
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="ingles" value="Sim" <?php if ($INGLES == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Inglês</label>
									</div>
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="frances" value="Sim" <?php if ($FRANCES == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Francês</label>
									</div>
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="historia" value="Sim" <?php if ($HISTORIA == 'Sim') echo 'checked';?>> 
										<label class="form-check-label">História</label>
									</div>
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="hgca" value="Sim" <?php if ($HGCA == 'Sim') echo 'checked';?>>
										<label class="form-check-label">História, Geografia e Cultura dos Açores</label>
									</div>
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="matematica" value="Sim" <?php if ($MATEMATICA == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Matemática</label>
									</div>
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="ciencias_naturais" value="Sim" <?php if ($CIENCIAS_NATURAIS == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Ciências Naturais</label>
									</div>
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="fisico_quimica" value="Sim" <?php if ($FISICO_QUIMICA == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Fisico-Química</label>
									</div>
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="educacao_visual" value="Sim" <?php if ($EDUCACAO_VISUAL == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Educação Visual</label>
									</div>
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="educacao_tecnologica" value="Sim" <?php if ($EDUCACAO_TECNOLOGICA == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Educação Tecnológica</label>
									</div>
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="tecnologia_da_informacao_e_Comunicacao" value="Sim" <?php if ($TIC == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Tecnologia da Informação e Comunicação</label>
									</div>
									
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="educacao_fisica" value="Sim" <?php if ($EDUCACAO_FISICA == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Educação Física</label>
									</div>
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="cidadania" value="Sim" <?php if ($CIDADANIA == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Cidadania e Desenvolvimento</label>
									</div>
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="dps" value="Sim" <?php if ($DPS == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Desenvolvimento Pessoal e Social</label>
									</div>
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="educacao_musical" value="Sim" <?php if ($EDUCACAO_MUSICAL == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Educação Musical</label>
									</div>
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="fotografia_e_video" value="Sim" <?php if ($FOTOGRAFIA_E_VIDEO == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Fotografia e Video</label>
									</div>
									<div class="form-check">
										<input disabled class="form-check-input" type="checkbox" name="moral" value="Sim" <?php if ($MORAL == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Educação Moral e Religiosa</label>
									</div>
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
								<h5 class="card-header">OBSERVAÇÕES</h5>
									<div class="form-group">
										<input style="padding: 7px; height: 180px;" type="text" class="form-control" id="observacoes" name="observacoes" value="<?php echo $OBSERVACOES;?>" readonly>
									</div>
								</div>	
							</div>	
						</div>
					</div>
				</div>
			</div>
			<div style="margin-top: -80px;" class="container-fluid dashboard-content">
				<div class="dashboard-short-list">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<h5 class="card-header">DOCUMENTOS OBRIGATÓRIOS</h5>
								<div class="card-body">
									<input hidden type="text" name="aluno_nif" value="<?php echo $ALUNO_NIF;?>">
									<input hidden type="text" name="ee_nif" value="<?php echo $EE_NIF;?>">
									<?php
										$types = [
											"png", 
											"jpg", 
											"jpeg", 
											"pdf", 
										];

										$documents = [
											'cc_aluno' => false,
											'cc_mae' => false,
											'cc_pai' => false,
											'cc_ee' => false,
											'vacinacao' => false,
											'subsistema_de_saude' => false,
											'fotografia_passe' => false,
										];

										foreach ($documents as $key => &$exists) {
											foreach ($types as $type) {
												$pasta = '../Ficheiros/Matriculas/1/' . $ALUNO_NIF . '.' . $EE_NIF . '/';
												$file_name = $pasta . $key . '.' . $type;

												if (file_exists($file_name)) {
													$exists = true;
													if ($key == "cc_aluno") {
														$image_src_cc_aluno = $file_name;
													} else if ($key == "cc_mae") {
														$image_src_cc_mae = $file_name;
													} else if ($key == "cc_pai") {
														$image_src_cc_pai = $file_name;
													} else if ($key == "cc_ee") {
														$image_src_cc_ee = $file_name;
													} else if ($key == "vacinacao") {
														$image_src_vacinacao = $file_name;
													} else if ($key == "subsistema_de_saude") {
														$image_src_subsistema_de_saude = $file_name;
													} else if ($key == "fotografia_passe") {
														$image_src_fotografia_passe = $file_name;
													}
													break;
												}
											}
										}
									?>

									<div class="form-group">
										<i id="aluno_cc_close" class="m-r-10 mdi mdi-close" style="color: red; font-size: 16px; <?php echo $documents['cc_aluno'] ? 'display: none;' : ''; ?>">Por Entregar</i>
										<i id="aluno_cc_check" class="m-r-10 mdi mdi-check" style="color: green; font-size: 16px; <?php echo $documents['cc_aluno'] ? '' : 'display: none;'; ?>">Entregue</i>
										<label class="col-form-group">Cartão do Cidadão do Aluno:</label>
									</div>
									<div class="form-group">
										<img style="max-width: 150px; max-height: 150px; width: auto; height: auto;" src="<?php echo $image_src_cc_aluno?>">
									</div>
									<div class="form-group">
										<i id="mae_cc_close" class="m-r-10 mdi mdi-close" style="color: red; font-size: 16px; <?php echo $documents['cc_mae'] ? 'display: none;' : ''; ?>">Por Entregar</i>
										<i id="mae_cc_check" class="m-r-10 mdi mdi-check" style="color: green; font-size: 16px; <?php echo $documents['cc_mae'] ? '' : 'display: none;'; ?>">Entregue</i>
										<label class="col-form-group">Cartão do Cidadão da Mãe:</label>
									</div>
									<div class="form-group">
										<img style="max-width: 150px; max-height: 150px; width: auto; height: auto;" src="<?php echo $image_src_cc_mae?>">
									</div>
									<div class="form-group">
										<i id="pai_cc_close" class="m-r-10 mdi mdi-close" style="color: red; font-size: 16px; <?php echo $documents['cc_pai'] ? 'display: none;' : ''; ?>">Por Entregar</i>
										<i id="pai_cc_check" class="m-r-10 mdi mdi-check" style="color: green; font-size: 16px; <?php echo $documents['cc_pai'] ? '' : 'display: none;'; ?>">Entregue</i>
										<label class="col-form-group">Cartão do Cidadão do Pai:</label>
									</div>
									<div class="form-group">
										<img style="max-width: 150px; max-height: 150px; width: auto; height: auto;" src="<?php echo $image_src_cc_pai?>">
									</div>
									<div class="form-group">
										<i id="ee_cc_close" class="m-r-10 mdi mdi-close" style="color: red; font-size: 16px; <?php echo $documents['cc_ee'] ? 'display: none;' : ''; ?>">Por Entregar</i>
										<i id="ee_cc_check" class="m-r-10 mdi mdi-check" style="color: green; font-size: 16px; <?php echo $documents['cc_ee'] ? '' : 'display: none;'; ?>">Entregue</i>
										<label class="col-form-group">Cartão do Cidadão da E.E.:</label>
									</div>
									<div class="form-group">
										<img style="max-width: 150px; max-height: 150px; width: auto; height: auto;" src="<?php echo $image_src_cc_ee?>">
									</div>
									<div class="form-group">
										<i id="vacinacao_close" class="m-r-10 mdi mdi-close" style="color: red; font-size: 16px; <?php echo $documents['vacinacao'] ? 'display: none;' : ''; ?>">Por Entregar</i>
										<i id="vacinacao_check" class="m-r-10 mdi mdi-check" style="color: green; font-size: 16px; <?php echo $documents['vacinacao'] ? '' : 'display: none;'; ?>">Entregue</i>
										<label class="col-form-group">Comprovativo de Vacinação:</label>
									</div>
									<div class="form-group">
										<img style="max-width: 150px; max-height: 150px; width: auto; height: auto;" src="<?php echo $image_src_vacinacao?>">
									</div>
									<div class="form-group">
										<i id="subsistema_close" class="m-r-10 mdi mdi-close" style="color: red; font-size: 16px; <?php echo $documents['subsistema_de_saude'] ? 'display: none;' : ''; ?>">Por Entregar</i>
										<i id="subsistema_check" class="m-r-10 mdi mdi-check" style="color: green; font-size: 16px; <?php echo $documents['subsistema_de_saude'] ? '' : 'display: none;'; ?>">Entregue</i>
										<label class="col-form-group">Comprovativo de Subsistema de Saúde:</label>
									</div>
									<div class="form-group">
										<img style="max-width: 150px; max-height: 150px; width: auto; height: auto;" src="<?php echo $image_src_subsistema_de_saude?>">
									</div>
									<div class="form-group">
										<i id="fotografia_close" class="m-r-10 mdi mdi-close" style="color: red; font-size: 16px; <?php echo $documents['fotografia_passe'] ? 'display: none;' : ''; ?>">Por Entregar</i>
										<i id="fotografia_check" class="m-r-10 mdi mdi-check" style="color: green; font-size: 16px; <?php echo $documents['fotografia_passe'] ? '' : 'display: none;'; ?>">Entregue</i>
										<label class="col-form-group">Comprovativo de Fotografia tipo Passe:</label>
									</div>
									<div class="form-group">
										<img style="max-width: 150px; max-height: 150px; width: auto; height: auto;" src="<?php echo $image_src_fotografia_passe?>">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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