<!-- 標題文字新增 -->
<?php
include "../base.php";
if(empty($_POST['id'])){
    $Ad->save(["text"=>$_POST['ad']]);
}else{
    
    $text=$_POST['text'];
    $id=$_POST['id'];
    $idtext=array_combine($id,$text);
    foreach($idtext as $key => $val){
        $Ad->save(['id'=>$key,'text'=>$val]);
    }
    (isset($_POST['del']))?$del=$_POST['del']:"";
    $sh=$_POST['sh'];
    dd($sh);
    foreach($id as $key => $val){
        // 判斷要是id沒有在$sh中，就把沒有id的sh值存檔為0;
        (!in_array($val,$sh))?$Ad->save(['id'=>$val,'sh'=>0]):$Ad->save(['id'=>$val,'sh'=>1]);
        // 要是$del存在，就判斷$val值有沒有在$del陣列中，如果有就將$val刪除。
        (!empty($del))?(in_array($val,$del))?$Ad->del($val):"":"";
        
    }
}
to("../back.php?do=ad");