<?php

header("Content-Type:application/json;charset=utf-8");

$students = array(
    array("姓名" => "张三", "学号" => "100", "C语言" => "60", "数据结构" => "59", "线性代数" => "58", "高等数学" => "57"),
    array("姓名" => "李四", "学号" => "101", "C语言" => "59", "数据结构" => "59", "线性代数" => "58", "高等数学" => "57"),
    array("姓名" => "赵五", "学号" => "102", "C语言" => "59", "数据结构" => "59", "线性代数" => "58", "高等数学" => "57"),
    array("姓名" => "李雷", "学号" => "103", "C语言" => "59", "数据结构" => "59", "线性代数" => "58", "高等数学" => "57"),
    array("姓名" => "胖虎", "学号" => "104", "C语言" => "100", "数据结构" => "100", "线性代数" => "100", "高等数学" => "100"),
);


search();
function search() {
    if(!isset($_POST["number"]) || empty($_POST["number"])) {
        echo '{"success": false, "msg": "未输入学号" }';
        return;
    }
    global $students;
    $number = $_POST["number"];
    $result = '{
        "success": true,
            "msg": "密码：'.$_POST["password"].'账号：'.$number.'字符串1'.'字符串2"                    
                }';
    foreach($students as $value ){//遍历students数组中的每个成员赋值给value,所以这里value是一个数组
        if($value["学号"] == $number) {//数组中，key名：Key值,这里key名为“姓名”，对应着每个学号的值
            $result = '{
                "success":true,
                "msg": " 姓名: '.$value["姓名"].
                        ' 学号: '.$value["学号"].
                        ' C语言: '.$value["C语言"].
                        ' 数据结构: '.$value["数据结构"].
                        ' 线性代数: '.$value["线性代数"].
                        ' 高等数学: '.$value["高等数学"].'"
            }';
            break;
        }
    }
    echo $result;
}




// $number = $_POST["number"];
// //echo  '{"success" : true, "msg": "hello" }';
// $result = '{
//     "success" :true,
//     "msg": "学号'.$number.'"
//     }';
// echo $result;
?>