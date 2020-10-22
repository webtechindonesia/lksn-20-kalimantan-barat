const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");
const w = canvas.width;
const h = canvas.height;

const startBtn = document.querySelector(".btn-start");
const inputName = document.querySelector(".form-group input");
const instructions = document.querySelector(".instructions");

let playerName = "";

const scoreDiv = document.querySelector(".score div");
const timeDiv = document.querySelector(".time div");

const tempR = document.querySelector("#tempR");
const rewindBtn = document.querySelector("#rewind");
const cancelBtn = document.querySelector("#cancel");
const rewindContainer = document.querySelector("#rewind-container");

const range = document.querySelector("#range");

const ver = 48;
const hor = 30;

let width = w / ver;
let height = h / hor;

let time = 0;
let interval = 100;

let gameInterval;

window.onload = init();

// initialization function
function init() {
  game = new Game();

  update();
}

// update the game per frame
function update() {
  ctx.clearRect(0, 0, w, h);

  game.drawBg();
  game.update();

  time = 0;
}

// game interval per 100 miliseconds
gameInterval = setInterval(update, 100);

// update timer
setInterval(() => {
  game.time++;

  let hour = Math.floor(game.time / 3600);
  let minute = Math.floor((game.time - hour * 3600) / 60);
  let second = game.time - (hour * 3600 + minute * 60);

  timeDiv.innerHTML = `${pad(hour)}:${pad(minute)}:${pad(second)}`;
}, 1000);

// utility function to pad zero at the begining of the time
function pad(val) {
  let value = val.toString();
  if (value.length < 2) return `0${value}`;
  return value;
}

// let saveGame;
// let data = {};
// let counter = 0;
// saveGame = setInterval(() => {
//   counter = (counter % 5) + 1;
//   data[counter] = Object.assign(
//     Object.create(Object.getPrototypeOf(game)),
//     game
//   );
// }, 1000);

range.addEventListener("change", (e) => {
  // let val = e.target.value;
  // console.log(data);
  // game = data[val];
  // console.log(data[val]);
  // game.update();
});
