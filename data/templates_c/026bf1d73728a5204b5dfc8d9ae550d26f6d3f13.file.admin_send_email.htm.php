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
<title>��̨����</title>
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
		parent.layer.msg('��ѡ���������ͣ�', 2, 8);return false;
	}
	if(emailday==''){
		parent.layer.msg('����дʱ�䣡', 2, 8);return false;
	} 
	sendemail(type,emailtype,emailday,1,0,'���ڷ��͡���');
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
	}else if(msg=='���ͳɹ���'){
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
			//ѡ�еĲ���
			count++; 
		}
	} 
    if( count == 0 ){
		parent.layer.msg("��ѡ���û����ͣ�",2,8);return false; 
    }
	if($("#CheckboxGroup1_3").attr("checked")=='checked'){
		var email=$("input[name='email_user']").val();
		if(email==''){
			parent.layer.msg("�������Զ������䣡",2,8);return false;
		}
	}
	var title=$("input[name='email_title']").val();
	if(title==''){
		parent.layer.msg("�������ʼ����⣡",2,8);return false;
	}
	var content=editor.text();
	if(content==''){
		parent.layer.msg("�������ʼ����ݣ�",2,8);return false;
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
<div class="admin_Prompt_span">ע����������ʼ�ʱ������ȷѡ���û����͡�</div><div class="admin_Prompt_close"></div>
</div>
<div class="infoboxp_top">
	<div class="report_uaer_list">
	<span class="infoboxp_top_span">�ƹ�Ӫ��</span>
		<a <?php if ($_GET['c']=='') {?>class="report_uaer_list_on"<?php }?> href="index.php?m=email">�Զ����ʼ�</a>
		<a <?php if ($_GET['c']=='msg') {?>class="report_uaer_list_on"<?php }?> href="index.php?m=email&c=msg">�Զ������</a> 
	</div>
</div>
<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe> 

<form name="myform" action="index.php?m=email&c=send" method="post" target="supportiframe" onsubmit="return chsendemail();">
	<table width="100%" class="table_form table_form_bg">
        <tr>
        <th width="120">ѡ���û�</th>
        <td>
           <div class="admin_td_h">
          <input type="checkbox" name="all[]" value="1" id="CheckboxGroup1_0"><label for="CheckboxGroup1_0">�����û�</label>&nbsp;
          <input type="checkbox" name="all[]" value="2" id="CheckboxGroup1_1"><label for="CheckboxGroup1_1">��ҵ�û�</label>&nbsp;
          <input type="checkbox" name="all[]" value="3" id="CheckboxGroup1_3"><label for="CheckboxGroup1_3">�Զ����û�</label>&nbsp;&nbsp;&nbsp;
         
          <span class="admin_web_tip">ע��ȫ���û����ͣ�ʱ��ϳ��������������</span> </div>
      </td>
      </tr> 
		<tr  id="user_email" style="display:none;">
			<th width="120">�û�����</th>
			<td>
      <input class="input-text" type="text" name="email_user" size="50"/><span class="admin_web_tip">�����������,(���)����</span>
      </td></tr>
		<tr class="admin_table_trbg">
			<th width="120">�ʼ�����</th>
			<td><input class="input-text" type="text" name="email_title" size="40"/><font color="gray"></font>
			</td>
		</tr>
		<tr>
			<th width="120">�ʼ�����</th>
			<td>
           <textarea id="content" name="content" cols="100" rows="8" style="width:800px;height:300px;"></textarea></td>
		</tr>
		<tr>
			<td align="center" colspan="2">
            <input class="admin_submit4" type="submit" name="email_send" value="&nbsp;�� ��&nbsp;"  />
     		<input class="admin_submit4" type="reset" name="reset" value="&nbsp;�� �� &nbsp;" />
     		</td>
		</tr>
	</table>
	<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
</form>
<?php if ($_GET['type']=='com') {?> 
	<table width="100%" class="table_form table_form_bg">
         <tr>
        <th width="120">��������</th>
        <td>
                 <div class="admin_td_h"> <input type="radio" name="emailtype" checked value="1" id="emailtype_1">&nbsp;<label for="emailtype_1">δ��¼</label>&nbsp;&nbsp;&nbsp;
          <input type="radio" name="emailtype" value="2" id="emailtype_2">&nbsp;<label for="emailtype_2">��Ա����</label>&nbsp;&nbsp;&nbsp;  </div>
      </td>
	   <tr>
        <th width="120">ʱ��</th>
        <td>
          <input type="text" name="emailday" value='7' class="input-text" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"> <span class="admin_web_tip">��ʾ��������7���ʾ7����Ϊ��¼�û���</span>
      </td>
      </tr> 
      </tr> 
		<tr>
			<td align="center" colspan="2">
            <input class="admin_submit4" type="button" onclick="forsendemail('com')" name="email_send" value="&nbsp;�� ��&nbsp;"  />
     		<input class="admin_submit4" type="reset" name="reset" value="&nbsp;�� �� &nbsp;" />
     		</td>
		</tr>
	</table>
	<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"> 

<?php } elseif ($_GET['type']=='user') {?> 
	<table width="100%" class="table_form table_form_bg">
        <tr>
        <th width="120">��������</th>
        <td>
                 <div class="admin_td_h"> <input type="radio" name="emailtype" value="1" checked id="emailtype_1">&nbsp;<label for="emailtype_1">δ��¼</label>&nbsp;&nbsp;&nbsp;
          <input type="radio" name="emailtype" value="2" id="emailtype_2">&nbsp;<label for="emailtype_2">δ���¼���</label>&nbsp;&nbsp;&nbsp; </div>
      </td>
	   <tr>
        <th width="120">ʱ��</th>
        <td>
          <input type="text" name="emailday"  value='7' class="input-text" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"> <span class="admin_web_tip">��ʾ��������7���ʾ7����Ϊ��¼�û���</span>
      </td>
      </tr>   
		<tr>
			<td align="center" colspan="2">
            <input class="admin_submit4" type="button" onclick="forsendemail('user')"  name="email_send" value="&nbsp;�� ��&nbsp;"  />
     		<input class="admin_submit4" type="reset" name="reset" value="&nbsp;�� �� &nbsp;" />
     		</td>
		</tr>
	</table>
	<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
"> 

<?php }?>
</div>

</body>
</html><?php }} ?>