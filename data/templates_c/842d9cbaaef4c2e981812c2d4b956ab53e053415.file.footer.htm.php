<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:27:32
         compiled from "/var/www/html/yunzhaopin//app/template/wap/footer.htm" */ ?>
<?php /*%%SmartyHeaderCode:104345945359255204bd6738-57705273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '842d9cbaaef4c2e981812c2d4b956ab53e053415' => 
    array (
      0 => '/var/www/html/yunzhaopin//app/template/wap/footer.htm',
      1 => 1469609456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104345945359255204bd6738-57705273',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'username' => 0,
    'layer' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59255204c19a36_75604850',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59255204c19a36_75604850')) {function content_59255204c19a36_75604850($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_function_baidu')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.baidu.php';
?><?php echo '<script'; ?>
>
$(document).ready(function () {
    $('#jobclick').click('click', function () {
      $('#footerjob').toggle();
      $('#footerresume').hide();
    });  
	$('#footerjob').click('click', function () {
		$('#footerjob').hide();
    });
});
<?php echo '</script'; ?>
>

<footer>
<div class="clear"></div>
<div class="footer_box_bot"></div>
<div class="footer_sum">
  <div class="bottom_sum">
    <div class="bottom_con">
      <div class="classify "> 
      <a href="<?php echo smarty_function_url(array('m'=>'wap'),$_smarty_tpl);?>
"id="indexclick" class="fotter_nav_link"> 
      <i class="footer_icon iconfont_home"></i> 
      <span class="fotter_nav_span">首页</span> 
      </a> </div>
      <div class="classify"  >
 <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'job'),$_smarty_tpl);?>
"  class="fotter_nav_link">      
         <em class="fotter_nav_link"> 
         <i class="footer_icon iconfont_jobhome"></i> 
         <span class="fotter_nav_span">找工作</span> 
         </em></a>
          
      </div>


       <div class="classify footer_nav_cur"> 
      <a href="javascript:void(0);" id="jobclick"class="fotter_nav_link"> 
      <i class="iconfont_homemore"></i> 
            <span class="iconfont_homemore_bg"></span>   <span class="fotter_nav_span">&nbsp;</span> 
     
      </a> 
            </div>
      <div class="classify"> 
    <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'resume'),$_smarty_tpl);?>
"  id="resumeclick<?php echo smarty_function_url(array('m'=>'wap','c'=>'resume'),$_smarty_tpl);?>
" class="fotter_nav_link"> 
      <em class="fotter_nav_link"> 
      <i class="footer_icon iconfont_userhome"></i> <span class="fotter_nav_span">找人才</span> 
      </em> </a>
           
      </div>
      <?php if (!$_smarty_tpl->tpl_vars['username']->value) {?>
      <div class="classify"> <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'login'),$_smarty_tpl);?>
" id="memberclick"class="fotter_nav_link"> <i class="footer_icon iconfont_myhome"></i> <span class="fotter_nav_span">我的</span> </a> </div>
      <?php } else { ?>
      <div class="classify"> <a href="<?php echo smarty_function_url(array('m'=>'wap'),$_smarty_tpl);?>
member" id="memberclick"class="fotter_nav_link"> <i class="footer_icon iconfont_myhome"></i> <span class="fotter_nav_span">我的</span> </a> </div>
      <?php }?>
    </div>
   </div>
</div> 
 <div style="width:100%;height:100%; background:rgba(51,51,51,0.5); position:fixed;left:0px;top:0px ; z-index:10000;display:none" id="footerjob"> 
 <div class="foot_nav_box" style="width:100%; position:absolute;"> 
        
           <ul class="foot_nav_box_list">
              <li><a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'part'),$_smarty_tpl);?>
" class="foot_nav_box_a"><span class="foot_nav_box_list_icon cor_3"><i class="nav_icon iconfont_part "></i></span><div class="foot_nav_box_name">找兼职</div></a> </li>   <li>  <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'tiny'),$_smarty_tpl);?>
" class="foot_nav_box_a"><span class="foot_nav_box_list_icon cor_7"><i class="nav_icon iconfont_tiny "></i></span><div class="foot_nav_box_name">普工专区</div></a> </li>
              <li><a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'once'),$_smarty_tpl);?>
" class="foot_nav_box_a"><span class="foot_nav_box_list_icon cor_4"><i class="nav_icon iconfont_once "></i></span><div class="foot_nav_box_name">店铺招聘</div></a> </li>
              <li> <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'map'),$_smarty_tpl);?>
" class="foot_nav_box_a"><span class="foot_nav_box_list_icon cor_5"><i class="nav_icon iconfont_map "></i></span><div class="foot_nav_box_name">附近职位</div></a></li>
              <li> <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'company'),$_smarty_tpl);?>
" class="foot_nav_box_a"><span class="foot_nav_box_list_icon cor_2"><i class="nav_icon iconfont_comp "></i></span><div class="foot_nav_box_name">找企业</div></a> </li>
              <li> <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'zph'),$_smarty_tpl);?>
" class="foot_nav_box_a"><span class="foot_nav_box_list_icon cor_6"><i class="nav_icon iconfont_zph "></i></span><div class="foot_nav_box_name">招聘会</div></a> </li>
              <li> <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'redeem'),$_smarty_tpl);?>
" class="foot_nav_box_a"><span class="foot_nav_box_list_icon cor_jf"><i class="nav_icon iconfont_jf "></i></span><div class="foot_nav_box_name">积分商城</div></a> </li>
              <li> <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'ask'),$_smarty_tpl);?>
" class="foot_nav_box_a"><span class="foot_nav_box_list_icon cor_wd"><i class="nav_icon iconfont_ask "></i></span><div class="foot_nav_box_name">互动问答</div></a> </li>
            </ul>
            </div>
     </div>
</footer>


<?php if ($_smarty_tpl->tpl_vars['layer']->value) {?>
<input id="layermsg" value="<?php echo $_smarty_tpl->tpl_vars['layer']->value['msg'];?>
" type="hidden">
<input id="layerurl" value="<?php echo $_smarty_tpl->tpl_vars['layer']->value['url'];?>
" type="hidden">
<?php echo '<script'; ?>
>$(document).ready(function(){islayer();});<?php echo '</script'; ?>
>
<?php }?>
<?php echo '<script'; ?>
>wapurl="<?php echo smarty_function_url(array('m'=>'wap'),$_smarty_tpl);?>
";<?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
>var weburl="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
"<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>var pricename="<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
"<?php echo '</script'; ?>
>
<?php echo smarty_function_baidu(array(),$_smarty_tpl);?>


<div style='margin:0 auto;width:0px;height:0px;overflow:hidden;'><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_wx_sharelogo'];?>
"></div>
</body>
</html>
<?php }} ?>
