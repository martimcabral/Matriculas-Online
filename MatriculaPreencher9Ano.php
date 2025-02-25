<?php
	# Funcionamento dos Estados das Matriculas
	/*
		0 - Primeira vez a ser criada, pode ser aleterada
		1 - Pertence a Secretaria, NAO pode ser alterada
		2 - Pertence ao Diretor de Turma, NAO pode ser alterada
		3 - Pertence à Informatica, NAO pode ser alterada
	*/

	include('../db.php');

	session_start();
    $NIF_ALUNO = $_SESSION['NIF_ALUNO'];
	$NIF_EE = $_SESSION['NIF_EE'];

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

	$ano_escolar = $IAnoSelecionado - 1;
    
    $sql_matriculas = "SELECT * FROM matriculas_ficha_9ano_dss WHERE aluno_nif = $NIF_ALUNO AND ee_nif = $NIF_EE";
    $result_matriculas = $conn->query($sql_matriculas);
    
    if ($result_matriculas->num_rows >0) {
		while($row = $result_matriculas->fetch_assoc()) {
			$ENCONTROU_NAS_MATRICULAS = true;

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
	} else {
		$ENCONTROU_NAS_MATRICULAS = false;
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
				echo "<form action='MatriculaAtualizar9Ano.php' method='POST'>";
			} else {
				echo "<form action='MatriculaNova9Ano.php' method='POST'>";
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
									<input type="text" class="form-control" name="aluno_nif" value="<?php echo $NIF_ALUNO;?>" readonly>
									<label class="col-form-label">NIF do Encarregado de Educação:</label>
									<input type="text" class="form-control" name="ee_nif" value="<?php echo $NIF_EE;?>" readonly>

									<label class="col-form-label">Nome do(a) Aluno(a):</label>
									<input onchange="updateAlunoNome()" type="text" class="form-control" id="aluno_nome" name="aluno_nome" value="<?php echo $ALUNO_NOME;?>">
									<label class="col-form-label">Nome do(a) Encarregado(a) de Educação:</label>
									<input onchange="updateEENome()" type="text" class="form-control" id="ee_nome" name="ee_nome" value="<?php echo $EE_NOME;?>">

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
										<input class="form-check-input" type="checkbox" name="portugues" value="Sim" <?php if ($PORTUGUES == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Português</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="ingles" value="Sim" <?php if ($INGLES == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Inglês</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="frances" value="Sim" <?php if ($FRANCES == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Francês</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="historia" value="Sim" <?php if ($HISTORIA == 'Sim') echo 'checked';?>> 
										<label class="form-check-label">História</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="hgca" value="Sim" <?php if ($HGCA == 'Sim') echo 'checked';?>>
										<label class="form-check-label">História, Geografia e Cultura dos Açores</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="matematica" value="Sim" <?php if ($MATEMATICA == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Matemática</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="ciencias_naturais" value="Sim" <?php if ($CIENCIAS_NATURAIS == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Ciências Naturais</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="fisico_quimica" value="Sim" <?php if ($FISICO_QUIMICA == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Fisico-Química</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="educacao_visual" value="Sim" <?php if ($EDUCACAO_VISUAL == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Educação Visual</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="educacao_tecnologica" value="Sim" <?php if ($EDUCACAO_TECNOLOGICA == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Educação Tecnológica</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="tecnologia_da_informacao_e_Comunicacao" value="Sim" <?php if ($TIC == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Tecnologia da Informação e Comunicação</label>
									</div>
									
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="educacao_fisica" value="Sim" <?php if ($EDUCACAO_FISICA == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Educação Física</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="cidadania" value="Sim" <?php if ($CIDADANIA == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Cidadania e Desenvolvimento</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="dps" value="Sim" <?php if ($DPS == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Desenvolvimento Pessoal e Social</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="educacao_musical" value="Sim" <?php if ($EDUCACAO_MUSICAL == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Educação Musical</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="fotografia_e_video" value="Sim" <?php if ($FOTOGRAFIA_E_VIDEO == 'Sim') echo 'checked';?>>
										<label class="form-check-label">Fotografia e Video</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="moral" value="Sim" <?php if ($MORAL == 'Sim') echo 'checked';?>>
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