<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:20:15
         compiled from "/var/www/html/yunzhaopin/app/template/admin/admin_zhaopinhui_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:21280795595925504f9a7502-60556141%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b5d7eb36c170dcfe554cbba8e61bb4be5e90801' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/admin/admin_zhaopinhui_add.htm',
      1 => 1469783560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21280795595925504f9a7502-60556141',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'linkrow' => 0,
    'domainname' => 0,
    'domainnum' => 0,
    'pytoken' => 0,
    'ieheight' => 0,
    'domain' => 0,
    'list' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5925504fa14413_55419621',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5925504fa14413_55419621')) {function content_5925504fa14413_55419621($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" /> 
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/admin_public.js" language="javascript"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
>var weburl = '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
';<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
> 
function checkform(myform){
	if(myform.title.value=="") { 
      	parent.layer.msg('请填写招聘会标题！', 2, 8);
      	return (false);
      }		
	var start = $("#starttime").val();	
	var end = $("#endtime").val();
	if(start==""||end==""){
		parent.layer.msg('开始时间、结束时间不能为空！', 2, 8);
		return false
	}else{
		var st=toDate(start);
		var ed=toDate(end);
		if(st>ed){
			parent.layer.msg('开始时间不得大于结束时间', 2, 8); 
			return false
		}
	}
}

function check_zhanwei(){
	var chk_value =[];    
	$('input[name="zhanwei"]:checked').each(function(){
		chk_value.push($(this).val());   
	}); 
	$("#reserved").val(chk_value);  
	layer.closeAll();
}
function news_preview(url){
	$(".job_box_div").html("<img src='"+url+"' style='max-width:500px' />");//
 	$.layer({
		type : 1,
		title : '查看图片',
		closeBtn : [0 , true],
		offset : ['20%' , '30%'],
		border : [10 , 0.3 , '#000', true],
		area : ['560px','auto'],
		page : {dom : '#news_preview'}
	}); 
}
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 charset="utf-8" src="../js/kindeditor/kindeditor-min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 charset="utf-8" src="../js/kindeditor/lang/zh_CN.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="javascript">
<!--
KindEditor.ready(function(K) {
	K.create('#content', {
		themeType : 'default',
		items:['source', '|', 'fullscreen', 'undo', 'redo',  'cut', 'copy', 'paste','plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'selectall', '-','title', 'fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold','italic', 'underline', 'strikethrough', 'removeformat', 'image','multiimage','advtable', 'hr', 'link', 'unlink']
	});
	K.create('#booth', {
		themeType : 'default',
		items:['source', '|', 'fullscreen', 'undo', 'redo',  'cut', 'copy', 'paste','plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'selectall', '-','title', 'fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold','italic', 'underline', 'strikethrough', 'removeformat', 'image','multiimage','advtable', 'hr', 'link', 'unlink']
	});
	K.create('#media', {
		themeType : 'default',
		items:['source', '|', 'fullscreen', 'undo', 'redo',  'cut', 'copy', 'paste','plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'selectall', '-','title', 'fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold','italic', 'underline', 'strikethrough', 'removeformat', 'image','multiimage','advtable', 'hr', 'link', 'unlink']
	});
	K.create('#packages', {
		themeType : 'default',
		items:['source', '|', 'fullscreen', 'undo', 'redo',  'cut', 'copy', 'paste','plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'selectall', '-','title', 'fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold','italic', 'underline', 'strikethrough', 'removeformat', 'image','multiimage','advtable', 'hr', 'link', 'unlink']
	});
	K.create('#participate', {
		themeType : 'default',
		items:['source', '|', 'fullscreen', 'undo', 'redo',  'cut', 'copy', 'paste','plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'selectall', '-','title', 'fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold','italic', 'underline', 'strikethrough', 'removeformat', 'image','multiimage','advtable', 'hr', 'link', 'unlink']
	});
	
	var editor = K.editor({
		allowFileManager : false
	}); 
	K.create('#content', {
		themeType : 'default'
		
	});
});	
//-->
<?php echo '</script'; ?>
>
<style>
* {margin: 0 ;padding: 0;}
body,div{ margin: 0 ;padding: 0;}
</style>
<title>后台管理</title>
</head>
<body class="body_ifm">
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
<div class="infoboxp_top">
<span class="admin_title_span">添加招聘会</span>
</div>
<div class="admin_table_border">
<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe> 
<form name="myform" target="supportiframe" action="index.php?m=zhaopinhui&c=save" method="post" onSubmit="return checkform(this);">
<table width="100%" class="table_form" style="background:#fff;">
	<tr>
		<th width="120">招聘会标题：</th>
		<td><input class="input-text" type="text" name="title" size="40" value="<?php echo $_smarty_tpl->tpl_vars['linkrow']->value['title'];?>
" style="width:400px;"/></td>
	</tr>
   
    <tr>
        <th>使用范围：</th>
        <td><input type="button" value="<?php if ($_smarty_tpl->tpl_vars['domainname']->value!='') {
echo $_smarty_tpl->tpl_vars['domainname']->value;
} else { ?>全站<?php }?>" class="city_news_but" onClick="domain_show('<?php echo $_smarty_tpl->tpl_vars['domainnum']->value;?>
');">
        <input id="did" type="hidden" name="did" value="<?php echo $_smarty_tpl->tpl_vars['linkrow']->value['did'];?>
" />
        </td>
      </tr> 
	<tr  class="admin_table_trbg">
		<th width="120">举办时间：</th>
		<td>开始：
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/css/font-awesome.min.css" type="text/css">  
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/foundation-datepicker.min.js"><?php echo '</script'; ?>
>
        <input id="starttime" class="input-text" type="text" readonly size="20" value="<?php echo $_smarty_tpl->tpl_vars['linkrow']->value['starttime'];?>
" name="starttime"> 
          结束：
        <input id="endtime" class="input-text" type="text" readonly size="20" value="<?php echo $_smarty_tpl->tpl_vars['linkrow']->value['endtime'];?>
" name="endtime">
        <?php echo '<script'; ?>
 type="text/javascript">
		var checkin = $('#starttime').fdatepicker({
			format: 'yyyy-mm-dd hh:ii',startView:4,minView:0 
		}).on('changeDate', function (ev) {
			if (ev.date.valueOf() > checkout.date.valueOf()) {
				var newDate = new Date(ev.date)
				newDate.setDate(newDate.getDate() + 1);
				checkout.update(newDate);
			}
		}).data('datepicker');
		var checkout = $('#endtime').fdatepicker({
			format: 'yyyy-mm-dd hh:ii',startView:4,minView:0,
			onRender: function (date) {
				return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
			}
		}).data('datepicker');  
        <?php echo '</script'; ?>
></td>
	</tr>
    <tr>
		<th width="120">举办会场：</th>
		<td><input class="input-text" type="text" name="address" size="60" value="<?php echo $_smarty_tpl->tpl_vars['linkrow']->value['address'];?>
" /></td>
	</tr>
 	<tr  class="admin_table_trbg">
		<th width="120">交通路线：</th>
		<td><textarea  type="text" name="traffic" cols="55" rows="3" style="border:1px solid #ddd"><?php echo $_smarty_tpl->tpl_vars['linkrow']->value['traffic'];?>
</textarea></td>
	</tr>
    <tr>
		<th width="120">联系电话：</th>
		<td><input class="input-text" type="text" name="phone" size="30" value="<?php echo $_smarty_tpl->tpl_vars['linkrow']->value['phone'];?>
" 
			onkeyup="this.value=this.value.replace(/[^0-9-]/g,'')"/></td>
	</tr>
   	<tr  class="admin_table_trbg">
		<th width="120">主办方：</th>
		<td><input class="input-text" type="text" name="organizers" size="30" value="<?php echo $_smarty_tpl->tpl_vars['linkrow']->value['organizers'];?>
" /></td>
	</tr>
    <tr>
		<th width="120">联系人：</th>
		<td><input class="input-text" type="text" name="user" size="30" value="<?php echo $_smarty_tpl->tpl_vars['linkrow']->value['user'];?>
" /></td>
	</tr>
        
    <tr>
		<th width="120">招聘会介绍：</th>
		<td><textarea  id="content" name="body" cols="100" rows="8" style="width:820px;height:300px;"><?php echo $_smarty_tpl->tpl_vars['linkrow']->value['body'];?>
</textarea></td>
	</tr>
	<tr  class="admin_table_trbg">
		<th width="120">媒体宣传：</th>
		<td><textarea  id="media" name="media" cols="100" rows="8" style="width:820px;height:200px;"><?php echo $_smarty_tpl->tpl_vars['linkrow']->value['media'];?>
</textarea></td>
	</tr>
    <tr>
		<th width="120">服务套餐：</th>
		<td><textarea  id="packages" name="packages" cols="100" rows="8" style="width:820px;height:200px;"><?php echo $_smarty_tpl->tpl_vars['linkrow']->value['packages'];?>
</textarea></td>
	</tr>

    <tr>
		<th width="120">参与办法：</th>
		<td><textarea  id="participate" name="participate" cols="100" rows="8" style="width:820px;height:200px;"><?php echo $_smarty_tpl->tpl_vars['linkrow']->value['participate'];?>
</textarea></td>
	</tr>

		<tr  class="admin_table_trbg">
		<td align="center" colspan="2">
        <?php if (is_array($_smarty_tpl->tpl_vars['linkrow']->value)) {?>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['linkrow']->value['id'];?>
" />
        <input class="admin_submit4" type="submit" name="update" value="&nbsp;修 改&nbsp;" />
        <?php } else { ?>
        <input class="admin_submit4" type="submit" name="add" value="&nbsp;添 加&nbsp;" />
        <?php }?>
		<input class="admin_submit4" type="reset" name="reset" value="&nbsp;重 置 &nbsp;" /></td>
	</tr>
</table>
<input type="hidden" name="pytoken"  id="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
</form>
</div></div>
<div id="news_preview"  style="display:none;width:560px ">
	<div style="height:300px; overflow:auto;width:560px;" >
		<div class="job_box_div" style="text-align:center;margin-top:10px;"></div>
	</div>
</div>
<div id="domainlist" style="display:none;float:left">
	<div class="fz_city_news_cont" style="padding:10px;_height:<?php echo $_smarty_tpl->tpl_vars['ieheight']->value;?>
px;"> 
		<div class="admin_resume_dc">
			<label><span class="admin_resume_dc_s"><input type="radio" name="ndid" onClick="check_domain('全站','0')" value="0" checked class="fz_city_news_check">全站</label></span>
			<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['domain']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
			<label><span class="admin_resume_dc_s"><input type="radio" name="ndid" onClick="check_domain('<?php echo $_smarty_tpl->tpl_vars['list']->value['webname'];?>
','<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
')" <?php if ($_smarty_tpl->tpl_vars['list']->value['id']==$_smarty_tpl->tpl_vars['news']->value['did']) {?>checked<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
" class="fz_city_news_check"><?php echo $_smarty_tpl->tpl_vars['list']->value['webname'];?>
</label></span>
			<?php } ?> 
		</div>
	</div>
</div>
<div id="Standaside" style="display:none;">
	<div style=" margin-top:10px;">
    <div id="zhanwei"></div>
  </div>
</div>
</body>
</html><?php }} ?>
