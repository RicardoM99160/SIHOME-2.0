$(document).ready(function() { 

      
        $.ajax({
            type: "POST",
            url: "login.php/construirGrafica",
            success:function (data) {
                console.log(data);
            },
            error:function () {
                console.log('sida');
            }
        }); 
}); 

  

function mostrargraficos()
        {
            
                $.post("<?php echo constant('URL');?>controllers/login/construirGrafica",
                function (data)
                {   
                    console.log("osea si funk pero no?/");
                    console.log(data);
                    var hombres=data['hombres'];
                    var mujeres=data['mujeres']; 
                    
                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                labels: ['Hombres','Mujeres'],
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: hombres,mujeres
                            }
                        ]
                    };
                    //id de canvas
                    var graphTarget = $("#graficoGenero"); 
                    //Grafico de pastel
                    var pastelGenero = new Chart(graphTarget, {
                        type: 'pie',
                        data: chartdata
                    });

                  

                });
            
        }