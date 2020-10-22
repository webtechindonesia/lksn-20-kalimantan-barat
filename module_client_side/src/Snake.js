class Snake {
  constructor(prop) {
    this.x = prop.x;
    this.y = prop.x;

    console.log(this.x, this.y);

    this.snakeSize = width;

    this.body = [];

    this.length = 6;

    this.update();

    this.speed = 4;
  }

  draw() {
    this.body.forEach((b, idx) => {
      ctx.beginPath();
      ctx.rect(b.x, b.y, this.snakeSize, this.snakeSize);
      ctx.fillStyle = "darkorange";
      ctx.fill();
      ctx.closePath();
    });
  }

  update() {
    for (let len = 0; len < this.length; len++) {
      this.body.push({
        x: (len + this.x) * this.snakeSize,
        y: this.y * this.snakeSize,
      });
    }

    console.log(this.body);

    this.draw();
  }
}
