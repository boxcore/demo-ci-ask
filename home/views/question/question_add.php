<link rel="stylesheet" href="<?php echo src_url('js/kindeditor/themes/default/default.css');?>" />
<link rel="stylesheet" href="<?php echo src_url('js/kindeditor/plugins/code/prettify.css');?>" />
<script charset="utf-8" src="<?php echo src_url('js/kindeditor/kindeditor.js');?>"></script>
<script charset="utf-8" src="<?php echo src_url('js/kindeditor/lang/zh_CN.js');?>"></script>
<script charset="utf-8" src="<?php echo src_url('js/kindeditor/plugins/code/prettify.js');?>"></script>
<script>
var editor1;
KindEditor.ready(function(K) {
	//editor1 = K.create('textarea[name="content"]');
    editor1 = K.create('textarea[name="content"]', {
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
<div class="content">
    <div class="content_question">
        <h1 class="issue">发布一个新问题</h1>
        <div class="selection_sort">
            <h3>分类</h3>
			<select name="cat_id" onchange="changeSub()" id="sort">
				<option value="0">请选择大类</option>
				<?php foreach ($sort as $key => $value):?>
				<option value="<?php echo $value['cat_id'];?>"><?php echo $value['cat_name'];?></option>
				<?php endforeach;?>
			</select>
			<select name="cat_sub" id="sub">
				<option value="0">请选择小类</option>
        	</select>
        </div>
        <div class="selection_sort question">
            <h3>问题</h3>
            <div class="question_case">
                <input name="question" type="text" id="question" value="">
            </div>
        </div>
        <div class="selection_sort">
            <h3>问题补充<span>(选填,图片只可以上传小于1M且宽高都不超过500px)</span></h3>
            <div class="question_box">
            	<textarea id="content" name="content" style="width:690px;height:200px;visibility:hidden;"></textarea>
           	</div>
            <div><input name="save" type="button" class="question_btn" onclick="saveQuestion()"></div>
        </div>
    </div>
</div>
<script type="text/javascript">

function saveQuestion(){
	editor1.sync();
	var cat_id = $("#sort").val();
	var cat_sub  = $("#sub").val();
	var ques = $("#question").val();
	var cont = $("#content").val();

	if (cat_id == '') {
		alert('请选择分类!');
		return false;
	}
	
	if (ques == '') {
		alert('请输入问题!');
		("#question").focus();
		return false;
	}

	if (editor1.isEmpty()) {
		alert('请输入内容!');
		editor1.focus();
		return false;
	}

	jQuery.ajax({
		type : "POST",
		url : site_url+'question/check_add_question',
        dataType:'json',
		data : {
			cat_id : cat_id,
			cat_sub : cat_sub,
			question : ques,
			content : cont
		},
		success:function(data){
			if (data.flag) {
				alert(data.message);
				window.location.href = site_url+'detail-'+data.last_id+'.html';
			} else {
                alert(data.message);
			}
		}
	});
}

function changeSub(){
	var sortId = $("#sort").val();
	var response = jQuery.ajax({
		type: "POST",
		url: 'http://ask.7808.com/question/get_sub_info',
		data: {
			id:sortId,
			timestamp:new Date().getTime()
		},
		dataType: "html",
		async: false
	}).responseText;  
	jQuery("#sub").empty();
	jQuery("#sub").html(response);
}
</script>