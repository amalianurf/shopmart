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
            <h1>Profile</h1>
        </div>
        <div class="form-wrapper">
            <img src="<?= BASEURL ?>/public/img/profile/<?= $data["user"][0]["photo_profil"] ?>" alt="profile">
            <form action="<?= BASEURL; ?>/<?= $data["action"] ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group name <?= $data["edit"] ? 'active' : '' ?>">
                    <label for="full-name">Nama Lengkap</label>
                    <input type="text" id="full-name" name="full-name" placeholder="Masukkan nama lengkap" value="<?= $data["user"][0]["nama"]; ?>" <?= $data["edit"] ? 'required' : 'disabled' ?> class="<?= $data["edit"] ? 'form-active' : '' ?>" />
                </div>

                <div class="form-group email <?= $data["edit"] ? 'active' : '' ?>">
                    <label for="email">Email</label>
                    <div class="form-icon">
                        <?php if ($data["edit"]): ?>
                            <div class="icon">
                                <span class="material-symbols-outlined">mail</span>
                            </div>
                        <?php endif; ?>
                        <input type="email" id="email" name="email" placeholder="youremailaddress@mail.com" value="<?= $data["user"][0]["email"]; ?>" disabled class="<?= $data["edit"] ? 'form-active active' : '' ?>" />
                    </div>
                </div>

                <div class="form-group password <?= $data["edit"] ? 'active' : '' ?>">
                    <label for="password">Password</label>
                    <div class="form-icon">
                        <?php if ($data["edit"]): ?>
                            <div class="icon">
                                <span class="material-symbols-outlined">key</span>
                            </div>
                        <?php endif; ?>
                        <input type="password" id="password" name="password" autocomplete="off" placeholder="&bull; &bull; &bull; &bull; &bull; &bull; &bull; &bull;" <?= $data["edit"] ? '' : 'disabled' ?> class="<?= $data["edit"] ? 'form-active active' : '' ?>" />
                        <?php if ($data["edit"]): ?>
                            <button type="button" onclick="togglePassword()"><span class="toggle-password material-symbols-outlined" id="togglePassword">visibility</span></button>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group phone <?= $data["edit"] ? 'active' : '' ?>">
                    <label for="phone">Nomor Handphone</label>
                    <div class="form-icon">
                        <?php if ($data["edit"]): ?>
                            <div class="icon">
                                <span class="material-symbols-outlined">call</span>
                            </div>
                        <?php endif; ?>
                        <input type="number" id="phone" name="phone" placeholder="+62XXXXXXXXXX" value="<?= $data["user"][0]["no_hp"]; ?>" <?= $data["edit"] ? 'required' : 'disabled' ?> class="<?= $data["edit"] ? 'form-active active' : '' ?>" />
                    </div>
                </div>

                <div class="form-group gender <?= $data["edit"] ? 'active' : '' ?>">
                    <label for="gender">Jenis Kelamin</label>
                    <?php if ($data["edit"]): ?>
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
                    <?php else: ?>
                        <?php if ($data["user"][0]["jenis_kelamin"] == "laki-laki"): ?>
                            <label style="font-weight: normal;">Laki-laki</label>
                        <?php else: ?>
                            <label style="font-weight: normal;">Perempuan</label>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="form-group birth-place <?= $data["edit"] ? 'active' : '' ?>">
                    <label for="birth-place">Tempat Lahir</label>
                    <input type="text" id="birth-place" name="birth-place" placeholder="Masukkan tempat lahir" value="<?= $data["user"][0]["tempat_lahir"]; ?>" <?= $data["edit"] ? 'required' : 'disabled' ?> class="<?= $data["edit"] ? 'form-active' : '' ?>" />
                </div>

                <div class="form-group birth-date <?= $data["edit"] ? 'active' : '' ?>">
                    <label for="birth-date">Tanggal Lahir</label>
                    <input type="date" id="birth-date" name="birth-date" value="<?= $data["user"][0]["tanggal_lahir"]; ?>" <?= $data["edit"] ? 'required' : 'disabled' ?> class="<?= $data["edit"] ? 'form-active' : '' ?>" />
                </div>

                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea id="address" name="address" rows="4" cols="50" placeholder="Masukkan alamat anda" <?= $data["edit"] ? '' : 'disabled' ?> class="<?= $data["edit"] ? 'form-active' : '' ?>"><?= $data["user"][0]["alamat"]; ?></textarea>
                </div>

                <?php if ($data["edit"]): ?>
                    <div class="form-group profile">
                        <label for="profile">Upload Foto Profil</label>
                        <input type="file" id="profile" name="profile" accept="image/*" onchange="checkFile()">
                        <p id="fileTypeError" style="color: red; font-size: 14px; text-align: left; display: none;">Only image files are allowed.</p>
                        <p id="fileSizeError" style="color: red; font-size: 14px; text-align: left; display: none;">File size exceeds the limit. Maximum file size 1MB.</p>
                    </div>

                    <div class="form-button">
                        <input type="submit" value="Simpan">
                    </div>
                <?php else: ?>
                    <a href="<?= BASEURL ?>/profile/edit" class="btn-edit">Edit Profil</a>
                <?php endif; ?>
            </form>
        </div>
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