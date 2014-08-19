<?php
defined('GTPHP_PATH') || exit('Access Denied');
class classController extends Controller{
	function index(){
		$loginusername=check_login();
		
		$GModel = new classModel();
		$datas = $GModel->index();
		$this->assign("datas",$datas);
		$this->display("admin_class.php");
  }
  //添加分类
	function  addclass(){
		$loginusername=check_login();
		
		if(isset($_POST['submit'])){
			$g_name = $_POST['g_name'];
			$GModel = new classModel();
			$last_id = $GModel->addclass($g_name);
			
			$GModel->addlog($loginusername.' 添加了分类 ['.$g_name.']。','操作日志',$loginusername);
			
			if($last_id>0){
			echo "<script type='text/javascript'>alert('添加分类成功！');location.href='?c=class&a=index';</script>";
			}else{
			echo "<script type='text/javascript'>alert('添加分类失败！');location.href='?c=class&a=index';</script>";

			}
		}
		
  }
  //修改分类
	function  editclass(){
		$loginusername=check_login();
		
		if(isset($_GET['id'])&&$_GET['id']!=""){
		$g_id = $_GET['id'];
		$GModel = new classModel();
		$datas = $GModel->oneclass($g_id);
		$this->assign("datas",$datas);
		$this->display("admin_editclass.php");
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=class&a=index';</script>";
		}
		
  }
  //修改分类保存
	function  editsave(){
		$loginusername=check_login();
		
		if(isset($_GET['id'])&&$_GET['id']!=""){
		
		if(isset($_POST['submit'])){
		$g_id = $_GET['id'];
		$g_name = $_POST['g_name'];
		$GModel = new classModel();
		$dataok = $GModel->editclass($g_id,$g_name);

		$GModel->addlog($loginusername.' 修改了分类 ['.$g_name.']。','操作日志',$loginusername);
			
		if($dataok==1){
			echo "<script type='text/javascript'>alert('修改分类成功！');location.href='?c=class&a=index';</script>";
		}else{
			echo "<script type='text/javascript'>alert('修改分类失败！');location.href='?c=class&a=index';</script>";
		}
		}
		
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=class&a=index';</script>";
		}
  }
  //删除分类
	function  delclass(){
		$loginusername=check_login();
		
		if(isset($_GET['id'])&&$_GET['id']!=""){
		
		$g_id = $_GET['id'];
		$GModel = new classModel();
		$dataok = $GModel->delclass($g_id);
		$dataoks = $GModel->delclassa($g_id);
		
		$GModel->addlog($loginusername.' 删除了分类('.$g_id.')及该分类下所有('.$dataoks.'篇)文章。','操作日志',$loginusername);
		
		if($dataok==1){
			echo "<script type='text/javascript'>alert('删除分类成功！');location.href='?c=class&a=index';</script>";
		}else{
			echo "<script type='text/javascript'>alert('删除分类失败！');location.href='?c=class&a=index';</script>";
		}
		
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=class&a=index';</script>";
		}
		
  }
}