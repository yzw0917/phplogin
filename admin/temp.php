<?php
// ���session�Ƿ���ȷ
session_start();
if ($_SESSION['id'] === false) {
    header("location:login.php");//���û�� id ����ת����¼����
}
echo "��ǰ��¼���룺 {$_SESSION['id']} \n";
echo "��ǰ��¼����Ա��{$_SESSION['auser']} \n";
