$(document).ready(function() { 

      
        $.ajax({
            type: "GET",
            url: BASE_URL + "/api",
            dataType: 'json',
            success:function (data) {  

                Chart.defaults.global.tooltips.enabled = false; 

                var datosGrafica = {
                    labels: [
                        "Hombres",
                        "Mujeres"
                    ],
                    datasets: [
                        {
                            data: [data[0].hombres,data[0].mujeres],
                            backgroundColor: [
                                "#FFC858",
                                "#1E97E4"
                            ],                            
                            hoverBackgroundColor: [
                                "#FFC858",
                                "#1E97E4"
                            ],
                        }]
                    };
                    var opcionesGrafico = { 
                        legend: {
                         position: 'bottom'
                        },
                        title: {
                          display: false,
                          text: 'Grafica de genero'
                        },
                        animation: {
                          animateRotate: false,
                          animateScale: true
                        },
                        responsive:true,
                        plugins:{
                            labels:{
                                //render: 'value',
                                fontSize: 26,
                                showZero: true,
                                fontColor: '#fff',
                                fontStyle: 'normal',
                                fontFamily:'Arial',
                                outsidePadding:4,
                                textMargin:4
                            }
                        }
                      };
                      
                    //id de canvas
                    var graphTarget = $("#graficoGenero"); 
                    //Grafico de pastel
                    var pastelGenero = new Chart(graphTarget, {
                        type: 'pie',
                        data: datosGrafica,
                        options: opcionesGrafico
                    });


            },
            error:function () {
                console.log('sida');
            }
        }); 


}); 

   