function kiemtra()
{
    phong = document.getElementById("maphong");
   
    if(phong.selectedIndex==0)//nếu chọn dòng đầu selectedIndex=0
    {
        alert("Chưa chọn phòng ban");
        phong.focus();
        return false;
    }
    return true;
}