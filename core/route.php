<?php

$hostdir = DIR_CONTROLLER;

$filesnames = scandir($hostdir);

//获取也就是扫描文件夹内的文件及文件夹名存入数组 $filesnames

//default route
if (!isset($_GET['class'])) {
  $_GET['class'] = 'home';
}

//var_dump($_GET);
$class_name = $_GET['class'];

foreach ($filesnames as $file_name) {
  //echo $file_name;
  //echo "<br/>";
  if ($file_name == $class_name . '.php') {

    require(DIR_CONTROLLER . $file_name);

    $object = new $class_name;

    $method = $_GET['method'];
    //$object->logout();
    //echo $method;
    $object->$method();

  } else {
    //echo "not found class";
  }
}

?>