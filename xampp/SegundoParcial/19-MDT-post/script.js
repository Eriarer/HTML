const slider = document.getElementById("slider");
const sliderValue = document.getElementById("sliderValue");

sliderValue.textContent = slider.value;
slider.addEventListener("input", () => {
  sliderValue.textContent = slider.value;
});
