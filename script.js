function verificarCargo(){

let cliente = document.getElementById("cliente");
let adm = document.getElementById("adm");

if(cliente.checked){

    window.location.href = "user.php";

}

else if(adm.checked){

    window.location.href = "adm.php";

}

else{

    alert("Selecione um cargo!");

}

}

