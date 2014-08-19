<?php defined('GTPHP_PATH') || exit('Access Denied');?><?php include(__View__.'admin_header.php');?>
    <!-- page content wrapper starts -->
    <div class="pageContentWrapper"> 
    
      <h3 class="pageTitle">修改用户信息</h3>
         <!-- contact form starts -->
      <form action="?c=user&a=editpasssave&id=<?php echo $g_id;?>" method="post" class="contactForm">
        <fieldset>
          <div class="formFieldWrapper">
            <label for="contactNameField">旧的密码</label>
            <input type="password" name="g_passwordold" value="" class="contactField" />
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">帐户密码</label>
            <input type="password" name="g_password" value="" class="contactField" />
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">重复密码</label>
            <input type="password" name="g_password_again" value="" class="contactField" />
          </div>
          <div class="formSubmitButtonErrorsWrapper">
            <input type="submit" class="buttonWrapper contactSubmitButton" name="submit" value="修改"/>
          </div>
        </fieldset>
      </form>
      <!-- contact form ends -->
    </div>
    <!-- page content wrapper ends --> 
    
  </div>
  <!-- page wrapper ends -->
  <?php include(__View__.'admin_footer.php');?>