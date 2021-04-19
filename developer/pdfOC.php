<?php
require_once('Conexion/Conexion.php');
require_once('script-descripcion-oc.php');
include('convertToPDF.php');


doPDF('ejemplo',$html.$html1.$htmla.$htmlb.$htmlc.$html2.$html3.$htmlaa.$htmlbb.$htmlcc,true,'Style/pdfOC.css');

?>
