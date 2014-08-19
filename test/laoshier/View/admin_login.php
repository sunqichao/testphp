<?php defined('GTPHP_PATH') || exit('Access Denied');?><!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GMArticle - 好文本移动网站文章管理系统 - GoodText.Org</title>
<!-- CSS files start -->
<link href="<?php echo __Static__;?>css/css.css" rel="stylesheet" type="text/css" media="all" />
<!-- CSS files end -->
</head>
<body>
<!-- website wrapper starts -->
<div class="websiteWrapper"> 
  

  <!-- page wrapper starts -->
  <div class="pageWrapper"> 

    <!-- page content wrapper starts -->
    <div class="pageContentWrapper"> 
    
      <h3 class="pageTitle">登陆</h3>
         <!-- contact form starts -->
      <form action="?c=login&a=loginck" method="post" class="contactForm">
        <fieldset>
          <div class="formFieldWrapper">
            <label for="contactNameField">用户帐号</label>
            <input type="text" name="g_username" value="" class="contactField" />
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">帐户密码</label>
            <input type="password" name="g_password" value="" class="contactField" />
          </div>
          <div class="formFieldWrapper"><?php
    $agent = strtolower($_SERVER['HTTP_USER_AGENT']);  
    $is_pc = (strpos($agent, 'windows nt')) ? true : false;  
    $is_iphone = (strpos($agent, 'iphone')) ? true : false;  
    $is_ipad = (strpos($agent, 'ipad')) ? true : false;  
    $is_android = (strpos($agent, 'android')) ? true : false; 
    
    if ($is_iphone) {
        ?>
        <input type="radio" name="loginuseragent" value="1" style="vertical-align:middle" checked /><span style="margin-right:12px;">iPhone登陆</span>
        <?php  
    	} elseif ($is_ipad) {
        ?>
        <input type="radio" name="loginuseragent" value="1" style="vertical-align:middle" checked /><span style="margin-right:12px;">iPad登陆</span>
        <?php  
    	} elseif ($is_android) {
        ?>
        <input type="radio" name="loginuseragent" value="1" style="vertical-align:middle" checked /><span style="margin-right:12px;">Android登陆</span>
        <?php  
    		} else {
?> 
        <input type="radio" name="loginuseragent" value="1" style="vertical-align:middle" /><span style="margin-right:12px;">手机登陆</span>
<?php
    			}

    if($is_pc){ 
?> 
        <input type="radio" name="loginuseragent" value="2" style="vertical-align:middle" checked /><span style="margin-right:12px;">电脑登陆</span>
<?php
    } else {  
?>
        <input type="radio" name="loginuseragent" value="2" style="vertical-align:middle" /><span style="margin-right:12px;">电脑登陆</span>
<?php
    }
?>          </div>
          <div class="formSubmitButtonErrorsWrapper">
            <input type="submit" class="buttonWrapper contactSubmitButton" name="submit" value="登陆"/>
          </div>
        </fieldset>
      </form>
      <!-- contact form ends -->
    </div>
    <!-- page content wrapper ends --> 
    
  </div>
  <!-- page wrapper ends -->
  <?php include(__View__.'admin_footer.php');?>