function texto()//validacion de la caja de texto del nombre o apellido
{
    if((event.keyCode < 97 || event.keyCode > 122) && (event.keyCode < 65 || event.keyCode > 90) && (event.keyCode < 192 || event.keyCode > 255) && event.keyCode != 32)
    event.returnValue = false;
	
}


function numeros()//validacion caracteres numericos
{
    if((event.keyCode < 46 || event.keyCode > 57))
    event.returnValue = false;

}

function telefono()//validacion caracteres numericos
{
    if((event.keyCode < 46 || event.keyCode > 57) && (event.keyCode < 40 || event.keyCode > 41)  && event.keyCode != 43 && event.keyCode != 45)
    event.returnValue = false;

}