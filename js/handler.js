function color (){
    //Clase body bCurso
    $('button.matricular').click(function(e){
        $('button#regresar').hide();
        var valor = $(this).val();
        var x = parseInt(valor);
        $("tbody.bCurso"+x).each(function(){
            var ver = [];
            $(this).children("tr").each(function(){
                $(this).children("td.cuerpoDia").each(function(){
                    var x = $(this).html();
                    var buscar = ver.indexOf(x);
                    if (buscar === -1){
                        ver.push(x);
                    }
                });
            });
            $.post( "matricula.php", { cadena : ver },function( data ){
                $('#u1').html(data);
            });
        });
    });
}