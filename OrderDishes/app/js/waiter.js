$(function() {

	window.baseUrl = "http://localhost:8888/orderdish/index.php";
	
	//添加服务和定时添加服务
	addServer();
	function addServer() {
		var serverList = document.querySelector('.server_list');
		console.log('kaishi ');
		//查询服务接口http://localhost:8888/orderdish/index.php/api/selectserver?from=2
		$.getJSON(window.baseUrl + '/api/selectserver?from='+serverList.children.length+'&callback=?', function(serverArr) {
			var str = '',newUl = document.querySelector('.server_list').cloneNode();
			if(serverArr.length == 0) return;
			console.log('===youshujule');
			for(var i = 0, len = serverArr.length; i < len; i++) {	
				var sv = serverArr[i];
				str += '<li class="box clearfix" data-serverid="'+sv.server_id+'">'+
							'<div class="server_info fl">'+
								'<span>桌号：'+sv.server_table_id+'</span>'+
								'<span>需要：'+sv.server_content+'</span>'+
								'<span>时间：'+sv.server_insert_time+'</span>'+
							'</div>'+
							'<a data-serverid="'+sv.server_id+'" class="solve btn fl">待解决</a>'+
						'</li>'; 
			}
			newUl.innerHTML = str;
			var liArr = newUl.children;
			for(var i = 0, len = liArr.length; i < len; i++) {
				document.querySelector('.server_list').appendChild(liArr[0]);
			}
		});
	}
	setInterval(addServer,1000); 
	
	
	//添加服务完成时间
	var serverList = document.querySelector('.server_list');
	serverList.addEventListener('click', function(e) {
		var t = e.target;
		if(t.nodeName != "A") return;
		var sid = t.getAttribute('data-serverid');
		var img = new Image();
		img.src = 'http://localhost:8888/orderdish/index.php/api/server?serverid='+sid;
		t.parentNode.parentNode.removeChild(t.parentNode);
	}, true);
	
	
	
	
});





