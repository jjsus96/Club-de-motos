let nombre = document.getElementById("nombrecompleto");
let apellidos = document.getElementById("nombrecompleto");
let fecha = document.getElementById("nombrecompleto");
let telefono = document.getElementById("nombrecompleto");
let direccion = document.getElementById("nombrecompleto");
let padrino = document.getElementById("nombrecompleto");
let motocicleta = document.getElementById("nombrecompleto");

let regnombre = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
let regapellidos = /^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/;
let regfecha = /[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])/;
let regtelefono = /^\d{9}$/;
let regdireccion = /^[^$%&|<>#]*$/;
let regpadrino = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
let regmotocicleta = /^[^$%&|<>#]*$/;

formulario.addEventListener("submit", (evt) =>{
    evt.preventDefault();
    if (validarnombre() && validarapellidos() && validarfecha() && validartelefono() && validardireccion() && validarpadrino() && validarmotocicleta()) {
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

function validarapellidos() {

    if (!apellidos.value.match(regapellidos)) {
        errorapellidos.innerHTML = "Los carácteres ($ % & | < > # ) no están permitidos";
    }
    else {
        errorapellidos.innerHTML = "";
        return true;
    }
}

function validarfecha() {

    if (!fecha.value.match(regfecha)) {
        errorfecha.innerHTML = "Los carácteres ($ % & | < > # ) no están permitidos";
    }
    else {
        errorfecha.innerHTML = "";
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

function validardireccion() {

    if (!direccion.value.match(regdireccion)) {
        errordireccion.innerHTML = "Los carácteres ($ % & | < > # ) no están permitidos";
    }
    else {
        errordireccion.innerHTML = "";
        return true;
    }
}

function validarpadrino() {

    if (!padrino.value.match(regpadrino)) {
        errorpadrino.innerHTML = "Los carácteres ($ % & | < > # ) no están permitidos";
    }
    else {
        errorpadrino.innerHTML = "";
        return true;
    }
}

function validarmotocicleta() {

    if (!motocicleta.value.match(regmotocicleta)) {
        errormotocicleta.innerHTML = "Los carácteres ($ % & | < > # ) no están permitidos";
    }
    else {
        errormotocicleta.innerHTML = "";
        return true;
    }
}
