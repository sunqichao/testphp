<?php
defined('GTPHP_PATH') || exit('Access Denied');
class diyinfoController extends Controller{
	function index(){
		$loginusername=check_login();
		
		$GModel = new diyinfoModel();
		$datas = $GModel->index();
		$this->assign("datas",$datas);
		$this->display("admin_diyinfo.php");
  }
  //添加自定义信息项
	function  add(){
		$loginusername=check_login();
		
		if(isset($_POST['submit'])){
			$g_name = $_POST['g_name'];
			$g_text = "";
			$GModel = new diyinfoModel();
			$last_id = $GModel->add($g_name,$g_text);

			$GModel->addlog($loginusername.' 添加了新的自定义信息项 ['.$g_name.']。','操作日志',$loginusername);

			if($last_id>0){
			echo "<script type='text/javascript'>alert('添加成功！');location.href='?c=diyinfo&a=index';</script>";
			}else{
			echo "<script type='text/javascript'>alert('添加失败！');location.href='?c=diyinfo&a=index';</script>";

			}
		}
		
  }
  //删除自定义信息项
	function del(){
		$loginusername=check_login();
		
		if(isset($_GET['id'])&&$_GET['id']!=""){
		
		$g_id = $_GET['id'];
		$GModel = new diyinfoModel();
		$dataok = $GModel->del($g_id);
		$GModel->addlog($loginusername.' 删除了自定义信息项('.$g_id.')','操作日志',$loginusername);
		
		if($dataok==1){
			echo "<script type='text/javascript'>alert('删除成功！');location.href='?c=diyinfo&a=index';</script>";
		}else{
			echo "<script type='text/javascript'>alert('删除失败！');location.href='?c=diyinfo&a=index';</script>";
		}
		
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=diyinfo&a=index';</script>";
		}
		
  }
}