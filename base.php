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
        $sql = "select * form $this->table ";
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
        $sql = "select * form $this->table ";
        if (is_array($id)) {
            $tmp = $this->ArToSq($id);
            $sql = $sql . " where " . join(" && ", $tmp);
        } else {
            $sql = $sql ." where `id` = '$id'";
        }
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

