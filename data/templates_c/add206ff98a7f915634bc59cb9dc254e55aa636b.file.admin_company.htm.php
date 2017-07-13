<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:19:47
         compiled from "/var/www/html/yunzhaopin/app/template/admin/admin_company.htm" */ ?>
<?php /*%%SmartyHeaderCode:18791192259255033d5c7f7-34860545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'add206ff98a7f915634bc59cb9dc254e55aa636b' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/admin/admin_company.htm',
      1 => 1472265422,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18791192259255033d5c7f7-34860545',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
    'where' => 0,
    'ratingarr' => 0,
    'key' => 0,
    'ratlist' => 0,
    'rows' => 0,
    'v' => 0,
    'moblie_promiss' => 0,
    'email_promiss' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59255033ea0872_43620965',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59255033ea0872_43620965')) {function content_59255033ea0872_43620965($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.searchurl.php';
if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<!--[if IE 6]>
<?php echo '<script'; ?>
 src="./js/png.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
  DD_belatedPNG.fix('.png,.admin_infoboxp_tj,');
<?php echo '</script'; ?>
>
<![endif]-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/admin_public.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/show_pub.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
function changeinput(uid,order){
	$("#"+uid).html("<input type='text'  align=\"middle\" size=\"3\" value='"+order+"' id='input"+uid+"' onBlur=\"changeorder('"+uid+"','"+order+"');\">");
	$("#input"+uid).focus();
}
function audall(){
	var codewebarr="";
	$(".check_all:checked").each(function(){ //由于复选框一般选中的是多个,所以可以循环输出
		if(codewebarr==""){codewebarr=$(this).val();}else{codewebarr=codewebarr+","+$(this).val();}
	});
	if(codewebarr==""){
		parent.layer.msg('您还未选择需要审核的用户！', 2, 8);	return false;
	}else{
		$("input[name=uid]").val(codewebarr);
 		$("#statusbody").val('');
		$("input[name='status']").attr('checked',false);
		$.layer({
			type : 1,
			title :'企业用户审核', 
			closeBtn : [0 , true],
			border : [10 , 0.3 , '#000', true],
			area : ['350px','220px'],
			page : {dom :"#infobox2"}
		});
	}
}
function changeorder(uid,order){
	var norder = $("#input"+uid).val();
	var pytoken = $("#pytoken").val();
	if(order!=norder){
		$.post("index.php?m=admin_company&c=changeorder",{uid:uid,order:norder,pytoken:pytoken},function(data){});

	}
	$("#"+uid).html("<p onClick=\"changeinput('"+uid+"','"+norder+"');\">"+norder+"</p>");
}
$(function(){
	$(".status").click(function(){
  		var uid=$(this).attr("pid");
		var ip=$(this).attr("ip");
		var pytoken=$("#pytoken").val();
		var status=$(this).attr("status");
		$("#status_"+status).attr("checked",true);
		$("input[name=statusip]").val(ip);
		$.post("index.php?m=admin_company&c=lockinfo",{uid:uid,pytoken:pytoken},function(msg){
			$("input[name=uid]").val(uid);
			$("#lock_info").val(msg);
			status_div('锁定用户','420','220');
		});
	});
	$(".user_status").click(function(){
		var uid=$(this).attr("pid");
		var status=$(this).attr("status");
		$("#status"+status).attr("checked",true);
		var pytoken=$("#pytoken").val();
		$("input[name=uid]").val(uid);
 		$.post("index.php?m=admin_company&c=lockinfo",{uid:uid,pytoken:pytoken},function(msg){
			$("#statusbody").val(msg);
			$.layer({
				type : 1,
				title :'企业用户审核', 
				closeBtn : [0 , true],
				border : [10 , 0.3 , '#000', true],
				area : ['350px','220px'],
				page : {dom :"#infobox2"}
			});
		});
	});
	$(".comrating").click(function(){
  		var uid=$(this).attr("data-uid");
		var pytoken=$("#pytoken").val();
		$.post("index.php?m=admin_company&c=getstatis",{uid:uid,pytoken:pytoken},function(data){
			if(data)
			{
				var dataJson = eval("(" + data + ")"); 
				$('#job_num').val(dataJson.job_num);
				$('#down_resume').val(dataJson.down_resume);
				$('#editjob_num').val(dataJson.editjob_num);
				$('#invite_resume').val(dataJson.invite_resume);
				$('#breakjob_num').val(dataJson.breakjob_num);
				$('#part_num').val(dataJson.part_num);
				$('#editpart_num').val(dataJson.editpart_num);
				$('#breakpart_num').val(dataJson.breakpart_num);
				$('#zph_num').val(dataJson.zph_num);
				$('#oldetime').val(dataJson.vip_etime);
				$('#vipetime').text(dataJson.vipetime);
				$('#pay').val(dataJson.pay);
				$('#integral').val(dataJson.integral);
				$('#ratuid').val(uid);
				$("#ratingid").val(dataJson.rating);
				var ratingname = $("#ratingid").find("option:selected").text();
				$('#rating_name').val(ratingname);
				$.layer({
					type : 1,
					title :'企业会员等级修改', 
					closeBtn : [0 , true],
					border : [10 , 0.3 , '#000', true],
					area : ['700px','380px'],
					offset: ['20px', ''],
					page : {dom :"#comrating"}
				});
			}else{
				parent.layer.msg('用户信息获取失败！', 2, 8);	return false;
			}
		});
	});
});
function uprating(id){
	var pytoken=$("#pytoken").val();
	if(id){
		$.post("index.php?m=admin_company&c=getrating",{id:id,pytoken:pytoken},function(data){
			if(data){
				var dataJson = eval("(" + data + ")"); 
				$('#job_num').val(dataJson.job_num);
				$('#down_resume').val(dataJson.resume);
				$('#editjob_num').val(dataJson.editjob_num);
				$('#invite_resume').val(dataJson.interview);
				$('#breakjob_num').val(dataJson.breakjob_num);
				$('#part_num').val(dataJson.part_num);
				$('#editpart_num').val(dataJson.editpart_num);
				$('#breakpart_num').val(dataJson.breakpart_num);
				$('#zph_num').val(dataJson.zph_num);
				$('#vipetime').text(dataJson.vipetime);
				$('#oldetime').val(dataJson.oldetime);
				var ratingname = $("#ratingid").find("option:selected").text();
				$('#rating_name').val(ratingname);
			}
		});
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
		$("input[name=uid]").val(codewebarr);
		add_class('选择导出字段','650','300','#export','');
	}
}
function check_xls(){
	var type="";
	$(".type:checked").each(function(){ //由于复选框一般选中的是多个,所以可以循环输出
		if(type==""){type=$(this).val();}else{type=type+","+$(this).val();}
	});
	if(type==""){
		layer.msg("请选择导出字段！",2,8);return false;
	}
	setTimeout(function(){$('.myform').submit()},0);
	layer.closeAll();
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
	<div style=" margin-top:10px;">
    <div>
      <form action="index.php?m=admin_company&c=xls" target="supportiframe" method="post" id="formstatus" class="myform">
      <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
      <input type="hidden" name="where" value="<?php echo $_smarty_tpl->tpl_vars['where']->value;?>
"><input name="uid" value="0" type="hidden">
			<div class="admin_resume_dc">
           <label><span class="admin_resume_dc_s"> <input type="checkbox" class="type" name="type[]" value="uid"> 企业UID</span></label>
            <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="name"> 企业名称</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="hy"> 从事行业</span></label>
             <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="pr"> 企业性质</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="rating"> 会员等级</span></label>
             <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="provinceid"> 省</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="cityid"> 市</span></label>
            <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="mun"> 规模</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="sdate"> 创办时间</span></label>
              <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="money"> 注册资金</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="address"> 公司地址</span></label>
             <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="zip"> 邮编</span></label>
          <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linkman"> 联系人</span></label>
    		<label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linkjob"> 所属职位</span></label>
			<label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linkqq"> 联系QQ</span></label>
          <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linkphone"> 固定电话</span></label>
		<label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linktel"> 联系手机</span></label>
         <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="linkmail"> 邮件</span></label>
          <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="website"> 网址</span></label>
          <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="rec"> 知名企业</span></label>
			<label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="lastdate"> 更新时间</span></label>
           <label><span class="admin_resume_dc_s"><input type="checkbox" class="type" name="type[]" value="vip_stime">会员开始时间</span></label>
          </div>
        <div class="admin_resume_dc_sub" style="margin-top:10px;">  
          <input type="button" onClick="check_xls();"  value='确认' class="admin_resume_dc_bth1">
      <input type="button" onClick="layer.closeAll();" class="admin_resume_dc_bth2" value='取消'></div>
	
      </form>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['adminstyle']->value)."/member_send_email.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="status_div"  style="display:none; width: 420px;text-align:center; ">
  <div class="" > 
      <form action="index.php?m=admin_company&c=lock" target="supportiframe" method="post" id="formstatus">
        <table cellspacing='1' cellpadding='1' class="admin_examine_table">
          <tr>
             <th width="80">锁定操作：</th>
            <td align="left">
        <div class="admin_examine_right" style="width:330px;">
         <label for="status_1"><span class="admin_examine_table_s"><input type="radio" name="status" value="1" id="status_1" >正常</span></label>
         <label for="status_2"><span class="admin_examine_table_s"><input type="radio" name="status" value="2" id="status_2">锁定</span></label>
         <label for="status_3"><span class="admin_examine_table_s" style="width:130px"><input type="radio" name="status" value="3" id="status_3">锁定并限制IP访问</span></label>
              </div>
              </td>
          </tr>
          <tr>
            <th>锁定说明：</th>
            <td align="left"><textarea id="lock_info"  name="lock_info" class="admin_explain_textarea" style="width:285px"></textarea></td>
          </tr>
          <tr>
           <td colspan='2' align="center">
            <input type="submit"  value='确认' class="admin_examine_bth">
             <input type="button"  onClick="layer.closeAll();" class="admin_examine_bth_qx" value='取消'>
            </td>
          </tr>
        </table>
        <input type="hidden" name="statusip" value="">
		<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
        <input name="uid" value="0" type="hidden">
      </form> 
  </div>
</div>
<div id="comrating"  style="display:none; "> 
<div style="width:700px;"> 
      <form action="index.php?m=admin_company&c=uprating" target="supportiframe" method="post" id="formstatus">
       <table cellspacing='1' cellpadding='1' class="table_form contentWrap">
          <tr>
            <th align="right"><div class="admin_company_width">会员等级：</div></th>
            <td align="left">
            <div class="admin_company_width220">
			<select name="rating" id="ratingid" onchange="uprating(this.value);">
			<?php  $_smarty_tpl->tpl_vars['ratlist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ratlist']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ratingarr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ratlist']->key => $_smarty_tpl->tpl_vars['ratlist']->value) {
$_smarty_tpl->tpl_vars['ratlist']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['ratlist']->key;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['ratlist']->value;?>
</option>
			<?php } ?>
			</select>
            </div>
			</td>
			 <th align="right" class="comp_hotjob_line" ><div class="admin_company_width">账户<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
：</div></th>
			<td> <div class="admin_company_width220"><input type="text" name="integral"  id="integral" size="15" class="admin_company_jobtext" value="" /></div></td>
          </tr>
	<tr class="admin_table_trbg" >
		 <th align="right">会员到期时间：</th>
		<td><p id="vipetime"></p></td>
		<th align="right" class="comp_hotjob_line">延长会员有效期：</th>
		<td><input type="text" name="addday"  style="width:40px;" class="admin_company_jobtext"> 天</td>
	</tr> 
    <tr>
		<th align="right">发布职位数：</th>
		<td><input type="text" name="job_num"  id="job_num" size="15" class="admin_company_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
		<th align="right"class="comp_hotjob_line">剩余下载数：</th>
		<td><input type="text" name="down_resume"  id="down_resume" size="15" class="admin_company_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
	</tr>
	<tr class="admin_table_trbg" >
		<th align="right">修改职位数：</th>
		<td><input type="text" name="editjob_num"  id="editjob_num" size="15" class="admin_company_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
		<th align="right"class="comp_hotjob_line">邀请面试：</th>
		<td><input type="text" name="invite_resume"  id="invite_resume" size="15"class="admin_company_jobtext"onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
	</tr>
    <tr>
		<th align="right">刷新职位数：</th>
		<td><input type="text" name="breakjob_num"  id="breakjob_num" size="15" class="admin_company_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
		<th align="right"class="comp_hotjob_line">发布兼职数：</th>
		<td><input type="text" name="part_num"  id="part_num" size="15"class="admin_company_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
	</tr>
	<tr class="admin_table_trbg" >
		<th align="right">修改兼职数：</th>
		<td><input type="text" name="editpart_num"  id="editpart_num" size="15" class="admin_company_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
		<th align="right"class="comp_hotjob_line">刷新兼职数：</th>
		<td><input type="text" name="breakpart_num"  id="breakpart_num" size="15" class="admin_company_jobtext" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')"/></td>
	</tr>

	<tr> 
		<th style="text-align:center" colspan="4">
	   <input type="submit"  value='确认' class="admin_examine_bth"/>
		  <input type="button"  onClick="layer.closeAll();" class="admin_examine_bth_qx" value='取消' /></th>
	  </tr>
	</table>
	<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
	<input type="hidden" name="rating_name" id="rating_name" value="">
	<input type="hidden" name="oldetime" id="oldetime" value="">
	<input name="ratuid" id="ratuid" value="0" type="hidden">
  </form> 
</div>
</div>
<div id="infobox2"  style="display:none; width: 350px; ">  
      <form action="index.php?m=admin_company&c=status" target="supportiframe" method="post" id="formstatus">
       <table cellspacing='1' cellpadding='1' class="admin_examine_table">
          <tr>
            <th  width="80">审核操作：</th>
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
            <td align="left"><textarea id="statusbody"  name="statusbody" class="admin_explain_textarea"></textarea></td>
          </tr>
          <tr>
            <td colspan='2' align="center">
            <input type="submit"  value='确认' class="admin_examine_bth">
             <input type="button"  onClick="layer.closeAll();" class="admin_examine_bth_qx" value='取消'>
            </td>
          </tr>
        </table>
		<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
        <input name="uid" value="0" type="hidden">
      </form> 
</div>

<div class="infoboxp"> 
<div class="infoboxp_top_bg"></div>
 <form action="index.php" name="myform" method="get" >
<div class="admin_Filter"> 
<input type="hidden" name="m" value="admin_company"/>
<input type="hidden" name="status" value="<?php echo $_GET['status'];?>
"/>
<input type="hidden" name="rec" value="<?php echo $_GET['rec'];?>
"/>
<input type="hidden" name="time" value="<?php echo $_GET['time'];?>
"/>
<input type="hidden" name="rating" value="<?php echo $_GET['rating'];?>
"/>
<span class="complay_top_span fl">公司管理</span>	
  <div class="admin_Filter_span">搜索类型：</div>
  <div class="admin_Filter_text formselect" did="dtype"> 
  <input type="button" <?php if ($_GET['type']=='1'||$_GET['type']=='') {?> value="企业名称" <?php } elseif ($_GET['type']=='2') {?> value="用户名称" <?php } elseif ($_GET['type']=='3') {?> value="联系人" <?php } elseif ($_GET['type']=='4') {?> value="联系电话" <?php } elseif ($_GET['type']=='5') {?> value="用户邮箱" <?php }?> class="admin_Filter_but" id="btype">
  		   <input type="hidden" name="com_type" id="type" value="<?php if ($_GET['type']) {
echo $_GET['type'];
} else { ?>1<?php }?>"/><div class="admin_Filter_text_box" style="display:none" id="dtype">
			  <ul>
				  <li><a href="javascript:void(0)" onClick="formselect('1','type','企业名称')">企业名称</a></li>
				  <li><a href="javascript:void(0)" onClick="formselect('2','type','用户名称')">用户名称</a></li>	
				  <li><a href="javascript:void(0)" onClick="formselect('3','type','联系人')">联系人</a></li>	
				  <li><a href="javascript:void(0)" onClick="formselect('4','type','联系电话')">联系电话</a></li>	
				  <li><a href="javascript:void(0)" onClick="formselect('5','type','用户邮箱')">用户邮箱</a></li>			  
			  </ul>  
		  </div>
    </div>	
    <input type="text" placeholder="输入你要搜索的关键字" name="keyword" class="admin_Filter_search">
	<input type="submit" value="搜索" class="admin_Filter_bth"/>
	  <div class="admin_search_div" ><div class="admin_adv_search"><div class="admin_adv_search_bth">高级搜索</div></div></div>
       <div class="admin_search_div_tianj" > <a href="index.php?m=admin_company&c=add" class="admin_infoboxp_tj">添加会员</a> </div>
  </div> 
  </form> 
 <?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <div class="table-list" style="color:#898989">
    <div class="admin_table_border">
      <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
      <form action="index.php" name="myform" method="get" id='myform' target="supportiframe">
      <input type="hidden" name="pytoken"  id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
        <input name="m" value="admin_company" type="hidden"/>
        <input name="c" value="del" type="hidden"/>
        <table width="100%">
          <thead>
            <tr class="admin_table_top">
              <th style="width:20px;"><label for="chkall"><input type="checkbox" id='chkAll' onclick='CheckAll(this.form)'/> </label></th>
              <th> <?php if ($_GET['t']=="uid"&&$_GET['order']=="asc") {?> <a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'uid','m'=>'admin_company','untype'=>'order,t'),$_smarty_tpl);?>
">用户ID<img src="images/sanj.jpg"/></a> <?php } else { ?> <a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'uid','m'=>'admin_company','untype'=>'order,t'),$_smarty_tpl);?>
">用户ID<img src="images/sanj2.jpg"/></a> <?php }?> </th>
              <th align="left">企业名/用户名</th>
              <th align="left">等级/到期时间</th>
              <th>联系电话/用户邮箱</th>
              <th>联系人</th>
              <th>企业认证</th>
              <th>登录/注册</th>
              <th>来源</th>
              <th>状态</th>
              <th>设为名企</th> 
              <th>添加/重置</th>
              <th class="admin_table_th_bg">操作</th>
            </tr>
          </thead>
          <tbody>
       <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
          <tr align="center" <?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
">
            <td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"  name='del[]' email='<?php echo $_smarty_tpl->tpl_vars['v']->value['linkmail'];?>
' moblie='<?php echo $_smarty_tpl->tpl_vars['v']->value['linktel'];?>
' onclick='unselectall()' class="check_all" rel="del_chk" /></td>
            <td align="left" class="td1" style="text-align:center;"><span><?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
</span></td>
            <td class="ud" align="left">
            <div class="admin_com_name_box"><a href="<?php echo smarty_function_url(array('m'=>'company','c'=>'show','id'=>'`$v.uid`'),$_smarty_tpl);?>
" target="_blank" class="admin_com_name"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a></div>
			<div class=""><a href="index.php?m=admin_company&c=Imitate&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</a></div></td>            
			<td align="left">
				<?php echo $_smarty_tpl->tpl_vars['v']->value['rating_name'];?>
<a data-uid="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" href="javascript:void(0);" class="comrating"><span class="admin_company_xg_icon">[修改]</span></a>
				<?php if ($_smarty_tpl->tpl_vars['v']->value['vip_etime']) {?>
					<div><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['vip_etime'],"%Y-%m-%d");?>
</div>
				<?php }?>
			</td>
            <td align="left"><div style="width:170px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['linktel'];
if ($_smarty_tpl->tpl_vars['v']->value['linktel']&&$_smarty_tpl->tpl_vars['moblie_promiss']->value) {?><a href="javascript:void(0);" class="admin_com_send" onClick="send_moblie('<?php echo $_smarty_tpl->tpl_vars['v']->value['linktel'];?>
');">发信息</a><?php }?></div>
            
            <div style="width:170px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['linkmail'];
if ($_smarty_tpl->tpl_vars['v']->value['linkmail']&&$_smarty_tpl->tpl_vars['email_promiss']->value) {?><a href="javascript:void(0);" class="admin_com_send" onClick="send_email('<?php echo $_smarty_tpl->tpl_vars['v']->value['linkmail'];?>
');">发邮件</a><?php }?></div>
            </td>
            <td><div style="width:60px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['linkman'];?>
</div></td>
            <td>
			   <?php if ($_smarty_tpl->tpl_vars['v']->value['email_status']==1) {?>
			   <img src="../config/ajax_img/1-1.png" alt="邮箱已认证" class="png">
			   <?php } else { ?>
			   <img src="../config/ajax_img/1-2.png" alt="邮箱未认证"class="png"> 
			   <?php }?>

               <?php if ($_smarty_tpl->tpl_vars['v']->value['moblie_status']==1) {?>
			   <img src="../config/ajax_img/2-1.png" alt="手机已认证"class="png">
			   <?php } else { ?>
			   <img src="../config/ajax_img/2-2.png" title="手机未认证"class="png">
			   <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['v']->value['yyzz_status']==1) {?>
			  <img src="../config/ajax_img/3-1.png" alt="营业执照已认证"class="png">
			  <?php } else { ?>
			  <img src="../config/ajax_img/3-2.png" alt="营业执照未认证"class="png">
			  <?php }?>
			 </td>
             <td>
			 <?php if ($_smarty_tpl->tpl_vars['v']->value['login_date']) {?>
				<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['login_date'],"%Y-%m-%d");?>

			 <?php } else { ?>
				尚未登录
			 <?php }?>
			 <div class=""><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['reg_date'],"%Y-%m-%d");?>
</div>
			 </td>
             <td>
				<?php if ($_smarty_tpl->tpl_vars['v']->value['source']=='1') {?>
					网页
				<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['source']=="2") {?>
					手机
				<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['source']=="3") {?>
					App
				<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['source']=="4") {?>
					微信
				<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['source']=="5") {?>
					PC
				<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['source']=="6") {?>
					采集
				<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['source']=="7") {?>
					Excel
				<?php }?>
			</td>
             <td>
				<?php if ($_smarty_tpl->tpl_vars['v']->value['status']=='1') {?>
					<span class="admin_com_Audited">已审核</span>
				<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['status']=='2') {?>
					<span class="admin_com_Lock">已锁定</span>
				<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['status']=='3') {?>
					<span class="admin_com_tg">未通过</span>
				<?php } else { ?>
					<span class="admin_com_noAudited">未审核</span>
				<?php }?>
			</td> 
			 
             <td>
             <div  class="admin_table_w84">
			 <?php if ($_smarty_tpl->tpl_vars['v']->value['hottime']) {?>
				<a href="javascript:void(0);" onClick="showdiv3('<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');" class="admin_cz_sc">修改</a>/<a href="javascript:void(0);" onClick="layer_del('确定要取消该名企？','index.php?m=admin_company&c=delhot&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');" class="admin_cz_sc">取消</a>
			<div class=""><?php if ($_smarty_tpl->tpl_vars['v']->value['hottime']>=time()) {?> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['hottime'],"%Y-%m-%d");
} else { ?> 
				<font color='red'><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['hottime'],"%Y-%m-%d");?>
</font>
				<?php }?> </div> 
			 <?php } else { ?>
			  <a href="javascript:void(0);" onClick="showdiv('<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');" class="admin_cz_sc">设为名企</a>
			 <?php }?>
             </div>
			 </td>
           
            <td><a href="index.php?m=admin_company_job&c=show&uid=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" class="admin_cz_sc">添加职位</a><div class=""><a href="javascript:void(0)" class="admin_com_cz" onClick="resetpw('<?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');">重置密码</a></div></td>
            <td>
            <a href="javascript:void(0);" class="user_status admin_cz_sc" pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" status="<?php echo $_smarty_tpl->tpl_vars['v']->value['status'];?>
">审核</a> | 
            <a href="javascript:void(0);" class="status admin_cz_sc" pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
" status="<?php echo $_smarty_tpl->tpl_vars['v']->value['status'];?>
" ip="<?php echo $_smarty_tpl->tpl_vars['v']->value['reg_ip'];?>
">锁定</a>
            <div class="">
            <a href="index.php?m=admin_company&c=edit&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
&rating=<?php echo $_smarty_tpl->tpl_vars['v']->value['rating'];?>
" class="admin_cz_sc">修改</a> | 
            <a href="javascript:void(0)"  onclick="layer_del('确定要删除？', 'index.php?m=admin_company&c=del&del=<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
');" class="admin_cz_sc">删除</a>
            </div>
            </td>
          </tr>
          <?php } ?>
          <tr style="background:#f1f1f1;">
          <td align="center"><label for="chkall2"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></label></td>
         <td colspan="5" >
         <label for="chkAll2">全选</label>
          <input class="admin_submit4" type="button" name="delsub" value="批量审核" onClick="audall();" />
          <?php if ($_smarty_tpl->tpl_vars['email_promiss']->value) {?> <input class="admin_submit4" type="button" value="发邮件"  onclick="return confirm_email('确定发邮件吗？','email_div')"/><?php }?>
		   <?php if ($_smarty_tpl->tpl_vars['moblie_promiss']->value) {?><input class="admin_submit4" type="button" value="发信息"  onclick="return confirm_email('确定发信息吗？','moblie_div')"/><?php }?>
         <input class="admin_submit4" type="button" name="delsub" value="删除所选" onClick="return really('del[]')" />
         <input class="admin_submit2" type="button" name="delsub" value="导出" onClick="Export();" /> 
         </td>
            <td colspan="11" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
          </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div> 
</body>
</html><?php }} ?>
