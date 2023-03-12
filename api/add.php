<!-- 新增圖片api -->
<?php
include "../base.php";
dd($_FILES);
if(!empty($_FILES['img']['tmp_name'])){
    // 當上傳圖片時，會先存到一個站存檔。
    // 以下指令是指要從暫存檔移到哪裡存起來。
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    // 將檔案名稱存起來。
    $img=$_FILES['img']['name'];
}
// 在$_post傳輸中，陣列名稱就是inpute裡的name名稱。
$text=$_POST['text'];
$Title->save(['img'=>$img,'text'=>$text,'sh'=>0]);