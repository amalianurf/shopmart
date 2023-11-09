</header>
<main>
    <?php if (isset($_SESSION['success_message'])): ?>
        <div id="success" class="notification">
            <div><span style="color: green;" class="material-symbols-outlined"><span class="material-symbols-outlined">check_circle</span></div>
            <p><?= $_SESSION['success_message']; ?></p>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['fail_message'])): ?>
        <div id="fail" class="notification">
            <div><span style="color: red;" class="material-symbols-outlined">cancel</span></div>
            <p><?= $_SESSION['fail_message']; ?></p>
        </div>
    <?php endif; ?>
    <img id="imageProduct" src="<?= BASEURL ?>/public/img/product/<?= $data["product"][0]["thumbnail"]; ?>" alt="image-product">
    <section class="left">
        <h1 id="titleProduct">
            <?= $data["product"][0]["nama_produk"]; ?>
        </h1>
        <div class="desc-wrapper">
            <h4>Deskripsi Produk</h4>
            <div id="descProduct">
                <?= $data["product"][0]["deskripsi"]; ?>
            </div>
        </div>
        <div class="rating-wrapper">
            <h4>Ratings</h4>
            <div class="rating">
                <?php
                    $ratings = !empty($data["product"][0]["ratings"]) ? $data["product"][0]["ratings"] : 0;
                    if ($ratings > 0):
                ?>
                    <?php for ($i = 0; $i < floor($ratings); $i++): ?>
                        <div class="star-wrapper active"><span class="material-symbols-rounded">star</span></div>
                    <?php endfor; ?>

                    <?php if ($ratings > floor($ratings)): ?>
                        <div class="star-wrapper active"><span class="material-symbols-rounded">star_half</span></div>
                    <?php endif; ?>

                    <?php if (floor($ratings) < 4): ?>
                        <?php for ($i = 0; $i < 4 - floor($ratings); $i++): ?>
                            <div class="star-wrapper"><span class="material-symbols-rounded">star</span></div>
                        <?php endfor; ?>
                    <?php elseif ($ratings == 4): ?>
                        <div class="star-wrapper"><span class="material-symbols-rounded">star</span></div>
                    <?php endif; ?>
                <?php else: ?>
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <div class="star-wrapper"><span class="material-symbols-rounded">star</span></div>
                    <?php endfor; ?>
                <?php endif; ?>
                <p>(<?= $data["product"][0]["count_rating"]?>)</p>
            </div>
        </div>
        <div class="review-wrapper">
            <h4>Review</h4>
            <div class="reviews" id="reviews">
                <?php if ($data["product"][0]["count_rating"] == 0): ?>
                    <p>Belum ada review</p>
                <?php else: ?>
                    <?php for ($i = 0; $i < $data["product"][0]["count_rating"]; $i++): ?>
                        <div class="review">
                            <div class="info-review">
                                <p class="username"><?= $data["reviews"][$i]["nama"] ?></p>
                                <div class="rating">
                                    <div class="star-wrapper active"><span class="material-symbols-rounded">star</span></div>
                                    <p><?= $data["reviews"][$i]["rating"] ?></p>
                                </div>
                            </div>
                            <p class="review-message"><?= $data["reviews"][$i]["pesan"] ?></p>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="right">
        <div class="info-product">
            <h3>Beli Sekarang</h3>
            <div class="price">
                <?php if ($data["product"][0]["diskon"] > 0) : ?>
                    <div class="discount-price">
                        <p class="before-discount"><?= 'Rp ' . number_format($data["product"][0]["harga"], 0, ',', '.') . ',00';?></p>
                        <p><?= 'Rp ' . number_format($data["product"][0]["harga"] * (1 - $data["product"][0]["diskon"] / 100), 0, ',', '.') . ',00';?></p>
                    </div>
                <?php else : ?>
                    <?= 'Rp ' . number_format($data["product"][0]["harga"], 0, ',', '.') . ',00';?>
                <?php endif; ?>
            </div>
        </div>
        <div class="get-product">
            <form action="<?= BASEURL ?>/cart/add" method="POST">
                <div class="quantity">
                    <label for="quantity">Jumlah</label>
                    <div>
                        <button type="button" class="quantity-btn" id="decrement">-</button>
                        <input type="number" id="quantity" name="quantity" min="1" value="1">
                        <button type="button" class="quantity-btn" id="increment">+</button>
                    </div>
                    <input type="number" name="id_product" value="<?= $data["product"][0]["id"]; ?>" hidden>
                </div>
                <button type="submit" id="addToCart">Masukan Keranjang</button>
            </form>
        </div>
    </section>
</main>
<script>
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