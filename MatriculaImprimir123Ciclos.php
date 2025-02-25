<?php
    include('../db.php');
    
	if (isset($_GET['id']) && is_numeric($_GET['id'])) {
		$id = intval($_GET['id']);
	} else {
		echo "<script>alert('Ocorreu um erro durante a recolha do ID')</script>";
		echo "<script>history.back()</script>";
	}

	$sql = "SELECT * FROM matriculas_ficha_123_ciclos WHERE id = $id";
	$result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
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
				<p>Unidade Orgânica:</p>
				<input type="text" value="<?php echo $UNIDADE_ORGANICA;?>" readonly>
				<p>Nome da Escola:</p>
				<select disabled>
					<option <?php if ($NOME_DA_ESCOLA == 'EB1/JI da Relva') echo 'selected';?> >EB1/JI da Relva</option>
					<option <?php if ($NOME_DA_ESCOLA == 'EB 2,3 de Arrifes') echo 'selected';?> >EB 2,3 de Arrifes</option>
					<option <?php if ($NOME_DA_ESCOLA == 'EB1/JI da Covoada') echo 'selected';?> >EB1/JI da Covoada</option>
					<option <?php if ($NOME_DA_ESCOLA == 'EB1/JI do Outeiro') echo 'selected';?> >EB1/JI do Outeiro</option>
					<option <?php if ($NOME_DA_ESCOLA == 'EB1/JI dos Milagres') echo 'selected';?> >EB1/JI dos Milagres</option>
					<option <?php if ($NOME_DA_ESCOLA == 'EB1/JI do Engº. José Cordeiro') echo 'selected';?> >EB1/JI do Engº. José Cordeiro</option>
					<option <?php if ($NOME_DA_ESCOLA == 'EB1/JI Cardeal Humberto de Medeiros') echo 'selected';?> >EB1/JI Cardeal Humberto de Medeiros</option>
				</select>
			</div>
			<div class="row">
				<p>Localidade:</p>
				<input type="text" value="<?php echo $LOCALIDADE;?>" readonly>
				<p>Nome da Escola</p>
				<input type="text" value="<?php echo $ANO_DE_ESCOLARIDADE;?>" readonly>
			</div>
			<div class="row">
				<p>Turma:</p>
				<input type="text" value="<?php echo $TURMA;?>" readonly>
				<p>Curso:</p>
				<input type="text" value="<?php echo $CURSO;?>" readonly>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Identificação do(a) Aluno(a)</legend>
		<div class="collumn">
			<div class="row">
				<p>Número de Processo:</p>
				<input type="text" value="<?php echo $ALUNO_NUMERO_DE_PROCESSO;?>" readonly>
				<p>NIF do Aluno:</p>
				<input type="date" value="<?php echo $ALUNO_NIF;?>" readonly>
			</div>
			<div class="row">
				<p>Idade:</p>
				<input type="text" value="<?php echo $ALUNO_IDADE;?>" readonly>
				<p>Nome Completo:</p>
				<input type="text" value="<?php echo $ALUNO_NOME_COMPLETO;?>" readonly>
			</div>
			<div class="row">
				<p>Número de Utente:</p>
				<input type="text" value="<?php echo $ALUNO_NUMERO_DE_UTENTE;?>" readonly>
				<p>Número do Cartão de Cidadão:</p>
				<input type="text" value="<?php echo $ALUNO_CARTAO_DE_CIDADAO;?>" readonly>
			</div>
			<div class="row">
				<p>Naturalidade:</p>
				<input type="text" value="<?php echo $ALUNO_NATURALIDADE;?>" readonly>
				<p>Concelho:</p>
				<input type="text" value="<?php echo $ALUNO_CONSELHO;?>" readonly>
			</div>
			<div class="row">
				<p>Data de Nascimento:</p>
				<input type="text" value="<?php echo $ALUNO_DATA_DE_NASCIMENTO;?>" readonly>
				<p>Nome da Mãe:</p>
				<input type="text" value="<?php echo $ALUNO_NOME_DA_MAE;?>" readonly>
			</div>
			<div class="row">
				<p>Nome do Pai:</p>
				<input type="text" value="<?php echo $ALUNO_NOME_DO_PAI;?>" readonly>
				<p>Residente em:</p>
				<input type="text" value="<?php echo $ALUNO_RESIDENTE_EM;?>" readonly>
			</div>
			<div class="row">
				<p>Número da Residência:</p>
				<input type="text" value="<?php echo $ALUNO_NUMERO_DA_RESIDENCIA;?>" readonly>
				<p>Andar da Residência:</p>
				<input type="text" value="<?php echo $ALUNO_ANDAR_DA_RESIDENCIA;?>" readonly>
			</div>
			<div class="row">
				<p>Freguesia:</p>
				<input type="text" value="<?php echo $ALUNO_FREGUESIA;?>" readonly>
				<p>Código Postal:</p>
				<input type="text" value="<?php echo $ALUNO_CODIGO_POSTAL;?>" readonly>
			</div>
			<div class="row">
				<p>Telemóvel:</p>
				<input type="text" value="<?php echo $ALUNO_TELEMOVEL;?>" readonly>
				<p>Telefone:</p>
				<input type="text" value="<?php echo $ALUNO_TELEFONE;?>" readonly>
			</div>
			<div class="row">
				<p>Email:</p>
				<input type="text" value="<?php echo $ALUNO_EMAIL;?>" readonly>
				<p>Instituição da Segurança Social:</p>
				<input type="text" value="<?php echo $ALUNO_SEGURANCA_SOCIAL_INSTITUICAO;?>" readonly>
			</div>
			<div class="row">
				<p>Número de Beneficiário da Segurança Social:</p>
				<input type="text" value="<?php echo $ALUNO_SEGURANCA_SOCIAL_BENEFICIARIO_NUMERO;?>" readonly>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Encarregado de Educação</legend>
		<div class="collumn">
			<div class="row">
				<p>Nome do E.E.:</p>
				<input type="text" value="<?php echo $EE_NOME_COMPLETO;?>" readonly>
				<p>Número de Utente</p>
				<input type="text" value="<?php echo $EE_NUMERO_DE_UTENTE;?>" readonly>
			</div>
			<div class="row">
				<p>Residente em:</p>
				<input type="text" value="<?php echo $EE_RESIDENTE_EM;?>" readonly>
				<p>Número da Residência:</p>
				<input type="text" value="<?php echo $EE_NUMERO_DA_RESIDENCIA;?>" readonly>
			</div>
			<div class="row">
				<p>Andar da Residência:</p>
				<input type="text" value="<?php echo $EE_ANDAR_DA_RESIDENCIA;?>" readonly>
				<p>Freguesia:</p>
				<input type="text" value="<?php echo $EE_FREGUESIA;?>" readonly>
			</div>
			<div class="row">
				<p>Código Postal:</p>
				<input type="text" value="<?php echo $EE_CODIGO_POSTAL;?>" readonly>
				<p>Telemóvel:</p>
				<input type="text" value="<?php echo $EE_TELEMOVEL;?>" readonly>
			</div>
			<div class="row">
				<p>Telefone:</p>
				<input type="text" value="<?php echo $EE_TELEFONE;?>" readonly>
				<p>Email:</p>
				<input type="text" value="<?php echo $EE_EMAIL;?>" readonly>
			</div>
			<div class="row">
				<p>Número do Cartão de Cidadão:</p>
				<input type="text" value="<?php echo $EE_CARTAO_DE_CIDADAO;?>" readonly>
				<p>NIF:</p>
				<input type="text" value="<?php echo $EE_NIF;?>" readonly>
			</div>
			<div class="row">
				<p>Grau de Parentesco:</p>
				<input type="text" value="<?php echo $EE_GRAU_DE_PARENTESCO;?>" readonly>
			</div>
		</div>
	</fieldset>
	
	<fieldset>
		<legend>Opções:</legend>
		<div class="collumn">
			<div class="row">
				<p>Educação Moral e Religiosa Católica:</p>
				<input type="radio" <?php if ($EDUCACAO_MORAL_E_RELIGIOSA_CATOLICA == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim</p>
				<input type="radio" <?php if ($EDUCACAO_MORAL_E_RELIGIOSA_CATOLICA == "Não") echo 'checked';?> disabled>
				<p class="p_radio">Não</p>
				<p>Outra Confissão Religiosa:</p>
				<input type="text" value="<?php echo $OUTRA_CONFISSAO_RELIGIOSA;?>" readonly>
			</div>
	</fieldset>

	<fieldset>
		<legend>AÇÃO SOCIAL ESCOLAR</legend>
		<div class="collumn">
			<div class="row">
				<p>O aluno é beneficiário dos Auxílios Escolares?:</p>
				<input type="radio" <?php if ($AUXILIOS_ESCOLARES == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim</p>
				<input type="radio" <?php if ($AUXILIOS_ESCOLARES == "Não") echo 'checked';?> disabled>
				<p class="p_radio">Não</p>
			</div>
			<div class="row">
				<p>Escalão:</p>
				<input type="text" value="<?php echo $ALUNO_ESCALAO;?>" readonly>	
			</div>
			<div class="row">
				<p>Pretende que seu educando utilize o transporte escolar?</p>
				<input type="radio" <?php if ($TRANSPORTE_ESCOLAR == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim</p>
				<input type="radio" <?php if ($TRANSPORTE_ESCOLAR == "Não") echo 'checked';?> disabled>
				<p class="p_radio">Não</p>
			</div>
			<div class="row">
				<p>Local de (des)embarque - freguesia:</p>
				<input type="text" value="<?php echo $LOCAL_DESEMBARQUE_FREGUESIA;?>" readonly>
				<p>Pretende requesitar Manuais Escolares?:</p>
				<input type="radio" <?php if ($MANUAIS_ESCOLARES == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim</p>
				<input type="radio" <?php if ($MANUAIS_ESCOLARES == "Não") echo 'checked';?> disabled>
				<p class="p_radio">Não</p>

			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>SAÚDE ESCOLAR</legend>
		<div class="collumn">
			<div class="row">
				<p>Boletim de Saúde Atualizado</p>
				<input type="radio" <?php if ($BOLETIM_SAUDE_ATUALIZADO == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim</p>
				<input type="radio" <?php if ($BOLETIM_SAUDE_ATUALIZADO == "Não") echo 'checked';?> disabled>
				<p class="p_radio">Não</p>
			</div>
			<div class="row">
				<p>Problemas especificos de Saúde:</p>
				<input type="radio" <?php if ($PROBLEMAS_ESPECIFICOS_SAUDE == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim</p>
				<input type="radio" <?php if ($PROBLEMAS_ESPECIFICOS_SAUDE == "Não") echo 'checked';?> disabled>
				<p class="p_radio">Não</p>
				<p>Quais?:</p>
				<input type="text" value="<?php echo $PROBLEMAS_ESPECIFICOS_SAUDE_QUAIS;?>" readonly>
			</div>
			<div class="row">
			<p>Problemas especificos de Saúde:</p>
				<input type="radio" <?php if ($PROBLEMAS_VISAO_AUDICAO == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim</p>
				<input type="radio" <?php if ($PROBLEMAS_VISAO_AUDICAO == "Não") echo 'checked';?> disabled>
				<p class="p_radio">Não</p>
				<p>Quais?:</p>
				<input type="text" value="<?php echo $PROBLEMAS_VISAO_AUDICAO_QUAIS;?>" readonly>
			</div>
			<div class="row">
				<p>Autorizo o meu Educando a participar nas atividades de Saúde Escolar:</p>
				<input type="radio" <?php if ($AUTORIZACAO_PARTICIPAR_ATIVIDADES_DE_SAUDE == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim</p>
				<input type="radio" <?php if ($AUTORIZACAO_PARTICIPAR_ATIVIDADES_DE_SAUDE == "Não") echo 'checked';?> disabled>
				<p class="p_radio">Não</p>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>AUTORIZAÇÕES E SAÍDAS</legend>
		<div class="collumnn">

			<div class="row">
				<p style="width: 500px;">As fotografias registadas no âmbito das atividades escolares poderão ser reproduzidas em qualquer suporte. As imagens caotadas em vídeo poderão, de igual modo, ser utilizadas para qualquer divulgação do trabalho da Escola, através da sua página Web ou da participação nas redes sociais.<br>
				Autoriza a utilização das fotografias e das imagens captadas durante as atividades escolares que envolvam o seu educando?</p>
				<input type="radio" <?php if ($AUTORIZACAO_IMAGENS_DO_ALUNO == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim</p>
				<input type="radio" <?php if ($AUTORIZACAO_IMAGENS_DO_ALUNO == "Não") echo 'checked';?> disabled>
				<p class="p_radio">Não</p>
			</div>
			<div class="row">
				<p style="width: 500px;">Autorizo o meu educando a participar nas atividades promovidas pela escola ou por outra entidade parceira, 
				quer se realize dentro ou fora do recinto escolar.</p>
				<input type="checkbox" <?php if ($AUTORIZACAO_ATIVIDADES_PROMOVIDAS_PELA_ESCOLA == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim Autorizo</p>
			</div>
			<div class="row">
				<p style="width: 500px;">Autorizo a leitura e cópia do cartão de cidadão do meu educando, somente para fins escolares.</p>
				<input type="checkbox" <?php if ($AUTORIZACAO_COPIA_DO_CARTAO_DE_CIDADAO == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim Autorizo</p>
			</div>
			<div class="row">
				<input type="checkbox" <?php if ($AUTORIZA_ENTRADA_SAIDA_LIVRE == "Sim") echo 'checked';?> disabled>
				<p>Autoriza entrada / saída livre</p>
				<input style="margin-left: 25px;" type="checkbox" <?php if ($AUTORIZA_SAIDA_ULTIMO_TEMPO == "Sim") echo 'checked';?> disabled>
				<p>Autoriza saída ao último tempo</p>
			</div>
			<div class="row">
				<input type="checkbox" <?php if ($AUTORIZA_SAIDA_ACOMPANHADO == "Sim") echo 'checked';?> disabled>
				<p>Autoriza saída se acompanhado</p>
				<input style="margin-left: 25px;" type="checkbox" <?php if ($AUTORIZA_SAIDA_FUROS == "Sim") echo 'checked';?> disabled>
				<p>Autoriza saída em furos</p>
			</div>
			<div class="row">
				<input type="checkbox" <?php if ($AUTORIZA_SAIDA_HORA_ALMOCO= "Sim") echo 'checked';?> disabled>
				<p>Autoriza saída a hora de almoço</p>
				<input style="margin-left: 25px;" style="margin-left: 25px;" type="checkbox" <?php if ($AUTORIZA_SAIDA_INTERVALOS == "Sim") echo 'checked';?> disabled>
				<p>Autoriza saída em intervalos</p>
			</div>
			<div class="row" style="width: 650px;">
				<p>Dias Específicos:</p>
				<input type="checkbox" <?php if ($SAIDA_DIA_SEG == "Sim") echo 'checked';?> disabled>
				<p>Seg.</p>
				<input type="checkbox" <?php if ($SAIDA_DIA_TER == "Sim") echo 'checked';?> disabled>
				<p>Ter.</p>
				<input type="checkbox" <?php if ($SAIDA_DIA_QUA == "Sim") echo 'checked';?> disabled>
				<p>Qua.</p>
				<input type="checkbox" <?php if ($SAIDA_DIA_QUI == "Sim") echo 'checked';?> disabled>
				<p>Qui.</p>
				<input type="checkbox" <?php if ($SAIDA_DIA_SEX == "Sim") echo 'checked';?> disabled>
				<p>Sex.</p>
				<input type="checkbox" <?php if ($SAIDA_DIA_SAB == "Sim") echo 'checked';?> disabled>
				<p>Sab.</p>
				<input type="checkbox" <?php if ($SAIDA_DIA_DOM == "Sim") echo 'checked';?> disabled>
				<p>Dom.</p>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>PROSUCESSO</legend>
		<div class="collumn">
			<p style="width: 650px;">A Comissão Coordenadora do Plano Integrado de Promoção do Sucesso Escolar - ProSucesso, criada pelo Despacho n.9 691/2017 de 6 de abril, propõe-se, aquando das suas visitas de acompanhamento às escolas, ouvir os alunos sobre a sua vida escolar, para recolher informação que ajude a escola a responder às necessidades da sua população escolar e a incrementar a qualidade das aprendizagens. A informação recolhida não colide com os dados pessoais Iegalmente protegidos.</p>
			<div class="row">
				<input type="radio" <?php if ($AUTORIZACAO_PROSUCESSO == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim</p>
				<input type="radio" <?php if ($AUTORIZACAO_PROSUCESSO == "Não") echo 'checked';?> disabled>
				<p class="p_radio">Não</p>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>REGULAMENTO DA MATRÍCULA</legend>
		<div class="collumn">
			<p style="width: 650px;">Declaro para os efeitos previstos no dispositivo no artigoº 13º do Regulamento Geral de Proteção de Dados (EU)2016/679 do P.E. e do Conselho de 27 de abril (RGPD) prestar, por este meio, o meu consentimento para o tratamento dos meus dados pessoais, bem como os do meu educando para efeitos pedagógicos e de gestão escolar.
			<br><br>
			A presente declaração constitui título bastante para conferir autorização para o tratamento dos dados pessoais, assim como do meu educando no âmbito do Sistema de Gestão Escolar para fins de suporte de decisão pedagógica e adminitrativa da escola e da tutela.
			Tomei conhecimento de que a falta de consentimento para o tratamento dos meus dados pessoais terá como resultado a falta da verificação dos pressupostos exigidos para exercer a figura de Encarregado de Educação, assim como para o meu educando poder ser, devidamente, matriculado em unidade orgânica do sistema educativo regional.</p>
			<div class="row">
				<input type="radio" <?php if ($CONCORDO_REGULAMENTO == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim</p>
				<input type="radio" <?php if ($CONCORDO_REGULAMENTO == "Não") echo 'checked';?> disabled>
				<p class="p_radio">Não</p>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>REGULAMENTO DA MATRÍCULA</legend>
		<div class="collumn">
			<p style="width: 650px;">Declaro para os efeitos previstos no dispositivo no artigoº 13º do Regulamento Geral de Proteção de Dados (EU)2016/679 do P.E. e do Conselho de 27 de abril (RGPD) prestar, por este meio, o meu consentimento para o tratamento dos meus dados pessoais, bem como os do meu educando para efeitos pedagógicos e de gestão escolar.
			<br><br>
			A presente declaração constitui título bastante para conferir autorização para o tratamento dos dados pessoais, assim como do meu educando no âmbito do Sistema de Gestão Escolar para fins de suporte de decisão pedagógica e adminitrativa da escola e da tutela.
			Tomei conhecimento de que a falta de consentimento para o tratamento dos meus dados pessoais terá como resultado a falta da verificação dos pressupostos exigidos para exercer a figura de Encarregado de Educação, assim como para o meu educando poder ser, devidamente, matriculado em unidade orgânica do sistema educativo regional.</p>
			<div class="row">
				<input type="radio" <?php if ($CONCORDO_REGULAMENTO == "Sim") echo 'checked';?> disabled>
				<p class="p_radio">Sim</p>
				<input type="radio" <?php if ($CONCORDO_REGULAMENTO == "Não") echo 'checked';?> disabled>
				<p class="p_radio">Não</p>
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