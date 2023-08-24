function show() {
  datos = "";
  datos += "nombre: " + document.getElementById("nombre").value + "\n";
  datos += "edad: " + document.getElementById("edad").value + "\n";
  if (document.getElementById("dama").checked) {
    datos += "femenino\n";
  } else {
    datos += "masculino\n";
  }
  datos += "fecha: " + document.getElementById("fecha").value;

  alert(datos);
}
