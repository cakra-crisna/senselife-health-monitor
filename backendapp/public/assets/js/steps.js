var totalPoints = 50;
var updateInterval = 1000;
var now = new Date().getTime();

var stepData = [];
var stepDataset;
var stepThreshold = [];

function getStepData(timestamp,steps) {
    stepData.shift();
    stepThreshold.shift();
 	if(!timestamp){
    	timestamp = now;
    }
    while (stepData.length < totalPoints) {     
        var temp = [timestamp, steps];
 		var ths = [timestamp,160];
        stepData.push(temp);
    	stepThreshold.push(ths);
    }
}
 
var stepOptions = {
    series: {
    	lines: {
            show: true,
            lineWidth: 1.2,
            fill: true
        }
    },
    xaxis: {
        mode: "time",
        tickSize: [2, "second"],
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
        tickSize: 20,
        axisLabel: "Todays Steps",
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 6
    },
    legend: {        
        labelBoxBorderColor: "#fff"
    }
};
 
$(document).ready(function () {
    getStepData();
    stepDataset = [
        { label: "STEPS", data: stepData,color:"magenta" },
        { label: "stepThreshold", data: stepThreshold,color:"yellow" }
    ]; 
    $.plot($("#stepCharts"), stepDataset, stepOptions);
});
 

function setTotalSteps(evt){
	var steps = evt["todaysStep"];
	var timestamp = evt["timestamp"];
	getStepData(timestamp,steps);
	//console.log(JSON.stringify(stepDataset));
	$.plot($("#stepCharts"), stepDataset, stepOptions)
	$("p#totalStepsText").text(steps+ " steps");
}
