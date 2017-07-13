<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-07 12:08:29
         compiled from "/var/www/html/yunzhaopin/app/template/member/user/expect.htm" */ ?>
<?php /*%%SmartyHeaderCode:1672770351595f093d948ce5-85576946%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c66c1cdb7d15de62a204d2313e67e8a3237eee02' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/member/user/expect.htm',
      1 => 1469777686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1672770351595f093d948ce5-85576946',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_style' => 0,
    'style' => 0,
    'config' => 0,
    'userdata' => 0,
    'v' => 0,
    'userclass_name' => 0,
    'row' => 0,
    'ResumeList' => 0,
    'one' => 0,
    'resume' => 0,
    'user_photo' => 0,
    'industry_name' => 0,
    'city_name' => 0,
    'job_classname' => 0,
    'work' => 0,
    'edu' => 0,
    'training' => 0,
    'skill' => 0,
    'project' => 0,
    'other' => 0,
    'numresume' => 0,
    'resume_row' => 0,
    'key' => 0,
    'industry_index' => 0,
    'city_index' => 0,
    'city_type' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_595f093e0cf6d0_64778997',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595f093e0cf6d0_64778997')) {function content_595f093e0cf6d0_64778997($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/index_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link href="<?php echo $_smarty_tpl->tpl_vars['user_style']->value;?>
/images/m_resume.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/class.public.css" type="text/css">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['user_style']->value;?>
/js/resume.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/data/plus/job.cache.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/class.public.js" type="text/javascript"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['user_style']->value;?>
/js/search.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['user_style']->value;?>
/js/jquery.scrollto.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/css/font-awesome.min.css" type="text/css">  
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/foundation-datepicker.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
function addEdu(){
	$("#addedu").append(function(){
		$(".lastupbox").removeClass("lastupbox");
		var randnum='e'+parseInt(Math.random()*1000); 
		var html="<li class='yun_resume_popup newresumebox lastupbox' id='"+randnum+"'><i class='yun_resume_popup_del showedunum' id='ie"+randnum+"' onclick=\"deleteupbox('"+randnum+"','ie"+randnum+"','showedunum','edu')\">-</i><input type='hidden' name='id[]' value='' class='"+randnum+"'/><input type='hidden' name='nameid[]' value='n"+randnum+"'><input type='hidden' name='sdateid[]' value='s"+randnum+"'><input type='hidden' name='timeid[]' value='ie"+randnum+"'><input type='hidden' class='usededu' name='usedid[]' value=''><div class='yun_resume_popup_list'><span class='yun_resume_popup_name'>学校名称：</span><div class='yun_resume_popup_qyname'><input type='text' name='name[]' id='edu_name' value=''  onblur=\"hidemsg('medun"+randnum+"')\" class='yun_resume_popup_text'><i class='yun_resume_popup_qyname_tip' id='medun"+randnum+"' style='display:none'>请填写学校名称</i></div></div><div class='yun_resume_popup_list'><span class='yun_resume_popup_name'>在校时间：</span><div class='yun_resume_popup_list_box'><input type='text' id='edu_sdate"+randnum+"' name='sdate[]' value='' onblur=\"hidemsg('medus"+randnum+"')\" class='yun_resume_popup_text yun_resume_popup_textw90'><?php echo '<script'; ?>
>$('#edu_sdate"+randnum+"').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  <\/script><i class='yun_resume_popup_list_box_tip' id='medus"+randnum+"' style='display:none'>请选择开始日期</i></div><span class='yun_resume_popup_time'>至</span><div class='yun_resume_popup_list_box'><input type='text' id='edu_edate"+randnum+"' name='edate[]' value='' onblur=\"hidemsg('meduie"+randnum+"')\" class='yun_resume_popup_text yun_resume_popup_textw90'><?php echo '<script'; ?>
>$('#edu_edate"+randnum+"').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  <\/script><i class='yun_resume_popup_list_box_tip' id='meduie"+randnum+"' style='display:none'>请确认日期先后顺序</i></div></div><div class='yun_resume_popup_list'><span class='yun_resume_popup_name'>所学专业：</span><input type='text' name='specialty[]' id='edu_specialty' value='' class='yun_resume_popup_text'></div><div class='yun_resume_popup_list'><span class='yun_resume_popup_name'>班级职位：</span><input type='text' name='title[]' id='title' value='' class='yun_resume_popup_text'></div><div class='yun_resume_popup_list'><span class='yun_resume_popup_name'>学历：</span><div class='yun_resume_popup_chose_box'> <input type='button' id='educationc"+randnum+"' name='educationc' value='请选择最高学历' onclick=\"search_show('job_educationc"+randnum+"');\" class='yun_resume_popup_chose_box_text'><input type='hidden' id='educationc"+randnum+"id' name='education[]' value=''/> <div class='yun_resume_popup_chose_cont' style='display:none' id='job_educationc"+randnum+"'><?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?><a href='javascript:;' onclick=\"selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','educationc"+randnum+"','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');\" class='yun_resume_popup_chose_cont_a'> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a><?php } ?></div></div></div></li>";
        return html;
    });
	$(".showedunum").show();
	var div = document.getElementById('edu_div');
	$("#edu_div").animate({scrollTop:div.scrollHeight},1000);
} 
$(window).load(function(){ 
	if($("#work_have").val()!=1){
		$("#work_empty").show();
	}
	if($("#edu_have").val()!=1){
		$("#edu_empty").show();
	}
	if($("#training_have").val()!=1){
		$("#training_empty").show();
	}
	if($("#skill_have").val()!=1){
		$("#skill_empty").show();
	}
	if($("#project_have").val()!=1){
		$("#project_empty").show();
	}
	if($("#other_have").val()!=1){
		$("#other_empty").show();
	}
});  
$(document).ready(function (e) {
    
    var scrollbottom = $(document).height() - $(window).height() - $(window).scrollTop();
    if (parseInt(scrollbottom) < 200) {
        $("#right_box").parent().css("bottom", (350 - (parseInt(scrollbottom))) + "px");
    } else if ($(window).scrollTop() < 200) {
        $("#right_box").parent().css("top", "200px");
    } else {
        $("#right_box").parent().css("bottom", "150px");
    }
    if ($(window).scrollTop() < 83) {
        $("#right_box").css("position", "");
    }
    $("#right_box").parent().slideDown();
    if (document.body.style.overflow != "hidden" && document.body.scroll != "no" && document.body.scrollHeight > document.body.offsetHeight) {
        $("#right_box").hide();
    } else {
        $(window).scroll(function () {
            var scrolltop = $(this).scrollTop();
            var scrollbottom = $(document).height() - $(this).height() - $(this).scrollTop();
            if (parseInt(scrolltop) > 83) {
                $("#right_box").css("position", "fixed");
                $("#right_box").css("top", "0px");
            } else {
                $("#right_box").css("position", "");
                $("#right_box").css("top", parseInt(scrolltop) + "px");
            }
            if (parseInt(scrollbottom) < 200) {
                $("#right_box").parent().css("bottom", ((200 - scrollbottom) + 150) + "px");
            } else {
                $("#right_box").parent().css("bottom", "150px");
            }
        });
    }
});
<?php echo '</script'; ?>
>
<div class="yun_resume_content">
<div class="yun_resume_left_box">
<div class="yun_resume_operation_p">
  <div class="yun_resume_resumename">
    <div class="yun_resume_resumename_name">简历名称：<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
 
    <?php if ($_smarty_tpl->tpl_vars['row']->value['id']) {?><a href="javascript:;" class="yun_resume_resumename_c resume_top_name_left_a" onclick="changename()">重命名</a> <?php }?></div>
    <div class="resume-rename" style="display:none;" id="changename">
       <form action="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/?c=expect&act=save_resume_name" method="post" autocomplete="off" target="supportiframe">
           <span class="btn-primary_text"> 简历名称：</span>
           <input type="text" class="text input-medium" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" name="name">
           <input type="hidden" name="eid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">
           <input type="submit" class="btn-primary" value="保存">
           <a href="javascript:;" onclick="layer.closeAll();" class="resume_top_name_left_a cblue">取消</a>
       </form>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['row']->value['id']) {?>
    <div class="yun_resume_resumename_qh">切换简历：
      <select onchange="location.href = $(this).val();" class="resume_top_qh">
        <?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ResumeList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value) {
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
        <option <?php if ($_smarty_tpl->tpl_vars['one']->value['id']==$_GET['e']) {?>selected ="selected"<?php }?> value="index.php?c=expect<?php if ($_smarty_tpl->tpl_vars['one']->value['doc']) {?>q<?php }?>&e=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
">
        <?php echo $_smarty_tpl->tpl_vars['one']->value['name'];?>

        </option>
        <?php } ?>
      </select>
    </div>
    <?php }?>
  </div>
  <div class="yun_resume_operation_r"><a href="<?php ob_start();?><?php echo $_GET['e'];?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_tmp1),$_smarty_tpl);?>
" target="_blank" class="yun_resume_operation_preview">预览简历</a></div>
</div>
<!--/*简历开始*/-->
<div class="yun_resume_box"> 
  <!--基本信息-->
  <div class="yun_resume_info ">
  <div class="yun_resume_info_bj " id="info_upbox" onclick="showMore('info','550','490','基本信息');" onmousemove="movelook('info');" onmouseout="outlook('info');"><div id="compile_info" class="yun_resume_handle" style="display:none">编辑</div>
    <div class="yun_resume_name"><?php echo $_smarty_tpl->tpl_vars['resume']->value['name'];?>
</div>
    <div class="yun_resume_p"><?php if ($_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['resume']->value['sex']]) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['resume']->value['sex']];?>
<span class="yun_resume_info_line">|</span><?php }
if ($_smarty_tpl->tpl_vars['resume']->value['age']) {
echo $_smarty_tpl->tpl_vars['resume']->value['age'];?>
<span class="yun_resume_info_line">|</span><?php }
if ($_smarty_tpl->tpl_vars['resume']->value['living']) {
echo $_smarty_tpl->tpl_vars['resume']->value['living'];?>
 <span class="yun_resume_info_line">|</span><?php }
if ($_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['resume']->value['edu']]) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['resume']->value['edu']];?>
<span class="yun_resume_info_line">|</span><?php }
if ($_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['resume']->value['exp']]) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['resume']->value['exp']];
}?></div>
    <div class="yun_resume_tel"><?php if ($_smarty_tpl->tpl_vars['resume']->value['marriage']) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['resume']->value['marriage']];?>
<span class="yun_resume_info_line">|</span><?php }?> <?php if ($_smarty_tpl->tpl_vars['resume']->value['height']) {
echo $_smarty_tpl->tpl_vars['resume']->value['height'];?>
cm<?php }
if ($_smarty_tpl->tpl_vars['resume']->value['weight']) {?>/<?php echo $_smarty_tpl->tpl_vars['resume']->value['weight'];?>
kg<?php }?> <?php if ($_smarty_tpl->tpl_vars['resume']->value['weight']||$_smarty_tpl->tpl_vars['resume']->value['height']) {?><span class="yun_resume_info_line">|</span><?php }?> <?php if ($_smarty_tpl->tpl_vars['resume']->value['nationality']) {
echo $_smarty_tpl->tpl_vars['resume']->value['nationality'];?>
<span class="yun_resume_info_line">|</span><?php }?> <?php if ($_smarty_tpl->tpl_vars['resume']->value['domicile']) {
echo $_smarty_tpl->tpl_vars['resume']->value['domicile'];?>
<span class="yun_resume_info_line">|</span><?php }?> <?php if ($_smarty_tpl->tpl_vars['resume']->value['telphone']) {
echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>
<span class="yun_resume_info_line">|</span><?php }
echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
</div>
    </div>
    <div class="yun_resume_photo  user_item">
    <div class="photo"><img src=".<?php echo $_smarty_tpl->tpl_vars['user_photo']->value;?>
" width="80" height="100" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
',2);"></div>
    <a href="index.php?c=uppic" target="_blank"><div class="yun_resume_photo_xg photochange" style="display:none">修改头像</div></a>
    </div>
  </div>
  
  <!--求职意向-->
  <div class="yun_resume_job_intention" style="display:block;" id="expect_upbox" onclick="showMore('expect','520','470','求职意向');" onmousemove="movelook('expect');" onmouseout="outlook('expect');">
    <div class="yun_resume_h1"><span class="yun_resume_h1_s"><i class="yun_resume_h1_icon yun_resume_h1_iconyx"></i>求职意向</span></div>
    <div id="compile_expect" class="yun_resume_handle" style="dispaly:none">编辑</div>
    <ul class="yun_resume_job_intention_list " id="expect">
      <li>期望从事行业：<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['row']->value['hy']];?>
</li>
      <li>工作地点：<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['provinceid']];?>
 <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['cityid']];?>
 <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['three_cityid']];?>
</li>
      <li>期望薪资：<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['salary']];?>
</li>
      <li>到岗时间：<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['report']];?>
</li>
      <li>求职状态：<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['jobstatus']];?>
</li>
      <li>期望工作性质：<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['type']];?>
</li>
      <li class="yun_resume_job_intention_list_end">期望从事职位：<?php echo $_smarty_tpl->tpl_vars['job_classname']->value;?>
</li>
    </ul>
  </div>
  <!--工作经历-->
  <div class="yun_resume_joblist" style="display: block;" id="work_upbox" onclick="showMore('work','520','480','工作经历');" onmousemove="movelook('work');" onmouseout="outlook('work');">
    <div class="yun_resume_h1"><span class="yun_resume_h1_s"><i class="yun_resume_h1_icon yun_resume_h1_iconjl"></i>工作经历</span></div>
    <div id="compile_work" class="yun_resume_handle" style="dispaly:none">编辑</div>
    <ul class="yun_resume_tabulation" id="work">
    <?php if (is_array($_smarty_tpl->tpl_vars['work']->value)&&!empty($_smarty_tpl->tpl_vars['work']->value)) {?>
     <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['work']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
      <li class="yun_resume_exp_list" id="work<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
        <input type="hidden" id="work_have" value="1">
        <div class="yun_resume_exp_timt"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['sdate'],"%Y.%m");?>
-<?php if ($_smarty_tpl->tpl_vars['v']->value['edate']) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['edate'],"%Y.%m");
} else { ?>&nbsp;&nbsp;至今<?php }?></div>
        <div class="yun_resume_exp_r">
          <div class="yun_resume_exp_name"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
<span class="yun_resume_exp_name_job"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</span></div>
          <div class="yun_resume_exp_p"><?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
</div>
        </div>
      </li>
      <?php } ?>
      <?php }?>
    </ul>
    <ul id="work_empty" style="display:none">
     <li class="yun_resume_exp_list  yun_resume_exp_list_color" >
        <div class="yun_resume_exp_timt">2009.8-至今</div>
        <div class="yun_resume_exp_r">
          <div class="yun_resume_exp_name">XXX有限公司<span class="yun_resume_exp_name_job">产品研发</span></div>
          <div class="yun_resume_exp_p">
          1、主导XXX的版本迭代，并负责主要需求，协调开发、设计资源，推动项目进度，保证产品质量，打磨细节体验<br/>
          2、参与讨论及制订XXX的各版本需求，根据行业热点及用户反馈，提出有效的产品方案<br/>
          3、负责版本上线后的推广工作，通过官方网站和论坛等渠道将新功能触达用户<br/>
          4、跟进用户反馈并分析数据，持续优化已有功能
          </div>
        </div>
      </li>
    </ul>
  </div>
    <!--教育经历-->
    <div class="yun_resume_joblist" style="display: block;" id="edu_upbox" onclick="showMore('edu','520','445','教育经历');" onmousemove="movelook('edu');" onmouseout="outlook('edu');">
      <div class="yun_resume_h1"><span class="yun_resume_h1_s"><i class="yun_resume_h1_icon yun_resume_h1_iconjy"></i>教育经历</span></div><div id="compile_edu" style="dispaly:none" class="yun_resume_handle">编辑</div>
      <ul class="yun_resume_tabulation" id="edu">
      <?php if (is_array($_smarty_tpl->tpl_vars['edu']->value)&&!empty($_smarty_tpl->tpl_vars['edu']->value)) {?>
      <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['edu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
        <li class="yun_resume_exp_list " id="edu<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
          <input type="hidden" id="edu_have" value="1">
          <div class="yun_resume_exp_timt"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['sdate'],"%Y.%m");?>
-<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['edate'],"%Y.%m");?>
</div>
          <div class="yun_resume_exp_r">
             <div class="yun_resume_exp_name"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
<span class="yun_resume_exp_name_job"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value['education']];?>
</span></div>
            <div class="yun_resume_exp_p"><?php echo $_smarty_tpl->tpl_vars['v']->value['specialty'];?>
<span class="yun_resume_exp_name_job"></span><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</div>
          </div>
        </li>
       <?php } ?>
       <?php }?>
      </ul>
      <ul id="edu_empty" style="display:none">
       <li class="yun_resume_exp_list  yun_resume_exp_list_color" >
          <div class="yun_resume_exp_timt">2009.8-2013.6</div>
          <div class="yun_resume_exp_r">
             <div class="yun_resume_exp_name">XXX大学<span class="yun_resume_exp_name_job">本科</span></div>
            <div class="yun_resume_exp_p">计算机<span class="yun_resume_exp_name_job"></span>班长</div>
          </div>
        </li>
      </ul>
    </div>
    <!--培训经历-->
    <div class="yun_resume_joblist" style="display: block;" id="training_upbox" onclick="showMore('training','520','480','培训经历');" onmousemove="movelook('training');" onmouseout="outlook('training');">
      <div class="yun_resume_h1"><span class="yun_resume_h1_s"><i class="yun_resume_h1_icon yun_resume_h1_iconpx"></i>培训经历</span></div>
      <div id="compile_training"class="yun_resume_handle"  style="dispaly:none">编辑</div>
      <ul class="yun_resume_tabulation" id="training">
        <?php if (is_array($_smarty_tpl->tpl_vars['training']->value)&&!empty($_smarty_tpl->tpl_vars['training']->value)) {?>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['training']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
        <li class="yun_resume_exp_list  " id="training<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
          <input type="hidden" id="training_have" value="1">
          <div class="yun_resume_exp_timt"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['sdate'],"%Y.%m");?>
-<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['edate'],"%Y.%m");?>
</div>
          <div class="yun_resume_exp_r ">
            <div class="yun_resume_exp_name"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
<span class="yun_resume_exp_name_job"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</span></div>
            <div class="yun_resume_exp_p"><?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
</div>
          </div>
        </li>
        <?php } ?>
        <?php }?>
      </ul>
      <ul id="training_empty" style="display:none">
        <li class="yun_resume_exp_list yun_resume_exp_list_color">
          <div class="yun_resume_exp_timt">2009.8-2010.8</div>
          <div class="yun_resume_exp_r ">
            <div class="yun_resume_exp_name">XXX培训中心<span class="yun_resume_exp_name_job">XXX系统培训</span></div>
            <div class="yun_resume_exp_p">
            1、XXX的各方面功能培训<br/>
            2、XXX培训<br/>
            3、美工培训
            </div>
          </div>
        </li>
      </ul>
    </div>
    <!--专业技能-->
    <div class="yun_resume_joblist" style="display: block;" id="skill_upbox" onclick="showMore('skill','520','350','职业技能');" onmousemove="movelook('skill');" onmouseout="outlook('skill');">
      <div class="yun_resume_h1"><span class="yun_resume_h1_s"><i class="yun_resume_h1_icon yun_resume_h1_iconjn"></i>职业技能</span></div>
      <div id="compile_skill" class="yun_resume_handle" style="dispaly:none">编辑</div>
      <ul class="resume_skill" id="skill">
       <?php if (is_array($_smarty_tpl->tpl_vars['skill']->value)&&!empty($_smarty_tpl->tpl_vars['skill']->value)) {?>
       <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['skill']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
       <li class="yun_resume_exp_list" id="skill<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
       <input type="hidden" id="skill_have" value="1">
          <i class="resume_skill_icon"></i>
                           技能名称：<span class="resume_table_blod"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</span> 
              <span class="yun_resume_exp_name_job">掌握时间：<?php echo $_smarty_tpl->tpl_vars['v']->value['longtime'];?>
年</span>
          <?php if ($_smarty_tpl->tpl_vars['v']->value['pic']) {?>
          <div class="">技能证书： <img src=".<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'];?>
" width="95" height="70" style="vertical-align:middle"> </div>
          <?php }?>
          </li>
        <?php } ?>
        <?php }?>
      </ul>
      <ul id="skill_empty" style="display:none">
      <li class="yun_resume_exp_list  yun_resume_exp_list_color">
          <i class="resume_skill_icon"></i>技能名称：<span class="resume_table_blod">英语CET6、粤语</span> <span class="yun_resume_exp_name_job">掌握时间：3年</span>
            <div class="">技能证书： <img src="<?php echo $_smarty_tpl->tpl_vars['user_style']->value;?>
/images/zs.jpg" width="95" height="70" style="vertical-align:middle"> </div>
      </li>
      </ul>
    </div>
    <!--项目经验-->
    <div class="yun_resume_joblist" style="display: block;" id="project_upbox" onclick="showMore('project','520','480','项目经验');" onmousemove="movelook('project');" onmouseout="outlook('project');">
      <div class="yun_resume_h1"><span class="yun_resume_h1_s"><i class="yun_resume_h1_icon yun_resume_h1_iconxm"></i>项目经验</span></div>
      <div id="compile_project" class="yun_resume_handle" style="dispaly:none">编辑</div>
      <ul class="yun_resume_tabulation" id="project">
      <?php if (is_array($_smarty_tpl->tpl_vars['project']->value)&&!empty($_smarty_tpl->tpl_vars['project']->value)) {?>
      <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
        <li class="yun_resume_exp_list " id="project<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
          <input type="hidden" id="project_have" value="1">
          <div class="yun_resume_exp_timt"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['sdate'],"%Y.%m");?>
-<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['edate'],"%Y.%m");?>
</div>
          <div class="yun_resume_exp_r">
            <div class="yun_resume_exp_name"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
<span class="yun_resume_exp_name_job"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</span></div>
            <div class="yun_resume_exp_p"><?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
</div>
          </div>
        </li>
        <?php } ?>
        <?php }?>
      </ul>
      <ul id="project_empty" style="display:none">
       <li class="yun_resume_exp_list  yun_resume_exp_list_color">
          <div class="yun_resume_exp_timt">2013.8-2015.8</div>
          <div class="yun_resume_exp_r">
            <div class="yun_resume_exp_name">“温暖明天”爱护行动<span class="yun_resume_exp_name_job">项目设计</span></div>
            <div class="yun_resume_exp_p">
            1、引导用户爱护身边每一样东西，倡导资源节约和合理利用。将节约下来的运营成本投入公益项目，帮助有困难的人<br/>
            2、项目上线期间，参与用户超过60万，引发了社会热议，许多网友对项目创意给予了高度的肯定<br/>
            3、项目获得XXX大学求是杯“云文化奖”金奖和XXX大学创新大赛微创新奖
            </div>
          </div>
        </li>
      </ul>
    </div>
    <!--其他信息-->
    <div class="yun_resume_joblist" style="display: block;" id="other_upbox" onclick="showMore('other','540','380','其他信息');" onmousemove="movelook('other');" onmouseout="outlook('other');">
      <div class="yun_resume_h1"><span class="yun_resume_h1_s"><i class="yun_resume_h1_icon yun_resume_h1_iconqt"></i>其他信息</span></div>
      <div id="compile_other" class="yun_resume_handle" style="dispaly:none">编辑</div>
      <ul class="resume_skill" id="other">
      <?php if (is_array($_smarty_tpl->tpl_vars['other']->value)&&!empty($_smarty_tpl->tpl_vars['other']->value)) {?>
      <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['other']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
        <li class="yun_resume_exp_list" id="other<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
         <input type="hidden" id="other_have" value="1">
          <i class="resume_skill_icon"></i><span class="resume_table_blod">标题：<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</span>
          <div class="yun_resume_exp_p">内容：
            <?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
</div>
        </li>
        <?php } ?>
        <?php }?>
      </ul>
      <ul  id="other_empty" style="display:none">
        <li class="yun_resume_exp_list yun_resume_exp_list_color">
          <i class="resume_skill_icon"></i><span class="resume_table_blod">标题：校内经历</span>
          <div class="yun_resume_exp_p">内容：
          1、主导的多个版本的立项、资源协调、进度管理和对外合作工作。
          2、负责XXX网页版、XXX手机客户端、XXX版等项目，运营了XXX--“温暖明天”爱护行动
            </div>
        </li>
      </ul>
    </div>
    <!--自我评价-->
    <div class="yun_resume_joblist" style="display: block;" id="description_upbox" onclick="showMore('description','550','300','自我评价');" onmousemove="movelook('description');" onmouseout="outlook('description');">
      <div class="yun_resume_h1"><span class="yun_resume_h1_s"><i class="yun_resume_h1_icon yun_resume_h1_iconpj"></i>自我评价</span></div>
      <div id="compile_description"class="yun_resume_handle"  style="dispaly:none">编辑</div>
      <ul class="resume_skill" id="description">
      <?php if ($_smarty_tpl->tpl_vars['resume']->value['description']) {?>
        <li class=" yun_resume_exp_list"><i class="resume_skill_icon"></i>
          <div class="yun_resume_exp_p">
            <em><?php echo nl2br($_smarty_tpl->tpl_vars['resume']->value['description']);?>
</em>
          </div>
        </li>
        <?php } else { ?>
        <li class=" yun_resume_exp_list yun_resume_exp_list_color"><i class="resume_skill_icon"></i>
          <div class="yun_resume_exp_p">
            <em>热爱XXX行业，关注行业动态<br/>
                                 学习能力强，对新事物充满好奇<br/>
                                工作态度认真负责，具有团队合作精神</em>
          </div>
        </li>
            <?php }?>
      </ul>
    </div>
    
  </div>
  <!--/*简历结束*/--> 
</div>
<!--  右侧开始-->


<div class="resume_right_fixedcont">
<div class="" id="right_box">
<div class="resume_right_box">
<div class="resume_right_box_tit">
  <ul>
    <li class="resume_right_box_tit_cur" id="module"><a href="javascript:;" style="text-decoration:none;" onclick="checkModel('1')">简历模块</a></li>
    <li class="" id="template"><a href="javascript:;" style="text-decoration:none;" onclick="checkModel('2')">简历模板</a></li>
  </ul>
</div>
<div class="yun_integrity_box" id="resume_module">
  <div class="yun_resume_integrity_box mt8">
    <div class="cont">
    <div class="">简历完整度：</div>
      <div id="_ctl0_UserManage_LeftTree1_progressDiv" class="bar" style="width:140px">
        <div class="play" style="width:<?php echo $_smarty_tpl->tpl_vars['numresume']->value;?>
%"></div>
      </div>
      <div class="value"><b id="numresume"><?php echo $_smarty_tpl->tpl_vars['numresume']->value;?>
%</b></div>
      <div id="_ctl0_UserManage_LeftTree1_msnInfo" class="intro"> 
      <?php if ($_smarty_tpl->tpl_vars['numresume']->value>60) {?> 您的简历已符合要求！<?php }?>
      <?php if ($_smarty_tpl->tpl_vars['numresume']->value<55) {?>  您现在的简历完整度太低，还不能够使用此简历应聘!<?php }?>
      </div>
    </div>
  </div>
  <ul class="yun_integrity_degree_list">
    <li><a href="javascript:;" onclick="showMore('info','550','490','基本信息');">
    <em class="integrity_degree_name">基本信息</em></a>
    <span class="integrity_degree <?php if ($_smarty_tpl->tpl_vars['resume']->value['name']!='') {?> state_done <?php }?>">+20%</span></li>
    <li><a href="javascript:;" onclick="showMore('expect','520','470','求职意向');"><em class="integrity_degree_name">求职意向</em></a>
    <span class="integrity_degree <?php if ($_smarty_tpl->tpl_vars['resume_row']->value['expect']==1) {?> state_done resume_expect<?php }?>">+35%</span></li>
    <li id="m_right3"><a href="javascript:;" onclick="showMore('work','520','480','工作经历');"><em class="integrity_degree_name">工作经历</em></a><span class="integrity_degree <?php if (count($_smarty_tpl->tpl_vars['work']->value)>=1) {?> state_done resume_work<?php }?>">+10%</span></li>
    <li id="m_right4"><a href="javascript:;" onclick="showMore('edu','520','445','教育经历');"><em class="integrity_degree_name">教育经历</em></a><span class="integrity_degree <?php if (count($_smarty_tpl->tpl_vars['edu']->value)>=1) {?> state_done resume_edu<?php }?>">+10%</span></li>
    <li id="m_right5"><a href="javascript:;" onclick="showMore('training','520','480','培训经历');"><em class="integrity_degree_name">培训经历</em></a><span class="integrity_degree <?php if (count($_smarty_tpl->tpl_vars['training']->value)>=1) {?> state_done resume_training<?php }?>">+7%</span></li>
    <li id="m_right6"><a href="javascript:;" onclick="showMore('skill','520','350','职业技能');"><em class="integrity_degree_name">职业技能</em></a><span class="integrity_degree <?php if (count($_smarty_tpl->tpl_vars['skill']->value)>=1) {?> state_done <?php }?>">+10%</span></li>
    <li id="m_right7"><a href="javascript:;" onclick="showMore('project','520','480','项目经验');"><em class="integrity_degree_name">项目经验</em></a><span class="integrity_degree <?php if (count($_smarty_tpl->tpl_vars['project']->value)>=1) {?> state_done resume_project<?php }?>">+8%</span></li>
    <li><a href="javascript:;" onclick="showMore('other','540','380','其他信息');"><em class="integrity_degree_name">其他信息</em></a></li>
    <li><a href="javascript:;" onclick="showMore('description','550','300','自我评价');"><em class="integrity_degree_name">自我评价</em></a></li>
  </ul>
</div>
<div class="yun_integrity_box" style="display:block;display:none" id="resume_template">
<ul class="yun_template_box">
<li <?php if ($_smarty_tpl->tpl_vars['row']->value['tmpid']==''||$_smarty_tpl->tpl_vars['row']->value['tmpid']=='d') {?>class="yun_template_cur"<?php }?>><a href="javascript:;" onclick="changeModel('<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_GET['e'],'tmp'=>'d','see'=>'member'),$_smarty_tpl);?>
','默认模板','900')"><img src="<?php echo $_smarty_tpl->tpl_vars['user_style']->value;?>
/images/resumu_img1.jpg">
<div class="yun_template_box_yl">默认模板</div>
</a>
</li>
<li <?php if ($_smarty_tpl->tpl_vars['row']->value['tmpid']=='1') {?>class="yun_template_cur "<?php }?>><a href="javascript:;" onclick="changeModel('<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_GET['e'],'tmp'=>1,'see'=>'member'),$_smarty_tpl);?>
','红色模板','900')"><img src="<?php echo $_smarty_tpl->tpl_vars['user_style']->value;?>
/images/resumu_img2.jpg">
<div class="yun_template_box_yl">红色模板</div>
</a></li>
<li <?php if ($_smarty_tpl->tpl_vars['row']->value['tmpid']=='2') {?>class="yun_template_cur"<?php }?>><a href="javascript:;" onclick="changeModel('<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_GET['e'],'tmp'=>2,'see'=>'member'),$_smarty_tpl);?>
','蓝色模板','900')"><img src="<?php echo $_smarty_tpl->tpl_vars['user_style']->value;?>
/images/resumu_img3.jpg">
<div class="yun_template_box_yl">蓝色模板</div>
</a></li>
<li <?php if ($_smarty_tpl->tpl_vars['row']->value['tmpid']=='3') {?>class="yun_template_cur"<?php }?>><a href="javascript:;" onclick="changeModel('<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_GET['e'],'tmp'=>3,'see'=>'member'),$_smarty_tpl);?>
','简约模板','900')"><img src="<?php echo $_smarty_tpl->tpl_vars['user_style']->value;?>
/images/resumu_img4.jpg">
<div class="yun_template_box_yl">简约模板</div>
</a></li>
</ul>
</div>
</div>
</div>
</div>
<!--  右侧结束-->
</div>
  <!--  基本信息-->
    <div id="saveinfo" style="background:#fff;display:none">
      <form name="MyForm" method="post" action="index.php?c=info&act=save" target="supportiframe" autocomplete="off" onsubmit="return CheckPost();">
      <div class="yun_resume_popup_box" style="width: 100%; max-height: 401px; overflow: auto; overflow-x:hidden ;position: relative; ">
        <ul>
          <li class="yun_resume_popup">
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name"><i class="yun_resume_popup_bt">*</i>姓名：</span>
              <input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['name'];?>
" class="yun_resume_popup_text">
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name"><i class="yun_resume_popup_bt">*</i>性别：</span>
            <input type="hidden" id="sex" name="sex" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['sex'];?>
" />
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_sex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
             <span class="yun_info_sex <?php if ($_smarty_tpl->tpl_vars['row']->value['sex']==$_smarty_tpl->tpl_vars['v']->value) {?>yun_info_sex_cur<?php }?>" id="sex<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" onclick="checksex('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
')"><i class="usericon_sex usericon_sex<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
"></i><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</span>
            <?php } ?>
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name"><i class="yun_resume_popup_bt">*</i>出生年月：</span>
               <input type="text" id="birthday" name="birthday" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['birthday'];?>
" class="yun_resume_popup_text"/> 
			   <?php echo '<script'; ?>
>
			    $('#birthday').fdatepicker({format: 'yyyy-mm-dd',initialDate: '1989-08-08', startView:4,minView:2});  
			  <?php echo '</script'; ?>
>
            </div>
           <div class="yun_resume_popup_list"><span class="yun_resume_popup_name"><i class="yun_resume_popup_bt">*</i>现居住地：</span>
              <input type="text" id="living" name="living" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['living'];?>
" class="yun_resume_popup_text">
            </div>
             <div class="yun_resume_popup_list"><span class="yun_resume_popup_name"><i class="yun_resume_popup_bt">*</i>最高学历：</span>        
             <div class="yun_resume_popup_chose_box  yun_resume_zindex11"> 
             <input type="button" id="educ" onclick="search_show('job_educ');" value="<?php if ($_smarty_tpl->tpl_vars['resume']->value['edu']=='') {?>请选择最高学历<?php } else {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['resume']->value['edu']];
}?>" class="yun_resume_popup_chose_box_text">
             <input type="hidden" id="educid" name="edu" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['edu'];?>
" />
             <div class="yun_resume_popup_chose_cont" style="display:none" id="job_educ">
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','educ','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');" class="yun_resume_popup_chose_cont_a"> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
                <?php } ?>
             </div>
             </div>
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name"><i class="yun_resume_popup_bt">*</i>工作经验：</span><div class="yun_resume_popup_chose_box  yun_resume_zindex10"> 
             <input type="button" id="exp" onclick="search_show('job_exp');" value="<?php if ($_smarty_tpl->tpl_vars['resume']->value['exp']=='') {?>请选择工作经验<?php } else {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['resume']->value['exp']];
}?>" class="yun_resume_popup_chose_box_text">
             <input type="hidden" id="expid" name="exp" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['exp'];?>
" />
             <div class="yun_resume_popup_chose_cont" style="display:none" id="job_exp">
             <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_word']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
             <a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','exp','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');" class="yun_resume_popup_chose_cont_a"> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
             <?php } ?>
             </div>
             </div>
            </div>
             <div class="yun_resume_popup_list"><span class="yun_resume_popup_name"><i class="yun_resume_popup_bt">*</i>手机：</span>
              <?php if ($_smarty_tpl->tpl_vars['resume']->value['moblie_status']==1) {?>
               <?php echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>
 <a href="index.php?c=binding" style="color:red;">重新认证</a>
               <input type="text" id="telphone" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>
" style="display:none;">
              <?php } else { ?>
              <input type="text" name="telphone" id="telphone" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>
" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" class="yun_resume_popup_text">
              <?php }?>
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name"><i class="yun_resume_popup_bt">*</i>邮箱：</span>
              <?php if ($_smarty_tpl->tpl_vars['resume']->value['email_status']==1) {?>
               <?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
<a href="index.php?c=binding" style="color:red;">重新认证</a>
               <input type="text" id="email" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
" style="display:none;">
               <?php } else { ?>
              <input type="text" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>
" class="yun_resume_popup_text">
              <?php }?>
            </div>
         
           <div class="yun_resume_popup_list_tw"><span class="yun_resume_popup_name">身高：</span> <input type="text" name="height" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['height'];?>
" class="yun_resume_popup_text yun_resume_popup_textw150" onkeyup="this.value=this.value.replace(/[^0-9-.]/g,'')"><span class="yun_resume_popudw">CM</span></div>
           <div class="yun_resume_popup_list_tw"><span class="yun_resume_popup_name">民族：</span><input type="text" name="nationality" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['nationality'];?>
" class="yun_resume_popup_text yun_resume_popup_textw150"></div>
           <div class="yun_resume_popup_list_tw"><span class="yun_resume_popup_name">体重：</span><input type="text" name="weight" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['weight'];?>
" class="yun_resume_popup_text yun_resume_popup_textw150" onkeyup="this.value=this.value.replace(/[^0-9-.]/g,'')"><span class="yun_resume_popudw">KG</span></div>
           <div class="yun_resume_popup_list_tw"><span class="yun_resume_popup_name">婚姻： </span>
           <div class="yun_resume_popup_chose_box yun_resume_popup_chose_box_city yun_resume_zindex8"> 
            <input type="button" id="marriage" onclick="search_show('job_marriage');" value="<?php if ($_smarty_tpl->tpl_vars['resume']->value['marriage']=='') {?>请选择<?php } else {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['resume']->value['marriage']];
}?>"class="yun_resume_popup_chose_box_text yun_resume_popup_chose_box_text_city">
            <input type="hidden" id="marriageid" name="marriage" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['marriage'];?>
" />
            <div class="yun_resume_popup_chose_cont yun_resume_popup_chose_cont_city" style="display:none" id="job_marriage">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_marriage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
              <a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','marriage','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');" class="yun_resume_popup_chose_cont_a"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
             <?php } ?>
             </div>
             </div></div>
           <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">户籍所在地：</span> <input type="text" name="domicile" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['domicile'];?>
" class="yun_resume_popup_text"></div>
           <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">座机：</span><input type="text" name="telhome" id="telhome" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['telhome'];?>
" class="yun_resume_popup_text" onkeyup="this.value=this.value.replace(/[^0-9-.]/g,'')"></div>
           <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">个人主页：</span><input type="text" name="homepage" value="<?php echo $_smarty_tpl->tpl_vars['resume']->value['homepage'];?>
" class="yun_resume_popup_text"></div>
          </li>
        </ul>
      </div>
      <div class="yun_resume_popup_bot">
        <input type="hidden" id="getinfoid" value="<?php if ($_smarty_tpl->tpl_vars['resume']->value['name']!=" ") {?>1<?php }?>">
      
        <input type="submit" name="submitBtn" value="保存" class="expect_test_bth">
          <a href="javascript:;" onclick="hideMore('info')" class="expect_test_bth_qx">取消</a>
      </div>
      </form>
    </div> 
     <!--  基本信息出框 end-->
       <!--  求职意向-->
    <div id="saveexpect" style="background:#fff;display:none">
      <div class="yun_resume_popup_box" style="width: 100%; max-height: 415px; overflow: auto; overflow-x:hidden ;position: relative; ">
        <ul>
          <li class="yun_resume_popup">
           <div class="yun_resume_popup_list"><span class="yun_resume_popup_name"><i class="yun_resume_popup_bt">*</i>从事行业：</span>        
           <div class="yun_resume_popup_chose_box yun_resume_zindex11"> 
             <input type="button" id="hy" onclick="search_show('job_hy');" value="<?php if ($_smarty_tpl->tpl_vars['row']->value['hy']) {
echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['row']->value['hy']];
} else { ?>请选择行业<?php }?>" class="yun_resume_popup_chose_box_text">
             <input type="hidden" id="hyid" name="hy" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['hy'];?>
"/>
             <div class="yun_resume_popup_chose_cont" style="display:none" id="job_hy">
             <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
             <a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','hy','<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');" class="yun_resume_popup_chose_cont_a"> <?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
             <?php } ?>
             </div>
             </div>
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name"><i class="yun_resume_popup_bt">*</i>从事职位：</span>        
            <div class="yun_resume_popup_chose_box yun_resume_zindex10"> 
             <input type="button" value="<?php if ($_smarty_tpl->tpl_vars['job_classname']->value) {
echo $_smarty_tpl->tpl_vars['job_classname']->value;
} else { ?>请选择职位<?php }?>" onclick="index_job(5,'#workadds_job','#job_class','left:100px;top:100px; position:absolute;');" id="workadds_job"class="yun_resume_popup_chose_box_text">
             <input type="hidden" name="job_class" id="job_class" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['job_classid'];?>
"/>
             </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name"><i class="yun_resume_popup_bt">*</i>工作地点：</span>        
            <div class="yun_resume_popup_chose_box yun_resume_popup_chose_box_city yun_resume_zindex10"> 
             <input type="button" id="province" onclick="search_show('job_province');" value="<?php if ($_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['provinceid']]) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['provinceid']];
} else { ?>请选择省份<?php }?>" class="yun_resume_popup_chose_box_text yun_resume_popup_chose_box_text_city">
             <input type="hidden" id="provinceid" name="provinceid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['provinceid'];?>
" />
             <div class="yun_resume_popup_chose_cont yun_resume_popup_chose_cont_city" style="display:none" id="job_province">
             <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
             <a href="javascript:;" onclick="select_city('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','province','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','citys','city');" class="yun_resume_popup_chose_cont_a"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
             <?php } ?>
             </div>
             </div>
             <div class="yun_resume_popup_chose_box yun_resume_popup_chose_box_city yun_resume_zindex10"> 
             <input type="button" id="citys" onclick="search_show('job_citys');" value="<?php if ($_smarty_tpl->tpl_vars['row']->value['cityid']) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['cityid']];
} else { ?>请选择城市<?php }?>" class="yun_resume_popup_chose_box_text yun_resume_popup_chose_box_text_city">
             <input type="hidden" id="citysid" name="citysid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['cityid'];?>
" />
             <div class="yun_resume_popup_chose_cont yun_resume_popup_chose_cont_city" style="display:none" id="job_citys">
             <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['row']->value['provinceid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
              <a href="javascript:;" onclick="select_city('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','citys','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
','three_city','city');" class="yun_resume_popup_chose_cont_a"> <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
             <?php } ?>
             </div>
             </div>
             <div class="yun_resume_popup_chose_box yun_resume_popup_chose_box_city yun_resume_zindex10" id="cityshowth" <?php if ($_smarty_tpl->tpl_vars['row']->value['three_cityid']=='') {?>style="display:none"<?php }?>> 
             <input type="button" id="three_city" onclick="three_city_show('job_three_city');" value="<?php if ($_smarty_tpl->tpl_vars['row']->value['three_cityid']) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['row']->value['three_cityid']];
} else { ?>请选择区县<?php }?>" class="yun_resume_popup_chose_box_text yun_resume_popup_chose_box_text_city">
             <input type="hidden" id="three_cityid" name="three_cityid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['three_cityid'];?>
" />
             <div class="yun_resume_popup_chose_cont yun_resume_popup_chose_cont_city" style="display:none" id="job_three_city">
             <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['row']->value['cityid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
              <a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','three_city','<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');" class="yun_resume_popup_chose_cont_a"> <?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
             <?php } ?>
             </div>
             </div>
            </div>
           <div class="yun_resume_popup_list"><span class="yun_resume_popup_name"><i class="yun_resume_popup_bt">*</i>期望薪资：</span>        
           <div class="yun_resume_popup_chose_box yun_resume_zindex9"> 
             <input type="button" id="salary" onclick="search_show('job_salary');" value="<?php if ($_smarty_tpl->tpl_vars['row']->value['salary']) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['salary']];
} else { ?>请选择薪资<?php }?>" class="yun_resume_popup_chose_box_text">
             <input type="hidden" id="salaryid" name="salary" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['salary'];?>
"/>
             <div class="yun_resume_popup_chose_cont" style="display:none" id="job_salary">
             <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_salary']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
             <a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','salary','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');" class="yun_resume_popup_chose_cont_a"> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
             <?php } ?>
             </div>
             </div>
            </div>
           <div class="yun_resume_popup_list"><span class="yun_resume_popup_name"><i class="yun_resume_popup_bt">*</i>工作性质：</span>        
           <div class="yun_resume_popup_chose_box yun_resume_zindex8"> 
             <input type="button" id="type" onclick="search_show('job_type');" value="<?php if ($_smarty_tpl->tpl_vars['row']->value['type']) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['type']];
} else { ?>请选择工作性质<?php }?>" class="yun_resume_popup_chose_box_text" >
             <input type="hidden" id="typeid" name="type" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['type'];?>
"/>
             <div class="yun_resume_popup_chose_cont" style="display:none" id="job_type">
             <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
              <a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','type','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');" class="yun_resume_popup_chose_cont_a"> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
             <?php } ?>
             </div>
             </div>
            </div>
         <div class="yun_resume_popup_list"><span class="yun_resume_popup_name"><i class="yun_resume_popup_bt">*</i>到岗时间：</span>        
         <div class="yun_resume_popup_chose_box yun_resume_zindex7"> 
             <input type="button" id="report" onclick="search_show('job_report');" value="<?php if ($_smarty_tpl->tpl_vars['row']->value['report']) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['report']];
} else { ?>请选择到岗时间<?php }?>" class="yun_resume_popup_chose_box_text">
             <input type="hidden" id="reportid" name="report" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['report'];?>
" />
             <div class="yun_resume_popup_chose_cont" style="display:none" id="job_report">
             <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_report']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
             <a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','report','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');" class="yun_resume_popup_chose_cont_a"> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
             <?php } ?>
             </div>
             </div>
            </div>
               <div class="yun_resume_popup_list"><span class="yun_resume_popup_name"><i class="yun_resume_popup_bt">*</i> 求职状态：</span>        
               <div class="yun_resume_popup_chose_box yun_resume_zindex6"> 
             <input type="button" id="status" onclick="search_show('job_status');" value="<?php if ($_smarty_tpl->tpl_vars['row']->value['jobstatus']) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['row']->value['jobstatus']];
} else { ?>请选择求职状态<?php }?>" class="yun_resume_popup_chose_box_text">
             <input type="hidden" id="statusid" name="jobstatus" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['jobstatus'];?>
" />
             <div class="yun_resume_popup_chose_cont" style="display:none" id="job_status">
             <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_jobstatus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
             <a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
', 'status', '<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');" class="yun_resume_popup_chose_cont_a"> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
             <?php } ?>
             </div>
             </div>
            </div>
        </ul>
      </div>
      <div class="yun_resume_popup_bot">
        
        <input type="submit" name="submit" value="<?php if ($_GET['e']) {?>修改<?php } else { ?>保存<?php }?>" onclick="saveexpect();" class="expect_test_bth">
          <a href="javascript:;" onclick="hideMore('expect')" class="expect_test_bth_qx">取消</a>
    
      </div>
    </div> 
     <!--  求职意向弹出框 end-->
     
  <!--  工作经历弹出框-->
    <div id="savework" style="background:#fff;display:none">
      <form  method="post" action="index.php?c=expect&act=saveall" target="tanchukuang" autocomplete="off">
      <div class="yun_resume_popup_box" style="width:100%; max-height: 391px; overflow: auto; overflow-x:hidden ;position: relative; " id="work_div">
        <ul id="addwork">
        <?php if ($_smarty_tpl->tpl_vars['work']->value) {?>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['work']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
          <li class="yun_resume_popup" id="wh<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <?php if ($_smarty_tpl->tpl_vars['resume_row']->value['work']==1) {?><i class="yun_resume_popup_del hidepic showworknum" id="iw<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" onclick="deleteupbox('wh<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','iw<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','showworknum','work')">-</i><?php } else { ?><i class="yun_resume_popup_del showworknum" id="iw<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" onclick="deleteupbox('wh<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','iw<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','showworknum','work')">-</i><?php }?>
            <input type="hidden" class="wh<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <input type="hidden" name="timeid[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <input type="hidden" name="nameid[]" value="n<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <input type="hidden" name="sdateid[]" value="s<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">公司名称：</span>
              <div class="yun_resume_popup_qyname"><input type="text" name="name[]" id="work_name" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" onblur="hidemsg('mworkn<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="yun_resume_popup_text">
                <i class="yun_resume_popup_qyname_tip" id="mworkn<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="display:none">请填写公司名称</i>
                </div>
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">担任职位：</span>
              <input type="text" name="title[]" id="work_title" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
" class="yun_resume_popup_text">
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">工作时间：</span>
            <div class="yun_resume_popup_list_box">
              <input type="text" id="work_sdate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="sdate[]" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['sdate'],'%Y-%m');?>
" onblur="hidemsg('mwork<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','mworks<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="yun_resume_popup_text yun_resume_popup_textw90 worksdate">
             <?php echo '<script'; ?>
>
			    $('#work_sdate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
			  <?php echo '</script'; ?>
>
			  <i class="yun_resume_popup_list_box_tip" id="mworks<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="display:none">请选择开始日期</i>
            </div>
              <span class="yun_resume_popup_time">-</span>
              <div class="yun_resume_popup_list_box">
               <input type="text" id="work_edate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="edate[]" value="<?php if ($_smarty_tpl->tpl_vars['v']->value['edate']) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['edate'],'%Y-%m');
} else { ?>至今<?php }?>" onblur="hidemsg('mwork<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','mworks<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="yun_resume_popup_text yun_resume_popup_textw90 workedate">
               <?php echo '<script'; ?>
>
			    $('#work_edate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
			  <?php echo '</script'; ?>
>
              <i class="yun_resume_popup_list_box_tip" id="mwork<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="display:none">请确认日期先后顺序</i>
               </div>
               <input type="hidden" id="to<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="totoday[]" value="1">
               <input type='checkbox' value='1' onclick="untiltoday('totoday<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','work_edate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','mwork<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','to<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" id='totoday<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
' <?php if ($_smarty_tpl->tpl_vars['v']->value['edate']==0) {?>checked<?php }?> class="yun_resume_popup_checkbox"><label for='totoday'><span class="yun_resume_popup_checkbox_s">至今</span></label>
           </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">工作内容：</span>
              <textarea rows="5" cols="50" name="content[]" id="work_content" class="infor_textarea "><?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
</textarea>
            </div>
          </li>
          <?php } ?>
          <?php } else { ?>
          <li class="yun_resume_popup" id="wh">
            <i class="yun_resume_popup_del hidepic showworknum" id="iwork" onclick="deleteupbox('wh','iwork','showworknum','work')">-</i>
            <input type="hidden" class="wh" name="id[]" value="">
            <input type="hidden" name="timeid[]" value="wh">
            <input type="hidden" name="nameid[]" value="nwh">
            <input type="hidden" name="sdateid[]" value="swh">
            <input type="hidden" class="usedwork" name="usedid[]" value="">
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">公司名称：</span>
            <div class="yun_resume_popup_qyname">
              <input type="text" name="name[]" id="work_name" value="" onblur="hidemsg('mworknwh')" class="yun_resume_popup_text work_name">
               <i class="yun_resume_popup_qyname_tip" id="mworknwh" style="display:none">请填写公司名称</i>
               </div>
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">担任职位：</span>
              <input type="text" name="title[]" id="work_title" value="" class="yun_resume_popup_text work_itle">
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">工作时间：</span>
            <div class="yun_resume_popup_list_box">
              <input type="text" id="work_sdate" name="sdate[]" value="" onblur="hidemsg('mworkwh','mworkswh')" class="yun_resume_popup_text yun_resume_popup_textw90 work_sdate">
             <?php echo '<script'; ?>
>
			    $('#work_sdate').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
			  <?php echo '</script'; ?>
>
			  <i class="yun_resume_popup_list_box_tip" id="mworkswh" style="display:none">请选择开始日期</i>
            </div>
              <span class="yun_resume_popup_time">-</span>
              <div class="yun_resume_popup_list_box">
               <input type="text" id="work_edate" name="edate[]" value="" onblur="hidemsg('mworkwh','mworkswh')" class="yun_resume_popup_text yun_resume_popup_textw90 work_edate">
               <?php echo '<script'; ?>
>
			    $('#work_edate').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
			  <?php echo '</script'; ?>
>
			  <i class="yun_resume_popup_list_box_tip" id="mworkwh" style="display:none">请确认日期先后顺序</i>
               </div>
               <input type="hidden" id="towork" name="totoday[]" value="1">
              <input type='checkbox' value='1' onclick="untiltoday('totoday','work_edate','mworkwh','towork')" id='totoday' class="yun_resume_popup_checkbox"><label for='totoday'><span class="yun_resume_popup_checkbox_s">至今</span></label> </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">工作内容：</span>
              <textarea rows="5" cols="50" name="content[]" id="work_content" class="infor_textarea work_content"></textarea>
            </div>
          </li>
          <?php }?>
        </ul>
        <div class="yun_resume_add_to"><a href="javascript:;" onclick="addWork();">+ 添加工作经历</a></div>
      </div>
      <div class="yun_resume_popup_bot">
        <input name="eid" id="eid" type="hidden" value="<?php echo $_GET['e'];?>
" />
        <input type="hidden" name="table" value="work">
       
        
         <input type="submit" name="submit" value="保存" class="expect_test_bth" >
         <a href="javascript:;" onclick="hideMore('work')" class="expect_test_bth_qx" >取消</a>
      </div>
      </form>
    </div> 
     <!--  工作经历弹出框 end-->
      <!--  教育经历弹出框-->
    <div id="saveedu" style="background:#fff ;display:none">
     <form  method="post" action="index.php?c=expect&act=saveall" target="tanchukuang" autocomplete="off">
      <div class="yun_resume_popup_box" style="width: 100%; max-height: 355px; overflow: auto; overflow-x:hidden ;position: relative; " id="edu_div">
        <ul id="addedu">
       <?php if ($_smarty_tpl->tpl_vars['edu']->value) {?>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['edu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
          <li class="yun_resume_popup" id="eh<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
           <?php if ($_smarty_tpl->tpl_vars['resume_row']->value['edu']==1) {?><i class="yun_resume_popup_del hidepic showedunum" id="ie<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" onclick="deleteupbox('eh<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','ie<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','showedunum','edu')">-</i><?php } else { ?><i class="yun_resume_popup_del showedunum" id="ie<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" onclick="deleteupbox('eh<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','ie<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','showedunum','edu')">-</i><?php }?>
            <input type="hidden" class="eh<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <input type="hidden" name="timeid[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <input type="hidden" name="nameid[]" value="n<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <input type="hidden" name="sdateid[]" value="s<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">学校名称：</span>
               <div class="yun_resume_popup_qyname"><input type="text" name="name[]" id="edu_name" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" onblur="hidemsg('medun<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="yun_resume_popup_text">
              <i class="yun_resume_popup_qyname_tip" id="medun<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="display:none">请填写学校名称</i></div>
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">在校时间：</span>
            <div class="yun_resume_popup_list_box">
              <input type="text" id="edu_sdate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="sdate[]" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['sdate'],'%Y-%m');?>
" onblur="hidemsg('medu<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','medus<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="yun_resume_popup_text yun_resume_popup_textw90">
             <?php echo '<script'; ?>
>
			    $('#edu_sdate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
			  <?php echo '</script'; ?>
>
			  <i class="yun_resume_popup_list_box_tip" id="medus<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="display:none">请选择开始日期</i>
            </div>
              <span class="yun_resume_popup_time">至</span>
              <div class="yun_resume_popup_list_box">
               <input type="text" id="edu_edate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="edate[]" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['edate'],'%Y-%m');?>
" onblur="hidemsg('medu<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','medus<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="yun_resume_popup_text yun_resume_popup_textw90">
               <?php echo '<script'; ?>
>
			    $('#edu_edate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
			  <?php echo '</script'; ?>
>
			  <i class="yun_resume_popup_list_box_tip" id="medu<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="display:none">请确认日期先后顺序</i>
               </div>
             </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">所学专业：</span>
              <input type="text" name="specialty[]" id="edu_specialty" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['specialty'];?>
" class="yun_resume_popup_text">
            </div>
               <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">班级职务：</span>
              <input type="text" name="title[]" id="title" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
" class="yun_resume_popup_text">
            </div>
               <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">学历：</span>
             <div class="yun_resume_popup_chose_box yun_resume_zindex11"> 
             <input type="button" id="educationc<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="educationc" value="<?php if ($_smarty_tpl->tpl_vars['v']->value['education']=='') {?>请选择最高学历<?php } else {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value['education']];
}?>" onclick="search_show('job_educationc<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" class="yun_resume_popup_chose_box_text">
             <input type="hidden" id="educationc<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
id" name="education[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['education'];?>
"/> 
             <div class="yun_resume_popup_chose_cont job_educationc" style="display:none" id="job_educationc<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
             <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
              <a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['data']->value;?>
','educationc<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['data']->value];?>
');" class="yun_resume_popup_chose_cont_a"> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['data']->value];?>
</a>
             <?php } ?>
             </div>
             </div>
            </div>
          </li>
          <?php } ?>
         <?php } else { ?>
          <li class="yun_resume_popup" id="eh">
            <i class="yun_resume_popup_del hidepic showedunum" id="iedu" onclick="deleteupbox('eh','iedu','showedunum','edu')">-</i>
             <input type="hidden" class="eh" name="id[]" value="">
             <input type="hidden" name="timeid[]" value="eh">
             <input type="hidden" name="nameid[]" value="neh">
             <input type="hidden" name="sdateid[]" value="seh">
             <input type="hidden" class="usededu" name="usedid[]" value="">
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">学校名称：</span>
               <div class="yun_resume_popup_qyname"><input type="text" name="name[]" id="edu_name" value="" onblur="hidemsg('meduneh')" class="yun_resume_popup_text">
              <i class="yun_resume_popup_qyname_tip" id="meduneh" style="display:none">请填写学校名称</i></div>
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">在校时间：</span>
            <div class="yun_resume_popup_list_box">
              <input type="text" id="edu_sdate" name="sdate[]" value="" onblur="hidemsg('medueh','meduseh')" class="yun_resume_popup_text yun_resume_popup_textw90">
             <?php echo '<script'; ?>
>
			    $('#edu_sdate').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
			  <?php echo '</script'; ?>
>
			  <i class="yun_resume_popup_list_box_tip" id="meduseh" style="display:none">请选择开始日期</i>
            </div>
              <span class="yun_resume_popup_time">至</span>
              <div class="yun_resume_popup_list_box">
               <input type="text" id="edu_edate" name="edate[]" value="" onblur="hidemsg('medueh','meduseh')" class="yun_resume_popup_text yun_resume_popup_textw90">
               <?php echo '<script'; ?>
>
			    $('#edu_edate').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
			  <?php echo '</script'; ?>
>
			  <i class="yun_resume_popup_list_box_tip" id="medueh" style="display:none">请确认日期先后顺序</i>
               </div>
             </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">所学专业：</span>
              <input type="text" name="specialty[]" id="edu_specialty" value="" class="yun_resume_popup_text">
            </div>
               <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">班级职务：</span>
              <input type="text" name="title[]" id="title" value="" class="yun_resume_popup_text">
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">学历：</span>
             <div class="yun_resume_popup_chose_box"> 
             <input type="button" id="educationc" name="educationc" value="请选择最高学历" onclick="search_show('job_educationc');" class="yun_resume_popup_chose_box_text">
             <input type="hidden" id="educationcid" name="education[]" value=""/> 
             <div class="yun_resume_popup_chose_cont" style="display:none" id="job_educationc">
             <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
              <a href="javascript:;" onclick="selects('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','educationc','<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');" class="yun_resume_popup_chose_cont_a"> <?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a>
             <?php } ?>
             </div>
             </div>
            </div>
          </li> 
         <?php }?>
        </ul>
        <div class="yun_resume_add_to"><a href="javascript:;" onclick="addEdu();">+ 添加教育经历</a></div>
      </div>
      <div class="yun_resume_popup_bot">
        <input name="eid" id="eid" type="hidden" value="<?php echo $_GET['e'];?>
" />
        <input type="hidden" name="table" value="edu">
        <input type="submit" name="submit" value="保存"  class="expect_test_bth" >
        <a href="javascript:;" onclick="hideMore('edu')" class="expect_test_bth_qx">取消</a>
      </div>
      </form>
    </div> 
     <!--  教育经历弹出框 end-->
     <!--  培训经历弹出框-->
    <div id="savetraining" style="background:#fff ;display:none">
    <form  method="post" action="index.php?c=expect&act=saveall" target="tanchukuang" autocomplete="off">
      <div class="yun_resume_popup_box" style="width: 100%; max-height: 389px; overflow: auto; overflow-x:hidden ;position: relative; " id="training_div">
        <ul id="addtraining">
        <?php if ($_smarty_tpl->tpl_vars['training']->value) {?>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['training']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
          <li class="yun_resume_popup" id="th<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
          <?php if ($_smarty_tpl->tpl_vars['resume_row']->value['training']==1) {?><i class="yun_resume_popup_del hidepic showtrainingnum" id="it<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" onclick="deleteupbox('th<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','it<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','showtrainingnum','training')">-</i><?php } else { ?><i class="yun_resume_popup_del showtrainingnum" id="it<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" onclick="deleteupbox('th<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','it<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','showtrainingnum','training')">-</i><?php }?>
            <input type="hidden" class="th<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <input type="hidden" name="timeid[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <input type="hidden" name="nameid[]" value="n<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <input type="hidden" name="sdateid[]" value="s<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">培训中心：</span>
               <div class="yun_resume_popup_qyname"><input type="text" name="name[]" id="training_name" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" onblur="hidemsg('mtrainingn<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="yun_resume_popup_text">
              <i class="yun_resume_popup_qyname_tip" id="mtrainingn<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="display:none">请填写培训中心名称</i></div>
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">培训方向：</span>
              <input type="text" name="title[]" id="training_title" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
" class="yun_resume_popup_text">
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">培训时间：</span>
             <div class="yun_resume_popup_list_box">
              <input type="text" id="training_sdate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="sdate[]" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['sdate'],'%Y-%m');?>
" onblur="hidemsg('mtraining<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','mtrainings<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="yun_resume_popup_text yun_resume_popup_textw90">
             <?php echo '<script'; ?>
>
			    $('#training_sdate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
			  <?php echo '</script'; ?>
>
			  <i class="yun_resume_popup_list_box_tip" id="mtrainings<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="display:none">请选择开始日期</i>
            </div>
              <span class="yun_resume_popup_time">至</span>
              <div class="yun_resume_popup_list_box">
               <input type="text" id="training_edate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="edate[]" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['edate'],'%Y-%m');?>
" onblur="hidemsg('mtraining<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','mtrainings<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="yun_resume_popup_text yun_resume_popup_textw90">
               <?php echo '<script'; ?>
>
			    $('#training_edate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
			  <?php echo '</script'; ?>
>
			  <i class="yun_resume_popup_list_box_tip" id="mtraining<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="display:none">请确认日期先后顺序</i>
               </div>
             </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">培训内容：</span>
              <textarea rows="5" cols="50" name="content[]" id="training_content" class="infor_textarea "><?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
</textarea>
            </div>
          </li>
          <?php } ?>
          <?php } else { ?>
          <li class="yun_resume_popup" id="th">
           <i class="yun_resume_popup_del hidepic showtrainingnum" id="itraining" onclick="deleteupbox('th','itraining','showtrainingnum','training')">-</i>
            <input type="hidden" class="th" name="id[]" value="">
            <input type="hidden" name="timeid[]" value="th">
            <input type="hidden" name="nameid[]" value="nth">
             <input type="hidden" name="sdateid[]" value="sth">
            <input type="hidden" class="usedtraining" name="usedid[]" value="">
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">培训中心：</span>
             <div class="yun_resume_popup_qyname">
              <input type="text" name="name[]" id="training_name" value="" onblur="hidemsg('mtrainingnth')" class="yun_resume_popup_text">
              <i class="yun_resume_popup_qyname_tip" id="mtrainingnth" style="display:none">请填写培训中心名称</i>
              </div>
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">培训方向：</span>
              <input type="text" name="title[]" id="training_title" value="" class="yun_resume_popup_text">
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">培训时间：</span>
             <div class="yun_resume_popup_list_box">
              <input type="text" id="training_sdate" name="sdate[]" value="" onblur="hidemsg('mtrainingth','mtrainingsth')" class="yun_resume_popup_text yun_resume_popup_textw90">
             <?php echo '<script'; ?>
>
			    $('#training_sdate').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
			  <?php echo '</script'; ?>
>
			   <i class="yun_resume_popup_list_box_tip" id="mtrainingsth" style="display:none">请选择开始日期</i>
            </div>
              <span class="yun_resume_popup_time">至</span>
              <div class="yun_resume_popup_list_box">
               <input type="text" id="training_edate" name="edate[]" value="" onblur="hidemsg('mtrainingth','mtrainingsth')" class="yun_resume_popup_text yun_resume_popup_textw90">
               <?php echo '<script'; ?>
>
			    $('#training_edate').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
			  <?php echo '</script'; ?>
>
			  <i class="yun_resume_popup_list_box_tip" id="mtrainingth" style="display:none">请确认日期先后顺序</i>
               </div>
             </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">培训内容：</span>
              <textarea rows="5" cols="50" name="content[]" id="training_content" class="infor_textarea "></textarea>
            </div>
          </li>
          <?php }?>
        </ul>
        <div class="yun_resume_add_to"><a href="javascript:;" onclick="addTraining();">+ 添加培训经历</a></div>
      </div>
      <div class="yun_resume_popup_bot">
        <input name="eid" id="eid" type="hidden" value="<?php echo $_GET['e'];?>
" />
        <input type="hidden" name="table" value="training">
       
        <input type="submit" name="submit" value="保存" class="expect_test_bth" >   
         <a href="javascript:;" onclick="hideMore('training')" class="expect_test_bth_qx">取消</a>
      </div>
      </form>
    </div> 
     <!--  培训经历弹出框 end-->
    <!--  技能弹出框-->
    <div id="saveskill" style="background:#fff ;display:none">
    <form  method="post" action="index.php?c=expect&act=saveall" target="tanchukuang" enctype="multipart/form-data" autocomplete="off">
      <div class="yun_resume_popup_box" style="width: 100%; max-height: 258px; overflow: auto; overflow-x:hidden ;position: relative; " id="skill_div">
        <ul id="addskill">
         <?php if ($_smarty_tpl->tpl_vars['skill']->value) {?>
          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['skill']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
          <li class="yun_resume_popup" id="sh<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
          <?php if ($_smarty_tpl->tpl_vars['resume_row']->value['skill']==1) {?><i class="yun_resume_popup_del hidepic showskillnum" id="is<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" onclick="deleteupbox('sh<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','is<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','showskillnum','skill')">-</i><?php } else { ?><i class="yun_resume_popup_del showskillnum" id="is<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" onclick="deleteupbox('sh<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','is<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','showskillnum','skill')">-</i><?php }?>
            <input type="hidden" class="sh<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <input type="hidden" name="nameid[]" value="n<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <input type="hidden" name="timeid[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">技能名称：</span>
               <div class="yun_resume_popup_qyname"><input type="text" name="name[]" id="skill_name" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" onblur="hidemsg('mskilln<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="yun_resume_popup_text">
              <i class="yun_resume_popup_qyname_tip" id="mskilln<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="display:none">请填写技能名称</i>
            </div></div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">掌握时间：</span>
              <input type="text" name="longtime[]" id="skill_longtime" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['longtime'];?>
" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" class="yun_resume_popup_text yun_resume_popup_text_w80">年
            </div>
           
           <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">上传证书：</span>
	       <div class="yun_resume_popup_upp"><input type="file" title="点击上传证书" name="cert[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'];?>
" style="width:200px;"></div>
             </div>
          </li>
          <?php } ?>
          <?php } else { ?>
          <li class="yun_resume_popup" id="skillhide">
          <i class="yun_resume_popup_del hidepic showskillnum" id="iskill" onclick="deleteupbox('skillhide','iskill','showskillnum','skill')">-</i>
            <input type="hidden" class="skillhide" name="id[]" value="">
            <input type="hidden" name="nameid[]" value="nsh">
            <input type="hidden" name="timeid[]" value="skillhide">
            <input type="hidden" class="usedskill" name="usedid[]" value="">
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">技能名称：</span>
               <div class="yun_resume_popup_qyname"><input type="text" name="name[]" id="skill_name" value="" onblur="hidemsg('mskillnsh')" class="yun_resume_popup_text">
              <i class="yun_resume_popup_qyname_tip" id="mskillnsh" style="display:none">请填写技能名称</i></div>
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">掌握时间：</span>
              <input type="text" name="longtime[]" id="skill_longtime" value="" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" class="yun_resume_popup_text">年
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">上传证书：</span>
	         <div class="yun_resume_popup_upp"><input type="file" title="点击上传证书" name="cert[]" style="width:200px;"></div>
            </div>
          </li>
          <?php }?>
        </ul>
        <div class="yun_resume_add_to"><a href="javascript:;" onclick="addSkill();">+ 添加职业技能</a></div>
      </div>
      <div class="yun_resume_popup_bot">
        <input name="eid" id="eid" type="hidden" value="<?php echo $_GET['e'];?>
" />
        <input type="hidden" name="table" value="skill">
       
        <input type="submit" name="submit" value="保存"  class="expect_test_bth">
         <a href="javascript:;" onclick="hideMore('skill')" class="expect_test_bth_qx">取消</a>
      </div>
      </form>
    </div> 
     <!--  技能历弹出框 end-->
        <!--  项目经历弹出框-->
    <div id="saveproject" style="background:#fff ;display:none">
    <form  method="post" action="index.php?c=expect&act=saveall" target="tanchukuang" autocomplete="off">
      <div class="yun_resume_popup_box" style="width: 100%; max-height: 389px; overflow: auto; overflow-x:hidden ;position: relative; " id="project_div">
        <ul id="addproject">
        <?php if ($_smarty_tpl->tpl_vars['project']->value) {?>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
         <li class="yun_resume_popup" id="ph<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
         <?php if ($_smarty_tpl->tpl_vars['resume_row']->value['project']==1) {?><i class="yun_resume_popup_del hidepic showprojectnum" id="ip<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" onclick="deleteupbox('ph<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','ip<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','showprojectnum','project')">-</i><?php } else { ?><i class="yun_resume_popup_del showprojectnum" id="ip<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" onclick="deleteupbox('ph<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','ip<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','showprojectnum','project')">-</i><?php }?>
          <input type="hidden" class="ph<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"> 
          <input type="hidden" name="nameid[]" value="n<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
          <input type="hidden" name="sdateid[]" value="s<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
          <input type="hidden" name="timeid[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">项目名称：</span>
             <div class="yun_resume_popup_qyname">
              <input type="text" name="name[]" id="project_name" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" onblur="hidemsg('mprojectn<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="yun_resume_popup_text">
              <i class="yun_resume_popup_qyname_tip" id="mprojectn<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="display:none">请填写项目名称</i></div>
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">担任职位：</span>
              <input type="text" name="title[]" id="project_title" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
" class="yun_resume_popup_text">
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">项目时间：</span>
            <div class="yun_resume_popup_list_box">
              <input type="text" id="project_sdate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="sdate[]" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['sdate'],'%Y-%m');?>
" onblur="hidemsg('mproject<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','mprojects<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="yun_resume_popup_text yun_resume_popup_textw90">
             <?php echo '<script'; ?>
>
			    $('#project_sdate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
			  <?php echo '</script'; ?>
>
			  <i class="yun_resume_popup_list_box_tip" id="mprojects<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="display:none">请选择开始日期</i>
            </div>
              <span class="yun_resume_popup_time">至</span>
              <div class="yun_resume_popup_list_box">
               <input type="text" id="project_edate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="edate[]" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['edate'],'%Y-%m');?>
" onblur="hidemsg('mproject<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','mprojects<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="yun_resume_popup_text yun_resume_popup_textw90">
               <?php echo '<script'; ?>
>
			    $('#project_edate<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
			  <?php echo '</script'; ?>
>
			  <i class="yun_resume_popup_list_box_tip" id="mproject<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="display:none">请确认日期先后顺序</i>
               </div>
              </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">项目内容：</span>
              <textarea rows="5" cols="50" name="content[]" id="project_content" class="infor_textarea "><?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
</textarea>
            </div>
          </li>
          <?php } ?>
          <?php } else { ?>
          <li class="yun_resume_popup" id="ph">
          <i class="yun_resume_popup_del hidepic showprojectnum" id="iproject" onclick="deleteupbox('ph','iproject','showprojectnum','project')">-</i>
             <input type="hidden" class="ph" name="id[]" value="">
            <input type="hidden" name="timeid[]" value="ph">
            <input type="hidden" name="nameid[]" value="nph">
             <input type="hidden" name="sdateid[]" value="sph">
            <input type="hidden" class="usedproject" name="usedid[]" value="">
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">项目名称：</span> <div class="yun_resume_popup_qyname">
              <input type="text" name="name[]" id="project_name" value="" onblur="hidemsg('mprojectnph')" class="yun_resume_popup_text">
              <i class="yun_resume_popup_qyname_tip" id="mprojectnph" style="display:none">请填写项目名称</i>
              </div>
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">担任职位：</span>
              <input type="text" name="title[]" id="project_title" value="" class="yun_resume_popup_text">
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">项目时间：</span>
            <div class="yun_resume_popup_list_box">
              <input type="text" id="project_sdate" name="sdate[]" value="" onblur="hidemsg('mprojectph','mprojectsph')" class="yun_resume_popup_text yun_resume_popup_textw90">
             <?php echo '<script'; ?>
>
			    $('#project_sdate').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
			  <?php echo '</script'; ?>
>
			  <i class="yun_resume_popup_list_box_tip" id="mprojectsph" style="display:none">请选择开始日期</i>
            </div>
              <span class="yun_resume_popup_time">至</span>
              <div class="yun_resume_popup_list_box">
               <input type="text" id="project_edate" name="edate[]" value="" onblur="hidemsg('mprojectph','mprojectsph')" class="yun_resume_popup_text yun_resume_popup_textw90">
               <?php echo '<script'; ?>
>
			    $('#project_edate').fdatepicker({format: 'yyyy-mm',startView:4,minView:3});  
			  <?php echo '</script'; ?>
>
			  <i class="yun_resume_popup_list_box_tip" id="mprojectph" style="display:none">请确认日期先后顺序</i>
               </div>
              </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">项目内容：</span>
              <textarea rows="5" cols="50" name="content[]" id="project_content" class="infor_textarea "></textarea>
            </div>
          </li>
          <?php }?>
        </ul>
        <div class="yun_resume_add_to"><a href="javascript:;" onclick="addProject();">+ 添加项目经历</a></div>
      </div>
      <div class="yun_resume_popup_bot">
        <input name="eid" id="eid" type="hidden" value="<?php echo $_GET['e'];?>
" />
        <input type="hidden" name="table" value="project">
      
        <input type="submit" name="submit" value="保存"class="expect_test_bth">
          <a href="javascript:;" onclick="hideMore('project')" class="expect_test_bth_qx">取消</a>
      </div>
      </form>
    </div> 
     <!--  项目经历弹出框 end-->
    <!--  附加信息弹出框-->
    <div id="saveother" style="background:#fff ;display:none">
    <form  method="post" action="index.php?c=expect&act=saveall" target="tanchukuang" autocomplete="off">
      <div class="yun_resume_popup_box" style="width: 100%; max-height: 290px; overflow: auto; overflow-x:hidden ;position: relative; " id="other_div">
        <ul id="addother">
        <?php if ($_smarty_tpl->tpl_vars['other']->value) {?>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['other']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
         <li class="yun_resume_popup" id="oh<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
         <?php if ($_smarty_tpl->tpl_vars['resume_row']->value['cert']==1) {?><i class="yun_resume_popup_del hidepic showothernum" id="io<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" onclick="deleteupbox('oh<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','io<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','showothernum','other')">-</i><?php } else { ?><i class="yun_resume_popup_del showothernum" id="io<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" onclick="deleteupbox('oh<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','io<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','showothernum','other')">-</i><?php }?>
            <input type="hidden" class="oh<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"> 
            <input type="hidden" name="nameid[]" value="n<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <input type="hidden" name="timeid[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">标题：</span>
              <div class="yun_resume_popup_qyname"> <input type="text" name="name[]" id="other_title"value="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" onblur="hidemsg('mothern<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
')" class="yun_resume_popup_text">
              <i class="yun_resume_popup_qyname_tip" id="mothern<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="display:none">请填写标题</i></div>
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">内容：</span>
              <textarea rows="5" cols="50" name="content[]" id="other_content" class="infor_textarea infor_textarea_h80"><?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
</textarea>
            </div>
          </li>
          <?php } ?>
          <?php } else { ?>
          <li class="yun_resume_popup" id="otherhide">
          <i class="yun_resume_popup_del hidepic showothernum" id="iother" onclick="deleteupbox('otherhide','iother','showothernum','other')">-</i>
            <input type="hidden" class="otherhide" name="id[]" value="">
            <input type="hidden" name="nameid[]" value="noh">
            <input type="hidden" name="timeid[]" value="otherhide">
            <input type="hidden" class="usedother" name="usedid[]" value="">
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">标题：</span>
              <div class="yun_resume_popup_qyname"> <input type="text" name="name[]" id="other_title" value="" onblur="hidemsg('mothernoh')" class="yun_resume_popup_text">
              <i class="yun_resume_popup_qyname_tip" id="mothernoh" style="display:none">请填写项目名称</i></div>
            </div>
            <div class="yun_resume_popup_list"><span class="yun_resume_popup_name">内容：</span>
              <textarea rows="5" cols="50" name="content[]" id="other_content" class="infor_textarea infor_textarea_h80"></textarea>
            </div>
          </li>
          <?php }?>
        </ul>
        <div class="yun_resume_add_to"><a href="javascript:;" onclick="addOther();">+ 添加其他信息</a></div>
      </div>
      <div class="yun_resume_popup_bot">
        <input name="eid" id="eid" type="hidden" value="<?php echo $_GET['e'];?>
" />
        <input type="hidden" name="table" value="other">
       
         <input type="submit" name="submit" value="保存" class="expect_test_bth">
          <a href="javascript:;" onclick="hideMore('other')" class="expect_test_bth_qx">取消</a>
      </div>
      </form>
    </div> 
     <!-- 附加信息弹出框 end-->
               
        <!--  自我评价弹出框-->
    <div id="savedescription" style="background:#fff ;display:none">
    <form  method="post" action="index.php?c=expect&act=saveall" target="tanchukuang" onsubmit="return checkdes()" autocomplete="off">
      <div class="yun_resume_popup_box" style="width: 100%;position: relative; ">
                   <div class="resume_pj_my_cont">
       <div class="resume_pj_my_left">自我评价：</div>
             <div class="resume_pj_my_right"> <textarea rows="5" cols="50" name="description" id="check_des" class="resume_pj_my_conttextarea "><?php echo $_smarty_tpl->tpl_vars['resume']->value['description'];?>
</textarea>
             <i class="yun_resume_popup_qyname_tip yun_resume_popup_tip_pj" id="des_show" style="display:none">请填写评价内容</i>
             </div></div>
             <div class="clear"></div>
         <div class="yun_resume_popup_pj">
         
            <div class="yun_resume_popup_pj_sl">
              <div class="eva_ex_tit"><a href="javascript:void(0);" id="opendiv" onclick="opendiv();">不知道怎么写？看看示例</a></div>
                <div class="eva_ex_list" style="display: none;" id="divopen">
                   <div class="eva_ex_list_bx">
                     <span class="eva_ex_list_bx_img"></span>
                     <div class="eva_ex_list_ct">
                       <div class="ct_cs">
                          <span class="ct_cs_tit">示例一：社会岗位</span>
                          <span>6年销售经验，曾获得”最佳销售员工”荣誉，对市场，渠道和经销商管理有丰富的经验。</span>
                       </div>
                       <div class="ct_cs">
                          <span class="ct_cs_tit">示例二：技术岗位</span>
                          <span>A2驾照，5年金杯车驾驶经验，2年出租车经验，熟悉周边路况，安全驶行超过20000公里。</span>
                       </div>
                     </div>
                   </div>
                 </div>
             </div>
             
              </div>
            </div>
            <div class="clear"></div>

         <div class="yun_resume_popup_bot" style="margin-top:25px;">
        <input name="eid" id="eid" type="hidden" value="<?php echo $_GET['e'];?>
" />
        <input type="hidden" name="table" value="description">
       
        <input type="submit" name="submit" value="保存"  class="expect_test_bth">
         <a href="javascript:;" onclick="hideMore('description')" class="expect_test_bth_qx">取消</a>
      </div>
      </form>
    </div> 
     <!-- 自我评价弹出框 end-->
     <iframe id="tanchukuang" name="tanchukuang" onload="resumeFanhui('tanchukuang');" style="display:none"></iframe>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
