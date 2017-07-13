<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-07 12:08:22
         compiled from "/var/www/html/yunzhaopin/app/template/member/user/expect_success.htm" */ ?>
<?php /*%%SmartyHeaderCode:2012105722595f0936ac17c8-49645269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79aa8cd8b2a875af2dc69850e9809f6a6ee1bfe5' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/member/user/expect_success.htm',
      1 => 1469777686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2012105722595f0936ac17c8-49645269',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'style' => 0,
    'id' => 0,
    'info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_595f0936b0c669_70193588',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595f0936b0c669_70193588')) {function content_595f0936b0c669_70193588($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/index_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/data/plus/job.cache.js" type="text/javascript"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/class.public.css" type="text/css">
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/class.public.js" type="text/javascript"><?php echo '</script'; ?>
> 
<form action="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/?c=expect&act=add" method="post" target="supportiframe">
 
 <div class="news_expect">
<div class="news_expect_cont">

<div class="news_expect_last_msg"><span class="news_expect_last_msg_s">恭喜您，简历创建成功</span></div>


<div class="news_expect_content">
<div class="news_expect_last_content">
<div class="news_expect_last_wzd">
<span class="news_expect_last_wzd_span">简历完整度：</span>
<div class="member_index_resume_t_wzd"> <span class="member_index_resume_t_wz_b"> <em class="ember_index_resume_t_wz_c" style="width:55%"></em> </span> <span class="member_index_resume_t_wz_n">55%</span> </div><a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>'`$id`'),$_smarty_tpl);?>
" target="_blank" class="member_index_resume_yl">简历预览 </a></div>
<div class="news_expect_last_p">企业看重这些信息，建议您进行补充</div>
<div class="news_expect_last_sub">
<a href="index.php?c=expect&e=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
#work" class="news_expect_last_sub_a">工作经历   </a>
<a href="index.php?c=expect&e=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
#edu" class="news_expect_last_sub_a">教育经历  </a>
<a href="index.php?c=expect&e=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
#training" class="news_expect_last_sub_a">培训经历  </a>
<a href="index.php?c=expect&e=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
#skill" class="news_expect_last_sub_a">职业技能 </a>
<a href="index.php?c=expect&e=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
#project" class="news_expect_last_sub_a">项目经验 </a>
<a href="index.php?c=expect&e=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
#other" class="news_expect_last_sub_a">其他信息  </a>
<a href="index.php?c=expect&e=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
#description" class="news_expect_last_sub_a">自我评价  </a>
<?php if ($_smarty_tpl->tpl_vars['info']->value['photo']=='') {?>
<a href="index.php?c=uppic" class="news_expect_last_sub_a">上传头像  </a>
<?php }?>
</div>

<div class="news_expect_last_search">您也可以直接去搜索合适的职位了<a href="<?php echo smarty_function_url(array('m'=>'job'),$_smarty_tpl);?>
" target="_blank" class="news_expect_last_subjob">职位搜索</a><a href="index.php" class="news_expect_last_a">返回我的求职首页>></a></div>



</div>
</div>
</div>
</div>
</form>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
