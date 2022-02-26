<?php
require 'Carbon/autoload.php';
include "lib/database.php";
$db = new Database;
use Carbon\Carbon;
use Carbon\CarbonInterval;

if (isset($_POST['time'])) {
    $time = $_POST['time'];
    if ($time == '7days') {
        $day = 7;
    } elseif ($time == '28days') {
        $day = 28;
    } elseif ($time == '90days') {
        $day = 90;
    } else {
        $day = 365;
    }
} else {
    $day = 7;
}

$subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays($day)->toDateString();
$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

$query = "SELECT DISTINCT DATE(ngay_hoan_thanh) FROM tb_thongke WHERE DATE(ngay_hoan_thanh) BETWEEN '$subdays' AND '$now' ORDER BY ngay_hoan_thanh DESC";
$sql_select = $db ->select($query);
$chartData = [];
while ($result = $sql_select->fetch_assoc()) {
   $date = $result['DATE(ngay_hoan_thanh)'];
    $sales = 0;
    $profit = 0;
    $queryData = "SELECT * FROM tb_thongke WHERE DATE(ngay_hoan_thanh) = '$date'";
    $sqlData = $db->select($queryData);
    if ($sqlData) {
        while ($value = $sqlData->fetch_assoc()) {
            $sales += $value['doanh_thu'];
            $profit += $value['loi_nhuan'];
        }
        $quantity = mysqli_num_rows($sqlData);
        
    }

    $chartData[] = [
        'date' => $date,
        'orders' => $quantity,
        'sales' => $sales,
        'profit' => $profit
    ];
}

echo $data = json_encode($chartData);
