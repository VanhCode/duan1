<?php
    function generateRandomOrderCode($length = 8) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max = strlen($characters) - 1;
        $orderCode = '';
    
        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, $max);
            $orderCode .= $characters[$index];
        }
    
        return $orderCode;
    }
    
?>