<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 16:28:19
         compiled from "/var/www/html/yunzhaopin/app/template/default/tiny/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:132643147559254423e3e398-55418160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8121f0a223ab74ff465f1d720f894a46f91b35e4' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/default/tiny/index.htm',
      1 => 1470383114,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132643147559254423e3e398-55418160',
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
    'add_time' => 0,
    'getinfo' => 0,
    'key' => 0,
    'v' => 0,
    'keylist' => 0,
    'wres' => 0,
    'uid' => 0,
    'total' => 0,
    'pagenav' => 0,
    'onshow' => 0,
    'userdata' => 0,
    'userclass_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5925442405b324_68785780',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5925442405b324_68785780')) {function content_5925442405b324_68785780($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
?><?php global $db,$db_config,$config;eval('$paramer=array("add_time"=>"\'auto.add_time\'","item"=>"\'wres\'","ispage"=>"1","limit"=>"20","keyword"=>"\'auto.keyword\'","nocache"=>"")
;');$wres=array();
		include PLUS_PATH."/user.cache.php";
		//��������������ҹ����ҳ����
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		$where = "status='1' ";
		
		//�ؼ���
		if($paramer[keyword]){
			$where.=" AND `username` LIKE '%".$paramer[keyword]."%' or `job` LIKE '%".$paramer[keyword]."%'";
		}
		if($config[did]){
			$where.=" AND `did`='".$config['did']."'";
		}
		if($paramer['add_time']>0){
			$time=time()-$paramer['add_time']*86400;
			$where.=" and `time`>".$time;
		}
		if($paramer['delid']){
			$where.=" AND `id`<>'".$paramer['delid']."'";
		}
		//�����ֶ�Ĭ��Ϊ����ʱ��
		if($paramer['order']){
			$order = " ORDER BY `".str_replace("'","",$paramer[order])."`";
		}else{
			$order = " ORDER BY time ";
		}
		//������� Ĭ��Ϊ����
		if($paramer['sort']){
			$sort = $paramer['sort'];
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
			$limit = PageNav($paramer,$_GET,"resume_tiny",$where,$Purl,'','0',$_smarty_tpl);
		}
		$where.=$order.$sort.$limit;
		$wres=$db->select_all("resume_tiny",$where);
		if(is_array($wres)){
			foreach($wres as $key=>$value){
				$time=$value['time'];
         //���쿪ʼʱ���
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
        //���쿪ʼʱ���
        $beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
        //һ����ʱ���
        $week=strtotime(date("Y-m-d",strtotime("-1 week")));
				if($time>$week && $time<$beginYesterday){
					$wres[$key]['time'] = "һ����";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$wres[$key]['time'] = "����";
				}elseif($time>$beginToday){
					$wres[$key]['time'] = "����";
				}else{
					$wres[$key]['time'] = date("Y-m-d",$value['time']);
				}
				$wres[$key]['sex_name'] =$userclass_name[$value['sex']];
				$wres[$key]['exp_name'] =$userclass_name[$value['exp']];
			}
		}
		if(is_array($wres)){
			if($paramer[keyword]!=""&&!empty($wres)){
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
<link href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/microresume.css" rel="stylesheet" type="text/css" />
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
<?php echo '<script'; ?>
>var integral_pricename='<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
';var weburl="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
"; <?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/fast.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/index.js" type="text/javascript"><?php echo '</script'; ?>
>
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/index_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="micro_resume_bg">
  <div class="micro_resume">
    <div class="micro_resume_cont">
      <div class="current_Location  com_current_Location png">
        <div class="fl">����ǰ��λ�ã�<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
</a> > <a href="<?php echo smarty_function_url(array('m'=>'tiny'),$_smarty_tpl);?>
">�չ�����</a></div>
      </div>
      <div class="resume_ban">
        <div class="resume_banner"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/resume_banner.jpg" width="1200" height="213px"/> </div>
        <div class="resume_con">
          <div class="resume_con_tit yun_text_color"><b>�չ�����</b>��ְ<b>�·���</b>��������һ���궯����</div>
          <div class="resume_con_fb"> <a href='javascript:void(0);' <?php if ($_smarty_tpl->tpl_vars['num']->value>0||$_smarty_tpl->tpl_vars['config']->value['sy_tiny']==0) {?>onclick="showfabu1()"<?php } else { ?>onclick="layer.msg('ÿ��IPÿ�����ɷ���<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_tiny'];?>
���չ�������',2,8)"<?php }?> title="�����չ�����" class="res_con_fb" style="margin-left:80px;">�����չ�����</a> 
           </div>
        </div>
      </div>
<?php echo '<script'; ?>
 type="text/javascript">
$(function(){
	$(".res_time").hover(function(){
		$(this).addClass("res_time_det");
		$(this).find("#res_menu").show();
		
	},function(){
		$(this).removeClass("res_time_det");
		$(this).find("#res_menu").hide();		
	});
});
function selects(val,name){
	$("#add_time").val(val);	
	$('#add_times').html(name)
	$("#res_menu").hide();
}
<?php echo '</script'; ?>
>
      <div class="res_search">
        <div class="res_search_con ">
          <form action="<?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_tinydir']) {?>index.php<?php } else {
echo smarty_function_url(array('m'=>'tiny'),$_smarty_tpl);
}?>"   method="get" onsubmit="return search_keyword(this,'����������ؼ���');">
            <div class="res_time ">
              <div class="res_time_con"> <span id="add_times"><?php if ($_GET['add_time']) {
echo $_smarty_tpl->tpl_vars['add_time']->value[$_GET['add_time']];
} else { ?>����<?php }?></span> <i></i> </div>
              <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_tinydir']) {?>
              <input type="hidden" value="tiny" name="m" />
              <?php }?>
              <input type="hidden" name="add_time" id="add_time" value="<?php echo $_smarty_tpl->tpl_vars['getinfo']->value['val'];?>
" />
              <ul class="none" id="res_menu">
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['add_time']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <li onclick="selects('<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
');"><a href="javascript:;"> <?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a></li>
                <?php } ?>
              </ul>
            </div>
            <div class="res_key">
              <input id="key_word" class="res_key_txt" type="text" value="����������ؼ���" name="keyword" onclick="if(this.value=='����������ؼ���'){this.value=''}" placeholder="����������ؼ���" onblur="if(this.value==''){this.value='����������ؼ���'}">
              <input type="submit"  value="����" id="search_button" class="res_key_btn yun_bg_color"/>
            </div>
          </form> 
          <div class="res_hot" > ����������
            <?php  $_smarty_tpl->tpl_vars['keylist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['keylist']->_loop = false;
global $config;eval('$paramer=array("limit"=>"8","type"=>"13","item"=>"\'keylist\'","nocache"=>"")
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
          <div class="res_hot" style="width:470px;">&nbsp;</div>
           </div>
      </div>
      <div class="decline">
       <?php  $_smarty_tpl->tpl_vars['wres'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['wres']->_loop = false;
$wres = $wres; if (!is_array($wres) && !is_object($wres)) { settype($wres, 'array');}
foreach ($wres as $_smarty_tpl->tpl_vars['wres']->key => $_smarty_tpl->tpl_vars['wres']->value) {
$_smarty_tpl->tpl_vars['wres']->_loop = true;
?>
       
          <div class="dec_det">
            <div class="dec_det_con">    
              <div class="mini_tit"> <span class="mini_tit_h1"> <a href="<?php echo smarty_function_url(array('m'=>'tiny','c'=>'show','id'=>$_smarty_tpl->tpl_vars['wres']->value['id']),$_smarty_tpl);?>
" ><?php echo mb_substr($_smarty_tpl->tpl_vars['wres']->value['job'],0,30,'gbk');?>
</a></span> <span class="mini_tit_time"> <?php if ($_smarty_tpl->tpl_vars['wres']->value['time']=='����'||$_smarty_tpl->tpl_vars['wres']->value['time']=='����') {?> <span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['wres']->value['time'];?>
</span> <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['wres']->value['time'];?>

                <?php }?></span> </div>
              <div class="mini_det"> <?php echo $_smarty_tpl->tpl_vars['wres']->value['username'];?>
 <i>/</i> <?php echo $_smarty_tpl->tpl_vars['wres']->value['sex_name'];?>
 <i>/</i> <?php echo $_smarty_tpl->tpl_vars['wres']->value['exp_name'];?>
 <i>/</i> <?php if ($_smarty_tpl->tpl_vars['config']->value['user_wjl_link']==1&&$_smarty_tpl->tpl_vars['uid']->value<=0) {?> <span>��¼�鿴������Ϣ<a href="javascript:void(0);" onclick="showlogin('');" class="tiny_login">��¼</a></span> <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['wres']->value['mobile'];?>

                <?php }?> </div>
              <div class="mini_con"><?php echo mb_substr($_smarty_tpl->tpl_vars['wres']->value['production'],0,100,'gbk');?>
</div>
            </div>
        
          </a>
        </div>
        <?php } ?> </div>
      <div class="clear"></div>
      <?php if ($_smarty_tpl->tpl_vars['total']->value!=0) {?>
      <div class="pages"> <?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['total']->value==0) {?>
      <div class="seachno" style="background:#FFF; width:525px; padding-left:400px;">
        <div class="seachno_left"> <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/search-no.gif" width="144" height="102"></div>
        <div class="listno-content" style="margin-left:30px;"> <strong>�ܱ�Ǹ��û���ҵ����������ļ���</strong><br>
          <span> ��������<br>
          1���ʵ�������ѡ�������<br>
          2���ʵ�ɾ������������ؼ���<br>
          </span> </div>
      </div>
      <?php }?> </div>
  </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
function checksex(id){
	
	$('.yun_info_sex_cur').removeClass('yun_info_sex_cur');
	$("#sex"+id).addClass('yun_info_sex_cur');
	$("#sex").val(id);
	
}

<?php echo '</script'; ?>
>
<div class="none" id="fabufast1">
  <div >
    <iframe id="supportiframe"  name="supportiframe" onload="returnmessage('supportiframe');" class="none"></iframe>
    <form  method="post" action="<?php echo smarty_function_url(array('m'=>'tiny'),$_smarty_tpl);?>
" onSubmit="return check_resume_tiny()" target="supportiframe">
      <ul class="micro_resume_release_list">
        <li><span class="once_fb_list_span"><font color="#FF3300">*</font> ������</span>
          <input  type="text" value="<?php echo $_smarty_tpl->tpl_vars['onshow']->value['username'];?>
" name="username" id="username" class="micro_resume_release_text">
        </li>
        <li><span class="once_fb_list_span"><font color="#FF3300">*</font>�Ա�</span> 
          <!--      yun_info_sex_cur ��������״̬-->
          
          <input type="hidden" id="sex" name="sex" value="<?php echo $_smarty_tpl->tpl_vars['onshow']->value['sex'];?>
" />
          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_sex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <span class="yun_info_sex <?php if ($_smarty_tpl->tpl_vars['onshow']->value['sex']==$_smarty_tpl->tpl_vars['v']->value) {?>yun_info_sex_cur<?php }?>" id="sex<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" onclick="checksex('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
')"><i class="usericon_sex usericon_sex<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
"></i><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</span> <?php } ?> 
          
        </li>
        <li><span  class="once_fb_list_span"><font color="#FF3300">*</font> ��ϵ�ֻ���</span>
          <input type="text" name="mobile" id="mobile" value="<?php echo $_smarty_tpl->tpl_vars['onshow']->value['mobile'];?>
" class="once_input_simple once_input_simple_w240" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"/>
        </li>
        <li><span class="once_fb_list_span"><font color="#FF3300">*</font> �������ޣ�</span>
          <div class="micro_resume_text1" style="border:none ">
            <select id="exp" name="exp" style="*margin-top:5px;">                          
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_word']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
              <option value='<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
' <?php if ($_smarty_tpl->tpl_vars['onshow']->value['exp']==$_smarty_tpl->tpl_vars['v']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</option>
            <?php } ?>
            </select>
          </div>
        </li>
        <li><span class="once_fb_list_span"><font color="#FF3300">*</font> ����ʲô��������</span>
          <input type="text" id="job" name="job" value="<?php echo $_smarty_tpl->tpl_vars['onshow']->value['job'];?>
" class="once_input_simple once_input_simple_w240"/>
          <span class="once_fb_list_tip"> �磺��װ��������</span> </li>
        <li><span class="once_fb_list_span">���ҽ��ܣ�</span>
          <textarea id="production" name="production" class="once_simplew_textarea"placeholder="���������ó��ļ��ܣ����磺������������ܳԿ�����"><?php echo $_smarty_tpl->tpl_vars['onshow']->value['production'];?>
</textarea>
        </li>
        <li class="add"><span class="once_fb_list_span"><font color="#FF3300">*</font>�������룺</span>
          <input type="password" name="password" id="password" value="" class="micro_resume_release_text" style='width:100px' onkeyup="this.value=this.value.replace(/^ +| +$/g,'')"/>
          <em style="line-height:35px; display:inline-block; margin-left:5px;">���������ˢ��/�޸�/ɾ����Ϣ��</em> </li>
        <li class="add"><span class="once_fb_list_span"><font color="#FF3300">*</font> ��֤�룺</span>
          <input type="text" id="authcode" name="authcode" class="micro_resume_release_text micro_resume_release_text2" maxlength="4"/>
          <!--<a href="javascript:check_code();"><img id="vcode_img" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php"/></a> �빫�õĵ�¼��������֤���ظ��˵��¹��õ�¼��������֤��û������-->
          <a href="javascript:checkcodes();"><img id="vcodeimgs" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php"></a> 
          <!--a href="javascript:check_code();">��һ��</a--> 
        </li>
        <li><span class="once_fb_list_span">&nbsp; </span>
          <input type="hidden" name="id" id="id" value="<?php echo $_smarty_tpl->tpl_vars['onshow']->value['id'];?>
"/>
          <input class="uesr_submit once_fast_submit" type="submit" value="����" id="botton" name="submit" >
        </li>
      </ul>
    </form>
  </div>
</div>
<div class="none" id="postpw">
  <div>
    <ul class="micro_resume_release_list">
      <li><span><font color="#FF3300">*</font> ���룺</span>
        <input id="pw" type="password" value="" class="micro_resume_release_text" style='width:100px'/>
        <em style="line-height:28px; display:inline-block; margin-left:5px;">���������ʱ�����롣</em> </li>
      <li><span><font color="#FF3300">*</font> ��֤�룺</span>
        <input type="text" id="code" class="micro_resume_release_text micro_resume_release_text2" style='width:100px'/>
        <a href="javascript:check_codes();"><img id="vcode_imgs" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php"></a> 
        <!--a href="javascript:check_codes();">��һ��</a--> 
      </li>
      <li><span>&nbsp; </span>
        <input type="hidden" id="tid"/>
        <input type="hidden" id="type"/>
        <input class="fast_submit" type="button" value="�ύ" onclick="post_password();">
      </li>
    </ul>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/login.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
