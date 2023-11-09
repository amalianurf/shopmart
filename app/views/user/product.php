</header>
<main>
    <section id="productByParam" class="list-product">
        <div class="section-title">
            <h1><?= $data["title"] ?></h1>
        </div>
        <div class="product-wrapper">
            <?php for ($i = 0; $i < count($data["products"]); $i++): ?>
                <div class="card-product">
                    <a href="<?= BASEURL ?>/detail-product/<?= $data["products"][$i]["id"]; ?>">
                        <img src="<?= BASEURL ?>/public/img/product/<?= $data["products"][$i]["thumbnail"]; ?>" alt="<?= $data["products"][$i]["nama_produk"]; ?>">
                    </a>
                    <div class="product">
                        <h4><?= $data["products"][$i]["nama_produk"]; ?></h4>
                        <div class="rating">
                            <?php
                                $ratings = !empty($data["products"][$i]["ratings"]) ? $data["products"][$i]["ratings"] : 0;
                                if ($ratings > 0):
                            ?>
                                <?php for ($j = 0; $j < floor($ratings); $j++): ?>
                                    <div class="star-wrapper active"><span class="material-symbols-rounded">star</span></div>
                                <?php endfor; ?>

                                <?php if ($ratings > floor($ratings)): ?>
                                    <div class="star-wrapper active"><span class="material-symbols-rounded">star_half</span></div>
                                <?php endif; ?>

                                <?php if (floor($ratings) < 4): ?>
                                    <?php for ($j = 0; $j < 4 - floor($ratings); $j++): ?>
                                        <div class="star-wrapper"><span class="material-symbols-rounded">star</span></div>
                                    <?php endfor; ?>
                                <?php elseif ($ratings == 4): ?>
                                    <div class="star-wrapper"><span class="material-symbols-rounded">star</span></div>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php for ($j = 0; $j < 5; $j++): ?>
                                    <div class="star-wrapper"><span class="material-symbols-rounded">star</span></div>
                                <?php endfor; ?>
                            <?php endif; ?>
                            <p>(<?= $data["products"][$i]["count_rating"]?>)</p>
                        </div>
                        <div class="price">
                            <?php if ($data["products"][$i]["diskon"] > 0) : ?>
                                <p class="discount-price"><span class="before-discount"><?= 'Rp ' . number_format($data["products"][$i]["harga"], 0, ',', '.') . ',00';?></span> (<?= $data["products"][$i]["diskon"] ?>%)</p>
                            <?php else : ?>
                                <?= 'Rp ' . number_format($data["products"][$i]["harga"], 0, ',', '.') . ',00';?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </section>
</main>