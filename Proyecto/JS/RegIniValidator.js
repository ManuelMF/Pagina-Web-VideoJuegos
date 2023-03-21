
document.addEventListener("DOMContentLoaded", function () {
    //mira si le llega un ini ses o reg para mirar si valida una cosa o otra ya que ejecutab funciones distintas
    if (document.getElementById("iniSes") != null) document.getElementById("iniSes").addEventListener('submit', validarInicioSesion);
    if (document.getElementById("reg") != null) document.getElementById("reg").addEventListener('submit', validarRegistro);
});

//valida inicio de sesion y se le pasa un evento 
function validarInicioSesion(e) {
    if (e instanceof Event) {
        e.preventDefault();
    }
    let validacion = true
    let email = document.getElementById("email").value
    let pass = document.getElementById("password").value

    document.getElementById("error").innerHTML = ""
    //validamos y si esta mal pintamos los errores podemos pintar varios en la misma id ya que lo sumamos
    if (!validarEmail(email)) {
        validacion = false
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("error").innerHTML = "Email incorrecto"
    } else {
        document.getElementById("email").style.borderColor = "black";
    }

    if (!validarContra(pass)) {
        validacion = false
        document.getElementById("password").style.borderColor = "red";
        if (document.getElementById("error").textContent == "") document.getElementById("error").innerHTML = 'Contraseña incorrecta "Debes poner 1 mayuscula, letras y números"'
        else document.getElementById("error").innerHTML += '<br>Contraseña incorrecta "Debes poner 1 mayuscula, letras y números"'
    } else {
        document.getElementById("password").style.borderColor = "black";
    }

    if (validacion) document.getElementById("iniSes").submit();
}
//valida Registro y se le pasa un evento 
function validarRegistro(e) {
    if (e instanceof Event) {
        e.preventDefault();
    }
    let validacion = true
    let nombre = document.getElementById("nombre").value
    let email = document.getElementById("email").value
    let pass = document.getElementById("password").value

    document.getElementById("error").innerHTML = ""
    //validamos y si esta mal pintamos los errores podemos pintar varios en la misma id ya que lo sumamos
    if (!validarNombreCompleto(nombre)) {
        validacion = false
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("error").innerHTML = 'Nombre incorrecto "Debes de poner Nombre Apellido1 Apellido2"'
    } else {
        document.getElementById("nombre").style.borderColor = "black";
    }

    if (!validarEmail(email)) {
        validacion = false
        document.getElementById("email").style.borderColor = "red";
        if (document.getElementById("error").textContent == "") document.getElementById("error").innerHTML = "Email incorrecto"
        else document.getElementById("error").innerHTML += "<br>Email incorrecto"
    } else {
        document.getElementById("email").style.borderColor = "black";
    }

    if (!validarContra(pass)) {
        validacion = false
        document.getElementById("password").style.borderColor = "red";
        if (document.getElementById("error").textContent == "") document.getElementById("error").innerHTML = 'Contraseña incorrecta "Debes poner 1 mayuscula, letras y números"'
        else document.getElementById("error").innerHTML += '<br>Contraseña incorrecta "Debes poner 1 mayuscula, letras y números"'
    } else {
        document.getElementById("password").style.borderColor = "black";
    }

    if (validacion) document.getElementById("reg").submit();
}

//valida en base a una expresion regular
function validarEmail(email) {
    // Expresión regular para validar correos electrónicos
    const ex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (ex.test(email)) {
        return true; // El correo es válido
    } else {
        return false; // El correo no es válido
    }
}
//valida en base a una expresion regular
function validarContra(pass) {
    // Expresión regular para validar contraseñas
    const ex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

    if (ex.test(pass)) {
        return true; // La contraseña es válida
    } else {
        return false; // La contraseña no es válida
    }
}
//valida en base a una expresion regular
function validarNombreCompleto(nombre) {
    // Expresión regular para validar nombres y apellidos
    const ex = /^[A-Za-záéíóúÁÉÍÓÚñÑ]+\s([A-Za-záéíóúÁÉÍÓÚñÑ]+\s)?[A-Za-záéíóúÁÉÍÓÚñÑ]+$/;

    if (ex.test(nombre)) {
        return true;
    } else {
        return false;
    }
}