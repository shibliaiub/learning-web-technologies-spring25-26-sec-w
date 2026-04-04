// Wait for DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // Get the button element
    const button = document.getElementById("changeBgBtn");

    // Function to generate a random RGB color
    function getRandomColor() {
        const r = Math.floor(Math.random() * 256);  // 0-255
        const g = Math.floor(Math.random() * 256);
        const b = Math.floor(Math.random() * 256);
        return `rgb(${r}, ${g}, ${b})`;
    }

    // Add click event listener to the button
    button.addEventListener("click", function() {
        const randomColor = getRandomColor();
        document.body.style.backgroundColor = randomColor;
    });
});