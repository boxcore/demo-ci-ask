<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>966069问答站 - 后台管理</title>

    <link href="<?php echo src_url('admin/themes/default/style.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>
    <link href="<?php echo src_url('admin/themes/css/core.css'); ?>"  rel="stylesheet" type="text/css" media="screen"/>
    <link href="<?php echo src_url('admin/themes/css/print.css'); ?>"  rel="stylesheet" type="text/css" media="print"/>
    <link href="<?php echo src_url('admin/uploadify/css/uploadify.css'); ?>"  rel="stylesheet" type="text/css" media="screen"/>
    <!--[if IE]>
    <link href="<?php echo src_url('admin/themes/css/ieHack.css'); ?>"  rel="stylesheet" type="text/css" media="screen"/>
    <![endif]-->

    <!--[if lte IE 9]>
    <script src="<?php echo src_url('admin/js/speedup.js'); ?>"  type="text/javascript"></script>
    <![endif]-->

    <script src="<?php echo src_url('admin/js/jquery-1.7.2.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/jquery.cookie.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/jquery.validate.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/jquery.bgiframe.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/xheditor/xheditor-1.2.1.min.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/xheditor/xheditor_lang/zh-cn.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/uploadify/scripts/jquery.uploadify.js'); ?>"  type="text/javascript"></script>

    <!-- svg图表  supports Firefox 3.0+, Safari 3.0+, Chrome 5.0+, Opera 9.5+ and Internet Explorer 6.0+ -->
    <script type="text/javascript" src="/static/admin/chart/raphael.js"></script>
    <script type="text/javascript" src="/static/admin/chart/g.raphael.js"></script>
    <script type="text/javascript" src="/static/admin/chart/g.bar.js"></script>
    <script type="text/javascript" src="/static/admin/chart/g.line.js"></script>
    <script type="text/javascript" src="/static/admin/chart/g.pie.js"></script>
    <script type="text/javascript" src="/static/admin/chart/g.dot.js"></script>

    <script src="<?php echo src_url('admin/js/dwz.core.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.util.date.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.validate.method.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.barDrag.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.drag.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.tree.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.accordion.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.ui.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.theme.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.switchEnv.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.alertMsg.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.contextmenu.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.navTab.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.tab.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.resize.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.dialog.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.dialogDrag.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.sortDrag.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.cssTable.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.stable.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.taskBar.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.ajax.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.pagination.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.database.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.datepicker.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.effects.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.panel.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.checkbox.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.history.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.combox.js'); ?>"  type="text/javascript"></script>
    <script src="<?php echo src_url('admin/js/dwz.print.js'); ?>"  type="text/javascript"></script>

<!--    表单即时修改插件-->
    <script src="<?php echo src_url('admin/js/jquery.jeditable.min.js'); ?>"  type="text/javascript"></script>

    <!-- 可以用dwz.min.js替换前面全部dwz.*.js (注意：替换是下面dwz.regional.zh.js还需要引入)
    <script src="bin/dwz.min.js" type="text/javascript"></script>
    -->
    <script src="<?php echo src_url('admin/js/dwz.regional.zh.js'); ?>"  type="text/javascript"></script>

    <script type="text/javascript">
        $(function(){
            DWZ.init("/static/admin/dwz.frag.xml", {
                loginUrl:"login_dialog.html", loginTitle:"登录",	// 弹出登录对话框
    //		loginUrl:"login.html",	// 跳到登录页面
                statusCode:{ok:200, error:300, timeout:301}, //【可选】
                pageInfo:{pageNum:"pageNum", numPerPage:"numPerPage", orderField:"orderField", orderDirection:"orderDirection"}, //【可选】
                debug:false,	// 调试模式 【true|false】
                callback:function(){
                    initEnv();
                    $("#themeList").theme({themeBase:"/static/admin/themes"}); // themeBase 相对于index页面的主题base路径
                }
            });
        });

    </script>
</head>

<body scroll="no">
<div id="layout">
<?php include('common/header.php'); ?>

<div id="leftside">
    <div id="sidebar_s">
        <div class="collapse">
            <div class="toggleCollapse"><div></div></div>
        </div>
    </div>
    <?php include('common/menu.php'); ?>
    </div>
</div>
<div id="container">
    <div id="navTab" class="tabsPage">
        <div class="tabsPageHeader">
            <div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
                <ul class="navTab-tab">
                    <li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">我的主页</span></span></a></li>
                </ul>
            </div>
            <div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
            <div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
            <div class="tabsMore">more</div>
        </div>
        <ul class="tabsMoreList">
            <li><a href="javascript:;">我的主页</a></li>
        </ul>
        <div class="navTab-panel tabsPageContent layoutBox">
            <div class="page unitBox">
                <div class="accountInfo">
                    <div class="alertInfo">
                        <p><a href="https://code.csdn.net/dwzteam/dwz_jui/tree/master/doc" target="_blank" style="line-height:19px"><span>#####</span></a></p>
                        <p><a href="http://pan.baidu.com/s/18Bb8Z" target="_blank"
                              style="line-height:19px">#####</a></p>
                    </div>
                    <div class="right">
                        <p style="color:red">xxxxx <a href="#" target="_blank">xxxx</a></p>
                    </div>
                    <p><span>后台管理</span></p>
                    <p>###:<a href="#" target="_blank">####</a></p>
                </div>
                <div class="pageFormContent" layoutH="80" style="margin-right:230px">


                    <h2>H2:</h2>
                    <div class="unit"><a href="#" target="_blank">test</a></div>

                    <div class="divider"></div>
                    <h2>H@:</h2>
                    <pre style="margin:5px;line-height:1.4em">
                    ##
                    </pre>

                    <div class="divider"></div>
                    <h2>H2(<span style="color:red;">red</span>):</h2><br/>
<pre style="margin:5px;line-height:1.4em;">
dd
</pre>
                </div>

                <div style="width:230px;position: absolute;top:60px;right:0" layoutH="80">
<!--                    <iframe width="100%" height="430" class="share_self"  frameborder="0" scrolling="no" src=""></iframe>-->
                </div>
            </div>

        </div>
    </div>
</div>

</div>

<?php include('common/foot.php'); ?>

</body>
</html>