class Game {
  constructor() {
    this.time = 0;
    this.score = 0;

    this.snake;

    this.board = [];

    this.foods = [];

    this.dir = "";

    this.isNew = false;

    this.highScore = localStorage.getItem("phyton_score") || 0;

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

    this.generateFood();
    this.removeFood();
  }
  //   remove food when 5 second reached
  removeFood() {
    setTimeout(() => {
      if (this.foods.length > 3) {
        this.foods.shift();
      }
      this.removeFood();
    }, 5000);
  }
  //   generate random food when reached 3 seconds
  generateFood() {
    setTimeout(() => {
      if (this.foods.length < 5) {
        let done = false;
        while (!done) {
          let x = this.random(0, ver) * width;
          let y = this.random(0, hor) * width;
          if (this.inPos(x, y)) continue;
          else {
            this.foods.push(
              new Food({
                x: this.random(0, ver) * width,
                y: this.random(0, hor) * width,
              })
            );
            done = true;
          }
        }
      }
      this.generateFood();
    }, 3000);
  }
  //   check in pos
  inPos(x, y) {
    this.snake.body.forEach((b, idx) => {
      if (b.x == x && y.x == y) return true;
    });
    return false;
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
    tempR.addEventListener("click", (e) => {
      rewindContainer.classList.remove("hidden");
      tempR.classList.add("hidden");
    });

    cancelBtn.addEventListener("click", (e) => {
      rewindContainer.classList.add("hidden");
      tempR.classList.remove("hidden");
    });

    document.addEventListener("keyup", (e) => {
      if (e.keyCode == 32) {
        rewindContainer.classList.toggle("hidden");
        tempR.classList.toggle("hidden");
      }
    });

    inputName.addEventListener("keyup", (e) => {
      playerName = e.target.value;
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
    this.checkLose();

    this.snake.update();

    this.foods.forEach((food) => {
      food.draw();
    });

    this.snake.body.forEach((b, i) => {
      this.foods.forEach((f, idx) => {
        if (f.x == b.x && f.y == b.y) {
          this.snake.length++;
          this.foods.splice(idx, 1);

          this.score++;

          this.isNew = true;
          this.addLength();

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

    scoreDiv.innerHTML = game.score;
  }
  addLength() {
    let last = this.snake.body[this.snake.body.length - 1];
    if (this.isNew) {
      this.snake.body.push({
        x: last.x,
        y: last.y,
      });
    }
    this.isNew = false;
  }
  checkLose() {
    for (let i = 1; i < this.snake.body.length; i++) {
      let b = this.snake.body[i];
      if (this.snake.body[0].x == b.x && this.snake.body[0].y == b.y) {
        // console.log([this.snake.body[0].x, b.x], [this.snake.body[0].y, b.y]);
        let localScore = localStorage.getItem("phyton_score") || 0;
        if (game.score > localScore) {
          localStorage.setItem("phyton_score", game.score);
        }
        clearInterval(gameInterval);
        if (confirm(`Game Over: High Score: ${this.score}! Play again?`)) {
          location.reload();
        } else {
          location.reload();
        }
      }
    }
  }
}
