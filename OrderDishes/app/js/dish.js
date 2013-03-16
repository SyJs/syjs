$(function() {
	document.querySelector('#orderNumTip').innerHTML='['+$.cookie('orderNum')+']';

	window.baseUrl = "http://localhost:8888/orderdish/index.php";
	
	//获取菜单详情
	var dishId = window.location.hash.substr(1);
	$.getJSON(window.baseUrl+'/api/getorderdish?orderdish='+dishId+'&callback=?', addDishInDom);
	function addDishInDom(dishes) {
		var dish = dishes[0];
		//预结账处理style="display: '+($.cookie('payState')?'none':'block')+'"
		var str = '<img class="fl" height="150" width="150" src="dish/1.jpg"/>'+
			'<div class="v ginfo fl">'+
				'<h3 class="el">'+dish.dish_name+'</h3>'+
				'<div class="bra">'+
				'	<span class="s s'+dish.dish_score+'"></span> '+
				'	<span>'+dish.dish_price+'元价格</span>'+
				'</div>'+
				'<div class="order_btn" style="display: '+($.cookie('payState')?'none':'block')+'">'+
					' <a id="orderDish" data-orderid="'+dish.dish_id+'">OK</a>'+
			   '</div>'+
			'</div>	'+	
			'<div class="dish_content">'+dish.dish_info+
			'</div>';
		document.querySelector('#dishIntr').innerHTML = str;
		
		console.log(dishes);
		return;
		var dish, str = '', payCount = 0;
		//预结账状态处理style="display: '+($.cookie('payState')?'none':'block')+'"
		for(var i = 0, len = dishes.length; i < len; i++) {
			dish = dishes[i];
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
	
	//点餐事件
	var orderDish = document.querySelector('#orderDish');
	orderDish && orderDish.addEventListener('click', function(e) {
		var orderid = this.getAttribute('data-orderid');
		$.cookie('orderDish', $.cookie('orderDish')+";" +orderid);
		var num = +$.cookie('orderNum');
		if(!num) num = 0;
		$.cookie('orderNum', ++num);
		document.querySelector('#orderNumTip').innerHTML='['+num+']';
		console.log('orderDish',$.cookie('orderDish'),'  ||  orderNum', $.cookie('orderNum'));
		this.innerHTML = '已点';
	}, true);
	
	
	
	
	
	
});

















