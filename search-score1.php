<?php
header("Content-Type:application/json;charset=utf-8");

$students= array(
    array("name" => "张三", "学号" => "000", "C语言" => "59", "数据结构" => "60", "高等数学" => "59"),
    array("name" => "李四", "学号" => "001", "C语言" => "60", "数据结构" => "59", "高等数学" => "100"),
    array("name" => "赵五", "学号" => "002", "C语言" => "60", "数据结构" => "100", "高等数学" => "100")
);

$result="";


if (!isset($_POST["number"]) || empty($_POST["number"])) {
    $result= '{
        "success": false,
        "msg": "还没输入学号:'.'测试学号:'.$students[1]["name"].'"
    }';
    echo $result;
    return;
}

$number=$_POST["number"];

foreach($students as $value) {
    if ($number == $value["学号"]) {
        $result= '{
            "success":true,
            "msg": "已找到",
            "name": "'.$value["name"].'",
            "number": "'.$value["学号"].'",
            "C语言": "'.$value["C语言"].'",
            "数据结构": "'.$value["数据结构"].'",
            "高等数学": "'.$value["高等数学"].'"
        }';
        echo $result;
        return;
    }
}
echo '{
    "success": false,
    "msg": "学号：'.$number
    .' not found"
}';





?>