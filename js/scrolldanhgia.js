document.addEventListener("DOMContentLoaded", function() {
    // Xử lý tham số từ URL
    var urlParams = new URLSearchParams(window.location.search);
    var scrollToComment = urlParams.get('scroll_to_comment');

    // Nếu có tham số và giá trị là "true", cuộn đến vị trí cụ thể
    if (scrollToComment === 'true') {
        scrollToCommentForm();
    }
});

function scrollToCommentForm() {
    var commentForm = document.getElementById('form_comment');
    if (commentForm) {
        commentForm.scrollIntoView({ behavior: 'smooth' });
    }
}