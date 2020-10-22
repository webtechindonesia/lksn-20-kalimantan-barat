class Food {
  constructor(prop) {
    this.x = prop.x;
    this.y = prop.y;

    this.size = width;
  }
  //   draw the food
  draw() {
    ctx.beginPath();
    ctx.rect(this.x, this.y, this.size, this.size);
    ctx.fillStyle = "#ff6161";
    ctx.fill();
    ctx.closePath();
  }
}
