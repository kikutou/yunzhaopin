<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:15:04
         compiled from "/var/www/html/yunzhaopin/app/template/default/ajax/login.htm" */ ?>
<?php /*%%SmartyHeaderCode:198093793959254f18c70ee7-58446367%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13b12e33198b0600cc15cdcf09c15d2e9ebdd857' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/default/ajax/login.htm',
      1 => 1469694476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198093793959254f18c70ee7-58446367',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'usertype' => 0,
    'member' => 0,
    'config' => 0,
    'username' => 0,
    'uid' => 0,
    'company' => 0,
    'addjobnum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59254f18d89f01_83176645',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59254f18d89f01_83176645')) {function content_59254f18d89f01_83176645($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
?><?php echo '<script'; ?>
>
$(document).ready(function(){
	$("#usertype1").click(function(){
		$("#reg_url_1").show();
		$("#reg_url_2").hide();
		$("#usertype").val("1");
		$("#usertype1").attr("class","");
		$("#usertype2").attr("class","index_logoin_current1");
	});
	$("#usertype2").click(function(){
		$("#reg_url_2").show();
		$("#reg_url_1").hide();
		$("#usertype").val("2");
		$("#usertype2").attr("class","");
		$("#usertype1").attr("class","index_logoin_current2");
	});
});
$(document).ready(function(){
	$("#username").focus(function(){
		var txAreaVal = $(this).val();
		if( txAreaVal == this.defaultValue){$(this).val("");}
	}).blur(function(){
		var txAreaVal = $(this).val();
		if( txAreaVal == this.defaultValue||$(this).val()==""){$(this).val(this.defaultValue);}
	});
	$("#txt_CheckCode").focus(function(){
		var txAreaVal = $(this).val();
		if( txAreaVal == this.defaultValue){$(this).val("");}
	}).blur(function(){
		var txAreaVal = $(this).val();
		if( txAreaVal == this.defaultValue||$(this).val()==""){$(this).val(this.defaultValue);}
	});
	$("#password2").focus(function(){
		$("#password").show();
		$("#password").focus();
		$("#password2").hide();
	})
	$("#password").blur(function(){
		if($("#password").val()==""){
			$("#password2").show();
			$("#password").hide();
		}
	})
});

$(document).ready(function(){
	$("#username,#txt_CheckCode").focus(function(){
		var txAreaVal = $(this).val();
		if( txAreaVal == this.defaultValue){$(this).val("");}
	}).blur(function(){
		var txAreaVal = $(this).val();
		if( txAreaVal == this.defaultValue||$(this).val()==""){$(this).val(this.defaultValue);}
	}).keydown(function (e) {
	    var ev = document.all ? window.event : e;
	    if (ev.keyCode == 13) {
	        check_login('<?php echo smarty_function_url(array('m'=>'login','c'=>'loginsave'),$_smarty_tpl);?>
');
	    } else { return;}
	});
	$("#password2").focus(function(){
		$("#password").show();
		$("#password").focus();
		$("#password2").hide();
	})
	$("#password").blur(function(){
		if($("#password").val()==""){
			$("#password2").show();
			$("#password").hide();
		}
	}).keydown(function (e) {
	    var ev = document.all ? window.event : e;
	    if (ev.keyCode == 13) {
	        check_login('<?php echo smarty_function_url(array('m'=>'login','c'=>'loginsave'),$_smarty_tpl);?>
');
	    } else { return; }
	});
});
function jobaddurl(num,integral_job,integral_pricename){ 
	if(num==0){
		var msg='�ײ������꣬���ȹ����Ա��<br>��������<a href="'+weburl+'/member/index.php?c=right" style="color:red;">�����Ա</a>��';
		layer.confirm(msg, function(){ 
			window.open(weburl+'/index.php?c=right');  
		});
	}else if(num==2){
		var msg='�ײ������꣬������������۳�'+integral_job+' '+integral_pricename+'����������<a href="'+weburl+'/member/index.php?c=right" style="color:red">�����Ա</a>���Ƿ������';
		layer.confirm(msg, function(){
			window.open(weburl+'/member/index.php?c=jobadd');   
		});
	}
}
<?php echo '</script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['usertype']->value=="1") {?>
<div class="index_logoin_after">
  <div class="hunter_logoin_bg">
    <dl class="logoin_after_tx">
      <dt style="width:48px;"><img width="40" height="50" src="<?php echo $_smarty_tpl->tpl_vars['member']->value['photo'];?>
" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
',2);"></dt>
      <dd>
        <div class="login_af_name">���ã�<font color="red"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</font></div>
       �����û�</dd>
    </dl>
    <div class="logoin_after_cj">���Ѵ����� (<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=resume"><u><?php echo $_smarty_tpl->tpl_vars['member']->value['resume_num'];?>
</u></a>) �ݼ�����</div>
    <div class="hunter_logoin_list"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=expect&add=<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
" class="logoin_after_su1">��������</a><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=resume" class="logoin_after_su2">�������</a></div>
    <div class="logoin_after"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=job"> �������ְλ��</a><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=job"><em><?php echo $_smarty_tpl->tpl_vars['member']->value['sq_jobnum'];?>
</em></a></div>
    <div class="logoin_after"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=favorite"> �ղص�ְλ��</a><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=favorite"><em><?php echo $_smarty_tpl->tpl_vars['member']->value['fav_jobnum'];?>
</em></a></div>
    <div class="logoin_after_cz"><a href="javascript:void(0);" onclick="logout('<?php echo smarty_function_url(array('c'=>'logout'),$_smarty_tpl);?>
');"> ��ȫ�˳�</a><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php" class="in_l_cor">�����������</a></div>
  </div>
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['usertype']->value=="2") {?>
<div class="index_logoin_after">
  <div class="hunter_logoin_bg">
    <dl class="logoin_after_tx">
      <dt style="width:80px;height:58px;"><img width="70" height="28" src="<?php echo $_smarty_tpl->tpl_vars['company']->value['logo'];?>
"  onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_unit_icon'];?>
',2);"></dt>
      <dd >
        <div class="login_af_name">���ã�<font color="red"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</font></div>
      ��ҵ�û�</dd>
    </dl>
    <div class="logoin_after_cj">���ѷ����� (<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=job&w=1"><u><?php echo $_smarty_tpl->tpl_vars['company']->value['job'];?>
</u></a>)��ְλ��</div>
    <div class="hunter_logoin_list">
	<?php if ($_smarty_tpl->tpl_vars['addjobnum']->value=='1') {?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=jobadd" class="logoin_after_su1">����ְλ</a>
	<?php } else { ?>
	<a href="javascript:void(0)" onclick="jobaddurl('<?php echo $_smarty_tpl->tpl_vars['addjobnum']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_job'];?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
')" class="logoin_after_su1">����ְλ</a>
	<?php }?>
	
	
	<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=job&w=1" class="logoin_after_su2">ְλ����</a></div>
    <div class="logoin_after"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=hr"> ���յ�������</a><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=hr"><em><?php echo $_smarty_tpl->tpl_vars['company']->value['sq_job'];?>
</em></a></div>
    <div class="logoin_after"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=job&w=2"> �ѹ���ְλ��</a><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=job&w=2"><em><?php echo $_smarty_tpl->tpl_vars['company']->value['status2'];?>
</em></a></div>
    <div class="logoin_after_cz"><a href="javascript:void(0);" onclick="logout('<?php echo smarty_function_url(array('c'=>'logout'),$_smarty_tpl);?>
');"> ��ȫ�˳�</a><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php" class="in_l_cor">�����������</a></div>
  </div>
</div> 
<?php } else { ?>


<div class="yun_Indexlogin_tit"> <span class="yun_Indexlogin_tit_s"><i class="yun_Indexlogin_tit_line yun_z_bg"></i>�û���¼<i class="yun_Indexlogin_tit_sw"></i></span></div>
<div class="yun_Indexlogin_box ">
<div class="yun_Indexlogin_text">
<div><i class="yun_Indexlogin_icon"></i></div>
<input type="text" id="username" name="username" value="����/�ֻ���/�û���" class="yun_Indexlogin_t">
 <div class="index_logoin_msg none" id="show_name">
        <div class="index_logoin_msg_tx">����д�û���</div>
        <div class="index_logoin_msg_icon"></div>
   </div>
</div>
<div class="yun_Indexlogin_text">
<div><i class="yun_Indexlogin_icon yun_Indexlogin_icon_m"></i></div>
<input type="text" id="password2" value="����������" class="yun_Indexlogin_t">
<input type="password" id="password" name="password" class="yun_Indexlogin_t none" value="">
      <div class="index_logoin_msg none" id="show_pass">
	   <div class="index_logoin_msg_tx">����д����</div>
	   <div class="index_logoin_msg_icon"></div>
</div>
</div>
<div class="yun_Indexlogin_yzm_t">
<div><i class="yun_Indexlogin_icon yun_Indexlogin_yzm_icon"></i></div>
<?php if (stripos($_smarty_tpl->tpl_vars['config']->value['code_web'],"ǰ̨��½")!==false) {?>
<input type="text" id="txt_CheckCode" name="authcode" value="��֤��"class="yun_Indexlogin_yzm" maxlength="4">
<a href="javascript:void(0);" onclick="check_codes();"><img id="vcode_imgs" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" width="60" height="30" class="yun_Indexlogin_yzm_img"></a>
<a href="javascript:void(0);" onclick="check_codes();" class="yun_Indexlogin_icon_m_hyh">��һ����</a>
<?php } else { ?>
<div class="yun_Indexlogin_zddl"><input type="checkbox" value=""> �´��Զ���¼</div>
<?php }?>
</div>


<div class="yun_Indexlogin_sub"><input type="submit" value="������¼" class="yun_Indexlogin_bth" onclick="check_login('<?php echo smarty_function_url(array('m'=>'login','c'=>'loginsave'),$_smarty_tpl);?>
');"></div>
<div class="yun_Indexlogin_sub_fotg">��û��ע���˺ţ�<a href="<?php echo smarty_function_url(array('m'=>'forgetpw'),$_smarty_tpl);?>
" class="yun_Indexlogin_ft ">��������?</a></div>
<div class="yun_Indexlogin_p"><a href="<?php echo smarty_function_url(array('m'=>'register','usertype'=>2),$_smarty_tpl);?>
" class="yun_text_color_login yun_text_color">��ҵע��</a><a href="<?php echo smarty_function_url(array('m'=>'register','usertype'=>1),$_smarty_tpl);?>
" class="yun_text_color_login_gr yun_text_color">����ע��</a></div>

</div>


<?php }?><?php }} ?>
