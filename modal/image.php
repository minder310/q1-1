<div>
    <form action="./api/add.php" method="post" enctype="multipart/form-data">
        <tr>
            <td>新增圖片</td>
            <td><input type="file" name="img"></td>
        </tr>
        <div>
            <input type="hidden" name="table" value="Image">
            <input type="submit" value="新增圖片">
            <input type="reset" value="重整">
        </div>
    </form>
</div>