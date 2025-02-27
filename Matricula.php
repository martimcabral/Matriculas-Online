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
?>



<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
	
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
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
            <div class="container-fluid dashboard-content">
				<div class="dashboard-short-list">
                    <div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
						        <div class="card-header">
									<?php
										include('../db.php');
										$ESTADO = $_GET['estado'];

										switch ($ESTADO) {
											case null: echo '<h5 class="mb-0">Lista de Matrículas</h5>'; break;
											case 1: echo '<h5 class="mb-0">Lista de Matrículas - Secretaria</h5>'; break;
											case 2: echo '<h5 class="mb-0">Lista de Matrículas - Diretor de Turmas</h5>'; break;
											case 3: echo '<h5 class="mb-0">Lista de Matrículas - Gestão de Matrículas</h5>'; break;
											case 4: echo '<h5 class="mb-0">Lista de Matrículas - Informática</h5>'; break;
										}

										echo '<div class="card-body">';
										echo '<div class="table-responsive">';
										echo '<table id="example" class="table table-striped table-bordered second" style="width:100%">';

										if ($ESTADO == null) {
											$sql_prescolar = "SELECT mf1.id, mf1.aluno_nif, mf1.ee_nif, mf1.aluno_nome, mf1.ee_nome, mf1.id_escola1, e.nome AS escola_nome
												FROM matriculas_ficha_pre_escolar mf1
												INNER JOIN escola e ON mf1.id_escola1 = e.id
												ORDER BY mf1.data_de_criacao DESC";
											$result_preescolar = $conn->query($sql_prescolar);

											$sql_123ciclos = "SELECT mf2.id, mf2.aluno_nif, mf2.ee_nif, mf2.aluno_nome_completo, mf2.ee_nome_completo, mf2.nome_da_escola
												FROM matriculas_ficha_123_ciclos mf2
												ORDER BY mf2.data_de_criacao DESC";
											$result123ciclos = $conn->query($sql_123ciclos);

											$sql_9ano = "SELECT mf3.id, mf3.aluno_nif, mf3.ee_nif, mf3.aluno_nome, mf3.ee_nome
												FROM matriculas_ficha_9ano_dss mf3
												ORDER BY mf3.data_de_criacao DESC";
											$result9ano = $conn->query($sql_9ano);

										} else {
											$sql_prescolar = "SELECT mf1.id, mf1.aluno_nif, mf1.ee_nif, mf1.aluno_nome, mf1.ee_nome, mf1.id_escola1, e.nome AS escola_nome
												FROM matriculas_ficha_pre_escolar mf1
												INNER JOIN escola e ON mf1.id_escola1 = e.id
												WHERE mf1.estado = " . $ESTADO . "
												ORDER BY mf1.data_de_criacao DESC";
											$result_preescolar = $conn->query($sql_prescolar);

											$sql_123ciclos = "SELECT mf2.id, mf2.aluno_nif, mf2.ee_nif, mf2.aluno_nome_completo, mf2.ee_nome_completo, mf2.nome_da_escola
												FROM matriculas_ficha_123_ciclos mf2
												WHERE mf2.estado = " .$ESTADO . "
												ORDER BY mf2.data_de_criacao DESC";
											$result123ciclos = $conn->query($sql_123ciclos);

											$sql_9ano = "SELECT mf3.id, mf3.aluno_nif, mf3.ee_nif, mf3.aluno_nome, mf3.ee_nome
												FROM matriculas_ficha_9ano_dss mf3
												WHERE mf3.estado = " .$ESTADO . "
												ORDER BY mf3.data_de_criacao DESC";
											$result9ano = $conn->query($sql_9ano);
										}
										
										echo "<tr>
												<th>NIF do Aluno</th>
												<th>NIF do E.E.</th>
												<th>Nome do Aluno</th>
												<th>Nome do E.E.</th>
												<th>Nome da Escola</th>
												<th>Opções</th>
											</tr>";

										if ($result_preescolar->num_rows > 0) {
											while ($row_preescolar = $result_preescolar->fetch_assoc()) {
												$ID_PREESCOLAR = $row_preescolar["id"];
												echo "<tr>
													<td>" . $row_preescolar["aluno_nif"] . "</td>
													<td>" . $row_preescolar["ee_nif"] . "</td>
													<td>" . $row_preescolar["aluno_nome"] . "</td>
													<td>" . $row_preescolar["ee_nome"] . "</td>
													<td>" . $row_preescolar["escola_nome"] . "</td>
													<td align='center'>
														<a href='" . $linkDir_Matriculas . "MatriculaConsultarPreEscolar.php?id=" . $ID_PREESCOLAR . "'>
															<button class='btn btn-sm btn-outline-light'>
																<img title='Consultar esta Matrícula' src='../Images/Icons/RN_parcial.png' height='17px' width='17px'/>
															</button>
														</a>
														<a href='" . $linkDir_Matriculas . "MatriculaImprimirPreEscolar.php?id=" . $ID_PREESCOLAR . "'>
															<button class='btn btn-sm btn-outline-light'>
																<img title='Imprimir Matrícula' src='../Images/Icons/correio_pdf_nao.png' height='17px' width='17px'/>
															</button>
														</a>";
												
												if ($ESTADO != 0) {
													echo "<a href='" . $linkDir_Matriculas . "MatriculaEditarPreEscolar.php?id=" . $ID_PREESCOLAR . "'>
														<button class='btn btn-sm btn-outline-light'>
															<img title='Editar Matrícula' src='../Images/Icons/correio_edit.png' height='17px' width='17px'/>
														</button>
													</a>";
												}
												
												if ($ESTADO == 1 || $ESTADO == 2) {
													echo "<a href='" . $linkDir_Matriculas . "MatriculaEnviarParaGestão.php?id=" . $ID_PREESCOLAR . "&matricula=1" . "&estado=3'>
													<button class='btn btn-sm btn-outline-light'>
															<img title='Enviar para Gestão de Matrículas' src='../Images/Icons/enviar.png' height='17px' width='17px'/>
														</button>
													</a>";
												}

												if ($ESTADO == 3) {
													echo "<a href='" . $linkDir_Matriculas . "MatriculaEnviarParaGestão.php?id=" . $ID_PREESCOLAR . "&matricula=1" . "&estado=4'>
													<button class='btn btn-sm btn-outline-light'>
															<img title='Enviar para Informática' src='../Images/Icons/enviar.png' height='17px' width='17px'/>
														</button>
													</a>";
												}

												echo "</td>
												</tr>";
											}
										}
										
										if ($result123ciclos->num_rows > 0) {
											while ($row123ciclos = $result123ciclos->fetch_assoc()) {
												$ID_123CICLOS = $row123ciclos["id"];
												echo "<tr>
														<td>" . $row123ciclos["aluno_nif"] . "</td>
														<td>" . $row123ciclos["ee_nif"] . "</td>
														<td>" . $row123ciclos["aluno_nome_completo"] . "</td>
														<td>" . $row123ciclos["ee_nome_completo"] . "</td>
														<td>" . $row123ciclos["nome_da_escola"] . "</td>
														<td align='center'>
															<a href='" . $linkDir_Matriculas . "MatriculaConsultar123Ciclos.php?id=" . $ID_123CICLOS . "'>
																<button class='btn btn-sm btn-outline-light'>
																	<img title='Consultar esta Matrícula' src='../Images/Icons/RN_parcial.png' height='17px' width='17px'/>
																</button>
															</a>
															<a href='" . $linkDir_Matriculas . "MatriculaImprimir123Ciclos.php?id=" . $ID_123CICLOS . "'>
																<button class='btn btn-sm btn-outline-light'>
																	<img title='Imprimir Matrícula' src='../Images/Icons/correio_pdf_nao.png' height='17px' width='17px'/>
																</button>
															</a>";
												if ($ESTADO != 0) {
													echo "<a href='" . $linkDir_Matriculas . "MatriculaEditar123Ciclos.php?id=" . $ID_123CICLOS . "'>
														<button class='btn btn-sm btn-outline-light'>
															<img title='Editar Matrícula' src='../Images/Icons/correio_edit.png' height='17px' width='17px'/>
														</button>
													</a>";
												}

												if ($ESTADO == 1 || $ESTADO == 2) {
													echo "<a href='" . $linkDir_Matriculas . "MatriculaEnviarParaGestão.php?id=" . $ID_PREESCOLAR . "&matricula=2" . "%estado=3'>
													<button class='btn btn-sm btn-outline-light'>
															<img title='Enviar para Gestão de Matrículas' src='../Images/Icons/enviar.png' height='17px' width='17px'/>
														</button>
													</a>";
												}

												if ($ESTADO == 3) {
													echo "<a href='" . $linkDir_Matriculas . "MatriculaEnviarParaGestão.php?id=" . $ID_PREESCOLAR . "&matricula=2" . "&estado=4'>
													<button class='btn btn-sm btn-outline-light'>
															<img title='Enviar para Informática' src='../Images/Icons/enviar.png' height='17px' width='17px'/>
														</button>
													</a>";
												}

												echo "</td>
												</tr>";
											}
										}

										if ($result9ano->num_rows > 0) {
											while ($row9ano = $result9ano->fetch_assoc()) {
												$ID_9ANO = $row9ano["id"];
												echo "<tr>
														<td>" . $row9ano["aluno_nif"] . "</td>
														<td>" . $row9ano["ee_nif"] . "</td>
														<td>" . $row9ano["aluno_nome"] . "</td>
														<td>" . $row9ano["ee_nome"] . "</td>
														<td align='center'> - </td>
														<td align='center'>
															<a href='" . $linkDir_Matriculas . "MatriculaConsultar9ano.php?id=" . $ID_9ANO . "'>
																<button class='btn btn-sm btn-outline-light'>
																	<img title='Consultar esta Matrícula' src='../Images/Icons/RN_parcial.png' height='17px' width='17px'/>
																</button>
															</a>
															<a href='" . $linkDir_Matriculas . "MatriculaImprimir9ano.php?id=" . $ID_9ANO . "'>
																<button class='btn btn-sm btn-outline-light'>
																	<img title='Imprimir Matrícula' src='../Images/Icons/correio_pdf_nao.png' height='17px' width='17px'/>
																</button>
															</a>";

												if ($ESTADO != 0) {
													echo "<a href='" . $linkDir_Matriculas . "MatriculaEditar9ano.php?id=" . $ID_9ANO . "'>
														<button class='btn btn-sm btn-outline-light'>
															<img title='Editar Matrícula' src='../Images/Icons/correio_edit.png' height='17px' width='17px'/>
														</button>
													</a>";
												}

												if ($ESTADO == 1 || $ESTADO == 2) {
													echo "<a href='" . $linkDir_Matriculas . "MatriculaEnviarParaGestão.php?id=" . $ID_PREESCOLAR . "&matricula=3" . "&estado=3'>
													<button class='btn btn-sm btn-outline-light'>
															<img title='Enviar para Gestão de Matrículas' src='../Images/Icons/enviar.png' height='17px' width='17px'/>
														</button>
													</a>";
												}

												if ($ESTADO == 3) {
													echo "<a href='" . $linkDir_Matriculas . "MatriculaEnviarParaGestão.php?id=" . $ID_PREESCOLAR . "&matricula=1" . "&estado=4'>
													<button class='btn btn-sm btn-outline-light'>
															<img title='Enviar para Informática' src='../Images/Icons/enviar.png' height='17px' width='17px'/>
														</button>
													</a>";
												}

												echo "</td>
												</tr>";
											}
										}

										echo "</table>";
										echo "</div>";
										echo "</div>";
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<?php include('../rodape.php'); ?>
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

<?php 

	}else{header('location: '.$link.'index.php');}

?>