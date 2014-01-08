<div id="sidebar">
        <div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>

        <div class="accordion" fillSpace="sidebar">

            <div class="accordionHeader">
                <h2><span>Folder</span>用户管理</h2>
            </div>
            <div class="accordionContent">
                <ul class="tree">
                    <li><a href="<?php echo site_url('user/user_list'); ?>" target="navTab"
                           rel="user_list">用户列表</a></li>
                    <li><a href="<?php echo site_url('user/user_add'); ?>" target="navTab"
                           rel="user_add">添加新用户</a></li>
                </ul>
            </div>

            <div class="accordionHeader">
                <h2><span>Folder</span>内容管理</h2>
            </div>
            <div class="accordionContent">
                <ul class="tree treeFolder">
                    <li><a href="<?php echo site_url('question'); ?>" target="navTab">问题管理</a>
                        <ul>
                            <li><a href="<?php echo site_url('question/question_list'); ?>" target="navTab" rel="page1"
                                   fresh="false">问题列表</a></li>
                            <li><a href="<?php echo site_url('question/question_add'); ?>" target="navTab" rel="page4"
                                   fresh="false">添加问题</a></li>
                            <li><a href="<?php echo site_url('question/question_recycle'); ?>" target="navTab" rel="page1" fresh="false">问题回收站</a></li>
                        </ul>
                    </li>

                    <li><a href="<?php echo site_url('answer'); ?>" target="navTab">回答管理</a>
                        <ul>
                            <li><a href="<?php echo site_url('answer/answer_list'); ?>" target="navTab" rel="page1"
                                   fresh="false">回答列表</a></li>
                            <li><a href="<?php echo site_url('answer/answer_verify'); ?>" target="navTab" rel="page4"
                                   fresh="false">审核回答</a></li>
                            <li><a href="<?php echo site_url('answer/answer_recycle'); ?>" target="navTab" rel="page1" fresh="false">回收站</a></li>
                        </ul>
                    </li>

                    <li><a href="<?php echo site_url('answer'); ?>" target="navTab">项目管理</a>
                        <ul>
                            <li><a href="<?php echo site_url('answer/answer_list'); ?>" target="navTab" rel="page1"
                                   fresh="false">回答列表</a></li>
                            <li><a href="<?php echo site_url('answer/answer_verify'); ?>" target="navTab" rel="page4"
                                   fresh="false">审核回答</a></li>
                            <li><a href="<?php echo site_url('answer/answer_recycle'); ?>" target="navTab" rel="page1" fresh="false">回收站</a></li>
                        </ul>
                    </li>

                    <li><a href="<?php echo site_url('answer'); ?>" target="navTab">文章管理</a>
                        <ul>
                            <li><a href="<?php echo site_url('answer/answer_list'); ?>" target="navTab" rel="page1"
                                   fresh="false">回答列表</a></li>
                            <li><a href="<?php echo site_url('answer/answer_verify'); ?>" target="navTab" rel="page4"
                                   fresh="false">审核回答</a></li>
                            <li><a href="<?php echo site_url('answer/answer_recycle'); ?>" target="navTab" rel="page1" fresh="false">回收站</a></li>
                        </ul>
                    </li>

                    <li><a href="<?php echo site_url('answer'); ?>" target="navTab">广告管理</a>
                        <ul>
                            <li><a href="<?php echo site_url('answer/answer_list'); ?>" target="navTab" rel="page1"
                                   fresh="false">回答列表</a></li>
                            <li><a href="<?php echo site_url('answer/answer_verify'); ?>" target="navTab" rel="page4"
                                   fresh="false">审核回答</a></li>
                            <li><a href="<?php echo site_url('answer/answer_recycle'); ?>" target="navTab" rel="page1" fresh="false">回收站</a></li>
                        </ul>
                    </li>


                </ul>
            </div>


            <div class="accordionHeader">
                <h2><span>Folder</span>系统设置</h2>
            </div>
            <div class="accordionContent">
                <ul class="tree">
                    <li><a href="<?php echo site_url('configs/configs_list'); ?>" target="navTab"
                           rel="configs_list">常用设置</a></li>
                    <li><a href="<?php echo site_url('configs/configs_add'); ?>" target="navTab" rel="configs_add">添加新配置</a></li>
                </ul>
            </div>

            <div class="accordionHeader">
                <h2><span>Folder</span>demo</h2>
            </div>
            <div class="accordionContent">
                <ul class="tree treeFolder">
                    <li><a href="tabsPage.html" target="navTab">主框架面板</a>
                        <ul>
                            <li><a href="<?php echo site_url('/index/main'); ?>" target="navTab"
                                   rel="main">我的主页</a></li>

                            <li><a href="demo_page2.html" target="navTab" rel="external" external="true">iframe navTab页面</a></li>
                            <li><a href="demo_page1.html" target="navTab" rel="page1" fresh="false">替换页面一</a></li>
                            <li><a href="demo_page2.html" target="navTab" rel="page2">页面二</a></li>
                            <li><a href="demo_page4.html" target="navTab" rel="page3" title="页面三（自定义标签名）">页面三</a></li>
                            <li><a href="demo_page4.html" target="navTab" rel="page4" fresh="false">测试页面（fresh="false"）</a></li>
                            <li><a href="w_editor.html" target="navTab">表单提交会话超时</a></li>
                            <li><a href="demo/common/ajaxTimeout.html" target="navTab">navTab会话超时</a></li>
                            <li><a href="demo/common/ajaxTimeout.html" target="dialog">dialog会话超时</a></li>
                            <li><a href="index_menu.html" target="_blank">横向导航条</a></li>
                            <li><a href="http://www.7808.cn" target="navTab" rel="page1">7808.cn站点</a></li>
                        </ul>
                    </li>

                    <li><a>常用组件</a>
                        <ul>
                            <li><a href="w_panel.html" target="navTab" rel="w_panel">面板</a></li>
                            <li><a href="w_tabs.html" target="navTab" rel="w_tabs">选项卡面板</a></li>
                            <li><a href="w_dialog.html" target="navTab" rel="w_dialog">弹出窗口</a></li>
                            <li><a href="w_alert.html" target="navTab" rel="w_alert">提示窗口</a></li>
                            <li><a href="w_list.html" target="navTab" rel="w_list">CSS表格容器</a></li>
                            <li><a href="demo_page1.html" target="navTab" rel="w_table">表格容器</a></li>
                            <li><a href="w_removeSelected.html" target="navTab" rel="w_table">表格数据库排序+批量删除</a></li>
                            <li><a href="w_tree.html" target="navTab" rel="w_tree">树形菜单</a></li>
                            <li><a href="w_accordion.html" target="navTab" rel="w_accordion">滑动菜单</a></li>
                            <li><a href="w_editor.html" target="navTab" rel="w_editor">编辑器</a></li>
                            <li><a href="w_datepicker.html" target="navTab" rel="w_datepicker">日期控件</a></li>
                            <li><a href="demo/database/db_widget.html" target="navTab" rel="db">suggest+lookup+主从结构</a></li>
                            <li><a href="demo/database/treeBringBack.html" target="navTab" rel="db">tree查找带回</a></li>
                            <li><a href="demo/sortDrag/1.html" target="navTab" rel="sortDrag">单个sortDrag示例</a></li>
                            <li><a href="demo/sortDrag/2.html" target="navTab" rel="sortDrag">多个sortDrag示例</a></li>
                            <li><a href="demo/sortDrag/form.html" target="navTab" rel="sortDrag">可拖动表单示例</a></li>
                        </ul>
                    </li>

                    <li><a>表单组件</a>
                        <ul>
                            <li><a href="w_validation.html" target="navTab" rel="w_validation">表单验证</a></li>
                            <li><a href="w_button.html" target="navTab" rel="w_button">按钮</a></li>
                            <li><a href="w_textInput.html" target="navTab" rel="w_textInput">文本框/文本域</a></li>
                            <li><a href="w_combox.html" target="navTab" rel="w_combox">下拉菜单</a></li>
                            <li><a href="w_checkbox.html" target="navTab" rel="w_checkbox">多选框/单选框</a></li>
                            <li><a href="demo_upload.html" target="navTab" rel="demo_upload">iframeCallback表单提交</a></li>
                            <li><a href="w_uploadify.html" target="navTab" rel="w_uploadify">uploadify多文件上传</a></li>
                        </ul>
                    </li>
                    <li><a>组合应用</a>
                        <ul>
                            <li><a href="demo/pagination/layout1.html" target="navTab" rel="pagination1">局部刷新分页1</a></li>
                            <li><a href="demo/pagination/layout2.html" target="navTab" rel="pagination2">局部刷新分页2</a></li>
                        </ul>
                    </li>
                    <li><a>图表</a>
                        <ul>
                            <li><a href="chart/test/barchart.html" target="navTab" rel="chart">柱状图(垂直)</a></li>
                            <li><a href="chart/test/hbarchart.html" target="navTab" rel="chart">柱状图(水平)</a></li>
                            <li><a href="chart/test/linechart.html" target="navTab" rel="chart">折线图</a></li>
                            <li><a href="chart/test/linechart2.html" target="navTab" rel="chart">曲线图</a></li>
                            <li><a href="chart/test/linechart3.html" target="navTab" rel="chart">曲线图(自定义X坐标)</a></li>
                            <li><a href="chart/test/piechart.html" target="navTab" rel="chart">饼图</a></li>
                        </ul>
                    </li>
                    <li><a href="dwz.frag.xml" target="navTab" external="true">dwz.frag.xml</a></li>
                </ul>
            </div>

            <div class="accordionHeader">
                <h2><span>Folder</span>典型页面</h2>
            </div>
            <div class="accordionContent">
                <ul class="tree treeFolder treeCheck">
                    <li><a href="demo_page1.html" target="navTab" rel="demo_page1">查询我的客户</a></li>
                    <li><a href="demo_page1.html" target="navTab" rel="demo_page2">表单查询页面</a></li>
                    <li><a href="demo_page4.html" target="navTab" rel="demo_page4">表单录入页面</a></li>
                    <li><a href="demo_page5.html" target="navTab" rel="demo_page5">有文本输入的表单</a></li>
                    <li><a href="javascript:;">有提示的表单输入页面</a>
                        <ul>
                            <li><a href="javascript:;">页面一</a></li>
                            <li><a href="javascript:;">页面二</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:;">选项卡和图形的页面</a>
                        <ul>
                            <li><a href="javascript:;">页面一</a></li>
                            <li><a href="javascript:;">页面二</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:;">选项卡和图形切换的页面</a></li>
                    <li><a href="javascript:;">左右两个互动的页面</a></li>
                    <li><a href="javascript:;">列表输入的页面</a></li>
                    <li><a href="javascript:;">双层栏目列表的页面</a></li>
                </ul>
            </div>


        </div>