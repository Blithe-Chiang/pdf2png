<?php 
/**
  usage convert.php?id=$id
*/

$upload_dir = "./uploads/";
$output_dir = "./converted/";

$id = $_REQUEST['id'];
//$filename = "test.pdf"; // TODO: 等一下要改成真实的数据
$filepath = $upload_dir.$id.'pdf';

//$b = exec("basename $filename .pdf");

//$output_name = basename($filename, ".pdf").".png";
$output_name = $id.".png";
$output_path = $output_dir.$output_name;

$command = "convert $filepath -append $output_path";
// out 运行的结果
// status 运行的状态码 1 for error; 0 for success
exec($command, $out, $status);


if ($status) {  // error occurs
    $statusCode = 500;
} else {
    # 执行没有出错
    $statusCode = 200;
}

$data = [
    'status' => $statusCode,
    'id' => $id
];

$json = json_encode($data);
header('Content-Type: application/json');
echo $json;

?>  
