<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-07 11:38:25
         compiled from "/var/www/html/yunzhaopin/app/template/default/special/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:643677412593775310c66d0-38483046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a407b19a0b598ebe862ebe3e3b2919b7c6a85ec' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/default/special/index.htm',
      1 => 1466493842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '643677412593775310c66d0-38483046',
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
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59377531124d07_58834122',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59377531124d07_58834122')) {function content_59377531124d07_58834122($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/modifier.date_format.php';
?><?php global $db,$db_config,$config;eval('$paramer=array("limit"=>"10","item"=>"\'row\'","nocache"=>"")
;');$row=array();
		//处理传入参数，并且构造分页参数
		$ParamerArr = GetSmarty($paramer,$_GET);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		$where = "display='1' ";
		
		if($paramer['ctime']>0){
			$time=time()-$paramer['ctime']*86400;
			$where.=" and `ctime`>".$time;
		}
		if($paramer['delid']){
			$where.=" AND `id`<>'".$paramer['delid']."'";
		}
		
		//查询条数
		if($paramer[limit]){
			$limit=" LIMIT ".$paramer[limit];
		}else{
			$limit=" LIMIT 20";
		}
		//自定义查询条件，默认取代上面任何参数直接使用该语句
		if($paramer[where]){
			$where = $paramer[where];
		}
		if($paramer[ispage]){
			$limit = PageNav($paramer,$_GET,"special",$where,$Purl,'','0',$_smarty_tpl);
		}
		//排序字段默认为更新时间
		if($paramer['order']){
			$order = " ORDER BY `".str_replace("'","",$paramer[order])."`";
		}else{
			$order = " ORDER BY sort ";
		}
		//排序规则 默认为倒序
		if($paramer['sort']){
			$sort = $paramer['sort'];
		}else{
			$sort = " DESC";
		}
		$where.=$order.$sort.$limit;
		$row=$db->select_all("special",$where);
		if(is_array($row)){
			foreach($row as $key=>$value){
				$row[$key]['url'] = Url("special",array("c"=>"show","id"=>$value[id]));
			}
		} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/special/css/css.css">
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
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/news.css" type="text/css">
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="clear"></div>

<div class="yun_content">
<div class="current_Location "> 您当前的位置：<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
"> <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
</a> &gt; 专题招聘 </div>
<div class="speial_list_cont">
<div class="speial_list_cont_pd"><div class="speial_list_cont_h1"><span>特色专题</span></div></div>
<div class="speial_list_cont_w1000">

<div class="clear"></div>
<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
$row = $row; if (!is_array($row) && !is_object($row)) { settype($row, 'array');}
foreach ($row as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
<div class="pic-txt">
<a href="<?php echo smarty_function_url(array('m'=>'special','c'=>'show','id'=>'`$row.id`'),$_smarty_tpl);?>
"   target="_blank">
<img width="530" height="155" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['pic'];?>
"/> </a>
<div class="txt">
<div class="tit"><a href="<?php echo smarty_function_url(array('m'=>'special','c'=>'show','id'=>'`$row.id`'),$_smarty_tpl);?>
"   target="_blank"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></div>
<div class="info">
<span class="date"><i class="ico-date"></i><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['etime'],'%Y-%m-%d');?>
</span>
<span class="entrance"><a href="<?php echo smarty_function_url(array('m'=>'special','c'=>'show','id'=>'`$row.id`'),$_smarty_tpl);?>
"   target="_blank">进入专题&gt;&gt;</a></span>
</div>
</div>
</div>
 <?php } ?>
</div>
</div>
</div>

<!--尾部导航-->
  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
