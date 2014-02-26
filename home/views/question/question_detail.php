<link rel="stylesheet" href="<?php echo src_url('js/kindeditor/themes/default/default.css');?>" />
<link rel="stylesheet" href="<?php echo src_url('js/kindeditor/plugins/code/prettify.css');?>" />
<script charset="utf-8" src="<?php echo src_url('js/kindeditor/kindeditor.js');?>"></script>
<script charset="utf-8" src="<?php echo src_url('js/kindeditor/lang/zh_CN.js');?>"></script>
<script charset="utf-8" src="<?php echo src_url('js/kindeditor/plugins/code/prettify.js');?>"></script>
<script>
var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="content"]', {
        resizeType : 1,
        allowPreviewEmoticons : false,
        allowImageUpload : false,
        items : [
            'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
            'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
            'insertunorderedlist', '|', 'emoticons', 'image', 'link']
    });
});


var editor_question;
KindEditor.ready(function(K) {
    editor_question = K.create('textarea[name="edit_question"]', {
        resizeType : 1,
        allowPreviewEmoticons : false,
        allowImageUpload : false,
        items : [
            'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
            'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
            'insertunorderedlist', '|', 'emoticons', 'image', 'link']
    });
});
</script>
<?php 
$string = '';
if ($question_info['cat_id']){
	$string .= '?sort='.$question_info['cat_id'];
}
if ($question_info['cat_sub']){
	$string .= '&sub='.$question_info['cat_sub'];
}
?>

<p class="crumbs"> 当前位置：<a href="<?php echo site_url('');?>">首页</a> > <a href="<?php echo $question_info['cat_info']['cat_url']; ?>">问答列表</a> > <a href="javascript:void(0);" class="current">回答 </a> </p>

<div class="list_content">
    <div class="list_conL">
        <div class="ask_box">
            <h1 class="ask_title"><?php echo $question_info['title'];?></h1>
            <div class="ask-info">
				<span>提问者: <?php echo $question_info['author'];?></span>| 
				<span>分类：<a href="<?php echo $question_info['cat_info']['cat_url']; ?>"><?php echo
                        $question_info['cat_info']['cat_name'];?></a></span>| <span>浏览<?php echo $question_info['preview_num'];?>次</span> | <span><?php echo $question_info['created_time'];?></span>
			</div>
            <div id="question_content">
                <div class="ask_info" >
                    <?php echo $question_info['description'];?>
                </div>
                <?php if( $_COOKIE['uid'] == $question_info['author_id'] ): ?><a id="edit_question_link" href="javascirpt:;" style="display: none;">编辑</a><?php endif; ?>
            </div>

            <div id="edit-question-area" style="display:none;">
                <textarea name="edit_question" style="width:650px;height:200px;visibility:hidden;">
                    <?php echo $question_info['description'];?>
                </textarea>
                <div id="edit-question-button" style="float: right;text-align: right;">
                    <button type="submit" name="submit" style=" padding: 5px; margin: 5px 10px;">提交</button>
                    <button type="reset" name="close" style=" padding: 5px; margin: 5px 10px;">取消</button>
                </div>
                
            </div>

			<h2>我来回答</h2>
			<div class="app-and-share">
				<textarea id="content" name="content" style="width:650px;height:200px;visibility:hidden;"></textarea>
			</div>
			<div class="subbox">
				<span><input name="is_anonymous" type="checkbox" value="1" ><em>匿名</em></span>
				<input name="button" type="submit" class="submit_btn" value="提交回答" onclick="addAnswer()">
				<input name="qid" id="qid" type="hidden" value="<?php echo $question_info['id']?>">
			</div>
        </div>
        <?php if($question_info['answer_num']):?>
        <div class="interval"></div>
        <div class="ask_list">
            <dl>
                <dt class="ask_num"><strong><?php echo $question_info['answer_num'];?>条回答</strong></dt>
                <dd class="Arrange"><span class="current">按默认顺序</span> <span class="f_pipe">|</span> <a href="javascript:void(0);">按时间排序</a></span></dd>
            </dl>
            <!-- 回答列表开始 -->
            <?php foreach ($answer_list as $key => $value):?>
            <div id="comment-<?php echo $value['id']; ?>" class="person_one <?php if (count($answer_list) == $key+1)
            {echo
            'no_border';}?>">
                <dl class="answerer">
                    <dt><?php echo $value['author'];?></dt>
                    <dd><?php echo date('Y年m月d日  h:i')?></dd>
                </dl>
                <P class="answer"><?php echo $value['content'];?></P>
                <div class="evaluate"><span>评论</span><span class="f_pipe">|</span><span class="praise"><span class="praise_inner"><?php echo $value['support'];?></span></span></div>
            </div>
            <?php endforeach;?>
             <!-- 回答列表结束 -->
        </div>
        <?php endif;?>
        <?php if (count($relate)):?>
        <div class="interval"></div>
        <div class="ask_list">
            <h2>相关问题</h2>
            <!-- 相关问题列表开始 -->
            <?php foreach ($relate as $key => $value):?>
            <dl class="relevant <?php if (count($relate) == $key+1){echo 'no_border';}?>">
                <dt><a href="<?php echo site_url('question/detail?qid='.$value['id'].'');?>"><?php echo $value['title'];?></a></dt>
                <dd><?php echo date('Y-m-d')?></dd>
            </dl>
            <?php endforeach;?>
             <!-- 相关问题列表结束 -->
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

    if($.cookie("logined_in")){
        editor.sync();
        var comment = $("#content").val();
        var qid  = $("#qid").val();
        var is_anonymous = $("input[name='is_anonymous']:checked").val();

        if (editor.isEmpty()) {
            alert('请输入内容!');
            editor.focus();
            return false;
        }

        jQuery.ajax({
            type : "POST",
            url : site_url+"question/check_add_answer",
            dataType:"json",
            data : {
                content : comment,
                qid : qid,
                is_anonymous:is_anonymous
            },
            success:function(data){
                console.log(data);
                if (data.flag) {
                    alert('提问成功!');
                    window.location.href = window.location.href + '?#comment-' + data.answer_id;

                } else {
                    alert(data.message);
                    return false;
                }
            }
        });
    }else{
        $.layer({
            type : 1,
            shade : [0.5 , '#000' , true],
            fix : true,
            title : false,
            area : ['380px' , '267px'],
            offset : ['150px', ''],
            page : {dom : '#dialog-login'},
            close : function(index){
                layer.close(index);
            }
        });
        $("#dialog-login h1").html("您还没有登陆，请先<strong>登陆</strong>!");
    }

}
</script>