<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:16:01
         compiled from "/var/www/html/yunzhaopin/app/template/admin/admin_company_job.htm" */ ?>
<?php /*%%SmartyHeaderCode:136482228259254f5173b649-57693863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8c8e36143e8e4ff25ccc5642efceb8588a62404' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/admin/admin_company_job.htm',
      1 => 1469694478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136482228259254f5173b649-57693863',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
    'where' => 0,
    'industry_index' => 0,
    'v' => 0,
    'industry_name' => 0,
    'job_index' => 0,
    'job_name' => 0,
    'rows' => 0,
    'key' => 0,
    'time' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59254f5187a806_66210314',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59254f5187a806_66210314')) {function content_59254f5187a806_66210314($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.searchurl.php';
if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/check_public.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/admin_public.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
var weburl="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
"
function audall(status){
	var codewebarr="";
	$(".check_all:checked").each(function(){ //由于复选框一般选中的是多个,所以可以循环输出
		if(codewebarr==""){codewebarr=$(this).val();}else{codewebarr=codewebarr+","+$(this).val();}
	});
	if(codewebarr==""){
		parent.layer.msg("您还未选择任何信息！",2,8);return false;
	}else{
		$("input[name=pid]").val(codewebarr);
		$("#alertcontent").val('');
		$("input[name=status]").attr("checked",false);
		add_class('批量审核','350','230','#status_div','');
	}
}
function checkstate(id,state){
	var pytoken = $('#pytoken').val();
	$.post("index.php?m=admin_company_job&c=checkstate",{id:id,state:state,pytoken:pytoken},function(data){
		if(data==1){
			if(state=='1'){
				$('#state'+id).html('<span class="admin_com_noAudited" onclick="checkstate(\''+id+'\',\'2\');">已暂停</span>');
			}else{
				$('#state'+id).html('<span class="admin_com_Audited"  onclick="checkstate(\''+id+'\',\'1\');">发布中</span>');
			}
		}
	});

}
function audall2(status){
	var codewebarr="";
	$(".check_all:checked").each(function(){ //由于复选框一般选中的是多个,所以可以循环输出
		if(codewebarr==""){codewebarr=$(this).val();}else{codewebarr=codewebarr+","+$(this).val();}
	});
	if(codewebarr==""){
		parent.layer.msg("您还未选择任何信息！",2,8);	return false;
	}else{
		$("input[name=jobid]").val(codewebarr);
		add_class('批量延期','270','180','#infobox2','');
	}
}
function audall3(status){
	var codewebarr="";
	$(".check_all:checked").each(function(){ //由于复选框一般选中的是多个,所以可以循环输出
		if(codewebarr==""){codewebarr=$(this).val();}else{codewebarr=codewebarr+","+$(this).val();}
	});
	if(codewebarr==""){
		parent.layer.msg("您还未选择任何信息！",2,8);	return false;
	}else{
		$("input[name=jobid]").val(codewebarr);
		add_class('批量修改职位类别','320','280','#infobox4','');
	}
}
$(function(){
	$(".status").click(function(){
		var id=$(this).attr("pid");
		$("input[name=pid]").val($(this).attr("pid"));
 		var status=$(this).attr("status");
		$("#status"+status).attr("checked",true);
		var pytoken=$("#pytoken").val();
		$.post("index.php?m=admin_company_job&c=lockinfo",{id:id,pytoken:pytoken},function(msg){
			$("#alertcontent").val(msg);
			add_class('职位审核','350','230','#status_div','');
		});
	});
	$(".urgent").click(function(){
		$("input[name=pid]").val($(this).attr("pid"));
		$("input[name=eid]").val($(this).attr("eid"));
		var eurgent=$(this).attr("eurgent"); 
		if($(this).attr("tid")>0){
			$("#surplus_urgent").html($(this).attr("tid")+"天+");
			$("#surplus_urgent").show();
		}
		if(eurgent){
			$(".eurgent").html(eurgent);
			$(".eurgentdiv").show();
			add_class('紧急招聘','290','250','#infobox5','');
		}else{
			add_class('紧急招聘','290','220','#infobox5','');
		} 
	});
	$(".rec").click(function(){
		$("input[name=pid]").val($(this).attr("pid"));
		$("input[name=eid]").val($(this).attr("eid"));
		var edate=$(this).attr("edate"); 
		if($(this).attr("tid")>0){
			$("#surplus_recommend").html($(this).attr("tid")+"天+");
			$("#surplus_recommend").show();
		}
		if(edate){
			$(".edate").html(edate);
			$(".edatediv").show();
			add_class('职位推荐','290','250','#infobox6','');
		}else{
			add_class('职位推荐','290','220','#infobox6','');
		} 
	});
});
function Refresh(){//批量刷新
	var codewebarr="";
	$(".check_all:checked").each(function(){ //由于复选框一般选中的是多个,所以可以循环输出
		if(codewebarr==""){codewebarr=$(this).val();}else{codewebarr=codewebarr+","+$(this).val();}
	});
	if(codewebarr==""){
		parent.layer.msg("请选择要刷新的职位！",2,8);return false;
	}else{
		$.post("index.php?m=admin_company_job&c=refresh",{ids:codewebarr,pytoken:$('#pytoken').val()},function(data){
			parent.layer.msg("刷新成功！",2,9);
		})
	}
}
function recommend(){//批量推荐
	var codearr="";
	$(".check_all:checked").each(function(){ //由于复选框一般选中的是多个,所以可以循环输出
		if(codearr==""){codearr=$(this).val();}else{codearr=codearr+","+$(this).val();}
	});
	if(codearr==""){
	    parent.layer.msg("请选择要推荐的职位！",2,8);return false;
	}else{
	    $("input[name=codearr]").val(codearr);
	    add_class('职位批量推荐','290','220','#infobox6','');
	}
}
function urgent(){//批量紧急
    var codeugent="";
	$(".check_all:checked").each(function(){
	    if(codeugent==''){codeugent=$(this).val();}else{codeugent=codeugent+","+$(this).val();}
	});
	if(codeugent==""){
	    parent.layer.msg("请选择要紧急的职位！",2,8);return false;
	}else{
	    $("input[name=codeugent]").val(codeugent);
		add_class('职位批量紧急','290','220','#infobox5','');
	}
}
function Export(){
	var codewebarr="";
	$(".check_all:checked").each(function(){ //由于复选框一般选中的是多个,所以可以循环输出
		if(codewebarr==""){codewebarr=$(this).val();}else{codewebarr=codewebarr+","+$(this).val();}
	});
	if(codewebarr==""){
		parent.layer.msg('您还未选择需要导出用户！', 2, 8);	return false;
	}else{
		$("input[name=pid]").val(codewebarr);
		add_class('选择导出字段','650','340','#export','');
	}
}
function check_xls(){
	var type="";
	$(".type:checked").each(function(){ //由于复选框一般选中的是多个,所以可以循环输出
		if(type==""){type=$(this).val();}else{type=type+","+$(this).val();}
	});
	if(type==""){
		parent.layer.msg("请选择导出字段！",2,8);return false;
	}
	setTimeout(function(){$('.myform').submit()},0);
	layer.closeAll();
}

function checkmove(){
	if($("#hy").val()==""){
		layer.msg("请选择行业类别！",2,8);return false;
	}
	if($("#job1_son").val()==""){
		layer.msg("请选择职位类别！",2,8);return false;
	}
}
<?php echo '</script'; ?>
>
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" />
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<title>后台管理</title>
</head>
<body class="body_ifm">
<div id="export" style="display:none;">
	<div class="" style=" margin-top:10px; "  >
    <div>
      <form action="index.php?m=admin_company_job&c=xls" target="supportiframe" method="post" id="formstatus" class="myform">
      <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
      <input type="hidden" name="where" value="<?php echo $_smarty_tpl->tpl_vars['where']->value;?>
"><input name="pid" value="0" type="hidden">
			<div class="admin_resume_dc">
            	 <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="id"> 职位ID</span></label>
                 <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="uid"> 企业UID</span></label>
               <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="name"> 职位名称</span></label>
                 <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="hy"> 行业</span></label>
                 <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="job1"> 一级类别</span></label>
                <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="job1_son"> 二级类别</span></label>
               <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="job_post"> 三级类别</span></label>
            <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="provinceid"> 省</span></label>
               <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="cityid"> 市</span></label>
              <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="three_cityid"> 县</span></label>
            <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="salary"> 薪水</span></label>
              <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="type"> 工作性质</span></label>
    		 <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="number"> 招聘人数</span></label>
			 <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="exp"> 工作经验</span></label>
            <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="report"> 到岗时间</span></label>
			 <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="sex"> 性别要求</span></label>
             <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="edu"> 教育程度</span></label>
               <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="marriage"> 婚姻状况</span></label>
               <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="sdate"> 开始日期</span></label>
               <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="edate"> 结束日期</span></label>
				 <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="lastdate"> 更新时间</span></label>
            <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="age"> 年龄要求</span></label>
              <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="lang"> 语言要求</span></label>
               <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="welfare"> 福利待遇</span></label>
               <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="com_name"> 公司名称</span></label>
                <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="pr"> 公司性质</span></label>
                <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="mun"> 企业规模</span></label>
            </div> 
 		   <div class="admin_resume_dc_sub" style="margin-top:10px;">  <input type="button" onClick="check_xls();"  value='确认' class="admin_resume_dc_bth1">
        <input type="button" onClick="layer.closeAll();" class="admin_resume_dc_bth2" value='取消'>
        </div>
      </form>
      </div>
    </div>
  </div>
 <div id="infobox5"  style="display:none;text-align:center;">
		<div class="admin_com_t_box"> 
      <form action="index.php?m=admin_company_job&c=urgent" target="supportiframe" method="post" id="formstatus">
      <input type="hidden" name="pytoken" id="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
	  <input type="hidden" name="codeugent"/>
      
		<div class=" admin_com_smbox_list_pd">
			<span class="admin_com_smbox_span">紧急天数：</span>
			<input class="admin_com_smbox_text" value="" name="addday"  onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')">
			<span class="admin_com_smbox_list_s">天</span>    
		</div>
		<div class="eurgentdiv" style="display:none">
          <span class="admin_com_smbox_span">当前结束日期：</span> 
			<span class="admin_com_smbox_list_s eurgent" style="color:#f60"></span>    
		</div>
		<div class="admin_com_smbox_qx_box"> 如需取消紧急职位请单击 <input type="checkbox" name="s" value="1"> 点击确认即可</div> 
          <div class="clear"></div>
		<div class="admin_com_smbox_opt admin_com_smbox_opt_mt"><input type="submit" onclick="loadlayer();" value='确认' class="admin_examine_bth"><input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx"  value='取消'></div> 
		<input name="pid" value="0" type="hidden">
		<input name="eid" value="0" type="hidden">
      </form>
    </div> 
</div>



<div id="infobox6"  style="display:none;">
	<div class="admin_com_t_box"> 
		  <form action="index.php?m=admin_company_job&c=recommend" target="supportiframe" method="post" id="formstatus">
		  <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
		  <input type="hidden" name="codearr"> 
           
          <div class=" admin_com_smbox_list_pd">
          <span class="admin_com_smbox_span">推荐天数：</span>
			<input class="admin_com_smbox_text" value="" name="addday" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')">
			<span class="admin_com_smbox_list_s">天</span>    
		</div>
		<div class="edatediv" style="display:none">
          <span class="admin_com_smbox_span">当前结束日期：</span> 
			<span class="admin_com_smbox_list_s edate" style="color:#f60"></span>    
		</div>
			<div class="admin_com_smbox_qx_box"> 如需取消推荐职位请单击 <input type="checkbox" name="s" value="1"> 点击确认即可</div>
        <div class="clear"></div>
			<div class="admin_com_smbox_opt admin_com_smbox_opt_mt"><input type="submit" onclick="loadlayer();" value='确认' class="admin_examine_bth"><input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx" value='取消'></div>
			<input name="pid" value="0" type="hidden">
			<input name="eid" value="0" type="hidden">
		  </form> 
	  </div>
      </div>
	
<div id="status_div"  style="display:none; width: 350px; "> 
  <form action="index.php?m=admin_company_job&c=status" target="supportiframe" method="post" id="formstatus" name="myform">
    <table cellspacing='1' cellpadding='1' class="admin_examine_table">
  <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
  <tr>
    <th width="80">审核操作：</th>
      <td align="left">
        <div class="admin_examine_right">
	<label for="status0"><span class="admin_examine_table_s"><input type="radio" name="status" value="0" id="status0" >未审核</span></label>
	<label for="status1"><span class="admin_examine_table_s"><input type="radio" name="status" value="1" id="status1" >已通过</span></label>
	<label for="status3"><span class="admin_examine_table_s"><input type="radio" name="status" value="3" id="status3">未通过</span></label>
    </div>
         </td>
          </tr>
          <tr>
            <th>审核说明：</th>
   <td align="left"><textarea id="alertcontent" name="statusbody"class="admin_explain_textarea"></textarea></td>
   </tr>
     <tr>
       <td colspan='2' align="center">
       <div class="admin_Operating_sub"> 
       <input name="pid" value="0" type="hidden">
       <input type="submit"  value='确认' class="admin_examine_bth"> 
       <input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx" value='取消'>
       </div>
       </td>
   </tr>
    </table>
  </form> 
</div>

<div id="infobox2" style="display:none;">
		<div class="admin_com_t_box"> 
      <form action="index.php?m=admin_company_job&c=ctime" target="supportiframe" method="post" id="formstatus">
      <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
	<div class="admin_com_smbox_list"><span class="admin_com_smbox_span">延长时间：</span>
    <input class="admin_com_smbox_text" value="" name="endtime" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"> <span class="admin_com_smbox_list_s">天</span>    </div>
    <div class="admin_com_smbox_opt"><input type="submit"  value='确认' class="admin_examine_bth"><input type="button"  onClick="layer.closeAll();" class="admin_examine_bth_qx" value='取消'></div>
	
        <input name="jobid" value="0" type="hidden">
      </form> 
  </div>
</div>


<div id="infobox4" style="display:none;">
		<div class="admin_com_t_box_hy"> 
      <form action="index.php?m=admin_company_job&c=saveclass" target="supportiframe" method="post" id="formstatus" onSubmit="return checkmove();">
      <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
		
        <div class="admin_com_select_list"><span class="admin_com_smbox_span">行业类别：</span>
             <div class="admin_com_smbox_select_box">
            <select name="hy" id="hy" class="admin_com_smbox_select"> 
             <option value="">--选择大类--</option>
             <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?> 
             <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</option>
             <?php } ?>
            </select> 
            </div>
            </div>
          <div class="admin_com_select_list">
           <span class="admin_com_smbox_span">职位类别：</span>
           <div class="admin_com_smbox_select_box">
           <select name="job1" id="job1"  class="admin_com_smbox_select job1" lid="job1_son" >
             <option value="">--请选择--</option> 
             <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
             <option value='<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</option>
             <?php } ?> 
             </select>
           <select name="job1_son" id="job1_son" class="admin_com_smbox_select job1" lid="job1_son1" >
            <option value="">--请选择--</option> 
            </select>
            <select name="job_post" id="job1_son1" class="admin_com_smbox_select" >
            <option value="">--请选择--</option>
            </select>
      </div> </div>
 		  <div class="admin_com_smbox_opt admin_com_smbox_opt_mt"><input type="submit"  value='确认' class="admin_examine_bth"> <input type="button" onClick="layer.closeAll();" class="admin_examine_bth_qx" value='取消'>
	
    </div>
        <input name="jobid" value="0" type="hidden">
      </form> 
  </div>
</div> 
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
<div class="admin_Filter"> 
	<span class="complay_top_span fl">职位管理</span> 
	<form action="index.php" name="myform" method="get" >
	<input type="hidden" name="m" value="admin_company_job"/>
	<input type="hidden" name="state" value="<?php echo $_GET['state'];?>
"/>
	<input type="hidden" name="job_type" value="<?php echo $_GET['job_type'];?>
"/>
	<input type="hidden" name="jtype" value="<?php echo $_GET['jtype'];?>
"/>
	<input type="hidden" name="salary" value="<?php echo $_GET['salary'];?>
"/>
   <div class="admin_Filter_span">搜索类型：</div>  
	  <div class="admin_Filter_text formselect"  did='dtype'>
		  <input type="button" value="<?php if ($_GET['type']=='1') {?>公司名称<?php } else { ?>职位名称<?php }?>" class="admin_Filter_but"  id="btype"> 
		  <input type="hidden" id='type' value="<?php echo $_GET['type'];?>
" name='type'>
		  <div class="admin_Filter_text_box" style="display:none" id='dtype'>
			  <ul>
			  <li><a href="javascript:void(0)" onClick="formselect('1','type','公司名称')">公司名称</a></li>
			  <li><a href="javascript:void(0)" onClick="formselect('2','type','职位名称')">职位名称</a></li> 
			  </ul>  
		  </div>
	  </div>
	<input type="text" placeholder="输入你要搜索的关键字" name="keyword" class="admin_Filter_search"><input type="submit" name='news_search' value="搜索" class="admin_Filter_bth"> 
	</form> 
	<span class='admin_search_div'>
		  <div class="admin_adv_search"><div class="admin_adv_search_bth">高级搜索</div></div>  
 	  </span>
  </div>
 <?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
  

  <div class="table-list">
  <div class="admin_table_border">
  <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
    <form action="index.php" name="myform" method="get" id='myform' target="supportiframe">
      <input name="m" value="admin_company_job" type="hidden"/>
      <input name="c" value="del" type="hidden"/>
      <table width="100%">
        <thead>
        		<tr class="admin_table_top">
             <th><label for="chkall"><input type="checkbox" id='chkAll'  onclick='CheckAll(this.form)'/></label></th>
            <?php if ($_GET['t']=="id"&&$_GET['order']=="asc") {?>
            <th><a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'id','m'=>'admin_company_job','untype'=>'order,t'),$_smarty_tpl);?>
">编号<img src="images/sanj.jpg"/></a></th>
            <?php } else { ?>
			<th><a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'id','m'=>'admin_company_job','untype'=>'order,t'),$_smarty_tpl);?>
">编号<img src="images/sanj2.jpg"/></a></th>
            <?php }?>
            <th width="210">职位/公司</th>
            <th>工作性质</th>
            <th>简历数/未查看/已面试数</th>
			<th>发布/更新时间</th>
			<th>到期时间</th>
			<th>浏览量</th>
            <th>来源</th>
            <th>审核状态</th>
            <th>招聘状态</th>

            <th>推荐</th>
            <th>紧急</th>
     <th class="admin_table_th_bg">操作</th>
        </thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <tr align="center"  <?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
          <td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="check_all"  name='del[]' onclick='unselectall()' rel="del_chk" /></td>
          <td class="td1" style="text-align:center;width:50px;"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</span></td>
          <td class="ud" align="left" width="210">
          <a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>'`$v.id`'),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a><br/>
          <a href="<?php echo smarty_function_url(array('m'=>'company','c'=>'show','id'=>'`$v.uid`'),$_smarty_tpl);?>
" target="_blank" class="admin_cz_sc"><?php echo $_smarty_tpl->tpl_vars['v']->value['com_name'];?>
</a>
          </td>
         
		  <td><?php echo $_smarty_tpl->tpl_vars['v']->value['type'];?>
</td>
		  <td class="td" align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['snum'];?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['browseNum'];?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['inviteNum'];?>
</td>
		  <td class="td" align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['sdate'],"%Y-%m-%d");?>
<br/><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['lastupdate'],"%Y-%m-%d");?>
</td>
		   <td class="td" align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['edatetxt'];?>
</td>
	      <td class="td" align="center"><?php echo $_smarty_tpl->tpl_vars['v']->value['jobhits'];?>
</td>
          <td><?php if ($_smarty_tpl->tpl_vars['v']->value['source']==1) {?>网页<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['source']==2) {?>WAP<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['source']==3) {?>APP<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['source']==4) {?>微信<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['source']==5) {?>PC<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['source']=="6") {?>采集<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['source']=="7") {?>Excel<?php }?></td>
          <td><?php if ($_smarty_tpl->tpl_vars['v']->value['edate']<=time()) {?><span class="admin_com_Lock">已过期</span><?php } elseif ($_smarty_tpl->tpl_vars['v']->value['state']==1) {?><span class="admin_com_Audited">已审核</span><?php } elseif ($_smarty_tpl->tpl_vars['v']->value['state']==0) {?><span class="admin_com_noAudited">未审核</span><?php } elseif ($_smarty_tpl->tpl_vars['v']->value['state']==3) {?><span class="admin_com_tg">未通过</span><?php }?></td>
          <td id="state<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['status']==1) {?><span class="admin_com_noAudited" onclick="checkstate('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','2');">已暂停</span><?php } else { ?><span class="admin_com_Audited"  onclick="checkstate('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','1');">发布中</span><?php }?></td>
          
          <td id="rec<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
          <?php if ($_smarty_tpl->tpl_vars['v']->value['rec_time']>$_smarty_tpl->tpl_vars['time']->value) {?>
          <a href="javascript:void(0);" class="rec" pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" tid="<?php echo $_smarty_tpl->tpl_vars['v']->value['rec_day'];?>
"  edate="<?php echo $_smarty_tpl->tpl_vars['v']->value['recdate'];?>
" eid="<?php echo $_smarty_tpl->tpl_vars['v']->value['rec_time'];?>
">
          <img src="../config/ajax_img/doneico.gif" alt="职位推荐剩余<?php echo $_smarty_tpl->tpl_vars['v']->value['rec_day'];?>
天" title="职位推荐剩余<?php echo $_smarty_tpl->tpl_vars['v']->value['rec_day'];?>
天"></a><?php } else { ?>
		  <a href="javascript:void(0);" class="rec" pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" tid="<?php echo $_smarty_tpl->tpl_vars['v']->value['rec_day'];?>
" edate="<?php echo $_smarty_tpl->tpl_vars['v']->value['recdate'];?>
" eid="<?php echo $_smarty_tpl->tpl_vars['v']->value['rec_time'];?>
">
          <img src="../config/ajax_img/errorico.gif" alt="职位推荐剩余<?php echo $_smarty_tpl->tpl_vars['v']->value['rec_day'];?>
天" title="职位推荐剩余<?php echo $_smarty_tpl->tpl_vars['v']->value['rec_day'];?>
天"></a><?php }?>          
          </td>
          <td id="urgent<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
          <?php if ($_smarty_tpl->tpl_vars['v']->value['urgent_time']>$_smarty_tpl->tpl_vars['time']->value) {?>
          <a href="javascript:void(0);" class="urgent" pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" tid="<?php echo $_smarty_tpl->tpl_vars['v']->value['urgent_day'];?>
" eurgent="<?php echo $_smarty_tpl->tpl_vars['v']->value['eurgent'];?>
" eid="<?php echo $_smarty_tpl->tpl_vars['v']->value['urgent_time'];?>
"><img src="../config/ajax_img/doneico.gif" alt="紧急招聘剩余<?php echo $_smarty_tpl->tpl_vars['v']->value['urgent_day'];?>
天" title="紧急招聘剩余<?php echo $_smarty_tpl->tpl_vars['v']->value['urgent_day'];?>
天"></a>
          <?php } else { ?>
          <a href="javascript:void(0);" class="urgent" pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" tid="<?php echo $_smarty_tpl->tpl_vars['v']->value['urgent_day'];?>
" eurgent="<?php echo $_smarty_tpl->tpl_vars['v']->value['eurgent'];?>
" eid="<?php echo $_smarty_tpl->tpl_vars['v']->value['urgent_time'];?>
"><img src="../config/ajax_img/errorico.gif" alt="紧急招聘剩余<?php echo $_smarty_tpl->tpl_vars['v']->value['urgent_day'];?>
天" title="紧急招聘剩余<?php echo $_smarty_tpl->tpl_vars['v']->value['urgent_day'];?>
天"></a>
          <?php }?>
          </td>
          <td><a href="javascript:;" class="status admin_cz_sc" pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" status='<?php echo $_smarty_tpl->tpl_vars['v']->value['state'];?>
'>审核</a> | <a href="index.php?m=admin_company_job&c=matching&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="admin_cz_sc">匹配</a><br/><a href="index.php?m=admin_company_job&c=show&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="admin_cz_sc">修改</a> | <a href="javascript:void(0)" onClick="layer_del('确定要删除？', 'index.php?m=admin_company_job&c=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" class="admin_cz_sc">删除</a></td>
        </tr>
        <?php } ?>
        <tr style="background:#f1f1f1;">
        <td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
        <td colspan="5" >
        <label for="chkAll2">全选</label>
            <input class="admin_submit2" type="button" name="delsub" value="审核" onClick="audall('1');" />
            <input class="admin_submit2" type="button" name="delsub" value="延期" onClick="audall2('0');" />
            <input class="admin_submit2" type="button" name="delsub" value="刷新" onClick="Refresh();" />
			<input class="admin_submit2" type="button" name="delsub" value="推荐" onClick="recommend();" />
			<input class="admin_submit2" type="button" name="delsub" value="紧急" onClick="urgent();" />
            <input class="admin_submit2" type="button" name="delsub" value="导出" onClick="Export();" />
            <input class="admin_submit4" type="button" name="delsub" value="转移类别" onClick="audall3('0');" />
            <input class="admin_submit2" type="button" name="delsub" value="删除" onClick="return really('del[]')" /></td>
          <td colspan="9" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
        </tr>
          </tbody>
      </table>
	  <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
    </form>
  </div>
</div>
</div>
</body>
</html><?php }} ?>
