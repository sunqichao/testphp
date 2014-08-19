<?php defined('GTPHP_PATH') || exit('Access Denied');?><?php include(__View__.'admin_header.php');?>
    <!-- page content wrapper starts -->
    <div class="pageContentWrapper"> 
      <div class="textBreakBoth"></div>
      <h4 class="blockTitle">系统功能菜单:</h4>
      <!-- buttons start -->
      <p><a href="index.php?c=log&a=dellog" onclick="return confirm('确定将三天前的日志记录全部删除?')" class="buttonWrapper buttonRed">清除三天前的日志</a> <a href="index.php?c=diyconfig&a=index" class="buttonWrapper buttonGreen">自定义配置项</a> <a href="index.php?c=config&a=info" class="buttonWrapper buttonBlue">自定义信息</a> <a href="index.php?c=diyinfo&a=index" class="buttonWrapper buttonPink">自定义信息项管理</a> <!--<a href="" class="buttonWrapper buttonDefault buttonBolt">Button</a> <a href="" class="buttonWrapper buttonOrange buttonCalendar">Button</a> <a href="" class="buttonWrapper buttonRed buttonNo">Button</a> <a href="" class="buttonWrapper buttonGreen buttonCheckmark">Button</a> <a href="" class="buttonWrapper buttonBlue buttonLocation">Button</a> <a href="" class="buttonWrapper buttonPink buttonArrowRight">Button</a> --></p>


      <div class="pageSpacer"></div>
      <div class="pageSpacer"></div>
      <!-- buttons end -->
      <div class="textBreakBoth"></div><?php
foreach($datas as $data)
{
?>
      <!-- config form starts -->
      <form action="index.php?c=config&a=configsave" method="post" class="errorSearchForm">
          <input type="hidden" name="g_id" value="<?php echo $data["g_id"];?>"/>
          <input type="hidden" name="g_confign" value="<?php echo $data["g_confign"];?>"/>
          <input type="hidden" name="g_configi" value="<?php echo $data["g_configi"];?>"/>
        <fieldset>
          <input type="text" name="g_configv" value="<?php echo $data["g_configv"];?>" class="errorSearchFormField" id="errorSearchFormField" placeholder="<?php echo $data["g_confign"];?>"/>
          <input type="submit" name="submit" value="保存" class="buttonWrapper errorSearchFormSubmitButton"/>
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