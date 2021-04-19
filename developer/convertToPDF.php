<?php

function doPDF($path='',$content='',$body=false,$style='',$mode=false,$paper_1='P',$paper_2='letter')
{    
    if( $body!=true and $body!=false ) $body=false;
    if( $mode!=true and $mode!=false ) $mode=false;

    if( $body == true )
    {
        $content='
        <!doctype html>
        <html>
        <head>
            <link rel="stylesheet" href="'.$style.'" type="text/css" />
        </head>
        <body>'
            .$content.
        '</body>
        </html>';
    }

    if( $content!='' )
    {
        ob_start();
        
        echo '<page>'.$content.'</page>';
        
        //Añadimos la extensión del archivo. Si está vacío el nombre lo creamos
        $path!='' ? $path .='.pdf' : $path = crearNombre(10);  
            
        $content = ob_get_clean(); 
        require_once('html2pdf/html2pdf.class.php'); 
        
        //Orientación / formato del pdf y el idioma.
        $pdf = new HTML2PDF($paper_1,$paper_2,'es'/*, array(10, 10, 10, 10) /*márgenes*/); //los márgenes también pueden definirse en <page> ver documentación
        
        $pdf->WriteHTML($content);
        
        if($mode==false)
        {
            //El pdf es creado "al vuelo", el nombre del archivo aparecerá predeterminado cuando le demos a guardar
            $pdf->Output($path); // mostrar
            //$pdf->Output('ejemplo.pdf', 'D');  //forzar descarga 
        }
        else
        {
            $pdf->Output($path, 'F'); //guardar archivo ( ¡ojo! si ya existe lo sobreescribe )
            header('Location: '.$path); // abrir
        }
    
    }

}

function crearNombre($length)
{
    if( ! isset($length) or ! is_numeric($length) ) $length=6;
    
    $str  = "0123456789abcdefghijklmnopqrstuvwxyz";
    $path = '';
    
    for($i=1 ; $i<$length ; $i++)
      $path .= $str{rand(0,strlen($str)-1)};

    return $path.'_'.date("d-m-Y_H-i-s").'.pdf';    
}

?>