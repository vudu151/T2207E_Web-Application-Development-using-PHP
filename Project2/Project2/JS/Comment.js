document.addEventListener('DOMContentLoaded', function() {
    const ratingForm = document.querySelector('.rating-form');
    const submitButton = document.querySelector('.submit-button');

    submitButton.addEventListener('click', function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của nút submit

        const selectedRating = document.querySelector('.rating-stars input[type="radio"]:checked');
        if (selectedRating) {
            ratingForm.submit(); // Gửi form khi có ngôi sao được chọn
        } else {
            // Hiển thị thông báo lỗi hoặc yêu cầu người dùng chọn đánh giá
        }
    });
});