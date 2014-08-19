<?php defined('GTPHP_PATH') || exit('Access Denied');?><?php include(__View__.'admin_header.php');?>
    <!-- page content wrapper starts -->
    <div class="pageContentWrapper"> 
      <!-- page title starts -->
      <h3 class="pageTitle">服务器信息</h3>
      <!-- page title ends --><?php
$sysos = $_SERVER["SERVER_SOFTWARE"];      //获取服务器标识的字串
$sysversion = PHP_VERSION;                   //获取PHP服务器版本
//从服务器中获取GD库的信息
if(function_exists("gd_info")){                  
$gd = gd_info();
$gdinfo = $gd['GD Version'];
}else {
$gdinfo = "未知";
}
//从GD库中查看是否支持FreeType字体
$freetype = $gd["FreeType Support"] ? "支持" : "不支持";
//从PHP配置文件中获得是否可以远程文件获取
$allowurl= ini_get("allow_url_fopen") ? "支持" : "不支持";
//从PHP配置文件中获得最大上传限制
$max_upload = ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled";
//从PHP配置文件中获得脚本的最大执行时间
$max_ex_time= ini_get("max_execution_time")."秒";
?>
            <div class="accordionContent">
            	系统时间：<?php echo date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']); ?>
            </div>
            <div class="accordionContent">
            	Web服务器：<?php echo $sysos; ?>
            </div>
            <div class="accordionContent">
            	PHP版本：<?php echo $sysversion; ?>
            </div>
            <div class="accordionContent">
            	数据库：<?php echo $mydatainfo['driver']; ?>
            </div>
            <div class="accordionContent">
            	数据库版本：<?php echo $mydatainfo['version']; ?>
            </div>
            <div class="accordionContent">
            	GD库版本：<?php echo $gdinfo; ?>
            </div>
            <div class="accordionContent">
            	FreeType：<?php echo $freetype; ?>
            </div>
            <div class="accordionContent">
            	远程文件获取：<?php echo $allowurl; ?>
            </div>
            <div class="accordionContent">
            	最大上传限制：<?php echo $max_upload; ?>
            </div>
            <div class="accordionContent">
            	最大执行时间：<?php echo $max_ex_time; ?>
            </div>
    </div>
    <!-- page content wrapper ends --> 
    
  </div>
  <!-- page wrapper ends --> 
  <?php include(__View__.'admin_footer.php');?>