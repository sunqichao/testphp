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
    
      <!-- search form starts -->
      <form action="?" method="get" class="errorSearchForm">
          <input type="hidden" name="c" value="article"/>
          <input type="hidden" name="a" value="search"/>
        <fieldset>
          <input type="text" name="key" value="" class="errorSearchFormField" id="errorSearchFormField"/>
          <input type="submit" value="Search" class="buttonWrapper errorSearchFormSubmitButton"/>
        </fieldset>
      </form>
      <!-- search form ends -->

    </div>
    <!-- page content wrapper starts -->
    <div class="pageContentWrapper"> 
    
      <!-- table starts -->
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>文章标题</th>
            <th>管理</th>
          </tr>
        </thead>
        <tbody><?php
foreach($datas as $data)
{
?>
                        <tr>
                            <td><?php echo $data["g_id"];?></td>
                            <td style="text-align:left;padding-left:10px;"><a href="?c=index&a=article&id=<?php echo $data["g_id"];?>" target="_blank"><?php echo $data["g_title"];?></a></td>
                            <td><span><a href="?c=article&a=editarticle2&id=<?php echo $data["g_id"];?>">修改</a> <a href="?c=article&a=delarticle&id=<?php echo $data["g_id"];?>" onclick="return confirm('确定将此记录删除?')">删除</a></span></td>
                        </tr>
                        <?php
}

?>
        </tbody>
      </table>
      <!-- table ends -->
    </div>
    <!-- page content wrapper ends --> 
  <!-- page numbers start -->
  <div class="pageNumbersWrapper"><?php echo $page;?></div>
  <!-- page numbers end --> 
  
    <!-- page content wrapper starts -->
    <div class="pageContentWrapper"> 
    
      <h3 class="pageTitle">添加文章</h3>
         <!-- contact form starts -->
         
      <form action="?c=article&a=addarticle" enctype="multipart/form-data" method="post" class="contactForm">
        <fieldset>
          <div class="formFieldWrapper">
            <label for="contactNameField">文章分类</label>
            <select name="g_cid"><option value="">请选择文章分类</option><?php
foreach($Cdatas as $Cdata)
{
?>
            	<option value="<?php echo $Cdata["g_id"];?>"><?php echo $Cdata["g_name"];?></option>
                        <?php
}
?></select>
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">文章名称</label>
            <input type="text" name="g_title" value="" class="contactField" />
          </div>
          <div class="formTextareaWrapper">
            <label for="contactMessageTextarea">文章内容:</label>
            <textarea name="g_content" class="contactTextarea requiredField" style="height:300px;"></textarea>
          </div>

          <div class="formFieldWrapper">
            <label for="contactNameField">文章标签</label>
            <input type="text" name="g_tag" value="" class="contactField" />
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">文章简介</label>
            <textarea name="g_des" class="contactTextarea requiredField" style="height:80px;"></textarea>
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">文章作者</label>
            <input type="text" name="g_author" value="<?php echo $g_author;?>" class="contactField" />
          </div>
          <div class="formFieldWrapper">
          	
            <label for="contactNameField">封面图片</label>
          	<p style="width:100%"><input name="g_imgurl" type="text" id="url1" value="" style="margin-right:15px;float:left;width:40%" /> <input class="button" type="button" id="image1" value="选择图片" style="height:34px; float:left; width:100px;" /> <a href="#editpic" class="button button-red" style="height:34px; float:left; margin:0 0 0 10px;padding:6px; 15px; 6px; 15px;" target="_blank"> 修图 </a></p>

          </div>
          <div class="formSubmitButtonErrorsWrapper">
            <input type="submit" class="buttonWrapper contactSubmitButton" name="submit" value="添加文章"/>
          </div>
        </fieldset>
      </form>
      <!-- contact form ends -->   
      

    </div>
    <!-- page content wrapper ends --> 
    
  </div>
  <!-- page wrapper ends -->
  <?php include(__View__.'admin_footer.php');?>