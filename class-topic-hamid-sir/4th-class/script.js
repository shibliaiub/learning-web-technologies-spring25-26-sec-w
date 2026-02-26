console.log("connected");

function collect_data() {
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  if (!email) {
    document.getElementById("emailErr").innerHTML = "Email is required";
    return false;
  }
}