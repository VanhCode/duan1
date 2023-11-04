<?php
    // Kết nối đến cơ sở dữ liệu (đã xác định ở trên)
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=bienthe", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Lỗi kết nối đến cơ sở dữ liệu: " . $e->getMessage());
    }

    if(isset($_POST['them'])) {
        // Lấy dữ liệu từ biểu mẫu
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        $product_name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $product_type = $_POST['type'];
        $variation_name = $_POST['variation_name'];
        $variation_values = $_POST['variation_value'];
        $variation_amounts = $_POST['variation_amount'];
    
        // Thêm sản phẩm vào bảng "products"
        $query = "INSERT INTO products (name, description, price, type) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$product_name, $description, $price, $product_type]);
    
        // Lấy ID sản phẩm vừa thêm vào
        $product_id = $pdo->lastInsertId();
    
        // Thêm giá trị biến thể vào bảng "product_variations" và liên kết với sản phẩm
        foreach ($variation_values as $key => $value) {
            if (isset($variation_amounts[$key])) {
                $variation_amount = $variation_amounts[$key];
                $query = "INSERT INTO product_variations (product_id, variation_name, variation_amount, variation_value) VALUES (?, ?, ?, ?)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$product_id, $variation_name, $variation_amount, $value]);
            }
        }
        
        echo "Thêm sản phẩm thành công!";

    }
?>

<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <label for="name">Tên sản phẩm:</label>
    <input type="text" name="name" id="name" ><br>
    
    <label for="description">Mô tả:</label>
    <textarea name="description" id="description" rows="4"></textarea><br>
    
    <label for="price">Giá sản phẩm:</label>
    <input type="text" name="price" id="price" ><br>
    
    <label for="type">Loại sản phẩm:</label>
    <select name="type" id="type">
        <option value="Giày dép">Giày dép</option>
        <option value="Quần áo">Quần áo</option>
    </select><br>
    
    <label for="variation_name">Phân loại 1:</label>
    <input type="text" name="variation_name" placeholder="Ví dụ: Size, Màu Sắc,..." id="variation_name" required><br>
    
    <div id="variation_values">
        <!-- Một số lựa chọn ban đầu -->
        <label for="variation_value">Giá trị biến thể:</label>
        <input type="text" name="variation_value[]" id="variation_value" placeholder="Ví dụ: Trắng, S, 43,.." required>
    </div>

    <div id="variation_values_price">
        <!-- Một số lựa chọn ban đầu -->
        <label for="variation_value">Số lượng sản phẩm theo size:</label>
        <input type="text" name="variation_amount[]" id="variation_value" placeholder="Ví dụ: 10,55,99,.." required>
    </div>
    
    <button type="button" id="add_variation">Thêm giá trị</button>
    
    <input type="submit" name="them" value="Thêm sản phẩm">
</form>
<a href="inbienthe.php">Xem</a>
<script>

    document.getElementById("add_variation").addEventListener("click", function() {
        var variationValuesContainer = document.getElementById("variation_values");
        var variationValuesContainerPrice = document.getElementById("variation_values_price");
        
        // Tạo trường input cho giá trị biến thể
        var newInputValue = document.createElement("input");
        newInputValue.type = "text";
        newInputValue.name = "variation_value[]";
        newInputValue.required = true;
        newInputValue.placeholder = "Ví dụ: Trắng, S, 43,..";
        
        // Tạo nút "Xóa"
        var removeButtonValue = document.createElement("button");
        removeButtonValue.type = "button";
        removeButtonValue.textContent = "Xóa";
        removeButtonValue.addEventListener("click", function() {
            variationValuesContainer.removeChild(newInputValue);
            variationValuesContainer.removeChild(removeButtonValue);
        });

        variationValuesContainer.appendChild(newInputValue);
        variationValuesContainer.appendChild(removeButtonValue);
        
        // Tạo trường input cho số lượng sản phẩm theo size
        var newInputAmount = document.createElement("input");
        newInputAmount.type = "text";
        newInputAmount.name = "variation_amount[]";
        newInputAmount.required = true;
        newInputAmount.placeholder = "Ví dụ: 10,55,99,..";
        
        // Tạo nút "Xóa"
        var removeButtonAmount = document.createElement("button");
        removeButtonAmount.type = "button";
        removeButtonAmount.textContent = "Xóa";
        removeButtonAmount.addEventListener("click", function() {
            variationValuesContainerPrice.removeChild(newInputAmount);
            variationValuesContainerPrice.removeChild(removeButtonAmount);
        });

        variationValuesContainerPrice.appendChild(newInputAmount);
        variationValuesContainerPrice.appendChild(removeButtonAmount);
    });

    // let variation_value=document.querySelector('#variation_name');
    // let variation_values=document.querySelector('#variation_values');

    // document.getElementById("add_variation").addEventListener("click", function() {
    //     let input=document.createElement("input");
    //     input.setAttribute("name", variation_value.value);
    //     variation_values.appendChild(input);
    //     variation_value.value='';
    // });
</script>
