
function totalPreciRace($insurerPrice,$racePrice){
    console.log($insurerPrice);
    console.log($racePrice);
}

function registerByDni(){
    var insurerPrice = document.getElementById("insurer_cif").value.split(',')[1];
    var racePrice = document.getElementById('race_price').value;
    var totalPrice = parseInt(insurerPrice)+parseInt(racePrice);
    document.getElementById('amount').value = totalPrice;
    return false;
}

function federationOff(){
    document.querySelector("#num_federation").disabled = true;
    //document.querySelector("#insurer_cif").disabled =false;

    document.querySelector("#multiCollapseExample2 > div > form > div:nth-child(8)").style.display = 'none';
    document.querySelector("#multiCollapseExample2 > div > form > h4:nth-child(9)").style.display = 'block';
    document.querySelector("#multiCollapseExample2 > div > form > div:nth-child(10)").style.display = 'block';
}

function federationOn(){
    document.querySelector("#num_federation").disabled = false;
    //document.querySelector("#insurer_cif").disabled =true;

    document.querySelector("#multiCollapseExample2 > div > form > div:nth-child(8)").style.display = 'block';
    document.querySelector("#multiCollapseExample2 > div > form > h4:nth-child(9)").style.display = 'none';
    document.querySelector("#multiCollapseExample2 > div > form > div:nth-child(10)").style.display = 'none';
}