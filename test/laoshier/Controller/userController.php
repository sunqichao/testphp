<?php
defined('GTPHP_PATH') || exit('Access Denied');
class userController extends Controller{

    function index(){
		$loginusername=check_login();
		
		$GModel = new userModel();
		$count = $GModel->countuser();
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
		$this->display("admin_user.php");
    }
  //添加用户
	function  adduser(){
		$loginusername=check_login();
		
		if(isset($_POST['submit'])){
			
			$g_username = $_POST['g_username'];
			
			if(preg_match('/^[a-zA-Z]+[a-zA-Z0-9_]+$/', $g_username) == 0) {
				echo "<script type='text/javascript'>alert('用户名只允许使用字母、数字、下划线，且必须需以字母开头！');location.href='?c=user&a=index';</script>";
				exit;
      }
      
      $strlen = mb_strlen($g_username, 'UTF-8');
      
      if($strlen < 3 ) { 
				echo "<script type='text/javascript'>alert('用户名不能小于3个字符！');location.href='?c=user&a=index';</script>";
				exit;
      	} elseif ($strlen > 15) { 
				echo "<script type='text/javascript'>alert('用户名不能大于15个字符！');location.href='?c=user&a=index';</script>";
				exit;
      		}
      		$GModel = new userModel();
      		$data = $GModel->oneusername($g_username);
        if(!empty($data)) { 
				echo "<script type='text/javascript'>alert('该用户名已经被注册！！');location.href='?c=user&a=index';</script>";
				exit;
        }
        
      $g_password = $_POST['g_password'];
      $g_password_again = $_POST['g_password_again'];
			$g_password = addslashes(trim(stripslashes($g_password))); 
			
        $strlen = mb_strlen($g_password, 'UTF-8'); 
        if($strlen < 6 ) { 
				echo "<script type='text/javascript'>alert('密码不能小于6个字符！');location.href='?c=user&a=index';</script>";
				exit;
        } elseif ($strlen > 15) { 
				echo "<script type='text/javascript'>alert('密码不能大于15个字符！');location.href='?c=user&a=index';</script>";
				exit;
        } 
			
        if($g_password != $g_password_again) { 
				echo "<script type='text/javascript'>alert('两次输入的用户名不一致！ ');location.href='?c=user&a=index';</script>";
				exit;
        } 
			
      $g_email = $_POST['g_email'];
			
			if((strlen($g_email) < 6) && !preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $g_email)) { 
				echo "<script type='text/javascript'>alert('Email 格式有误！');location.href='?c=user&a=index';</script>";
				exit;
        } 

      $dataemail = $GModel->oneuseremail($g_email);
        if(!empty($dataemail)) {
				echo "<script type='text/javascript'>alert('该 Email 已经被注册！');location.href='?c=user&a=index';</script>";
				exit;
        } 

			$g_nickname = $_POST['g_nickname'];
			$g_remark = $_POST['g_remark'];
			$g_regdate = date("Y-m-d H:i:s", time());
			$g_regip = 0;
			$g_last_login_time = date("Y-m-d H:i:s", time());
			$g_last_login_ip = 0;
			$g_login_count = 0;
			$authaction = 0;
			
			$last_id = $GModel->adduser($g_username,md5($g_password),$g_nickname,$g_email,$g_regdate,$g_regip,$g_last_login_time,$g_last_login_ip,$g_login_count,$g_remark,$authaction);

			$GModel->addlog($loginusername.' 添加帐号 ['.$g_username.']。','操作日志',$loginusername);
			
			if($last_id>0){
			echo "<script type='text/javascript'>alert('添加用户成功！');location.href='?c=user&a=index';</script>";
			}else{
			echo "<script type='text/javascript'>alert('添加用户失败！');location.href='?c=user&a=index';</script>";
			}
		}
  }
  //用户详细信息
	function  infouser(){
		$loginusername=check_login();
		
		if(isset($_GET['id'])&&$_GET['id']!=""){
		$g_id = $_GET['id'];
		$GModel = new userModel();
		$datas = $GModel->oneuser($g_id);
		$this->assign("datas",$datas);
		$this->display("admin_infouser.php");
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=user&a=index';</script>";
		}
  }
  //修改用户
	function  edituser(){
		$loginusername=check_login();
		
		if(isset($_GET['id'])&&$_GET['id']!=""){
		$g_id = $_GET['id'];
		$GModel = new userModel();
		$datas = $GModel->oneuser($g_id);
		$this->assign("datas",$datas);
		$this->display("admin_edituser.php");
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=user&a=index';</script>";
		}
		
  }
  
  //修改用户保存
	function  editsave(){
		$loginusername=check_login();
		
		if(isset($_GET['id'])&&$_GET['id']!=""){
		
		if(isset($_POST['submit'])){
		$g_id = $_GET['id'];
		$g_email = $_POST['g_email'];
			if((strlen($g_email) < 6) && !preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $g_email)) { 
				echo "<script type='text/javascript'>alert('Email 格式有误！');location.href='?c=user&a=index';</script>";
				exit;
        } 

		$g_nickname = $_POST['g_nickname'];
		$g_remark = $_POST['g_remark'];
		$GModel = new userModel();
		$dataok = $GModel->edituser($g_id,$g_nickname,$g_email,$g_remark);
		
			$GModel->addlog($loginusername.' 修改了 ['.$g_nickname.']('.$g_id.') 的信息。','操作日志',$loginusername);
			
		if($dataok==1){
			echo "<script type='text/javascript'>alert('修改成功！');location.href='?c=user&a=index';</script>";
		}else{
			echo "<script type='text/javascript'>alert('修改失败！');location.href='?c=user&a=index';</script>";
		}
		}
		
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=user&a=index';</script>";
		}
  }
  //修改用户密码
	function  edituserpass(){
		$loginusername=check_login();
		
		if(isset($_GET['id'])&&$_GET['id']!=""){
		$g_id = $_GET['id'];
		$this->assign("g_id",$g_id);
		$this->display("admin_edituserpass.php");
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=user&a=index';</script>";
		}
		
  }
  
  //修改用户密码保存
	function  editpasssave(){
		$loginusername=check_login();
		
		if(isset($_GET['id'])&&$_GET['id']!=""){
		
		if(isset($_POST['submit'])){
		$g_id = $_GET['id'];
        
      $g_passwordold = $_POST['g_passwordold'];
      $g_password = $_POST['g_password'];
      $g_password_again = $_POST['g_password_again'];
			$g_password = addslashes(trim(stripslashes($g_password))); 
			
        $strlen = mb_strlen($g_password, 'UTF-8'); 
        if($strlen < 6 ) { 
				echo "<script type='text/javascript'>alert('密码不能小于6个字符！');location.href='?c=user&a=index';</script>";
				exit;
        } elseif ($strlen > 15) { 
				echo "<script type='text/javascript'>alert('密码不能大于15个字符！');location.href='?c=user&a=index';</script>";
				exit;
        } 
			
        if($g_password != $g_password_again) { 
				echo "<script type='text/javascript'>alert('两次输入的用户名不一致！ ');location.href='?c=user&a=index';</script>";
				exit;
        } 

      		$GModel = new userModel();
      		$oldpass = $GModel->oneuserpass($g_id);
      		
        if(md5($g_passwordold) != $oldpass) { 
				echo "<script type='text/javascript'>alert('原始密码错误！');location.href='?c=user&a=index';</script>";
				exit;
        } 
      		
		$dataok = $GModel->edituserpass($g_id,md5($g_password));
				
			$GModel->addlog($loginusername.' 修改了帐号ID ('.$g_id.') 的密码。','操作日志',$loginusername);
		
		if($dataok==1){
			echo "<script type='text/javascript'>alert('密码修改成功！');location.href='?c=user&a=index';</script>";
		}else{
			echo "<script type='text/javascript'>alert('密码修改失败！');location.href='?c=user&a=index';</script>";
		}
		}
		
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=user&a=index';</script>";
		}
  }
  //删除用户
	function  deluser(){
		$loginusername=check_login();
		
		if(isset($_GET['id'])&&$_GET['id']!=""){
		
		$g_id = $_GET['id'];
		$GModel = new userModel();
		$dataok = $GModel->deluser($g_id);
		
				
			$GModel->addlog($loginusername.' 删除了帐号('.$g_id.')。','操作日志',$loginusername);
		
		if($dataok==1){
			echo "<script type='text/javascript'>alert('删除用户成功！');location.href='?c=user&a=index';</script>";
		}else{
			echo "<script type='text/javascript'>alert('删除用户失败！');location.href='?c=user&a=index';</script>";
		}
		
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=user&a=index';</script>";
		}
		
  }
  //搜索
    function search(){
		$loginusername=check_login();
		
		$CGModel = new classModel();
		$Cdatas = $CGModel->index();
		$this->assign("Cdatas",$Cdatas);
    	
		$key = $_GET['key'];
		$GModel = new articleModel();
		$count = $GModel->counts($key);
		$pagesize=1; //每页显示的页数
		$page = new pageClass($count,$pagesize);
		$pageer=$page->getPage();
		
		if(isset($_GET['p'])){
			$page=$_GET['p'];
			}else $page=1;
			$sqlfirst=($page-1)*$pagesize;
		$datas = $GModel->search($key,$sqlfirst,$pagesize);
		$this->assign("datas",$datas);
		$this->assign("page",$pageer);
		$this->display("admin_article.php");
    }
}