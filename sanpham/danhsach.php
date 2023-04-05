<?php
$sql = "SELECT * FROM products inner join brands on products.brand_id = brands.brand_id";
$query = mysqli_query($connect, $sql);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Tên SP</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>SL</th>
                        <th>Mô tả</th>
                        <th>Hãng</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['prd_name']; ?></td>
                            <td>
                                <img style="width: 50px;" src="img/<?php echo $row['image']; ?>">
                            </td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['brand_name']; ?></td>
                            <td>
                                <a class="btn btn-secondary" onclick="return Up('<?php echo $row['prd_name'] ?>')" href="index.php?page_layout=sua&id=<?php echo $row['prd_id'] ;?>">Update</a>
                            </td>

                            <td>
                                <a class="btn btn-success" onclick="return Del('<?php echo $row['prd_name'] ?>')" href="index.php?page_layout=xoa&id=<?php echo $row['prd_id'] ;?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a class="btn btn-primary" href="index.php?page_layout=them">+ Add sản phẩm</a>
        </div>
    </div>
</div>
<script>
    function Del(name)
    {
        return confirm("Bạn có chắc muốn xóa sản phẩm này Không ?");
    }

    function Up(name)
    {
        return confirm("Bạn có chắc muốn sửa sản phẩm Không ?");
    }
</script>