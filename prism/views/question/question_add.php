<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="pageContent">
    <form method="post" action="<? echo  site_url('question/question_add_act?navTabId=question_list&callbackType=closeCurrent')?>" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone)" enctype="multipart/form-data">
        <div class="pageFormContent" layoutH="56">
            <div class="unit">
                <label>问题名称:</label>
                <input type="text" name="title" id="title" class="required" size="50" value="" alt="问题标题"
                       minlength="5"  maxlength="150"/>
            </div>

            <div class="unit">
                <label>邮箱：</label>
                <input type="text" id="email" alt="请输入电子邮件" emailvalid="check_email()" name="email" size="30"
                class="required email"/>
            </div>
            <div class="unit">
                <label>用户组：</label>
                <input type="radio" name="group_id" value="1" />管理员
                <input type="radio" name="group_id" value="2" />编辑
                <input type="radio" name="group_id" value="3" />vip会员
                <input type="radio" name="group_id" value="4" checked="checked" />普通会员
            </div>

        </div>
        <div class="formBar">
            <ul>
<!--                <input type="hidden" name="forwardUrl" value="--><?php //echo site_url('user/user_list') ?><!--"/>-->
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