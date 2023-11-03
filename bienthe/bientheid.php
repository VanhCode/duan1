<?php
    // Kết nối đến cơ sở dữ liệu (đã xác định ở trước đó)
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=bienthe", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Lỗi kết nối đến cơ sở dữ liệu: " . $e->getMessage());
    }

    // Lấy id sản phẩm từ tham số truy vấn (URL)
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $product_id = $_GET['id'];
        
        // Truy vấn thông tin sản phẩm và biến thể của nó
        $query = "SELECT p.name AS product_name, p.description, p.price, p.type,
                        v.variation_name, v.variation_value, v.variation_amount
                FROM products p
                LEFT JOIN product_variations v ON p.id = v.product_id
                WHERE p.id = ?
                ORDER BY v.variation_name, v.variation_value DESC";
        
        $stmt = $pdo->prepare($query);
        $stmt->execute([$product_id]);
        
        $productData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if (empty($productData)) {
            echo "Sản phẩm không tồn tại.";
        } else {
            // Xây dựng chuỗi thông tin sản phẩm và biến thể bao gồm số lượng
            $productInfo = "";
            $current_variation_name = null;
            $totalVariationAmount = 0; // Biến để tính tổng số lượng

            foreach ($productData as $variation) {
                if ($variation['variation_name'] !== $current_variation_name) {
                    if ($current_variation_name !== null) {
                        $productInfo .= "</ul>";
                    }
                    $current_variation_name = $variation['variation_name'];
                    $productInfo .= "{$current_variation_name}: ";
                    $productInfo .= "<ul>";
                }

                $productInfo .= "{$variation['variation_value']},";
                $totalVariationAmount += $variation['variation_amount']; // Cộng vào tổng số lượng
            }

            if (!empty($productData)) {
                $productInfo .= "</ul>";
            }

            echo "<h1>{$productData[0]['product_name']}</h1>";
            echo "<p>{$productData[0]['description']}</p>";
            echo "<p>Giá: {$productData[0]['price']}</p>";
            echo "<p>Loại: {$productData[0]['type']}</p>";
            
            echo "<h2>Biến thể:</h2>";
            echo $productInfo;

            // In tổng số lượng
            echo "<p>Tổng số lượng: $totalVariationAmount</p>";
        }
    } else {
        echo "ID sản phẩm không hợp lệ.";
    }
?>
