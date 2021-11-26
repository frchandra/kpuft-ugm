<?php
header('Access-Control-Allow-Origin: *');
date_default_timezone_set("Asia/Jakarta");
$data = time();
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
