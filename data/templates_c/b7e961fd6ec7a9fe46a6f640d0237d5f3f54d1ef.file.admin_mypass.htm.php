<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-07 12:01:07
         compiled from "/var/www/html/yunzhaopin/app/template/admin/admin_mypass.htm" */ ?>
<?php /*%%SmartyHeaderCode:815390352595f0783854700-67865254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7e961fd6ec7a9fe46a6f640d0237d5f3f54d1ef' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/admin/admin_mypass.htm',
      1 => 1466771004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '815390352595f0783854700-67865254',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'adminuser' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_595f078386fb09_77313101',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595f078386fb09_77313101')) {function content_595f078386fb09_77313101($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link href="./images/reset.css" rel="stylesheet" type="text/css" />
<link href="./images/system.css" rel="stylesheet" type="text/css" />
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
<link href="./images/table_form.css" rel="stylesheet" type="text/css" />
<title></title>
</head>
<body class="body_ifm">
    <div class="infoboxp">
    <div class="infoboxp_top_bg"></div>
    <div class="infoboxp_top">
    <span class="infoboxp_top_span" style="float:left">修改密码</span>
    </div>
<div class="common-form">
<div class="admin_table_border">
<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe> 
<form name="myform" action="index.php?m=admin_user&c=pass"   target="supportiframe" method="post" id="myform">
<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['adminuser']->value[0];?>
" name="uid" />
<table width="100%" class="table_form contentWrap" style="background:#fff;">
    <tr>
        <th width="150">原始密码：</th>
        <td>
        <input type="text" name="oldpass" id="realname" class="input-text" size="30" value="">
        </td>
    </tr>
      	<tr class="admin_table_trbg" >
        <th>新密码：</th>
        <td><input type="password" name="password" id="realname" class="input-text" size="30" value="">
        </td>
    </tr>
    <tr>
        <th>确认密码：</th>
        <td><input type="password" name="okpassword" id="realname" class="input-text" size="30" value=""></td>
    </tr>
 
<tr class="admin_table_trbg">
<td colspan="2" align="center">
	<input class="admin_submit4" name="useradd" type="submit" value="提交" id="dosubmit">
</td>
</tr>
 </table>
 <input type="hidden" name="pytoken" id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
 </form>
</div>
</div></div>
</body>
</html><?php }} ?>
