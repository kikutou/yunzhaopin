<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 16:27:40
         compiled from "/var/www/html/yunzhaopin/app/template/default/company/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:1268830137592543fc29ca23-08755531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96d9096f8c72afce1db59c81dbb106b8325b98f6' => 
    array (
      0 => '/var/www/html/yunzhaopin/app/template/default/company/index.htm',
      1 => 1470048272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1268830137592543fc29ca23-08755531',
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
    'getinfo' => 0,
    'comkeyword' => 0,
    'keylist' => 0,
    'key' => 0,
    'lists' => 0,
    'usertype' => 0,
    'uid' => 0,
    'v' => 0,
    'job' => 0,
    'pagenav' => 0,
    'top_key' => 0,
    'com' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_592543fc3ebfb6_26274987',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592543fc3ebfb6_26274987')) {function content_592543fc3ebfb6_26274987($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
if (!is_callable('smarty_function_listurl')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.listurl.php';
?><?php global $db,$db_config,$config;eval('$paramer=array("ispage"=>"1","isjob"=>"1","firm"=>"1","hy"=>"\'auto.hy\'","pr"=>"\'auto.pr\'","mun"=>"\'auto.mun\'","provinceid"=>"\'auto.provinceid\'","cityid"=>"\'auto.cityid\'","three_cityid"=>"\'auto.three_cityid\'","keyword"=>"\'auto.keyword\'","rec"=>"\'auto.rec\'","order"=>"\'lastupdate\'","limit"=>"20","item"=>"\'lists\'","key"=>"\'key\'","nocache"=>"")
;');$lists=array();
		
		$time = time();
		//��������������ҹ����ҳ����
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr['arr'];
		$Purl =  $ParamerArr['purl'];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		//�Ƿ����ڷ�վ��
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
		//�ؼ���
		if($paramer['keyword']){
			$where.=" AND `name` LIKE '%".$paramer['keyword']."%'";
		}				
		//��˾��ҵ
		if($paramer['hy']){
			$where .= " AND `hy` = '".$paramer['hy']."'";
		}
		//��˾����
		if($paramer['pr']){
			$where .= " AND `pr` = '".$paramer['pr']."'";
		}
		//��˾��ģ
		if($paramer['mun']){
			$where .= " AND `mun` = '".$paramer['mun']."'";
		}
		//��˾�ص�
		if($paramer['provinceid']){
			$where .= " AND `provinceid` = '".$paramer['provinceid']."'";
		}
		//���ڵ� ����
		if($paramer['cityid']){
			$where .= " AND (`provinceid` = '".$paramer['cityid']."' OR `cityid` = '".$paramer['cityid']."')";
		}
		
		//���ڵ� ����
		if($paramer['cityin']){
			$where .= " AND (`provinceid` in(".$paramer['cityin'].") OR `cityid` in(".$paramer['cityin'].") or `three_cityid` in(".$paramer['cityin']."))";
		}
		//��ϵ�˲�Ϊ��
		if($paramer['linkman']){
			$where .= " AND `linkman`<>''";
		}
		//��ϵ�˵绰��Ϊ��
		if($paramer['linktel']){
			$where .= " AND `linktel`<>''";
		}
		//��ϵ�����䲻Ϊ��
		if($paramer['linkmail']){
			$where .= " AND `linkmail`<>''";
		}
		//�Ƿ�����ҵLOGO
		if($paramer['logo']){
			$where .= " AND `logo`<>''";
		}
		//�Ƿ�����
		if($paramer['r_status']){
			$where .= " AND `r_status`='".$paramer['r_status']."'";
		}else{
			$where .= " AND `r_status`<>'2'";
		}
		//�Ƿ��Ѿ���֤
		if($paramer['cert']){
			$where .= " AND `yyzz_status`='1'";
		}
		//����ʱ������
		if($paramer['uptime']){
			$uptime = $time-$paramer['uptime']*3600;
			$where.=" AND `lastupdate`>'".$uptime."'";
		}
		if($paramer['jobtime']){
			$where.=" AND `jobtime`<>''";
		}
		//�Ƽ�����ͷҳ��չʾ
		
		if($paramer['rec']){
			$Purl["rec"]='1';
			$where.=" AND `rec`='1' AND `hottime`>'".time()."'";
		}
		
       
		//��ѯ����
		if($paramer['limit']){
			$limit=" limit ".$paramer['limit'];
		}
		
		//�Զ����ѯ������Ĭ��ȡ�������κβ���ֱ��ʹ�ø����
		if($paramer['where']){
			$where = $paramer['where'];
		}
		//��������ֶ�
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
		//�����ֶ�Ĭ��Ϊ����ʱ��
		if($paramer['order']){
			if($paramer['order']=="last��pdate"){
				$paramer['order']="lastupdate";
			}
			$order = " ORDER BY `".$paramer['order']."`  ";
		}else{
			$order = " ORDER BY `jobtime` ";
		}
		//������� Ĭ��Ϊ����
		if($paramer['sort']){
			$sort = $paramer['sort'];
		}else{
			$sort = " DESC";
		}
		$where.=$order.$sort;
		
		$Query = $db->query("SELECT * FROM $db_config[def]company where ".$where.$limit);
		$ListId=array();
		$lists=array();
		while($rs = $db->fetch_array($Query)){
			$lists[] = $db->array_action($rs,$cache_array);
			$ListId[] = $rs['uid'];
		}  
		//���û�Ա�ȼ�
		include PLUS_PATH."/comrating.cache.php";
		if(!empty($ListId)){
		$statis = $db->select_all("company_statis","`uid` in (".@implode(",",$ListId).")","`uid`,`rating`");
		foreach($ListId as $key=>$value){
		       foreach($statis as $v){
		               foreach($comrat as $val){
			                if($value==$v['uid'] && $val['id']==$v['rating']){						
							$lists[$key]['color'] = $val['com_color'];
							$lists[$key]['ratlogo'] = $val['com_pic'];
							$lists[$key]['ratname'] = $val['name'];
						    }
					  }
				}
			}
		}
		//��Ӧ����
		if($paramer['ismsg']){
			$Msgid = @implode(",",$ListId);
			$msglist = $db->select_alls("company_msg","resume","a.`cuid` in ($Msgid) and a.`uid`=b.`uid` order by a.`id` desc","a.cuid,a.content,b.name,b.photo,b.def_job");
			if(is_array($ListId) && is_array($msglist)){
				foreach($lists as $key=>$value){
					foreach($msglist as $k=>$v){
						if($value['uid']==$v['cuid']){
							$lists[$key]['msg'][$k]['content'] = $v['content'];
							$lists[$key]['msg'][$k]['name'] = $v['name'];
							$lists[$key]['msg'][$k]['photo'] = $v['photo'];
							$lists[$key]['msg'][$k]['eid'] = $v['def_job'];
						}
					}
				}
			}
		}
		//�Ƿ���Ҫ��ѯ��Ӧְλ
		if($paramer['isjob']){
			//��ѯְλ
			$JobId = @implode(",",$ListId);
			$JobList=$db->select_all("company_job","`uid` IN ($JobId) and `edate`>'".mktime()."' and r_status<>'2' and status<>'1' and state=1  order by `lastupdate` desc");
			if(is_array($ListId) && is_array($JobList)){
				foreach($lists as $key=>$value){
					$lists[$key]['jobnum'] = 0;
					foreach($JobList as $k=>$v){
						if($value['uid']==$v['uid']){
							$id = $v['id'];
							$lists[$key]['newsjob'] = $v['name'];
							$lists[$key]['newsjob_status'] = $v['status'];
							$lists[$key]['r_status'] = $v['r_status'];

							$v = $db->array_action($value,$cache_array);
							$v['job_url'] = Url("job",array("c"=>"comapply","id"=>$JobList[$k]['id']),"1");
							$v['id']= $id;
							$v['name'] = $lists[$key]['newsjob'];
							$lists[$key]['joblist'][] = $v;
							$lists[$key]['jobnum'] = $lists[$key]['jobnum']+1;
						}
					}
					/*
					foreach($comrat as $k=>$v){
						if($value['rating']==$v['id']){
							$lists[$key]['color'] = $v['com_color'];
							$lists[$key]['ratlogo'] = $v['com_pic'];
						}
					}*/
				}
			}
		}
		//�Ƿ���Ҫ��ѯ��Ӧ��Ѷ
		if($paramer['isnews']){
			//��ѯ��Ѷ
			$JobId = @implode(",",$ListId);
			$NewsList=$db->select_all("company_news","`uid` IN ($JobId) and status=1  order by `id` desc");
			if(is_array($ListId) && is_array($NewsList)){
				foreach($lists as $key=>$value){
					$lists[$key]['newsnum'] = 0;
					foreach($NewsList as $k=>$v){
						if($value['uid']==$v['uid']){
							$lists[$key]['newslist'][] = $v;
							$lists[$key]['newsnum'] = $lists[$key]['newsnum']+1;
						}
					}
				}
			}
		}
		//�Ƿ���Ҫ��ѯ��Ӧ����չʾ
		if($paramer['isshow']){
			//��ѯ����չʾ
			$JobId = @implode(",",$ListId);
			$ShowList=$db->select_all("company_show","`uid` IN ($JobId) order by `id` desc");
			if(is_array($ListId) && is_array($ShowList)){
				foreach($lists as $key=>$value){
					$lists[$key]['shownum'] = 0;
					foreach($ShowList as $k=>$v){
						if($value['uid']==$v['uid']){
							$lists[$key]['showlist'][] = $v;
							$lists[$key]['shownum'] = $lists[$key]['shownum']+1;
						}
					}
				}
			}
		} 
		//��ҵ��ҳ �Ƿ��ע  201305_gl
		if($paramer['firm']){
			if($_COOKIE[uid]){$atnlist = $db->select_all("atn","`uid`='$_COOKIE[uid]'");}
			if(is_array($lists)){
				foreach($lists as $key=>$value){
					if(!empty($atnlist)){
						foreach($atnlist as $v){
							if($value['uid'] == $v['sc_uid']){
								$lists[$key]['atn'] = "ȡ����ע";
                                $lists[$key]['atnstatus'] = "1";
								break;
							}else{
								$lists[$key]['atn'] = "��ע";
							}
						}
					}else{
						$lists[$key]['atn'] = "��ע";
					}
				}
			}
		}
		if(is_array($lists)){
			foreach($lists as $key=>$value){
				$lists[$key]['com_url'] = Url("company",array("c"=>"show","id"=>$value['uid']));
				$lists[$key]['joball_url'] = Url("company",array("c"=>"show","id"=>$value['uid'],"tp"=>"post")); 
				if($value['logo']!=""){
					$lists[$key]['logo'] = str_replace("./",$config['sy_weburl']."/",$value['logo']);
				}else{
					$lists[$key]['logo'] = $config['sy_weburl']."/".$config['sy_unit_icon'];
				} 
				
			}
			if($paramer['keyword']!=""&&!empty($lists)){
				addkeywords('4',$paramer['keyword']);
			}
		} ?>
<?php global $db,$db_config,$config;eval('$paramer=array("limit"=>"6","rec"=>"1","item"=>"\'com\'","nocache"=>"")
;');$com=array();
		
		$time = time();
		//��������������ҹ����ҳ����
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr['arr'];
		$Purl =  $ParamerArr['purl'];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		//�Ƿ����ڷ�վ��
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
		//�ؼ���
		if($paramer['keyword']){
			$where.=" AND `name` LIKE '%".$paramer['keyword']."%'";
		}				
		//��˾��ҵ
		if($paramer['hy']){
			$where .= " AND `hy` = '".$paramer['hy']."'";
		}
		//��˾����
		if($paramer['pr']){
			$where .= " AND `pr` = '".$paramer['pr']."'";
		}
		//��˾��ģ
		if($paramer['mun']){
			$where .= " AND `mun` = '".$paramer['mun']."'";
		}
		//��˾�ص�
		if($paramer['provinceid']){
			$where .= " AND `provinceid` = '".$paramer['provinceid']."'";
		}
		//���ڵ� ����
		if($paramer['cityid']){
			$where .= " AND (`provinceid` = '".$paramer['cityid']."' OR `cityid` = '".$paramer['cityid']."')";
		}
		
		//���ڵ� ����
		if($paramer['cityin']){
			$where .= " AND (`provinceid` in(".$paramer['cityin'].") OR `cityid` in(".$paramer['cityin'].") or `three_cityid` in(".$paramer['cityin']."))";
		}
		//��ϵ�˲�Ϊ��
		if($paramer['linkman']){
			$where .= " AND `linkman`<>''";
		}
		//��ϵ�˵绰��Ϊ��
		if($paramer['linktel']){
			$where .= " AND `linktel`<>''";
		}
		//��ϵ�����䲻Ϊ��
		if($paramer['linkmail']){
			$where .= " AND `linkmail`<>''";
		}
		//�Ƿ�����ҵLOGO
		if($paramer['logo']){
			$where .= " AND `logo`<>''";
		}
		//�Ƿ�����
		if($paramer['r_status']){
			$where .= " AND `r_status`='".$paramer['r_status']."'";
		}else{
			$where .= " AND `r_status`<>'2'";
		}
		//�Ƿ��Ѿ���֤
		if($paramer['cert']){
			$where .= " AND `yyzz_status`='1'";
		}
		//����ʱ������
		if($paramer['uptime']){
			$uptime = $time-$paramer['uptime']*3600;
			$where.=" AND `lastupdate`>'".$uptime."'";
		}
		if($paramer['jobtime']){
			$where.=" AND `jobtime`<>''";
		}
		//�Ƽ�����ͷҳ��չʾ
		
		if($paramer['rec']){
			$Purl["rec"]='1';
			$where.=" AND `rec`='1' AND `hottime`>'".time()."'";
		}
		
       
		//��ѯ����
		if($paramer['limit']){
			$limit=" limit ".$paramer['limit'];
		}
		
		//�Զ����ѯ������Ĭ��ȡ�������κβ���ֱ��ʹ�ø����
		if($paramer['where']){
			$where = $paramer['where'];
		}
		//��������ֶ�
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
		//�����ֶ�Ĭ��Ϊ����ʱ��
		if($paramer['order']){
			if($paramer['order']=="last��pdate"){
				$paramer['order']="lastupdate";
			}
			$order = " ORDER BY `".$paramer['order']."`  ";
		}else{
			$order = " ORDER BY `jobtime` ";
		}
		//������� Ĭ��Ϊ����
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
		//���û�Ա�ȼ�
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
		//��Ӧ����
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
		//�Ƿ���Ҫ��ѯ��Ӧְλ
		if($paramer['isjob']){
			//��ѯְλ
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
		//�Ƿ���Ҫ��ѯ��Ӧ��Ѷ
		if($paramer['isnews']){
			//��ѯ��Ѷ
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
		//�Ƿ���Ҫ��ѯ��Ӧ����չʾ
		if($paramer['isshow']){
			//��ѯ����չʾ
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
		//��ҵ��ҳ �Ƿ��ע  201305_gl
		if($paramer['firm']){
			if($_COOKIE[uid]){$atnlist = $db->select_all("atn","`uid`='$_COOKIE[uid]'");}
			if(is_array($com)){
				foreach($com as $key=>$value){
					if(!empty($atnlist)){
						foreach($atnlist as $v){
							if($value['uid'] == $v['sc_uid']){
								$com[$key]['atn'] = "ȡ����ע";
                                $com[$key]['atnstatus'] = "1";
								break;
							}else{
								$com[$key]['atn'] = "��ע";
							}
						}
					}else{
						$com[$key]['atn'] = "��ע";
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
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/yun_seach.css" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/style/style.css" rel="stylesheet" type="text/css" />
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
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/js/public.js" language="javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/js/index.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>var weburl = "<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
";<?php echo '</script'; ?>
>
</head>
<body class="body_bg">
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/index_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
>
	$(document).ready(function(){
		$(".company_class").delegate('.firm_list','mouseover',function () {
			var aid = $(this).attr("aid");
			$("#com" + aid).show();
			$("#company" + aid).addClass('firm_list_cur');
		});
		$(".company_class").delegate('.firm_list', 'mouseout', function () {
			var aid = $(this).attr("aid");
			$("#com" + aid).hide();
			$("#company" + aid).removeClass('firm_list_cur');
		});
	})
<?php echo '</script'; ?>
>
    <!--content  start-->
    <div class="clear">
        <div class="yun_content">
            <div class="current_Location  png"> ����ǰ��λ�ã�<a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
</a> > <a href="<?php echo smarty_function_url(array('m'=>'company'),$_smarty_tpl);?>
">����ҵ</a> </div>
            <div class="clear"></div>
            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/firm_search.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <div class="firm_right">
              <div class="firm_search_box">
                        <form method="get" name="myform" onsubmit="return search_keyword(this,'������ؼ���');" action="<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_companydir']) {?>index.php<?php } else {
echo smarty_function_url(array('m'=>'company'),$_smarty_tpl);
}?>"> 
							<?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_companydir']) {?>
                            	<input type="hidden" value="company" name="m" />
                            <?php }?>
                            <?php if ($_GET['rec']=='1') {?>
                          		<input type="hidden" value="1" name="rec" />
                            <?php }?>
                            <input class="firm_search_text" id="ipt" type="text" value="<?php if ($_smarty_tpl->tpl_vars['getinfo']->value['keyword']!=" =") {
echo $_smarty_tpl->tpl_vars['getinfo']->value['keyword'];
} else { ?>������ؼ���<?php }?>" name="keyword" onclick="if(this.value=='������ؼ���'){this.value=''}" onblur="if(this.value==''){this.value='������ؼ���'}" />
                            <span class="firm_search_text_city">  <input class="firm_search_text_city_but" type="button" id="city" placeholder='��ѡ�����' value="��ѡ�����" onclick="index_city(1, '#city', '#cityid', null, null, null, 3);" /></span>
                            <input type="hidden" name="cityid" id="cityid" />
                            <input class="firm_search_submit yun_bg_color" type="submit" value="���� " />
                        </form>
                    </div>
            <?php if ($_smarty_tpl->tpl_vars['comkeyword']->value) {?>
               <div class="firm_hot-tags">
                        ����������
                        <?php  $_smarty_tpl->tpl_vars['keylist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['keylist']->_loop = false;
global $config;eval('$paramer=array("limit"=>"12","type"=>"4","recom"=>"1","item"=>"\'keylist\'","nocache"=>"")
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
?> 
                        <a href="<?php echo smarty_function_listurl(array('m'=>'company','type'=>'keyword','v'=>$_smarty_tpl->tpl_vars['keylist']->value['key_title']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['keylist']->value['key_name'];?>
</a> 
                        <?php } ?>
                    </div>
              <?php } else { ?>
 <div class="firm_hot-tags">&nbsp;</div>
<?php }?> 
            <div class="firm_right_box">
				<div class="firm_title">
				<ul class="firm_title_list">
				<li <?php if ($_GET['rec']=='') {?>class="firm_title_list_cur"<?php }?>><a href="<?php echo smarty_function_url(array('m'=>'company'),$_smarty_tpl);?>
">��ҵ�б�</a><i class="firm_title_list_bg yun_bg_color"></i></li>            
				<li <?php if ($_GET['rec']=='1') {?>class="firm_title_list_cur"<?php }?>><a href="<?php echo smarty_function_listurl(array('m'=>'company','type'=>'rec','v'=>1),$_smarty_tpl);?>
">������Ƹ</a><i class="firm_title_list_new"></i><i class="firm_title_list_bg yun_bg_color"></i></li>
				</ul> 
				</div>
                <div class="firm_list_content">
                  <div class="firm_list_content_box">
                    <?php  $_smarty_tpl->tpl_vars['lists'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lists']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$lists = $lists; if (!is_array($lists) && !is_object($lists)) { settype($lists, 'array');}
foreach ($lists as $_smarty_tpl->tpl_vars['lists']->key => $_smarty_tpl->tpl_vars['lists']->value) {
$_smarty_tpl->tpl_vars['lists']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['lists']->key;
?>
                    <div class="firm_list <?php if ($_smarty_tpl->tpl_vars['key']->value%2==0) {?>firm_list_02<?php }?>" id="company<?php echo $_smarty_tpl->tpl_vars['lists']->value['uid'];?>
" aid="<?php echo $_smarty_tpl->tpl_vars['lists']->value['uid'];?>
">
                        <div class="firm_det">
                          <div class="firm_name">
                            <span style="padding-left:20px;">  <a href='<?php echo $_smarty_tpl->tpl_vars['lists']->value['com_url'];?>
' target="_blank" class="firm_name_a"><?php echo mb_substr($_smarty_tpl->tpl_vars['lists']->value['name'],0,25,'gbk');?>
</a>
                              <?php if ($_smarty_tpl->tpl_vars['lists']->value['rec']) {?><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/firm_icon.png"><?php }?>
                               <?php if ($_smarty_tpl->tpl_vars['lists']->value['ratlogo']!='') {?>
                               <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['lists']->value['ratlogo'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['lists']->value['ratname'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['lists']->value['ratname'];?>
" width="16" height="16" />
                               <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['lists']->value['yyzz_status']=='1') {?> 
                               <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/disc_icon10.png" title="Ӫҵִ�������" class="png"> <?php }?>
</span>
                              </div>   
                           <div class="firm_list_leftsidebar">
                            <div class="firm_list_logo"><a href='<?php echo $_smarty_tpl->tpl_vars['lists']->value['com_url'];?>
'><img src="<?php echo $_smarty_tpl->tpl_vars['lists']->value['logo'];?>
" width="148" height="60" alt="<?php echo $_smarty_tpl->tpl_vars['lists']->value['name'];?>
" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_unit_icon'];?>
',2);" /></a></div>
                               <div class="firm_list_right">
                            <?php if ($_smarty_tpl->tpl_vars['usertype']->value==1) {?>
                                <a href="javascript:void(0);" id="atn_<?php echo $_smarty_tpl->tpl_vars['lists']->value['uid'];?>
" onclick="atn('<?php echo $_smarty_tpl->tpl_vars['lists']->value['uid'];?>
','<?php echo smarty_function_url(array('m'=>'ajax','c'=>'atn_company'),$_smarty_tpl);?>
');" 
								<?php if ($_smarty_tpl->tpl_vars['lists']->value['atn']=="��ע") {?>
								class="crop-add-yb"
								<?php } else { ?>
								class="crop-add-yb company_att"
								<?php }?>
								><?php echo $_smarty_tpl->tpl_vars['lists']->value['atn'];?>
</a> 
                            <?php } else { ?>
          						<?php if ($_smarty_tpl->tpl_vars['uid']->value) {?>
                                <a href="javascript:void(0);" onclick="layer.msg('ֻ�и����û����ܹ�ע', 2, 8)" class="crop-add-yb">��ע</a> 
                                <?php } else { ?>
                                <a href="javascript:void(0);"  onclick="showlogin('1');" class="crop-add-yb">��ע</a> 
                                <?php }?>
                            <?php }?>   
                                <span class="crop-add-yb_span">
                                    <label><i id="antnum<?php echo $_smarty_tpl->tpl_vars['lists']->value['uid'];?>
"  class="crop-add-yb_i"><?php echo $_smarty_tpl->tpl_vars['lists']->value['ant_num'];?>
</i>���ѹ�ע </label>
                                </span>
                            </div>
                           </div> 
                            <div class="firm_list_rightsidebar">
                              <div class="firm_qy_list"> 
                                 <span class="firm_qy_list_s"><?php if ($_smarty_tpl->tpl_vars['lists']->value['job_hy']) {?>��ҵ��<?php echo mb_substr($_smarty_tpl->tpl_vars['lists']->value['job_hy'],0,12,'gbk');
}?></span>
                                 <span class="firm_qy_list_s"><?php if ($_smarty_tpl->tpl_vars['lists']->value['job_pr']) {?>���ʣ�<?php echo $_smarty_tpl->tpl_vars['lists']->value['job_pr'];
}?></span> 
                                  <span class="firm_qy_list_s"><?php if ($_smarty_tpl->tpl_vars['lists']->value['job_mun']) {?>��ģ��<?php echo $_smarty_tpl->tpl_vars['lists']->value['job_mun'];
}?></span>
                                  <span class="firm_qy_list_s"><?php if ($_smarty_tpl->tpl_vars['lists']->value['job_city_one']) {?>���ڵأ�<?php echo $_smarty_tpl->tpl_vars['lists']->value['job_city_one'];?>
-<?php echo $_smarty_tpl->tpl_vars['lists']->value['job_city_two'];
}?></span> 
                                 </div>
                           </div> 
                            <div class="firm_qy_job_list">
                                 <div class="firm_qy_job_list_name">��Ƹְλ��</div>
                                  <div class="firm_qy_job_list_r">
                                     <?php if ($_smarty_tpl->tpl_vars['lists']->value['jobnum']>0) {?>
                                            <div class="firm_qy_job_list_r_l">
<?php  $_smarty_tpl->tpl_vars['job'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['job']->_loop = false;
 $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lists']->value['joblist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['job']->key => $_smarty_tpl->tpl_vars['job']->value) {
$_smarty_tpl->tpl_vars['job']->_loop = true;
 $_smarty_tpl->tpl_vars['v']->value = $_smarty_tpl->tpl_vars['job']->key;
if ($_smarty_tpl->tpl_vars['v']->value<3) {?>
                                             <a href="<?php echo smarty_function_url(array('m'=>'job','c'=>'comapply','id'=>$_smarty_tpl->tpl_vars['job']->value['id']),$_smarty_tpl);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['job']->value['name'];?>
</a>
                                            <?php }?>
                                              <?php } ?> 
                                             </div>
                       <a  href='<?php echo $_smarty_tpl->tpl_vars['lists']->value['com_url'];?>
' target="_blank" class="firm_list_cur_right_p_r yun_text_color">����>></a>  
                                            <?php } else { ?>
                                            <div class="firm_qy_job_list_r_l">������Ƹְλ</div>
                                            <?php }?>
                                  </div>
                                </div>                        
                        </div>
                    </div>
                    <?php } ?>
                    <div class="clear"></div>
                    <div class="pages"> <?php echo $_smarty_tpl->tpl_vars['pagenav']->value;?>
</div>
                    <?php if (!$_smarty_tpl->tpl_vars['lists']->value) {?>
                    <!-- δ������-->
                    <div class="seachno" style="background:#FFF; width:588px; margin-top:15px;border:none;">
                        <div class="seachno_left"><img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/search-no.gif" /></div>
                        <div class="listno-content">
                            <strong>�ܱ�Ǹ��û���ҵ�������������ҵ</strong><br />
                            <span>
                                ��������<br />
                                1���ʵ�������ѡ�������<br />
                                2���ʵ�ɾ������������ؼ���<br />
                            </span> <span>
                                ���Źؼ��֣�<br />
                                <?php  $_smarty_tpl->tpl_vars['top_key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['top_key']->_loop = false;
global $config;eval('$paramer=array("limit"=>"6","recom"=>"1","type"=>"4","item"=>"\'top_key\'","nocache"=>"")
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
?> <a href="<?php echo smarty_function_listurl(array('m'=>'company','type'=>'keyword','v'=>$_smarty_tpl->tpl_vars['top_key']->value['key_title']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['top_key']->value['key_name'];?>
</a> <?php } ?>
                            </span>
                        </div>
                    </div>
                    <?php }?>
                </div>  </div>
            </div>
        </div>
        <div class="yun_content">
            <div class="recomme_det">
                <h3 class="">�Ƽ���ҵ</h3>
                <div class="co_recom">
                    <ul>
                        <?php  $_smarty_tpl->tpl_vars['com'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['com']->_loop = false;
$com = $com; if (!is_array($com) && !is_object($com)) { settype($com, 'array');}
foreach ($com as $_smarty_tpl->tpl_vars['com']->key => $_smarty_tpl->tpl_vars['com']->value) {
$_smarty_tpl->tpl_vars['com']->_loop = true;
?>
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['com']->value['com_url'];?>
" target="_blank">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['com']->value['logo'];?>
" onerror="showImgDelay(this,'<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_unit_icon'];?>
',2);" />
                                <p><?php echo mb_substr($_smarty_tpl->tpl_vars['com']->value['name'],0,13,'gbk');?>
</p>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <!--content  end-->		
		</div>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplstyle']->value)."/public_search/login.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
</body>
</html><?php }} ?>
