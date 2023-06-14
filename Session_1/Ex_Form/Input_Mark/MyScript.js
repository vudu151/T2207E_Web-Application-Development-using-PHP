function check(input_text)
{
    if(input_text.value=="")
    {
        document.getElementById("baoloi").innerHTML="Chưa nhập dữ liệu";
        input_text.focus();    //Đặt lại focus vào text hiện tại
        return false;
    }
    if(isNaN(input_text.value))
    {
        document.getElementById("baoloi").innerHTML= "Phải nhập số";
        input_text.focus();    //Đặt lại focus vào text hiện tại
        return false;
    }
    if(parseFloat(input_text.value)<0 || parseFloat(input_text.value) > 10)
    {
        document.getElementById("baoloi").innerHTML= "Điểm phải nhập lớn hơn 0 và bé hơn 10";
        input_text.focus(); 
        return false;
    }
    document.getElementById("baoloi").innerHTML="";
}

//Kiểm tra toán, văn , anh không trống và phải là số
function kiemtra()
{
    tToan = document.getElementById("tToan");
    tVan = document.getElementById("tVan");
    tAnh = document.getElementById("tAnh");
    if(tToan.value==""||tVan.value==""||tAnh.value=="")
    {
        alert("Mời nhập đầy đủ điểm các môn");
        return false;
    }
    if(isNaN(tToan.value)||isNaN(tVan.value)||isNaN(tAnh.value))
    {
        alert("Điểm phải nhập số.");
        return false;
    }
    toan = parseFloat(tToan.value);
    van = parseFloat(tVan.value);
    anh = parseFloat(tAnh.value);
    if(toan<0||toan>10||van<0||van>10||anh<0||anh>10)
    {
        alert("Điểm phải >=0 và <=10");
        return false;
    }
}