<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 16:27:42
         compiled from "/var/www/html/yunzhaopin/app/template/default/once/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:1602252313592543febe75f2-42900376%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1133c741e520a9f850eb26fc5445d27c9316b447' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/default/once/index.htm',
      1 => 1470048292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1602252313592543febe75f2-42900376',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'style' => 0,
    'config' => 0,
    'num' => 0,
    'oncekeyword' => 0,
    'keylist' => 0,
    'once' => 0,
    'uid' => 0,
    'pagenav' => 0,
    'total' => 0,
    'top_key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592543fec863f1_45787210',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592543fec863f1_45787210')) {function content_592543fec863f1_45787210($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
?><?php $once=array();global $db,$db_config,$config;eval('$paramer=array("item"=>"\'once\'","ispage"=>"1","limit"=>"20","keyword"=>"\'auto.keyword\'","nocache"=>"")
;');
		//��������������ҹ����ҳ����
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		$where = "`status`='1'  and `edate`>".time();
		if($config[did]){
			$where.=" AND `did`='".$config['did']."'";
		}
		//�ؼ���
		if($paramer[keyword]){
			$where.=" AND `title` LIKE '%".$paramer[keyword]."%' or `companyname` LIKE '%".$paramer[keyword]."%'";
		}
		if($paramer['delid']){
			$where.=" AND `id`<>'".$paramer['delid']."'";
		}
		//�����ֶ�Ĭ��Ϊ����ʱ��
		if($paramer[order]){
			$order = " ORDER BY `".str_replace("'","",$paramer[order])."`";
		}else{
			$order = " ORDER BY ctime ";
		}
		//������� Ĭ��Ϊ����
		if($paramer[sort]){
			$sort = $paramer[sort];
		}else{
			$sort = " DESC";
		}
		//��ѯ����
		if($paramer[limit]){
			$limit=" LIMIT ".$paramer[limit];
		}else{
			$limit=" LIMIT 20";
		}
		//�Զ����ѯ������Ĭ��ȡ�������κβ���ֱ��ʹ�ø����
		if($paramer[where]){
			$where = $paramer[where];
		}
		if($paramer[ispage]){
			$limit = PageNav($paramer,$_GET,"once_job",$where,$Purl,'','0',$_smarty_tpl);
		}
		$where.=$order.$sort.$limit;
		$once=$db->select_all("once_job",$where);
		if(is_array($once)){
			foreach($once as $key=>$value){
				$time=time()-$value['ctime'];
				if($time>86400 && $time<604800){
					$once[$key]['ctime'] = ceil($time/86400)."��ǰ";
				}elseif($time>3600 && $time<86400){
					$once[$key]['ctime'] = ceil($time/3600)."Сʱǰ";
				}elseif($time>60 && $time<3600){
					$once[$key]['ctime'] = ceil($time/60)."����ǰ";
				}elseif($time<60){
					$once[$key]['ctime'] = "�ո�";
				}else{
					$once[$key]['ctime'] = date("Y-m-d",$value['ctime']);
				}
			}
			if($paramer[keyword]!=""&&!empty($once)){
				addkeywords('1',$paramer[keyword]);
			}
		} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<META name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
">
<META name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css" type="text/css">
<!--[if IE 6]>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/png.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
DD_belatedPNG.fix('.png');
<?php echo '</script'; ?>
>
<![endif]-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/jquery-1.8.0.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/layer/layer.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/lazyload.min.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/public.js" language="javascript"><?php echo '</script'; ?>
>
<link href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/microresume.css" rel="stylesheet" type="text/css" />
<style>
* {
	margin:0;
	padding:0;
}
body, div {
	margin:0;
	padding:0;
}
.content_firm {
	float:left;
	width:100%;
	margin: 0 auto;
	position: relative;
}
</style>
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="yun_content">
  <div class="current_Location  com_current_Location png">
    <div class="fl">����ǰ��λ�ã�<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
">��ҳ</a> > <a href="<?php echo smarty_function_url(array('m'=>'once'),$_smarty_tpl);?>
">������Ƹ</a></div>
  </div>
  <div class="fast_issuance none" style="_position:absolute;" id="fabufast">
    <div class="fast_once_cont fl">
      <div class="fast-onxt_box">
      <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" class="none"></iframe>
      <form action="<?php echo smarty_function_url(array('m'=>'once'),$_smarty_tpl);?>
" target="supportiframe" method="post" onSubmit="return check_once_job()" enctype="multipart/form-data">
        <div class="once_fb_list"><span class="once_fb_list_span"><font color="red">* </font>������Ƹ��</span>
          <input  class="once_input_simple once_input_simple_w290" type="text" id="title" maxlength="15" name="title">
        </div>
         <div class="once_fb_list"><span class="once_fb_list_span"><font color="red">* </font>(����)���ƣ�</span>
          <input class="once_input_simple once_input_simple_w290" type="text" id="companyname" maxlength="15" name="companyname">
        </div>
        <div class="once_fb_list"><span class="once_fb_list_span"><font color="red">* </font>��ϵ�ˣ�</span>
          <input class="once_input_simple once_input_simple_w240" type="text" id="linkman" maxlength="15" name="linkman">
        </div>
        <div class="once_fb_list"><span class="once_fb_list_span"><font color="red">* </font> ��ϵ�绰��</span>
          <input class="once_input_simple once_input_simple_w240" type="text" id="phone" onkeyup="this.value=this.value.replace(/[^0-9-]/g,'')" maxlength="13" name="phone">
        </div>
        <div class="once_fb_list" style="margin-top:5px;"><span class="once_fb_list_span"><font color="red">* </font>��ƸҪ��</span>
          <textarea rows='6' class="once_simplew_textarea" id="require" onfocus="if(this.value=='����д��Ƹ�ľ���Ҫ���磺�Ա�ѧ�������䣬�������飬���ʴ����������Ϣ') this.value=''" onblur="this.value=this.value==''?'����д��Ƹ�ľ���Ҫ���磺�Ա�ѧ�������䣬�������飬���ʴ����������Ϣ':this.value" name="require">����д��Ƹ�ľ���Ҫ���磺�Ա�ѧ�������䣬�������飬���ʴ����������Ϣ</textarea>
        </div>
        <div class="once_fb_list" style="margin-top:5px;"><span class="once_fb_list_span">��������</span>
          <div class="once_fb_list_photo">
            <input type="file" id="pic" name="pic" class="" style="*width:200px;*height:23px;">
           </div>
        </div>
        <div class="once_fb_list"> <span class="once_fb_list_span"><font color="red">* </font>��Ƹ��Ч��(��)��</span>
          <input class="once_input_simple once_input_simple_w80" type="text" id="edate" style="width:80px" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"  maxlength="3" name="edate">  <span class="once_fb_list_tip" style="color:#333;">��</span>
        </div>
        <?php if (strpos($_smarty_tpl->tpl_vars['config']->value['code_web'],"������Ƹ")!==false) {?>
        <div class="once_fb_list"> <span class="once_fb_list_span"><font color="red">* </font>��֤�룺</span>
          <input id="authcode" class="once_input_simple once_input_simple_w80" type="text" maxlength="4" name="authcode">
          <a href="javascript:checkcodes();" class="fl"><img id="vcodeimgs" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" style="margin-left:10px;"></a>
          <!--<a href="javascript:check_code();"><img id="vcode_img" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php"/></a> �빫�õĵ�¼��������֤���ظ��˵��¹��õ�¼��������֤��û������-->
           </div>
        <?php } else { ?>
        <input id="authcode" type="hidden" value="12345" maxlength="4" name="authcode">
        <?php }?>
        <div class="once_fb_list"> <span class="once_fb_list_span"><font color="red">* </font>�������룺</span>
          <input class="once_input_simple once_input_simple_w140" type="password"  id="password" name="password" onkeyup="this.value=this.value.replace(/^ +| +$/g,'')">
          <span class="once_fb_list_tip">���������ˢ��/�޸�/ɾ����Ϣ��</span> </div>
        <div class="once_fb_list"> <span class="once_fb_list_span">&nbsp;</span>
          <input type="hidden" id="id" name="id"/>
          <input id="botton" class="uesr_submit once_fast_submit" type="submit" value="����" name="submit">
        </div>
        </form>
        </div>      
    </div>
  </div>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/fast.js" language="javascript"><?php echo '</script'; ?>
>
  <div class="clear"></div>
  <!--start-->
  <div class="recruit_micro">
    <div class="wrap">
      <div class="once_tips_cont"> <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/once_bg.jpg" width="1200" height="204">
        <div class="once_tips_bg">
          <div class="once_tips_h1">���������й�</div>
          <div class="once_tips_p">����ע�ᣬ���ٷ�����Ƹ�����Ϣ��
            ����Ҳ���õ�����,����Ҳ������Ƹ���</div>
          <div class="once_tips_fab"> <a href='javascript:;' <?php if ($_smarty_tpl->tpl_vars['num']->value) {?>onclick="showfabu()"<?php } else { ?>onclick="layer.msg('ÿ�����ɷ���<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_once'];?>
�ݵ�����Ƹ��',2,8)"<?php }?> class="recruit_user_public">����������Ƹ</a> </div>
        </div>
      </div>
      <div class="res_search">
        <div class="res_search_con ">
          <form method="get" name="myform" onsubmit="return check_once_keyword();" action="<?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_oncedir']) {?>index.php<?php } else {
echo smarty_function_url(array('m'=>'once'),$_smarty_tpl);
}?>">
            <div class="res_key"> <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_oncedir']) {?>
              <input type="hidden" value="once" name="m" />
              <?php }?>
              <input  class="res_key_txt" id="Fastkeyword" type="text" value="������Ҫ�����Ĺؼ���" onclick="if(this.value=='������Ҫ�����Ĺؼ���'){this.value=''}" onblur="if(this.value==''){this.value='������Ҫ�����Ĺؼ���'}" name="keyword">
              <input class="res_key_btn yun_bg_color" type="submit" value="����">
            </div>
          </form>
          <?php if ($_smarty_tpl->tpl_vars['oncekeyword']->value) {?>
          <div class="res_hot"> ����������
            <?php  $_smarty_tpl->tpl_vars['keylist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['keylist']->_loop = false;
global $config;eval('$paramer=array("limit"=>"12","type"=>"1","item"=>"\'keylist\'","nocache"=>"")
;');$list=array();
		//�Ƿ��Ƽ�
		if($paramer[recom]){
			$tuijian = 1;
		}
		//���
		if($paramer[type]){
			$type = $paramer[type];
		}
		//��ѯ����
		if($paramer[limit]){
			$limit=$paramer[limit];
		}else{
			$limit=20;
		}
		include PLUS_PATH."/keyword.cache.php";
		if($paramer[iswap]){
			$wap = "/wap";
		}else{
			$index =1;
		}
		if(is_array($keyword)){
			if($paramer[iswap]){
				$i=0;
				foreach($keyword as $k=>$v){
					if($tuijian && $v[tuijian]!=1){
						continue;
					}
					if($type && $v[type]!=$type){
						continue;
					}

					$i++;
					if($v[type]=="1"){
						$v[url] = Url("wap",array("c"=>"once","keyword"=>$v['key_name']));
						$v[type_name]='������Ƹ';
					}elseif($v['type']=="13"){
						$v['url'] = Url("wap",array("c"=>"tiny","keyword"=>$v['key_name']));
						$v['type_name']='�չ�����';
					}elseif($v[type]=="3"){
						$v[url] = Url("wap",array("c"=>"job","keyword"=>$v['key_name']));
						$v[type_name]='ְλ';
					}elseif($v['type']=="4"){
						$v['url'] = Url("wap",array("c"=>"company","keyword"=>$v['key_name']));
						$v['type_name']='��˾';
					}elseif($v['type']=="5"){
						$v['url'] = Url("wap",array("c"=>"resume","keyword"=>$v['key_name']));
						$v['type_name']='�˲�';
					}
					$v['key_title']=$v['key_name'];
					if($v['color']){
						$v['key_name']="<font color=\"".$v['color']."\">".$v['key_name']."</font>";
					}
					$list[] = $v;
					if($i==$limit){
						break;
					}
				}
			}else{
				$i=0;
				foreach($keyword as $k=>$v){
					if($tuijian && $v['tuijian']!=1){
						continue;
					}
					if($type && $v['type']!=$type){
						continue;
					}
					$i++;
					if($v['type']=="1"){
						$v['url'] = Url("once",array("keyword"=>$v['key_name']));
						$v['type_name']='������Ƹ';
					}elseif($v['type']=="2"){
						$v['url'] = Url("part",array("keyword"=>$v['key_name']));
						$v['type_name']='��ְ';
					}elseif($v['type']=="13"){
						$v['url'] = Url("tiny",array("keyword"=>$v['key_name']));
						$v['type_name']='�չ�����';
					}elseif($v['type']=="3"){
						$v['url'] = Url("job",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='ְλ';
					}elseif($v['type']=="4"){
						$v['url'] = Url("company",array("keyword"=>$v['key_name']));
						$v['type_name']='��˾';
					}elseif($v['type']=="5"){
						$v['url'] = Url("resume",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='�˲�';
					} else if($v['type']=="12"){
						$v['url'] = Url("ask",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='�ʴ�';
					}
					$v['key_title']=$v['key_name'];
					if($v['color']){
						$v['key_name']="<font color=\"".$v['color']."\">".$v['key_name']."</font>";
					}

					$list[] = $v;
					if($i==$limit){
						break;
					}
				}
			}
		}$list = $list; if (!is_array($list) && !is_object($list)) { settype($list, 'array');}
foreach ($list as $_smarty_tpl->tpl_vars['keylist']->key => $_smarty_tpl->tpl_vars['keylist']->value) {
$_smarty_tpl->tpl_vars['keylist']->_loop = true;
?> <a href="<?php echo $_smarty_tpl->tpl_vars['keylist']->value['url'];?>
"> <?php echo $_smarty_tpl->tpl_vars['keylist']->value['key_name'];?>
</a> <?php } ?> </div>
          <?php } else { ?>
          <div class="res_hot">&nbsp;</div>
          <?php }?> </div>
      </div>
      <div class="recruit_micro_list">
        <div class="recruit_micro_list01" style="padding-top:0px;">
          <ul>
            <?php  $_smarty_tpl->tpl_vars['once'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['once']->_loop = false;
$once = $once; if (!is_array($once) && !is_object($once)) { settype($once, 'array');}
foreach ($once as $_smarty_tpl->tpl_vars['once']->key => $_smarty_tpl->tpl_vars['once']->value) {
$_smarty_tpl->tpl_vars['once']->_loop = true;
?>
           
            <li>
              <div class="recruit_list_title">   <a href="<?php echo smarty_function_url(array('m'=>'once','c'=>'show','id'=>'`$once.id`'),$_smarty_tpl);?>
"><?php echo mb_substr($_smarty_tpl->tpl_vars['once']->value['title'],0,11,'gbk');?>
</a></div>
              <div class="recruit_list_detail"><?php echo mb_substr($_smarty_tpl->tpl_vars['once']->value['require'],0,100,'gbk');?>
</div>
              <div class="recruit_list_link"> 
              <?php if ($_smarty_tpl->tpl_vars['config']->value['user_wzp_link']==1&&$_smarty_tpl->tpl_vars['uid']->value<=0) {?>
                <div class="recruit_list_name fl"><a href="javascript:void(0);" onclick="showlogin('');" style="color:#f60;">[��¼]</a> ��ſ��Բ鿴��ϵ��ʽ</div>
             <?php } else { ?>
                <?php if ($_smarty_tpl->tpl_vars['once']->value['phone']) {?>
                <div class="recruit_list_name fl">��ϵ�绰��    <?php echo $_smarty_tpl->tpl_vars['once']->value['phone'];?>
</div>
                <?php }?>
                <?php }?>
                <div class="recruit_list_name fl">�� ϵ �� ��<?php echo $_smarty_tpl->tpl_vars['once']->value['linkman'];?>
</div>
                
              </div>
            </li>
            <?php } ?>
          </ul>
          <?php if ($_smarty_tpl->tpl_vars['pagenav']->value) {?>
          <div class="clear"></div>
          <div class="pages"> <?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['total']->value==0) {?>
          <div style="width:640px; margin:0 auto">
          <div class="seachno" style="background:#FFF; width:614px;">
            <div class="seachno_left"> <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/search-no.gif"></div>
            <div class="listno-content"> <strong>�ܱ�Ǹ��û���ҵ�����������ְλ</strong><br>
              <span> ��������<br>
              1���ʵ�������ѡ�������<br>
              2���ʵ�ɾ������������ؼ���<br>
              </span> <span> ���Źؼ��֣�<br>
              <?php  $_smarty_tpl->tpl_vars['top_key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['top_key']->_loop = false;
global $config;eval('$paramer=array("limit"=>"6","recom"=>"1","type"=>"1","item"=>"\'top_key\'","nocache"=>"")
;');$list=array();
		//�Ƿ��Ƽ�
		if($paramer[recom]){
			$tuijian = 1;
		}
		//���
		if($paramer[type]){
			$type = $paramer[type];
		}
		//��ѯ����
		if($paramer[limit]){
			$limit=$paramer[limit];
		}else{
			$limit=20;
		}
		include PLUS_PATH."/keyword.cache.php";
		if($paramer[iswap]){
			$wap = "/wap";
		}else{
			$index =1;
		}
		if(is_array($keyword)){
			if($paramer[iswap]){
				$i=0;
				foreach($keyword as $k=>$v){
					if($tuijian && $v[tuijian]!=1){
						continue;
					}
					if($type && $v[type]!=$type){
						continue;
					}

					$i++;
					if($v[type]=="1"){
						$v[url] = Url("wap",array("c"=>"once","keyword"=>$v['key_name']));
						$v[type_name]='������Ƹ';
					}elseif($v['type']=="13"){
						$v['url'] = Url("wap",array("c"=>"tiny","keyword"=>$v['key_name']));
						$v['type_name']='�չ�����';
					}elseif($v[type]=="3"){
						$v[url] = Url("wap",array("c"=>"job","keyword"=>$v['key_name']));
						$v[type_name]='ְλ';
					}elseif($v['type']=="4"){
						$v['url'] = Url("wap",array("c"=>"company","keyword"=>$v['key_name']));
						$v['type_name']='��˾';
					}elseif($v['type']=="5"){
						$v['url'] = Url("wap",array("c"=>"resume","keyword"=>$v['key_name']));
						$v['type_name']='�˲�';
					}
					$v['key_title']=$v['key_name'];
					if($v['color']){
						$v['key_name']="<font color=\"".$v['color']."\">".$v['key_name']."</font>";
					}
					$list[] = $v;
					if($i==$limit){
						break;
					}
				}
			}else{
				$i=0;
				foreach($keyword as $k=>$v){
					if($tuijian && $v['tuijian']!=1){
						continue;
					}
					if($type && $v['type']!=$type){
						continue;
					}
					$i++;
					if($v['type']=="1"){
						$v['url'] = Url("once",array("keyword"=>$v['key_name']));
						$v['type_name']='������Ƹ';
					}elseif($v['type']=="2"){
						$v['url'] = Url("part",array("keyword"=>$v['key_name']));
						$v['type_name']='��ְ';
					}elseif($v['type']=="13"){
						$v['url'] = Url("tiny",array("keyword"=>$v['key_name']));
						$v['type_name']='�չ�����';
					}elseif($v['type']=="3"){
						$v['url'] = Url("job",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='ְλ';
					}elseif($v['type']=="4"){
						$v['url'] = Url("company",array("keyword"=>$v['key_name']));
						$v['type_name']='��˾';
					}elseif($v['type']=="5"){
						$v['url'] = Url("resume",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='�˲�';
					} else if($v['type']=="12"){
						$v['url'] = Url("ask",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='�ʴ�';
					}
					$v['key_title']=$v['key_name'];
					if($v['color']){
						$v['key_name']="<font color=\"".$v['color']."\">".$v['key_name']."</font>";
					}

					$list[] = $v;
					if($i==$limit){
						break;
					}
				}
			}
		}$list = $list; if (!is_array($list) && !is_object($list)) { settype($list, 'array');}
foreach ($list as $_smarty_tpl->tpl_vars['top_key']->key => $_smarty_tpl->tpl_vars['top_key']->value) {
$_smarty_tpl->tpl_vars['top_key']->_loop = true;
?> <a href="<?php echo $_smarty_tpl->tpl_vars['top_key']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['top_key']->value['key_name'];?>
</a> <?php } ?> </span> </div>
          </div> </div>
          <?php }?> </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!--end--> 
</div>
<!--������-->
<div class="none" id="postpw">
  <div>
    <ul class="micro_resume_release_list">
      <li><span><font color="#FF3300">*</font> ���룺</span>
        <input id="pw" type='password' class="micro_resume_release_text" style='width:100px'/>
        <em style="line-height:28px; display:inline-block; margin-left:5px;">���������ʱ�����롣</em> </li>
      <li><span><font color="#FF3300">*</font> ��֤�룺</span>
        <input type="text" id="code" class="micro_resume_release_text micro_resume_release_text2" style='width:100px'/>
        <a href="javascript:check_codes();"><img id="vcode_imgs" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php"></a> 
        <!--a href="javascript:check_codes();">�����壬��һ��</a--> 
      </li>
      <li><span>&nbsp; </span>
        <input type="hidden" id="tid"/>
        <input type="hidden" id="type"/>
        <input class="fast_submit" type="button" value="�ύ" onclick="post_pass();">
      </li>
    </ul>
  </div>
</div>
<!--������ end--> 
<?php echo '<script'; ?>
 type="text/javascript"> 
$(document).ready(function(){
	$(window).scroll(function(){
		var scroll_Top = $(window).scrollTop();
		var width=document.body.clientWidth;
		if(scroll_Top>520){
			if(window.XMLHttpRequest){
				var top=0;
				var right=(width-970)/2+"px";
			}else{
				var top=parseInt(scroll_Top)-(520);
				var right=0;
			}
			$(".Fast_left").attr("style","position:fixed;top:"+top+"px;_position:absolute;right:"+right+";");
		}else{
			$(".Fast_left").attr("style","");
		}
	});
});
<?php echo '</script'; ?>
> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/login.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
