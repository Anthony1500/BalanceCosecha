<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <title>Cosecha</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">


   @vite('resources/css/registerform.css')
   @vite('resources/css/style_sky.css')
   @vite('resources/css/alertdialog.css')
   @vite('resources/js/script.js')
   @vite('resources/js/registerform.js')
   @vite('resources/js/alertdialog.js')
   @include('loading')
</head>
<body>

<div class="demo-page">
  <div class="demo-page-navigation">
    <nav>
      <ul>
        <li>
            <a href="#intro">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50">
                    <path d="M 25 1 C 11.222656 1 0 10.878906 0 23.1875 C 0 29.234375 2.773438 34.664063 7.21875 38.6875 C 6.546875 40.761719 5.046875 42.398438 3.53125 43.65625 C 2.714844 44.332031 1.933594 44.910156 1.3125 45.46875 C 1.003906 45.746094 0.722656 46.027344 0.5 46.375 C 0.277344 46.722656 0.078125 47.21875 0.21875 47.75 L 0.34375 48.15625 L 0.6875 48.375 C 1.976563 49.117188 3.582031 49.246094 5.3125 49.125 C 7.042969 49.003906 8.929688 48.605469 10.78125 48.09375 C 14.375 47.101563 17.75 45.6875 19.53125 44.90625 C 21.289063 45.273438 23.054688 45.5 24.90625 45.5 C 38.683594 45.5 49.90625 35.621094 49.90625 23.3125 C 49.90625 11.007813 38.78125 1 25 1 Z M 25 3 C 37.820313 3 47.90625 12.214844 47.90625 23.3125 C 47.90625 34.402344 37.730469 43.5 24.90625 43.5 C 23.078125 43.5 21.355469 43.320313 19.625 42.9375 L 19.28125 42.84375 L 19 43 C 17.328125 43.738281 13.792969 45.179688 10.25 46.15625 C 8.476563 46.644531 6.710938 47.019531 5.1875 47.125 C 4.167969 47.195313 3.539063 46.953125 2.84375 46.78125 C 3.339844 46.355469 4.019531 45.847656 4.8125 45.1875 C 6.554688 43.742188 8.644531 41.730469 9.375 38.75 L 9.53125 38.125 L 9.03125 37.75 C 4.625 34.015625 2 28.875 2 23.1875 C 2 12.097656 12.175781 3 25 3 Z M 23.8125 12.8125 C 23.511719 12.8125 23.40625 12.988281 23.40625 13.1875 L 23.40625 15.8125 C 23.40625 16.113281 23.613281 16.1875 23.8125 16.1875 L 26.1875 16.1875 C 26.488281 16.1875 26.59375 16.011719 26.59375 15.8125 L 26.59375 13.1875 C 26.59375 12.886719 26.386719 12.8125 26.1875 12.8125 Z M 23.90625 20.09375 C 23.605469 20.09375 23.5 20.300781 23.5 20.5 L 23.5 33.90625 C 23.5 34.207031 23.707031 34.3125 23.90625 34.3125 L 23.90625 34.40625 L 26.1875 34.40625 C 26.488281 34.40625 26.59375 34.199219 26.59375 34 L 26.59375 20.5 C 26.59375 20.199219 26.386719 20.09375 26.1875 20.09375 Z"></path>
                </svg>
                Acerca de
            </a>
        </li>
        <li>
          <a href="#register">
            <svg xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" height="24" width="24" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                <g transform="translate(0 -1028.4)">
                 <path d="m3 1033.4c-1.1046 0-2 0.9-2 2v10 1c0 1.1 0.8954 2 2 2h16 2c1.105 0 2-0.9 2-2v-1-9-1c0-1.1-0.895-2-2-2h-2-14-2z" fill="#95a5a6"/>
                 <path d="m3 1032.4c-1.1046 0-2 0.9-2 2v10 1c0 1.1 0.8954 2 2 2h16 2c1.105 0 2-0.9 2-2v-1-9-1c0-1.1-0.895-2-2-2h-2-14-2z" fill="#bdc3c7"/>
                 <path d="m13 1035.4v1h4v-1h-4zm0 2v1h7v-1h-7zm0 2v1h7v-1h-7z" fill="#7f8c8d"/>
                 <path d="m4 6c-0.5523 0-1 0.4477-1 1v9c0 0.552 0.4477 1 1 1h6c0.552 0 1-0.448 1-1v-9c0-0.5523-0.448-1-1-1h-6z" transform="translate(0 1028.4)" fill="#ecf0f1"/>
                 <path d="m7 1035.5c-0.6655 0-1.2798 0.4-1.7324 0.8-0.3868 0.5-0.6104 1-0.7546 1.6-0.4216 0.4-0.3708 1-0.0589 1.4 0.3297 0.4 0.3253 0.9 0.5757 1.4 0.1042 0.4 0.6974 0.7 0.6972 1.1 0.1491 0.7-0.7098 0.5-1.0969 0.7-0.5399 0.2-1.2466 0.4-1.6286 0.8 0.04 0.6-0.1095 1.2 0.125 1.7 0.2 0.4 0.7004 0.4 1.1035 0.4h6.208c0.459-0.2 0.621-0.8 0.562-1.2v-1c-0.705-0.3-1.3602-0.7-2.1396-0.9-0.4624 0-0.6621-0.3-0.6986-0.7 0.6429-0.5 0.9832-1.3 1.2132-2.1 0.3596-0.3 0.655-1.1 0.1842-1.5-0.2308-0.4-0.2642-0.9-0.5832-1.4-0.4221-0.6-1.1761-1.1-1.976-1.1z" fill="#34495e"/>
                </g>
               </svg>
            Completar Registro</a>
        </li>
        <li>
          <a href="#projects">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="548.169px" height="548.169px" viewBox="0 0 548.169 548.169" style="enable-background:new 0 0 548.169 548.169;"
            xml:space="preserve">
       <g>
           <g>
               <path d="M109.634,164.452c20.179,0,37.402-7.135,51.674-21.411c14.277-14.275,21.416-31.503,21.416-51.678
                   c0-20.173-7.139-37.401-21.416-51.678c-14.272-14.275-31.496-21.414-51.674-21.414c-20.177,0-37.401,7.139-51.676,21.414
                   C43.684,53.962,36.545,71.186,36.545,91.363c0,20.179,7.139,37.403,21.413,51.678C72.233,157.313,89.457,164.452,109.634,164.452z
                   "/>
               <path d="M196.569,278.519c21.413,21.406,47.248,32.114,77.516,32.114c30.269,0,56.103-10.708,77.515-32.114
                   c21.409-21.42,32.117-47.258,32.117-77.52c0-30.264-10.708-56.101-32.117-77.515c-21.412-21.414-47.246-32.121-77.515-32.121
                   c-30.268,0-56.105,10.709-77.516,32.121c-21.411,21.411-32.12,47.248-32.12,77.515S175.158,257.102,196.569,278.519z"/>
               <path d="M438.543,164.452c20.17,0,37.397-7.135,51.671-21.411c14.274-14.275,21.409-31.503,21.409-51.678
                   c0-20.173-7.135-37.401-21.409-51.678c-14.273-14.275-31.501-21.414-51.671-21.414c-20.184,0-37.407,7.139-51.682,21.414
                   c-14.271,14.277-21.409,31.501-21.409,51.678c0,20.179,7.139,37.403,21.409,51.678
                   C401.136,157.313,418.359,164.452,438.543,164.452z"/>
               <path d="M512.763,164.456c-1.136,0-5.276,1.999-12.415,5.996c-7.132,3.999-16.416,8.044-27.833,12.137
                   c-11.416,4.089-22.747,6.136-33.972,6.136c-12.758,0-25.406-2.187-37.973-6.567c0.945,7.039,1.424,13.322,1.424,18.842
                   c0,26.457-7.71,50.819-23.134,73.089c30.841,0.955,56.056,13.134,75.668,36.552h38.256c15.605,0,28.739-3.863,39.396-11.57
                   c10.657-7.703,15.989-18.986,15.989-33.83C548.172,198.047,536.376,164.452,512.763,164.456z"/>
               <path d="M470.096,395.284c-1.999-11.136-4.524-21.464-7.57-30.978c-3.046-9.521-7.139-18.794-12.271-27.836
                   c-5.141-9.034-11.044-16.748-17.706-23.127c-6.667-6.379-14.805-11.464-24.414-15.276c-9.609-3.806-20.225-5.708-31.833-5.708
                   c-1.906,0-5.996,2.047-12.278,6.14c-6.283,4.089-13.224,8.665-20.841,13.702c-7.615,5.037-17.789,9.609-30.55,13.702
                   c-12.762,4.093-25.608,6.14-38.544,6.14c-12.941,0-25.791-2.047-38.544-6.14c-12.756-4.093-22.936-8.665-30.55-13.702
                   c-7.616-5.037-14.561-9.613-20.841-13.702c-6.283-4.093-10.373-6.14-12.279-6.14c-11.609,0-22.22,1.902-31.833,5.708
                   c-9.613,3.812-17.749,8.897-24.41,15.276c-6.667,6.372-12.562,14.093-17.705,23.127c-5.137,9.042-9.229,18.315-12.275,27.836
                   c-3.045,9.514-5.564,19.842-7.566,30.978c-2,11.136-3.331,21.505-3.997,31.121c-0.667,9.613-0.999,19.466-0.999,29.554
                   c0,22.836,6.945,40.874,20.839,54.098c13.899,13.223,32.363,19.842,55.389,19.842h249.535c23.028,0,41.49-6.619,55.392-19.842
                   c13.894-13.224,20.841-31.262,20.841-54.098c0-10.088-0.335-19.938-0.992-29.554C473.418,416.789,472.087,406.419,470.096,395.284
                   z"/>
               <path d="M169.303,274.088c-15.418-22.27-23.125-46.632-23.122-73.089c0-5.52,0.477-11.799,1.427-18.842
                   c-12.564,4.377-25.221,6.567-37.974,6.567c-11.23,0-22.552-2.046-33.974-6.136c-11.417-4.093-20.699-8.138-27.834-12.137
                   c-7.138-3.997-11.281-5.996-12.422-5.996C11.801,164.456,0,198.051,0,265.24c0,14.844,5.33,26.127,15.987,33.83
                   c10.66,7.707,23.794,11.563,39.397,11.563h38.26C113.251,287.222,138.467,275.042,169.303,274.088z"/>
           </g>
       </g>
       <g>
       </g>
       <g>
       </g>
       <g>
       </g>
       <g>
       </g>
       <g>
       </g>
       <g>
       </g>
       <g>
       </g>
       <g>
       </g>
       <g>
       </g>
       <g>
       </g>
       <g>
       </g>
       <g>
       </g>
       <g>
       </g>
       <g>
       </g>
       <g>
       </g>
       </svg>
       Tus Proyectos</a>
        </li>

        <li>
          <a href="#save">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            	 viewBox="0 0 100.25 100.25" style="enable-background:new 0 0 100.25 100.25;" xml:space="preserve">
            <path d="M83.061,27.94l-11-11c-0.281-0.281-0.663-0.439-1.061-0.439H18c-0.828,0-1.5,0.671-1.5,1.5v64c0,0.829,0.672,1.5,1.5,1.5h64
            	c0.828,0,1.5-0.671,1.5-1.5v-53C83.5,28.602,83.342,28.221,83.061,27.94z M34.5,19.5h31v21h-31V19.5z M71.5,80.5h-43v-26h43V80.5z
            	 M80.5,80.5h-6V53c0-0.829-0.672-1.5-1.5-1.5H27c-0.828,0-1.5,0.671-1.5,1.5v27.5h-6v-61h12V42c0,0.829,0.672,1.5,1.5,1.5h34
            	c0.828,0,1.5-0.671,1.5-1.5V19.5h1.879L80.5,29.621V80.5z"/>
            </svg>
            Guardar y Terminar</a>
        </li>
      </ul>
    </nav>
  </div>
  <main class="demo-page-content">
    <section>
        <div class="href-target" id="intro"></div>
        <h1 class="package-name">Registro</h1>
        <p>
            Bienvenido usuario con número de identificación: <strong>{{ session('identificacion') }}</strong> a nuestra página de registro. Aquí es donde podras completar los datos para unirte a nuestra comunidad. Se detalla a continuación las diferentes secciones :
        </p>

        <strong>Completar Registro:</strong>
        <p>
            Aquí es donde ingresarás tus datos personales, como nombre, dirección de correo electrónico,dirección etc. La información que proporciones nos ayudará a construir tu perfil de usuario.    </p>
        <strong>Tus Proyectos:</strong>
        <p>
            Si tienes un proyecto, puedes seleccionarlo aquí. Si no, también puedes crear uno nuevo.
            Los proyectos son una parte fundamental de nuestra comunidad, y esta sección te permite unirte a uno existente o comenzar uno.
        </p>
        <strong>Guardar y Terminar:</strong>
        <p>
            Una vez que hayas completado todos los pasos anteriores, simplemente haz clic en el botón Guardar. Esto guardará tus datos y te llevará al <strong>Home</strong> o <strong>Menú Principal</strong>.
            A partir de ahí, podrás explorar todo lo que nuestra plataforma tiene para ofrecer.
        </p>
        <p>
            ¡Gracias por unirte a nosotros!
        </p>
    </section>






    <section>
      <div class="href-target" id="register"></div>
      <h1>
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
<g id="user">
	<g>
		<path d="M256.167,277.721c-55.4,0-100.471-45.071-100.471-100.471S200.767,76.779,256.167,76.779
			c55.4,0,100.471,45.071,100.471,100.471S311.567,277.721,256.167,277.721z"/>
	</g>
	<g>
		<path d="M437.19,74.98C388.83,26.63,324.55,0,256.17,0S123.5,26.63,75.15,74.98S0.17,187.62,0.17,256S26.8,388.67,75.15,437.02
			C123.5,485.37,187.79,512,256.17,512s132.66-26.63,181.021-74.98C485.54,388.67,512.17,324.38,512.17,256
			S485.54,123.33,437.19,74.98z M69.31,399.37C38.75,359.63,20.55,309.9,20.55,256c0-129.92,105.7-235.62,235.62-235.62
			S491.78,126.08,491.78,256c0,53.92-18.2,103.67-48.79,143.42c-7.58-25.359-26.88-48-56.183-65.311
			c-35.407-20.92-82.02-32.439-131.24-32.439c-49.16,0-95.57,11.521-130.68,32.46C95.91,351.41,76.82,374.01,69.31,399.37z"/>
	</g>
</g>
</svg>
       Datos del usuario
      </h1>
      <p>
        Por favor, completa los siguientes campos para continuar:
      </p>

      <form>
        <div class="nice-form-group">
          <label>Nombre</label>
          <input type="text" name="nombre" placeholder="Ingrese su nombre" value="" class="icon-right" required />
        </div>
        <div class="nice-form-group">
          <label>Apellido</label>
          <input type="text" name="apellido" placeholder="Ingrese su apellido" value="" class="icon-right" required/>
        </div>
        <div class="nice-form-group">
          <label>Usuario</label>
          <input type="text" name="usuario" placeholder="Ingrese un nombre de Usuario" value="" class="icon-right" required />
        </div>
        <div class="nice-form-group">
          <label>Correo electrónico</label>
          <input type="email" name="email" placeholder="Ingrese su correo" value="" class="icon-right" required />
        </div>

      <div class="nice-form-group">
        <label>País</label>
        <div class="nice-form-group" style="display: flex; align-items: center;">
          <select id="countrySelect" name="pais" class="icon-right" required>
            <option value="" disabled selected hidden></option>
            <option disabled placeholder="Selecciona un país">Selecciona un país</option>
            <!-- Los países se llenarán aquí con JavaScript -->
          </select>
          <img id="flagImage" src="" alt="Bandera del país seleccionado" style="margin-left: 9px; display: none;">
         </div>
       </div>
      <div class="nice-form-group">
         <label>Provincia</label>
         <input type="text" name="provincia" placeholder="Ingrese su provincia" value="" class="icon-right" required/>
       </div>
       <div class="nice-form-group">
         <label>Ciudad</label>
         <input type="text" name="ciudad" placeholder="Ingrese su ciudad" value="" class="icon-right"required />
       </div>
       <div class="nice-form-group">
         <label>Dirección domiciliaria</label>
         <input type="text" name="direccion_domicilio" placeholder="Ingrese su dirección" value="" class="icon-right" required />
       </div>
       <div class="nice-form-group">
         <label>Teléfono</label>
         <input type="tel" name="telefono" placeholder="Ingrese su teléfono" value="" class="icon-right" required />
       </div>

       <div class="nice-form-group">
         <label>Cargo</label>
         <input type="text"  name="cargo" placeholder="Ingrese su cargo" value="" class="icon-right" required/>
       </div>


       <details>
        <summary>
       <button id="btnsave" type="submit" class="toggle-code">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="21"><path fill="none" d="M0 0h24v24H0z"/><path d="M4 3h14l2.707 2.707a1 1 0 0 1 .293.707V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm3 1v5h9V4H7zm-1 8v7h12v-7H6zm7-7h2v3h-2V5z" fill="#000"/></svg>
        Guardar
    </button>
    <button id="btnedit"  type="button" class="toggle-code" style="background-color: #0066cc; color: white;display: none;">
    <svg width="22" height="21" viewBox="0 -0.222 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.7 5.12758L19.266 6.37458C19.4172 6.51691 19.5025 6.71571 19.5013 6.92339C19.5002 7.13106 19.4128 7.32892 19.26 7.46958L18.07 8.89358L14.021 13.7226C13.9501 13.8037 13.8558 13.8607 13.751 13.8856L11.651 14.3616C11.3755 14.3754 11.1356 14.1751 11.1 13.9016V11.7436C11.1071 11.6395 11.149 11.5409 11.219 11.4636L15.193 6.97058L16.557 5.34158C16.8268 4.98786 17.3204 4.89545 17.7 5.12758Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M12.033 7.61865C12.4472 7.61865 12.783 7.28287 12.783 6.86865C12.783 6.45444 12.4472 6.11865 12.033 6.11865V7.61865ZM9.23301 6.86865V6.11865L9.23121 6.11865L9.23301 6.86865ZM5.50001 10.6187H6.25001L6.25001 10.617L5.50001 10.6187ZM5.50001 16.2437L6.25001 16.2453V16.2437H5.50001ZM9.23301 19.9937L9.23121 20.7437H9.23301V19.9937ZM14.833 19.9937V20.7437L14.8348 20.7437L14.833 19.9937ZM18.566 16.2437H17.816L17.816 16.2453L18.566 16.2437ZM19.316 12.4937C19.316 12.0794 18.9802 11.7437 18.566 11.7437C18.1518 11.7437 17.816 12.0794 17.816 12.4937H19.316ZM15.8863 6.68446C15.7282 6.30159 15.2897 6.11934 14.9068 6.2774C14.5239 6.43546 14.3417 6.87397 14.4998 7.25684L15.8863 6.68446ZM18.2319 9.62197C18.6363 9.53257 18.8917 9.13222 18.8023 8.72777C18.7129 8.32332 18.3126 8.06792 17.9081 8.15733L18.2319 9.62197ZM8.30001 16.4317C7.8858 16.4317 7.55001 16.7674 7.55001 17.1817C7.55001 17.5959 7.8858 17.9317 8.30001 17.9317V16.4317ZM15.767 17.9317C16.1812 17.9317 16.517 17.5959 16.517 17.1817C16.517 16.7674 16.1812 16.4317 15.767 16.4317V17.9317ZM12.033 6.11865H9.23301V7.61865H12.033V6.11865ZM9.23121 6.11865C6.75081 6.12461 4.7447 8.13986 4.75001 10.6203L6.25001 10.617C6.24647 8.96492 7.58269 7.62262 9.23481 7.61865L9.23121 6.11865ZM4.75001 10.6187V16.2437H6.25001V10.6187H4.75001ZM4.75001 16.242C4.7447 18.7224 6.75081 20.7377 9.23121 20.7437L9.23481 19.2437C7.58269 19.2397 6.24647 17.8974 6.25001 16.2453L4.75001 16.242ZM9.23301 20.7437H14.833V19.2437H9.23301V20.7437ZM14.8348 20.7437C17.3152 20.7377 19.3213 18.7224 19.316 16.242L17.816 16.2453C17.8195 17.8974 16.4833 19.2397 14.8312 19.2437L14.8348 20.7437ZM19.316 16.2437V12.4937H17.816V16.2437H19.316ZM14.4998 7.25684C14.6947 7.72897 15.0923 8.39815 15.6866 8.91521C16.2944 9.44412 17.1679 9.85718 18.2319 9.62197L17.9081 8.15733C17.4431 8.26012 17.0391 8.10369 16.6712 7.7836C16.2897 7.45165 16.0134 6.99233 15.8863 6.68446L14.4998 7.25684ZM8.30001 17.9317H15.767V16.4317H8.30001V17.9317Z" fill="#000000"/>
    </svg>
    Editar
    </button>
 </summary>

</details>
      </form>
    </section>

    <section>
      <div class="href-target" id="projects"></div>
      <h1>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 93.83" style="enable-background:new 0 0 122.88 93.83" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M98.24,1.06c5.29,0,9.58,4.29,9.58,9.58c0,5.29-4.29,9.58-9.58,9.58c-1.89,0-3.66-0.55-5.15-1.5 c-0.06,0.08-0.13,0.16-0.21,0.23l-7.11,6.85c4.74,5.3,7.75,12.18,8.13,19.75h9.94c0.75-4.54,4.7-8,9.45-8 c5.29,0,9.58,4.29,9.58,9.58c0,5.29-4.29,9.58-9.58,9.58c-4.49,0-8.26-3.09-9.3-7.27c-0.05,0-0.1,0.01-0.15,0.01h-9.99 c-0.53,7.47-3.61,14.23-8.38,19.41l7.53,7c0.07,0.07,0.14,0.14,0.2,0.22c1.46-0.9,3.18-1.42,5.03-1.42c5.29,0,9.58,4.29,9.58,9.58 c0,5.29-4.29,9.58-9.58,9.58s-9.58-4.29-9.58-9.58c0-2.04,0.64-3.93,1.73-5.49l-0.03-0.03l-7.69-7.14 c-5.59,4.76-12.84,7.63-20.75,7.63c-8.18,0-15.64-3.06-21.3-8.1l-7.76,7.56l-0.01,0.01c1.06,1.54,1.67,3.4,1.67,5.41 c0,5.29-4.29,9.58-9.58,9.58s-9.58-4.29-9.58-9.58c0-5.29,4.29-9.58,9.58-9.58c1.87,0,3.62,0.54,5.1,1.47 c0.03-0.04,0.06-0.07,0.1-0.1l7.73-7.53c-4.55-5.17-7.46-11.81-7.92-19.13l-10.9,0.11l-0.06,0c-0.88,4.39-4.75,7.7-9.4,7.7 C4.29,57.03,0,52.74,0,47.45c0-5.29,4.29-9.58,9.58-9.58c4.6,0,8.45,3.24,9.37,7.57l0.05,0l10.92-0.11 c0.42-7.39,3.35-14.1,7.94-19.32l-8.13-7.77c-0.06-0.06-0.12-0.12-0.17-0.19c-1.33,0.71-2.86,1.1-4.47,1.1 c-5.29,0-9.58-4.29-9.58-9.58C15.51,4.29,19.8,0,25.09,0c5.29,0,9.58,4.29,9.58,9.58c0,2.26-0.78,4.34-2.1,5.98l8.04,7.68 c5.66-5.04,13.12-8.1,21.29-8.1c8.08,0,15.46,2.99,21.1,7.93l7.18-6.92c0.04-0.04,0.09-0.08,0.14-0.12 c-1.05-1.54-1.66-3.39-1.66-5.39C88.66,5.35,92.95,1.06,98.24,1.06L98.24,1.06z M57.41,50.48l2.67,7.85l1.34-4.66l-0.66-0.72 c-0.3-0.43-0.36-0.81-0.2-1.14c0.36-0.71,1.09-0.57,1.78-0.57c0.72,0,1.61-0.14,1.84,0.77c0.08,0.3-0.02,0.62-0.23,0.94l-0.66,0.72 l1.34,4.66l2.42-7.85c1.74,1.57,6.91,1.88,8.83,2.96c0.61,0.34,1.16,0.77,1.6,1.35c0.67,0.88,1.08,2.04,1.19,3.5l0.4,3.89 c-0.1,1.04-0.69,1.64-1.84,1.72H62.37H47.24c-1.16-0.09-1.75-0.69-1.84-1.72l0.4-3.89c0.11-1.47,0.52-2.62,1.19-3.5 c0.44-0.58,0.99-1.01,1.6-1.35C50.51,52.36,55.67,52.05,57.41,50.48L57.41,50.48z M56.69,38.61c0.03,0.06,0.04,0.12,0.04,0.19 c0,0.03,0,0.06-0.01,0.1l0.05,0.37c-0.13,0.03-0.25,0.03-0.37,0.03c-0.05,0.02-0.11,0.03-0.16,0.03c-0.33,0.01-0.57,0.07-0.73,0.18 c-0.08,0.06-0.15,0.13-0.18,0.21c-0.05,0.1-0.07,0.22-0.06,0.36c0.01,0.44,0.25,1.01,0.7,1.68l0.01,0.01l0,0l1.49,2.37 c0.6,0.95,1.22,1.91,1.99,2.62c0.73,0.67,1.63,1.13,2.8,1.13c1.28,0,2.21-0.47,2.97-1.18c0.8-0.74,1.43-1.77,2.05-2.8l1.68-2.76 c0.34-0.77,0.44-1.24,0.33-1.46c-0.07-0.15-0.37-0.18-0.87-0.14c-0.15,0.01-0.3-0.04-0.4-0.14c-0.04,0-0.08,0-0.12-0.01l0.02-0.12 c-0.03-0.06-0.05-0.12-0.06-0.19c-0.02-0.17,0.06-0.33,0.18-0.44l0.35-1.77c-3.07-0.04-5.17-0.57-7.66-2.16 c-0.82-0.52-1.06-1.12-1.88-1.06c-0.62,0.12-1.14,0.4-1.55,0.84c-0.4,0.43-0.69,1.01-0.89,1.75L56.69,38.61L56.69,38.61z M69.4,38.62c0.36,0.11,0.62,0.31,0.78,0.63c0.25,0.51,0.15,1.27-0.32,2.35l0,0c-0.01,0.02-0.02,0.04-0.03,0.06l-1.7,2.8 c-0.66,1.08-1.33,2.17-2.22,3.01c-0.93,0.88-2.09,1.46-3.66,1.45c-1.47,0-2.58-0.57-3.49-1.4c-0.87-0.8-1.54-1.82-2.17-2.82 l-1.49-2.37c-0.56-0.83-0.84-1.59-0.86-2.21c-0.01-0.3,0.04-0.58,0.15-0.82c0.12-0.25,0.3-0.47,0.54-0.63 c0.12-0.08,0.25-0.15,0.4-0.2c-0.09-1.27-0.12-2.85-0.06-4.17c0.03-0.32,0.09-0.64,0.18-0.97c0.38-1.36,1.34-2.46,2.52-3.21 c0.42-0.27,0.87-0.49,1.36-0.66c2.87-1.04,6.66-0.47,8.7,1.73c0.83,0.9,1.35,2.08,1.46,3.66L69.4,38.62L69.4,38.62z M81.78,27.27 c-0.06-0.05-0.11-0.1-0.16-0.15c-0.03-0.03-0.05-0.06-0.08-0.09c-5.07-4.94-11.99-7.98-19.62-7.98c-7.65,0-14.58,3.05-19.65,8 c-0.06,0.09-0.13,0.17-0.2,0.25c-0.1,0.1-0.2,0.19-0.32,0.27c-4.92,5.07-7.96,11.98-7.96,19.6c0,7.77,3.15,14.8,8.24,19.89 c5.09,5.09,12.12,8.24,19.89,8.24c7.77,0,14.8-3.15,19.89-8.24c5.09-5.09,8.24-12.12,8.24-19.89c0-7.77-3.15-14.8-8.24-19.89 L81.78,27.27L81.78,27.27z"/></g></svg>
        Tus proyectos
      </h1>
      <p>
        Si ya tienes un proyecto en nuestra plataforma,
        puedes seleccionarlo haciendo clic en el botón "Buscar Proyecto" o  Si prefieres comenzar un nuevo proyecto,
        simplemente haz clic en el botón "Crear Nuevo Proyecto".
      </p>
      <div style="display: flex; justify-content: space-between;">
      <details>
      <summary>
      <div class="toggle-code">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" width= "25px" height= "35%" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 68 68" style="enable-background:new 0 0 30 30;" xml:space="preserve">
<g>
	<g>
		<path d="M2.1357422,50.6201172c-0.2763672,0-0.5-0.2236328-0.5-0.5V7.340332c0-1.7373047,1.4174805-3.1503906,3.1601563-3.1503906
			h11.5795898c0.8251953,0,1.6381836,0.3325195,2.2304688,0.9125977l5.9833984,5.9838867
			c0.4086914,0.4086914,0.9506836,0.6337891,1.5263672,0.6337891h24.6000977c1.7421875,0,3.159668,1.4174805,3.159668,3.159668
			v1.8300781c0,0.2763672-0.2236328,0.5-0.5,0.5H8.8955078c-1.1083984,0-2.0097656,0.90625-2.0097656,2.0200195v17.0400391
			c0,0.0512695-0.0078125,0.1015625-0.0229492,0.1503906L2.8027344,49.2905273
			c-0.1147461,0.2944336-0.1669922,0.5625-0.1669922,0.8295898C2.6357422,50.3964844,2.4121094,50.6201172,2.1357422,50.6201172z
			 M4.7958984,5.1899414c-1.190918,0-2.1601563,0.9648438-2.1601563,2.1503906v39.1582031l3.25-10.3056641V19.2299805
			c0-1.6650391,1.3500977-3.0200195,3.0097656-3.0200195h43.9799805v-1.3300781c0-1.190918-0.96875-2.159668-2.159668-2.159668
			H26.1157227c-0.8427734,0-1.6357422-0.3291016-2.2333984-0.9267578l-5.9799805-5.9799805
			c-0.4033203-0.3950195-0.9609375-0.6235352-1.5268555-0.6235352H4.7958984z"/>
	</g>
	<g>
		<path d="M6.3862305,36.7700195c-0.0253906,0-0.0507813-0.0019531-0.0766602-0.0058594
			c-0.2436523-0.0375977-0.4238281-0.2475586-0.4238281-0.4941406V19.2299805c0-1.6650391,1.3500977-3.0200195,3.0097656-3.0200195
			h44.6801758c1.6650391,0,3.0200195,1.3549805,3.0200195,3.0200195v0.6899414c0,0.2763672-0.2236328,0.5-0.5,0.5h-8.5302734
			c-0.6391602,0-1.2597656,0.296875-1.6606445,0.7939453l-1.8935547,2.2944336
			c-0.5854492,0.7255859-1.4970703,1.1616211-2.4355469,1.1616211H12.1557617c-0.890625,0-1.6821289,0.5332031-2.0166016,1.3583984
			L6.862793,36.4204102C6.7963867,36.6308594,6.6010742,36.7700195,6.3862305,36.7700195z M8.8955078,17.2099609
			c-1.1083984,0-2.0097656,0.90625-2.0097656,2.0200195v13.7929688l2.3129883-7.3330078
			c0.5019531-1.2416992,1.6572266-2.0200195,2.9570313-2.0200195h29.4199219c0.6391602,0,1.2597656-0.296875,1.6606445-0.7939453
			l1.8935547-2.2944336c0.5854492-0.7255859,1.4970703-1.1616211,2.4355469-1.1616211h8.0302734v-0.1899414
			c0-1.1137695-0.90625-2.0200195-2.0200195-2.0200195H8.8955078z"/>
	</g>
	<g>
		<path d="M42.2558594,53.2797852H4.7958984c-1.0444336,0-2.019043-0.5166016-2.6079102-1.3813477
			c-0.5898438-0.8662109-0.7119141-1.9663086-0.3276367-2.9418945l7.3383789-23.2666016
			c0.5019531-1.2416992,1.6572266-2.0200195,2.9570313-2.0200195h29.4199219c0.6391602,0,1.2597656-0.296875,1.6606445-0.7939453
			l1.8935547-2.2944336c0.5854492-0.7255859,1.4970703-1.1616211,2.4355469-1.1616211h12.800293
			c1.0297852,0,1.9975586,0.5043945,2.5888672,1.3491211c0.5952148,0.8496094,0.7353516,1.894043,0.3862305,2.8671875
			l-4.9960938,16.7763672c-0.0385742,0.1313477-0.1298828,0.2402344-0.2514648,0.3027344s-0.2626953,0.0712891-0.3925781,0.0268555
			c-1.1611328-0.40625-2.3974609-0.6123047-3.6748047-0.6123047c-6.2529297,0-11.340332,5.0874023-11.340332,11.340332
			c0,0.4575195,0.0219727,0.8666992,0.0668945,1.2514648c0.0166016,0.1416016-0.0283203,0.2836914-0.1230469,0.390625
			C42.534668,53.21875,42.3984375,53.2797852,42.2558594,53.2797852z M12.1557617,24.6699219
			c-0.890625,0-1.6821289,0.5332031-2.0166016,1.3583984l-7.3364258,23.262207
			c-0.2788086,0.7104492-0.1972656,1.4438477,0.2119141,2.0454102c0.4081964,0.5996094,1.0576172,0.9438477,1.78125,0.9438477
			h36.9135742c-0.0161133-0.2568359-0.0239258-0.5253906-0.0239258-0.8095703c0-6.8046875,5.5356445-12.340332,12.340332-12.340332
			c1.2094727,0,2.3867188,0.1699219,3.5068359,0.5063477l4.8540039-16.2988281
			c0.0024414-0.0097656,0.0058594-0.019043,0.0092773-0.0283203c0.2426758-0.6669922,0.1474609-1.3833008-0.2607422-1.9667969
			c-0.4101563-0.5859375-1.0551758-0.9223633-1.7695313-0.9223633h-12.800293c-0.6391602,0-1.2597656,0.296875-1.6606445,0.7939453
			l-1.8935547,2.2944336c-0.5854492,0.7255859-1.4970703,1.1616211-2.4355469,1.1616211H12.1557617z"/>
	</g>
	<g>
		<path d="M30.1450195,29.2333984h-8.3081055c-0.2763672,0-0.5-0.2236328-0.5-0.5s0.2236328-0.5,0.5-0.5h8.3081055
			c0.2763672,0,0.5,0.2236328,0.5,0.5S30.4213867,29.2333984,30.1450195,29.2333984z"/>
	</g>
	<g>
		<path d="M18.8012695,29.2333984H15.605957c-0.2763672,0-0.5-0.2236328-0.5-0.5s0.2236328-0.5,0.5-0.5h3.1953125
			c0.2763672,0,0.5,0.2236328,0.5,0.5S19.0776367,29.2333984,18.8012695,29.2333984z"/>
	</g>
	<g>
		<path d="M24.3134766,32.2729492H15.605957c-0.2763672,0-0.5-0.2236328-0.5-0.5s0.2236328-0.5,0.5-0.5h8.7075195
			c0.2763672,0,0.5,0.2236328,0.5,0.5S24.5898438,32.2729492,24.3134766,32.2729492z"/>
	</g>
	<g>
		<path d="M54.0239258,63.8100586c-6.8046875,0-12.340332-5.5356445-12.340332-12.340332s5.5356445-12.340332,12.340332-12.340332
			s12.340332,5.5356445,12.340332,12.340332S60.8286133,63.8100586,54.0239258,63.8100586z M54.0239258,40.1293945
			c-6.2529297,0-11.340332,5.0874023-11.340332,11.340332s5.0874023,11.340332,11.340332,11.340332
			s11.340332-5.0874023,11.340332-11.340332S60.2768555,40.1293945,54.0239258,40.1293945z"/>
	</g>
	<g>
		<g>
			<g>
				<path d="M54.019043,58.5224609c-1.1289063,0-2.0473633-0.918457-2.0473633-2.0473633v-2.9555664h-2.9555664
					c-1.1289063,0-2.0473633-0.918457-2.0473633-2.0473633s0.918457-2.0473633,2.0473633-2.0473633h2.9555664V46.46875
					c0-1.1289063,0.918457-2.0473633,2.0473633-2.0473633s2.0473633,0.918457,2.0473633,2.0473633v2.9560547h2.9663086
					c1.1289063,0,2.0473633,0.918457,2.0473633,2.0473633s-0.918457,2.0473633-2.0473633,2.0473633h-2.9663086v2.9555664
					C56.0664063,57.6040039,55.1479492,58.5224609,54.019043,58.5224609z M49.0161133,50.4248047
					c-0.5776367,0-1.0473633,0.4697266-1.0473633,1.0473633s0.4697266,1.0473633,1.0473633,1.0473633h3.4555664
					c0.2763672,0,0.5,0.2236328,0.5,0.5v3.4555664c0,0.5776367,0.4697266,1.0473633,1.0473633,1.0473633
					s1.0473633-0.4697266,1.0473633-1.0473633v-3.4555664c0-0.2763672,0.2236328-0.5,0.5-0.5h3.4663086
					c0.5776367,0,1.0473633-0.4697266,1.0473633-1.0473633s-0.4697266-1.0473633-1.0473633-1.0473633h-3.4663086
					c-0.2763672,0-0.5-0.2236328-0.5-0.5V46.46875c0-0.5776367-0.4697266-1.0473633-1.0473633-1.0473633
					s-1.0473633,0.4697266-1.0473633,1.0473633v3.4560547c0,0.2763672-0.2236328,0.5-0.5,0.5H49.0161133z"/>
			</g>
		</g>
	</g>
</g>
</svg>
Crear Nuevo Proyecto
      </div>
    </summary>
</details>
<details>
      <summary>
      <div class="toggle-code">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"width= "25px" height= "35%" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100.25 100.25" style="enable-background:new 0 0 100.25 100.25;" xml:space="preserve">
            <path d="M97.197,40.597C96.914,40.221,96.47,40,96,40h-8.5v-9.327c0-0.828-0.671-1.499-1.498-1.5l-44.407-0.055l-7.179-7.179
                c-0.281-0.281-0.663-0.439-1.061-0.439H12c-0.828,0-1.5,0.672-1.5,1.5v54c0,0.828,0.672,1.5,1.5,1.5h73.795
                c0.731,0,1.339-0.525,1.472-1.218c0.071-0.115,0.137-0.234,0.176-0.37l10-35C97.571,41.46,97.481,40.973,97.197,40.597z
                 M32.734,24.5l7.178,7.178c0.28,0.281,0.661,0.438,1.059,0.439L84.5,32.171V40H22c-0.67,0-1.258,0.444-1.442,1.088L13.5,65.79V24.5
                H32.734z M84.726,75.5h-70.88L23.132,43h70.88L84.726,75.5z"></path>
            </svg>
            Buscar Proyecto
      </div>
    </summary>
</details>
</div>
    </section>

        <section>
      <div class="href-target" id="save"></div>
      <h1>
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            	 viewBox="0 0 100.25 100.25" style="enable-background:new 0 0 100.25 100.25;" xml:space="preserve">
            <path d="M83.061,27.94l-11-11c-0.281-0.281-0.663-0.439-1.061-0.439H18c-0.828,0-1.5,0.671-1.5,1.5v64c0,0.829,0.672,1.5,1.5,1.5h64
            	c0.828,0,1.5-0.671,1.5-1.5v-53C83.5,28.602,83.342,28.221,83.061,27.94z M34.5,19.5h31v21h-31V19.5z M71.5,80.5h-43v-26h43V80.5z
            	 M80.5,80.5h-6V53c0-0.829-0.672-1.5-1.5-1.5H27c-0.828,0-1.5,0.671-1.5,1.5v27.5h-6v-61h12V42c0,0.829,0.672,1.5,1.5,1.5h34
            	c0.828,0,1.5-0.671,1.5-1.5V19.5h1.879L80.5,29.621V80.5z"/>
            </svg>
        Guardar
      </h1>
      <p>
        Una vez que completado todas las secciones, puedes guardar tu información  y terminar haciendo clic en el botón "Guardar y Terminar" a continuación:
      </p>

      <a  class="to-repo" target="_blank">
        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs><style>.cls-1{fill:#2d4a60;}.cls-2{fill:#263f52;}.cls-3{fill:#8fa5a5;}.cls-4{fill:#7b8c8c;}.cls-5{fill:#eaeff0;}.cls-6{fill:#bac2c6;}</style></defs><title>Diskette</title><path class="cls-1" d="M453.714,129.294,382.7,58.289a52.97,52.97,0,0,0-37.708-15.622H74.667a32.035,32.035,0,0,0-32,32V437.333a32.035,32.035,0,0,0,32,32H437.333a32.035,32.035,0,0,0,32-32V167.005A52.992,52.992,0,0,0,453.714,129.294Z"/><path class="cls-2" d="M42.667,437.333a32.035,32.035,0,0,0,32,32H437.333a31.9,31.9,0,0,0,22.617-9.383l-407.9-407.9a31.9,31.9,0,0,0-9.383,22.617Z"/><path class="cls-3" d="M128,469.333V330.667A10.667,10.667,0,0,1,138.667,320H373.333A10.667,10.667,0,0,1,384,330.667V469.333Z"/><path class="cls-4" d="M384,384l-64-64H138.667A10.667,10.667,0,0,0,128,330.667V469.333H384Z"/><path class="cls-5" d="M341.333,42.667V149.333A10.667,10.667,0,0,1,330.667,160H160a10.667,10.667,0,0,1-10.667-10.667V42.667Z"/><path class="cls-6" d="M160,160l-10.667-10.667A10.667,10.667,0,0,0,160,160Z"/><rect class="cls-3" x="288" y="74.667" width="21.333" height="53.333" rx="5.333" ry="5.333"/></svg>
        Guardar y Terminar
      </a>
    </section>


  </main>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.14/lottie.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>console.clear();
    var loginUrl = "{{ route('auth.login') }}";
    var registerUrl = "{{ route('auth.completeregister') }}";
    var supportedCountryCodes = "{{ env('SUPPORTED_COUNTRY_CODES') }}".split(',');
    var Email = "{{ env('EMAIL') }}";
    var api_Token = "{{ env('API_TOKEN') }}";
    </script>

     <script>
     !function(){function a(a,b){return a.zIndex===b.zIndex?0:a.zIndex<b.zIndex?-1:1}function b(){this.width=this.width?this.width:this.image.width,this.height=this.height?this.height:this.image.height}var c=window,d=document,e=d.documentElement,f=d.body,g=c.requestAnimationFrame||c.mozRequestAnimationFrame||c.webkitRequestAnimationFrame||c.msRequestAnimationFrame||c.oRequestAnimationFrame||function(a){c.setTimeout(a,20)},h=function(){},i={tracking:"scroll",trackingInvert:!1,x:0,y:0,damping:1,canvas:void 0,className:"",parent:document.body,elements:void 0,animating:!0,fullscreen:!0,preRender:h,postRender:h},j=!1,k=0,l=0,m=function(){k=e.scrollLeft||f.scrollLeft,l=e.scrollTop||f.scrollTop},n=!1,o=0,p=0,q=function(a){o=a.touches?a.touches[0].clientX:a.clientX,p=a.touches?a.touches[0].clientY:a.clientY};if(!c.CanvasRenderingContext2D)return c.Canvallax=function(){return!1};c.Canvallax=function s(a){if(!(this instanceof s))return new s(a);var b=this;return s.extend(this,i,a),b.canvas=b.canvas||d.createElement("canvas"),b.canvas.className+=" canvallax "+b.className,b.parent.insertBefore(b.canvas,b.parent.firstChild),b.fullscreen?(b.resizeFullscreen(),c.addEventListener("resize",b.resizeFullscreen.bind(b))):b.resize(b.width,b.height),b.ctx=b.canvas.getContext("2d"),b.elements=[],a&&a.elements&&b.addElements(a.elements),b.damping=!b.damping||b.damping<1?1:b.damping,b.render(),b},Canvallax.prototype={_x:0,_y:0,add:function(b){for(var c=b.length?b:arguments,d=c.length,e=0;d>e;e++)this.elements.push(c[e]);return this.elements.sort(a),this},remove:function(a){var b=this.elements.indexOf(a);return b>-1&&this.elements.splice(b,1),this},render:function(){var a=this,b=0,d=a.elements.length,e=0,f=0,h=a.fullscreen||"pointer"!==a.tracking;for(a.animating&&(a.animating=g(a.render.bind(a))),a.tracking&&("scroll"===a.tracking?(j||(j=!0,m(),c.addEventListener("scroll",m),c.addEventListener("touchmove",m)),a.x=k,a.y=l):"pointer"===a.tracking&&(n||(n=!0,c.addEventListener("mousemove",q),c.addEventListener("touchmove",q)),h||(e=a.canvas.offsetLeft,f=a.canvas.offsetTop,h=o>=e&&o<=e+a.width&&p>=f&&p<=f+a.height),h&&(a.x=-o+e,a.y=-p+f)),a.x=!h||a.trackingInvert!==!0&&"invertx"!==a.trackingInvert?a.x:-a.x,a.y=!h||a.trackingInvert!==!0&&"inverty"!==a.trackingInvert?a.y:-a.y),a._x+=(-a.x-a._x)/a.damping,a._y+=(-a.y-a._y)/a.damping,a.ctx.clearRect(0,0,a.width,a.height),a.preRender(a.ctx,a);d>b;b++)a.ctx.save(),a.elements[b]._render(a.ctx,a),a.ctx.restore();return a.postRender(a.ctx,a),this},resize:function(a,b){return this.width=this.canvas.width=a,this.height=this.canvas.height=b,this},resizeFullscreen:function(){return this.resize(c.innerWidth,c.innerHeight)},play:function(){return this.animating=!0,this.render()},pause:function(){return this.animating=!1,this}},Canvallax.createElement=function(){function a(a){var c=b(a);return a._pointCache&&a._pointChecksum===c||(a._pointCache=a.getTransformPoint(),a._pointChecksum=c),a._pointCache}function b(a){return[a.transformOrigin,a.x,a.y,a.width,a.height,a.size].join(" ")}var c=Math.PI/180,d={x:0,y:0,distance:1,fixed:!1,opacity:1,fill:!1,stroke:!1,lineWidth:!1,transformOrigin:"center center",scale:1,rotation:0,preRender:h,render:h,postRender:h,init:h,crop:!1,getTransformPoint:function(){var a=this,b=a.transformOrigin.split(" "),c={x:a.x,y:a.y};return"center"===b[0]?c.x+=a.width?a.width/2:a.size:"right"===b[0]&&(c.x+=a.width?a.width:2*a.size),"center"===b[1]?c.y+=a.height?a.height/2:a.size:"bottom"===b[1]&&(c.y+=a.height?a.height:2*a.size),c},_render:function(b,d){var e=this,f=e.distance||1,g=d._x,h=d._y,i=a(e);return e.preRender.call(e,b,d),e.blend&&(d.ctx.globalCompositeOperation=e.blend),d.ctx.globalAlpha=e.opacity,d.ctx.translate(i.x,i.y),e.scale===!1?(g*=f,h*=f):d.ctx.scale(f,f),e.fixed||d.ctx.translate(g,h),e.scale!==!1&&d.ctx.scale(e.scale,e.scale),e.rotation&&d.ctx.rotate(e.rotation*c),d.ctx.translate(-i.x,-i.y),e.crop&&(b.beginPath(),"function"==typeof e.crop?e.crop.call(e,b,d):b.rect(e.crop.x,e.crop.y,e.crop.width,e.crop.height),b.clip(),b.closePath()),e.outline&&(b.beginPath(),b.rect(e.x,e.y,e.width||2*e.size,e.height||2*e.size),b.closePath(),b.strokeStyle=e.outline,b.stroke()),e.render.call(e,b,d),this.fill&&(b.fillStyle=this.fill,b.fill()),this.stroke&&(this.lineWidth&&(b.lineWidth=this.lineWidth),b.strokeStyle=this.stroke,b.stroke()),e.postRender.call(e,b,d),e},clone:function(a){var a=Canvallax.extend({},this,a);return new this.constructor(a)}};return function(a){function b(a){return this instanceof b?(Canvallax.extend(this,a),this.init.apply(this,arguments),this):new b(a)}return b.prototype=Canvallax.extend({},d,a),b.prototype.constructor=b,b.clone=b.prototype.clone,b}}(),Canvallax.extend=function(a){a=a||{};var b=arguments.length,c=1;for(1===arguments.length&&(a=this,c=0);b>c;c++)if(arguments[c])for(var d in arguments[c])arguments[c].hasOwnProperty(d)&&(a[d]=arguments[c][d]);return a};var r=2*Math.PI;Canvallax.Circle=Canvallax.createElement({size:20,render:function(a){a.beginPath(),a.arc(this.x+this.size,this.y+this.size,this.size,0,r),a.closePath()}}),Canvallax.Element=Canvallax.createElement(),Canvallax.Image=Canvallax.createElement({src:null,image:null,width:null,height:null,init:function(a){this.image=this.image&&1===this.image.nodeType?this.image:a&&1===a.nodeType?a:new Image,b.bind(this)(),this.image.onload=b.bind(this),this.image.src=this.image.src||a.src||a},render:function(a){this.image&&a.drawImage(this.image,this.x,this.y,this.width,this.height)}});var r=2*Math.PI;Canvallax.Polygon=Canvallax.createElement({sides:6,size:20,render:function(a){var b=this.sides;for(a.translate(this.x+this.size,this.y+this.size),a.beginPath(),a.moveTo(this.size,0);b--;)a.lineTo(this.size*Math.cos(b*r/this.sides),this.size*Math.sin(b*r/this.sides));a.closePath()}}),Canvallax.Rectangle=Canvallax.createElement({width:100,height:100,render:function(a){a.beginPath(),a.rect(this.x,this.y,this.width,this.height),a.closePath()}})}();</script>


     <div id="myalertdialogerror" class="alertdialog">
  <label>
    <input type="checkbox" class="alertCheckbox" autocomplete="off" />
    <div class="alert success">
      <span class="alertClose">X</span>
      <span class="alertText">
      <br class="clear"/></span>
    </div>
  </label>
</div>

</body>
</html>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
