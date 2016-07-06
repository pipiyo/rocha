$(document).ready(function(){
  $(".cuerpo").change(function(e){
    cod_num = this.id.substring(6);
    cod_id = this.id; 
    cuerpo_valor = $("#"+cod_id).val(); 
    pom_valor = $("#pom"+cod_num).val(); 
    codigo_valor = $("#codigo"+cod_num).val(); 
    
    if(pom_valor == "l")
    {
      $.ajax({
        type: "POST",
        url: 'ajax_acabado.php',
        data: { 'cod': codigo_valor , 'fam':  pom_valor, 'cue': cuerpo_valor},
        dataType:'json',
        error: function(xhr, status, error) {
        alert(xhr.responseText);
      },
        success: function(data) {
        if(data.length > 0)
        {
          $("#txt-canto"+cod_num).remove();
          $(".tbl-canto"+cod_num).append("<select class='txt-canto form' id='txt-canto"+cod_num+"'></select>");
        }
        var cuenta = 0;
        for(var i=0;i<data.length; i++)
        {
          if(data[i] != null)
          {
            var clase = data[i].replace(" ", "");
            var cantidad = $(".option"+clase+cod_num).size();
            if(cantidad == 0)
            {
              $("#txt-canto"+cod_num).append("<option class='option"+clase+cod_num+"'>"+data[i]+"</option>");
              cuenta++;
            }
          }
        }
        if(cuenta == 0)
        {
          $("#txt-canto"+cod_num).remove();
        }
      }
      });
    }
  });
});


$(document).ready(function(){
  $('.btn-ingreso').live( "click", function(){
  
      var filas_total = $(".txt-filas").val();
      var radicado = $(".txt-radicado").val();
      var insert = "";

      var cuerpo = Array();
      var metales = Array();
      var frente = Array();
      var trascara = Array();
      var espesor = Array();
      var canto = Array();
      var idp = Array();

      for(i=0;i<filas_total;i++)
      {
         /* idp */
        if($("#cuerpo"+i).length) 
        {
          idp[i] = $("#idp"+i).val();
        } 
        else
        {
          idp[i] = "";
        } 

        /* Cuerpo */
        if($("#cuerpo"+i).length) 
        {
          cuerpo[i] = $("#cuerpo"+i).val();
        } 
        else
        {
          cuerpo[i] = "";
        } 

        /* Metales */
        if($("#metales"+i).length) 
        {
           metales[i] = $("#metales"+i).val();
        } 
        else
        {
           metales[i] = "";
        }

        /* Frente */
        if($("#frente"+i).length) 
        {
          frente[i] = $("#frente"+i).val();
        } 
        else
        {
          frente[i] = "";
        }

        /* Trascara */
        if($("#trascara"+i).length) 
        {
          trascara[i] = $("#trascara"+i).val();
        }
        else
        {
          trascara[i] = "";
        }

        /* Espesor */
        if($("#espesor"+i).length) 
        {
          espesor[i] = $("#espesor"+i).val();
        }
        else
        {
          espesor[i] = "";
        }

        /* Canto */
        if($("#canto"+i).length) 
        {
          canto[i] = $("#canto"+i).val();
        }
        else
        {
          canto[i] = "";
        }
      }

      /* Ajax */

      $.ajax({
        type: "POST",
        url: 'ajax-ingreso-acabado.php',
        data: { 'idp': idp , 'cuerpo': cuerpo , 'frente': frente, 'metales': metales, 'trascara': trascara, 'espesor': espesor, 'canto': canto},
        dataType:'json',
        error: function(xhr, status, error) {
        alert(xhr.responseText);
      },
        success: function(data) {
          location.href='DescripcionRadicado.php?txt_codigo_proyecto2='+radicado;
        }
      });
   });
});