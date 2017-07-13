<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-07 11:37:33
         compiled from "/var/www/html/yunzhaopin/app/template/default/redeem/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:398886733593774fd98b061-20898603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0077dae3fadc6a59a573c916adfc82a653fc5c6d' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/default/redeem/index.htm',
      1 => 1469606296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '398886733593774fd98b061-20898603',
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
    'lunbo' => 0,
    'uid' => 0,
    'statis' => 0,
    'lipin' => 0,
    'v' => 0,
    'recommended' => 0,
    'val' => 0,
    'remen' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_593774fdae8849_91249132',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593774fdae8849_91249132')) {function content_593774fdae8849_91249132($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
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
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/slides.jquery.js" type="text/javascript"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/yun_job_fairs.css" type="text/css">
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
</head>
<body class="Integral_body">
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<?php echo '<script'; ?>
 language="javascript">
$(function(){
	$("#slides").slides({
		preload: true,
		preloadImage: '<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/loading.gif',
		play: 5000,
		pause: 2500,
		hoverPause: true
	});
});

<?php echo '</script'; ?>
>
<div class="yun_Integral">
  <div class="Projector">
    <div class="Projector_img">
      <div id="slides" class="s_lb">
        <div class="slides_container"> <?php  $_smarty_tpl->tpl_vars["lunbo"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["lunbo"]->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$AdArr=array();$paramer=array();
			include(PLUS_PATH.'/pimg_cache.php');$add_arr = $ad_label[34];if(is_array($add_arr) && !empty($add_arr)){
				$i=0;$limit = 0;$length = 0;
				foreach($add_arr as $key=>$value){
					if(($value['did']==$config['did'] ||$value['did']=='0')&&$value['start']<time()&&$value['end']>time()){
						if($i>0 && $limit==$i){
							break;
						}
						if($length>0){
							$value['name'] = mb_substr($value['name'],0,$length);
						}
						if($paramer['type']!=""){
							if($paramer['type'] == $value['type']){
								$AdArr[] = $value;
							}
						}else{
							$AdArr[] = $value;
						}
						$i++;
					}
				}
			}$AdArr = $AdArr; if (!is_array($AdArr) && !is_object($AdArr)) { settype($AdArr, 'array');}
foreach ($AdArr as $_smarty_tpl->tpl_vars["lunbo"]->key => $_smarty_tpl->tpl_vars["lunbo"]->value) {
$_smarty_tpl->tpl_vars["lunbo"]->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars["lunbo"]->key;
?>
          <div class="slide"><?php echo $_smarty_tpl->tpl_vars['lunbo']->value['html'];?>
</div>
          <?php } ?> </div>
      </div>
    </div>
  </div>
  <div class="yun_Integral_top_right"> <?php if (!$_smarty_tpl->tpl_vars['uid']->value) {?>
    <div class="yun_Integral_login"> <a href="<?php echo smarty_function_url(array('m'=>'login'),$_smarty_tpl);?>
" class="yun_Integral_login_bth">登录查看<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
</a> </div>
    <?php } else { ?>
    <div class="yun_Integral_login">
    <div class="yun_Integral_login_bth">当前总<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
: <?php echo $_smarty_tpl->tpl_vars['statis']->value['integral'];?>
 </div>
    </div>
    <?php }?>
    <div class="yun_Integral_ta">
      <div class="yun_Integral_ta_h1">TA们正在换好礼…</div>
      <ul class="yun_Integral_ta_box fl">
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lipin']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <li>
          <dl class="yun_Integral_ta_box_list  fl">
            <dt><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'];?>
"width="30" height="30"></dt>
            <dd>
              <div class="yun_Integral_ta_name"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
 会员</div>
              <div class="yun_Integral_ta_dh">兑换了<a href="<?php echo smarty_function_url(array('m'=>'redeem','c'=>'show','id'=>'`$v.gid`'),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a></div>
              <em>花了<?php echo $_smarty_tpl->tpl_vars['v']->value['integral'];
echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
</em> </dd>
          </dl>
        </li>
        <?php } ?>
      </ul>
    </div>
    <?php echo '<script'; ?>
>marquee("2000",".yun_Integral_ta ul");<?php echo '</script'; ?>
> 
  </div>
  
  <!--常见问题-->
  <div class="yun_Integral_ask">
    <div class="yun_Integral_ask_left">兑换常见问题<i class="yun_Integral_ask_icon"></i></div>
    <div class="yun_Integral_ask_right">
      <ul>
        <li><span>1</span><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/about/redeem.html#1" target="_blank">如何获得<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
</a></li>
        <li><span>2</span><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/about/redeem.html#2" target="_blank">积分有有效期吗</a></li>
        <li><span>3</span><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/about/redeem.html#3" target="_blank">如何兑换礼品 </a></li>
        <li><span>4</span><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/about/redeem.html#4" target="_blank">如何配送商品</a></li>
      </ul>
    </div>
  </div>
  <!--热门兑换-->
  
  <div class="yun_Integral_box">
    <div class="yun_Integral_box_h1"><span class="yun_Integral_box_h1_name">推荐商品</span><a href="<?php echo smarty_function_url(array('m'=>'redeem','c'=>'list'),$_smarty_tpl);?>
" class="yun_Integral_box_h1_more">更多>></a></div>
    <div class="yun_Integral_cont">
      <div class="yun_Integral_cont_w"> <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['jj'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['recommended']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['jj']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
        <div class="yun_Integral_cont_list"> <div class="yun_Integral_cont_list_a">
          <dl class="yun_Integral_list_dl">
            <dt> <a href="<?php echo smarty_function_url(array('m'=>'redeem','c'=>'show','id'=>'`$val.id`'),$_smarty_tpl);?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['val']->value['pic'];?>
" width="189" height="167"></a></dt>
            <dd class="yun_Integral_list_dl_name"> <a href="<?php echo smarty_function_url(array('m'=>'redeem','c'=>'show','id'=>'`$val.id`'),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</a></dd>
            <dd class="yun_Integral_list_dl_n">所需<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
: <?php echo $_smarty_tpl->tpl_vars['val']->value['integral'];?>
</dd>
          </dl>
          </div> </div>
        <?php } ?> </div>
    </div>
  </div>
  <!--热门兑换-->
  <div class="yun_Integral_box">
    <div class="yun_Integral_box_h1"><span class="yun_Integral_box_h1_name yun_Integral_box_h1_name_hot">热门兑换</span><a href="<?php echo smarty_function_url(array('m'=>'redeem','c'=>'list'),$_smarty_tpl);?>
" class="yun_Integral_box_h1_more">更多>></a></div>
    <div class="yun_Integral_cont">
      <div class="yun_Integral_cont_w"> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['remen']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
        <div class="yun_Integral_cont_list">
         <div class="yun_Integral_cont_list_a">
          <a href="<?php echo smarty_function_url(array('m'=>'redeem','c'=>'show','id'=>'`$v.id`'),$_smarty_tpl);?>
" target="_blank">
          <dl class="yun_Integral_list_dl">
            <dt><a href="<?php echo smarty_function_url(array('m'=>'redeem','c'=>'show','id'=>'`$v.id`'),$_smarty_tpl);?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'];?>
" width="189" height="167"></a></dt>
            <dd class="yun_Integral_list_dl_name"><a href="<?php echo smarty_function_url(array('m'=>'redeem','c'=>'show','id'=>'`$v.id`'),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
 </a></dd>
            <dd class="yun_Integral_list_dl_n">所需<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
: <?php echo $_smarty_tpl->tpl_vars['v']->value['integral'];?>
</dd>
          </dl>
         
          </div> </div>
        <?php } ?> </div>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
