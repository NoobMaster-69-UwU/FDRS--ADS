function verificar(){
    var email = document.getElementById('email').value;
    var pass = document.getElementById('pass').value;
    var exp = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i;
    var prueba = exp.test(email);

    if(email == "" || pass == ""){
        swal("Error...El correo o la contraseña están vacíos","","warning");
        return false;
    }else{
        if(prueba != true){
            swal("Error...El correo no cumple con el formato","","warning");
            return false;
        }else{
            return true;
        }
    }
}