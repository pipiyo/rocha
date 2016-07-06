<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
mysql_select_db($database_conn, $conn);
$RUT = $_POST["txt_rut"];	
$query_registro = "SELECT * FROM empleado WHERE RUT ='".$RUT."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];

while($row = mysql_fetch_array($result1))
  {
	$RUT = $row["RUT"];
	$numero++;
  }
mysql_free_result($result1);

if($numero != 0)
{
$RUT = $_POST['txt_rut'];
$RUT1 = $_POST['txt_nrut'];
$NOMBRE = $_POST['txt_nombre'];
$APELLIDO_PATERNO = $_POST['txt_apellido_paterno'];
$APELLIDO_MATERNO = $_POST['txt_apellido_materno'];
$DIRECCION = $_POST['txt_direccion'];
$TELEFONO = $_POST['txt_telefono'];
$CELULAR = $_POST['txt_celular'];
$EMAIL = $_POST['txt_email'];
$COMUNA = $_POST['txt_comuna'];
$CARGO = $_POST['txt_cargo'];
$USUARIO = $_POST['txt_user'];
$PASS = $_POST['txt_pass'];
$AREA = $_POST['txt_area'];
$CODIGO_USUARIO1 = $_POST['txt_cod_user'];
$DEPARTAMENTO = $_POST['departamento'];
if($RUT1 == "")
{
	$RUT1 = $RUT;
}

mysql_select_db($database_conn, $conn);
$sql = "UPDATE empleado SET RUT = '".($RUT1)."', NOMBRES = '".($NOMBRE)."',APELLIDO_PATERNO = '" .($APELLIDO_PATERNO). "', APELLIDO_MATERNO = '".($APELLIDO_MATERNO)."', DIRECCION = '".($DIRECCION)."', TELEFONO = '".($TELEFONO). "', CELULAR = '".($CELULAR)."',EMAIL = '" .($EMAIL). "', COMUNA = '".($COMUNA)."', CARGO = '".($CARGO)."', AREA = '".($AREA)."', DEPARTAMENTO = '".($DEPARTAMENTO)."' WHERE RUT = '".($RUT)."'";
$result = mysql_query($sql, $conn) or die(mysql_error());






if($USUARIO != "")
{
$query_usuario = "SELECT CODIGO_USUARIO,PASS FROM usuario WHERE RUT ='".$RUT."'";
$result_usuario = mysql_query($query_usuario, $conn) or die(mysql_error());
$numero = 0;
while($row = mysql_fetch_array($result_usuario))
  {
    $COD_UPDATE = $row["CODIGO_USUARIO"];
    $PASSBD = $row["PASS"];
  }
mysql_free_result($result_usuario );

$query_registroa = "SELECT MAX(CODIGO_USUARIO) as cuenta FROM USUARIO";
$resulta = mysql_query($query_registroa, $conn) or die(mysql_error());
$cuenta = 0;

while($row = mysql_fetch_array($resulta))
  {
	$cuenta = $row["cuenta"];
  }
mysql_free_result($resulta);

$cuenta++; 

$salt = substr(base64_encode(md5('30')), 0, 22);
$salt = strtr($salt, array('+' => '.')); 
$hash = crypt($PASS, '$2y$10$' . $salt);



if($COD_UPDATE == "")
{	
$sql2 = "INSERT INTO usuario (NOMBRE_USUARIO,PASS,TIPO_USUARIO,ACTIVO,RUT)values ('".$USUARIO."','".$hash."','".$AREA."','SI','".$RUT1."')";
$result2 = mysql_query($sql2, $conn) or die(mysql_error());
$CODIGO_USUARIO1 = $cuenta;
}
else
{

if ($PASS == "") 
{
$sql1 = "UPDATE usuario SET RUT = '".($RUT1)."', NOMBRE_USUARIO = '".($USUARIO)."',PASS = '" .$PASSBD. "',TIPO_USUARIO = '" .$AREA. "' WHERE CODIGO_USUARIO = '".($COD_UPDATE)."'";
$result1 = mysql_query($sql1, $conn) or die(mysql_error());
}
else
{
$sql1 = "UPDATE usuario SET RUT = '".($RUT1)."', NOMBRE_USUARIO = '".($USUARIO)."',PASS = '" .$hash. "',TIPO_USUARIO = '" .$AREA. "' WHERE CODIGO_USUARIO = '".($COD_UPDATE)."'";
$result1 = mysql_query($sql1, $conn) or die(mysql_error());
}

}

if (isset($_POST['INF']))
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['INF']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());	
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['INF']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '1'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());	
} 
if (isset($_POST['DAM']))  
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['DAM']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());	
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['DAM']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '2'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());	
} 
if (isset($_POST['SIL']))  
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['SIL']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());	
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['SIL']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '3'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());	
} 
if (isset($_POST['GG']))  
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['GG']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());	
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['GG']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '4'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());	
} 
if (isset($_POST['GC']))  
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['GC']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());	
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['GC']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '5'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());	
} 
if (isset($_POST['GO']))  
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['GO']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());	
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['GO']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '6'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());	
} 
if (isset($_POST['OPE']))  
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['OPE']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());	
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['OPE']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '7'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());	
} 
if (isset($_POST['DIS']))  
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['DIS']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());	
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['DIS']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '8'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());	
} 
if (isset($_POST['VEN']))  
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['VEN']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());	
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['VEN']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '9'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());	
} 
if (isset($_POST['ADM']))  
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['ADM']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());	
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['ADM']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '10'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());	
} 
if (isset($_POST['TEC']))  
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['TEC']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());	
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['TEC']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '11'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());	
} 
if (isset($_POST['INS']))  
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['INS']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());	
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['INS']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '12'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());	
} 
if (isset($_POST['PRO']))  
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['PRO']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());	
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['PRO']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '13'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());	
} 
if (isset($_POST['DES']))  
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['DES']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());	
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['DES']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '14'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());	
} 
if (isset($_POST['BOD']))  
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['BOD']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());	
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['BOD']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '15'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());	
} 
if (isset($_POST['ADQ']))  
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['ADQ']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());	
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['ADQ']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '16'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());	
}

if (isset($_POST['GP']))  
{
$sqla = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '".$_POST['GP']."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error()); 
 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_POST['GP']."','".$CODIGO_USUARIO1."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
else
{
$sqlb = "delete from grupo_usuario where CODIGO_USUARIO = '".$CODIGO_USUARIO1."' AND CODIGO_GRUPO = '17'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error()); 
}
}


/*Script empleado equipo*/

$sqlb = "delete from equipo where RUT_LIDER = '".$RUT."'";
$resultb = mysql_query($sqlb, $conn) or die(mysql_error());
$contador = 1;
while($contador <= 50)
{
  if (isset($_POST['txt_rutem'.$contador]))  
  {
    $NOMEQ = $_POST["txt_rutem".$contador];
    $query_registro = "select RUT, concat(NOMBRES,' ',APELLIDO_PATERNO,' ',APELLIDO_MATERNO) AS nombres
    from empleado HAVING nombres like '%".$NOMEQ."%'";
    $result = mysql_query($query_registro, $conn) or die(mysql_error());
    $numero = 0;
    while($row = mysql_fetch_array($result))
    {
    $RUTSUBORDI = $row["RUT"];
    $sql_insert = "INSERT INTO equipo (RUT_LIDER,RUT_SUB) VALUES ('".$RUT."','".$RUTSUBORDI ."');";
    $resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
    }
    mysql_free_result($result);
  }
  $contador++;
}



}
header("Location:Empleados.php");
?>