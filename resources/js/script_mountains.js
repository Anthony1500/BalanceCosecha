document.addEventListener("DOMContentLoaded", function() {
    function mostrarCapa() {
      var elemento = document.querySelector(".air.air0");
      elemento.style.display = "block";

      // Oculta la capa después de 20 minutos
      setTimeout(function ocultarCapa() {
        elemento.style.display = "none";
      }, 20 * 60 * 1000);
    }

    // Muestra la capa cada 20 minutos
    setInterval(mostrarCapa, 20 * 60 * 1000);
  });
