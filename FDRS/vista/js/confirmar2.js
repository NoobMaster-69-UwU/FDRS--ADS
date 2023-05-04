function confirmar(){
    var T = document.getElementById('T').value;
    var RM = document.getElementById('RM').value;
    var op1 = confirm("¿Desea enviar su mensaje?");
    var tipo = document.getElementsByName('tipo');
    var area = document.getElementsByName('area');


    if(T == ""){
        swal("Error...El título está vacío","","warning");
        return false;
    }else{
        if(RM == ""){
            swal("Error...El mensaje está vacío","","warning");
            return false;
        }else{
            if(tipo[0].checked != true && tipo[1].checked != true && tipo[2].checked != true && tipo[3].checked != true || area[0].checked != true && area[1].checked != true && area[2].checked != true && area[3].checked != true && area[4].checked != true && area[5].checked != true && area[6].checked != true){
                swal("Error...Seleccione un área o un tipo de mensaje","","warning");
                return false;
            }else{
                if(op1 != true){
                    return false;
                }else{
                    return true;
                } 
            }

        }
    }
}