<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-07-07 12:08:30
         compiled from "/var/www/html/yunzhaopin/app/template/member/user/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:190816113595f093e33d7a0-58565283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bac763199e2c6b3425614acca66d42e07e1fab2' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/member/user/index.htm',
      1 => 1470040742,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190816113595f093e33d7a0-58565283',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'resume' => 0,
    'user_photo' => 0,
    'config' => 0,
    'username' => 0,
    'statis' => 0,
    'msgnum' => 0,
    'lookNum' => 0,
    'rlist' => 0,
    'resumelist' => 0,
    'uid' => 0,
    'finder' => 0,
    'flist' => 0,
    'findernum' => 0,
    'expect_name' => 0,
    'v' => 0,
    'blist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_595f093e4dced4_96892826',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595f093e4dced4_96892826')) {function content_595f093e4dced4_96892826($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_function_ad')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.ad.php';
?><?php global $db,$db_config,$config;
		$time = time();
		
		
		//可以做缓存
        eval('$paramer=array("jobwhere"=>"\'auto.jobwhere\'","namelen"=>"8","comlen"=>"13","limit"=>"100","item"=>"\'blist\'","nocache"=>"")
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

		
		 
		$blist = $db->select_all("company_job",$where.$limit);
		if(is_array($blist)){
			//处理类别字段
			$cache_array = $db->cacheget();
			$comuid=$jobid=array();
			foreach($blist as $key=>$value){
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

			foreach($blist as $key=>$value){
				if($paramer[bid]){
					$noids[] = $value[id];
				}
				$blist[$key] = $db->array_action($value,$cache_array);
				$blist[$key][stime] = date("Y-m-d",$value[sdate]);
				$blist[$key][etime] = date("Y-m-d",$value[edate]);
				$blist[$key][lastupdate] = date("Y-m-d",$value[lastupdate]);

				$blist[$key][yyzz_status] =$r_uid[$value['uid']][yyzz_status];
				$blist[$key][logo] =$r_uid[$value['uid']][logo];
				$blist[$key][pr_n] =$r_uid[$value['uid']][pr_n];
				$blist[$key][hy_n] =$r_uid[$value['uid']][hy_n];
				$blist[$key][mun_n] =$r_uid[$value['uid']][mun_n];
				$time=$value['lastupdate'];
				//今天开始时间戳
				$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
				//昨天开始时间戳
				$beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
				//一周内时间戳
				$week=strtotime(date("Y-m-d",strtotime("-1 week")));
				if($time>$week && $time<$beginYesterday){
					$blist[$key]['time'] ="一周内";
				}elseif($time>$beginYesterday && $time<$beginToday){
					$blist[$key]['time'] ="昨天";
				}elseif($time>$beginToday){	
					$blist[$key]['time'] = date("H:i",$value['lastupdate']);
					$blist[$key]['redtime'] =1;
				}else{
					$blist[$key]['time'] = date("Y-m-d",$value['lastupdate']);
				}
				//获得福利待遇名称
				if(is_array($blist[$key]['welfare'])&&$blist[$key]['welfare']){
					foreach($blist[$key]['welfare'] as $val){
						$blist[$key]['welfarename'][]=$cache_array['comclass_name'][$val];
					}

				}
				//截取公司名称
				if($paramer[comlen]){
					$blist[$key][com_n] = mb_substr($value['com_name'],0,$paramer[comlen],"GBK");
				}
				//截取职位名称
				if($paramer[namelen]){
					if($value['rec_time']>time()){
						$blist[$key][name_n] = "<font color='red'>".mb_substr($value['name'],0,$paramer[namelen],"GBK")."</font>";
					}else{
						$blist[$key][name_n] = mb_substr($value['name'],0,$paramer[namelen],"GBK");
					}
				}else{
					if($value['rec_time']>time()){
						$blist[$key]['name_n'] = "<font color='red'>".$value['name']."</font>";
					}
				}
				//构建职位伪静态URL
				$blist[$key][job_url] = Url("job",array("c"=>"comapply","id"=>$value[id]),"1");
				//构建企业伪静态URL
				$blist[$key][com_url] = Url("company",array("c"=>"show","id"=>$value[uid]));
				foreach($comrat as $k=>$v){
					if($value[rating]==$v[id]){
						$blist[$key][color] = str_replace("#","",$v[com_color]);
						$blist[$key][ratlogo] = $v[com_pic];
						$blist[$key][ratname] = $v[name];
					}
				}
				if($paramer[keyword]){
					$blist[$key][name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[name]);
					$blist[$key][com_name]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$value[com_name]);
					$blist[$key][name_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$blist[$key][name_n]);
					$blist[$key][com_n]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$blist[$key][com_n]);
					$blist[$key][job_city_one]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[provinceid]]);
					$blist[$key][job_city_two]=str_replace($paramer[keyword],"<font color=#FF6600 >".$paramer[keyword]."</font>",$city_name[$value[cityid]]);
				}
			}

			if(is_array($blist)){
				if($paramer[keyword]!=""&&!empty($blist)){
					addkeywords('3',$paramer[keyword]);
				}
			}
		} ?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<div id="bg" <?php if ($_smarty_tpl->tpl_vars['resume']->value['name']=='') {?>style="display:block"<?php }?>></div>
<div class="yun_user_member_w1100" >
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/left.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <!--初次注册弹出框-->
    <div class="index_no_resume_box" id="yingdao" <?php if ($_smarty_tpl->tpl_vars['resume']->value['name']!='') {?>style="display:none;"<?php }?>>
     
      <div class="index_no_resume_cont">
       
        <div class="index_no_resume_p"> 
         <div class="index_no_resume_h1">请先填写简历信息</div>为了更快的找到工作，需填写个人简历！</div>
        <div class="index_no_resume_p2"><a href="javascript:Close_yd();">知道了</a></div>
      </div>
    </div>
  <!--初次注册弹出框 end-->
<div class="index_mian_right fltR"> 

  <div class="member_right_box mt20 fltL">
    <div class="member_right_Information  fltL">
      <div class="User_avatar  fltL"> <a href="index.php?c=uppic"> <img src=".<?php echo $_smarty_tpl->tpl_vars['user_photo']->value;?>
" border="0" height="100" width="80" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_member_icon'];?>
',2);" /> </a> </div>
      <div class="member_Information_right fltL">
        <div class="member_Information_name  fltL"> <span class="member_Information_hello">你好！</span> <span class="member_Information_n"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</span>  
        </div> 
		<div class="member_Information_msg fltL "> 
        <a href="index.php?c=binding"> 
        <span class="member_Information_touch fltL <?php if ($_smarty_tpl->tpl_vars['resume']->value['moblie_status']=='1') {?>member_Information_touch_rz<?php }?>"> <?php if ($_smarty_tpl->tpl_vars['resume']->value['telphone']=='') {?>
          手机号未验证
          <?php } else { ?>
          <?php echo $_smarty_tpl->tpl_vars['resume']->value['telphone'];?>

          <?php }?> 
          <span class="member_Information_touch_no"><?php if ($_smarty_tpl->tpl_vars['resume']->value['moblie_status']!='1') {?>未验证<?php } else { ?>已验证<?php }?></span> </span> 
          <span class="member_Information_email fltL <?php if ($_smarty_tpl->tpl_vars['resume']->value['email_status']=='1') {?>member_Information_email_rz<?php }?>"> <?php if ($_smarty_tpl->tpl_vars['resume']->value['email']=='') {?>
          邮箱未验证
          <?php } else { ?>
          <?php echo $_smarty_tpl->tpl_vars['resume']->value['email'];?>

          <?php }?> <span class="member_Information_touch_no"><?php if ($_smarty_tpl->tpl_vars['resume']->value['email_status']!='1') {?>未绑定<?php } else { ?>已绑定<?php }?></span> </span> 
          <span class="member_Information_sf  fltL <?php if ($_smarty_tpl->tpl_vars['resume']->value['idcard_status']=='1') {?>member_Information_sf_rz<?php }?>"> 
          <?php if ($_smarty_tpl->tpl_vars['resume']->value['idcard']=='') {?>
          身份证未验证
          <?php } else { ?>
          <?php echo $_smarty_tpl->tpl_vars['resume']->value['idcard'];?>
<span class="member_Information_touch_no"><?php if ($_smarty_tpl->tpl_vars['resume']->value['idcard_status']!='1') {?>身份未验证<?php } else { ?>身份已验证<?php }?></span>
          <?php }?> 
           </span> 
          </a>
        </div>  <span class="member_Information_xg fltL"> <a href="index.php?c=info">编辑基本信息</a> | <a href="index.php?c=uppic" title="更换形象照"style="margin-left:5px;">更换形象照</a> | <a href="<?php echo smarty_function_url(array('m'=>'ask','c'=>'friend','id'=>$_smarty_tpl->tpl_vars['statis']->value['uid']),$_smarty_tpl);?>
" target="_blank" style="margin-left:5px;">我的个人主页</a></span>
         </div>
         
     
    
  </div> 
   <div class="user_m_yue fltL">
 
  <span class="user_m_yue_name">我的<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
：</span> <span class="member_Information_Balance_fold"><?php echo $_smarty_tpl->tpl_vars['statis']->value['integral'];?>
</span>
  <span class=" member_Information_Balance"><a href="index.php?c=pay" class="member_Info_pay">充值</a> <a href="<?php echo smarty_function_url(array('m'=>'redeem'),$_smarty_tpl);?>
" class="member_Info_pay_dh">兑换</a> <a href="index.php?c=integral" class="user_m_yue_jf">如何获取<?php echo $_smarty_tpl->tpl_vars['config']->value['integral_pricename'];?>
?</a> </span>  </div>
        
    </div>
 <div class="member_right_box member_right_box_bor mt10 fltL">
    <div class="member_right_index_h1 fltL"> <span class="member_right_h1_span fltL">求职信息</span> <i class="member_right_h1_icon user_bg"></i></div>
  <div class="member_Information_zt fltL  ">
      <dl class="member_Information_amount">
        <dd><span class="member_Information_amount_n"><?php if ($_smarty_tpl->tpl_vars['msgnum']->value=='') {?>0<?php } else { ?><i class="member_Information_amount_n_c"><?php echo $_smarty_tpl->tpl_vars['msgnum']->value;?>
</i><?php }?></span></dd>
        <dt><a href="index.php?c=msg">面试通知</a></dt>
      </dl>
      <dl class="member_Information_amount">
        <dd><span class="member_Information_amount_n"><?php echo $_smarty_tpl->tpl_vars['lookNum']->value;?>
</span></dd>
        <dt> <a href="index.php?c=look">谁看了我的简历</a></dt>
      </dl>
      <dl class="member_Information_amount">
        <dd><span class="member_Information_amount_n"><?php if ($_smarty_tpl->tpl_vars['statis']->value['sq_jobnum']=='') {?>0<?php } else {
echo $_smarty_tpl->tpl_vars['statis']->value['sq_jobnum'];
}?></span></dd>
        <dt><a href="index.php?c=job">职位申请记录</a></dt>
      </dl>
      <dl class="member_Information_amount member_Information_amount_end">
        <dd><span class="member_Information_amount_n"><?php if ($_smarty_tpl->tpl_vars['statis']->value['fav_jobnum']=='') {?>0<?php } else {
echo $_smarty_tpl->tpl_vars['statis']->value['fav_jobnum'];
}?></span></dd>
        <dt><a href="index.php?c=favorite" title="职位收藏">职位收藏记录</a></dt>
      </dl>
    </div>
     </div>
  <div class="member_right_box member_right_box_bor mt10 fltL">

    <div class="member_right_index_h1 fltL"> <span class="member_right_h1_span fltL">我的简历</span> <i class="member_right_h1_icon user_bg"></i></div>
    <!-----------------------------------------  已有简历状态-----------------------------------> 
    <?php  $_smarty_tpl->tpl_vars['resumelist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['resumelist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['resumelist']->key => $_smarty_tpl->tpl_vars['resumelist']->value) {
$_smarty_tpl->tpl_vars['resumelist']->_loop = true;
?>
    <div class="member_index_resume_box" id="resumelist<?php echo $_smarty_tpl->tpl_vars['resumelist']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['resumelist']->value['id']!=$_smarty_tpl->tpl_vars['resume']->value['def_job']) {?>style ="display:none;" <?php }?>>
      <div class="member_index_resume_t">
        <div class="member_index_resume_t_left">
          <div class="member_index_resume_t_name fltL">
            <div class="member_index_resume_t_name_l fltL"> 简历名称：</div>
            <div class="index_resume_my_n" id="show_resume" onclick="show_resume('resume_expect<?php echo $_smarty_tpl->tpl_vars['resumelist']->value['id'];?>
')"> <?php echo $_smarty_tpl->tpl_vars['resumelist']->value['resumelist'];?>
 </div>
            <div class="index_resume_my_ll">被浏览：<?php echo $_smarty_tpl->tpl_vars['resumelist']->value['hits'];?>
 次</div>
          </div>
          <div class="member_index_resume_t_wz fltL">
            <div class="member_index_resume_t_name_l fltL"> 简历完整度：</div>
            <div class="member_index_resume_t_wzd"> <span class="member_index_resume_t_wz_b"> <em class="ember_index_resume_t_wz_c" style="width:<?php echo $_smarty_tpl->tpl_vars['resumelist']->value['integrity'];?>
%"></em> </span> <span class="member_index_resume_t_wz_n"><?php echo $_smarty_tpl->tpl_vars['resumelist']->value['integrity'];?>
%</span> </div>
          </div>
        </div>
        <div class="member_index_resume_t_cz fltR">
          <div class="ember_index_resume_t_cz_zt"> <em class="member_right_em fltR">简历状态：  <?php if ($_smarty_tpl->tpl_vars['resume']->value['status']==2) {?> <span class="m_u_red">隐藏</span> <?php } else { ?>
            公开
            <?php }?>  <a href="index.php?c=privacy" class="cblue">设置</a> </em> </div>
          <a href="javascript:void(0)" onclick="resumetop('<?php echo $_smarty_tpl->tpl_vars['resumelist']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['resumelist']->value['topdate'];?>
','<?php echo $_smarty_tpl->tpl_vars['resumelist']->value['name'];?>
')" class="member_index_resume_t_cz_bth  ">简历置顶</a> <a href="index.php?c=expect<?php if ($_smarty_tpl->tpl_vars['resumelist']->value['doc']) {?>q<?php }?>&e=<?php echo $_smarty_tpl->tpl_vars['resumelist']->value['id'];?>
" class="member_index_resume_t_cz_bth ">修改简历</a> <a href="<?php echo smarty_function_url(array('m'=>'resume','c'=>'show','id'=>$_smarty_tpl->tpl_vars['resumelist']->value['id'],'tmp'=>$_smarty_tpl->tpl_vars['resumelist']->value['tmpid']),$_smarty_tpl);?>
" target="_blank" class="member_index_resume_t_cz_bth ">预览简历</a> <a onclick="layer_del('确定要刷新？', 'index.php?c=resume&act=refresh&id=<?php echo $_smarty_tpl->tpl_vars['resumelist']->value['id'];?>
');" href="javascript:void(0)" class="member_index_resume_t_cz_bth ">刷新简历</a> </div>
      </div>
      <?php if (($_smarty_tpl->tpl_vars['resumelist']->value['edu']==0||$_smarty_tpl->tpl_vars['resumelist']->value['training']==0||$_smarty_tpl->tpl_vars['resumelist']->value['skill']==0||$_smarty_tpl->tpl_vars['resumelist']->value['work']==0||$_smarty_tpl->tpl_vars['resumelist']->value['project']==0||$_smarty_tpl->tpl_vars['resumelist']->value['cert']==0||$_smarty_tpl->tpl_vars['resumelist']->value['other']==0)&&!$_smarty_tpl->tpl_vars['resumelist']->value['doc']) {?>
      <div class="member_index_resume_msg">
      
        <div class="member_index_resume_msg_r">
          <div class="member_index_resume_msg_r_t"> 您还有以下资料没有填写 <span class="member_index_resume_msg_span">（为了更快的找到工作，建议您立即完善简历！）</span> </div>
		  <?php if ($_smarty_tpl->tpl_vars['resumelist']->value['work']==0) {?><a href="index.php?c=expect&e=<?php echo $_smarty_tpl->tpl_vars['resumelist']->value['id'];?>
#work_upbox" class="member_index_resume_msg_a">+ 工作经历</a><?php }?>
          <?php if ($_smarty_tpl->tpl_vars['resumelist']->value['edu']==0) {?><a href="index.php?c=expect&e=<?php echo $_smarty_tpl->tpl_vars['resumelist']->value['id'];?>
#edu_upbox" class="member_index_resume_msg_a">+ 教育经历</a><?php }?>
          <?php if ($_smarty_tpl->tpl_vars['resumelist']->value['training']==0) {?><a href="index.php?c=expect&e=<?php echo $_smarty_tpl->tpl_vars['resumelist']->value['id'];?>
#training_upbox" class="member_index_resume_msg_a">+ 培训经历</a><?php }?>
          <?php if ($_smarty_tpl->tpl_vars['resumelist']->value['skill']==0) {?><a href="index.php?c=expect&e=<?php echo $_smarty_tpl->tpl_vars['resumelist']->value['id'];?>
#skill_upbox" class="member_index_resume_msg_a">+ 专业技能</a><?php }?>
          <?php if ($_smarty_tpl->tpl_vars['resumelist']->value['project']==0) {?><a href="index.php?c=expect&e=<?php echo $_smarty_tpl->tpl_vars['resumelist']->value['id'];?>
#project_upbox" class="member_index_resume_msg_a">+ 项目经验</a><?php }?>
          <?php if ($_smarty_tpl->tpl_vars['resumelist']->value['other']==0) {?><a href="index.php?c=expect&e=<?php echo $_smarty_tpl->tpl_vars['resumelist']->value['id'];?>
" class="member_index_resume_msg_a">+ 其他信息</a><?php }?> 
		  <?php if ($_smarty_tpl->tpl_vars['resume']->value['description']=='') {?><a href="index.php?c=expect&e=<?php echo $_smarty_tpl->tpl_vars['resumelist']->value['id'];?>
#description_upbox" class="member_index_resume_msg_a">+ 自我评价</a><?php }?></div>
      </div>
      <?php }?> </div>
    <!-----------------------------------------  没有简历状态-----------------------------------> 
    <?php }
if (!$_smarty_tpl->tpl_vars['resumelist']->_loop) {
?>
    <div class="member_index_no_resume">
      <p class="">你还没有创建简历，无法投递职位</p>
      <a href="index.php?c=expect&add=<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
" class="member_index_no_resume_a">创建简历</a> </div>
    <?php } ?> </div>
	
     <div class="member_right_box_banner mt10 fltL" style="width:100%; overflow:hidden"><?php echo smarty_function_ad(array('cid'=>71,'id'=>271),$_smarty_tpl);?>
</div>
	 
  <div class="member_right_box  member_right_box_bor mt10 fltL">
    <div class="member_right_index_h1 fltL"><span class="member_right_h1_span fltL">职位搜索器</span><i class="member_right_h1_icon user_bg"></i></div>
    <div class="index_Job_Finder_box">
      <ul class="index_Job_Finder_ul fltL">
        <?php  $_smarty_tpl->tpl_vars['flist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['flist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['finder']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['flist']->key => $_smarty_tpl->tpl_vars['flist']->value) {
$_smarty_tpl->tpl_vars['flist']->_loop = true;
?>
        <li class="index_Job_Finder fltL"> <i class="index_Job_Finder_icon fltL png"></i>
          <div class="index_Job_Finder_cont fltL">
            <div class="index_Job_Finder_cont_name"><a href="<?php echo $_smarty_tpl->tpl_vars['flist']->value['url'];?>
" target='_blank' class="index_Job_Finder_cont_name_a"><?php if ($_smarty_tpl->tpl_vars['flist']->value['name']) {
echo $_smarty_tpl->tpl_vars['flist']->value['name'];
} else { ?>未命名<?php }?></a></div>
            <div>搜索条件：<?php echo $_smarty_tpl->tpl_vars['flist']->value['findername'];?>
</div>
            <div class="index_Job_Finder_cont_search"><a href="<?php echo $_smarty_tpl->tpl_vars['flist']->value['url'];?>
" class="index_Job_Finder_cont_search_a" target='_blank'>立即搜索</a></div>
          </div>
          <div class="index_Job_Finder_Operating fltL"><a href="index.php?c=finder&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['flist']->value['id'];?>
">修改</a> | <a onclick="layer_del('确定要删除？', 'index.php?c=finder&act=del&id=<?php echo $_smarty_tpl->tpl_vars['flist']->value['id'];?>
');" href="javascript:void(0)">删除</a></div>
        </li>
        <?php }
if (!$_smarty_tpl->tpl_vars['flist']->_loop) {
?>
        <div class="index_no_Job_Finder">您还没有职位搜索器。</div>
        <?php } ?>
      </ul>
      <div class="index_Job_Finder_bot fltL"> 共可创建<?php echo $_smarty_tpl->tpl_vars['config']->value['user_finder'];?>
个，还可创建<?php echo $_smarty_tpl->tpl_vars['findernum']->value;?>
个职位搜索器
        <?php if ($_smarty_tpl->tpl_vars['findernum']->value>0) {?> <a href="index.php?c=finder&act=edit" class="cblue" style="margin-left:5px; text-decoration:underline">+新增职位搜索器</a> <?php }?> </div>
    </div>
  </div>
  <div class="member_right_box member_right_box_bor  mt10 fltL">
    <div class="member_right_index_h1 fltL"><i class="member_right_h1_icon user_bg"></i> <span class="member_right_h1_span fltL">合适的工作</span> <?php if ($_smarty_tpl->tpl_vars['rlist']->value) {?>
      <div class="index_resume_my_n index_resume_my_n_sh fltR" onclick="show_resume('resume_expect');"> <span id="resume_name"><?php echo $_smarty_tpl->tpl_vars['expect_name']->value;?>
</span>
        <div class="index_resume_my_n_list" id="resume_expect" style="display:none">
          <ul>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
            <li><a href="javascript:check_resume('<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
');"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <?php }?> </div>
    <?php if (empty($_smarty_tpl->tpl_vars['rlist']->value)) {?> 
    <!--     没创建简历------------------------------------------------------------------------>
    <div class="member_right_no_job">
      <div class="member_right_no_job_box ">
        <div class="member_right_no_jobl">！ </div>
        <div class="member_right_no_jobr"> 创建简历以后，系统会根据您的简历，<br>
          通过后台算法为您匹配最适合您的招聘职位<br>
          <a href="index.php?c=expect&add=<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
" class="cblue" style="text-decoration:underline">创建简历</a> </div>
      </div>
    </div>
    <!--   创建简历------------------------------------------------------------------------> 
    <?php } else { ?>
    <div class="member_right_job_box">
      <ul id="joblist">
        <?php  $_smarty_tpl->tpl_vars['blist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['blist']->_loop = false;
$blist = $blist; if (!is_array($blist) && !is_object($blist)) { settype($blist, 'array');}
foreach ($blist as $_smarty_tpl->tpl_vars['blist']->key => $_smarty_tpl->tpl_vars['blist']->value) {
$_smarty_tpl->tpl_vars['blist']->_loop = true;
?>
          <li> <a href="<?php echo $_smarty_tpl->tpl_vars['blist']->value['job_url'];?>
" class="member_right_job_box_name cblue"><?php echo $_smarty_tpl->tpl_vars['blist']->value['name_n'];?>
</a> <span class="member_right_job_xz"><?php echo $_smarty_tpl->tpl_vars['blist']->value['job_salary'];?>
</span> <a href="<?php echo $_smarty_tpl->tpl_vars['blist']->value['com_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['blist']->value['com_n'];?>
</a> </li>
        <?php }
if (!$_smarty_tpl->tpl_vars['blist']->_loop) {
?>
        <div class="member_right_no_job">
          <div class="member_right_no_job_box ">
            <div class="member_right_no_jobl">！ </div>
            <div class="member_right_no_jobr" style="margin-top:30px; font-size:22px;"> 没有适合的职位 </div>
          </div>
        </div>
        <?php } ?>
      </ul>
    </div>
    <?php }?> </div>
</div>
<div class="clear"></div>


<?php echo '<script'; ?>
>
    function Close_yd() {
        $("#yingdao").hide();
        $("#bg").hide();
    }
    function show_resume(id) {
        if($(".index_resume_my_n #" + id).is(':hidden')){
            $(".index_resume_my_n #" + id).css('display', 'block');
        }else{
            $(".index_resume_my_n #" + id).css('display', 'none');
        }
    }
    function check_resume(id, name) {
        $("#resume_name").html(name);
        $("#resume_expect").hide();
        $.post("index.php?act=getjob", { id: id }, function (data) {
            if ($.trim(data)) {
                $("#joblist").html(data);
            } else {
                $("#joblist").html('<div class="member_right_no_job">' +
    '<div class="member_right_no_job_box ">' +
        '<div class="member_right_no_jobl">！ </div>' +
        '<div class="member_right_no_jobr" style="margin-top:30px; font-size:22px;">' +
            '没有适合的职位' +
        '</div>' +
    '</div>' +
'</div>');
            }
        })
    }
    $(function () {
        $('#show_resume').delegate('span', 'click', function () {
            $(this).parent().click();
        })
    });
    function check_select_resume(id) {
        $(".member_index_resume_box").hide();
        $("#resumelist" + id).show();
        $("#resume_expect" + id).hide();
    }
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['userstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
