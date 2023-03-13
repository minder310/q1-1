<!-- 帳號登入頁api -->
<?php
include_once "../base.php";
dd($_POST);
$acc=$Admin->find(['acc'=>$_POST['acc']]);
if(empty($acc)){
    to("../index.php?do=login");
}else{
    if($acc['pw']==$_POST['pw']){
        $_SESSION['login']=$_POST['acc'];
        to("../back.php");       
    }else{
        to("../index.php?do=login");
    }
}