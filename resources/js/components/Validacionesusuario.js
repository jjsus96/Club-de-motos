let nombre = document.getElementById("nombrecompleto");
let email = document.getElementById("nombrecompleto");
let password = document.getElementById("nombrecompleto");

let regnombre = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
let regemail = /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/;
let regpassword = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;

formulario.addEventListener("submit", (evt) =>{
    evt.preventDefault();
    if (validarnombre() && validaremail() && validarpassword()) {
        error.innerHTML = "Formulario Correcto";
    } else {
        error.innerHTML = "Formulario Incorrecto";
    }
});

console.log("Prueba")

function validarnombre() {

    if (!nombre.value.match(regnombre)) {
        errornombre.innerHTML = "El nombre no ha sido introducido correctamente";
        console.log("Prueba")
    }
    else {
        errornombrecom.innerHTML = "";
        return true;
        console.log("Prueba")
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

function validarpassword() {

    if (!password.value.match(regpassword)) {
        errorpassword.innerHTML = "Los carácteres ($ % & | < > # ) no están permitidos";
    }
    else {
        errorpassword.innerHTML = "";
        return true;
    }
}
