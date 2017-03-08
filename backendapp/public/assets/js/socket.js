var socket = io('http://ec2-54-70-157-24.us-west-2.compute.amazonaws.com:3000');
var baseurl = "http://ec2-54-70-157-24.us-west-2.compute.amazonaws.com:8080/api/";
//baseurl = "http://localhost:8000/api/";

socket.on('connect', function() {
	socket.on('heartrate', function(data) {
		//console.log(data);
		setHeartRateData(data);
	});
	socket.on('distance', function(data) {
		//console.log(data);
		setTotalDistance(data);
	});
	socket.on('calorie', function(data) {
		//console.log(data);
		setTotalCalorie(data);
	});
	socket.on('steps', function(data) {
		//console.log(data);
		setTotalSteps(data);
	});
	socket.on('temperature', function(data) {
		//console.log(data);
		setBodyTemperature(data);
	});
});