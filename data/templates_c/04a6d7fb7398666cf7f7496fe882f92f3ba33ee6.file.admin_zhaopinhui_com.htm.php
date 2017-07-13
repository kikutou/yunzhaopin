<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:20:17
         compiled from "/var/www/html/yunzhaopin/app/template/admin/admin_zhaopinhui_com.htm" */ ?>
<?php /*%%SmartyHeaderCode:386700793592550514b6ac9-95295320%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04a6d7fb7398666cf7f7496fe882f92f3ba33ee6' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/admin/admin_zhaopinhui_com.htm',
      1 => 1469699208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '386700793592550514b6ac9-95295320',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'pytoken' => 0,
    'rows' => 0,
    'key' => 0,
    'v' => 0,
    'spacearr' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592550515033b1_89023536',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592550515033b1_89023536')) {function content_592550515033b1_89023536($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
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
> 
$(function(){
	$(".status").click(function(){
		$("input[name=pid]").val($(this).attr("pid"));
		var id=$(this).attr("pid");
		var status=$(this).attr("status");
		var pytoken=$("#pytoken").val();
		$("#status"+status).attr("checked",true); 	
		$.post("index.php?m=zhaopinhui&c=sbody",{id:id,pytoken:pytoken},function(msg){
			$("#statusbody").val(msg);
			status_div('参展企业审核','350','220');
		});			
	});
}); 
function audall(){
	var codewebarr="";
	$(".check_all:checked").each(function(){ //由于复选框一般选中的是多个,所以可以循环输出
		if(codewebarr==""){codewebarr=$(this).val();}else{codewebarr=codewebarr+","+$(this).val();}
	});
	if(codewebarr==""){
		parent.layer.msg('您还未选择任何信息！', 2, 8);	return false;
	}else{
		$("input[name=pid]").val(codewebarr);
 		$("#statusbody").val('');
		$("input[name='status']").attr('checked',false);
		status_div('参展企业审核','350','220');
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
<div id="status_div"  style="display:none; width: 350px; ">
  <div class=""> 
      <form action="index.php?m=zhaopinhui&c=status" target="supportiframe" method="post" id="formstatus">
         <table cellspacing='1' cellpadding='1' class="admin_examine_table">
  <tr>
    <th width="80">审核操作：</th>
      <td align="left">
        <div class="admin_examine_right">
     <label for="status0"><span class="admin_examine_table_s"><input type="radio" name="status" value="0" id="status0" >未审核</span></label>
        <label for="status1"><span class="admin_examine_table_s"><input type="radio" name="status" value="1" id="status1" >正常</span></label>
        <label for="status2"><span class="admin_examine_table_s"><input type="radio" name="status" value="2" id="status2">未通过</span></label>
    </div>
         </td>
          </tr>
          <tr>
            <th>审核说明：</th>
   <td align="left"><textarea id="statusbody" name="statusbody" class="admin_explain_textarea"></textarea></td>
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

		<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
		<input name="pid" value="0" type="hidden">
      </form> 
  </div>
</div> 
<div class="infoboxp"><div class="infoboxp_top_bg"></div>
<div class="admin_Filter">
  <span class="complay_top_span fl">参与企业列表</span>
  <span class='admin_search_div'>
  <div class="admin_adv_search"><div class="admin_adv_search_bth">高级搜索</div></div>  
</span> 
</div>
<?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
 
<div class="table-list">
<div class="admin_table_border">
<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe> 
<form action="index.php?m=zhaopinhui&c=delcom" name="myform" method="post" target="supportiframe" id='myform'>
<table width="100%">
	<thead>
		<tr class="admin_table_top">
			<th style="width:20px;"><label for="chkall"><input type="checkbox" id='chkAll' onclick='CheckAll(this.form)' /></label></th>
            <th>招聘会名称</th>
			<th>企业名称</th>
			<th width="300">参与职位</th>
			<th>场地</th>
			<th>区位</th>

			<th>状态</th>
			<th width="100" class="admin_table_th_bg">操作</th>
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
		<tr align="center"<?php if (($_smarty_tpl->tpl_vars['key']->value+1)%2=='0') {?>class="admin_com_td_bg"<?php }?> id="list<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
			<td ><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" name='del[]' onclick='unselectall()' class="check_all" rel="del_chk" /></td>
			<td align="left" ><?php echo $_smarty_tpl->tpl_vars['v']->value['zphname'];?>
</td>
            <td align="left" ><?php echo $_smarty_tpl->tpl_vars['v']->value['comname'];?>
</td>
			<td align="left" ><?php echo $_smarty_tpl->tpl_vars['v']->value['jobname'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['spacearr']->value[$_smarty_tpl->tpl_vars['v']->value['sid']];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['spacearr']->value[$_smarty_tpl->tpl_vars['v']->value['cid']];?>
</td>

			<td><?php if ($_smarty_tpl->tpl_vars['v']->value['status']==1) {?><span class="admin_com_Audited">已审核</span><?php } elseif ($_smarty_tpl->tpl_vars['v']->value['status']==0) {?><span class="admin_com_noAudited">未审核</span><?php } elseif ($_smarty_tpl->tpl_vars['v']->value['status']==2) {?><span class="admin_com_tg">未通过</span><?php }?></td>
			<td>
			<a href="javascript:;" class="status admin_cz_sh" pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" status="<?php echo $_smarty_tpl->tpl_vars['v']->value['status'];?>
">审核</a> | <a href="javascript:void(0)" class="admin_cz_sh" onClick="layer_del('确定要删除？', 'index.php?m=zhaopinhui&c=delcom&delid=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');">删除</a></td>
		</tr>
		<?php } ?>
		<tr style="background: #f1f1f1;">
       		<td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
			<td><label for="chkAll2">全选</label>&nbsp;
            <input class="admin_submit4" type="button" name="delsub" value="批量审核" onClick="audall();" />
            <input class="admin_submit4"  type="button" name="delsub" value="删除所选"  onclick="return really('del[]')"/></td>
			<td colspan="7" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
		</tr>
	</tbody>
</table>
<input type="hidden" name="pytoken" id="pytoken"  value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
</form>
</div>
</div>
</div>
</body>
</html><?php }} ?>
