<style>
    .a {
        width: 99%;
        height: 87%;
        margin: auto;
        overflow: auto;
        border: #666 1px solid;
    }
</style>
<div class="a">
    <p>頁尾版權資料管理</p>
    <form action="./api/updata.php" method="post">
        <table width="50%" style="margin: auto;">
            <tr>
                <td>頁尾版權宣告</td>
                <td><input type="text" name="bottom" value="<?=$Bot->find(1)['bottom']?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="botton" value="Bottom"></td>
                <td>
                    <input type="submit" value="更換">
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>
    </form>
</div>