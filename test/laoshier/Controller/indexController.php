<?php
defined('GTPHP_PATH') || exit('Access Denied');

class indexController extends Controller{
	function index(){
		$myconfig = new myconfig();
		$myconfig=$myconfig->myconfig();
		$GModel = new siteModel();
		$sitedatas = $GModel->config();
		$this->assign("sitedatas",$sitedatas);

		$Cdatas = $GModel->siteclass();
		$this->assign("Cdatas",$Cdatas);

		if(isset($_GET['cid'])&&$_GET['cid']!=""&&is_numeric($_GET['cid'])){
		$cid = $_GET['cid'];	
		$count = $GModel->countclass($cid);
		$pagesize=$myconfig['Pagesize']; //每页显示的页数
		$page = new pageClass($count,$pagesize);
		$pageer=$page->getPage();
		
		if(isset($_GET['p'])){
			$page=$_GET['p'];
			}else $page=1;
			$sqlfirst=($page-1)*$pagesize;
		$datas = $GModel->classarticle($cid,$sqlfirst,$pagesize);
		
		}else{
			
		$count = $GModel->countarticle();
		$pagesize=10; //每页显示的页数
		$page = new pageClass($count,$pagesize);
		$pageer=$page->getPage();
		
		if(isset($_GET['p'])){
			$page=$_GET['p'];
			}else $page=1;
			$sqlfirst=($page-1)*$pagesize;
		$datas = $GModel->article($sqlfirst,$pagesize);
		
		}    	

		$this->assign("datas",$datas);
		$this->assign("page",$pageer);
		
		$this->display("index.php");
    }
    
  //搜索key
    function search(){

		$GModel = new siteModel();
		$sitedatas = $GModel->config();
		$this->assign("sitedatas",$sitedatas);
		
		$Cdatas = $GModel->siteclass();
		$this->assign("Cdatas",$Cdatas);

		$key = htmldecode($_GET['key']);
		
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
		$this->assign("page",$pageer);
		$this->display("index.php");
    }
    
  //搜索tag
    function tags(){

		$GModel = new siteModel();
		$sitedatas = $GModel->config();
		$this->assign("sitedatas",$sitedatas);
		
		$Cdatas = $GModel->siteclass();
		$this->assign("Cdatas",$Cdatas);

		$tag = htmldecode($_GET['tag']);
		
		$count = $GModel->countstag($tag);
		$pagesize=10; //每页显示的页数
		$page = new pageClass($count,$pagesize);
		$pageer=$page->getPage();
		
		if(isset($_GET['p'])){
			$page=$_GET['p'];
			}else $page=1;
			$sqlfirst=($page-1)*$pagesize;
		$datas = $GModel->searchtag($tag,$sqlfirst,$pagesize);
		$this->assign("datas",$datas);
		$this->assign("page",$pageer);
		$this->display("index.php");
    }
    
	function article(){
							
		$id = $_GET['id'];	
		if(isset($id)&&$id!=""&&is_numeric($id)){

		$GModel = new siteModel();
		$sitedatas = $GModel->config();
		$this->assign("sitedatas",$sitedatas);
		
		$Cdatas = $GModel->siteclass();
		$this->assign("Cdatas",$Cdatas);
		
		$adata = $GModel->onearticle($id);
		$this->assign("adata",$adata);
		$pdata = $GModel->ponearticle($id);
		$this->assign("pdata",$pdata);
		$ndata = $GModel->nonearticle($id);
		$this->assign("ndata",$ndata);
		
		$this->display("article.php");
				
		}else{
			
	echo  <<< HTML
<!DOCTYPE HTML><html><head><meta charset="utf-8"><title>Access Denied！</title><style>* { font-family: verdana; font-size: 10pt; COLOR: gray; }b { font-weight: bold; }table { border: 1px solid gray;}td { text-align: center; padding: 25;}</style></head><body><center><br><br><br><br>Access Denied！<br><br><a href="http://goodtext.org/">好文本网</a><br><br><br><br></center></body></html> 
HTML;
    exit; 
		}    	

		
    }
}