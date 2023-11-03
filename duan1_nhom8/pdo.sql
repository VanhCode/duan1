SELECT * FROM products
WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY);

-- Lấy ra sản phẩm mới nhất

SELECT * FROM products
WHERE gender = 'nam';

SELECT * FROM products
WHERE gender = 'nữ';

SELECT * FROM products
WHERE gender = 'khác';
