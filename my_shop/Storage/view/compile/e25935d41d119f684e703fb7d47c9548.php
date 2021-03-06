<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="utf-8"/>
		<title>
			CG商城后台
		</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport"/>
		<meta content="" name="description"/>
		<meta content="" name="author"/>
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link href="<?php echo __PUBLIC__?>/Admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo __PUBLIC__?>/Admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo __PUBLIC__?>/Admin/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<!-- BEGIN THEME STYLES -->
		<link href="<?php echo __PUBLIC__?>/Admin/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
		<link href="<?php echo __PUBLIC__?>/Admin/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo __PUBLIC__?>/Admin/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
		<!-- END THEME STYLES -->
		<link rel="shortcut icon" href="favicon.ico"/>
		<base target="iframe"/>
	</head>
	<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
		<!-- BEGIN HEADER -->
		<div class="page-header navbar navbar-fixed-top">
			<!-- BEGIN HEADER INNER -->
			<div class="page-header-inner">
				<!-- BEGIN LOGO -->
				<div class="page-logo">
					<a href="index.html">
						<img src="<?php echo __PUBLIC__?>/Admin/assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
					</a>
					<div class="menu-toggler sidebar-toggler hide">
					</div>
				</div>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
				</a>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<li class="dropdown dropdown-user">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<img alt="" class="img-circle" src="<?php echo __PUBLIC__?>/Admin/assets/admin/layout/img/avatar3_small.jpg"/>
								<span class="username username-hide-on-mobile">
									<?php echo $_SESSION['username']?>
								</span>
								<i class="fa fa-angle-down">
								</i>
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="<?php echo U('User/changePwd')?>">
										<i class="icon-key">
										</i>修改密码
									</a>
								</li>
								<li>
									<a href="<?php echo U('Login/out')?>" target="_self">
										<i class="icon-key">
										</i>退出
									</a>
								</li>
							</ul>
						</li>
						<!-- END USER LOGIN DROPDOWN -->
					</ul>
				</div>
				<!-- END TOP NAVIGATION MENU -->
			</div>
			<!-- END HEADER INNER -->
		</div>
		<!-- END HEADER -->
		<div class="clearfix">
		</div>
		<!-- BEGIN CONTAINER -->
		<div class="page-container">
			<!-- BEGIN SIDEBAR -->
			<div class="page-sidebar-wrapper">
				<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
				<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
				<div class="page-sidebar navbar-collapse collapse">
					<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
						<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
						<li class="sidebar-toggler-wrapper" style="margin: 10px 0px;">
							<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
							<div class="sidebar-toggler">
							</div>
							<!-- END SIDEBAR TOGGLER BUTTON -->
						</li>
						<li class="start active open">
							<a href="javascript:;">
								<i class="icon-home">
								</i>
								<span class="title">后台操作</span>
								<span class="selected">
								</span>
								<span class="arrow open">
								</span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="<?php echo U('Home/Index/index')?>" target="_blank">
										前台首页
									</a>
								</li>
								<li>
									<a href="<?php echo U('Index/wel')?>">
										后台欢迎
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">
								<i class="icon-briefcase">
								</i>
								<span class="title">商品管理</span>
								<span class="arrow ">
								</span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="javascript:;">
										<span class="title">类型管理</span>
										<span class="arrow ">
										</span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="<?php echo U('Type/add')?>">
												添加类型
											</a>
										</li>
										<li>
											<a href="<?php echo U('Type/index')?>">
												类型列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="javascript:;">
										<span class="title">分类管理</span>
										<span class="arrow ">
										</span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="<?php echo U('Category/add')?>">
												添加分类
											</a>
										</li>
										<li>
											<a href="<?php echo U('Category/index')?>">
												分类列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="javascript:;">
										<span class="title">品牌管理</span>
										<span class="arrow ">
										</span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="<?php echo U('Brand/add')?>">
												添加品牌
											</a>
										</li>
										<li>
											<a href="<?php echo U('Brand/index')?>">
												品牌列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="javascript:;">
										<span class="title">商品管理</span>
										<span class="arrow ">
										</span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="<?php echo U('Goods/add')?>">
												商品添加
											</a>
										</li>
										<li>
											<a href="<?php echo U('Goods/index')?>">
												商品列表
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">
								<i class="icon-bar-chart">
								</i>
								<span class="title">订单管理</span>
								<span class="arrow ">
								</span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="<?php echo U('Order/index')?>">
										总订单列表
									</a>
								</li>
								<li>
									<a href="<?php echo U('Order/nopay')?>">
										未付款订单
									</a>
								</li>
								<li>
									<a href="<?php echo U('Order/pay')?>">
										已付款订单
									</a>
								</li>
								<li>
									<a href="<?php echo U('Order/send')?>">
										已发货订单
									</a>
								</li>
							</ul>
						</li>
						
					</ul>
					<!-- END SIDEBAR MENU -->
				</div>
			</div>
			<!-- END SIDEBAR -->
			<!-- BEGIN CONTENT -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<iframe src="<?php echo U('Index/wel')?>" frameborder="0" style="height:100%;width:100%;" name="iframe">
					</iframe>
				</div>
			</div>
			<!-- END CONTENT -->
		</div>
		<!-- END CONTAINER -->
		<!-- BEGIN FOOTER -->
		<div class="page-footer">
			<div class="page-footer-inner">
				2014 &copy; Metronic by keenthemes.
				<a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">
					Purchase Metronic!
				</a>
			</div>
			<div class="scroll-to-top">
				<i class="icon-arrow-up">
				</i>
			</div>
		</div>
		<!-- END FOOTER -->
		<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
		<!-- BEGIN CORE PLUGINS -->
		<!--[if lt IE 9]>
		<script src="<?php echo __PUBLIC__?>/Admin/assets/global/plugins/respond.min.js"></script>
		<script src="<?php echo __PUBLIC__?>/Admin/assets/global/plugins/excanvas.min.js"></script>
		<![endif]-->
		<script src="<?php echo __PUBLIC__?>/Admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
		<script src="<?php echo __PUBLIC__?>/Admin/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo __PUBLIC__?>/Admin/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
		<script src="<?php echo __PUBLIC__?>/Admin/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
		<!-- END PAGE LEVEL PLUGINS -->
		<!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="<?php echo __PUBLIC__?>/Admin/assets/global/scripts/metronic.js" type="text/javascript"></script>
		<script src="<?php echo __PUBLIC__?>/Admin/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
		<!-- END PAGE LEVEL SCRIPTS -->
		<script>jQuery(document).ready(function() {
	Metronic.init(); // init metronic core componets
	Layout.init(); // init layout
});</script>
		<script type="text/javascript">var height = $(document).height();
$('iframe').height(height + 50);</script>
		<!-- END JAVASCRIPTS -->
	</body>
	<!-- END BODY -->
</html>