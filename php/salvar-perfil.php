<?php
    session_start();
    include("../bd.config/bd.php"); 

    $id_usuario = $_SESSION['id_usuário'];   

    $bio = $_POST['bio'];
    $nascimento = $_POST['nascimento'];
    $rede_social = $_POST['rede-social'];

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $nome_arquivo = uniqid() . "_" . $_FILES['foto']['name'];
        $caminho = "../img/perfis/" . $nome_arquivo;
        move_uploaded_file($_FILES['foto']['tmp_name'], $caminho);

        $sql = "UPDATE Usuários SET bio=?, data_nasc=?, link_redeSocial=?, foto=? WHERE id_usuário=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$bio, $nascimento, $rede_social, $nome_arquivo, $id_usuario]);
        $_SESSION['foto'] = $nome_arquivo;
    } else {
        $sql = "UPDATE Usuários SET bio=?, data_nasc=?, link_redeSocial=? WHERE id_usuário=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$bio, $nascimento, $rede_social, $id_usuario]);
    }

    header("Location: inicial.php");
    exit;
?>