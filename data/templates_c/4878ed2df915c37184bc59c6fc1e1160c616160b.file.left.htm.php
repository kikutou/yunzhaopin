<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-07 12:08:30
         compiled from "/var/www/html/yunzhaopin//app/template/member/user/left.htm" */ ?>
<?php /*%%SmartyHeaderCode:329089491595f093e4eefb6-02953176%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4878ed2df915c37184bc59c6fc1e1160c616160b' => 
    array (
      0 => '/var/www/html/yunzhaopin//app/template/member/user/left.htm',
      1 => 1469777686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '329089491595f093e4eefb6-02953176',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'left' => 0,
    'msgnum' => 0,
    'config' => 0,
    'myresumenum' => 0,
    'uid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_595f093e5d9344_71834759',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595f093e5d9344_71834759')) {function content_595f093e5d9344_71834759($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
?><?php echo '<script'; ?>
>
    $(document).ready(function () {
        $(".left_sidebar_icon").click(function () {
            var aid = $(this).attr("aid");
            var style = $("#leftlist" + aid).attr("style");
            if ($(this).hasClass("left_sidebar_icon")) {
                $(this).parent().prev().find('li.overflow').show();
                $(this).attr("class", "left_sidebar_icon1");
                $(this).parent().prev().prev().height($(this).parent().prev().find('ul li').length * 30);
            } else {
                $(this).parent().prev().find('li.overflow').hide();
                $(this).attr("class", "left_sidebar_icon");
                $(this).parent().prev().prev().height(($(this).parent().prev().find('ul li').length - $(this).parent().prev().find('ul li.overflow').length) * 30);
            }
        })
    });
<?php echo '</script'; ?>
>

<div class="left_sidebar">
<div class="left_sidebar_box">
<?php if ($_smarty_tpl->tpl_vars['left']->value==1) {?>
  <div class="left_sidebar_box" style="display:block">
    <div class="left_sidebar_tit user_bg">��������</div>
    <ul class="left_sidebar_leftmune">
      <li><a href="index.php?c=resume">�ҵļ���</a></li>
      <li><a href="index.php?c=info">������Ϣ</a></li>
      <li><a href="index.php?c=msg">����֪ͨ</a><?php if ($_smarty_tpl->tpl_vars['msgnum']->value) {?><i class="left_sidebar_leftmune_icon"><?php echo $_smarty_tpl->tpl_vars['msgnum']->value;?>
</i><?php }?></li>
      <li><a href="index.php?c=job">�����ְλ</a></li>
      <li><a href="index.php?c=look_job">�����¼</a></li>
      <li><a href="index.php?c=favorite">�ղؼ�¼</a></li>
      <li><a href="index.php?c=privacy">��˽����</a></li>
       <li><a href="index.php?c=passwd">�޸�����</a></li>
      <li><a href="index.php?c=binding">�˻���</a></li>
    </ul>
  </div>
<?php } elseif ($_smarty_tpl->tpl_vars['left']->value==2) {?>
  <div class="left_sidebar_box" style="display:block">
    <div class="left_sidebar_tit user_bg">��������</div>
    <ul class="left_sidebar_leftmune">
    
      <li <?php if ($_GET['c']=='resume') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=resume">�ҵļ���</a></li>
      <?php if ($_smarty_tpl->tpl_vars['config']->value['user_number']>$_smarty_tpl->tpl_vars['myresumenum']->value) {?>
      <li><a href="index.php?c=expect">��������</a></li>
      <?php } else { ?>
      <li><a href="javascript:void(0)" onclick="layer.msg('��ļ������Ѿ��ﵽϵͳ���õļ�������',2,8);return false;">��������</a></li>
      <?php }?>
      <li <?php if ($_GET['c']=='info') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=info">������Ϣ</a></li>
      <li <?php if ($_GET['c']=='uppic') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=uppic">�ϴ���Ƭ</a></li>
      <li <?php if ($_GET['c']=='look') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=look">˭�����ҵļ��� </a></li>
      <li <?php if ($_GET['c']=='privacy') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=privacy">��˽����</a></li>
      <li <?php if ($_GET['c']=='resumeout') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=resumeout">�����ⷢ</a></li>
      
    </ul>
  </div>
<?php } elseif ($_smarty_tpl->tpl_vars['left']->value==3) {?>
  <div class="left_sidebar_box" style="display:block">
    <div class="left_sidebar_tit user_bg">��ְ����</div>
    <ul class="left_sidebar_leftmune">
      <li <?php if ($_GET['c']=='msg') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=msg">����֪ͨ</a><?php if ($_smarty_tpl->tpl_vars['msgnum']->value) {?><i class="left_sidebar_leftmune_icon"><?php echo $_smarty_tpl->tpl_vars['msgnum']->value;?>
</i><?php }?></li>
      <li <?php if ($_GET['c']=='job') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=job">�����ְλ</a></li>
      <li <?php if ($_GET['c']=='favorite') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=favorite">ְλ�ղ�</a></li>
      <li <?php if ($_GET['c']=='look_job') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=look_job">�����ְλ </a></li>
      <li <?php if ($_GET['c']=='atn') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=atn">��ע����ҵ</a></li>
		<li <?php if ($_GET['c']=='finder') {?>class="left_sidebar_leftmune_cur"<?php }?>> <a href="index.php?c=finder">ְλ������</a> </li>
      
      <li <?php if ($_GET['c']=='partapply') {?>class="left_sidebar_leftmune_cur"<?php }?>> <a href="index.php?c=partapply">��ְ����</a></li>
      <li <?php if ($_GET['c']=='partcollect') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=partcollect">��ְ�ղ�</a></li>
    </ul>
  </div>
<?php } elseif ($_smarty_tpl->tpl_vars['left']->value==4) {?>
  <div class="left_sidebar_box" style="display:block">
    <div class="left_sidebar_tit user_bg">�˺�����</div>
    <ul class="left_sidebar_leftmune">
      
     
      
      
    </ul>
  </div>
<?php } elseif ($_smarty_tpl->tpl_vars['left']->value==5) {?>
    <div class="left_sidebar_box" style="display:block">
    <div class="left_sidebar_tit user_bg">�������</div>
    <ul class="left_sidebar_leftmune">
      <li <?php if ($_GET['c']=='paylist') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=paylist">��ֵ��¼</a></li>
      <li <?php if ($_GET['c']=='paylog') {?>class="left_sidebar_leftmune_cur"<?php }?>> <a href="index.php?c=paylog">������ϸ</a> </li>
      <li <?php if ($_GET['c']=='integral') {?>class="left_sidebar_leftmune_cur"<?php }?>> <a href="index.php?c=integral"><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
��ȡ;��</a> </li>
      <li <?php if ($_GET['c']=='integral_reduce') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=integral_reduce"><?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
������Ŀ</a></li>
      <li <?php if ($_GET['c']=='reward_list') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=reward_list">�һ���¼</a> </li>
       <li><a href="<?php echo smarty_function_url(array('m'=>'invitereg'),$_smarty_tpl);?>
" target="_blank">����ע��</a></li>
      </ul>
    </div>
<?php } elseif ($_smarty_tpl->tpl_vars['left']->value==6) {?>
  <div class="left_sidebar_box" style="display:block">
    <div class="left_sidebar_tit user_bg">�˺�����</div>
    <ul class="left_sidebar_leftmune">
     <li <?php if ($_GET['c']=='passwd') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=passwd">�޸�����</a></li>
      <li <?php if ($_GET['c']=='binding') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=binding">�˻���</a></li>
      
      <li <?php if ($_GET['c']=='commsg') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=commsg">��ְ��ѯ </a></li>
      <li <?php if ($_GET['c']=='seemessage') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=seemessage">���� / ����</a></li>
      <li <?php if ($_GET['c']=='sysnews') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=sysnews">ϵͳ��Ϣ</a></li>
      <li <?php if ($_GET['c']=='xin') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=xin">��������</a></li>
      <li <?php if ($_GET['c']=='pl') {?>class="left_sidebar_leftmune_cur"<?php }?>><a href="index.php?c=pl">�ҵ�����</a></li>
      <li><a href="<?php echo smarty_function_url(array('m'=>'ask','c'=>'friend','a'=>'myquestion','uid'=>$_smarty_tpl->tpl_vars['uid']->value),$_smarty_tpl);?>
" target="_blank">�ҵ�����</a></li>
    </ul>
  </div>
<?php }?>
</div>
<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_wx_qcode']!='') {?>
<div class="left_wx_box">
<dl class="left_wx_box_dl">
<dt><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_wx_qcode'];?>
" width="80" height="80"></dt>
<dd class="">
<div class="left_wx_box_tit">�ֻ�������!</div>
<div class="left_wx_box_p">΢��ɨһɨ</div>
<div class="left_wx_box_p">��ְ������</div>
</dd>
</dl>

</div>
<?php }?>
</div>


<?php }} ?>
