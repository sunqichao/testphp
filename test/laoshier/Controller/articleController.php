<?php
defined('GTPHP_PATH') || exit('Access Denied');
class articleController extends Controller{
    function index(){
		$loginusername=check_login();
		
		$CGModel = new classModel();
		$Cdatas = $CGModel->index();
		$this->assign("Cdatas",$Cdatas);
		
		$GModel = new articleModel();
		$count = $GModel->countarticle();
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
		$this->assign("g_author",$_SESSION['nickname']);
		$this->display("admin_article.php");
    }
    
    function index2(){
		$loginusername=check_login();
		
		$CGModel = new classModel();
		$Cdatas = $CGModel->index();
		$this->assign("Cdatas",$Cdatas);
		
		$GModel = new articleModel();
		$count = $GModel->countarticle();
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
		$this->assign("g_author",$_SESSION['nickname']);
		$this->display("admin_article2.php");
    }
  //添加文章
	function  addarticle(){
		
		$loginusername=check_login();
		
		if(isset($_POST['submit'])){
			$g_cid = $_POST['g_cid'];
		if(empty($g_cid)) { 
			echo "<script type='text/javascript'>alert('未选择分类！');location.href='?c=article&a=index';</script>";
				exit;
			}
			$g_title = $_POST['g_title'];
		if(empty($g_title)) { 
			echo "<script type='text/javascript'>alert('标题不能为空！');location.href='?c=article&a=index';</script>";
				exit;
			}
			$g_tag = $_POST['g_tag'];
			$g_tag = str_replace(" ","",$g_tag);
			$g_tag = str_replace("，",",",$g_tag);
			
			$g_des = $_POST['g_des'];
			$g_content = $_POST['g_content'];
		if(empty($g_content)) { 
			echo "<script type='text/javascript'>alert('内容不能为空！');location.href='?c=article&a=index';</script>";
				exit;
			}
			$g_content = str_replace("\n","<br />",$g_content);
			$g_content = str_replace("\r","<br />",$g_content);
			$g_content = str_replace("<br /><br />","<br />",$g_content);
			$g_author = $_POST['g_author'];
			$g_time = date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']);
			$g_guid = 0;
			
		
		$myconfig = new myconfig();
		$myconfig=$myconfig->myconfig();
		
		if(empty($_FILES['myfile']['type'])) { 
			$g_img = '';
			} else { 

	//判断文件是否过大
	$filesize = $_FILES['myfile']['size'];
        //因为PHP.ini中配置了上传不能大于2M.所以传过来的文件大于2M将为空值.
	if(false == $filesize){			
			echo "<script type='text/javascript'>alert('文件过大,上传失败！');location.href='?c=article&a=index';</script>";
				exit;
	}
	
	//判断类型是否符合
	$filetype = $_FILES['myfile']['type'];
	if($filetype!='image/jpg' && $filetype!='image/pjpeg' && $filetype!='image/jpeg' && $filetype!='image/png' && $filetype!='image/gif' && $filetype!='application/octet-stream'){
			echo "<script type='text/javascript'>alert('文件类型必须是图片！');location.href='?c=article&a=index';</script>";
				exit;
	}
	
	//判断是否是上传的文件
	if (is_uploaded_file($_FILES['myfile']['tmp_name'])){
			//通过username创建目录,判断目录是否存在
			$user_path =$_SERVER['DOCUMENT_ROOT'].$myconfig['Uploads'];
      //通过iconv函数解决中文路径问题
			$user_path=iconv("utf-8","gb2312",$user_path);
			if (!file_exists($user_path)){
				mkdir($user_path);
			}
			//获取文件临时上传路径
			$uploaded_path = $_FILES['myfile']['tmp_name'];
			//获取文件后缀名, strrchr函数 — 从查找的字符最后出现位置开始，直到字符串末尾
			$fn_extension =strrchr($_FILES['myfile']['name'], ".");
			//获取目标位置,并重新创建文件名
			$move_path = $user_path."/".date("Ymd").date("YmdHis")."_".rand(1, 1000).$fn_extension;
			//移动文件
			if(false!=(move_uploaded_file($uploaded_path,$move_path))){
				$g_img = $move_path;
				$g_img = str_replace($_SERVER['DOCUMENT_ROOT'],"",$g_img);
				//echo "上传成功";
			}else{
				
			echo "<script type='text/javascript'>alert('上传失败！');location.href='?c=article&a=index';</script>";
				exit;
				
			}
	}
	
			} 


            if($_SESSION['loginua']==2){
                $g_imgurl = $_POST['g_imgurl'];
            }else{
                $g_imgurl = $g_img;
            }
            
			$GModel = new articleModel();
			$last_id = $GModel->addarticle($g_cid, $g_title, $g_tag, $g_des, $g_content, $g_author, $g_imgurl, $g_time, $g_guid);

			$GModel->addlog($loginusername.' 添加了文章 ['.$g_title.']。','操作日志',$loginusername);

			if($_SESSION['loginua']==2){
				
			if($last_id>0){
			echo "<script type='text/javascript'>alert('添加文章成功！');location.href='?c=article&a=index2';</script>";
			}else{
			echo "<script type='text/javascript'>alert('添加文章失败！');location.href='?c=article&a=index2';</script>";
			}
			
			}else{	
						
			if($last_id>0){
			echo "<script type='text/javascript'>alert('添加文章成功！');location.href='?c=article&a=index';</script>";
			}else{
			echo "<script type='text/javascript'>alert('添加文章失败！');location.href='?c=article&a=index';</script>";
			}
			
			}
			
			
		}
		
  }
  //修改文章
	function  editarticle(){
		$loginusername=check_login();
		
		if(isset($_GET['id'])&&$_GET['id']!=""){
		$CGModel = new classModel();
		$Cdatas = $CGModel->index();
		$this->assign("Cdatas",$Cdatas);
    	
		$g_id = $_GET['id'];
		$GModel = new articleModel();
		$datas = $GModel->onearticle($g_id);
		$this->assign("datas",$datas);
		$this->display("admin_editarticle.php");
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=article&a=index';</script>";
		}
		
  }
  //修改文章
	function  editarticle2(){
		$loginusername=check_login();
		
		if(isset($_GET['id'])&&$_GET['id']!=""){
		$CGModel = new classModel();
		$Cdatas = $CGModel->index();
		$this->assign("Cdatas",$Cdatas);
    	
		$g_id = $_GET['id'];
		$GModel = new articleModel();
		$datas = $GModel->onearticle($g_id);
		$this->assign("datas",$datas);
		$this->display("admin_editarticle2.php");
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=article&a=index';</script>";
		}
		
  }
  //保存修改过的文章
	function editsave(){
		$loginusername=check_login();
		
		if(isset($_GET['id'])&&$_GET['id']!=""){
		
		if(isset($_POST['submit'])){
		$g_id = $_GET['id'];
			$g_cid = $_POST['g_cid'];
			$g_title = $_POST['g_title'];
			$g_tag = $_POST['g_tag'];
			$g_tag = str_replace(" ","",$g_tag);
			$g_tag = str_replace("，",",",$g_tag);
			$g_des = $_POST['g_des'];
			$g_content = $_POST['g_content'];
			$g_content = str_replace("\n","<br />",$g_content);
			$g_content = str_replace("\r","<br />",$g_content);
			$g_content = str_replace("<br /><br />","<br />",$g_content);
			$g_content = str_replace("<br /><br />","<br />",$g_content);
			$g_author = $_POST['g_author'];
			$g_time = date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']);
			$g_guid = 0;

		$myconfig = new myconfig();
		$myconfig=$myconfig->myconfig();
		
		if(empty($_FILES['myfile']['type'])) { 
			$g_img = $_POST['myfile1'];
			} else { 

	//判断文件是否过大
	$filesize = $_FILES['myfile']['size'];
        //因为PHP.ini中配置了上传不能大于2M.所以传过来的文件大于2M将为空值.
	if(false == $filesize){			
			echo "<script type='text/javascript'>alert('文件过大,上传失败！');location.href='?c=article&a=index';</script>";
				exit;
	}
	
	//判断类型是否符合
	$filetype = $_FILES['myfile']['type'];
	if($filetype!='image/jpg' && $filetype!='image/pjpeg' && $filetype!='image/jpeg' && $filetype!='image/png' && $filetype!='image/gif' && $filetype!='application/octet-stream'){
			echo "<script type='text/javascript'>alert('文件类型必须是图片！');location.href='?c=article&a=index';</script>";
				exit;
	}
	
	//判断是否是上传的文件
	if (is_uploaded_file($_FILES['myfile']['tmp_name'])){
			//通过username创建目录,判断目录是否存在
			$user_path =$_SERVER['DOCUMENT_ROOT'].$myconfig['Uploads'];
      //通过iconv函数解决中文路径问题
			$user_path=iconv("utf-8","gb2312",$user_path);
			if (!file_exists($user_path)){
				mkdir($user_path);
			}
			//获取文件临时上传路径
			$uploaded_path = $_FILES['myfile']['tmp_name'];
			//获取文件后缀名, strrchr函数 — 从查找的字符最后出现位置开始，直到字符串末尾
			$fn_extension =strrchr($_FILES['myfile']['name'], ".");
			//获取目标位置,并重新创建文件名
			$move_path = $user_path."/".date("Ymd").date("YmdHis")."_".rand(1, 1000).$fn_extension;
			//移动文件
			if(false!=(move_uploaded_file($uploaded_path,$move_path))){
				$g_img = $move_path;
				$g_img = str_replace($_SERVER['DOCUMENT_ROOT'],"",$g_img);
				//echo "上传成功";
			}else{
				
			echo "<script type='text/javascript'>alert('上传失败！');location.href='?c=article&a=index';</script>";
				exit;
				
			}
	}
	
			} 
			if($_SESSION['loginua']==2){

		$g_imgurl = $_POST['g_imgurl'];
			}else{	

		$g_imgurl = $g_img;
			
			}
			

	
		$GModel = new articleModel();
		$dataok = $GModel->editarticle($g_id, $g_cid, $g_title, $g_tag, $g_des, $g_content, $g_author, $g_imgurl, $g_time, $g_guid);
		
		$GModel->addlog($loginusername.' 修改了文章 ['.$g_title.']。','操作日志',$loginusername);

			if($_SESSION['loginua']==2){
				

		if($dataok==1){
			echo "<script type='text/javascript'>alert('修改文章成功！');location.href='?c=article&a=index2';</script>";
		}else{
			echo "<script type='text/javascript'>alert('修改文章失败！');location.href='?c=article&a=index2';</script>";
		}
		
			
			}else{	

		if($dataok==1){
			echo "<script type='text/javascript'>alert('修改文章成功！');location.href='?c=article&a=index';</script>";
		}else{
			echo "<script type='text/javascript'>alert('修改文章失败！');location.href='?c=article&a=index';</script>";
		}
		
			
			}
			
			
		}
		
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=article&a=index';</script>";
		}
  }
  //删除文章
	function  delarticle(){
		$loginusername=check_login();
		
		if(isset($_GET['id'])&&$_GET['id']!=""){
		
		$g_id = $_GET['id'];
		$GModel = new articleModel();
		$dataok = $GModel->delarticle($g_id);
		
		$GModel->addlog($loginusername.' 删除了文章('.$g_id.')。','操作日志',$loginusername);

		if($dataok==1){
			echo "<script type='text/javascript'>alert('删除文章成功！');location.href='?c=article&a=index';</script>";
		}else{
			echo "<script type='text/javascript'>alert('删除文章失败！');location.href='?c=article&a=index';</script>";
		}
		
		}else{
			echo "<script type='text/javascript'>alert('参数错误！');location.href='?c=article&a=index';</script>";
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
		$pagesize=10; //每页显示的页数
		$page = new pageClass($count,$pagesize);
		$pageer=$page->getPage();
		
		if(isset($_GET['p'])){
			$page=$_GET['p'];
			}else $page=1;
			$sqlfirst=($page-1)*$pagesize;
		$datas = $GModel->search($key,$sqlfirst,$pagesize);
		$this->assign("datas",$datas);
		$this->assign("g_author",$_SESSION['nickname']);
		$this->assign("page",$pageer);
		
		if($_SESSION['loginua']==2){
		$this->display("admin_article2.php");
		}else{
		$this->display("admin_article.php");
		}
			
    }
}