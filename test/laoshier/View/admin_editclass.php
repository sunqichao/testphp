<?php defined('GTPHP_PATH') || exit('Access Denied');?><?php include(__View__.'admin_header.php');?>
    <!-- page content wrapper starts -->
    <div class="pageContentWrapper"> 

      <h3 class="pageTitle">修改分类</h3>
         <!-- contact form starts -->
      <form action="?c=class&a=editsave&id=<?php echo $datas["g_id"];?>" method="post" class="contactForm">
        <fieldset>
          <div class="formFieldWrapper">
            <label for="contactNameField">分类名称</label>
            <input type="text" name="g_name" value="<?php echo $datas["g_name"];?>" class="contactField" />
          </div>
          <div class="formSubmitButtonErrorsWrapper">
            <input type="submit" class="buttonWrapper contactSubmitButton" name="submit" value="修改分类"/>
          </div>
        </fieldset>
      </form>
      <!-- contact form ends -->   
      

    </div>
    <!-- page content wrapper ends --> 
    
  </div>
  <!-- page wrapper ends -->
  <?php include(__View__.'admin_footer.php');?>