<?php
//1.�������ݿ�
try {
    $pdo = new PDO("mysql:host=localhost;dbname=test;", "root", "root");

} catch (PDOException $e) {
    die("���ݿ�����ʧ��" . $e->getMessage());
}
//2.��ֹ��������
$pdo->query("SET NAMES 'UTF-8'");
//3.ͨ��action��ֵ���ж�Ӧ����
 switch ($_GET['action'])  {
    case 'add':{   //���Ӳ���
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $classid = $_POST['classid'];

        //дsql���
        $sql = "INSERT INTO stu VALUES (NULL ,'{$name}','{$sex}','{$age}','{$classid}')";
        $rw = $pdo->exec($sql);
        if ($rw > 0) {
            echo "<script> alert('���ӳɹ�');
                            window.location='index.php'; //��ת����ҳ
                 </script>";
        } else {
            echo "<script> alert('����ʧ��');
                            window.history.back(); //������һҳ
                 </script>";
        }
        break;
    }
    case "del": {    //1.��ȡ����Ϣ
        $id = $_GET['id'];
        $sql = "DELETE FROM stu WHERE id={$id}";
        $pdo->exec($sql);
        header("Location:index.php");//��ת����ҳ
        break;
    }
    case "edit" :{   //1.��ȡ����Ϣ
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $classid = $_POST['classid'];
        $age = $_POST['age'];

        $sql = "UPDATE stu SET name='{$name}',sex='{$sex}',age='{$age}',classid='{$classid}' WHERE id='{$id}'";
        $rw=$pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('�޸ĳɹ�');window.location='index.php'</script>";
        }else{
            echo "<script>alert('�޸�ʧ��');window.history.back()</script>";
        }


        break;
    }

}

