function confirmar(){

    var opcion = confirm("¿Desea cerrar sesión?");
    if(opcion === true){
        return true;
    }else{
        return false;
    }
}

function confirmar2(){
    var opcion2 = confirm("¿Desea modificar los datos del usuario?");
    
    if(opcion2 === true){
        return true;
    }else{
        return false;
    }
}

function confirmar3(){
    var opcion3 = confirm("¿Desea eliminar el usuario?");
    
    if(opcion3 === true){
        return true;
    }else{
        return false;
    }
}