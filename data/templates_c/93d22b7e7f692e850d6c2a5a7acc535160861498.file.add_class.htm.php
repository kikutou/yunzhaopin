<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:20:39
         compiled from "/var/www/html/yunzhaopin//app/template/admin/add_class.htm" */ ?>
<?php /*%%SmartyHeaderCode:172689370159255067e888e6-86407389%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93d22b7e7f692e850d6c2a5a7acc535160861498' => 
    array (
      0 => '/var/www/html/yunzhaopin//app/template/admin/add_class.htm',
      1 => 1468281666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172689370159255067e888e6-86407389',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'position' => 0,
    'v' => 0,
    'one' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59255067e9eb38_57538613',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59255067e9eb38_57538613')) {function content_59255067e9eb38_57538613($_smarty_tpl) {?><!--�б�����������-->
<div id="wname"  style="display:none; "> 
	<div class="job_box_div">  
	   <div class="job_box_inp">
		        <table cellspacing='1' cellpadding='1' class="admin_examine_table">
		<tr >
        <th  width="100">���ѡ��</th>
          <td>
           <div class="admin_examine_right">
           <label><span class="add_class_s"><input name='ctype' type='radio' value='1' checked='checked'> һ������</span></label>
           <label><span class="add_class_s"><input name='ctype' type='radio' value='2'> ��������</span></label>
           </div>
           </td></tr>
			<tr class='sclass'  style="display:none;">
            <th>���ࣺ</th>
            <td><select name="nid" id='nid' class="admin_com_smbox_select">
            <option value="">--��ѡ��--</option> 
							 <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['position']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
							<?php } ?>
						</select> </td></tr>
			<tr><th>������ƣ�</th><td><textarea  id='position' class="add_class_textarea" ></textarea>	</td></tr>
			<tr class='variable'><th>���ñ�������</th><td><textarea id='variable' class="add_class_textarea" ></textarea></td></tr> 
			<tr><td colspan='2' align="center"><div class="add_class_div"><span class="admin_web_tip">˵����������Ӷ������ࣨ�밴�س�Enter�����У�һ��һ��)</span></div></td></tr>
			<tr><td colspan='2'  align="center"><input class="admin_examine_bth" type="button" value="��� " onclick="save_class()"/></td></tr>
		</table> 
	   </div>
	</div>
</div> 

<!--�б�����������end-->
<!--������-->
<div id="bname"  style="display:none;"> 
	<div  class="job_box_div">  
	   <div class="job_box_inp">
	  <table cellspacing='1' cellpadding='1' class="admin_examine_table">
			<tr >  
            <th width="100">���ѡ��</th>
            <td >
             <div class="admin_examine_right">
             <label><span class="add_class_s"><input name='btype' type='radio' value='1' checked='checked'>һ�����</span></label>
             <label><span class="add_class_s"><input name='btype' type='radio' value='2'>�������</span></label>
             </div>
            
            </tr>
		    <tr class='sclass_2 sclass_3  sclass'  style="display:none;">
            <th>һ�����ࣺ</th>
            <td><select name="keyid" id='keyid' class="admin_com_smbox_select">
            	<option value="">--��ѡ��--</option> 
				<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['position']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value) {
$_smarty_tpl->tpl_vars['one']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['one']->value['name'];?>
</option>
				<?php } ?>
			</select> </td></tr>		
			<tr><th>������ƣ�</th><td><textarea  id='classname' class="add_class_textarea"></textarea></td></tr>
 			<tr><td colspan='2' align="center"><div class="add_class_div"><span class="admin_web_tip">˵����������Ӷ������ࣨ�밴�س������У�һ��һ����</span></div></td></tr>
 			<tr><td colspan='2' align="center"class='ui_content_wrap'><input class="admin_examine_bth" type="button" value="��� " onClick="save_bclass()"/></td></tr> 
		</table> 
	   </div>
	</div>
</div> 
<!--������end-->
<?php echo '<script'; ?>
 type="text/javascript"> 
$(document).ready(function(){
	$(".imghide").hover(function(){
		$(this).find('.class_xg').show();
	},function(){
		$(this).find('.class_xg').hide();
	});
	$("input[name='ctype']").click(function(){
		var val=$(this).val();
		if(val=='1'){
			$(".variable").show();
			$(".sclass").hide();
		}else if(val=='2'){
			$(".variable").hide();
			$(".sclass").show();
		}
	});
	$("input[name='btype']").click(function(){
		var val=$(this).val();  
		$(".sclass").hide(); 
		$(".sclass_"+val).show(); 
	});
	
})
<?php echo '</script'; ?>
><?php }} ?>
