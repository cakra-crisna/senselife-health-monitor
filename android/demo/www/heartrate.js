function e(val,timestamp) {
	data = t(val,timestamp);
	//alert(data);
	o.setData([data]);
	o.draw();
	//setTimeout(e, i)
}

function t(value,timestamp) {
	if(n.length>150) {
		n=n.slice(1)
	}
	
	while(n.length<r) {
		/*var e=n.length>0?n[n.length-1]: 50;
		var t=e+Math.random()*10-5;
		if(t<0) {
			t=0
		}
		if(t>100) {
			t=100
		}
		*/
		n.push(0)
	}
	n.push(value);
	var i=[];
	for(var s=0;s<n.length;++s) {
		i.push([s, n[s]])
	}
	return i
}

if($("#live-updated-chart").length!==0) {
	var n=[],
	r=150;
	var i=1000;
	$("#updateInterval").val(i).change(function() {
		var e=$(this).val();
		if(e&&!isNaN(+e)) {
			i=+e;
			if(i<1) {
				i=1
			}
			if(i>2e3) {
				i=2e3
			}
			$(this).val(""+i)
		}
	}
	);

	var s= {
		series: {
			shadowSize:0,
			color:purple,
			lines: {
				show: true, fill: true
			}
		}
		,
		yaxis: {
			min: 0, max: 200, tickColor: "#ddd"
		}
		,
		xaxis: {
			show: true, tickColor: "#ddd"
		}
		,
		grid: {
			borderWidth: 1, borderColor: "#ddd"
		}
	}
	;
	var o =$.plot($("#live-updated-chart"), [t(0)], s);
	e(0)
}
var socket = io('http://ec2-54-70-157-24.us-west-2.compute.amazonaws.com:3000');

socket.on('connect', function() {
	socket.on('text', function(text) {
		//alert(text);
	});
});

function setHeartRateData(evt){
	var rate = evt["heartRate"];
	var timestamp = evt["timestamp"];
	var quality = evt["quality"];

	
	e(rate);
	$("#currentHeartBeat").text(rate+" bpm");

	//alert(websocket_url);
	//var socket = io(websocket_url);
	//socket.broadcast.emit('message', "this is a test");
	evt["userid"] = userid;
	socket.emit('heartrate',evt);

	//socket.emit('heartrate',evt);
	/*
	$.post(baseurl+"storehearrate/"+userid,evt,function(response){
        if(response.error){
            //console.log("error occured");
            alert(response.message);
        }
        else{
        	//alert(response);
        }
    });*/

//	$("#live-updated-chart").text(rate+" bpm");

}
