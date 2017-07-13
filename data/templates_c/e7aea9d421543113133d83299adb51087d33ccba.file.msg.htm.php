<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-07 15:58:17
         compiled from "/var/www/html/yunzhaopin/app/template/member/msg.htm" */ ?>
<?php /*%%SmartyHeaderCode:1390677347595f3f19214f59-77548120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7aea9d421543113133d83299adb51087d33ccba' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/member/msg.htm',
      1 => 1469694476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1390677347595f3f19214f59-77548120',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'job_arr_msg' => 0,
    'style' => 0,
    'url' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_595f3f1923ed27_77275075',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595f3f1923ed27_77275075')) {function content_595f3f1923ed27_77275075($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>提示信息 - <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
 - Powered by PHPYun.</title>
<META content="<?php echo $_smarty_tpl->tpl_vars['job_arr_msg']->value;?>
" name="Keywords">
<META content="<?php echo $_smarty_tpl->tpl_vars['job_arr_msg']->value;?>
" name="Description">
<link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/template/member/style/msg.css" rel="stylesheet" type="text/css"/>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js" language="javascript"><?php echo '</script'; ?>
> 
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/yunindex4.2.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css" type="text/css" />
<SCRIPT>
function TimeOut(i){
	if(i>1){
		i=i-1;
		$("#times").html(i);
		setTimeout("TimeOut("+i+");",1000);
	}else{
		window.location.href='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
';
	}
} 
</SCRIPT>
</head>
<body onLoad="TimeOut('5')" class="" style="background:#f8f8f8">
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="clear"></div>
<div class="w1000">
<div class="err_w500">
<div class="err_w500_tit">友情提示</div>
<dl class="err_box">
<dt class="err_left">&nbsp;</dt>
<dd><div class="err_con">
<div class="err_h"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</div>
<div class="err_p"><span class="err_none"><i class="err_none_s"><span id="times">9</span>秒</i>后自动跳转，如果浏览器没有跳转，请点击立即跳转</span>
</div>
<div class="err_b"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" class="err_b_a">立即跳转</a></div>
</div>
</dd>
</dl>





</div>
<div class="clear"></div>

</div> 

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
