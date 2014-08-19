<?php
defined('GTPHP_PATH') || exit('Access Denied');
class logModel{
    function index($sqlfirst,$pagesize){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->select("g_log", "*"
		, array(
    "ORDER" => "g_id DESC",
    "LIMIT" => array($sqlfirst,$pagesize)
    ));
		return $datas;
    }
    //��־����
    function logcount(){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$count = $database->count("g_log", array());//ȡ�����ݱ���ܼ�¼��
		return $count;
    }
    //�����־
    function logdel(){
		$date = date("Y-m-d H:i:s",strtotime("-2 day"));
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$dataok = $database->delete("g_log", array(
		"AND" => array(
		"g_time[<]" => $date
		)));
		return $dataok;
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