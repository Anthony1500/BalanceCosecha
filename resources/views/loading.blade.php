<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cargando...</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.14/lottie.min.js"></script>
    <style>
        #lottie-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #lottie-container {
            width: 40%; /* Tamaño de la animación */
            height: 40%; /* Tamaño de la animación */
            position: relative; /* Centra la animación */
            top: 50%; /* Centra la animación */
            left: 50%; /* Centra la animación */
            transform: translate(-50%, -50%); /* Centra la animación */
        }
    </style>
</head>
<body>
    <div id="lottie-animation">
        <div id="lottie-container"></div> <!-- Contenedor para la animación -->
    </div>

    <script>
        var animation = bodymovin.loadAnimation({
            container: document.getElementById('lottie-container'), // Cambia esto
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: '/loadscreen'
        });

        // Inicialmente oculta la animación
        document.getElementById('lottie-animation').style.display = 'none';
    </script>
</body>
</html>
