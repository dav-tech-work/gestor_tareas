// Capturar el objeto formulario
const formLogin = document.forms['formLogin'] || 'No';

if (formLogin != 'No') {
    formLogin.addEventListener('submit', (event) => {
    event.preventDefault();
    document.getElementById("errorUsuario").textContent = "";
    document.getElementById("errorPassword").textContent = "";


    let nombre = formLogin['nombre'].value.trim()
    // Pendiente: Corregir el nombre
    let password = formLogin['password'].value.trim()

    const mensajeError = "Contenido requerido";
    if (nombre === "" && password === "") {
    document.getElementById("errorUsuario").textContent = mensajeError;
    document.getElementById("errorPassword").textContent = mensajeError;
    return;
  }
  if (nombre === "") {
    document.getElementById("errorUsuario").textContent = mensajeError;
    return;
  }
  if (password === "") {
    document.getElementById("errorPassword").textContent = mensajeError;
    return;
  }

// Comprobación por REGEX
// Enviar datos a acceso.php
  const datos = new URLSearchParams();
  datos.append("nombre", nombre);
  datos.append("password", password);

  fetch("control/login.php", {  // Corregido para funcionar desde la raíz
    "method": "POST",
    "body": datos.toString(),
    "headers": {
        "Content-type":"application/x-www-form-urlencoded"
    }
  })
  .then(respuesta => respuesta.text())
  .then(data => {
    console.log("Respuesta del servidor:", data);

    if (data == "UsuarioInexistente" || data == 'PasswordIncorrecto') {
        document.getElementById('errorPassword').textContent = "Usuario o contraseña incorrectos";
        return;
    }

    console.log("Redirigiendo a tareas.php...");
    window.location.href = "models/tareas.php";  // Corregido para la navegación desde la raíz
  }).catch(error => {
    console.error("Error en la petición:", error);
  });
});
}

// Capturar el objeto formulario
const formNewUser = document.forms['formNewUser'] || 'No';

if (formNewUser != 'No') {
  formNewUser.addEventListener('submit', (event) => {
    event.preventDefault();
    document.getElementById("errorUsuario").textContent = "";
    document.getElementById("errorPassword").textContent = "";
    document.getElementById("errorEmail").textContent = "";

    let nombre = formNewUser['nombre'].value.trim()
    // Pendiente: Corregir el nombre
    let password = formNewUser['password'].value.trim()
    let password2 = formNewUser['password2'].value.trim()
    let idioma = formNewUser['idioma'].value
    let email = formNewUser['email'].value.trim()

    // console.log(nombre, password, password2, idioma, email);

    const mensajeError = "Contenido requerido";
    if (nombre === "" && password === "" && password2 === "" && email === "") {
    document.getElementById("errorUsuario").textContent = mensajeError;
    document.getElementById("errorPassword").textContent = mensajeError;
    document.getElementById("errorEmail").textContent = mensajeError;
    return;
  }
  if (nombre === "") {
    document.getElementById("errorUsuario").textContent = mensajeError;
    return;
  }
  if (password === "" || password2 === "") {
    document.getElementById("errorPassword").textContent = mensajeError;
    return;
  }
    if (email === "") {
    document.getElementById("errorEmail").textContent = mensajeError;
    return;
  }

  // Si las dos contraseñas no coinciden
if (password !== password2) {
    document.getElementById("errorPassword").textContent = "Las contraseñas no coinciden";
    return;
}

// Comprobación por REGEX

// Enviar datos a acceso.php
  const datos = new URLSearchParams();
  datos.append("nombre", nombre);
  datos.append("password", password);
  datos.append("password2", password2);
  datos.append("email", email);
  datos.append("idioma", idioma);

  fetch("control/acceso.php", {  // Corregido para funcionar desde la raíz
    "method": "POST",
    "body": datos.toString(),
    "headers": {
        "Content-type":"application/x-www-form-urlencoded"
    }
  })
  .then(respuesta => respuesta.text())
  .then(data => {
    console.log("Respuesta del servidor:", data);
    // alert(`Usuario ${nombre} creado correctamente`)
    window.location.href = "index.php";  // Corregido para la navegación desde la raíz
  }).catch(error => {
    console.error("Error en la petición:", error);
  });
});
}
