<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-07 12:06:38
         compiled from "/var/www/html/yunzhaopin//app/template/member/user/footer.htm" */ ?>
<?php /*%%SmartyHeaderCode:77507660595f08ceb95226-69073679%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a96b86f92d291cac970965a31239865eb1acc3d' => 
    array (
      0 => '/var/www/html/yunzhaopin//app/template/member/user/footer.htm',
      1 => 1469843718,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77507660595f08ceb95226-69073679',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'statis' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_595f08cebc00e4_70629278',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595f08cebc00e4_70629278')) {function content_595f08cebc00e4_70629278($_smarty_tpl) {?>
<!--简历置顶-->
<?php echo '<script'; ?>
>
function cktopspan(day,price){
	var disval=$('input[name="dis"]:checked ').val();
	if(disval&&day!=disval){
		$("input[name=dis][value="+disval+"]").attr("checked",false);
	}
	$("input[name=dis][value="+day+"]").attr("checked",true);
	var needs=day*price;
	$("#price").html(needs);
}
<?php echo '</script'; ?>
>
<div id="resumetop" style="display:none;">
    <div class="admin_Operating_sh" style="padding:10px; ">
     <form action="index.php?c=resume&act=rtop" target="supportiframe" name="myform" method="post">
         <div class="stick_msg">置顶简历：<i id="resumename"></i></div>
         <div class="stick_msg">置顶结束时间：<span id='topdate'></span></div>
         <div class="stick_tm">
              <div class="stick_tm_ft">置顶时长：</div>
              <ul class="stick_tm_box">
                   <lable for="dis1">
                          <li>
                              <input type="radio" class="stick_tm_box_radio" value="1" name="dis" onclick="cktop('1','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')"/>
                              <span class="stick_tm_box_time" onclick="cktopspan('1','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')">1天</span>
                          </li>
                   </lable>
                   <lable for="dis3">
                          <li>
                              <input type="radio" class="stick_tm_box_radio" value="3" name="dis" onclick="cktop('3','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')"/>
                              <span class="stick_tm_box_time"onclick="cktopspan('3','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')">3天</span>
                          </li>
                   </lable>
                   <lable for="dis7">
                          <li>
                              <input type="radio" class="stick_tm_box_radio" value="7" name="dis" onclick="cktop('7','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')"/>
                              <span class="stick_tm_box_time"onclick="cktopspan('7','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')">7天</span>
                          </li>
                   </lable>
                   <lable for="dis15">
                          <li>
                              <input type="radio" class="stick_tm_box_radio" value="15" name="dis" onclick="cktop('15','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')"/>
                              <span class="stick_tm_box_time"onclick="cktopspan('15','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')">15天</span>
                          </li>
                   </lable>
                   <lable for="dis30">
                          <li style="margin-top:10px;">
                              <input type="radio" class="stick_tm_box_radio" value="30" name="dis" onclick="cktop('30','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')"/>
                              <span class="stick_tm_box_time"onclick="cktopspan('30','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_resume_top'];?>
')">30天</span>
                          </li>
                   </lable>
              </ul>
         </div>
         <div class="stick_rage">
              <span>应付<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
：<em id="price">0</em></span> <br/>
              <span>您当前可用<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
：<em><?php echo $_smarty_tpl->tpl_vars['statis']->value['integral'];?>
</em></span>
         </div>
         <div class="stick_rage_bt">
              <input type="hidden" name="eid" value="">
              <input class="stick_rage_bt_but" type="submit" name="submit" value="确定支付"/>
         </div>
         </form>
    </div>
</div>
<!--简历置顶end-->
<div class="clear"></div>
<div class=foot><div class=copyright><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webcopyright'];?>
 电话(Tel):<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webtel'];?>
</div></div>
<div id="uclogin" style="display:none"></div>
<iframe id="supportiframe" name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
</body>
</html><?php }} ?>
