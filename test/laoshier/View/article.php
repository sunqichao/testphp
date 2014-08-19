<?php defined('GTPHP_PATH') || exit('Access Denied');?><?php defined('GTPHP_PATH') || exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $adata["g_title"];?>_<?php echo $sitedatas['0']['g_configv'];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<!-- meta tags start -->
<meta name="Keywords" content="<?php echo $adata["g_tag"];?>" />
<meta name="Description" content="<?php echo $adata["g_des"];?>" />
<!-- meta tags end -->

<!-- CSS files start -->
<link href="<?php echo __Static__;?>css/css.css" rel="stylesheet" type="text/css" media="all" />
<!-- CSS files end -->

<!-- JavaScript files start -->
<!-- JavaScript files end -->
</head>
<body><!-- website wrapper starts -->
<div class="websiteWrapper"> 

  <!-- page wrapper starts -->
  <div class="pageWrapper"> 
  	
    <!-- filterable portfolio menu starts -->
    <ul class="portfolioMenuWrapper" id="portfolioMenuWrapper"><?php foreach($Cdatas as $data){ ?>
      <li><a href="index.php?c=index&a=index&cid=<?php echo $data["g_id"];?>"<?php if($adata["g_cid"]==$data["g_id"]){ ?> class="currentPortfolioFilter"<?php } ?>><?php echo $data["g_name"];?></a></li>

<?php } ?>
    </ul>
    <!-- filterable portfolio menu ends --> 
    
    <!-- post content wrapper starts -->
    <div class="singlePostContentWrapper"> 
      <!-- page title starts -->
      <h3 class="pageTitle"><?php echo $adata["g_title"];?></h3>
      <!-- page title ends -->
      <div class="pageSpacer"></div>
      	<?php if(!empty($adata["g_imgurl"])){ ?>
      <img src="<?php echo $adata["g_imgurl"];?>" class="largeImage" alt="<?php echo $adata["g_title"];?>"/>
			<a href="" class="postThumbnailWrapper"><img src="" alt=""/></a>
			<?php } ?>
      <p><?php echo StripSlashes($adata["g_content"]);?></p>
      <div class="textBreak"></div>
    </div>
    <!-- post content wrapper ends --> 
    <!-- post info starts -->
    <div class="singlePostInfoWrapper"><span class="singleIconWrapper singleIconText iconCalendarDark postInfo postDate"><?php echo $adata["g_time"];?></span> &nbsp; <span class="singleIconWrapper singleIconText iconEditDark postInfo postAuthor postInfoNoMargin"><?php echo $adata["g_author"];?></span> <?php 
$listtags = $adata["g_tag"]; 
$listtag = explode(',',$listtags); 
for($itag=0;$itag<count($listtag);$itag++){
?><a href="index.php?c=index&a=tags&tag=<?php echo $listtag[$itag];?>" class="smallPostMoreButton"><?php echo $listtag[$itag];?></a> 
<?php }?></div>
    <!-- post info ends --> 
    <!-- post links wrapper starts -->
    <div class="postLinksWrapper"> <a href="index.php?c=index&a=article&id=<?php echo $pdata["g_id"];?>" class="postLink previousPost">&laquo; <?php echo $pdata["g_title"];?></a> <a href="index.php?c=index&a=article&id=<?php echo $ndata["g_id"];?>" class="postLink nextPost"><?php echo $ndata["g_title"];?> &raquo;</a> </div>
    <!-- post links wrapper ends --> 
    <!-- comments section wrapper starts -->
    <div class="commentsSectionWrapper">
    </div>
    <!-- comments section wrapper ends --> 
    

  </div>
  <!-- page wrapper ends --> 
  <!-- footer wrapper starts -->
  <div class="footerWrapper"> 
   <span class="copyright">&copy; copyright  <?php echo $sitedatas['0']['g_configv'];?>.</span>
  </div>
  <!-- footer wrapper ends -->
  
</div>
<!-- website wrapper ends -->
</body>
</html>