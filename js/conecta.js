$(document).ready(function(){
    var datas = new Array();
    var prueba = [];
    var a = [];
    var course = $('p#course').html();
    $.post( "x.php", { fkCursoxSeccion : course } ,function(datos){
        var ar = [];
        var x = [];
        var dataJson = eval(datos);
        for(var i in dataJson){
            //console.log("Id :"+ dataJson[i].Id + " - a :" + dataJson[i].a + " - b :" + dataJson[i].b);
            ar.push(dataJson[i].b);
            //  console.log(ar[i][1]);
        }
        //console.log(ar);
        var cadena = new Array(' ');
        /*for(var i  = 0 ; i < ar.length ; i++){
         //console.log(ar[i]);
         for (var j = 0 ; j < ar[i].length ; j++){
         console.log(ar[1][j]);
         //x[i][j] = ar[i][j]
         }
         //cadena = cadena + ar[i]
         }*/
        for(var i  = 0 ; i < ar.length ; i++){
            for (var j = 0 ; j < ar[i].length ; j++){
                if ((ar[i][j] != ' ') && (ar[i][j] != null)){
                    if (cadena[j] == null){
                        cadena[j] = '';
                    }
                    cadena[j] = cadena[j] + ar[i][j];
                }
            }
            //cadena = cadena + ar[i][1];
            //cadena = cadena + ar[i]
        }

        //console.log(cadena);

        for (var ref = 1 ; ref < cadena.length ; ref = ref +2){
            for (var j = 1 ; j < 6 ; j++){
                if (datas[j] == null){
                    datas[j] = '';
                }
            }

            datas[1] = datas[1] + ',' + (cadena[ref].split("A").length-1);
            datas[2] = datas[2] + ',' + (cadena[ref].split("B").length-1);
            datas[3] = datas[3] + ',' + (cadena[ref].split("C").length-1);
            datas[4] = datas[4] + ',' + (cadena[ref].split("D").length-1);
            datas[5] = datas[5] + ',' + (cadena[ref].split("E").length-1);
        }

        for (var i = 1 ; i < 6 ; i++){
            console.log(datas[i]);
            prueba = datas[i].substr(1);
            if (a[i] == null){
                a[i] = '';
            }
            a[i] = prueba.split(',').map(function(item) {
                return parseInt(item, 10);
            });
            //console.log(datas[i]);
            //console.log(a[i]);
        }
        estados(a[1],a[2],a[3],a[4],a[5]);
    });
    function estados (a,b,c,d,e){
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Estadisticas'
            },
            xAxis: {
                categories: ['Pregunta1', 'Pregunta2', 'Pregunta3', 'Pregunta4', 'Pregunta5' , 'Pregunta6']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total de encuestas llenadas'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            legend: {
                align: 'right',
                x: -30,
                verticalAlign: 'top',
                y: 25,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                borderColor: '#CCC',
                borderWidth: 1,
                shadow: false
            },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black'
                        }
                    }
                }
            },
            series: [{
                name: 'A',
                data: a
            }, {
                name: 'B',
                data: b
            }, {
                name: 'C',
                data: c
            }, {
                name: 'D',
                data: d
            }, {
                name: 'E',
                data: e
            }]
        });
    }
});
