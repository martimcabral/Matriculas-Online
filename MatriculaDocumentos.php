<?php
    $NIF_ALUNO = $_POST['aluno_nif'];
    $NIF_EE = $_POST['ee_nif'];

    $pasta = '../Ficheiros/Matriculas/1/';
    $folder_name = $pasta . $NIF_ALUNO . '.' . $NIF_EE . '/';

    $allowed_types = ["jpg", "jpeg", "png", "pdf"];
    $max_file_size = 5000000; // 5000 KB - 5MB

    $debug = 0;

    // Criar diretório se não existir.
    if (!file_exists($folder_name)) {
        if (mkdir($folder_name, 0777, true)) {
            echo "Diretorio criado com sucesso: " . $folder_name . "<br><br>";
        } else {
            die("Erro ao criar Diretório: " . error_get_last()['message']);
        }
    } else {
        echo "A usar diretório já criado previamente: " . $folder_name . "<br><br>";
    }

    if ($debug == 1) {
        echo "\nMatriculaDocumentos.php:" . "<br>";
        echo "\nNIF do Aluno: " . $NIF_ALUNO . "<br>NIF do E.E.: " . $NIF_EE . "<br>";
        echo "\nDiretório: " . $pasta . "<br>Nome do Arquivo: " . $folder_name . "<br><br>";
    }

    $files = [
        "cc_aluno", 
        "cc_mae", 
        "cc_pai", 
        "cc_ee", 
        "vacinacao", 
        "subsistema_de_saude", 
        "fotografia_passe"
    ];
    
    foreach ($files as $file) {
        if (!isset($_FILES[$file]) || $_FILES[$file]['error'] != UPLOAD_ERR_OK) {
            echo "<script>Arquivo: $file não foi encontrado ou houve um erro ao entregar.";
            continue;
        }

        $fileType = strtolower(pathinfo($_FILES[$file]["name"], PATHINFO_EXTENSION));
        $target_file = $folder_name . $file . '.' . $fileType;

        // Tamanho do Arquivo
        if ($_FILES[$file]["size"] > $max_file_size) {
            echo "<script>alert('$file é demasiado grande. Tamanho máximo permitido é de 5MB.')</script>";
            continue;
        }

        // Formatos Especificos
        if (!in_array($fileType, $allowed_types)) {
            echo "<script>alert('Apenas arquivos JPG, JPEG, PNG e PDF são permitidos para o arquivo $file.')</script>";
            continue;
        }

        // Dar upload se nao tiver erros
        if (!is_writable($folder_name)) {
            echo "<script>alert('Diretório não pode ser usado. Verifique permissões.')</script>";
            continue;
        }

        // Remover qualquer arquivo que ja existe com o mesmo nome, ignorando o formato, assim
        // prevenindo que haja do tipo: vacinacao.JPG e vacinacao.PNG ao mesmo tempo.
        $existing_files = glob($folder_name . $file . '.*');
        foreach ($existing_files as $existing_file) {
            if (is_file($existing_file)) {
                unlink($existing_file);
                if ($debug == 1) {
                    echo "Arquivo existente removido: " . basename($existing_file) . "<br>";
                }
            }
        }

        if (move_uploaded_file($_FILES[$file]["tmp_name"], $target_file)) {
            chmod($target_file, 0644);
            echo "O arquivo " . htmlspecialchars(basename($_FILES[$file]["name"])) . " foi entregue com sucesso.";
            echo "<script>alert('Documentos entregados com sucesso!')</script>";
            echo "<script>history.back()</script>";
        } else {
            echo "Houve um erro ao entregar arquivo: $file.<br>";
        }
    }
?>