<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cargando...</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.14/lottie.min.js"></script>
</head>
<body>
    <div id="lottie-animation" style="width: 500px; height: 500px;"></div>

    <script>
        var animation = bodymovin.loadAnimation({
            container: document.getElementById('lottie-animation'), 
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: '../json/loadscreen.json'
        });
    </script>
</body>
</html>
