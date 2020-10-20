const red = document.querySelector("#red");
const green = document.querySelector("#green");
const blue = document.querySelector("#blue");

const bg = document.querySelector(".bg");

function colorsChange() {
  bg.style.backgroundColor = `rgb(${red.value}, ${green.value}, ${blue.value})`;
  bg.innerHTML = `rgb(${red.value}, ${green.value}, ${blue.value})`;
}
