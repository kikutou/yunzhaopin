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
class zph_controller extends common{  
	function zph_tpl($tpl){
		$this->yuntpl(array($this->config['style'].'/zph/'.$tpl));
	}
	function Zphpublic_action(){
		if($this->config['sy_zph_web']=="2"){
			header("location:".Url('error'));
		}
	}
}
?>