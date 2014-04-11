// 预设常用变量
var site_url = 'http://ask.966069.com/';var src_url = 'http://ask.966069.com/static/';var base_domain = '966069.com';var site_domain = 'ask.966069.com';


/**
 * ++++++++++++++++++++++++++
 * 公共JS部分
 * ++++++++++++++++++++++++++
 */

// 导航特效
$(function(){

    // 普通页面隐藏主导航
    $('#sort_all_content:not(".is_index")').bind('hover', function() {
        if ($("#nav_all").css('display') == 'none') {
            $("#nav_all").show();
            $(".sort_inner").bind('hover', function(){
                if ( $(this).children("p").css('display') == 'none' ) {
                    $(this).children("p").attr({style:'display:block'});
                }else{
                    $(this).children("p").hide();
                }
            });

        } else {
            $("#nav_all").hide();
            $(".sort_inner").unbind();
        }
    });

    // 首页显示主导航
    $("#sort_all_content .is_index").bind('hover', function(){
        if ( $(this).children("p").css('display') == 'none' ) {
            $(this).children("p").attr({style:'display:block'});
        }else{
            $(this).children("p").hide();
        }
    });
});


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
        setRemember();
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

    // 监听记录用户名事件
    $("input[name='remember-username'],input[name='autologin']").bind("click",function(){
        setRemember();
    });
});





/**
 * ++++++++++++++++++++++++++
 * 公共处理函数
 * ++++++++++++++++++++++++++
 */

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

/**
 * 保存设置记录用户名的cookie
 *
 * 思考问题：为什么这样的函数放到 $(function(){ -- }); 里外界调用不正常？
 */
function setRemember(){
    var username = $("input[name='username']").val();

    if($("input[name='remember-username']").attr('checked') == "checked"){
        $.cookie('remember_username', username, { expires: 60 ,  path: '/', domain:base_domain});
        $.cookie('remember_username_check', 1, { expires: 60 ,  path: '/', domain:base_domain});
    }else{
        $.cookie('remember_username', username, { expires: -1 ,  path: '/', domain:base_domain});
        $.cookie('remember_username_check', 0, { expires: -1 ,  path: '/', domain:base_domain});
    }

    if($("input[name='autologin']").attr('checked') == "checked"){
        $.cookie('autologin', 1, { expires: 60 ,  path: '/', domain:base_domain});
    }else{
        $.cookie('autologin', 0, { expires: -1 ,  path: '/', domain:base_domain});
    }

}

/**
 * ++++++++++++++++++++++++++
 * 问题处理和答案处理
 * ++++++++++++++++++++++++++
 */

$(document).ready(function(){
    $('#question_content').bind({
        mouseenter: function(e) {
// Hover event handler
            $(this).children('#edit_question_link').attr({'style':'display:block'});
        },
        mouseleave: function(e) {
// Hover event handler
            $(this).children('#edit_question_link').attr({'style':'display:none'});
        }
    });

    $("#edit_question_link").bind('click', function(){
        $content = $('#question_content .ask_info').html();
        $('#question_content').hide();
        $('#question_content').next('#edit-question-area').show();
    });

    $("#edit-question-button>button[name='submit']").click(function(){
        editor_question.sync();
        $content = $(":input[name='edit_question']");
        var content = $content.val();
        var question_id = $(":input[name='question_id']").val();

        jQuery.ajax({
            type : "POST",
            url : site_url+"question/ajax_update_question",
            dataType:"json",
            data : {
                content : content,
                qid : question_id
            },
            success:function(data){
                if (data.flag) {
                    alert('修改问题成功!');
//                    window.location.href = site_url+'detail-' + question_id;
                    window.location.reload();
                } else {
                    alert(data.message);
                    return false;
                }
            }
        });
    });

    $("#edit-question-button>button[name='close']").click(function(){
        $('#edit-question-area').hide();
        $('#question_content').show();
    });



});

