<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title><?php if (isset($meta['title'])) echo $meta['title']; ?></title>
    <meta name="keywords" content="<?php if (isset($meta['keywords'])) echo $meta['keywords']; ?>"/>
    <meta name="description" content="<?php if (isset($meta['description'])) echo $meta['description']; ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo src_url('css/style.css'); ?>"/>
</head>
<body>
<?php $this->load->view('common/header.php'); ?>

<div class="login_box">
    <form>
        <table width="640" border="0" class="loginbox_L">
            <tr>
                <td width="96" align="right">用户名：</td>
                <td width="472" class="case"><input name="" type="text" class="user_name"></td>
            </tr>
            <tr>
                <td align="right">密码：</td>
                <td class="case"><input name="" type="text" class="user_mes"></td>
            </tr>
            <tr>
                <td align="center">确认密码：</td>
                <td class="case"><input name="" type="text" class="user_mes"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="automatic">《创业指导网用户注册协议》</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><div class="btnbg">
                        <input name="" type="button" class="login_btn" value="同意协议并注册">
                    </div></td>
            </tr>
        </table>
    </form>
    <div class="mrbc_right">
        <p class="have_account">已有<span>中国创业指导网</span>账号<a href="#">直接登录</a></p>
    </div>
</div>


<?php $this->load->view('common/footer.php'); ?>
</body>
</html>