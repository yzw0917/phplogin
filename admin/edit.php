<?php
include ('check.php');
echo "当前登录号码： {$_SESSION['id']} \n";
echo "当前登录操作员：{$_SESSION['auser']} \n";
?>
<html>
<head>
       <title>修改</title>

</head>
<body>
<center>
    <?php
    include_once"menu.php";
    //1.�������ݿ�
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=test;","root","root");
    }catch(PDOException $e){
        die("���ݿ�����ʧ��".$e->getMessage());
    }
    //2.��ֹ��������
    $pdo->query("SET NAMES 'UTF8'");
    //3.ƴ��sql��䣬ȡ����Ϣ
    $sql = "SELECT * FROM stu WHERE id =".$_GET['id'];
    $stmt = $pdo->query($sql);//����Ԥ�������
    if($stmt->rowCount()>0){
        $stu = $stmt->fetch(PDO::FETCH_ASSOC);//���չ���������н���
    }else{
        die("û��Ҫ�޸ĵ����ݣ�");
    }
    ?>
    <form id="addstu" name="editstu" method="post" action="action.php?action=edit">
        <input type="hidden" name="id" id="id" value="<?php echo $stu['id'];?>"/>
        <table>
            <tr>
                <td>姓名</td>
                <td><input id="name" name="name" type="text" value="<?php echo $stu['name']?>"/></td>

            </tr>
            <tr>
                <td>性别</td>
                <td><input type="radio" name="sex" value="m" <?php echo ($stu['sex']=="m")? "checked" : ""?>/>&nbsp;男
                    <input type="radio" name="sex" value="w"  <?php echo ($stu['sex']=="w")? "checked" : ""?>/>&nbsp;女
                </td>
            </tr>
            <tr>
                <td>年龄</td>
                <td><input type="text" name="age" id="age" value="<?php echo $stu['age']?>"/></td>
            </tr>
            <tr>
                <td>班级</td>
                <td><input id="classid" name="classid" type="text" value="<?php echo $stu['classid']?>"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="提交"/>&nbsp;&nbsp;
                    <input type="reset" value="清除"/>
                </td>
            </tr>
        </table>

    </form>



</center>
</body>
</html>

