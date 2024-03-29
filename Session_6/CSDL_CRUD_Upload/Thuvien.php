<?php
    //Hàm UploadFiles: inputName là tên input file, Foldee là thư mục chưa file đưa lên máy chủ
    //Hàm trả về tên Tệp sau khi upload, nếu lỗi trả về chuỗi rỗng
    function UploadFile($inputName,$Folder)
    {
        $fileName="";    //Tên tệp upload sẽ lưu trên máy chủ
        $temptFile="";   //Đường dẫn tệp tạm đã Upload trên máy chủ
        $errors = array();  //Mảng chứa thông báo lỗi
        if(isset($_FILES[$inputName]) && $_FILES[$inputName]["error"]==0)
        {
            $fileName = $_FILES[$inputName]["name"];   //Lấy tên của file ảnh gốc
            $temptFile = $_FILES[$inputName]["tmp_name"]; //Lấy đường dẫn file ảnh đã upload trên thư mục tạm
            //Kiểm tra kích thước tệp không quá 1MB
            $file_size = $_FILES[$inputName]["size"];     //Kích thước tệp
            if($file_size > 1048576)
            {
                $errors[] = "<p>Lỗi upload ảnh do vượt quá kích thước</p>";
            }
            //Kiểm tra kiểu file
            $arr = explode('.',$fileName);   //Tách file thành mảng các chuỗi cách nhau bởi dấu chấm
            $duoitep = strtolower(end($arr));//Lấy phần đuôi tệp và chuyển thành chữ thường
            $hople = array("jpg", "png", "gif", "jped");
            if(in_array($duoitep,$hople)==false)
            {
                $errors[] = "<p>Lỗi upload ảnh do sai loại tệp</p>";
            }
            //Kiểm tra và báo lỗi
            if(empty($errors)==true)
                move_uploaded_file($temptFile,"$Folder/$fileName");
            else
            {
                print_r($errors);
                die("<p>Lỗi Upload ảnh</p>");
            }
        }
        return $fileName;
    }
?>