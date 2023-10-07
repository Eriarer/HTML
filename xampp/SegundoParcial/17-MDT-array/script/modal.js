// Función para mostrar el modal
function mostrarModal() {
  var modal = document.getElementById("modal");
  modal.style.display = "block";
}

// Función para cerrar el modal
function cerrarModal() {
  var modal = document.getElementById("modal");
  modal.style.display = "none";
}

// Función para regresar al menú principal
function regresarAlMenu() {
  window.location.href = "../index.html";
}

// Función para validar el formulario
function validarFormulario() {
  var multBaseInput = document.querySelector(
    'input[name="multBase"]'
  );
  var multLimInput = document.querySelector(
    'input[name="multLim"]'
  );

  // Validar aquí los campos del formulario según tus criterios
  if (
    multBaseInput.value.trim() === "" ||
    multLimInput.value.trim() === ""
  ) {
    return;
  }

  // Si el formulario es válido, mostrar el modal
  mostrarModal();
}

document.addEventListener("DOMContentLoaded", function () {
  var formulario = document.querySelector("form");
  // agregar un evento al formulario para que cuando se envíe se ejecute la funcion validar
  formulario.addEventListener("submit", validar);

  function validar(e) {
    var dias = document.querySelector("#diasEstancia");
    var diasValue = dias.value;
    var mensajeError = document.querySelector(
      ".invalid-feedback"
    );

    // Verifica si ya existe un mensaje de error y elimínalo
    if (mensajeError) {
      mensajeError.remove();
    }

    if (diasValue < 1 || diasValue > 30) {
      e.preventDefault();
      dias.classList.add("is-invalid");
      var div = document.createElement("div");
      div.classList.add("invalid-feedback");
      div.innerHTML =
        "Los días de estancia deben estar entre 1 y 30";
      dias.parentNode.appendChild(div);
    } else {
      dias.classList.add("is-valid");
    }
  }
});
