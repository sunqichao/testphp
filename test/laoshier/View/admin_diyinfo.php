<?php defined('GTPHP_PATH') || exit('Access Denied');?><?php include(__View__.'admin_header.php');?>
    <!-- page content wrapper starts -->
    <div class="pageContentWrapper"> 
    
      <!-- table starts -->
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>自定义信息项名称</th>
            <th>管理</th>
          </tr>
        </thead>
        <tbody><?php
foreach($datas as $data)
{
?>
                        <tr>
                            <td><?php echo $data["g_id"];?></td>
                            <td><?php echo $data["g_name"];?></td>
                            <td><span><a href="?c=diyinfo&a=del&id=<?php echo $data["g_id"];?>" onclick="return confirm('确定将此分类及所属文章删除?')">删除</a></span></td>
                        </tr>
                        <?php
}

?>
        </tbody>
      </table>
      <!-- table ends -->
      <h3 class="pageTitle">添加自定义信息项</h3>
         <!-- contact form starts -->
      <form action="?c=diyinfo&a=add" method="post" class="contactForm">
        <fieldset>
          <div class="formFieldWrapper">
            <label for="contactNameField">自定义信息项名称</label>
            <input type="text" name="g_name" value="" class="contactField" />
          </div>
          <div class="formSubmitButtonErrorsWrapper">
            <input type="submit" class="buttonWrapper contactSubmitButton" name="submit" value="添加"/>
          </div>
        </fieldset>
      </form>
      <!-- contact form ends -->   

    </div>
    <!-- page content wrapper ends --> 
    
  </div>
  <!-- page wrapper ends -->
  <?php include(__View__.'admin_footer.php');?>