<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:28:03
         compiled from "/var/www/html/yunzhaopin//app/template/wap/header_cont.htm" */ ?>
<?php /*%%SmartyHeaderCode:3983743005925522337abc2-12842921%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89240fa920dd0e08df422f691e222804342f9754' => 
    array (
      0 => '/var/www/html/yunzhaopin//app/template/wap/header_cont.htm',
      1 => 1468404108,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3983743005925522337abc2-12842921',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'config' => 0,
    'wap_style' => 0,
    'topplaceholder' => 0,
    'config_wapdomain' => 0,
    'headertitle' => 0,
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592552233aeec1_33637109',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592552233aeec1_33637109')) {function content_592552233aeec1_33637109($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
<meta http-equiv="Cache-Control" content="no-cache"/>
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 -  手机人才网</title>
<meta http-equiv="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
,wap" />
<meta http-equiv="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-compatible"content="IE=edge"/>
<meta name="viewport" content="width=device-width" initial-scale="1"/>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1, maximum-scale=1, user-scalable=no" />
<meta name="format-detection" content="telephone=no,email=no"/>
<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=no, width=device-width"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/template/wap/css/css.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/template/wap/css/job.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/template/wap/css/style.css" type="text/css"/>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['wap_style']->value;?>
/js/prefixfree.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['wap_style']->value;?>
/js/layer/layer.m.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['wap_style']->value;?>
/js/public.js" language="javascript"><?php echo '</script'; ?>
> 
</head>
<body> 
<div class="">
<div class="body_wap">
<header class="header_h">
<div class="header_fixed">
   <div class="header">
    <div class="header_bg"> <a class="hd-lbtn" href="javascript:history.back();"><i class="header_top_l"></i></a>
       <div class="header_h1"> 
	   <?php if ($_smarty_tpl->tpl_vars['topplaceholder']->value) {?>
       <div class="header_fx_search">    
       <form method="get" action="<?php echo $_smarty_tpl->tpl_vars['config_wapdomain']->value;?>
/index.php">
      <input type="hidden" name="c" value="<?php echo $_GET['c'];?>
" />
      <div class="formFiled">
        <input type="text" value="<?php echo $_GET['keyword'];?>
" name="keyword" class="input_search" placeholder="<?php echo $_smarty_tpl->tpl_vars['topplaceholder']->value;?>
">
        <input type="submit" value=" " class="input_btn">
        <i class="input_btn_icon"></i>
      </div>
    </form>
    </div>
	<?php } else { ?> 
   <div class="header_p_z"> <?php echo $_smarty_tpl->tpl_vars['headertitle']->value;?>
</div>
	<?php }?>
	</div>
<?php if (!$_smarty_tpl->tpl_vars['username']->value) {?> 

<em class="regorlogin" style="width:40px;">
<a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'login'),$_smarty_tpl);?>
"><i class="iconfont" style="font-size:24px;color:#fff"></i></a> 

 </em>
 <?php } else { ?>
 <em class="regorlogin" style="width:40px;">
<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/wap/member/index.php"></a>
</em>
<?php }?>


     </div>
  </div>
    </div>
 </header>
   </div>
</div><?php }} ?>
