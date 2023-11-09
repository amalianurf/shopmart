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
    <section class="product-list">
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th colspan="2">Product Name</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="items">
                <?php
                    $totalPrice = 0;
                    $totalProduct = 0;
                ?>
                <?php for ($i = 0; $i < count($data["cart"]); $i++): ?>
                    <tr>
                        <td><input type="checkbox" value="<?= $data["cart"][$i]["id_produk"]; ?>"></td>
                        <td><img src="<?= BASEURL ?>/public/img/product/<?= $data["cart"][$i]["thumbnail"]; ?>" alt="product"></td>
                        <td class="product-name"><?= $data["cart"][$i]["nama_produk"]; ?></td>
                        <td class="number"><?= $data["cart"][$i]["total_produk"]; ?></td>
                        <td class="number"><?= $data["cart"][$i]["diskon"]; ?></td>
                        <td class="product-price"><?= 'Rp ' . number_format($data["cart"][$i]["total_harga"], 0, ',', '.') . ',00';?></td>
                        <td><button onclick="deleteConfirm(`cart/delete/<?= $data['cart'][$i]['id_produk']; ?>`)" id="deleteBtn" class="delete-cart"><span class="material-symbols-outlined">delete</span></button></td>
                    </tr>
                    <?php
                        $totalProduct += $data["cart"][$i]["total_produk"];
                        $totalPrice += ($data["cart"][$i]["total_harga"] * (1 - $data["cart"][$i]["diskon"] / 100));
                    ?>
                <?php endfor; ?>
            </tbody>
        </table>
    </section>
    <section class="total-product">
        <div class="total">
            <p>Total Product (<?= $totalProduct ?>):</p>
            <p class="total-price">
                <?php
                    if (empty($data["cart"])) {
                        echo 'Rp 00,00';
                    } else {
                        echo 'Rp ' . number_format($totalPrice, 0, ',', '.') . ',00';
                    }
                ?>
            </p>
        </div>
        <button class="buy-now">Beli Sekarang</button>
    </section>
</main>