<?php

$data = file_get_contents('php://input');
$pos1 = strpos($data, ':');
$pos2 = strpos($data, '/');
$pos3 = strpos($data, ';');
$pos4 = strpos($data, ',');
$mime = substr($data, $pos1 + 1, $pos3 - $pos1 - 1);
$extensionName = substr($data, $pos2 + 1, $pos3 - $pos2 - 1);
$content = substr($data, $pos4 + 1);
$imageContent = base64_decode($content);
$fileName = date('Y-m-d').'.'.$extensionName;
file_put_contents($fileName, $imageContent);

echo 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI']).'/'.$fileName;


