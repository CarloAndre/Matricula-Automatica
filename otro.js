$(document).ready(function(){
    var contar = 0;
    $('button.btn-danger').attr("disabled", true);
    $('button.btn-primary').attr("disabled", true);
    $('button.btn-default').hide();
    var supercadena = '';
    $('button.btn-success').click(function(e){
      $(this).attr("disabled", true);
      e.preventDefault();
      var valor = $(this).val();
      var x = parseInt(valor);
      $("button.btn-danger[value ="+x+"]").removeAttr("disabled");
      contar = contar + 1;
      $("button.btn-primary").removeAttr("disabled");
      // var a = $("table tr:eq("+x+") td:eq(0)")[0];
      var s = $("#codCurso"+x).html();
      supercadena = supercadena + s +" ";
      // console.log(supercadena);
      // var children = $("tr td")[0]
      // var cadena =  $('.codCurso').html();
    });
    $('button.btn-danger').click(function(e){
      $(this).attr("disabled", true);
      var valor = $(this).val();
      var x = parseInt(valor);
      $("button.btn-success[value ="+x+"]").removeAttr("disabled");
      contar = contar - 1;
      if (contar === 0 ) {
        $('button.btn-primary').attr("disabled", true);
      }
      // $('button.btn-success').removeAttr("disabled");
      e.preventDefault();
      var valor = $(this).val();
      var x = parseInt(valor);
      // var a = $("table tr:eq("+x+") td:eq(0)")[0];
      var s = $("#codCurso"+x).html();
      supercadena = supercadena.replace(s+" ","");
      // console.log(supercadena);
    });
    $('#generar').click(function(e){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("u1").innerHTML = "";
            document.getElementById("u1").innerHTML = xhttp.responseText;
            $('button.btn-default').show(3000);
            $('#Cursos').hide(3000);
            $('body,html').animate({
              scrollTop:'0px'
            },3000);
            $('#generar').hide();
          }
          // color();
        };
        xhttp.open("GET", "genera.php?cadena="+supercadena, true);
        xhttp.send();
    });
    $('button.btn-danger').click(function(e){
      $(this).attr("disabled", true);
      var valor = $(this).val();
      var x = parseInt(valor);
      $("button.btn-success[value ="+x+"]").removeAttr("disabled");
      // $('button.btn-success').removeAttr("disabled");
      e.preventDefault();
      var valor = $(this).val();
      var x = parseInt(valor);
      // var a = $("table tr:eq("+x+") td:eq(0)")[0];
      var s = $("#codCurso"+x).html();
      supercadena = supercadena.replace(s+" ","");
      // console.log(supercadena);
    });

    $('#regresar').click(function(e){
      location.reload();
    });
});
