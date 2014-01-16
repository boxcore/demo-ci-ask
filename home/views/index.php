<div id="content_box">
	<div class="content_inner">
		<div class="content_right">
			<div class="left">
				<h3 class="right_t"><a href="#">创业新动向</a></h3>
				<div class="new_tendency">
					<div class="pic"><a href="#"><img src="<?php echo src_url('images/pic1.jpg');?>" width="202" height="166"></a></div>
					<ul>
						<li><a href="#">冰之物语怎么样？</a></li>
						<li><a href="#">苏州金石投资的总部在哪里?</a></li>
						<li><a href="#">冰之物语怎么样？</a></li>
						<li><a href="#">苏州金石投资的总部在哪里?</a></li>
						<li><a href="#">冰之物语怎么样？</a></li>
						<li><a href="#">苏州金石投资的总部在哪里?</a></li>
						<li><a href="#">冰之物语怎么样？</a></li>
					</ul>
				</div>
				<div class="new_tendency">
					<h3><a href="javascript:void(0);">已解决问题</a></h3>
					<dl>
						<?php if ($info):?>
						<?php foreach ($info as $key => $value):?>
						<dt><a href="<?php echo site_url('question/detail?qid='.$value['id'].'');?>"><?php echo $value['title'];?></a></dt>
						<dd><?php echo $value['answer_num'];?>个回答</dd>
						<?php endforeach;?>
						<?php endif;?>
					</dl>
				</div>
				<div class="attention">
					<h3><a href="javascript:void(0);">正在关注</a></h3>
					<?php if ($info):?>
					<?php foreach ($info as $key => $value):?>
					<dl>
						<dt><a href="<?php echo site_url('question/detail?qid='.$value['id'].'');?>"><?php echo $value['title'];?> </a><p>flower<span> 浏览<?php echo $value['preview_num'];?>次 </span><?php echo $value['answer_num'];?>个回复</p></dt>
						<dd><?php echo date('m月d日', $value['create'])?></dd>
					</dl>
					<?php endforeach;?>
					<?php endif;?>
				</div>
			</div>
			<div class="right">
				<h3><a href="#">本周最热</a></h3>
				<ul class="hot">
					<li><span>1</span><a href="#">冰之物语怎么样？</a></li>
					<li><span>2</span><a href="#">在网上看伊屏清斑祛斑效果好的很</a></li>
					<li><span>3</span><a href="#">我想在县城加盟顺丰快递</a></li>
					<li><span>4</span><a href="#">在网上看伊屏清斑祛斑效果好的很</a></li>
					<li><span>5</span><a href="#">冰之物语怎么样？</a></li>
					<li><span>6</span><a href="#">在网上看伊屏清斑祛斑效果好的很</a></li>
					<li><span>7</span><a href="#">我想在县城加盟顺丰快递</a></li>
					<li><span>8</span><a href="#">在网上看伊屏清斑祛斑效果好的很</a></li>
					<li><span>9</span><a href="#">苏州金石投资加盟后总部会指导我?</a></li>
				</ul>
				<h3><a href="#">热门地区</a></h3>
				<div class="hot_add"> 
					<a href="#">北京</a>
					<a href="#">上海</a>
					<a href="#">南京</a>
					<a href="#">重庆</a> 
					<a href="#">北京</a>
					<a href="#">上海</a>
					<a href="#">南京</a>
					<a href="#">重庆</a> 
					<a href="#">北京</a>
					<a href="#">上海</a>
					<a href="#">南京</a>
					<a href="#">重庆</a> 
					<a href="#">北京</a>
					<a href="#">上海</a>
					<a href="#">南京</a>
					<a href="#">重庆</a> 
					<a href="#">北京</a>
					<a href="#">上海</a>
					<a href="#">南京</a>
					<a href="#">重庆</a> 
				</div>
				<h3><a href="#">最新文章</a></h3>
				<ul class="new_articles">
					<li><a href="#">冰之物语怎么样？</a></li>
					<li><a href="#">苏州金石投资的总部在哪里？</a></li>
					<li><a href="#">我想在县城加盟顺丰快递</a></li>
					<li><a href="#">衣服店生意好做吗？</a></li>
					<li><a href="#">在网上看伊屏清斑祛斑效果好的很</a></li>
					<li><a href="#">快餐店生意好做吗</a></li>
					<li><a href="#">苏州金石投资加盟后总部会指导我?</a></li>
					<li><a href="#">苏州金石投资的总部在哪里</a></li>
					<li><a href="#">我想在县城加盟顺丰快递</a></li>
				</ul>
			</div>
		</div>
		<div class="hot_item">
			<div class="hot_item_box"><h1>热门项目</h1><span><a href="#">所有项目</a></span> </div>
			<ul class="hot_wrap">
				<li><a href="#"><img src="<?php echo src_url('images/pic2.jpg');?>" width="155" height="112"></a><p><a href="#">投资金额：5万</a></p></li>
				<li><a href="#"><img src="<?php echo src_url('images/pic2.jpg');?>" width="155" height="112"></a><p><a href="#">投资金额：5万</a></p></li>
				<li><a href="#"><img src="<?php echo src_url('images/pic2.jpg');?>" width="155" height="112"></a><p><a href="#">投资金额：5万</a></p></li>
				<li class="no_margin"><a href="#"><img src="<?php echo src_url('images/pic2.jpg');?>" width="155" height="112"></a><p><a href="#">投资金额：5万</a></p></li>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$("#nav_all").show();
});
</script>