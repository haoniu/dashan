<!--搜索区域开始-->
<script type="text/javascript">
	$(function(){
		//分别抓取页面的搜索按钮和搜索框
		var search = $("#search .searchBar .sch-btn");
		var sch_con = $("#search .searchBar .sch-so");
		
		
		$('#small_cart').click(function(){
			var sid = $('#small_cart .hi').val();
			$.ajax({
				//请求地址
				url : '<?php echo U('Cart/cartDel')?>',
				//发送的数据
				data: {sid:sid},
				//请求类型
				type:'post',
				//返回的数据类型
				dataType:'json',
				//成功返回
				success:function(phpData){
					location.reload();
				}
			});
		})
		
	})
</script>
	<div id="search">
		<div class="logo">
			<a href="<?php echo U('Index/index')?>">
				<img src="<?php echo __PUBLIC__?>/Home/image/newLogo.png"/>
			</a>
		</div>
		<div class="searchBar">
			<input type="text" class="sch-so" placeholder="Search">
			<a href="javascript:;" class="sch-btn"><img src="<?php echo __PUBLIC__?>/Home/image/search.png"/></a>
		</div>
		<div class="toolBar">
			
			<div class="shop">
				<a href="">&nbsp;&nbsp;我的购物车&nbsp;&nbsp;&nbsp; ></a>
				<div id="gw-yc">
					<div class="title">
						<p>最新加入的商品</p>
					</div>
					<?php foreach ($cartData['goods'] as $k=>$v){?>
					<div class="new-shop">
						<img src="<?php echo $v['pic']['pic']?>"/>
						<p><?php echo $v['name']?></p>
						<strong>￥<?php echo $v['price']?></strong>
						<a href="javascript:;" id="small_cart"><input type="hidden" value="<?php echo $k?>" class="hi"/>删除</a>
					</div>
					<?php }?>
					<div class="shop-cont">
						<p>共<span><?php echo $cartData['total_rows']?></span>件商品</p>
						<p>共计 <span><?php echo $cartData['total']?></span> 元</p>
						<a href="<?php echo U('Cart/index')?>">去购物车</a>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!--轮播菜单开始-->
	<div id="s-menu">
		<div class="s-menu">
			<div class="left">
				<a href="">全部商品</a>
			</div>
			<div class="right">
				<ul>
					<li><a href="<?php echo U('Index/index')?>">首页</a></li>					
					<?php foreach ($cateData as $v){?>
					<li><a href="<?php echo U('List/index',array('cid'=>$v['cid']))?>"><?php echo $v['cname']?></a></li>
					<?php }?>					
				</ul>
			</div>
		</div>
	</div>