// Wait for the DOM to be fully loaded before attaching event listener
document.addEventListener("DOMContentLoaded", function() {
    // Get the username input element
    const usernameInput = document.getElementById("username");

    // Add 'input' event listener (triggers on every keystroke, paste, etc.)
    usernameInput.addEventListener("input", function() {
        // Convert the current value to uppercase
        this.value = this.value.toUpperCase();
    });
});