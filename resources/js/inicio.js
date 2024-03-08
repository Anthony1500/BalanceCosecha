var images = ['../images/cosecha1.png','../images/cosecha2.png','../images/cosecha3.png','../images/cosecha4.png','../images/cosecha5.png'];
var index = 0;

function changeBackground() {
    var scrollBg = document.querySelector('.scroll-bg');
    scrollBg.style.opacity = 0;

    setTimeout(function() {
        scrollBg.style.backgroundImage =
            "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('" + images[index] + "')";
        index = (index + 1) % images.length;
        scrollBg.style.opacity = 1;
    }, 1000);
}

changeBackground();
setInterval(changeBackground, 35000);
