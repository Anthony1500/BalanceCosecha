

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
var authToken;
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
        if (data.auth_token) {
            localStorage.setItem('authToken', data.auth_token);  // Almacena el nuevo token
        }
    });
}

function checkToken() {
    authToken = localStorage.getItem('authToken');
    if (!authToken) {
        return getNewToken();
    } else {
        return fetch('https://www.universal-tutorial.com/api/countries/', {
            headers: {
                'Authorization': `Bearer ${authToken}`,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.error && data.error.name === 'TokenExpiredError') {
                return getNewToken();
            }
        });
    }
}

checkToken().then(() => {
  authToken = localStorage.getItem('authToken');
  console.log(authToken);  // Mueve esta línea aquí
  // Aquí puedes continuar con tu solicitud
});


fetch(getToken, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }
  })
  .then(response => {
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
    return response.json();
  })
  .then(data => {
    const authToken = data.token;
    return fetch('https://www.universal-tutorial.com/api/countries/', {
      headers: {
        'Authorization': `Bearer ${authToken}`,
        'Accept': 'application/json'
      }
    });
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
  const selectother = document.getElementById('countrySelectother');
  const flagImageother = document.getElementById('flagImageother');
  data.forEach((country, index) => {
    if (supportedCountryCodes.includes(country.country_short_name)) {
        const option1 = document.createElement('option');
        option1.value = country.country_name;
        option1.textContent = country.country_name;

        const option2 = document.createElement('option');
        option2.value = country.country_name;
        option2.textContent = country.country_name;

        // Guarda la URL de la imagen de la bandera en un atributo personalizado
        const flagUrl = `https://flagsapi.com/${country.country_short_name}/shiny/48.png`;
        const flagUrl2 = `https://flagsapi.com/${country.country_short_name}/shiny/48.png`;
        option1.setAttribute('data-flag', flagUrl);
        option2.setAttribute('data-flag', flagUrl2);

        select.appendChild(option1);
        selectother.appendChild(option2);
    }
});


select.addEventListener('change', function() {
    localStorage.setItem('selectedCountry', this.value);
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

selectother.addEventListener('change', function() {
    localStorage.setItem('selectedCountryother', this.value);
    const selectedOption = this.options[this.selectedIndex];
    if (selectedOption.value !== "") {
        const flagUrl = selectedOption.getAttribute('data-flag');
        if (flagUrl) {
            flagImageother.src = flagUrl;
            flagImageother.style.display = 'block';
        } else {
            flagImageother.style.display = 'none';
        }
    }
});


var selectedCountry = localStorage.getItem('selectedCountry');
var selectedCountryother = localStorage.getItem('selectedCountryother');

if (selectedCountry) {
    select.value = selectedCountry;
    const selectedOption = select.options[select.selectedIndex];
    const flagUrl = selectedOption.getAttribute('data-flag');
    if (flagUrl) {
        flagImage.src = flagUrl;
        flagImage.style.display = 'block';
    } else {
        flagImage.style.display = 'none';
    }
}

if (selectedCountryother) {
    selectother.value = selectedCountryother;
    const selectedOptionother = selectother.options[selectother.selectedIndex];
    const flagUrlother = selectedOptionother.getAttribute('data-flag');
    if (flagUrlother) {
        flagImageother.src = flagUrlother;
        flagImageother.style.display = 'block';
    } else {
        flagImageother.style.display = 'none';
    }
}

});

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
document.getElementById('btnedit').addEventListener('click', function() {
    $('form input, form select').prop('disabled', false);
    document.getElementById('btnedit').style.display = 'none';
    document.getElementById('btnsave').style.display = 'block';
    localStorage.setItem('editButtonState', 'none');
});
document.getElementById('btneditproyecto').addEventListener('click', function() {
    $('form input, form select').prop('disabled', false);
    document.getElementById('btneditproyecto').style.display = 'none';
    document.getElementById('btnsaveproyecto').style.display = 'block';
    localStorage.setItem('editButtonStateproyecto', 'none');
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
var registerUrls;
    if (this.id === 'formregister') {
        registerUrls = registerUrl;
    } else if (this.id === 'myForm') {
        registerUrls = registerprojectUrl;
    }
    var data = {};
    $(this).serializeArray().map(function(item) {
        data[item.name] = item.value;
    });
    $.ajax({
        url: registerUrls,
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
            document.getElementById('btneditproyecto').style.display = 'block';
            document.getElementById('btnsave').style.display = 'none';
            document.getElementById('btnsaveproyecto').style.display = 'none';
            localStorage.setItem('editButtonState', 'block');
            localStorage.setItem('editButtonStateproyecto', 'block');

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

window.addEventListener('load', function() {
    var editButtonState = localStorage.getItem('editButtonState');
    if (editButtonState) {
        document.getElementById('btnedit').style.display = editButtonState;
        document.getElementById('btnsave').style.display = editButtonState === 'block' ? 'none' : 'block';
    }
    var editButtonStateproyecto = localStorage.getItem('editButtonStateproyecto');
    if (editButtonStateproyecto) {
        document.getElementById('btneditproyecto').style.display = editButtonStateproyecto;
        document.getElementById('btnsaveproyecto').style.display = editButtonStateproyecto === 'block' ? 'none' : 'block';
    }
});
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
document.querySelector('input[type="search"]').addEventListener('change', function() {
    var ruc = this.value;


    if (!ruc) {
        return;
    }

    fetch(searchUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ruc: ruc}),
    })
    .then(function(response) {
        if (!response.ok) {
            throw new Error('No se encontró el proyecto con el RUC proporcionado.');
        }
        return response.json();
    })
    .then(function(proyecto) {
        // Aquí puedes actualizar tu lista con los datos del proyecto
        // Por ejemplo, podrías mostrar un mensaje de éxito
        alert('Proyecto encontrado: ' + proyecto.nombre);
    })
    .catch(function(error) {
        // Aquí puedes mostrar el mensaje de error
        // Por ejemplo, podrías mostrar un mensaje de error
        alert('Error: ' + error.message);
    });
});


//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
window.addEventListener('popstate', function() {
    localStorage.removeItem('authToken');
    // Elimina los elementos del almacenamiento local
    localStorage.removeItem('selectedCountry');
    localStorage.removeItem('selectedCountryother');
    localStorage.removeItem('editButtonState');
    localStorage.removeItem('editButtonStateproyecto');

    // Restablece el estado del botón de edición
    document.getElementById('btnedit').style.display = 'block';
    document.getElementById('btnsave').style.display = 'none';
    document.getElementById('btneditproyecto').style.display = 'block';
    document.getElementById('btnsaveproyecto').style.display = 'none';

    // Restablece el estado del cuadro combinado
    document.getElementById('countrySelect').selectedIndex = 0;
    document.getElementById('countrySelectother').selectedIndex = 0;
});
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
document.getElementById('btnnew').addEventListener('click', function() {
    var form = document.getElementById('myForm');
    if (form.style.opacity === '0' || form.style.opacity === '') {
        form.style.visibility = 'visible'; // Asegúrate de que el formulario se muestre
        form.style.opacity = '1';
        form.style.height = 'auto'; // Permite que el formulario ocupe espacio
        document.getElementById('barsearch').style.display = 'none'
        document.getElementById('saveformproduct').style.display = 'none'
        document.getElementById('optionletter').style.display = 'none'
    } else {
        form.style.opacity = '0';
        form.style.height = '0'; // El formulario no ocupa espacio
        document.getElementById('barsearch').style.display = 'block'
        document.getElementById('saveformproduct').style.display = 'block'
        document.getElementById('optionletter').style.display = 'block'
        // Después de que la transición haya terminado, oculta el formulario
        setTimeout(function() {
            form.style.visibility = 'hidden';
        }, 500); // 500ms es la duración de la transición
    }
});
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
var modal = document.getElementById("miFrame");

$(document).ready(function() {
    $('#terms-link').on('click', function(event) {
        event.preventDefault();
        $('#miFrame').attr('src', '/modal');
        $('#miFrame').css('visibility', 'visible'); // Muestra el iframe suavemente
    });
});


var span = document.getElementsByClassName("cerrar")[0];

modal.onload = function() {
  // Accede a un elemento en la página del iframe
  var btn = modal.contentWindow.document.getElementById("modalclose");
  var btnacept = modal.contentWindow.document.getElementById("botonacept");

  if (btn) {
    // Cuando el usuario haga clic en  (x), cierra el modal
    btn.onclick = function() {
      document.getElementById("miFrame").src = "";
      document.getElementById("miFrame").style.visibility = "hidden"; // Oculta el iframe
      document.body.style.overflow = "auto";
    }
  }
  if (btnacept) {
    // Cuando el usuario haga clic en  (x), cierra el modal
    btnacept.onclick = function() {
      document.getElementById("miFrame").src = "";
      document.getElementById("miFrame").style.visibility = "hidden"; // Oculta el iframe
      document.body.style.overflow = "auto";
    }
  }
};
