
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
$(document).ready(function() {

    function getAuthToken(retries = 5) {
        // Intenta obtener el token del almacenamiento local
        let authToken = localStorage.getItem('authToken');

        // Si hay un token en el almacenamiento local, lo devuelve
        if (authToken) {
            return Promise.resolve(authToken);
        }

        // Si no hay token en el almacenamiento local, hace la solicitud para obtener uno nuevo
        return fetch(getToken, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (!response.ok) {
                if (retries > 0) {
                    return getAuthToken(retries - 1);
                } else {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
            }
            return response.json();
        })
        .then(data => {
            // Guarda el nuevo token en el almacenamiento local
            localStorage.setItem('authToken', data.token);
            return data.token;
        });
    }

    function fetchData(authToken, retries = 5) {

        return fetch('https://www.universal-tutorial.com/api/countries/', {
            headers: {
                'Authorization': `Bearer ${authToken}`,
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                // Si hay un error, borra el token del almacenamiento local y obtiene un nuevo token
                localStorage.removeItem('authToken');
                return getAuthToken().then(newAuthToken => {
                    return fetchData(newAuthToken, retries - 1);
                });
            }
            return response.json();
        });
    }

getAuthToken()
.then(authToken => {
        return fetchData(authToken);
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

});

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
document.getElementById('btnedit').style.display = 'none';
document.getElementById('btneditproyecto').style.display = 'none';
document.getElementById('btnsave').style.display = 'block';
document.getElementById('btnsaveproyecto').style.display = 'block';


document.getElementById('btnedit').addEventListener('click', function() {
    $('#formregister input, #formregister select').prop('disabled', false);
    document.getElementById('btnedit').style.display = 'none';
    document.getElementById('btnsave').style.display = 'block';
    localStorage.setItem('editButtonState', 'none');
    desmarcarComoCompletado('registersection');
});
document.getElementById('btneditproyecto').addEventListener('click', function() {
    $('#myForm input, #myForm select').prop('disabled', false);
    document.getElementById('btneditproyecto').style.display = 'none';
    document.getElementById('btnsaveproyecto').style.display = 'block';
    localStorage.setItem('editButtonStateproyecto', 'none');
    desmarcarComoCompletado('projectssection');
});
$('form').on('submit', function(event) {
    event.preventDefault();
var formid;
 var allFieldsFilled = $(this).find('input').get().every(function(input) {
    return $(input).val() !== '';
});

if (!allFieldsFilled) {
    return;
}
document.getElementById('lottie-animation').style.display = 'block';
var registerUrls;
    if (this.id === 'formregister') {
        registerUrls = registerUrl;
        formid='formregister';
    } else if (this.id === 'myForm') {
        registerUrls = registerprojectUrl;
        formid='myForm';
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
    })
    .done(function(data, textStatus, jqXHR) {
        document.getElementById('lottie-animation').style.display = 'none';
        if (formid === 'formregister') {
            $('#formregister input, #formregister select').prop('disabled', true);
            document.getElementById('btnedit').style.display = 'block';
            document.getElementById('btnsave').style.display = 'none';
            localStorage.setItem('editButtonState', 'block');

            $('#formregister input, #formregister select').each(function() {
                var input = $(this);
                var id = 'formregister-' + input.attr('id');
                var values = JSON.parse(localStorage.getItem(id)) || {};
                values[input.attr('name')] = input.val();
                localStorage.setItem(id, JSON.stringify(values));
              });
              marcarComoCompletado('registersection');
        } else if (formid === 'myForm') {
            $('#myForm input, #myForm select').prop('disabled', true);
            document.getElementById('barsearch').style.display = 'none'
            //document.getElementById('saveformproduct').style.display = 'none'
            document.getElementById('optionletter').style.display = 'none'
            document.getElementById('btneditproyecto').style.display = 'block';
            document.getElementById('btnsaveproyecto').style.display = 'none';
            localStorage.setItem('editButtonStateproyecto', 'block');

            $('#myForm input, #myForm select').each(function() {
                var input = $(this);
                var id = 'myForm-' + input.attr('id');
                var values = JSON.parse(localStorage.getItem(id)) || {};
                values[input.attr('name')] = input.val();
                localStorage.setItem(id, JSON.stringify(values));
            });
            marcarComoCompletado('projectssection');

        }
        var modal = document.getElementById("myalertdialogerror");
        var alertText = modal.querySelector(".alertText");
        var alertDiv = modal.querySelector(".alert");

        if (jqXHR.status === 204) {
            // Aquí puedes mostrar tu cuadro de diálogo de advertencia
            alertText.textContent = 'Advertencia: No se realizaron cambios.';
            alertDiv.classList.remove('success');
            alertDiv.classList.add('warning');
        } else {
            alertText.textContent = `Éxito : ${data.success}`;
            alertDiv.classList.remove('error');
            alertDiv.classList.remove('warning');
            alertDiv.classList.add('success');
        }
        modal.style.display = "block";
        modal.classList.remove('fade-out');

        setTimeout(function() {
            modal.classList.add('fade-out');
            setTimeout(function() {
                modal.style.display = "none";
            }, 2000);
        }, 5000);
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        document.getElementById('lottie-animation').style.display = 'none';
        var modal = document.getElementById("myalertdialogerror");
        var alertText = modal.querySelector(".alertText");
        var alertDiv = modal.querySelector(".alert");

        var serverResponse = JSON.parse(jqXHR.responseText);

        alertText.textContent = `Error ${jqXHR.status}: ${serverResponse.error}`;
        alertDiv.classList.remove('success');
        alertDiv.classList.add('error');
        modal.style.display = "block";
        modal.classList.remove('fade-out');

        setTimeout(function() {
            modal.classList.add('fade-out');
            setTimeout(function() {
                modal.style.display = "none";
            }, 2000);
        }, 5000);
    });
});
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
window.addEventListener('load', function() {
    var editButtonState = localStorage.getItem('editButtonState');
    if(editButtonState=='block'){
        $('#formregister input, #formregister select').prop('disabled', true);
    }
    if (editButtonState) {
        document.getElementById('btnedit').style.display = editButtonState;
        document.getElementById('btnsave').style.display = editButtonState === 'block' ? 'none' : 'block';
    }
    var btnText = document.getElementById('btnText');
    var editButtonStateproyecto = localStorage.getItem('editButtonStateproyecto');
    if(editButtonStateproyecto=='block'){
        btnText.textContent = "Mostrar proyecto"
        $('#myForm  input, #myForm  select').prop('disabled', true);
        document.getElementById('barsearch').style.display = 'none'
        //document.getElementById('saveformproduct').style.display = 'none'
        document.getElementById('optionletter').style.display = 'none'
    }else{
        btnText.textContent = "Crear nuevo proyecto"
        document.getElementById('barsearch').style.display = 'block'
        //document.getElementById('saveformproduct').style.display = 'block'
        document.getElementById('optionletter').style.display = 'block'
    }
    if (editButtonStateproyecto) {
        document.getElementById('btneditproyecto').style.display = editButtonStateproyecto;
        document.getElementById('btnsaveproyecto').style.display = editButtonStateproyecto === 'block' ? 'none' : 'block';
    }

    $('#formregister input, #formregister select').each(function() {
        var input = $(this);
        var values = JSON.parse(localStorage.getItem('formregister-' + input.attr('id')));
        if (values) {
            var inputValue = values[input.attr('name')];
            if (inputValue) {
                input.val(inputValue);
            }
        }
    });
$('#myForm input, #myForm select').each(function() {
    var input = $(this);
    var values = JSON.parse(localStorage.getItem('myForm-' + input.attr('id')));
    if (values) {
        var inputValue = values[input.attr('name')];
        if (inputValue) {
            input.val(inputValue);
        }
    }
});
    var item1Display = localStorage.getItem('item1Display');
    var item2Display = localStorage.getItem('item2Display');
    var btnaddproyectDisabled = localStorage.getItem('btnaddproyectDisabled');
    var btnTextContent = localStorage.getItem('Text');
    var searchValue = localStorage.getItem('searchValue');

     if (item1Display && item2Display) {
        var item2 = document.getElementById('item2');
        item2.style.display = item2Display;
        if (item2Display === 'block') {
            item2.classList.add('fade-in');
        }
        document.getElementById('item1').style.display = item1Display;

        document.getElementById('title2').textContent = 'Proyecto Encontrado ';
        document.getElementById('desc2').innerHTML = `
            Se encontró una coincidencia con el proyecto. Aquí están los detalles:
            <ul>
                <li><strong>Nombre del proyecto:</strong> ${localStorage.getItem('nombre_proyecto')}</li>
                <li><strong>RUC:</strong> ${localStorage.getItem('ruc')}</li>
                <li><strong>País:</strong> ${localStorage.getItem('pais')}</li>
                <li><strong>Dirección del proyecto:</strong> ${localStorage.getItem('direccion_proyecto')}</li>
            </ul>
        `;
    } else {
        document.getElementById('item1').style.display = 'none';
        document.getElementById('item2').style.display = 'none';
    }
    if (btnaddproyectDisabled) {
        document.getElementById('btnaddproyect').disabled = true;
        document.getElementById('btnaddproyect').classList.add('disabled-button');
        document.getElementById('btnnew').style.display = 'none'
        //document.getElementById('saveformproduct').style.display = 'none'
        document.querySelector('#barsearch input[type="search"]').value = searchValue;
        document.querySelector('#barsearch input[type="search"]').disabled = true;
        document.getElementById('optionletter').style.display = 'none'
        document.getElementById('btndetails').style.display = 'none'
    } else {
        document.querySelector('#barsearch input[type="search"]').value = '';
        document.querySelector('#barsearch input[type="search"]').disabled = false;
        document.getElementById('btnaddproyect').disabled = false;
        document.getElementById('btnaddproyect').classList.remove('disabled-button');
        document.getElementById('btnnew').style.display = 'block';
        document.getElementById('btndetails').style.display = 'block'
    }

    if (btnTextContent) {
        document.getElementById('proyecttext').textContent = btnTextContent;
    } else {
        document.getElementById('proyecttext').textContent = "Ser parte del proyecto";
    }
});

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
document.querySelector('input[type="search"]').addEventListener('change', function() {
    var ruc = this.value;

    if (!ruc) {
        document.getElementById('item1').style.display = 'none';
        document.getElementById('item2').style.display = 'none';
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
            var item1 = document.getElementById('item1');
            item1.style.display = 'block';
            item1.classList.add('fade-in');
            document.getElementById('item2').style.display = 'none';
            return;
        }
        return response.json();
    })
    .then(function(proyecto) {

        if (proyecto) {
            var item2 = document.getElementById('item2');
            item2.style.display = 'block';
            item2.classList.add('fade-in');
            document.getElementById('item1').style.display = 'none';

            document.getElementById('title2').textContent = 'Proyecto Encontrado';
            document.getElementById('desc2').innerHTML = `
                Se encontró una coincidencia con el proyecto. Aquí están los detalles:
                <ul>
                    <li><strong>Nombre del proyecto:</strong> ${proyecto.nombre_proyecto}</li>
                    <li><strong>RUC:</strong> ${proyecto.ruc}</li>
                    <li><strong>País:</strong> ${proyecto.pais}</li>
                    <li><strong>Dirección del proyecto:</strong> ${proyecto.direccion_proyecto}</li>
                </ul>
                <p><span style="color:red; font-size:18px;">*</span>Recuerda al seleccionar un proyecto no podrás quitar la selección</p>
            `;
}
})
    .catch(function(error) {
        var modal = document.getElementById("myalertdialogerror");
        var alertText = modal.querySelector(".alertText");
        var alertDiv = modal.querySelector(".alert");

        alertText.textContent = 'Error: ' + error.message;
        alertDiv.classList.remove('success');
        alertDiv.classList.add('error');
        modal.style.display = "block";
        modal.classList.remove('fade-out');

        setTimeout(function() {
            modal.classList.add('fade-out');
            setTimeout(function() {
                modal.style.display = "none";
            }, 2000);
        }, 5000);
    });
});
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
document.getElementById('btnaddproyect').addEventListener('click', function() {
    var btn = this;
    var ruc = document.querySelector('input[type="search"]').value;
    document.getElementById('lottie-animation').style.display = 'block';
    fetch(actualizarUrl, {
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
            document.getElementById('lottie-animation').style.display = 'none';
            return;
        }
        return response.json();
    })
    .then(function(data) {
    document.getElementById('lottie-animation').style.display = 'none';
    btn.disabled = true;
    btn.classList.add('disabled-button');

    var searchValue = document.querySelector('#barsearch input[type="search"]').value;
    var inputElement = document.querySelector('#barsearch input[type="search"]');
    inputElement.disabled = true;



    document.getElementById('btnnew').style.display = 'none'
    //document.getElementById('barsearch').style.display = 'none'
    //document.getElementById('saveformproduct').style.display = 'none'
    document.getElementById('optionletter').style.display = 'none'

    var Text = document.getElementById('proyecttext');
    if (Text.textContent.trim() === "Ser parte del proyecto") {
        Text.textContent = "Eres parte del proyecto";
    }

    localStorage.setItem('item1Display', 'none');
    localStorage.setItem('item2Display', 'block');
    localStorage.setItem('btnaddproyectDisabled', 'true');
    localStorage.setItem('Text', Text.textContent);
    localStorage.setItem('editButtonStateproyecto', 'none');
    localStorage.setItem('searchValue', searchValue);

    var modal = document.getElementById("myalertdialogerror");
    var alertText = modal.querySelector(".alertText");
    var alertDiv = modal.querySelector(".alert");

    if (data.status === 204) {
        // Aquí puedes mostrar tu cuadro de diálogo de advertencia
        alertText.textContent = 'Advertencia: No se realizaron cambios.';
        alertDiv.classList.remove('success');
        alertDiv.classList.add('warning');
    } else {
        alertText.textContent = `Éxito : Proyecto asociado correctamente. `;
        alertDiv.classList.remove('error');
        alertDiv.classList.remove('warning');
        alertDiv.classList.add('success');
    }
    modal.style.display = "block";
    modal.classList.remove('fade-out');

    setTimeout(function() {
        modal.classList.add('fade-out');
        setTimeout(function() {
            modal.style.display = "none";
        }, 2000);
    }, 5000);

    if (data) {
        var item2 = document.getElementById('item2');
        item2.style.display = 'block';
        item2.classList.add('fade-in');
        document.getElementById('item1').style.display = 'none';

        document.getElementById('title2').textContent = 'Proyecto Encontrado ';
        document.getElementById('desc2').innerHTML = `
            Se encontró una coincidencia con el proyecto. Aquí están los detalles:
            <ul>
                <li><strong>Nombre del proyecto:</strong> ${data.nombre_proyecto}</li>
                <li><strong>RUC:</strong> ${data.ruc}</li>
                <li><strong>País:</strong> ${data.pais}</li>
                <li><strong>Dirección del proyecto:</strong> ${data.direccion_proyecto}</li>
            </ul>
        `;
        localStorage.setItem('nombre_proyecto', data.nombre_proyecto);
        localStorage.setItem('ruc', data.ruc);
        localStorage.setItem('pais', data.pais);
        localStorage.setItem('direccion_proyecto', data.direccion_proyecto);
}
marcarComoCompletado('projectssection');
    })
    .catch(function(error) {
        document.getElementById('lottie-animation').style.display = 'none';
        var modal = document.getElementById("myalertdialogerror");
        var alertText = modal.querySelector(".alertText");
        var alertDiv = modal.querySelector(".alert");

        alertText.textContent = 'Error: ' + error.message;
        alertDiv.classList.remove('success');
        alertDiv.classList.add('error');
        modal.style.display = "block";
        modal.classList.remove('fade-out');

        setTimeout(function() {
            modal.classList.add('fade-out');
            setTimeout(function() {
                modal.style.display = "none";
            }, 2000);
        }, 5000);
    });
});

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
window.addEventListener('popstate', function() {

    localStorage.clear();
    document.getElementById('btnedit').style.display = 'none';
    document.getElementById('btnsave').style.display = 'block';
    document.getElementById('btneditproyecto').style.display = 'none';
    document.getElementById('btnsaveproyecto').style.display = 'block';
    document.getElementById('countrySelect').selectedIndex = 0;
    document.getElementById('countrySelectother').selectedIndex = 0;
});
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
document.getElementById('btnnew').addEventListener('click', function() {
    var btnText = document.getElementById('btnText');

    var editButtonStateproyecto = localStorage.getItem('editButtonStateproyecto');
    if(editButtonStateproyecto=='block'){
        if (btnText.textContent.trim() === "Mostrar proyecto") {
            btnText.textContent = "Dejar de mostrar";
        } else {
            btnText.textContent = "Mostrar proyecto";
        }
    }else{
        if (btnText.textContent.trim() === "Crear nuevo proyecto") {
            btnText.textContent = "Dejar de mostrar";
        } else {
            btnText.textContent = "Crear nuevo proyecto";
        }
    }


    var form = document.getElementById('myForm');
    if (form.style.opacity === '0' || form.style.opacity === '') {
        form.style.visibility = 'visible';
        form.style.opacity = '1';
        form.style.height = 'auto';
    } else {
        form.style.opacity = '0';
        form.style.height = '0';

        setTimeout(function() {
            form.style.visibility = 'hidden';
        }, 500);
    }

});
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
var modal = document.getElementById("miFrame");

$(document).ready(function() {
    $('#terms-link').on('click', function(event) {
        event.preventDefault();
        $('#miFrame').attr('src', '/modal');
        $('#miFrame').css('visibility', 'visible');
    });
});


var span = document.getElementsByClassName("cerrar")[0];

modal.onload = function() {

  var btn = modal.contentWindow.document.getElementById("modalclose");
  var btnacept = modal.contentWindow.document.getElementById("botonacept");

  if (btn || btnacept ) {
      btn.onclick = function() {
      document.getElementById("miFrame").src = "";
      document.getElementById("miFrame").style.visibility = "hidden";
      document.body.style.overflow = "auto";
    }
    btnacept.onclick = function() {
        document.getElementById("miFrame").src = "";
        document.getElementById("miFrame").style.visibility = "hidden";
        document.body.style.overflow = "auto";
      }
  }

};
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
var contadorCompletado = localStorage.getItem('contadorCompletado') ? parseInt(localStorage.getItem('contadorCompletado')) : 0;
var contadorCompletado = 0;
var checkbox = document.getElementById('check-2');
var btnsaveall = document.getElementById('btnsaveall');
btnsaveall.disabled = true;
btnsaveall.style.display = 'none';

var estadoAnterior = {};
var indiceUltimoMarcado = -1;

function marcarComoCompletado(id) {
    document.getElementById(id).classList.add('completado');
    localStorage.setItem(id, 'completado');
    estadoAnterior[id] = 'completado';
    if (contadorCompletado < 4) {
        contadorCompletado++;
        localStorage.setItem('contadorCompletado', contadorCompletado);
    }
}


function desmarcarComoCompletado(id) {
    document.getElementById(id).classList.remove('completado');
    localStorage.removeItem(id);
    estadoAnterior[id] = 'no completado';
    if (contadorCompletado > 0) {
        contadorCompletado--;
        localStorage.setItem('contadorCompletado', contadorCompletado);
    }
}


var saveallMarcado = false;

checkbox.addEventListener('change', function() {
    localStorage.setItem('checkbox', this.checked);
    verificarEstado();
    if (!saveallMarcado) {
        marcarComoCompletado('saveall');
        saveallMarcado = true;
    } else {
        desmarcarComoCompletado('saveall');
        saveallMarcado = false;
    }
});

function verificarEstado() {

    var estadoCheckbox = localStorage.getItem('checkbox');
    checkbox.checked = estadoCheckbox === 'true';

    if (contadorCompletado == 4 && checkbox.checked) {

        btnsaveall.disabled = false;
        btnsaveall.style.display = 'block';

    } else if (contadorCompletado == 3) {
        btnsaveall.disabled = true;
        btnsaveall.style.display = 'none';

    } else {

        btnsaveall.disabled = true;
        btnsaveall.style.display = 'none';
    }
}



window.onload = function() {
    var elementos = document.querySelectorAll('li');

    for (var i = 0; i < elementos.length; i++) {
      var id = elementos[i].id;
      var estado = localStorage.getItem(id);

      if (estado === 'completado') {
        elementos[i].classList.add('completado');
        contadorCompletado++;
      }

      var observer = new MutationObserver(verificarEstado);
      observer.observe(elementos[i], { attributes: true });
    }


    var estadoCheckbox = localStorage.getItem('checkbox');
    checkbox.checked = estadoCheckbox === 'true';
    verificarEstado();
}


//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function comprobarCompletado() {
    var elementos = document.querySelectorAll('li');
    var contadorCompletado = 0;
    for (var i = 0; i < elementos.length; i++) {
        var id = elementos[i].id;
        var estado = localStorage.getItem(id);
        if (estado === 'completado') {
            contadorCompletado++;
        }
    }
    return contadorCompletado = 4;
}
    document.getElementById('btnsaveall').addEventListener('click', function() {
        document.getElementById('lottie-animation').style.display = 'block';
        if (comprobarCompletado()) {

        var xhr = new XMLHttpRequest();
        xhr.open('POST', home, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        xhr.onload = function() {
            if (xhr.status === 200) {
                localStorage.clear();
                document.getElementById('btnedit').style.display = 'none';
                document.getElementById('btnsave').style.display = 'block';
                document.getElementById('btneditproyecto').style.display = 'none';
                document.getElementById('btnsaveproyecto').style.display = 'block';
                document.getElementById('countrySelect').selectedIndex = 0;
                document.getElementById('countrySelectother').selectedIndex = 0;
                window.location.href = '/homepage';
            } else {
                document.getElementById('lottie-animation').style.display = 'none';
                var modal = document.getElementById("myalertdialogerror");
                var alertText = modal.querySelector(".alertText");
                var alertDiv = modal.querySelector(".alert");

                alertText.textContent = 'Error al guardar la información.';
                alertDiv.classList.remove('success');
                alertDiv.classList.add('error');
                modal.style.display = "block";
                modal.classList.remove('fade-out');

                setTimeout(function() {
                    modal.classList.add('fade-out');
                    setTimeout(function() {
                        modal.style.display = "none";
                    }, 2000);
                }, 5000);
            }
        };

        xhr.send();

    } else {
    document.getElementById('lottie-animation').style.display = 'none';
    var modal = document.getElementById("myalertdialogerror");
    var alertText = modal.querySelector(".alertText");
    var alertDiv = modal.querySelector(".alert");

    alertText.textContent = 'Error : Completa todos los campos antes de guardar.';
    alertDiv.classList.remove('success');
    alertDiv.classList.add('error');
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
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
var introsectionMarcado = false;

var observer = new IntersectionObserver(function(entries) {
    // Recorre cada entrada
    for (var i = 0; i < entries.length; i++) {
      // Si la sección 'intro' ha salido de la vista
      if (!entries[i].isIntersecting && !introsectionMarcado) {
        marcarComoCompletado('introsection');
        introsectionMarcado = true;
      }
    }
  }, { threshold: 0.5 });

var sectionintro = document.querySelector('#sectionintro');
observer.observe(sectionintro);


