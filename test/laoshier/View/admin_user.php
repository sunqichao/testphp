<?php defined('GTPHP_PATH') || exit('Access Denied');?><?php include(__View__.'admin_header.php');?>
    <!-- page content wrapper starts -->
    <div class="pageContentWrapper"> 
    
      <!-- table starts -->
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>呢称</th>
            <th>Email</th>
            <th>管理</th>
          </tr>
        </thead>
        <tbody><?php
foreach($datas as $data)
{
?>
                        <tr>
                            <td><?php echo $data["g_id"];?></td>
                            <td><?php echo $data["g_username"];?></td>
                            <td><?php echo $data["g_nickname"];?></td>
                            <td><?php echo $data["g_email"];?></td>
                            <td><span> <a href="?c=user&a=infouser&id=<?php echo $data["g_id"];?>">详情</a> <a href="?c=user&a=edituser&id=<?php echo $data["g_id"];?>">修改</a> <a href="?c=user&a=edituserpass&id=<?php echo $data["g_id"];?>">改密</a> <a href="?c=user&a=deluser&id=<?php echo $data["g_id"];?>" onclick="return confirm('确定将此帐户删除?')">删除</a></span></td>
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
    
      <h3 class="pageTitle">添加用户</h3>
         <!-- contact form starts -->
      <form action="?c=user&a=adduser" method="post" class="contactForm">
        <fieldset>
          <div class="formFieldWrapper">
            <label for="contactNameField">帐户名称</label>
            <input type="text" name="g_username" value="" class="contactField" />
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">帐户密码</label>
            <input type="password" name="g_password" value="" class="contactField" />
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">重复密码</label>
            <input type="password" name="g_password_again" value="" class="contactField" />
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">用户昵称</label>
            <input type="text" name="g_nickname" value="" class="contactField" />
          </div>
          <div class="formFieldWrapper">
            <label for="contactNameField">电子邮箱</label>
            <input type="text" name="g_email" value="" class="contactField" />
          </div>
          <div class="formTextareaWrapper">
            <label for="contactMessageTextarea">备注信息:</label>
            <textarea name="g_remark" class="contactTextarea requiredField"></textarea>
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