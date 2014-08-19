<?php
defined('GTPHP_PATH') || exit('Access Denied');
class configController extends Controller{
    function index(){	
		$loginusername=check_login();
		
		$GModel = new indexModel();
		$datas = $GModel->config();
		$this->assign("datas",$datas);
		$this->display("admin_config.php");
    }
    //修改配置
    function configsave(){	
		$loginusername=check_login();
		
		if(isset($_POST['g_id'])&&$_POST['g_id']!=""){
		
		if(isset($_POST['submit'])){
		$g_id = $_POST['g_id'];
		$g_confign = $_POST['g_confign'];
		$g_configv = $_POST['g_configv'];
		$g_configi = $_POST['g_configi'];
		$GModel = new indexModel();
		$dataok = $GModel->configsave($g_id,$g_confign,$g_configv,$g_configi);

		if($dataok==1){		
		$GModel->addlog($loginusername.' 成功将 '. $g_confign .' 修改为 ['. $g_configv .']。','操作日志',$loginusername);
		
			echo "<script type='text/javascript'>alert('操作成功！');location.href='?c=config&a=index';</script>";
		}else{		
		$GModel->addlog($loginusername.' 修改 '. $g_confign .' 失败， '. $g_confign .'没有被更改 。','操作日志',$loginusername);
		
			echo "<script type='text/javascript'>alert('操作失败！');location.href='?c=config&a=index';</script>";
		}
		}
		
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=config&a=index';</script>";
		}
    }
    //自定义信息
    function info(){	
		$loginusername=check_login();
		
		$GModel = new diyinfoModel();
		$datas = $GModel->index();
		$this->assign("datas",$datas);
		$this->display("admin_info.php");
    }
    //修改自定义信息
    function infosave(){	
		$loginusername=check_login();
		
		if(isset($_POST['g_id'])&&$_POST['g_id']!=""){
		
		if(isset($_POST['submit'])){
		$g_id = $_POST['g_id'];
		$g_name = $_POST['g_name'];
		$g_text = $_POST['g_text'];
		$GModel = new diyinfoModel();
		$dataok = $GModel->edit($g_id,$g_name,$g_text);

		if($dataok==1){		
		$GModel->addlog($loginusername.' 成功将自定义信息 '. $g_name .' 修改。','操作日志',$loginusername);
		
			echo "<script type='text/javascript'>alert('操作成功！');location.href='?c=config&a=info';</script>";
		}else{		
		$GModel->addlog($loginusername.' 修改自定义信息 '. $g_name .' 失败， '. $g_name .'没有被更改 。','操作日志',$loginusername);
		
			echo "<script type='text/javascript'>alert('操作失败！');location.href='?c=config&a=info';</script>";
		}
		}
		
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=config&a=info';</script>";
		}
    }
}