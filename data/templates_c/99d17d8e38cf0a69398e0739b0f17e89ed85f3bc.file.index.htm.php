<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 16:28:28
         compiled from "/var/www/html/yunzhaopin/app/template/default/zph/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:17417811285925442c8a6ac1-09394515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99d17d8e38cf0a69398e0739b0f17e89ed85f3bc' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/default/zph/index.htm',
      1 => 1470048346,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17417811285925442c8a6ac1-09394515',
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
    'zphs' => 0,
    'zph' => 0,
    'total' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5925442c994500_59923151',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5925442c994500_59923151')) {function content_5925442c994500_59923151($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/modifier.date_format.php';
?><?php $zphs=array();$time=time();eval('$paramer=array("item"=>"\'zphs\'","limit"=>"1","nocache"=>"")
;');
		global $db,$db_config,$config;
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		$where = "1";
		if($config['did']){
			$where.=" and `did`='".$config['did']."'";
		}
		$time = date("Y-m-d",time());
		//未开始
		if($paramer[state]=='1'){//尚未开始
			$where .=" AND `starttime`>'$time'";
		}elseif($paramer[state]=='2'){//进行中
			$where .=" AND `starttime`<'$time' AND `endtime`>'$time'";
		}elseif($paramer[state]=='3'){//已结束
			$where .=" AND `endtime`<'$time'";
		}else{//尚未结束
			$where .=" AND `endtime`>'$time'";
		}
		
		
		//查询条数
		if($paramer[limit]){
			$limit=" LIMIT ".$paramer[limit];
		}else{
			$limit=" LIMIT 20";
		}
		if($paramer[ispage]){
			$limit = PageNav($paramer,$_GET,"zhaopinhui",$where,$Purl,"",6,$_smarty_tpl);
		}
		//排序字段（默认按照开始时间排序）
		if($paramer[order]){
			$where .= " ORDER BY $paramer[order] ";
		}else{
			$where .= " ORDER BY `starttime` ";
		}
		//排序规则（默认按照开始时间排序倒序）
		if($paramer[sort]){
			$where .= " $paramer[sort]";
		}else{
			$where .= " DESC ";
		}
		$zphs=$db->select_all("zhaopinhui",$where.$limit);
		if(is_array($zphs)){
			foreach($zphs as $key=>$v){
				$array_zid[]=$v[id];
			}
			$rows=$db->select_all("zhaopinhui_com","`zid` in (".implode(',',$array_zid).") and `status`=1","`uid`,`zid`,`jobid`");
			$zph_com=array();
			foreach($rows as $key=>$v){ 
				$jobarr=explode(',',$v[jobid]);
				$zph_com[$v[zid]][comnum]++;
				$zph_com[$v[zid]][jobnum]=$zph_com[$v[zid]][jobnum]+count($jobarr);
			}
			
			foreach($zphs as $key=>$v){
				$zphs[$key]["stime"]=strtotime($v[starttime])-mktime();
				$comnum=$zph_com[$v[id]][comnum]?$zph_com[$v[id]][comnum]:0;
				$jobnum=$zph_com[$v[id]][jobnum]?$zph_com[$v[id]][jobnum]:0;
				$zphs[$key]["comnum"]=$comnum;
				$zphs[$key]["jobnum"]=$jobnum;
				
				$zphs[$key]["etime"]=strtotime($v[endtime])-mktime();
				if($paramer[len]){
					$zphs[$key]["title"]=mb_substr($v['title'],0,$paramer[len],"GBK");
				}
				$zphs[$key]["url"]=Url("zph",array("c"=>'show',"id"=>$v['id']),"1");
				 $weekarray=array("日","一","二","三","四","五","六",);            
                $zphs[$key]["week"] = $weekarray[date('w',strtotime($v['starttime']))];		
			}
		} ?>
<?php $zph=array();$time=time();eval('$paramer=array("ispage"=>"1","item"=>"\'zph\'","limit"=>"10","nocache"=>"")
;');
		global $db,$db_config,$config;
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		$where = "1";
		if($config['did']){
			$where.=" and `did`='".$config['did']."'";
		}
		$time = date("Y-m-d",time());
		//未开始
		if($paramer[state]=='1'){//尚未开始
			$where .=" AND `starttime`>'$time'";
		}elseif($paramer[state]=='2'){//进行中
			$where .=" AND `starttime`<'$time' AND `endtime`>'$time'";
		}elseif($paramer[state]=='3'){//已结束
			$where .=" AND `endtime`<'$time'";
		}else{//尚未结束
			$where .=" AND `endtime`>'$time'";
		}
		
		
		//查询条数
		if($paramer[limit]){
			$limit=" LIMIT ".$paramer[limit];
		}else{
			$limit=" LIMIT 20";
		}
		if($paramer[ispage]){
			$limit = PageNav($paramer,$_GET,"zhaopinhui",$where,$Purl,"",6,$_smarty_tpl);
		}
		//排序字段（默认按照开始时间排序）
		if($paramer[order]){
			$where .= " ORDER BY $paramer[order] ";
		}else{
			$where .= " ORDER BY `starttime` ";
		}
		//排序规则（默认按照开始时间排序倒序）
		if($paramer[sort]){
			$where .= " $paramer[sort]";
		}else{
			$where .= " DESC ";
		}
		$zph=$db->select_all("zhaopinhui",$where.$limit);
		if(is_array($zph)){
			foreach($zph as $key=>$v){
				$array_zid[]=$v[id];
			}
			$rows=$db->select_all("zhaopinhui_com","`zid` in (".implode(',',$array_zid).") and `status`=1","`uid`,`zid`,`jobid`");
			$zph_com=array();
			foreach($rows as $key=>$v){ 
				$jobarr=explode(',',$v[jobid]);
				$zph_com[$v[zid]][comnum]++;
				$zph_com[$v[zid]][jobnum]=$zph_com[$v[zid]][jobnum]+count($jobarr);
			}
			
			foreach($zph as $key=>$v){
				$zph[$key]["stime"]=strtotime($v[starttime])-mktime();
				$comnum=$zph_com[$v[id]][comnum]?$zph_com[$v[id]][comnum]:0;
				$jobnum=$zph_com[$v[id]][jobnum]?$zph_com[$v[id]][jobnum]:0;
				$zph[$key]["comnum"]=$comnum;
				$zph[$key]["jobnum"]=$jobnum;
				
				$zph[$key]["etime"]=strtotime($v[endtime])-mktime();
				if($paramer[len]){
					$zph[$key]["title"]=mb_substr($v['title'],0,$paramer[len],"GBK");
				}
				$zph[$key]["url"]=Url("zph",array("c"=>'show',"id"=>$v['id']),"1");
				 $weekarray=array("日","一","二","三","四","五","六",);            
                $zph[$key]["week"] = $weekarray[date('w',strtotime($v['starttime']))];		
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
DD_belatedPNG.fix('.png,.car_time,.car_the_time,.car_the_add,.car_the_per,.car_state');
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
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/yun_job_fairs.css" type="text/css">
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="zph_bannner">
     <img class="zph_banner_img" style="width:100%;height:320px;" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/103.jpg"/>

       <?php  $_smarty_tpl->tpl_vars['zphs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['zphs']->_loop = false;
$zphs = $zphs; if (!is_array($zphs) && !is_object($zphs)) { settype($zphs, 'array');}
foreach ($zphs as $_smarty_tpl->tpl_vars['zphs']->key => $_smarty_tpl->tpl_vars['zphs']->value) {
$_smarty_tpl->tpl_vars['zphs']->_loop = true;
?>
     <div class="zph_bn_ct">
          <div class="zph_bn_tit"><?php echo $_smarty_tpl->tpl_vars['zphs']->value['title'];?>
</div>
          <div class="zph_bn_tm">[ <?php echo $_smarty_tpl->tpl_vars['zphs']->value['starttime'];?>
 至 <?php echo $_smarty_tpl->tpl_vars['zphs']->value['endtime'];?>
 ]</div>
          <div class="zph_bn_g">已有 <a href="<?php echo smarty_function_url(array('m'=>'zph','c'=>'com','id'=>$_smarty_tpl->tpl_vars['zphs']->value['id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['zphs']->value['jobnum'];?>
</a> 个职位，共有 <a href="<?php echo smarty_function_url(array('m'=>'zph','c'=>'com','id'=>$_smarty_tpl->tpl_vars['zphs']->value['id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['zphs']->value['comnum'];?>
</a> 家企业参会</div>
          <div class="zph_bn_bt">
            <?php if ($_smarty_tpl->tpl_vars['zphs']->value['stime']<'0'&&$_smarty_tpl->tpl_vars['zphs']->value['etime']>'0') {?>
              	<span class="zph_bn_bt_z">停止预定</span>
            <?php } else { ?>
            
             <?php }?>
               <a class="zph_bn_bt_z" href="<?php echo smarty_function_url(array('m'=>'zph','c'=>'show','id'=>$_smarty_tpl->tpl_vars['zphs']->value['id']),$_smarty_tpl);?>
">查看详情</a>
          </div>
          
     </div>   <div class="zph_bn_sc_bg"></div>
     <div class="zph_bn_sc">
            
               <span class="zph_bn_sy">主办方：<?php echo $_smarty_tpl->tpl_vars['zphs']->value['organizers'];?>
</span>
               <span class="zph_bn_cy">会场地址：<?php echo $_smarty_tpl->tpl_vars['zphs']->value['address'];?>
</span>
          </div>
     <?php } ?>
     
     
</div>
<div class="yun_content">
  <div class="current_Location png"> 您当前的位置：<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
</a> > <a href="<?php echo smarty_function_url(array('m'=>'zph'),$_smarty_tpl);?>
">招聘会 </a></div>
    
  <div class="zph_classed"><span class="zph_classed_span fl"><i class="zph_classed_span_1 yun_bg_color"></i>正在开始的招聘会</span><a href="<?php echo smarty_function_url(array('m'=>'zph','c'=>'review'),$_smarty_tpl);?>
" class="fr">往期回顾>></a></div>
  <?php  $_smarty_tpl->tpl_vars['zph'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['zph']->_loop = false;
$zph = $zph; if (!is_array($zph) && !is_object($zph)) { settype($zph, 'array');}
foreach ($zph as $_smarty_tpl->tpl_vars['zph']->key => $_smarty_tpl->tpl_vars['zph']->value) {
$_smarty_tpl->tpl_vars['zph']->_loop = true;
?>
  <div class="career">
    <div class="career_con">
      <div class="car_time yun_bg_color_hover">
      <div>
      <i class="career_con_t_icon career_con_icon_t_left yun_bg_color_hover"></i>
      <i class="career_con_t_icon career_con_icon_t_right yun_bg_color_hover"></i>
      <i class="career_con_icon career_con_icon_left  yun_bg_color_hover"></i>
      <i class="career_con_icon career_con_icon_right  yun_bg_color_hover"></i>
      </div>
        <p>星期<?php echo $_smarty_tpl->tpl_vars['zph']->value['week'];?>
</p>
        <div class="car_time_box">
        <div class="car_time_box_h3 yun_text_color"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['zph']->value['starttime'],"%d");?>
</div>
        <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['zph']->value['starttime'],"%Y年%m月");?>
</span>
        </div>
         </div>
      <div class="car_theme">
        <h2><a href="<?php echo smarty_function_url(array('m'=>'zph','c'=>'show','id'=>'`$zph.id`'),$_smarty_tpl);?>
" class="title<?php echo $_smarty_tpl->tpl_vars['zph']->value['id'];?>
 yun_text_color"><?php echo $_smarty_tpl->tpl_vars['zph']->value['title'];?>
</a></h2>
        <dl>
          <dt class="car_the_time">举办时间：</dt>
          <dd><?php echo $_smarty_tpl->tpl_vars['zph']->value['starttime'];?>
至<?php echo $_smarty_tpl->tpl_vars['zph']->value['endtime'];?>
</dd>
        </dl>
        <dl>
          <dt class="car_the_add">会场地址：</dt>
          <dd><?php echo $_smarty_tpl->tpl_vars['zph']->value['address'];?>
</dd>
        </dl>
        <dl>
          <dt class="car_the_per">主&nbsp;办&nbsp; 方：</dt>
          <dd><?php echo $_smarty_tpl->tpl_vars['zph']->value['organizers'];?>
</dd>
        </dl>
      </div>
      <div class="car_order">
          <div class="car_order_con">
              <?php if ($_smarty_tpl->tpl_vars['zph']->value['stime']<'0'&&$_smarty_tpl->tpl_vars['zph']->value['etime']>'0') {?>
              	<span class="car_ord_orded">停止预定</span>
              <?php } else { ?>

              <?php }?>
              <a href="<?php echo smarty_function_url(array('m'=>'zph','c'=>'com','id'=>$_smarty_tpl->tpl_vars['zph']->value['id']),$_smarty_tpl);?>
" class="car_ord_co">参会企业</a>
              <a href="<?php echo smarty_function_url(array('m'=>'zph','c'=>'show','id'=>$_smarty_tpl->tpl_vars['zph']->value['id']),$_smarty_tpl);?>
" class="car_ord_det">查看详情</a>
          </div>
        <?php if ($_smarty_tpl->tpl_vars['zph']->value['stime']<'0'&&$_smarty_tpl->tpl_vars['zph']->value['etime']>'0') {?>
        	<p>共有<i><?php echo $_smarty_tpl->tpl_vars['zph']->value['comnum'];?>
</i>家企业参会，共有<i><?php echo $_smarty_tpl->tpl_vars['zph']->value['jobnum'];?>
</i>个职位</p>	
        <?php } else { ?>
        	<p>已有<i><?php echo $_smarty_tpl->tpl_vars['zph']->value['comnum'];?>
</i>家企业参会，已有<i><?php echo $_smarty_tpl->tpl_vars['zph']->value['jobnum'];?>
</i>个职位，正在增加中……</p>
        <?php }?> </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['zph']->value['stime']<'0'&&$_smarty_tpl->tpl_vars['zph']->value['etime']>'0') {?>
    	<div class="car_state car_stateed"></div>
    <?php } else { ?>
    	<div class="car_state"></div>
    <?php }?> </div>
  <?php } ?>

<?php if (!$_smarty_tpl->tpl_vars['total']->value) {?> 
<div class="seachno" style="border:1px solid #ddd;width:998px;">
        <div class="seachno_left"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/search-no.gif"></div>
        <div class="listno-content" style="margin-top:20px;"> <strong>很抱歉，还没有发布招聘会的相关信息</strong><br>
        
	 </div>
</div>
<?php } else { ?>

</div>


<div class="clear"></div>
<div class="search_pages">
  <div class="pages"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
</div>
<?php }?>
  </div>  
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/login.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 <?php }} ?>
