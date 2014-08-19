<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <title>好文本移动网站文章管理系统GMArticle v1.0自动安装</title>
    <style type="text/css">
        table{max-width:100%;background-color:transparent;border-collapse:collapse;border-spacing:0;}.table{width:100%;margin-bottom:20px;}.table th,.table td{padding:8px;line-height:20px;text-align:left;vertical-align:middle;border-top:1px solid #dddddd;}.table-bordered{border:1px solid #dddddd;border-collapse:separate;*border-collapse:collapse;border-left:0;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;}.table-bordered th,.table-bordered td{border-left:1px solid #dddddd;}.table-bordered caption+thead tr:first-child th,.table-bordered caption+tbody tr:first-child th,.table-bordered caption+tbody tr:first-child td,.table-bordered colgroup+thead tr:first-child th,.table-bordered colgroup+tbody tr:first-child th,.table-bordered colgroup+tbody tr:first-child td,.table-bordered thead:first-child tr:first-child th,.table-bordered tbody:first-child tr:first-child th,.table-bordered tbody:first-child tr:first-child td{border-top:0;}.table-bordered thead:first-child tr:first-child>th:first-child,.table-bordered tbody:first-child tr:first-child>td:first-child,.table-bordered tbody:first-child,tr:first-child>th:first-child{-webkit-border-top-left-radius:4px;-moz-border-radius-topleft:4px;border-top-left-radius:4px;}.table-bordered thead:first-child tr:first-child>th:last-child,.table-bordered tbody:first-child tr:first-child>td:last-child,.table-bordered tbody:first-child tr:first-child>th:last-child{-webkit-border-top-right-radius:4px;-moz-border-radius-topright:4px;border-top-right-radius:4px;}.table-bordered thead:last-child tr:last-child>th:first-child,.table-bordered tbody:last-child tr:last-child>td:first-child,.table-bordered tbody:last-child tr:last-child>th:first-child,.table-bordered tfoot:last-child tr:last-child>td:first-child,.table-bordered tfoot:last-child tr:last-child>th:first-child{-webkit-border-bottom-left-radius:4px;-moz-border-radius-bottomleft:4px;border-bottom-left-radius:4px;}input{width:200px;background-color:#fff;border:1px solid #ccc;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,0.075);-moz-box-shadow:inset 0 1px 1px rgba(0,0,0,0.075);box-shadow:inset 0 1px 1px rgba(0,0,0,0.075);-webkit-transition:border linear .2s,box-shadow linear .2s;-moz-transition:border linear .2s,box-shadow linear .2s;-o-transition:border linear .2s,box-shadow linear .2s;transition:border linear .2s,box-shadow linear .2s;}select,textarea,input[type="text"],input[type="password"]{display:inline-block;height:20px;padding:4px 6px;margin:1px 0;font-size:14px;line-height:20px;color:#555;vertical-align:middle;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;}select{width:70px;background-color:#fff;border:1px solid #ccc;height:30px;}.btn{display:inline-block;*display:inline;*zoom:1;padding:4px 12px;margin-bottom:0;font-size:14px;line-height:20px;text-align:center;vertical-align:middle;cursor:pointer;text-shadow:0 1px 1px rgba(255,255,255,0.75);border-radius:4px;*margin-left:.3em;-webkit-box-shadow:inset 0 1px 0 rgba(255,255,255,.2),0 1px 2px rgba(0,0,0,.05);-moz-box-shadow:inset 0 1px 0 rgba(255,255,255,.2),0 1px 2px rgba(0,0,0,.05);box-shadow:inset 0 1px 0 rgba(255,255,255,.2),0 1px 2px rgba(0,0,0,.05);}.btn-success{color:#ffffff;text-shadow:0 -1px 0 rgba(0,0,0,0.25);background-color:#5bb75b;background-image:-moz-linear-gradient(top,#62c462,#51a351);background-image:-webkit-gradient(linear,0 0,0 100%,from(#62c462),to(#51a351));background-image:-webkit-linear-gradient(top,#62c462,#51a351);background-image:-o-linear-gradient(top,#62c462,#51a351);background-image:linear-gradient(to bottom,#62c462,#51a351);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff62c462',endColorstr='#ff51a351',GradientType=0);border-color:#51a351 #51a351 #387038;border-color:rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);*background-color:#51a351;filter:progid:DXImageTransform.Microsoft.gradient(enabled = false);}
        span.fred {color:red;}
    </style>
</head>
<body>    <?php

class DbManage {
    var $db; // 数据库连接
    var $database; // 所用数据库
    var $sqldir; // 数据库备份文件夹
    // 换行符
    private $ds = "\n";
    // 存储SQL的变量
    public $sqlContent = "";
    // 每条sql语句的结尾符
    public $sqlEnd = ";";

    /**
     * 初始化
     *
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $database
     * @param string $charset
     */
    function __construct($host = 'localhost', $username = 'root', $password = '', $database = 'test', $charset = 'utf8') {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->charset = $charset;
        set_time_limit(0);//无时间限制
@ob_end_flush();
        // 连接数据库
        $this->db = @mysql_connect ( $this->host, $this->username, $this->password ) or die( '<p class="dbDebug"><span class="err">Mysql Connect Error : </span>'.mysql_error().'</p>');
        // 选择使用哪个数据库
        mysql_select_db ( $this->database, $this->db ) or die('<p class="dbDebug"><span class="err">Mysql Connect Error:</span>'.mysql_error().'</p>');
        // 数据库编码方式
        mysql_query ( 'SET NAMES ' . $this->charset, $this->db );

    }

    /*
     * 新增查询数据库表
     */
    function getTables() {
        $res = mysql_query ( "SHOW TABLES" );
        $tables = array ();
        while ( $row = mysql_fetch_array ( $res ) ) {
            $tables [] = $row [0];
        }
        return $tables;
    }


    //  及时输出信息
    private function _showMsg($msg,$err=false){
        $err = $err ? "<span class='err'>ERROR:</span>" : '' ;
        echo "<p class='dbDebug'>".$err . $msg."</p>";
        flush();

    }


    function restore($sqlfile) {
        // 检测文件是否存在
        if (! file_exists ( $sqlfile )) {
            $this->_showMsg("sql文件不存在！请检查",true);
            exit ();
        }
        $this->lock ( $this->database );
        // 获取数据库存储位置
        $sqlpath = pathinfo ( $sqlfile );
        $this->sqldir = $sqlpath ['dirname'];
        // 检测是否包含分卷，将类似20120516211738_all_v1.sql从_v分开,有则说明有分卷
        $volume = explode ( "_v", $sqlfile );
        $volume_path = $volume [0];
        $this->_showMsg("请勿刷新及关闭浏览器以防止数据库结构受损");
        $this->_showMsg("正在导入数据，请稍等！");
        if (empty ( $volume [1] )) {
            $this->_showMsg ( "正在导入sql：<span class='imp'>" . $sqlfile . '</span>');
            // 没有分卷
            if ($this->_import ( $sqlfile )) {
                $this->_showMsg( "数据库导入成功！");
            } else {
                 $this->_showMsg('数据库导入失败！',true);
                exit ();
            }
        } else {
            // 存在分卷，则获取当前是第几分卷，循环执行余下分卷
            $volume_id = explode ( ".sq", $volume [1] );
            // 当前分卷为$volume_id
            $volume_id = intval ( $volume_id [0] );
            while ( $volume_id ) {
                $tmpfile = $volume_path . "_v" . $volume_id . ".sql";
                // 存在其他分卷，继续执行
                if (file_exists ( $tmpfile )) {
                    // 执行导入方法
                    $this->msg .= "正在导入分卷 $volume_id ：<span style='color:#f00;'>" . $tmpfile . '</span><br />';
                    if ($this->_import ( $tmpfile )) {

                    } else {
                        $volume_id = $volume_id ? $volume_id :1;
                        exit ( "导入分卷：<span style='color:#f00;'>" . $tmpfile . '</span>失败！可能是数据库结构已损坏！请尝试从分卷1开始导入' );
                    }
                } else {
                    $this->msg .= "此分卷备份全部导入成功！<br />";
                    return;
                }
                $volume_id ++;
            }
        }
    }

    /**
     * 将sql导入到数据库（普通导入）
     *
     * @param string $sqlfile
     * @return boolean
     */
    private function _import($sqlfile) {
        // sql文件包含的sql语句数组
        $sqls = array ();
        $f = fopen ( $sqlfile, "rb" );
        // 创建表缓冲变量
        $create_table = '';
        while ( ! feof ( $f ) ) {
            // 读取每一行sql
            $line = fgets ( $f );
            // 这一步为了将创建表合成完整的sql语句
            // 如果结尾没有包含';'(即为一个完整的sql语句，这里是插入语句)，并且不包含'ENGINE='(即创建表的最后一句)
            if (! preg_match ( '/;/', $line ) || preg_match ( '/ENGINE=/', $line )) {
                // 将本次sql语句与创建表sql连接存起来
                $create_table .= $line;
                // 如果包含了创建表的最后一句
                if (preg_match ( '/ENGINE=/', $create_table)) {
                    //执行sql语句创建表
                    $this->_insert_into($create_table);
                    // 清空当前，准备下一个表的创建
                    $create_table = '';
                }
                // 跳过本次
                continue;
            }
            //执行sql语句
            $this->_insert_into($line);
        }
        fclose ( $f );
        return true;
    }

    //插入单条sql语句
    private function _insert_into($sql){
        if (! mysql_query ( trim ( $sql ) )) {
            $this->msg .= mysql_error ();
            return false;
        }
    }

    /*
     * -------------------------------数据库导入end---------------------------------
     */

    // 关闭数据库连接
    private function close() {
        mysql_close ( $this->db );
    }

    // 锁定数据库，以免备份或导入时出错
    private function lock($tablename, $op = "WRITE") {
        if (mysql_query ( "lock tables " . $tablename . " " . $op ))
            return true;
        else
            return false;
    }

    // 解锁
    private function unlock() {
        if (mysql_query ( "unlock tables" ))
            return true;
        else
            return false;
    }

    // 析构
    function __destruct() {
        if($this->db){
            mysql_query ( "unlock tables", $this->db );
            mysql_close ( $this->db );
        }
    }

}

if(isset($_POST['gamyserver'])) {
 

    //创建文件 $fileName 文件名 $value 内容
    function installFile($fileName, $value)
    {
        if(!file_exists($fileName)) {
            is_dir(dirname($fileName)) || installdir(dirname($fileName));
            file_put_contents($fileName, $value) || die('创建文件'.$fileName.'失败.');            
        }
    }
    
    /**
     * 创建目录
     *
     * @param string $dirs 要创建的目录名 支持传入数组
     */
    function installdir($dirs)
    {
        if(is_array($dirs)) {
            foreach ($dirs as $dir){
                if(!file_exists($dir)) {
                    mkdir($dir, 0700, true) || die('创建目录'.$dir.'失败');
                }
            }
        } else {
            if(!file_exists($dirs)) {
                mkdir($dirs, 0700, true) || die('创建目录'.$dirs.'失败');
            }
        } 
    }
    if(empty($_POST['gamyserver'])){ 
        echo "数据库IP为空";
        echo " <a href='install.php'>返回</a>";
        exit ();
    };
    if(empty($_POST['gamydatabase'])){ 
        echo "数据库名为空";
        echo " <a href='install.php'>返回</a>";
        exit ();
    };
    if(empty($_POST['gamyuser'])){ 
        echo "数据库用户名为空";
        echo " <a href='install.php'>返回</a>";
        exit ();
    };
    if(empty($_POST['gamypassword'])){ 
        echo "数据库密码为空";
        echo " <a href='install.php'>返回</a>";
        exit ();
    };
$configStr1=<<<st
<?php
defined('GTPHP_PATH') || exit('Access Denied');
// 系统基本配置 **********************************************
\$Config['UrlControllerName'] = 'c';         // 自定义控制器名称 例如: index.php?c=index
\$Config['UrlActionName'] = 'a';             // 自定义方法名称 例如: index.php?c=index&a=IndexAction      
\$Config['Gdebug'] = 'false';         // 报告错误 true为报告错误 false不报告

class myconfig{
    public function myconfig(){
    \$myconfig=array(
    'Uploads' => '/Static/Uploads/image',
    'Pagesize' => '10'
    );
    return \$myconfig;
} 
public function mydbconfig(){
\$dbconfig=array(
 // required
'database_type' =>'mysql', \n
st;
$configStr2=<<<st
);
return \$dbconfig;
}}
st;
$installconfig="";
$installconfig.="'server' =>";
$installconfig.="'".$_POST['gamyserver']."', //数据库所在IP，如果是本地，默认localhost \n";
$installconfig.="'database_name' =>";
$installconfig.="'".$_POST['gamydatabase']."', //数据库名 \n";
$installconfig.="'username' =>";
$installconfig.="'".$_POST['gamyuser']."', //数据库用户名 \n";
$installconfig.="'password' =>";
$installconfig.="'".$_POST['gamypassword']."' //数据库密码 \n";
$configStr=$configStr1.$installconfig.$configStr2;

$ConfigFile='Gsys/Config.php';
installFile($ConfigFile, $configStr);//创建正式配置文件
//分别是主机，用户名，密码，数据库名，数据库编码
$db = new DBManage ($_POST['gamyserver'],$_POST['gamyuser'],$_POST['gamypassword'], $_POST['gamydatabase'], 'utf8' );
//参数：sql文件
$db->restore ( './sql/GMArticle.sql');
echo '安装成功!';
echo " <a href='index.php?c=login&a=index'>进入后台管理登陆界面</a>";
$file = "install.php";  
if (file_exists($file)) {  
     @unlink ($file);  
}  
}else{
?>
<form method="post" name="install">
    <table class="table table-bordered" style=" width:700px; margin:50px auto;">
        <tr>
            <td colspan="2" style="text-align:center"><h2>安装</h2></td>
        </tr>
        <tr>
            <td width="332">操作系统</td>
            <td><?php echo PHP_OS; ?></td>
        </tr>
        <tr>
            <td>PHP 版本</td>
            <td><?php echo PHP_VERSION; ?></td>
        </tr>
        <tr>
            <td>附件上传大小</td>
            <td><?php echo @ini_get('file_uploads') ? ini_get('upload_max_filesize') : 0; ?></td>
        </tr>
        <tr>
            <td>GD 库</td>
            <td><?php $gd_info = gd_info();
 echo $gd_info['GD Version'];
unset($gd_info); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                检查读写权限
            </td>
        </tr><?php 
// 目录、文件读写权限检查
$check_dirs = array(
        'Static/Uploads',
        'Gsys'
        );
 ?> <?php
                foreach($check_dirs as $v):
                $path = ''.$v;
                ?>
                <tr>
                    <td> <?php echo './'.$v; ?> </td>
                    <?php
                    if(file_exists($path) && is_writable($path)) {
                        echo '<td> 可写 </td>';
                    } else {
                        echo '<td> 不可写 </td>';
                    }
                    ?>
                </tr>
                <?php endforeach; ?>
        <tr>
            <td colspan="2" style="text-align:center;">
                数据库连接配置
            </td>
        </tr>
        <tr>
            <td>服务器名</td>
            <td><input type="text" name="gamyserver" value="localhost"></td>
        </tr>
        <tr>
            <td>数据库名</td>
            <td><input type="text" name="gamydatabase" value=""></td>
        </tr>
        <tr>
            <td>数据库用户名</td>
            <td><input type="text" name="gamyuser" value=""></td>
        </tr>
        <tr>
            <td>数据库密码</td>
            <td><input type="text" name="gamypassword" value=""></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <input type="submit" value="开始安装" class="btn btn-success"/>
            </td>
        </tr>
    </table>
</form>

</body>
</html>

<?php
}

?>