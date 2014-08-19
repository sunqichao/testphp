<?php
defined('GTPHP_PATH') || exit('Access Denied');
class classModel{
	//��ѯ
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
	//���
	function addclass($g_name){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$last_id = $database->insert("g_class", array(
		"g_name" => $g_name
		));
		return $last_id;
  }
  //�޸�
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
  //ɾ��
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
  //ɾ��������������
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
  //ȡ�ü�¼��
  function classcount(){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$count = $database->count("g_class", array());//ȡ�����ݱ���ܼ�¼��
		return $count;
   }
   
	//��ѯһ����¼
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