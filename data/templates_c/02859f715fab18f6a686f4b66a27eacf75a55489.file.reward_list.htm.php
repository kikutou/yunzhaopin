<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:20:32
         compiled from "/var/www/html/yunzhaopin/app/template/admin/reward_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:4578446859255060e1b038-46432685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02859f715fab18f6a686f4b66a27eacf75a55489' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/admin/reward_list.htm',
      1 => 1469270286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4578446859255060e1b038-46432685',
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
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59255060ec19a7_99021565',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59255060ec19a7_99021565')) {function content_59255060ec19a7_99021565($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.searchurl.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
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
		var linktel=$(this).attr("linktel"); 
		var express=$(this).attr("express"); 
		var expnum=$(this).attr("expnum"); 
		var linkman=$(this).attr("linkman"); 
		var body=$(this).attr("body"); 		
		$("#express").val(express);
		$("#expnum").val(expnum);
		$("#linktel").val(linktel);
		$("#linkman").val(linkman);
		$("#body").val(body);
		$("#status"+status).attr("checked",true);
		$("input[name=id]").val(id);  	 
		$.get("index.php?m=reward_list&c=statusbody&id="+id,function(msg){
			$("#alertcontent").val(msg);
			status_div('兑换记录审核','450','450');
		});
	});	
});
  
<?php echo '</script'; ?>
>
<link href="images/reset.css" rel="stylesheet" type="text/css" />
<link href="images/system.css" rel="stylesheet" type="text/css" />
<link href="images/table_form.css" rel="stylesheet" type="text/css" />
<title>后台管理</title>
</head>
<body class="body_ifm">
<div id="status_div"  style="display:none; width: 450px; ">
  <div id="infobox">
    <form action="index.php?m=reward_list&c=status" target="supportiframe" method="post" id="formstatus">
      <input type="hidden" name="pytoken" value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
      <table class="reward_table_box">
         <tr><th>联 系 人：</th><td> <input class="reward_table_box_text" type="text" id="linkman" name="linkman" size="30" value="" /></td></tr>
      <tr><th><div class="reward_table_box_l">联系电话：</div></th><td> <input class="reward_table_box_text" type="text" id="linktel" name="linktel" size="30" value="" /></td></tr>
   
      <tr><th>快递名称：</th><td> <input class="reward_table_box_text" type="text" id="express" name="express" size="30" placeholder="如：中通、圆通、邮政"/></td></tr>
      <tr><th>快递单号：</th><td> <input class="reward_table_box_text" type="text" id="expnum" name="expnum" size="30" value="" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/></td></tr>
      <tr><th>备注：</th><td>  <textarea id="body" name="body" class="admin_reward_textarea"></textarea></td></tr>
      <tr><th>审核操作：</th><td> 
      
      <div class="admin_examine_right">

      <label for="status0"><span class="admin_examine_table_s"><input type="radio" name="status" value="0" id="status0" >未审核</span></label>
      <label for="status1"><span class="admin_examine_table_s"><input type="radio" name="status" value="1" id="status1" >通过</span></label>
      <label for="status2"><span class="admin_examine_table_s"> <input type="radio" name="status" value="2" id="status2">未通过</span></label>
               </div>
               
               </td></tr>
      <tr><th>审核说明：</th><td><textarea id="alertcontent" name="statusbody" class="admin_reward_textarea"></textarea></th></tr>
      <tr><td colspan="2" align="center"> <input type="submit"  value='确认' class="admin_examine_bth" >
          <input type="button"  onClick="layer.closeAll();" class="admin_examine_bth_qx" value='取消'></th></tr>
      
      </table>
      
      <input name="id" value="0" type="hidden">
    </form>
  </div>
</div>
<div class="infoboxp">
  <div class="infoboxp_top_bg"></div>
  <form action="index.php" name="myform" method="get">
    <input name="m" value="reward_list" type="hidden"/>
    <div class="admin_Filter"> <span class="complay_top_span fl">兑换奖品记录</span>
      <div class="admin_Filter_span">检索类型：</div>
      <div class="admin_Filter_text formselect" did='dtype'>
        <input type="button" value="<?php if ($_GET['type']=='2') {?>会员名称<?php } else { ?>商品名称<?php }?>" class="admin_Filter_but" id="btype">
        <input type="hidden" name="type" id="type" value="<?php if ($_GET['type']=='2') {?>2<?php } else { ?>1<?php }?>"/>
        <div class="admin_Filter_text_box" style="display:none" id='dtype'>
          <ul>
            <li><a href="javascript:void(0)" onClick="formselect('1','type','商品名称')">商品名称</a></li>
            <li><a href="javascript:void(0)" onClick="formselect('2','type','会员名称')">会员名称</a></li>
          </ul>
        </div>
      </div>
      <input type="text" placeholder="输入你要搜索的关键字" value="<?php echo $_GET['keyword'];?>
" name='keyword' class="admin_Filter_search">
      <input type="submit" value="搜索" class="admin_Filter_bth">
      <span class='admin_search_div'>
      <div class="admin_adv_search">
        <div class="admin_adv_search_bth">高级搜索</div>
      </div>
      </span> </div>
  </form>
  <?php echo $_smarty_tpl->getSubTemplate ("admin/admin_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <div class="table-list">
    <div class="admin_table_border">
      <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" style="display:none"></iframe>
      <form action="index.php" target="supportiframe" name="myform" method="get" id='myform'>
        <input type="hidden" name="m" value="reward_list">
        <input type="hidden" name="c" value="del">
        <table width="100%">
          <thead>
            <tr class="admin_table_top">
              <th><label for="chkall">
                  <input type="checkbox" id='chkAll' onclick='CheckAll(this.form)'/>
                </label></th>
              <th align="left"> <?php if ($_GET['t']=="id"&&$_GET['order']=="asc") {?> <a href="<?php echo smarty_function_searchurl(array('order'=>'desc','t'=>'id','m'=>'reward_list','untype'=>'order,t'),$_smarty_tpl);?>
">ID<img src="images/sanj.jpg"/></a> <?php } else { ?> <a href="<?php echo smarty_function_searchurl(array('order'=>'asc','t'=>'id','m'=>'reward_list','untype'=>'order,t'),$_smarty_tpl);?>
">ID<img src="images/sanj2.jpg"/></a> <?php }?> </th>
              <th align="left">商品名称</th>
              <th>会员名称</th>
              <th>兑换数量</th>
              <th>兑换<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
</th>
              <th>兑换时间</th>
              <th>联系人</th>
              <th>联系电话</th>
              <th>审核状态</th>
              <th class="admin_table_th_bg">操作</th>
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
            <td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="check_all" name='del[]' onclick='unselectall()' rel="del_chk"<?php if ($_smarty_tpl->tpl_vars['v']->value['status']!='0') {?> disabled <?php }?>/></td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['num'];?>
件</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['integral'];?>
</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['ctime'],"%Y-%m-%d %H:%M:%S");?>
</td>
            <td align="left" ><?php echo $_smarty_tpl->tpl_vars['v']->value['linkman'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['linktel'];?>
</td>           
            <!-- <td id="status<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['status']=="1") {?><a href="javascript:void(0);" onClick="rec_up('index.php?m=reward_list&c=status','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','0','status');"><img src="../config/ajax_img/doneico.gif"></a><?php } else { ?><a href="javascript:void(0);" onClick="rec_up('index.php?m=reward_list&c=status','<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','1','status');"><img src="../config/ajax_img/errorico.gif"></a><?php }?></td>-->            
            <td><?php if ($_smarty_tpl->tpl_vars['v']->value['status']==1) {?><span class="admin_com_Audited">已审核</span><?php } elseif ($_smarty_tpl->tpl_vars['v']->value['status']==0) {?><span class="admin_com_noAudited">未审核</span><?php } elseif ($_smarty_tpl->tpl_vars['v']->value['status']==2) {?><span class="admin_com_tg">未通过</span><?php }?></td>
            <td><?php if ($_smarty_tpl->tpl_vars['v']->value['status']==0) {?><a href="javascript:void(0);" class="status admin_cz_sh" status="<?php echo $_smarty_tpl->tpl_vars['v']->value['status'];?>
" pid="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" linktel="<?php echo $_smarty_tpl->tpl_vars['v']->value['linktel'];?>
" linkman="<?php echo $_smarty_tpl->tpl_vars['v']->value['linkman'];?>
" body="<?php echo $_smarty_tpl->tpl_vars['v']->value['body'];?>
" express="<?php echo $_smarty_tpl->tpl_vars['v']->value['express'];?>
" expnum="<?php echo $_smarty_tpl->tpl_vars['v']->value['expnum'];?>
">审核</a>| <?php }?><a href="javascript:void(0)" onClick="layer_del('确定要删除？', 'index.php?m=reward_list&c=del&del=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
');"class="admin_cz_sc">删除</a></td>
          </tr>
          <?php } ?>
          <tr style="background:#f1f1f1;">
            <td align="center"><input type="checkbox" id='chkAll2' onclick='CheckAll2(this.form)' /></td>
            <td colspan="2" ><label for="chkAll2">全选</label>
              &nbsp;
              <input class="admin_submit4"  type="button" name="delsub" value="删除所选" onClick="return really('del[]')" />
              
			  </td>
            <td colspan="9" class="digg"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</td>
          </tr>
            </tbody>         
        </table>
        <input type="hidden" name="pytoken"  id='pytoken'  value="<?php echo $_smarty_tpl->tpl_vars['pytoken']->value;?>
">
      </form>
    </div>
  </div>
</div>
</body>
</html><?php }} ?>
