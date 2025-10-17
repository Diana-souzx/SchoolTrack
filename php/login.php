<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php
        session_start();
        include('../bd.config/bd.php');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if (!isset($conn)) {
                die("Erro: conexão com o banco de dados não encontrada.");
            }

            $conn->select_db($dbname);

            $stmt = $conn->prepare("SELECT id_usuário, senha FROM Usuários WHERE email = ?");
            if ($stmt === false) {
                die("Erro ao preparar consulta de login.");
            }

            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows === 1) {
                $stmt->bind_result($id_usuario, $senha_hash);
                $stmt->fetch();

                if (password_verify($senha, $senha_hash)) {
                    $_SESSION['id_usuário'] = $id_usuario;
                    echo "<script>
                        alert('Login realizado com sucesso!');
                        window.location.href = 'inicial.php'; // ou a página principal
                    </script>";
                } else {
                    echo "<script>alert('Senha incorreta.'); window.history.back();</script>";
                }
            } else {
                echo "<script>alert('E-mail não encontrado.'); window.history.back();</script>";
            }

            $stmt->close();
            $conn->close();
        }
    ?>
</body>
</html>