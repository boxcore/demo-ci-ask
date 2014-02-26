<option value="">请选择小类</option>
<?php foreach ($sub as $key => $value):?>
<option value="<?php echo $value['cat_id'];?>"><?php echo $value['cat_name'];?></option>
<?php endforeach;?>