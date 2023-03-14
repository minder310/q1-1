<h3>新增網站標題圖片</h3>
                                <!-- 這邊是傳圖片專門地區。 -->
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>標題圖片區</td>
            <!-- 宣告 -->
            <td><input type="file" name="img" ></td>
        </tr>
        <tr>
            <td>標題區替代文字</td>
            <td>
                <input type="text" name="text">
            </td>
        </tr>
        <div>
            <input type="submit" value="新增">
            <input type="reset" value="重置">
            <input type="hidden" name="table" value="Title">
        </div>
    </table>
</form>