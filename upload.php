<?php
$upload_dir = "uploads/";


//TODO: 下面的东西改成面向对象的
//
//



if(isset($_FILES["myfile"]))
{
    $ret = array();
    
//  This is for custom errors;  
/*  $custom_error= array();
    $custom_error['jquery-upload-file-error']="File already exists";
    echo json_encode($custom_error);
    die();
*/
    $error =$_FILES["myfile"]["error"];
    //You need to handle  both cases
    //If Any browser does not support serializing of multiple files using FormData() 
    if(!is_array($_FILES["myfile"]["name"])) //single file  // 目前我们只考虑一次上传一个文件的情况
    {
        // $id = rand();
        // 在测试阶段，我写成一个固定的数值，方便调试
        $id = 2000;

        // 上传时候的文件名
        $fileName = $id.'.pdf';
        // $fileName = $_FILES["myfile"]["name"];
        move_uploaded_file($_FILES["myfile"]["tmp_name"],$upload_dir.$fileName);

        $original_name = $_FILES["myfile"]["name"];

        // 要返回的数据
        $ret = [];
        $ret['id']= $id;  // 随机获得的id
        $ret['original_name']=$original_name;  // 上传的文件的名字

    }
    else  //Multiple files, file[]   // 这种情况我们不考虑
    {
      // $fileCount = count($_FILES["myfile"]["name"]);
      // for($i=0; $i < $fileCount; $i++)
      // {
      //   $fileName = $_FILES["myfile"]["name"][$i];
      //   move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$upload_dir.$fileName);
      //   $ret[]= $fileName;
      // }
    
    }
    header('Content-Type: application/json');
    echo json_encode($ret);
 }
 ?>
