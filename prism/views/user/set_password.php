<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="pageContent">

    <form method="post" action="<? echo site_url('user/set_password_save') ?>?navTabId=configs_list&callbackType=closeCurrent" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
        <div class="pageFormContent" layoutH="58">

            <div class="unit">
                <label>旧密码：</label>
                <input type="password" name="old_password" size="30" minlength="6" maxlength="20" class="required" />
            </div>
            <div class="unit">
                <label>新密码：</label>
                <input type="password" id="cp_newPassword" name="new_password" size="30" minlength="6" maxlength="20" class="required alphanumeric"/>
            </div>
            <div class="unit">
                <label>重复输入新密码：</label>
                <input type="password" name="re_new_password" size="30" equalTo="#cp_newPassword" class="required alphanumeric"/>
            </div>

        </div>
        <div class="formBar">
            <ul>
                <li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
                <li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
            </ul>
        </div>
    </form>

</div>
