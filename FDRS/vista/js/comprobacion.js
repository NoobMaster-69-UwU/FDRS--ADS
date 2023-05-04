function comprobacion(){
    var titulo = document.getElementById('titulo').value;
    var cont = document.getElementById('cont').value;

    if(titulo == ""){
        swal("Error...Título vacío","","warning");
        return false;
    }else{
        if(cont == ""){
            swal("Error...Mensaje vacío","","warning");
            return false;
        }else{
            return true;
        }
    }
}