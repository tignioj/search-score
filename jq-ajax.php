<?php
//json格式必备
header("Content-Type:application/json;charset=utf-8");

$staff=array(
    array("name" => "hong7", "number" => "101", "sex" => "male", "job" => "manager"),
    array("name" => "guojing", "number" => "102", "sex" => "female", "job" => "扫地"),
    array("name" => "uangron", "number" => "103", "sex" => "male", "job" => "打杂"),
);

if($_SERVER["REQUEST_METHOD"]=="GET") {
    search();
} elseif ($_SERVER["REQUEST_METHOD"]=="POST") {
    create();
}

function search() {
    if(!isset($_GET["number"]) || empty($_GET["number"])) {
        echo '{"success":false,"msg":"para error haha"}';
        return;
    }
    global $staff;
    $number = $_GET["number"];
    $result = '{"success":false,"msg":"no such staff "}';

    foreach($staff as $value) {
        if ($value["number"] == $number) {
            $result = '{
                "success":true,
                "msg": "find: number:'.$value["number"].
                            ' name: '.$value["name"].
                            ' sex: ' .$value["sex"].
                            ' job: ' .$value["job"].'"
            }';
            break;
        }
        
    }
    echo $result;
}



function create() {
    if(
        (!isset($_POST["name"]) || empty($_POST["name"]))
        ||(!isset($_POST["number"]) || empty($_POST["number"]))
        ||(!isset($_POST["sex"]) || empty($_POST["sex"]))
        ||(!isset($_POST["job"]) || empty($_POST["job"]))
    ) {
        echo '{"success":true,
                "msg":"syntax error , people info not enough"
            }';
        return;
    } else {
    echo '{
        "success": true,
        "msg":" 员工 :' .$_POST["name"]. ' saved !"}';
    }
}



?>