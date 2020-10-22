class Game {
  constructor() {
    this.time = 0;
    this.score = 0;

    this.init();
    this.listener();
  }

  init() {}

  listener() {
    inputName.addEventListener("keyup", (e) => {
      if (e.target.value == "") startBtn.disabled = true;
      else startBtn.disabled = false;
    });

    startBtn.addEventListener("click", () => {
      this.start();
    });
  }

  start() {
    instructions.classList.remove("visible");
  }

  update() {}
}
