<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>风险管理平台</title>
    <link href="/static/admin/themes/css/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="login">
    <div id="login_header">
        <h1 class="login_logo">
            <a href="#"><img src="/static/admin/themes/default/images/login_logo.gif" /></a>
        </h1>
        <div class="login_headerContent">
            <div class="navList">
                <ul>
                    <li><a href="#">设为首页</a></li>
                    <li><a href="#">反馈</a></li>
                    <li><a href="#" target="_blank">帮助</a></li>
                </ul>
            </div>
            <h2 class="login_title"><img src="/static/admin/themes/default/images/login_title.png" /></h2>
        </div>
    </div>
    <div id="login_content">

        <?php //echo validation_errors(); ?>

        <div class="loginForm">
            <?php echo form_open(''); ?>
                <p>
                    <label>用户名：</label>
                    <input type="text" name="username" size="20" class="login_input" value="<?php echo set_value('username'); ?>" />

                </p>
            <p><?php echo form_error('username'); ?></p>
                <p>
                    <label>密码：</label>
                    <input type="password" name="password" size="20" value="<?php echo set_value('password'); ?>" class="login_input" />
                </p>
            <p><?php echo form_error('password'); ?></p>
<!--                <p>-->
<!--                    <label>验证码：</label>-->
<!--                    <input class="code" type="text" size="5" />-->
<!--                    <span><img src="/static/admin/themes/default/images/header_bg.png" alt="" width="75" height="24" /></span>-->
<!--                </p>-->
                <div class="login_bar">
                    <input type="hidden" name="reffer" value="<? echo site_url(); ?>/user/login"/>
                    <input class="sub" type="submit" value=" " />
                </div>
            </form>
        </div>
        <div class="login_banner"><img src="/static/admin/themes/default/images/login_banner.jpg" /></div>
        <div class="login_main">
            <ul class="helpList">
                <li><a href="#">如何获取账号？</a></li>
                <li><a href="#">后台调整说明。</a></li>
                <li><a href="#">忘记密码怎么办？</a></li>
                <li><a href="#">为什么登录失败？</a></li>
            </ul>
            <div class="login_inner">
                <p>公司内部用的管理系统</p>
            </div>
        </div>
    </div>
    <div id="login_footer">
        Copyright &copy; 2014 www.7808.com Inc. All Rights Reserved.
    </div>
</div>
</body>
</html>