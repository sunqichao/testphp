<?php
defined('GTPHP_PATH') || exit('Access Denied');
class siteModel{
	//查询文章
	function article($sqlfirst,$pagesize){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->select("g_article", array("g_id", "g_cid", "g_title", "g_tag", "g_des", "g_author", "g_imgurl", "g_time", "g_guid"
		), array(
    "ORDER" => "g_id DESC",
    "LIMIT" => array($sqlfirst,$pagesize)
    ));
		return $datas;
	}
	//查询文章
	function classarticle($classid,$sqlfirst,$pagesize){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->select("g_article", array("g_id", "g_cid", "g_title", "g_tag", "g_des", "g_author", "g_imgurl", "g_time", "g_guid"
		), array(
    "g_cid" => $classid,
    "ORDER" => "g_id DESC",
    "LIMIT" => array($sqlfirst,$pagesize)
    ));
		return $datas;
	}
  //取得记录数
  function countarticle(){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$count = $database->count("g_article", array());//取得数据表的总记录数
		return $count;
   }
  //取得分类记录数
  function countclass($classid){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$count = $database->count("g_article", array(
    "g_cid" => $classid));//取得数据表的总记录数
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
	//查询上一篇文章
	function ponearticle($g_id){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->get("g_article", array("g_id", "g_cid", "g_title"
		), array(
    "ORDER" => "g_id DESC",
		"g_id[<]" => $g_id
    ));
		return $datas;
	}	
	//查询下一篇文章
	function nonearticle($g_id){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->get("g_article", array("g_id", "g_cid", "g_title"
		), array(
		"g_id[>]" => $g_id
    ));
		return $datas;
	}	
	//搜索key
	function search($key,$sqlfirst,$pagesize){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->select("g_article",array("g_id", "g_cid", "g_title", "g_tag", "g_des", "g_author", "g_imgurl", "g_time", "g_guid"),array(
		'LIKE' => array(
		'g_title' => $key
	),
    "ORDER" => "g_id DESC",
    "LIMIT" => array($sqlfirst,$pagesize)
));
		
		return $datas;
	}
   
  //取得搜索key记录数
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
   
    //搜索tag
    function searchtag($tag,$sqlfirst,$pagesize){
        $myconfig = new myconfig();
        $mydbconfig=$myconfig->mydbconfig();
        $database = new medooClass($mydbconfig);
        $datas = $database->select("g_article",array("g_id", "g_cid", "g_title", "g_tag", "g_des", "g_author", "g_imgurl", "g_time", "g_guid"),array(
        'LIKE' => array(
        'g_tag' => $tag
    ),
    "ORDER" => "g_id DESC",
    "LIMIT" => array($sqlfirst,$pagesize)
));
        
        return $datas;
    }
   
  //取得搜索tag记录数
  function countstag($tag){
        $myconfig = new myconfig();
        $mydbconfig=$myconfig->mydbconfig();
        $database = new medooClass($mydbconfig);
        $count = $database->count("g_article",array(
        'LIKE' => array(
        'g_title' => $tag
    )));//取得数据表的总记录数
        return $count;
   }    
   
  //查询分类
	function siteclass(){
		$myconfig = new myconfig();
		$mydbconfig=$myconfig->mydbconfig();
		$database = new medooClass($mydbconfig);
		$datas = $database->select("g_class", "*"
		, array(
    "ORDER" => "g_id ASC"
    ));
		return $datas;
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
}