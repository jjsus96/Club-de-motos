let nombre = document.getElementById("nombrecompleto");
let fecha = document.getElementById("nombrecompleto");
let descripcion = document.getElementById("nombrecompleto");

let regnombre = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
let regfecha = /[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])/;
let regdescripcion = /^[^$%&|<>#]*$/;

formulario.addEventListener("submit", (evt) =>{
    evt.preventDefault();
    if (validarnombre() && validarfecha() && validardescripcion()) {
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

function validarfecha() {

    if (!fecha.value.match(regfecha)) {
        errorfecha.innerHTML = "Los carácteres ($ % & | < > # ) no están permitidos";
    }
    else {
        errorfecha.innerHTML = "";
        return true;
    }
}

function validardescripcion() {

    if (!descripcion.value.match(regdescripcion)) {
        errordescripcion.innerHTML = "Los carácteres ($ % & | < > # ) no están permitidos";
    }
    else {
        errordescripcion.innerHTML = "";
        return true;
    }
}
