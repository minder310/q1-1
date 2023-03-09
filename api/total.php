<?php
// include "./base.php";
if(empty($_SESSION['total'])){
    $total=$Total->find(1);
    // dd($total);
    $people=$total['total']+1;
    $total['total']=$people;
    $Total->save($total);
    $_SESSION['total']=1;
}