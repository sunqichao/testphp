<?php
class logController extends Controller{
	function index(){
		$loginusername=check_login();
		
		$GModel = new logModel();
		$count = $GModel->logcount();
		$pagesize=10; //每页显示的页数
		$page = new pageClass($count,$pagesize);
		$pageer=$page->getPage();
		
		if(isset($_GET['p'])){
			$page=$_GET['p'];
			}else $page=1;
			$sqlfirst=($page-1)*$pagesize;
		$datas = $GModel->index($sqlfirst,$pagesize);
		$this->assign("datas",$datas);
		$this->assign("page",$pageer);
		$this->display("admin_log.php");
	}
	function dellog(){
		$loginusername=check_login();
		
		$GModel = new logModel();
		$dataok = $GModel->logdel();
		$GModel->addlog($loginusername.' 清理了三天前的日志。','操作日志',$loginusername);

		echo "<script type='text/javascript'>alert('成功删除三天前的日志！');location.href='?c=log&a=index';</script>";
	}
}