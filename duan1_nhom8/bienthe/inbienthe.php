<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=bienthe", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Lỗi kết nối đến cơ sở dữ liệu: " . $e->getMessage());
    }

    $sql = "SELECT * FROM products WHERE 1 ORDER BY id ASC";
    $state = $pdo->prepare($sql);
    $state->execute();
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
?>

<div>
    <?php
        foreach($result as $key => $value) {
            ?>
                <span><a href="bientheid.php?id=<?= $value['id'] ?>"><?= $value['name'] ?></a></span>
            <?php
        }
    ?>
</div>