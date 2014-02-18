<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
    <title><?php if(isset($meta['title'])): ?><?php echo $meta['title']; ?><?php endif; ?></title>
    <meta name="keywords" content="<?php if(isset($meta['title'])): ?><?php echo $meta['keywords']; ?><?php endif; ?>" />
    <meta name="description" content="<?php if(isset($meta['title'])): ?><?php echo $meta['description']; ?><?php endif; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo src_url('css/style.css');?>"/>
    <script src="<?php echo src_url('js/jquery-1.7.1.min.js');?>"></script>
    <script src="<?php echo src_url('js/common.js');?>"></script>
</head>
<body>
	<div id="top_box">
		<div class="top_inner">
		    <div class="logo"><a href="<?php echo base_url('');?>"><img src="<?php echo src_url('images/logo.jpg');?>" width="200" height="38"></a></div>
		    <div class="search_box">
                <?php if($this->session->userdata('logined_in')): ?>
                    <p>你好，<?php echo $this->session->userdata('username');  ?>！<span class="loginwrap"><a href="<?php echo base_url('user/center');?>" class="top_login">用户中心</a><a href="<?php echo base_url('user/logout');?>">退出登录</a></span><span class="phone"><a href="javascript:void(0);">手机版</a></span><a href="javascript:void(0);">收藏夹</a></p>
                <?php else: ?>
				    <p>欢迎来到中国创业指导网！<span class="loginwrap"><a href="<?php echo base_url('user/login');?>" class="top_login">请登录</a><a href="<?php echo base_url('user/register');?>">免费注册</a></span><span class="phone"><a href="javascript:void(0);">手机版</a></span><a href="javascript:void(0);">收藏夹</a></p>
                <?php endif; ?>
				<form action="<?php echo site_url('s'); ?>" method="get" target="_blank" id="form-search">
					<input name="k" type="text" placeholder="有疑问？试试问答搜索！" class="search_text" value="<?php if(isset($_REQUEST['k'])): ?><?php echo $_REQUEST['k']; ?><?php endif; ?>">
					<input type="submit" class="search_btn" value="搜索">
					<a href="<?php echo site_url('question/add'); ?>" class="edit_eara">提问</a>
				</form>
		    </div>
		</div>
		<?php $data_sort_array = array(
					'fushixiebao' => 'cloth',
					'canyinyule' => 'food',
					'meirongyangsheng' => 'beautify',
					'jixiehuanbao' => 'beautify',
					'wangluochuangye' => 'education',
					'muyingyongpin' => 'new',
					'jiajijiancai' => 'home',
					'qitaxiangmu' => 'decorate',
					'jiaoyupeixun' => 'home',
					'shipinwanju' => 'home',
					'qichefuwu' => 'home'
		);?>
		<ul class="nav">
			<li class="sort">
				<a href="javascript:void(0);" id="sort_all_content">所有内容分类</a>
				<div class="flotage flotage_pages" style="display:none;" id="nav_all">
					<?php foreach ($GLOBALS['category_info'] as $key => $value):?>
					<div class="sort_inner <?php if (count($value) != $key+1){echo 'bottom_bor';}?>">
						<h2><a href="<?php echo $value['url'];?>" class="<?php echo $data_sort_array[$value['mark']];?>"><?php echo $value['name'];?></a></h2>
						<p><span class="menu_text">
						<?php foreach ($value['sort'] as $k => $v):?>
							<a href="<?php echo $v['url']; ?>" <?php if ($v['highlight']){echo 'class="highlight"';}?>><?php echo $v['name'];?></a>
						<?php endforeach;?>
						</span>
						</p>
					</div>
					<?php endforeach;?>
				</div>
			</li>
			<li><a href="<?php echo base_url('/') ?>">首页</a></li>
			<li><a href="<?php echo base_url('/') ?>">问答</a></li>
			<li><a href="http://item.7808.com/">项目</a></li>
		</ul>
	</div>
    <!--    main content start   -->
	<?php echo $content_for_layout; ?>
    <!--    main content end   -->
	<div class="foot">
		<div class="foot_box">
			<h4>合作机构:</h4>
			<ul>
				<li><a href="#"><img src="<?php echo src_url('images/Partners.jpg');?>" width="121" height="38"></a></li>
				<li><a href="#"><img src="<?php echo src_url('images/Partners.jpg');?>" width="121" height="38"></a></li>
				<li><a href="#"><img src="<?php echo src_url('images/Partners.jpg');?>" width="121" height="38"></a></li>
				<li><a href="#"><img src="<?php echo src_url('images/Partners.jpg');?>" width="121" height="38"></a></li>
				<li><a href="#"><img src="<?php echo src_url('images/Partners.jpg');?>" width="121" height="38"></a></li>
				<li><a href="#"><img src="<?php echo src_url('images/Partners.jpg');?>" width="121" height="38"></a></li>
				<li><a href="#"><img src="<?php echo src_url('images/Partners.jpg');?>" width="121" height="38"></a></li>
			</ul>

            <?php if(isset($friend_links) && !empty($friend_links)): ?>
            <h4>友情连接:</h4>
            <div class="friendship">
                <?php $i=1;$total = count($friend_links); foreach($friend_links as $v):?>
                    <a target="_blank" href="<?php echo $v['link'] ?>"><?php echo $v['name'] ?></a>
                    <?php if($i != $total): ?>|<?php endif; ?>
                <?php $i++; endforeach;?>
            </div>
            <?php endif; ?>
			<p class="sponsor"><strong>© 7808创业指导网 荣誉出品</strong> </p>
			<div class="foot_nav">
				<a href="#">关于我们</a>|
				<a href="#">广告合作</a>|
				<a href="#">联系我们</a>|
				<a href="#">版权声明</a>|
				<a href="#">站长统计</a>
			</div>
			<p>Copyright 2007-2013 zqn.cn All rights reserved 京ICP证074442号 京ICP备00678450号-3 京公海网安备110456980742号 </p>
		</div>
	</div>
</body>
</html>
