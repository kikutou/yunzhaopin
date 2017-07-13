<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:28:12
         compiled from "/var/www/html/yunzhaopin/app/template/wap/login.htm" */ ?>
<?php /*%%SmartyHeaderCode:3450183075925522cb785b2-21581357%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b71d57795a6799437555f9991d704c75b09c75f5' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/wap/login.htm',
      1 => 1469167086,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3450183075925522cb785b2-21581357',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config_wapdomain' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5925522cbc2113_28716069',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5925522cbc2113_28716069')) {function content_5925522cbc2113_28716069($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['wapstyle']->value)."/header_cont.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="login_body">
 <section class="list">
  <article>
    <div class="regform" style="padding-top: 20px;">
      <form action="<?php echo $_smarty_tpl->tpl_vars['config_wapdomain']->value;?>
/index.php?c=login" method="post" onsubmit="return mlogin(this);">
        <input name="usertype" type="hidden" value="<?php echo $_GET['usertype'];?>
"/>
        <input name="wxid" type="hidden" value="<?php echo $_GET['wxid'];?>
"/>
        <?php if ($_GET['job']) {?><input name="job" type="hidden" value="<?php echo $_GET['job'];?>
"/><?php }?>
        <dl class="forminputitem">
          <dd>
            <div class="c inputitem_w">
              <i class="reg_icon_font "></i>
              <input name="username" type="text" id="username" value="<?php echo $_GET['username'];?>
" placeholder="邮箱/手机号/用户名" class="inputitemtxt">
            </div>
          </dd>
          <dd>
            <div class="c ico_eye_close inputitem_w">
            <i class="reg_icon_font "></i>
              <input name="password" type="password" id="password"  class="inputitemtxt" placeholder="请输入密码" >
              <em class="viewpwd" id="showPwd" onclick="showPwd(this)"></em> </div>
          </dd>
          <dd> <span class="photochk">
            <input type="checkbox" name="longLogin" id="longLogin" class="inputChk">
            <em class="blue">自动登录</em> </span> <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'forgetpw'),$_smarty_tpl);?>
" class="getpwd">忘记密码</a> </dd>
          <dd>
            <input type="submit" name="submit"  value="登录" class="inputSubmit">
          </dd>
        </dl>
      </form>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_qqlogin']==1||$_smarty_tpl->tpl_vars['config']->value['sy_sinalogin']==1) {?>
    <div class="login_other">
    <span class="login_other_span">其他方式登录</span>
	 <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_sinalogin']==1) {?>
    <a href="<?php echo smarty_function_url(array('m'=>'sinaconnect'),$_smarty_tpl);?>
" title="sina" class="login_other_icon login_other_xl"><i class="iconfont_sina"></i></a>
	 <?php }?>
	  <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_qqlogin']==1) {?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/qqlogin.php" title="QQ"   class="login_other_icon login_other_qq"><i class="iconfont_qq"></i></a>
	 <?php }?>
<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_wxlogin']==1) {?>
         <a href="<?php echo smarty_function_url(array('m'=>'wxconnect'),$_smarty_tpl);?>
" title="wx"   class="login_other_icon login_other_wx"><i class="iconfont_wx"></i></a>
 <?php }?>
    </div>
	<?php }?>
  </article>
  <div class="userloginreg">
    <p> 还没有账号？马上加入<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
 </p>
    <div class="login_pr">
         <ul>
             <li><a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'register','usertype'=>2),$_smarty_tpl);?>
" class="regperson">企业注册</a></li> 
             <li><a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'register'),$_smarty_tpl);?>
" class="regperson">个人注册</a></li>
         </ul>
    </div>
</section>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['wapstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 <?php }} ?>
