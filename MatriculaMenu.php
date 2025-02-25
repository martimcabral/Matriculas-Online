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
    <title>Sistema Matriculas Online - Menu</title>
</head>
<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div style="height: 100vh; display: flex; align-items: center;" class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
                <h1 class="splash-description" style="margin-bottom: -8px;">Seleciona qual matricula pretende fazer/atualizar.</h>
            </div>
            <div class="card-body">
                <button onclick="location.href='../Matriculas/MatriculaPreencherPreEscolar.php'" type="submit" class="btn btn-primary btn-lg btn-block">1ª Vez</button>
                <button onclick="location.href='../Matriculas/MatriculaPreencher123Ciclos.php'" type="submit" class="btn btn-primary btn-lg btn-block">1º/2º/3º Ciclo</button>
                <button onclick="location.href='../Matriculas/MatriculaPreencher9Ano.php'" type="submit" class="btn btn-primary btn-lg btn-block">9º Ano - Disciplinas sem Sucesso</button>
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