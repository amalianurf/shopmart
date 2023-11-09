</header>
<div onclick="deleteConfirm()" id="modalBackground" class="modal-background hidden"></div>
<div id="modal" class="modal hidden">
    <div class="close-wrapper">
        <p>Delete Confirmation</p>
        <button onclick="deleteConfirm()" class="close-button"><span class="material-symbols-outlined">close</span></button>
    </div>
    <p>Apakah Anda yakin akan menghapus item?</p>
    <div class="button-wrapper">
        <a id="deleteLink" class="delete-button">Yes</a>
        <button onclick="deleteConfirm()" class="cancel-button">Cancel</button>
    </div>
</div>
<main>
    <?php if (isset($_SESSION['success_message'])): ?>
        <div id="success" class="notification">
            <div><span style="color: green;" class="material-symbols-outlined"><span class="material-symbols-outlined">check_circle</span></div>
            <p><?= $_SESSION['success_message'] ?></p>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['fail_message'])): ?>
        <div id="fail" class="notification">
            <div><span style="color: red;" class="material-symbols-outlined">cancel</span></div>
            <p><?= $_SESSION['fail_message'] ?></p>
        </div>
    <?php endif; ?>
    <section class="admin-section-title">
        <h1>Data Product</h1>
        <div>
            <a href='products/add' id='addBtn'>Add Product</a>
        </div>
    </section>
    <section class="admin-table">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Discount</th>
                    <th>Price</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="items">
                <?php foreach ($data["products"] as $product): ?>
                    <tr>
                        <td><?=$product["id"]?></td>
                        <td><?=$product["nama_produk"]?></td>
                        <td><?=$product["kode_kategori"]?></td>
                        <td><?=$product["stok"]?></td>
                        <td><?=$product["diskon"]?></td>
                        <td><?=$product["harga"]?></td>
                        <td><img src="<?= BASEURL ?>/public/img/product/<?=$product["thumbnail"]?>" height="100" alt="<?=$product["thumbnail"]?>"></td>
                        <td><a href="products/edit/<?=$product["id"]?>"><span class="material-symbols-outlined" style="color: blue;">edit</span></a></td>
                        <td><button onclick="deleteConfirm(`products/delete/<?=$product['id']?>`)" id="deleteBtn" class="delete-item"><span class="material-symbols-outlined">delete</span></button></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </section>
</main>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "responsive": true,
            "columnDefs": [
                {
                    "targets": [7],
                    "render": function(data, type, row) {
                        var edit_product = row[7];
                        var delete_product = row[8];
                        return '<div style="display: flex; justify-content: center; gap: 16px;">' + edit_product + ' ' + delete_product + '</div>';
                    }
                },
                {
                    "targets": [8],
                    "visible": false,
                }
            ]
        });
    });

    <?php if (isset($_SESSION['success_message'])): ?>
        var success = document.getElementById("success");
        success.style.display = 'flex';

        setTimeout(function() {
            <?php unset($_SESSION['success_message']); ?>
        }, 2000);
    <?php endif; ?>

    <?php if (isset($_SESSION['fail_message'])): ?>
        var fail = document.getElementById("fail");
        fail.style.display = 'flex';

        setTimeout(function() {
            <?php unset($_SESSION['fail_message']); ?>
        }, 2000);
    <?php endif; ?>
</script>