<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 16:27:32
         compiled from "/var/www/html/yunzhaopin/app/template/default/resume/search.htm" */ ?>
<?php /*%%SmartyHeaderCode:773473362592543f43f23b0-44940151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e78716798465f44bf2b3eb69d215bc02ec417e6b' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/default/resume/search.htm',
      1 => 1471950380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '773473362592543f43f23b0-44940151',
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
    'uid' => 0,
    'usertype' => 0,
    'paras' => 0,
    'job_index' => 0,
    'v' => 0,
    'key' => 0,
    'job_name' => 0,
    'job_type' => 0,
    'city_index' => 0,
    'city_name' => 0,
    'city_type' => 0,
    'userdata' => 0,
    'userclass_name' => 0,
    'industry_name' => 0,
    'industry_index' => 0,
    'uptime' => 0,
    'adtime' => 0,
    'resumekeyword' => 0,
    'keylist' => 0,
    'total' => 0,
    'pagenum' => 0,
    'user2' => 0,
    'lookresume' => 0,
    'talentpool' => 0,
    'useridmsg' => 0,
    'job_list' => 0,
    'user' => 0,
    'pagenav' => 0,
    'klist' => 0,
    'userrec' => 0,
    'com' => 0,
    'zpthreecityid' => 0,
    'zpcityid' => 0,
    'zpjobpost' => 0,
    'zpjob1son' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592543f49ac142_19363424',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592543f49ac142_19363424')) {function content_592543f49ac142_19363424($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_function_listurl')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.listurl.php';
?><?php $user2=array();global $db,$db_config,$config;eval('$paramer=array("limit"=>"5","topdate"=>"1","salary"=>"\'auto.salary\'","idcard"=>"\'auto.idcard\'","edu"=>"\'auto.edu\'","order"=>"\'auto.order\'","work"=>"\'auto.work\'","exp"=>"\'auto.exp\'","sex"=>"\'auto.sex\'","keyword"=>"\'auto.keyword\'","hy"=>"\'auto.hy\'","provinceid"=>"\'auto.provinceid\'","report"=>"\'auto.report\'","cityid"=>"\'auto.cityid\'","three_cityid"=>"\'auto.three_cityid\'","adtime"=>"\'auto.adtime\'","jobids"=>"\'auto.jobids\'","pic"=>"\'auto.pic\'","typeids"=>"\'auto.typeids\'","type"=>"\'auto.type\'","job1"=>"\'auto.job1\'","job1_son"=>"\'auto.job1_son\'","job_post"=>"\'auto.job_post\'","uptime"=>"\'auto.uptime\'","post_len"=>"14","item"=>"\'user2\'","name"=>"\'userlist2\'","nocache"=>"")
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
		$user2=$db->select_all("resume_expect",$where.$limit,"*,uname as username");

		if(is_array($user2)){
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
				foreach($user2 as $k=>$v){
					$uids[]=$v[uid];
				}

				$member=$db->select_all($db_config[def]."member","`uid` in(".@implode(',',$uids).")","uid,username");
				foreach($member as $val){
					$m_name[$val[uid]]=$val['username'];
				}
			}
			foreach($user2 as $key=>$value){
				$uid[] = $value['uid'];
				$eid[] = $value['id'];
			}
			$eids = @implode(',',$eid);
			$uids = @implode(',',$uid);

			foreach($user2 as $k=>$v){
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
					$user2[$k]['time'] = "一周内";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$user2[$k]['time'] = "昨天";
				}elseif($time>$beginToday){
					$user2[$k]['time'] = date("H:i",$v['lastupdate']);
					$user2[$k]['redtime'] =1;
				}else{
					$user2[$k]['time'] = date("Y-m-d",$v['lastupdate']);
				} 
				if($v['photo']==''){
					$user2[$k]['photo']=$v['photo']=$config['sy_member_icon'];
				}else{
					$user2[$k]['ispic']=1;
				}
				//同时满足两个条件才需对对头像进行处理
				if($config['sy_usertype_1']=='1'&&$v['photo']){
					if(!empty($my_down)){
						foreach($my_down as $m_k=>$m_v){
							$my_down_uid[]=$m_v['uid'];
						}
						if(in_array($v['uid'],$my_down_uid)==false){
							$user2[$k]['photo']='./'.$config['sy_member_icon'];
						}
					}else{
						$user2[$k]['photo']='./'.$config['sy_member_icon'];
					}
				}
				if($config["user_name"]==3)
				{
					$user2[$k]["username_n"] = "NO.".$v["id"];
				}elseif($config["user_name"]==2){
					if($userclass_name[$v['sex']]=='男'){
						$user2[$k]["username_n"] = mb_substr($v["username"],0,1,'GBK')."先生";
					}else{
						$user2[$k]["username_n"] = mb_substr($v["username"],0,1,'GBK')."女士";
					}
				}else{
					$user2[$k]["username_n"] = $v["username"];
				}
				if($v[birthday])
				{
					$a=date('Y',strtotime($user2[$k]['birthday']));
					$user2[$k]['age']=date("Y")-$a;
				}else{
					$user2[$k]['age']="保密";
				}

				$user2[$k]['sex_n']=$userclass_name[$v['sex']];
				$user2[$k]['edu_n']=$userclass_name[$v['edu']];
				$user2[$k]['exp_n']=$userclass_name[$v['exp']];
				$user2[$k]['job_city_one']=$city_name[$v['provinceid']];
				$user2[$k]['job_city_two']=$city_name[$v['cityid']];
				$user2[$k]['job_city_three']=$city_name[$v['three_cityid']];
				$user2[$k]['salary_n']=$userclass_name[$v['salary']];
				$user2[$k]['report_n']=$userclass_name[$v['report']];
				$user2[$k]['type_n']=$userclass_name[$v['type']];
				$user2[$k]['lastupdate']=date("Y-m-d",$v['lastupdate']);

				$user2[$k]['user_url']=Url("resume",array("c"=>"show","id"=>$v['id']),"1");
				$user2[$k]["hy_info"]=$industry_name[$v['hy']];
				if($paramer['top']){
					$user2[$k]['m_name']=$m_name[$v['uid']];
					$user2[$k]['user_url']=Url("ask",array("c"=>"friend","uid"=>$v['uid']));
				}
				$job_classid=@explode(",",$v['job_classid']);
				if(is_array($job_classid))
				{
					foreach($job_classid as $val)
					{
						$jobname[]=$job_name[$val];
					}
				}
				$user2[$k]['job_post']=@implode(",",$jobname);
				//截取标题
				if($paramer['post_len'])
				{
					$postname[$k]=@implode(",",$jobname);
					$user2[$k]['job_post_n']=mb_substr($postname[$k],0,$paramer[post_len],"GBK");
				}
				if($paramer['keyword'])
				{
					$user2[$k]['username']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$v['username']);
					$user2[$k]['job_post']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$user2[$k]['job_post']);
					$user2[$k]['job_post_n']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$user2[$k]['job_post_n']);
					$user2[$k]['job_city_one']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$city_name[$v['provinceid']]);
					$user2[$k]['job_city_two']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$city_name[$v['cityid']]);
				}
				$jobname=array();
			}
			if($paramer['keyword']!=""&&!empty($user2)){
				addkeywords('5',$paramer['keyword']);
			}
		} ?>
<?php $user=array();global $db,$db_config,$config;eval('$paramer=array("limit"=>"20","salary"=>"\'auto.salary\'","noid"=>"1","idcard"=>"\'auto.idcard\'","edu"=>"\'auto.edu\'","order"=>"\'auto.order\'","work"=>"\'auto.work\'","exp"=>"\'auto.exp\'","sex"=>"\'auto.sex\'","keyword"=>"\'auto.keyword\'","hy"=>"\'auto.hy\'","provinceid"=>"\'auto.provinceid\'","report"=>"\'auto.report\'","cityid"=>"\'auto.cityid\'","three_cityid"=>"\'auto.three_cityid\'","adtime"=>"\'auto.adtime\'","jobids"=>"\'auto.jobids\'","pic"=>"\'auto.pic\'","typeids"=>"\'auto.typeids\'","type"=>"\'auto.type\'","job1"=>"\'auto.job1\'","job1_son"=>"\'auto.job1_son\'","job_post"=>"\'auto.job_post\'","uptime"=>"\'auto.uptime\'","post_len"=>"14","ispage"=>"1","item"=>"\'user\'","key"=>"\'key\'","name"=>"\'userlist1\'","nocache"=>"")
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
		$user=$db->select_all("resume_expect",$where.$limit,"*,uname as username");

		if(is_array($user)){
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
				foreach($user as $k=>$v){
					$uids[]=$v[uid];
				}

				$member=$db->select_all($db_config[def]."member","`uid` in(".@implode(',',$uids).")","uid,username");
				foreach($member as $val){
					$m_name[$val[uid]]=$val['username'];
				}
			}
			foreach($user as $key=>$value){
				$uid[] = $value['uid'];
				$eid[] = $value['id'];
			}
			$eids = @implode(',',$eid);
			$uids = @implode(',',$uid);

			foreach($user as $k=>$v){
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
					$user[$k]['time'] = "一周内";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$user[$k]['time'] = "昨天";
				}elseif($time>$beginToday){
					$user[$k]['time'] = date("H:i",$v['lastupdate']);
					$user[$k]['redtime'] =1;
				}else{
					$user[$k]['time'] = date("Y-m-d",$v['lastupdate']);
				} 
				if($v['photo']==''){
					$user[$k]['photo']=$v['photo']=$config['sy_member_icon'];
				}else{
					$user[$k]['ispic']=1;
				}
				//同时满足两个条件才需对对头像进行处理
				if($config['sy_usertype_1']=='1'&&$v['photo']){
					if(!empty($my_down)){
						foreach($my_down as $m_k=>$m_v){
							$my_down_uid[]=$m_v['uid'];
						}
						if(in_array($v['uid'],$my_down_uid)==false){
							$user[$k]['photo']='./'.$config['sy_member_icon'];
						}
					}else{
						$user[$k]['photo']='./'.$config['sy_member_icon'];
					}
				}
				if($config["user_name"]==3)
				{
					$user[$k]["username_n"] = "NO.".$v["id"];
				}elseif($config["user_name"]==2){
					if($userclass_name[$v['sex']]=='男'){
						$user[$k]["username_n"] = mb_substr($v["username"],0,1,'GBK')."先生";
					}else{
						$user[$k]["username_n"] = mb_substr($v["username"],0,1,'GBK')."女士";
					}
				}else{
					$user[$k]["username_n"] = $v["username"];
				}
				if($v[birthday])
				{
					$a=date('Y',strtotime($user[$k]['birthday']));
					$user[$k]['age']=date("Y")-$a;
				}else{
					$user[$k]['age']="保密";
				}

				$user[$k]['sex_n']=$userclass_name[$v['sex']];
				$user[$k]['edu_n']=$userclass_name[$v['edu']];
				$user[$k]['exp_n']=$userclass_name[$v['exp']];
				$user[$k]['job_city_one']=$city_name[$v['provinceid']];
				$user[$k]['job_city_two']=$city_name[$v['cityid']];
				$user[$k]['job_city_three']=$city_name[$v['three_cityid']];
				$user[$k]['salary_n']=$userclass_name[$v['salary']];
				$user[$k]['report_n']=$userclass_name[$v['report']];
				$user[$k]['type_n']=$userclass_name[$v['type']];
				$user[$k]['lastupdate']=date("Y-m-d",$v['lastupdate']);

				$user[$k]['user_url']=Url("resume",array("c"=>"show","id"=>$v['id']),"1");
				$user[$k]["hy_info"]=$industry_name[$v['hy']];
				if($paramer['top']){
					$user[$k]['m_name']=$m_name[$v['uid']];
					$user[$k]['user_url']=Url("ask",array("c"=>"friend","uid"=>$v['uid']));
				}
				$job_classid=@explode(",",$v['job_classid']);
				if(is_array($job_classid))
				{
					foreach($job_classid as $val)
					{
						$jobname[]=$job_name[$val];
					}
				}
				$user[$k]['job_post']=@implode(",",$jobname);
				//截取标题
				if($paramer['post_len'])
				{
					$postname[$k]=@implode(",",$jobname);
					$user[$k]['job_post_n']=mb_substr($postname[$k],0,$paramer[post_len],"GBK");
				}
				if($paramer['keyword'])
				{
					$user[$k]['username']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$v['username']);
					$user[$k]['job_post']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$user[$k]['job_post']);
					$user[$k]['job_post_n']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$user[$k]['job_post_n']);
					$user[$k]['job_city_one']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$city_name[$v['provinceid']]);
					$user[$k]['job_city_two']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$city_name[$v['cityid']]);
				}
				$jobname=array();
			}
			if($paramer['keyword']!=""&&!empty($user)){
				addkeywords('5',$paramer['keyword']);
			}
		} ?>
<?php $userrec=array();global $db,$db_config,$config;eval('$paramer=array("limit"=>"6","post_len"=>"18","rec_resume"=>"1","item"=>"\'userrec\'","nocache"=>"")
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
		$userrec=$db->select_all("resume_expect",$where.$limit,"*,uname as username");

		if(is_array($userrec)){
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
				foreach($userrec as $k=>$v){
					$uids[]=$v[uid];
				}

				$member=$db->select_all($db_config[def]."member","`uid` in(".@implode(',',$uids).")","uid,username");
				foreach($member as $val){
					$m_name[$val[uid]]=$val['username'];
				}
			}
			foreach($userrec as $key=>$value){
				$uid[] = $value['uid'];
				$eid[] = $value['id'];
			}
			$eids = @implode(',',$eid);
			$uids = @implode(',',$uid);

			foreach($userrec as $k=>$v){
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
					$userrec[$k]['time'] = "一周内";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$userrec[$k]['time'] = "昨天";
				}elseif($time>$beginToday){
					$userrec[$k]['time'] = date("H:i",$v['lastupdate']);
					$userrec[$k]['redtime'] =1;
				}else{
					$userrec[$k]['time'] = date("Y-m-d",$v['lastupdate']);
				} 
				if($v['photo']==''){
					$userrec[$k]['photo']=$v['photo']=$config['sy_member_icon'];
				}else{
					$userrec[$k]['ispic']=1;
				}
				//同时满足两个条件才需对对头像进行处理
				if($config['sy_usertype_1']=='1'&&$v['photo']){
					if(!empty($my_down)){
						foreach($my_down as $m_k=>$m_v){
							$my_down_uid[]=$m_v['uid'];
						}
						if(in_array($v['uid'],$my_down_uid)==false){
							$userrec[$k]['photo']='./'.$config['sy_member_icon'];
						}
					}else{
						$userrec[$k]['photo']='./'.$config['sy_member_icon'];
					}
				}
				if($config["user_name"]==3)
				{
					$userrec[$k]["username_n"] = "NO.".$v["id"];
				}elseif($config["user_name"]==2){
					if($userclass_name[$v['sex']]=='男'){
						$userrec[$k]["username_n"] = mb_substr($v["username"],0,1,'GBK')."先生";
					}else{
						$userrec[$k]["username_n"] = mb_substr($v["username"],0,1,'GBK')."女士";
					}
				}else{
					$userrec[$k]["username_n"] = $v["username"];
				}
				if($v[birthday])
				{
					$a=date('Y',strtotime($userrec[$k]['birthday']));
					$userrec[$k]['age']=date("Y")-$a;
				}else{
					$userrec[$k]['age']="保密";
				}

				$userrec[$k]['sex_n']=$userclass_name[$v['sex']];
				$userrec[$k]['edu_n']=$userclass_name[$v['edu']];
				$userrec[$k]['exp_n']=$userclass_name[$v['exp']];
				$userrec[$k]['job_city_one']=$city_name[$v['provinceid']];
				$userrec[$k]['job_city_two']=$city_name[$v['cityid']];
				$userrec[$k]['job_city_three']=$city_name[$v['three_cityid']];
				$userrec[$k]['salary_n']=$userclass_name[$v['salary']];
				$userrec[$k]['report_n']=$userclass_name[$v['report']];
				$userrec[$k]['type_n']=$userclass_name[$v['type']];
				$userrec[$k]['lastupdate']=date("Y-m-d",$v['lastupdate']);

				$userrec[$k]['user_url']=Url("resume",array("c"=>"show","id"=>$v['id']),"1");
				$userrec[$k]["hy_info"]=$industry_name[$v['hy']];
				if($paramer['top']){
					$userrec[$k]['m_name']=$m_name[$v['uid']];
					$userrec[$k]['user_url']=Url("ask",array("c"=>"friend","uid"=>$v['uid']));
				}
				$job_classid=@explode(",",$v['job_classid']);
				if(is_array($job_classid))
				{
					foreach($job_classid as $val)
					{
						$jobname[]=$job_name[$val];
					}
				}
				$userrec[$k]['job_post']=@implode(",",$jobname);
				//截取标题
				if($paramer['post_len'])
				{
					$postname[$k]=@implode(",",$jobname);
					$userrec[$k]['job_post_n']=mb_substr($postname[$k],0,$paramer[post_len],"GBK");
				}
				if($paramer['keyword'])
				{
					$userrec[$k]['username']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$v['username']);
					$userrec[$k]['job_post']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$userrec[$k]['job_post']);
					$userrec[$k]['job_post_n']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$userrec[$k]['job_post_n']);
					$userrec[$k]['job_city_one']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$city_name[$v['provinceid']]);
					$userrec[$k]['job_city_two']=str_replace($paramer['keyword'],"<font color=#FF6600 >".$paramer['keyword']."</font>",$city_name[$v['cityid']]);
				}
				$jobname=array();
			}
			if($paramer['keyword']!=""&&!empty($userrec)){
				addkeywords('5',$paramer['keyword']);
			}
		} ?>
<?php global $db,$db_config,$config;eval('$paramer=array("limit"=>"6","rec"=>"1","item"=>"\'com\'","nocache"=>"")
;');$com=array();
		
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
		$com=array();
		while($rs = $db->fetch_array($Query)){
			$com[] = $db->array_action($rs,$cache_array);
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
							$com[$key]['color'] = $val['com_color'];
							$com[$key]['ratlogo'] = $val['com_pic'];
							$com[$key]['ratname'] = $val['name'];
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
				foreach($com as $key=>$value){
					foreach($msglist as $k=>$v){
						if($value['uid']==$v['cuid']){
							$com[$key]['msg'][$k]['content'] = $v['content'];
							$com[$key]['msg'][$k]['name'] = $v['name'];
							$com[$key]['msg'][$k]['photo'] = $v['photo'];
							$com[$key]['msg'][$k]['eid'] = $v['def_job'];
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
				foreach($com as $key=>$value){
					$com[$key]['jobnum'] = 0;
					foreach($JobList as $k=>$v){
						if($value['uid']==$v['uid']){
							$id = $v['id'];
							$com[$key]['newsjob'] = $v['name'];
							$com[$key]['newsjob_status'] = $v['status'];
							$com[$key]['r_status'] = $v['r_status'];

							$v = $db->array_action($value,$cache_array);
							$v['job_url'] = Url("job",array("c"=>"comapply","id"=>$JobList[$k]['id']),"1");
							$v['id']= $id;
							$v['name'] = $com[$key]['newsjob'];
							$com[$key]['joblist'][] = $v;
							$com[$key]['jobnum'] = $com[$key]['jobnum']+1;
						}
					}
					/*
					foreach($comrat as $k=>$v){
						if($value['rating']==$v['id']){
							$com[$key]['color'] = $v['com_color'];
							$com[$key]['ratlogo'] = $v['com_pic'];
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
				foreach($com as $key=>$value){
					$com[$key]['newsnum'] = 0;
					foreach($NewsList as $k=>$v){
						if($value['uid']==$v['uid']){
							$com[$key]['newslist'][] = $v;
							$com[$key]['newsnum'] = $com[$key]['newsnum']+1;
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
				foreach($com as $key=>$value){
					$com[$key]['shownum'] = 0;
					foreach($ShowList as $k=>$v){
						if($value['uid']==$v['uid']){
							$com[$key]['showlist'][] = $v;
							$com[$key]['shownum'] = $com[$key]['shownum']+1;
						}
					}
				}
			}
		} 
		//企业黄页 是否关注  201305_gl
		if($paramer['firm']){
			if($_COOKIE[uid]){$atnlist = $db->select_all("atn","`uid`='$_COOKIE[uid]'");}
			if(is_array($com)){
				foreach($com as $key=>$value){
					if(!empty($atnlist)){
						foreach($atnlist as $v){
							if($value['uid'] == $v['sc_uid']){
								$com[$key]['atn'] = "取消关注";
                                $com[$key]['atnstatus'] = "1";
								break;
							}else{
								$com[$key]['atn'] = "关注";
							}
						}
					}else{
						$com[$key]['atn'] = "关注";
					}
				}
			}
		}
		if(is_array($com)){
			foreach($com as $key=>$value){
				$com[$key]['com_url'] = Url("company",array("c"=>"show","id"=>$value['uid']));
				$com[$key]['joball_url'] = Url("company",array("c"=>"show","id"=>$value['uid'],"tp"=>"post")); 
				if($value['logo']!=""){
					$com[$key]['logo'] = str_replace("./",$config['sy_weburl']."/",$value['logo']);
				}else{
					$com[$key]['logo'] = $config['sy_weburl']."/".$config['sy_unit_icon'];
				} 
				
			}
			if($paramer['keyword']!=""&&!empty($com)){
				addkeywords('4',$paramer['keyword']);
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
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/job.css" type="text/css"/>
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
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/search.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/index.js" type="text/javascript"><?php echo '</script'; ?>
>
</head>
<body class="body_bg">
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/index_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="yun_body">
  <div class="yun_content">
    <div class="current_Location  com_current_Location png">
      <div class="fl" >您当前的位置：<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
</a> > <span>人才列表</span> </div>
    </div>
    <div class="clear"></div>
    <div class="Search_jobs_box">
      <form method="get" action="<?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_resumedir']) {?>index.php<?php } else {
echo smarty_function_url(array('m'=>'resume'),$_smarty_tpl);
}?>" onsubmit="return search_keyword(this,'请输入关键字');">
        <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_resumedir']) {?>
        <input type="hidden" name="m" value="resume" />
        <?php }?>
        <div class="Search_jobs_form_list" >
        <div class="yun_job_search">
          <div class="Search_jobs_sub">
            <input type="text" name="keyword" value="<?php if ($_GET['keyword']!='') {
echo $_GET['keyword'];
} else { ?>请输入关键字<?php }?>" onclick="if(this.value=='请输入关键字'){this.value=''}" onblur="if(this.value==''){this.value='请输入关键字'}" class="Search_jobs_text"/>
            <input type="submit" value="搜索" class="Search_jobs_submit yun_bg_color"/>
          <div class="Search_jobs_sub_text_bc">   
			<?php if ($_smarty_tpl->tpl_vars['uid']->value&&$_smarty_tpl->tpl_vars['usertype']->value=='2') {?>
		  <a href="javascript:void(0)"  class="Search_jobs_scq"  onclick="addfinder('<?php echo $_smarty_tpl->tpl_vars['paras']->value;?>
','2','0')">+ 保存为简历搜索器</a>
		  <?php } elseif ($_smarty_tpl->tpl_vars['uid']->value&&$_smarty_tpl->tpl_vars['usertype']->value!='2') {?>
		  <a href="javascript:void(0)"  class="Search_jobs_scq"  onclick="layer.msg('只有企业会员才可保存！', 2,8);return false;">+ 保存为简历搜索器</a>
		  <?php } else { ?>
		  <input value="<?php echo $_smarty_tpl->tpl_vars['paras']->value;?>
" type="hidden" id="finderparas"/>
		  <input value="2" type="hidden" id="finderusertype"/>
		  <a href="javascript:void(0)"  class="Search_jobs_scq"  onclick="showlogin('2');">+ 保存为简历搜索器</a>
		  <?php }?>
		  </div>
          </div>
        </div>
        </div>
       
        <?php if (!$_GET['job1']) {?>
        <div class="Search_jobs_form_list">
          <div class="Search_jobs_name"> 职位：</div>
          <div class="Search_jobs_sub "> <!--点击 更多 增加Search_jobs_sub_nore--> 
            <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'job1','v'=>0),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job1']=='') {?>Search_jobs_sub_cur<?php }?>">全部</a> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'job1','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job1']==$_smarty_tpl->tpl_vars['v']->value) {?>Search_jobs_sub_cur<?php }?> <?php if ($_smarty_tpl->tpl_vars['key']->value>6) {?>job1list<?php }?> <?php if ($_smarty_tpl->tpl_vars['key']->value>6) {?>none<?php }?>"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> <?php } ?></div>
          <div class="zh_more"> <a href="javascript:checkmore('job1list');" id="job1list" rel="nofollow">更多</a> </div>
        </div>
        <?php }?>
         <?php if ($_GET['job1']&&!$_GET['job1_son']) {?>
        <div class="Search_jobs_form_list">
          <div class="Search_jobs_name"> 子类：</div>
          <div class="Search_jobs_sub ">
            <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'job1_son'),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job1_son']=='') {?>Search_jobs_sub_cur<?php }?>">全部</a> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_GET['job1']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'job1_son','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job1_son']==$_smarty_tpl->tpl_vars['v']->value) {?>Search_jobs_sub_cur<?php }?>"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> <?php } ?></div>
        </div>
        <?php }?>
        
        
        <?php if ($_GET['job1_son']) {?>
        <div class="Search_jobs_form_list">
          <div class="Search_jobs_name"> 类别：</div>
          <div class="Search_jobs_sub ">
            <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'job1_son','v'=>$_GET['job1_son']),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job_post']=='') {?>Search_jobs_sub_cur<?php }?>">全部</a> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_GET['job1_son']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'job_post','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['job_post']==$_smarty_tpl->tpl_vars['v']->value) {?>Search_jobs_sub_cur<?php }?>"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> <?php } ?></div>
        </div>
        <?php }?>
        
        
		<?php if ($_smarty_tpl->tpl_vars['config']->value['cityid']==''&&$_smarty_tpl->tpl_vars['config']->value['three_cityid']=='') {?> 
		<?php if (!$_GET['provinceid']) {?>
        <div class="Search_jobs_form_list">
          <div class="Search_jobs_name"> 区域：</div>
          <div class="Search_jobs_sub"> 
            <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'provinceid','v'=>0),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['provinceid']=='') {?>Search_jobs_sub_cur<?php }?>">全部</a> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'provinceid','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_smarty_tpl->tpl_vars['key']->value>18) {?>none<?php }?> <?php if ($_GET['provinceid']==$_smarty_tpl->tpl_vars['v']->value) {?>Search_jobs_sub_cur<?php }?> <?php if ($_smarty_tpl->tpl_vars['key']->value>18) {?>provinceidlist<?php }?>" ><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> <?php } ?></div>
          <div class="zh_more"> <a href="javascript:checkmore('provinceidlist');" id="provinceidlist" rel="nofollow">更多</a> </div>
        </div>
        <?php }?>
		 <?php }?>
         
         
        <?php if (is_array($_smarty_tpl->tpl_vars['city_type']->value[$_GET['provinceid']])) {?>
        <?php if (!$_GET['cityid']) {?>
        <div class="Search_jobs_form_list">
          <div class="Search_jobs_name"> 城市：</div>
          <div class="Search_jobs_sub">
            <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'cityid','v'=>0),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['cityid']=='') {?>Search_jobs_sub_cur<?php }?>">全部</a> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_GET['provinceid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'cityid','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['cityid']==$_smarty_tpl->tpl_vars['v']->value) {?>Search_jobs_sub_cur<?php }?>"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> <?php } ?></div>
        </div>
        <?php }?>
        <?php }?>
        
        <?php if (is_array($_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']])) {?>
        <div class="Search_jobs_form_list">
          <div class="Search_jobs_name"> 县区：</div>
          <div class="Search_jobs_sub">
            <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'cityid','v'=>$_GET['cityid']),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['three_cityid']=='') {?>Search_jobs_sub_cur<?php }?>">全部</a> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_GET['cityid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'three_cityid','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['three_cityid']==$_smarty_tpl->tpl_vars['v']->value) {?>Search_jobs_sub_cur<?php }?>"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> <?php } ?></div>
        </div>
        <?php }?>
        
        <div class="Search_jobs_form_list search_more">
          <div class="Search_jobs_name"> 经验：</div>
          <div class="Search_jobs_sub"> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'exp','v'=>0),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['exp']=='') {?>Search_jobs_sub_cur<?php }?>">全部</a> <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_word']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'exp','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
" class="Search_jobs_sub_a <?php if ($_GET['exp']==$_smarty_tpl->tpl_vars['v']->value) {?>Search_jobs_sub_cur<?php }?>"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> <?php } ?></div>
        </div>
        <div class="Search_jobs_form_list search_more">
        <div class="Search_jobs_name"> 更多：</div>
        <div class="Search_jobs_sub" style="width:1090px;">
          <div class="Search_jobs_more_chlose"> <span class="Search_jobs_more_chlose_s"><?php if ($_GET['hy']) {
echo $_smarty_tpl->tpl_vars['industry_name']->value[$_GET['hy']];
} else { ?>工作行业<?php }?></span><i class=""></i>
            <div class="Search_jobs_more_chlose_hylist none">
              <ul>
                <?php if ($_smarty_tpl->tpl_vars['config']->value['fz_type']!='2'&&$_smarty_tpl->tpl_vars['config']->value['hyclass']=='') {?>
                <div class="Search_jobs_form_list">
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <li><a href="javascript:;" onclick="showurl('<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'hy','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
                <?php } ?> 
                
                <?php }?>
              </ul>
            </div>
          </div>
          <div class="Search_jobs_more_chlose"><span class="Search_jobs_more_chlose_s"><?php if ($_GET['edu']) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['edu']];
} else { ?>学历要求<?php }?></span><i class=""></i>
            <div class="Search_jobs_more_chlose_list none">
              <ul>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <li><a href="javascript:;" onclick="showurl('<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'edu','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="Search_jobs_more_chlose"><span class="Search_jobs_more_chlose_s"><?php if ($_GET['sex']) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['sex']];
} else { ?>性别要求<?php }?></span><i class=""></i>
            <div class="Search_jobs_more_chlose_list none">
              <ul>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_sex']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <li> <a href="javascript:;" onclick="showurl('<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'sex','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="Search_jobs_more_chlose"><span class="Search_jobs_more_chlose_s"><?php if ($_GET['report']) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['report']];
} else { ?>到岗时间<?php }?></span><i class=""></i>
            <div class="Search_jobs_more_chlose_list none">
              <ul>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_report']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <li><a href="javascript:;" onclick="showurl('<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'report','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="Search_jobs_more_chlose"><span class="Search_jobs_more_chlose_s"><?php if ($_GET['salary']) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['salary']];
} else { ?>薪资要求<?php }?></span><i class=""></i>
            <div class="Search_jobs_more_chlose_list none">
              <ul>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_salary']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <li><a href="javascript:;" onclick="showurl('<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'salary','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a> </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="Search_jobs_more_chlose"><span class="Search_jobs_more_chlose_s"><?php if ($_smarty_tpl->tpl_vars['uptime']->value[$_GET['uptime']]) {
echo $_smarty_tpl->tpl_vars['uptime']->value[$_GET['uptime']];
} else { ?>更新时间<?php }?></span><i class=""></i>
            <div class="Search_jobs_more_chlose_list none">
              <ul>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['uptime']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <li><a href="javascript:;" onclick="showurl('<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'uptime','v'=>$_smarty_tpl->tpl_vars['key']->value),$_smarty_tpl);?>
')"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a> </li>
                <?php } ?>
              </ul>
            </div>
          </div>
       
        </div>
      </form>
    </div>
    <?php if ($_GET['job1']||$_GET['job1_son']||$_GET['job_post']||$_GET['provinceid']||$_GET['cityid']||$_GET['three_cityid']||$_GET['hy']||$_GET['salary']||$_GET['edu']||$_GET['exp']||$_GET['sex']||$_GET['type']||$_GET['report']||$_GET['uptime']||$_GET['keyword']||$_GET['idcard']||$_GET['work']) {?>
    <div class="Search_close_box">
    <div>
         <div class="Search_clear"> <a href="<?php echo smarty_function_url(array('m'=>'resume'),$_smarty_tpl);?>
"> 清除所选</a></div>
                  <span class="Search_close_box_s">已选条件：</span>
                  </div>
		<?php if ($_GET['job1']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'job1'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">职位分类：<?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_GET['job1']];?>
</a> <?php }?>
		<?php if ($_GET['job1_son']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'job1_son'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_GET['job1_son']];?>
</a> <?php }?>
		<?php if ($_GET['job_post']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'job_post'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_GET['job_post']];?>
</a> <?php }?>
		
		<?php if ($_smarty_tpl->tpl_vars['config']->value['cityid']==''&&$_smarty_tpl->tpl_vars['config']->value['three_cityid']=='') {?> 
			<?php if ($_GET['provinceid']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'provinceid'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">工作地点：<?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['provinceid']];?>
</a> <?php }?>
			<?php if ($_GET['cityid']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'cityid'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['cityid']];?>
</a> <?php }?>
			<?php if ($_GET['three_cityid']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'three_cityid'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['three_cityid']];?>
</a> <?php }?>
		<?php }?>
		
        <?php if ($_smarty_tpl->tpl_vars['industry_name']->value[$_GET['hy']]) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'hy'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">行业：<?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_GET['hy']];?>
</a> <?php }?>
		<?php if ($_GET['salary']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'salary'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">薪资：<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['salary']];?>
</a> <?php }?>
		<?php if ($_GET['edu']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'edu'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">学历：<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['edu']];?>
</a> <?php }?> 
		<?php if ($_GET['exp']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'exp'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">工作经验：<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['exp']];?>
</a> <?php }?> 
		<?php if ($_GET['sex']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'sex'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">性别：<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['sex']];?>
</a> <?php }?> 
		<?php if ($_GET['type']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'type'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">工作类型：<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['type']];?>
</a> <?php }?> 
		<?php if ($_GET['report']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'report'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">到岗时间：<?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['report']];?>
</a> <?php }?> 
		<?php if ($_GET['adtime']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'adtime'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">发布时间：<?php echo $_smarty_tpl->tpl_vars['adtime']->value[$_GET['adtime']];?>
</a> <?php }?>
		<?php if ($_GET['uptime']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'uptime'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">更新时间：<?php echo $_smarty_tpl->tpl_vars['uptime']->value[$_GET['uptime']];?>
</a> <?php }?>

		<?php if ($_GET['keyword']) {?> <a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'keyword'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac"><?php echo $_GET['keyword'];?>
</a> <?php }?> 
        <?php if ($_GET['idcard']) {?><a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'idcard'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">有身份验证</a><?php }?>
        <?php if ($_GET['work']) {?><a href="<?php echo smarty_function_listurl(array('m'=>'resume','untype'=>'work'),$_smarty_tpl);?>
" class="Search_jobs_c_a disc_fac">有作品</a><?php }?>
       &nbsp; </div>
    <div class="clear"></div>
    <?php }?>
  </div>
  <div class="search_h1_box">
    <div class="search_h1_box_title">
      <ul class="search_h1_box_list">
        <li <?php if ($_GET['pic']=='') {?>class="search_h1_box_cur "<?php }?> class=" "><a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'tp','v'=>0),$_smarty_tpl);?>
">所有人才</a><i class="search_h1_box_list_icon"></i></li>
        <li <?php if ($_GET['pic']) {?>class="search_h1_box_cur "<?php }?> class="list_rem  "><a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'tp','v'=>1),$_smarty_tpl);?>
" style="padding-left:10px;">照片人才</a><i class="search_h1_box_list_icon search_h1_box_list_icon_zp png"></i></li>
      </ul>
      <?php if ($_smarty_tpl->tpl_vars['resumekeyword']->value) {?>
      <div class="jobs_tag">你是不是想找：<?php  $_smarty_tpl->tpl_vars['keylist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['keylist']->_loop = false;
global $config;eval('$paramer=array("limit"=>"10","recom"=>"1","type"=>"5","item"=>"\'keylist\'","nocache"=>"")
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
?><a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'keyword','v'=>$_smarty_tpl->tpl_vars['keylist']->value['key_title']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['keylist']->value['key_title'];?>
" class="jos_tag_a"><?php echo $_smarty_tpl->tpl_vars['keylist']->value['key_name'];?>
</a> <?php } ?> </div>
      <?php } else { ?>
      <div class="jobs_tag">&nbsp;</div>
      <?php }?>
      <div class="search_h1_box_line yun_bg_color"></div>
    </div>
    <div class="search_user_list_tit search_user_list_tit_bg">
      <div class="search_Filter"> <span class="Search_jobs_c_a_ln"> 找到 <span class="blod org"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span> 位人才满足条件 </span> <span class="yun_search_tit">排序方式：</span>
        <ul class="search_Filter_list">
          <li <?php if ($_GET['order']=='lastdate') {?>class="search_Filter_current"<?php }?>>
          <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'order','v'=>'lastdate'),$_smarty_tpl);?>
"><span>更新时间</span><i class="search_Filter_icon"></i></a>
          </li>
          <li <?php if ($_GET['order']=='ctime') {?>class="search_Filter_current"<?php }?>>
          <a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'order','v'=>'ctime'),$_smarty_tpl);?>
"><span>发布时间</span><i class="search_Filter_icon"></i></a>
          </li>
        </ul>
        <div class="search_Filter_Authenticate ">
        <a href="<?php if ($_GET['idcard']) {
echo smarty_function_listurl(array('m'=>'resume','type'=>'idcard','v'=>0),$_smarty_tpl);
} else {
echo smarty_function_listurl(array('m'=>'resume','type'=>'idcard','v'=>1),$_smarty_tpl);
}?>">
          <div class="checkbox_job search_Filter_Authenticate_mt8 <?php if ($_GET['idcard']) {?>iselect<?php }?>"><i></i></div>
          有身份验证</a></div>
        <div class="search_Filter_Authenticate ">
        <a href="<?php if ($_GET['work']) {
echo smarty_function_listurl(array('m'=>'resume','type'=>'work','v'=>0),$_smarty_tpl);
} else {
echo smarty_function_listurl(array('m'=>'resume','type'=>'work','v'=>1),$_smarty_tpl);
}?>">
          <div class="checkbox_job search_Filter_Authenticate_mt8 <?php if ($_GET['work']) {?>iselect<?php }?>"><i></i></div>
          有作品</a></div>
      </div>
    </div>
  </div>
  <div class="job_left_sidebar"> <?php if ($_smarty_tpl->tpl_vars['pagenum']->value<2) {?>  
    <?php  $_smarty_tpl->tpl_vars['user2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user2']->_loop = false;
$user2 = $user2; if (!is_array($user2) && !is_object($user2)) { settype($user2, 'array');}
foreach ($user2 as $_smarty_tpl->tpl_vars['user2']->key => $_smarty_tpl->tpl_vars['user2']->value) {
$_smarty_tpl->tpl_vars['user2']->_loop = true;
?>
    <?php if ($_GET['pic']) {?>
    <div class="resume_list" >
      <dl class="resume_list_dl">
        <dt><a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['user2']->value['id']),$_smarty_tpl);?>
" target="_blank"><img src=".<?php echo $_smarty_tpl->tpl_vars['user2']->value['photo'];?>
" width="60" height="75" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
',2);"/></a></dt>
        <dd>
          <div class="resume_list_p2_l fl">
            <div class="resume_list_p1"><a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['user2']->value['id']),$_smarty_tpl);?>
" class="resume_list_name yun_text_color" target="_blank"><?php echo $_smarty_tpl->tpl_vars['user2']->value['username_n'];?>
</a><span class="resume_list_p1_e">，<?php echo $_smarty_tpl->tpl_vars['user2']->value['sex_n'];?>
，<?php if ($_smarty_tpl->tpl_vars['user2']->value['age']==0) {?>保密<?php } else {
echo $_smarty_tpl->tpl_vars['user2']->value['age'];?>
岁<?php }?></span> </div>
            <div class="resume_list_p2">经验：<?php echo $_smarty_tpl->tpl_vars['user2']->value['exp_n'];?>
 | 学历：<?php echo $_smarty_tpl->tpl_vars['user2']->value['edu_n'];?>
</div>
            <div class="resume_list_p2">期望薪资：<span class="resume_list_p2_xz">￥<?php echo $_smarty_tpl->tpl_vars['user2']->value['salary_n'];?>
</span></div>
          </div>
          <div class="resume_list_p2_r">
            <div class="">意向职位：<span  style="font-weight:bold;color:#1369c0; "><?php echo $_smarty_tpl->tpl_vars['user2']->value['job_post_n'];?>
</span></div>
            <div class="">意向城市：<?php echo $_smarty_tpl->tpl_vars['user2']->value['job_city_one'];?>
-<?php echo $_smarty_tpl->tpl_vars['user2']->value['job_city_two'];?>
</div>
          </div>
        </dd>
        <span class="resume_list_jlzd" ><span style="color:red;">置顶</span></span>
      </dl>
    </div>
    <?php } else { ?>
    <div class="search_job_list <?php if ($_smarty_tpl->tpl_vars['key']->value%2!='0') {
}?>" >
      <div class="search_job_left_siaber"> <a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['user2']->value['id']),$_smarty_tpl);?>
" target="_blank" class="fl search_job_jobs_name yun_text_color"><?php echo $_smarty_tpl->tpl_vars['user2']->value['username_n'];?>
</a> <span class="fl disc_user_mes"><?php echo $_smarty_tpl->tpl_vars['user2']->value['sex_n'];?>
,
        <?php if ($_smarty_tpl->tpl_vars['user2']->value['age']==0) {?>保密<?php } else {
echo $_smarty_tpl->tpl_vars['user2']->value['age'];?>
岁<?php }?>,</span> <?php if ($_smarty_tpl->tpl_vars['user2']->value['topdate']>time()) {?><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/user_zd.gif" title="置顶"  class="user_rz_img png fl"/><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['user2']->value['idcard_status']=='1') {?><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/sf.png" title="身份已认证"  class="user_rz_img png fl"/><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['user2']->value['ispic']) {?><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/profile.png" title="有形象照" class="user_rz_img png fl"/><?php }?>
        
        <?php if (in_array($_smarty_tpl->tpl_vars['user2']->value['id'],$_smarty_tpl->tpl_vars['lookresume']->value)) {?><span class="co_fav"><i></i><em>已浏览</em></span><?php }?>
        <?php if (in_array($_smarty_tpl->tpl_vars['user2']->value['id'],$_smarty_tpl->tpl_vars['talentpool']->value)) {?><span class="co_fav"><i></i><em>已收藏</em></span><?php }?>
        <?php if (in_array($_smarty_tpl->tpl_vars['user2']->value['uid'],$_smarty_tpl->tpl_vars['useridmsg']->value)) {?><span class="co_fav"><i></i><em>已邀请</em></span><?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['job_list']->value['rec_time']>time()) {?><img width="15" height="15" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/tui.png" title="站长推荐"/><?php }?>
        <div class="company_det"> <span class="search_job_list_box_s">经验：<em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['user2']->value['exp_n'];?>
</em> </span><span class="search_job_list_box_line">|</span><span class="search_job_list_box_s">学历：<em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['user2']->value['edu_n'];?>
</em></span><span class="search_job_list_box_line">|</span><span class="search_job_list_box_s">期望薪资：<em class="com_search_job_em com_search_job_em_pay"><?php echo $_smarty_tpl->tpl_vars['user2']->value['salary_n'];?>
</em> </span> </div>
      </div>
      <div class="user_det_c_name"> <span class="search_job_list_box_user">意向职位：<em class="com_search_job_em"  style="font-weight:bold;color:#1369c0; "><?php echo $_smarty_tpl->tpl_vars['user2']->value['job_post_n'];?>
</em></span> <span class="search_job_list_box_user">意向城市：<em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['user2']->value['job_city_one'];?>
-<?php echo $_smarty_tpl->tpl_vars['user2']->value['job_city_two'];?>
 </em></span> </div>
      <div class="yun_user_operation_l"> <span class="resume_list_jobzd" ><span style="color:red;">置顶</span></span> </div>
      <div class="yun_user_operation">
        <div class="user_a_search_time"> <a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['user2']->value['id']),$_smarty_tpl);?>
" target="_blank" class="yun_user_lok_bth ">查看</a> </div>
      </div>
    </div>
    <?php }?>
    <?php } ?>
    <?php }?>   
    <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$user = $user; if (!is_array($user) && !is_object($user)) { settype($user, 'array');}
foreach ($user as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['user']->key;
?>
    
    <?php if ($_GET['pic']) {?>
    <div class="resume_list" >
      <dl class="resume_list_dl">
        <dt><a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['user']->value['id']),$_smarty_tpl);?>
" target="_blank"><img src=".<?php echo $_smarty_tpl->tpl_vars['user']->value['photo'];?>
" width="60" height="75" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
',2);"/></a></dt>
        <dd>
          <div class="resume_list_p2_l fl">
            <div class="resume_list_p1"><a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['user']->value['id']),$_smarty_tpl);?>
" class="resume_list_name yun_text_color" target="_blank"><?php echo $_smarty_tpl->tpl_vars['user']->value['username_n'];?>
</a><span class="resume_list_p1_e">，<?php echo $_smarty_tpl->tpl_vars['user']->value['sex_n'];?>
，<?php if ($_smarty_tpl->tpl_vars['user']->value['age']==0) {?>保密<?php } else {
echo $_smarty_tpl->tpl_vars['user']->value['age'];?>
岁<?php }?></span> </div>
            <div class="resume_list_p2">经验：<?php echo $_smarty_tpl->tpl_vars['user']->value['exp_n'];?>
 | 学历：<?php echo $_smarty_tpl->tpl_vars['user']->value['edu_n'];?>
</div>
            <div class="resume_list_p2">期望薪资：<span class="resume_list_p2_xz">￥<?php echo $_smarty_tpl->tpl_vars['user']->value['salary_n'];?>
</span></div>
          </div>
          <div class="resume_list_p2_r">
            <div class="">意向职位：<span  style="font-weight:bold;color:#1369c0; "><?php echo $_smarty_tpl->tpl_vars['user']->value['job_post_n'];?>
</span></div>
            <div class="">意向城市：<?php echo $_smarty_tpl->tpl_vars['user']->value['job_city_one'];?>
-<?php echo $_smarty_tpl->tpl_vars['user']->value['job_city_two'];?>
</div>
          </div>
        </dd>
        <span class="resume_list_data">
        <?php if ($_smarty_tpl->tpl_vars['user']->value['redtime']==1||$_smarty_tpl->tpl_vars['user']->value['time']=='昨天') {?>
        	<span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['user']->value['time'];?>
</span>
        <?php } else { ?>
        	<?php echo $_smarty_tpl->tpl_vars['user']->value['time'];?>

        <?php }?>
        </span>
      </dl>
    </div>
    <?php } else { ?>
    <div class="search_job_list <?php if ($_smarty_tpl->tpl_vars['key']->value%2!='0') {
}?>" >
      <div class="search_job_left_siaber"> <a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['user']->value['id']),$_smarty_tpl);?>
" target="_blank" class="fl search_job_jobs_name yun_text_color"><?php echo $_smarty_tpl->tpl_vars['user']->value['username_n'];?>
</a> <span class="fl disc_user_mes"><?php echo $_smarty_tpl->tpl_vars['user']->value['sex_n'];?>
,
        <?php if ($_smarty_tpl->tpl_vars['user']->value['age']==0) {?>保密<?php } else {
echo $_smarty_tpl->tpl_vars['user']->value['age'];?>
岁<?php }?>,</span> <?php if ($_smarty_tpl->tpl_vars['user']->value['idcard_status']=='1') {?><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/sf.png" title="身份已认证"  class="user_rz_img png fl"/><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['user']->value['ispic']) {?><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/profile.png" title="有形象照" class="user_rz_img png fl"/><?php }?>
        
        <?php if (in_array($_smarty_tpl->tpl_vars['user']->value['id'],$_smarty_tpl->tpl_vars['lookresume']->value)) {?><span class="co_fav"><i></i><em>已浏览</em></span><?php }?>
        <?php if (in_array($_smarty_tpl->tpl_vars['user']->value['id'],$_smarty_tpl->tpl_vars['talentpool']->value)) {?><span class="co_fav"><i></i><em>已收藏</em></span><?php }?>
        <?php if (in_array($_smarty_tpl->tpl_vars['user']->value['uid'],$_smarty_tpl->tpl_vars['useridmsg']->value)) {?><span class="co_fav"><i></i><em>已邀请</em></span><?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['job_list']->value['rec_time']>time()) {?><img width="15" height="15" src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/tui.png" title="站长推荐"/><?php }?>
        <div class="company_det"> <span class="search_job_list_box_s">经验：<em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['user']->value['exp_n'];?>
</em> </span><span class="search_job_list_box_line">|</span><span class="search_job_list_box_s">学历：<em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['user']->value['edu_n'];?>
</em></span><span class="search_job_list_box_line">|</span><span class="search_job_list_box_s">期望薪资：<em class="com_search_job_em com_search_job_em_pay"><?php echo $_smarty_tpl->tpl_vars['user']->value['salary_n'];?>
</em> </span> </div>
      </div>
      <div class="user_det_c_name"> <span class="search_job_list_box_user">意向职位：<em class="com_search_job_em"  style="font-weight:bold;color:#1369c0; "><?php echo $_smarty_tpl->tpl_vars['user']->value['job_post_n'];?>
</em></span> <span class="search_job_list_box_user">意向城市：<em class="com_search_job_em"><?php echo $_smarty_tpl->tpl_vars['user']->value['job_city_one'];?>
-<?php echo $_smarty_tpl->tpl_vars['user']->value['job_city_two'];?>
 </em></span> </div>
      <div class="yun_user_operation_l">
      <span class="search_job_data" >
      <?php if ($_smarty_tpl->tpl_vars['user']->value['redtime']==1||$_smarty_tpl->tpl_vars['user']->value['time']=='昨天') {?>
        	<span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['user']->value['time'];?>
</span>
        <?php } else { ?>
        	<?php echo $_smarty_tpl->tpl_vars['user']->value['time'];?>

        <?php }?></span> </div>
      <div class="yun_user_operation">
        <div class="user_a_search_time"> <a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['user']->value['id']),$_smarty_tpl);?>
" target="_blank" class="yun_user_lok_bth ">查看</a> </div>
      </div>
    </div>
    <?php }?>
    <?php } ?>
    <div class="clear"></div>
    <?php if ($_smarty_tpl->tpl_vars['total']->value!=0||is_array($_smarty_tpl->tpl_vars['user2']->value)) {?>
    <div class="search_pages">
      <div class="pages"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
    </div>
    <?php } else { ?>
    <div class="seachno">
      <div class="seachno_left"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/search-no.gif" width="144" height="102"/></div>
      <div class="listno-content"> <strong>很抱歉，没有找到满足条件的人才</strong><br>
        <span> 建议您：<br>
        1、适当减少已选择的条件<br>
        2、适当删减或更改搜索关键字<br>
        </span> <span> 热门关键字：<br>
        <?php  $_smarty_tpl->tpl_vars['klist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['klist']->_loop = false;
global $config;eval('$paramer=array("limit"=>"10","recom"=>"1","type"=>"5","item"=>"\'klist\'","nocache"=>"")
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
foreach ($list as $_smarty_tpl->tpl_vars['klist']->key => $_smarty_tpl->tpl_vars['klist']->value) {
$_smarty_tpl->tpl_vars['klist']->_loop = true;
?><a href="<?php echo smarty_function_listurl(array('m'=>'resume','type'=>'keyword','v'=>$_smarty_tpl->tpl_vars['klist']->value['key_title']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['klist']->value['key_title'];?>
"><?php echo $_smarty_tpl->tpl_vars['klist']->value['key_name'];?>
</a> <?php } ?></span> </div>
    </div>
    <?php }?> </div>
  <div class="job_recommendation">
    <div class="job_recommendation_title"><span class="job_recommendation_span">简历推荐</span></div>
    <ul class="job_recommendation_list">
      <?php  $_smarty_tpl->tpl_vars['userrec'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['userrec']->_loop = false;
$userrec = $userrec; if (!is_array($userrec) && !is_object($userrec)) { settype($userrec, 'array');}
foreach ($userrec as $_smarty_tpl->tpl_vars['userrec']->key => $_smarty_tpl->tpl_vars['userrec']->value) {
$_smarty_tpl->tpl_vars['userrec']->_loop = true;
?>
      <li> <a href="<?php echo $_smarty_tpl->tpl_vars['userrec']->value['user_url'];?>
" class="job_recommendation_jobname yun_text_color"><?php echo $_smarty_tpl->tpl_vars['userrec']->value['username_n'];?>
</a>
        <div  class="job_recommendation_msg">意向职位：<?php echo $_smarty_tpl->tpl_vars['userrec']->value['job_post_n'];?>
</div>
        <span class="job_recommendation_xz"><em class="job_right_box_list_c">￥<?php echo $_smarty_tpl->tpl_vars['userrec']->value['salary_n'];?>
 </em></span> </li>
      <?php } ?>
    </ul>
  </div>
  <div class="yun_content">
    <div class="recomme_det">
      <h3 class=""><span class="recomme_det_hh">企业推荐</span></h3>
      <div class="co_recom">
        <ul>
          <?php  $_smarty_tpl->tpl_vars['com'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['com']->_loop = false;
$com = $com; if (!is_array($com) && !is_object($com)) { settype($com, 'array');}
foreach ($com as $_smarty_tpl->tpl_vars['com']->key => $_smarty_tpl->tpl_vars['com']->value) {
$_smarty_tpl->tpl_vars['com']->_loop = true;
?>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['com']->value['com_url'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['com']->value['logo'];?>
"  onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_unit_icon'];?>
',2);"/>
            <p class="yun_text_color"><?php echo mb_substr($_smarty_tpl->tpl_vars['com']->value['name'],0,13,'gbk');?>
</p>
            </a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <div class="recomme_det">
      <h3 class=""><span class="recomme_det_hh"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
为您提供人才网最新求职信息</span></h3>
      <div class="co_recom co_recom_link">
        <dl>
          <dt>周边求职：</dt>
          <dd> 
          <?php if ($_smarty_tpl->tpl_vars['zpthreecityid']->value) {?>
                	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['zpthreecityid']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
					<a href="<?php echo smarty_function_listurl(array('type'=>'three_cityid','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
招聘</a>
					<?php } ?>
                <?php } elseif ($_smarty_tpl->tpl_vars['zpcityid']->value) {?>
                	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city_type']->value[$_smarty_tpl->tpl_vars['zpcityid']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
					<a href="<?php echo smarty_function_listurl(array('type'=>'cityid','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
招聘</a>
					<?php } ?>
                <?php } else { ?>
                	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
					<a href="<?php echo smarty_function_listurl(array('type'=>'provinceid','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
招聘</a>
					<?php } ?>
                <?php }?>
               </dd>
        </dl>
        <dl>
          <dt>求职频道：</dt>
          <dd>
                <?php if ($_smarty_tpl->tpl_vars['zpjobpost']->value) {?>
                	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_smarty_tpl->tpl_vars['zpjobpost']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
					<a href="<?php echo smarty_function_listurl(array('type'=>'job_post','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
招聘</a>
					<?php } ?>
                <?php } elseif ($_smarty_tpl->tpl_vars['zpjob1son']->value) {?>
                	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['job_type']->value[$_smarty_tpl->tpl_vars['zpjob1son']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
					<a href="<?php echo smarty_function_listurl(array('type'=>'job1_son','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
招聘</a>
					<?php } ?>
                <?php } else { ?>
                	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['job_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
					<a href="<?php echo smarty_function_listurl(array('type'=>'job1','v'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['job_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
招聘</a>
					<?php } ?>
                <?php }?>
				</dd>
        </dl>
        <dl style="border-bottom:0;">
          <dt>热门搜索：</dt>
          <dd> <?php  $_smarty_tpl->tpl_vars['keylist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['keylist']->_loop = false;
global $config;eval('$paramer=array("limit"=>"20","recom"=>"1","type"=>"5","item"=>"\'keylist\'","nocache"=>"")
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
</a> <?php } ?> </dd>
        </dl>
      </div>
    </div>
  </div>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/login.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<?php }} ?>
