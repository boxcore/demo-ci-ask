<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title><?php if (isset($meta['title'])) echo $meta['title']; ?></title>
    <meta name="keywords" content="<?php if (isset($meta['keywords'])) echo $meta['keywords']; ?>"/>
    <meta name="description" content="<?php if (isset($meta['description'])) echo $meta['description']; ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo src_url('css/style.css'); ?>"/>
</head>
<body>
<?php $this->load->view('common/header.php'); ?>

<?php $this->load->view('common/footer.php'); ?>
</body>
</html>