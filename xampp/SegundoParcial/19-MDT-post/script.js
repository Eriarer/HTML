const slider = document.getElementById("slider");
const sliderValue = document.getElementById("sliderValue");
var formulario = document.querySelector("form");

sliderValue.textContent = slider.value;
slider.addEventListener("input", () => {
  sliderValue.textContent = slider.value;
});

document.addEventListener("DOMContentLoaded", function () {
  var formulario = document.querySelector("form");
  // agregar un evento al formulario para que cuando se envíe se ejecute la funcion validar
  formulario.addEventListener("submit", validar);

  function validar(e) {
    var minimo = document.querySelector("#min");
    var maximo = document.querySelector("#max");
    var slider = document.querySelector("#slider");
    var min = minimo.value;
    min = parseInt(min);
    var max = maximo.value;
    max = parseInt(max);
    var slide = slider.value;
    slide = parseInt(slide);
    var dif = max - min;
    // Obtener el div existente que muestra el mensaje de error
    var mensajeErrorDiv = document.querySelector(
      ".invalid-feedback"
    );

    // Verifica si ya existe un mensaje de error y elimínalo
    if (mensajeErrorDiv) {
      mensajeErrorDiv.remove();
    }

    if (min > max) {
      e.preventDefault();

      // Crear un nuevo div para mostrar el mensaje de error
      var mensajeError = document.createElement("div");
      mensajeError.classList.add("invalid-feedback");
      mensajeError.innerHTML =
        "El valor mínimo no puede ser mayor al valor máximo";

      // Agregar el nuevo div de error después del campo "min"
      minimo.parentNode.insertBefore(
        mensajeError,
        minimo.nextSibling
      );

      // Agregar la clase "is-invalid" a los campos "min" y "max" para resaltarlos como inválidos
      minimo.classList.add("is-invalid");
      maximo.classList.add("is-invalid");
    } else if (dif < slide) {
      e.preventDefault();

      // Crear un nuevo div para mostrar el mensaje de error
      var mensajeError = document.createElement("div");
      mensajeError.classList.add("invalid-feedback");
      mensajeError.innerHTML =
        "No puede haber menos numeros que espacios del vector";

      // Agregar el nuevo div de error después del campo "minimo"
      minimo.parentNode.insertBefore(
        mensajeError,
        minimo.nextSibling
      );

      // Agregar la clase "is-invalid" a los campos "min" y "max" para resaltarlos como inválidos
      minimo.classList.add("is-invalid");
      maximo.classList.add("is-invalid");
    } else {
      // Si son válidos, agregar la clase "is-valid" a los campos
      minimo.classList.add("is-valid");
      maximo.classList.add("is-valid");
    }
  }
});
