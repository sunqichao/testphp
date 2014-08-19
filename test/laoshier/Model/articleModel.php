<?php
defined('GTPHP_PATH') || exit('Access Denied');
class articleModel{
	//查询
	function index($sqlfirst,$pagesize){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->select("g_article", array("g_id", "g_cid", "g_title", "g_tag", "g_des", "g_author", "g_time", "g_guid"
		), array(
    "ORDER" => "g_id DESC",
    "LIMIT" => array($sqlfirst,$pagesize)
    ));
		return $datas;
	}
	//添加
	function addarticle($g_cid, $g_title, $g_tag, $g_des, $g_content, $g_author, $g_imgurl, $g_time, $g_guid){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$last_id = $database->insert("g_article", array(
		"g_cid" => $g_cid,
		"g_title" => $g_title,
		"g_tag" => $g_tag,
		"g_des" => $g_des,
		"g_content" => $g_content,
		"g_author" => $g_author,
		"g_imgurl" => $g_imgurl,
		"g_time" => $g_time,
		"g_guid" => $g_guid
		));
		return $last_id;
  }
  //修改
  function editarticle($g_id, $g_cid, $g_title, $g_tag, $g_des, $g_content, $g_author, $g_imgurl, $g_time, $g_guid){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$dataok=$database->update("g_article", array(
		"g_cid" => $g_cid,
		"g_title" => $g_title,
		"g_tag" => $g_tag,
		"g_des" => $g_des,
		"g_content" => $g_content,
		"g_author" => $g_author,
		"g_imgurl" => $g_imgurl,
		"g_time" => $g_time,
		"g_guid" => $g_guid
		), array("g_id" => $g_id)
		);
		return $dataok;
   }
  //删除
  function delarticle($g_id){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$dataok=$database->delete("g_article", array(
		"AND" => array(
		"g_id" => $g_id
		)));
		return $dataok;
   }
  //取得记录数
  function countarticle(){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$count = $database->count("g_article", array());//取得数据表的总记录数
		return $count;
   }
	//查询一条记录
	function onearticle($g_id){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->get("g_article", array("g_id", "g_cid", "g_title", "g_tag", "g_des", "g_content", "g_author", "g_imgurl", "g_time", "g_guid"
		), array(
		"g_id" => $g_id
    ));
		return $datas;
	}	
	//搜索
	function search($key,$sqlfirst,$pagesize){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->select("g_article",array("g_id", "g_title"),array(
		'LIKE' => array(
		'g_title' => $key
	),
    "LIMIT" => array($sqlfirst,$pagesize)
));
		
		return $datas;
	}
   
  //取得搜索记录数
  function counts($key){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$count = $database->count("g_article",array(
		'LIKE' => array(
		'g_title' => $key
	)));//取得数据表的总记录数
		return $count;
   }	
   
  //添加上传图片地址
	function addpicurl($g_url, $g_time){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$last_id = $database->insert("g_upload", array(
		"g_url" => $g_url,
		"g_time" => $g_time
		));
		return $last_id;
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