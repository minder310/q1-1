<h3>新增動畫圖片</h3>
<hr>
<!-- 這裡宣告要form action是指資料要傳到哪裡，method是指要用哪種檔案類型傳輸，enctype是用於傳輸圖片或是影片檔案的指令。 -->
<form action="./api/add.php" method="post" enctype="multipart/form-data">

    <table>
        <tr>
            <td>動畫圖片</td>
            <td><input type="file" name="img"></td>
        </tr>
        <div>
            <button type="submit">新增</button>
            <button type="reset">重置</button>
            <input type="hidden" name="table" value="Mvim">
        </div>
        
    </table>
</form>