<?php
// 检测session是否正确
session_start();
if ($_SESSION['id'] === false) {
    header("location:login.php");//如果没有 id 则跳转到登录界面
}
echo "当前登录号码： {$_SESSION['id']} \n";
echo "当前登录操作员：{$_SESSION['auser']} \n";
