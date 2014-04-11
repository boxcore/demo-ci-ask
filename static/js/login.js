//function checkRegister() {
//	var user = trim($("#user").val());
//	alert(user);
//}

// 用户登陆
var site_url = 'http://www.966069.com/';
var src_url = 'http://www.966069.com/static/';

$(document).ready(function (){
    $('#send_ajax').click(function(){
        var username = $('#username').val();
        var password = $('#password').val();
        if(username == ''){
            $('#userinfo').attr(style:'display:block');
            $('#userinfo').text('xxxxx');
            return false;
        }
        if(password == ''){
            return false;
        }

        var params = $('input').serialize();
        $.ajax({
            url:site_url+'user/ajax_verify_login',
            type:post,
            dataType:'json',
            data:params,
            success:update_page
        });

    });

    // post method
//    $('#test_post').click(function(){
//        $.post(
//
//        )
//    })
});

function update_page(json){
    alert('get_ok');
}