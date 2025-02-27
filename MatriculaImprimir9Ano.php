<?php
    include('../db.php');

	if (isset($_GET['id']) && is_numeric($_GET['id'])) {
		$id = intval($_GET['id']);
	} else {
		echo "<script>alert('Ocorreu um erro durante a recolha do ID')</script>";
		echo "<script>history.back()</script>";
	}

	$sql = "SELECT * FROM matriculas_ficha_9ano_dss WHERE id = $id";
	$result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

			$ALUNO_NIF = $row['aluno_nif'];
			$ALUNO_NOME = $row['aluno_nome'];
			$EE_NIF = $row['ee_nif'];
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
			$TIC = $row['tecnologia_da_informacao_e_Comunicacao'];
			$EDUCACAO_FISICA = $row['educacao_fisica'];
			$CIDADANIA = $row['cidadania'];
			$DPS = $row['dps'];
			$EDUCACAO_MUSICAL = $row['educacao_musical'];
			$FOTOGRAFIA_E_VIDEO = $row['fotografia_e_video'];
			$MORAL = $row['moral'];

			$CONCORDAR_REGULAMENTO_DA_ESCOLA = $row["concordar_regulamento_da_escola"];
			$OBSERVACOES = $row["observacoes"];
			$ESTADO = $row["estado"];
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
		<legend>Identificação do(a) Aluno(a)</legend>
		<div class="collumn">
			<div class="row">
				<p>NIF do Aluno:</p>
				<input type="text" value="<?php echo $ALUNO_NIF;?>" readonly>
			</div>
			<div class="row">
				<p>Nome do Aluno:</p>
				<input type="text" id="aluno_nome" value="<?php echo $ALUNO_NOME;?>" readonly>
			</div>
		</div>
	</fieldset>
	
	<fieldset>
		<legend>Identificação do(a) Encarregado(a) de Educação</legend>
		<div class="collumn">
			<div class="row">
				<p>NIF do E.E.:</p>
				<input type="text" value="<?php echo $EE_NIF;?>" readonly>
			</div>
			<div class="row">
				<p>Nome do E.E.:</p>
				<input type="text" id="ee_nome" value="<?php echo $EE_NOME;?>" readonly>
			</div>
		</div>
	</fieldset>

	<script>
		document.getElementById('nome_aluno').textContent = document.getElementById('aluno_nome').value;
		document.getElementById('nome_ee').textContent = document.getElementById('ee_nome').value;
	</script>
	
	<fieldset>
		<legend>Opções das Disciplinas</legend>
		<div>
			<p style="width: 550px;">Eu, <b><span id="nome_ee"></span></b>, Encarregado(a) de Educação do(a) aluno(a), <b><span id="nome_aluno"></span></b>, 
			concordo com a proposta do Conselho de Turma segundo a qual o meu educando matricular-se-á apenas nas  
			disciplinas em que não obteve sucesso de acordo com a Portaria nº 102/2016 de 18 de Outubro de 2016,
			artigo 15º, ponto 6, alínea b, respeitando as condições que a escola puder oferecer.</p>
		</div>
			</p>
			<div class="row" style="width: 650px;">
				<div class="form-group" style="display: flex; flex-direction: column;">				
					<b><p style="width: 650px;">Pretendo que o meu educando se matricule nas seguintes disciplinas:</p></b>
					<div>
						<input disabled type="checkbox" <?php if ($PORTUGUES == 'Sim') echo 'checked';?>>
						<label>Português</label>
					</div>
					<div>
						<input disabled type="checkbox" <?php if ($INGLES == 'Sim') echo 'checked';?>>
						<label>Inglês</label>
					</div>
					<div>
						<input disabled type="checkbox" <?php if ($FRANCES == 'Sim') echo 'checked';?>>
						<label>Francês</label>
					</div>
					<div>
						<input disabled type="checkbox" <?php if ($HISTORIA == 'Sim') echo 'checked';?>> 
						<label>História</label>
					</div>
					<div>
						<input disabled type="checkbox" <?php if ($HGCA == 'Sim') echo 'checked';?>>
						<label>História, Geografia e Cultura dos Açores</label>
					</div>
					<div>
						<input disabled type="checkbox" <?php if ($MATEMATICA == 'Sim') echo 'checked';?>>
						<label>Matemática</label>
					</div>
					<div>
						<input disabled type="checkbox" <?php if ($CIENCIAS_NATURAIS == 'Sim') echo 'checked';?>>
						<label>Ciências Naturais</label>
					</div>
					<div>
						<input disabled type="checkbox" <?php if ($FISICO_QUIMICA == 'Sim') echo 'checked';?>>
						<label>Fisico-Química</label>
					</div>
					<div>
						<input disabled type="checkbox" <?php if ($EDUCACAO_VISUAL == 'Sim') echo 'checked';?>>
						<label>Educação Visual</label>
					</div>
					<div>
						<input disabled type="checkbox" <?php if ($EDUCACAO_TECNOLOGICA == 'Sim') echo 'checked';?>>
						<label>Educação Tecnológica</label>
					</div>
					<div>
						<input disabled type="checkbox" <?php if ($TIC == 'Sim') echo 'checked';?>>
						<label>Tecnologia da Informação e Comunicação</label>
					</div>
					
					<div>
						<input disabled type="checkbox" <?php if ($EDUCACAO_FISICA == 'Sim') echo 'checked';?>>
						<label>Educação Física</>
					</div>
					<div>
						<input disabled type="checkbox" <?php if ($CIDADANIA == 'Sim') echo 'checked';?>>
						<label>Cidadania e Desenvolvimento</label>
					</div>
					<div>
						<input disabled type="checkbox" <?php if ($DPS == 'Sim') echo 'checked';?>>
						<label>Desenvolvimento Pessoal e Social</label>
					</div>
					<div>
						<input disabled type="checkbox" <?php if ($EDUCACAO_MUSICAL == 'Sim') echo 'checked';?>>
						<label>Educação Musical</label>
					</div>
					<div>
						<input disabled type="checkbox" <?php if ($FOTOGRAFIA_E_VIDEO == 'Sim') echo 'checked';?>>
						<label>Fotografia e Video</label>
					</div>
					<div>
						<input disabled type="checkbox" <?php if ($MORAL == 'Sim') echo 'checked';?>>
						<label>Educação Moral e Religiosa</>
					</div>
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
		<legend>OBSERVAÇÕES</legend>
		<div class="collumn">
			<div class="row">
				<p class="texto_longo"><?php echo $OBSERVACOES;?></p>
			</div>
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