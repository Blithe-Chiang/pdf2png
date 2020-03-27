<?php 

/**
 * query string:   id=$id
 * id，随机生成的一个数字，赋予上传的文件
 *
 */

if (isset($_GET['id'])) {
    $filename=$_GET['id'].'.png';
    $file = "converted/".$filename;

    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename='.$fileName);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    }
}

?>