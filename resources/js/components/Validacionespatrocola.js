let nombre = document.getElementById("nombrecompleto");
let email = document.getElementById("nombrecompleto");
let telefono = document.getElementById("nombrecompleto");

let regnombre = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
let regemail = /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/;
let regtelefono = /^\d{9}$/;

formulario.addEventListener("submit", (evt) =>{
    evt.preventDefault();
    if (validarnombre() && validaremail() && validartelefono()) {
        error.innerHTML = "Formulario Correcto";
    } else {
        error.innerHTML = "Formulario Incorrecto";
    }
});

function validarnombre() {

    if (!nombre.value.match(regnombre)) {
        errornombre.innerHTML = "El nombre no ha sido introducido correctamente";
    }
    else {
        errornombrecom.innerHTML = "";
        return true;
    }
}

function validaremail() {

    if (!email.value.match(regemail)) {
        erroremail.innerHTML = "Formato de Email no reconocido";
    }
    else {
        erroremail.innerHTML = "";
        return true;
    }
}

function validartelefono() {

    if (!telefono.value.match(regtelefono)) {
        errortelefono.innerHTML = "Los carácteres ($ % & | < > # ) no están permitidos";
    }
    else {
        errortelefono.innerHTML = "";
        return true;
    }
}
