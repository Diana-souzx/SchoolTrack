<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <?php
        include('../bd.config/bd.php');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $senha2 = $_POST['senha2'];
            $bairro = $_POST['bairro'];
            $telefone = $_POST['telefone'];
            $notificacao = $_POST['notificacao']; 

            if (!isset($conn)) {
                die("Erro: Conexão com o banco de dados não encontrada!");
            }
            
            $conn->select_db("$dbname");

            $check_email = $conn->prepare("SELECT email FROM Usuários WHERE email = ?");
            if ($check_email === false) {
                die("Erro ao preparar verificação de email");
            }

            $check_email->bind_param("s", $email);
            $check_email->execute();
            $check_email->store_result();

            if ($check_email->num_rows > 0) {
                echo "<script>alert('Esse email já foi cadastrado!');
                window.location.href = '../html/cadastro.html';
                </script>";
            } else {
                if ($senha !== $senha2) {
                    echo "<script>alert('As senhas não coincidem!');
                    window.location.href = '../html/cadastro.html';
                    </script>";
                } else {
                    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO Usuários (nome, email, senha, telefone, bairro)
                    VALUES (?, ?, ?, ?, ?)";

                    $stmt = $conn->prepare($sql);

                    if ($stmt === false) {
                        die("Erro ao preparar inserção de dados");
                    }

                    $stmt->bind_param("sssis", $nome, $email, $senha_hash, $telefone, $bairro);

                    if ($stmt->execute()) {
                        $id_usuario = $stmt->insert_id;

                        if ($notificacao === "sim") {
                            $conteudo = "O ônibus está próximo!";
                            $stmt_noti = $conn->prepare("INSERT INTO Notificações (conteudo) VALUES (?)");
                            $stmt_noti->bind_param("s", $conteudo);
                            $stmt_noti->execute();
                            $id_noti = $stmt_noti->insert_id;

                            $stmt_link = $conn->prepare("INSERT INTO NotificaçõesUsuário (id_noti, id_usuário) VALUES (?, ?)");
                            $stmt_link->bind_param("ii", $id_noti, $id_usuario);
                            $stmt_link->execute();

                            $stmt_noti->close();
                            $stmt_link->close();
                        }

                        echo "<script>
                            alert('Cadastro realizado com sucesso!');
                            window.location.href = '../html/login.html';
                            </script>";
                    } else {
                        echo "<script>alert('Erro ao cadastrar usuário: " . $stmt->error . "');
                        window.location.href = '../html/cadastro.html';
                        </script>";
                    }

                    $stmt->close();
                }
            }

            $check_email->close();
            $conn->close();
        }
    ?>
</body>
</html>