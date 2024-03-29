$(function() {
	if(!$.cookie('tableid')) {
		var num = '';
		while(!/^\d+$/.test(num)) {
			num = window.prompt('请输入桌子编号');
		}
		$.cookie('tableid', num);
	}
	document.querySelector('#orderNumTip').innerHTML='['+$.cookie('orderNum')+']';

	window.baseUrl = "http://localhost:8888/orderdish/index.php";
	//加载推荐菜肴
	
	$.getJSON(window.baseUrl + '/api/getrecdish?callback=?', function(dishes) {
		console.log(dishes);
		
		var dish, str = '';
		for(var i = 1, len = dishes.length; i < len; i++) {
			dish = dishes[i];
			//预结账处理style="display: '+($.cookie('payState')?'none':'block')+'"
			str += '<li class="gitem h" data-href="'+dish.dish_id+'">'+
						'<img height="130" width="130" src="dish/'+dish.dish_img+'"/>'+
						'<div class="v ginfo">'+
							'<h3 class="el">'+dish.dish_name+'</h3>'+
							'<div class="bra">'+
							'	<span class="s s'+dish.dish_score+'"></span> '+
							'	<span>'+dish.dish_price+'元价格</span>'+
							'	<span>已有N人点餐</span>'+
							'</div>'+
						'</div>'+
						'<div class="order_btn">'+
							' <a data-orderid="'+dish.dish_id+'" style="display: '+($.cookie('payState')?'none':'block')+'">点餐</a>'+
							 '<a href="dish.htm#'+dish.dish_id+'">详情</a>'+
					  ' </div>'+
					'</li>';
		}
		document.querySelector('#dish_list').innerHTML = str;
	})
	
	document.querySelector('#dish_reco').addEventListener('click', function(e) {
		var t = e.target;
		orderid = t.getAttribute('data-orderid');
		if(!orderid) 
			return;
		console.log(t);
		$.cookie('orderDish', $.cookie('orderDish')+";" +orderid);
		var num = +$.cookie('orderNum');
		if(!num) num = 0;
		$.cookie('orderNum', ++num);
		document.querySelector('#orderNumTip').innerHTML='['+num+']';
		console.log('orderDish',$.cookie('orderDish'),'  ||  orderNum', $.cookie('orderNum'));
		t.innerHTML = '已点';
	},true);
	

	//切换菜单
	var tab = document.querySelector('.tab');
	tab.addEventListener('click', tabFn, true);
	function tabFn(e) {
		var tabs = document.querySelectorAll('.tab_content>div');
		for(var i = 0, len = tabs.length; i < len; i++) {
			tabs[i].style.display = 'none';
		}
		var liArr = this.children;
		for(var i = 0, len = liArr.length; i < len; i++) {
			liArr[i].removeAttribute('class');
		}
		e.target.setAttribute('class', 'selected');
		
		document.querySelector('#' + e.target.getAttribute('data-info')).style.display = "block";
	}
	

	
});