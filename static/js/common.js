// 预设常用变量
var site_url = 'http://ask.7808.com/';
var src_url = 'http://ask.7808.com/static/';


// 全局跟参函数

$(function() {
    //搜索框
    $("#form-search").submit(function(){
        var keywordInput = $(this).find("input[name='k']");
        if(keywordInput.val() === ''){
            alert("请输入关键词");
            keywordInput.focus();
            return false;
        } else {
            var keywords = clearString( keywordInput.val() );
            if( keywords === ''){
                alert("您的输入有误");
                keywordInput.focus();
                return false;
            }else{
                $("input[name='k']").val( keywords );
            }

        }
    });


    // 弹出登陆框
    var $dialogForm = $("#dialog-login-form");
    $dialogForm.find('.submit').click(function() {
        var form = $(this).closest("form");
        var $username = form.find(".username");
        var $password = form.find(".password");
        var username = $username.val();
        var password = $password.val();
        var $autologin = form.find('.autologin');
        if (!username) {
            alert("请输入用户名");
            return false;
        }
        if (!password) {
            alert("请输入密码");
            return false;
        }
        $.getJSON(site_url+'user/ajax_verify_login?', {ajax: true, username: username, password: password, autologin: $autologin.attr('checked')}, function(data) {
            if (data.flag !== 1) {
                alert(data.message);
            } else {
                //layer.closeAll();

                window.location.reload();
            }
        });

        return false;

    });

});


//过滤特殊字符
function clearString(s) {
    var pattern = new RegExp("[`~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）&;|{}【】‘；：”“'。，、？]");
    var rs = "";
    for(var i=0; i< s.length; i++) {
        rs = rs+ s.substr(i,1).replace(pattern, '');
    }
    return rs;
}

//删除左右两端的空格
function trim(str){
    return str.replace(/(^\s*)|(\s*$)/g, "");
}


// 跟踪来路链接
$(function(){
    $("a[rel]").click(function(){
        var url = $(this).attr("href");
        var rel = $(this).attr("rel");
        if(rel == ''){
            rel = window.location.href;
        }
        $(this).attr({href: url+"?rel="+encodeURIComponent(rel)});

    });
});

