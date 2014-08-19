<?php defined('GTPHP_PATH') || exit('Access Denied');?><?php include(__View__.'admin_header.php');?>
	<link rel="stylesheet" href="<?php echo __Plugins__;?>kindeditor/themes/default/default.css" />
	<link rel="stylesheet" href="<?php echo __Plugins__;?>kindeditor/plugins/code/prettify.css" />
	<script charset="utf-8" src="<?php echo __Plugins__;?>kindeditor/kindeditor.js"></script>
	<script charset="utf-8" src="<?php echo __Plugins__;?>kindeditor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="<?php echo __Plugins__;?>kindeditor/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor = K.create('textarea[name="g_content"]', {
				cssPath : '<?php echo __Plugins__;?>kindeditor/plugins/code/prettify.css',
				uploadJson : '<?php echo __Plugins__;?>JSON/upload_json.php',
				fileManagerJson : '<?php echo __Plugins__;?>JSON/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=contactform]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=contactform]')[0].submit();
					});
				}
			});
			prettyPrint();
				K('#image1').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							imageUrl : K('#url1').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('a[href="\\#editpic"]').attr('href','/phpimageeditor/editimage.php?imagesrc=..'+url);
								K('#url1').val(url);
								editor.hideDialog();
							}
						});
					});
				});
		});
	</script>

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
            <textarea name="g_content" class="contactTextarea requiredField" style="height:300px;"><?php echo StripSlashes($datas["g_content"]);?></textarea>
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
          	<label for="contactNameField">封面图片</label>
          	<p style="width:100%"><input name="g_imgurl" type="text" id="url1" value="<?php echo $datas["g_imgurl"];?>" style="margin-right:15px;float:left;width:40%" /> <input class="button" type="button" id="image1" value="选择图片" style="height:34px; float:left; width:100px;" /> <a href="#editpic" class="button button-red" style="height:34px; float:left; margin:0 0 0 10px;padding:6px; 15px; 6px; 15px;" target="_blank"> 修图 </a></p>

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