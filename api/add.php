<!-- 新增圖片api -->
<?php
// include 是指將所指向的檔案直接寫進來的意思。
include "../base.php";
// 將post['table']宣告進一個$table裡面，並且用以判斷要取用哪個資料。
$table=$_POST['table'];
$data=[];
// empty是只要是不存在，!驚嘆號是相反，所以意思是要是存在的話執行以下動作。
// 如果有傳圖片，會以$_FILES檔案形式傳過來，所以可以用print_r($_FILES['IMG'])進行輸出，可以看到各項詳細資料。還記得dd嗎??也可以用dd去看。
if(!empty($_FILES['img']['tmp_name'])){
    // 當上傳圖片時，會先存到一個站存檔。
    // 以下指令是指要從暫存檔移到哪裡存起來。
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    // 將檔案名稱存起來。
    $img=$_FILES['img']['name'];
}
// 用switch判斷$table並且判斷相對應該取用的資料與該做的動作。
switch($table){
    // 當$table是Admin時會執行以下動作。
    case "Admin":
        // Admin是宣告新增帳號密碼的網頁資料。
        // 將$_POST['acc','pw']塞進$data[]陣列內。
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
        // 要是$img有值，就將$data['img']=$img;
        if(!empty($img)){
            $data['img']=$img;
        }
}
// 在$_post傳輸中，陣列名稱就是inpute裡的name名稱。
$$table->save($data);