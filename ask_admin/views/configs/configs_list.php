<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php //print_r($cfgs); ?>
<h2 class="contentTitle">系统设置</h2>
<div class="pageContent">
    <form method="post" action="<?php echo site_url('configs/configs_save?navTabId=configs_list&callbackType=closeCurrent')?>" class="pageForm required-validate"  onsubmit="return iframeCallback
    (this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="100">

            <fieldset>
                <legend>网站基础设置</legend>
                <dl>
                    <dt>网站名称：</dt>
                    <dd><input name="cfgs[site_name]" type="text" value="<?php echo $cfgs['site_name']; ?>" /></dd>
                </dl>
                <dl>
                    <dt>网站标题：</dt>
                    <dd><input name="cfgs[site_title]" type="text" value="<?php echo $cfgs['site_title']; ?>"/></dd>
                </dl>
                <dl>
                    <dt>网站关键字：</dt>
                    <dd><input name="cfgs[site_keywords]" type="text" value="<?php echo $cfgs['site_keywords']; ?>"/></dd>
                </dl>
                <dl>
                    <dt>网站描述：</dt>
                    <dd><input name="cfgs[site_description]" type="text" value="<?php echo $cfgs['site_description']; ?>"/></dd>
                </dl>
            </fieldset>

            <fieldset>
                <legend>联系资料</legend>
                <dl>
                    <dt>手机：</dt>
                    <dd><input name="cfgs[mobile]" type="text" value="<?php echo $cfgs['mobile']; ?>" /></dd>
                </dl>
                <dl>
                    <dt>邮箱：</dt>
                    <dd><input name="cfgs[email]" type="text" value="<?php echo $cfgs['email']; ?>"/></dd>
                </dl>
                <dl>
                    <dt>微博：</dt>
                    <dd><input name="cfgs[weibo]" type="text" value="<?php echo $cfgs['weibo']; ?>"/></dd>
                </dl>
                <dl>
                    <dt>QQ：</dt>
                    <dd><input name="cfgs[qq]" type="text" value="<?php echo $cfgs['qq']; ?>"/></dd>
                </dl>
                <dl class="wrap">
                    <dt>地址：</dt>
                    <dd><input name="cfgs[addr]" type="text" value="<?php echo $cfgs['addr']; ?>"/></dd>
                </dl>
            </fieldset>

            <fieldset>
                <legend>网站开关</legend>
                <label><input type="radio" name="cfgs[is_closed]" value="0" <?php if(! $cfgs['is_closed']):
                    ?>checked="checked"<?php endif; ?>/>开启网站</label>
                <label><input type="radio" name="cfgs[is_closed]" value="1" <?php if($cfgs['is_closed']):
                    ?>checked="checked"<?php endif; ?>/>关闭站点</label>
            </fieldset>

            <fieldset>
                <legend>其他设置</legend>
                <dl class="nowrap">
                    <dt>备案号码：</dt>
                    <dd><input type="text" name="cfgs[beian]" value="<?php if($cfgs['beian']): ?><?php echo $cfgs['beian'] ?><?php endif; ?>"/></dd>
                </dl>
                <dl class="nowrap">
                    <dt>统计代码：</dt>
                    <dd><textarea name="cfgs[code]" cols="80" rows="2"><?php if($cfgs['code']): ?><?php echo $cfgs['code'] ?><?php endif; ?></textarea></dd>
                </dl>
            </fieldset>
        </div>

        <div class="formBar">
            <ul>
                <li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
                <li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
            </ul>
        </div>

    </form>


</div>
