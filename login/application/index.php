<?php

use http\QueryString;

$n = isset($_POST['username']) ? $_POST['username'] : "";
$p = isset($_POST['userpsw']) ? $_POST['userpsw'] : "";

if ( empty($n)|| empty($p) ) {
    echo "请输入用户名和密码";
    exit();
} else {

    if (!preg_match("/^[a-zA-Z ]*$/",$n)) {
        echo "用户名只允许字母和空格<br>";
    }

    if (strlen($p) < 6) {
        echo "密码长度要大于6位";
        exit();
    }
}


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myDBPDO";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql = "SELECT * FROM user where user_name ='$n' and user_psw = '$p'";
    $result = $conn -> query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row=$result->fetch();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

if ($row>0) {
    echo "登陆成功";
} else {
    echo "用户不存在或密码错误";
}

$conn = null;




