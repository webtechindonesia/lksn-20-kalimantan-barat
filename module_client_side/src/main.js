const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");
const w = canvas.width;
const h = canvas.height;

const startBtn = document.querySelector(".btn-start");
const inputName = document.querySelector(".form-group input");
const instructions = document.querySelector(".instructions");

window.onload = init();

function init() {
  game = new Game();
}
