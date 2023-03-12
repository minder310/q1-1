<?php
date_default_timezone_set("Asia/Taipei");
session_start();

function dd($ar)
{
    echo "<pre>";
    print_r($ar);
    echo "</pre>";
}
function to($url)
{
    header("location:" . $url);
}
class DB
{
    private $table;
    private $dns = "mysql:host=localhost;charset=utf8;dbname=dbq1";
    private $pdo;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dns, "root", "");
        $this->setStr($table);

    }
    private function ArToSq($ar)
    {
        foreach ($ar as $key => $val) {
            $tmp[] = " `$key` = $val";
        }
        return $tmp;
    }
    public function all(...$arg)
    {
        $sql = "select * from $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->ArToSq($arg[0]);
                $sql = $sql . " where " . join(" && ", $tmp);
            } else {
                $sql = $sql . $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql = $sql . $arg[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id){
        $sql = "select * from `$this->table` ";
        if (is_array($id)) {
            $tmp = $this->ArToSq($id);
            $sql = $sql . " where " . join(" && ", $tmp);
        } else {
            $sql = $sql ." where `id` = '$id'";
        }
        // dd($sql);
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function del($id){
        $sql="DELETE FROM `$this->table` ";
        if (is_array($id)) {
            $tmp = $this->ArToSq($id);
            $sql = $sql . " where " . join(" && ", $tmp);
        } else {
            $sql = $sql ." where `id` = '$id'";
        }
        return $this->pdo->exec($sql);
    }
    public function save($text){
        if(isset($text['id'])){
            $id=$text['id'];
            unset($text['id']);
            $tmp=$this->ArToSq($text);
            $sql="UPDATE `$this->table` SET ".join(",",$tmp)." where `id` = '$id'";
        }else{
            $key=array_keys($text);
            $sql="INSERT INTO `$this->table`(`".join("`,`",$key)."`) VALUES ('".join("','",$text)."')";
        }
        return $this->pdo->exec($sql);
    }
    private function math($math,...$arg){
        switch($math){
            case "count":
                $sql="select $math(*) FROM `$this->table` ";
                if (isset($arg[0])) {
                    if (is_array($arg[0])) {
                        $tmp = $this->ArToSq($arg[0]);
                        $sql = $sql . " where " . join(" && ", $tmp);
                    } else {
                        $sql = $sql . $arg[0];
                    }
                }
                break;
                default:
                $sql="select $math($arg[0]) FROM `$this->table`";
                if (isset($arg[1])) {
                    if (is_array($arg[1])) {
                        $tmp = $this->ArToSq($arg[1]);
                        $sql = $sql . " where " . join(" && ", $tmp);
                    } else {
                        $sql = $sql . $arg[1];
                    }
                }
            }
    return $this->pdo->query($sql)->fetchColumn();
    }

    public function count(...$arg){return $this->math("count",...$arg);}
    public function sum($col,...$arg){return $this->math("sum",$col,...$arg);}
    public function avg($col,...$arg){return $this->math("avg",$col,...$arg);}
    public function min($col,...$arg){return $this->math("min",$col,...$arg);}
    public function max($col,...$arg){return $this->math("max",$col,...$arg);}
    
    // 這邊可以重整，並弄成自己的樣子，但先照老師的打。
    public $table1; //資料表名稱
    public $title;  //後臺功能名稱
    public $button; //新增功能按鈕
    public $header; //列表第一欄標題
    public $append; //列表第二欄標題
    public $upload; //更新圖片彈出視窗用

    private function setStr($table){
        switch($table){
            case "title":
                $this->title="網站標題管理";
                $this->button="新增網站標題圖片";
                $this->header="網站標題";
                $this->append="替代文字";
                $this->upload="網站標題圖片";
                break;
            case "ad":
                $this->title="動態文字廣告管理";
                $this->button="新增動態文字廣告";
                $this->header="動態文字廣告";
                break;
            case "mvim":
                $this->title="動畫圖片管理";
                $this->button="新增動畫圖片";
                $this->header="動畫圖片";
                $this->upload="動畫圖片";
                break;
            case "image":
                $this->title="校園映象資料管理";
                $this->button="新增校園映象圖片";
                $this->header="校園映象資料圖片";
                $this->upload="校園映象圖片";
                break;
            case "total":
                $this->title="進站總人數管理";
                $this->button="";
                $this->header="進站總人數";
                break;
            case "bottom":
                $this->title="頁尾版權資料管理";
                $this->button="";
                $this->header="頁尾版權資料";
                break;
            case "news":
                $this->title="最新消息資料管理";
                $this->button="新增最新消息資料";
                $this->header="最新消息資料內容";
                break;
            case "admin":
                $this->title="管理者帳號管理";
                $this->button="新增管理者帳號";
                $this->header="帳號";
                $this->append="密碼";
                break;
            case "menu":
                $this->title="選單管理";
                $this->button="新增主選單";
                $this->header="主選單名稱";
                $this->append="選單連結網址";
                break;
        }
    }
}
$Bot=new DB('bottom');
$Total=new DB('total');
$Title=new DB('title');
$Ad=new DB('ad');
$Image=new DB('image');
$Mvim=new DB('mvim');
$News=new DB('news');
$Admin=new DB('admin');
$Menu=new DB('menu');