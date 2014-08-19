<?php
defined('GTPHP_PATH') || exit('Access Denied');
class diyinfoModel{
	//��ѯ
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
	//���
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
  //�޸�
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
  //ɾ��
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
	//��ѯһ����¼
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
  //��¼������־
	function addlog($message, $type, $username){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		//ȡ�ò���¼log
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