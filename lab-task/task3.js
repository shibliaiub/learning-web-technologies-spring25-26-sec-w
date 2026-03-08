console.log("connected");

let wrongCount = 0;

function collect_data(){

  let email = document.getElementById("email").value;
  let password= document.getElementById("password").value;

  let valid = true;


  if (!email){
    document.getElementById("emailErr").innerHTML = "Email is required";
    valid = false;
  }
  else if (email.includes("@"))
  {
    document.getElementById("emailErr").innerHTML = "Email Must Contain @";
    valid = false;
  }
  
  else {
    document.getElementById("emailErr").innerHTML= "";
  }

  if (!password){
  document.getElementById("passwordErr").innerHTML = "password is required";
  valid = false;

  }

  else if (!password.length <6){
    document.getElementById("passwordErr").innerHTML = "Password must be at least 6 char";
  }
  else if (!password.includes("#")){
    document.getElementById("passwordErr").innerHTML = "Password must contain #";
   valid = false; 
  }
  else{
    document.getElementById("passwordErr").innerHTML = "";
  }
   if (!valid) {
    wrongCount++;
    document.getElementById("count").innerHTML =
      "Wrong submission: " + wrongCount;
  }

  return valid;
}
function getEmail() {
  const email = document.getElementById("email").value;
  console.log(email);
}

function getPassword() {
  const password = document.getElementById("password").value;
  console.log(password);
}

