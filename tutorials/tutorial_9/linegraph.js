$(document).ready(function(){
    $.ajax({
        url: "http://localhost/training/php_training/tutorials/tutorial_9/mydata.php",
        method: "GET",
        success: function(data) {
            var name = [];
            var age = [];

            for(var value in data) {
                name.push(data[value].name);
                age.push(data[value].age);
            }
        
            var chartdata = {
                labels: name,
                datasets : [
                    {
                        label: 'Users Age ',
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: age
                    }
                ]
            };
        
            var ctx = $("#mycanvas");    
            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata
        });
        },
        error: function(data) {
        }
    });
});