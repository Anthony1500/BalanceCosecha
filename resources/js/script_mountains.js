document.addEventListener("DOMContentLoaded", function() {
  function mostrarCapa() {
    document.querySelector(".air.air0").style.display = "block";

    // Oculta la capa después de 20 minutos
    setTimeout(ocultarCapa, 20 * 60 * 1000);
  }

  setInterval(mostrarCapa, 20 * 60 * 1000); // 20 minutos en milisegundos
});