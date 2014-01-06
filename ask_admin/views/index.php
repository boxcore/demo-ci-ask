<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>DWZ富客户端框架 - For CI</title>

<link href="<?php echo base_url(); ?>public/themes/default/style.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>public/themes/default/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo base_url(); ?>public/themes/css/core.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo base_url(); ?>public/themes/css/print.css" rel="stylesheet" type="text/css" media="print"/>
<link href="<?php echo base_url(); ?>public/uploadify/css/uploadify.css" rel="stylesheet" type="text/css" media="screen"/>
<!--[if IE]>
<link href="<?php echo base_url(); ?>public/themes/css/ieHack.css" rel="stylesheet" type="text/css" media="screen"/>
<![endif]-->

<script src="<?php echo base_url(); ?>public/js/speedup.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery-1.7.1.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery.cookie.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery.bgiframe.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/xheditor/xheditor-1.1.12-zh-cn.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/uploadify/scripts/swfobject.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/uploadify/scripts/jquery.uploadify.v2.1.0.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>public/js/dwz.core.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.util.date.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.validate.method.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.regional.zh.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.barDrag.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.drag.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.tree.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.accordion.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.ui.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.theme.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.switchEnv.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.alertMsg.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.contextmenu.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.navTab.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.tab.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.resize.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.dialog.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.dialogDrag.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.sortDrag.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.cssTable.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.stable.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.taskBar.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.ajax.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.pagination.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.database.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.datepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.effects.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.panel.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.checkbox.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.history.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.combox.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/dwz.print.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>public/js/dwz.regional.zh.js" type="text/javascript"></script>


<script type="text/javascript">
$(function(){
	DWZ.init("<?php echo base_url(); ?>public/dwz.frag.xml", {
		loginUrl:"", loginTitle:"登录",	// 弹出登录对话框
//		loginUrl:"login.html",	// 跳到登录页面
		statusCode:{ok:200, error:300, timeout:301}, //【可选】
		pageInfo:{pageNum:"pageNum", numPerPage:"numPerPage", orderField:"orderField", orderDirection:"orderDirection"}, //【可选】
		debug:false,	// 调试模式 【true|false】
		callback:function(){
			initEnv();
			$("#themeList").theme({themeBase:"themes"}); // themeBase 相对于index页面的主题base路径
		}
	});
});
</script>
</head>

<body scroll="no">
	<div id="layout">
		<div id="header">
			<div class="headerNav">
				<a class="logo" href="/dwz_t/Admin/index.php">Logo</a>
				<ul class="nav">
					<li><a href="/dwz_t/Admin/index.php/Public/main" target="dialog" width="580" height="360" rel="sysInfo">系统消息</a></li>
					<li><a href="/dwz_t/Admin/index.php/Public/password/" target="dialog" mask="true">修改密码</a></li>
					<li><a href="/dwz_t/Admin/index.php/Public/profile/" target="dialog" mask="true">修改资料</a></li>
					<li><a href="/dwz_t/Admin/index.php/Public/logout/">退出</a></li>
				</ul>
				<ul class="themeList" id="themeList">
					<li theme="default"><div class="selected">蓝色</div></li>
					<li theme="green"><div>绿色</div></li>
					<li theme="purple"><div>紫色</div></li>
					<li theme="silver"><div>银色</div></li>
					<li theme="azure"><div>天蓝</div></li>
				</ul>
			</div>
		</div>
		
		<div id="leftside">
			<div id="sidebar_s">
				<div class="collapse">
					<div class="toggleCollapse"><div></div></div>
				</div>
			</div>
			
			<div id="sidebar">
					
<div class="accordion" fillSpace="sideBar">
	<div class="accordionHeader">
		<h2><span>Folder</span>应用</h2>
	</div>
	<div class="accordionContent">
	
		<ul class="tree treeFolder">
			<li><a href="<?php echo base_url(); ?>index.php/html/item" target="navTab" rel="Item">查看分类</a></li><li>
		</ul>
	</div>
</div>

			</div>
		</div>

		<div id="container">
			<div id="navTab" class="tabsPage">
				<div class="tabsPageHeader">
					<div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
						<ul class="navTab-tab">
							<li tabid="main" class="main"><a href="javascript:void(0)"><span><span class="home_icon">我的主页</span></span></a></li>
						</ul>
					</div>
					<div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
					<div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
					<div class="tabsMore">more</div>
				</div>
				<ul class="tabsMoreList">
					<li><a href="javascript:void(0)">我的主页</a></li>
				</ul>
				<div class="navTab-panel tabsPageContent layoutBox">
					<div class="page unitBox">
						<div class="accountInfo">
							<div class="alertInfo">
								<h2><a target="_blank" href="/doc/dwz-user-guide.pdf">DWZ框架使用手册(PDF)</a></h2>
								<a href="#" target="_blank">DWZ-thinkphp使用手册</a>
							</div>
							<div class="right">
								<p>2012-09-19 10:32 am</p>
							</div>
							<p><span>DWZ富客户端框架 - thinkphp3.0</span></p>
							<p>Welcome, 管理员</p>
						</div>
						<div class="pageFormContent" layoutH="80">
							<p>CodeIgniter 结合   DWZ AIR Framework</p>
							<br><br><br>
<div class="divider"></div>
<h2>dwz_thinkphp版本介绍:</h2>
<pre style="margin: 5px; line-height: 1.4em;">
当前版本dwz_thinkphp v1.0 RC2 (DWZ框架v1.1.6 Final + ThinkPHP2.0)
发布dwz_thinkphp主要是为了方便PHP开发者使用DWZ富客户端UI框架。
其他开发人员也可以结合php后台去理解DWZ和服务器端的交互方式。

DWZ其他版本发布计划
预计2011年第一季度dwz4j (DWZ JAVA框架) 结合UI框架发布一个整体版本。
.NET版本待定。
</pre>
							<div class="divider"></div>
							<h2>有偿服务请联系:</h2>
							<p style="color:red">杜权	msn:duqn@hotmail.com	QQ:8560685</p>

						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
	
	<div id="footer">Copyright &copy; 2010 <a href="http://www.j-ui.com" target="_blank">j-ui.com</a></div>


</body>
</html>