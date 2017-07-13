<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-07 15:58:05
         compiled from "/var/www/html/yunzhaopin/app/template/wap/member/user/resume.htm" */ ?>
<?php /*%%SmartyHeaderCode:311729638595f3f0d081946-54094228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b9bfd765ba89e3267da5094124c02d6e6e4a0bb' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/wap/member/user/resume.htm',
      1 => 1466770992,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '311729638595f3f0d081946-54094228',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rows' => 0,
    'resume' => 0,
    'maxnum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_595f3f0d0bc5f6_42732451',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595f3f0d0bc5f6_42732451')) {function content_595f3f0d0bc5f6_42732451($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['wapstyle']->value)."/member/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
 <div class="wap_member_comp_h1"><span>我的简历</span></div>
<?php echo '<script'; ?>
>
function checkdef(eid){
	$.post("index.php?c=resume",{type:"def_job",eid:eid},function(data){ 
	})
}
<?php echo '</script'; ?>
>
<div class="rsm_box" style="padding:0px 10px 10px ;">
<?php  $_smarty_tpl->tpl_vars['resume'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['resume']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['resume']->key => $_smarty_tpl->tpl_vars['resume']->value) {
$_smarty_tpl->tpl_vars['resume']->_loop = true;
?>
<div class="rsm_list">
<div class="rsm_top">
<a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'resume','a'=>'show','id'=>$_smarty_tpl->tpl_vars['resume']->value['id']),$_smarty_tpl);?>
">
<div class="rsm_name"><?php echo $_smarty_tpl->tpl_vars['resume']->value['name'];?>
</div>
<div class=""><span class="rsm_name_s">刷新：</span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['resume']->value['lastupdate'],'%Y-%m-%d');?>
   
<span class="rsm_name_s rsm_name_s_l">被浏览：</span><?php echo $_smarty_tpl->tpl_vars['resume']->value['hits'];?>

</div>
</a>
</div>
<div class="rsm_cz">
<dl onclick="layer_del('','index.php?c=resumeset&update=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
');">
<dt><i class="rsg_cion yun_iconfont_sx"></i></dt>
<dd>刷新</dd> 
</dl>
<dl>

<a href="index.php?c=modify&eid=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
" class="wap_member_msg_jl_sc"><dt><i class="rsg_cion yun_iconfont_xg"></i></dt>
<dd>修改</dd></a>
</dl>
<?php if ($_smarty_tpl->tpl_vars['resume']->value['defaults']!="1") {?> 
<dl onclick="layer_del('','index.php?c=resumeset&def=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
');">
<dt><i class="rsg_cion rsg_cion_mr yun_iconfont_mr"></i></dt>
<dd>默认简历</dd>
</dl>
<?php } else { ?>
<dl>
<dt><i class="rsg_cion yun_iconfont_ymr"></i></dt>
<dd>已默认</dd>
</dl>

<?php }?>

<dl onclick="layer_del('确定要删除？','index.php?c=resumeset&del=<?php echo $_smarty_tpl->tpl_vars['resume']->value['id'];?>
');">
<dt><i class="rsg_cion yun_iconfont_sc"></i></dt>
<dd>删除</dd>
</dl>
</div>
</div>
<?php } ?> 
<div class="mt10"><?php if ($_smarty_tpl->tpl_vars['maxnum']->value>0) {?><a href="index.php?c=addresume" class="rsm_cj">创建简历</a><?php } else { ?><a href="javascript:void(0)" onclick="layermsg('你的简历数已经达到系统设置的简历数了');return false;" class="rsm_cj">创建简历</a><?php }?></div>
</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['wapstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 <?php }} ?>
