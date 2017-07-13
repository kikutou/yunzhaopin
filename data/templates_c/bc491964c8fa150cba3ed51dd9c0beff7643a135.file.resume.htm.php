<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 17:28:03
         compiled from "/var/www/html/yunzhaopin/app/template/wap/resume.htm" */ ?>
<?php /*%%SmartyHeaderCode:8646747775925522321d805-85976452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc491964c8fa150cba3ed51dd9c0beff7643a135' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/wap/resume.htm',
      1 => 1469609456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8646747775925522321d805-85976452',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'city_name' => 0,
    'jobname' => 0,
    'userclass_name' => 0,
    'searchurl' => 0,
    'userdata' => 0,
    'v' => 0,
    'industry_index' => 0,
    'industry_name' => 0,
    'edu' => 0,
    'type' => 0,
    'uptime' => 0,
    'key' => 0,
    'user' => 0,
    'total' => 0,
    'pagenav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5925522336ad97_68935645',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5925522336ad97_68935645')) {function content_5925522336ad97_68935645($_smarty_tpl) {?><?php if (!is_callable('smarty_function_searchurl')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.searchurl.php';
if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
?><?php $user=array();global $db,$db_config,$config;eval('$paramer=array("limit"=>"20","edu"=>"\'auto.edu\'","exp"=>"\'auto.exp\'","sex"=>"\'auto.sex\'","uptime"=>"\'auto.uptime\'","keyword"=>"\'auto.keyword\'","hy"=>"\'auto.hy\'","salary"=>"\'auto.salary\'","report"=>"\'auto.report\'","three_cityid"=>"\'auto.three_cityid\'","provinceid"=>"\'auto.provinceid\'","cityid"=>"\'auto.cityid\'","jobin"=>"\'auto.jobin\'","type"=>"\'auto.type\'","order"=>"\'topdate\'","post_len"=>"14","ispage"=>"1","islt"=>"4","item"=>"\'user\'","nocache"=>"")
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
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['wapstyle']->value)."/header_cont.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

 <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/template/wap/js/search.js" language="javascript"><?php echo '</script'; ?>
> 
    <section>
  <div class="searchOptions clearfix">
    <ul class="searchOptions_list">
      <li onclick="checkshowjob('city');"><a href="javascript:void(0);" class="searchOptions_list_a"><span class="job_ov"><?php if ($_smarty_tpl->tpl_vars['city_name']->value[$_GET['cityid']]||$_smarty_tpl->tpl_vars['city_name']->value[$_GET['provinceid']]) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['cityid']];
echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['provinceid']];
} elseif ($_smarty_tpl->tpl_vars['city_name']->value[$_GET['three_cityid']]) {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_GET['three_cityid']];
} elseif ($_smarty_tpl->tpl_vars['config']->value['cityid']&&$_smarty_tpl->tpl_vars['config']->value['sy_web_site']=='1') {
echo $_smarty_tpl->tpl_vars['city_name']->value[$_smarty_tpl->tpl_vars['config']->value['cityid']];
} else { ?>区域<?php }?></span><i class="searchOptions_icon"></i></a></li>
      <li onclick="checkshowjob('job');"><a href="javascript:void(0);" class="searchOptions_list_a"><span class="job_ov"><?php if ($_smarty_tpl->tpl_vars['jobname']->value) {
echo $_smarty_tpl->tpl_vars['jobname']->value;
} else { ?>意向<?php }?></span><i class="searchOptions_icon"></i></a></li>
      <li onclick="show_div('open')"><a href="javascript:void(0);" class="searchOptions_list_a"><span class="job_ov"><?php if ($_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['exp']]) {
echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_GET['exp']];
} else { ?>经验<?php }?></span><i class="searchOptions_icon"></i></a></li>
      <li onclick="show_div('open2')" style="border:none"><a href="javascript:void(0);" class="searchOptions_list_a">更多<i class="searchOptions_icon"></i></a></li>
      <input type="hidden" id="searchurl" value="<?php echo $_smarty_tpl->tpl_vars['searchurl']->value;?>
" />
      <input type="hidden" id="waptype" value="1" />
    </ul>



    <div class="job_pop_box openlist" id="open">
      <ul class="job_pop_pay_list">
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_word']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
        <li><a href="<?php echo smarty_function_searchurl(array('m'=>'wap','c'=>'resume','exp'=>$_smarty_tpl->tpl_vars['v']->value,'untype'=>'exp'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</a></li>
        <?php } ?>
      </ul>
    </div>

    <div class="job_pop_more openlist" id="open2">
      <form method="get" action="index.php">
        <input type="hidden" name="c" value="resume" />
        <?php if ($_GET['jobin']) {?><input type="hidden" name="jobin" value="<?php echo $_GET['jobin'];?>
" /><?php }?>
        <?php if ($_GET['cityid']) {?><input type="hidden" name="cityid" value="<?php echo $_GET['cityid'];?>
" /><?php }?>
        <?php if ($_GET['provinceid']) {?><input type="hidden" name="provinceid" value="<?php echo $_GET['provinceid'];?>
" /><?php }?>
        <?php if ($_GET['exp']) {?><input type="hidden" name="exp" value="<?php echo $_GET['exp'];?>
" /><?php }?>
        <div class="com_search_box">
        <div class="com_search_box_cont">
          <div class="com_search_box_list">
            <div class="com_search_box_left"> 行业类别 </div>
            <div class="com_search_box_right">
              <div class="selectOption" style="width: 100%">
                <select name="hy">
                  <option value="">行业类别</option>                          
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['industry_index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>				
                  <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" <?php if ($_GET['hy']==$_smarty_tpl->tpl_vars['v']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['industry_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</option>
                 <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="com_search_box_list">
            <div class="com_search_box_left"> 薪资待遇</div>
            <div class="com_search_box_right">
              <div class="selectOption" style="width: 100%">
                <select name="salary" id='salary'>
                  <option value="">薪资待遇</option>                 
					<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_salary']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>					
                  <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" <?php if ($_GET['salary']==$_smarty_tpl->tpl_vars['v']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</option>                
					<?php } ?>				
                </select>
              </div>
            </div>
          </div>
          <div class="com_search_box_list">
            <div class="com_search_box_left"> 学历要求</div>
            <div class="com_search_box_right">
              <div class="selectOption" style="width: 100%">
                <select name="edu" id='edu'>
                  <option value="">学历要求</option>                  
				<?php  $_smarty_tpl->tpl_vars['edu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['edu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_edu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['edu']->key => $_smarty_tpl->tpl_vars['edu']->value) {
$_smarty_tpl->tpl_vars['edu']->_loop = true;
?>				
                  <option value="<?php echo $_smarty_tpl->tpl_vars['edu']->value;?>
" <?php if ($_GET['edu']==$_smarty_tpl->tpl_vars['edu']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['edu']->value];?>
</option>                  
				<?php } ?> 		    
                </select>
              </div>
            </div>
          </div>
          <div class="com_search_box_list">
            <div class="com_search_box_left"> 工作性质 </div>
            <div class="com_search_box_right">
              <div class="selectOption" style="width: 100%">
                <select name="type" id='type'>
                  <option value=""> 工作性质</option>
				<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" <?php if ($_GET['type']==$_smarty_tpl->tpl_vars['type']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['type']->value];?>
</option>
				<?php } ?> 
                </select>
              </div>
            </div>
          </div>
          <div class="com_search_box_list">
            <div class="com_search_box_left"> 到岗时间 </div>
            <div class="com_search_box_right">
              <div class="selectOption" style="width: 100%">
                <select name="report" id='report'>
                  <option value=""> 到岗时间</option>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userdata']->value['user_report']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" <?php if ($_GET['report']==$_smarty_tpl->tpl_vars['v']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['userclass_name']->value[$_smarty_tpl->tpl_vars['v']->value];?>
</option>
				<?php } ?> 
                </select>
              </div>
            </div>
          </div>
          <div class="com_search_box_list">
            <div class="com_search_box_left"> 更新日期</div>
            <div class="com_search_box_right">
              <div class="selectOption" style="width: 100%">
                <select name="uptime" id='uptime'>
                  <option value="">更新日期</option>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['uptime']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_GET['uptime']==$_smarty_tpl->tpl_vars['key']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
				<?php } ?> 
                </select>
              </div>
            </div>
          </div>
          <input type="submit" value="搜索"class="seach_post_sub" />
        </div>
      </form>
    </div>
  </div>

  
  </div>
</section>
<section>
  <div class="warp_content clear">
   
  <div class="job_list_content"> <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
$user = $user; if (!is_array($user) && !is_object($user)) { settype($user, 'array');}
foreach ($user as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
    <div class="user_list_cont"> <a href="<?php echo smarty_function_url(array('m'=>'wap','c'=>'resume','a'=>'show','id'=>$_smarty_tpl->tpl_vars['user']->value['id']),$_smarty_tpl);?>
" class="user_list_b">
      <div class="user_list">
  <aside class="user_tj_photo"> <?php if ($_smarty_tpl->tpl_vars['user']->value['photo']!='') {?> <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['user']->value['photo'];?>
"> <?php } else { ?> <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
"> <?php }?> </aside>
        <h3><span class="c288"><?php echo $_smarty_tpl->tpl_vars['user']->value['username_n'];?>
</span><em class="user_xinx"><span class="user_line">/</span><?php echo $_smarty_tpl->tpl_vars['user']->value['sex_n'];?>
<span class="user_line">/</span><?php if ($_smarty_tpl->tpl_vars['user']->value['age']==0) {?>保密<?php } else {
echo $_smarty_tpl->tpl_vars['user']->value['age'];?>
岁<?php }?></em>   <?php if ($_smarty_tpl->tpl_vars['user']->value['topdate']>time()) {?><i class="user_icon_zd">置顶</i> <?php }?>
        
        <span class="resume_t_date">
        
        <?php if ($_smarty_tpl->tpl_vars['user']->value['redtime']==1||$_smarty_tpl->tpl_vars['user']->value['time']=='昨天') {?>
          <span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['user']->value['time'];?>
</span>
          <?php } else { ?>
          <?php echo $_smarty_tpl->tpl_vars['user']->value['time'];?>

          <?php }?>
         </span>
        
        </h3>
       <aside class="user_list_p">   <em class="user_map_p" style="padding-left:0px;"><span class="user_city_n"><?php echo $_smarty_tpl->tpl_vars['user']->value['job_city_one'];?>
-<?php echo $_smarty_tpl->tpl_vars['user']->value['job_city_two'];?>
</span></em><span class="user_list_n">经验：</span><span class="user_list_yx_w"><?php echo $_smarty_tpl->tpl_vars['user']->value['exp_n'];?>
</span></aside> <aside class="user_list_p"> <em class="user_p_ov"><span class="user_list_j">意向职位：</span><span class="
user_list_yxjob"><?php echo $_smarty_tpl->tpl_vars['user']->value['job_post_n'];?>
</span></em> </aside>
        
     </div>
      </a> </div>
    <?php } ?> </div>
  <?php if ($_smarty_tpl->tpl_vars['total']->value<=0) {?>
  <?php if ($_GET['keyword']!='') {?>
  <div class="wap_member_no">没有搜索到人才</div>
  <?php } else { ?>
  <div class="wap_member_no">暂无人才</div>
  <?php }?>
  <?php } else { ?> 
  <div class="pages"><?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div> 
  <?php }?> </div>
</div>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/app/template/wap/css/wap_tck.css" type="text/css">
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['wapstyle']->value)."/public.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['wapstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
