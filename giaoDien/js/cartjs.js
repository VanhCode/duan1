function confirmDeleteAndDecrement(id) {
    if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
        window.location.href = `../view/addProduct.php`;
    }
}