<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:19:54
         compiled from "/var/www/html/yunzhaopin/app/template/admin/admin_hrclass.htm" */ ?>
<?php /*%%SmartyHeaderCode:3381681415925503af0d4f6-33222178%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4243fe5e2f7764418500642f2f1edfff9b57228' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/admin/admin_hrclass.htm',
      1 => 1448948806,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3381681415925503af0d4f6-33222178',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'rows' => 0,
    'key' => 0,
    'v' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5925503af382b1_89558527',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5925503af382b1_89558527')) {function content_5925503af382b1_89558527($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<?php echo '<script'; ?>
> 
function checked_name(){
	var name=$.trim($("#name").val()); 
	if(name==''){ 
		parent.layer.msg('文档类别名称不能为空！', 2, 8);
		return false;
	}
}
<?php echo '</script'; ?>
>
<title>后台管理</title>
</head>
<body class="body_ifm">
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
<div class="company_job">
    <div class="company_job_list_h1">
    <span class="admin_title_span">工具箱类别列表</span>
        <span style="float:left; margin-right:5px;display: inline-block;"> 
		<a class="admin_infoboxp_tj" href="index.php?m=hrclass&c=add">添加类别</a>
        </span> 
	</div>
</div>
<div class="clear"></div>
<div class="table-list">
  <div class="admin_table_border">
  <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe> 
<form action="index.php?m=hrclass&c=del" name="myform" method="post"  id='myform' target="supportiframe"> 
<input type="hidden" name="m" value="hrclass">
<input type="hidden" name="c" value="del">
<table width="100%">
	<thead>
			<tr class="admin_table_top">
		    <th style="width:60px;"><label for="chkall"><input type="checkbox" id='chkAll'  onclick='CheckAll(this.form)'/></label></th>
			<th style="width:60px;">编号</th>
			<th align="center">名称</th>
            <th align="center">缩略图</th>
			<th class="admin_table_th_bg">操作</th>
		</tr>
	</thead>
	<tbody>
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
    <tr align="center" <?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
	    <td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"  name='del[]' onclick='unselectall()' rel="del_chk" /></td>
    	<td align="left" class="td1" style="text-align:center;"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</span></td>
   	 	<td class="od" align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
        <td class="od" align="center"><img src="../<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'];?>
" width="40" height="40"></td>
    	<td><a href="index.php?m=hrclass&c=add&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"class="status admin_cz_sh" >编辑</a> |  
      <a href="javascript:void(0);" onClick="layer_del('删除该类别同时也会删除该类别下所有工具文档？','index.php?m=hrclass&c=del&del=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="admin_cz_sc">删除</a>
        </td>
  </tr>
  <?php } ?>
  <tr style="background:#f1f1f1;">
    <td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
    <td colspan="4" >
    <label for="chkAll2">全选</label>&nbsp;
    <input class="admin_submit4" type="button" name="delsub" value="删除所选" onClick="return really('del[]')" /></td>
  </tr>
  </tbody>
  </table>
  <input type="hidden" name="pytoken" id="pytoken"  value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
</form>
</div>
</div>
</div>
</body>
</html><?php }} ?>
