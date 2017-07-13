<?php
/*
* $Author ��PHPYUN�����Ŷ�
*
* ����: http://www.phpyun.com
*
* ��Ȩ���� 2009-2016 ��Ǩ�γ���Ϣ�������޹�˾������������Ȩ����
*
* ����������δ����Ȩǰ���£�����������ҵ��Ӫ�����ο����Լ��κ���ʽ���ٴη�����
*/
class com_pl_controller extends common
{
	function set_search(){
		$ad_time=array('1'=>'����','3'=>'�������','7'=>'�������','15'=>'�������','30'=>'���һ����');
		$search_list[]=array("param"=>"end","name"=>'����ʱ��',"value"=>$ad_time);
		$a_time=array('1'=>'����','3'=>'�������','7'=>'�������','15'=>'�������','30'=>'���һ����');
		$search_list[]=array("param"=>"r_time","name"=>'�ظ�ʱ��',"value"=>$a_time);
		$this->yunset("search_list",$search_list);
	}
	function index_action()
	{
		$where=1;
		$this->set_search();
		$keyword=trim($_GET['keyword']);
		$_GET['end']=(int)$_GET['end'];
		if($_GET['end']){
			if($_GET['end']=='1'){
				$where.=" and `ctime` >= '".strtotime(date("Y-m-d 00:00:00"))."'";
			}else{
				$where.=" and `ctime` >= '".strtotime('-'.(int)$_GET['end'].'day')."'";
			}
			$urlarr['end']=$_GET['end'];
		}
		if($_GET['r_time']){
			if($_GET['r_time']=='1'){
				$where.=" and `reply_time` >= '".strtotime(date("Y-m-d 00:00:00"))."'";
			}else{
				$where.=" and `reply_time` >= '".strtotime('-'.(int)$_GET['r_time'].'day')."'";
			}
			$urlarr['r_time']=$_GET['r_time'];
		}
		if($keyword)
		{
			if($_GET['type']=="1")
			{
				$member=$this->obj->DB_select_all("member","`username` LIKE '%".$_GET['keyword']."%'","`uid`,`username`"); 
				foreach($member as $v){
					$userid[]=$v['uid'];
				} 
				$where.=" and `uid` in (".@implode(",",$userid).")";
			}elseif($_GET['type']=="2"){
				$company=$this->obj->DB_select_all("company","`name` LIKE '%".$keyword."%'","uid,`name`");
				foreach($company as $v)
				{
					$comid[]=$v['uid'];
				}
				$where.=" and `cuid` in (".@implode(",",$comid).")"; 
			}elseif ($_GET['type']=="3"){
				$where.=" and `content` LIKE '%".$keyword."%'";
			}elseif ($_GET['type']=="4"){
			    $where.=" and `reply` LIKE '%".$keyword."%'";
			}
			$urlarr['type']=$_GET['type'];
			$urlarr['keyword']=$keyword;
		}
		if($_GET['order'])
		{
			$order=$_GET['order'];
		}else{
			$order="desc";
		}
		$urlarr['page']="{{page}}";
		$urlarr=Url($_GET['m'],$urlarr,'admin');
		$mes_list = $this->get_page("company_msg",$where." ORDER BY `id` $order",$urlarr,$this->config['sy_listnum']);
		if(is_array($mes_list)){
			$uid=$cuid=array();
			foreach($mes_list as $v){
				if(in_array($v['uid'],$uid)==false){$uid[]=$v['uid'];}
				if(in_array($v['cuid'],$cuid)==false){$cuid[]=$v['cuid'];} 
			}
			if(count($member)==false){
				$member=$this->obj->DB_select_all("member","`uid` in (".@implode(",",$uid).")","`uid`,`username`");
			} 
			if(count($company)==false){
				$company=$this->obj->DB_select_all("company","`uid` in (".@implode(",",$cuid).")","`uid`,`name`");
			}
			foreach($mes_list as $k=>$v){
				$mes_list[$k]['content'] = str_replace('"',"",$v['content']);
				$mes_list[$k]['reply'] = str_replace('"',"",$v['reply']);
				foreach($member as $val){
					if($v['uid']==$val['uid'])
					{
						$mes_list[$k]['username']=$val['username'];
					}
				}
				foreach($company as $val)
				{
					if($v['cuid']==$val['uid'])
					{
						$mes_list[$k]['com_name']=$val['name'];
					}
				}
			}
		}
		$this->yunset("get_type", $_GET);
		$this->yunset("mes_list",$mes_list);
		$this->yuntpl(array('admin/admin_compl'));
	}
	function del_action(){
	    if($_POST['del']){
	    	$del=$_POST['del'];
	    	if($del){
	    		if(@is_array($del)){
					$del=@implode(',',$del);
		    	}
		    	$this->obj->DB_delete_all("company_msg","`id` in (".$del.")","");
	    		$this->layer_msg( "����(ID:".$del.")ɾ���ɹ���",9,1,$_SERVER['HTTP_REFERER']);
	    	}else{
				$this->layer_msg( "��ѡ����Ҫɾ������Ϣ��",8,1,$_SERVER['HTTP_REFERER']);
	    	}
	    }
	    if(isset($_GET['id'])){
			$this->check_token();
			$result=$this->obj->DB_delete_all("company_msg","`id`='".$_GET['id']."'" );
			isset($result)?$this->layer_msg('����(ID:'.$_GET['id'].')ɾ���ɹ���',9):$this->layer_msg('ɾ��ʧ�ܣ�',8);
		}else{
			$this->layer_msg('�Ƿ�������',3);
		}
	}
}
?>