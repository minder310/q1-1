<!-- 校園印象資料管理 -->
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">圖片管理</p>
    <form method="post" action="./api/edti.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="70%">圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php 
                $div=3;
                $sum=$Image->count();
                $pages=ceil($sum/$div);
                echo $pages;
                (isset($_GET['p']))?$now=$_GET['p']:$now=$_GET['p']=1;
                $start=($now-1)*$div;
                $rows=$Image->all(" limit $start,$div");
                foreach($rows as $row){
                ?>
                <tr>
                    <td><img src="./upload/<?=$row['img']?>" style="width:100px;height:100px"></td>
                    <td><input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?= ($row['sh']==1)?"checked":""; ?>></td>
                    <td><input type="checkbox" name="del[]" value="<?=$row['id']?>" ></td>
                    <td>
                        <input type="button" onclick="op('#cover','#cvr','./modal/upload_image.php?id=<?=$row['id']?>')" value="修改圖片">
                        <!-- 這句話是讓他知道所有的id這樣在後台才能夠修正所有id的資料，如果沒有這行，後台沒打勾的選項就不會有id值就無法變動。 -->
                        <input type="hidden" name="id[]" value="<?=$row['id']?>">
                        <input type="hidden" name="table" value="Image">
                </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php if($_GET['p']>1){ ?>
        <a href="?do=image&&p=<?= $now-1?>"><</a>
        <?php }; ?>
        <?php for ($i=1; $i<=$pages ; $i++) { ?>
                <?php ($i==$_GET['p'])?$size="28px":$size="16px"?>
                <a href="?do=image&&p=<?=$i?>" style="font-size: <?=$size?>;"><?=$i?></a>            
        <?php }?>
        <?php if($_GET['p']<$pages){ ?>
        <a href="?do=image&&p=<?= $now+1?>">></a>
        <?php }; ?>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/image.php')"
                         value="新增圖片">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>