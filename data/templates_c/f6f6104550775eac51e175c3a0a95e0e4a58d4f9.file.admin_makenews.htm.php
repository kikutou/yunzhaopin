<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:15:36
         compiled from "/var/www/html/yunzhaopin/app/template/admin/admin_makenews.htm" */ ?>
<?php /*%%SmartyHeaderCode:191013346959254f38b6c3e9-59719346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6f6104550775eac51e175c3a0a95e0e4a58d4f9' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/admin/admin_makenews.htm',
      1 => 1469270286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191013346959254f38b6c3e9-59719346',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'type' => 0,
    'rows' => 0,
    'v' => 0,
    'pytoken' => 0,
    'classid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59254f38c47ba2_14510457',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59254f38c47ba2_14510457')) {function content_59254f38c47ba2_14510457($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/admin_public.js" language="javascript"><?php echo '</script'; ?>
>
<title></title>
</head>
<body class="body_ifm">
<div class="infoboxp">
  <div class="infoboxp_top_bg"></div>
  <div class="admin_Prompt">
    <div class="admin_Prompt_span"> 注意事项：
      1. 生成请确保目录有可写权限，否则无法生成。
      2. 添加导航的时候，链接可以填写 <?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/ 保存路径 </div>
    <div class="admin_Prompt_close"></div>
  </div>
  <div class="infoboxp_top"> <?php if ($_smarty_tpl->tpl_vars['type']->value=="once") {?>
    <h6>生成单页面</h6>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['type']->value=="index") {?>
    <h6>生成网站首页</h6>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['type']->value=="news") {?>
    <h6>生成新闻首页</h6>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['type']->value=="newsclass") {?>
    <h6>生成新闻类别</h6>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['type']->value=="archive") {?>
    <h6>生成新闻详细页</h6>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['type']->value=="all") {?>
    <h6>一键更新</h6>
    <?php }?> </div>
  <iframe id="supportiframe" name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
  <form target="supportiframe" action="" method="post" >
    <?php if ($_smarty_tpl->tpl_vars['type']->value=="once") {?>
    <table width="100%" class="table_form table_form_bg">
      <tr>
        <th width="150">选择栏目：</th>
        <td> <div class="admin_td_h"><select id="once_class">
            <option value="0">全部</option>
            
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            
            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
            
            <?php } ?>
        
          </select></div></td>
      </tr>
      <tr>
        <td class="ud" align="center" colspan="2"><input class="admin_submit6" type="button" id="cache_once" value="更新单页面"/>
          &nbsp;&nbsp; </td>
      </tr>
      <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
    </table>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['type']->value=="all") {?>
    <table width="100%" class="table_form table_form_bg">
      <tr>
        <th>首页保存路径：</th>
        <td><input class="input-text" type="text" name="make_index_url" size="40" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['make_index_url'];?>
"/></td>
      </tr>
      <tr>
        <th>新闻首页保存路径：</th>
        <td><input class="input-text" type="text" name="make_new_url" size="40" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['make_new_url'];?>
"/></td>
      </tr>
      <tr class="admin_table_trbg">
        <td class="ud" align="center" colspan="2"><input class="admin_submit4" type="button" id="madeall" value="一键更新"/>
          &nbsp;&nbsp; </td>
      </tr>
      <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
    </table>
    <?php }?>
    
    <?php if ($_smarty_tpl->tpl_vars['type']->value=="index") {?>
    <table width="100%" class="table_form table_form_bg">
      <tr>
        <th>首页保存路径：</th>
        <td><input class="input-text" type="text" name="make_index_url" size="40" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['make_index_url'];?>
"/></td>
      </tr>
      <tr class="admin_table_trbg">
        <td class="ud" align="center" colspan="2"><input class="admin_submit4" type="submit" id='madeindex' name="madeall" value="更新首页"/>
          &nbsp;&nbsp; </td>
      </tr>
      <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
    </table>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['type']->value=="news") {?>
    <table target="supportiframe" width="100%" class="table_form table_form_bg " action="">
      <tr>
        <th>新闻首页保存路径：</th>
        <td><input class="input-text" type="text" name="make_new_url" size="40" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['make_new_url'];?>
"/></td>
      </tr>
      <tr>
        <td class="ud" align="center" colspan="2"><input class="admin_submit8" type="submit" id='madenindex' name="madeall" value="更新新闻首页"/>
          &nbsp;&nbsp; </td>
      </tr>
      <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
    </table>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['type']->value=="newsclass") {?>
    <table width="100%" class="table_form table_form_bg">
      <input id="classid" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['classid']->value;?>
">
      <tr>
        <th>选择栏目：</th>
        <td> <div class="admin_td_h"><select name="" id="group">
            <option value="all">全部</option>
            
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                
            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
            
                <?php } ?>
            
          </select></div></td>
      </tr>
      <tr>
        <td class="ud" align="center" colspan="2"><input class="admin_submit4" type="button" id="newsclass" value="更新内容"/>
          &nbsp;&nbsp; </td>
      </tr>
      <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
    </table>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['type']->value=="archive") {?>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/css/font-awesome.min.css" type="text/css">  
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/datepicker/foundation-datepicker.min.js"><?php echo '</script'; ?>
>
    <table width="100%" class="table_form table_form_bg">
      <tr class="admin_table_trbg">
        <th>选择栏目：</th>
        <td>   <div class="admin_td_h"><select name="" id="group">
            <option value="0">全部</option>
            
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            
            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
            
            <?php } ?>
            
          </select></div></td>
      </tr>
      <tr>
        <th>发布时间：</th>
        <td><input id="stime" class="input-text" type="text" readonly size="21"  name="stime">
          -
          <input id="etime" class="input-text" type="text" readonly size="21"  name="etime">
          <?php echo '<script'; ?>
 type="text/javascript">
			var checkin = $('#stime').fdatepicker({
				format: 'yyyy-mm-dd',startView:4,minView:2 
			}).on('changeDate', function (ev) {
				if (ev.date.valueOf() > checkout.date.valueOf()) {
					var newDate = new Date(ev.date)
					newDate.setDate(newDate.getDate() + 1);
					checkout.update(newDate);
				}
				checkin.hide();
				$('#etime')[0].focus();
			}).data('datepicker');
			var checkout = $('#etime').fdatepicker({
				format: 'yyyy-mm-dd',startView:4,minView:2,
				onRender: function (date) {
					return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
				}
			}).on('changeDate', function (ev) {
				checkout.hide();
			}).data('datepicker');  
			<?php echo '</script'; ?>
></td>
      </tr>
      <tr class="admin_table_trbg">
        <th>开始编号：</th>
        <td><input class="input-text" type="text" id="start_id" size="20" value="0"/>
          <span class="admin_web_tip"> 0从头开始</span></td>
      </tr>
      <tr>
        <th>结束编号：</th>
        <td><input class="input-text" type="text" id="end_id" size="20" value="0"/>
           <span class="admin_web_tip">0到最后一条</span></td>
      </tr>
      <tr class="admin_table_trbg">
        <th>每页生成：</th>
        <td><input class="input-text" type="text" id="limit" size="20" value="20"/>
           <span class="admin_web_tip">注：每页生成数不要设置太大</span></td>
      </tr>
      <tr>
        <td class="ud" align="center" colspan="2"><input class="admin_submit4" type="button" id="archive" value="更新内容"/>
          &nbsp;&nbsp; </td>
      </tr>
      <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
    </table>
    <?php }?>
  </form>
</div>
<input type="hidden" id="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
<?php echo '<script'; ?>
>
$(document).ready(function(){
	$("#archive").click(function(){
		var stime=$.trim($("#stime").val());
		var etime=$.trim($("#etime").val()); 
		var group=$("#group").val();
		var startid=$("#start_id").val();
		var endid=$("#end_id").val();
		var limit=$("#limit").val();
		makearchive(stime,etime,group,startid,endid,limit,"archive",0,'正在获取新闻总数');
	})
	$("#madeall").click(function(){
		var make_index_url=$("input[name=make_index_url]").val();
		var make_new_url=$("input[name=make_new_url]").val();
		make_all(make_index_url,make_new_url,"cache",0,'正在生成区域');
	})
	$("#newsclass").click(function(){
		var group=$("#group").val();
		makenewsclass(group,"class",0,'正在获取新闻类别信息');
	});
	$("#madeindex").click(function(){
		var ii = parent.layer.load("正在生成...",0);
	});
	$("#madenindex").click(function(){
		
		var ii = parent.layer.load("正在生成...",0);
	});
	$("#cache_once").click(function(){
		var desc=$("#once_class").val();
		var pytoken=$("#pytoken").val();
		var ii = parent.layer.load("正在生成",0);
		$.post("index.php?m=cache&c=once",{desc:desc,pytoken:pytoken,make:1},function(data){
			if(data==1){
				parent.layer.msg("生成成功！",2,9);
			}
		})
	})
})
function make_all(make_index_url,make_new_url,type,value,msg){
	if(type!="ok"){
		var ii = parent.layer.load(msg,0);
		var pytoken=$("#pytoken").val();
		$.post("index.php?m=cache&c=all",{action:"makeall",make_index_url:make_index_url,make_new_url:make_new_url,type:type,value:value,pytoken:pytoken},function(data){
			var data=eval('('+data+')');
			make_all(make_index_url,make_new_url,data.type,data.value,data.msg);
		})
	}else{
		parent.layer.close(ii);
		parent.layer.alert(msg,9);
	}
}
function makenewsclass(group,type,value,msg){
	if(type!="ok"){
		var ii = parent.layer.load(msg,0);
		var pytoken=$("#pytoken").val();
		$.post("index.php?m=cache&c=newsclass",{action:"makeclass",group:group,type:type,value:value,pytoken:pytoken},function(data){
			var data=eval('('+data+')');
			makenewsclass(group,data.type,data.value,data.msg);
		})
	}else{
		parent.layer.close(ii);
		parent.layer.alert(msg, 9);
	}
}
function makearchive(stime,etime,group,startid,endid,limit,type,value,msg){
	$("#make_l").html(msg);
	if(type!="ok"){
		var ii = parent.layer.load(msg,0);
		var pytoken=$("#pytoken").val();
		$.post("index.php?m=cache&c=archive",{action:"makearchive",group:group,startid:startid,endid:endid,limit:limit,type:type,value:value,pytoken:pytoken,stime:stime,etime:etime},function(data){
			var data=eval('('+data+')');
			makearchive(stime,etime,group,startid,endid,limit,data.type,data.value,data.msg);
		})
	}else{
		parent.layer.close(ii);
		parent.layer.alert(msg, 9);
	}
}
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
