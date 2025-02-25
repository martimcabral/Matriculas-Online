<?php
    include('../db.php');

    $NIF_ALUNO = $_POST["NIF_ALUNO"];
    $NIF_EE = $_POST["NIF_EE"];

    session_start();
    $_SESSION['NIF_ALUNO'] = $NIF_ALUNO;
    $_SESSION['NIF_EE'] = $NIF_EE;

    $NIF_ALUNO_LENGTH = strlen($NIF_ALUNO);
    $NIF_EE_LENGTH = strlen($NIF_EE);

    # Os NIFs do Aluno e E.E. 89 e 92 e 14 é usado para testes - 89: Pré Escolar; 92: 1º, 2º, 3º Ciclos; 14: 9ºano DSS.
    if ($NIF_ALUNO_LENGTH == 9 || $NIF_ALUNO == 89 || $NIF_ALUNO == 92 || $NIF_ALUNO == 14) {
        if ($NIF_EE_LENGTH == 9 || $NIF_EE == 89 || $NIF_EE == 92 || $NIF_EE == 14) {
            $sql_alunos = "SELECT * FROM alunos WHERE nif_aluno = $NIF_ALUNO AND nifee = $NIF_EE";
            $result_alunos = $conn->query($sql_alunos);

            $sql_matriculas = "SELECT * FROM matriculas_ficha_pre_escolar WHERE aluno_nif = $NIF_ALUNO AND ee_nif = $NIF_EE";
            $result_matriculas = $conn->query($sql_matriculas);
            
            if ($result_alunos->num_rows > 0) {
                while($row = $result_alunos->fetch_assoc()) {
                    $ENCONTROU_NOS_ALUNOS = true;
                }
            } else {
                $ENCONTROU_NOS_ALUNOS = false;
            }
            
            if ($result_matriculas->num_rows >0) {
                while($row = $result_matriculas->fetch_assoc()) {
                    $ENCONTROU_NAS_MATRICULAS = true;
                }
            } else  {
                $ENCONTROU_NAS_MATRICULAS = false;
            }

            if ($ENCONTROU_NAS_MATRICULAS == true && $ENCONTROU_NOS_ALUNOS == true) {
                header("Location: ../Matriculas/MatriculaMenu.php");
                exit();
            }

            if ($ENCONTROU_NAS_MATRICULAS == false && $ENCONTROU_NOS_ALUNOS == true) {
                header("Location: ../Matriculas/MatriculaMenu.php");
                exit();
            }

            if ($ENCONTROU_NAS_MATRICULAS == true && $ENCONTROU_NOS_ALUNOS == false) {
                header("Location: ../Matriculas/MatriculaMenu.php");
                exit();
            }

            if ($ENCONTROU_NAS_MATRICULAS == false && $ENCONTROU_NOS_ALUNOS == false) {
                header("Location: ../Matriculas/MatriculaMenu.php");
                exit();
            }
        } else {
            echo "<script>alert('NIF do E.E. inválido!')</script>";
            echo "<script>history.back()</script>";
        }
    } else {
        echo "<script>alert('NIF do Aluno inválido!')</script>";
        echo "<script>history.back()</script>";
    }
?>
