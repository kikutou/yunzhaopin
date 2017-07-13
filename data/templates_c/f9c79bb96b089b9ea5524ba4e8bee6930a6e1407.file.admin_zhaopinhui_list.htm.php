<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:20:13
         compiled from "/var/www/html/yunzhaopin/app/template/admin/admin_zhaopinhui_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:13622474355925504db4b9d6-25873694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9c79bb96b089b9ea5524ba4e8bee6930a6e1407' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/admin/admin_zhaopinhui_list.htm',
      1 => 1469867150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13622474355925504db4b9d6-25873694',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'rows' => 0,
    'v' => 0,
    'pagenav' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5925504dba26a2_91668927',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5925504dba26a2_91668927')) {function content_5925504dba26a2_91668927($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" />
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/admin_public.js" language="javascript"><?php echo '</script'; ?>
>
<title>后台管理</title>
</head>
<body class="body_ifm">
<div class="infoboxp"><div class="infoboxp_top_bg"></div>
  <div class="admin_Filter">
    <span class="complay_top_span fl">招聘会列表</span> 
      <form action="index.php" name="myform" method="get">
        <input name="m" value="zhaopinhui" type="hidden"/>
		<input type="hidden" name="status" value="<?php echo $_GET['status'];?>
"/>
        <span class="admin_Filter_span"> 检索类型：</span>  
		<div class="admin_Filter_text formselect"  did='dtype'>
		  <input type="button" value="<?php if ($_GET['type']=='1'||$_GET['type']=='') {?>招聘会标题<?php } else { ?>举办会场<?php }?>" class="admin_Filter_but"  id="btype">
		  <input type="hidden" id='type' value="<?php if ($_GET['type']) {
echo $_GET['type'];
} else { ?>1<?php }?>" name='type'>
		  <div class="admin_Filter_text_box" style="display:none" id='dtype'>
			  <ul>
			  <li><a href="javascript:void(0)" onClick="formselect('1','type','招聘会标题')">招聘会标题</a></li>
			  <li><a href="javascript:void(0)" onClick="formselect('2','type','举办会场')">举办会场</a></li> 
			  </ul>  
		  </div>
		</div> 
        <input class="admin_Filter_search" type="text" name="keyword"  size="25" style="float:left">
        <input class="admin_Filter_bth" type="submit" name="news_search" value="检索"/> 
      </form>
	  <span class='admin_search_div'>
	  <div class="admin_adv_search"><div class="admin_adv_search_bth">高级搜索</div></div>  	   
	</span>
     <a href="index.php?m=zhaopinhui&c=add"  class="admin_infoboxp_tj">添加招聘会</a>
   </div>
<?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
   
   
  <div class="table-list">
    <div class="admin_table_border">
      <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
      <form action="index.php?m=zhaopinhui&c=del" name="myform" method="post" target="supportiframe" id='myform'>
        <table width="100%">
          <thead>
            <tr class="admin_table_top">
              <th style="width:20px;"><label for="chkall">
                <input type="checkbox" id='chkAll' onclick='CheckAll(this.form)' />
                </label></th>
              <th>编号</th>
              <th>招聘会标题</th>
              <th>开始时间</th>
              <th>结束时间</th>
              <th>举办会场</th>
              <th>企业数</th> 
              <th class="admin_table_th_bg">操作</th>
            </tr>
          </thead>
          <tbody>
          
          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
          <tr align="center" id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <td style="width:20px;"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="check_all" name='del[]' onclick='unselectall()' rel="del_chk" /></td>
            <td class="ud"><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
            <td class="ud" align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</td>
            <td class="od" align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['starttime'];?>
</td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['endtime'];?>
</td>
            <td align="left" align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['address'];?>
 </td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['comnum'];?>
 [<a href="index.php?m=zhaopinhui&c=com&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&status=3" style="color:blue;"><?php echo $_smarty_tpl->tpl_vars['v']->value['booking'];?>
个待审核</a>]<a href='index.php?m=zhaopinhui&c=com&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'>查看</a></td> 
            <td>
            <a href="<?php echo smarty_function_url(array('m'=>'zph','c'=>'reserve','id'=>$_smarty_tpl->tpl_vars['v']->value['id']),$_smarty_tpl);?>
" target="_blank" class="admin_cz_img">预览</a> | 
			<a href="index.php?m=zhaopinhui&c=upload&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="admin_cz_img">图片</a> | <a href="index.php?m=zhaopinhui&c=add&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"class="admin_cz_bj">修改</a> | <a href="javascript:void(0)" onClick="layer_del('确定要删除？','index.php?m=zhaopinhui&c=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');"class="admin_cz_sc">删除</a></td>
          </tr>
          <?php } ?>
          <tr style="background: #f1f1f1;">
            <td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
            <td colspan="2" >
            <label for="chkAll2">全选</label>&nbsp;
            <input class="admin_submit4"  type="button" name="delsub" value="删除所选"  onclick="return really('del[]')"/> 
			</td>
            <td colspan="6" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
          </tr>
          </tbody>
          
        </table>
		<input type="hidden" name="pytoken"  id="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
      </form>
    </div>
  </div>
</div> 
</body>
</html>
<?php }} ?>
