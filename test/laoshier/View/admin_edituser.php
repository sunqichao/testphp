<?php defined('GTPHP_PATH') || exit('Access Denied');?><?php include(__View__.'admin_header.php');?>
    <!-- page content wrapper starts -->
    <div class="pageContentWrapper"> 
    
      <h3 class="pageTitle">修改用户信息</h3>
         <!-- contact form starts -->
      <form action="?c=user&a=editsave&id=<?php echo $datas["g_id"];?>" method="post" class="contactForm">
        <fieldset>
          <div class="formFieldWrapper">
            <label for="contactNameField">帐户名称</label>
            <input type="text" name="g_username" value="<?php echo $datas["g_username"];?>" class="contactField" disabled />
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">用户昵称</label>
            <input type="text" name="g_nickname" value="<?php echo $datas["g_nickname"];?>" class="contactField" />
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">电子邮箱</label>
            <input type="text" name="g_email" value="<?php echo $datas["g_email"];?>" class="contactField" />
          </div>
          <div class="formTextareaWrapper">
            <label for="contactMessageTextarea">备注信息</label>
            <textarea name="g_remark" class="contactTextarea requiredField"><?php echo $datas["g_remark"];?></textarea>
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