class Game {
  constructor() {
    this.time = 0;
    this.score = 0;

    this.snake;

    this.board = [];

    this.foods = [];

    this.dir = "";

    this.init();
    this.listener();
  }

  init() {
    this.drawBg();
    this.generate();
  }
  random(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
  }
  generate() {
    this.snake = new Snake({
      x: w / 2 - 4 * width,
      y: h / 2 - 1 * width,
    });

    for (let i = 0; i < 3; i++) {
      this.foods.push(
        new Food({
          x: this.random(0, ver) * width,
          y: this.random(0, hor) * width,
        })
      );
    }
  }
  drawBg() {
    let color;
    for (let i = 0; i < 48; i++) {
      for (let j = 0; j < 30; j++) {
        ctx.beginPath();
        ctx.rect(i * height, j * width, width, height);
        if ((i % 2 == 0 && j % 2 == 1) || (i % 2 == 1 && j % 2 == 0)) {
          color = "#0b3058";
        } else {
          color = "#081727";
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
      if (e.keyCode == 38 && this.dir !== "down") {
        this.dir = "up";
        game.snake.update({ dx: 0, dy: -width });
      } else if (e.keyCode == 40 && this.dir !== "up") {
        this.dir = "down";
        game.snake.update({ dx: 0, dy: width });
      } else if (e.keyCode == 37 && this.dir !== "right") {
        this.dir = "left";
        game.snake.update({ dx: -width, dy: 0 });
      } else if (e.keyCode == 39 && this.dir !== "left") {
        this.dir = "right";
        game.snake.update({ dx: width, dy: 0 });
      }
    });
  }

  start() {
    instructions.classList.remove("visible");
    // this.drawBg();
  }

  update() {
    this.snake.update({ dx: width, dy: 0 });

    this.foods.forEach((food) => {
      food.draw();
    });
  }
}
