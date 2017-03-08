var isDeviceReady = false;
var isBandConnected = false;
$(document).ready(function(){
	// used to demo various tile apis
	var tileId = "3de787e9-62d2-430b-ae12-5be4a16606e8";

	document.addEventListener('deviceready', onDeviceReady);

	function onDeviceReady() {
		isDeviceReady = true;
	}




/*	function setTotalDistance(evt){
		var output = "";
		var distance = evt["todayDistance"];
		var timestamp = evt["timestamp"];
		distance = Number(distance)
		var meters = distance / 100;
		var miles = distance / 160934.4;
		miles = miles.toFixed(2);
		$("p#totalDistanceText").text(miles + " miles");
		socket.emit('distance',evt);
	}
*/

/*	function setTotalCalorie(evt){
		var todayCalorie = evt["todayCalorie"];
		var totalCalorie = evt["totalCalorie"];
		var timestamp = evt["timestamp"];
		$("p#totalCalorieText").text(todayCalorie+ " kcals");
		socket.emit('calorie',evt);
	}*/

/*	function setTotalSteps(evt){
		var steps = evt["todaysStep"];
		var timestamp = evt["timestamp"];
		$("p#totalStepsText").text(steps+ " steps");
		socket.emit('steps',evt);	
	}*/
/*
	function setBodyTemperature(evt){
		var temperature = evt["temperature"];
		var timestamp = evt["timestamp"];
		temperature = temperature.toFixed(2);
		$("p#bodyTemperature").text(temperature+ " C");
		socket.emit('temperature',evt);		
	}*/

	function doSubscription(){
		subscribe("distance",setTotalDistance);
		subscribe("calorie",setTotalCalorie);
		subscribe("pedometer",setTotalSteps);
		subscribe("heartrate",setHeartRateData);
		subscribe("skintemperature",setBodyTemperature);
	}

	function doUnsubscription(){
		unsubscribe("distance",setTotalDistance);
		unsubscribe("calorie",setTotalCalorie);
		unsubscribe("pedometer",setTotalSteps);
		unsubscribe("heartrate",setHeartRateData);
		unsubscribe("skintemperature",setHeartRateData);
	}
	var currentState = false;
	$("#switchon").click(function(){
		if(currentState){
			currentState = false;
			turnOff();
		}
		else{
			currentState = true;
			turnOn();
		}
	});

	function turnOn() {
		alert("Turning on");
		if(isBandConnected){
			$("#statusconnected").show();
		    $("#statusdisconnected").hide();
		    doSubscription();
		}
		else{
			if(isDeviceReady){
				msband.connect(onBandConnectSuccess,onBandConnectError);
			}
			else{
				alert("Device is not ready!");
				return;
			}
		}
	}
	
	window.onbeforeunload = function(){
		doUnsubscription();
	};
	
	function turnOff(){
		alert("Turning off");
		$("#statusconnected").hide();
	    $("#statusdisconnected").show();
	    doUnsubscription();	
	}

	function onBandConnectSuccess(evt) {
		isBandConnected = true;
		if(isBandConnected){
			$("#statusconnected").show();
		    $("#statusdisconnected").hide();
		    doSubscription();
		}
		else{
			alert("Device is not connected.");
		}
	}

	function onBandConnectError(err) {
		isBandConnected = false;
	    doUnsubscription();
	}

	function refresh(){
		doUnsubscription();
		doSubscription();	
	}

	
	function subscribe(eventName,callback){
		msband.sensors.on(eventName,callback);
	}

	function unsubscribe(eventName,callback){
		msband.sensors.un(eventName,callback);
	}

});

