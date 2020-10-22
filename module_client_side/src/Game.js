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

  //   initialize the game
  init() {
    this.drawBg();
    this.generate();

    this.dir = "right";
  }
  //   utility function get random integer based on the passed min and max value
  random(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
  }
  //   generate the snake and the food
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
  //   draw the stripped background
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
  //   listener to key WSAD key to move the snake
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

  //   start the game when the start button clicked
  start() {
    instructions.classList.remove("visible");

    // this.drawBg();
  }

  //   update the entire game canvas
  update() {
    this.snake.update();

    this.foods.forEach((food) => {
      food.draw();
    });

    this.snake.body.forEach((b, i) => {
      this.foods.forEach((f, idx) => {
        if (f.x == b.x && f.y == b.y) {
          this.snake.length++;
          this.foods.splice(idx, 1);

          // generate food again
          this.foods.push(
            new Food({
              x: this.random(0, ver) * width,
              y: this.random(0, hor) * width,
            })
          );
        }
      });
    });
  }
}
