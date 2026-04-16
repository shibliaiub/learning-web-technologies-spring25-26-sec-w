if (true) {
  var a = 1;   // function-scoped (accessible outside if)
  let b = 2;   // block-scoped (only inside if)
}
console.log(a); // 1
console.log(b); // ReferenceError

