// Wait for DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    const ageInput = document.getElementById("age");
    const messageDiv = document.getElementById("message");

    // Add 'input' event listener (fires on every keystroke, paste, etc.)
    ageInput.addEventListener("input", function() {
        let age = parseInt(ageInput.value);  // Convert input value to integer

        // Check if input is empty or not a valid number
        if (ageInput.value === "" || isNaN(age)) {
            messageDiv.innerHTML = "";        // Clear message
            messageDiv.className = "message"; // Reset class
            return;
        }

        // Apply conditions
        if (age < 40) {
            messageDiv.innerHTML = "To be a part of the community, you need to be at least 40.";
            messageDiv.className = "message";  // normal styling
        } 
        else if (age >= 40 && age <= 50) {
            messageDiv.innerHTML = "You are the youngsters of this community.";
            messageDiv.className = "message";
        } 
        else { // age > 50
            messageDiv.innerHTML = "Top level members of the group";
            messageDiv.className = "message red-text";  // apply red color
        }
    });
});