<?php
defined('GTPHP_PATH') || exit('Access Denied');
class classModel{
	//查询
	function index(){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->select("g_class", "*"
		, array(
    "ORDER" => "g_id DESC"
    ));
		return $datas;
	}
	//添加
	function addclass($g_name){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$last_id = $database->insert("g_class", array(
		"g_name" => $g_name
		));
		return $last_id;
  }
  //修改
  function editclass($g_id,$g_name){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$dataok=$database->update("g_class", array(
		"g_name" => $g_name
		), array("g_id" => $g_id
		));
		return $dataok;
   }
  //删除
  function delclass($g_id){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$dataok=$database->delete("g_class", array(
		"AND" => array(
		"g_id" => $g_id
		)));
		return $dataok;
   }
  //删除分类所属文章
  function delclassa($g_id){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$dataok=$database->delete("g_article", array(
		"AND" => array(
		"g_cid" => $g_id
		)));
		return $dataok;
   }
  //取得记录数
  function classcount(){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$count = $database->count("g_class", array());//取得数据表的总记录数
		return $count;
   }
   
	//查询一条记录
	function oneclass($g_id){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->get("g_class", array("g_id","g_name"
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