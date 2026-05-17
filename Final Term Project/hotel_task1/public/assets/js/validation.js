function setText(id, text) {
    document.getElementById(id).innerHTML = text;
}

function validateRegisterForm() {
    let ok = true;
    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value;
    let phone = document.getElementById("phone").value.trim();
    let nationality = document.getElementById("nationality").value.trim();
    setText("nameError", ""); setText("emailError", ""); setText("passwordError", ""); setText("phoneError", ""); setText("nationalityError", "");
    if (name === "") { setText("nameError", "Name is required"); ok = false; }
    if (email === "") { setText("emailError", "Email is required"); ok = false; }
    if (password.length < 6) { setText("passwordError", "Password must be at least 6 characters"); ok = false; }
    if (phone === "") { setText("phoneError", "Phone is required"); ok = false; }
    if (nationality === "") { setText("nationalityError", "Nationality is required"); ok = false; }
    return ok;
}

function validateLoginForm() {
    let ok = true;
    let email = document.getElementById("loginEmail").value.trim();
    let password = document.getElementById("loginPassword").value;
    setText("loginEmailError", ""); setText("loginPasswordError", "");
    if (email === "") { setText("loginEmailError", "Email is required"); ok = false; }
    if (password === "") { setText("loginPasswordError", "Password is required"); ok = false; }
    return ok;
}

function validateProfileForm() {
    let ok = true;
    let name = document.getElementById("profileName").value.trim();
    let email = document.getElementById("profileEmail").value.trim();
    let phone = document.getElementById("profilePhone").value.trim();
    let nationality = document.getElementById("profileNationality").value.trim();
    setText("profileNameError", ""); setText("profileEmailError", ""); setText("profilePhoneError", ""); setText("profileNationalityError", "");
    if (name === "") { setText("profileNameError", "Name is required"); ok = false; }
    if (email === "") { setText("profileEmailError", "Email is required"); ok = false; }
    if (phone === "") { setText("profilePhoneError", "Phone is required"); ok = false; }
    if (nationality === "") { setText("profileNationalityError", "Nationality is required"); ok = false; }
    return ok;
}
