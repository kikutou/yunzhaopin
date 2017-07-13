<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-24 16:25:01
         compiled from "/var/www/html/yunzhaopin//app/template/default/index_header.htm" */ ?>
<?php /*%%SmartyHeaderCode:760646715925435db8ffc9-79645184%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b14707869292442f8e9296ec738e1812452629c1' => 
    array (
      0 => '/var/www/html/yunzhaopin//app/template/default/index_header.htm',
      1 => 1469515250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '760646715925435db8ffc9-79645184',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'key' => 0,
    'navlist' => 0,
    'style' => 0,
    'nalist' => 0,
    'config' => 0,
    'alist' => 0,
    'nlist' => 0,
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5925435dc7dca5_55700587',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5925435dc7dca5_55700587')) {function content_5925435dc7dca5_55700587($_smarty_tpl) {?><?php if (!is_callable('smarty_function_url')) include '/var/www/html/yunzhaopin/app/include/libs/plugins/function.url.php';
?><?php $alist=array();$time=time();eval('$paramer=array("limit"=>"4","item"=>"\'alist\'","t_len"=>"15","nocache"=>"")
;');
		global $db,$db_config,$config;
		$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
		$paramer = $ParamerArr[arr];
		$Purl =  $ParamerArr[purl];
        global $ModuleName;
        if(!$Purl["m"]){
            $Purl["m"]=$ModuleName;
        }
		$where = 1;
		//分站
		if($config['did']){
			$where.=" and `did`='".$config['did']."'";
		}else if($config['sy_web_site']=="1"){
			$where.=" and `did`='0'";
		}  
		if($paramer[limit]){
			$limit=" LIMIT ".$paramer[limit];
		}else{
			$limit=" LIMIT 20";
		}
		if($paramer[ispage]){
			$limit = PageNav($paramer,$_GET,"admin_announcement",$where,$Purl,"",0,$_smarty_tpl);
		}
		//排序字段 默认按照xuanshang排序
		if($paramer[order]){
			$where.="  ORDER BY `".$paramer[order]."`";
		}else{
			$where.="  ORDER BY `datetime`";
		}
		//排序方式默认倒序
		if($paramer[sort]){
			$where.=" ".$paramer[sort];
		}else{
			$where.=" DESC";
		}

		$alist=$db->select_all("admin_announcement",$where.$limit);
		if(is_array($alist)){
			foreach($alist as $key=>$value){
				//截取标题
				if($paramer[t_len]){
					$alist[$key][title_n] = mb_substr($value['title'],0,$paramer[t_len],"GBK");
				}
				$alist[$key][time]=date("Y-m-d",$value[datetime]);
				$alist[$key][url] = Url("announcement",array("id"=>$value[id]),"1");
			}
		} ?>
<header>
  <div class="yunHeadbg yun_bg_color">
    <div class="yunHeadtop yunw1024">
      <div class="yun_Head_nav fl">
        <div class="yun_Head_nav_list fl"> 
        <?php  $_smarty_tpl->tpl_vars['navlist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['navlist']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
global $db,$db_config,$config;include(PLUS_PATH."/menu.cache.php");$Navlist=array();
		if(is_array($menu_name)){
            eval('$paramer=array("key"=>"\'key\'","item"=>"\'navlist\'","hovclass"=>"\'yun_Head_nav_cur\'","nid"=>"1","nocache"=>"")
;');
			$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
			$paramer = $ParamerArr[arr];
			$Purl =  $ParamerArr[purl];

			foreach($menu_name[12] as $key=>$val){
				
				if($val['type']=='2'){
					if($config['sy_seo_rewrite']=="1" && $val[furl]!=''){
						$menu_name[12][$key][url] = $val[furl];
					}else{
						$menu_name[12][$key][url] = $val[url];
					}
					$menu_name[12][$key][navclass] = navcalss($val,$paramer[hovclass]);
				}
			}
			foreach($menu_name[1] as $key=>$value){
				if($value[url]=="/"){

					$value[url]="";
				}
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[1][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[1][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[1][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
			foreach($menu_name[2] as $key=>$value){
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[2][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[2][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[2][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
            $isCurrentFind=false;
			foreach($menu_name[4] as $key=>$value){
				if($value['type']=='1' && $value[furl]!=''){
					if($config['sy_seo_rewrite']=="1"){
						$menu_name[4][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[4][$key][url] = $config[sy_weburl]."/".$value[url];
					}
				}
                if($isCurrentFind==false){
				    $menu_name[4][$key][navclass] = navcalss($value,$paramer[hovclass]);
                }
                if($menu_name[4][$key][navclass]){
                    $isCurrentFind=true;
                }
			}
			foreach($menu_name[5] as $key=>$value){
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[5][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[5][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[5][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
		}
		//默认调用头部导航
		if($paramer[nid]){
			$Navlist =$menu_name[$paramer[nid]];
		}else{
			$Navlist =$menu_name[1];
		}$Navlist = $Navlist; if (!is_array($Navlist) && !is_object($Navlist)) { settype($Navlist, 'array');}
foreach ($Navlist as $_smarty_tpl->tpl_vars['navlist']->key => $_smarty_tpl->tpl_vars['navlist']->value) {
$_smarty_tpl->tpl_vars['navlist']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['navlist']->key;
?>
          <?php if ($_smarty_tpl->tpl_vars['key']->value<7) {?> <span class="yun_Head_nav_s"><a href="<?php echo $_smarty_tpl->tpl_vars['navlist']->value['url'];?>
"<?php if ($_smarty_tpl->tpl_vars['navlist']->value['eject']) {?> target="_blank"<?php }?> class="png"><?php echo $_smarty_tpl->tpl_vars['navlist']->value['name'];?>
 </a>
          <?php if ($_smarty_tpl->tpl_vars['navlist']->value['model']=="new") {?>
             <div class="nav_icon nav_icon_new">  <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/new.gif"> </div>
             <?php } elseif ($_smarty_tpl->tpl_vars['navlist']->value['model']=="hot") {?> 
              <div class="nav_icon nav_icon_hot"> <img src="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/images/hotn.gif">  </div>
             <?php }?>
          </span> <?php }?>
          <?php } ?> </div>
        <div class="yunHeadnav_more fl"><a href="javascript:void(0);" class="yunHeadnav_more_s">更多<i class="yunHeadnav_more_s_icon png"></i></a>
          <div class="yunHeadnav_box none">
            <div class="yunHeadnav_b_p">
              <div class="yunHeadnav_p1"> <?php  $_smarty_tpl->tpl_vars['navlist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['navlist']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
global $db,$db_config,$config;include(PLUS_PATH."/menu.cache.php");$Navlist=array();
		if(is_array($menu_name)){
            eval('$paramer=array("key"=>"\'key\'","item"=>"\'navlist\'","hovclass"=>"\'yun_Head_nav_cur\'","nid"=>"1","nocache"=>"")
;');
			$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
			$paramer = $ParamerArr[arr];
			$Purl =  $ParamerArr[purl];

			foreach($menu_name[12] as $key=>$val){
				
				if($val['type']=='2'){
					if($config['sy_seo_rewrite']=="1" && $val[furl]!=''){
						$menu_name[12][$key][url] = $val[furl];
					}else{
						$menu_name[12][$key][url] = $val[url];
					}
					$menu_name[12][$key][navclass] = navcalss($val,$paramer[hovclass]);
				}
			}
			foreach($menu_name[1] as $key=>$value){
				if($value[url]=="/"){

					$value[url]="";
				}
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[1][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[1][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[1][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
			foreach($menu_name[2] as $key=>$value){
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[2][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[2][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[2][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
            $isCurrentFind=false;
			foreach($menu_name[4] as $key=>$value){
				if($value['type']=='1' && $value[furl]!=''){
					if($config['sy_seo_rewrite']=="1"){
						$menu_name[4][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[4][$key][url] = $config[sy_weburl]."/".$value[url];
					}
				}
                if($isCurrentFind==false){
				    $menu_name[4][$key][navclass] = navcalss($value,$paramer[hovclass]);
                }
                if($menu_name[4][$key][navclass]){
                    $isCurrentFind=true;
                }
			}
			foreach($menu_name[5] as $key=>$value){
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[5][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[5][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[5][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
		}
		//默认调用头部导航
		if($paramer[nid]){
			$Navlist =$menu_name[$paramer[nid]];
		}else{
			$Navlist =$menu_name[1];
		}$Navlist = $Navlist; if (!is_array($Navlist) && !is_object($Navlist)) { settype($Navlist, 'array');}
foreach ($Navlist as $_smarty_tpl->tpl_vars['navlist']->key => $_smarty_tpl->tpl_vars['navlist']->value) {
$_smarty_tpl->tpl_vars['navlist']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['navlist']->key;
?>
                <?php if ($_smarty_tpl->tpl_vars['key']->value>=7) {?> <span class="yunHeadnav_p1_s"><a href="<?php echo $_smarty_tpl->tpl_vars['navlist']->value['url'];?>
"<?php if ($_smarty_tpl->tpl_vars['navlist']->value['eject']) {?> target="_blank"<?php }?> class="png"><?php echo $_smarty_tpl->tpl_vars['navlist']->value['name'];?>
 </a></span> <?php }?>
                <?php } ?> </div>
              <div class="yunHeadnav_b_p_nav yun_text_color">特色服务</div>
              <?php  $_smarty_tpl->tpl_vars['nalist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nalist']->_loop = false;
global $db,$db_config,$config;include(PLUS_PATH."/menu.cache.php");$Navlist=array();
		if(is_array($menu_name)){
            eval('$paramer=array("item"=>"\'nalist\'","hovclass"=>"\'header_fixed_list_cur\'","nid"=>"5","nocache"=>"")
;');
			$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
			$paramer = $ParamerArr[arr];
			$Purl =  $ParamerArr[purl];

			foreach($menu_name[12] as $key=>$val){
				
				if($val['type']=='2'){
					if($config['sy_seo_rewrite']=="1" && $val[furl]!=''){
						$menu_name[12][$key][url] = $val[furl];
					}else{
						$menu_name[12][$key][url] = $val[url];
					}
					$menu_name[12][$key][navclass] = navcalss($val,$paramer[hovclass]);
				}
			}
			foreach($menu_name[1] as $key=>$value){
				if($value[url]=="/"){

					$value[url]="";
				}
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[1][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[1][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[1][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
			foreach($menu_name[2] as $key=>$value){
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[2][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[2][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[2][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
            $isCurrentFind=false;
			foreach($menu_name[4] as $key=>$value){
				if($value['type']=='1' && $value[furl]!=''){
					if($config['sy_seo_rewrite']=="1"){
						$menu_name[4][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[4][$key][url] = $config[sy_weburl]."/".$value[url];
					}
				}
                if($isCurrentFind==false){
				    $menu_name[4][$key][navclass] = navcalss($value,$paramer[hovclass]);
                }
                if($menu_name[4][$key][navclass]){
                    $isCurrentFind=true;
                }
			}
			foreach($menu_name[5] as $key=>$value){
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[5][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[5][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[5][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
		}
		//默认调用头部导航
		if($paramer[nid]){
			$Navlist =$menu_name[$paramer[nid]];
		}else{
			$Navlist =$menu_name[1];
		}$Navlist = $Navlist; if (!is_array($Navlist) && !is_object($Navlist)) { settype($Navlist, 'array');}
foreach ($Navlist as $_smarty_tpl->tpl_vars['nalist']->key => $_smarty_tpl->tpl_vars['nalist']->value) {
$_smarty_tpl->tpl_vars['nalist']->_loop = true;
?> <span class="yunHeadnav_p1_s"><a href="<?php echo $_smarty_tpl->tpl_vars['nalist']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['nalist']->value['name'];?>
</a></span> <?php } ?> </div>
          </div>
        </div>
      </div>
      <div class="yunuserEnterBox login_after fr"> 
        <?php echo '<script'; ?>
 language='JavaScript' src='<?php echo smarty_function_url(array('m'=>'ajax','c'=>'RedLoginHead','type'=>'index'),$_smarty_tpl);?>
'><?php echo '</script'; ?>
> 
        <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_wx_qcode']) {?>
        <div class="yuntbarWx fr"> <a href="javascript:void(0);" class="yuntbar_a yuntbarPhone_a"><i class="yuntbarPhone_icon yuntbarPhone_icon_wx png"></i>微信</a>
          <div class="yunHeadwx_box none">
            <div class="index_r_wap_box index_r_wap_box_weixin">
              <div class="yunHeadwx_box_t"><i class="yunHeadwx_box_icon png"></i></div>
              <div class="popWeixin"> <a class="close" href="javascript:void(0)">×</a>
                <dl>
                  <dt><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_wx_qcode'];?>
" height="100" width="100" /></dt>
                  <dd> 微信扫一扫<br />
                    入职更快速<br />
                    <br />
                    第一时间收到面试通知 </dd>
                </dl>
                <div class="clear"></div>
                <div class="popWeixin_sm">请用您<font color="red">本人的</font>微信号扫二维码</div>
              </div>
            </div>
          </div>
        </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['config']->value['sy_wap_qcode']) {?>
        <div class="yuntbarPhone fr"> <a href="<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_wapdomain']) {
echo $_smarty_tpl->tpl_vars['config']->value['sy_wapdomain'];
} else {
echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_wapdir'];
}?>" class="yuntbar_a  yuntbarPhone_a"><i class="yuntbarPhone_icon png"></i>手机站</a>
          <div class="yunHeadwx_box none">
            <div class="yunHeadwx_box_t"><i class="yunHeadwx_box_icon"></i></div>
            <div class="popWeixin"> <a class="close" href="javascript:void(0)">×</a>
              <dl>
                <dt><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_wap_qcode'];?>
" height="100" width="100" /></dt>
                <dd style="background:none;"> 手机扫一扫<br />
                  找工作更方便<br />
                  随时随地都能找工作 </dd>
              </dl>
              <div class="clear"></div>
              <div class="popWeixin_sm"><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/wap" class="index_r_wap_box_t_s"><?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/wap</a></div>
            </div>
          </div>
        </div>
        <?php }?> </div>
    </div>
  </div>
  <div class="yunHeader">
    <div class="yunw1024">
      <div class="yunlogo fl"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
最新招聘求职信息"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_logo'];?>
" class="png" alt="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_webname'];?>
"/></a></div>
      <div class="yunHeader_city fl"> 
        <?php echo '<script'; ?>
 language='JavaScript' src='<?php echo smarty_function_url(array('m'=>'ajax','c'=>'Site'),$_smarty_tpl);?>
'><?php echo '</script'; ?>
> 
      </div>
      <div class="yunHeaderSearch fr">
        <form action="<?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_jobdir']) {?>index.php<?php } else {
echo smarty_function_url(array('m'=>'job'),$_smarty_tpl);
}?>" method="get" onsubmit="return search_keyword(this,'请输入关键字');"  id="index_search_form">
          <input type="hidden" <?php if (!$_smarty_tpl->tpl_vars['config']->value['sy_jobdir']) {?>name="m"<?php }?> value="job" id="m" />
          <input type="hidden" name="c" value="search" id="search" />
          <div class="yunHeaderSearch_box yun_z_bg">
            <div class="yunHeaderSearch_left fl"> <span class="yunHeaderSearch_s" id='search_name'>找工作</span>
              <div class="yunHeaderSearch_list_box yun_z_bg none">
                <div class="yunHeaderSearch_list_c"> <a href="javascript:void(0)" onclick="top_search('job', '找工作', '<?php echo smarty_function_url(array('m'=>'job'),$_smarty_tpl);?>
', '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_job_web'];?>
', '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_jobdir'];?>
'); $('#search').attr('name', 'c');" rel="nofollow">找工作</a> <a href="javascript:void(0)" onclick="top_search('resume', '找人才', '<?php echo smarty_function_url(array('m'=>'resume'),$_smarty_tpl);?>
', '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_resume_web'];?>
', '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_resumedir'];?>
'); $('#search').attr('name', 'c');" rel="nofollow"> 找人才</a> <a href="javascript:void(0)" onclick="top_search('resume', '找企业', '<?php echo smarty_function_url(array('m'=>'company'),$_smarty_tpl);?>
', '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_resume_web'];?>
', '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_companydir'];?>
'); $('#search').attr('name', '');" rel="nofollow"> 找企业</a> <a href="javascript:void(0)" onclick="top_search('tiny', '普工简历', '<?php echo smarty_function_url(array('m'=>'tiny'),$_smarty_tpl);?>
', '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_tiny_web'];?>
', '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_tinydir'];?>
'); $('#search').attr('name', '');" rel="nofollow">普工简历</a> <a href="javascript:void(0)" onclick="top_search('article', '职场资讯', '<?php echo smarty_function_url(array('m'=>'article'),$_smarty_tpl);?>
', '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_article_web'];?>
', '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_articledir'];?>
');"  class="none"  rel="nofollow">职场资讯</a> <a href="javascript:void(0)" onclick="top_search('once', '店铺招聘', '<?php echo smarty_function_url(array('m'=>'once'),$_smarty_tpl);?>
', '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_once_web'];?>
', '<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_oncedir'];?>
'); $('#search').attr('name', '');" rel="nofollow">店铺招聘</a> </div>
              </div>
            </div>
            <input type="text" id="keyword" name="keyword"  class="yunHeaderSearch_text fl" value='请输入关键字' onclick="if(this.value=='请输入关键字'){this.value=''}" onblur="if(this.value==''){this.value='请输入关键字'}"  />
            <input type="submit" value="搜 索"  class="yunHeaderSearch_sub yun_z_bg fr" />
          </div>
        </form>
        <div class="index_announcement">
          <div class="index_announcement_tit">网站公告：</div>
          <ul class="index_announcement_tit_list">
            <?php  $_smarty_tpl->tpl_vars['alist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['alist']->_loop = false;
$alist = $alist; if (!is_array($alist) && !is_object($alist)) { settype($alist, 'array');}
foreach ($alist as $_smarty_tpl->tpl_vars['alist']->key => $_smarty_tpl->tpl_vars['alist']->value) {
$_smarty_tpl->tpl_vars['alist']->_loop = true;
?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['alist']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['alist']->value['title_n'];?>
</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <?php echo '<script'; ?>
 type="text/javascript">marquee("2000",".index_announcement .index_announcement_tit_list"); <?php echo '</script'; ?>
>
  <div class="clear"></div>
</header>
<div class="clear"></div>
<?php if ($_smarty_tpl->tpl_vars['config']->value['sy_header_fix']=='1') {?> 
<!--滚动展示内容-->
<div class="header_fixed yun_bg_color none" id="header_fix">
  <div class="header_fixed_cont">
    <ul class="header_fixed_list">
      <?php  $_smarty_tpl->tpl_vars['nlist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nlist']->_loop = false;
global $db,$db_config,$config;include(PLUS_PATH."/menu.cache.php");$Navlist=array();
		if(is_array($menu_name)){
            eval('$paramer=array("item"=>"\'nlist\'","hovclass"=>"\'header_fixed_list_cur\'","nid"=>"1","nocache"=>"")
;');
			$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
			$paramer = $ParamerArr[arr];
			$Purl =  $ParamerArr[purl];

			foreach($menu_name[12] as $key=>$val){
				
				if($val['type']=='2'){
					if($config['sy_seo_rewrite']=="1" && $val[furl]!=''){
						$menu_name[12][$key][url] = $val[furl];
					}else{
						$menu_name[12][$key][url] = $val[url];
					}
					$menu_name[12][$key][navclass] = navcalss($val,$paramer[hovclass]);
				}
			}
			foreach($menu_name[1] as $key=>$value){
				if($value[url]=="/"){

					$value[url]="";
				}
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[1][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[1][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[1][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
			foreach($menu_name[2] as $key=>$value){
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[2][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[2][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[2][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
            $isCurrentFind=false;
			foreach($menu_name[4] as $key=>$value){
				if($value['type']=='1' && $value[furl]!=''){
					if($config['sy_seo_rewrite']=="1"){
						$menu_name[4][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[4][$key][url] = $config[sy_weburl]."/".$value[url];
					}
				}
                if($isCurrentFind==false){
				    $menu_name[4][$key][navclass] = navcalss($value,$paramer[hovclass]);
                }
                if($menu_name[4][$key][navclass]){
                    $isCurrentFind=true;
                }
			}
			foreach($menu_name[5] as $key=>$value){
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[5][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[5][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[5][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
		}
		//默认调用头部导航
		if($paramer[nid]){
			$Navlist =$menu_name[$paramer[nid]];
		}else{
			$Navlist =$menu_name[1];
		}$Navlist = $Navlist; if (!is_array($Navlist) && !is_object($Navlist)) { settype($Navlist, 'array');}
foreach ($Navlist as $_smarty_tpl->tpl_vars['nlist']->key => $_smarty_tpl->tpl_vars['nlist']->value) {
$_smarty_tpl->tpl_vars['nlist']->_loop = true;
?>
      <li class="<?php echo $_smarty_tpl->tpl_vars['nlist']->value['navclass'];?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['nlist']->value['url'];?>
" <?php if ($_smarty_tpl->tpl_vars['nlist']->value['eject']) {?> target="_blank"<?php }?>><?php echo $_smarty_tpl->tpl_vars['nlist']->value['name'];?>
</a></li>
      <?php } ?>
      <?php  $_smarty_tpl->tpl_vars['nalist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nalist']->_loop = false;
global $db,$db_config,$config;include(PLUS_PATH."/menu.cache.php");$Navlist=array();
		if(is_array($menu_name)){
            eval('$paramer=array("item"=>"\'nalist\'","hovclass"=>"\'header_fixed_list_cur\'","nid"=>"5","nocache"=>"")
;');
			$ParamerArr = GetSmarty($paramer,$_GET,$_smarty_tpl);
			$paramer = $ParamerArr[arr];
			$Purl =  $ParamerArr[purl];

			foreach($menu_name[12] as $key=>$val){
				
				if($val['type']=='2'){
					if($config['sy_seo_rewrite']=="1" && $val[furl]!=''){
						$menu_name[12][$key][url] = $val[furl];
					}else{
						$menu_name[12][$key][url] = $val[url];
					}
					$menu_name[12][$key][navclass] = navcalss($val,$paramer[hovclass]);
				}
			}
			foreach($menu_name[1] as $key=>$value){
				if($value[url]=="/"){

					$value[url]="";
				}
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[1][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[1][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[1][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
			foreach($menu_name[2] as $key=>$value){
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[2][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[2][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[2][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
            $isCurrentFind=false;
			foreach($menu_name[4] as $key=>$value){
				if($value['type']=='1' && $value[furl]!=''){
					if($config['sy_seo_rewrite']=="1"){
						$menu_name[4][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[4][$key][url] = $config[sy_weburl]."/".$value[url];
					}
				}
                if($isCurrentFind==false){
				    $menu_name[4][$key][navclass] = navcalss($value,$paramer[hovclass]);
                }
                if($menu_name[4][$key][navclass]){
                    $isCurrentFind=true;
                }
			}
			foreach($menu_name[5] as $key=>$value){
				if($value['type']=='1'){
					if($config['sy_seo_rewrite']=="1" && $value[furl]!=''){
						$menu_name[5][$key][url] = $config[sy_weburl]."/".$value[furl];
					}else{
						$menu_name[5][$key][url] = $config[sy_weburl]."/".$value[url];
					}
					$menu_name[5][$key][navclass] = navcalss($value,$paramer[hovclass]);
				}
			}
		}
		//默认调用头部导航
		if($paramer[nid]){
			$Navlist =$menu_name[$paramer[nid]];
		}else{
			$Navlist =$menu_name[1];
		}$Navlist = $Navlist; if (!is_array($Navlist) && !is_object($Navlist)) { settype($Navlist, 'array');}
foreach ($Navlist as $_smarty_tpl->tpl_vars['nalist']->key => $_smarty_tpl->tpl_vars['nalist']->value) {
$_smarty_tpl->tpl_vars['nalist']->_loop = true;
?>
      <li class="<?php echo $_smarty_tpl->tpl_vars['nalist']->value['navclass'];?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['nalist']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['nalist']->value['name'];?>
</a></li>
      <?php } ?>
    </ul>
    <div class="header_fixed_login yun_bg_color_hover"> <?php if (!$_smarty_tpl->tpl_vars['username']->value) {?>
      <div class="header_fixed_login_l" style="display:block"> <a href="<?php echo smarty_function_url(array('m'=>'login'),$_smarty_tpl);?>
" style="color:#fff"><span class="header_fixed_login_dl none"  did="login"> 登录 </span></a>|<span class="header_fixed_login_dl" did="register"> 注册
        <div class="header_fixed_reg_box none" id="register_t"> <a href="<?php echo smarty_function_url(array('m'=>'register','usertype'=>1),$_smarty_tpl);?>
" class="header_fixed_login_a">个人注册</a> <a href="<?php echo smarty_function_url(array('m'=>'register','usertype'=>2),$_smarty_tpl);?>
" class="header_fixed_login_a">企业注册</a> </div>
        </span> </div>
      <?php } else { ?>
      <div class="header_fixed_login_after">
        <div class="header_fixed_login_after_cont"> <span class="header_fixed_login_after_name"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</span>
          <div class="header_fixed_reg_box header_fixed_reg_box_ye none"> <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/member/index.php" class="header_fixed_login_a">进入会员中心</a> <a href="javascript:void(0)" onclick="logout('<?php echo $_smarty_tpl->tpl_vars['config']->value['sy_weburl'];?>
/index.php?c=logout')" class="header_fixed_login_a">退出登录</a> </div>
        </div>
      </div>
      <?php }?> </div>
    <div class="header_fixed_close"><a href="javascript:;" onclick="$('#header_fix').remove();">关闭</a></div>
  </div>
</div> 
<!--滚动展示内容 end--> 
<?php }?>
<?php echo '<script'; ?>
 language="javascript">
$(function() {
	var offset = 150;
    $(window).scroll(function(){
	( $(this).scrollTop() > offset ) ? $("#header_fix").show() : $("#header_fix").hide();
    });
	
	$(".header_fixed_login_dl").hover(function(){
	    var t=$(this).attr("did");
		$("#"+t+"_t").show();
	},function(){
	    var t=$(this).attr("did");
	   $("#"+t+"_t").hide();    
	});
	$(".yunHeadnav_more").hover(function(){
		$(this).find(".yunHeadnav_more_s").attr("class","yunHeadnav_more_s yunHeadnav_more_cur");
		$(this).find("div").show();
	},function(){
		$(this).find(".yunHeadnav_more_s").attr("class","yunHeadnav_more_s");
		$(this).find("div").hide();
	});
	$(".yuntbarPhone").hover(function(){
		$(this).find("div").show();
	},function(){
		$(this).find("div").hide();
	});
	$(".yuntbarWx").hover(function(){
		$(this).find("div").show();
	},function(){
		$(this).find("div").hide();
	});
});
<?php echo '</script'; ?>
> <?php }} ?>
