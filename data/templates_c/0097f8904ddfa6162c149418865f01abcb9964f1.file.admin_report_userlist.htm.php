<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:24:40
         compiled from "/var/www/html/yunzhaopin/app/template/admin/admin_report_userlist.htm" */ ?>
<?php /*%%SmartyHeaderCode:9894269555925515806d703-14827735%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0097f8904ddfa6162c149418865f01abcb9964f1' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/admin/admin_report_userlist.htm',
      1 => 1469270286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9894269555925515806d703-14827735',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'type' => 0,
    'ut' => 0,
    'userrows' => 0,
    'user' => 0,
    'email_promiss' => 0,
    'pagenav' => 0,
    'pytoken' => 0,
    'q_report' => 0,
    'r' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5925515821a519_78120791',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5925515821a519_78120791')) {function content_5925515821a519_78120791($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.searchurl.php';
if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<title>��̨����</title>
</head>
<body class="body_ifm">
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['adminstyle']->value)."/member_send_email.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="infoboxp">
  <div class="infoboxp_top_bg"></div>
  <div class="infoboxp_top" style="z-index:600;position:relative;">
    <div class="report_uaer_list"> <span class="infoboxp_top_span">�ٱ�����</span> <a href="index.php?m=report" <?php if ($_smarty_tpl->tpl_vars['type']->value!='1'&&$_smarty_tpl->tpl_vars['ut']->value!='2') {?> class="report_uaer_list_on"<?php }?>>���ٱ�ְλ</a> <a href="index.php?m=report&ut=2" <?php if ($_smarty_tpl->tpl_vars['ut']->value=='2') {?> class="report_uaer_list_on"<?php }?>>���ٱ�����</a> <a href="index.php?m=report&type=1" <?php if ($_smarty_tpl->tpl_vars['type']->value=='1') {?> class="report_uaer_list_on"<?php }?>>���ٱ��ʴ�</a> </div>
  </div>
  <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
  <?php if ($_smarty_tpl->tpl_vars['type']->value!='1') {?>
  <div class="admin_Filter">
    <form action="index.php" name="myform" method="get">
      <input name="m" value="report" type="hidden"/>
      <input name="ut" value="<?php echo $_smarty_tpl->tpl_vars['ut']->value;?>
" type="hidden"/>
      <span class="admin_Filter_span"> �������ͣ�</span>
      <div class="admin_Filter_text formselect"  did='df_type'>
        <input type="button" value="<?php if ($_GET['f_type']=='1'||$_GET['f_type']=='') {
if ($_smarty_tpl->tpl_vars['ut']->value=='2') {?>����<?php } else { ?>��˾�� <?php }
} elseif ($_GET['f_type']=='2') {?>�ٱ���<?php } elseif ($_GET['f_type']=='3') {?>�ٱ�����<?php }?>" class="admin_Filter_but"  id="bf_type">
        <input type="hidden" id='f_type' value="<?php if ($_GET['f_type']) {
echo $_GET['f_type'];
} else { ?>1<?php }?>" name='f_type'>
        <div class="admin_Filter_text_box" style="display:none" id='df_type'>
          <ul>
            <?php if ($_smarty_tpl->tpl_vars['ut']->value=='2') {?>
            <li><a href="javascript:void(0)" onClick="formselect('1','f_type','����')">����</a></li>
            <?php } else { ?>
            <li><a href="javascript:void(0)" onClick="formselect('1','f_type','��˾��')">��˾��</a></li>
            <?php }?>
            <li><a href="javascript:void(0)" onClick="formselect('2','f_type','�ٱ���')">�ٱ���</a></li>
            <li><a href="javascript:void(0)" onClick="formselect('3','f_type','�ٱ�����')">�ٱ�����</a></li>
          </ul>
        </div>
      </div>
      <input class="admin_Filter_search" type="text" name="keyword"  size="25" style="float:left">
      <input  class="admin_Filter_bth"  type="submit" name="qysearch" value="����"/>
      <span class='admin_search_div'>
      <div class="admin_adv_search">
        <div class="admin_adv_search_bth">�߼�����</div>
      </div>
      </span>
    </form>
  </div>
  <?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <div class="table-list">
    <div class="admin_table_border">
      <form action="index.php" name="myform" method="get" target="supportiframe" id='myform'>
        <input name="m" value="report" type="hidden"/>
        <input name="c" value="del" type="hidden"/>
        <table width="100%">
          <thead>
            <tr class="admin_table_top">
              <th style="width:20px;"><label for="chkall">
                  <input type="checkbox" id='chkAll'  onclick='CheckAll(this.form)'/>
                </label></th>
              <?php if ($_smarty_tpl->tpl_vars['ut']->value==2) {?>
              <?php if ($_GET['t']=="p_uid"&&$_GET['order']=="asc") {?>
              <th><a href="<?php echo smarty_function_searchurl(array('order'=>'desc','ut'=>$_smarty_tpl->tpl_vars['ut']->value,'t'=>'p_uid','m'=>'report','untype'=>'order,t,ut'),$_smarty_tpl);?>
">�û�ID<img src="images/sanj.jpg"/></a></th>
              <?php } else { ?>
              <th><a href="<?php echo smarty_function_searchurl(array('order'=>'asc','ut'=>$_smarty_tpl->tpl_vars['ut']->value,'t'=>'p_uid','m'=>'report','untype'=>'order,t,ut'),$_smarty_tpl);?>
">�û�ID<img src="images/sanj2.jpg"/></a></th>
              <?php }?>
              <?php } else { ?>
              <?php if ($_GET['t']=="c_uid"&&$_GET['order']=="asc") {?>
              <th><a href="<?php echo smarty_function_searchurl(array('order'=>'desc','ut'=>$_smarty_tpl->tpl_vars['ut']->value,'t'=>'c_uid','m'=>'report','untype'=>'order,t,ut'),$_smarty_tpl);?>
">�û�ID<img src="images/sanj.jpg"/></a></th>
              <?php } else { ?>
              <th><a href="<?php echo smarty_function_searchurl(array('order'=>'asc','ut'=>$_smarty_tpl->tpl_vars['ut']->value,'t'=>'c_uid','m'=>'report','untype'=>'order,t,ut'),$_smarty_tpl);?>
">�û�ID<img src="images/sanj2.jpg"/></a></th>
              <?php }?>
              <?php }?>
              <th align="left" width="160"><?php if ($_smarty_tpl->tpl_vars['ut']->value==2) {?>����<?php } else { ?>��˾��<?php }?></th>
              <?php if ($_smarty_tpl->tpl_vars['ut']->value==2) {
} else { ?>
              <th>ְλ</th>
              <?php }?>
              <th>����</th>
              <th>�ٱ���</th>
              <?php if ($_GET['t']=="inputtime"&&$_GET['order']=="asc") {?>
              <th><a href="<?php echo smarty_function_searchurl(array('order'=>'desc','ut'=>$_smarty_tpl->tpl_vars['ut']->value,'t'=>'inputtime','m'=>'report','untype'=>'order,t,ut'),$_smarty_tpl);?>
">�ٱ�ʱ��<img src="images/sanj.jpg"/></a></th>
              <?php } else { ?>
              <th><a href="<?php echo smarty_function_searchurl(array('order'=>'asc','ut'=>$_smarty_tpl->tpl_vars['ut']->value,'t'=>'inputtime','m'=>'report','untype'=>'order,t,ut'),$_smarty_tpl);?>
">�ٱ�ʱ��<img src="images/sanj2.jpg"/></a></th>
              <?php }?>
              <th style="width:230px;">�ٱ�����</th>
              <th class="admin_table_th_bg">����</th>
            </tr>
          </thead>
          <tbody>
          
          <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userrows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
          <tr align="center" id="list<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
            <td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"  name='del[]' onclick='unselectall()' rel="del_chk" /></td>
            <td style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['user']->value['c_uid'];?>
</td>
            <td class="ud" align="left"><?php if ($_smarty_tpl->tpl_vars['user']->value['usertype']=="2") {?><a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>'`$user.eid`'),$_smarty_tpl);?>
" target="_blank" class="admin_cz_sc"><?php echo $_smarty_tpl->tpl_vars['user']->value['r_name'];?>
</a><?php } else { ?><a href="<?php echo smarty_function_url(array('m'=>'company','c'=>'show','id'=>'`$user.c_uid`'),$_smarty_tpl);?>
" target="_blank" class="admin_cz_sc"><?php echo $_smarty_tpl->tpl_vars['user']->value['r_name'];?>
</a><?php }?></td>
            <?php if ($_smarty_tpl->tpl_vars['user']->value['usertype']=="2") {
} else { ?>
            <td class="od" align="left"><a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>'`$user.eid`'),$_smarty_tpl);?>
" target="_blank" class="admin_cz_sc"><?php echo mb_substr($_smarty_tpl->tpl_vars['user']->value['name'],0,20,'gbk');?>
</a></td>
            <?php }?>
            <td class="od" align="left"><?php if ($_smarty_tpl->tpl_vars['user']->value['email']) {?>
              <div  style="width:130px;"> <?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
<br>
                <?php if ($_smarty_tpl->tpl_vars['email_promiss']->value=='1') {?><span onClick="send_email('<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
');" style="color:green; cursor:pointer;">���ʼ�</span><?php }?></div>
              <?php }?></td>
            <td class="gd" align="left"><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
            <td class="td"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['inputtime'],"%Y-%m-%d");?>
</td>
            <td class="gd"><div style="width:230px; text-align:left"><?php echo $_smarty_tpl->tpl_vars['user']->value['r_reason'];?>
</div></td>
            <td> <?php if ($_smarty_tpl->tpl_vars['ut']->value==2) {?> <a href="javascript:void(0)" onClick="layer_del('ȷ��Ҫɾ��������ɾ������Ϣ��', 'index.php?m=report&c=delresume&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
&eid=<?php echo $_smarty_tpl->tpl_vars['user']->value['eid'];?>
&uid=<?php echo $_smarty_tpl->tpl_vars['user']->value['c_uid'];?>
');"class="admin_cz_sc">ɾ������</a> <?php } else { ?> <a href="javascript:void(0)" onClick="layer_del('ȷ��Ҫɾ��ְλ��ɾ������Ϣ��', 'index.php?m=report&c=deljob&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
&eid=<?php echo $_smarty_tpl->tpl_vars['user']->value['eid'];?>
');"class="admin_cz_sc">ɾ��ְλ</a> <?php }?> | <a href="javascript:void(0)" onClick="layer_del('ȷ��Ҫɾ����', 'index.php?m=report&c=del&del=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
');" class="admin_cz_sc">ɾ��</a></td>
          </tr>
          <?php } ?>
          <tr style="background:#f1f1f1;">
            <td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
            <td colspan="2" ><label for="chkAll2">ȫѡ</label>
              <input class="admin_submit4" type="button" name="delsub" value="ɾ����ѡ"  onclick="return really('del[]')"/></td>
            <td colspan="7" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
          </tr>
            </tbody>
          
        </table>
        <input type="hidden" name="pytoken"  id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
      </form>
    </div>
  </div>
  <?php } else { ?>
  <div class="admin_Filter">
    <form action="index.php" name="myforms" method="get"  id='myforms'>
      <input name="m" value="report" type="hidden"/>
      <input name="type" value="1" type="hidden"/>
      <span class="admin_Filter_span"> �������ͣ�</span> 
      <div class="admin_Filter_text formselect"  did='dp_type'>
        <input type="button" value="<?php if ($_GET['p_type']=='1'||$_GET['p_type']=='') {?>���ٱ���<?php } else { ?>�ٱ���<?php }?>" class="admin_Filter_but"  id="bp_type">
        <input type="hidden" id='p_type' value="<?php if ($_GET['p_type']) {
echo $_GET['p_type'];
} else { ?>1<?php }?>" name='p_type'>
        <div class="admin_Filter_text_box" style="display:none" id='dp_type'>
          <ul>
            <li><a href="javascript:void(0)" onClick="formselect('1','p_type','���ٱ���')">���ٱ���</a></li>
            <li><a href="javascript:void(0)" onClick="formselect('2','p_type','�ٱ���')">�ٱ���</a></li>
          </ul>
        </div>
      </div>
      <input class="admin_Filter_search" type="text" name="keyword"  size="25" style="float:left">
      <input  class="admin_Filter_bth"  type="submit" name="comquestion" value="����"/>
      <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
      <span class='admin_search_div'>
      <div class="admin_adv_search">
        <div class="admin_adv_search_bth">�߼�����</div>
      </div>
      </span>
    </form>
  </div>
  <?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <div class="table-list">
    <div class="admin_table_border"> 
      <form action="index.php" name="myform" method="get" id='myform'  target="supportiframe" >
        <input name="m" value="report" type="hidden"/>
        <input name="c" value="del" type="hidden"/>
        <table width="100%">
          <thead>
            <tr class="admin_table_top">
              <th><label for="chkall">
                  <input type="checkbox" id='chkAll'  onclick='CheckAll(this.form)'/>
                </label></th>
              <th> <?php if ($_GET['t']=="id"&&$_GET['order']=="asc") {?> <a href="<?php echo smarty_function_searchurl(array('type'=>1,'order'=>'desc','t'=>'id','m'=>'report','untype'=>'order,t,type'),$_smarty_tpl);?>
">���<img src="images/sanj.jpg"/></a> <?php } else { ?> <a href="<?php echo smarty_function_searchurl(array('type'=>1,'order'=>'asc','t'=>'id','m'=>'report','untype'=>'order,t,type'),$_smarty_tpl);?>
">���<img src="images/sanj2.jpg"/></a> <?php }?> </th>
              <th >���ٱ���</th>
              <th >�ٱ���</th> 
              <th >�ٱ���Դ</th>
              <th >�Ƿ���</th>
              <th >�ٱ�ԭ��</th>
              <th> <?php if ($_GET['t']=="inputtime"&&$_GET['order']=="asc") {?> <a href="<?php echo smarty_function_searchurl(array('type'=>1,'order'=>'desc','t'=>'inputtime','m'=>'report','untype'=>'order,t,type'),$_smarty_tpl);?>
">�ٱ�ʱ��<img src="images/sanj.jpg"/></a> <?php } else { ?> <a href="<?php echo smarty_function_searchurl(array('type'=>1,'order'=>'asc','t'=>'inputtime','m'=>'report','untype'=>'order,t,type'),$_smarty_tpl);?>
">�ٱ�ʱ��<img src="images/sanj2.jpg"/></a> <?php }?> </th>
              <th class="admin_table_th_bg">����</th>
            </tr>
          </thead>
          <tbody>
          
          <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['q_report']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
          <tr align="center" id="list<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
">
            <td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
"  name='del[]' onclick='unselectall()' rel="del_chk" /></td>
            <td align="left" class="td1"><span><?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
</span></td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['r']->value['r_name'];?>
</td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['r']->value['username'];?>
</td> 
            <td align="left"><?php if ($_smarty_tpl->tpl_vars['r']->value['is_del']) {?><font color="red"><?php echo $_smarty_tpl->tpl_vars['r']->value['is_del'];?>
</font><?php } elseif ($_smarty_tpl->tpl_vars['r']->value['status']!="1") {?> <a href="<?php echo $_smarty_tpl->tpl_vars['r']->value['url'];?>
" target="_blank"><?php echo mb_substr($_smarty_tpl->tpl_vars['r']->value['title'],0,20,'gbk');?>
</a> <?php } else { ?>
              <a href="<?php echo smarty_function_url(array('m'=>'ask','c'=>'content','id'=>$_smarty_tpl->tpl_vars['r']->value['eid']),$_smarty_tpl);?>
" target="_blank"><?php echo mb_substr($_smarty_tpl->tpl_vars['r']->value['title'],0,20,'gbk');?>
</a>
              <?php }?></td>
            <td id="status<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['r']->value['is_del']) {?><font color="red"><?php echo $_smarty_tpl->tpl_vars['r']->value['is_del'];?>
</font><?php } elseif ($_smarty_tpl->tpl_vars['r']->value['status']=="1") {?><a href="javascript:void(0);" onClick="rec_up('index.php?m=report&c=recommend','<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
','0','status');"><img src="../config/ajax_img/doneico.gif"></a><?php } else { ?><a href="javascript:void(0);" onClick="rec_up('index.php?m=report&c=recommend','<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
','1','status');"><img src="../config/ajax_img/errorico.gif"></a><?php }?></td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['r']->value['reason'];?>
</td>
            <td class="td"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['r']->value['inputtime'],"%Y-%m-%d %H:%M");?>
</td>
            <td><a href="index.php?m=admin_question&c=<?php echo $_smarty_tpl->tpl_vars['r']->value['c'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['r']->value['eid'];?>
&back_url=1" class="admin_cz_sc"> �޸��ʴ�</a> | <a href="javascript:void(0)" onClick="layer_del('ȷ��Ҫɾ����', 'index.php?m=report&c=del&del=<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
');" class="admin_cz_sc">ɾ��</a> | <a href="javascript:void(0)" onClick="layer_del('ȷ��Ҫɾ���ʴ�', 'index.php?m=report&c=delquestion&del=<?php echo $_smarty_tpl->tpl_vars['r']->value['eid'];?>
');" class="admin_cz_sc">ɾ���ʴ�</a></td>
          </tr>
          <?php } ?>
          <tr style="background:#f1f1f1;">
            <td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
            <td colspan="2" ><label for="chkAll2">ȫѡ</label>
              &nbsp;
              <input class="admin_submit4"   type="button" name="delsub" value="ɾ����ѡ" onClick="return really('del[]')" /></td>
            <td colspan="7" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
          </tr>
            </tbody>
          
        </table>
        <input type="hidden" name="pytoken"  id='pytoken' value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
      </form>
    </div>
  </div>
  <?php }?> 
  </div>
</body>
</html>
<?php }} ?>
