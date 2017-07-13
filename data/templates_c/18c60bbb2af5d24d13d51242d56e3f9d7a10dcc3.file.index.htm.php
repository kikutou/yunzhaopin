<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:27:32
         compiled from "/var/www/html/yunzhaopin/app/template/wap/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:160559221259255204a7a730-06281346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18c60bbb2af5d24d13d51242d56e3f9d7a10dcc3' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/wap/index.htm',
      1 => 1469695930,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160559221259255204a7a730-06281346',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'wap_style' => 0,
    'lunbo' => 0,
    'config_wapdomain' => 0,
    'alist' => 0,
    'username' => 0,
    'adlist_15' => 0,
    'keylist' => 0,
    'job' => 0,
    'config' => 0,
    'comlist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59255204b9b094_56185160',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59255204b9b094_56185160')) {function content_59255204b9b094_56185160($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/modifier.date_format.php';
?><?php $alist=array();$time=time();eval('$paramer=array("limit"=>"4","item"=>"\'alist\'","t_len"=>"15","nocache"=>"")
;');
		global $db,$db_config,$config;
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		$where = 1;
		//分站
		if($config['did']){
			$where.=" and `did`='".$config['did']."'";
		}else if($config['sy_web_site']=="1"){
			$where.=" and `did`='0'";
		}  
		if($paramer[limit]){
			$limit=" LIMIT ".$paramer[limit];
		}else{
			$limit=" LIMIT 20";
		}
		if($paramer[ispage]){
			$limit = PageNav($paramer,$_GET,"admin_announcement",$where,$Purl,"",0,$_smarty_tpl);
		}
		//排序字段 默认按照xuanshang排序
		if($paramer[order]){
			$where.="  ORDER BY `".$paramer[order]."`";
		}else{
			$where.="  ORDER BY `datetime`";
		}
		//排序方式默认倒序
		if($paramer[sort]){
			$where.=" ".$paramer[sort];
		}else{
			$where.=" DESC";
		}

		$alist=$db->select_all("admin_announcement",$where.$limit);
		if(is_array($alist)){
			foreach($alist as $key=>$value){
				//截取标题
				if($paramer[t_len]){
					$alist[$key][title_n] = mb_substr($value['title'],0,$paramer[t_len],"GBK");
				}
				$alist[$key][time]=date("Y-m-d",$value[datetime]);
				$alist[$key][url] = Url("announcement",array("id"=>$value[id]),"1");
			}
		} ?>
<?php global $db,$db_config,$config;
		$time = time();
		
		
		//可以做缓存
        eval('$paramer=array("limit"=>"5","rec"=>"1","item"=>"\'job\'","nocache"=>"")
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

		
		 
		$job = $db->select_all("company_job",$where.$limit);
		if(is_array($job)){
			//处理类别字段
			$cache_array = $db->cacheget();
			$comuid=$jobid=array();
			foreach($job as $key=>$value){
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

			foreach($job as $key=>$value){
				if($paramer[bid]){
					$noids[] = $value[id];
				}
				$job[$key] = $db->array_action($value,$cache_array);
				$job[$key][stime] = date("Y-m-d",$value[sdate]);
				$job[$key][etime] = date("Y-m-d",$value[edate]);
				$job[$key][lastupdate] = date("Y-m-d",$value[lastupdate]);

				$job[$key][yyzz_status] =$r_uid[$value['uid']][yyzz_status];
				$job[$key][logo] =$r_uid[$value['uid']][logo];
				$job[$key][pr_n] =$r_uid[$value['uid']][pr_n];
				$job[$key][hy_n] =$r_uid[$value['uid']][hy_n];
				$job[$key][mun_n] =$r_uid[$value['uid']][mun_n];
				$time=$value['lastupdate'];
				//今天开始时间戳
				$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
				//昨天开始时间戳
				$beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
				//一周内时间戳
				$week=strtotime(date("Y-m-d",strtotime("-1 week")));
				if($time>$week && $time<$beginYesterday){
					$job[$key]['time'] ="一周内";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$job[$key]['time'] ="昨天";
				}elseif($time>$beginToday){	
					$job[$key]['time'] = date("H:i",$value['lastupdate']);
					$job[$key]['redtime'] =1;
				}else{
					$job[$key]['time'] = date("Y-m-d",$value['lastupdate']);
				}
				//获得福利待遇名称
				if(is_array($job[$key]['welfare'])&&$job[$key]['welfare']){
					foreach($job[$key]['welfare'] as $val){
						$job[$key]['welfarename'][]=$cache_array['comclass_name'][$val];
					}

				}
				//截取公司名称
				if($paramer[comlen]){
					$job[$key][com_n] = mb_substr($value['com_name'],0,$paramer[comlen],"GBK");
				}
				//截取职位名称
				if($paramer[namelen]){
					if($value['rec_time']>time()){
						$job[$key][name_n] = "<font color='red'>".mb_substr($value['name'],0,$paramer[namelen],"GBK")."</font>";
					}else{
						$job[$key][name_n] = mb_substr($value['name'],0,$paramer[namelen],"GBK");
					}
				}else{
					if($value['rec_time']>time()){
						$job[$key]['name_n'] = "<font color='red'>".$value['name']."</font>";
					}
				}
				//构建职位伪静态URL
				$job[$key][job_url] = Url("job",array("c"=>"comapply","id"=>$value[id]),"1");
				//构建企业伪静态URL
				$job[$key][com_url] = Url("company",array("c"=>"show","id"=>$value[uid]));
				foreach($comrat as $k=>$v){
					if($value[rating]==$v[id]){
						$job[$key][color] = str_replace("#","",$v[com_color]);
						$job[$key][ratlogo] = $v[com_pic];
						$job[$key][ratname] = $v[name];
					}
				}
				if($paramer[keyword]){
					$job[$key][name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[name]);
					$job[$key][com_name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[com_name]);
					$job[$key][name_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$job[$key][name_n]);
					$job[$key][com_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$job[$key][com_n]);
					$job[$key][job_city_one]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[provinceid]]);
					$job[$key][job_city_two]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[cityid]]);
				}
			}

			if(is_array($job)){
				if($paramer[keyword]!=""&&!empty($job)){
					addkeywords('3',$paramer[keyword]);
				}
			}
		} ?>
<?php global $db,$db_config,$config;eval('$paramer=array("rec"=>"1","item"=>"\'comlist\'","limit"=>"5","nocache"=>"")
;');$comlist=array();
		
		$time = time();
		//处理传入参数，并且构造分页参数
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr['arr'];
		$Purl =  $ParamerArr['purl'];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		//是否属于分站下
		if($config['sy_web_site']=="1"){
			if($config[province]>0 && $config[province]!=""){
				$paramer[provinceid] = $config[province];
			}
			if($config['cityid']>0 && $config['cityid']!=""){
				$paramer['cityid']=$config['cityid'];
			}
			if($config['hyclass']>0 && $config['hyclass']!=""){
				$paramer['hy']=$config['hyclass'];
			}
		} 
		$where="`name`<>'' and `hy`<>''"; 
		/*if(!is_array($this->company_rating)){
			$comrat = $db->select_all($db_config['def']."company_rating");
			$this->company_rating=$comrat;
		}else{
			$comrat = $this->company_rating;
		}*/
		//关键字
		if($paramer['keyword']){
			$where.=" AND `name` LIKE '%".$paramer['keyword']."%'";
		}				
		//公司行业
		if($paramer['hy']){
			$where .= " AND `hy` = '".$paramer['hy']."'";
		}
		//公司体制
		if($paramer['pr']){
			$where .= " AND `pr` = '".$paramer['pr']."'";
		}
		//公司规模
		if($paramer['mun']){
			$where .= " AND `mun` = '".$paramer['mun']."'";
		}
		//公司地点
		if($paramer['provinceid']){
			$where .= " AND `provinceid` = '".$paramer['provinceid']."'";
		}
		//所在地 市区
		if($paramer['cityid']){
			$where .= " AND (`provinceid` = '".$paramer['cityid']."' OR `cityid` = '".$paramer['cityid']."')";
		}
		
		//所在地 市区
		if($paramer['cityin']){
			$where .= " AND (`provinceid` in(".$paramer['cityin'].") OR `cityid` in(".$paramer['cityin'].") or `three_cityid` in(".$paramer['cityin']."))";
		}
		//联系人不为空
		if($paramer['linkman']){
			$where .= " AND `linkman`<>''";
		}
		//联系人电话不为空
		if($paramer['linktel']){
			$where .= " AND `linktel`<>''";
		}
		//联系人邮箱不为空
		if($paramer['linkmail']){
			$where .= " AND `linkmail`<>''";
		}
		//是否有企业LOGO
		if($paramer['logo']){
			$where .= " AND `logo`<>''";
		}
		//是否被锁定
		if($paramer['r_status']){
			$where .= " AND `r_status`='".$paramer['r_status']."'";
		}else{
			$where .= " AND `r_status`<>'2'";
		}
		//是否已经验证
		if($paramer['cert']){
			$where .= " AND `yyzz_status`='1'";
		}
		//更新时间区间
		if($paramer['uptime']){
			$uptime = $time-$paramer['uptime']*3600;
			$where.=" AND `lastupdate`>'".$uptime."'";
		}
		if($paramer['jobtime']){
			$where.=" AND `jobtime`<>''";
		}
		//推荐，猎头页面展示
		
		if($paramer['rec']){
			$Purl["rec"]='1';
			$where.=" AND `rec`='1' AND `hottime`>'".time()."'";
		}
		
       
		//查询条数
		if($paramer['limit']){
			$limit=" limit ".$paramer['limit'];
		}
		
		//自定义查询条件，默认取代上面任何参数直接使用该语句
		if($paramer['where']){
			$where = $paramer['where'];
		}
		//处理类别字段
		$cache_array = $db->cacheget();
		if($paramer['ispage']){ 
			if($paramer['rec']==1&&$Purl["m"]=="lietou"){
				$limit = PageNav($paramer,$_GET,"company",$where,$Purl,"","1",$_smarty_tpl);
			}else{
				$limit = PageNav($paramer,$_GET,"company",$where,$Purl,"","0",$_smarty_tpl);
			}

            $_smarty_tpl->tpl_vars['firmurl']=new Smarty_Variable;
			$_smarty_tpl->tpl_vars['firmurl']->value = $ParamerArr['firmurl'];
		}
		//排序字段默认为更新时间
		if($paramer['order']){
			if($paramer['order']=="lastＵpdate"){
				$paramer['order']="lastupdate";
			}
			$order = " ORDER BY `".$paramer['order']."`  ";
		}else{
			$order = " ORDER BY `jobtime` ";
		}
		//排序规则 默认为倒序
		if($paramer['sort']){
			$sort = $paramer['sort'];
		}else{
			$sort = " DESC";
		}
		$where.=$order.$sort;
		
		$Query = $db->query("SELECT * FROM $db_config[def]company where ".$where.$limit);
		$ListId=array();
		$comlist=array();
		while($rs = $db->fetch_array($Query)){
			$comlist[] = $db->array_action($rs,$cache_array);
			$ListId[] = $rs['uid'];
		}  
		//调用会员等级
		include PLUS_PATH."/comrating.cache.php";
		if(!empty($ListId)){
		$statis = $db->select_all("company_statis","`uid` in (".@implode(",",$ListId).")","`uid`,`rating`");
		foreach($ListId as $key=>$value){
		       foreach($statis as $v){
		               foreach($comrat as $val){
			                if($value==$v['uid'] && $val['id']==$v['rating']){						
							$comlist[$key]['color'] = $val['com_color'];
							$comlist[$key]['ratlogo'] = $val['com_pic'];
							$comlist[$key]['ratname'] = $val['name'];
						    }
					  }
				}
			}
		}
		//对应留言
		if($paramer['ismsg']){
			$Msgid = @implode(",",$ListId);
			$msglist = $db->select_alls("company_msg","resume","a.`cuid` in ($Msgid) and a.`uid`=b.`uid` order by a.`id` desc","a.cuid,a.content,b.name,b.photo,b.def_job");
			if(is_array($ListId) && is_array($msglist)){
				foreach($comlist as $key=>$value){
					foreach($msglist as $k=>$v){
						if($value['uid']==$v['cuid']){
							$comlist[$key]['msg'][$k]['content'] = $v['content'];
							$comlist[$key]['msg'][$k]['name'] = $v['name'];
							$comlist[$key]['msg'][$k]['photo'] = $v['photo'];
							$comlist[$key]['msg'][$k]['eid'] = $v['def_job'];
						}
					}
				}
			}
		}
		//是否需要查询对应职位
		if($paramer['isjob']){
			//查询职位
			$JobId = @implode(",",$ListId);
			$JobList=$db->select_all("company_job","`uid` IN ($JobId) and `edate`>'".mktime()."' and r_status<>'2' and status<>'1' and state=1  order by `lastupdate` desc");
			if(is_array($ListId) && is_array($JobList)){
				foreach($comlist as $key=>$value){
					$comlist[$key]['jobnum'] = 0;
					foreach($JobList as $k=>$v){
						if($value['uid']==$v['uid']){
							$id = $v['id'];
							$comlist[$key]['newsjob'] = $v['name'];
							$comlist[$key]['newsjob_status'] = $v['status'];
							$comlist[$key]['r_status'] = $v['r_status'];

							$v = $db->array_action($value,$cache_array);
							$v['job_url'] = Url("job",array("c"=>"comapply","id"=>$JobList[$k]['id']),"1");
							$v['id']= $id;
							$v['name'] = $comlist[$key]['newsjob'];
							$comlist[$key]['joblist'][] = $v;
							$comlist[$key]['jobnum'] = $comlist[$key]['jobnum']+1;
						}
					}
					/*
					foreach($comrat as $k=>$v){
						if($value['rating']==$v['id']){
							$comlist[$key]['color'] = $v['com_color'];
							$comlist[$key]['ratlogo'] = $v['com_pic'];
						}
					}*/
				}
			}
		}
		//是否需要查询对应资讯
		if($paramer['isnews']){
			//查询资讯
			$JobId = @implode(",",$ListId);
			$NewsList=$db->select_all("company_news","`uid` IN ($JobId) and status=1  order by `id` desc");
			if(is_array($ListId) && is_array($NewsList)){
				foreach($comlist as $key=>$value){
					$comlist[$key]['newsnum'] = 0;
					foreach($NewsList as $k=>$v){
						if($value['uid']==$v['uid']){
							$comlist[$key]['newslist'][] = $v;
							$comlist[$key]['newsnum'] = $comlist[$key]['newsnum']+1;
						}
					}
				}
			}
		}
		//是否需要查询对应环境展示
		if($paramer['isshow']){
			//查询环境展示
			$JobId = @implode(",",$ListId);
			$ShowList=$db->select_all("company_show","`uid` IN ($JobId) order by `id` desc");
			if(is_array($ListId) && is_array($ShowList)){
				foreach($comlist as $key=>$value){
					$comlist[$key]['shownum'] = 0;
					foreach($ShowList as $k=>$v){
						if($value['uid']==$v['uid']){
							$comlist[$key]['showlist'][] = $v;
							$comlist[$key]['shownum'] = $comlist[$key]['shownum']+1;
						}
					}
				}
			}
		} 
		//企业黄页 是否关注  201305_gl
		if($paramer['firm']){
			if($_COOKIE[uid]){$atnlist = $db->select_all("atn","`uid`='$_COOKIE[uid]'");}
			if(is_array($comlist)){
				foreach($comlist as $key=>$value){
					if(!empty($atnlist)){
						foreach($atnlist as $v){
							if($value['uid'] == $v['sc_uid']){
								$comlist[$key]['atn'] = "取消关注";
                                $comlist[$key]['atnstatus'] = "1";
								break;
							}else{
								$comlist[$key]['atn'] = "关注";
							}
						}
					}else{
						$comlist[$key]['atn'] = "关注";
					}
				}
			}
		}
		if(is_array($comlist)){
			foreach($comlist as $key=>$value){
				$comlist[$key]['com_url'] = Url("company",array("c"=>"show","id"=>$value['uid']));
				$comlist[$key]['joball_url'] = Url("company",array("c"=>"show","id"=>$value['uid'],"tp"=>"post")); 
				if($value['logo']!=""){
					$comlist[$key]['logo'] = str_replace("./",$config['sy_weburl']."/",$value['logo']);
				}else{
					$comlist[$key]['logo'] = $config['sy_weburl']."/".$config['sy_unit_icon'];
				} 
				
			}
			if($paramer['keyword']!=""&&!empty($comlist)){
				addkeywords('4',$paramer['keyword']);
			}
		} ?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['wapstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['wap_style']->value;?>
/js/jquery.flexslider-min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
            $(function() {
                $(".flexslider").flexslider({
                    slideshowSpeed: 3000, //展示时间间隔ms
                    animationSpeed: 3000, //滚动时间ms
                    touch: true //是否支持触屏滑动(比如可用在手机触屏焦点图)
                });
            });
        <?php echo '</script'; ?>
>
<style>
.tips{display:none;}
</style>
<div class="clear"></div>
<section>
   <div id="ad" class="flexslider">
		<ul class="slides">
		<?php  $_smarty_tpl->tpl_vars["lunbo"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["lunbo"]->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$AdArr=array();$paramer=array();
			include(PLUS_PATH.'/pimg_cache.php');$add_arr = $ad_label[50];if(is_array($add_arr) && !empty($add_arr)){
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
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['lunbo']->value['src'];?>
" ><img src="<?php echo $_smarty_tpl->tpl_vars['lunbo']->value['pic'];?>
" width='100%'/></a></li>
		<?php } ?>
		</ul>
	</div> 
</section>
<div class="clear"></div>
<section>   <div class="index_search_cont">
   <form method="get" action="<?php echo $_smarty_tpl->tpl_vars['config_wapdomain']->value;?>
/index.php">
      <input type="hidden" name="c" value="job" />
      <div class="index_formFiled">
        <input type="text" value="" name="keyword" class="index_input_search" placeholder="请输入职位关键字，如：会计...">
        <input type="submit" value="搜职位" class="index_input_btn">
        <i class="index_input_btn_icon iconfont_index_search"></i>
      </div>
    </form>
     </div>
  <div class="index_warp_content clear">

    <nav>
      <dl class="nav_list">
        <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'job'),$_smarty_tpl);?>
">
        <dt class="cor_1"><i class="nav_icon iconfont_job "></i></dt>
        <dd>找工作</dd>
        </a>
      </dl>
      <dl class="nav_list">
        <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'resume'),$_smarty_tpl);?>
">
        <dt class="cor_2"><i class="nav_icon iconfontuser "></i></dt>
        <dd>找人才</dd>
        </a>
             </dl>
      <dl class="nav_list">
        <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'company'),$_smarty_tpl);?>
">
        <dt class="cor_3"><i class="nav_icon iconfont_comp "></i></dt>
        <dd>找企业</dd>
        </a>
      </dl>
      <dl class="nav_list">
        <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'part'),$_smarty_tpl);?>
">
        <dt class="cor_4"><i class="nav_icon iconfont_part"></i></dt>
        <dd>找兼职</dd>
        </a>
      </dl>
      <dl class="nav_list">
        <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'map'),$_smarty_tpl);?>
">
        <dt class="cor_5"><i class="nav_icon  iconfont_map"></i></dt>
        <dd>附近职位</dd>
        </a>
      </dl> <dl class="nav_list">
        <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'once'),$_smarty_tpl);?>
">
        <dt class="cor_6"><i class="nav_icon iconfont_once"></i></dt>
        <dd>店铺招聘</dd>
        </a>
      </dl>
      <dl class="nav_list">
        <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'tiny'),$_smarty_tpl);?>
">
        <dt class="cor_7"><i class="nav_icon iconfont_tiny"></i></dt>
        <dd>普工专区</dd>
        </a>
      </dl>
      <dl class="nav_list">
        <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'article'),$_smarty_tpl);?>
">
        <dt class="cor_8"><i class="nav_icon iconfont_news"></i></dt>
        <dd>职场资讯</dd>
        </a>
      </dl>
 <dl class="nav_list">
        <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'zph'),$_smarty_tpl);?>
">
        <dt class="cor_2"><i class="nav_icon iconfont_zph"></i></dt>
        <dd>招聘会</dd>
        </a>
      </dl>
      <dl class="nav_list">
        <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'redeem'),$_smarty_tpl);?>
">
        <dt class="cor_jf"><i class="nav_icon iconfont_jf"></i></dt>
        <dd>积分商城</dd>
        </a>
      </dl>
      <dl class="nav_list">
        <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'ask'),$_smarty_tpl);?>
">
        <dt class="cor_wd"><i class="nav_icon iconfont_ask"></i></dt>
        <dd>互动问答</dd>
        </a>
      </dl>
    </nav>

  </div>
</section>
<section>
<div class="yun_wap_notice sxl"><span class="yun_wap_notice_tit"><i class="yun_wap_notice_tit_s"></i></span>
<ul class="yun_wap_notice_list sxlist">
<?php  $_smarty_tpl->tpl_vars['alist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['alist']->_loop = false;
$alist = $alist; if (!is_array($alist) && !is_object($alist)) { settype($alist, 'array');}
foreach ($alist as $_smarty_tpl->tpl_vars['alist']->key => $_smarty_tpl->tpl_vars['alist']->value) {
$_smarty_tpl->tpl_vars['alist']->_loop = true;
?>
<li><a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'announcements','id'=>$_smarty_tpl->tpl_vars['alist']->value['id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['alist']->value['title_n'];?>
</a></li>
<?php } ?>
</ul></div>
<?php echo '<script'; ?>
 type="text/javascript">
marquee("2000",".sxl .sxlist");
function marquee(time,id){
	$(function(){
		var _wrap=$(id);
		var _interval=time;
		var _moving;
		_wrap.hover(function(){
			clearInterval(_moving);
		},function(){
			_moving=setInterval(function(){
			var _field=_wrap.find('li:first');
			var _h=_field.height();
			_field.animate({marginTop:-_h+'px'},800,function(){
			_field.css('marginTop',0).appendTo(_wrap);
			})
		},_interval)
		}).trigger('mouseleave');
	});
}<?php echo '</script'; ?>
>
</section>
<?php if (!$_smarty_tpl->tpl_vars['username']->value) {?> 
<section>
  <div class="index_warp_content mt10">
    <div class="index_login">
      <div class="index_login_p">您尚未登录，马上登录轻松管理信息</div>
      <div class="index_logoin_sub"><a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'login'),$_smarty_tpl);?>
" class="index_logoin_bth">登录</a><a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'register'),$_smarty_tpl);?>
" class="index_logoin_bth index_reg_bth">注册</a></div>
    </div>
  </div>
</section>
<?php }?>
<div class="clear"></div>
<section>
<div class="yun_companyList">
    <ul class="clearfix">
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
    <li><?php echo $_smarty_tpl->tpl_vars['adlist_15']->value['html'];?>
</li>
    <?php } ?>
    </ul>
</div>
</section>
<div class="clear"></div>
<section>
 <div class="index_warp_content mt10">
    <div class="wap_title"><span class="">热门工作</span><a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'job','rec'=>1),$_smarty_tpl);?>
" class="more">更多>></a></div>
  <ul  class="index_hotlist"> <?php  $_smarty_tpl->tpl_vars['keylist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['keylist']->_loop = false;
global $config;eval('$paramer=array("limit"=>"16","type"=>"3","recom"=>"1","item"=>"\'keylist\'","iswap"=>"1","nocache"=>"")
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
?>
  <li> <a href="<?php echo $_smarty_tpl->tpl_vars['keylist']->value['url'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['keylist']->value['key_name'];?>
</span></a></li><?php } ?> </ul>
  </div>
</section>
<section>
  <div class="index_warp_content mt10">
    <div class="wap_title"><span class="">推荐职位</span><a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'job','rec'=>1),$_smarty_tpl);?>
" class="more">更多>></a></div>
    <?php  $_smarty_tpl->tpl_vars['job'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['job']->_loop = false;
$job = $job; if (!is_array($job) && !is_object($job)) { settype($job, 'array');}
foreach ($job as $_smarty_tpl->tpl_vars['job']->key => $_smarty_tpl->tpl_vars['job']->value) {
$_smarty_tpl->tpl_vars['job']->_loop = true;
?>
    <div class="job_list_box"> <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'job','a'=>'view','id'=>$_smarty_tpl->tpl_vars['job']->value['id']),$_smarty_tpl);?>
" class="job_list">
      <h3>
       <span  class="job_index_box_jobname"><?php echo mb_substr($_smarty_tpl->tpl_vars['job']->value['name'],0,12,'gbk');?>
</span>
       <?php if ($_smarty_tpl->tpl_vars['job']->value['rec']=='1'&&$_smarty_tpl->tpl_vars['job']->value['rec_time']>time()) {?>
       
        <span class="job_index_date"> <?php if ($_smarty_tpl->tpl_vars['job']->value['time']=='今天'||$_smarty_tpl->tpl_vars['job']->value['time']=='昨天'||$_smarty_tpl->tpl_vars['job']->value['redtime']=='1') {?>
          <span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['job']->value['time'];?>
</span>
          <?php } else { ?>
          <?php echo $_smarty_tpl->tpl_vars['job']->value['time'];?>

          <?php }?></span></h3>
        
      <aside class="job_qy_name"><?php echo $_smarty_tpl->tpl_vars['job']->value['job_city_one'];?>
-<?php echo $_smarty_tpl->tpl_vars['job']->value['job_city_two'];?>
<em class="line">|</em><?php echo mb_substr($_smarty_tpl->tpl_vars['job']->value['com_name'],0,12,'gbk');
if ($_smarty_tpl->tpl_vars['job']->value['ratlogo']!='') {?><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['job']->value['ratlogo'];?>
" width="20" height="20" /> <?php }
if ($_smarty_tpl->tpl_vars['job']->value['yyzz_status']=='1') {?><i class="job_qy_rz_icon"></i><?php }?></aside>
      <aside class="job_pay"><strong><?php if ($_smarty_tpl->tpl_vars['job']->value['job_salary']==''||$_smarty_tpl->tpl_vars['job']->value['job_salary']=='面议') {
} else { ?>￥<?php }
echo $_smarty_tpl->tpl_vars['job']->value['job_salary'];?>
</strong> <?php }
if ($_smarty_tpl->tpl_vars['job']->value['urgent_time']>time()) {?><i class="urgent" style="margin-left:10px;">急招</i><?php }?></aside>
      </a> </div>
    <?php } ?> </div>
    
    
</section>
<div class="clear"></div>
<section>
  <div class="index_warp_content mt10">
    <div class="wap_title"><span class="">名企</span><a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'company','rec'=>1),$_smarty_tpl);?>
" class="more">更多>></a></div>
    <?php  $_smarty_tpl->tpl_vars['comlist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comlist']->_loop = false;
$comlist = $comlist; if (!is_array($comlist) && !is_object($comlist)) { settype($comlist, 'array');}
foreach ($comlist as $_smarty_tpl->tpl_vars['comlist']->key => $_smarty_tpl->tpl_vars['comlist']->value) {
$_smarty_tpl->tpl_vars['comlist']->_loop = true;
?>
    <div class="job_list_box"> <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'company','a'=>'show','id'=>$_smarty_tpl->tpl_vars['comlist']->value['uid']),$_smarty_tpl);?>
" class="job_list">
      <h3><?php echo mb_substr($_smarty_tpl->tpl_vars['comlist']->value['name'],0,12,'gbk');?>
<span class="job_index_date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['comlist']->value['lastupdate'],'%Y-%m-%d');?>
</span></h3>
      <aside class="job_qy_name"><?php echo $_smarty_tpl->tpl_vars['comlist']->value['job_city_one'];?>
-<?php echo $_smarty_tpl->tpl_vars['comlist']->value['job_city_two'];?>
<em class="line">|</em><?php echo mb_substr($_smarty_tpl->tpl_vars['comlist']->value['job_hy'],0,12,'gbk');?>
</aside>
      </a></div>
    <?php } ?> </div>
</section> 
<?php echo '<script'; ?>
 type="text/javascript">
    $(function () {
        $(".example__demo img").width($(document.body).width());
    }); 
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['wapstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 <?php }} ?>
