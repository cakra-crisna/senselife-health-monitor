

var temperatureData = [];
var temperatureDataset;
 
var temperatureOptions = {
    series: {
    	lines: {
            show: true,
            lineWidth: 1.2,
            fill: true
        },
         points: {
                show: true
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
        tickSize: 2,
        axisLabel: "Todays Steps",
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: 'Verdana, Arial',
        axisLabelPadding: 6
    },
    legend: {        
        labelBoxBorderColor: "#fff"
    },
    zoom: {
        interactive: true
    },
    pan: {
        interactive: true
    }
};
 
$(document).ready(function () {
    temperatureDataset = [
        { label: "temperature", data: temperatureData,color:"green" },
    ]; 
    $.plot($("#tempChart"), temperatureDataset, temperatureOptions);
    $("#tempChart").bind("plothover", function (event, pos, item) {
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

function drawTemp(){
    temperatureDataset[0].data = temperatureData;
	$.plot($("#tempChart"), temperatureDataset, temperatureOptions);
}