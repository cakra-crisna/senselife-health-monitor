function e(val,timestamp) {
	data = t(val,timestamp);
	//alert(data);
	o.setData([data,{
				data: d6_1,
				color:"red",
				lines: { show: true,fill:false}
			}]);
	o.draw();
	//setTimeout(e, i)
}

function t(value,timestamp) {
	if(n.length>150) {
		n=n.slice(1)
	}
	
	while(n.length<r) {
		n.push(0)
	}
	n.push(value);
	var i=[];
	for(var s=0;s<n.length;++s) {
		i.push([s, n[s]])
	}
	return i
}

if($("#heartRateChart").length!==0) {
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
			color:"purple",
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

	var d6_1 = [];
		for (var i = 0; i < 150; i += 1) {
			d6_1.push([i, 120]);
		}

	var o =$.plot($("#heartRateChart"), [t(0)
			], s);
	e(0);
}

function setHeartRateData(evt){
	var rate = evt["heartRate"];
	//var timestamp = evt["timestamp"];
	//var quality = evt["quality"];

	e(rate);
	$("#currentrate").text(rate+" bpm");


}
//getHeartRate();
var intveral;
//http://192.168.0.58:3000






