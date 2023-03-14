<!-- 新增圖片api -->
<?php
include "../base.php";
$table=$_POST['table'];
$data=[];
if(!empty($_FILES['img']['tmp_name'])){
    // 當上傳圖片時，會先存到一個站存檔。
    // 以下指令是指要從暫存檔移到哪裡存起來。
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    // 將檔案名稱存起來。
    $img=$_FILES['img']['name'];
}
switch($table){
    case "Admin":
        $data['acc']=$_POST['acc'];
        $data['pw']=$_POST['pw'];
        break;
    case "Menu":
        $data['name']=$_POST['name'];
        $data['href']=$_POST['href'];
        $data['sh']=1;
        $data['parent']=0;
        break;
        default:
        if(isset($_POST['text'])){
            $data['text']=$_POST['text'];
        }
        $data['sh']=($table=="Title")?0:1;
}
// 在$_post傳輸中，陣列名稱就是inpute裡的name名稱。
$$table->save($data);