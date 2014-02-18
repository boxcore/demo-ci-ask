<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form id="pagerForm" method="post" action="<?php echo site_url('city/city_list') ?>">
    <input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="<?php echo $page_info['per_page'] ?>" />
    <input type="hidden" name="pid" value="<?php echo $param['pid'] ?>" />
    <input type="hidden" name="name" value="<?php echo $param['name'] ?>" />
</form>

<div class="pageHeader">
    <form rel="pagerForm" onsubmit="return navTabSearch(this);" action="<?php echo site_url('city/city_list') ?>" method="post">
        <div class="searchBar">
            <ul class="searchContent">
                <li>
                    <label>地区名：</label>
                    <input type="text" name="username" value="<?php echo $param['name'] ?>"/>
                </li>
                <li>
                    <label>地区拼音：</label>
                    <input type="text" name="mark" value="<?php echo $param['mark'] ?>"/>
                </li>
                <li>
                    <label>省级地区：</label>
                    <select class="combox" name="pid">
                        <option value="0">全国</option>
                        <option value="1" <?php if('0'):?>selected="selected" <?php endif; ?>>管理员</option>

                    </select>
                </li>
                <li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>
            </ul>
        </div>
    </form>
</div>
<div class="pageContent">
<div class="panelBar">
    <ul class="toolBar">
        <li><a class="add" href="<?php echo site_url('user/user_add') ?>" target="navTab"><span>添加</span></a></li>
        <li><a title="确实要删除这些用户吗?" target="selectedTodo" rel="ids" postType="string" href="<?php echo site_url('user/ajax_delete?title=delete') ?>" class="delete"><span>批量删除用户</span></a></li>
        <li class="line">line</li>
    </ul>
</div>
<table class="table" width="1200" layoutH="138">
<thead>
<tr>
    <th width="22"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
    <th width="40" orderField="accountNo" class="asc">地区ID</th>
    <th width="60" orderField="accountName">地区名称</th>
    <th width="25" orderField="accountType">地区拼音</th>
    <th width="80" orderField="accountCert">用户邮箱</th>
    <th width="60" align="center" orderField="accountLevel">信用等级</th>
    <th width="70">最后登陆时间</th>
    <th width="70">注册时间</th>
    <th width="70">操作</th>
</tr>
</thead>
<tbody>
<?php foreach($city_list as $v): ?>
<tr target="sid_user" rel="<?php echo $v['id']; ?>">
    <td><input name="ids" value="<?php echo $v['id']; ?>" type="checkbox"></td>
    <td><?php echo $v['id']; ?></td>
    <td><?php echo $v['name']; ?></td>
    <td><?php echo $v['mark']; ?></td>
    <td><?php echo $v['pid']; ?></td>
    <td>5级</td>
    <td><?php echo $v['p2id'] ?></td>
    <td><?php echo $v['created_time']; ?></td>
    <td>
        <a title="删除" target="ajaxTodo" href="<?php echo site_url('user/user_delete?uid='.$v['id'])?>" class="btnDel">删除</a>
        <a title="编辑" target="navTab" href="<?php echo site_url('user/user_edit?uid='.$v['id'])?>" class="btnEdit">编辑</a>
        <a title="修改密码" target="navTab" href="<?php echo site_url('user/user_change_password?uid='.$v['id'])?>" class="">修改密码</a>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<div class="panelBar">
    <div class="pages">
        <span>显示</span>
        <select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
            <option value="5" <?php if($page_info['per_page'] == 5): ?>selected="selected" <?php endif ?>>5</option>
            <option value="10" <?php if($page_info['per_page'] == 10): ?>selected="selected" <?php endif ?>>10</option>
            <option value="20" <?php if($page_info['per_page'] == 20): ?>selected="selected" <?php endif ?>>20</option>
            <option value="50" <?php if($page_info['per_page'] == 50): ?>selected="selected" <?php endif ?>>50</option>
            <option value="100" <?php if($page_info['per_page'] == 100): ?>selected="selected" <?php endif ?>>100</option>
        </select>
        <span>条，共<?php echo $page_info['total_rows'] ?>条</span>
    </div>

    <div class="pagination" targetType="navTab" totalCount="<?php echo $page_info['total_rows'] ?>" numPerPage="<?php echo $page_info['per_page'] ?>" pageNumShown="10" currentPage="<?php echo $page_info['pageNum'] ?>"></div>

</div>
</div>
