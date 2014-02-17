<div class="list_content">
    <div class="list_conL">
        <h2><strong>已解决问题</strong><span><a href="javascript:void(0);">更多</a></span></h2>
        <dl>
        	<!-- 循环已解决问题列表开始 -->
        	<?php foreach ($info as $key => $value):?>
            <dt><a target="_blank" href="<?php echo $value['url'];?>"><?php echo $value['title'];?></a></dt>
            <dd><?php echo $value['answer_num'];?>个回答</dd>
            <?php endforeach;?>
            <!-- 循环已解决问题列表结束 -->
        </dl>
        <div class="interval"></div>
        <h2><strong>未解决问题</strong><span><a href="javascript:void(0);">更多</a></span></h2>
        <dl>
        	<!-- 循环未解决问题列表开始 -->
			<?php foreach ($info as $key => $value):?>
            <dt><a target="_blank" href="<?php echo $value['url'];?>"><?php echo $value['title'];?></a></dt>
            <dd><?php echo $value['answer_num'];?>个回答</dd>
            <?php endforeach;?>
            <!-- 循环未解决问题列表结束 -->
        </dl>
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
</script>