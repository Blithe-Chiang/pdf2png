<?php 


if (isset($_GET['filename'])) {
    $filename=$_GET['filename'];
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