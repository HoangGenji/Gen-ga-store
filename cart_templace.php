<?php
session_start();
error_reporting(0);

include_once "con_dbb.php";

//supprimer les produits
//si la variable del existe
if (isset($_GET['del'])) {
    $id_del = $_GET['del'];
    //suppression
    unset($_SESSION['panier'][$id_del]);
}
?>
<?php include_once('header.php') ?>

    <h1 class="panier-heading">GIỎ HÀNG</h1>
<div class="panier">
    <section>
        <table>
            <tr>
                <th class="ab">Ảnh sản phẩm</th>
                <th class="ab">Tên sản phẩm</th>
                <th class="ab">Thành tiền</th>
                <th class="ab">Số lượng</th>
                <th></th>
            </tr>
            <?php
            $total = 0;
            // liste des produits
            //récupérer les clés du tableau session
            $ids = array_keys($_SESSION['panier']);
            //s'il n'y a aucune clé dans le tableau
            if (empty($ids)) {
                echo "<p class='thongbao'> Bạn chưa có sản phẩm nào ! </p>";
            } else {
                //si oui 
                $products = mysqli_query($con, "SELECT * FROM products WHERE id IN (" . implode(',', $ids) . ")");

                //lise des produit avec une boucle foreach
                foreach ($products as $product) :
                    //calculer le total ( prix unitaire * quantité) 
                    //et aditionner chaque résutats a chaque tour de boucle
                    $total = $total + $product['price'] * $_SESSION['panier'][$product['id']];
            ?>
                    <tr>
                        <td><img src="project_images/<?= $product['img'] ?>"></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= number_format($product['price']) ?>đ</td>
                        <td><?= $_SESSION['panier'][$product['id']] // Quantité
                            ?></td>
                        <td><a href="cart_templace.php?del=<?= $product['id'] ?>"><img class="icon" src="del.png"></a></td>
                    </tr>

            <?php endforeach;
            } ?>

            <tr class="total">
                <th>Phải thanh toán : <?= number_format($total) ?>đ (đã bao gồm VAT)</th>
            </tr>

        </table>
        <br>
        <a href="index.php" class="link" onclick="return Del('<?php echo $row['name'] ?>')"><i class="ti-shopping-cart"></i> Thanh toán</a>
        <br>
        <br>
        <a href="index.php" class="link"><i class="ti-arrow-left"></i> Tiếp tục mua hàng</a> <br>
    </section>
</div>

<script>
    function Del(name) {
        return confirm("Bạn có muốn thanh toán thành không ?");
    }
</script>

<?php include_once('footer.php') ?>