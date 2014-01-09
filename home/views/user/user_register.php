<div class="main">
    <h3 class="line">新用户注册</h3>
    <div class="form">
        <form name="reg" action="" method="post" onsubmit="return docheck();">
            <p>
                <label>用户名：</label>
                <input type="text" id="username" name="username" onblur="check_username()" class="input3" value="">
                <span id="usernametip" class="input_desc">不超过14个字节(中文，数字，字母和下划线)</span>
            </p>
            <p>
                <label>登录密码：</label>
                <input type="password" name="password" id="password" class="input3" onblur="check_passwd()">
                <span id="passwordtip" class="input_desc" onblur="check_passwd()">长度6-14位，字母区分大小写</span>
            </p>
            <p>
                <label>密码确认：</label>
                <input type="password" name="repassword" id="repassword" class="input3" onblur="check_repasswd()">
                <span id="repasswordtip" class="input_desc">与登录密码输入一致</span>
            </p>
            <p>
                <label>电子邮件：</label>
                <input type="text" id="email" name="email" class="input3" onblur="check_email()">
                <span id="emailtip" class="input_desc">请输入正确的电子邮箱地址</span>
            </p>
            <p>
                <label>验证码：</label>
                <input type="text" class="input4" id="code" name="code" onblur="check_code()">&nbsp;<img align="absmiddle" id="verifycode" onclick="javascript:updatecode();" src="http://ask.7808.cn/user/code.html"><a href="javascript:updatecode();">&nbsp;换一个</a>
                <span id="codetip" class=""></span>
            </p>
            <p><input type="submit" name="submit" class="submit" value="提交注册"></p>
        </form>
    </div>
</div>
<div class="sidebar">
    <p class="bd">已有账号？<a href="">马上登录！</a></p>
    <ul>
        <li>我们提醒您注意，您需要注册并登陆，才能享受我们的完整服务进行各项操作。</li>
        <li>密码过于简单有被盗的风险，一旦密码被盗你的个人信息有泄漏的危险。</li>
        <li>我们拒绝垃圾邮件，请使用有效的邮件地址</li>
    </ul>
</div>