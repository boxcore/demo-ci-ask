// 预设常用变量
var site_url = 'http://ask.7808.com/';
var src_url = 'http://ask.7808.com/static/';


/**
 * 公共Cookie操作
 *
 * @author chunze.huang
 */


//function setCookie(name, value, days = 7){// 设置COOKIE
//    var exp  = new Date();
//    exp.setTime(exp.getTime() + days*24*3600*1000 );
//    document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
//}
//
//function getCookie(name){// 获取COOKIE
//    var arr = document.cookie.match( new RegExp("(^|)" + name + "=([^;]*)(;|$)") );
//    if( arr != null ) return unescape(arr[2]); return null;
//}
//
//function delCookie(name){// 删除cookie
//    var exp = new Date();
//    exp.setTime(exp.getTime() - 1);
//    var cval=getCookie(name);
//    if(cval!=null) document.cookie= name + "="+cval+";expires="+exp.toGMTString();
//}

$(function() {
    //search
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

//删除左边的空格
//function ltrim(str){
//    return str.replace(/(^\s*)/g,"");
//}
////删除右边的空格
//function rtrim(str){
//    return str.replace(/(\s*$)/g,"");
//}


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

