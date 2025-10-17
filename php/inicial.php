<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
<link rel="stylesheet" href="../css/inicial.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php
        session_start();
        include("../bd.config/bd.php");

        $id_usuario = $_SESSION['id_usuário'];

        $sql = "SELECT foto FROM Usuários WHERE id_usuário=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_usuario]);
        $usuario = $stmt->fetch();

        $foto = $_SESSION['foto'] ?? $usuario['foto'] ?? 'default-profile.png';
        $foto = $_SESSION['foto'];
    ?>

    <header>
        <nav>
            <img id="logo" src="../img/logo-onibus-branco-removebg-preview.png" alt="logo">
            <div id="direita">
                <div id='search'>
                    <i id="icons" class="fa fa-magnifying-glass" style="font-size: 30px"></i>
                    <input type="search" id="pesquisar" placeholder="Pesquise">
                </div>

                <button id="perfil"><img src="../img/perfis/<?php echo htmlspecialchars($foto); ?>" alt="Perfil" style="width: 50px; height: 50px; border-radius: 50%;"></button>
                <button id="menu"><i class="fa-solid fa-ellipsis" style="font-size: 50px"></i></button>
            </div>
       </nav>
    </header>

    <main>

    </main>

    <footer id="rodape">
        <button id="sobrenos">Sobre nós</button> 
        <button id="avisos">Avisos</button>
        <div id="faleconosco">
            <h1>Fale conosco <i class="fa-solid fa-envelope"></i> </h1>
            <h1>SchoolTrack@gmail.com</h1>
        </div>


        
    </footer>
    <aside id="sobreempresa">
            <div id="fecharsobre">
                <h1 class="title">Quem somos</h1><br>
                <button  id="fechardesc"> X </button>
            </div>
            <p>SchoolTrack é um software desenvolvido para mapeamento de rotas de ônibus escolares na região de Jacobina,
                exibindo horários, rotas e pontos de embarque.
            </p><br><br>

            <h1 class="title">Nosso objetivo</h1><br>
            <p>O SchoolTrack foi criado com o intuito de inegrar os conceitos de cidades inteligentes na região de Jacobina,
                promovendo transparencia, previsibilidade e segurança para os estudantes usuários de trasnporte público da região.
            </p><br><br>

            <h1 class="title">Como funciona</h1><br>
            <p>O sistema exibe as rotas e horários de acordo com os bairros da região, integrando a API do Google Maps,
                além de dados adiquiridos em parceria com a Secretaria de Trasportes da cidade.
            </p>
    </aside>

    <aside id="alerta">
        <div class="cima-aviso">
            <h1>Avisos</h1>
            <button class="fechardesc" id="fecharalerta"> X </button>
        </div><br>

        <h1 class="title">Funcionamento</h1><br>
        <p>Os transportes não funcionam de segunda sexta, EXCETO nos feriados municipais e nacionais.</p><br>
        
        <h1 class="title">Ajude a manter o ônibus limpo!</h1><br>
        <p>Evite deixar lixo nos assentos ou no chão. Use as lixeiras disponíveis e cuide do espaço como se fosse 
            sua casa. Um ambiente limpo é mais seguro, mais agradável e mostra respeito por quem vem depois de você.</p><br>

        <h1 class="title">Lanches no ônibus? Só se for com cuidado</h1><br>
        <p>Comer dentro do ônibus pode causar sujeira e acidentes. Prefira lanchar antes ou depois do trajeto. 
            Se for necessário, leve guardanapo e descarte corretamente.</p><br>

        <h1 class="title">Motorista não é DJ nem juiz</h1><br>
        <p>Evite gritar, fazer brincadeiras perigosas ou atrapalhar a condução. 
            O motorista precisa de concentração para garantir a segurança de todos.</p>
    </aside>
</body>
<script src="../javaScript/inicial.js"></script>
</html>