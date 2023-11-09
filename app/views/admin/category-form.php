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
            <a href="<?= BASEURL ?>/admin/categories"><span class="material-symbols-outlined" style="padding: 2px; font-size: 36px;">arrow_back</span></a>
            <h1>Kembali</h1>
        </div>
        <h1><?= $data["title"]; ?></h1>
        <form action="<?= BASEURL; ?>/<?= $data["action"] ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group name">
                <label for="code">Kode Kategori</label>
                <input type="text" id="code" name="code" placeholder="Masukkan kode kategori" value="<?= $data["category"][0]["kode"]; ?>" <?= $data["title"] == "Edit Kategori" ? 'disabled' : 'required' ?> />
            </div>

            <div class="form-group name">
                <label for="name">Nama Kategori</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama kategori" value="<?= $data["category"][0]["nama_kategori"]; ?>" required />
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