function nuevoAjax()
{ 
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
	var xmlhttp=false; 
	try 
	{ 
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
	}
	catch(e)
	{ 
		try
		{ 
			// Creacion del objeto AJAX para IE 
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
		} 
		catch(E) { xmlhttp=false; }
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') { xmlhttp=new XMLHttpRequest(); } 

	return xmlhttp; 
} 

function eliminaEspacios(cadena)
{
	// Funcion equivalente a trim en PHP
	var x=0, y=cadena.length-1;
	while(cadena.charAt(x)==" ") x++;	
	while(cadena.charAt(y)==" ") y--;	
	return cadena.substr(x, y-x+1);
}

function cargaDatos(idDiv, idInput)
{
	var valorInput=document.getElementById(idInput).value;
	var divError=document.getElementById("error");
	
	// Elimino todos los espacios en blanco al principio y al final de la cadena
	valorInput=eliminaEspacios(valorInput);
	
	// Valido con una expresion regular el contenido de lo que el usuario ingresa
	
		// Si no hay error oculto el div (por si se mostraba)
		divError.style.display="none";
		mostrandoInput=false;
		document.getElementById(idDiv).innerHTML=valorInput;
		
		// Creo objeto AJAX y envio peticion al servidor
		var ajax=nuevoAjax();
		ajax.open("GET", "ingreso_sin_recargar_proceso.php?dato="+valorInput+"&actualizar="+idInput, true);
		ajax.send(null);
	
}

var mostrandoInput=false;

function creaInput(idDiv, idInput)
{
	/* Funcion encargada de cambiar el texto comun de la fila por un campo input que conserve
	el valor que tenia ese campo */
	var divError=document.getElementById("error");
	/* Solo mostramos el input si ya no esta siendo mostrado y si ademas el div del error no esta en pantalla */
	if(!mostrandoInput && divError.style.display!="block")
	{
		// Obtenemos el div contenedor del futuro input
		var divContenedor=document.getElementById(idDiv);
		// Creamos el input
		divContenedor.innerHTML="<input type='text' onBlur='cargaDatos(\""+idDiv+"\", \""+idInput+"\")' value='"+divContenedor.innerHTML+"' id='"+idInput+"' maxlength='40'>";
		// Colocamos el cursor en el input creado
		document.getElementById(idInput).focus();
		// Establecemos a true la variable para especificar que hay un input en pantalla y no se debe crear otro hasta que este se oculte
		mostrandoInput=true;
	}
}