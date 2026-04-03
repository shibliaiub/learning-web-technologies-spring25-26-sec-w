// External JavaScript for form validation
function validateForm() {
    // Get input field values and trim whitespace
    const firstName = document.getElementById("firstName").value.trim();
    const lastName = document.getElementById("lastName").value.trim();

    // Check if first name is empty
    if (firstName === "") {
        alert("First Name cannot be empty.");
        return false;   // Prevent form submission
    }

    // Check if last name is empty
    if (lastName === "") {
        alert("Last Name cannot be empty.");
        return false;
    }

    // Check minimum length (at least 2 characters)
    if (firstName.length < 2) {
        alert("First Name must contain at least 2 characters.");
        return false;
    }

    if (lastName.length < 2) {
        alert("Last Name must contain at least 2 characters.");
        return false;
    }

    // If all validations pass
    alert("Form submitted successfully!");
    return true;   // Allow form submission
}