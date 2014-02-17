// 预设常用变量
var site_url = 'http://ask.7808.com/';
var src_url = 'http://s1.7808.com/';


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