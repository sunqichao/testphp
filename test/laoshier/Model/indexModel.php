<?php
defined('GTPHP_PATH') || exit('Access Denied');
class indexModel{
	function index(){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$mydatainfo=$database->info();
		return $mydatainfo;
    }
    
	function addlog($message, $type, $username){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		//取得并记录log
		$rlogg=logg($message, $type, $username);
		$database->insert("g_log", array(
		"g_message" => $rlogg['ThisMessage'],
		"g_type" => $rlogg['ThisType'],
		"g_username" => $rlogg['ThisUsername'],
		"g_ip" => $rlogg['ThisIp'],
		"g_agent" => $rlogg['ThisAgent'],
		"g_language" => $rlogg['ThisLanguage'],
		"g_time" => date("Y-m-d H:i:s",time())
		));
    }
	//查询配置
	function config(){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->select("g_config", "*"
		, array(
    "ORDER" => "g_id ASC"
    ));
		return $datas;
	}
	//查询一条记录
	function oneconfig($g_id){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->get("g_config", "*", array(
		"g_id" => $g_id
    ));
		return $datas;
	}
  //修改配置
  function configsave($g_id,$g_confign,$g_configv,$g_configi){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$dataok=$database->update("g_config", array(
		"g_confign" => $g_confign,
		"g_configv" => $g_configv,
		"g_configi" => $g_configi
		), array("g_id" => $g_id)
		);
		return $dataok;
   }
  //添加配置项目
  function addconfigsave($g_confign,$g_configv,$g_configi){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$dataok=$database->insert("g_config", array(
		"g_confign" => $g_confign,
		"g_configv" => $g_configv,
		"g_configi" => $g_configi
		));
		return $dataok;
   }
  //删除
  function del($g_id){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$dataok=$database->delete("g_config", array(
		"AND" => array(
		"g_id" => $g_id
		)));
		return $dataok;
   }
	//查询用户名和密码
	function oneuserck($g_username){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$data = $database->get("g_user",array(
		"g_username",
		"g_password",
		"g_nickname",
		"g_regip",
		"g_login_count"
		), array("g_username" => $g_username
    ));
		return $data;
	}	
}