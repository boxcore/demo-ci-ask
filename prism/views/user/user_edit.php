<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="pageContent">
    <form method="post" action="<? echo  site_url('user/user_edit_act?navTabId=user_list&callbackType=forward')?>" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone)" enctype="multipart/form-data">
        <div class="pageFormContent" layoutH="56">
            <div class="unit">
                <label>用户名:</label>
                <input name="username" id="username" class="disabled" type="text" size="30" value="<?php echo $user_info['username'] ?>" />
            </div>
<!--            <div class="unit">-->
<!--                <label>密码：</label>-->
<!--                <input type="password" id="cp_newPassword" name="password" size="30" minlength="6" maxlength="20" class="required alphanumeric"/>-->
<!--            </div>-->
<!--            <div class="unit">-->
<!--                <label>再次密码：</label>-->
<!--                <input type="password" name="re_password" size="30" equalTo="#cp_newPassword" class="required alphanumeric"/>-->
<!--            </div>-->
            <div class="unit">
                <label>邮箱：</label>
                <input type="text" id="email" alt="请输入电子邮件" name="email" size="30" class="email" value="<?php echo $user_info['email'] ?>" />
            </div>
            <div class="unit">
                <label>用户组：</label>
                <input type="radio" name="group_id" value="1" <?php if($user_info['group_id']=='1'):?>checked="checked" <?php endif; ?> />管理员
                <input type="radio" name="group_id" value="2" <?php if($user_info['group_id']=='2'):?>checked="checked" <?php endif; ?> />编辑
                <input type="radio" name="group_id" value="3" <?php if($user_info['group_id']=='3'):?>checked="checked" <?php endif; ?> />vip会员
                <input type="radio" name="group_id" value="4" <?php if($user_info['group_id']=='4'):?>checked="checked" <?php endif; ?> />普通会员
            </div>

        </div>
        <div class="formBar">
            <ul>
                <input type="hidden" name="uid" value="<?php echo $user_info['uid'] ?>"/>
                <li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
                <li>
                    <div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
                </li>
            </ul>
        </div>
    </form>
</div>
<script type="text/javascript">
    var site_url = "<?php echo site_url() ?>";
    function check_username(){
        var textval = $("#username").val();
        $.post(site_url+'XHR/check_username',{username:textval},
            function(data){
                window.username = data;
            }
        );
        if (window.username.flag == 1){
            return false;
        } else {
            return true;
        }

    }

    function check_email(){
        var textval = $("#email").val();
        $.post(site_url+'XHR/check_email',{email:textval},
            function(data){
                window.email = data;
            }
        );
        console.log(window.email.flag);
        if (window.email.flag == 1){
            return false;
        } else {
            return true;
        }

    }
</script>