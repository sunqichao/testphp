<?php
defined('GTPHP_PATH') || exit('Access Denied');
class loginController extends Controller{
    function index(){	
		$this->display("admin_login.php");
    }
    //登陆验证
    function loginck(){	
		if(isset($_POST['submit'])){
			
		$g_username = $_POST['g_username'];			
		if(empty($g_username)) { 
			echo "<script type='text/javascript'>alert('填写用户名！');location.href='?c=login&a=index';</script>";
				exit;
			}
		$g_password = md5($_POST['g_password']);
		$GModel = new indexModel();
		$datas = $GModel->oneuserck($g_username);
		
			if(empty($datas['g_username'])) { 
				
		$GModel->addlog('登陆失败，用户不存在！','登陆日志',$g_username);
		
			echo "<script type='text/javascript'>alert('用户不存在！');location.href='?c=login&a=index';</script>";
				exit;
			} elseif($datas['g_password'] != $g_password) { 
		$GModel->addlog('登陆失败，密码错误！','登陆日志',$g_username);
			echo "<script type='text/javascript'>alert('密码错误！');location.href='?c=login&a=index';</script>";
				exit;
      }
      
      if($g_password == $datas['g_password']){ 
      	session_start();
      	$_SESSION['user']=$datas['g_username'];
      	$_SESSION['nickname']=$datas['g_nickname'];
      	$_SESSION['loginua']=$_POST['loginuseragent'];
      	$g_regip=$datas['g_regip'];
      	$g_login_count=$datas['g_login_count']+1;
      	if($datas['g_login_count'] == 0){ 
      	$g_regip=mygetip();
      	}
      	$g_last_login_time=date("Y-m-d H:i:s", time());
      	$g_last_login_ip=mygetip();

		$GModel->addlog($g_username.' 第 '.$g_login_count.' 次登陆成功！','登陆日志',$g_username);
      	
      	$GModel = new userModel();
      	$GModel->edituserlogininfo($g_username,$g_regip,$g_last_login_time,$g_last_login_ip,$g_login_count);
      	      	echo "<script>location.href='?c=admin&a=index';</script>";   // 跳转
      	}
		}
		
    }
    
    function logout(){
		$loginusername=check_login();
		$GModel = new indexModel();
		$GModel->addlog($loginusername.' 注销登录！','登陆日志',$loginusername);
    $_SESSION['user']='';
    $_SESSION['nickname']='';
    unset($_SESSION);
    echo "<script>location.href='?c=login&a=index';</script>";   // 跳转
    }
    
    
}