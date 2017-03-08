var serverurl="";
//var baseurl = "http://localhost:8000/api/";
//var websocket_url = "http://192.168.0.58:3000";

var baseurl = "http://ec2-54-70-157-24.us-west-2.compute.amazonaws.com:8080/api/";
var websocket_url = "http://ec2-54-70-157-24.us-west-2.compute.amazonaws.com:3000";

function getQueryParams(qs) {
    qs = qs.split('+').join(' ');

    var params = {},
        tokens,
        re = /[?&]?([^=]+)=([^&]*)/g;

    while (tokens = re.exec(qs)) {
        params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
    }

    return params;
}


var query = getQueryParams(document.location.search);
var userid = query.userid;

$('a:not([data-toggle=tab])').each(function() {
	if(userid!=="" && userid!=undefined){
		var href = this.href;
		  if (href.indexOf('?') != -1) {
		    href = href + '&userid='+userid;
		  }
		  else {
		    href = href + '?userid='+userid;
		  }
		  $(this).attr('href', href);		
	}
  
});
