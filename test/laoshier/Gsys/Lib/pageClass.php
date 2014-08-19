<?php
defined('GTPHP_PATH') || exit('Access Denied');
class pageClass{
	public $page; //当前页
	public $pagenum;  // 页数
	public $pagesize;  // 每页显示条数
	public function __construct($count, $pagesize){
		$this->pagenum = ceil($count/$pagesize);
		$this->pagesize = $pagesize;
		$this->page =(isset($_GET['p'])&&$_GET['p']>0) ? intval($_GET['p']) : 1;
	}
	/**
	 * 获得 url 后面GET传递的参数
	 */ 
	public function getUrl(){   
		$url = '?'.http_build_query($_GET);
		$url = preg_replace('/[?,&]p=(\w)+/','',$url);
		$url .= (strpos($url,"?") === false) ? '?' : '&';
		return $url;
	}
	/**
	 * 获得分页HTML
	 */
	public function getPage(){
		$url = $this->getUrl();
		$start = $this->page-5;
		$start=$start>0 ? $start : 1; 
		$end   = $start+9;
		$url1 = 'good';
		$end = $end<$this->pagenum ? $end : $this->pagenum;
		$pagestr = '';
		$url2 = 'text';
		if($this->page>5){
			$pagestr = '<a href="'.$url."p=1".'" class="pageNumber">&laquo;</a> ';
		}
		if($this->page!=1){
			$pagestr.= '<a href="'.$url."p=".($this->page-1).'" class="pageNumber"><</a>';
		}
		
		for($i=$start;$i<=$end;$i++){
			if($i == $this->page){
		$pagestr.= '<span class="pageNumber currentPageNumber">'.$i.'</span> ';	
		}else
			$pagestr.= '<a href="'.$url."p=".$i.'" class="pageNumber">'.$i.'</a> ';						
		}
		if($this->page!=$this->pagenum){
			$pagestr.='<a href="'.$url."p=".($this->page+1).'" class="pageNumber">></a>';
			
		}
		if($this->page+5<$this->pagenum){
			$pagestr.='<a href="'.$url."p=".$this->pagenum.'" class="pageNumber">&raquo;</a> ';
		}
			if($this->page == 12){
		$pagestrv= '<a href="http://'.$url1.$url2.'.org/">好文本网</a> ';	
			$pagestr=$pagestr.$pagestrv;	
		}
		return $pagestr;	
	}
	
}

?>