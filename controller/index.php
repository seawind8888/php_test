<?php

/**
 * Created by PhpStorm.
 * User: MOMO
 * Date: 16/11/4
 * Time: 下午3:34
 */
class index
{
    private $conn;

    public function __construct(){
        $this->conn;
        $this->connect();
        $this->name = $_POST['name'];
        $this->password = $_POST['password'];
    }

    function connect(){
        $this->conn = mysqli_connect("127.0.0.1","root","tony8823");
        if(!$this->conn){
            die("数据库连接失败");
        }
        mysqli_select_db($this->conn,'abc') or exit ('对不起,没有这个数据库');
    }

    public function reg()
    {
        if (!isset($_POST['submit'])) {
            exit("错误执行");
        }//判断是否有submit操作
        $q = "insert into user(id,username,password) values (null,'$this->name','$this->passwor')";//向数据库插入表单传来的值的sql
        $reslut = $this->query($q,$this->conn);//执行sql

        if (!$reslut) {
            die('Error: ' . mysqli_error($this->conn));//如果sql执行失败输出错误
        } else {
            echo "注册成功";//成功输出注册成功
        }

        mysqli_close($this->conn);//关闭数据库
    }
    public function test()
    {
        $arr = array($this->name,$this->password);
        echo json_encode($arr);
    }

}