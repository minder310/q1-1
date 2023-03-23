<h3>更新網站標題圖片</h3>
<hr>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>標題圖片區</td>
            <td>
                <input type="file" name="img">
            </td>
        </tr>
        <div>
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <input type="hidden" name="table" value="Title">
            <input type="submit" value="更新">
            <input type="reset" value="重置">
        </div>
    </table>
</form>