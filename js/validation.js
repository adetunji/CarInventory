/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validate(form) {

    var output = "";
    if (form["make"].value === "") {
        output += "Please enter the make.<br>";
        form["make"].style.backgroundColor = "yellow";

    }else if (form["make"].value.match(/[0-9]/)){
        output += "Invalid make entry. Cannot be a digit<br>";
        form["make"].style.backgroundColor = "yellow";
    }
    else {

        form["make"].style.backgroundColor = "white";
    }

    if (form["year"].value === "") {
        output += "Please enter the year.<br>";
        form["year"].style.backgroundColor = "yellow";
    }
    else if (form["year"].value.match(/[a-zA-Z]/)) {
        output += "Invalid year Entry.<br>"
        form["year"].style.backgroundColor = "yellow";
    }else if(form["year"].value < 2000 ){
        output += "Cannot register cars made before the year 2000.<br>"
        form["year"].style.backgroundColor = "yellow";
    } 
    else if (form["year"].value.length !== 4) {
        output += "Year must be in the format yyyy.<br>";
        form["year"].style.backgroundColor = "yellow";
    } 
    else {
        form["year"].style.backgroundColor = "white";
    }
    if (form["model"].value === "") {
        output += "Please enter Model<br>";
        form["model"].style.backgroundColor = "yellow";
    }

    else {
        form["model"].style.backgroundColor = "white";
    } if (form["mileage"].value.match(/[a-zA-Z]/)){
        output += "Invalid Mileage Entry.<br>";
        form["mileage"].style.backgroundColor = "yellow";
    }else if(form["mileage"].value === ""){
        output += "Please enter the mileage.<br>";
        form["mileage"].style.backgroundColor= "yellow";
    }
    else {
        form["mileage"].style.backgroundColor = "white";
    }if(form["price"].value.match(/[a-zA-Z]/)){
        output += "Invalid Price Entry.<br>";
        form["price"].style.backgroundColor = "yellow";
    }else if(form["price"].value === ""){
        output += "Please enter the price of the car.<br>";
        form["price"].style.backgroundColor = "yellow";
    }
    else {
        form["price"].style.backgroundColor= "white"
    }if(form["color"].value.match(/[0-9]/)){
        output += "Invalid Colour Entry.<br>";
        form["color"].style.backgroundColor="yellow";
    }else if(form["color"].value === ""){
        output += "Please enter the colour of the vehicle.<br>";
        form["color"].style.backgroundColor="yellow";
    }else {
        form["color"].style.backgroundColor="white";
    }

    document.getElementById("output").innerHTML = output;

    if (output.length === 0) {
        return true;
    } else {
        return false;
    }
}
