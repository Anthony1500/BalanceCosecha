import React, { useState } from 'https://esm.sh/react@18.2.0';
import cn from "https://cdn.skypack.dev/classnames@2.3.2";
import ReactDOM from 'https://esm.sh/react-dom@18.2.0';
function Demo() {
    const [switched, setSwitched] = useState(false);
    return (React.createElement("div", { className: "local-container" },
        React.createElement("div", { className: cn('demo', { 's--switched': switched }) },
            React.createElement("div", { className: "demo__inner" },
                React.createElement("div", { className: "demo__forms" },
                    React.createElement("div", { className: "demo__form" },
                        React.createElement("div", { className: "demo__form-content" },
                            React.createElement(FakeForm, { heading: "Bienvenido de nuevo", fields: ['Correo', 'Contraseña'], submitLabel: "Iniciar sesión" }))),
                    React.createElement("div", { className: "demo__form" },
                        React.createElement("div", { className: "demo__form-content" },
                            React.createElement(FakeForm, { heading: "Registro", fields: ['Nombre', 'Correo', 'Contraseña'], submitLabel: "Registrarse" })))),
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
                                    React.createElement("span", null, "Iniciar sesión"))))))))));
}
function FakeForm({ heading, fields, submitLabel }) {
    const [values, setValues] = React.useState({});
    const [errors, setErrors] = React.useState({});
    const [isOverflowing, setIsOverflowing] = React.useState(false);
    const formRef = React.useRef();

    React.useEffect(() => {
        if (formRef.current.scrollHeight > formRef.current.clientHeight) {
            setIsOverflowing(true);
        } else {
            setIsOverflowing(false);
        }
    }, [values]);

    const handleChange = (field, value) => {
        setValues({ ...values, [field]: value });
        if (value.trim() === '') {
            setErrors({ ...errors, [field]: `${field} no puede estar vacío.` });
        } else if (field === 'Correo' && !/\S+@\S+\.\S+/.test(value)) {
            setErrors({ ...errors, [field]: 'Correo inválido.' });
        } else {
            setErrors({ ...errors, [field]: null });
        }
    };

    return (
        React.createElement("form", { 
            className: `form ${isOverflowing ? 'form--overflowing' : ''}`, 
            onSubmit: (e) => e.preventDefault(), 
            ref: formRef 
        },
            React.createElement("div", { className: "form__heading" }, heading),
            fields.map((field) => (
                React.createElement("label", { className: "form__field", key: field },
                    React.createElement("span", { className: "form__field-label" }, field),
                    React.createElement("input", {
                        className: "form__field-input",
                        type: field === 'Correo' || field === 'Contraseña' ? 'text' : field.toLowerCase(),
                        value: values[field] || '',
                        onChange: (e) => handleChange(field, e.target.value)
                    }),
                    errors[field] && React.createElement("div", { className: "form__error" }, errors[field])
                )
            )),
            React.createElement("button", { type: "submit", className: "form__submit" }, submitLabel)
        )
    );
}




ReactDOM.render(React.createElement(Demo, null), document.querySelector('#demo'));


