<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:24:41
         compiled from "/var/www/html/yunzhaopin/app/template/admin/admin_cron_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:16580762115925515935f105-15782203%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9d791f4ffc5e15bf3f1225e545a7a75ca641c51' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/admin/admin_cron_list.htm',
      1 => 1469016966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16580762115925515935f105-15782203',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
    'rows' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592551593ac263_55827915',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592551593ac263_55827915')) {function content_592551593ac263_55827915($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/modifier.date_format.php';
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
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
<div class="infoboxp_top">
   <span class="admin_title_span">计划任务</span>
  <a href="index.php?m=cron&c=add"  class="admin_infoboxp_tj">添加计划任务</a>
</div>
<div class="table-list">
  <div class="admin_table_border">
    <form action="" name="myform" method="get">
    <input type="hidden" name="pytoken" id='pytoken'  value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
      <table width="100%">
        <thead>
          <tr class="admin_table_top">
            <th align="left">任务名称</th>
            <th align="left">执行文件</th>
            <th align="left">执行类型</th>
            <th align="left">是否执行</th>
            <th align="left">上次执行时间</th>
            <th align="left">下次执行时间</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <tr align="left">
              <td align="left" class="td1"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</span></td>
              <td  align="left" class="ud"><?php echo $_smarty_tpl->tpl_vars['v']->value['dir'];?>
</td>
              <td class="ud" align="left">
                <?php if ($_smarty_tpl->tpl_vars['v']->value['type']==1) {?>每周<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['type']==2) {?>每月<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['type']==3) {?>每天<?php }?>
               </td>
              <td class="od" align="left"> 
                <?php if ($_smarty_tpl->tpl_vars['v']->value['display']==1) {?>是<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['display']==2) {?>否<?php }?>
              </td>
              <td  align="left" class="ud"><?php if ($_smarty_tpl->tpl_vars['v']->value['nowtime']) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['nowtime'],"%Y-%m-%d %H:%M");
} else { ?>- -<?php }?></td>
              <td  align="left" class="ud"><?php if ($_smarty_tpl->tpl_vars['v']->value['nexttime']) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['nexttime'],"%Y-%m-%d %H:%M");
} else { ?>- -<?php }?></td>
              <td align="center"> 
        <a href="javascript:void(0)" onclick="layer_del('确定现在执行该任务？', 'index.php?m=cron&c=run&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" class="admin_cz_sc">执行</a> | 
		<a href="index.php?m=cron&c=add&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"class="admin_cz_bj">修改</a> |
		<a href="javascript:void(0)" onclick="layer_del('确定要删除？', 'index.php?m=cron&c=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" class="admin_cz_sc">删除</a>
        </td>
            </tr>
            <?php } ?>
          </tbody>
      </table>
    </form>
  </div>
</div>
</body>
</html><?php }} ?>
