(function ($) {
 "use strict";
  

            c3.generate({
                bindto: '#stocked',
                data:{
                    columns: [
                        ['data881', 30,200,100,400,150,250],
                        ['data2', 50,20,10,40,15,25]
                    ],
                    
                    type: 'bar'
                }
            });

            c3.generate({
                bindto: '#pie',
                data:{
                    columns: [
                        ['data1', 30],
                        ['data2', 120]
                    ],
                    colors:{
                        data1: '#006DF0',
                        data2: '#933EC5'
                    },
                    type : 'pie'
                }
            });



})(jQuery); 