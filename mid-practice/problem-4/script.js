window.onload = function () {
  const containerBox = document.getElementById("containerBox");
  const innerBox = document.getElementById("innerBox");
  const dimensions = document.getElementById("dimensions");

  const containerWidth = containerBox.offsetWidth;
  const containerHeight = containerBox.offsetHeight;
  const innerWidth = innerBox.offsetWidth;
  const innerHeight = innerBox.offsetHeight;

  const containerGridWidth = containerWidth / 10;
  const containerGridHeight = containerHeight / 10;
  const innerGridWidth = innerWidth / 10;
  const innerGridHeight = innerHeight / 10;

  const line1 = "<strong>Dimensions:</strong>";
  const line2 =
    "Container box: " + containerWidth + "px x " + containerHeight + "px";
  const line3 =
    containerGridWidth + " squares wide x " + containerGridHeight + " squares high";
  const line4 =
    "Bottom Right box: " + innerWidth + "px x " + innerHeight + "px";
  const line5 =
    innerGridWidth + " squares wide x " + innerGridHeight + " squares high";

  dimensions.innerHTML =
    line1 + "<br>" +
    line2 + "<br>" +
    line3 + "<br>" +
    line4 + "<br>" +
    line5;
};
