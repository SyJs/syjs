$(function() {
	document.querySelector('#orderNumTip').innerHTML='['+$.cookie('orderNum')+']';

	window.baseUrl = "http://localhost:8888/orderdish/index.php";
	
	var callServer = document.querySelector('#call_server');
	var img = new Image();
	callServer.addEventListener('click',function(e) {
		var t = e.target;
		if(t.nodeName != 'LI') return;
		alert('已为您呼叫,' + t.innerHTML);
		img.src = window.baseUrl + "/api/callserver?tableid="+$.cookie('tableid')+"&content="+t.innerHTML;
	},true);
	
	
});