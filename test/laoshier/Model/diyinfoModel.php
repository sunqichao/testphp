<?php
defined('GTPHP_PATH') || exit('Access Denied');
class diyinfoModel{
	//查询
	function index(){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->select("g_info", "*"
		, array(
    "ORDER" => "g_id DESC"
    ));
		return $datas;
	}
	//添加
	function add($g_name,$g_text){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$last_id = $database->insert("g_info", array(
		"g_name" => $g_name,
		"g_text" => $g_text
		));
		return $last_id;
  }
  //修改
  function edit($g_id,$g_name,$g_text){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$dataok=$database->update("g_info", array(
		"g_name" => $g_name,
		"g_text" => $g_text
		), array("g_id" => $g_id
		));
		return $dataok;
   }
  //删除
  function del($g_id){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$dataok=$database->delete("g_info", array(
		"AND" => array(
		"g_id" => $g_id
		)));
		return $dataok;
   }
	//查询一条记录
	function one($g_id){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->get("g_info", array("g_id","g_name","g_text"
		), array(
		"g_id" => $g_id
    ));
		return $datas;
	}
  //记录操作日志
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
}