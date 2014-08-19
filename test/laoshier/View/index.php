<?php defined('GTPHP_PATH') || exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(!empty($_GET['cid'])){ ?><?php foreach($Cdatas as $data){if($data["g_id"]==$_GET['cid']){ echo $data["g_name"];}} ?>_<?php } ?><?php echo $sitedatas['0']['g_configv'];?>_<?php echo $sitedatas['2']['g_configv'];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<!-- meta tags start -->
<meta name="Keywords" content="<?php echo $sitedatas['1']['g_configv'];?>" />
<meta name="Description" content="<?php echo $sitedatas['2']['g_configv'];?>" />
<!-- meta tags end -->

<!-- CSS files start -->
<link href="<?php echo __Static__;?>css/css.css" rel="stylesheet" type="text/css" media="all" />
<!-- CSS files end -->


</head>
<body><!-- website wrapper starts -->
<div class="websiteWrapper"> 

  <!-- page wrapper starts -->
  <div class="pageWrapper"> 
  	
    <!-- filterable portfolio menu starts -->
    <ul class="portfolioMenuWrapper" id="portfolioMenuWrapper"><?php foreach($Cdatas as $data){ ?>
      <li><a href="index.php?c=index&a=index&cid=<?php echo $data["g_id"];?>"<?php if(!empty($_GET['cid'])){ if($_GET['cid']==$data["g_id"]){ ?> class="currentPortfolioFilter"<?php }} ?>><?php echo $data["g_name"];?></a></li>

<?php } ?>
    </ul>
    <!-- filterable portfolio menu ends --> 
    
    <!-- blog posts wrapper starts -->
    <div class="blogPostsWrapper">
    	      <div class="smallPostWrapper">
      	<?php if(!empty($data["g_imgurl"])){ ?>
			<a href="" class="postThumbnailWrapper"><img src="<?php echo $data["g_imgurl"];?>" alt=""/></a>
			<?php } ?>
        <div class="postExcerptWrapper">    
      <!-- search form starts -->
      <form action="index.php?" method="get" class="errorSearchForm">
          <input type="hidden" name="c" value="index"/>
          <input type="hidden" name="a" value="search"/>
        <fieldset>
          <input type="text" name="key" value="" class="errorSearchFormField" id="errorSearchFormField"/>
          <input type="submit" value="Search" class="buttonWrapper errorSearchFormSubmitButton"/>
        </fieldset>
      </form>
      <!-- search form ends -->
    	      </div></div>
    	
    	<?php
foreach($datas as $data)
{
?>
      <!-- small blog post starts  -->
      <div class="smallPostWrapper">
      	<?php if(!empty($data["g_imgurl"])){ ?>
			<a href="" class="postThumbnailWrapper"><img src="<?php echo $data["g_imgurl"];?>" alt=""/></a>
			<?php } ?>
        <div class="postExcerptWrapper">    
          <h4 class="smallPostTitle"><a href="index.php?c=index&a=article&id=<?php echo $data["g_id"];?>"><?php echo $data["g_title"];?></a></h4>
          <p><?php echo StripSlashes($data["g_des"]);?>


</p>
        </div>
        <div class="smallPostInfoWrapper"><span class="singleIconWrapper singleIconText iconCalendarDark postInfo postDate postInfoNoMargin"><?php echo $data["g_time"];?> </span> &nbsp; <span class="singleIconWrapper singleIconText iconEditDark postInfo postAuthor postInfoNoMargin"><?php echo $data["g_author"];?></span>  <?php 
$listtags = $data["g_tag"]; 
$listtag = explode(',',$listtags); 
for($itag=0;$itag<count($listtag);$itag++){
?><a href="index.php?c=index&a=tags&tag=<?php echo $listtag[$itag];?>" class="smallPostMoreButton"><?php echo $listtag[$itag];?></a> 
<?php }?></div>
      </div>
      <!-- small blog post ends -->
                        <?php
}

?>
    </div>
    <!-- blog posts wrapper ends --> 
    
  </div>
  <!-- page wrapper ends --> 
  
  <!-- page numbers start -->
  <div class="pageNumbersWrapper"><?php echo $page;?></div>
  <!-- page numbers end --> 
  
  <!-- footer wrapper starts -->
  <div class="footerWrapper"> 
   <span class="copyright">&copy; copyright  <?php echo $sitedatas['0']['g_configv'];?>. Powered by <a href="http://goodtext.org/" style="color:#ffffff;">好文本网</a></span>
  </div>
  <!-- footer wrapper ends -->
  
</div>
<!-- website wrapper ends -->
</body>
</html>