<?php
/* *
* $Author ��PHPYUN�����Ŷ�
*
* ����: http://www.phpyun.com
*
* ��Ȩ���� 2009-2016 ��Ǩ�γ���Ϣ�������޹�˾������������Ȩ����
*
* ����������δ����Ȩǰ���£�����������ҵ��Ӫ�����ο����Լ��κ���ʽ���ٴη�����
*/
class index_controller extends company{
	function index_action(){
		include(CONFIG_PATH."db.data.php");
		$this->yunset("arr_data",$arr_data);
		$statis=$this->company_satic();
		$invite_resume=$this->obj->DB_select_num("userid_msg","`fid`='".$this->uid."'");
		$down_resume=$this->obj->DB_select_num("down_resume","`comid`='".$this->uid."'");
		$de_resume=$this->obj->DB_select_num("userid_job","`com_id`='".$this->uid."' and `is_browse`='1'");
        $this->yunset("de_resume",$de_resume);
		$des_resume=$this->obj->DB_select_num("userid_job","`com_id`='".$this->uid."'");
        $this->yunset("des_resume",$des_resume);
		$this->yunset("invite_resume",$invite_resume);
		$this->yunset("down_resume",$down_resume);
		$company=$this->obj->DB_select_once("company","`uid`='".$this->uid."'");
		$member=$this->obj->DB_select_once("member","`uid`='".$this->uid."'","`login_date`");
		$jobwhere="`edate`>'".time()."' and `state`=1 and `r_status`<>2 and `status`<>1 and `uid`='".$this->uid."'";
		$joblist=$this->obj->DB_select_all("company_job",$jobwhere,"`job1_son`,`job_post`,`cityid`");
		$blacklist=$this->obj->DB_select_all("blacklist","`p_uid`='".$this->uid."'","`c_uid`");
		if(is_array($joblist)){
			foreach($joblist as $v){
				$where[]="`cityid`='".$v['cityid']."' AND (FIND_IN_SET('".$v['job1_son']."',job_classid) or FIND_IN_SET('".$v['job_post']."',job_classid))";
			}
		}
		if(is_array($blacklist)){
			foreach($blacklist as $v){
				$bids[]=$v['c_uid'];
			}
		}
		if(is_array($where)){
			$_GET['userwhere']="`uname`<>'' and status<>'2' and `r_status`<>'2' and `job_classid`<>'' and `open`='1' and `defaults`=1 and `uid` not in(".@implode(",",$bids).") and (".@implode(" or ",$where).")";
		}else{
			$_GET['userwhere']="`uname`<>'' and status<>'2' and `r_status`<>'2' and `job_classid`<>'' and `open`='1' and `defaults`=1 and `uid` not in(".@implode(",",$bids).")";
		}
		if($statis['rating']>0){
			$company_rating=$this->obj->DB_select_once("company_rating","`id`='".$statis['rating']."'");
			if($statis['vip_etime']>time()){
				$days=round(($statis['vip_etime']-mktime())/3600/24) ;
				$this->yunset("days",$days);
			}
			$this->yunset("company_rating",$company_rating);
		}
		$_GET['cityid']=$company['cityid'];
		$_GET['hy']=$company['hy'];
		$atn=$this->obj->DB_select_all("atn","`sc_uid`='".$this->uid."' and `usertype`='1' order by `id` desc");
		$normal_job_num=$this->obj->DB_select_num("company_job","`uid`='".$this->uid."' and `state`='1' and `edate`>'".time()."'");
		$statis['integral']=number_format($statis['integral']);
 		$this->yunset("statis",$statis);
 		$this->yunset("member",$member);
		$this->yunset("uid",$this->uid);
		$this->yunset("normal_job_num",$normal_job_num);
		$this->yunset("company",$company);
		$this->public_action();
		$this->yunset("js_def",1);
		$this->com_tpl('index');
	}
}
?>