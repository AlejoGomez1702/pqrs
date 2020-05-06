// var publicEntity = document.getElementById("pu");
// publicEntity.disable = false;
// var privateEntity = document.getElementById("pr");
// privateEntity.disable = true;
// var particular = document.getElementById("pa");
// particular.disable = true;

// console.log("Siii se esta llamando");

function enableSection() 
{
    var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

    switch (selectedValue) 
    {
        case "1":
            document.getElementById("pr").style.display = "none";
            document.getElementById("pa").style.display = "none";
            document.getElementById("pu").style.display = "block";
            break;

        case "2":
            document.getElementById("pr").style.display = "block";
            document.getElementById("pa").style.display = "none";
            document.getElementById("pu").style.display = "none";
            break;

        case "3":
            document.getElementById("pr").style.display = "none"; 
            document.getElementById("pu").style.display = "none";
            document.getElementById("pa").style.display = "block";
            break;
    
        default:
            break;
    }

    

    //alert(selectedValue);
}