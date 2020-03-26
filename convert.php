<?php 

/*
    我们把 topng.sh 这个文件放在 $output_dir里面
 */
$upload_dir = "uploads/";
$output_dir = "converted/";

$filename = $_REQUEST['filename'];
// $filename = "test.pdf"; // TODO: 等一下要改成真实的数据
$filepath = $upload_dir.$filename;

$command = "./$output_dir/topng.sh ../$filename";

// out 运行的结果
// status 运行的状态码 1 for error; 0 for success
exec($command, $out, $status);

// 转换后的名字
$name = "";

if ($status) {  // error occurs
    $statusCode = 500;
} else {
    # 执行没有出错
    $name = $out;
    $statusCode = 200;
}

$data = [
    'status' => $statusCode,
    'name' => $name
];

$json = json_encode($data);
header('Content-Type: application/json');
echo $json;

?>  