<?php

header("Content-Type:application/json;charset=utf-8");

$students=array(
    array("姓名"=> "张三","学号" => "1700000000", "密码" => "000000", "C语言" => "59", "数据结构" => "60", "高等数学" => "59"),
    array("姓名"=> "李四","学号" => "1700000001", "密码" => "000000", "C语言" => "60", "数据结构" => "60", "高等数学" => "59"),
    array("姓名"=> "玄武","学号" => "1700000002", "密码" => "000000", "C语言" => "59", "数据结构" => "59", "高等数学" => "61"),
    array("姓名"=> "赵六","学号" => "1700000003", "密码" => "000000", "C语言" => "59", "数据结构" => "60", "高等数学" => "59")
);

$result="";

JudgeInfo();
function JudgeInfo() {//判断输入信息是否正确
    if(!isset($_POST["number"]) || empty($_POST["number"])) {
        $result = '{
            "success": false,
            "msg": "未输入学号"
        }';
        echo $result;
        return;
    }
    if(!isset($_POST["password"])) {
        $result = '{
            "success": false,
            "msg": "未输入密码'.$_POST["password"].'"
        }';
        echo $result;
        return;
    }
    
    if(!isset($_POST["InputCode"]) || empty($_POST["InputCode"])) {
        $result = '{
            "success": false,
            "msg": "未输入验证码"
        }';
        echo $result;
        return;
    }
    //判断验证码
    if($_POST["InputCode"] != "GDPU") {
        $result = '{
            "success": false,
            "msg": "验证码输入错误"
        }';
        echo $result;
        return;
    }
    //全部无误后，执行查询函数
    search();
};

//赋值

function search() {
    empty($number);
    empty($password);
    empty($InputCode);
    $number = $_POST["number"];
    $password = $_POST["password"];
    $InputCode = $_POST["InputCode"];
    global $students;
    foreach($students as $value) {
        if($value["学号"] == $number&&$value["密码"]===$password) {
            $result= '{
                "success": true,
                "姓名": "'.$value["姓名"].'",
                "学号": "'.$value["学号"].'",
                "C语言": "'.$value["C语言"].'",
                "数据结构": "'.$value["数据结构"].'",
                "高等数学": "'.$value["高等数学"].'"
            }';
            echo $result;
            return;
        }
        if($value["学号"] == $number || $value["密码"] != $password) {// 此处不能把||改为&&否则不符合条件
            
            $result = '{
                "success": false,
                "msg": "密码错误"
            }';
            echo $result;
            return;
        }
    }
    empty($result);
    $result= '{
        "success": false,
        "msg": "学号：'.$_POST["number"].' 不存在"
    }';
    echo $result;
    return;
   
};






?>