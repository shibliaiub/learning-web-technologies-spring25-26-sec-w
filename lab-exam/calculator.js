let display = document.getElementById("display");

function add(value){
    display.value += value;
}

document.getElementById("one").onclick = () => add("1");
document.getElementById("two").onclick = () => add("2");
document.getElementById("three").onclick = () => add("3");
document.getElementById("four").onclick = () => add("4");
document.getElementById("five").onclick = () => add("5");
document.getElementById("six").onclick = () => add("6");
document.getElementById("seven").onclick = () => add("7");
document.getElementById("eight").onclick = () => add("8");
document.getElementById("nine").onclick = () => add("9");
document.getElementById("zero").onclick = () => add("0");

document.getElementById("plus").onclick = () => add("+");
document.getElementById("minus").onclick = () => add("-");
document.getElementById("multiply").onclick = () => add("*");
document.getElementById("divide").onclick = () => add("/");

document.getElementById("equal").onclick = function(){
    try{
        display.value = eval(display.value);
    }
    catch{
        alert("Invalid Input");
    }
};

document.getElementById("clear").onclick = function(){
    display.value = "";
};

document.getElementById("back").onclick = function(){
    display.value = display.value.slice(0,-1);
};