<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-06-07 11:37:40
         compiled from "/var/www/html/yunzhaopin/app/template/default/index/wap.htm" */ ?>
<?php /*%%SmartyHeaderCode:11024167155937750500f0e3-04017105%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62e2a68422f8e2233b22ca4ea2a17e783b5e3284' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/default/index/wap.htm',
      1 => 1469167084,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11024167155937750500f0e3-04017105',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'client' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59377505054e19_59397632',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59377505054e19_59397632')) {function content_59377505054e19_59397632($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<META name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
">
<META name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['client']->value;?>
/style/css.css" type="text/css">
</head>
<!--[if IE 6]>
<?php echo '<script'; ?>
 src="js/png.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
DD_belatedPNG.fix('.png,.pagination li a');
<?php echo '</script'; ?>
>
<![endif]-->
<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/client_header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="wap_banner fl">
  <div class="wap_banner_img touch_banner touch_banner_wap">
    <div class="wap_iphoto"><img src="<?php echo $_smarty_tpl->tpl_vars['client']->value;?>
/images/yun_job_wap1.png" class="png"></div>
    <div class="banner_biaoyu"><img src="<?php echo $_smarty_tpl->tpl_vars['client']->value;?>
/images/yun_job_wap2.png" class="png"></div>
    <div class="banner_input fr"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/wap</div>
    <div class="wap_erweim_bg png"></div>
    <div class="wap_erweim"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_wap_qcode'];?>
" class="png" width="132" height="132"></div>
  </div>
</div>
<div class="body_bg fl">
  <div class="w980">
    <div class="touch fl">
      <div class="touch_size fl">
        <dl>
          <dt><img src="<?php echo $_smarty_tpl->tpl_vars['client']->value;?>
/images/touch_items_01.gif"></dt>
          <dd>
            <div class="touch_h1 fl">��Ա����</div>
            <div class="touch_items_text fl">ְλ��Ϣ��������Ѷ����ְ���ɽ����˻�Ա���ģ����ɹ������</div>
          </dd>
        </dl>
        <dl>
          <dt><img src="<?php echo $_smarty_tpl->tpl_vars['client']->value;?>
/images/touch_items_02.gif"></dt>
          <dd>
            <div class="touch_h1 fl">���ܲ�����</div>
            <div class="touch_items_text fl">����֮�䣬����Ǭ������Լ�����򵥣���ְӦƸ����������Ӧ�ԣ��������ࡣ</div>
          </dd>
        </dl>
        <dl>
          <dt><img src="<?php echo $_smarty_tpl->tpl_vars['client']->value;?>
/images/touch_items_03.gif"></dt>
          <dd>
            <div class="touch_h1 fl">����ӦƸ</div>
            <div class="touch_items_text fl">��ʱ�ļ���Ͷ�ݣ����ĵ�����֪ͨ��<br>����������κ�һ������֪ͨ��</div>
          </dd>
        </dl>
        <dl>
          <dt><img src="<?php echo $_smarty_tpl->tpl_vars['client']->value;?>
/images/touch_items_04.gif"></dt>
          <dd>
            <div class="touch_h1 fl">ְ����Ѷ</div>
            <div class="touch_items_text fl">���㿴����Щ����ְ����Щ�¶���<br>������������ְ��</div>
          </dd>
        </dl>
      </div>
    </div>
  </div>
  <div class="index_list fl">
    <div class="index_list_one touch_h330 touch_bg fl">
      <div class="w980">
        <div class="index_phone fr"><img src="<?php echo $_smarty_tpl->tpl_vars['client']->value;?>
/images/touch_list01.gif"></div>
        <dl class="index_list_text fl">
          <dt><img src="<?php echo $_smarty_tpl->tpl_vars['client']->value;?>
/images/tach_text01.gif"></dt>
          <dd>�������������������ͬһʱ�������������ʮ��Ĺ������᣻���������������������������������������</dd>
        </dl>
      </div>
    </div>
    <div class="index_list_one touch_h330 fl">
      <div class="w980">
        <div class="index_phone fl"><img src="<?php echo $_smarty_tpl->tpl_vars['client']->value;?>
/images/touch_list02.gif"></div>
        <dl class="index_list_text wl90 fl">
          <dt><img src="<?php echo $_smarty_tpl->tpl_vars['client']->value;?>
/images/tach_text02.gif"></dt>
          <dd>�������أ�û��ƽ̨�����͵����ƣ��д����ֻ����������ҹ��������᲻�����ݼ��ţ�����������ӯ��ָ���ϣ�</dd>
        </dl>
      </div>
    </div>
    <div class="index_list_one touch_h330 touch_bg fl">
      <div class="w980">
        <div class="index_phone fr"><img src="<?php echo $_smarty_tpl->tpl_vars['client']->value;?>
/images/touch_list03.gif"></div>
        <dl class="index_list_text fl">
          <dt><img src="<?php echo $_smarty_tpl->tpl_vars['client']->value;?>
/images/tach_text03.gif"></dt>
          <dd>����HTML5+CSS3�����д��������ٶȡ����͵����������õ��û����飬����������ʱ��������ҹ�����</dd>
        </dl>
      </div>
    </div>
  </div>
</div>
<div style="clear:both"></div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/client_footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
