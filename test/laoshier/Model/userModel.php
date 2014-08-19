<?php
defined('GTPHP_PATH') || exit('Access Denied');
class userModel{
	//��ѯ
	function index($sqlfirst,$pagesize){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->select("g_user", array("g_id","g_username","g_password","g_nickname","g_email","g_regdate","g_regip","g_last_login_time","g_last_login_ip","g_login_count","g_remark","authaction"
		), array(
    "ORDER" => "g_id DESC",
    "LIMIT" => array($sqlfirst,$pagesize)
    ));
		return $datas;
	}
	//���
	function adduser($g_username,$g_password,$g_nickname,$g_email,$g_regdate,$g_regip,$g_last_login_time,$g_last_login_ip,$g_login_count,$g_remark,$authaction){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$last_id = $database->insert("g_user", array(
		"g_username" => $g_username,
		"g_password" => $g_password,
		"g_nickname" => $g_nickname,
		"g_email" => $g_email,
		"g_regdate" => $g_regdate,
		"g_regip" => $g_regip,
		"g_last_login_time" => $g_last_login_time,
		"g_last_login_ip" => $g_last_login_ip,
		"g_login_count" => $g_login_count,
		"g_remark" => $g_remark,
		"authaction" => $authaction
		));
		return $last_id;
  }
  //�޸�
  function edituser($g_id,$g_nickname,$g_email,$g_remark){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$dataok=$database->update("g_user", array(
		"g_nickname" => $g_nickname,
		"g_email" => $g_email,
		"g_remark" => $g_remark
		), array("g_id" => $g_id)
		);
		return $dataok;
   }
  //�޸�����
  function edituserpass($g_id,$g_password){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$dataok=$database->update("g_user", array(
		"g_password" => $g_password
		), array("g_id" => $g_id)
		);
		return $dataok;
   }
  //ɾ��
  function deluser($g_id){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$dataok=$database->delete("g_user", array(
		"AND" => array(
		"g_id" => $g_id
		)));
		return $dataok;
   }
  //ȡ�ü�¼��
  function countuser(){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$count = $database->count("g_user", array());//ȡ�����ݱ���ܼ�¼��
		return $count;
   }
	//��ѯһ����¼
	function oneuser($g_id){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->get("g_user", array("g_id","g_username","g_password","g_nickname","g_email","g_regdate","g_regip","g_last_login_time","g_last_login_ip","g_login_count","g_remark","authaction"
		), array(
		"g_id" => $g_id
    ));
		return $datas;
	}	
	//��ѯ�û���
	function oneusername($g_username){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$data = $database->get("g_user","g_username", array(
		"g_username" => $g_username
    ));
		return $data;
	}	
	//��ѯ�����ʼ�
	function oneuseremail($g_email){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$data = $database->get("g_user","g_email", array(
		"g_email" => $g_email
    ));
		return $data;
	}	
	//��ѯ����
	function oneuserpass($g_id){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$data = $database->get("g_user","g_password", array(
		"g_id" => $g_id
    ));
		return $data;
	}	
  //�޸�
  function edituserlogininfo($g_username,$g_regip,$g_last_login_time,$g_last_login_ip,$g_login_count){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$dataok=$database->update("g_user", array(
		"g_regip" => $g_regip,
		"g_last_login_time" => $g_last_login_time,
		"g_last_login_ip" => $g_last_login_ip,
		"g_login_count" => $g_login_count
		), array("g_username" => $g_username)
		);
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