$(document).ready(function() {
  //VISIBLE
  $('.hidden').hide();
  $('button').hide();
  $('#selectCurso').change(function() {
    $('input:radio').attr('checked', false);
    $('.hidden').show('slow/400/fast');
    $('button').show();
  });
  //SELECT
  $('select').material_select();
  //VALIDAR RADIOBUTTON

  // if($('input[name="answer_option1"]:checked').length==0) {
  //    alert('Please select one option');
  // }
  $("button").click(function (event) {
  var names = [];
  var x = 0;
    $('input:radio').each(function () {
        var rname = $(this).attr('name');
        if ($.inArray(rname, names) == -1) names.push(rname);
    });

    //do validation for each group
    $.each(names, function (i, name) {
        if ($('input[name="' + name + '"]:checked').length == 0) {
            event.preventDefault();
            x = x + 1;
        }
    });
    if (x >= 1) {
      Materialize.toast('Por favor completa la encuesta', 1000);
    }
  });

  // //ENCUESTA
  //   $("button").click(function () {
  //     var pregunta1 = $('input:radio[name=Pregunta1]:checked').val();
  //     var pregunta2 = $('input:radio[name=Pregunta2]:checked').val();
  //     var pregunta3 = $('input:radio[name=Pregunta3]:checked').val();
  //     var pregunta4 = $('input:radio[name=Pregunta4]:checked').val();
  //     var pregunta5 = $('input:radio[name=Pregunta5]:checked').val();
  //     var pregunta6 = $('input:radio[name=Pregunta6]:checked').val();
  //
  //     var xhttp = new XMLHttpRequest();
  //
  //     var queryString = "?p1=" + pregunta1 ;
  //     var queryString += "&num="special + "&id2=" + id2;
  //     // queryString +=  "&id2=" + id2;
  //     queryString +=  "&num=" + voto;
  //     queryString +=  "&pganador=" + ganador;
  //     queryString +=  "&pperdedor=" + perdedor;
  //     xhttp.open("GET", "contar.php" + queryString, true);
  //     xhttp.send(null);
  //     xhttp.onreadystatechange = function() {
  //       if (xhttp.readyState == 4 && xhttp.status == 200) {
  //         document.getElementById("u2").innerHTML = xhttp.responseText;
  //       }
  //     };
  //     xhttp.open("GET", "actual2.php" + special, true);
  //     xhttp.send();
  //   }else if(e == 2){
  //     var ganador = pos2 + win(voto,esperado,24);
  //     var perdedor =pos + loss(voto2,esperado2,24);
  //     var special = "?id=" + id ;
  //     var special = "?id=" + id2 ;
  //     var queryString = special + "&id2=" + id;
  //     // queryString +=  "&id2=" + id;
  //     queryString +=  "&pganador=" + ganador;
  //     queryString +=  "&pperdedor=" + perdedor;
  //     queryString +=  "&num=" + voto2;
  //
  //     xhttp.open("GET", "contar.php" + queryString, true);
  //     xhttp.send(null);
  //     xhttp.onreadystatechange = function() {
  //       if (xhttp.readyState == 4 && xhttp.status == 200) {
  //         document.getElementById("u1").innerHTML = xhttp.responseText;
  //       }
  //     };
  //     xhttp.open("GET", "actual.php" + special, true);
  //     xhttp.send();
  //   }
  // };

//
// console.log(pregunta1);
// console.log(pregunta2);
// console.log(pregunta3);
// console.log(pregunta4);
// console.log(pregunta5);
// console.log(pregunta6);
//       // $("#formulario").submit();
    // });
  });
