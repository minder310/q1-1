<?php
include "../base.php";
// 需要翻譯全頁
dd($_POST);
// 將帶進來的TABLE值，宣告進$table裡面。
$table=$_POST['table'];
// 做一個陣列迴圈，請注意這邊會很常用到idx因為它可以可以跟id連動。
foreach($_POST['id'] as $idx => $id){
    // 要是$_post['del']存在，同時id有在$_POST['del']裡面，就會將在table裡面將id刪除掉。
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $$table->del($id);
    }else{
        // 提取出$table相對的find($id);
        $row=$$table->find($id);
        // switch判斷他是哪張表單
        switch($table){
            // 如果是title
            case "Title":
                // 就在
                $row['text']=$_POST['text'][$idx];
                $row['sh']=(isset($_POST['sh']) && $_POST['sh']==$id)?1:0;
                break;
            case "Admin":
                $row['acc']=$_POST['acc'][$idx];
                $row['href']=$_POST['href'][$idx];
                $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                break;
            case "Menu" :
                $row['name']=$_POST['name'][$idx];
                $row['href']=$_POST['href'][$idx];
                $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                break;
            default:
                if(isset($_POST['text'])){
                    $row['text']=$_POST['text'][$idx];
                }
                $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        }
        $$table->save($row);
    }
}