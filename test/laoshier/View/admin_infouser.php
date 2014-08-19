<?php defined('GTPHP_PATH') || exit('Access Denied');?><?php include(__View__.'admin_header.php');?>
    <!-- page content wrapper starts -->
    <div class="pageContentWrapper"> 
      <!-- page title starts -->
      <h3 class="pageTitle">用户详细信息</h3>
      <!-- page title ends -->
            <div class="accordionContent">
            	帐户名称：<?php echo $datas["g_username"];?>
            </div>
            <div class="accordionContent">
            	用户昵称：<?php echo $datas["g_nickname"];?>
            </div>
            <div class="accordionContent">
            	电子邮箱：<?php echo $datas["g_email"];?>
            </div>
            <div class="accordionContent">
            	注册时间：<?php echo $datas['g_regdate']; ?>
            </div>
            <div class="accordionContent">
            	注册IP：<?php echo $datas["g_regip"];?>
            </div>
            <div class="accordionContent">
            	最后登陆时间：<?php echo $datas["g_last_login_time"];?>
            </div>
            <div class="accordionContent">
            	最后登陆IP：<?php echo $datas["g_last_login_ip"];?>
            </div>
            <div class="accordionContent">
            	登陆次数：<?php echo $datas["g_login_count"];?>
            </div>
            <div class="accordionContent">
            	备注信息：<?php echo $datas["g_remark"];?>
            </div>
    </div>
    <!-- page content wrapper ends --> 
    
  </div>
  <!-- page wrapper ends -->
  <?php include(__View__.'admin_footer.php');?>