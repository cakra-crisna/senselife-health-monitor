
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