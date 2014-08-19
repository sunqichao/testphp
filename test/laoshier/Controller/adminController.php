<?php
defined('GTPHP_PATH') || exit('Access Denied');
class adminController extends Controller{
	function index(){
		$loginusername=check_login();
		$indexModel = new indexModel();
		$mydatainfo = $indexModel->index();
		$this->assign("mydatainfo",$mydatainfo);
		$this->display("admin_index.php");
    }
}