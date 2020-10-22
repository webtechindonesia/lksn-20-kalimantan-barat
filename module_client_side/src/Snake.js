class Snake {
  constructor(prop) {
    this.x = prop.x;
    this.y = prop.y;

    console.log(this.x, this.y);

    this.snakeSize = width;

    this.head = [];

    this.body = [];

    this.length = 6;

    this.speed = 4;

    this.moverX = 0;
    this.moverY = 0;

    this.init();

    this.dx = width;
    this.dy = 0;
    // this.update();
  }

  //   generate initial snake length (6)
  init() {
    for (let len = this.length; len > 1; len--) {
      this.body.push({
        x: len * this.snakeSize + this.x + this.moverX,
        y: this.snakeSize + this.y + this.moverY,
      });
    }
    this.head = this.body[0];
  }

  //   draw the snake
  draw() {
    this.body.forEach((b, idx) => {
      ctx.beginPath();
      ctx.rect(b.x, b.y, this.snakeSize, this.snakeSize);
      ctx.fillStyle = "orange";
      ctx.strokeStyle = "darkorange";
      ctx.lineWidth = 4;
      ctx.fill();
      ctx.stroke();
      ctx.closePath();
    });
  }

  // update the snake move
  update(prop) {
    if (prop !== undefined) {
      this.dx = prop.dx;
      this.dy = prop.dy;
    }

    this.body.unshift({ x: this.head.x + this.dx, y: this.head.y + this.dy });
    this.body.pop();

    this.head = this.body[0];

    this.draw();

    this.checkBoundary();
  }

  //   check snake wall boundary
  checkBoundary() {
    if (this.head.x > w) {
      this.head.x = 0;
    } else if (this.head.x < 0) {
      this.head.x = w + width;
    }

    if (this.head.y > h) {
      this.head.y = 0;
    } else if (this.head.y < 0) {
      this.head.y = h + width;
    }
  }
}
