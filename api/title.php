<!-- 頁首版權宣告。 -->
<?php 
include "../base.php";
$text=$_POST['text'];
$sh=$_POST['sh'];
$id=$_POST['id'];
(isset($_POST['del']))?$del=$_POST['del']:"";
if(empty($del)){
    foreach($id as $key => $val){
        if($val==$sh){
            $Title->save(['id'=>$val,'sh'=>1,'text'=>$text[$key]]);
            
        }else{
            $Title->save(['id'=>$val,'sh'=>0,'text'=>$text[$key]]);
        }
    }
}else{
    $Title->del($del[0]);
    unset($id[$del[0]]);
    foreach($id as $key => $val){
        if($val==$sh){
            $Title->save(['id'=>$val,'sh'=>1,'text'=>$text[$key]]);
            
        }else{
            $Title->save(['id'=>$val,'sh'=>0,'text'=>$text[$key]]);
        }
    }
}
to("../back.php");
