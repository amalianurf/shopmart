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
            <a href="<?= BASEURL ?>/admin/users"><span class="material-symbols-outlined" style="padding: 2px; font-size: 36px;">arrow_back</span></a>
            <h1>Kembali</h1>
        </div>
        <h1><?= $data["title"]; ?></h1>
        <form action="<?= BASEURL; ?>/<?= $data["action"] ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group name">
                <label for="full-name">Nama Lengkap</label>
                <input type="text" id="full-name" name="full-name" placeholder="Masukkan nama lengkap" value="<?= $data["user"][0]["nama"]; ?>" required />
            </div>

            <div class="form-group email">
                <label for="email">Email</label>
                <div class="form-icon">
                    <div class="icon">
                        <span class="material-symbols-outlined">mail</span>
                    </div>
                    <input type="email" id="email" name="email" placeholder="youremailaddress@mail.com" value="<?= $data["user"][0]["email"]; ?>" required />
                </div>
            </div>

            <div class="form-group phone">
                <label for="phone">Nomor Handphone</label>
                <div class="form-icon">
                    <div class="icon">
                        <span class="material-symbols-outlined">call</span>
                    </div>
                    <input type="number" id="phone" name="phone" placeholder="+62XXXXXXXXXX" value="<?= $data["user"][0]["no_hp"]; ?>" required />
                </div>
            </div>

            <div class="form-group password">
                <label for="password">Password</label>
                <div class="form-icon">
                    <div class="icon">
                        <span class="material-symbols-outlined">key</span>
                    </div>
                    <input type="password" id="password" name="password" autocomplete="off" placeholder="&bull; &bull; &bull; &bull; &bull; &bull; &bull; &bull;" />
                    <button type="button" onclick="togglePassword()"><span class="toggle-password material-symbols-outlined" id="togglePassword">visibility</span></button>
                </div>
            </div>

            <div class="form-group gender">
                <label for="gender">Jenis Kelamin</label>
                <div class="gender-wrapper">
                    <div class="radio-wrapper">
                        <input type="radio" id="male" name="gender" value="Laki-laki">
                        <label for="male"> Laki-laki</label>
                    </div>
                    <div class="radio-wrapper">
                        <input type="radio" id="female" name="gender" value="Perempuan">
                        <label for="female"> Perempuan</label>
                    </div>
                </div>
            </div>

            <div class="form-group birth-place">
                <label for="birth-place">Tempat Lahir</label>
                <input type="text" id="birth-place" name="birth-place" placeholder="Masukkan tempat lahir" value="<?= $data["user"][0]["tempat_lahir"]; ?>" required />
            </div>

            <div class="form-group birth-date">
                <label for="birth-date">Tanggal Lahir</label>
                <input type="date" id="birth-date" name="birth-date" value="<?= $data["user"][0]["tanggal_lahir"]; ?>" required />
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea id="address" name="address" rows="4" cols="50" placeholder="Masukkan alamat anda"><?= $data["user"][0]["alamat"]; ?></textarea>
            </div>

            <div class="form-group profile">
                <label for="profile">Upload Foto Profil</label>
                <input type="file" id="profile" name="profile" accept="image/*" onchange="checkFile()">
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