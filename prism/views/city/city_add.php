<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="pageContent">
    <form method="post" action="<? echo  site_url('city/city_add_act?navTabId=city_list&callbackType=closeCurrent')?>" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone)" enctype="multipart/form-data">
        <div class="pageFormContent" layoutH="56">

            <div class="unit">
                <label>地区名称:</label>
                <input name="name" id="name" class="required" usernamevalid="check_username()" type="text" size="30" value="" alt="地区全称，如“广东省”" minlength="2"  maxlength="8"/>
            </div>

            <div class="unit">
                <label>地区简称:</label>
                <input name="sname" id="sname" class="required" type="text" size="30" value="" alt="地区简写，如“粤”"
                       minlength="1"
                       maxlength="6"/>
            </div>

            <div class="unit">
                <label>地区拼音：</label>
                <input type="text" id="pinyin" name="pinyin" size="30" alt="地区全拼，如“guangdongsheng”" minlength="2"
                       maxlength="20"
                       class="required alphanumeric"/>
            </div>

            <div class="unit">
                <label>地区标记：</label>
                <input type="text" name="mark" id="mark" size="30" alt="地区简写标记，如“guangdong”或“gd”" minlength="2"
                       maxlength="20" class="required
                alphanumeric"/>
            </div>

            <div class="unit">
                <label>排序：</label>
                <input type="text" id="sort" alt="0~9999，值大排前" name="sort" size="10" class="required "/>
            </div>

            <div class="unit">
                <label>地区级别：</label>
                <select class="combox" name="province" ref="w_combox_city" refUrl="demo/combox/city_{value}.html">
                    <option value="all">所有省市</option>
                    <option value="bj">北京</option>
                    <option value="sh">上海</option>
                </select>
                <select class="combox" name="city" id="w_combox_city" ref="w_combox_area" refUrl="demo/combox/area_{value}.html">
                    <option value="all">所有城市</option>
                </select>
                <select class="combox" name="area" id="w_combox_area">
                    <option value="all">所有区县</option>
                </select>

            </div>

        </div>
        <div class="formBar">
            <ul>
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