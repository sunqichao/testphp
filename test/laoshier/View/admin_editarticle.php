<?php defined('GTPHP_PATH') || exit('Access Denied');?><?php include(__View__.'admin_header.php');?>
    <!-- page content wrapper starts -->
    <div class="pageContentWrapper"> 
    
      <h3 class="pageTitle">修改文章</h3>
         <!-- contact form starts -->
      <form action="?c=article&a=editsave&id=<?php echo $datas["g_id"];?>" enctype="multipart/form-data" method="post" class="contactForm">
        <fieldset>
          <div class="formFieldWrapper">
            <label for="contactNameField">文章分类</label>
            <select name="g_cid"><option value="">请选择文章分类</option><?php
foreach($Cdatas as $Cdata)
{
?>
            	<option value="<?php echo $Cdata["g_id"];?>" <?php if($Cdata["g_id"]==$datas["g_cid"]){?>selected="selected"<?php }?>><?php echo $Cdata["g_name"];?></option>
                        <?php
}
?></select>
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">文章名称</label>
            <input type="text" name="g_title" value="<?php echo $datas["g_title"];?>" class="contactField" />
          </div>
          <div class="formTextareaWrapper">
            <label for="contactMessageTextarea">文章内容:</label>
            <textarea name="g_content" class="contactTextarea requiredField" style="height:200px;"><?php echo StripSlashes($datas["g_content"]);?></textarea>
          </div>

          <div class="formFieldWrapper">
            <label for="contactNameField">文章标签</label>
            <input type="text" name="g_tag" value="<?php echo $datas["g_tag"];?>" class="contactField" />
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">文章简介</label>
            <textarea name="g_des" class="contactTextarea requiredField" style="height:80px;"><?php echo $datas["g_des"];?></textarea>
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">文章作者</label>
            <input type="text" name="g_author" value="<?php echo $datas["g_author"];?>" class="contactField" />
          </div>
          <div class="formFieldWrapper">
          	<input type="hidden" name="myfile1" value="<?php echo $datas["g_imgurl"];?>" />
            <input type="file" name="myfile"/>
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