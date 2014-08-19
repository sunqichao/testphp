<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GMArticle - 好文本移动网站文章管理系统 - GoodText.Org</title>
<!-- CSS files start -->
<link href="<?php echo __Static__;?>css/css.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<!-- CSS files end -->
</head>
<body>
<!-- website wrapper starts -->
<div class="websiteWrapper"> 
  

  <!-- page wrapper starts -->
  <div class="pageWrapper"> 
  	
    <!-- filterable portfolio menu starts -->
    <ul class="portfolioMenuWrapper" id="portfolioMenuWrapper">
      <li><a href="index.php?c=admin&a=index">环境信息</a></li>
      <li><a href="index.php?c=log&a=index">操作日志</a></li>
      <li><a href="index.php?c=class&a=index">分类管理</a></li>
      <?php if($_SESSION['loginua']==2){ ?>
      <li><a href="index.php?c=article&a=index2">文章管理</a></li>
			<?php }else{ ?>
      <li><a href="index.php?c=article&a=index">文章管理</a></li>
			<?php } ?>
      <li><a href="index.php?c=user&a=index">用户管理</a></li>
      <li><a href="index.php?c=config&a=index">系统设置</a></li>
      <li><a href="index.php?c=login&a=logout">退出登录</a></li>
    </ul>
    <!-- filterable portfolio menu ends --> 
