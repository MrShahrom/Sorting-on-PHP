<?php

$dir = "files/";
$res = "result/";

if(!file_exists($res)) mkdir($res);

$files = array();
$handle = @opendir($dir);

if(!$handle){
    mkdir($dir);
    exit("Нет папки с подготовленными файлами - /files/");
}

while(false !== ($file = readdir($handle))){
    if(is_dir($dir.$file)) continue;
    $files[] = $file;
}

if(!$files) exit("Папка с подготовленными файлами пуста");

$i = 0;

foreach($files as $file){
    $date = date("Y-m-d", filemtime($dir.$file));
    if(!file_exists($res.$date)){
        mkdir($res.$date);
    }
    rename($dir.$file, $res.$date."/($file)");
    $i++;
}
echo "Сортировано файлов: $i";



?>