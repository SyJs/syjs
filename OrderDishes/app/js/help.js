$(function() {
	document.querySelector('#orderNumTip').innerHTML='['+$.cookie('orderNum')+']';
	window.baseUrl = "http://localhost:8888/orderdish/index.php";
	
	document.querySelector('#callWaiter').addEventListener('click',function(e) {
		 alert('已为您呼叫服务员，请等待');
	},true);
	
	//调出清除数据表单
	document.querySelector('#changeTableId').addEventListener('click', function() {
		document.querySelector('#manageAction').style.display = "block";
		document.querySelector('#changeTable').style.display = "block";
		document.querySelector('.manage_tableid').style.display = "block";
		document.querySelector('#clearPay').style.display = "none";
		
		document.querySelector('#changeTable').addEventListener('click', function() {
			var username = document.querySelector('#userName').value,
			    password = document.querySelector('#password').value,
			    tableid = document.querySelector('#tableid').value,
				oldtableid = $.cookie('tableid');
			console.log('oldtableid', oldtableid);
			$.getJSON(window.baseUrl+'/api/account?username='+username+'&password='+password+'&callback=?', function(data) {
				if(!data.result) return;
				if(!window.confirm("确认将"+oldtableid+"更换桌号为"+tableid)) return;
				$.cookie('tableid', tableid);
				console.log('tableid', tableid);
				document.querySelector('#manageAction').style.display = "none";
			});
		}, true);
	}, true);
	
	//调出更换桌号表单
	document.querySelector('#clearData').addEventListener('click', function() {
		document.querySelector('#manageAction').style.display = "block";
		document.querySelector('.manage_tableid').style.display = "none";
		document.querySelector('#changeTable').style.display = "none";
		document.querySelector('#clearPay').style.display = "block";
		
		document.querySelector('#clearPay').addEventListener('click', function() {
			var username = document.querySelector('#userName').value;
			var password = document.querySelector('#password').value;
			var tableid = $.cookie('tableid');
			
			$.getJSON(window.baseUrl+'/api/account?username='+username+'&password='+password+'&callback=?', function(data) {
				if(!data.result) return;
				if(!window.confirm("确定清除该桌记录")) return;
				$.cookie('orderDish', null);
				$.cookie('orderNum', '0');
				$.cookie('payState', null);
				document.querySelector('#manageAction').style.display = "none";
			});
		}, true);
	}, true);
	
	
});