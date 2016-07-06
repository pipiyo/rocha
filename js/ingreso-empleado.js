function myFunction()
{

contador = 1;

while(contador < 50)
{
var con = document.getElementById("con" + contador);  
var pro = document.getElementById("txt_rutem" + contador);  
if(con.style.display == 'none')
{
  pro.disabled = false;
  con.style.display = '';
  contador = contador + 50;
}
contador++;
}

}