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
class forgetpw_controller extends common{
	function index_action(){
		$this->get_moblie();
		$this->yunset("headertitle","找回密码");
		$this->seo("forgetpw");
		$this->yuntpl(array('wap/forgetpw'));
	}
	function half_replace($str,$encoding='utf-8'){
        if(strtolower($encoding)=='gbk'){
            $length=mb_strlen($str,'utf-8');
            $len = ceil(mb_strlen($str,'utf-8')/4);
            $start=mb_substr($str,0,$len,'utf-8');
            if($len<$length-$len){
                $end=mb_substr($str,$length-$len,$len,'utf-8');
            }

            $str=$start.'***'.$end;
		    return $str;
        }else{
		    $len = strlen($str)/2;
		    return substr_replace($str,str_repeat('*',$len),ceil(($len)/2),$len);
        }
	}
	function checkuser_action(){
		$username=yun_iconv("utf-8","gbk",$_POST['username']);
		if(!$this->CheckRegUser($username)&&!$this->CheckRegEmail($username)){
			$res['msg']=iconv("gbk","utf-8","用户名不符合规范！");
			$res['type']='8';
			echo json_encode($res);die;
		}
		session_start();
		if(md5($_POST['authcode'])!=$_SESSION['authcode'] || empty($_SESSION['authcode'])){
			$res['msg']=iconv("gbk","utf-8","验证码错误！");
			$res['type']='8';
			echo json_encode($res);die;
		}
		$M=$this->MODEL("userinfo");
		$where=array("`username`='".$username."' or `email`='".$username."' or `moblie`='".$username."'");
		$info=$M->GetMemberOne($where,array("field"=>"`uid`,`username`,`email`,`moblie`"));
 		if(is_array($info)){
 			if($info['email']=="" && $info['moblie']==""){
				$res['msg']=iconv("gbk","utf-8","您的账号没有邮箱和手机，请联系管理员！");
				$res['type']='8';
				echo json_encode($res);die;
 			}else{
				$res['msg']='';
				$res['type']='1';
				$res['uid']=$info['uid'];
				$res['username']=$this->half_replace(yun_iconv("gbk","utf-8",$info['username']),'GBK');
				$res['email']=$this->half_replace($info['email']);
				$res['moblie']=$this->half_replace($info['moblie']);
				echo json_encode($res);die;
 			}
		}else{
			$res['type']='2';
			echo json_encode($res);die;
		}
	}
	function send_action(){
		$username=yun_iconv("utf-8","gbk",$_POST['username']);
		if(!$this->CheckRegUser($username)&&!$this->CheckRegEmail($username)){
			$res['msg']=yun_iconv("gbk","utf-8","用户名不符合规范！");
			$res['type']='8';
			echo json_encode($res);die;
		}
		$M=$this->MODEL("userinfo");
		$where=array("`username`='".$username."' or `email`='".$username."' or `moblie`='".$username."'");
		$info=$M->GetMemberOne($where,array("field"=>"`uid`,`username`,`email`,`moblie`,`did`"));

        if($info['uid']){
			
			
			$sendcode = rand(100000,999999);
            if($_POST['sendtype']=='email'){
                if(!($this->config['sy_smtpserver']!="" && $this->config['sy_smtpemail']!="" && $this->config['sy_smtpuser']!="")){
                    $res['msg']=yun_iconv("gbk","utf-8","还没有配置邮箱，请联系管理员！");
	                $res['type']='8';
	                echo json_encode($res);die;
                }elseif($this->config['sy_email_getpass']=="2"){
                	$res['msg']=yun_iconv("gbk","utf-8","网站未开启邮件找回密码！");
	                $res['type']='8';
	                echo json_encode($res);die;
                }
            }else{
                if(!$this->config["sy_msguser"] || !$this->config["sy_msgpw"] || !$this->config["sy_msgkey"]||$this->config['sy_msg_isopen']!='1'){
                    $res['msg']=yun_iconv("gbk","utf-8","还没有配置短信，请联系管理员！");
	                $res['type']='8';
	                echo json_encode($res);die;
                }elseif($this->config['sy_msg_getpass']=="2"){
                    $res['msg']=yun_iconv("gbk","utf-8","网站未开启短信找回密码！");
	                $res['type']='8';
	                echo json_encode($res);die;
                }
            }
			$fdata=$this->forsend(array('uid'=>$info['uid'],'usertype'=>$info['usertype']));
			$data['uid']=$info['uid'];
            $data['username']=$info['username'];
			$data['name']=$fdata['name'];
			$data['type']="getpass";
            if($_POST['sendtype']=='email'){
                $data['email']=$info['email'];
            }else{
                $data['moblie']=$info['moblie'];
            }
			$data['sendcode']=$sendcode;
			$data['date']=date("Y-m-d");
			$status=$this->send_msg_email($data);
			if($_POST['sendtype']=='email'){
				$check=$info['email'];
			}else{
				$check=$info['moblie'];
			}
            $cert=$M->GetCompanyCert(array("uid"=>$info['uid'],"type"=>"5","check"=>$check),array("field"=>"`uid`,`check2`,`ctime`,`id`"));
            if($cert){
                $M->UpdateCompanyCert(array("check2"=>$sendcode,"ctime"=>time()),array("id"=>$cert['id']));
            }else{
                $M->AddCompanyCert(array('type'=>'5','status'=>0,'uid'=>$info['uid'],'check2'=>$sendcode,'check'=>$check,'ctime'=>time(),'did'=>$info['did']));
            }
			if($_POST['sendtype']=='email'){
				$res['msg']=iconv("gbk","utf-8",'验证码邮件发送成功！');
			}else{
				$res['msg']=iconv("gbk","utf-8",'验证码短信'.$status);
				if($status!="发送成功!"){
					$res['type']='8';
					echo json_encode($res);die;
				}
			}
			$res['type']='1';
			$res['uid']=$info['uid'];
			$res['username']=$this->half_replace(yun_iconv("gbk","utf-8",$info['username']),'GBK');
			$res['email']=$this->half_replace($info['email']);
			$res['moblie']=$this->half_replace($info['moblie']);
			echo json_encode($res);die;
        }else{
            $res['type']='2';
			echo json_encode($res);die;
        }
	}
	function checksendcode_action(){
		$username=yun_iconv("utf-8","gbk",$_POST['username']);
		if(!$this->CheckRegUser($username)&&!$this->CheckRegEmail($username)){
            $res['msg']=yun_iconv("gbk","utf-8","用户名不符合规范！");
            $res['type']='8';
            echo json_encode($res);die;
		}
		$M=$this->MODEL("userinfo");
		$where=array("`username`='".$username."' or `email`='".$username."' or `moblie`='".$username."'");
		$info = $M->GetMemberOne($where,array("field"=>"`uid`,`username`,`email`,`moblie`"));
		if($_POST['sendtype']=='email'){
			$check=$info['email'];
		}else{
			$check=$info['moblie'];
		}
		$cert = $M->GetCompanyCert(array("uid"=>$info['uid'],"type"=>"5","check"=>$check),array("field"=>"`uid`,`check2`,`ctime`,`id`"));
        if(($_POST['code']!=$cert['check2'])||(!$cert)){
			$res['msg']=iconv("gbk","utf-8","验证码错误");
			$res['type']='8';
			echo json_encode($res);die;
		}
		if(is_array($info)){
			$res['msg']=yun_iconv("gbk","utf-8","验证码正确！");
			$res['type']='1';
			$res['uid']=$info['uid'];
			$res['username']=$this->half_replace(yun_iconv("gbk","utf-8",$info['username']),'GBK');
			$res['email']=$this->half_replace($info['email']);
			$res['moblie']=$this->half_replace($info['moblie']);
			echo json_encode($res);die;
		}else{
			$res['type']='2';
			echo json_encode($res);die;
		}
	}
	function editpw_action(){
        $username=yun_iconv("utf-8","gbk",$_POST['username']);
		if(!$this->CheckRegUser($username)&&!$this->CheckRegEmail($username)){
            $res['msg']=yun_iconv("gbk","utf-8","用户名不符合规范！");
            $res['type']='8';
            echo json_encode($res);die;
		}
		$M=$this->MODEL("userinfo");
		$where=array("`username`='".$username."' or `email`='".$username."' or `moblie`='".$username."'");
		$info = $M->GetMemberOne($where,array("field"=>"`uid`,`username`,`email`,`moblie`"));
		if($_POST['sendtype']=='email'){
			$check=$info['email'];
		}else{
			$check=$info['moblie'];
		}
		$cert = $M->GetCompanyCert(array("uid"=>$info['uid'],"type"=>"5","check"=>$check),array("field"=>"`uid`,`check2`,`ctime`,`id`"));
        if($_POST['code']!=$cert['check2']){
			$res['msg']=yun_iconv("gbk","utf-8","验证码错误");
			$res['type']='8';
			echo json_encode($res);die;
		}
        if(!$_POST['password']){
			$res['msg']=yun_iconv("gbk","utf-8","请完整填写信息！");
			$res['type']='8';
			echo json_encode($res);die;
		}
        $password = $_POST['password'];
        if(is_array($info))
        {
            if($this->config[sy_uc_type]=="uc_center" && $info['name_repeat']!="1")
            {
                $this->uc_open();
                uc_user_edit($info[username], "", $password, $info['email'],"0");
            }else{
                $salt = substr(uniqid(rand()), -6);
                $pass2 = md5(md5($password).$salt);
                $M->UpdateMember(array("password"=>$pass2,"salt"=>$salt),array("uid"=>$cert['uid']));
            }
            $res['msg']=yun_iconv("gbk","utf-8",'密码修改成功！');
            $res['type']='1';
            $res['uid']=$info['uid'];
            $res['username']=$this->half_replace(yun_iconv("gbk","utf-8",$info['username']),'GBK');
            $res['email']=$this->half_replace($info['email']);
            $res['moblie']=$this->half_replace($info['moblie']);
            echo json_encode($res);die;
        }else{
            $res['msg']=yun_iconv("gbk","utf-8","对不起！没有该用户！");
            $res['type']='8';
            echo json_encode($res);die;
        }
    }
}
?>