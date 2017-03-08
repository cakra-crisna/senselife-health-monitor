
var temperatureThresholdValue = 33;
var temperatureData = [];
var temperatureDataset;
var temperatureThreshold = [];

function getTemperatureData(timestamp,value) {
    temperatureData.shift();
    temperatureThreshold.shift();
 	if(!timestamp){
    	timestamp = now;
    }
    if(!value){
    	value = 0;
    }
    while (temperatureData.length < totalPoints) {     
        var temp = [timestamp, value];
 		var ths = [timestamp,temperatureThresholdValue];
        temperatureData.push(temp);
    	temperatureThreshold.push(ths);
    }
}
 
var temperatureOptions = {
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
    getTemperatureData();
    temperatureDataset = [
        { label: "temperature", data: temperatureData,color:"green" },
        { label: "threshold", data: temperatureThreshold,color:"red" }
    ]; 
    $.plot($("#tempChart"), temperatureDataset, temperatureOptions);
});

function setBodyTemperature(evt){
	var temperature = evt["temperature"];
	var timestamp = evt["timestamp"];
	temperature = temperature.toFixed(2);
	//console.log(temperature);
	getTemperatureData(timestamp,temperature);
	//console.log(JSON.stringify(temperatureData));
	$.plot($("#tempChart"), temperatureDataset, temperatureOptions);
	$("p#bodyTemperatureValue").text(temperature+ " C");
}