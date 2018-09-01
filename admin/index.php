<!DOCTYPE html>
<?php
include ('check.php');
echo "当前ID： {$_SESSION['id']} <br>";
echo "当前登录操作员：{$_SESSION['auser']} <br>";
?>
<head>
    <title>学生信息 管理</title>
    <script>
        function doDel(id) {
            if (confirm("确定要删除么？")) {
                window.location = 'action.php?action=del&id='+id;
            }
        }
    </script>
</head>
<body>
<center>
     
    <?php
        include_once("menu.php");
           ?>
        
      <h3>浏览学生信息</h3>
    <table width="600" border="1">
        <tr>
            <th>ID</th>
            <th>姓名</th>
            <th>性别</th>
            <th>年龄</th>
            <th>班级</th>
            <th>操作</th>
        </tr>
        <?php
        //1.连接数据库
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=test;", "root", "root");
        } catch (PDOException $e) {
            die("数据库连接失败" . $e->getMessage());
        }
        //2.解决中文乱码问题
        $pdo->query("SET NAMES 'utf8'");
        //3.执行sql语句，并实现解析和遍历
        $sql = "SELECT * FROM stu ";
        foreach ($pdo->query($sql) as $row) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['sex']}</td>";
            echo "<td>{$row['age']}</td>";
            echo "<td>{$row['classid']}</td>";
            echo "<td>
                    <a href='javascript:doDel({$row['id']})'>删除</a>
                    <a href='edit.php?id=({$row['id']})'>修改</a>
                  </td>";
            echo "</tr>";
        }

        ?>

    </table>


   <?php
// 检测访问者的ip，内网无法显示
   print "您的IP地址是：";


   if(!empty($_SERVER["HTTP_CLIENT_IP"])){
       $cip = $_SERVER["HTTP_CLIENT_IP"];
   }
   elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
       $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
   }
   elseif(!empty($_SERVER["REMOTE_ADDR"])){
       $cip = $_SERVER["REMOTE_ADDR"];
   }
   else{
       $cip = "无法获取！";
   }
   print $cip;

   ?>

</center>

</body>
</html>
