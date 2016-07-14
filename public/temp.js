var rootApp = angular.module('rootApp', ['myApp1','myApp2','myApp3','myApp4']);

var app4 = angular.module('myApp4', ['zingchart-angularjs']);

app4.controller('MainController4', function($scope) {

    var chartData = {

        // Specify your chart type here
        // Try replacing 'bar' with 'line'.
        "type":"bar",

        // Insert your data here
        "series":[
            {
                "values": [35, 42, 67, 89]
            },
            {
                "values": [28, 40, 39, 36]
            }
        ]
    };

// Render the chart!
    zingchart.render({
        id:'chartDiv',
        data:chartData,
        height:500,
        width:"100%"
    });

});


var app1 = angular.module('myApp1', ['zingchart-angularjs']);

app1.controller('MainController1', function($scope) {

    $scope.myJson = {
        type : "bar",
        title:{
            backgroundColor : "transparent",
            fontColor :"black",
            text : "Medication Adherence",
            fontSize : '20px',
        },
        backgroundColor : "white",
        series : [
            {
                values : [1,5,2,4,6],
                backgroundColor : "#4DC0CF"
            }
        ]
    };

    $scope.addValues = function(){
        var val = Math.floor((Math.random() * 10));
        console.log(val);
        $scope.myJson.series[0].values.push(val);
    }

});


var app2 = angular.module('myApp2', ['zingchart-angularjs']);

app2.controller('MainController2', function($scope) {

    $scope.myJson = {
        globals: {
            shadow: false,
            fontFamily: "Verdana",
            fontWeight: "100"
        },

        type: "pie",
        backgroundColor: "#fff",

        legend: {
            layout: "x3",
            position: "50%",
            borderColor: "transparent",
            marker: {
                borderRadius: 10,
                borderColor: "transparent"
            }
        },
        tooltip: {
            text: "%v thousands"
        },
        plot: {
            refAngle: "-90",
            borderWidth: "0px",
            valueBox: {
                placement: "in",
                text: "%npv %",
                fontSize: "15px",
                textAlpha: 1,
            }
        },
        series: [{
            text: "Metformin",
            values: [4660],
            backgroundColor: "#FA6E6E #FA9494",
        }, {
            text: "Diovan",
            values: [1807],
            backgroundColor: "#F1C795 #feebd2"
        }, {
            text: "Lexapro",
            values: [1611],
            backgroundColor: "#FDAA97 #FC9B87"
        }, {
            text: "Naproxen",
            values: [1341],
            backgroundColor: "#28C2D1"
        }, {
            text: "Blood Hypertension",
            values: [1269],
            backgroundColor: "#D2D6DE",
        }]
    };
});


var app3 = angular.module('myApp3', ['zingchart-angularjs']);

app3.controller('MainController3', function($scope) {

    $scope.myJson = {
        title : {
            text : "Glucose Level",
            fontSize : 20,
            fontColor : "black"
        },
        backgroundColor: "",
        globals: {
            shadow: false,
            fontFamily: "Arial"
        },
        type: "line",
        scaleX: {
            maxItems: 8,
            lineColor: "",
            lineWidth: "1px",
            tick: {
                lineColor: "",
                lineWidth: "1px"
            },
            item: {
                fontColor: "black"
            },
            guide: {
                visible: false
            }
        },
        scaleY: {
            lineColor: "",
            lineWidth: "1px",
            tick: {
                lineColor: "",
                lineWidth: "1px"
            },
            guide: {
                lineStyle: "solid",
                lineColor: "#249178"
            },
            item: {
                fontColor: "black"
            },
        },
        tooltip: {
            visible: false
        },
        crosshairX: {
            lineColor: "lightgrey",
            scaleLabel: {
                backgroundColor: "#fff",
                fontColor: "#323232"
            },
            plotLabel: {
                backgroundColor: "#fff",
                fontColor: "#323232",
                text: "%v",
                borderColor: "transparent"
            }
        },
        plot: {
            lineWidth: "2px",
            lineColor: "black",
            aspect: "spline",
            marker: {
                visible: false
            }
        },
        series: [{
            values: [989, 1364, 2161, 2644, 1754, 2015, 818, 77, 1260, 3912, 1671, 1836, 1901]
        }]
    }

});

//jQuery not required. Used here for demonstrative purposes.
$(function() {
    $("#resizable").resizable({
        handles: 'ne, se, sw, nw'
    });
});





