        <section>
            <div class="slider-container">
                <div class="slider">
                  <div class="slide"><img src="<?= BASEURL; ?>/public/img/banner/banner-1.svg" alt="Banner 1"></div>
                  <div class="slide"><img src="<?= BASEURL; ?>/public/img/banner/banner-2.svg" alt="Banner 2"></div>
                  <div class="slide"><img src="<?= BASEURL; ?>/public/img/banner/banner-3.svg" alt="Banner 3"></div>
                  <div class="slide"><img src="<?= BASEURL; ?>/public/img/banner/banner-4.svg" alt="Banner 4"></div>
                </div>
                <div class="pagination"></div>
            </div>
        </section>
    </header>
    <main>
        <section class="discount">
            <div class="section-title">
                <h1>Discount</h1>
                <span>-</span>
                <a id="seeAllBtn" href="product/discount">See all</a>
            </div>
            <div id="discount" class="product-wrapper">
                <?php for ($i = 0; $i < count($data["discount-products"]); $i++): ?>
                    <div class="card-product">
                        <a href="<?= BASEURL ?>/detail-product/<?= $data["discount-products"][$i]["id"]; ?>">
                            <img src="<?= BASEURL ?>/public/img/product/<?= $data["discount-products"][$i]["thumbnail"]; ?>" alt="<?= $data["discount-products"][$i]["nama_produk"]; ?>">
                        </a>
                        <div class="product">
                            <h4><?= $data["discount-products"][$i]["nama_produk"]; ?></h4>
                            <div class="rating">
                                <?php
                                    $ratings = !empty($data["discount-products"][$i]["ratings"]) ? $data["discount-products"][$i]["ratings"] : 0;
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
                                <p>(<?= $data["discount-products"][$i]["count_rating"]?>)</p>
                            </div>
                            <div class="price">
                                <?php if ($data["discount-products"][$i]["diskon"] > 0) : ?>
                                    <p class="discount-price"><span class="before-discount"><?= 'Rp ' . number_format($data["discount-products"][$i]["harga"], 0, ',', '.') . ',00';?></span> (<?= $data["discount-products"][$i]["diskon"] ?>%)</p>
                                <?php else : ?>
                                    <?= 'Rp ' . number_format($data["discount-products"][$i]["harga"], 0, ',', '.') . ',00';?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </section>
        
        <section class="popular">
            <div class="section-title">
                <h1>Popular</h1>
                <span>-</span>
                <a id="seeAllBtn" href="product/popular">See all</a>
            </div>
            <div id="popular" class="product-wrapper">
                <?php for ($i = 0; $i < count($data["popular-products"]); $i++): ?>
                    <div class="card-product">
                        <a href="<?= BASEURL ?>/detail-product/<?= $data["popular-products"][$i]["id"]; ?>">
                            <img src="<?= BASEURL ?>/public/img/product/<?= $data["popular-products"][$i]["thumbnail"]; ?>" alt="<?= $data["popular-products"][$i]["nama_produk"]; ?>">
                        </a>
                        <div class="product">
                            <h4><?= $data["popular-products"][$i]["nama_produk"]; ?></h4>
                            <div class="rating">
                                <?php
                                    $ratings = !empty($data["popular-products"][$i]["ratings"]) ? $data["popular-products"][$i]["ratings"] : 0;
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
                                <p>(<?= $data["popular-products"][$i]["count_rating"]?>)</p>
                            </div>
                            <div class="price">
                                <?php if ($data["popular-products"][$i]["diskon"] > 0) : ?>
                                    <p class="discount-price"><span class="before-discount"><?= 'Rp ' . number_format($data["popular-products"][$i]["harga"], 0, ',', '.') . ',00';?></span> (<?= $data["popular-products"][$i]["diskon"] ?>%)</p>
                                <?php else : ?>
                                    <?= 'Rp ' . number_format($data["popular-products"][$i]["harga"], 0, ',', '.') . ',00';?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </section>

        <section class="latest">
            <div class="section-title">
                <h1>Latest</h1>
                <span>-</span>
                <a id="seeAllBtn" href="product/latest">See all</a>
            </div>
            <div id="latest" class="product-wrapper">
                <?php for ($i = 0; $i < count($data["latest-products"]); $i++): ?>
                    <div class="card-product">
                        <a href="<?= BASEURL ?>/detail-product/<?= $data["latest-products"][$i]["id"]; ?>">
                            <img src="<?= BASEURL ?>/public/img/product/<?= $data["latest-products"][$i]["thumbnail"]; ?>" alt="<?= $data["latest-products"][$i]["nama_produk"]; ?>">
                        </a>
                        <div class="product">
                            <h4><?= $data["latest-products"][$i]["nama_produk"]; ?></h4>
                            <div class="rating">
                                <?php
                                    $ratings = !empty($data["latest-products"][$i]["ratings"]) ? $data["latest-products"][$i]["ratings"] : 0;
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
                                <p>(<?= $data["latest-products"][$i]["count_rating"]?>)</p>
                            </div>
                            <div class="price">
                                <?php if ($data["latest-products"][$i]["diskon"] > 0) : ?>
                                    <p class="discount-price"><span class="before-discount"><?= 'Rp ' . number_format($data["latest-products"][$i]["harga"], 0, ',', '.') . ',00';?></span> (<?= $data["latest-products"][$i]["diskon"] ?>%)</p>
                                <?php else : ?>
                                    <?= 'Rp ' . number_format($data["latest-products"][$i]["harga"], 0, ',', '.') . ',00';?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </section>
    </main>