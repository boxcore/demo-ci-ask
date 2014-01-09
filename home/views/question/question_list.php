<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title><?php if (isset($meta['title'])) echo $meta['title']; ?>中国创业指导网</title>
    <meta name="keywords" content="<?php if (isset($meta['keywords'])) echo $meta['keywords']; ?>"/>
    <meta name="description" content="<?php if (isset($meta['description'])) echo $meta['description']; ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo src_url('css/style.css'); ?>"/>
</head>
<body>
<?php $this->load->view('common/header.php'); ?>
<div class="filter">
    <table width="1008" border="1">
        <tbody><tr class="add_box">
            <td class="filter_type"><span>地区筛选</span></td>
            <td class="filter_inner"><a href="#">北京 </a><a href="#">河北 </a><a href="#">上海 </a><a href="#">南京 </a><a href="#">重庆 </a><a href="#">广东 </a><a href="#">厦门 </a><a href="#">保定 </a><a href="#">石家庄 </a><a href="#">保定 </a><a href="#">石家庄 </a><a href="#">石家庄 </a><a href="#">保定 </a></td>
        </tr>
        <tr>
            <td class="filter_type"><span>类型筛选</span></td>
            <td class="filter_inner"><a href="#">餐饮美食</a><a href="#">餐饮美食</a><a href="#">服饰鞋包</a><a href="#">网络教育</a><a href="#">家居环保</a><a href="#">建材装饰</a><a href="#">美容养生</a><a href="#">新奇特 </a><a href="#">餐饮美食</a><a href="#">餐饮美食</a><a href="#">服饰鞋包</a><a href="#">网络教育</a><a href="#">家居环保</a><a href="#">建材装饰</a><a href="#">美容养生</a><a href="#">新奇特 </a></td>
        </tr>
        </tbody></table>
</div>

<div class="list_content">
    <div class="list_conL">
        <h2><strong>未解决问题</strong><span><a href="#">更多</a></span></h2>
        <dl>
            <dt><a href="#">冰之物语怎么样？</a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">苏州金石投资的总部在哪里 </a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">我想在县城加盟顺丰快递</a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">在网上看伊屏清斑祛斑效果好的很，是不是很有效果啊？</a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">冰之物语怎么样？</a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">苏州金石投资的总部在哪里 </a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">我想在县城加盟顺丰快递</a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">在网上看伊屏清斑祛斑效果好的很，是不是很有效果啊？</a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">冰之物语怎么样？</a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">苏州金石投资的总部在哪里 </a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">我想在县城加盟顺丰快递</a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">在网上看伊屏清斑祛斑效果好的很，是不是很有效果啊？</a></dt>
            <dd>1个回答</dd>
        </dl>
        <div class="interval"></div>
        <h2><strong>未解决问题</strong><span><a href="#">更多</a></span></h2>
        <dl>
            <dt><a href="#">冰之物语怎么样？</a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">苏州金石投资的总部在哪里 </a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">我想在县城加盟顺丰快递</a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">在网上看伊屏清斑祛斑效果好的很，是不是很有效果啊？</a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">冰之物语怎么样？</a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">苏州金石投资的总部在哪里 </a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">我想在县城加盟顺丰快递</a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">在网上看伊屏清斑祛斑效果好的很，是不是很有效果啊？</a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">冰之物语怎么样？</a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">苏州金石投资的总部在哪里 </a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">我想在县城加盟顺丰快递</a></dt>
            <dd>1个回答</dd>
            <dt><a href="#">在网上看伊屏清斑祛斑效果好的很，是不是很有效果啊？</a></dt>
            <dd>1个回答</dd>
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

<?php $this->load->view('common/footer.php'); ?>
</body>
</html>
