document.addEventListener("DOMContentLoaded", function () {
  const button = document.getElementById("changeBgBtn");

  button.addEventListener("click", function () {
    const red = Math.floor(Math.random() * 256);
    const green = Math.floor(Math.random() * 256);
    const blue = Math.floor(Math.random() * 256);

    const randomColor = "rgb(" + red + ", " + green + ", " + blue + ")";

    document.body.style.backgroundColor = randomColor;
  });
});
