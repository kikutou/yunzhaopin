<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 16:27:40
         compiled from "/var/www/html/yunzhaopin//app/template/default/public_search/firm_search.htm" */ ?>
<?php /*%%SmartyHeaderCode:1626066508592543fc4be8c4-43228166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '418475f67be56485eb11a2a266b94d1b0624d57e' => 
    array (
      0 => '/var/www/html/yunzhaopin//app/template/default/public_search/firm_search.htm',
      1 => 1467784180,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1626066508592543fc4be8c4-43228166',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'city_name' => 0,
    'industry_name' => 0,
    'comclass_name' => 0,
    'industry_index' => 0,
    'v' => 0,
    'comdata' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592543fc576485_59089069',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592543fc576485_59089069')) {function content_592543fc576485_59089069($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_function_searchurl')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.searchurl.php';
if (!is_callable('smarty_function_listurl')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.listurl.php';
?><!--职位类别start-->
<div class="sPopupDiv none" id="jobdiv" style="float:left;"></div>
<!--职位类别end-->
<!--工作地点start-->
<div class="sPopupDiv none" id="citydiv"></div>
<!--工作地点end-->
<!--行业类别start-->
<div class="sPopupDiv none" id="industrydiv"></div>
<!--行业类别end--> 
<div class="content_firm">
    <div class="firm_left">
        <div class="firm_left_close">            
            <?php if ($_GET['hy']||$_GET['pr']||$_GET['mun']||$_GET['keyword']||$_GET['cityid']) {?>
            <div class="firm_left_close_con">
                <div class="firm_left_h1"><span>已选择</span> <a href="<?php echo smarty_function_url(array('m'=>'company'),$_smarty_tpl);?>
">清空条件</a></div>
                <div class="clear"></div>
				<?php if ($_GET['cityid']) {?>
                <span class="firm_left_close_span yun_bg_color"><i>所在城市：<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['cityid']];?>
</i><a href="<?php echo smarty_function_searchurl(array('m'=>'company','untype'=>'cityid'),$_smarty_tpl);?>
"><em></em></a></span>
                <?php }?>
                <?php if ($_GET['hy']) {?>
                <span class="firm_left_close_span yun_bg_color"><i>从事行业：<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_GET['hy']];?>
</i><a href="<?php echo smarty_function_searchurl(array('m'=>'company','untype'=>'hy,page'),$_smarty_tpl);?>
"><em></em></a></span>
                <?php }?>
                <?php if ($_GET['pr']) {?>
                <span class="firm_left_close_span yun_bg_color"><i>企业性质：<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_GET['pr']];?>
</i><a href="<?php echo smarty_function_searchurl(array('m'=>'company','untype'=>'pr,page'),$_smarty_tpl);?>
"><em></em></a></span>
                <?php }?>
                <?php if ($_GET['mun']) {?>
                <span class="firm_left_close_span yun_bg_color"><i>企业规模：<?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_GET['mun']];?>
</i><a href="<?php echo smarty_function_searchurl(array('m'=>'company','untype'=>'mun,page'),$_smarty_tpl);?>
"><em></em></a></span>
                <?php }?>
                <?php if ($_GET['keyword']) {?>
                <span class="firm_left_close_span yun_bg_color"><i>关键字：<?php echo $_GET['keyword'];?>
</i><a href="<?php echo smarty_function_searchurl(array('m'=>'company','untype'=>'keyword,page'),$_smarty_tpl);?>
"><em></em></a></span>
                <?php }?>
            </div>
            <?php }?>
        </div>
        <div class="firm_left_cont">
            <div class="firm_seach_top_list">
                <div class="<?php if ($_GET['hy']) {?>firm_seach_top_s<?php } else { ?>firm_seach_top_l<?php }?>" id="job_hys_click" onclick="check_type('job_hys');">从事行业</div>
                <div class="firm_seach_top_r <?php if ($_GET['hy']) {?>none<?php }?>" id="job_hys">
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <a href="<?php echo smarty_function_listurl(array('m'=>'company','type'=>'hy','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" <?php if ($_GET['hy']==$_smarty_tpl->tpl_vars['v']->value) {?> class="firm_a_atc" <?php }?>><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
                <?php } ?>
            </div>
        </div>
        <div class="firm_seach_top_list">
            <div class="<?php if ($_GET['pr']) {?>firm_seach_top_s<?php } else { ?>firm_seach_top_l<?php }?>" id="job_prs_click" onclick="check_type('job_prs');">企业性质</div>
            <div class="firm_seach_top_r <?php if ($_GET['pr']) {?>none<?php }?>" id="job_prs">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_pr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <a href="<?php echo smarty_function_listurl(array('m'=>'company','type'=>'pr','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" <?php if ($_GET['pr']==$_smarty_tpl->tpl_vars['v']->value) {?> class="firm_a_atc" <?php }?>><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
            <?php } ?>
        </div>
    </div>
    <div class="firm_seach_top_list">
        <div class="<?php if ($_GET['mun']) {?>firm_seach_top_s<?php } else { ?>firm_seach_top_l<?php }?>" id="job_muns_click" onclick="check_type('job_muns');">企业规模</div>
        <div class="firm_seach_top_r <?php if ($_GET['mun']) {?>none<?php }?>" id="job_muns">
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comdata']->value['job_mun']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <a href="<?php echo smarty_function_listurl(array('m'=>'company','type'=>'mun','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" <?php if ($_GET['mun']==$_smarty_tpl->tpl_vars['v']->value) {?> class="firm_a_atc" <?php }?>><?php echo $_smarty_tpl->tpl_vars['comclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
        <?php } ?>
    </div>
</div>
  </div>
</div>
<?php echo '<script'; ?>
>
function check_type(id){
	var display =$("#"+id).css('display');
	if(display=='none'){
		$("#"+id).show();
		$("#"+id+"_click").attr("class","firm_seach_top_l");
	}else{
		$("#"+id).hide();
		$("#"+id+"_click").attr("class","firm_seach_top_s");
	}
	
	/*
	$("#"+id).toggle();  
	var style=$("#"+id+"_click").attr("class");
	if(style=="firm_seach_top_l"){
		$("#"+id+"_click").attr("class","firm_seach_top_s");
	}else{
		$("#"+id+"_click").attr("class","firm_seach_top_l");
	}*/
}
<?php echo '</script'; ?>
><?php }} ?>
