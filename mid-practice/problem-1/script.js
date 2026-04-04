function validateForm() {
  let firstName = document.getElementById("firstName").value;
  let lastName = document.getElementById("lastName").value;

  if (firstName === "") {
    alert("First Name cannot be empty.");
    return false;
  }

  if (lastName === "") {
    alert("Last Name cannot be empty.");
    return false;
  }

  if (firstName.length < 2) {
    alert("First Name must be at least 2 characters.");
    return false;
  }

  if (lastName.length < 2) {
    alert("Last Name must be at least 2 characters.");
    return false;
  }

  alert("Form submitted successfully!");
  return true;
}
