<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php //print_r($param) ?>
<form id="pagerForm" method="post" action="<? echo site_url('user/user_list') ?>">
    <input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="<? echo $page_info['per_page'] ?>" />
    <input type="hidden" name="id" value="<?php echo $param['id'] ?>" />
    <input type="hidden" name="province_id" value="<?php echo $param['province_id'] ?>" />
    <input type="hidden" name="city_id" value="<?php echo $param['city_id'] ?>" />
    <input type="hidden" name="region_id" value="<?php echo $param['region_id'] ?>" />
    <input type="hidden" name="sort_id" value="<?php echo $param['sort_id'] ?>" />
    <input type="hidden" name="sub_id" value="<?php echo $param['sub_id'] ?>" />
    <input type="hidden" name="author_id" value="<?php echo $param['author_id'] ?>" />
    <input type="hidden" name="status" value="<?php echo $param['status'] ?>" />
    <input type="hidden" name="title" value="<?php echo $param['title'] ?>" />
</form>

<div class="pageHeader">
    <form rel="pagerForm" onsubmit="return navTabSearch(this);" action="<? echo site_url('user/user_list') ?>" method="post">
        <div class="searchBar">
            <ul class="searchContent">
                <li>
                    <label>标题：</label>
                    <input type="text" name="title" value="<?php echo $param['title'] ?>"/>
                </li>
                <li>
                    <label>省份：</label>
                    <select class="combox" name="province_id">
                        <option value="0">所有</option>
                        <option value="1" selected="selected">管理员</option>
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
            <li><a class="add" href="<?php echo site_url('question/question_add') ?>"
                   target="navTab"><span>添加</span></a></li>
            <!--        <li><a title="确实要删除这些记录吗?" target="selectedTodo" rel="ids" href="--><?php //echo site_url('user/ajax_delete') ?><!--" class="delete"><span>批量删除默认方式</span></a></li>-->
            <li><a title="确实要删除这些提问吗?" target="selectedTodo" rel="ids" postType="string" href="<?php echo site_url('question/ajax_delete?title=delete') ?>" class="delete"><span>批量删除问题</span></a></li>
            <li class="line">line</li>
            <!--        <li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>-->
        </ul>
    </div>
    <table class="table" width="1200" layoutH="138">
        <thead>
        <tr>
            <th width="22"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
            <th width="40" orderField="accountNo" class="asc">问题ID</th>
            <th width="60" orderField="accountName">标题</th>
            <th width="25" orderField="accountType">分类</th>
            <th width="25" orderField="accountType">回答次数</th>
            <th width="80" orderField="accountCert">提问者</th>
            <th width="60" align="center" orderField="accountLevel">所属地区</th>
            <th width="70">修改时间</th>
            <th width="70">提问时间</th>
            <th width="70">操作</th>
        </tr>
        </thead>
        <tbody>
        <? foreach($question_list as $v): ?>
            <tr target="sid_user" rel="<? echo $v['id']; ?>">
                <td><input name="ids" value="<?php echo $v['id']; ?>" type="checkbox"></td>
                <td><?php echo $v['id']; ?></td>
                <td><?php echo $v['title']; ?></td>
                <td><?php echo $v['cat_name']; ?></td>
                <td>111</td>
                <td><?php echo $v['author']; ?></td>
                <td><?php echo $v['region_name']; ?></td>
                <td><?php echo $v['modified_time']; ?></td>
                <td><?php echo $v['created_time']; ?></td>
                <td>
                    <a title="删除" target="ajaxTodo" href="<? echo site_url('user/user_delete?uid='.$v['id'])?>" class="btnDel">删除</a>
                    <a title="编辑" target="navTab" href="<? echo site_url('user/user_edit?uid='.$v['id'])?>" class="btnEdit">编辑</a>

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
