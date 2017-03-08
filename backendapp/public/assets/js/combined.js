var totalPoints = 50;
var updateInterval = 1000;
var now = new Date().getTime();

var combinedDataset;
var heartrateData = [];
var temperatureData = [];
var stepData = [];
var calorieData = [];

var currentheartRate = 0;
var currentTemperature = 0;
var currentDistance = 0;
var currentCalorie = 0;
var currentSteps = 0;

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
        tickSize: 10,
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
    setData();
    combinedDataset = [
        { label: "heartrate", data: heartrateData,color:"purple",lines: {
            show: true,
            lineWidth: 1.2,
            fill: false
        }},
        { label: "temperature", data: temperatureData,color:"red"},
        { label: "steps", data: stepData,color:"green"},
        //{ label: "calorie", data: calorieData,color:"yellow"}
    ]; 

    $.plot($("#combined-chart"), combinedDataset, combinedOptions);
});

function setHeartRateData(evt){
    var rate = evt["heartRate"];
    var timestamp = evt["timestamp"];
    //var quality = evt["quality"];
    currentheartRate = rate;
    setData(timestamp);
    //console.log(JSON.stringify(heartrateData));
    $.plot($("#combined-chart"), combinedDataset, combinedOptions);
    $("#currentrate").text(rate+" bpm");
}

function setTotalSteps(evt){
    var steps = evt["todaysStep"];
    var timestamp = evt["timestamp"];
    currentSteps = steps;
    setData(timestamp);
    $.plot($("#combined-chart"), combinedDataset, combinedOptions);
    //console.log(JSON.stringify(stepDataset));
    $("p#totalStepsText").text(steps+ " steps");
}
function setBodyTemperature(evt){
    var temperature = evt["temperature"];
    var timestamp = evt["timestamp"];
    temperature = temperature.toFixed(2);
    //console.log(temperature);
    currentTemperature = temperature;
    setData(timestamp);
    //console.log(JSON.stringify(temperatureData));
    $.plot($("#combined-chart"), combinedDataset, combinedOptions);
    $("p#bodyTemperatureValue").text(temperature+ " C");
}

function setTotalCalorie(evt){
    var todayCalorie = evt["todayCalorie"];
    var totalCalorie = evt["totalCalorie"];
    var timestamp = evt["timestamp"];
    currentCalorie = todayCalorie;
    //console.log(JSON.stringify(calorieDataset));
    setData(timestamp);
    $.plot($("#combined-chart"), combinedDataset, combinedOptions);
    $("p#totalCalorieText").text(todayCalorie+ " kcals");
}


function setTotalDistance(evt){
    var output = "";
    var distance = evt["todayDistance"];
    var timestamp = evt["timestamp"];
    distance = Number(distance)
    var meters = distance / 100;
    var miles = distance / 160934.4;
    miles = miles.toFixed(2);
    $("p#totalDistanceText").text(miles + " miles");
}