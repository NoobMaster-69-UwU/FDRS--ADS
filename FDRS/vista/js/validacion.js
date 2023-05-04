   
function validacion(){
    var pass1 = document.getElementById('pass1').value;
    var pass2 = document.getElementById('pass2').value;
    var nom = document.getElementById('nom').value;
    var ape = document.getElementById('ape').value;
    let exp1 = /[A-Z]/i;
    var correo = document.getElementById('correo').value;
    var exp2 = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i;
    var esValido = exp2.test(correo);
    var usu = document.getElementsByName('usu');
  
    
    //Validación de contraseñas
    if(pass1 != pass2){
        swal("Error......Las contraseñas no coinciden","","warning");
        return false;
    }else{
        if(exp1.test(nom) != true){
            swal("Error...Hay números en el nombre","","warning");
            return false;
        }else{
            if(exp1.test(ape) != true){
                swal("Error...Hay números en el apellido","","warning")
                return false;
            }else{                
                if(esValido != true){
                    swal("Error...El formato del correo no es el indicado","","warning");
                    return false;
                }else{
                    if(usu[0].checked != true && usu[1].checked != true && usu[2].checked != true){
                        swal("Error...Seleccione un tipo de usuario","","warning");
                        return false;
                    }else{
                        return true;
                    }
                }
            }
        }
    }

}





