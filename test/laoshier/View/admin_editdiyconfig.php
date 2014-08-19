<?php defined('GTPHP_PATH') || exit('Access Denied');?><?php include(__View__.'admin_header.php');?>
    <!-- page content wrapper starts -->
    <div class="pageContentWrapper"> 

      <h3 class="pageTitle">修改配置项</h3>
         <!-- contact form starts -->
      <form action="?c=diyconfig&a=editsave" method="post" class="contactForm">
        <fieldset>
          <div class="formFieldWrapper">
            <label for="contactNameField">配置项名称</label>
          <input type="hidden" name="id" value="<?php echo $datas["g_id"];?>"/>
          <input type="hidden" name="g_configv" value="<?php echo $datas["g_configv"];?>"/>
            <input type="text" name="g_confign" value="<?php echo $datas["g_confign"];?>" class="contactField" />
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">配置项说明</label>
            <input type="text" name="g_configi" value="<?php echo $datas["g_configi"];?>" class="contactField" />
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