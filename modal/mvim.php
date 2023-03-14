<h3>新增動畫圖片</h3>
<hr>
<form action="../api/add.php" method="post" enctype="multipart/form-data">

    <table>
        <tr>
            <td>動畫圖片</td>
            <td><input type="file" name="img"></td>
        </tr>
        <div>
            <button type="submit">新增</button><button type="reset">重置</button>
            <input type="hidden" name="table" value="Mvim">
        </div>
        
    </table>
</form>