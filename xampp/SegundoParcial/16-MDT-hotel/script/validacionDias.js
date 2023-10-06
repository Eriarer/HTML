var formulario = document.querySelector("form");

/*
 <input
                  type="number"
                  class="form-control form-control-lg"
                  placeholder="Días de estancia"
                  aria-label="días de estancia"
                  name="dias"
                  id="diasEstancia"
                  required
                />
*/

document.addEventListener("DOMContentLoaded", function () {
  var formulario = document.querySelector("form");
  // agregar un evento al formulario para que cuando se envíe se ejecute la funcion validar
  formulario.addEventListener("submit", validar);

  function validar(e) {
    var dias = document.querySelector("#diasEstancia");
    var diasValue = dias.value;
    var mensajeError = document.querySelector(".invalid-feedback");

    // Verifica si ya existe un mensaje de error y elimínalo
    if (mensajeError) {
      mensajeError.remove();
    }

    if (diasValue < 1 || diasValue > 30) {
      e.preventDefault();
      dias.classList.add("is-invalid");
      var div = document.createElement("div");
      div.classList.add("invalid-feedback");
      div.innerHTML = "Los días de estancia deben estar entre 1 y 30";
      dias.parentNode.appendChild(div);
    } else {
      dias.classList.add("is-valid");
    }
  }
});
