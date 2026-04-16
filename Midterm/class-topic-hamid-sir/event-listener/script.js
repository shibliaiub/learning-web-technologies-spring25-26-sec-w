console.log("connected");

function collect_data() {
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  if (!email) {
    document.getElementById("emailErr").innerHTML = "Email is required";
  } else {
    document.getElementById("emailErr").innerHTML = "";
  }
  if (!password) {
    document.getElementById("passwordErr").innerHTML = "Password is required";
  } else {
    document.getElementById("passwordErr").innerHTML = "";
  }
  return false;
}

function getEmail() {
  const email = document.getElementById("email").value;
  console.log(email);
}

function getPassword() {
  const password = document.getElementById("password").value;
  console.log(password);
}