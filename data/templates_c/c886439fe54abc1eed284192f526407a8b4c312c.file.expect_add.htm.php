<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-07 12:06:38
         compiled from "/var/www/html/yunzhaopin/app/template/member/user/expect_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:520515481595f08ce91a870-70898586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c886439fe54abc1eed284192f526407a8b4c312c' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/member/user/expect_add.htm',
      1 => 1470029668,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '520515481595f08ce91a870-70898586',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'style' => 0,
    'user_style' => 0,
    'save' => 0,
    'resume' => 0,
    'industry_name' => 0,
    'industry_index' => 0,
    'v' => 0,
    'userclass_name' => 0,
    'userdata' => 0,
    'city_name' => 0,
    'city_index' => 0,
    'ResumeList' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_595f08ceadf375_59746736',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595f08ceadf375_59746736')) {function content_595f08ceadf375_59746736($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/css/font-awesome.min.css" type="text/css">
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/foundation-datepicker.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/lssave.js" type="text/javascript"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
>
var userstyle='<?php echo $_smarty_tpl->tpl_vars['user_style']->value;?>
';
var start = 30;
	var step = -1;
	var save=$("#save").val();
	if(!save){
		function count()
			{
			$("#atime").click(function(){ start=30});
			document.getElementById("totalSecond").innerHTML = start;
			start += step;
			if(start < 0 ){
				saveexpform();
				start = 30;
			}
		setTimeout("count()",1000);
	}
	window.onload = count;	
	}
function checkexpect(){
	if($.trim($('#name').val())==''){
		layer.msg("����д�������ƣ�",2,8);return false;
	}
	if($('#hyid').val()==''){
		layer.msg("��ѡ�������ҵ��",2,8);return false;
	}
	if($('#job_class').val()==''){
		layer.msg("��ѡ������ְλ��",2,8);return false;
	}
	if($('#salaryid').val()==''){
		layer.msg("��ѡ������н�ʣ�",2,8);return false;
	}
	if($('#provinceid').val()==''){
		layer.msg("��ѡ���������У�",2,8);return false;
	}
	if($('#reportid').val()==''){
		layer.msg("��ѡ�񵽸�ʱ�䣡",2,8);return false;
	}
	if($('#typeid').val()==''){
		layer.msg("��ѡ�������ʣ�",2,8);return false;
	}
	if($('#statusid').val()==''){
		layer.msg("��ѡ����ְ״̬��",2,8);return false;
	}
	if($.trim($('#uname').val())==''){
		layer.msg("����д��ʵ������",2,8);return false;
	}
	if($('#sex').val()==''){
		layer.msg("��ѡ���Ա�",2,8);return false;
	}
	if($('#birthday').val()==''){
		layer.msg("��ѡ��������£�",2,8);return false;
	}
	if($('#educid').val()==''){
		layer.msg("��ѡ�����ѧ����",2,8);return false;
	}
	if($('#expid').val()==''){
		layer.msg("��ѡ�������飡",2,8);return false;
	}
	if($('#telphone').val()==''){
		layer.msg("����д�ֻ����룡",2,8);return false;
	}else{
	  var reg= /^[1][34578]\d{9}$/; //��֤�ֻ�����  
		 if(!reg.test($('#telphone').val())){
			layer.msg("�ֻ������ʽ����",2,8);return false;
		 }
	}
	if($('#email').val()==''){
		layer.msg("����д��ϵ���䣡",2,8);return false;
	}else{
		var myreg = /^([a-zA-Z0-9\-]+[_|\_|\.]?)*[a-zA-Z0-9\-]+@([a-zA-Z0-9\-]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	   if(!myreg.test($('#email').val())){
			layer.msg("�����ʽ����",2,8);return false;
			return false;
	   }
	}
	if($.trim($('#living').val())==''){
		layer.msg("�������־�ס�أ�",2,8);return false;
	}
	var loadi = layer.load('�����У����Ժ�...',0);
} 
<?php echo '</script'; ?>
>
 <form action="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/?c=expect&act=add" method="post" target="supportiframe" onsubmit="return checkexpect();">
 
 <div class="news_expect">
<div class="news_expect_cont">
<div class="news_expect_cont_h1"><span class="news_expect_cont_h1_s">��������ְ���������õļ������ܸ����ҵ��ù�����<span class="news_expect_cont_bt">����</span></span><a href="index.php" class="news_expect_cont_h1_a">�����ҵ���ְ��ҳ>></a></div>
<div class="news_expect_content">
<?php if ($_smarty_tpl->tpl_vars['save']->value) {?>
 <div id="forms" class="text_tips">�����ϴ�δ�ύ�ɹ������� <a href="javascript:;" onclick="saveexp();"  class="text_tips_a">�ָ�����</a> <i  id="close"class="text_tips_close"></i></div>
 <?php }?>
<div class="news_expect_list mt20"><span class="news_expect_list_span">�������ƣ�</span>
<input type="text" value="" name="name" id="name" class="news_expect_text_t1">
<span class="news_expect_name">�磺�����ܼ�,���۾���</span>
</div>


<div class="news_expect_list"><span class="news_expect_list_span">������ҵ��</span>
<div class="news_expect_text_big  news_expect_text_re10">


<input class="news_expect_bth_big" type="button" <?php if ($_smarty_tpl->tpl_vars['resume']->value['hy']) {?> value="<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['resume']->value['hy']];?>
"<?php } else { ?> value="��ѡ����ҵ" <?php }?> id="hy" onclick="search_show('job_hy');">
	<input type="hidden" id="hyid" name="hy" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['hy'];?>
" />
	<div class="news_expect_text_box " style="display:none" id="job_hy">
		<ul class="news_expect_text_box_list">
			 <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				<li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','hy','<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"> <?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
				<?php } ?>
		</ul>
	</div>
	<span id="by_hyid" style="display:none">��ѡ������н��</span>


</div>

</div>

<div class="news_expect_list"><span class="news_expect_list_span">����ְλ��</span>
<div class="news_expect_text_big  news_expect_text_re9">

<input type="button" <?php if ($_smarty_tpl->tpl_vars['resume']->value['job_classid']) {?> value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['job_classname'];?>
"<?php } else { ?> value="��ѡ��" <?php }?>style=" float:left;" class="news_expect_bth_big" onclick="index_job(5,'#workadds_job','#job_class','left:100px;top:100px; position:absolute;');" id="workadds_job" >

 <input name='job_class' id='job_class'  value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['job_classid'];?>
"type='hidden' />

</div>
</div>
<div class="news_expect_list"><span class="news_expect_list_span">����н�ʣ�</span>
<div class="news_expect_text  news_expect_text_re8">
<input class="news_expect_bth_button" type="button" <?php if ($_smarty_tpl->tpl_vars['resume']->value['salary']) {?> value="<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['resume']->value['salary']];?>
" <?php } else { ?> value="��ѡ������н��" <?php }?>id="salary" onclick="search_show('job_salary');">
	<input type="hidden" id="salaryid" name="salary" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['salary'];?>
" />
	<div class="news_expect_text_box news_expect_text_box_200" style="display:none" id="job_salary">
		<ul class="news_expect_text_box_list">
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_salary']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			<li>
				<a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','salary','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
			</li>
			<?php } ?>
		</ul>
	</div>
	<span id="by_salaryid" style="display:none">��ѡ������н��</span>
</div>
</div>
<div class="news_expect_list"><span class="news_expect_list_span">�������У�</span>
<div class="news_expect_text_w130  news_expect_text_re7">
<input class="news_expect_bth_w130" type="button"  <?php if ($_smarty_tpl->tpl_vars['resume']->value['provinceid']) {?> value="<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['resume']->value['provinceid']];?>
" <?php } else { ?>value="��ѡ��ʡ��"<?php }?> id="province" onclick="search_show('job_province');">
<input type="hidden" id="provinceid" name="provinceid" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['provinceid'];?>
" />

<div class="news_expect_text_box news_expect_text_box_130" id="job_province" style="display:none;">
<ul class="news_expect_text_box_list">
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
	<li>
		<a href="javascript:;" onclick="select_city('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','province','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','citys','city');"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
	</li>
	<?php } ?>
</ul>
</div>
</div>
<div class="news_expect_text_w130  news_expect_text_re7">
 <input class="news_expect_bth_w130" type="button"<?php if ($_smarty_tpl->tpl_vars['resume']->value['cityid']) {?> value="<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['resume']->value['cityid']];?>
" <?php } else { ?>value="��ѡ�����"<?php }?> id="citys" onclick="search_show('job_citys');">
 <input type="hidden" id="citysid" name="citysid" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['cityid'];?>
" />

<div class="news_expect_text_box news_expect_text_box_city  news_expect_text_box_130" id="job_citys" style="display:none;">
<ul class="news_expect_text_box_list">

</ul>
</div>
</div>
<div class="news_expect_text_w130  news_expect_text_re7" id="cityshowth">
 <input class="news_expect_bth_w130" type="button" <?php if ($_smarty_tpl->tpl_vars['resume']->value['three_cityid']) {?> value="<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['resume']->value['three_cityid']];?>
" <?php } else { ?>value="��ѡ������"<?php }?> id="three_city" onclick="three_city_show('job_three_city');">

<input type="hidden" id="three_cityid" name="three_cityid" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['three_cityid'];?>
" />

<div class="news_expect_text_box news_expect_text_box_city news_expect_text_box_130" id="job_three_city" style="display:none;">
<ul class="news_expect_text_box_list">

</ul>
</div>
</div>
</div>




<div class="news_expect_list"><span class="news_expect_list_span">�������ʣ�</span>
<div class="news_expect_text  news_expect_text_re6">

<input class="news_expect_bth_button" type="button"  <?php if ($_smarty_tpl->tpl_vars['resume']->value['type']) {?> value="<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['resume']->value['type']];?>
"<?php } else { ?> value="��ѡ��������" <?php }?> id="type" onclick="search_show('job_type');">
	<input type="hidden" id="typeid" name="type" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['type'];?>
" />
	<div class="news_expect_text_box news_expect_text_box_200" style="display:none" id="job_type">
		<ul class="news_expect_text_box_list">
			  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				<li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
', 'type', '<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
				<?php } ?>
		</ul>
	</div>
	<span id="by_salaryid" style="display:none">��ѡ��������</span>

</div>
</div>


<div class="news_expect_list"><span class="news_expect_list_span">����ʱ�䣺</span>
<div class="news_expect_text  news_expect_text_re5">

<input class="news_expect_bth_button" type="button" <?php if ($_smarty_tpl->tpl_vars['resume']->value['report']) {?> value="<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['resume']->value['report']];?>
"<?php } else { ?> value="��ѡ�񵽸�ʱ��" <?php }?> id="report" onclick="search_show('job_report');">
	<input type="hidden" id="reportid" name="report" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['report'];?>
" />
	<div class="news_expect_text_box news_expect_text_box_200" style="display:none" id="job_report">
		<ul class="news_expect_text_box_list">
			  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_report']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				<li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
', 'report', '<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
				<?php } ?>
		</ul>
	</div>
	<span id="by_salaryid" style="display:none">��ѡ�񵽸�ʱ��</span>

</div>
</div>

<div class="news_expect_list">
<span class="news_expect_list_span">��ְ״̬��</span>
<div class="news_expect_text_big  news_expect_text_re4">

<input class="news_expect_bth_big" type="button" <?php if ($_smarty_tpl->tpl_vars['ResumeList']->value['jobstatus']) {?> value="<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['ResumeList']->value['jobstatus']];?>
"<?php } else { ?> value="��ѡ����ְ״̬" <?php }?> id="status" onclick="search_show('jobstatus');">
	<input type="hidden" id="statusid" name="jobstatus" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['jobstatus'];?>
" />
	<div class="news_expect_text_box" style="display:none" id="jobstatus">
		<ul class="news_expect_text_box_list">
			  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_jobstatus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				<li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
', 'status', '<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
				<?php } ?>
		</ul>
	</div>
	<span id="by_salaryid" style="display:none">��ѡ����ְ״̬</span>

</div>
</div>
<div class="news_expect_list"><span class="news_expect_list_span">��ʵ������</span>
<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['name'];?>
" name="uname" id="uname" class="news_expect_text_t1" style="width:180px;">
</div>

<div class="news_expect_list"><span class="news_expect_list_span">�Ա�</span>
	<input type="hidden" id="sex" name="sex" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['sex'];?>
" />
 <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_sex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
	<span class="yun_info_sex <?php if ($_smarty_tpl->tpl_vars['resume']->value['sex']==$_smarty_tpl->tpl_vars['v']->value) {?>yun_info_sex_cur<?php }?>" id="sex<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" onclick="checksex('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
')"><i class="usericon_sex usericon_sex<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
"></i><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</span>
	<?php } ?>
	<span id="by_sex" style="display:none">��ѡ���Ա�</span>

</div>
<div class="news_expect_list"> 
	<span class="news_expect_list_span">�������£�</span>
	   <div class="text"> 
			<input name="birthday" id="birthday"  type="text"  value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['birthday'];?>
" class="news_expect_text_t1" style="width:180px;"/>
			<?php echo '<script'; ?>
 type="text/javascript">
				$('#birthday').fdatepicker({format: 'yyyy-mm-dd',initialDate: '1989-02-12',startView:4,minView:2});   
			<?php echo '</script'; ?>
>
		</div> 
	</div>

<div class="news_expect_list"><span class="news_expect_list_span">���ѧ����</span>
<div class="news_expect_text  news_expect_text_re2">

<input class="news_expect_bth_button" type="button" <?php if ($_smarty_tpl->tpl_vars['resume']->value['edu']=='') {?>value="��ѡ�����ѧ��"<?php } else { ?> value="<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['resume']->value['edu']];?>
"<?php }?> id="educ" onclick="search_show('job_educ');">
	<input type="hidden" id="educid" name="edu" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['edu'];?>
" />
	<div class="news_expect_text_box news_expect_text_box_200" style="display:none" id="job_educ">
		<ul class="news_expect_text_box_list">
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			<li>
				<a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','educ','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
			</li>
			<?php } ?>
		</ul>
	</div>
	<span id="by_educid" style="display:none">��ѡ�����ѧ��</span>




</div>
</div>
<div class="news_expect_list"><span class="news_expect_list_span">�������飺</span>
<div class="news_expect_text  news_expect_text_re1">

<input class="news_expect_bth_button" type="button" <?php if ($_smarty_tpl->tpl_vars['resume']->value['exp']=='') {?>value="��ѡ��������"<?php } else { ?> value="<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['resume']->value['exp']];?>
"<?php }?> id="exp" onclick="search_show('job_exp');">
	<input type="hidden" id="expid" name="exp" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['exp'];?>
" />
	<div class="news_expect_text_box news_expect_text_box_200" style="display:none" id="job_exp">
		<ul class="news_expect_text_box_list">
			 <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_word']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			<li><a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','exp','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
			<?php } ?>
		</ul>
	</div>
	<span id="by_expid" style="display:none">��ѡ��������</span>

</div>
</div>
<div class="news_expect_list"><span class="news_expect_list_span">�ֻ����룺</span>
<?php if ($_smarty_tpl->tpl_vars['resume']->value['moblie_status']==1) {?>
<span class="news_expect_have"><?php echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>
 <a href="index.php?c=binding" style="color:red;">������֤</a></span>
  <input type="text" id="telphone" name="telphone" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>
" style="display:none;">
<?php } else { ?>
<input name="telphone" id="telphone" type="text" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>
" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" class="news_expect_text_t1" />
<span id="by_telphone" style="display:none">����ȷ��д�ֻ�����</span>
<?php }?>
</div>
<div class="news_expect_list"><span class="news_expect_list_span">��ϵ���䣺</span>
<?php if ($_smarty_tpl->tpl_vars['resume']->value['email_status']==1) {?>
<span class="news_expect_have"><?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
<a href="index.php?c=binding" style="color:red;">������֤</a></span>
  <input type="text" id="email" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
" style="display:none;">
<?php } else { ?>
 <input name="email" id="email" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
" class="news_expect_text_t1" />
	<span id="by_email" class="errordisplay">�ʼ���ʽ����</span>
<?php }?>
</div>

<div class="news_expect_list"><span class="news_expect_list_span">�־�ס�أ�</span><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['living'];?>
" name="living" class="news_expect_text_t1" id="living">
</div>


<div class="news_expect_list"><span class="news_expect_list_span">&nbsp;</span><input type="submit"  class="news_expect_list_sub" value="����" name="submit">
<input id="save"name="save" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['name'];?>
" type="hidden"/></div>
   <div class="text_tips_bc">
   <div class="text_tips_bc_h1"> ��Ϣ����</div>
   <div class="text_tips_bc_cont"> 
   <?php if ($_smarty_tpl->tpl_vars['save']->value['time']) {?>
   <div class="text_tips_bc_l">��Ϣ����<?php echo $_smarty_tpl->tpl_vars['save']->value['time'];?>
����</div>
   <?php }?> 
   <div class="text_tips_bc_time">   <span id="totalSecond"></span>s���Զ�����<br>������Ϣ</div>
   <a  id="atime"href="javascript:;" onclick="saveexpform();" class="text_tips_bc_bth">��������</a>
   </div>
   </div>
    </div>
</div>
</div>
</div>

</form>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
