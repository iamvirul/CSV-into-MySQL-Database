<?php
require("./config.php");
$db = new Database();
if (isset($_POST['import'])) {
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if (!empty($_FILES['Excel']['name']) && in_array($_FILES['Excel']['type'], $csvMimes)) {
        if (is_uploaded_file($_FILES['Excel']['tmp_name'])) {
            $csvFile = fopen($_FILES['Excel']['tmp_name'], 'r');
            fgetcsv($csvFile);
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $name   = $line[0];
                $age  = $line[1];
                $db->iud("INSERT INTO `new_table` (`name`, `age`) VALUES ('" . $name . "', '" . $age . "')");
            }
            fclose($csvFile);
            $file_name = $_FILES["Excel"]["name"];
            $file_extention = explode('.', $file_name);
            $file_extention = strtolower(end($file_extention));
            $new_file_name = date("Y.m.d") . "-" . date("h.i.sa") . "." . $file_extention;
            $target_dir = "upload/" . $new_file_name;
            move_uploaded_file($_FILES["Excel"]["tmp_name"], $target_dir);
        
            $qstring = '?status=succ';
        } else {
            $qstring = '?status=err';
        }
    } else {
        $qstring = '?status=invalid_file';
    }
}

header("Location: index.php" . $qstring);
