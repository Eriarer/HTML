function playNut() {
  var nutAudio = document.getElementById("nutAudio");
  var image = document.getElementById("nutImg");
  image.src = "Multimedia/ButtonPressed.png";
  //   si el nutAudio esta reproduciendose, se reproduce desde el inicio
  nutAudio.currentTime = 0;
  nutAudio.play();
}

function nutImage() {
  var image = document.getElementById("nutImg");
  image.src = "Multimedia/ButtonUnpressed.png";
}

function playRana() {
  var ranaAudio = document.getElementById("ranaAudio");
  var image = document.getElementById("ranaImg");
  image.src = "Multimedia/ButtonPressed.png";
  //   si el nutAudio esta reproduciendose, se reproduce desde el inicio
  ranaAudio.currentTime = 0;
  ranaAudio.play();
}

function RanaImage() {
  var image = document.getElementById("ranaImg");
  image.src = "Multimedia/ButtonUnpressed.png";
}
