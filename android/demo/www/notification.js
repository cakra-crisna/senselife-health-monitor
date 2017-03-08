document.addEventListener("deviceready", onDeviceReadyNot, false);


var notify = {
    sendSms: function(number,message) {
        //CONFIGURATION
        var options = {
            replaceLineBreaks: false, // true to replace \n by a new line, false by default
            android: {
                //intent: 'INTENT'  // send SMS with the native android SMS messaging
                intent: '' // send SMS without open any other app
            }
        };

        var success = function () { /*alert('Message sent successfully');*/ };
        var error = function (e) { /*alert('Message Failed:' + e); */};
        sms.send(number, message, options, success, error);
    },
    sendOnScreen:function(title,text){
    	cordova.plugins.notification.local.schedule({
		    id: 1,
		    title: title,
		    text: text,
		    firstAt: new Date(),
		    //sound: "file://sounds/reminder.mp3",
		    sound: 'file://sound.mp3',
		    icon: "notice.png",
		    //data: { meetingId:"123" }
		});
    },

    sendHeartRateNotification:function(heartReateValue){
        
        $.get(baseurl+"getallemergency/"+userid,function(data){
            //alert(JSON.stringify(data));
            $.each(data["data"],function(i,value){
                //alert(JSON.stringify(value));
                var number = value["phone"];
                //alert(number);
                notify.sendSms(number,"Heart rate notification. heart rate is:"+heartReateValue+". Please slow down");
            });
        });

        notify.sendOnScreen("Maximum Heart rate","Your current heart rate is:"+heartReateValue+". Please slow down");
    }
};

function onDeviceReadyNot() {
	//notify.sendSms("6823304914","Test message");
	//notify.sendOnScreen("title","text");
}