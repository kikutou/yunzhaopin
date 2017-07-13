<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 16:28:23
         compiled from "/var/www/html/yunzhaopin/app/template/default/part/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:1530773235592544271d6e25-59039092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5daa8dd7c51b71263d32e10a59b8696674b7286a' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/default/part/index.htm',
      1 => 1470048304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1530773235592544271d6e25-59039092',
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
    'ad_l' => 0,
    'ad68' => 0,
    'partclass_name' => 0,
    'partdata' => 0,
    'v' => 0,
    'city_name' => 0,
    'partkeyword' => 0,
    'keylist' => 0,
    'pl' => 0,
    'total' => 0,
    'pagenav' => 0,
    'usertype' => 0,
    'uid' => 0,
    'partlist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592544272fb292_69066298',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592544272fb292_69066298')) {function content_592544272fb292_69066298($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
?><?php global $db,$db_config,$config;
		$time = time();


		//可以做缓存
        eval('$paramer=array("item"=>"\'pl\'","ispage"=>"1","limit"=>"10","billing_cycle"=>"\'auto.cycle\'","cityid"=>"\'auto.cityid\'","type"=>"\'auto.type\'","keyword"=>"\'auto.keyword\'","nocache"=>"")
;');
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
        $Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }

		if($config[sy_web_site]=="1"){
			if($config[province]>0 && $config[province]!=""){
				$paramer[provinceid] = $config[province];
			}
			if($config[cityid]>0 && $config[cityid]!=""){
				$paramer[cityid] = $config[cityid];
			}
			if($config[three_cityid]>0 && $config[three_cityid]!=""){
				$paramer[three_cityid] = $config[three_cityid];
			}
		}
		$where = "`deadline`>'$time' and `state`=1";
		if($paramer[noid]){
			$where.=" and `id`<>'".$paramer['noid']."'";
		}
		
		//关键字
		if($paramer[keyword]){
			$where .= " AND `name` LIKE '%".$paramer[keyword]."%'";
		}
		//城市大类
		if($paramer[provinceid]){
			$where .= " AND `provinceid` = $paramer[provinceid]";
		}
		//城市子类
		if($paramer['cityid']){
			$where .= " AND (`provinceid`=$paramer[cityid] or `cityid`=$paramer[cityid] or `three_cityid`=$paramer[cityid])";
		}
		//城市三级子类
		if($paramer['three_cityid']){
			$where .= " AND (`three_cityid` IN ($paramer[three_cityid]))";
		}
		if($paramer['cityin']){
			$where .= " AND `three_cityid` IN ($paramer[cityin])";
		}
		//推荐兼职
		if($paramer[rec]){
			$where.=" AND `rec_time`>".time();
		}
		//工作类型
		if($paramer[type]){
			$where .= " AND `type` = $paramer[type]";
		}
		//结算周期
		if($paramer[billing_cycle]){
			$where .= " AND `billing_cycle` = $paramer[billing_cycle]";
		}
		//按照职位名称匹配
		/*if($paramer[keyword]){
			$where1[]="`name` LIKE '%".$paramer[keyword]."%'";
			include PLUS_PATH."/city.cache.php";
			foreach($city_name as $k=>$v){
				if(strpos($v,$paramer[keyword])!==false){
					$cityid[]=$k;
				}
			}
			if(is_array($cityid)){
				foreach($cityid as $value){
					$class[]= "(provinceid = '".$value."' or cityid = '".$value."')";
				}
				$where1[]=@implode(" or ",$class);
			}
			$where.=" AND (".@implode(" or ",$where1).")";
		}*/

		

		//查询条数
		if($paramer[limit]){
			$limit = " limit ".$paramer[limit];
		}
		if($paramer[ispage]){
			$limit = PageNav($paramer,$_GET,"partjob",$where,$Purl,"",$paramer[limit]?$paramer[limit]:"6",$_smarty_tpl);
            $_smarty_tpl->tpl_vars["firmurl"]=new Smarty_Variable;
			$_smarty_tpl->tpl_vars["firmurl"]->value = $config['sy_weburl']."/index.php?m=com".$ParamerArr[firmurl];
		}
		//排序字段默认为更新时间
		if($paramer[order] && $paramer[order]!="lastdate"){
			$order = " ORDER BY ".str_replace("'","",$paramer[order])."  ";
		}else{
			$order = " ORDER BY `lastupdate` ";
		}
		//排序规则 默认为倒序
		if($paramer[sort]){
			$sort = $paramer[sort];
		}else{
			$sort = " DESC";
		}
		$where.=$order.$sort;
		$pl = $db->select_all("partjob",$where.$limit);
		if(is_array($pl)){
			foreach($pl as $key=>$value){
				$pl[$key] = $db->part_array_action($value,$cache_array);
				$pl[$key][stime] = date("Y-m-d",$value[sdate]);
				$pl[$key][etime] = date("Y-m-d",$value[edate]);
				$pl[$key][lastupdate] = date("Y-m-d",$value[lastupdate]);
				$time=$value['lastupdate'];
				//今天开始时间戳
				$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
				//昨天开始时间戳
				$beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
				//一周内时间戳
				$week=strtotime(date("Y-m-d",strtotime("-1 week")));
				if($time>$week && $time<$beginYesterday){
					$pl[$key]['time'] = "一周内";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$pl[$key]['time'] = "昨天";
				}elseif($time>$beginToday){
					$pl[$key]['time'] = "今天";
				}else{
					$pl[$key]['time'] = date("Y-m-d",$value['lastupdate']);
				}

				//截取职位名称
				if($paramer[namelen]){
					$pl[$key][name_n] = mb_substr($value['name'],0,$paramer[namelen],"GBK");
				}
				//构建职位伪静态URL
				$pl[$key][job_url] = Url("part",array("c"=>"show","id"=>$value[id]),"1");
				if($paramer[keyword]){
					$pl[$key][name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[name]);
					$pl[$key][name_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$pl[$key][name_n]);
					$pl[$key][job_city_one]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[provinceid]]);
					/*$pl[$key][job_city_two]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[cityid]]);*/
				}
			}
			if(is_array($pl)){
				if($paramer[keyword]!=""&&!empty($pl)){
					addkeywords('2',$paramer[keyword]);
				}
			}
		} ?>
<?php global $db,$db_config,$config;
		$time = time();


		//可以做缓存
        eval('$paramer=array("item"=>"\'partlist\'","namelen"=>"10","rec"=>"1","limit"=>"10","nocache"=>"")
;');
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
        $Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }

		if($config[sy_web_site]=="1"){
			if($config[province]>0 && $config[province]!=""){
				$paramer[provinceid] = $config[province];
			}
			if($config[cityid]>0 && $config[cityid]!=""){
				$paramer[cityid] = $config[cityid];
			}
			if($config[three_cityid]>0 && $config[three_cityid]!=""){
				$paramer[three_cityid] = $config[three_cityid];
			}
		}
		$where = "`deadline`>'$time' and `state`=1";
		if($paramer[noid]){
			$where.=" and `id`<>'".$paramer['noid']."'";
		}
		
		//关键字
		if($paramer[keyword]){
			$where .= " AND `name` LIKE '%".$paramer[keyword]."%'";
		}
		//城市大类
		if($paramer[provinceid]){
			$where .= " AND `provinceid` = $paramer[provinceid]";
		}
		//城市子类
		if($paramer['cityid']){
			$where .= " AND (`provinceid`=$paramer[cityid] or `cityid`=$paramer[cityid] or `three_cityid`=$paramer[cityid])";
		}
		//城市三级子类
		if($paramer['three_cityid']){
			$where .= " AND (`three_cityid` IN ($paramer[three_cityid]))";
		}
		if($paramer['cityin']){
			$where .= " AND `three_cityid` IN ($paramer[cityin])";
		}
		//推荐兼职
		if($paramer[rec]){
			$where.=" AND `rec_time`>".time();
		}
		//工作类型
		if($paramer[type]){
			$where .= " AND `type` = $paramer[type]";
		}
		//结算周期
		if($paramer[billing_cycle]){
			$where .= " AND `billing_cycle` = $paramer[billing_cycle]";
		}
		//按照职位名称匹配
		/*if($paramer[keyword]){
			$where1[]="`name` LIKE '%".$paramer[keyword]."%'";
			include PLUS_PATH."/city.cache.php";
			foreach($city_name as $k=>$v){
				if(strpos($v,$paramer[keyword])!==false){
					$cityid[]=$k;
				}
			}
			if(is_array($cityid)){
				foreach($cityid as $value){
					$class[]= "(provinceid = '".$value."' or cityid = '".$value."')";
				}
				$where1[]=@implode(" or ",$class);
			}
			$where.=" AND (".@implode(" or ",$where1).")";
		}*/

		

		//查询条数
		if($paramer[limit]){
			$limit = " limit ".$paramer[limit];
		}
		if($paramer[ispage]){
			$limit = PageNav($paramer,$_GET,"partjob",$where,$Purl,"",$paramer[limit]?$paramer[limit]:"6",$_smarty_tpl);
            $_smarty_tpl->tpl_vars["firmurl"]=new Smarty_Variable;
			$_smarty_tpl->tpl_vars["firmurl"]->value = $config['sy_weburl']."/index.php?m=com".$ParamerArr[firmurl];
		}
		//排序字段默认为更新时间
		if($paramer[order] && $paramer[order]!="lastdate"){
			$order = " ORDER BY ".str_replace("'","",$paramer[order])."  ";
		}else{
			$order = " ORDER BY `lastupdate` ";
		}
		//排序规则 默认为倒序
		if($paramer[sort]){
			$sort = $paramer[sort];
		}else{
			$sort = " DESC";
		}
		$where.=$order.$sort;
		$partlist = $db->select_all("partjob",$where.$limit);
		if(is_array($partlist)){
			foreach($partlist as $key=>$value){
				$partlist[$key] = $db->part_array_action($value,$cache_array);
				$partlist[$key][stime] = date("Y-m-d",$value[sdate]);
				$partlist[$key][etime] = date("Y-m-d",$value[edate]);
				$partlist[$key][lastupdate] = date("Y-m-d",$value[lastupdate]);
				$time=$value['lastupdate'];
				//今天开始时间戳
				$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
				//昨天开始时间戳
				$beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
				//一周内时间戳
				$week=strtotime(date("Y-m-d",strtotime("-1 week")));
				if($time>$week && $time<$beginYesterday){
					$partlist[$key]['time'] = "一周内";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$partlist[$key]['time'] = "昨天";
				}elseif($time>$beginToday){
					$partlist[$key]['time'] = "今天";
				}else{
					$partlist[$key]['time'] = date("Y-m-d",$value['lastupdate']);
				}

				//截取职位名称
				if($paramer[namelen]){
					$partlist[$key][name_n] = mb_substr($value['name'],0,$paramer[namelen],"GBK");
				}
				//构建职位伪静态URL
				$partlist[$key][job_url] = Url("part",array("c"=>"show","id"=>$value[id]),"1");
				if($paramer[keyword]){
					$partlist[$key][name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[name]);
					$partlist[$key][name_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$partlist[$key][name_n]);
					$partlist[$key][job_city_one]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[provinceid]]);
					/*$partlist[$key][job_city_two]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[cityid]]);*/
				}
			}
			if(is_array($partlist)){
				if($paramer[keyword]!=""&&!empty($partlist)){
					addkeywords('2',$paramer[keyword]);
				}
			}
		} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
"/>
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
"/>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css" type="text/css"/>
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
/js/public.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/part.js" language="javascript"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/class.public.css" type="text/css" />
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/data/plus/city.cache.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/class.public.js" type="text/javascript"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/part.css" type="text/css"/>
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="sPopupDiv none" id="citydiv"></div>

<div class="search fl">
  <div class="search_bg">
  <!--banner-->
<div class="partflexslider yun_bg_color_hover">
	<ul class="partslides">
	  <?php  $_smarty_tpl->tpl_vars['ad_l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ad_l']->_loop = false;
$AdArr=array();$paramer=array();
			include(PLUS_PATH.'/pimg_cache.php');$add_arr = $ad_label[68];if(is_array($add_arr) && !empty($add_arr)){
				$i=0;$limit = 0;$length = 0;
				foreach($add_arr as $key=>$value){
					if(($value['did']==$config['did'] ||$value['did']=='0')&&$value['start']<time()&&$value['end']>time()){
						if($i>0 && $limit==$i){
							break;
						}
						if($length>0){
							$value['name'] = mb_substr($value['name'],0,$length);
						}
						if($paramer['type']!=""){
							if($paramer['type'] == $value['type']){
								$AdArr[] = $value;
							}
						}else{
							$AdArr[] = $value;
						}
						$i++;
					}
				}
			}$AdArr = $AdArr; if (!is_array($AdArr) && !is_object($AdArr)) { settype($AdArr, 'array');}
foreach ($AdArr as $_smarty_tpl->tpl_vars['ad_l']->key => $_smarty_tpl->tpl_vars['ad_l']->value) {
$_smarty_tpl->tpl_vars['ad_l']->_loop = true;
?>
		<li style="background: url(<?php echo $_smarty_tpl->tpl_vars['ad_l']->value['pic'];?>
) 50% 0 no-repeat;">
			<a href="<?php echo $_smarty_tpl->tpl_vars['ad68']->value['src'];?>
" target="_blank" style="display:block;width:100%;height:100%;"></a>
		</li>
		<?php } ?>
        
        
            
	</ul>
</div>
   
  </div>
  <div class="search_box">
    <div class="search_main">
      <div class="search_main_h">在这里搜索你想要找的兼职工作 .</div>
      <div class="search_con">
        <form method="get" name="myform" onsubmit="return search_keyword(this,'输入你要搜索的关键字');" action="index.php"> 
        <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_partdir']) {?><input type="hidden" value="part" name="m" /><?php }?>
        <div class="search_type fl">
          <div class="search_type_h fl">兼职类型</div>
          <div class="search_type_list fl">
            <input class="search_select" id="PartTypeButton" type="button" value="<?php if ($_GET['type']) {
echo $_smarty_tpl->tpl_vars['partclass_name']->value[$_GET['type']];
} else { ?>请选择兼职类型<?php }?>" onclick="ShowPartDiv('PartType');"/>
            <input type="hidden" id="type" name="type" value="<?php echo $_GET['type'];?>
"/>
            <div class="search_style none" id="PartType">
            <div class="search_style_h fl">
            <div class="search_tra"></div>
            <h3>兼职类型</h3><a href="javascript:void(0)" onclick="$('#PartType').hide();">关闭</a>
            </div>
            <ul class="search_sel_list" >
          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['partdata']->value['part_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <li><a href="javascript:CheckPartType('<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['partclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
');"><?php echo $_smarty_tpl->tpl_vars['partclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
          <?php } ?>
            </ul>
            </div>
          </div>
        </div>
        <div class="search_type fl">
          <div class="search_type_h fl">兼职区域</div>
          <div class="search_type_list fl">
            <input class="search_select" type="button" id="city" value="<?php if ($_GET['cityid']) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['cityid']];
} else { ?>选择兼职区域<?php }?>" onclick="index_city(1, '#city', '#cityid', null, null, null, 3);" />
            <input type="hidden" name="cityid" id="cityid" />
          </div>
        </div>
        <div class="search_type search_items fl">
          <div class="search_type_h fl">关键字搜索</div>
          <input class="search_input fl" type="text" name="keyword" value="<?php if ($_GET['keyword']) {
echo $_GET['keyword'];
} else { ?>输入你要搜索的关键字<?php }?>" onclick="if(this.value=='输入你要搜索的关键字'){this.value=''}"onblur="if(this.value==''){this.value='输入你要搜索的关键字'}"/>
          <input class="search_bth fl" type="submit" value="搜索"/>
          <a class="search_clear fl" href="<?php echo smarty_function_url(array('m'=>'part'),$_smarty_tpl);?>
">清空搜索</a>
        </div>
        </form>
         <?php if ($_smarty_tpl->tpl_vars['partkeyword']->value) {?>
        <div class="search_key  fl"> <em>您是不是要找：</em><?php  $_smarty_tpl->tpl_vars['keylist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['keylist']->_loop = false;
global $config;eval('$paramer=array("limit"=>"12","type"=>"2","item"=>"\'keylist\'","nocache"=>"")
;');$list=array();
		//是否推荐
		if($paramer[recom]){
			$tuijian = 1;
		}
		//类别
		if($paramer[type]){
			$type = $paramer[type];
		}
		//查询条数
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
						$v[type_name]='店铺招聘';
					}elseif($v['type']=="13"){
						$v['url'] = Url("wap",array("c"=>"tiny","keyword"=>$v['key_name']));
						$v['type_name']='普工简历';
					}elseif($v[type]=="3"){
						$v[url] = Url("wap",array("c"=>"job","keyword"=>$v['key_name']));
						$v[type_name]='职位';
					}elseif($v['type']=="4"){
						$v['url'] = Url("wap",array("c"=>"company","keyword"=>$v['key_name']));
						$v['type_name']='公司';
					}elseif($v['type']=="5"){
						$v['url'] = Url("wap",array("c"=>"resume","keyword"=>$v['key_name']));
						$v['type_name']='人才';
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
						$v['type_name']='店铺招聘';
					}elseif($v['type']=="2"){
						$v['url'] = Url("part",array("keyword"=>$v['key_name']));
						$v['type_name']='兼职';
					}elseif($v['type']=="13"){
						$v['url'] = Url("tiny",array("keyword"=>$v['key_name']));
						$v['type_name']='普工简历';
					}elseif($v['type']=="3"){
						$v['url'] = Url("job",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='职位';
					}elseif($v['type']=="4"){
						$v['url'] = Url("company",array("keyword"=>$v['key_name']));
						$v['type_name']='公司';
					}elseif($v['type']=="5"){
						$v['url'] = Url("resume",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='人才';
					} else if($v['type']=="12"){
						$v['url'] = Url("ask",array("c"=>"search","keyword"=>$v['key_name']));
						$v['type_name']='问答';
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
"><?php echo $_smarty_tpl->tpl_vars['keylist']->value['key_name'];?>
</a> <?php } ?></div>
        <?php } else { ?>
<div class="search_key  fl">&nbsp;</div>
<?php }?> 
      </div>
    </div>
  </div>
</div>
<div class="clear"></div>
<div class="wapper">
  <div class="job_main fl">
    <div class="job_list fl">
      <div class="job_list_tit fl">
        <div class="job_list_h fl">兼职招聘</div>
        <div class="job_list_selct fr">
          <input class="job_select" id="BillingCycleButton" type="button" value="<?php if ($_GET['cycle']) {
echo $_smarty_tpl->tpl_vars['partclass_name']->value[$_GET['cycle']];
} else { ?>结算方式<?php }?>" onclick="ShowPartDiv('BillingCycle');"/>
          <ul class="job_sel_list none" id="BillingCycle">
          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['partdata']->value['part_billing_cycle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <li><a href="<?php echo smarty_function_url(array('m'=>'part','type'=>$_GET['type'],'cityid'=>$_GET['cityid'],'keyword'=>$_GET['keyword'],'cycle'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['partclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
          <?php } ?>
          </ul>
        </div>
      </div>
      <div class="job_cont fl">
      <?php  $_smarty_tpl->tpl_vars['pl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pl']->_loop = false;
$pl = $pl; if (!is_array($pl) && !is_object($pl)) { settype($pl, 'array');}
foreach ($pl as $_smarty_tpl->tpl_vars['pl']->key => $_smarty_tpl->tpl_vars['pl']->value) {
$_smarty_tpl->tpl_vars['pl']->_loop = true;
?>
        <div class="job_cont_items fl">
          <div class="job_way fl">
            <div class="job_way_day fl"><?php echo $_smarty_tpl->tpl_vars['pl']->value['job_billing_cycle'];?>
</div>
            <div class="job_way_sal fl"><?php echo $_smarty_tpl->tpl_vars['pl']->value['job_type'];?>
</div>
          </div>
          <div class="job_works fl">
            <div class="job_works_h fl"><a href="<?php echo $_smarty_tpl->tpl_vars['pl']->value['job_url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['pl']->value['name'];?>
</a></div>
            <div class="job_works_con fl">
              <div class="job_works_com  fl"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/place.png"/><?php echo $_smarty_tpl->tpl_vars['pl']->value['job_city_two'];?>
-<?php echo $_smarty_tpl->tpl_vars['pl']->value['job_city_three'];?>
</div>
              <div class="job_works_com fl"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/look.png"/>浏览次数：<?php echo $_smarty_tpl->tpl_vars['pl']->value['hits'];?>
 次</div>
              <div class="job_works_com fl"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/time.png"/>
              <?php if ($_smarty_tpl->tpl_vars['pl']->value['time']=='今天'||$_smarty_tpl->tpl_vars['pl']->value['time']=='昨天') {?>
          <span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['pl']->value['time'];?>
</span>
          <?php } else { ?>
          <?php echo $_smarty_tpl->tpl_vars['pl']->value['time'];?>

          <?php }?>
              </div>
            </div>
          </div>
          <div class="job_money fl"> <em class="job_money_unit fr"><?php echo $_smarty_tpl->tpl_vars['pl']->value['job_salary_type'];?>
</em> <em class="job_money_day fr"><?php echo $_smarty_tpl->tpl_vars['pl']->value['salary'];?>
</em> <em class="job_money_gre fr">￥</em> </div>
        </div>
        <?php } ?>
        <?php if ($_smarty_tpl->tpl_vars['total']->value==0) {?>
        <div class="seachno">
        <div class="seachno_left"> <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/search-no.gif" width="144" height="102"></div>
        <div class="listno-content" style="margin-left:30px;"> <strong>很抱歉，没有找到满足条件的兼职</strong><br>
          <span> 建议您：<br>
          1、适当减少已选择的条件<br>
          2、适当删减或更改搜索关键字<br>
          </span> 
        </div>
      	</div>
       <?php }?>    
        
      </div>
      
      <!--此处是分页-->
      <div class="pages fl">
       
        <?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>

     
      </div>
    </div>
    
    
    <div class="job_right fr">
      <div class="job_right_one fl">
<div class="job_part_img"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/job_bth.png" width="258" height="172"></div>
<div class="job_part">
<div class="job_part_h fl">我要招兼职人才</div>
<div class="job_state fl">
想提高招聘效果？发布优质的兼职
，让高质的学生投身于你们的工作
之中
</div>
<?php if ($_smarty_tpl->tpl_vars['usertype']->value==2) {?>
<a class="job_bth" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php?c=partadd">免费发布兼职</a>
<?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['uid']->value) {?>
    <a class="job_bth" onclick="layer.msg('只有企业用户才能发布兼职！', 2, 8)" href="javascript:void(0);">免费发布兼职</a>
    <?php } else { ?>
    <a class="job_bth" onclick="showlogin('2');"  href="javascript:void(0);">免费发布兼职</a>
    <?php }?>
<?php }?>
</div>
</div>
      <div class="con_list fl">
        <div class="con_list_h fl">你可能感兴趣的兼职</div>
        <div class="con_lists fl">
        <?php  $_smarty_tpl->tpl_vars['partlist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['partlist']->_loop = false;
$partlist = $partlist; if (!is_array($partlist) && !is_object($partlist)) { settype($partlist, 'array');}
foreach ($partlist as $_smarty_tpl->tpl_vars['partlist']->key => $_smarty_tpl->tpl_vars['partlist']->value) {
$_smarty_tpl->tpl_vars['partlist']->_loop = true;
?>
          <ul class="con_lists_item fl">
            <li>
              <div class="con_lists_job fl"><a href="<?php echo $_smarty_tpl->tpl_vars['partlist']->value['job_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['partlist']->value['name_n'];?>
</a></div>
              <div class="con_day fr"><em class="con_gr">￥</em><em class="con_or"><?php echo $_smarty_tpl->tpl_vars['partlist']->value['salary'];?>
</em><em class="con_cc"><?php echo $_smarty_tpl->tpl_vars['partlist']->value['job_salary_type'];?>
</em></div>
            </li>
            <li><em class="con_pl"><?php echo $_smarty_tpl->tpl_vars['partlist']->value['job_city_two'];?>
-<?php echo $_smarty_tpl->tpl_vars['partlist']->value['job_city_three'];?>
</em></li>
          </ul>
		<?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/login.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<?php }} ?>
