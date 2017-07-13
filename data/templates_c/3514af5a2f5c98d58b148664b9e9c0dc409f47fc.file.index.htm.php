<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-07 12:00:18
         compiled from "/var/www/html/yunzhaopin/app/template/default/map/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:320552598595f07520b7336-80052733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3514af5a2f5c98d58b148664b9e9c0dc409f47fc' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/default/map/index.htm',
      1 => 1470048286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '320552598595f07520b7336-80052733',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'style' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_595f07521094b1_08832169',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595f07521094b1_08832169')) {function content_595f07521094b1_08832169($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<META name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
">
<META name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css" type="text/css">
<!--[if IE 6]>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/png.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
DD_belatedPNG.fix('.png');
<?php echo '</script'; ?>
>
<![endif]-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js" language="javascript"><?php echo '</script'; ?>
>
<link  href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/map.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/lazyload.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/public.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=<?php echo $_smarty_tpl->tpl_vars['config']->value['map_key'];?>
" charset="utf-8"><?php echo '</script'; ?>
>
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="clear"></div>
<div class="yun_body">
  <div class="yun_content">
  
    
    <div class="current_Location com_current_Location png">
      <div class="fl" >您当前的位置：<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
</a> > <span>地图搜索</span> </div>
    </div>
  
  <div class="clear"></div>
  <div class="yun_map_box">
    <div class="yun_map_box_h1"><span class="yun_map_box_h1_span">地图搜索</span></div>
<div id="map-index" class="module-map action-index">
<div id="website-content" class="wrapper-center">
  <div id="search">
    <div id="title">
    <a class="select" title="job">职位名<i class="triangle"></i></a>
    <a class="nselect" title="company">公司名</a>
    </div>
    <div class="form">
      <input type="text" name="key" id="keyword"  placeholder="输入要搜索的关键字" />
      <input type="hidden" name="searchtype" id="searchtype" value="job" />
      <a id="submitbutton" class="submit yun_bg_color" href="javascript: void(0)">搜索</a> </div>
    <div style="clear:both;"></div>
  </div>
  <div id="map_content">
    <div id="map">
      <div id="map-container" class="inner"></div>
      <div class="map-loader"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/map_loader.gif"></div>
      <div class="map-loader-box"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/map_loader_box.gif"></div>
    </div>
    <div id="list">
      <div class="inner">
        <h2>一共找到<span id="count">0</span>个企业</h2>
        <ul id="content"></ul>
        <div id="Pagination" class="pagination"></div>
      </div>
    </div>
    <div style="clear:both;"></div>
  </div>  
  <div class="clear"></div>
</div>
<?php echo '<script'; ?>
>
    var getdataurl='<?php echo smarty_function_url(array('m'=>'map','c'=>'search'),$_smarty_tpl);?>
';
	var marker_icon_url="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/map_markers.png";
	var marker_icon_blue="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/map_marker_blue.png";
	var x="<?php echo $_smarty_tpl->tpl_vars['config']->value['map_x'];?>
";
	var y="<?php echo $_smarty_tpl->tpl_vars['config']->value['map_y'];?>
";
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/map.js"><?php echo '</script'; ?>
> 
</div>
</div></div>
</div>
<div class="clear"></div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
