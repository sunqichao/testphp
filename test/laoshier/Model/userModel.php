<?php
defined('GTPHP_PATH') || exit('Access Denied');
class userModel{
	//查询
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
	//添加
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
  //修改
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
  //修改密码
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
  //删除
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
  //取得记录数
  function countuser(){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$count = $database->count("g_user", array());//取得数据表的总记录数
		return $count;
   }
	//查询一条记录
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
	//查询用户名
	function oneusername($g_username){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$data = $database->get("g_user","g_username", array(
		"g_username" => $g_username
    ));
		return $data;
	}	
	//查询电子邮件
	function oneuseremail($g_email){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$data = $database->get("g_user","g_email", array(
		"g_email" => $g_email
    ));
		return $data;
	}	
	//查询密码
	function oneuserpass($g_id){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$data = $database->get("g_user","g_password", array(
		"g_id" => $g_id
    ));
		return $data;
	}	
  //修改
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