class Game {
  constructor() {
    this.time = 0;
    this.score = 0;

    this.snake;

    this.board = [];

    this.init();
    this.listener();
  }

  init() {
    this.drawBg();
    this.generate();
  }
  generate() {
    this.snake = new Snake({
      x: w / 2 - 4 * width,
      y: h / 2 - 1 * width,
    });
  }
  drawBg() {
    let color;
    for (let i = 0; i < 48; i++) {
      for (let j = 0; j < 30; j++) {
        ctx.beginPath();
        ctx.rect(i * height, j * width, width, height);
        if ((i % 2 == 0 && j % 2 == 1) || (i % 2 == 1 && j % 2 == 0)) {
          color = "#5d96d4";
        } else {
          color = "#1c4674";
        }
        ctx.fillStyle = color;
        ctx.fill();
        ctx.closePath();
      }
    }
  }
  listener() {
    inputName.addEventListener("keyup", (e) => {
      if (e.target.value == "") startBtn.disabled = true;
      else startBtn.disabled = false;
    });

    startBtn.addEventListener("click", () => {
      this.start();
    });

    document.addEventListener("keydown", (e) => {
      if (e.keyCode == 38) {
        game.snake.update({ dx: 0, dy: -width });
      }
    });
  }

  start() {
    instructions.classList.remove("visible");
    // this.drawBg();
  }

  update() {
    this.snake.update({ dx: width, dy: 0 });
  }
}
