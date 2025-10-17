document.addEventListener("DOMContentLoaded", function () {
  const botao = document.getElementById("sobrenos");
  const sobre = document.getElementById("sobreempresa");
  const fechardesc= document.getElementById("fechardesc");

  botao.addEventListener("click", function () {
    sobre.style.display = "block";
  });

  fechardesc.addEventListener("click", function (event) {
    event.stopPropagation();
    sobre.style.display = "none";
  });
  document.addEventListener("mousedown", function (event) {
    const clicouFora = !sobre.contains(event.target) && event.target !== botao;
    if (clicouFora) {
      sobre.style.display = "none";
    }
  });
});

document.getElementById("perfil").addEventListener("click",function(){
    window.location.href = "../php/usuário.php";
});

document.addEventListener("DOMContentLoaded", function () {
  const botao1 = document.getElementById("avisos");
  const alerta = document.getElementById("alerta");
  const fecharalerta= document.getElementById("fecharalerta");

  botao1.addEventListener("click", function () {
    alerta.style.display = "block";
  });

  fecharalerta.addEventListener("click", function (event) {
    event.stopPropagation();
    alerta.style.display = "none";
  });
  document.addEventListener("mousedown", function (event) {
    const clicouFora = !alerta.contains(event.target) && event.target !== botao1;
    if (clicouFora) {
      alerta.style.display = "none";
    }
  });
});