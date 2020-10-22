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
    // this.update();
  }

  init() {
    for (let len = 0; len < this.length; len++) {
      this.body.push({
        x: len * this.snakeSize + this.x + this.moverX,
        y: this.snakeSize + this.y + this.moverY,
      });
    }
    this.head = this.body[0];
  }

  draw() {
    this.body.forEach((b, idx) => {
      ctx.beginPath();
      ctx.rect(b.x, b.y, this.snakeSize, this.snakeSize);
      ctx.fillStyle = "orange";
      ctx.strokeStyle = "darkorange";
      ctx.fill();
      ctx.stroke();
      ctx.closePath();
    });
  }

  update({ dx, dy }) {
    // console.log({ dx, dy });

    this.body.unshift({ x: this.head.x + dx, y: this.head.y + dy });
    this.draw();
  }
}
