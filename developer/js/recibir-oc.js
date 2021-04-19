function enviar_oc_cerrado()
{
  document.getElementById("formulariocerrar").submit();
} 
function suma()
{
	var ingresar = document.getElementById('aceptar') ;
	
	cans1 = document.getElementById('cans1').value;
	cane1 = document.getElementById('cane1').value;
	entr1 = document.getElementById('entr1').value;
	total = cans1 - cane1 - entr1;
	document.getElementById('dif1').value = total;
	document.getElementById('diftot').value = total;
	
	guia1 = document.getElementById('guia1');
	
	if(guia1.value == "" && cane1 > 0)
	{
		document.getElementById('guia1').value= 'Completar Campo';
	}
	
	
	if(cane1 != "")
	{
	if(total < 0 || guia1.value == "Completar Campo")
	{
	ingresar.disabled=true;
	}
	else
	{
	ingresar.disabled=false;
	}
	}
/////////////////////////////////////////////////
	cans2 = document.getElementById('cans2').value;
	cane2 = document.getElementById('cane2').value;
    entr2 = document.getElementById('entr2').value;
	total2 = cans2 - cane2 - entr2;
	document.getElementById('dif2').value = total2;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2);
	guia2 = document.getElementById('guia2');
	
	guia1 = document.getElementById('guia1');
	
	if(guia2.value == "" && cane2 > 0)
	{
		document.getElementById('guia2').value= 'Completar Campo';
	}
	
	
	if(cane2 != "")
	{
    if(total < 0 || total2 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo")
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
/////////////////////////////////////////////////
	cans3 = document.getElementById('cans3').value;
	cane3 = document.getElementById('cane3').value;
	entr3 = document.getElementById('entr3').value;
	total3 = cans3 - cane3 - entr3;
	document.getElementById('dif3').value = total3;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3);
	guia3 = document.getElementById('guia3');
  if(guia3.value == "" && cane3 > 0)
	{
		document.getElementById('guia3').value= 'Completar Campo';
	}
	if(cane3 != "")
	{
	if(total < 0 || total2 < 0 || total3 < 0 || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo")
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
/////////////////////////////////////////////////	
	cans4 = document.getElementById('cans4').value;
	cane4 = document.getElementById('cane4').value;
	entr4 = document.getElementById('entr4').value;
	total4 = cans4 - cane4 - entr4;
	document.getElementById('dif4').value = total4;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4);
	guia4 = document.getElementById('guia4');
	  if(guia4.value == "" && cane4 > 0)
	{
		document.getElementById('guia4').value= 'Completar Campo';
	}
	if(cane4 != "")
	{
	if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo")
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
/////////////////////////////////////////////////		
	cans5 = document.getElementById('cans5').value;
	cane5 = document.getElementById('cane5').value;
	entr5 = document.getElementById('entr5').value;
	total5 = cans5 - cane5 - entr5;
	document.getElementById('dif5').value = total5;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5);
	guia5 = document.getElementById('guia5');
	  if(guia5.value == "" && cane5 > 0)
	{
		document.getElementById('guia5').value= 'Completar Campo';
	}
	if(cane5 != "")
	{
	if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo")
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
/////////////////////////////////////////////////	
	cans6 = document.getElementById('cans6').value;
	cane6 = document.getElementById('cane6').value;
	entr6 = document.getElementById('entr6').value;
	total6 = cans6 - cane6 - entr6;
	document.getElementById('dif6').value = total6;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6);
	guia6 = document.getElementById('guia6');
	  if(guia6.value == "" && cane6 > 0)
	{
		document.getElementById('guia6').value= 'Completar Campo';
	}
	if(cane6 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo")
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
/////////////////////////////////////////////////	
	cans7 = document.getElementById('cans7').value;
	cane7 = document.getElementById('cane7').value;
	entr7 = document.getElementById('entr7').value;
	total7 = cans7 - cane7 - entr7;
	document.getElementById('dif7').value = total7;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7);
	guia7 = document.getElementById('guia7');
	  if(guia7.value == "" && cane7 > 0)
	{
		document.getElementById('guia7').value= 'Completar Campo';
	}
    if(cane7 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo")
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
/////////////////////////////////////////////////		
	cans8 = document.getElementById('cans8').value;
	cane8 = document.getElementById('cane8').value;
	entr8 = document.getElementById('entr8').value;
	total8 = cans8 - cane8 - entr8;
	document.getElementById('dif8').value = total8;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8);
	guia8 = document.getElementById('guia8');
	  if(guia8.value == "" && cane8 > 0)
	{
		document.getElementById('guia8').value= 'Completar Campo';
	}
	if(cane8 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo")
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
	/////////////////////////////////////////////////	
	cans9 = document.getElementById('cans9').value;
	cane9 = document.getElementById('cane9').value;
	entr9 = document.getElementById('entr9').value;
	total9 = cans9 - cane9 - entr9;
	document.getElementById('dif9').value = total9;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9);
	guia9 = document.getElementById('guia9');
	  if(guia9.value == "" && cane9 > 0)
	{
		document.getElementById('guia9').value= 'Completar Campo';
	}
    if(cane9 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo")
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}

/////////////////////////////////////////////////	
	cans10 = document.getElementById('cans10').value;
	cane10 = document.getElementById('cane10').value;
	entr10 = document.getElementById('entr10').value;
	total10 = cans10 - cane10 - entr10;
	document.getElementById('dif10').value = total10;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10);
	guia10 = document.getElementById('guia10');
	  if(guia10.value == "" && cane10 > 0)
	{
		document.getElementById('guia10').value= 'Completar Campo';
	}
     if(cane10 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo")
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
/////////////////////////////////////////////////	
	cans11 = document.getElementById('cans11').value;
	cane11 = document.getElementById('cane11').value;
	entr11 = document.getElementById('entr11').value;
	total11 = cans11 - cane11 - entr11;
	document.getElementById('dif11').value = total11;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11);
	guia11 = document.getElementById('guia11');
	  if(guia11.value == "" && cane11 > 0)
	{
		document.getElementById('guia11').value= 'Completar Campo';
	}
     if(cane11 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo")
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
/////////////////////////////////////////////////	
	cans12 = document.getElementById('cans12').value;
	cane12 = document.getElementById('cane12').value;
	entr12 = document.getElementById('entr12').value;
	total12 = cans12 - cane12 - entr12;
	document.getElementById('dif12').value = total12;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12);
	guia12 = document.getElementById('guia12');
	  if(guia12.value == "" && cane12 > 0)
	{
		document.getElementById('guia12').value= 'Completar Campo';
	}
     if(cane12 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo")
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
/////////////////////////////////////////////////	
	cans13 = document.getElementById('cans13').value;
	cane13 = document.getElementById('cane13').value;
	entr13 = document.getElementById('entr13').value;
	total13 = cans13 - cane13 - entr13;
	document.getElementById('dif13').value = total13;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13);
	guia13 = document.getElementById('guia13');
      if(guia13.value == "" && cane13 > 0)
	{
		document.getElementById('guia13').value= 'Completar Campo';
	}
	if(cane13 != "")
	{
	if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo")
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
/////////////////////////////////////////////////	
	cans14 = document.getElementById('cans14').value;
	cane14 = document.getElementById('cane14').value;
	entr14 = document.getElementById('entr14').value;
	total14 = cans14 - cane14 - entr14;
	document.getElementById('dif14').value = total14;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14);
	guia14 = document.getElementById('guia14');
	  if(guia14.value == "" && cane14 > 0)
	{
		document.getElementById('guia14').value= 'Completar Campo';
	}
  if(cane14 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo")
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
/////////////////////////////////////////////////	
	cans15 = document.getElementById('cans15').value;
	cane15 = document.getElementById('cane15').value;
	entr15 = document.getElementById('entr15').value;
	total15 = cans15 - cane15 - entr15;
	document.getElementById('dif15').value = total15;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15);
	guia15 = document.getElementById('guia15');
	  if(guia15.value == "" && cane15 > 0)
	{
		document.getElementById('guia15').value= 'Completar Campo';
	}
	if(cane15 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}		
	}
	/////////////////////////////////////////////////	
	cans16 = document.getElementById('cans16').value;
	cane16 = document.getElementById('cane16').value;
	entr16 = document.getElementById('entr16').value;
	total16 = cans16 - cane16 - entr16;
	document.getElementById('dif16').value = total16;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16);
	guia16 = document.getElementById('guia16');
	  if(guia16.value == "" && cane16 > 0)
	{
		document.getElementById('guia16').value= 'Completar Campo';
	}
     if(cane16 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
		/////////////////////////////////////////////////	
	cans17 = document.getElementById('cans17').value;
	cane17 = document.getElementById('cane17').value;
	entr17 = document.getElementById('entr17').value;
	total17 = cans17 - cane17 - entr17;
	document.getElementById('dif17').value = total17;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17);
	guia17 = document.getElementById('guia17');
	  if(guia17.value == "" && cane17 > 0)
	{
		document.getElementById('guia17').value= 'Completar Campo';
	}
    if(cane17 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
		/////////////////////////////////////////////////	
	cans18 = document.getElementById('cans18').value;
	cane18 = document.getElementById('cane18').value;
	entr18 = document.getElementById('entr18').value;
	total18 = cans18 - cane18 - entr18;
	document.getElementById('dif18').value = total18;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18);
	guia18 = document.getElementById('guia18');
	  if(guia18.value == "" && cane18 > 0)
	{
		document.getElementById('guia18').value= 'Completar Campo';
	}
    if(cane18 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
		/////////////////////////////////////////////////	
	cans19 = document.getElementById('cans19').value;
	cane19 = document.getElementById('cane19').value;
	entr19 = document.getElementById('entr19').value;
	total19 = cans19 - cane19 - entr19;
	document.getElementById('dif19').value = total19;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19);
	guia19 = document.getElementById('guia19');
	  if(guia19.value == "" && cane19 > 0)
	{
		document.getElementById('guia19').value= 'Completar Campo';
	}
     if(cane19 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
		/////////////////////////////////////////////////	
	cans20 = document.getElementById('cans20').value;
	cane20 = document.getElementById('cane20').value;
	entr20 = document.getElementById('entr20').value;
	total20 = cans20 - cane20 - entr20;
	document.getElementById('dif20').value = total20;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20);
	guia20 = document.getElementById('guia20');
	  if(guia20.value == "" && cane20 > 0)
	{
		document.getElementById('guia20').value= 'Completar Campo';
	}
    if(cane20 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0 || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo")  
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
		/////////////////////////////////////////////////	
	cans21 = document.getElementById('cans21').value;
	cane21 = document.getElementById('cane21').value;
	entr21 = document.getElementById('entr21').value;
	total21 = cans21 - cane21 - entr21;
	document.getElementById('dif21').value = total21;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21);
	guia21 = document.getElementById('guia21');
	  if(guia21.value == "" && cane21 > 0)
	{
		document.getElementById('guia21').value= 'Completar Campo';
	}
    if(cane21 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
	/////////////////////////////////////////////////	
	cans22 = document.getElementById('cans22').value;
	cane22 = document.getElementById('cane22').value;
	entr22 = document.getElementById('entr22').value;
	total22 = cans22 - cane22 - entr22;
	document.getElementById('dif22').value = total22;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22);
guia22 = document.getElementById('guia22');
  if(guia22.value == "" && cane22 > 0)
	{
		document.getElementById('guia22').value= 'Completar Campo';
	}
     if(cane22 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
		/////////////////////////////////////////////////	
	cans23 = document.getElementById('cans23').value;
	cane23 = document.getElementById('cane23').value;
	entr23 = document.getElementById('entr23').value;
	total23 = cans23 - cane23 - entr23;
	document.getElementById('dif23').value = total23;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23);
guia23 = document.getElementById('guia23');
  if(guia23.value == "" && cane23 > 0)
	{
		document.getElementById('guia23').value= 'Completar Campo';
	}
if(cane3 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
			/////////////////////////////////////////////////	
	cans24 = document.getElementById('cans24').value;
	cane24 = document.getElementById('cane24').value;
	entr24 = document.getElementById('entr24').value;
	total24 = cans24 - cane24 - entr24;
	document.getElementById('dif24').value = total24;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24);
	guia24 = document.getElementById('guia24');
	  if(guia24.value == "" && cane24 > 0)
	{
		document.getElementById('guia24').value= 'Completar Campo';
	}
  if(cane24 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
			/////////////////////////////////////////////////	
	cans25 = document.getElementById('cans25').value;
	cane25 = document.getElementById('cane25').value;
	entr25 = document.getElementById('entr25').value;
	total25 = cans25 - cane25 - entr25;
	document.getElementById('dif25').value = total25;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25);
	guia25 = document.getElementById('guia25');
	  if(guia25.value == "" && cane25 > 0)
	{
		document.getElementById('guia25').value= 'Completar Campo';
	}
if(cane25 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
		/////////////////////////////////////////////////	
	cans26 = document.getElementById('cans26').value;
	cane26 = document.getElementById('cane26').value;
	entr26 = document.getElementById('entr26').value;
	total26 = cans26 - cane26 - entr26;
	document.getElementById('dif26').value = total26;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26);
	guia26 = document.getElementById('guia26');
	  if(guia26.value == "" && cane26 > 0)
	{
		document.getElementById('guia26').value= 'Completar Campo';
	}
     if(cane26 != "")
	{

    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
		/////////////////////////////////////////////////	
	cans27 = document.getElementById('cans27').value;
	cane27 = document.getElementById('cane27').value;
	entr27 = document.getElementById('entr27').value;
	total27 = cans27 - cane27 - entr27;
	document.getElementById('dif27').value = total27;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27);
	guia27 = document.getElementById('guia27');
	  if(guia27.value == "" && cane27 > 0)
	{
		document.getElementById('guia27').value= 'Completar Campo';
	}
   if(cane27 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
	/////////////////////////////////////////////////	
	cans28 = document.getElementById('cans28').value;
	cane28 = document.getElementById('cane28').value;
	entr28 = document.getElementById('entr28').value;
	total28 = cans28 - cane28- entr28;
	document.getElementById('dif28').value = total28;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28);
	guia28 = document.getElementById('guia28');
	  if(guia28.value == "" && cane28 > 0)
	{
		document.getElementById('guia28').value= 'Completar Campo';
	}
     if(cane28 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
	/////////////////////////////////////////////////	
	cans29 = document.getElementById('cans29').value;
	cane29 = document.getElementById('cane29').value;
	entr29 = document.getElementById('entr29').value;
	total29 = cans29 - cane29- entr29;
	document.getElementById('dif29').value = total29;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29);
	guia29 = document.getElementById('guia29');
	  if(guia29.value == "" && cane29 > 0)
	{
		document.getElementById('guia29').value= 'Completar Campo';
	}
    if(cane29 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
	/////////////////////////////////////////////////	
	cans30 = document.getElementById('cans30').value;
	cane30 = document.getElementById('cane30').value;
	entr30 = document.getElementById('entr30').value;
	total30 = cans30 - cane30 - entr30;
	document.getElementById('dif30').value = total30;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30);
	guia30 = document.getElementById('guia30');
	  if(guia30.value == "" && cane30 > 0)
	{
		document.getElementById('guia30').value= 'Completar Campo';
	}
     if(cane30 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
	/////////////////////////////////////////////////	
	cans31 = document.getElementById('cans31').value;
	cane31 = document.getElementById('cane31').value;
	entr31 = document.getElementById('entr31').value;
	total31 = cans31 - cane31 - entr31;
	document.getElementById('dif31').value = total31;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30)+ parseFloat(sumdif31);
guia31 = document.getElementById('guia31');
  if(guia31.value == "" && cane31 > 0)
	{
		document.getElementById('guia31').value= 'Completar Campo';
	}
if(cane31 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
		/////////////////////////////////////////////////	
	cans32 = document.getElementById('cans32').value;
	cane32 = document.getElementById('cane32').value;
	entr32 = document.getElementById('entr32').value;
	total32 = cans32 - cane32 - entr32;
	document.getElementById('dif32').value = total32;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32);
	guia32 = document.getElementById('guia32');
	  if(guia32.value == "" && cane32 > 0)
	{
		document.getElementById('guia32').value= 'Completar Campo';
	}
 if(cane32 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
			/////////////////////////////////////////////////	
	cans33 = document.getElementById('cans33').value;
	cane33 = document.getElementById('cane33').value;
	entr33 = document.getElementById('entr33').value;
	total33 = cans33 - cane33 - entr33;
	document.getElementById('dif33').value = total33;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33);
	guia33 = document.getElementById('guia33');
	  if(guia33.value == "" && cane33 > 0)
	{
		document.getElementById('guia33').value= 'Completar Campo';
	}
 if(cane33 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
				/////////////////////////////////////////////////	
	cans34 = document.getElementById('cans34').value;
	cane34 = document.getElementById('cane34').value;
	entr34 = document.getElementById('entr34').value;
	total34 = cans34 - cane34 - entr34;
	document.getElementById('dif34').value = total34;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34); 
	guia34 = document.getElementById('guia34'); 
	  if(guia34.value == "" && cane34 > 0)
	{
		document.getElementById('guia34').value= 'Completar Campo';
	}
if(cane34 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
	
				/////////////////////////////////////////////////	
	cans35 = document.getElementById('cans35').value;
	cane35 = document.getElementById('cane35').value;
	entr35 = document.getElementById('entr35').value;
	total35 = cans35 - cane35 - entr35;
	document.getElementById('dif35').value = total35;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35);  
	guia35 = document.getElementById('guia35');
	  if(guia35.value == "" && cane35 > 0)
	{
		document.getElementById('guia35').value= 'Completar Campo';
	}
if(cane35 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}	
	}
				/////////////////////////////////////////////////	
	cans36 = document.getElementById('cans36').value;
	cane36 = document.getElementById('cane36').value;
	entr36 = document.getElementById('entr36').value;
	total36 = cans36 - cane36 - entr36;
	document.getElementById('dif36').value = total36;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36);  
	guia36 = document.getElementById('guia36');
	  if(guia36.value == "" && cane36 > 0)
	{
		document.getElementById('guia36').value= 'Completar Campo';
	}
  if(cane36 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
				/////////////////////////////////////////////////	
	cans37 = document.getElementById('cans37').value;
	cane37 = document.getElementById('cane37').value;
	entr37 = document.getElementById('entr37').value;
	total37 = cans37 - cane37 - entr37;
	document.getElementById('dif37').value = total37;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37);  
	guia37 = document.getElementById('guia37');
	  if(guia37.value == "" && cane37 > 0)
	{
		document.getElementById('guia37').value= 'Completar Campo';
	}
	if(cane37 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
	
			/////////////////////////////////////////////////	
	cans38 = document.getElementById('cans38').value;
	cane38 = document.getElementById('cane38').value;
	entr38 = document.getElementById('entr38').value;
	total38 = cans38 - cane38 - entr38;
	document.getElementById('dif38').value = total38;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38);
	guia38 = document.getElementById('guia38');
	  if(guia38.value == "" && cane38 > 0)
	{
		document.getElementById('guia38').value= 'Completar Campo';
	}  
     if(cane38 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
			/////////////////////////////////////////////////	
	cans39 = document.getElementById('cans39').value;
	cane39 = document.getElementById('cane39').value;
	entr39 = document.getElementById('entr39').value;
	total39 = cans39 - cane39 - entr39;
	document.getElementById('dif39').value = total39;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39);  
    cans139 = document.getElementById('stock39').value
	cane139 = document.getElementById('cane39').value
	total139 = cans139 - cane139;
	guia39 = document.getElementById('guia39');
	  if(guia39.value == "" && cane39 > 0)
	{
		document.getElementById('guia39').value= 'Completar Campo';
	}
	if(cane39 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
	/////////////////////////////////////////////////	
	cans40 = document.getElementById('cans40').value;
	cane40 = document.getElementById('cane40').value;
	entr40 = document.getElementById('entr40').value;
	total40 = cans40 - cane40 - entr40;
	document.getElementById('dif40').value = total40;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40);  
  guia40 = document.getElementById('guia40');
    if(guia40.value == "" && cane40 > 0)
	{
		document.getElementById('guia40').value= 'Completar Campo';
	}
  if(cane40 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo") 
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	}
	/////////////////////////////////////////////////	
	cans41 = document.getElementById('cans41').value;
	cane41 = document.getElementById('cane41').value;
	entr41 = document.getElementById('entr41').value;
	total41 = cans41 - cane41 - entr41;
	document.getElementById('dif41').value = total41;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41);  
  guia41 = document.getElementById('guia41');
    if(guia41.value == "" && cane41 > 0)
	{
		document.getElementById('guia41').value= 'Completar Campo';
	}
  if(cane41 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}	
	}
	
		/////////////////////////////////////////////////	
	cans42 = document.getElementById('cans42').value;
	cane42 = document.getElementById('cane42').value;
	entr42 = document.getElementById('entr42').value;
	total42 = cans42 - cane42 - entr42;
	document.getElementById('dif42').value = total42;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42);  
    cans142 = document.getElementById('stock42').value
	cane142 = document.getElementById('cane42').value
	total142 = cans142 - cane142;
   guia42 = document.getElementById('guia42');
     if(guia42.value == "" && cane42 > 0)
	{
		document.getElementById('guia42').value= 'Completar Campo';
	}
   if(cane42 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}
	}
		/////////////////////////////////////////////////	
	cans43 = document.getElementById('cans43').value;
	cane43 = document.getElementById('cane43').value;
	entr43 = document.getElementById('entr43').value;
	total43 = cans43 - cane43 - entr43;
	document.getElementById('dif43').value = total43;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43);  
   guia43 = document.getElementById('guia43');
     if(guia43.value == "" && cane43 > 0)
	{
		document.getElementById('guia43').value= 'Completar Campo';
	}
   if(cane43 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}		
	}
		/////////////////////////////////////////////////	
	cans44 = document.getElementById('cans44').value;
	cane44 = document.getElementById('cane44').value;
	entr44 = document.getElementById('entr44').value;
	total44 = cans44 - cane44 - entr44;
	document.getElementById('dif44').value = total44;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44); 
	guia44 = document.getElementById('guia44');
	  if(guia44.value == "" && cane44 > 0)
	{
		document.getElementById('guia44').value= 'Completar Campo';
	} 
 if(cane44 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}	
	}
/////////////////////////////////////////////////	
	cans45 = document.getElementById('cans45').value;
	cane45 = document.getElementById('cane45').value;
	entr45 = document.getElementById('entr45').value;
	total45 = cans45 - cane45 - entr45;
	document.getElementById('dif45').value = total45;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45);
	guia45 = document.getElementById('guia45'); 
	  if(guia45.value == "" && cane45 > 0)
	{
		document.getElementById('guia45').value= 'Completar Campo';
	} 
 if(cane45 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 ||  guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}	
	}
/////////////////////////////////////////////////	
	cans46 = document.getElementById('cans46').value;
	cane46 = document.getElementById('cane46').value;
	entr46 = document.getElementById('entr46').value;
	total46 = cans46 - cane46 - entr46;
	document.getElementById('dif46').value = total46;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46); 
	guia46 = document.getElementById('guia46'); 
	  if(guia46.value == "" && cane46 > 0)
	{
		document.getElementById('guia46').value= 'Completar Campo';
	}
  if(cane46 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0 || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}	
	}
	/////////////////////////////////////////////////	
	cans47 = document.getElementById('cans47').value;
	cane47 = document.getElementById('cane47').value;
	entr47 = document.getElementById('entr47').value;
	total47 = cans47 - cane47 - entr47;
	document.getElementById('dif47').value = total47;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47);  
	guia47 = document.getElementById('guia47');
	  if(guia47.value == "" && cane47 > 0)
	{
		document.getElementById('guia47').value= 'Completar Campo';
	}
  if(cane47 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}		
	}
	/////////////////////////////////////////////////	
	cans48 = document.getElementById('cans48').value;
	cane48 = document.getElementById('cane48').value;
	entr48 = document.getElementById('entr48').value;
	total48 = cans48 - cane48 - entr48;
	document.getElementById('dif48').value = total48;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48);  
	guia48 = document.getElementById('guia48');
	  if(guia48.value == "" && cane48 > 0)
	{
		document.getElementById('guia48').value= 'Completar Campo';
	}
 if(cane48 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}
	}
		/////////////////////////////////////////////////	
	cans49 = document.getElementById('cans49').value;
	cane49 = document.getElementById('cane49').value;
	entr49 = document.getElementById('entr49').value;
	total49 = cans49 - cane49 - entr49;
	document.getElementById('dif49').value = total49;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49);  
	guia1 = document.getElementById('guia49');
	  if(guia49.value == "" && cane49 > 0)
	{
		document.getElementById('guia49').value= 'Completar Campo';
	}
    if(cane49 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}	
	}
	
			/////////////////////////////////////////////////	
	cans50 = document.getElementById('cans50').value;
	cane50 = document.getElementById('cane50').value;
	entr50 = document.getElementById('entr50').value;
	total50 = cans50 - cane50 - entr50;
	document.getElementById('dif50').value = total50;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50);  
	guia50 = document.getElementById('guia50');
	  if(guia50.value == "" && cane50 > 0)
	{
		document.getElementById('guia50').value= 'Completar Campo';
	}
if(cane50 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}	
	}
				/////////////////////////////////////////////////	
	cans51 = document.getElementById('cans51').value;
	cane51 = document.getElementById('cane51').value;
	entr51 = document.getElementById('entr51').value;
	total51 = cans51 - cane51 - entr51;
	document.getElementById('dif51').value = total51;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51);  
	guia51 = document.getElementById('guia51');
	  if(guia51.value == "" && cane51 > 0)
	{
		document.getElementById('guia51').value= 'Completar Campo';
	}
if(cane51 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}	
	}
		/////////////////////////////////////////////////	
	cans52 = document.getElementById('cans52').value;
	cane52 = document.getElementById('cane52').value;
	entr52 = document.getElementById('entr52').value;
	total52 = cans52 - cane52 - entr52;
	document.getElementById('dif52').value = total52;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52);  
	guia52 = document.getElementById('guia52');
	  if(guia52.value == "" && cane52 > 0)
	{
		document.getElementById('guia52').value= 'Completar Campo';
	}
 if(cane52 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}		
	}
	/////////////////////////////////////////////////	
	cans53 = document.getElementById('cans53').value;
	cane53 = document.getElementById('cane53').value;
	entr53 = document.getElementById('entr53').value;
	total53 = cans53 - cane53 - entr53;
	document.getElementById('dif53').value = total53;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53);  
 guia53 = document.getElementById('guia53');
   if(guia53.value == "" && cane53 > 0)
	{
		document.getElementById('guia53').value= 'Completar Campo';
	}
if(cane53 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0  || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}	
	}
	
	/////////////////////////////////////////////////	
	cans54 = document.getElementById('cans54').value;
	cane54 = document.getElementById('cane54').value;
	entr54 = document.getElementById('entr54').value;
	total54 = cans54 - cane54 - entr54;
	document.getElementById('dif54').value = total54;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54);  
guia54 = document.getElementById('guia54');
  if(guia54.value == "" && cane54 > 0)
	{
		document.getElementById('guia54').value= 'Completar Campo';
	}
if(cane54 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0  ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}		
	}
	/////////////////////////////////////////////////	
	cans55 = document.getElementById('cans55').value;
	cane55 = document.getElementById('cane55').value;
	entr55 = document.getElementById('entr55').value;
	total55 = cans55 - cane55 - entr55;
	document.getElementById('dif55').value = total55;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55);  
guia55 = document.getElementById('guia55');
  if(guia55.value == "" && cane55 > 0)
	{
		document.getElementById('guia55').value= 'Completar Campo';
	}
if(cane55 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0  ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}		
	}
	/////////////////////////////////////////////////	
	cans56 = document.getElementById('cans56').value;
	cane56 = document.getElementById('cane56').value;
	entr56 = document.getElementById('entr56').value;
	total56 = cans56 - cane56 - entr56;
	document.getElementById('dif56').value = total56;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56);  
	guia56 = document.getElementById('guia56');
	  if(guia56.value == "" && cane56 > 0)
	{
		document.getElementById('guia56').value= 'Completar Campo';
	}
if(cane56 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0  ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}		
	}
		/////////////////////////////////////////////////	
	cans57 = document.getElementById('cans57').value;
	cane57 = document.getElementById('cane57').value;
	entr57 = document.getElementById('entr57').value;
	total57 = cans57 - cane57 - entr57;
	document.getElementById('dif57').value = total57;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57); 
	guia57 = document.getElementById('guia57');
	  if(guia57.value == "" && cane57 > 0)
	{
		document.getElementById('guia57').value= 'Completar Campo';
	} 
   if(cane57 != "")
	{

    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}		
	}
	/////////////////////////////////////////////////	
	cans58 = document.getElementById('cans58').value;
	cane58 = document.getElementById('cane58').value;
	entr58 = document.getElementById('entr58').value;
	total58 = cans58 - cane58 - entr58;
	document.getElementById('dif58').value = total58;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58);  
	guia58 = document.getElementById('guia58');
	  if(guia58.value == "" && cane58 > 0)
	{
		document.getElementById('guia58').value= 'Completar Campo';
	}
if(cane58 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}		
	}
	/////////////////////////////////////////////////	
	cans59 = document.getElementById('cans59').value;
	cane59 = document.getElementById('cane59').value;
	entr59 = document.getElementById('entr59').value;
	total59 = cans59 - cane59 - entr59;
	document.getElementById('dif59').value = total59;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59);  
	guia59 = document.getElementById('guia59');
	  if(guia59.value == "" && cane59 > 0)
	{
		document.getElementById('guia59').value= 'Completar Campo';
	}
if(cane59 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}	
	}
		/////////////////////////////////////////////////	
	cans60 = document.getElementById('cans60').value;
	cane60 = document.getElementById('cane60').value;
	entr60 = document.getElementById('entr60').value;
	total60 = cans60 - cane60 - entr60;
	document.getElementById('dif60').value = total60;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
	sumdif60 = document.getElementById('dif60').value;    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59) + parseFloat(sumdif60);  
    cans160 = document.getElementById('stock60').value
	cane160 = document.getElementById('cane60').value
	total160 = cans160 - cane160;
	guia60 = document.getElementById('guia60');
	  if(guia60.value == "" && cane60 > 0)
	{
		document.getElementById('guia60').value= 'Completar Campo';
	}
if(cane60 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 || total60 < 0 || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo"||guia60.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}	
	}
		/////////////////////////////////////////////////	
	cans61 = document.getElementById('cans61').value;
	cane61 = document.getElementById('cane61').value;
	entr61 = document.getElementById('entr61').value;
	total61 = cans61 - cane61 - entr61;
	document.getElementById('dif61').value = total61;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
	sumdif60 = document.getElementById('dif60').value;
	sumdif61 = document.getElementById('dif61').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59) + parseFloat(sumdif60) + parseFloat(sumdif61);  
    cans161 = document.getElementById('stock61').value
	cane161 = document.getElementById('cane61').value
	total161 = cans161 - cane161;
	guia61 = document.getElementById('guia61');
	  if(guia61.value == "" && cane61 > 0)
	{
		document.getElementById('guia61').value= 'Completar Campo';
	}
if(cane61 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 || total60 < 0 || total61 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo"||guia60.value == "Completar Campo"|| guia61.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}	
	}
			/////////////////////////////////////////////////	
	cans62 = document.getElementById('cans62').value;
	cane62 = document.getElementById('cane62').value;
	entr62 = document.getElementById('entr62').value;
	total62 = cans62 - cane62 - entr62;
	document.getElementById('dif62').value = total62;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
	sumdif60 = document.getElementById('dif60').value;
	sumdif61 = document.getElementById('dif61').value;
	sumdif62 = document.getElementById('dif62').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59) + parseFloat(sumdif60) + parseFloat(sumdif61) + parseFloat(sumdif62);  
 guia62 = document.getElementById('guia62');
   if(guia62.value == "" && cane62 > 0)
	{
		document.getElementById('guia62').value= 'Completar Campo';
	}
if(cane62 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 || total60 < 0 || total61 < 0 || total62 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo"||guia60.value == "Completar Campo"|| guia61.value == "Completar Campo"|| guia62.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}
	}
			/////////////////////////////////////////////////	
	cans63 = document.getElementById('cans63').value;
	cane63 = document.getElementById('cane63').value;
	entr63 = document.getElementById('entr63').value;
	total63 = cans63 - cane63 - entr63;
	document.getElementById('dif63').value = total63;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
	sumdif60 = document.getElementById('dif60').value;
	sumdif61 = document.getElementById('dif61').value;
	sumdif62 = document.getElementById('dif62').value;
	sumdif63 = document.getElementById('dif63').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59) + parseFloat(sumdif60) + parseFloat(sumdif61) + parseFloat(sumdif62) + parseFloat(sumdif63);  
guia63 = document.getElementById('guia63');
  if(guia63.value == "" && cane63 > 0)
	{
		document.getElementById('guia63').value= 'Completar Campo';
	}
if(cane63 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 || total60 < 0 || total61 < 0 || total62 < 0|| total63 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo"||guia60.value == "Completar Campo"|| guia61.value == "Completar Campo"|| guia62.value == "Completar Campo"|| guia63.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}	
	}
				/////////////////////////////////////////////////	
	cans64 = document.getElementById('cans64').value;
	cane64 = document.getElementById('cane64').value;
	entr64 = document.getElementById('entr64').value;
	total64 = cans64 - cane64 - entr64;
	document.getElementById('dif64').value = total64;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
	sumdif60 = document.getElementById('dif60').value;
	sumdif61 = document.getElementById('dif61').value;
	sumdif62 = document.getElementById('dif62').value;
	sumdif63 = document.getElementById('dif63').value;
	sumdif64 = document.getElementById('dif64').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59) + parseFloat(sumdif60) + parseFloat(sumdif61) + parseFloat(sumdif62) + parseFloat(sumdif63) + parseFloat(sumdif64);  
   guia64 = document.getElementById('guia64');
     if(guia64.value == "" && cane64 > 0)
	{
		document.getElementById('guia64').value= 'Completar Campo';
	}
if(cane64 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 || total60 < 0 || total61 < 0 || total62 < 0|| total63 < 0 || total64 < 0||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo"||guia60.value == "Completar Campo"|| guia61.value == "Completar Campo"|| guia62.value == "Completar Campo"|| guia63.value == "Completar Campo"|| guia64.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}	
	}
				/////////////////////////////////////////////////	
	cans65 = document.getElementById('cans65').value;
	cane65 = document.getElementById('cane65').value;
	entr65 = document.getElementById('entr65').value;
	total65 = cans65 - cane65 - entr65;
	document.getElementById('dif65').value = total65;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
	sumdif60 = document.getElementById('dif60').value;
	sumdif61 = document.getElementById('dif61').value;
	sumdif62 = document.getElementById('dif62').value;
	sumdif63 = document.getElementById('dif63').value;
	sumdif64 = document.getElementById('dif64').value;
	sumdif65 = document.getElementById('dif65').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59) + parseFloat(sumdif60) + parseFloat(sumdif61) + parseFloat(sumdif62) + parseFloat(sumdif63) + parseFloat(sumdif64) + parseFloat(sumdif65);  
guia65 = document.getElementById('guia65');
  if(guia65.value == "" && cane65 > 0)
	{
		document.getElementById('guia65').value= 'Completar Campo';
	}
if(cane65 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 || total60 < 0 || total61 < 0 || total62 < 0|| total63 < 0 || total64 < 0 || total65 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo"||guia60.value == "Completar Campo"|| guia61.value == "Completar Campo"|| guia62.value == "Completar Campo"|| guia63.value == "Completar Campo"|| guia64.value == "Completar Campo"|| guia65.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}	
	}
	/////////////////////////////////////////////////	
	cans66 = document.getElementById('cans66').value;
	cane66 = document.getElementById('cane66').value;
	entr66 = document.getElementById('entr66').value;
	total66 = cans66 - cane66 - entr66;
	document.getElementById('dif66').value = total66;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
	sumdif60 = document.getElementById('dif60').value;
	sumdif61 = document.getElementById('dif61').value;
	sumdif62 = document.getElementById('dif62').value;
	sumdif63 = document.getElementById('dif63').value;
	sumdif64 = document.getElementById('dif64').value;
	sumdif65 = document.getElementById('dif65').value;
	sumdif66 = document.getElementById('dif66').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59) + parseFloat(sumdif60) + parseFloat(sumdif61) + parseFloat(sumdif62) + parseFloat(sumdif63) + parseFloat(sumdif64) + parseFloat(sumdif65) + parseFloat(sumdif66);  
	guia66 = document.getElementById('guia66');
	  if(guia66.value == "" && cane66 > 0)
	{
		document.getElementById('guia66').value= 'Completar Campo';
	}
if(cane66 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 || total60 < 0 || total61 < 0 || total62 < 0|| total63 < 0 || total64 < 0 || total65 < 0 || total66 < 0 || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo"||guia60.value == "Completar Campo"|| guia61.value == "Completar Campo"|| guia62.value == "Completar Campo"|| guia63.value == "Completar Campo"|| guia64.value == "Completar Campo"|| guia65.value == "Completar Campo"||guia66.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}		
	}
			/////////////////////////////////////////////////	
	cans67 = document.getElementById('cans67').value;
	cane67 = document.getElementById('cane67').value;
	entr67 = document.getElementById('entr67').value;
	total67 = cans67 - cane67 - entr67;
	document.getElementById('dif67').value = total67;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
	sumdif60 = document.getElementById('dif60').value;
	sumdif61 = document.getElementById('dif61').value;
	sumdif62 = document.getElementById('dif62').value;
	sumdif63 = document.getElementById('dif63').value;
	sumdif64 = document.getElementById('dif64').value;
	sumdif65 = document.getElementById('dif65').value;
	sumdif66 = document.getElementById('dif66').value;
	sumdif67 = document.getElementById('dif67').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59) + parseFloat(sumdif60) + parseFloat(sumdif61) + parseFloat(sumdif62) + parseFloat(sumdif63) + parseFloat(sumdif64) + parseFloat(sumdif65) + parseFloat(sumdif66) + parseFloat(sumdif67);  
guia67 = document.getElementById('guia67');
  if(guia67.value == "" && cane67 > 0)
	{
		document.getElementById('guia67').value= 'Completar Campo';
	}
if(cane67 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 || total60 < 0 || total61 < 0 || total62 < 0|| total63 < 0 || total64 < 0 || total65 < 0 || total66 < 0 || total67 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo"||guia60.value == "Completar Campo"|| guia61.value == "Completar Campo"|| guia62.value == "Completar Campo"|| guia63.value == "Completar Campo"|| guia64.value == "Completar Campo"|| guia65.value == "Completar Campo"||guia66.value == "Completar Campo"|| guia67.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}	
	}
	
				/////////////////////////////////////////////////	
	cans68 = document.getElementById('cans68').value;
	cane68 = document.getElementById('cane68').value;
	entr68 = document.getElementById('entr68').value;
	total68 = cans68 - cane68 - entr68;
	document.getElementById('dif68').value = total68;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
	sumdif60 = document.getElementById('dif60').value;
	sumdif61 = document.getElementById('dif61').value;
	sumdif62 = document.getElementById('dif62').value;
	sumdif63 = document.getElementById('dif63').value;
	sumdif64 = document.getElementById('dif64').value;
	sumdif65 = document.getElementById('dif65').value;
	sumdif66 = document.getElementById('dif66').value;
	sumdif67 = document.getElementById('dif67').value;
	sumdif68 = document.getElementById('dif68').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59) + parseFloat(sumdif60) + parseFloat(sumdif61) + parseFloat(sumdif62) + parseFloat(sumdif63) + parseFloat(sumdif64) + parseFloat(sumdif65) + parseFloat(sumdif66) + parseFloat(sumdif67) + parseFloat(sumdif68);  
	guia68 = document.getElementById('guia68');
	  if(guia68.value == "" && cane68 > 0)
	{
		document.getElementById('guia68').value= 'Completar Campo';
	}
if(cane68 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 || total60 < 0 || total61 < 0 || total62 < 0|| total63 < 0 || total64 < 0 || total65 < 0 || total66 < 0 || total67 < 0|| total68 < 0 || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo"||guia60.value == "Completar Campo"|| guia61.value == "Completar Campo"|| guia62.value == "Completar Campo"|| guia63.value == "Completar Campo"|| guia64.value == "Completar Campo"|| guia65.value == "Completar Campo"||guia66.value == "Completar Campo"|| guia67.value == "Completar Campo"||guia68.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}		
	}
				/////////////////////////////////////////////////	
	cans69 = document.getElementById('cans69').value;
	cane69 = document.getElementById('cane69').value;
	entr69 = document.getElementById('entr69').value;
	total69 = cans69 - cane69 - entr69;
	document.getElementById('dif69').value = total69;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
	sumdif60 = document.getElementById('dif60').value;
	sumdif61 = document.getElementById('dif61').value;
	sumdif62 = document.getElementById('dif62').value;
	sumdif63 = document.getElementById('dif63').value;
	sumdif64 = document.getElementById('dif64').value;
	sumdif65 = document.getElementById('dif65').value;
	sumdif66 = document.getElementById('dif66').value;
	sumdif67 = document.getElementById('dif67').value;
	sumdif68 = document.getElementById('dif68').value;
	sumdif69 = document.getElementById('dif69').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59) + parseFloat(sumdif60) + parseFloat(sumdif61) + parseFloat(sumdif62) + parseFloat(sumdif63) + parseFloat(sumdif64) + parseFloat(sumdif65) + parseFloat(sumdif66) + parseFloat(sumdif67) + parseFloat(sumdif68) + parseFloat(sumdif69);  
	guia69 = document.getElementById('guia69');
	  if(guia69.value == "" && cane69 > 0)
	{
		document.getElementById('guia69').value= 'Completar Campo';
	}
   if(cane69 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 || total60 < 0 || total61 < 0 || total62 < 0|| total63 < 0 || total64 < 0 || total65 < 0 || total66 < 0 || total67 < 0|| total68 < 0|| total69 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo"||guia60.value == "Completar Campo"|| guia61.value == "Completar Campo"|| guia62.value == "Completar Campo"|| guia63.value == "Completar Campo"|| guia64.value == "Completar Campo"|| guia65.value == "Completar Campo"||guia66.value == "Completar Campo"|| guia67.value == "Completar Campo"||guia68.value == "Completar Campo"|| guia69.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}	
	}
	/////////////////////////////////////////////////	
	cans70 = document.getElementById('cans70').value;
	cane70 = document.getElementById('cane70').value;
	entr70 = document.getElementById('entr70').value;
	total70 = cans70 - cane70 - entr70;
	document.getElementById('dif70').value = total70;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
	sumdif60 = document.getElementById('dif60').value;
	sumdif61 = document.getElementById('dif61').value;
	sumdif62 = document.getElementById('dif62').value;
	sumdif63 = document.getElementById('dif63').value;
	sumdif64 = document.getElementById('dif64').value;
	sumdif65 = document.getElementById('dif65').value;
	sumdif66 = document.getElementById('dif66').value;
	sumdif67 = document.getElementById('dif67').value;
	sumdif68 = document.getElementById('dif68').value;
	sumdif69 = document.getElementById('dif69').value;
	sumdif70 = document.getElementById('dif70').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59) + parseFloat(sumdif60) + parseFloat(sumdif61) + parseFloat(sumdif62) + parseFloat(sumdif63) + parseFloat(sumdif64) + parseFloat(sumdif65) + parseFloat(sumdif66) + parseFloat(sumdif67) + parseFloat(sumdif68) + parseFloat(sumdif69) + parseFloat(sumdif70);  
   guia70 = document.getElementById('guia70');
     if(guia70.value == "" && cane70 > 0)
	{
		document.getElementById('guia70').value= 'Completar Campo';
	}
if(cane70 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 || total60 < 0 || total61 < 0 || total62 < 0|| total63 < 0 || total64 < 0 || total65 < 0 || total66 < 0 || total67 < 0|| total68 < 0|| total69 < 0 || total70 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo"||guia60.value == "Completar Campo"|| guia61.value == "Completar Campo"|| guia62.value == "Completar Campo"|| guia63.value == "Completar Campo"|| guia64.value == "Completar Campo"|| guia65.value == "Completar Campo"||guia66.value == "Completar Campo"|| guia67.value == "Completar Campo"||guia68.value == "Completar Campo"|| guia69.value == "Completar Campo"|| guia70.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}		
	}
	/////////////////////////////////////////////////	
	cans71 = document.getElementById('cans71').value;
	cane71 = document.getElementById('cane71').value;
	entr71 = document.getElementById('entr71').value;
	total71 = cans71 - cane71 - entr71;
	document.getElementById('dif71').value = total71;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
	sumdif60 = document.getElementById('dif60').value;
	sumdif61 = document.getElementById('dif61').value;
	sumdif62 = document.getElementById('dif62').value;
	sumdif63 = document.getElementById('dif63').value;
	sumdif64 = document.getElementById('dif64').value;
	sumdif65 = document.getElementById('dif65').value;
	sumdif66 = document.getElementById('dif66').value;
	sumdif67 = document.getElementById('dif67').value;
	sumdif68 = document.getElementById('dif68').value;
	sumdif69 = document.getElementById('dif69').value;
	sumdif70 = document.getElementById('dif70').value;
	sumdif71 = document.getElementById('dif71').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59) + parseFloat(sumdif60) + parseFloat(sumdif61) + parseFloat(sumdif62) + parseFloat(sumdif63) + parseFloat(sumdif64) + parseFloat(sumdif65) + parseFloat(sumdif66) + parseFloat(sumdif67) + parseFloat(sumdif68) + parseFloat(sumdif69) + parseFloat(sumdif70) + parseFloat(sumdif71);  
	guia71 = document.getElementById('guia71');
	  if(guia71.value == "" && cane71 > 0)
	{
		document.getElementById('guia71').value= 'Completar Campo';
	}
if(cane71 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 || total60 < 0 || total61 < 0 || total62 < 0|| total63 < 0 || total64 < 0 || total65 < 0 || total66 < 0 || total67 < 0|| total68 < 0|| total69 < 0 || total70 < 0 || total71 < 0 || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo"||guia60.value == "Completar Campo"|| guia61.value == "Completar Campo"|| guia62.value == "Completar Campo"|| guia63.value == "Completar Campo"|| guia64.value == "Completar Campo"|| guia65.value == "Completar Campo"||guia66.value == "Completar Campo"|| guia67.value == "Completar Campo"||guia68.value == "Completar Campo"|| guia69.value == "Completar Campo"|| guia70.value == "Completar Campo"||guia71.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}		
	}
/////////////////////////////////////////////////	
	cans72 = document.getElementById('cans72').value;
	cane72 = document.getElementById('cane72').value;
	entr72 = document.getElementById('entr72').value;
	total72 = cans72 - cane72 - entr72;
	document.getElementById('dif72').value = total72;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
	sumdif60 = document.getElementById('dif60').value;
	sumdif61 = document.getElementById('dif61').value;
	sumdif62 = document.getElementById('dif62').value;
	sumdif63 = document.getElementById('dif63').value;
	sumdif64 = document.getElementById('dif64').value;
	sumdif65 = document.getElementById('dif65').value;
	sumdif66 = document.getElementById('dif66').value;
	sumdif67 = document.getElementById('dif67').value;
	sumdif68 = document.getElementById('dif68').value;
	sumdif69 = document.getElementById('dif69').value;
	sumdif70 = document.getElementById('dif70').value;
	sumdif71 = document.getElementById('dif71').value;
	sumdif72 = document.getElementById('dif72').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59) + parseFloat(sumdif60) + parseFloat(sumdif61) + parseFloat(sumdif62) + parseFloat(sumdif63) + parseFloat(sumdif64) + parseFloat(sumdif65) + parseFloat(sumdif66) + parseFloat(sumdif67) + parseFloat(sumdif68) + parseFloat(sumdif69) + parseFloat(sumdif70) + parseFloat(sumdif71) + parseFloat(sumdif72);  
guia72 = document.getElementById('guia72');
  if(guia72.value == "" && cane72 > 0)
	{
		document.getElementById('guia72').value= 'Completar Campo';
	}
if(cane72 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 || total60 < 0 || total61 < 0 || total62 < 0|| total63 < 0 || total64 < 0 || total65 < 0 || total66 < 0 || total67 < 0|| total68 < 0|| total69 < 0 || total70 < 0 || total71 < 0|| total72 < 0 || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo"||guia60.value == "Completar Campo"|| guia61.value == "Completar Campo"|| guia62.value == "Completar Campo"|| guia63.value == "Completar Campo"|| guia64.value == "Completar Campo"|| guia65.value == "Completar Campo"||guia66.value == "Completar Campo"|| guia67.value == "Completar Campo"||guia68.value == "Completar Campo"|| guia69.value == "Completar Campo"|| guia70.value == "Completar Campo"||guia71.value == "Completar Campo"|| guia72.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}		
	}
/////////////////////////////////////////////////	
	cans73 = document.getElementById('cans73').value;
	cane73 = document.getElementById('cane73').value;
	entr73 = document.getElementById('entr73').value;
	total73 = cans73 - cane73 - entr73;
	document.getElementById('dif73').value = total73;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
	sumdif60 = document.getElementById('dif60').value;
	sumdif61 = document.getElementById('dif61').value;
	sumdif62 = document.getElementById('dif62').value;
	sumdif63 = document.getElementById('dif63').value;
	sumdif64 = document.getElementById('dif64').value;
	sumdif65 = document.getElementById('dif65').value;
	sumdif66 = document.getElementById('dif66').value;
	sumdif67 = document.getElementById('dif67').value;
	sumdif68 = document.getElementById('dif68').value;
	sumdif69 = document.getElementById('dif69').value;
	sumdif70 = document.getElementById('dif70').value;
	sumdif71 = document.getElementById('dif71').value;
	sumdif72 = document.getElementById('dif72').value;
	sumdif73 = document.getElementById('dif73').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59) + parseFloat(sumdif60) + parseFloat(sumdif61) + parseFloat(sumdif62) + parseFloat(sumdif63) + parseFloat(sumdif64) + parseFloat(sumdif65) + parseFloat(sumdif66) + parseFloat(sumdif67) + parseFloat(sumdif68) + parseFloat(sumdif69) + parseFloat(sumdif70) + parseFloat(sumdif71) + parseFloat(sumdif72) + parseFloat(sumdif73);  
guia73 = document.getElementById('guia73');
  if(guia73.value == "" && cane73 > 0)
	{
		document.getElementById('guia73').value= 'Completar Campo';
	}
if(cane73 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 || total60 < 0 || total61 < 0 || total62 < 0|| total63 < 0 || total64 < 0 || total65 < 0 || total66 < 0 || total67 < 0|| total68 < 0|| total69 < 0 || total70 < 0 || total71 < 0|| total72 < 0|| total73 < 0 || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo"||guia60.value == "Completar Campo"|| guia61.value == "Completar Campo"|| guia62.value == "Completar Campo"|| guia63.value == "Completar Campo"|| guia64.value == "Completar Campo"|| guia65.value == "Completar Campo"||guia66.value == "Completar Campo"|| guia67.value == "Completar Campo"||guia68.value == "Completar Campo"|| guia69.value == "Completar Campo"|| guia70.value == "Completar Campo"||guia71.value == "Completar Campo"|| guia72.value == "Completar Campo"|| guia73.value == "Completar Campo") 
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}		
	}
/////////////////////////////////////////////////	
	cans74 = document.getElementById('cans74').value;
	cane74 = document.getElementById('cane74').value;
	entr74 = document.getElementById('entr74').value;
	total74 = cans74 - cane74 - entr74;
	document.getElementById('dif74').value = total74;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
	sumdif60 = document.getElementById('dif60').value;
	sumdif61 = document.getElementById('dif61').value;
	sumdif62 = document.getElementById('dif62').value;
	sumdif63 = document.getElementById('dif63').value;
	sumdif64 = document.getElementById('dif64').value;
	sumdif65 = document.getElementById('dif65').value;
	sumdif66 = document.getElementById('dif66').value;
	sumdif67 = document.getElementById('dif67').value;
	sumdif68 = document.getElementById('dif68').value;
	sumdif69 = document.getElementById('dif69').value;
	sumdif70 = document.getElementById('dif70').value;
	sumdif71 = document.getElementById('dif71').value;
	sumdif72 = document.getElementById('dif72').value;
	sumdif73 = document.getElementById('dif73').value;
	sumdif74 = document.getElementById('dif74').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59) + parseFloat(sumdif60) + parseFloat(sumdif61) + parseFloat(sumdif62) + parseFloat(sumdif63) + parseFloat(sumdif64) + parseFloat(sumdif65) + parseFloat(sumdif66) + parseFloat(sumdif67) + parseFloat(sumdif68) + parseFloat(sumdif69) + parseFloat(sumdif70) + parseFloat(sumdif71) + parseFloat(sumdif72) + parseFloat(sumdif73) + parseFloat(sumdif74);  
guia74 = document.getElementById('guia74');
  if(guia74.value == "" && cane74 > 0)
	{
		document.getElementById('guia74').value= 'Completar Campo';
	}
if(cane74 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 || total60 < 0 || total61 < 0 || total62 < 0|| total63 < 0 || total64 < 0 || total65 < 0 || total66 < 0 || total67 < 0|| total68 < 0|| total69 < 0 || total70 < 0 || total71 < 0|| total72 < 0|| total73 < 0|| total74 < 0 ||guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo"||guia60.value == "Completar Campo"|| guia61.value == "Completar Campo"|| guia62.value == "Completar Campo"|| guia63.value == "Completar Campo"|| guia64.value == "Completar Campo"|| guia65.value == "Completar Campo"||guia66.value == "Completar Campo"|| guia67.value == "Completar Campo"||guia68.value == "Completar Campo"|| guia69.value == "Completar Campo"|| guia70.value == "Completar Campo"||guia71.value == "Completar Campo"|| guia72.value == "Completar Campo"|| guia73.value == "Completar Campo"|| guia74.value == "Completar Campo")  
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}
	}
/////////////////////////////////////////////////	
	cans75 = document.getElementById('cans75').value;
	cane75 = document.getElementById('cane75').value;
	entr75 = document.getElementById('entr75').value;
	total75 = cans75 - cane75 - entr75;
	document.getElementById('dif75').value = total75;
	sumdif1 = document.getElementById('dif1').value;
	sumdif2 = document.getElementById('dif2').value;
	sumdif3 = document.getElementById('dif3').value;
	sumdif4 = document.getElementById('dif4').value;
	sumdif5 = document.getElementById('dif5').value;
	sumdif6 = document.getElementById('dif6').value;
	sumdif7 = document.getElementById('dif7').value;
	sumdif8 = document.getElementById('dif8').value;
	sumdif9 = document.getElementById('dif9').value;
	sumdif10 = document.getElementById('dif10').value;
	sumdif11 = document.getElementById('dif11').value;
	sumdif12 = document.getElementById('dif12').value;
	sumdif13 = document.getElementById('dif13').value;
    sumdif14 = document.getElementById('dif14').value;
    sumdif15 = document.getElementById('dif15').value;
	sumdif16 = document.getElementById('dif16').value;
	sumdif17 = document.getElementById('dif17').value;
	sumdif18 = document.getElementById('dif18').value;
	sumdif19 = document.getElementById('dif19').value;
	sumdif20 = document.getElementById('dif20').value;
	sumdif21 = document.getElementById('dif21').value;
	sumdif22 = document.getElementById('dif22').value;
	sumdif23 = document.getElementById('dif23').value;
	sumdif24 = document.getElementById('dif24').value;
	sumdif25 = document.getElementById('dif25').value;
	sumdif26 = document.getElementById('dif26').value;
	sumdif27 = document.getElementById('dif27').value;
	sumdif28 = document.getElementById('dif28').value;
	sumdif29 = document.getElementById('dif29').value;
	sumdif30 = document.getElementById('dif30').value;
	sumdif31 = document.getElementById('dif31').value;
	sumdif32 = document.getElementById('dif32').value;
	sumdif33 = document.getElementById('dif33').value;
	sumdif34 = document.getElementById('dif34').value;
	sumdif35 = document.getElementById('dif35').value;
	sumdif36 = document.getElementById('dif36').value;
	sumdif37 = document.getElementById('dif37').value;
	sumdif38 = document.getElementById('dif38').value;
	sumdif39 = document.getElementById('dif39').value;
	sumdif40 = document.getElementById('dif40').value;
	sumdif41 = document.getElementById('dif41').value;
	sumdif42 = document.getElementById('dif42').value;
	sumdif43 = document.getElementById('dif43').value;
	sumdif44 = document.getElementById('dif44').value;
	sumdif45 = document.getElementById('dif45').value;
	sumdif46 = document.getElementById('dif46').value;
	sumdif47 = document.getElementById('dif47').value;
	sumdif48 = document.getElementById('dif48').value;
	sumdif49 = document.getElementById('dif49').value;
	sumdif50 = document.getElementById('dif50').value;
	sumdif51 = document.getElementById('dif51').value;
	sumdif52 = document.getElementById('dif52').value;
	sumdif53 = document.getElementById('dif53').value;
	sumdif54 = document.getElementById('dif54').value;
	sumdif55 = document.getElementById('dif55').value;
	sumdif56 = document.getElementById('dif56').value;
	sumdif57 = document.getElementById('dif57').value;
	sumdif58 = document.getElementById('dif58').value;
	sumdif59 = document.getElementById('dif59').value;
	sumdif60 = document.getElementById('dif60').value;
	sumdif61 = document.getElementById('dif61').value;
	sumdif62 = document.getElementById('dif62').value;
	sumdif63 = document.getElementById('dif63').value;
	sumdif64 = document.getElementById('dif64').value;
	sumdif65 = document.getElementById('dif65').value;
	sumdif66 = document.getElementById('dif66').value;
	sumdif67 = document.getElementById('dif67').value;
	sumdif68 = document.getElementById('dif68').value;
	sumdif69 = document.getElementById('dif69').value;
	sumdif70 = document.getElementById('dif70').value;
	sumdif71 = document.getElementById('dif71').value;
	sumdif72 = document.getElementById('dif72').value;
	sumdif73 = document.getElementById('dif73').value;
	sumdif74 = document.getElementById('dif74').value;
	sumdif75 = document.getElementById('dif75').value;
    document.getElementById('diftot').value = parseFloat(sumdif1) + parseFloat(sumdif2) + parseFloat(sumdif3) + parseFloat(sumdif4) + parseFloat(sumdif5) + parseFloat(sumdif6) + parseFloat(sumdif7)  + parseFloat(sumdif8) + parseFloat(sumdif9) + parseFloat(sumdif10) + parseFloat(sumdif11) + parseFloat(sumdif12) + parseFloat(sumdif13) + parseFloat(sumdif14) + parseFloat(sumdif15)  + parseFloat(sumdif16) + parseFloat(sumdif17) + parseFloat(sumdif18) + parseFloat(sumdif19) + parseFloat(sumdif20) + parseFloat(sumdif21) + parseFloat(sumdif22) + parseFloat(sumdif23) + parseFloat(sumdif24) + parseFloat(sumdif25) + parseFloat(sumdif26) + parseFloat(sumdif27) + parseFloat(sumdif28) + parseFloat(sumdif29) + parseFloat(sumdif30) + parseFloat(sumdif31)  + parseFloat(sumdif32)  + parseFloat(sumdif33)  + parseFloat(sumdif34) + parseFloat(sumdif35) + parseFloat(sumdif36) + parseFloat(sumdif37) + parseFloat(sumdif38) + parseFloat(sumdif39) + parseFloat(sumdif40)+ parseFloat(sumdif41) + parseFloat(sumdif42) + parseFloat(sumdif43) + parseFloat(sumdif44) + parseFloat(sumdif45) + parseFloat(sumdif46) + parseFloat(sumdif47) + parseFloat(sumdif48) + parseFloat(sumdif49) + parseFloat(sumdif50) + parseFloat(sumdif51)  + parseFloat(sumdif52) + parseFloat(sumdif53) + parseFloat(sumdif54) + parseFloat(sumdif55) + parseFloat(sumdif56) + parseFloat(sumdif57) + parseFloat(sumdif58) + parseFloat(sumdif59) + parseFloat(sumdif60) + parseFloat(sumdif61) + parseFloat(sumdif62) + parseFloat(sumdif63) + parseFloat(sumdif64) + parseFloat(sumdif65) + parseFloat(sumdif66) + parseFloat(sumdif67) + parseFloat(sumdif68) + parseFloat(sumdif69) + parseFloat(sumdif70) + parseFloat(sumdif71) + parseFloat(sumdif72) + parseFloat(sumdif73) + parseFloat(sumdif74)  + parseFloat(sumdif75);  
	guia75 = document.getElementById('guia75');
	  if(guia75.value == "" && cane75 > 0)
	{
		document.getElementById('guia75').value= 'Completar Campo';
	}
if(cane75 != "")
	{
    if(total < 0 || total2 < 0 || total3 < 0 || total4 < 0||total5 < 0||total6 < 0||total7 < 0|| total8 < 0 || total9 < 0 || total10 < 0 || total11 < 0 || total12 < 0 || total13 < 0 || total14 < 0 || total15 < 0 || total16 < 0 || total17 < 0|| total18 < 0 || total19 < 0 || total20 < 0|| total21 < 0 || total22 < 0 || total23 < 0 || total24 < 0 || total25 < 0 || total26 < 0 || total27 < 0 || total28 < 0 || total29 < 0 || total30 < 0|| total31 < 0 || total32 < 0 || total33 < 0 || total34 < 0 || total35 < 0|| total36 < 0 || total37 < 0|| total38 < 0 || total39 < 0|| total40 < 0|| total41 < 0  || total42 < 0 || total43 < 0 || total44 < 0 || total45 < 0 || total46 < 0|| total47 < 0 || total48 < 0|| total49 < 0 || total50 < 0 || total51 < 0 || total52 < 0 || total53 < 0 || total54 < 0|| total55 < 0 || total56 < 0 || total57 < 0 || total58 < 0 || total59 < 0 || total60 < 0 || total61 < 0 || total62 < 0|| total63 < 0 || total64 < 0 || total65 < 0 || total66 < 0 || total67 < 0|| total68 < 0|| total69 < 0 || total70 < 0 || total71 < 0|| total72 < 0|| total73 < 0|| total74 < 0 || total75 < 0  || guia1.value == "Completar Campo"||guia2.value == "Completar Campo"||guia3.value == "Completar Campo"|| guia4.value == "Completar Campo"|| guia5.value == "Completar Campo"|| guia6.value == "Completar Campo"|| guia7.value == "Completar Campo"|| guia8.value == "Completar Campo"|| guia9.value ==  "Completar Campo"|| guia10.value == "Completar Campo"|| guia11.value == "Completar Campo"|| guia12.value == "Completar Campo"||guia13.value == "Completar Campo"|| guia14.value == "Completar Campo"|| guia15.value == "Completar Campo"|| guia16.value == "Completar Campo"|| guia17.value == "Completar Campo"|| guia18.value == "Completar Campo"|| guia19.value == "Completar Campo"||guia20.value == "Completar Campo"|| guia21.value == "Completar Campo"|| guia22.value == "Completar Campo"|| guia23.value == "Completar Campo"|| guia24.value == "Completar Campo"|| guia25.value == "Completar Campo"|| guia26.value == "Completar Campo"|| guia27.value == "Completar Campo"|| guia28.value == "Completar Campo"|| guia29.value == "Completar Campo"|| guia30.value == "Completar Campo"|| guia31.value == "Completar Campo"|| guia32.value == "Completar Campo"|| guia33.value == "Completar Campo"|| guia34.value == "Completar Campo"|| guia35.value == "Completar Campo"|| guia36.value == "Completar Campo"|| guia37.value == "Completar Campo"|| guia38.value == "Completar Campo"|| guia39.value == "Completar Campo"|| guia40.value == "Completar Campo"|| guia41.value == "Completar Campo"|| guia42.value == "Completar Campo"|| guia43.value == "Completar Campo"||guia44.value == "Completar Campo"||guia45.value == "Completar Campo"|| guia46.value == "Completar Campo"|| guia47.value == "Completar Campo"|| guia48.value == "Completar Campo"|| guia49.value == "Completar Campo"||guia50.value == "Completar Campo"||guia51.value == "Completar Campo"||guia52.value == "Completar Campo"||guia53.value == "Completar Campo"|| guia54.value == "Completar Campo"|| guia55.value == "Completar Campo"|| guia56.value == "Completar Campo"|| guia57.value == "Completar Campo"|| guia58.value == "Completar Campo"|| guia59.value == "Completar Campo"||guia60.value == "Completar Campo"|| guia61.value == "Completar Campo"|| guia62.value == "Completar Campo"|| guia63.value == "Completar Campo"|| guia64.value == "Completar Campo"|| guia65.value == "Completar Campo"||guia66.value == "Completar Campo"|| guia67.value == "Completar Campo"||guia68.value == "Completar Campo"|| guia69.value == "Completar Campo"|| guia70.value == "Completar Campo"||guia71.value == "Completar Campo"|| guia72.value == "Completar Campo"|| guia73.value == "Completar Campo"|| guia74.value == "Completar Campo"||guia75.value == "Completar Campo")  
	{
		ingresar.disabled=true;

	}
	else
	{
		ingresar.disabled=false;
	}		
	}
													
		
}