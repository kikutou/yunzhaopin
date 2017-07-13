<?php
/* *
* $Author ：PHPYUN开发团队
*
* 官网: http://www.phpyun.com
*
* 版权所有 2009-2016 宿迁鑫潮信息技术有限公司，并保留所有权利。
*
* 软件声明：未经授权前提下，不得用于商业运营、二次开发以及任何形式的再次发布。
*/
class index_controller extends common{
	function index_action(){
		if($this->uid==""){
			$this->ACT_msg($this->config['sy_weburl'], "您还没有登录，请先登录！");
		}
		if($_POST['submit']){
			$_POST['email']=trim($_POST['email']);
			if($this->config["sy_smtpserver"]=="" || $this->config["sy_smtpemail"]=="" ||	$this->config["sy_smtpuser"]==""){
				$this->ACT_layer_msg("网站邮件服务器暂不可用！",8,$_SERVER['HTTP_REFERER']);
			}
			if($this->config['sy_smtpserver']=="" || $this->config['sy_smtpemail']=="" || $this->config['sy_smtpuser']==""){
				$this->ACT_layer_msg("还没有配置邮箱，请联系管理员！",8,$_SERVER['HTTP_REFERER']);
			}
			if($_POST['email']==""){
				$this->ACT_layer_msg("邮件不能为空！",8,$_SERVER['HTTP_REFERER']);
			} 
			if(!$this->CheckRegEmail($_POST['email'])){
				$this->ACT_layer_msg("邮件格式不正确！",8,$_SERVER['HTTP_REFERER']);
			}
			if($_POST['content']==""){
				$this->ACT_layer_msg("内容不能为空！",8,$_SERVER['HTTP_REFERER']);
			}
			$smtp=$this->email_set();
			$smtpusermail =$this->config['sy_smtpemail'];
			$sendid = $smtp->sendmail($this->config['sy_smtpnickname'],$_POST['email'],$smtpusermail,"邀请注册",$_POST['content']);
			if($sendid){
				$this->ACT_layer_msg("邀请注册邮件已发送！",9,$_SERVER['HTTP_REFERER']);
			}else{
				$this->ACT_layer_msg("邀请注册邮件发送失败！",8,$_SERVER['HTTP_REFERER']);
			}
		}
		$this->seo("invitereg");
		$this->yun_tpl(array('index'));
	}
}
?>