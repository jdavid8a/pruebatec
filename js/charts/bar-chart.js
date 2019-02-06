(function ($) {
 "use strict";
	 /*----------------------------------------*/
	/*  1.  Bar Chart
	/*----------------------------------------*/
    var labels=new Array();
    var values=new Array();;
    $.ajax({
            url: "../libs/scriptsAJAX/getDataGraphic.php",
            type: "POST",
            data: {},
            dataType: "html",
            async:false,
            success: function(data)
            {  
                data=data.split(";");
                
                labels=data[1].split(":");
                values=data[0].split(":");
            }
    });
	var ctx = document.getElementById("barchart1");
	var barchart1 = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: labels,
                        minValue: 0,
			datasets: [{
				label: "votantes",
				data: values,
				minValue: 0,
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		},
                options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
                hover: {
                    mode: 'label'
                },
                scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true
                                
                            }
                        }],
                    yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                
                                stepValue: 5
                            }
                        }]
                },
                
            }
	});
		
		
})(jQuery); 