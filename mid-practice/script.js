// if (true) {
//   var a = 1;   // function-scoped (accessible outside if)
//   let b = 2;   // block-scoped (only inside if)
// }
// console.log(a); // 1
// console.log(b); // ReferenceError

let score = 85;
if (score >= 80) {
  console.log("A");
} else if (score >= 70) {
  console.log("B");
} else {
  console.log("C");
}
