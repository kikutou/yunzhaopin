<?php
/*
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
		
		$M=$this->MODEL('weixin');
		if($_GET["echostr"])
		{
			$M->valid($_GET['echostr'],$_GET['signature'],$_GET['timestamp'],$_GET['nonce']);

		}else{
			if(!$M->checkSignature($_GET['signature'],$_GET['timestamp'],$_GET['nonce'])){echo "非法来源地址！";exit();};

			$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
			if (!empty($postStr))
			{
			  $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);  
			  $fromUsername = $postObj->FromUserName;
			  $toUsername = $postObj->ToUserName;
			  $keyword = trim($postObj->Content);
			  $times = time();
			  $MsgType = $postObj->MsgType;
			 
			  $topTpl = "<xml>
				   <ToUserName><![CDATA[%s]]></ToUserName>
				   <FromUserName><![CDATA[%s]]></FromUserName>
				   <CreateTime>%s</CreateTime>
				   <MsgType><![CDATA[%s]]></MsgType>
				   ";
			   
			  $bottomStr = "<FuncFlag>0</FuncFlag></xml>";
			  
			  if($MsgType=='event')
			  {
				$MsgEvent = $postObj->Event;
				if ($MsgEvent=='CLICK')
				{
					$EventKey = $postObj->EventKey;
					if($EventKey=='我的帐号'){
						$Return = $M->bindUser($fromUsername);
						
					}elseif($EventKey=='我的消息')
					{
						$Return = $M->myMsg($fromUsername);
					}elseif($EventKey=='面试邀请')
					{
						$Return = $M->Audition($fromUsername);

					}elseif($EventKey=='简历浏览')
					{
						$Return = $M->lookResume($fromUsername);

					}elseif($EventKey=='刷新简历')
					{
						$Return = $M->refResume($fromUsername);

					}elseif($EventKey=='推荐职位')
					{
						$Return = $M->recJob($fromUsername);

					}elseif($EventKey=='刷新职位')
					{
						$Return = $M->refJob($fromUsername);

					}elseif($EventKey=='职位浏览')
					{
						$Return = $M->lookJob($fromUsername);

					}elseif($EventKey=='简历投递')
					{
						$Return = $M->ApplyJob($fromUsername);

					}elseif($EventKey=='兼职报名')
					{
						$Return = $M->PartApply($fromUsername);

					}elseif($EventKey=='职位搜索'){
						
						if($this->config['wx_search'])
						{
							$Return['centerStr'] = "<Content><![CDATA[".iconv('gbk','utf-8',$this->config['wx_search'])."]]></Content>";
						}else{
							$Return['centerStr'] = "<Content><![CDATA[直接回复城市、职位、公司名称等关键字搜索您需要的职位信息。\n 如：【经理】、【xx公司】]]></Content>";
						}
						$Return['MsgType'] = 'text';

					}elseif($EventKey=='周边职位'){
						
						$Return['centerStr'] = "<Content><![CDATA[/可怜 亲，把您的位置先发我一下。\n\n方法：点屏幕左下角输入框旁的“+”，选择“位置”，点“发送”。]]></Content>";
						$Return['MsgType'] = 'text';
					}
					$centerStr		= $Return['centerStr'];
					$this->MsgType  = $Return['MsgType'];
				}
			  }elseif($MsgType=='location'){
					 $latitude = $postObj->Location_X;
					 $longitude = $postObj->Location_Y;
					 $url = "http://api.map.baidu.com/geocoder/v2/?ak=42966293429086ba859198a2a69bedad&callback=renderReverse&location=". $latitude.",".$longitude."&output=json";
					 $mapinfo = file_get_contents($url);
					 $mapinfo = str_replace(array('renderReverse&&renderReverse(',')'),'',$mapinfo);
				     $map_info = json_decode($mapinfo,true);
					
					 if($map_info['result']['addressComponent']['district'])
					 {
						$Return = $M->searchJob($map_info['result']['addressComponent']['district'],1);
						$centerStr		= $Return['centerStr'];
						$this->MsgType  = $Return['MsgType'];
					 }
			  
			  }elseif($MsgType=='text'){
				if($keyword){
					
					$Return = $M->searchJob($keyword);
					$centerStr		= $Return['centerStr'];
					$this->MsgType  = $Return['MsgType'];
				}
			  }
			 
			  $topStr = sprintf($topTpl, $fromUsername, $toUsername, $times, $this->MsgType);
			  echo $topStr.$centerStr.$bottomStr;
			}
		}
	}
	
	function share_action(){
		require_once("WeixinJs.class.php");
		$url = $_GET['url'];
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? 'https://' : 'http://';
		$pre_url = $protocol . $_SERVER['HTTP_HOST'];
		if (strpos($url, $pre_url) !== 0) {
			die("url error!");
		}
		$weixinJs = new WeixinJs($this->config['wx_appid'],$this->config['wx_appsecret'],$url);
		$signPackage = $weixinJs->GetSignPackage();
		$appId = $signPackage['appId'];
		$timestamp = $signPackage['timestamp'];
		$nonceStr = $signPackage['nonceStr'];
		$signature = $signPackage['signature'];
		echo json_encode(array('appid'=>$appId,'timestamp' => $timestamp, 'noncestr' => $nonceStr, 'signature' => $signature));
	}

}
?>