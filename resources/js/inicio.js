var images = ['../images/cosecha1.png','../images/cosecha2.png','../images/cosecha3.png','../images/cosecha4.png','../images/cosecha5.png'];
var index = 0;
var preloadedImages = [];

// Pre-carga las imágenes
for (var i = 0; i < images.length; i++) {
    preloadedImages[i] = new Image();
    preloadedImages[i].src = images[i];
}

function changeBackground() {
    var scrollBg = document.querySelector('.scroll-bg');
    scrollBg.style.animation = 'none'; // Elimina la animación actual

    setTimeout(function() {
        scrollBg.style.backgroundImage =
            "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('" + preloadedImages[index].src + "')";
        index = (index + 1) % preloadedImages.length;
        scrollBg.style.animation = 'fadein 1s, scrollBg 34s linear infinite'; // Aplica la nueva animación
    }, 1000);
}

changeBackground();
setInterval(changeBackground, 35000);
