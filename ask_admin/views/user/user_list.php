<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form id="pagerForm" method="post" action="<? echo site_url('user/user_list') ?>">
    <input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="<? echo $pagesize ?>" />
    <input type="hidden" name="orderField" value="${param.orderField}" />
    <input type="hidden" name="orderDirection" value="${param.orderDirection}" />
</form>

<div class="pageHeader">
    <form rel="pagerForm" onsubmit="return navTabSearch(this);" action="<? echo site_url('user/user_list') ?>" method="post">
        <div class="searchBar">
            <ul class="searchContent">
                <li>
                    <label>用户名：</label>
                    <input type="text" name="username" value=""/>
                </li>
                <li>
                    <label>用户组：</label>
                    <select class="combox" name="province">
                        <option value="0">所有用户</option>
                        <option value="1">管理员</option>
                        <option value="2">编辑</option>
                        <option value="3">vip会员</option>
                        <option value="4">普通会员</option>
                    </select>
                </li>
            </ul>


            <div class="subBar">
                <ul>
                    <li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>
                    <li><a class="button" href="demo_page6.html" target="dialog" mask="true" title="查询框"><span>高级检索</span></a></li>
                </ul>
            </div>
        </div>
    </form>
</div>
<div class="pageContent">
<div class="panelBar">
    <ul class="toolBar">
        <li><a class="add" href="demo_page4.html" target="navTab"><span>添加</span></a></li>
        <li><a title="确实要删除这些记录吗?" target="selectedTodo" rel="ids" href="demo/common/ajaxDone.html" class="delete"><span>批量删除默认方式</span></a></li>
        <li><a title="确实要删除这些记录吗?" target="selectedTodo" rel="ids" postType="string" href="demo/common/ajaxDone.html" class="delete"><span>批量删除逗号分隔</span></a></li>
        <li><a class="edit" href="demo_page4.html?uid={sid_user}" target="navTab" warn="请选择一个用户"><span>修改</span></a></li>
        <li class="line">line</li>
        <li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>
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
<tr target="sid_user" rel="<? echo $v->uid; ?>">
    <td><input name="ids" value="xxx" type="checkbox"></td>
    <td><? echo $v->uid; ?></td>
    <td><? echo $v->username; ?></td>
    <td><? echo $v->grouptitle; ?></td>
    <td><? echo $v->email; ?></td>
    <td>5级</td>
    <td><? echo date('Y-m-d H:i:s', $v->lastlogin); ?></td>
    <td><? echo $v->created_time; ?></td>
    <td>
        <a title="删除" target="ajaxTodo" href="<? echo site_url('user/user_delete?uid='.$v->uid)?>" class="btnDel">删除</a>
        <a title="编辑" target="navTab" href="demo_page4.html?id=xxx" class="btnEdit">编辑</a>
    </td>
</tr>
<? endforeach; ?>
</tbody>
</table>
<div class="panelBar">
    <div class="pages">
        <span>显示</span>
        <select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="200">200</option>
        </select>
        <span>条，共${totalCount}条</span>
    </div>

    <div class="pagination" targetType="navTab" totalCount="200" numPerPage="20" pageNumShown="10" currentPage="1"></div>

</div>
</div>
