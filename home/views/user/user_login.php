<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title><?php echo $GLOBALS['configs']['site_name'] ?> - 用户登录</title>
    <link rel="stylesheet" type="text/css" href="<?php echo src_url('css/style.css');?>"/>
    <script src="<?php echo src_url('js/jquery-1.7.2.min.js');?>"></script>
    <script src="<?php echo src_url('js/common.js');?>"></script>
</head>
<body class="have_bg">

<div class="me_box">
	<div class="meb_left"><img src="<?php echo src_url('images/enter_banner.jpg');?>" height="338" width="494"> </div>
    <form method="post" id="login-form" autocomplete="off">
        <div class="enter_capacity">
            <div id="capacity">
                <h1>登录</h1>
                <div class="notice-icons message hide" id="message"> </div>
                <div class="cap_frame">
                    <label>用户名:</label>
                    <p class="cf_person"><em></em>
                        <input name="username" id="username" placeholder="请输入账号" value="" type="text">
                    </p>
                    <span class="reminder" id="userinfo" style="display:none"></span>
                </div>
                <div class="cap_frame">
                    <label>密码:</label>
                    <p class="cf_lock"><em></em>
                        <input name="password" id="password" placeholder="请输入密码" value="" type="password">
                    </p>
                    <span class="reminder" id="passwordinfo" style="display:none"></span>
                </div>
                <div class="cap_enter">
                    <label></label>
                    <p>
                        <span class="automatic"><input name="remember-username" value="1" type="checkbox" checked="checked">记住账户名</span>
                        <span class="automatic"><input name="autologin" value="1" type="checkbox" >下次自动登录</span>
                    </p>
                </div>
                <span class="enter"><button type="submit" name="send_ajax" id="send_ajax">登 录</button></span>
                <p class="no_register">还不是指导网的会员? <a href="<?php echo site_url('register.html');?>">马上免费注册</a></p>
            </div>
        </div>


    </form>
</div>
<script type="text/javascript">
$(function(){
	$("#username").focus(function(){
		$("#userinfo").show().html('请输入邮箱、用户名、手机号');
	}).blur(function(){
		$("#userinfo").hide();
	});

	$("#password").focus(function(){
		$("#passwordinfo").show().html('6-20位字符，可使用字母、数字或符号的组合');
	}).blur(function(){
		$("#passwordinfo").hide();
	});

    $('#login-form').submit(function(){
        var username = $('#username').val();
        var password = $('#password').val();

        var remember_username = $("input[name='remember-username']:checked").val();
        console.log(remember_username);
        if(remember_username){
            document.cookie  = 'username='+username;
        }

        if(username == ''){
            $('#userinfo').attr({style:'display:block'})
                .html('<b style="color:red;font-weight: normal;">用户名不能为空</b>');
            return false;
        }
        if(password == ''){
            $("#passwordinfo").attr({style:'display:block'})
                .html('<b style="color:red;font-weight: normal;">密码不能为空</b>');
            return false;
        }

        var params = $('input').serialize();
        console.log(params);

        $.post(
            site_url+'user/ajax_verify_login',
            {
                username:username,
                password:password
            },
            function (data) { //回调函数
                console.log(data);console.log(data['message']);
                if(data['flag']==1){
//                    window.location.href=site_url+"user/center?ref="+window.location.href;
//                    window.location.reload(); //重新加载页面
                }else{
                    if(data['field'] == 'username'){
                        $('#userinfo').attr({style:'display:block'})
                            .html('<b style="color:red;font-weight: normal;">'+data['message']+'</b>');
                    }
                    else if(data['field'] == 'password'){
                        $("#passwordinfo").attr({style:'display:block'})
                            .html('<b style="color:red;font-weight: normal;">'+data['message']+'</b>');
                    }
                }
            }
        );

        return false;
    });
});


//function check_login(json){
//
//    alert(111);
//    console.log(json);
//}

</script>
</body>
</html>
