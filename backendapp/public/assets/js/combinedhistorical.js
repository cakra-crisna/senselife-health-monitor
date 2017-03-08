var totalPoints = 50;
var updateInterval = 1000;
var now = new Date().getTime();

var combinedDataset;
var heartrateData = [];
var temperatureData = [];
var stepData = [];
var calorieData = [];



var currentTotal = 0;
function setData(timestamp) {
    heartrateData.shift();
    temperatureData.shift();
    stepData.shift();
    calorieData.shift();

    if(!timestamp){
        timestamp = now;
    }
    
    while (currentTotal < totalPoints) {     
        var temp1 = [timestamp, currentheartRate];
        var temp2 = [timestamp, currentTemperature];
        var temp3 = [timestamp, currentCalorie];
        var temp4 = [timestamp, currentSteps];

        heartrateData.push(temp1);
        temperatureData.push(temp2);
        calorieData.push(temp3);
        stepData.push(temp4);
        currentTotal++;
    }
    --currentTotal;
}

var combinedOptions = {
    series: {
    	lines: {
            show: true,
            lineWidth: 1.2,
            fill: false
        }
    },
    grid: {
        hoverable: true,
        clickable: true
    },
    xaxis: {
        mode: "time",
        tickSize: [60, "second"],
        tickFormatter: function (v, axis) {
            var date = new Date(v);
 
            if (date.getSeconds() % 20 == 0) {
                var hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
                var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
                var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
 
                return hours + ":" + minutes + ":" + seconds;
            } else {
                return "";
            }
        },
        axisLabel: "Time",
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 10
    },
    yaxis: {
        tickSize: 10,
        axisLabel: "Todays Steps",
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 6
    },
    zoom: {
        interactive: true
    },
    pan: {
        interactive: true
    },
    legend: {        
        labelBoxBorderColor: "#fff"
    },

};
 
$(document).ready(function () {
    //setData();
    combinedDataset = [
        { label: "heartrate", data: heartrateData,color:"purple",lines: {
            show: true,
            lineWidth: 1.2,
            fill: false
        }},
        { label: "temperature", data: temperatureData,color:"red"},
        //{ label: "steps", data: stepData,color:"green"},
        //{ label: "calorie", data: calorieData,color:"yellow"}
    ]; 

    $.plot($("#combined-chart"), combinedDataset, combinedOptions);
    $("#combined-chart").bind("plothover", function (event, pos, item) {
        if (item) {
            var x = item.datapoint[0].toFixed(2),
                y = item.datapoint[1].toFixed(2);
            $("#tooltip").html(y)
                .css({top: item.pageY+5, left: item.pageX+5})
                .fadeIn(200);
        } else {
            $("#tooltip").hide();
        }
    });
});

function redrawGraph(){
    combinedDataset[0].data = heartrateData;
    combinedDataset[1].data = temperatureData;
    //combinedDataset[2].data = stepData;
    //console.log(combinedDataset);
    $.plot($("#combined-chart"), combinedDataset, combinedOptions);
}