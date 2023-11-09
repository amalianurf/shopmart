</header>
<main>
    <section>
        <h1>Data Cart</h1>
    </section>
    <section class="admin-table">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Price</th>
                    <th>Thumbnail</th>
                </tr>
            </thead>
            <tbody id="items">
                <?php foreach ($data["cart"] as $cart): ?>
                    <tr>
                        <td><?=$cart["id"]?></td>
                        <td><?=$cart["nama"]?></td>
                        <td><?=$cart["nama_produk"]?></td>
                        <td><?=$cart["total_produk"]?></td>
                        <td><?=$cart["diskon"]?></td>
                        <td><?=$cart["total_harga"]?></td>
                        <td><img src="<?= BASEURL ?>/public/img/product/<?=$cart["thumbnail"]?>" height="100" alt="<?=$cart["thumbnail"]?>"></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </section>
</main>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "responsive": true
        });
    });
</script>