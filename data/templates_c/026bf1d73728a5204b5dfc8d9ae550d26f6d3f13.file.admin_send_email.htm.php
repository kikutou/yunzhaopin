<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-07 12:01:09
         compiled from "/var/www/html/yunzhaopin/app/template/admin/admin_send_email.htm" */ ?>
<?php /*%%SmartyHeaderCode:240851348595f07853246c3-84451225%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '026bf1d73728a5204b5dfc8d9ae550d26f6d3f13' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/admin/admin_send_email.htm',
      1 => 1469783560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '240851348595f07853246c3-84451225',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_595f0785359fd5_95625805',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595f0785359fd5_95625805')) {function content_595f0785359fd5_95625805($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" /> 
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 charset="utf-8" src="../js/kindeditor/kindeditor-min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 charset="utf-8" src="../js/kindeditor/lang/zh_CN.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="js/admin_public.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="javascript">
	KindEditor.ready(function(K) {
		editor=K.create('#content', {
		 themeType : 'default',
		 afterBlur: function(){this.sync();}
	 	});
	});
<?php echo '</script'; ?>
>
<title>后台管理</title>
</head>
<body class="body_ifm">
<?php echo '<script'; ?>
>
$(document).ready(function(){
	$("input[name='emailtpl']").click(function(){
		var val=$(this).val();
		if(val=='1'){
			$(".emailtpl").hide();
		}else{
			$(".emailtpl").show();
		}
	})
	$("#CheckboxGroup1_3").click(function(){
		$("#user_email").toggle();
		$("input[name=email_user]").val('');
	}) 
})
function forsendemail(type){
	var emailtype=$("input[name='emailtype']:checked").val();
	var emailday=$("input[name='emailday']").val();
	if(emailtype==''){
		parent.layer.msg('请选择提醒类型！', 2, 8);return false;
	}
	if(emailday==''){
		parent.layer.msg('请填写时间！', 2, 8);return false;
	} 
	sendemail(type,emailtype,emailday,1,0,'正在发送……');
}
function sendemail(type,emailtype,emailday,stype,page,msg){
	if(stype=='1'){
		var ii = parent.layer.load(msg,0);
		var pytoken=$("input[name='pytoken']").val();
		if(type=='com'){
			var url='index.php?m=email&c=sendcom';
		}else{
			var url='index.php?m=email&c=senduser';
		}
		$.post(url,{emailtype,emailday,pytoken:pytoken,page:page},function(data){
			var data=eval('('+data+')');
			sendemail(type,emailtype,emailday,data.stype,data.page,data.msg);
		})
	}else if(msg=='发送成功！'){
		parent.layer.close(ii);
		parent.layer.alert(msg,9);
	}else{
		parent.layer.close(ii);
		parent.layer.alert(msg,8);
	}	
} 
function chsendemail(){
	var count = 0;
    var checkArry = document.getElementsByName("all[]");
	for (var i = 0; i < checkArry.length; i++) { 
		if(checkArry[i].checked == true){
			//选中的操作
			count++; 
		}
	} 
    if( count == 0 ){
		parent.layer.msg("请选择用户类型！",2,8);return false; 
    }
	if($("#CheckboxGroup1_3").attr("checked")=='checked'){
		var email=$("input[name='email_user']").val();
		if(email==''){
			parent.layer.msg("请输入自定义邮箱！",2,8);return false;
		}
	}
	var title=$("input[name='email_title']").val();
	if(title==''){
		parent.layer.msg("请输入邮件主题！",2,8);return false;
	}
	var content=editor.text();
	if(content==''){
		parent.layer.msg("请输入邮件内容！",2,8);return false;
	}
	loadlayer();
}
<?php echo '</script'; ?>
>
<style>
.emailtpl{display:none}
</style>
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
<div class="admin_Prompt">
<div class="admin_Prompt_span">注意事项：发送邮件时，请正确选择用户类型。</div><div class="admin_Prompt_close"></div>
</div>
<div class="infoboxp_top">
	<div class="report_uaer_list">
	<span class="infoboxp_top_span">推广营销</span>
		<a <?php if ($_GET['c']=='') {?>class="report_uaer_list_on"<?php }?> href="index.php?m=email">自定义邮件</a>
		<a <?php if ($_GET['c']=='msg') {?>class="report_uaer_list_on"<?php }?> href="index.php?m=email&c=msg">自定义短信</a> 
	</div>
</div>
<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe> 

<form name="myform" action="index.php?m=email&c=send" method="post" target="supportiframe" onsubmit="return chsendemail();">
	<table width="100%" class="table_form table_form_bg">
        <tr>
        <th width="120">选择用户</th>
        <td>
           <div class="admin_td_h">
          <input type="checkbox" name="all[]" value="1" id="CheckboxGroup1_0"><label for="CheckboxGroup1_0">个人用户</label>&nbsp;
          <input type="checkbox" name="all[]" value="2" id="CheckboxGroup1_1"><label for="CheckboxGroup1_1">企业用户</label>&nbsp;
          <input type="checkbox" name="all[]" value="3" id="CheckboxGroup1_3"><label for="CheckboxGroup1_3">自定义用户</label>&nbsp;&nbsp;&nbsp;
         
          <span class="admin_web_tip">注：全部用户发送，时间较长，建议分批发送</span> </div>
      </td>
      </tr> 
		<tr  id="user_email" style="display:none;">
			<th width="120">用户邮箱</th>
			<td>
      <input class="input-text" type="text" name="email_user" size="50"/><span class="admin_web_tip">多个邮箱请用,(半角)隔开</span>
      </td></tr>
		<tr class="admin_table_trbg">
			<th width="120">邮件主题</th>
			<td><input class="input-text" type="text" name="email_title" size="40"/><font color="gray"></font>
			</td>
		</tr>
		<tr>
			<th width="120">邮件内容</th>
			<td>
           <textarea id="content" name="content" cols="100" rows="8" style="width:800px;height:300px;"></textarea></td>
		</tr>
		<tr>
			<td align="center" colspan="2">
            <input class="admin_submit4" type="submit" name="email_send" value="&nbsp;发 送&nbsp;"  />
     		<input class="admin_submit4" type="reset" name="reset" value="&nbsp;重 置 &nbsp;" />
     		</td>
		</tr>
	</table>
	<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
</form>
<?php if ($_GET['type']=='com') {?> 
	<table width="100%" class="table_form table_form_bg">
         <tr>
        <th width="120">提醒类型</th>
        <td>
                 <div class="admin_td_h"> <input type="radio" name="emailtype" checked value="1" id="emailtype_1">&nbsp;<label for="emailtype_1">未登录</label>&nbsp;&nbsp;&nbsp;
          <input type="radio" name="emailtype" value="2" id="emailtype_2">&nbsp;<label for="emailtype_2">会员到期</label>&nbsp;&nbsp;&nbsp;  </div>
      </td>
	   <tr>
        <th width="120">时间</th>
        <td>
          <input type="text" name="emailday" value='7' class="input-text" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"> <span class="admin_web_tip">提示：如输入7则表示7天内为登录用户。</span>
      </td>
      </tr> 
      </tr> 
		<tr>
			<td align="center" colspan="2">
            <input class="admin_submit4" type="button" onclick="forsendemail('com')" name="email_send" value="&nbsp;发 送&nbsp;"  />
     		<input class="admin_submit4" type="reset" name="reset" value="&nbsp;重 置 &nbsp;" />
     		</td>
		</tr>
	</table>
	<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"> 

<?php } elseif ($_GET['type']=='user') {?> 
	<table width="100%" class="table_form table_form_bg">
        <tr>
        <th width="120">提醒类型</th>
        <td>
                 <div class="admin_td_h"> <input type="radio" name="emailtype" value="1" checked id="emailtype_1">&nbsp;<label for="emailtype_1">未登录</label>&nbsp;&nbsp;&nbsp;
          <input type="radio" name="emailtype" value="2" id="emailtype_2">&nbsp;<label for="emailtype_2">未更新简历</label>&nbsp;&nbsp;&nbsp; </div>
      </td>
	   <tr>
        <th width="120">时间</th>
        <td>
          <input type="text" name="emailday"  value='7' class="input-text" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"> <span class="admin_web_tip">提示：如输入7则表示7天内为登录用户。</span>
      </td>
      </tr>   
		<tr>
			<td align="center" colspan="2">
            <input class="admin_submit4" type="button" onclick="forsendemail('user')"  name="email_send" value="&nbsp;发 送&nbsp;"  />
     		<input class="admin_submit4" type="reset" name="reset" value="&nbsp;重 置 &nbsp;" />
     		</td>
		</tr>
	</table>
	<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"> 

<?php }?>
</div>

</body>
</html><?php }} ?>
