<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-07 15:58:01
         compiled from "/var/www/html/yunzhaopin/app/template/wap/member/user/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:1080151054595f3f098a96e2-54134443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38257050b4dbfa1f274c9faf8703ee8294ca5245' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/wap/member/user/index.htm',
      1 => 1469609456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1080151054595f3f098a96e2-54134443',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'rightinfo' => 0,
    'username' => 0,
    'expect' => 0,
    'wkyqnum' => 0,
    'yqnum' => 0,
    'statis' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_595f3f09922412_13349560',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595f3f09922412_13349560')) {function content_595f3f09922412_13349560($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['wapstyle']->value)."/member/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="index_header">
  <div class="user_header_img">
    <div class="user_header_bg"><a href="index.php?c=photo"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['rightinfo']->value['photo'];?>
" border="0" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
',2);"></a></div>
  </div>
  <div class="member_header_info">
    <div class="m_user_name"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
 <a href="index.php?c=info" class="m_infor_bj"><i class="m_icon_bj yun_wap_usericonfont"></i>编辑</a></div>
    <div class="m_user_re">简历完整度：
      <?php if ($_smarty_tpl->tpl_vars['expect']->value['integrity']) {?>
      <div class="container">
        <div class="progress">
          <div class="progress-bar" style="width:<?php echo $_smarty_tpl->tpl_vars['expect']->value['integrity'];?>
%"></div>
        </div>
        <span class="progress-bar-bf"><?php echo $_smarty_tpl->tpl_vars['expect']->value['integrity'];?>
%</span> </div>
      <?php } else { ?>
      暂无简历<a href="index.php?c=addresume" class="index_resumi_sub">创建简历</a> <?php }?> </div>
  </div>
</div>
<section>
  <div class="m_index_msg">
    <dl class="m_index_msg_list">
      <?php if ($_smarty_tpl->tpl_vars['wkyqnum']->value) {?><i class="m_index_msg_list_number"><?php echo $_smarty_tpl->tpl_vars['wkyqnum']->value;?>
</i><?php }?> <a href="index.php?c=invite">
      <dt><?php echo $_smarty_tpl->tpl_vars['yqnum']->value;?>
</dt>
      <dd>面试通知</dd>
      </a>
    </dl>
    <dl class="m_index_msg_list">
      <a href="index.php?c=sq">
      <dt><?php echo $_smarty_tpl->tpl_vars['statis']->value['sq_jobnum'];?>
</dt>
      <dd>申请记录</dd>
      </a>
    </dl>
    <dl class="m_index_msg_list">
      <a href="index.php?c=collect">
      <dt><?php echo $_smarty_tpl->tpl_vars['statis']->value['fav_jobnum'];?>
</dt>
      <dd>收藏记录</dd>
      </a>
    </dl>
  </div>
</section>
<div class="index_section">
  <section class="wap_member">
  <div class="wap_member_mrecord"> <a href="index.php?c=resume" class="wap_member_mrecord_list"><i class="m_icon  wap_member_nav_icon_jl"></i>简历管理</a> <a href="index.php?c=invite" class="wap_member_mrecord_list"><i class="m_icon  wap_member_nav_icon_tz"></i>面试通知</a> <a href="index.php?c=sq" class="wap_member_mrecord_list"><i class="m_icon  wap_member_nav_icon_sq"></i>申请的职位</a> <a href="index.php?c=look" class="wap_member_mrecord_list"><i class="m_icon  wap_member_nav_icon_look"></i>谁看过我的简历</a> <a href="index.php?c=collect" class="wap_member_mrecord_list"><i class="m_icon  wap_member_nav_icon_sc"></i>收藏的职位</a> </div>
  <section class="wap_member">
    <div class="wap_member_mrecord"> <a href="index.php?c=partapply" class="wap_member_mrecord_list"><i class="m_icon  wap_member_nav_icon_bm"></i>报名的兼职</a> <a href="index.php?c=partcollect" class="wap_member_mrecord_list"><i class="m_icon  wap_member_nav_icon_sc"></i>收藏的兼职</a> <a href="index.php?c=look_job" class="wap_member_mrecord_list"><i class="m_icon  wap_member_nav_icon_yl"></i>我浏览过的职位</a> </div>
  </section>
  <section class="wap_member">
    <div class="wap_member_mrecord"> <a href="index.php?c=info" class="wap_member_mrecord_list"><i class="m_icon wap_member_nav_icon_info"></i>基本信息</a> <a href="index.php?c=reward_list" class="wap_member_mrecord_list"><i class="m_icon  wap_member_nav_icon_dh"></i>兑换记录</a> <a href="index.php?c=binding" class="wap_member_mrecord_list"><i class="m_icon  wap_member_nav_icon_bd"></i>账户绑定</a> <a href="index.php?c=password" class="wap_member_mrecord_list "><i class="m_icon  wap_member_nav_icon_sz"></i>更改密码</a> <a href="javascript:;" onclick="islogout('<?php echo smarty_function_url(array('m'=>'wap','c'=>'loginout'),$_smarty_tpl);?>
','确认退出吗？');" class="wap_member_mrecord_list" style="border:none"><i class="m_icon wap_member_nav_icon_tc"></i>退出登录</a> </div>
  </section>
</div>

<div id="yingdao" <?php if ($_smarty_tpl->tpl_vars['expect']->value['integrity']) {?>style="display:none;"<?php }?> style="width:100%;height:100%; background:rgba(51,51,51,0.6); position:fixed;left:0px;top:0px; z-index:100000;display:block;">
  <div style="width:100%; position:absolute;left:0px;top:140px;">
    <div style="padding:20px;">
      <div class="user_resume_index_tit">亲，你还没有创建简历</div>
      <div class="user_resume_index_tip">为了更快的找到工作，创建属于自己的简历吧！</div>
      <div class="user_resume_index_tip_p"><a href="index.php?c=addresume" class="user_resume_index_tip_sub">创建简历</a></div>
      <div class="user_resume_index_tip_p2"><a href="javascript:Close_yd();" class="user_resume_index_tip_p2_a">下次再说</a></div>
    </div>
  </div>
</div>
<?php echo '<script'; ?>
>
function Close_yd(){
	$(".user_resume_index_tip_p2_a").hide();
	$("#yingdao").hide();
}
<?php echo '</script'; ?>
> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['wapstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
