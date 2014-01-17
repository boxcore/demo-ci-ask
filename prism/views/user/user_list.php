<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php //print_r($param) ?>
<form id="pagerForm" method="post" action="<? echo site_url('user/user_list') ?>">
    <input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="<? echo $page_info['per_page'] ?>" />
    <input type="hidden" name="groupid" value="<?php echo $param['groupid'] ?>" />
    <input type="hidden" name="usernname" value="<?php echo $param['username'] ?>" />
</form>

<div class="pageHeader">
    <form rel="pagerForm" onsubmit="return navTabSearch(this);" action="<? echo site_url('user/user_list') ?>" method="post">
        <div class="searchBar">
            <ul class="searchContent">
                <li>
                    <label>用户名：</label>
                    <input type="text" name="username" value="<?php echo $param['username'] ?>"/>
                </li>
                <li>
                    <label>用户组：</label>
                    <select class="combox" name="groupid">
                        <option value="0">所有用户</option>
                        <option value="1" <?php if($param['groupid']=='1'):?>selected="selected" <?php endif; ?>>管理员</option>
                        <option value="2" <?php if($param['groupid']=='2'):?>selected="selected" <?php endif; ?>>编辑</option>
                        <option value="3" <?php if($param['groupid']=='3'):?>selected="selected" <?php endif; ?>>vip会员</option>
                        <option value="4" <?php if($param['groupid']=='4'):?>selected="selected" <?php endif; ?>>普通会员</option>
                    </select>
                </li>
                <li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>
            </ul>


<!--            <div class="subBar">-->
<!--                <ul>-->
<!--                    <li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>-->
<!--                    <li><a class="button" href="demo_page6.html" target="dialog" mask="true" title="查询框"><span>高级检索</span></a></li>-->
<!--                </ul>-->
<!--            </div>-->
        </div>
    </form>
</div>
<div class="pageContent">
<div class="panelBar">
    <ul class="toolBar">
        <li><a class="add" href="<?php echo site_url('user/user_add') ?>" target="navTab"><span>添加</span></a></li>
<!--        <li><a title="确实要删除这些记录吗?" target="selectedTodo" rel="ids" href="--><?php //echo site_url('user/ajax_delete') ?><!--" class="delete"><span>批量删除默认方式</span></a></li>-->
        <li><a title="确实要删除这些用户吗?" target="selectedTodo" rel="ids" postType="string" href="<?php echo site_url('user/ajax_delete?title=delete') ?>" class="delete"><span>批量删除用户</span></a></li>
<!--        <li><a class="edit" href="demo_page4.html?uid={sid_user}" target="navTab" warn="请选择一个用户"><span>修改</span></a></li>-->
        <li class="line">line</li>
<!--        <li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>-->
    </ul>
</div>
<table class="table" width="1200" layoutH="138">
<thead>
<tr>
    <th width="22"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
    <th width="40" orderField="accountNo" class="asc">用户ID</th>
    <th width="60" orderField="accountName">用户名</th>
    <th width="25" orderField="accountType">用户组</th>
    <th width="80" orderField="accountCert">用户邮箱</th>
    <th width="60" align="center" orderField="accountLevel">信用等级</th>
    <th width="70">最后登陆时间</th>
    <th width="70">注册时间</th>
    <th width="70">操作</th>
</tr>
</thead>
<tbody>
<? foreach($user_list as $v): ?>
<tr target="sid_user" rel="<? echo $v['uid']; ?>">
    <td><input name="ids" value="<?php echo $v['uid']; ?>" type="checkbox"></td>
    <td><?php echo $v['uid']; ?></td>
    <td><?php echo $v['username']; ?></td>
    <td><?php echo $v['grouptitle']; ?></td>
    <td><?php echo $v['email']; ?></td>
    <td>5级</td>
    <td><?php echo $v['lastlogin'] ?></td>
    <td><?php echo $v['created_time']; ?></td>
    <td>
        <a title="删除" target="ajaxTodo" href="<? echo site_url('user/user_delete?uid='.$v['uid'])?>" class="btnDel">删除</a>
        <a title="编辑" target="navTab" href="<? echo site_url('user/user_edit?uid='.$v['uid'])?>" class="btnEdit">编辑</a>
        <a title="修改密码" target="navTab" href="<? echo site_url('user/user_change_password?uid='.$v['uid'])?>" class="">修改密码</a>
    </td>
</tr>
<? endforeach; ?>
</tbody>
</table>
<div class="panelBar">
    <div class="pages">
        <span>显示</span>
        <select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
            <option value="5" <? if($page_info['per_page'] == 5): ?>selected="selected" <? endif ?>>5</option>
            <option value="10" <? if($page_info['per_page'] == 10): ?>selected="selected" <? endif ?>>10</option>
            <option value="20" <? if($page_info['per_page'] == 20): ?>selected="selected" <? endif ?>>20</option>
            <option value="50" <? if($page_info['per_page'] == 50): ?>selected="selected" <? endif ?>>50</option>
            <option value="100" <? if($page_info['per_page'] == 100): ?>selected="selected" <? endif ?>>100</option>
        </select>
        <span>条，共<? echo $page_info['total_rows'] ?>条</span>
    </div>

    <div class="pagination" targetType="navTab" totalCount="<? echo $page_info['total_rows'] ?>" numPerPage="<? echo $page_info['per_page'] ?>" pageNumShown="10" currentPage="<? echo $page_info['pageNum'] ?>"></div>

</div>
</div>
