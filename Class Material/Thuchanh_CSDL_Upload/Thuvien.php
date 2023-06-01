<?php
/*
Hàm  UploadFile dùng để upload tệp từ $inputName vào thư mục $Folder
*/
function UploadFile($inputName, $Folder)
{
    if(isset($_FILES[$inputName]) && $_FILES[$inputName]["error"]==0)
    {
        $tenanh = $_FILES[$inputName]["name"];
        $temp_file = $_FILES[$inputName]["tmp_name"];
        move_uploaded_file($temp_file,"$Folder/$tenanh");
        return $tenanh;
    }
    else
        return "";
}
?>