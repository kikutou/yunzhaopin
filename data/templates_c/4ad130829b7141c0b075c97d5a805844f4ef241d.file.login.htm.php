<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 16:27:32
         compiled from "/var/www/html/yunzhaopin//app/template/default/public_search/login.htm" */ ?>
<?php /*%%SmartyHeaderCode:827111661592543f4b34657-63007672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ad130829b7141c0b075c97d5a805844f4ef241d' => 
    array (
      0 => '/var/www/html/yunzhaopin//app/template/default/public_search/login.htm',
      1 => 1469687440,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '827111661592543f4b34657-63007672',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'style' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592543f4b5a0b6_64835886',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592543f4b5a0b6_64835886')) {function content_592543f4b5a0b6_64835886($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
?>
<!---��ǰ��¼--->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/tck_logoin.css" type="text/css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css" type="text/css">
<div class="none" id="onlogin">
  <div class="logoin_tck_left" style="margin-top: 25px;padding-left: 25px;">
    <div class="logoin_tck_text" > <i class="logoin_tck_text_icon"></i>
      <input type="text" id="login_username" placeholder="�������û���" tabindex="1" name="username" class="logoin_tck_text_t1">
    </div>
    <div class="logoin_tck_text" style="margin-top:20px;"> <i class="logoin_tck_text_icon logoin_tck_text_icon_p"></i>
      <input type="password" id="login_password" tabindex="2" name="password" placeholder="����������"class="logoin_tck_text_t1">
    </div>
	<?php if (strpos($_smarty_tpl->tpl_vars['config']->value['code_web'],"ǰ̨��½")!==false) {?>
    <div class="logoin_tck_text logoin_tck_text_yzm" style="margin-top:20px;"> <i class="logoin_tck_text_icon logoin_tck_text_icon_y"></i>
      <input id="login_authcode" type="text" tabindex="3"  maxlength="4" name="authcode" class="logoin_tck_text_t1" placeholder="��������֤��"  style="width:80px;">
    </div>
    <div class=" logoin_tck_text_yzm_r" style="margin-top: 20px;"> <img id="vcode_img" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" onclick="check_code()" style="margin-right:5px; margin-left:5px;cursor:pointer;">&nbsp;<a href="javascript:void(0);" onclick="check_code()">������?</a> </div>
	<?php }?>
    <div class="Pop-up_logoin_list">
      <div id="msg"></div>
    
    <input type="hidden" id="login_usertype" />
    <input id="loginsubmit" class="logoin_tck_bth_sub" type="button" name="loginsubmit" onclick="checkajaxlogin()" value="��¼" ></div>
  </div>
  <div class="logoin_tck_right" style="margin-top: 35px;padding-left: 20px;">
    <div class="logoin_tck_reg">��ûû���˺ţ�<a href="" id="onregister" class="Orange">����ע��</a></div>
  </div>
</div>
<?php echo '<script'; ?>
>
function showlogin(usertype){
	$("#login_usertype").val(usertype);
	if(usertype==1 || usertype==""){
		var url='<?php echo smarty_function_url(array('m'=>'register','usertype'=>1),$_smarty_tpl);?>
';
	}else if(usertype==2){
		var url='<?php echo smarty_function_url(array('m'=>'register','usertype'=>2),$_smarty_tpl);?>
';
	}
	$("#onregister").attr("href",url);
	$.layer({
		type : 1,
		title :'���ٵ�¼', 
		closeBtn : [0 , true],
		border : [10 , 0.3 , '#000', true],
		area : ['480px','300px'],
		page : {dom :"#onlogin"}
	});
}
function checkajaxlogin(){
	var username = $.trim($("#login_username").val());
	var password = $.trim($("#login_password").val());
	
	var usertype = $.trim($("#login_usertype").val());
	if(username == "" || password=="" ){
		layer.closeAll();
		layer.msg('��������д�û��������룬��֤�룡', 2, 8,function(){showlogin(usertype);});return false;
	}
	var authcode='';
	<?php if (strpos($_smarty_tpl->tpl_vars['config']->value['code_web'],"ǰ̨��½")!==false) {?>
	authcode = $.trim($("#login_authcode").val());
	if(authcode==""){
		layer.closeAll();
		layer.msg('����д��֤�룡', 2, 8,function(){showlogin(usertype);});return false;
	}
	<?php }?>
	layer.load('��½��,���Ժ�...');

	$.post("<?php echo smarty_function_url(array('m'=>'login','c'=>'loginsave'),$_smarty_tpl);?>
",{comid:1,username:username,password:password,authcode:authcode,usertype:usertype},function(data){
		layer.closeAll(); 
		var jsonObject = eval("(" + data + ")"); 
		if(jsonObject.error == '3'){//UC��¼���� 
			$('#uclogin').html(jsonObject.msg);
			setTimeout("window.location.href='"+jsonObject.url+"';",500); 
		}else if(jsonObject.error == '2'){//UC��¼�ɹ� 
			$('#uclogin').html(jsonObject.msg); 
			setTimeout("location.reload();",500); 
		}else if(jsonObject.error == '1'){//������¼�ɹ� 
			if ( $("#finderusertype").length > 0 ) {//����������ʾ��������������
				var finderusertype=$("#finderusertype").val();
				var finderparas=$("#finderparas").val();
				addfinder(finderparas,finderusertype,1);
			}else{
				location.reload();return false; 
			} 
		}else if(jsonObject.error == '0'){//��¼ʧ�ܻ���Ҫ��˵���ʾ 
			layer.msg(jsonObject.msg, 2, 8<?php if (strpos($_smarty_tpl->tpl_vars['config']->value['code_web'],"ǰ̨��½")!==false) {?>,function(){check_code();}<?php }?>);return false;
			
		}
	});
}



<?php echo '</script'; ?>
><?php }} ?>
