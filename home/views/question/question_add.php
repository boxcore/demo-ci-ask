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

<div class="content">
    <div class="content_question">
        <h1 class="issue">发布一个新问题</h1>
        <div class="selection_sort">
            <h3>分类</h3>
            <form>
                <select>
                    <option>-请选择-</option>
                </select>
                <select>
                    <option>-请选择-</option>
                </select>
            </form>
        </div>
        <div class="selection_sort question">
            <h3>问题</h3>
            <div class="question_case">
                <input name="" type="text">
            </div>
        </div>
        <div class="selection_sort">
            <h3>问题补充<span>(选填,图片只可以上传小于1M且宽高都不超过500px)</span></h3>
            <div class="question_box"><img src="<?php echo src_url('images/question.jpg'); ?>" width="692" height="218"></div>
            <div><input name="" type="button" class="question_btn"></div>
        </div>
    </div>
</div>

<?php $this->load->view('common/footer.php'); ?>
</body>
</html>
