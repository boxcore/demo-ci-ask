<option value="">请选择小类</option>
<?php foreach ($sub as $key => $value):?>
<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
<?php endforeach;?>