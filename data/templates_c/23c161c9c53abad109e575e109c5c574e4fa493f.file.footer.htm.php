<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 16:25:01
         compiled from "/var/www/html/yunzhaopin//app/template/default/footer.htm" */ ?>
<?php /*%%SmartyHeaderCode:9275900205925435dd24172-97860899%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23c161c9c53abad109e575e109c5c574e4fa493f' => 
    array (
      0 => '/var/www/html/yunzhaopin//app/template/default/footer.htm',
      1 => 1469757448,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9275900205925435dd24172-97860899',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'desc' => 0,
    'desclist' => 0,
    'lit' => 0,
    'style' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5925435dd65779_72357146',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5925435dd65779_72357146')) {function content_5925435dd65779_72357146($_smarty_tpl) {?><?php if (!is_callable('smarty_function_desc')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.desc.php';
if (!is_callable('smarty_function_baidu')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.baidu.php';
?><!--foot  start-->
<?php echo smarty_function_desc(array('assign_name'=>'desc'),$_smarty_tpl);?>

<div class="clear"></div>
<div class="footer">
  <div class="foot">
    <div class="foot_conent">
    <div class="footer_tel">
    <div class="footer_help_tel">
            <i class="footer_icon_hf"></i>
            <p><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
客服热线</p>
            <p class="footer_help_tel_num"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_freewebtel'];?>
</p>
        </div>  
    
    </div>
      <div class="footer_left"> 
	  <?php  $_smarty_tpl->tpl_vars['desclist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['desclist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['desc']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['desclist']->key => $_smarty_tpl->tpl_vars['desclist']->value) {
$_smarty_tpl->tpl_vars['desclist']->_loop = true;
?>
        <dl class="footer_list">
          <dt><?php echo $_smarty_tpl->tpl_vars['desclist']->value['name'];?>
</dt>
          <dd>
            <ul>
              <?php  $_smarty_tpl->tpl_vars['lit'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lit']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['desclist']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lit']->key => $_smarty_tpl->tpl_vars['lit']->value) {
$_smarty_tpl->tpl_vars['lit']->_loop = true;
?>
              <li><a  href="<?php echo $_smarty_tpl->tpl_vars['lit']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['lit']->value['name'];?>
</a></li>
              <?php } ?>
            </ul>
          <dd>
        </dl>
        <?php } ?> 
		</div>
        
   
      <div class="footer_wx"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_wx_qcode'];?>
"  width="120" height="120"><div class="footer_wx_p">官方微信</div></div>
    </div>
    <div class="clear"></div>
    <div class="footer_bot">
      <div class="footer_bot_p"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webcopyright'];
echo $_smarty_tpl->tpl_vars['config']->value['sy_webrecord'];?>
 </div>
      <div class="footer_bot_p">	地址:<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webadd'];?>
  电话(Tel):<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webtel'];?>
  EMAIL:<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webemail'];?>
</div>
      <div class="footer_img"> 
      <a href="/"><img alt="" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ftImg01.png" width="120" height="52"> </a> 
      <a href="/"><img alt="" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ftImg02.png" width="120" height="52"> </a> 
      <a href="/"><img alt="" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/ftImg03.png" width="120" height="52"> </a> 
	  <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webtongji'];?>

      </div>
    </div>
  </div>
</div>
<!--foot  end--> 

<div id="bg" style=""></div>
<div id="uclogin" class="none"></div>
<?php echo '<script'; ?>
>var integral_pricename='<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
';var weburl="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
"; <?php echo '</script'; ?>
>
<?php echo smarty_function_baidu(array(),$_smarty_tpl);?>


</body>
</html><?php }} ?>
