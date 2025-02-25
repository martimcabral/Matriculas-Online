<?php 
    include('../db.php');

    $sql = "SELECT * FROM matriculas_configuracao WHERE id = 1";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $DATA_INICIO = $row['data_de_inicio'];
            $DATA_FIM = $row['data_de_fim'];
        }
    } 
    
    date_default_timezone_set('Atlantic/Azores');
    $DATA_DE_HOJE = date("Y-m-d");
    
    $TEMPO_CERTO = true;

    if (strtotime($DATA_INICIO) > strtotime($DATA_DE_HOJE)) {
        $MENSAGEM_DE_AVISO = "Ainda não é possível fazer a matrícula. Por favor, tente mais tarde.";
        $TEMPO_CERTO = false;
    } else if (strtotime($DATA_FIM) < strtotime($DATA_DE_HOJE)) {
        $MENSAGEM_DE_AVISO = "O prazo para fazer a matrícula já terminou.";
        $TEMPO_CERTO = false;
    }

    session_start();
    $_SESSION['NIF_ALUNO'] = $NIF_ALUNO;
    $_SESSION['NIF_EE'] = $NIF_EE;
?>

<!-- Pegar da Base de Dados; o NIF do Aluno e EE, comparar se tiver correto avançar-->

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
	
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/circular-std/style.css">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="../assets/vendor/inputmask/css/inputmask.css" />
    <title>Sistema Matriculas Online</title>
</head>
<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div style="height: 100vh; display: flex; align-items: center;" class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
                <h1 class="splash-description" style="margin-bottom: -8px;">Recursos - Sistema Matriculas Online</h1>
            </div>
            <div class="card-body">
                <form action="MatriculaValidar.php" method="POST">
                    <div class="form-group">
                        <input <?php if ($TEMPO_CERTO == false) echo 'hidden'; ?> class="form-control form-control-lg" id="NIF_ALUNO" name="NIF_ALUNO" type="number" maxlength="9" placeholder="NIF Aluno" value="<?php echo $NIF_ALUNO;?>">
                    </div>
                    <div class="form-group">
                        <input <?php if ($TEMPO_CERTO == false) echo 'hidden'; ?> class="form-control form-control-lg" id="NIF_EE" name="NIF_EE" type="number" maxlength="9" placeholder="NIF Encarregado Educação" value="<?php echo $NIF_EE;?>">
                    </div>
                    <?php if ($TEMPO_CERTO == false) echo '<div class="alert alert-danger" role="alert">' . $MENSAGEM_DE_AVISO . '</div>';?>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" <?php if ($TEMPO_CERTO == false) echo 'hidden';?>>Validar</button>
                </form>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>