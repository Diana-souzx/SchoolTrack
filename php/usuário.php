<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil de Usuário</title>
  <link rel="stylesheet" href="../css/usuario.css">
</head>
<body>
    <img id="logo" src="../img/logo-nome-branca.png" alt="">
    
    <div id="container">
        <h1>Perfil</h1>

        <form action="../php/salvar-perfil.php" method="POST" enctype="multipart/form-data">
        <div id="foto-perfil">
            <img src="default-profile.png" alt="Foto de perfil" id="perfil">
            <input type="file" name="foto" id="upload-foto">
        </div>
        
        <div id="container-flex">
        <div class="bloco1">
            <label for="nascimento">Nascimento:</label>
            <input type="date" name="nascimento" id="nascimento" required><br>

            <label for="rede-social">Link rede social:</label>
            <input type="url" name="rede-social" id="rede-social" placeholder="https://" required>
        </div>

        <div class="bloco2">
            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio" rows="10" placeholder="Escreva algo sobre você..." required></textarea>
        </div>
        </div>

      <button id="atualizar">Atualizar</button>
    </form>
  </div>
<script>
    document.getElementById('upload-foto').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const preview = document.getElementById('perfil');
            preview.src = URL.createObjectURL(file);
        }
    });
</script>
</body>
</html>