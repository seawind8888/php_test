<?php
$conn = mysqli_connect("127.0.0.1","root","tony8823");
if(!$conn){
    die("数据库连接失败");
}
mysqli_select_db($conn,'abc');
