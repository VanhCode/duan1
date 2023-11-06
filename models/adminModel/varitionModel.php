<?php
    function addVation($product_id,$color,$size,$amount) {
        $sql = "INSERT INTO variants(product_id, color, size, amount) 
                VALUES ('$product_id','$color','$size','$amount')";
        pdo_execute($sql);
    }

    function updateVation($id, $color, $size, $amount) {
        $sql = "UPDATE variants SET color = '".$color."', size = '".$size."', amount = '".$amount."' WHERE variant_id = '".$id."'";
        pdo_execute($sql);
    }
    function deleteVation($id){
        $sql="DELETE FROM variants WHERE variant_id=".$id;
        pdo_execute($sql);
    }
?>