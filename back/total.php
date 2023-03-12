<style>
    .a{
        width: 99%;
        height: 87%;
        margin: auto;
        overflow: auto;
        border: #666 1px solid;
    }
</style>
<div class="a">
    <p>進站總人數管理</p>
    <form action="./api/updata.php" method="post">
        <table width="50%" style="margin:auto">
            <tr>
                <td>進站總人數</td>
                <td>
                    <input type="number" name="total" id="total" value="<?=$Total->find(1)['total']?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="hidden" name="table" value="Total">
                    <input type="submit" value="修改確定">
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>
    </form>
</div>