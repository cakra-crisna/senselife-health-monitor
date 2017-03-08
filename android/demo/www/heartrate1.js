
var heartrateData = [];
var heartrateDataset;
var heartRateThreshold = [];
var heartRateThresholdValue = 180;

var triggered = false;
function checkTrigger(value){
    if(!triggered && value>=heartRateThresholdValue){
        triggered = true;
        notify.sendHeartRateNotification(value);
    }
}

setInterval(function(){
    if(triggered){
        triggered = false;    
    }
}, 1000*60*1);

function getHeartRateData(timestamp,value) {
    checkTrigger(value);
    heartRateThresholdValue = document.querySelector('#heartRateThreshold').value;
    heartrateData.shift();
    heartRateThreshold.shift();
 	if(!timestamp){
    	timestamp = now;
    }
    if(!value){
    	value = 0;
    }
    while (heartrateData.length < totalPoints) {     
        var temp = [timestamp, value];
 		var ths = [timestamp,heartRateThresholdValue];
        heartrateData.push(temp);
    	heartRateThreshold.push(ths);
    }
}
 
var heartRateOptions = {
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
    var thresholdValueTxt = document.querySelector('#heartRateThreshold');
    var thresholdSlider = new Powerange(thresholdValueTxt, { decimal: true,start:heartRateThresholdValue,max:250 });
    $("#heartRateThresholdDisplay").text(heartRateThresholdValue);
    thresholdValueTxt.onchange = function() {
      $('#heartRateThresholdDisplay').text(thresholdValueTxt.value);
    };

    getHeartRateData();
    heartrateDataset = [
        { label: "heartrate", data: heartrateData,color:"purple" },
        { label: "threshold", data: heartRateThreshold,color:"red",lines: {
            show: true,
            lineWidth: 1.2,
            fill: false
        }}
    ]; 
    $.plot($("#heartRateChart"), heartrateDataset, heartRateOptions);
});

function setHeartRateData(evt){
    var rate = evt["heartRate"];
    var timestamp = evt["timestamp"];
    //var quality = evt["quality"];
    evt["userid"] = userid;
    socket.emit('heartrate',evt);
    getHeartRateData(timestamp,rate);
    //console.log(JSON.stringify(heartrateData));
    $.plot($("#heartRateChart"), heartrateDataset, heartRateOptions);
    $("#currentrate").text(rate+" bpm");

}