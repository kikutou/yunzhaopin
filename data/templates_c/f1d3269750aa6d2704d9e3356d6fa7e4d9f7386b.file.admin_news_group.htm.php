<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:19:54
         compiled from "/var/www/html/yunzhaopin/app/template/admin/admin_news_group.htm" */ ?>
<?php /*%%SmartyHeaderCode:8152885955925503a0b1741-48380860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1d3269750aa6d2704d9e3356d6fa7e4d9f7386b' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/admin/admin_news_group.htm',
      1 => 1469270286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8152885955925503a0b1741-48380860',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'type' => 0,
    'v' => 0,
    'pytoken' => 0,
    'news_group' => 0,
    'gkey' => 0,
    'pagenav' => 0,
    'info' => 0,
    'cou' => 0,
    'roo' => 0,
    'subclass' => 0,
    'one_class' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5925503a212cf6_41080274',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5925503a212cf6_41080274')) {function content_5925503a212cf6_41080274($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
 src="js/show_pub.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/admin_public.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 charset="utf-8" src="../js/kindeditor/kindeditor-min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
> 
function check_form(){
	if($.trim($("#classname").val())==""){ 
		parent.layer.msg("������Ʋ���Ϊ�գ�",2,2);return false; 
	}
}		
function make_cache(){
	$.get("index.php?m=admin_news&c=make_cache",function(msg){
		if(msg==1){parent.layer.msg("���³ɹ���",2,9);}else{parent.layer.msg("����ʧ�ܣ�",2,8);}return false; 
	});
}
function change_f(){
	var f_id=$("#f_id").val();
	f_id=='0'?$("#is_rec").show():$("#is_rec").hide();
}
function changeClass(){
	var codewebarr="";
	$(".check_all:checked").each(function(){ //���ڸ�ѡ��һ��ѡ�е��Ƕ��,���Կ���ѭ�����
		if(codewebarr==""){codewebarr=$(this).val();}else{codewebarr=codewebarr+","+$(this).val();}
	});
	if(codewebarr==""){
		parent.layer.msg('����δѡ���κ���Ϣ��', 2, 8);	return false;
	}else{
		$('#classid').val(codewebarr);
		var classid=$('#classid').val();
		var fid=$('#fid').val();
		if(classid==fid){
			parent.layer.msg('һ�����಻����ת�ƣ�', 2, 8);	return false;
		}
		$.layer({
			type : 1,
			title :'����ת�Ʒ���', 
			closeBtn : [0 , true],
			border : [10 , 0.3 , '#000', true],
			area : ['350px','250px'],
			page : {dom :"#infoboxclass"}
		});
	}
}
$(document).ready(function(){	
	$('#classbutton').click(function(){		
		var pytoken = $('#pytoken').val();
		var keyword = $('#classkeyword').val();
		$.post("index.php?m=admin_news&c=fatherclass",{pytoken:pytoken,keyword:keyword},function(data){
			$('#cname').html(data);		
		});
	});	
});
KindEditor.ready(function(K) {
	K.create('#content', {
		items : ['source',
		'bold', 'italic', 'underline',
		'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
		'insertunorderedlist','emoticons', 'image']
	});
	var colorpicker;
	K('#colorpicker').bind('click', function(e) {
		e.stopPropagation();
		if (colorpicker) {
			colorpicker.remove();
			colorpicker = null;
			return;
		}
		var colorpickerPos = K('#colorpicker').pos();
		colorpicker = K.colorpicker({
			x : colorpickerPos.x,
			y : colorpickerPos.y + K('#colorpicker').height(),
			z : 1981121422,
			selectedColor : 'default',
			noColor : '����ɫ',
			click : function(color) {
				K('#color').val(color);
				$('#color + font').css('color', color);
				colorpicker.remove();
				colorpicker = null;
			}
		});
	});
	K(document).click(function() {
		if (colorpicker) {
			colorpicker.remove();
			colorpicker = null;
		}
	});
});
function set_menu(id){
	var pytoken=$("#pytoken").val();
	$.post("index.php?m=admin_news&c=ajax_menu",{id:id,pytoken:pytoken},function(data){
		var data=eval('('+data+')');
		$("input[name=name]").val(data.name);
		$("input[name=url]").val(data.url);
		$("input[name=furl]").val(data.furl);
		$("input[name=did]").val(id);
		if(data.id>0){
			$("input[name=id]").val(data.id);
			$("#nid"+data.nid).attr("selected","selected");
			$("#type"+data.type).attr("selected","selected");
			$("input[name=sort]").val(data.sort);
			$("#eject"+data.eject).attr("checked","checked");
			$("#model"+data.model).attr("checked","checked");
			$("#bold"+data.bold).attr("checked","checked");
			$("#display"+data.display).attr("checked","checked");
			$("#color").val(data.color);
			$("#colorid").attr("style","color:"+data.color);
		}else{
			$("input[name=id]").val('');
			$("#type0").attr("selected","type");
			$("input[name=sort]").val('');
			$("#eject0").attr("checked","checked");
			$("#model").attr("checked","checked");
			$("#bold0").attr("checked","checked");
			$("#display0").attr("checked","checked");
			$("#color").val('');
			$("#colorid").attr("style","");
		}
	})
	$.layer({
		type : 1,
		title : '���õ���',
		fix:false,
		closeBtn : [0 , true], 
		offset : ['5%' , '20%'],
		border : [10 , 0.3 , '#000', true],
		area : ['600px','470px'],
		page : {dom : '#menu'}
	});  
}
<?php echo '</script'; ?>
>
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" /> 
<link href="images/table_form.css" rel="stylesheet" type="text/css" />

<title>��̨����</title>
</head>
<body class="body_ifm">
<iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
<div id="menu" style="display:none;width:600px;">
    <form name="myform" target="supportiframe" action="index.php?m=admin_news&c=set_menu" method="post">
      <table width="100%" class="table_form" style="background:#fff;">
        <tr >
          <th>�������</th>
          <td><select name="nid" id="nid">
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
           <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" id="nid<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['typename'];?>
</option>
			<?php } ?>
            </select>
            </td>
        </tr>
        <tr class="admin_table_trbg" >
          <th>�������ƣ�</th>
          <td><input class="input-text" type="text" name="name" size="40"/>
          <input type="hidden" name='color' id="color" value="" /><font id="colorid">������ɫ</font>
          <input type="button" id="colorpicker" value="��ȡɫ��" class="admin_submit6" style="background:#F60; margin-left:5px;"/></td>
        </tr>
        <tr class="admin_table_trbg" >
          <th>���ӵ�ַ��</th>
          <td><input class="input-text" type="text" name="url" size="50"/></td>
        </tr>
        <tr >
          <th>α��̬��ַ��</th>
          <td><input class="input-text" type="text" name="furl" size="50"/></td>
        </tr>
        <tr class="admin_table_trbg" >
          <th>�������ͣ�</th>
          <td><div class="adminav_set_r"><select name="type">
              <option value="1" id="type1">վ������</option>
              <option value="2" id="type2">ԭ����</option>
            </select>
            վ�������磺http://www.phpyun.com  ԭ�����磺index.php?m=com </div></td>
        </tr>
        <tr >
          <th>�š�����</th>
          <td><input class="input-text" type="text" name="sort" size="5"/></td>
        </tr>
        <tr class="admin_table_trbg" >
          <th>�������ڣ�</th>
          <td><input type="radio" name="eject" value="1" id="eject1">
            �´���
            <input type="radio" name="eject" value="0" id="eject0">
            ԭ���� </td>
        </tr>
        <tr >
          <th>״̬��</th>
          <td>
          <div style="width:480px;">
          <input type="radio" name="model" value="hot" id="modelhot">��
            <input type="radio" name="model" value="new" id="modelnew">��
            <input type="radio" name="model" value="" id="model" checked=checked>��
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             �Ӵ֣�<input type="radio" name="bold" value="1" id="bold1">��
            <input type="radio" name="bold" value="0" id="bold0">��
            
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             ��ʾ��<input type="radio" name="display" value="1" id="display1">��
            <input type="radio" name="display" value="0" id="display0">�� 
            </div>
            </td>
        </tr>
        <tr class="admin_table_trbg" >
          <td align="center" colspan="2">
            <input type="hidden" name="id" size="40"/>
            <input class="admin_submit4" type="submit" name="submit" value="&nbsp;�� ��&nbsp;"  />
            <input class="admin_submit4" type="reset" name="reset" value="&nbsp;�� �� &nbsp;" /></td>
        </tr>
      </table>
      <input type="hidden" name="did">
	  <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
    </form>
</div>
<div id="houtai_div" style=" width:450px; display:none;">



	     <table cellspacing='1' cellpadding='1' class="admin_examine_table">
			<tbody>
				<tr class="ui_td_11" >
					<th width="100">�������ƣ�</th>
					<td><select name="f_id" onChange="change_f(this)" id='f_id'  class="admin_com_smbox_select">
							<option value='0'>-��������--</option>
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news_group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['v']->value['keyid']==0) {?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
							<?php }?>
							<?php } ?>
						</select> 
					</td>
				</tr>
				<tr class="ui_td_11">
					<th>������ƣ�</th>
					<td><textarea  id='classname'name="classname" class="add_class_textarea"></textarea>
					</td>
					
				</tr>
				<tr><td  colspan='2'><div class="add_class_div"><span class="admin_web_tip">˵�����������Ӷ������ࣨ�밴�س������У�һ��һ����</span></div></td></tr>
				<tr id='is_rec'>
					<th>��ҳ�Ƽ���</th>
					<td><select name='rec' id='rec'class="admin_com_smbox_select">
						<option value='1'>�Ƽ�</option>
						<option value='0'>���Ƽ�</option>
					</select></td>
				</tr>
				<tr class="ui_td_11">
					<td  class="ui_content_wrap" colspan='2' style="border-bottom:none"><input class="admin_examine_bth" type="submit" name="sub" value=" ���� "  onclick="saveNclass('index.php?m=admin_news&c=addgroup')"/></td>
				</tr> 
			</tbody>
		</table>
		<input type="hidden" name="pytoken" id="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
</div>
<div class="infoboxp">
<div class="infoboxp_top_bg"></div>
 <div class="admin_Prompt">
<div class="admin_Prompt_span">  ע�⣺���Ӵ���ʱ������ѡ����𡣡����Ӷ�������ʱ��Ҫѡ����� ����ת��ֻ��ת�ƶ������ࡣ</div>
<div class="admin_Prompt_close"></div>
</div>
<div class="infoboxp_top">
<span class="admin_title_span">���ŷ���</span>
     <a href="javascript:void(0)" onClick="make_cache()" class="admin_infoboxp_nav admin_infoboxp_gl">���»���</a>
       <em class="admin-tit_line"></em>
		<a href="javascript:void(0);" onClick="add_class('�������','420','300','#houtai_div','')" class="admin_infoboxp_nav admin_infoboxp_tj">�������</a>
          <em class="admin-tit_line"></em>
    	<a href="index.php?m=admin_news" class="admin_infoboxp_nav admin_infoboxp_gl">�����б�</a>
          <em class="admin-tit_line"></em>
        <a href="index.php?m=admin_news&c=news" class="admin_infoboxp_nav admin_infoboxp_tj">��������</a>

</div>
<div class="clear"></div>
<div class="table-list" style="min-height:300px;">
<div class="admin_table_border">
<?php if (empty($_GET['id'])) {?>

<form action="index.php" name="myform" method="get" target="supportiframe" id='myform'>
<input name="m" value="admin_news" type="hidden"/>
<input name="c" value="delgroup" type="hidden"/>
<table width="100%">
<thead>
	<tr class="admin_table_top">
		<th>���</th>
		<th width="200">�������<span class="clickup">(����޸�)</span></th>
		<th align="left">��¼��</th>
        <th>����</th>
        <th>��ҳ�Ƽ�</th>
		<th>������ҳ</th>
        <th>��Ϊ����</th>
		<th class="admin_table_th_bg">����</th>
	</tr>
</thead>
<tbody>
<?php $_smarty_tpl->tpl_vars["gkey"] = new Smarty_variable(1, null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['news_group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <?php if ($_smarty_tpl->tpl_vars['v']->value['keyid']==0) {?>
    
	<tr align="center"<?php if ($_smarty_tpl->tpl_vars['gkey']->value%2==0) {?>class="admin_com_td_bg"<?php }?>>
		<td><span><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</span></td>
		<td class="ud"><span onClick="checkname('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" id="name<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</span>
        <input class="input-text hidden" type="text" id="inputname<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" onBlur="subname('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','index.php?m=admin_news&c=ajax');" ></td>
		<td class="od" align="left">
		 �������� <font color="#0033FF"><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['count']!=0) {
echo $_smarty_tpl->tpl_vars['v']->value['count'];
} else { ?>0<?php }?></a></font> ƪ������� <font color="#0033FF"><?php if ($_smarty_tpl->tpl_vars['v']->value['roots']!=0) {
echo $_smarty_tpl->tpl_vars['v']->value['roots'];
} else { ?>0<?php }?></font> ��</td>
        <td><span onClick="checksort('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" id="sort<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['v']->value['sort'];?>
</span>
        <input class="input-text hidden" type="text" id="input<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" size="10" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['sort'];?>
" onBlur="subsort('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','index.php?m=admin_news&c=ajax');" ></td>
		<td id="rec<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['rec']==0) {?><a onClick="rec_up('index.php?m=admin_news&c=recommend','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','1','rec');" href="javascript:void(0);"><img src="../config/ajax_img/errorico.gif"></a><?php } else { ?><a onClick="rec_up('index.php?m=admin_news&c=recommend','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','0','rec');" href="javascript:void(0);"><img src="../config/ajax_img/doneico.gif"></a><?php }?></td>
		
				<td id="rec_news<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
					<?php if ($_smarty_tpl->tpl_vars['v']->value['rec_news']==0) {?>
					<a onClick="rec_news('index.php?m=admin_news&c=recnews','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','1','rec_news');" href="javascript:void(0);"><img src="../config/ajax_img/errorico.gif"></a>
					<?php } else { ?>
					<a onClick="rec_news('index.php?m=admin_news&c=recnews','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','0','rec_news');" href="javascript:void(0);"><img src="../config/ajax_img/doneico.gif"></a>
					<?php }?>
				</td>
				
        <td><?php if ($_smarty_tpl->tpl_vars['v']->value['is_menu']==0) {?><a href="javascript:set_menu('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" class="admin_cz_sc">��Ϊ����</a><?php } else { ?>
            <a href="javascript:set_menu('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');"  class="admin_cz_sc">�޸ĵ���</a>
            <a href="javascript:void(0)" class="admin_cz_sc" onClick="layer_del('ȷ��ȡ���õ�����','index.php?m=admin_news&c=delmenu&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');">ȡ������</a><?php }?></td>
		<td><a href="index.php?m=admin_news&c=group&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="admin_cz_sc">�������</a> |
            <a href="javascript:void(0)" class="admin_cz_sc" onClick="layer_del('ȷ��Ҫɾ����', 'index.php?m=admin_news&c=delgroup&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');">ɾ��</a>
        </td>
	</tr>
    <?php $_smarty_tpl->tpl_vars["gkey"] = new Smarty_variable($_smarty_tpl->tpl_vars['gkey']->value+1, null, 0);?>
    <?php }?>
	<?php } ?>
    <tr>
    	<td colspan="8" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
    </tr>
</table> 
</form>
<?php }?>
<?php if ($_GET['id']) {?>
<form action="index.php?m=admin_news&c=delgroup" method="post" id='myform' target="supportiframe">
<table cellpadding="0" cellspacing="1" class="list" id="tree_list" width="100%">
<thead>
		<tr>
		<th width="50"><label for="chkall"> <input type="checkbox" id='chkAll' onclick='CheckAll(this.form)' /></label></th>
		<th width="20%">���</th>
		<th width="20%">�������</th>
        <th width="20%">��¼��</th>
        <th width="20%">����</th>
		<th width="20%">����</th>
	</tr>
</thead>
<tbody>
	<tr align="center">
	    <td width="50"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
" class="check_all" name='del[]' onclick='unselectall()' rel="del_chk" /></td>
		<td class="ud"><?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
</td>
        <td class="ud" align='left'>һ�����ࣺ<span onClick="checkname('<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
');" id="name<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
" style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['info']->value['name'];?>
</span>
        <input class="input-text hidden" type="text" id="inputname<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['name'];?>
" onBlur="subname('<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
','index.php?m=admin_news&c=ajax');"></td> 
       <td class="ud">
        �������� <font color="#0033FF"><a href="<?php echo $_smarty_tpl->tpl_vars['info']->value['url'];?>
"><?php if ($_smarty_tpl->tpl_vars['cou']->value!=0) {
echo $_smarty_tpl->tpl_vars['cou']->value;
} else { ?>0<?php }?></a></font> ƪ������� <font color="#0033FF"><?php if ($_smarty_tpl->tpl_vars['roo']->value!=0) {
echo $_smarty_tpl->tpl_vars['roo']->value;
} else { ?>0<?php }?></font> ��
		 </td>   
        <td><span onClick="checksort('<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
');" id="sort<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
" style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['info']->value['sort'];?>
</span>
        <input class="input-text hidden" type="text" id="input<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
" size="10" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['sort'];?>
" onBlur="subsort('<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
','index.php?m=admin_news&c=ajax');"></td>
		<td class="ud">
	 <A href="javascript:void(0)"   onclick="layer_del('ȷ��Ҫɾ����', 'index.php?m=admin_news&c=delgroup&id=<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
');"class="admin_cz_sc">ɾ��</A></td>
	</tr> 
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['subclass']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
	<tr align="center" id="msg<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
	    <td width="50"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="check_all" name='del[]' onclick='unselectall()' rel="del_chk" /></td>
		<td class="ud" ><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
		<td class="ud" align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��<span onClick="checkname('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" id="name<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</span>
    <input class="input-text hidden" type="text" id="inputname<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"value="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" onBlur="subname('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','index.php?m=admin_news&c=ajax');"></td>
     <td class="ud">
		 ������������ <font color="#0033FF"><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['counts']!=0) {?><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['counts'];
} else { ?>0<?php }?></a></font> ƪ</td>
     <td><span onClick="checksort('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');" id="sort<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['v']->value['sort'];?>
</span>
     <input class="input-text hidden" type="text" id="input<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"  size="10" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['sort'];?>
" onBlur="subsort('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','index.php?m=admin_news&c=ajax');"></td>
		<td class="ud">
    <A href="javascript:void(0)" onClick="layer_del('ȷ��Ҫɾ����', 'index.php?m=admin_news&c=delgroup&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');"class="admin_cz_sc">ɾ��</A></td>
	</tr> 
	<?php } ?>
	  <tr style="background:#f1f1f1;">
        <td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
        <td colspan="5" >
        <label for="chkAll2">ȫѡ</label>&nbsp;
        <input class="admin_submit4"  type="button" name="delsub" value="ɾ����ѡ"  onclick="return really('del[]')"/>
        <input class="admin_submit4"  type="button"  value="����ת�Ʒ���" onClick="changeClass()" />
        </td>
       </tr>
  </tbody>
</table>
</form>
<?php }?>
</div>
</div> 
</div>
<style>
.admin_compay_fp{width:340px; margin-top:10px;}
.admin_compay_fp_s{width:100px; text-align:right; font-weight:bold; display:inline-block}
.admin_compay_fp_sub{width:140px;height:25px;border:1px solid #ddd;}
.admin_compay_fp_sub1{width:40px;height:27px; background:#3692cf;color:#fff;border:none; cursor:pointer}
</style>
	<div id="infoboxclass"  style="display:none; width: 350px; ">
		<form action="index.php?m=admin_news&c=changeSon" target="supportiframe" method="post" id="classform"> 
			<div class="admin_compay_fp">
				<span class="admin_compay_fp_s">���������</span>
				<input type="text" value="" id="classkeyword" class="admin_compay_fp_sub">
				<input type='button' id="classbutton" value="����" class="admin_compay_fp_sub1">
			</div>
			<div class="admin_compay_fp">
			<span class="admin_compay_fp_s">�������</span>
			  <select name="nid" id="cname">
				  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['one_class']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
			      <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value['id']==$_smarty_tpl->tpl_vars['news']->value['nid']) {?> selected='selected'<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
			      <?php } ?>
              </select>
			</div>
			<div class="admin_compay_fp">
			<span style="width:350px;text-align:center;font-weight:bold; display:inline-block"><font color="red"> ˵����ת�Ʒ���ֻ��ת�ƶ�������</font></span>
			</div> 
			<div class="admin_compay_fp">
				<span class="admin_compay_fp_s">&nbsp;</span>
				<input type="submit"  value='ȷ��' class="submit_btn"><input type="button"  onClick="layer.closeAll();" class="cancel_btn" value='ȡ��' style="margin-left:10px;">
			</div>
			<input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
			<input name="id" value="0" id="classid" type="hidden">
			<input name="fid" id="fid" value="<?php echo $_GET['id'];?>
"type="hidden">
		</form> 
	</div>
</body>
</html><?php }} ?>