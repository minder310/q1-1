<?php
include_once "../base.php";
dd($_POST);
${$_POST['table']}->save(["id"=>1,array_key_first($_POST)=>reset($_POST)]);