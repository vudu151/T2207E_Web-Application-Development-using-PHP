function check()
  {
    phongban = document.getElementById("maphong");
    if(phongban.value=="0")
    {
      alert("Chưa chọn phòng ban");
      return false;
    }
    else
      return true;
  }