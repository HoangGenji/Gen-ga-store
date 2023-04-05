<?php
include_once "con_dbb.php";
session_start();
//supprimer les produits
//si la variable del existe
if (isset($_GET['del'])) {
    $id_del = $_GET['del'];
    //suppression
    unset($_SESSION['panier'][$id_del]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style.css">
    <?php include_once('header.php') ?>
</head>

<body>
    <div class="panier">
        <section>
            <table>
                <tr>
                    <th></th>
                    <th>Tên sản phẩm</th>
                    <th>Giá bán:</th>
                    <th>Số lượng</th>
                    <th></th>
                </tr>
                <?php
                
                $total = 0;
                // liste des produits
                //récupérer les clés du tableau session
                $ids = array_keys($_SESSION['panier']);
                //s'il n'y a aucune clé dans le tableau
                if (empty($ids)) {
                    echo "Votre panier est vide";
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
                            <td><a href="panier.php?del=<?= $product['id'] ?>"><img src="delete.png"></a></td>
                        </tr>

                <?php endforeach;
                } ?>

                <tr class="total">
                    <th>Total : <?= number_format($total) ?>đ</th>
                </tr>

            </table>
            <br>
            <br>
            <a href="index_cart.php" class="link">Thanh toán</a>
        </section>
    </div>
</body>

</html>