$(function() {
	document.querySelector('#orderNumTip').innerHTML='['+$.cookie('orderNum')+']';

	window.baseUrl = "http://localhost:8888/orderdish/index.php";
	
	//获取订单菜肴列表数据
	var orderDishes = $.cookie('orderDish').split(';');
	orderDishes.shift();	//去除第一个null;13;1中的null
	var orderlist = orderDishes.join(',');	//从cookie中获取，将格式;13;23;2转换成13,23,2
	$.getJSON(window.baseUrl+'/api/getorderdish?orderdish='+orderlist+'&callback=?', addDishInDom);
	function addDishInDom(dishes) {
		console.log(dishes);
		var dish, str = '', payCount = 0;
		//预结账状态处理style="display: '+($.cookie('payState')?'none':'block')+'"
		for(var i = 0, len = dishes.length; i < len; i++) {
			dish = dishes[i];
			var num = $.cookie('orderDish').match(new RegExp(";"+dish.dish_id+";|;"+dish.dish_id+"$", "g")).length;
			str += '<li class="gitem h" data-href="'+dish.dish_id+'">'+
						'<img height="130" width="130" src="dish/'+dish.dish_img+'"/>'+
						'<div class="v ginfo">'+
							'<h3 class="el">'+dish.dish_name+'</h3>'+
							'<div class="bra">'+
							'	<span class="s s'+dish.dish_score+'"></span> '+
							'	<span>'+dish.dish_price+'元价格</span>'+
							'	<span data-num="'+num+'">'+num+'份</span>'+
							'</div>'+
						'</div>'+
						'<div class="order_btn" style="display: '+($.cookie('payState')?'none':'block')+'">'+
							' <a  data-orderid="'+dish.dish_id+'" data-num="'+num+'" data-price="'+dish.dish_price+'">删除</a>'+
					  ' </div>'+
					'</li>';
			payCount = (+dish.dish_price)*num + payCount;
		}
		document.querySelector('#dish_list').innerHTML = str;
		document.querySelector('#payCount').innerHTML = payCount;
	}
	
	//如果已经是结账，那么修改页面数据
	if($.cookie('payState')) {
		payState();
		return;
	}
		
	
	//确认订单操作
	document.querySelector('#submitBill').addEventListener('click', function() {
		if(!window.confirm("是否该订单")) return;
		window.alert('正在复交服务员前来确认');
		payState();	//将页面修改为结账状态
		$.cookie('payState', '1');	//1为订单确认，未结账
	}, true);
	//结账状态函数
	function payState() {
		//修改头部标题为结账
		document.querySelector('#header>h3').innerHTML = "这里可以结算您的账单";
		
		//确认订单改为呼叫结账
		var submitBill = document.querySelector('#submitBill');
		submitBill.id = "callPay";
		submitBill.innerHTML = "呼叫结账";
		
		//呼叫结账事件
		submitBill.addEventListener('click', function() {
			if(!window.confirm('确认呼叫服务员结账？')) return;
			(new Image()).src = window.baseUrl + "/api/callserver?tableid="+$.cookie('tableid')+"&content="+this.innerHTML;
	
		}, true);
		
		//删除操作移除
		var deletes = document.querySelectorAll('.order_btn');
		for(var i = 0, len = deletes.length; i < len; i++) {
			deletes[i].style.visibility = 'hidden';
		}
	}
	
	
	
	//删除事件的操作
	document.querySelector('#dish_list').addEventListener('click', function(e) {
		var t = e.target;
		var orderid = t.getAttribute('data-orderid');
		if(!orderid || !window.confirm("是否确认删除")) return;
		
		//订单菜肴变更
		var orderDish = $.cookie('orderDish');
		console.log(orderDish, " yuanlaide  =====");
		$.cookie('orderDish', orderDish.replace(new RegExp(";"+orderid+"(?=;)|;"+orderid+"$", "g"), ''));
		console.log(orderDish, " houlaide  =====");
		//订单总数变更
		var orderNum = +$.cookie('orderNum') - t.getAttribute('data-num');
		$.cookie('orderNum', orderNum);
		document.querySelector('#orderNumTip').innerHTML='['+orderNum+']';
		
		//总价变更
		var payCount = document.querySelector('#payCount').innerHTML;
		payCount = +payCount - t.getAttribute('data-num')*t.getAttribute('data-price');
		document.querySelector('#payCount').innerHTML = payCount;
		this.removeChild(t.parentNode.parentNode);
	}, true);
	
	
	
	
});

















