$(function() {
	document.querySelector('#orderNumTip').innerHTML='['+$.cookie('orderNum')+']';

	
	window.baseUrl = "http://localhost:8888/orderdish/index.php";
	
	addDish('', 0, 6, 'dish_price');
	
	
	var dishContainer = document.querySelector('#dish_list'),
	    kinds = document.querySelector('#kind'),
	    sorts = document.querySelector('#sort'),
		search = document.querySelector('#isabtn'), i, len;
		
	dishContainer.addEventListener('click', function(e) {
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
	kinds.addEventListener('click', function(e) {
		var t = e.target;
		if(t.nodeName=="UL") 
			return;
		var	kind = t.getAttribute('data-kind'),
			childs = this.children;
		onlyClass(this.children, t, 'selected');	//用来选择单一类
		addDish(kind, 0, 6, document.querySelector('#sort>.selected').getAttribute('data-sort'))
	},true);
	sorts.addEventListener('click', function(e) {
		var t = e.target;
		if(t.nodeName=="UL") 
			return;
		var	sort = t.getAttribute('data-sort'),
			childs = this.children;
		onlyClass(this.children, t, 'selected');	//用来选择单一类
		addDish(document.querySelector('#kind>.selected').getAttribute('data-kind'), 0, 6, sort);
	},true);
	search.addEventListener('click', function(e) {
		var condition = document.querySelector('#search').value;
		document.querySelector('#dish_list').setAttribute('data-url' ,window.baseUrl + '/api/searchdish?condition='+condition+'from=||&offset=6&callback=?');
		document.querySelector('#dish_list').setAttribute('num', 6);
		$.getJSON(window.baseUrl + '/api/searchdish?condition='+condition+'&from=0&offset=6&callback=?', 
			addDishInDom);
	},true);
	
	//加载菜肴
	function addDish(dishkind, from, offset, order) {
		document.querySelector('#dish_list').setAttribute('data-url', window.baseUrl + '/api/getdish?dishkind='+dishkind+'&from=||&offset='+offset+'&order='+order+'&callback=?');
		document.querySelector('#dish_list').setAttribute('num', 6);
		//getdish?dishkind=酒&from=1&offset=20&order=dish_price&callback=fn
		$.getJSON(window.baseUrl + '/api/getdish?dishkind='+(dishkind?dishkind:'')+'&from='+from+'&offset='+offset+'&order='+order+'&callback=?', 
			addDishInDom);
	}
	
	function addDishInDom(dishes) {
		console.log(dishes);
		var dish, str = '';
		for(var i = 0, len = dishes.length; i < len; i++) {
			dish = dishes[i];
			//预结账状态处理style="display: '+($.cookie('payState')?'none':'block')+'"
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
		if(dishes.length < 6) {
			document.querySelector('#dish_more').innerHTML = '没有了';
		} else
			document.querySelector('#dish_more').innerHTML = '点击加载更多';
	}
	
	
	//加载更多
	var dishMore = document.querySelector('#dish_more');
	dishMore.addEventListener('click', function() {
		if(this.innerHTML == '没有了')
			return;
		this.innerHTML = "正在为您加载中...";
		var dishList = document.querySelector('#dish_list'),
			urlArr = dishList.getAttribute('data-url').split('||'),
			num = +dishList.getAttribute('data-num'),
			url = urlArr[0] + (num+6) + urlArr[1];
		console.log(url);
		dishList.setAttribute('data-num', num+6);
		$.getJSON(url, function(dishes){
			var str='', 
				fragment = document.createDocumentFragment(),
				liMather = document.querySelector('li.gitem');
			for(var i = 0, len = dishes.length; i < len; i++) {
				dish = dishes[i];
				var liSun = liMather.cloneNode();
				liSun.setAttribute('data-href', dish.dish_id);
				//预结账处理style="display: '+($.cookie('payState')?'none':'block')+'"
				liSun.innerHTML =  '<img height="130" width="130" src="dish/'+dish.dish_img+'"/>'+
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
						  ' </div>';
				fragment.appendChild(liSun);
			}
			document.querySelector('#dish_list').appendChild(fragment);
			if(len < 6) {
				document.querySelector('#dish_more').innerHTML = '没有了';
			} else {
				document.querySelector('#dish_more').innerHTML = '点击加载更多';
			}
		});
	}, true);
	
		
	//用来选择单一类的函数
	function onlyClass(childs, selectedChild, className) {
		for(var i = 0, len = childs.length; i < len; i++) {
			childs[i].removeAttribute('class');
		}
		selectedChild.setAttribute('class', className);
	}
	

	
});