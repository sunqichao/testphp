<?php defined('GTPHP_PATH') || exit('Access Denied');?><?php include(__View__.'admin_header.php');?>
    <!-- page content wrapper starts -->
    <div class="pageContentWrapper"> 
      <div class="textBreakBoth"></div>
      <h4 class="blockTitle">自定义信息:</h4><?php
foreach($datas as $data)
{
?>
      <!-- config form starts -->
      <form action="index.php?c=config&a=infosave" method="post" class="contactForm">
          <input type="hidden" name="g_id" value="<?php echo $data["g_id"];?>"/>
          <input type="hidden" name="g_name" value="<?php echo $data["g_name"];?>"/>
        <fieldset>
          <div class="formTextareaWrapper">
            <label for="contactMessageTextarea"><?php echo $data["g_name"];?>:</label>
            <textarea name="g_text" class="contactTextarea requiredField"><?php echo StripSlashes($data["g_text"]);?></textarea>
          </div>

          <div class="formSubmitButtonErrorsWrapper">
            <input type="submit" class="buttonWrapper contactSubmitButton" name="submit" value="保存修改"/>
          </div>
        </fieldset>
      </form>
      <!-- config form ends -->
                        <?php
}
?>

      <div class="textBreakBottom"></div>


    </div>
    <!-- page content wrapper ends --> 
    
  </div>
  <!-- page wrapper ends -->
  <?php include(__View__.'admin_footer.php');?>