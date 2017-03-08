var totalPoints = 50;
var updateInterval = 1000;
var now = new Date().getTime();

var calorieData = [];
var calorieDataset;
var calorieThreshold = [];

function getCalorieData(timestamp,steps) {
    calorieData.shift();
    calorieThreshold.shift();
 	if(!timestamp){
    	timestamp = now;
    }
    while (calorieData.length < totalPoints) {     
        var temp = [timestamp, steps];
 		var ths = [timestamp,160];
        calorieData.push(temp);
    	calorieThreshold.push(ths);
    }
}
 
var calorieOptions = {
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
        tickSize: 100,
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
    getCalorieData();
    calorieDataset = [
        { label: "Calorie", data: calorieData,color:"blue" },
        { label: "calorieThreshold", data: calorieThreshold,color:"red" }
    ]; 
    $.plot($("#calorieChart"), calorieDataset, calorieOptions);
});
 
function setTotalCalorie(evt){
	var todayCalorie = evt["todayCalorie"];
	var totalCalorie = evt["totalCalorie"];
	var timestamp = evt["timestamp"];
	
	getCalorieData(timestamp,todayCalorie);
	//console.log(JSON.stringify(calorieDataset));
	$.plot($("#calorieChart"), calorieDataset, calorieOptions);
	$("p#totalCalorieText").text(todayCalorie+ " kcals");
}