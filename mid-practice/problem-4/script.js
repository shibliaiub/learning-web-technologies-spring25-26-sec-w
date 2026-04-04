// Wait for DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById("containerBox");
    const innerBox = document.getElementById("innerBox");
    const dimensionsDiv = document.getElementById("dimensions");

    // Helper: get dimensions in pixels and grid squares (1 grid square = 10px)
    function getDimensionsInfo(element, name) {
        const widthPx = element.offsetWidth;   // includes border (box-sizing: border-box)
        const heightPx = element.offsetHeight;
        const widthSquares = widthPx / 10;
        const heightSquares = heightPx / 10;
        return `${name}: ${widthPx}px × ${heightPx}px &nbsp;→&nbsp; ${widthSquares} squares wide × ${heightSquares} squares high`;
    }

    // Build and display dimensions for both boxes
    const containerInfo = getDimensionsInfo(container, "Container");
    const innerInfo = getDimensionsInfo(innerBox, "Bottom Right box");

    dimensionsDiv.innerHTML = `
        <strong>📦 Dimensions (aligned to 10px grid)</strong><br>
        ${containerInfo}<br>
        ${innerInfo}<br>
        <small style="color: gray;">* Each grid square = 10px × 10px</small>
    `;
});