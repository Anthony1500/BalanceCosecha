

const navLinks = document.querySelectorAll('nav a');

navLinks.forEach(link => {
  link.addEventListener('click', (event) => {
    event.preventDefault();
    const targetSection = document.querySelector(event.target.getAttribute('href'));
    targetSection.scrollIntoView({
      behavior: 'smooth',
    });
  });
});

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function getNewToken() {
    var email = Email;
    var apiToken = api_Token;
    return fetch('https://www.universal-tutorial.com/api/getaccesstoken', {
        headers: {
            'Accept': 'application/json',
            'api-token': apiToken,
            'user-email': email
        }
    })
    .then(response => response.json())
    .then(data => {
        localStorage.setItem('authToken', data.auth_token);
        localStorage.setItem('tokenObtainedAt', Date.now());
    })
    .catch(error => console.error('Error:', error));
}

var authToken = localStorage.getItem('authToken');
var tokenObtainedAt = localStorage.getItem('tokenObtainedAt');
var tokenExpiresAt = tokenObtainedAt + 23 * 60 * 60 * 1000;
if (Date.now() > tokenExpiresAt) {
    getNewToken().then(() => {
        authToken = localStorage.getItem('authToken');
    });
}
fetch('https://www.universal-tutorial.com/api/countries/', {
    headers: {
      'Authorization': `Bearer ${authToken}`,
      'Accept': 'application/json'
    }
  })
  .then(response => {
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
    return response.json();
  })
  .then(data => {
  const select = document.getElementById('countrySelect');
  const flagImage = document.getElementById('flagImage');
  data.forEach((country, index) => {
    if (supportedCountryCodes.includes(country.country_short_name)) {
      const option = document.createElement('option');
      option.value = country.country_name;
      option.textContent = country.country_name;

      // Guarda la URL de la imagen de la bandera en un atributo personalizado
      const flagUrl = `https://flagsapi.com/${country.country_short_name}/shiny/48.png`;
      option.setAttribute('data-flag', flagUrl);

      select.appendChild(option);
    }
  });

  select.addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    if (selectedOption.value !== "") {
        const flagUrl = selectedOption.getAttribute('data-flag');
        if (flagUrl) {
            flagImage.src = flagUrl;
            flagImage.style.display = 'block';
        } else {
            flagImage.style.display = 'none';
        }
    }
});

});
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
document.getElementById('btnedit').addEventListener('click', function() {
    $('form input, form select').prop('disabled', false);
    document.getElementById('btnedit').style.display = 'none';
    document.getElementById('btnsave').style.display = 'block';
});

$('form').on('submit', function(event) {
    event.preventDefault();

 // Verifica si todos los campos del formulario están llenos
 var allFieldsFilled = $(this).find('input').get().every(function(input) {
    return $(input).val() !== '';
});

// Si no todos los campos están llenos, detiene la ejecución de la función
if (!allFieldsFilled) {
    return;
}
document.getElementById('lottie-animation').style.display = 'block';

    var data = {};
    $(this).serializeArray().map(function(item) {
        data[item.name] = item.value;
    });
    $.ajax({
        url: registerUrl,
        type: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        data: JSON.stringify(data),
        success: function(data) {
            document.getElementById('lottie-animation').style.display = 'none';
            $('form input, form select').prop('disabled', true);
            document.getElementById('btnedit').style.display = 'block';
            document.getElementById('btnsave').style.display = 'none';

            var modal = document.getElementById("myalertdialogerror");
            var alertText = modal.querySelector(".alertText");
            var alertDiv = modal.querySelector(".alert");

            // texto de alerta con el mensaje de éxito
            alertText.textContent = 'Registro completado con éxito.';
            // clase 'success' al div de alerta
            alertDiv.classList.remove('error');
            alertDiv.classList.add('success');
            // Muestra el modal
            modal.style.display = "block";
            modal.classList.remove('fade-out');

            setTimeout(function() {
                modal.classList.add('fade-out');
                setTimeout(function() {
                    modal.style.display = "none";
                }, 2000);
            }, 5000);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            document.getElementById('lottie-animation').style.display = 'none';
            // Aquí va tu código para manejar el error
            var modal = document.getElementById("myalertdialogerror");
            var alertText = modal.querySelector(".alertText");
            var alertDiv = modal.querySelector(".alert");

            // texto de alerta con el mensaje de error
            alertText.textContent = `Error ${jqXHR.status}: ${textStatus}`;
            // clase 'error' al div de alerta
            alertDiv.classList.remove('success');
            alertDiv.classList.add('error');
            // Muestra el modal
            modal.style.display = "block";
            modal.classList.remove('fade-out');

            setTimeout(function() {
                modal.classList.add('fade-out');
                setTimeout(function() {
                    modal.style.display = "none";
                }, 2000);
            }, 5000);
        }
    });
});

