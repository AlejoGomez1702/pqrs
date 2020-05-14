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

document.getElementById("private").style.display = "none";
document.getElementById("particular").style.display = "none";
document.getElementById("public").style.display = "none";

function showOptions(option)
{
    var chec1 = document.getElementById("chec1");
    var chec2 = document.getElementById("chec2");
    var chec3 = document.getElementById("chec3");

    if(option == 1) //Si se seleccionó entidad pública.
    {
        //Deshabilito los otros checks
        chec2.checked = false; 
        chec3.checked = false; 
        document.getElementById("private").style.display = "none";
        document.getElementById("particular").style.display = "none";

        if(!chec1.checked)
        {
            document.getElementById("public").style.display = "none";
        }
        else{
            document.getElementById("public").style.display = "block";
        }        
    }
    else if(option == 2) // Si se seleccionó entidad privada.
    {        
        chec1.checked = false; 
        chec3.checked = false; 
        document.getElementById("private").style.display = "block";
        document.getElementById("particular").style.display = "none";
        document.getElementById("public").style.display = "none";

        if(!chec2.checked)
        {
            document.getElementById("private").style.display = "none";
        }
        else{
            document.getElementById("private").style.display = "block";
        }

    }
    else if(option == 3) // Si se seleccionó persona particular.
    {
        chec1.checked = false; 
        chec2.checked = false; 
        document.getElementById("private").style.display = "none"; 
        document.getElementById("public").style.display = "none";
        document.getElementById("particular").style.display = "block";

        if(!chec3.checked)
        {
            document.getElementById("particular").style.display = "none";
        }
        else{
            document.getElementById("particular").style.display = "block";
        }

    }
    
}