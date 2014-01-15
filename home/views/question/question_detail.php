<link rel="stylesheet" href="<?php echo src_url('js/kindeditor/themes/default/default.css');?>" />
<link rel="stylesheet" href="<?php echo src_url('js/kindeditor/plugins/code/prettify.css');?>" />
<script charset="utf-8" src="<?php echo src_url('js/kindeditor/kindeditor.js');?>"></script>
<script charset="utf-8" src="<?php echo src_url('js/kindeditor/lang/zh_CN.js');?>"></script>
<script charset="utf-8" src="<?php echo src_url('js/kindeditor/plugins/code/prettify.js');?>"></script>
<script>
var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="content"]');
});
</script>
<?php $info = $info[0];?>
<p class="crumbs"> 当前位置：<a href="<?php echo site_url('');?>">首页</a> > <a href="<?php echo site_url('question/listAll');?>">问答列表</a> > <a href="javascript:void(0);" class="current">回答 </a> </p>
<div class="list_content">
    <div class="list_conL">
        <div class="ask_box">
            <h1 class="ask_title"><?php echo $info['title'];?></h1>
            <div class="ask-info">
				<span>提问者: <?php echo $info['author'];?></span>| 
				<span>分类：<a href="javascript:void(0);">食品机械 </a></span>| <span>浏览<?php echo $info['preview_num'];?>次</span> | <span><?php echo $info['create_time'];?></span>
			</div>
			<div class="ask_info"><?php echo $info['description'];?></div>
			<h2>我来回答</h2>
			<div class="app-and-share">
				<textarea id="content" name="content" style="width:650px;height:200px;visibility:hidden;"></textarea>
			</div>
			<div class="subbox">
				<span><input name="" type="checkbox" value=""><em>匿名</em></span>
				<input name="button" type="submit" class="submit_btn" value="提交回答" onclick="addAnswer()">
				<input name="qid" id="qid" type="hidden" value="<?php echo $info['id']?>">
			</div>
        </div>
        <?php if($info['answer_num']):?>
        <div class="interval"></div>
        <div class="ask_list">
            <dl>
                <dt class="ask_num"><strong><?php echo $info['answer_num'];?>条回答</strong></dt>
                <dd class="Arrange"><span class="current">按默认顺序</span> <span class="f_pipe">|</span> <a href="javascript:void(0);">按时间排序</a></span></dd>
            </dl>
            <?php foreach ($answer as $key => $value):?>
            <div class="person_one <?php if (count($answer) == $key+1){echo 'no_border';}?>">
                <dl class="answerer">
                    <dt><?php echo $value['author'];?></dt>
                    <dd><?php echo date('Y年m月d日 m:i')?></dd>
                </dl>
                <P class="answer"><?php echo $value['content'];?></P>
                <div class="evaluate"><span>评论</span><span class="f_pipe">|</span><span class="praise"><span class="praise_inner"><?php echo $value['support'];?></span></span></div>
            </div>
            <?php endforeach;?>
        </div>
        <?php endif;?>
        <?php if (count($relate)):?>
        <div class="interval"></div>
        <div class="ask_list">
            <h2>相关问题</h2>
            <?php foreach ($relate as $key => $value):?>
            <dl class="relevant <?php if (count($relate) == $key+1){echo 'no_border';}?>">
                <dt><a href="<?php echo site_url('question/detail?qid='.$value['id'].'');?>"><?php echo $value['title'];?></a></dt>
                <dd><?php echo date('Y-m-d')?></dd>
            </dl>
            <?php endforeach;?>
        </div>
        <?php endif;?>
    </div>
    <div class="list_conR">
        <ul class="list_conR_pic">
            <li class="pic"><a href="#"><img src="<?php echo src_url('images/pic3.jpg'); ?>" width="261" height="140"></a></li>
            <li class="pic_two"><a href="#"><img src="<?php echo src_url('images/pic3.jpg'); ?>" width="261" height="140"></a></li>
            <li><a href="#"><img src="<?php echo src_url('images/pic4.jpg'); ?>" width="261" height="116"></a></li>
        </ul>
    </div>
</div>
<script type="text/javascript">
$(function(){
	$('#sort_all_content').bind('click', function() {
		if ($("#nav_all").css('display') == 'none') {
			$("#nav_all").show();
		} else {
			$("#nav_all").hide();
		}
	});
});

function addAnswer(){
	editor.sync();
	var cont = $("#content").val();
	var qid  = $("#qid").val();
	
	if (editor.isEmpty()) {
		alert('请输入内容!');
		editor.focus();
		return false;
	}

	jQuery.ajax({
		type : "POST",
		url : "<?php echo site_url('question/answer_add');?>",
		data : {
			content : cont,
			qid : qid
		},
		success:function(data){
			if (data) {
				alert('提问成功!');
				location.reload();
			} else {
				alert('提问失败!');
			}
		}
	});
}
</script>