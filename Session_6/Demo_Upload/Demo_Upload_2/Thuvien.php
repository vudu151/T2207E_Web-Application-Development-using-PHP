<?php
    //Hàm Upload Files: inputName: tên input file, Folder: thư mục chứa File đưa lên máy chủ
    //Hàm trả về tên tệp sau khi upload , trả lỗi nếu chuỗi rỗng
    function UploadFile($inputName,$Folder)
    {
        $fileName="";   //tên tệp upload sẽ lưu trên máy chủ
        $temptFile="";  //Đường dẫn tệp tạm đã upload trên máy chủ
        $error = array();    //Mảng chứa thông báo lỗi
        if(isset($_FILES[$inputName]) && $_FILES[$inputName]["error"]==0)
        {
            $fileName = $_FILES[$inputName]["name"];   //Lấy tên của file ảnh gốc
            $temptFile = $_FILES[$inputName]["tmp_name"]; //Lấy đường dẫn file đã upload lên thư mục tạm
            //Kiểm tra kích thước tệp không quá 1MB
            $file_size = $_FILES[$inputName]["size"];//Kích thước tệp
            if($file_size > 1048576)
            {
                $error[] = "<p>Lỗi Upload ảnh do vượt quá kích thước</p>";
            }
            //Kiểm tra kiểu file
            $arr = explode('.',$fileName); //Tách tên file thành mảng các chuỗi cách nhau bởi dấu chấm
            $duoitep = strtolower(end($arr));   //Lấy phần đuôi tệp và chuyển thành chữ thường
            $hople = array("jpg", "png", "gif", "jped");
            if(in_array($duoitep,$hople)==false)
            {
                $error[] = "<p>Lỗi upload ảnh do sai loại tệp</p>";
            }
            //Kiểm tra và báo lỗi
            if(empty($error)==true)
            {
                move_uploaded_file($temptFile,"$Folder/$fileName");
            }
            else
            {
                print_r($error);
                die("<p>Lỗi Upload ảnh</p>");
            }
        }
        return $fileName;
    }
?>