import React, { useState } from 'https://esm.sh/react@18.2.0';
import cn from "https://cdn.skypack.dev/classnames@2.3.2";
import ReactDOM from 'https://esm.sh/react-dom@18.2.0';
import { faEye, faEyeSlash } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

const fieldsData = [
    { id: 'logemail', label: 'Correo', type: 'email' },
    { id: 'logpassword', label: 'Contraseña', type: 'password' },
];
const fieldsDataregister = [
    { id: 'regiusuario', label: 'Usuario', type: 'text' },
    { id: 'regispassword', label: 'Contraseña', type: 'password' },
    { id: 'regisagainpassword', label: 'Confirmar contraseña', type: 'password' },
];

function ParentComponent() {
    const [switched, setSwitched] = useState(false);
    const [showPassword, setShowPassword] = useState({});
    return (
        <div>
            <Demo switched={switched} setSwitched={setSwitched} showPassword={showPassword} setShowPassword={setShowPassword}/>
        </div>
    );
}
function Demo({ switched, setSwitched,showPassword,setShowPassword }) {

    return (
        React.createElement("div", { className: "local-container" },
            React.createElement("div", { className: cn('demo', { 's--switched': switched }) },
                React.createElement("div", { className: "demo__inner" },
                    React.createElement("div", { className: "demo__forms" },
                        React.createElement("div", { className: "demo__form" },
                            React.createElement("div", { className: "demo__form-content" },
                            React.createElement(FakeForm, { heading: "Bienvenido de nuevo", fields: fieldsData, submitLabel: "Iniciar sesión", switched: switched, showPassword, setShowPassword }))),
                        React.createElement("div", { className: "demo__form" },
                            React.createElement("div", { className: "demo__form-content" },
                            React.createElement(FakeForm, { heading: "Registro", fields: fieldsDataregister, submitLabel: "Registrarse", switched: switched, showPassword, setShowPassword }))))),
                    React.createElement("div", { className: "demo__switcher" },
                        React.createElement("div", { className: "demo__switcher-inner" },
                            React.createElement("div", { className: "demo__switcher-content" },
                                React.createElement("div", { className: "demo__switcher-text" },
                                    React.createElement("div", null,
                                        React.createElement("h3", null, "Nuevo aquí?"),
                                        React.createElement("p", null, "¡Regístrate y desbloquea un mundo lleno de nuevas oportunidades!")),
                                    React.createElement("div", null,
                                        React.createElement("h3", null, "¿Eres de nuestro grupo?"),
                                        React.createElement("p", null, "Si ya tienes una cuenta, sólo tienes que iniciar sesión. ¡Te esperamos! "))),
                                React.createElement("button", { className: "demo__switcher-btn", onClick: () => setSwitched(!switched) },
                                    React.createElement("span", { className: "animated-border" }),
                                    React.createElement("span", { className: "demo__switcher-btn-inner" },
                                        React.createElement("span", null, "Registrarse"),
                                        React.createElement("span", null, "Iniciar sesión")))))))));
}


function FakeForm({ heading, fields, submitLabel, isRegister, switched, showPassword, setShowPassword }) {
    const [valuesLogin, setValuesLogin] = React.useState({});
    const [valuesRegister, setValuesRegister] = React.useState({});
    const [errorsLogin, setErrorsLogin] = React.useState({});
    const [errorsRegister, setErrorsRegister] = React.useState({});

    const values = isRegister ? valuesRegister : valuesLogin;
    const setValues = isRegister ? setValuesRegister : setValuesLogin;
    const errors = isRegister ? errorsRegister : errorsLogin;
    const setErrors = isRegister ? setErrorsRegister : setErrorsLogin;

    const [isSubmitDisabled, setIsSubmitDisabled] = useState(true);

    const [isOverflowing, setIsOverflowing] = React.useState(false);
    const formRef = React.useRef();

    React.useEffect(() => {
        if (formRef.current.scrollHeight > formRef.current.clientHeight) {
            setIsOverflowing(true);
        } else {
            setIsOverflowing(false);
        }
    }, [values]);

    const handleChange = (id, value, type, label) => {
        setValues((prevValues) => {
            const updatedValues = { ...prevValues, [id]: value };
            return updatedValues;
        });
    };



    React.useEffect(() => {
        let newErrors = { ...errors };
        for (let id in values) {
            let value = values[id];
            let type = fields.find(field => field.id === id)?.type;
            let label = fields.find(field => field.id === id)?.label;

            if (value.trim() === '') {
                newErrors[id] = `${label} no puede estar vacío.`;
            } else if (type === 'email' && !/\S+@\S+\.\S+/.test(value)) {
                newErrors[id] = 'Correo inválido.';
            } else {
                newErrors[id] = null;
            }
            if (switched!==false && id === 'regispassword') {
                if (!values['regispassword'] || !values['regisagainpassword']) {
                    //campos de contraseña está vacío
                } else if (values['regispassword'] !== values['regisagainpassword']) {
                    newErrors['regispassword'] = 'Las contraseñas no coinciden.';
                    newErrors['regisagainpassword'] = 'Las contraseñas no coinciden.';
                }
            }
            if (id === 'regispassword') {
                if (!value) {
                    //campo de contraseña está vacío
                } else if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{4,}$/.test(value)) {
                    newErrors[id] = 'La contraseña debe tener al menos una letra mayúscula, una letra minúscula, un número y un carácter especial.';
                }
            }
            if (id === 'regispassword') {
                if (!value) {
                    // campo de contraseña está vacío
                } else if (value.length < 8) {
                    newErrors[id] = 'La contraseña debe tener al menos 8 caracteres.';
                }
            }

        setErrors(newErrors);

            // Verifica si todos los campos están llenos y si hay errores
            let allFieldsFilled = true;
            if (fieldsData.some(field => field.id === id)) {
                allFieldsFilled = fieldsData.every(field => values[field.id] !== '' && values[field.id] !== undefined);
            } else if (fieldsDataregister.some(field => field.id === id)) {
                allFieldsFilled = fieldsDataregister.every(field => values[field.id] !== '' && values[field.id] !== undefined);
            }
            const hasErrors = Object.values(newErrors).some(error => error !== null);

            // Habilita el botón de envío solo si todos los campos están llenos y no hay errores
            setIsSubmitDisabled(!(allFieldsFilled && !hasErrors));
        }
    }, [values, switched]);



    async function handleSubmit(e) {
        e.preventDefault();
        const url = switched ? registerUrl : loginUrl;
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(values)
            });

            // Obtén el modal y el texto de alerta
            var modal = document.getElementById("myalertdialogerror");
            var alertText = modal.querySelector(".alertText");
            var alertDiv = modal.querySelector(".alert");

            const data = await response.json();

            if (!response.ok) {
               
                // texto de alerta con el mensaje de error
                alertText.textContent = `Error ${response.status}: ${data.error}`;
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

            } else {

                // texto de alerta con el mensaje
                alertText.textContent = data.message;
                // div de alerta con la clase 'success'
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
            }
        } catch (error) {

            // texto de alerta con el mensaje de error
            alertText.textContent = `Hubo un error al enviar el formulario: ${error.message}`;
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
    }






    return (
        React.createElement("form", {
            className: `form ${isOverflowing ? 'form--overflowing' : ''}`,
            onSubmit: (e) => handleSubmit(e,switched),
            ref: formRef
        },
            React.createElement("div", { className: "form__heading" }, heading),
            fields.map((field, index) => {
                const id = field.id;
                return (
                    React.createElement("label", { className: "form__field", key: id },
                        React.createElement("span", { className: "form__field-label" }, field.label),
                        React.createElement("div", { style: { display: 'flex', alignItems: 'center' } },
                            React.createElement("input", {
                                className: "form__field-input",
                                type: field.type === 'password' && showPassword[id] ? 'text' : field.type,
                                value: values[id] || '',
                                onChange: (e) => handleChange(id, e.target.value, field.type,field.label ),
                                id: `${id}-${index}`
                            }),
                            field.type === 'password' && (
                                React.createElement("button", {
                                    type: "button",
                                    onClick: () => setShowPassword({ ...showPassword, [id]: !showPassword[id] })
                                },
                                <FontAwesomeIcon icon={showPassword[id] ? faEyeSlash : faEye} size="lg" color="#808080" />






                                )
                            )
                        ),
                        errors[id] && React.createElement("div", { className: "form__error" }, errors[id])
                    )
                );
            }),
            React.createElement("button", {
                type: "submit",
                className: `form__submit ${isSubmitDisabled ? 'form__submit--disabled' : ''}`,
                disabled: isSubmitDisabled
            }, submitLabel)
        )
    );


    }




ReactDOM.render(React.createElement(ParentComponent, null), document.querySelector('#demo'));



