<!-- 管理者帳號管理 -->
<h3>新增管理者帳號</h3>
<!-- 要記得傳址有兩種，一種是post，一種是get -->
<form action="./api/add.php" method="post">
<table>
    <tr>
        <td>帳號:</td>
        <td>
            <!-- input 的name=是回傳給form的key值。 -->
            <input type="text" name="acc">
        </td>
    </tr>
    <tr>
        <td>密碼:</td>
        <td>
            <!-- input的種類可以熟悉一下password是密碼種類，html葉面不會顯示數值只會顯示米 -->
            <input type="password" name="pw" >
        </td>
    </tr>
    <tr>
        <td>確認密碼:</td>
        <td>
            <input type="password" name="pw2">
        </td>
    </tr>
</table>
<div>
    <!-- type:submit是提交會將表單送出去，並且是一個按鈕，value是按鈕裡面顯示的字體。 -->
    <input type="submit" value="新增">
    <!-- type:reset是將所有表格回到未輸入的初始狀態。 -->
    <input type="reset" value="重製">
    <!-- type:hidden是一種隱藏表格可以偷傳值並且可以用來判斷是哪個頁面。 -->
    <input type="hidden" name="table" value="Admin">
</div>
</form>