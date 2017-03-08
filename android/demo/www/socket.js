var socket = io('http://ec2-54-70-157-24.us-west-2.compute.amazonaws.com:3000');

socket.on('connect', function() {
	console.log("connected");
});

var totalPoints = 50;
var updateInterval = 1000;
var now = new Date().getTime();