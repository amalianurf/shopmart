</header>
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
    <div class="form-user">
        <div class="form-title">
            <a href="<?= BASEURL ?>/admin/products"><span class="material-symbols-outlined" style="padding: 2px; font-size: 36px;">arrow_back</span></a>
            <h1>Kembali</h1>
        </div>
        <h1><?= $data["title"]; ?></h1>
        <form action="<?= BASEURL; ?>/<?= $data["action"] ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group name">
                <label for="category">Kategori Produk</label>
                <select id="category" name="category">
                    <?php foreach ($data["categories"] as $category): ?>
                        <option value="<?= $category["kode"] ?>" <?= ($data["product"][0]["kode_kategori"] == $category["kode"]) ? 'selected' : ''; ?>><?= $category["nama_kategori"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group name">
                <label for="name">Nama Produk</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama produk" value="<?= $data["product"][0]["nama_produk"]; ?>" required />
            </div>

            <div class="form-group name">
                <label for="price">Harga (Rp)</label>
                <input type="number" id="price" name="price" placeholder="0" min="10000" value="<?= $data["product"][0]["harga"]; ?>" required />
            </div>

            <div class="form-group name">
                <label for="discount">Diskon (%)</label>
                <input type="number" id="discount" name="discount" placeholder="0" min="0" max="100" value="<?= $data["product"][0]["diskon"]; ?>" required />
            </div>

            <div class="form-group name">
                <label for="stock">Stok</label>
                <input type="number" id="stock" name="stock" placeholder="0" min="1" value="<?= $data["product"][0]["stok"]; ?>" required />
            </div>

            <div class="form-group name">
                <label for="description">Deskripsi</label>
                <textarea id="description" name="description" rows="4" cols="50" placeholder="Masukkan deskripsi produk" required><?= $data["product"][0]["deskripsi"]; ?></textarea>
            </div>

            <div class="form-group name">
                <label for="thumbnail">Upload Thumbnail</label>
                <input type="file" id="thumbnail" name="thumbnail" accept="image/*" onchange="checkFile()">
                <p id="fileTypeError" style="color: red; font-size: 14px; text-align: left; display: none;">Only image files are allowed.</p>
                <p id="fileSizeError" style="color: red; font-size: 14px; text-align: left; display: none;">File size exceeds the limit. Maximum file size 1MB.</p>
            </div>

            <div class="form-button">
                <input type="submit" value="<?= $data["title"]; ?>">
            </div>
        </form>
    </div>
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