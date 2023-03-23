<h1>更新動畫資料</h1>
<?php $id=$_GET['id']?>
<form action="./api/upload.php" method="post" enctype="multipart/form-data">
    <tr>
        <td>動畫圖片:</td>
        <td><input type="file" name="img"></td>
    </tr>
    <div>
        <input type="submit" value="更換">
        <input type="reset" value="重置">
        <input type="hidden" name="id" value="<?=$id?>">
        <input type="hidden" name="table" value="Mvim">
    </div>
</form>