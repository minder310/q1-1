<?php
include "../base.php";

// 將傳過來的id取出我要的資料。
$row=$Title->find($_POST['id']);

// 這邊是處理圖片區。
// 要是圖片存在
if(!empty($_FILES['img']['tmp_name'])){
    // 將圖片搬移到/upload/圖片名稱。
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['tmp_name']);
    // 更新圖片名稱資料。
    $row['img']=$_FILES['img']['name'];
    // 從新存回資料庫。
    $Title->save($row);
}