<?php defined('GTPHP_PATH') || exit('Access Denied');?><?php include(__View__.'admin_header.php');?>
    <!-- blog posts wrapper starts -->
    <div class="blogPostsWrapper"><?php
foreach($datas as $data)
{
?>
      <!-- small blog post starts  -->
      <div class="smallPostWrapper">
        <div class="postExcerptWrapper">
          <h4 class="smallPostTitle"><?php echo $data["g_type"];?></h4>
          <p><?php echo $data["g_message"];?> (IP:<?php echo $data["g_ip"];?> <?php echo $data["g_language"];?>)</p>
          <p><?php echo $data["g_agent"];?></p>
        </div>
        <div class="smallPostInfoWrapper"><span class="singleIconWrapper singleIconText iconCalendarDark postInfo postDate postInfoNoMargin"><?php echo $data["g_time"];?></span><a href="#" class="smallPostMoreButton"><?php echo $data["g_username"];?></a></div>
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
  <?php include(__View__.'admin_footer.php');?>