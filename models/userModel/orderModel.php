<?php
    function insert_bill($user_id,$ma_don_hang,$receiver_name,$receiver_phone,$receiver_address,$payment_status,$payment_method,$voucher) {
        $sql = "INSERT INTO `orders`(`user_id`, `ma_don_hang`, `receiver_name`, `receiver_phone`, `receiver_address`,`payment_status`,`payment_method`,`voucher`) 
                VALUES 
        ('$user_id','$ma_don_hang','$receiver_name','$receiver_phone','$receiver_address','$payment_status','$payment_method','$voucher')";
        return pdo_execute_returnLastInsertId($sql);

    }

    function insert_bill_detail($order_id, $product_id, $amount, $size, $color, $price) {
        $sql = "INSERT INTO `order_detailS`(`order_id`, `product_id`, `amount`, `size`, `color`, `price`) 
                VALUES 
        ('$order_id','$product_id','$amount','$size','$color','$price')";
        pdo_execute($sql);
    }

    // Select Đơn hàng
    function load_bill_byid($order_id, $user_id) {
        $sql = "SELECT
                orders.order_id,
                orders.user_id,
                orders.ma_don_hang,
                orders.receiver_name,
                orders.receiver_phone,
                orders.receiver_address,
                orders.status,
                orders.payment_status,
                orders.payment_method,
                orders.voucher,
                orders.create_at,
                GROUP_CONCAT(order_details.order_detail_id) as order_detail_ids,
                GROUP_CONCAT(order_details.product_id) as product_ids,
                GROUP_CONCAT(order_details.amount) as amounts,
                GROUP_CONCAT(order_details.size) as sizes,
                GROUP_CONCAT(order_details.color) as colors,
                GROUP_CONCAT(order_details.price) as prices,
                GROUP_CONCAT(products.product_name) as product_names,
                GROUP_CONCAT(products.images SEPARATOR ';') as product_images,
                GROUP_CONCAT(products.sale) as product_sales
            FROM
                orders
            INNER JOIN
                order_details ON orders.order_id = order_details.order_id
            INNER JOIN
                products ON order_details.product_id = products.product_id
            WHERE
                orders.order_id = $order_id
            AND
                orders.user_id = $user_id
        ";
        
        return pdo_query_one($sql);
    }

    // Đếm số đơn trong Bảng orders
    function count_order_allbill($user_id) {
        $sql = "SELECT * FROM orders WHERE user_id = $user_id";
        return pdo_query($sql);
    }

    function count_order_choxacnhan($user_id) {
        $sql = "SELECT * FROM orders WHERE orders.status = 'pending' AND user_id = $user_id";
        return pdo_query($sql);
    }

    function count_order_daxacnhan($user_id) {
        $sql = "SELECT * FROM orders WHERE orders.status = 'confirmed' AND user_id = $user_id";
        return pdo_query($sql);
    }

    function count_order_danggiao($user_id) {
        $sql = "SELECT * FROM orders WHERE orders.status = 'shipping' AND user_id = $user_id";
        return pdo_query($sql);
    }

    function count_order_hoanthanh($user_id) {
        $sql = "SELECT * FROM orders WHERE orders.status = 'completed' AND user_id = $user_id";
        return pdo_query($sql);
    }

    function count_order_dahuy($user_id) {
        $sql = "SELECT * FROM orders WHERE orders.status = 'canceled' AND user_id = $user_id";
        return pdo_query($sql);
    }

    function load_all_order($user_id) {
        $sql = "SELECT
                    orders.order_id,
                    orders.user_id,
                    orders.ma_don_hang,
                    orders.receiver_name,
                    orders.receiver_phone,
                    orders.receiver_address,
                    orders.status,
                    orders.payment_status,
                    orders.payment_method,
                    orders.voucher,
                    orders.create_at,
                    order_details.order_detail_id,
                    order_details.order_id,
                    order_details.product_id,
                    order_details.amount,
                    order_details.size,
                    order_details.color,
                    order_details.price as price_orderDetail,
                    products.product_id,
                    products.product_name,
                    products.images,
                    products.price,
                    products.sale
                FROM
                    orders
                INNER JOIN
                    order_details ON orders.order_id = order_details.order_id
                INNER JOIN
                    products ON order_details.product_id = products.product_id
                WHERE
                    user_id = $user_id
                ORDER BY orders.order_id DESC
        ";
        return pdo_query($sql);
    }

    function load_bill_choxacnhan($user_id) {
        $sql = "SELECT
                    orders.order_id,
                    orders.user_id,
                    orders.ma_don_hang,
                    orders.receiver_name,
                    orders.receiver_phone,
                    orders.receiver_address,
                    orders.status,
                    orders.payment_status,
                    orders.payment_method,
                    orders.voucher,
                    orders.create_at,
                    order_details.order_detail_id,
                    order_details.order_id,
                    order_details.product_id,
                    order_details.amount,
                    order_details.size,
                    order_details.color,
                    order_details.price as price_orderDetail,
                    products.product_id,
                    products.product_name,
                    products.images,
                    products.price,
                    products.sale
                FROM
                    orders
                INNER JOIN
                    order_details ON orders.order_id = order_details.order_id
                INNER JOIN
                    products ON order_details.product_id = products.product_id
                WHERE
                    orders.status = 'pending'
                AND
                    user_id = $user_id
                ORDER BY orders.order_id DESC
                
        ";
        return pdo_query($sql);
    }

    function load_bill_daxacnhan($user_id) {
        $sql = "SELECT
                    orders.order_id,
                    orders.user_id,
                    orders.ma_don_hang,
                    orders.receiver_name,
                    orders.receiver_phone,
                    orders.receiver_address,
                    orders.status,
                    orders.payment_status,
                    orders.payment_method,
                    orders.voucher,
                    orders.create_at,
                    order_details.order_detail_id,
                    order_details.order_id,
                    order_details.product_id,
                    order_details.amount,
                    order_details.size,
                    order_details.color,
                    order_details.price as price_orderDetail,
                    products.product_id,
                    products.product_name,
                    products.images,
                    products.price,
                    products.sale
                FROM
                    orders
                INNER JOIN
                    order_details ON orders.order_id = order_details.order_id
                INNER JOIN
                    products ON order_details.product_id = products.product_id
                WHERE
                    orders.status = 'confirmed'
                AND
                    user_id = $user_id
                ORDER BY orders.order_id DESC
                
        ";
        return pdo_query($sql);
    }

    function load_bill_danggiao($user_id) {
        $sql = "SELECT
                    orders.order_id,
                    orders.user_id,
                    orders.ma_don_hang,
                    orders.receiver_name,
                    orders.receiver_phone,
                    orders.receiver_address,
                    orders.status,
                    orders.payment_status,
                    orders.payment_method,
                    orders.voucher,
                    orders.create_at,
                    order_details.order_detail_id,
                    order_details.order_id,
                    order_details.product_id,
                    order_details.amount,
                    order_details.size,
                    order_details.color,
                    order_details.price as price_orderDetail,
                    products.product_id,
                    products.product_name,
                    products.images,
                    products.price,
                    products.sale
                FROM
                    orders
                INNER JOIN
                    order_details ON orders.order_id = order_details.order_id
                INNER JOIN
                    products ON order_details.product_id = products.product_id
                WHERE
                    orders.status = 'shipping'
                AND
                    user_id = $user_id
                ORDER BY orders.order_id DESC
                
        ";
        return pdo_query($sql);
    }
    function load_bill_hoanthanh($user_id) {
        $sql = "SELECT
                    orders.order_id,
                    orders.user_id,
                    orders.ma_don_hang,
                    orders.receiver_name,
                    orders.receiver_phone,
                    orders.receiver_address,
                    orders.status,
                    orders.payment_status,
                    orders.payment_method,
                    orders.voucher,
                    orders.create_at,
                    order_details.order_detail_id,
                    order_details.order_id,
                    order_details.product_id,
                    order_details.amount,
                    order_details.size,
                    order_details.color,
                    order_details.price as price_orderDetail,
                    products.product_id,
                    products.product_name,
                    products.images,
                    products.price,
                    products.sale
                FROM
                    orders
                INNER JOIN
                    order_details ON orders.order_id = order_details.order_id
                INNER JOIN
                    products ON order_details.product_id = products.product_id
                WHERE
                    orders.status = 'completed'
                AND
                    user_id = $user_id
                ORDER BY orders.order_id DESC
                
        ";
        return pdo_query($sql);
    }

    function load_bill_dahuy($user_id) {
        $sql = "SELECT
                    orders.order_id,
                    orders.user_id,
                    orders.ma_don_hang,
                    orders.receiver_name,
                    orders.receiver_phone,
                    orders.receiver_address,
                    orders.status,
                    orders.payment_status,
                    orders.payment_method,
                    orders.voucher,
                    orders.create_at,
                    order_details.order_detail_id,
                    order_details.order_id,
                    order_details.product_id,
                    order_details.amount,
                    order_details.size,
                    order_details.color,
                    order_details.price as price_orderDetail,
                    products.product_id,
                    products.product_name,
                    products.images,
                    products.price,
                    products.sale
                FROM
                    orders
                INNER JOIN
                    order_details ON orders.order_id = order_details.order_id
                INNER JOIN
                    products ON order_details.product_id = products.product_id
                WHERE
                    orders.status = 'canceled'
                AND
                    user_id = $user_id
                ORDER BY orders.order_id DESC
                
        ";
        return pdo_query($sql);
    }

    // function check_trangthai_thanhtoan($order_id) {
    //     $sql = "SELECT orders.payment_method FROM orders WHERE order_id = $order_id";
    //     return pdo_query_one($sql);
    // }

    // Update yêu cầu hủy đơn hàng
    function update_donhuy($order_id,$status) {
        $sql = "UPDATE orders SET status = '".$status."', create_at = NOW() WHERE order_id = $order_id";
        pdo_execute($sql);;
    }

    // Gửi mail khi đặt hàng thành công
    function sendMail_bil($data, $dataimg, $ngaydathang, $madonhang, $emailUser, $fullname,$voucher) {

        include "./PHPMailer/src/PHPMailer.php";
        include "./PHPMailer/src/Exception.php";
        include "./PHPMailer/src/SMTP.php";

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->CharSet = 'UTF-8';

        try {
            // Server settings
            $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tranvanh2k4@gmail.com';
            $mail->Password = 'wydpxhjaafutpjnh';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('tranvanh2k4@gmail.com', 'VanhStore');
            $mail->addAddress($emailUser, $fullname);

            // Embedding Image
            foreach ($dataimg as $index => $image) {
                $mail->addEmbeddedImage(
                    './public/upload/image/product/' . $image,
                    'product_image_' . $index,
                    $image,
                    'base64',
                    'image/jpeg; charset=utf-8'
                );
            }

            $mail->addEmbeddedImage('./img1/vanhcart.jpg', 'vanhcart', 'vanhcart.jpg');

            $email = 'email@example.com';
            $body = '';
            $mail->isHTML(true);                                 // Set email format to HTML
            $mail->Subject = 'Đơn hàng #'.$madonhang.' được đặt thành công tại Website VanhStore';

            $body .= '
            <div style="max-width: 610px; margin: 0; font-family: Roboto, sans-serif;">
                <div style="text-align: center;">
                    <img style="width: 100%; max-width: 200px; margin: 0 auto;" src="cid:vanhcart" alt="">
                </div>
                <div style="max-width: 100%; margin: 0;">
                    <p>Xin chào ' . $fullname . ',</p>
                    <p>Đơn hàng <a style="color: #ee4d2d;" href="http://localhost/duan1/index.php?action=user&user=don-mua">#'.$madonhang.'</a> vừa được đặt thành công tại Website VanhStore.</p>
                    <p>Vui lòng đăng nhập vào Website VanhStore để theo dõi đơn hàng của bạn.</p>
                </div>
            </div>
            <h3>THÔNG TIN ĐƠN HÀNG - DÀNH CHO NGƯỜI MUA</h3>
            <div style="display: flex; flex-direction: column;">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p>Mã đơn hàng:</p>
                        <p>Ngày đặt hàng:</p>
                        <p>Shop:</p>
                    </div>
                    <div>
                        <p><a style="color: #ee4d2d;" href="http://localhost/duan1/index.php?action=user&user=don-mua">#'.$madonhang.'</a></p>
                        <p>'.$ngaydathang.'</p>
                        <p><a style="color: #ee4d2d;" href="http://localhost/duan1/index.php">VanhStore</a></p>
                    </div>
                </div>
            </div>
        ';         
        $thanhtien = 0;

        foreach ($data as $index => $product) {
            $tongtien = $product['amount'] * $product['sale'];
            $thanhtien += $tongtien;
            $body .='       <table style="width: 100%; margin: 20px 0;">
                                
                                    <tr>
                                        <div style="margin: 20px 0;">
                                            <img width="80px" src="cid:product_image_'.$index.'" alt="">
                                        </div>
                                    </tr>
                                    
                                    <tr>
                                        <td >
                                            <div>
                                                <p>Tên sản phẩm:</p>
                                                <p>Màu sắc:</p>
                                                <p>Size:</p>
                                                <p>Số lượng:</p>
                                                <p>Giá:</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <p>'.$product['product_name'].'</p>
                                                <p>'.$product['color'].'</p>
                                                <p>'.$product['size'].'</p>
                                                <p>'.$product['amount'].'</p>
                                                <p>₫ '.number_format($product['sale'],0,',','.').'</p>
                                            </div>
                                        </td>
                                    </tr>
                                
                            </table>';
                        }
                    $body .= '<div style="max-width: 100%; margin: 30px 0 0 0;">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div>
                                <p>Tổng tiền:</p>
                                <p>Voucher:</p>
                                <p>Tổng thanh toán:</p>
                            </div>
                            <div>
                                <p>₫ '.number_format($thanhtien,0,',','.').'</p>
                                <p>₫ '.number_format($voucher,0,',','.').'</p>
                                <p>₫ '.number_format($thanhtien + $voucher,0,',','.').'</p>
                            </div>
                        </div>
                        <hr>
                        <div style="max-width: 610px; margin: 30px 0 0 0;">
                            <p>Trân trọng,</p>
                            <p>Đội ngũ VanhStore</p>
                            <p>Bạn có thắc mắc? Liên hệ chúng tôi <a style="color: #ee4d2d;" href="">tại đây</a></p>
                        </div>
                    </div>
            ';
            
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->Body = $body ? $body : "";
            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

?>