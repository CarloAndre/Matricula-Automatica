$(document).ready(function(){
    var contar = 0;
    var seccion = '';
    var id = 0;
    $('button.btn-danger').attr("disabled", true);
    $('button.btn-primary').attr("disabled", true);
    $('button.btn-default').hide();
    var supercadena = '';
    $('button.elegir').click(function(e){
      //$(this).attr("disabled", true);
      e.preventDefault();
      var valor = $(this).val();
      var x = parseInt(valor);
      id = x;
        //$("button.btn-danger[value ="+x+"]").removeAttr("disabled");
      contar = contar + 1;
      $("button.btn-primary").removeAttr("disabled");
      // var a = $("table tr:eq("+x+") td:eq(0)")[0];
      var s = $("#codCurso"+x).html();
      //
      supercadena = supercadena + " " + s;
      //console.log(supercadena);
      // var children = $("tr td")[0]
      // var cadena =  $('.codCurso').html();
        //var ka = ".m"+x;
        //console.log(ka);

        seccion = '';
      //var seccion = $(".m"+x .seccion).val();
       $("button.envioSeccion").click(function(e){
           e.preventDefault();
            $("button.elegir[value ="+id+"]").attr("disabled", true);
            $("button.optional[value ="+id+"]").attr("disabled", true);
            $("button.resetear[value ="+id+"]").removeAttr("disabled");
           //supercadena = supercadena + " " + s + "UWXV";
            //console.log(supercadena);
        });
    });

    $("button.optional").click(function(e){
        e.preventDefault();
        var valor = $(this).val();
        var x = parseInt(valor);
        $("button.btn-danger[value ="+x+"]").removeAttr("disabled");
        contar = contar + 1;
        var s = $("#codCurso"+x).html();
        e.preventDefault();
        $(this).attr("disabled", true);
        supercadena = supercadena + " " + s + "UWXV";
        $("button.btn-primary").removeAttr("disabled");
        //console.log(supercadena);
    });
    $("button.seccion").click(function(e){
        e.preventDefault();
        var seccion = $(this).val();
        $(this).attr("disabled", true);
        supercadena = supercadena + seccion;
        //console.log(supercadena);
    });
    $('button.resetear').click(function(e){
      e.preventDefault();
      $(this).attr("disabled", true);
      var valor = $(this).val();
      var x = parseInt(valor);
      contar = contar - 1;
      if (contar === 0){
        $("button.btn-primary").attr("disabled", true);
      }
      $("button.optional[value ="+x+"]").removeAttr("disabled");
      $("button.elegir[value ="+x+"]").removeAttr("disabled");
      // var a = $("table tr:eq("+x+") td:eq(0)")[0];
      var s = $("#codCurso"+x).html();
        var recoger = supercadena.search(s);
        var buscad = '';
        for (var iniArray = recoger ; iniArray < supercadena.length + 1; iniArray++){
            if(supercadena[iniArray] != ' '){
                buscad = buscad + supercadena[iniArray];
                if(supercadena[iniArray+1] == ' ' || supercadena[iniArray+1] == null){
                    supercadena = supercadena.replace(" " + buscad,"");
                    $("#myModal"+x+" button.seccion").removeAttr("disabled");
                    break;
                }
            }
        }
        //console.log(supercadena);
    });
    $('#generar').click(function(e){
            e.preventDefault();
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("u1").innerHTML = "";
                    document.getElementById("u1").innerHTML = xhttp.responseText;
                    color();
                    $('button.btn-default').show(3000);
                    $('#Cursos').hide(3000);
                    $('body,html').animate({
                        scrollTop:'0px'
                    },3000);
                    $('#generar').hide();
                }
                color();
            };
            xhttp.open("GET", "genera.php?cadena="+supercadena, true);
            xhttp.send();
        //console.log(supercadena);
    });
    $('#regresar').click(function(){
      location.reload();
    });
});
