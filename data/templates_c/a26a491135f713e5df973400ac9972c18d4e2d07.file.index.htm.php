<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 16:25:01
         compiled from "/var/www/html/yunzhaopin/app/template/default/index/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:19839737175925435d8e7e29-74941752%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a26a491135f713e5df973400ac9972c18d4e2d07' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/default/index/index.htm',
      1 => 1472449764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19839737175925435d8e7e29-74941752',
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
    'ishtml' => 0,
    'job_index' => 0,
    'key' => 0,
    'v' => 0,
    'job_name' => 0,
    'job_type' => 0,
    'vv' => 0,
    'vvl' => 0,
    'vvv' => 0,
    'lunbo' => 0,
    'urgent_list' => 0,
    'hotjoblist' => 0,
    'adlist_13' => 0,
    'adlist_14' => 0,
    'adlist_15' => 0,
    'rec_list' => 0,
    'new_list' => 0,
    'ulist' => 0,
    'indexnews' => 0,
    'arcitem' => 0,
    'linklist' => 0,
    'linklist2' => 0,
    'footer_ad' => 0,
    'left_ad' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5925435db46e92_97734823',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5925435db46e92_97734823')) {function content_5925435db46e92_97734823($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_function_listurl')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.listurl.php';
if (!is_callable('smarty_function_formatpicurl')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.formatpicurl.php';
?><?php global $db,$db_config,$config;
		$time = time();
		
		
		//可以做缓存
        eval('$paramer=array("namelen"=>"30","comlen"=>"30","urgent"=>"\'1\'","limit"=>"6","item"=>"\'urgent_list\'","name"=>"\'urgent_list1\'","nocache"=>"")
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
			if($config[hyclass]>0 && $config[hyclass]!=""){
				$paramer[hy]=$config[hyclass];
			}
		}  
		if($paramer[sdate]){
			$where = "`sdate`>".strtotime("-".intval($paramer[sdate])." day",time())." and `edate`>'$time' and `state`=1";
		}else{
			$where = "`edate`>'$time' and `state`=1";
		}
		//按照UID来查询（按公司地址查询可用GET[id]获取当前公司ID）
		if($paramer[uid]){
			$where .= " AND `uid` = '$paramer[uid]'";
		}
		//是否推荐职位
		if($paramer[rec]){
			$where.=" AND `rec_time`>".time();
		}
		//企业认证条件
		if($paramer['cert']){
			$company=$db->select_all("company","`yyzz_status`=1","`uid`");
			if(is_array($company)){
				foreach($company as $v){
					$job_uid[]=$v['uid'];
				}
			}
			$where.=" and `uid` in (".@implode(",",$job_uid).")";
		}
		//取不包含当前id的职位
		if($paramer[noid]){
			$where.= " and `id`<>$paramer[noid]";
		}
		//是否被锁定
		if($paramer[r_status]){
			$where.= " and `r_status`=2";
		}else{
			$where.= " and `r_status`<>2";
		}
		//是否暂停职位
		if($paramer[status]){
			$where.= " and `status`=1";
		}else{
			$where.= " and `status`<>1";
		}
		//公司体制
		if($paramer[pr]){
			$where .= " AND `pr` =$paramer[pr]";
		}
		//公司行业分类
		if($paramer['hy']){
			$where .= " AND `hy` = $paramer[hy]";
		} 
		//公司规模
		if($paramer[mun]){
			$where .= " AND `mun` = $paramer[mun]";
		}
		//职位大类
		if($paramer[job1]){
			$where .= " AND `job1` = $paramer[job1]";
		}
		//职位子类
		if($paramer[job1_son])
		{
			$where .= " AND `job1_son` = $paramer[job1_son]";
		}
		//职位三级分类
		if($paramer[job_post])
		{
			$where .= " AND (`job_post` IN ($paramer[job_post]))";
		}
		//您可能感兴趣的职位--个人会员中心
		if($paramer['jobwhere']){
			$where .=" and ".$paramer['jobwhere'];
		}
		//职位分类综合查询
		if($paramer['jobids'])
		{
			$where.= " AND (`job1` = $paramer[jobids] OR `job1_son`=$paramer[jobids] OR `job_post`=$paramer[jobids])";
		}
		//职位分类区间,不建议执行该查询
		if($paramer['jobin']){
			$where .= " AND (`job1` IN ($paramer[jobin]) OR `job1_son` IN ($paramer[jobin]) OR `job_post` IN ($paramer[jobin]))";
		}
		//城市大类
		if($paramer[provinceid]){
			$where .= " AND `provinceid` = $paramer[provinceid]";
		}
		//城市子类
		if($paramer['cityid']){
			$where .= " AND (`cityid` IN ($paramer[cityid]))";
		}
		//城市三级子类
		if($paramer['three_cityid']){
			$where .= " AND (`three_cityid` IN ($paramer[three_cityid]))";
		}
		if($paramer['cityin']){
			$where .= " AND `three_cityid` IN ($paramer[cityin])";
		}
		//学历
		if($paramer[edu]){
			$where .= " AND `edu` = $paramer[edu]";
		}
		//工作经验
		if($paramer[exp]){
			$where .= " AND `exp` = $paramer[exp]";
		}
		//职位性质
		if($paramer[type]){
			$where .= " AND `type` = $paramer[type]";
		}
		//性别
		if($paramer[sex]){
			$where .= " AND `sex` = $paramer[sex]";
		}
		//月薪
		if($paramer[salary]){
			$where .= " AND `salary` = $paramer[salary]";
		}
		//城市区间,不建议执行该查询
		if($paramer[cityin]){
			$where .= " AND (`provinceid` IN ($paramer[cityin]) OR `cityid` IN ($paramer[cityin]) OR `three_cityid` IN ($paramer[cityin]))";
		}
		//紧急招聘urgent
		if($paramer[urgent]){
			$where.=" AND `urgent_time`>".time();
		}
		//更新时间区间
		if($paramer[uptime]){
			$uptime = $time-$paramer[uptime]*86400;
			$where.=" AND `lastupdate`>$uptime";
		}
		//按类似公司名称,不建议进行大数据量操作
		if($paramer[comname]){
			$where.=" AND `com_name` LIKE '%".$paramer[comname]."%'";
		}
		//按公司归属地,只适合查询一级城市分类
		if($paramer[com_pro]){
			$where.=" AND `com_provinceid` ='".$paramer[com_pro]."'";
		}
		//按照职位名称匹配
		if($paramer[keyword]){
			$where1[]="`name` LIKE '%".$paramer[keyword]."%'";
			$where1[]="`com_name` LIKE '%".$paramer[keyword]."%'";
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
		}
		//多选职位
		if($paramer["job"]){
			$where.=" AND `job_post` in ($paramer[job])";
		}
		//筛除重复
		if($paramer[noids]==1 && !empty($noids)){
			$where.=" AND `id` NOT IN (".@implode(',',$noids).")";
		}
		//自定义查询条件，默认取代上面任何参数直接使用该语句
		if($paramer[where]){
			$where = $paramer[where];
		}

		//查询条数
		if($paramer[limit]){
			$limit = " limit ".$paramer[limit];
		}

		if($paramer[ispage]){
			$limit = PageNav($paramer,$_GET,"company_job",$where,$Purl,"",$paramer[limit]?$paramer[limit]:"6",$_smarty_tpl);
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

		
		 
		$urgent_list = $db->select_all("company_job",$where.$limit);
		if(is_array($urgent_list)){
			//处理类别字段
			$cache_array = $db->cacheget();
			$comuid=$jobid=array();
			foreach($urgent_list as $key=>$value){
				if(in_array($value['uid'],$comuid)==false){$comuid[] = $value['uid'];}
				if(in_array($value['id'],$jobid)==false){$jobid[] = $value['id'];} 
			}
			$comuids = @implode(',',$comuid);
			$jobids = @implode(',',$jobid);
			
			
			if($comuids){
				$r_uids=$db->select_all("company","`uid` IN (".$comuids.")","`uid`,`yyzz_status`,`logo`,`pr`,`hy`,`mun`");
				include PLUS_PATH."/com.cache.php";
				include PLUS_PATH."/industry.cache.php";
				if(is_array($r_uids)){
					foreach($r_uids as $key=>$value){
						if($value['logo']){
							$value['logo'] = $config['sy_weburl']."/".$value['logo'];
						}else{
							$value['logo'] = $config['sy_weburl']."/".$config['sy_unit_icon'];
						}
						
						$value['pr_n'] = $comclass_name[$value[pr]];
						$value['hy_n'] = $industry_name[$value[hy]];
						$value['mun_n'] = $comclass_name[$value[mun]];
						$r_uid[$value['uid']] = $value;
					}
				}
			}

			include PLUS_PATH."/comrating.cache.php";
			//$comrat = $db->select_all("company_rating","`display`='1'");

			foreach($urgent_list as $key=>$value){
				if($paramer[bid]){
					$noids[] = $value[id];
				}
				$urgent_list[$key] = $db->array_action($value,$cache_array);
				$urgent_list[$key][stime] = date("Y-m-d",$value[sdate]);
				$urgent_list[$key][etime] = date("Y-m-d",$value[edate]);
				$urgent_list[$key][lastupdate] = date("Y-m-d",$value[lastupdate]);

				$urgent_list[$key][yyzz_status] =$r_uid[$value['uid']][yyzz_status];
				$urgent_list[$key][logo] =$r_uid[$value['uid']][logo];
				$urgent_list[$key][pr_n] =$r_uid[$value['uid']][pr_n];
				$urgent_list[$key][hy_n] =$r_uid[$value['uid']][hy_n];
				$urgent_list[$key][mun_n] =$r_uid[$value['uid']][mun_n];
				$time=$value['lastupdate'];
				//今天开始时间戳
				$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
				//昨天开始时间戳
				$beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
				//一周内时间戳
				$week=strtotime(date("Y-m-d",strtotime("-1 week")));
				if($time>$week && $time<$beginYesterday){
					$urgent_list[$key]['time'] ="一周内";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$urgent_list[$key]['time'] ="昨天";
				}elseif($time>$beginToday){	
					$urgent_list[$key]['time'] = date("H:i",$value['lastupdate']);
					$urgent_list[$key]['redtime'] =1;
				}else{
					$urgent_list[$key]['time'] = date("Y-m-d",$value['lastupdate']);
				}
				//获得福利待遇名称
				if(is_array($urgent_list[$key]['welfare'])&&$urgent_list[$key]['welfare']){
					foreach($urgent_list[$key]['welfare'] as $val){
						$urgent_list[$key]['welfarename'][]=$cache_array['comclass_name'][$val];
					}

				}
				//截取公司名称
				if($paramer[comlen]){
					$urgent_list[$key][com_n] = mb_substr($value['com_name'],0,$paramer[comlen],"GBK");
				}
				//截取职位名称
				if($paramer[namelen]){
					if($value['rec_time']>time()){
						$urgent_list[$key][name_n] = "<font color='red'>".mb_substr($value['name'],0,$paramer[namelen],"GBK")."</font>";
					}else{
						$urgent_list[$key][name_n] = mb_substr($value['name'],0,$paramer[namelen],"GBK");
					}
				}else{
					if($value['rec_time']>time()){
						$urgent_list[$key]['name_n'] = "<font color='red'>".$value['name']."</font>";
					}
				}
				//构建职位伪静态URL
				$urgent_list[$key][job_url] = Url("job",array("c"=>"comapply","id"=>$value[id]),"1");
				//构建企业伪静态URL
				$urgent_list[$key][com_url] = Url("company",array("c"=>"show","id"=>$value[uid]));
				foreach($comrat as $k=>$v){
					if($value[rating]==$v[id]){
						$urgent_list[$key][color] = str_replace("#","",$v[com_color]);
						$urgent_list[$key][ratlogo] = $v[com_pic];
						$urgent_list[$key][ratname] = $v[name];
					}
				}
				if($paramer[keyword]){
					$urgent_list[$key][name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[name]);
					$urgent_list[$key][com_name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[com_name]);
					$urgent_list[$key][name_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$urgent_list[$key][name_n]);
					$urgent_list[$key][com_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$urgent_list[$key][com_n]);
					$urgent_list[$key][job_city_one]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[provinceid]]);
					$urgent_list[$key][job_city_two]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[cityid]]);
				}
			}

			if(is_array($urgent_list)){
				if($paramer[keyword]!=""&&!empty($urgent_list)){
					addkeywords('3',$paramer[keyword]);
				}
			}
		} ?>
<?php global $db,$db_config,$config;
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		//是否属于分站下
		if($config[sy_web_site]=="1"){
			$jobwhere="";
			if($config[province]>0 && $config[province]!=""){
				$jobwhere.=" and `provinceid`='$config[province]'";
			}
			if($config[cityid]>0 && $config[cityid]!=""){
				$jobwhere.=" and `cityid`='$config[cityid]'";
			}
			if($config[three_cityid]>0 && $config[three_cityid]!=""){
				$jobwhere.=" and `three_cityid`='$config[three_cityid]'";
			}
			if($config[hyclass]>0 && $config[hyclass]!=""){
				$jobwhere.=" and `hy`='".$config[hyclass]."'";
			} 
			if($jobwhere){
				$comlist=$db->select_all("company","1 ".$jobwhere,"`uid`");
				if(is_array($comlist)){
					foreach($comlist as $v){
						$cuid[]=$v[uid];
					}
				}
				$hotwhere=" and `uid` in (".@implode(",",$cuid).")";
			} 
		}
		$time = time();
		$where = "`time_start`<$time AND `time_end`>$time".$hotwhere;$order = " ORDER BY `sort` ";$sort = 'ASC';$limit=" LIMIT 24";$where.=$order.$sort;
        $Query = $db->query("SELECT * FROM $db_config[def]hotjob where ".$where.$limit);
		while($rs = $db->fetch_array($Query)){
			$hotjoblist[] = $rs;
			$ListId[] =  $rs[uid];
		}

		//是否需要查询对应职位
		$JobId = @implode(",",$ListId);
		$JobList=$db->select_all("company_job","`uid` IN ($JobId) and `edate`>'".mktime()."' and state=1 and r_status<>'2' and status<>'1' $jobwhere");
		$statis=$db->select_all("company_statis","`uid` IN ($JobId)","`uid`,`comtpl`");
		if(is_array($ListId)){
			//处理类别字段
			$cache_array = $db->cacheget();
			foreach($hotjoblist as $key=>$value){
				$i=0;
				if(is_array($JobList)){
					$hotjoblist[$key]["job"].="<div class=\"area_left\"> ";
					foreach($JobList as $k=>$v){
						if($value[uid]==$v[uid] && $i<5){
							$job_url = Url("job",array("c"=>"comapply","id"=>"$v[id]"),"1");
							$v[name] = mb_substr($v[name],0,10,"GBK");
							$hotjoblist[$key]["job"].="<a href='".$job_url."'>".$v[name]."</a>";
							$i++;
						}
					}
					foreach($statis as $v){
						if($value['uid']==$v['uid']){
							if($v['comtpl'] && $v['comtpl']!="default"){
								$jobs_url = Url("company",array("c"=>"show","id"=>$value[uid]))."#job";
							}else{
								$jobs_url = Url("company",array("c"=>"show","id"=>$value[uid]));
							}
						}
					}
					$com_url = Url("company",array("c"=>"show","id"=>$value[uid]));
					$beizhu=mb_substr($value['beizhu'],0,50,"GBK")."...";
					$hotjoblist[$key]["job"].="</div><div class=\"area_right\"><a href='".$com_url."'>".$value["username"]."</a>".$beizhu."</div>";
					$hotjoblist[$key]["url"]=$com_url;
				}
			}
		} ?>
<?php global $db,$db_config,$config;
		$time = time();
		
		
		//可以做缓存
        eval('$paramer=array("namelen"=>"12","comlen"=>"20","rec"=>"\'1\'","limit"=>"18","item"=>"\'rec_list\'","name"=>"\'rec_list1\'","nocache"=>"")
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
			if($config[hyclass]>0 && $config[hyclass]!=""){
				$paramer[hy]=$config[hyclass];
			}
		}  
		if($paramer[sdate]){
			$where = "`sdate`>".strtotime("-".intval($paramer[sdate])." day",time())." and `edate`>'$time' and `state`=1";
		}else{
			$where = "`edate`>'$time' and `state`=1";
		}
		//按照UID来查询（按公司地址查询可用GET[id]获取当前公司ID）
		if($paramer[uid]){
			$where .= " AND `uid` = '$paramer[uid]'";
		}
		//是否推荐职位
		if($paramer[rec]){
			$where.=" AND `rec_time`>".time();
		}
		//企业认证条件
		if($paramer['cert']){
			$company=$db->select_all("company","`yyzz_status`=1","`uid`");
			if(is_array($company)){
				foreach($company as $v){
					$job_uid[]=$v['uid'];
				}
			}
			$where.=" and `uid` in (".@implode(",",$job_uid).")";
		}
		//取不包含当前id的职位
		if($paramer[noid]){
			$where.= " and `id`<>$paramer[noid]";
		}
		//是否被锁定
		if($paramer[r_status]){
			$where.= " and `r_status`=2";
		}else{
			$where.= " and `r_status`<>2";
		}
		//是否暂停职位
		if($paramer[status]){
			$where.= " and `status`=1";
		}else{
			$where.= " and `status`<>1";
		}
		//公司体制
		if($paramer[pr]){
			$where .= " AND `pr` =$paramer[pr]";
		}
		//公司行业分类
		if($paramer['hy']){
			$where .= " AND `hy` = $paramer[hy]";
		} 
		//公司规模
		if($paramer[mun]){
			$where .= " AND `mun` = $paramer[mun]";
		}
		//职位大类
		if($paramer[job1]){
			$where .= " AND `job1` = $paramer[job1]";
		}
		//职位子类
		if($paramer[job1_son])
		{
			$where .= " AND `job1_son` = $paramer[job1_son]";
		}
		//职位三级分类
		if($paramer[job_post])
		{
			$where .= " AND (`job_post` IN ($paramer[job_post]))";
		}
		//您可能感兴趣的职位--个人会员中心
		if($paramer['jobwhere']){
			$where .=" and ".$paramer['jobwhere'];
		}
		//职位分类综合查询
		if($paramer['jobids'])
		{
			$where.= " AND (`job1` = $paramer[jobids] OR `job1_son`=$paramer[jobids] OR `job_post`=$paramer[jobids])";
		}
		//职位分类区间,不建议执行该查询
		if($paramer['jobin']){
			$where .= " AND (`job1` IN ($paramer[jobin]) OR `job1_son` IN ($paramer[jobin]) OR `job_post` IN ($paramer[jobin]))";
		}
		//城市大类
		if($paramer[provinceid]){
			$where .= " AND `provinceid` = $paramer[provinceid]";
		}
		//城市子类
		if($paramer['cityid']){
			$where .= " AND (`cityid` IN ($paramer[cityid]))";
		}
		//城市三级子类
		if($paramer['three_cityid']){
			$where .= " AND (`three_cityid` IN ($paramer[three_cityid]))";
		}
		if($paramer['cityin']){
			$where .= " AND `three_cityid` IN ($paramer[cityin])";
		}
		//学历
		if($paramer[edu]){
			$where .= " AND `edu` = $paramer[edu]";
		}
		//工作经验
		if($paramer[exp]){
			$where .= " AND `exp` = $paramer[exp]";
		}
		//职位性质
		if($paramer[type]){
			$where .= " AND `type` = $paramer[type]";
		}
		//性别
		if($paramer[sex]){
			$where .= " AND `sex` = $paramer[sex]";
		}
		//月薪
		if($paramer[salary]){
			$where .= " AND `salary` = $paramer[salary]";
		}
		//城市区间,不建议执行该查询
		if($paramer[cityin]){
			$where .= " AND (`provinceid` IN ($paramer[cityin]) OR `cityid` IN ($paramer[cityin]) OR `three_cityid` IN ($paramer[cityin]))";
		}
		//紧急招聘urgent
		if($paramer[urgent]){
			$where.=" AND `urgent_time`>".time();
		}
		//更新时间区间
		if($paramer[uptime]){
			$uptime = $time-$paramer[uptime]*86400;
			$where.=" AND `lastupdate`>$uptime";
		}
		//按类似公司名称,不建议进行大数据量操作
		if($paramer[comname]){
			$where.=" AND `com_name` LIKE '%".$paramer[comname]."%'";
		}
		//按公司归属地,只适合查询一级城市分类
		if($paramer[com_pro]){
			$where.=" AND `com_provinceid` ='".$paramer[com_pro]."'";
		}
		//按照职位名称匹配
		if($paramer[keyword]){
			$where1[]="`name` LIKE '%".$paramer[keyword]."%'";
			$where1[]="`com_name` LIKE '%".$paramer[keyword]."%'";
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
		}
		//多选职位
		if($paramer["job"]){
			$where.=" AND `job_post` in ($paramer[job])";
		}
		//筛除重复
		if($paramer[noids]==1 && !empty($noids)){
			$where.=" AND `id` NOT IN (".@implode(',',$noids).")";
		}
		//自定义查询条件，默认取代上面任何参数直接使用该语句
		if($paramer[where]){
			$where = $paramer[where];
		}

		//查询条数
		if($paramer[limit]){
			$limit = " limit ".$paramer[limit];
		}

		if($paramer[ispage]){
			$limit = PageNav($paramer,$_GET,"company_job",$where,$Purl,"",$paramer[limit]?$paramer[limit]:"6",$_smarty_tpl);
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

		
		 
		$rec_list = $db->select_all("company_job",$where.$limit);
		if(is_array($rec_list)){
			//处理类别字段
			$cache_array = $db->cacheget();
			$comuid=$jobid=array();
			foreach($rec_list as $key=>$value){
				if(in_array($value['uid'],$comuid)==false){$comuid[] = $value['uid'];}
				if(in_array($value['id'],$jobid)==false){$jobid[] = $value['id'];} 
			}
			$comuids = @implode(',',$comuid);
			$jobids = @implode(',',$jobid);
			
			
			if($comuids){
				$r_uids=$db->select_all("company","`uid` IN (".$comuids.")","`uid`,`yyzz_status`,`logo`,`pr`,`hy`,`mun`");
				include PLUS_PATH."/com.cache.php";
				include PLUS_PATH."/industry.cache.php";
				if(is_array($r_uids)){
					foreach($r_uids as $key=>$value){
						if($value['logo']){
							$value['logo'] = $config['sy_weburl']."/".$value['logo'];
						}else{
							$value['logo'] = $config['sy_weburl']."/".$config['sy_unit_icon'];
						}
						
						$value['pr_n'] = $comclass_name[$value[pr]];
						$value['hy_n'] = $industry_name[$value[hy]];
						$value['mun_n'] = $comclass_name[$value[mun]];
						$r_uid[$value['uid']] = $value;
					}
				}
			}

			include PLUS_PATH."/comrating.cache.php";
			//$comrat = $db->select_all("company_rating","`display`='1'");

			foreach($rec_list as $key=>$value){
				if($paramer[bid]){
					$noids[] = $value[id];
				}
				$rec_list[$key] = $db->array_action($value,$cache_array);
				$rec_list[$key][stime] = date("Y-m-d",$value[sdate]);
				$rec_list[$key][etime] = date("Y-m-d",$value[edate]);
				$rec_list[$key][lastupdate] = date("Y-m-d",$value[lastupdate]);

				$rec_list[$key][yyzz_status] =$r_uid[$value['uid']][yyzz_status];
				$rec_list[$key][logo] =$r_uid[$value['uid']][logo];
				$rec_list[$key][pr_n] =$r_uid[$value['uid']][pr_n];
				$rec_list[$key][hy_n] =$r_uid[$value['uid']][hy_n];
				$rec_list[$key][mun_n] =$r_uid[$value['uid']][mun_n];
				$time=$value['lastupdate'];
				//今天开始时间戳
				$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
				//昨天开始时间戳
				$beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
				//一周内时间戳
				$week=strtotime(date("Y-m-d",strtotime("-1 week")));
				if($time>$week && $time<$beginYesterday){
					$rec_list[$key]['time'] ="一周内";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$rec_list[$key]['time'] ="昨天";
				}elseif($time>$beginToday){	
					$rec_list[$key]['time'] = date("H:i",$value['lastupdate']);
					$rec_list[$key]['redtime'] =1;
				}else{
					$rec_list[$key]['time'] = date("Y-m-d",$value['lastupdate']);
				}
				//获得福利待遇名称
				if(is_array($rec_list[$key]['welfare'])&&$rec_list[$key]['welfare']){
					foreach($rec_list[$key]['welfare'] as $val){
						$rec_list[$key]['welfarename'][]=$cache_array['comclass_name'][$val];
					}

				}
				//截取公司名称
				if($paramer[comlen]){
					$rec_list[$key][com_n] = mb_substr($value['com_name'],0,$paramer[comlen],"GBK");
				}
				//截取职位名称
				if($paramer[namelen]){
					if($value['rec_time']>time()){
						$rec_list[$key][name_n] = "<font color='red'>".mb_substr($value['name'],0,$paramer[namelen],"GBK")."</font>";
					}else{
						$rec_list[$key][name_n] = mb_substr($value['name'],0,$paramer[namelen],"GBK");
					}
				}else{
					if($value['rec_time']>time()){
						$rec_list[$key]['name_n'] = "<font color='red'>".$value['name']."</font>";
					}
				}
				//构建职位伪静态URL
				$rec_list[$key][job_url] = Url("job",array("c"=>"comapply","id"=>$value[id]),"1");
				//构建企业伪静态URL
				$rec_list[$key][com_url] = Url("company",array("c"=>"show","id"=>$value[uid]));
				foreach($comrat as $k=>$v){
					if($value[rating]==$v[id]){
						$rec_list[$key][color] = str_replace("#","",$v[com_color]);
						$rec_list[$key][ratlogo] = $v[com_pic];
						$rec_list[$key][ratname] = $v[name];
					}
				}
				if($paramer[keyword]){
					$rec_list[$key][name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[name]);
					$rec_list[$key][com_name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[com_name]);
					$rec_list[$key][name_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$rec_list[$key][name_n]);
					$rec_list[$key][com_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$rec_list[$key][com_n]);
					$rec_list[$key][job_city_one]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[provinceid]]);
					$rec_list[$key][job_city_two]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[cityid]]);
				}
			}

			if(is_array($rec_list)){
				if($paramer[keyword]!=""&&!empty($rec_list)){
					addkeywords('3',$paramer[keyword]);
				}
			}
		} ?>
<?php global $db,$db_config,$config;
		$time = time();
		
		
		//可以做缓存
        eval('$paramer=array("namelen"=>"10","comlen"=>"16","limit"=>"20","item"=>"\'new_list\'","name"=>"\'new_list1\'","nocache"=>"")
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
			if($config[hyclass]>0 && $config[hyclass]!=""){
				$paramer[hy]=$config[hyclass];
			}
		}  
		if($paramer[sdate]){
			$where = "`sdate`>".strtotime("-".intval($paramer[sdate])." day",time())." and `edate`>'$time' and `state`=1";
		}else{
			$where = "`edate`>'$time' and `state`=1";
		}
		//按照UID来查询（按公司地址查询可用GET[id]获取当前公司ID）
		if($paramer[uid]){
			$where .= " AND `uid` = '$paramer[uid]'";
		}
		//是否推荐职位
		if($paramer[rec]){
			$where.=" AND `rec_time`>".time();
		}
		//企业认证条件
		if($paramer['cert']){
			$company=$db->select_all("company","`yyzz_status`=1","`uid`");
			if(is_array($company)){
				foreach($company as $v){
					$job_uid[]=$v['uid'];
				}
			}
			$where.=" and `uid` in (".@implode(",",$job_uid).")";
		}
		//取不包含当前id的职位
		if($paramer[noid]){
			$where.= " and `id`<>$paramer[noid]";
		}
		//是否被锁定
		if($paramer[r_status]){
			$where.= " and `r_status`=2";
		}else{
			$where.= " and `r_status`<>2";
		}
		//是否暂停职位
		if($paramer[status]){
			$where.= " and `status`=1";
		}else{
			$where.= " and `status`<>1";
		}
		//公司体制
		if($paramer[pr]){
			$where .= " AND `pr` =$paramer[pr]";
		}
		//公司行业分类
		if($paramer['hy']){
			$where .= " AND `hy` = $paramer[hy]";
		} 
		//公司规模
		if($paramer[mun]){
			$where .= " AND `mun` = $paramer[mun]";
		}
		//职位大类
		if($paramer[job1]){
			$where .= " AND `job1` = $paramer[job1]";
		}
		//职位子类
		if($paramer[job1_son])
		{
			$where .= " AND `job1_son` = $paramer[job1_son]";
		}
		//职位三级分类
		if($paramer[job_post])
		{
			$where .= " AND (`job_post` IN ($paramer[job_post]))";
		}
		//您可能感兴趣的职位--个人会员中心
		if($paramer['jobwhere']){
			$where .=" and ".$paramer['jobwhere'];
		}
		//职位分类综合查询
		if($paramer['jobids'])
		{
			$where.= " AND (`job1` = $paramer[jobids] OR `job1_son`=$paramer[jobids] OR `job_post`=$paramer[jobids])";
		}
		//职位分类区间,不建议执行该查询
		if($paramer['jobin']){
			$where .= " AND (`job1` IN ($paramer[jobin]) OR `job1_son` IN ($paramer[jobin]) OR `job_post` IN ($paramer[jobin]))";
		}
		//城市大类
		if($paramer[provinceid]){
			$where .= " AND `provinceid` = $paramer[provinceid]";
		}
		//城市子类
		if($paramer['cityid']){
			$where .= " AND (`cityid` IN ($paramer[cityid]))";
		}
		//城市三级子类
		if($paramer['three_cityid']){
			$where .= " AND (`three_cityid` IN ($paramer[three_cityid]))";
		}
		if($paramer['cityin']){
			$where .= " AND `three_cityid` IN ($paramer[cityin])";
		}
		//学历
		if($paramer[edu]){
			$where .= " AND `edu` = $paramer[edu]";
		}
		//工作经验
		if($paramer[exp]){
			$where .= " AND `exp` = $paramer[exp]";
		}
		//职位性质
		if($paramer[type]){
			$where .= " AND `type` = $paramer[type]";
		}
		//性别
		if($paramer[sex]){
			$where .= " AND `sex` = $paramer[sex]";
		}
		//月薪
		if($paramer[salary]){
			$where .= " AND `salary` = $paramer[salary]";
		}
		//城市区间,不建议执行该查询
		if($paramer[cityin]){
			$where .= " AND (`provinceid` IN ($paramer[cityin]) OR `cityid` IN ($paramer[cityin]) OR `three_cityid` IN ($paramer[cityin]))";
		}
		//紧急招聘urgent
		if($paramer[urgent]){
			$where.=" AND `urgent_time`>".time();
		}
		//更新时间区间
		if($paramer[uptime]){
			$uptime = $time-$paramer[uptime]*86400;
			$where.=" AND `lastupdate`>$uptime";
		}
		//按类似公司名称,不建议进行大数据量操作
		if($paramer[comname]){
			$where.=" AND `com_name` LIKE '%".$paramer[comname]."%'";
		}
		//按公司归属地,只适合查询一级城市分类
		if($paramer[com_pro]){
			$where.=" AND `com_provinceid` ='".$paramer[com_pro]."'";
		}
		//按照职位名称匹配
		if($paramer[keyword]){
			$where1[]="`name` LIKE '%".$paramer[keyword]."%'";
			$where1[]="`com_name` LIKE '%".$paramer[keyword]."%'";
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
		}
		//多选职位
		if($paramer["job"]){
			$where.=" AND `job_post` in ($paramer[job])";
		}
		//筛除重复
		if($paramer[noids]==1 && !empty($noids)){
			$where.=" AND `id` NOT IN (".@implode(',',$noids).")";
		}
		//自定义查询条件，默认取代上面任何参数直接使用该语句
		if($paramer[where]){
			$where = $paramer[where];
		}

		//查询条数
		if($paramer[limit]){
			$limit = " limit ".$paramer[limit];
		}

		if($paramer[ispage]){
			$limit = PageNav($paramer,$_GET,"company_job",$where,$Purl,"",$paramer[limit]?$paramer[limit]:"6",$_smarty_tpl);
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

		
		 
		$new_list = $db->select_all("company_job",$where.$limit);
		if(is_array($new_list)){
			//处理类别字段
			$cache_array = $db->cacheget();
			$comuid=$jobid=array();
			foreach($new_list as $key=>$value){
				if(in_array($value['uid'],$comuid)==false){$comuid[] = $value['uid'];}
				if(in_array($value['id'],$jobid)==false){$jobid[] = $value['id'];} 
			}
			$comuids = @implode(',',$comuid);
			$jobids = @implode(',',$jobid);
			
			
			if($comuids){
				$r_uids=$db->select_all("company","`uid` IN (".$comuids.")","`uid`,`yyzz_status`,`logo`,`pr`,`hy`,`mun`");
				include PLUS_PATH."/com.cache.php";
				include PLUS_PATH."/industry.cache.php";
				if(is_array($r_uids)){
					foreach($r_uids as $key=>$value){
						if($value['logo']){
							$value['logo'] = $config['sy_weburl']."/".$value['logo'];
						}else{
							$value['logo'] = $config['sy_weburl']."/".$config['sy_unit_icon'];
						}
						
						$value['pr_n'] = $comclass_name[$value[pr]];
						$value['hy_n'] = $industry_name[$value[hy]];
						$value['mun_n'] = $comclass_name[$value[mun]];
						$r_uid[$value['uid']] = $value;
					}
				}
			}

			include PLUS_PATH."/comrating.cache.php";
			//$comrat = $db->select_all("company_rating","`display`='1'");

			foreach($new_list as $key=>$value){
				if($paramer[bid]){
					$noids[] = $value[id];
				}
				$new_list[$key] = $db->array_action($value,$cache_array);
				$new_list[$key][stime] = date("Y-m-d",$value[sdate]);
				$new_list[$key][etime] = date("Y-m-d",$value[edate]);
				$new_list[$key][lastupdate] = date("Y-m-d",$value[lastupdate]);

				$new_list[$key][yyzz_status] =$r_uid[$value['uid']][yyzz_status];
				$new_list[$key][logo] =$r_uid[$value['uid']][logo];
				$new_list[$key][pr_n] =$r_uid[$value['uid']][pr_n];
				$new_list[$key][hy_n] =$r_uid[$value['uid']][hy_n];
				$new_list[$key][mun_n] =$r_uid[$value['uid']][mun_n];
				$time=$value['lastupdate'];
				//今天开始时间戳
				$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
				//昨天开始时间戳
				$beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
				//一周内时间戳
				$week=strtotime(date("Y-m-d",strtotime("-1 week")));
				if($time>$week && $time<$beginYesterday){
					$new_list[$key]['time'] ="一周内";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$new_list[$key]['time'] ="昨天";
				}elseif($time>$beginToday){	
					$new_list[$key]['time'] = date("H:i",$value['lastupdate']);
					$new_list[$key]['redtime'] =1;
				}else{
					$new_list[$key]['time'] = date("Y-m-d",$value['lastupdate']);
				}
				//获得福利待遇名称
				if(is_array($new_list[$key]['welfare'])&&$new_list[$key]['welfare']){
					foreach($new_list[$key]['welfare'] as $val){
						$new_list[$key]['welfarename'][]=$cache_array['comclass_name'][$val];
					}

				}
				//截取公司名称
				if($paramer[comlen]){
					$new_list[$key][com_n] = mb_substr($value['com_name'],0,$paramer[comlen],"GBK");
				}
				//截取职位名称
				if($paramer[namelen]){
					if($value['rec_time']>time()){
						$new_list[$key][name_n] = "<font color='red'>".mb_substr($value['name'],0,$paramer[namelen],"GBK")."</font>";
					}else{
						$new_list[$key][name_n] = mb_substr($value['name'],0,$paramer[namelen],"GBK");
					}
				}else{
					if($value['rec_time']>time()){
						$new_list[$key]['name_n'] = "<font color='red'>".$value['name']."</font>";
					}
				}
				//构建职位伪静态URL
				$new_list[$key][job_url] = Url("job",array("c"=>"comapply","id"=>$value[id]),"1");
				//构建企业伪静态URL
				$new_list[$key][com_url] = Url("company",array("c"=>"show","id"=>$value[uid]));
				foreach($comrat as $k=>$v){
					if($value[rating]==$v[id]){
						$new_list[$key][color] = str_replace("#","",$v[com_color]);
						$new_list[$key][ratlogo] = $v[com_pic];
						$new_list[$key][ratname] = $v[name];
					}
				}
				if($paramer[keyword]){
					$new_list[$key][name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[name]);
					$new_list[$key][com_name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[com_name]);
					$new_list[$key][name_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$new_list[$key][name_n]);
					$new_list[$key][com_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$new_list[$key][com_n]);
					$new_list[$key][job_city_one]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[provinceid]]);
					$new_list[$key][job_city_two]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[cityid]]);
				}
			}

			if(is_array($new_list)){
				if($paramer[keyword]!=""&&!empty($new_list)){
					addkeywords('3',$paramer[keyword]);
				}
			}
		} ?>
<?php $ulist=array();global $db,$db_config,$config;eval('$paramer=array("item"=>"\'ulist\'","post_len"=>"10","limit"=>"12","key"=>"\'key\'","name"=>"\'userlist1\'","nocache"=>"")
;');
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
        include PLUS_PATH."/job.cache.php";
		$where = "status<>'2' and `r_status`<>'2' and `job_classid`<>'' and `open`='1' and `defaults`='1'";
		//是否属于分站下
		if($config['sy_web_site']=="1"){
			if($config[province]>0 && $config[province]!=""){
				$paramer[provinceid] = $config[province];
			}
			if($config['cityid']>0 && $config['cityid']!=""){
				$paramer['cityid']=$config['cityid'];
			}
			if($config['three_cityid']>0 && $config['three_cityid']!=""){
				$paramer['three_cityid']=$config['three_cityid'];
			}
			if($config['hyclass']>0 && $config['hyclass']!=""){
				$paramer['hy']=$config['hyclass'];
			}
		}
		//关注我公司的人才--条件
		if($paramer[where_uid]){
			$where .=" AND `uid` in (".$paramer['where_uid'].")";
		}
		//黑名单不能查看已拉黑的个人用户简历
		if($_COOKIE['uid']&&$_COOKIE['usertype']=="2"){
			$blacklist=$db->select_all("blacklist","`p_uid`='".$_COOKIE['uid']."'","c_uid");
			if(is_array($blacklist)&&$blacklist){
				foreach($blacklist as $v){
					$buid[]=$v['c_uid'];
				}
			$where .=" AND `uid` NOT IN (".@implode(",",$buid).")";
			}
		}
		//置顶
		if($paramer[topdate]){
			$where .=" AND `topdate`>'".time()."'";
		}
		//筛除重复
		if($paramer[noid]==1 && !empty($noids)){
			$where.=" AND `id` NOT IN (".@implode(',',$noids).")";
		}
		//身份认证
		if($paramer[idcard]){
			$where .=" AND `idcard_status`='1'";
		}
		//高级人才
		if($paramer[height_status]){
			$where .=" AND height_status=".$paramer[height_status];
		}else{
			$where .=" AND height_status<>'2'";
		}
		//高级人才推荐
		if($paramer[rec]){
			$where .=" AND `rec`=1";
		}
		//普通推荐
		if($paramer[rec_resume]){
			$where .=" AND `rec_resume`=1";
		}
		//作品
		if($paramer[work]){
			$show=$db->select_all("resume_show","1 group by eid","`eid`");
			if(is_array($show))
			{
				foreach($show as $v)
				{
					$eid[]=$v['eid'];
				}
			}
			$where .=" AND id in (".@implode(",",$eid).")";
		}
		//地区
		if($paramer[cid]){
			$where .= " AND (cityid=$paramer[cid] or three_cityid=$paramer[cid])";
		}
		//关键字
		if($paramer[keyword]){
			$where1[]="`uname` LIKE '%$paramer[keyword]%'";
			foreach($job_name as $k=>$v){
				if(strpos($v,$paramer[keyword])!==false){
					$jobid[]=$k;
				}
			}
			if(is_array($jobid))
			{
				foreach($jobid as $value)
				{
					$class[]="FIND_IN_SET('".$value."',job_classid)";
				}
				$where1[]=@implode(" or ",$class);
			}
			include PLUS_PATH."/city.cache.php";
			foreach($city_name as $k=>$v)
			{
				if(strpos($v,$paramer[keyword])!==false)
				{
					$cityid[]=$k;
				}
			}
			if(is_array($cityid))
			{
				foreach($cityid as $value)
				{
					$class[]= "(provinceid = '".$value."' or cityid = '".$value."')";
				}
				$where1[]=@implode(" or ",$class);
			}
			$where.=" AND (".@implode(" or ",$where1).")";
		}
		//是否有照片
		if($paramer[pic]=="0"||$paramer[pic]){
			$where .=" AND photo<>''";
		}
		//名称不能为空
		if($paramer[name]=="0"){
			$where .=" AND uname<>''";
		}
		//求职行业不能为空
		if($paramer[hy]=="0"){
			$where .=" AND hy<>''";
		}elseif($paramer[hy]!=""){
			$where .= " AND (`hy` IN (".$paramer['hy']."))";
		}
		//职位类别
		$job_classid="";
		if($paramer[jobids]){
			$joball=explode(",",$paramer[jobids]);
			foreach(explode(",",$paramer[jobids]) as $v){
				if($job_type[$v]){
					$joball[]=@implode(",",$job_type[$v]);
				}
			}
			$job_classid=implode(",",$joball);
		}
		if($paramer[jobin]){
			$joball=explode(",",$paramer[jobin]);
			foreach(explode(",",$paramer[jobin]) as $v){
				if($job_type[$v]){
					$joball[]=@implode(",",$job_type[$v]);
				}
			}
			$job_classid=implode(",",$joball);
		}
		if($paramer[job1]){
			$joball=$job_type[$paramer[job1]];
			foreach($job_type[$paramer[job1]] as $v)
			{
				$joball[]=@implode(",",$job_type[$v]);
			}
			$job_classid=@implode(",",$joball);
		}
		if($paramer[job1_son]){
			$joball=$job_type[$paramer[job1_son]];
			foreach($job_type[$paramer[job1_son]] as $v)
			{
				$joball[]=@implode(",",$v);
			}
			$job_classid=@implode(",",$joball);
		}
		if(!empty($job_classid)){
			$classid=@explode(",",$job_classid);
			foreach($classid as $value){
				$jobclass[]="FIND_IN_SET('".$value."',job_classid)";
			}
			$classid=@implode(" or ",$jobclass);
			$where .= " AND ($classid)";
		}
		if($paramer[job_post]){
			$where .=" AND FIND_IN_SET('".$paramer[job_post]."',job_classid)";
		}
		//城市大类
		if($paramer[provinceid]){
			$where .= " AND provinceid = $paramer[provinceid]";
		}
		//城市子类
		if($paramer[cityid]){
			$where .= " AND (`cityid` IN ($paramer[cityid]))";
		}
		//城市三级子类
		if($paramer[three_cityid]){
			$where .= " AND (`three_cityid` IN ($paramer[three_cityid]))";
		}
		//城市区间,不建议执行该查询
		if($paramer[cityin]){
			$where .= " AND(provinceid IN ($paramer[cityin]) OR cityid IN ($paramer[cityin]) OR three_cityid IN ($paramer[cityin]))";
		}
		//工作经验
		if($paramer[exp]){
			$where .=" AND exp=$paramer[exp]";
		}else{
			$where .=" AND exp>0";
		}
		//学历
		if($paramer[edu]){
			$where .=" AND edu=$paramer[edu]";
		}else{
			$where .=" AND edu>0";
		}
		//性别
		if($paramer[sex]){
			$where .=" AND sex=$paramer[sex]";
		}
		//到岗时间
		if($paramer[report]){
			$where .=" AND report=$paramer[report]";
		}
		//到岗时间
		if($paramer[salary]){
			$where .=" AND salary=$paramer[salary]";
		}
		//工作性质
		if($paramer[type]){
			$where .= " AND type=$paramer[type]";
		}
		//更新时间区间
		if($paramer[uptime]){
			$time=time();
			$uptime = $time-($paramer[uptime]*86400);
			$where.=" AND lastupdate>$uptime";
		}
		//添加时间区间，即审核时间
		if($paramer[adtime]){
			$time=time();
			$adtime = $time-($paramer[adtime]*86400);
			$where.=" AND status_time>$adtime";
		}
		
        //排序字段默认为更新时间
		
		if($paramer[order] && $paramer[order]!="lastdate"){
			if($paramer[order]=='ant_num'){
				$order = " ORDER BY `ant_num`";
			}elseif($paramer[order]=='topdate'){
				$nowtime=time();
				$order = " ORDER BY if(topdate>$nowtime,topdate,lastupdate)";
			}else{
				$order = " ORDER BY `".str_replace("'","",$paramer[order])."`";
			}
		}else{
			$order = " ORDER BY lastupdate ";
		}
		
		//排序规则 默认为倒序
		$sort = $paramer[sort]?$paramer[sort]:'DESC';
		//查询条数
		if($paramer[limit]){
			$limit=" LIMIT ".$paramer[limit];
		}

		//自定义查询条件，默认取代上面任何参数直接使用该语句
		if($paramer[where]){
			$where = $paramer[where];
		}
		if($paramer[ispage]){
			if($paramer["height_status"]){
				$limit = PageNav($paramer,$_GET,"resume_expect",$where,$Purl,"","3",$_smarty_tpl);
			}else{
				$limit = PageNav($paramer,$_GET,"resume_expect",$where,$Purl,"",'0',$_smarty_tpl);
			}
		}
		$where.=$order.$sort;
		$ulist=$db->select_all("resume_expect",$where.$limit,"*,uname as username");

		if(is_array($ulist)){
			//处理类别字段
			$cache_array = $db->cacheget();
			$userclass_name = $cache_array["user_classname"];
			$city_name      = $cache_array["city_name"];
			$job_name		= $cache_array["job_name"];
			$industry_name	= $cache_array["industry_name"];
			$my_down=array();
			if($_COOKIE['usertype']=='2'&&$config['sy_usertype_1']=='1'){
				$my_down=$db->select_all("down_resume","`comid`='".$_COOKIE['uid']."'","uid");
			}
			//如果存在top，则说明请求来自排行榜页面
			if($paramer['top']){
				$uids=$m_name=array();
				foreach($ulist as $k=>$v){
					$uids[]=$v[uid];
				}

				$member=$db->select_all($db_config[def]."member","`uid` in(".@implode(',',$uids).")","uid,username");
				foreach($member as $val){
					$m_name[$val[uid]]=$val['username'];
				}
			}
			foreach($ulist as $key=>$value){
				$uid[] = $value['uid'];
				$eid[] = $value['id'];
			}
			$eids = @implode(',',$eid);
			$uids = @implode(',',$uid);

			foreach($ulist as $k=>$v){
				if($paramer[topdate]){
					$noids[] = $v[id];
				}
				//更新时间显示方式
				$time=$v['lastupdate'];
				//今天开始时间戳
				$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
				//昨天开始时间戳
				$beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
				//一周内时间戳
				$week=strtotime(date("Y-m-d",strtotime("-1 week")));
				if($time>$week && $time<$beginYesterday){
					$ulist[$k]['time'] = "一周内";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$ulist[$k]['time'] = "昨天";
				}elseif($time>$beginToday){
					$ulist[$k]['time'] = date("H:i",$v['lastupdate']);
					$ulist[$k]['redtime'] =1;
				}else{
					$ulist[$k]['time'] = date("Y-m-d",$v['lastupdate']);
				} 
				if($v['photo']==''){
					$ulist[$k]['photo']=$v['photo']=$config['sy_member_icon'];
				}else{
					$ulist[$k]['ispic']=1;
				}
				//同时满足两个条件才需对对头像进行处理
				if($config['sy_usertype_1']=='1'&&$v['photo']){
					if(!empty($my_down)){
						foreach($my_down as $m_k=>$m_v){
							$my_down_uid[]=$m_v['uid'];
						}
						if(in_array($v['uid'],$my_down_uid)==false){
							$ulist[$k]['photo']='./'.$config['sy_member_icon'];
						}
					}else{
						$ulist[$k]['photo']='./'.$config['sy_member_icon'];
					}
				}
				if($config["user_name"]==3)
				{
					$ulist[$k]["username_n"] = "NO.".$v["id"];
				}elseif($config["user_name"]==2){
					if($userclass_name[$v['sex']]=='男'){
						$ulist[$k]["username_n"] = mb_substr($v["username"],0,1,'GBK')."先生";
					}else{
						$ulist[$k]["username_n"] = mb_substr($v["username"],0,1,'GBK')."女士";
					}
				}else{
					$ulist[$k]["username_n"] = $v["username"];
				}
				if($v[birthday])
				{
					$a=date('Y',strtotime($ulist[$k]['birthday']));
					$ulist[$k]['age']=date("Y")-$a;
				}else{
					$ulist[$k]['age']="保密";
				}

				$ulist[$k]['sex_n']=$userclass_name[$v['sex']];
				$ulist[$k]['edu_n']=$userclass_name[$v['edu']];
				$ulist[$k]['exp_n']=$userclass_name[$v['exp']];
				$ulist[$k]['job_city_one']=$city_name[$v['provinceid']];
				$ulist[$k]['job_city_two']=$city_name[$v['cityid']];
				$ulist[$k]['job_city_three']=$city_name[$v['three_cityid']];
				$ulist[$k]['salary_n']=$userclass_name[$v['salary']];
				$ulist[$k]['report_n']=$userclass_name[$v['report']];
				$ulist[$k]['type_n']=$userclass_name[$v['type']];
				$ulist[$k]['lastupdate']=date("Y-m-d",$v['lastupdate']);

				$ulist[$k]['user_url']=Url("resume",array("c"=>"show","id"=>$v['id']),"1");
				$ulist[$k]["hy_info"]=$industry_name[$v['hy']];
				if($paramer['top']){
					$ulist[$k]['m_name']=$m_name[$v['uid']];
					$ulist[$k]['user_url']=Url("ask",array("c"=>"friend","uid"=>$v['uid']));
				}
				$job_classid=@explode(",",$v['job_classid']);
				if(is_array($job_classid))
				{
					foreach($job_classid as $val)
					{
						$jobname[]=$job_name[$val];
					}
				}
				$ulist[$k]['job_post']=@implode(",",$jobname);
				//截取标题
				if($paramer['post_len'])
				{
					$postname[$k]=@implode(",",$jobname);
					$ulist[$k]['job_post_n']=mb_substr($postname[$k],0,$paramer[post_len],"GBK");
				}
				if($paramer['keyword'])
				{
					$ulist[$k]['username']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$v['username']);
					$ulist[$k]['job_post']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$ulist[$k]['job_post']);
					$ulist[$k]['job_post_n']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$ulist[$k]['job_post_n']);
					$ulist[$k]['job_city_one']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$city_name[$v['provinceid']]);
					$ulist[$k]['job_city_two']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$city_name[$v['cityid']]);
				}
				$jobname=array();
			}
			if($paramer['keyword']!=""&&!empty($ulist)){
				addkeywords('5',$paramer['keyword']);
			}
		} ?>
<?php global $db,$db_config,$config;include PLUS_PATH.'/group.cache.php';$indexnews=array();$rs=null;$nids=null;eval('$paramer=array("rec"=>"1","limit"=>"8","pic"=>"1","t_len"=>"18","d_len"=>"24","type"=>"\'t\'","urlstatic"=>"1","item"=>"\'indexnews\'","name"=>"\'newlist2\'","nocache"=>"")
;');
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr['arr'];
		$Purl =  $ParamerArr['purl'];
        if($paramer[cache]){
			$Purl="{{page}}.html";
		}
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		$where=1;
		if($config['did']){
			$where.=" and `did`='".$config['did']."'";
		}
		include PLUS_PATH."/group.cache.php"; 
		if(is_array($paramer)){
			if($paramer['nid']){
				$nid_s = @explode(',',$paramer[nid]);				
				foreach($nid_s as $v){
					if($group_type[$v]){
						$paramer[nid] = $paramer[nid].",".@implode(',',$group_type[$v]);
					}
				}
			}
			
			if($paramer['nid']!=""){
				$where .=" AND `nid` in ($paramer[nid])";
				$nids = @explode(',',$paramer['nid']);$paramer['nid']=$paramer['nid'];
			}else if($paramer['rec']!=""){
				$nids=array();if(is_array($group_rec)){
					foreach($group_rec as $key=>$value){
						if($key<=2){
							$nids[]=$value;
						}
					}
					$paramer[nid]=@implode(',',$nids);
				}
			}
			
			if($paramer['type']){
				$type = str_replace("\"","",$paramer[type]);
				$type_arr =	@explode(",",$type);
				if(is_array($type_arr) && !empty($type_arr))
				{
					foreach($type_arr as $key=>$value)
					{
						$where .=" AND FIND_IN_SET('".$value."',`describe`)";
						if(count($nids)>0)
						{
							$picwhere .=" AND FIND_IN_SET('".$value."',`describe`)";
						}
					}
				}
			}
			//拼接补充SQL条件
			if($paramer['pic']!=""){
				$where .=" AND `newsphoto`<>''";
			}
			//新闻搜索
			if($paramer['keyword']!=""){
				$where .=" AND `title` LIKE '%".$paramer[keyword]."%'";
			}
			
			//拼接查询条数
			if(intval($paramer['limit'])>0){
				$limit = intval($paramer['limit']);
				$limit = " limit ".$limit;
			}
			if($paramer['ispage']){
				if($Purl["m"]=="wap"){
					$limit = PageNav($paramer,$_GET,"news_base",$where,$Purl,"","6",$_smarty_tpl);
				}else{
					$limit = PageNav($paramer,$_GET,"news_base",$where,$Purl,"","5",$_smarty_tpl);
				}
			}
			//拼接字段排序
			if($paramer['order']!=""){
				$order = str_replace("'","",$paramer['order']);
				$where .=" ORDER BY $order";
			}else{
				$where .=" ORDER BY `datetime`";
			}
			//排序方式默认倒序
			if($paramer['sort']){
				$where.=" ".$paramer[sort];
			}else{
				$where.=" DESC";
			}
		}

		//多类别新闻查找
		if(!intval($paramer['ispage']) && count($nids)>0){
			
			$nidArr = @explode(',',$paramer[nid]);
			if(is_array($nidArr)){
				foreach($nidArr as $value){
					
					$indexnews[$value] = '';
				}
			}
			$rsnids = '';
			if(is_array($group_type)){

				foreach($group_type as $key=>$value){
					if(in_array($key,$nidArr)){
						
						if(is_array($value)){
							foreach($value as $v){

								$rsnids[$v] = $key;
								$nidArr[] = $v;
							}
						}
					}
				}
				
			
			}
			$where = " `nid` IN (".@implode(',',$nidArr).")";
			if($config['did']){
				$where.=" and `did`='".$config['did']."'";
			}
			//查询带图新闻
			if($paramer['pic']){
				if(!$paramer['piclimit']){
					$piclimit = 1;
				}else{
					$piclimit = $paramer['piclimit'];
				}
				$db->query("set @f=0,@n=0");
				$query = $db->query("select * from (select id,title,color,datetime,description,newsphoto,@n:=if(@f=nid,@n:=@n+1,1) as aid,@f:=nid as nid from $db_config[def]news_base  WHERE ".$where." AND `newsphoto` <>''  order by nid asc,datetime desc) a where aid <=".$piclimit);
				while($rs = $db->fetch_array($query)){
					if($rsnids[$rs['nid']]){
						$rs['nid'] = $rsnids[$rs['nid']];
					}
					//处理标题长度
					if(intval($paramer[t_len])>0){

						$len = intval($paramer[t_len]);
						$rs[title] = mb_substr($rs[title],0,$len,"GBK");
					}
					if($rs[color]){
						$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";
					}
					//处理描述内容长度
					if(intval($paramer[d_len])>0)
					{
						$len = intval($paramer[d_len]);
						$rs[description] = mb_substr($rs[description],0,$len,"GBK");
					}
					$rs['name'] = $group_name[$rs['nid']];

					//构建资讯静态链接
					if($config[sy_news_rewrite]=="2"){
						$rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
					}else{
						$rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
					}
					$rs[time]=date("Y-m-d",$rs[datetime]);
					$rs['datetime']=date("m-d",$rs[datetime]);
					if(count($indexnews[$rs['nid']]['arclist'])<$paramer[limit]){
					$indexnews[$rs['nid']]['pic'][] = $rs;
					}
				
				}
			}
			
            $db->query("set @f=0,@n=0");
            $query = $db->query("select * from (select id,title,datetime,color,description,newsphoto,@n:=if(@f=nid,@n:=@n+1,1) as aid,@f:=nid as nid from $db_config[def]news_base  WHERE ".$where." order by nid asc,datetime desc) a where aid <=$paramer[limit]");

            while($rs = $db->fetch_array($query)){
				if($rsnids[$rs['nid']]){
						$rs['nid'] = $rsnids[$rs['nid']];
					}
                //处理标题长度
                if(intval($paramer[t_len])>0){

					$len = intval($paramer[t_len]);
					$rs[title] = mb_substr($rs[title],0,$len,"GBK");
				}
				if($rs[color]){
					$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";
				}
                //处理描述内容长度
                if(intval($paramer[d_len])>0){
                    $len = intval($paramer[d_len]);
                    $rs[description] = mb_substr($rs[description],0,$len,"GBK");
                }
                //获取所属类别名称
                $rs['name'] = $group_name[$rs['nid']];
                //构建资讯静态链接
                if($config[sy_news_rewrite]=="2"){
                    $rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
                }else{
                    $rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
                }
                $rs[time]=date("Y-m-d",$rs[datetime]);
                $rs[datetime]=date("m-d",$rs[datetime]);
				if(count($indexnews[$rs['nid']]['arclist'])<$paramer[limit]){
					$indexnews[$rs['nid']]['arclist'][] = $rs;
				}
                
            }
		}else{
			$query = $db->query("SELECT * FROM `$db_config[def]news_base` WHERE ".$where.$limit);
			while($rs = $db->fetch_array($query)){
				//处理标题长度
               
				if(intval($paramer[t_len])>0){

					$len = intval($paramer[t_len]);
					$rs[title] = mb_substr($rs[title],0,$len,"GBK");
				}
				if($rs[color]){
					$rs[title] = "<font color='".$rs[color]."'>".$rs[title]."</font>";
				}

                //处理描述内容长度
                if(intval($paramer[d_len])>0)
                {
                    $len = intval($paramer[d_len]);
                    $rs[description] = mb_substr($rs[description],0,$len,"GBK");
                }
                //获取所属类别名称
                $rs['name'] = $group_name[$rs['nid']];
                //构建资讯静态链接
                if($config[sy_news_rewrite]=="2"){
                    $rs["url"]=$config['sy_weburl']."/news/".date("Ymd",$rs["datetime"])."/".$rs[id].".html";
                }else{
                    $rs["url"] = Url("article",array("c"=>"show","id"=>$rs[id]),"1");
                }
                $rs[time]=date("Y-m-d",$rs[datetime]);
                $rs[datetime]=date("m-d",$rs[datetime]);
                $indexnews[] = $rs;
            }
		} ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/css.css" type="text/css" />
<!--[if IE 6]>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/png.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
DD_belatedPNG.fix('.png,.pagination li a,.#sidebar .menu_main h2 span,..yunuserEnterBox .yun_topLogin a.yun_More');
<?php echo '</script'; ?>
>
<![endif]-->
<?php if ($_smarty_tpl->tpl_vars['ishtml']->value) {?>
<?php echo '<script'; ?>
 src="<?php echo smarty_function_url(array('m'=>'ajax','c'=>'wjump'),$_smarty_tpl);?>
" language="javascript"><?php echo '</script'; ?>
>
<?php }?>
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
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/reg_ajax.js" type="text/javascript"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/yunindex4.2.css" type="text/css" />
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/index.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/search.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/slides.jquery.js" type="text/javascript"><?php echo '</script'; ?>
>
</head>
<body class="yunIndexBody">
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/index_header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 

 <?php echo '<script'; ?>
>
    $(document).ready(function(){
        $('.yunHeaderSearch_left').delegate('#search_name','click',function(){$(this).next().show();});
		$("img.lazy").lazyload();
    });
<?php echo '</script'; ?>
> 
<div class="yunw1024">
<div class="yun_Index_leftsidebar fl">
<div class="yun_Index_leftsidebar_tit yun_z_bg">职位分类<i class="yun_Index_leftsidebar_icon png"></i></div>
 <div id="sidebar">
      <div class="mainNavs"> 
        <!--放上去current--> 
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
		<?php if ($_smarty_tpl->tpl_vars['key']->value<6) {?>
        <div class="menu_box" aid="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" id="jobclass<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
          <div class="menu_main">
            <h2><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
 <span ></span></h2>
            <div class="menu_main_b_h">
            <?php  $_smarty_tpl->tpl_vars['vv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_smarty_tpl->tpl_vars['v']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vv']->key => $_smarty_tpl->tpl_vars['vv']->value) {
$_smarty_tpl->tpl_vars['vv']->_loop = true;
?> 
            <a href="<?php echo smarty_function_listurl(array('t'=>'index','type'=>'job1_son','job1'=>$_smarty_tpl->tpl_vars['v']->value,'job1_son'=>$_smarty_tpl->tpl_vars['vv']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['vv']->value];?>
 </a> <?php } ?> 
            </div>
            </div>
          <div class="menu_sub dn" style="top: 0px;<?php if (count($_smarty_tpl->tpl_vars['job_type']->value[$_smarty_tpl->tpl_vars['v']->value])<3) {?>height:550px;<?php }?>" id="jobclass_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"> <?php  $_smarty_tpl->tpl_vars['vvl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vvl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_smarty_tpl->tpl_vars['v']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vvl']->key => $_smarty_tpl->tpl_vars['vvl']->value) {
$_smarty_tpl->tpl_vars['vvl']->_loop = true;
?>
            <dl class="reset">
              <dt>
              		<a href="<?php echo smarty_function_listurl(array('t'=>'index','type'=>'job1_son','job1'=>$_smarty_tpl->tpl_vars['v']->value,'job1_son'=>$_smarty_tpl->tpl_vars['vvl']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['vvl']->value];?>
 </a>
              </dt>
              <dd> 
              <?php  $_smarty_tpl->tpl_vars['vvv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vvv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_smarty_tpl->tpl_vars['vvl']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vvv']->key => $_smarty_tpl->tpl_vars['vvv']->value) {
$_smarty_tpl->tpl_vars['vvv']->_loop = true;
?> 
              <a href="<?php echo smarty_function_listurl(array('t'=>'index','type'=>'job_post','job1'=>$_smarty_tpl->tpl_vars['v']->value,'job1_son'=>$_smarty_tpl->tpl_vars['vvl']->value,'job_post'=>$_smarty_tpl->tpl_vars['vvv']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['vvv']->value];?>
 </a> 
              <?php } ?> </dd>
            </dl>
            <?php } ?> </div>
        </div>
		<?php }?>
        <?php } ?> </div>
    </div>
</div>
<div class="yun_Index_rightsidebar fr">
      <div class="cont_Projector fl">
        <div class="Projector">
          <div class="Projector_img">
            <div id="slides" class="s_lb">
              <div class="slides_container">
               <?php  $_smarty_tpl->tpl_vars["lunbo"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["lunbo"]->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$AdArr=array();$paramer=array();
			include(PLUS_PATH.'/pimg_cache.php');$add_arr = $ad_label[3];if(is_array($add_arr) && !empty($add_arr)){
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
foreach ($AdArr as $_smarty_tpl->tpl_vars["lunbo"]->key => $_smarty_tpl->tpl_vars["lunbo"]->value) {
$_smarty_tpl->tpl_vars["lunbo"]->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars["lunbo"]->key;
?>
                <div class="slide"><?php echo $_smarty_tpl->tpl_vars['lunbo']->value['html'];?>
</div>
                <?php } ?> 
               </div>
            </div>
          </div>
        </div>
      </div>
<!-- Index  login-->  
<div class="yun_Indexlogin fr">   
<div class="yun_Indexlogin_tit"> <span class="yun_Indexlogin_tit_s"><i class="yun_Indexlogin_tit_line yun_z_bg"></i>用户登录<i class="yun_Indexlogin_tit_sw"></i></span></div>
<div class="yun_Indexlogin_box ">
<div class="yun_Indexlogin_text">
<div><i class="yun_Indexlogin_icon"></i></div>
<input type="text" id="username" name="username" value="邮箱/手机号/用户名" class="yun_Indexlogin_t">
 <div class="index_logoin_msg none" id="show_name">
        <div class="index_logoin_msg_tx">请填写用户名</div>
        <div class="index_logoin_msg_icon"></div>
   </div>
</div>
<div class="yun_Indexlogin_text">
<div><i class="yun_Indexlogin_icon yun_Indexlogin_icon_m"></i></div>
<input type="text" id="password2" value="请输入密码" class="yun_Indexlogin_t">
<input type="password" id="password" name="password" class="yun_Indexlogin_t none" value="">
      <div class="index_logoin_msg none" id="show_pass">
	   <div class="index_logoin_msg_tx">请填写密码</div>
	   <div class="index_logoin_msg_icon"></div>
</div>
</div>
<div class="yun_Indexlogin_yzm_t">
<div><i class="yun_Indexlogin_icon yun_Indexlogin_yzm_icon"></i></div>
<?php if (stripos($_smarty_tpl->tpl_vars['config']->value['code_web'],"前台登陆")!==false) {?>
<input type="text" id="txt_CheckCode" name="authcode" value="验证码" class="yun_Indexlogin_yzm">
<a href="javascript:void(0);" onclick="check_codes();"><img id="vcode_imgs" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/include/authcode.inc.php" width="60" height="30" class="yun_Indexlogin_yzm_img"></a>
<a href="javascript:void(0);" onclick="check_codes();" class="yun_Indexlogin_icon_m_hyh">换一换？</a>
<?php } else { ?>
<div class="yun_Indexlogin_zddl"><input type="checkbox" value=""> 下次自动登录</div>
<?php }?>
</div>
<div class="yun_Indexlogin_sub"><input type="submit" value="立即登录" class="yun_Indexlogin_bth" onclick="check_login('<?php echo smarty_function_url(array('m'=>'login','c'=>'loginsave'),$_smarty_tpl);?>
');"></div>
<div class="yun_Indexlogin_sub_fotg">还没有注册账号？<a href="<?php echo smarty_function_url(array('m'=>'forgetpw'),$_smarty_tpl);?>
" class="yun_Indexlogin_ft ">忘记密码?</a></div>
<div class="yun_Indexlogin_p"><a href="<?php echo smarty_function_url(array('m'=>'register','usertype'=>2),$_smarty_tpl);?>
" class="yun_text_color_login yun_text_color">企业注册</a><a href="<?php echo smarty_function_url(array('m'=>'register','usertype'=>1),$_smarty_tpl);?>
" class="yun_text_color_login_gr yun_text_color">个人注册</a></div>
</div>
</div>
<?php echo '<script'; ?>
>
$(document).ready(function(){
	$.post("<?php echo smarty_function_url(array('m'=>'ajax','c'=>'DefaultLoginIndex'),$_smarty_tpl);?>
",{},function(data){
		$(".yun_Indexlogin").html(data);
	});
});
<?php echo '</script'; ?>
>
<section>
<div class="yunIndex_box fl">
<div class="yunIndex_Emergencybox fl">
<div class="yunIndex_tit fl">
<span class="yunFamousenterprises_tit_s fl"><a href="<?php echo smarty_function_listurl(array('type'=>'tp','v'=>1),$_smarty_tpl);?>
" rel="nofollow" target="_blank">紧急招聘</a><i class="yunFamousenterprises_tit_i yun_z_bg"></i></span>
<a href="<?php echo smarty_function_listurl(array('type'=>'tp','v'=>1),$_smarty_tpl);?>
" class="yunIndex_tit_more yun_text_color yunIndex_tit_more_mt fr" rel="nofollow" target="_blank">查看更多<i class="yunIndex_tit_more_icon"></i></a></div>
<div class="yunIndex_Emergency">
<ul class="yunIndex_Emergency_list">
 <?php  $_smarty_tpl->tpl_vars['urgent_list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['urgent_list']->_loop = false;
$urgent_list = $urgent_list; if (!is_array($urgent_list) && !is_object($urgent_list)) { settype($urgent_list, 'array');}
foreach ($urgent_list as $_smarty_tpl->tpl_vars['urgent_list']->key => $_smarty_tpl->tpl_vars['urgent_list']->value) {
$_smarty_tpl->tpl_vars['urgent_list']->_loop = true;
?>
<li>
<div class="yunIndex_Emergency_left fl">
<aside class="zz_yun">
<div class="yunIndex_Emergency_leftjobname"><a href="<?php echo $_smarty_tpl->tpl_vars['urgent_list']->value['job_url'];?>
" target="_blank" class="yunIndex_Emergency_Jobname yun_text_color"><?php echo $_smarty_tpl->tpl_vars['urgent_list']->value['name'];?>
</a></div></aside>
<aside><div class="yunIndex_Emergency_p"><span class="yunIndex_Emergency_Xz"><?php if ($_smarty_tpl->tpl_vars['urgent_list']->value['job_salary']!='面议') {?>￥<?php }
echo $_smarty_tpl->tpl_vars['urgent_list']->value['job_salary'];?>
</span><?php echo $_smarty_tpl->tpl_vars['urgent_list']->value['job_exp'];?>
经验/<?php echo $_smarty_tpl->tpl_vars['urgent_list']->value['job_edu'];?>
学历</div></aside>
<aside><div class="yunIndex_Emergency_p2"><a href="<?php echo $_smarty_tpl->tpl_vars['urgent_list']->value['com_url'];?>
"  target="_blank" class="yunIndex_Emergency_name"><?php echo $_smarty_tpl->tpl_vars['urgent_list']->value['com_name'];?>
</a></div></aside>
</div>
<div class="yunIndex_Emergency_logo fl"><a href="<?php echo $_smarty_tpl->tpl_vars['urgent_list']->value['job_url'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['urgent_list']->value['logo'];?>
" width="148" height="60" alt="<?php echo $_smarty_tpl->tpl_vars['urgent_list']->value['com_name'];?>
"></a></div>
</li>
 <?php } ?>
</ul>
</div>
</div>
</div>
</section>
</div>
<!-- 名企--> 
<section>    
 <div class="yunFamousenterprises fl">    
 <div class="yunFamousenterprises_tit fl"><span class="yunFamousenterprises_tit_s fl"><a href="<?php echo smarty_function_url(array('m'=>'company','rec'=>1),$_smarty_tpl);?>
" rel="nofollow" target="_blank">名企招聘</a><i class="yunFamousenterprises_tit_i yun_z_bg"></i></span><a href="<?php echo smarty_function_url(array('m'=>'company','rec'=>1),$_smarty_tpl);?>
" class="yunIndex_tit_more yun_text_color fr" rel="nofollow"target="_blank">查看更多<i class="yunIndex_tit_more_icon"></i></a></div>
<div class="yunFamousenterprises_box fl">
          <div class="Famous_recruitment_cont">
            <div class="index_left15560">
              <div id="mainids"> 
              <?php  $_smarty_tpl->tpl_vars['hotjoblist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['hotjoblist']->_loop = false;
$hotjoblist = $hotjoblist; if (!is_array($hotjoblist) && !is_object($hotjoblist)) { settype($hotjoblist, 'array');}
foreach ($hotjoblist as $_smarty_tpl->tpl_vars['hotjoblist']->key => $_smarty_tpl->tpl_vars['hotjoblist']->value) {
$_smarty_tpl->tpl_vars['hotjoblist']->_loop = true;
?>
                <div class="tlogo">
                  <ul>
                    <li onmouseover="showDiv2(this)" onmouseout="showDiv2(this)"> <a href="<?php echo $_smarty_tpl->tpl_vars['hotjoblist']->value['url'];?>
" target="_blank" class="tlogo_p_a"><img width="185" height="75" border="1" data-original="<?php echo smarty_function_formatpicurl(array('path'=>$_smarty_tpl->tpl_vars['hotjoblist']->value['hot_pic']),$_smarty_tpl);?>
" class="on lazy"src="<?php echo $_smarty_tpl->tpl_vars['hotjoblist']->value['hot_pic'];?>
" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_unit_icon'];?>
',2);" alt="<?php echo $_smarty_tpl->tpl_vars['hotjoblist']->value['username'];?>
"/></a>
                      <div class="show">
                        <div class="area"><i class="area_icon"></i><?php echo $_smarty_tpl->tpl_vars['hotjoblist']->value['job'];?>
</div>
                      </div>
                    </li>
                  </ul>
                </div>
                <?php } ?> 
                </div>
            </div>
</div>
</div>
</div>
</section>
   <div class="clear"></div>
    <div class="index_w1024">
    <div class="index_banner_main">
      <div class="index_banner_cont">
        <?php  $_smarty_tpl->tpl_vars['adlist_13'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['adlist_13']->_loop = false;
$AdArr=array();$paramer=array();
			include(PLUS_PATH.'/pimg_cache.php');$add_arr = $ad_label[13];if(is_array($add_arr) && !empty($add_arr)){
				$i=0;$limit = 2;$length = 0;
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
foreach ($AdArr as $_smarty_tpl->tpl_vars['adlist_13']->key => $_smarty_tpl->tpl_vars['adlist_13']->value) {
$_smarty_tpl->tpl_vars['adlist_13']->_loop = true;
?>
        <?php echo $_smarty_tpl->tpl_vars['adlist_13']->value['html'];?>

        <?php } ?>
        <?php  $_smarty_tpl->tpl_vars['adlist_14'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['adlist_14']->_loop = false;
$AdArr=array();$paramer=array();
			include(PLUS_PATH.'/pimg_cache.php');$add_arr = $ad_label[14];if(is_array($add_arr) && !empty($add_arr)){
				$i=0;$limit = 6;$length = 0;
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
foreach ($AdArr as $_smarty_tpl->tpl_vars['adlist_14']->key => $_smarty_tpl->tpl_vars['adlist_14']->value) {
$_smarty_tpl->tpl_vars['adlist_14']->_loop = true;
?>
        <?php echo $_smarty_tpl->tpl_vars['adlist_14']->value['html'];?>

        <?php } ?>
        <?php  $_smarty_tpl->tpl_vars['adlist_15'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['adlist_15']->_loop = false;
$AdArr=array();$paramer=array();
			include(PLUS_PATH.'/pimg_cache.php');$add_arr = $ad_label[15];if(is_array($add_arr) && !empty($add_arr)){
				$i=0;$limit = 10;$length = 0;
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
foreach ($AdArr as $_smarty_tpl->tpl_vars['adlist_15']->key => $_smarty_tpl->tpl_vars['adlist_15']->value) {
$_smarty_tpl->tpl_vars['adlist_15']->_loop = true;
?>
        <?php echo $_smarty_tpl->tpl_vars['adlist_15']->value['html'];?>

        <?php } ?> </div>
        </div>
    </div>
    <div class="clear"></div>
<section>
<div class="yunIndex_newbox fl">
<div class="yunIndex_newtit fl">
<span class="yunFamousenterprises_tit_s fl"><a href="<?php echo smarty_function_listurl(array('type'=>'tp','v'=>2),$_smarty_tpl);?>
"rel="nofollow"target="_blank">推荐职位</a><i class="yunFamousenterprises_tit_i yun_z_bg"></i></span>
<a href="<?php echo smarty_function_listurl(array('type'=>'tp','v'=>2),$_smarty_tpl);?>
" class="yunIndex_tit_more yun_text_color yunIndex_tit_more_mt fr" rel="nofollow"target="_blank">查看更多<i class="yunIndex_tit_more_icon"></i></a></div>
<div class="yunIndex_con_box fl">
<div class="yunIndex_Recommend">
<ul class="yunIndex_Recommend_list">
 <?php  $_smarty_tpl->tpl_vars['rec_list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rec_list']->_loop = false;
$rec_list = $rec_list; if (!is_array($rec_list) && !is_object($rec_list)) { settype($rec_list, 'array');}
foreach ($rec_list as $_smarty_tpl->tpl_vars['rec_list']->key => $_smarty_tpl->tpl_vars['rec_list']->value) {
$_smarty_tpl->tpl_vars['rec_list']->_loop = true;
?>
<li>
<aside><div class="yunIndex_Recommend_job"><span class="yunIndex_Recommend_job_s"><a href="<?php echo $_smarty_tpl->tpl_vars['rec_list']->value['job_url'];?>
" class="yunIndex_Recommend_jobname yun_text_color"><?php echo $_smarty_tpl->tpl_vars['rec_list']->value['name_n'];?>
</a></span> <span class="yunIndex_Recommend_XZ"><?php if ($_smarty_tpl->tpl_vars['rec_list']->value['job_salary']!='面议') {?>￥<?php }
echo $_smarty_tpl->tpl_vars['rec_list']->value['job_salary'];?>
</span></div></aside>
<aside><div class="yunIndex_Recommend_p"><?php echo mb_substr($_smarty_tpl->tpl_vars['rec_list']->value['job_city_two'],0,4,"gbk");?>
 <?php echo mb_substr($_smarty_tpl->tpl_vars['rec_list']->value['job_city_three'],0,4,"gbk");?>
<span class="yunIndex_Recommend_line">|</span><?php echo $_smarty_tpl->tpl_vars['rec_list']->value['job_exp'];?>
工作经验<span class="yunIndex_Recommend_line">|</span><?php echo $_smarty_tpl->tpl_vars['rec_list']->value['job_edu'];?>
</div></aside>
<aside><div class="yunIndex_Recommend_p2"><a href="<?php echo $_smarty_tpl->tpl_vars['rec_list']->value['com_url'];?>
" class="yunIndex_Emergency_name"><?php echo $_smarty_tpl->tpl_vars['rec_list']->value['com_n'];?>
</a></div></aside>
</li>
 <?php } ?>
</ul>
</div>
</div>
</div>
</section>
<section>
<div class="yunIndex_newbox fl">
<div class="yunIndex_newtit fl">
<span class="yunFamousenterprises_tit_s fl"><a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'search'),$_smarty_tpl);?>
"rel="nofollow"target="_blank">最新职位</a><i class="yunFamousenterprises_tit_i yun_z_bg"></i></span>
<a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'search'),$_smarty_tpl);?>
" class="yunIndex_tit_more yun_text_color yunIndex_tit_more_mt fr" rel="nofollow"target="_blank">查看更多<i class="yunIndex_tit_more_icon"></i></a></div>
<div class="yunIndex_con_box fl">
<div class="yunIndex_Newjob fl">
<ul class="yunIndex_Newjob_list fl">
 <?php  $_smarty_tpl->tpl_vars['new_list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['new_list']->_loop = false;
$new_list = $new_list; if (!is_array($new_list) && !is_object($new_list)) { settype($new_list, 'array');}
foreach ($new_list as $_smarty_tpl->tpl_vars['new_list']->key => $_smarty_tpl->tpl_vars['new_list']->value) {
$_smarty_tpl->tpl_vars['new_list']->_loop = true;
?>
<li>
<div class="yunIndex_Newjob_left fl">
<div class="yunIndex_Newjob_t fl"><a href="<?php echo $_smarty_tpl->tpl_vars['new_list']->value['job_url'];?>
" class="yunIndex_Newjob_name yun_text_color"><?php echo $_smarty_tpl->tpl_vars['new_list']->value['name_n'];?>
</a> <span class="yunIndex_Newjob_t_date"><?php echo $_smarty_tpl->tpl_vars['new_list']->value['time'];?>
</span></div>
<div class="yunIndex_Newjob_p fl"><span class="yunIndex_Newjobzx"><?php if ($_smarty_tpl->tpl_vars['new_list']->value['job_salary']!='面议') {?>￥<?php }
echo $_smarty_tpl->tpl_vars['new_list']->value['job_salary'];?>
</span><?php echo $_smarty_tpl->tpl_vars['new_list']->value['job_exp'];?>
经验/<?php echo $_smarty_tpl->tpl_vars['new_list']->value['job_edu'];?>
学历</div>
</div>
<div class="yunIndex_Newjob_right fr">
<div class="yunIndex_Newcom_name"><a href="<?php echo $_smarty_tpl->tpl_vars['new_list']->value['com_url'];?>
" class="yunIndex_Newcom_cname"><?php echo $_smarty_tpl->tpl_vars['new_list']->value['com_n'];?>
</a></div>
</div>
</li>
 <?php } ?>
</ul>
</div>
</div>
</div>
</section>
<section>
<div class="yunIndex_newbox yunIndex_newbox_pd fl">
<div class="yunIndex_newtit fl">
<span class="yunFamousenterprises_tit_s fl"><a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'search'),$_smarty_tpl);?>
"rel="nofollow"target="_blank">人才推荐</a><i class="yunFamousenterprises_tit_i yun_z_bg"></i></span>
<a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'search'),$_smarty_tpl);?>
" class="yunIndex_tit_more yun_text_color yunIndex_tit_more_mt fr" rel="nofollow"target="_blank">查看更多<i class="yunIndex_tit_more_icon"></i></a></div>

<div class="yunIndex_user fl">
<ul class="yunIndex_user_list">
 <?php  $_smarty_tpl->tpl_vars['ulist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ulist']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$ulist = $ulist; if (!is_array($ulist) && !is_object($ulist)) { settype($ulist, 'array');}
foreach ($ulist as $_smarty_tpl->tpl_vars['ulist']->key => $_smarty_tpl->tpl_vars['ulist']->value) {
$_smarty_tpl->tpl_vars['ulist']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['ulist']->key;
?>
<li>
<div class="yunIndex_user_pic">
<a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>'`$ulist.id`'),$_smarty_tpl);?>
" target="_blank"><img width="80" height="100" data-original="<?php echo $_smarty_tpl->tpl_vars['ulist']->value['photo'];?>
" class="lazy" src="<?php echo $_smarty_tpl->tpl_vars['ulist']->value['photo'];?>
" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
',2);" />
<i class="yunIndex_user_pic_bg png"></i></a></div>
<div class="yunIndex_user_p yunIndex_user_name"><a class="cblue blod" href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>'`$ulist.id`'),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['ulist']->value['username_n'];?>
</a></div>
<div class="yunIndex_user_p"><?php echo $_smarty_tpl->tpl_vars['ulist']->value['age'];?>
岁<span class="yunIndex_user_line">|</span><?php echo $_smarty_tpl->tpl_vars['ulist']->value['exp_n'];?>
<span class="yunIndex_Recommend_line">|</span><?php echo $_smarty_tpl->tpl_vars['ulist']->value['edu_n'];?>
</div>
<div class="yunIndex_user_p_yx">意向：<?php echo $_smarty_tpl->tpl_vars['ulist']->value['job_post_n'];?>
</div>
 <div class="com_index_rue_list fl"></div>
</li>
   <?php } ?>
</ul>
</div>
</div>
</section>
<section>
<div class="yunIndex_newbox fl">
<div class="yunIndex_newtit fl">
<span class="yunFamousenterprises_tit_s fl"><a href="<?php echo smarty_function_url(array('m'=>'article'),$_smarty_tpl);?>
"rel="nofollow"target="_blank">职场资讯</a><i class="yunFamousenterprises_tit_i yun_z_bg"></i></span>
<a href="<?php echo smarty_function_url(array('m'=>'article'),$_smarty_tpl);?>
" class="yunIndex_tit_more yun_text_color yunIndex_tit_more_mt fr" rel="nofollow"target="_blank">查看更多<i class="yunIndex_tit_more_icon"></i></a></div>
	<div class="yunIndex_con_box fl">
        <?php  $_smarty_tpl->tpl_vars['indexnews'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['indexnews']->_loop = false;
$indexnews = $indexnews; if (!is_array($indexnews) && !is_object($indexnews)) { settype($indexnews, 'array');}
foreach ($indexnews as $_smarty_tpl->tpl_vars['indexnews']->key => $_smarty_tpl->tpl_vars['indexnews']->value) {
$_smarty_tpl->tpl_vars['indexnews']->_loop = true;
?>
          <div class="index_news_content"> <?php if ($_smarty_tpl->tpl_vars['indexnews']->value['pic']) {?>
            <dl class="index_news_top">
              <dt> <a href="<?php echo $_smarty_tpl->tpl_vars['indexnews']->value['pic'][0]['url'];?>
"> <img width="100" height="80" data-original="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['indexnews']->value['pic'][0]['newsphoto'];?>
" class="lazy" src="" alt="<?php echo $_smarty_tpl->tpl_vars['indexnews']->value['pic'][0]['title'];?>
"/> </a> </dt>
              <dd> <strong><a href="<?php echo $_smarty_tpl->tpl_vars['indexnews']->value['pic'][0]['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['indexnews']->value['pic'][0]['title'];?>
</a></strong> <span><?php echo $_smarty_tpl->tpl_vars['indexnews']->value['pic'][0]['description'];?>
...</span> <a href="<?php echo $_smarty_tpl->tpl_vars['indexnews']->value['pic'][0]['url'];?>
" target="_blank">[详细]</a> </dd>
            </dl>
            <?php }?>
            <div class="index_news_right">
              <ul>
                <?php if ($_smarty_tpl->tpl_vars['indexnews']->value['arclist']) {?>
                <?php  $_smarty_tpl->tpl_vars['arcitem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arcitem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['indexnews']->value['arclist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arcitem']->key => $_smarty_tpl->tpl_vars['arcitem']->value) {
$_smarty_tpl->tpl_vars['arcitem']->_loop = true;
?>
                <li>[<?php echo $_smarty_tpl->tpl_vars['arcitem']->value['name'];?>
] <a href="<?php echo $_smarty_tpl->tpl_vars['arcitem']->value['url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['arcitem']->value['title'];?>
</a></li>
                <?php } ?>
				<?php }?>
              </ul>
            </div>
          </div>
          <?php } ?> 
	</div>
</div>
</section>
<section>
	<div class="yunIndex_newbox fl">
		<div class="yunIndex_newtit fl">
        <span class="yunFamousenterprises_tit_s fl">友情链接<i class="yunFamousenterprises_tit_i yun_z_bg"></i></span>
			<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_linksq']==0) {?> <a href="<?php echo smarty_function_url(array('m'=>'link'),$_smarty_tpl);?>
"  class="yunIndex_tit_more yun_text_color yunIndex_tit_more_mt fr" rel="nofollow">申请链接<i class="yunIndex_tit_more_icon"></i></a><?php }?>
		</div>
		<div class="yunIndex_con_box fl"> 
			<div class="index_link_list_img"> <?php  $_smarty_tpl->tpl_vars['linklist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['linklist']->_loop = false;
global $config;
		//跨域名使用范围
		$domain='';
		if($config["cityid"]!="" || $config["hyclass"]!=""){
			include(PLUS_PATH."/domain_cache.php");
			$host_url=$_SERVER['HTTP_HOST'];
			foreach($site_domain as $v){
				if($v['host']==$host_url){
					$domain=$v['id'];
				}
			}
		}$tem_type = 2;
        include PLUS_PATH."/link.cache.php";
		if(is_array($link)){$linkList=array();
			$i=0;
			foreach($link as $key=>$value)
			{
				if($config["did"]!=0 && $value["did"]!=$config["did"])
				{
					continue;
				}elseif(is_numeric('2') && $value['tem_type']!='2' && $value['tem_type']!='1'){
					continue;

				}elseif((!is_numeric('2') || '2'=='1') && $value['tem_type']!='1'){

					continue;
				}elseif(!$config["did"] && $value["did"]>0){
					continue;
				}
				if(is_numeric('2') && $value['link_type']!='2')
				{
					continue;
				}
				if(is_numeric('') && intval('')<=$i)
				{
					break;
				}
				$value[picurl] = $config[sy_weburl]."/".$value[pic];
				$linkList[] = $value;
				$i++;
			}
		}$linkList = $linkList; if (!is_array($linkList) && !is_object($linkList)) { settype($linkList, 'array');}
foreach ($linkList as $_smarty_tpl->tpl_vars['linklist']->key => $_smarty_tpl->tpl_vars['linklist']->value) {
$_smarty_tpl->tpl_vars['linklist']->_loop = true;
?> <a href="<?php echo $_smarty_tpl->tpl_vars['linklist']->value['link_url'];?>
" target="_blank"><img class="lazy" src="" data-original="<?php echo $_smarty_tpl->tpl_vars['linklist']->value['pic'];?>
" width="120" height="35" alt="<?php echo $_smarty_tpl->tpl_vars['linklist']->value['link_name'];?>
" /></a> <?php } ?> </div>
			<div class="index_link_list_name"> <?php  $_smarty_tpl->tpl_vars['linklist2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['linklist2']->_loop = false;
global $config;
		//跨域名使用范围
		$domain='';
		if($config["cityid"]!="" || $config["hyclass"]!=""){
			include(PLUS_PATH."/domain_cache.php");
			$host_url=$_SERVER['HTTP_HOST'];
			foreach($site_domain as $v){
				if($v['host']==$host_url){
					$domain=$v['id'];
				}
			}
		}$tem_type = 2;
        include PLUS_PATH."/link.cache.php";
		if(is_array($link)){$linkList=array();
			$i=0;
			foreach($link as $key=>$value)
			{
				if($config["did"]!=0 && $value["did"]!=$config["did"])
				{
					continue;
				}elseif(is_numeric('2') && $value['tem_type']!='2' && $value['tem_type']!='1'){
					continue;

				}elseif((!is_numeric('2') || '2'=='1') && $value['tem_type']!='1'){

					continue;
				}elseif(!$config["did"] && $value["did"]>0){
					continue;
				}
				if(is_numeric('1') && $value['link_type']!='1')
				{
					continue;
				}
				if(is_numeric('') && intval('')<=$i)
				{
					break;
				}
				$value[picurl] = $config[sy_weburl]."/".$value[pic];
				$linkList[] = $value;
				$i++;
			}
		}$linkList = $linkList; if (!is_array($linkList) && !is_object($linkList)) { settype($linkList, 'array');}
foreach ($linkList as $_smarty_tpl->tpl_vars['linklist2']->key => $_smarty_tpl->tpl_vars['linklist2']->value) {
$_smarty_tpl->tpl_vars['linklist2']->_loop = true;
?> <a href="<?php echo $_smarty_tpl->tpl_vars['linklist2']->value['link_url'];?>
" target="_blank"> <?php echo $_smarty_tpl->tpl_vars['linklist2']->value['link_name'];?>
</a> <?php } ?> </div> 
		</div>
	</div>  
</section>
<div class="clear"></div> 
</div>
<?php echo '<script'; ?>
>
$(document).ready(function(){
	$(".index_new_job li").hover(function(){
		var aid=$(this).attr("aid");
		$("#joblist"+aid).addClass("index_new_job_hover");	
	},function(){
		var aid=$(this).attr("aid");
		$("#joblist"+aid).removeClass("index_new_job_hover");	
	})   
	$(".menu_box").hover(function(){
		var aid=$(this).attr("aid");
		var ftop=Number($(this).offset().top); 
		var sheight=Number($("#jobclass_"+aid).height());  
		if(aid=='0'){ 
			$("#jobclass_"+aid).css("top","0px"); 
		}else if(sheight>ftop){ 
			$("#jobclass_"+aid).css("top","0px"); 
		}else if(ftop>sheight&&Number(sheight)<250){  
			var isIE6=!window.XMLHttpRequest;
			if (isIE6){
				var top=Number(ftop)-Number(99);
			}else if(navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.match(/9./i)=="9."){
				var top=Number(ftop)-Number(94);
			}else{ 
				var top=Number(ftop)-Number(94);
			}  
			$("#jobclass_"+aid).css("top",top+"px"); 
 		}else if(Number(sheight)>250){ 
			var top=Number(ftop)-Number(320);
			$("#jobclass_"+aid).css("top",top+"px"); 
		} 
		$("#jobclass"+aid).addClass("current");	
		$("#jobclass_"+aid).attr("class","menu_sub db");
	},function(){
		var aid=$(this).attr("aid");
		$("#jobclass"+aid).removeClass("current");	
		$("#jobclass_"+aid).attr("class","menu_sub dn");	
	})  
	$(".select_wrap").hover(function(){
		$(".select_wrap_list").show();
	},function(){
		$(".select_wrap_list").hide();
	})  
	$("#slides").slides({
		preload: true,
		preloadImage: '<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/loading.gif',
		play: 5000,
		pause: 2500,
		hoverPause: true
	});
	$.get('<?php echo smarty_function_url(array('m'=>'ajax','c'=>'footertj'),$_smarty_tpl);?>
',function(data){
		$('.tip_bottom_left').html(data)
	});
})
<?php echo '</script'; ?>
> 
<div class="tip_bottom" >
  <div class="tip_bottom_bg">
    <div class="tip_bottom_main" >
    <div class="tip_bottom_icon png"></div>
      <div class="tip_bottom_left fl">
        <a href="javascript:void(0);" onclick="$('.tip_bottom').hide();" class="tip_bottom_close png"></a>
        <span class="tip_bottom_logo fl">
          <h2>发现更多新的职位信息</h2>
        </span>
        <div class="tip_bottom_num fl"><span>0</span>公司</div>
        <div class="tip_bottom_num fl"><span>0</span>职位</div>
        <div class="tip_bottom_num fl"><span>0</span>简历数</div>
        <a href="<?php echo smarty_function_url(array('m'=>'login'),$_smarty_tpl);?>
" class="tip_bottom_login fl">登录</a>
        <a href="<?php echo smarty_function_url(array('m'=>'register','usertype'=>1),$_smarty_tpl);?>
" class="tip_bottom_reg fl" >快速注册<i class="tip_bottom_reg_icon"></i></a>
      </div>
    </div>
  </div>
</div>
      <div id="bg"></div>
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/backtop.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

      <div id='footer_ad'> <?php  $_smarty_tpl->tpl_vars['footer_ad'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['footer_ad']->_loop = false;
$AdArr=array();$paramer=array();
			include(PLUS_PATH.'/pimg_cache.php');$add_arr = $ad_label[10];if(is_array($add_arr) && !empty($add_arr)){
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
foreach ($AdArr as $_smarty_tpl->tpl_vars['footer_ad']->key => $_smarty_tpl->tpl_vars['footer_ad']->value) {
$_smarty_tpl->tpl_vars['footer_ad']->_loop = true;
?>
        <div class="footer_ban" id="">
          <div class="baner_footer" id='bottom_ad_fl'> <span class="ban_close" onclick="colse_bottom()">关闭</span> <?php echo $_smarty_tpl->tpl_vars['footer_ad']->value['html'];?>
 </div>
          <input type="hidden" value='1' id='bottom_ad_is_show' />
        </div>
        <?php } ?>
        <?php  $_smarty_tpl->tpl_vars['left_ad'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['left_ad']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$AdArr=array();$paramer=array();
			include(PLUS_PATH.'/pimg_cache.php');$add_arr = $ad_label[11];if(is_array($add_arr) && !empty($add_arr)){
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
foreach ($AdArr as $_smarty_tpl->tpl_vars['left_ad']->key => $_smarty_tpl->tpl_vars['left_ad']->value) {
$_smarty_tpl->tpl_vars['left_ad']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['left_ad']->key;
?>
        <div class="duilian <?php if ($_smarty_tpl->tpl_vars['key']->value=='0') {?>duilian_left<?php } else { ?>duilian_right<?php }?>">
          <div class="duilian_con"><?php echo $_smarty_tpl->tpl_vars['left_ad']->value['html'];?>
</div>
          <div class="close_container">
            <div class="btn_close"></div>
          </div>
        </div>
        <?php } ?> </div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
