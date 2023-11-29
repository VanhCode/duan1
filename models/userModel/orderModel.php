<?php
    function insert_bill($user_id,$ma_don_hang,$receiver_name,$receiver_phone,$receiver_address,$payment_method) {
        $sql = "INSERT INTO `orders`(`user_id`, `ma_don_hang`, `receiver_name`, `receiver_phone`, `receiver_address`,`payment_method`) 
                VALUES 
        ('$user_id','$ma_don_hang','$receiver_name','$receiver_phone','$receiver_address','$payment_method')";
        return pdo_execute_returnLastInsertId($sql);

    }

    function insert_bill_detail($order_id, $product_id, $amount, $size, $color, $price,$voucher) {
        $sql = "INSERT INTO `order_detailS`(`order_id`, `product_id`, `amount`, `size`, `color`, `price`,`voucher`) 
                VALUES 
        ('$order_id','$product_id','$amount','$size','$color','$price','$voucher')";
        pdo_execute($sql);
    }

    // Select Đơn hàng
    function load_bill_byid($order_id) {
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
                    orders.create_at,
                    order_details.order_detail_id,
                    order_details.order_id,
                    order_details.product_id,
                    order_details.amount,
                    order_details.size,
                    order_details.color,
                    order_details.price as price_orderDetail,
                    order_details.voucher,
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
                    orders.order_id = $order_id
                ORDER BY orders.order_id DESC   
        ";
        return pdo_query_one($sql);
    }


    function load_all_order($user_id) {
        $sql = "SELECT
                    orders.order_id,
                    orders.user_id,
                    orders.ma_don_hang,
                    orders.status,
                    orders.payment_status,
                    orders.payment_method,
                    order_details.order_detail_id,
                    order_details.order_id,
                    order_details.product_id,
                    order_details.amount,
                    order_details.size,
                    order_details.color,
                    order_details.price as price_orderDetail,
                    order_details.voucher,
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
                    orders.status,
                    orders.payment_status,
                    orders.payment_method,
                    order_details.order_detail_id,
                    order_details.order_id,
                    order_details.product_id,
                    order_details.amount,
                    order_details.size,
                    order_details.color,
                    order_details.price as price_orderDetail,
                    order_details.voucher,
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
                    orders.status,
                    orders.payment_status,
                    orders.payment_method,
                    order_details.order_detail_id,
                    order_details.order_id,
                    order_details.product_id,
                    order_details.amount,
                    order_details.size,
                    order_details.color,
                    order_details.price as price_orderDetail,
                    order_details.voucher,
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
                    orders.status,
                    orders.payment_status,
                    orders.payment_method,
                    order_details.order_detail_id,
                    order_details.order_id,
                    order_details.product_id,
                    order_details.amount,
                    order_details.size,
                    order_details.color,
                    order_details.price as price_orderDetail,
                    order_details.voucher,
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
                    orders.status,
                    orders.payment_status,
                    orders.payment_method,
                    order_details.order_detail_id,
                    order_details.order_id,
                    order_details.product_id,
                    order_details.amount,
                    order_details.size,
                    order_details.color,
                    order_details.price as price_orderDetail,
                    order_details.voucher,
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


    function sendMail_bil($data, $dataimg, $ngaydathang, $madonhang, $emailUser, $fullname) {
        include "./PHPMailer/src/PHPMailer.php";
        include "./PHPMailer/src/Exception.php";
        include "./PHPMailer/src/SMTP.php";
    

        $mail = new PHPMailer\PHPMailer\PHPMailer(true); 
        $mail->CharSet = 'UTF-8';
        // print_r($mail);

        try {
            //Server settings
            $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                            
            $mail->isSMTP();                                     
            $mail->Host = 'smtp.gmail.com';                    
            $mail->SMTPAuth = true;                               
            $mail->Username = 'tranvanh2k4@gmail.com';                 
            $mail->Password = 'wydpxhjaafutpjnh';                   
            $mail->SMTPSecure = 'tls';                           
            $mail->Port = 587;                                  
         
     
            $mail->setFrom('tranvanh2k4@gmail.com', 'VanhStore');

            $mail->addAddress($emailUser,$fullname);         
            // Embedding Image

            foreach ($dataimg as $index => $image) {
                $mail->addEmbeddedImage('./public/upload/image/product/'.$image, 'product_image_'.$index, $image, 'base64', 'image/jpeg; charset=utf-8');
            }

            $mail->addEmbeddedImage('./img1/vanhcart.jpg', 'vanhcart', 'vanhcart.jpg');
            $email = 'email@example.com';
            $body = "";
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Đơn hàng #'.$madonhang.' được đặt thành công tại Website VanhStore';

            $body .= '
                <div style="max-width: 610px; margin: 0 auto; font-family: Roboto, sans-serif; display: flex;">
                    <div style="width: 100%;">
                        <div style="text-align: center;">
                            <img style="width: 200px; margin: 0 auto;" src="cid:vanhcart" alt="">
                        </div>
                        <div style="max-width: 610px; margin: 0 auto;">
                            <p>Xin chào '.$fullname.',</p>
                            <p>Đơn hàng #'.$madonhang.' vừa được đặt thành công tại Website VanhStore.</p>                
                            <p>Vui lòng đăng nhập vào Website VanhStore để theo dõi đơn hàng của bạn.</p>
                        </div>
                        <hr>
                        <div style="max-width: 610px; margin: 0 auto;">
                            <h3>THÔNG TIN ĐƠN HÀNG - DÀNH CHO NGƯỜI MUA</h3>
                            <div style="display: flex; flex-direction: column;">
                                <div style="display: flex; align-items: center; justify-content: space-between;">
                                    <div>
                                        <p>Mã đơn hàng:</p>
                                        <p>Ngày đặt hàng:</p>
                                        <p>Shop:</p>
                                    </div>
                                    <div>
                                        <p>#'.$madonhang.'</p>
                                        <p>'.$ngaydathang.'</p>
                                        <p>VanhStore</p>
                                    </div>
                                </div>';
        $thanhtien = 0;
        foreach($data as $index => $product) {
            $tongtien = $product['amount'] * $product['price'];
            $thanhtien += $tongtien;
            $body .='           <div style="display: flex; align-items: center; justify-content: space-between;">
                                    <div style="margin: 20px 0;">
                                        <img width="80px" src="cid:product_image_'.$index.'" alt="">
                                    </div>
                                    <div style="display: flex; align-items: center; justify-content: space-between;">
                                        <div>
                                            <p>Tên sản phẩm:</p>
                                            <p>Màu sắc:</p>
                                            <p>Size:</p>
                                            <p>Số lượng:</p>
                                            <p>Giá:</p>
                                        </div>
                                        <div>
                                            <p>'.$product['product_name'].'</p>
                                            <p>'.$product['color'].'</p>
                                            <p>'.$product['size'].'</p>
                                            <p>'.$product['amount'].'</p>
                                            <p>₫ '.number_format($product['price'],0,',','.').'</p>
                                        </div>
                                    </div>
                                </div>';
                        }
                    $body .= '</div>
                        </div>
                        <hr>
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div>
                                <p>Tổng tiền:</p>
                                <p>Voucher:</p>
                                <p>Tổng thanh toán:</p>
                            </div>
                            <div>
                                <p>₫ '.number_format($thanhtien,0,',','.').'</p>
                                <p>₫ 20.000</p>
                                <p>₫ '.number_format($thanhtien,0,',','.').'</p>
                            </div>
                        </div>
                        <hr>
                        <div style="max-width: 610px; margin: 30px 0 0 0;">
                            <p>Trân trọng,</p>
                            <p>Đội ngũ VanhStore</p>
                            <p>Bạn có thắc mắc? Liên hệ chúng tôi <a style="color: #ee4d2d;" href="">tại đây</a></p>
                        </div>
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