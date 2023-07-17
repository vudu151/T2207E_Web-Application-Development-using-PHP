function search() {
    var searchValue = document.getElementById("searchInput").value;
    
    // Sử dụng AJAX để gửi yêu cầu HTTP
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "ControllersHome/HandleSearchOnkeyup.php?s=" + encodeURIComponent(searchValue), true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
        document.getElementById("searchResults").innerHTML = xhr.responseText;
        }
    };
    xhr.send();

    var input = document.getElementById("searchInput");
    var element = document.getElementById("searchResults");

    if (input.value !== "") {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
}
