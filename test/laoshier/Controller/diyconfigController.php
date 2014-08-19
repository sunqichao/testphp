<?php
defined('GTPHP_PATH') || exit('Access Denied');
class diyconfigController extends Controller{
	function index(){
		$loginusername=check_login();
		
		$GModel = new indexModel();
		$datas = $GModel->config();
		$this->assign("datas",$datas);
		$this->display("admin_diyconfig.php");
  }
  //添加配置项
	function  add(){
		$loginusername=check_login();
		
		if(isset($_POST['submit'])){
			$g_confign = $_POST['g_confign'];
			$g_configi = $_POST['g_configi'];
			$GModel = new indexModel();
			$last_id = $GModel->addconfigsave($g_confign,"",$g_configi);
			
			$GModel->addlog($loginusername.' 添加了新的配置项 ['.$g_confign.']。','操作日志',$loginusername);
			
			if($last_id>0){
			echo "<script type='text/javascript'>alert('添加成功！');location.href='?c=diyconfig&a=index';</script>";
			}else{
			echo "<script type='text/javascript'>alert('添加失败！');location.href='?c=diyconfig&a=index';</script>";

			}
		}
		
  }
  //修改分类
	function edit(){
		$loginusername=check_login();
		
		if(isset($_GET['id'])&&$_GET['id']!=""){
		$g_id = $_GET['id'];
		$GModel = new indexModel();
		$datas = $GModel->oneconfig($g_id);
		$this->assign("datas",$datas);
		$this->display("admin_editdiyconfig.php");
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=diyconfig&a=index';</script>";
		}
		
  }
  //修改分类保存
	function editsave(){
		$loginusername=check_login();
		
		if(isset($_POST['id'])&&$_POST['id']!=""){
		
		if(isset($_POST['submit'])){
		$g_id = $_POST['id'];
			$g_confign = $_POST['g_confign'];
			$g_configv = $_POST['g_configv'];
			$g_configi = $_POST['g_configi'];
		$GModel = new indexModel();
		$dataok = $GModel->configsave($g_id,$g_confign,$g_configv,$g_configi);

		$GModel->addlog($loginusername.' 修改配置项 ['.$g_confign.']。','操作日志',$loginusername);
			
		if($dataok==1){
			echo "<script type='text/javascript'>alert('修改成功！');location.href='?c=diyconfig&a=index';</script>";
		}else{
			echo "<script type='text/javascript'>alert('修改失败！');location.href='?c=diyconfig&a=index';</script>";
		}
		}
		
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=diyconfig&a=index';</script>";
		}
  }
  //删除分类
	function del(){
		$loginusername=check_login();
		
		if(isset($_GET['id'])&&$_GET['id']!=""){
		
		$g_id = $_GET['id'];
		$GModel = new indexModel();
		$dataok = $GModel->del($g_id);
		$GModel->addlog($loginusername.' 删除了配置项('.$g_id.')','操作日志',$loginusername);
		
		if($dataok==1){
			echo "<script type='text/javascript'>alert('删除成功！');location.href='?c=diyconfig&a=index';</script>";
		}else{
			echo "<script type='text/javascript'>alert('删除失败！');location.href='?c=diyconfig&a=index';</script>";
		}
		
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=diyconfig&a=index';</script>";
		}
		
  }
}