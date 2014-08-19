<?php defined('GTPHP_PATH') || exit('Access Denied');?><?php include(__View__.'admin_header.php');?>
    <!-- page content wrapper starts -->
    <div class="pageContentWrapper"> 
    
      <!-- table starts -->
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>项目名称</th>
            <th>项目说明</th>
            <th>管理</th>
          </tr>
        </thead>
        <tbody><?php
foreach($datas as $data)
{
?>
                        <tr>
                            <td><?php echo $data["g_id"];?></td>
                            <td><?php echo $data["g_confign"];?></td>
                            <td><?php echo $data["g_configi"];?></td>
                            <td><span><a href="?c=diyconfig&a=edit&id=<?php echo $data["g_id"];?>">修改</a>
      <?php if($data["g_id"]<=3){ ?>
       <a href="#" onclick="return confirm('基础配置不能删除?')">删除</a>
			<?php }else{ ?>
       <a href="?c=diyconfig&a=del&id=<?php echo $data["g_id"];?>" onclick="return confirm('确定将此配置项删除?')">删除</a>
			<?php } ?></span></td>
                        </tr>
                        <?php
}

?>
        </tbody>
      </table>
      <!-- table ends -->
      <h3 class="pageTitle">添加配置项</h3>
         <!-- contact form starts -->
      <form action="?c=diyconfig&a=add" method="post" class="contactForm">
        <fieldset>
          <div class="formFieldWrapper">
            <label for="contactNameField">配置项名称</label>
            <input type="text" name="g_confign" value="" class="contactField" />
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">配置项说明</label>
            <input type="text" name="g_configi" value="" class="contactField" />
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