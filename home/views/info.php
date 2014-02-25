<?php
$type = isset($msg['type']) ? $msg['type'] : 1;
$time = isset($msg['time']) ? $msg['time'] : 3;
$flag = isset($msg['flag']) ? $msg['flag'] : false;
if($flag){
    $info = isset($msg['info']) ? $msg['info'] : '操作成功';
}else{
    $info = isset($msg['info']) ? $msg['info'] : '操作失败';
}
$refer_url = isset($msg['refer_url']) ? $msg['refer_url'] : 'http://ask.7808.com/';
$refer_name = isset($msg['refer_name']) ? $msg['refer_name'] : '首页';
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title><?php if(isset($meta['title'])): ?><?php echo $meta['title']; ?><?php endif; ?></title>
    <meta http-equiv="refresh" content="<?php echo $time+1; ?>;url=<?php echo $refer_url; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo src_url('css/style.css');?>"/>
</head>
<body>
    <?php if($type==1): ?>
	<h3 class="string_message"><strong><?php echo $info; ?>!</strong> <span id="jump_time"><?php echo $time; ?></span>秒后将跳转到<a href="<?php echo $refer_url; ?>"><?php echo $refer_name; ?></a></h3>
    <?php else: ?>
    <h3 class="string_message"><strong><?php echo $info; ?>!</strong> <span id="jump_time"><?php echo $time;
            ?></span>秒后将跳转回上一页</h3>
    <?php endif; ?>

    <script>
        // 跳转方法一
        var t = <?php echo $time; ?>;
        setInterval("refer()", 1000);
        function refer() {
            if(t==0){
                location = "<?php echo $refer_url; ?>";
            }
            document.getElementById('jump_time').innerHTML=""+t;
            t--;
        }

        // 跳转方法二
//        var timer = window.setInterval(function(){
//            document.getElementById('jump_time').innerHTML = parseInt(document.getElementById('jump_time')) - 1;
//            if(document.getElementById('jump_time').innerHTML < 0){
//                window.clearInterval(timer);
//                window.localtion = "http://ask.7808.com";
//            }
//        }, 1000);
    </script>
</body>
</html>