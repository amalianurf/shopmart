<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopMart</title>
    <link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/public/img/logo/logo-icon.png" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/css/global.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/css/registration.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <script src="<?= BASEURL; ?>/public/js/global.js"></script>
</head>
<body>
    <div class="bg-left"><img src="<?= BASEURL; ?>/public/img/Left.svg" width="60%" alt="bg-img"></div>
    <div class="bg-right"><img src="<?= BASEURL; ?>/public/img/Right.svg" width="60%" alt="bg-img"></div>
    <main>
        <div class="registration">
            <?php if (isset($_SESSION['fail_message'])): ?>
                <div class="notification">
                    <div><span style="color: red;" class="material-symbols-outlined">cancel</span></div>
                    <p><?= $_SESSION['fail_message'] ?></p>
                </div>
            <?php endif; ?>
            <h1>Daftar Akun ShopMart</h1>
            <p>Isi formulir dibawah ini untuk mendaftar akun di ShopMart</p>
            <form action="<?= BASEURL; ?>/registration/register" method="POST" enctype="multipart/form-data">
                <div class="form-group name">
                    <label for="full-name">Nama Lengkap</label>
                    <input type="text" id="full-name" name="full-name" placeholder="Masukkan nama lengkap" required />
                </div>

                <div class="form-group email">
                    <label for="email">Email</label>
                    <div class="form-icon">
                        <div class="icon">
                            <span class="material-symbols-rounded">mail</span>
                        </div>
                        <input type="email" id="email" name="email" placeholder="youremailaddress@mail.com" required />
                    </div>
                </div>

                <div class="form-group phone">
                    <label for="phone">Nomor Handphone</label>
                    <div class="form-icon">
                        <div class="icon">
                            <span class="material-symbols-rounded">call</span>
                        </div>
                        <input type="number" id="phone" name="phone" placeholder="+62XXXXXXXXXX" required />
                    </div>
                </div>

                <div class="form-group password">
                    <label for="password">Password</label>
                    <div class="form-icon">
                        <div class="icon">
                            <span class="material-symbols-rounded">key</span>
                        </div>
                        <input type="password" id="password" name="password" autocomplete="off" placeholder="&bull; &bull; &bull; &bull; &bull; &bull; &bull; &bull;" required />
                        <button type="button" onclick="togglePassword()"><span class="toggle-password material-symbols-rounded" id="togglePassword">visibility</span></button>
                    </div>
                </div>

                <div class="form-group gender">
                    <label for="gender">Jenis Kelamin</label>
                    <div class="gender-wrapper">
                        <div class="radio-wrapper">
                            <input type="radio" id="male" name="gender" value="Laki-laki" required>
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
                    <input type="text" id="birth-place" name="birth-place" placeholder="Masukkan tempat lahir" required />
                </div>

                <div class="form-group birth-date">
                    <label for="birth-date">Tanggal Lahir</label>
                    <input type="date" id="birth-date" name="birth-date" required />
                </div>

                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea id="address" name="address" rows="4" cols="50" placeholder="Masukkan alamat anda"></textarea>
                </div>

                <div class="form-group profile">
                    <label for="profile">Upload Foto Profil</label>
                    <input type="file" id="profile" name="profile" accept="image/*" onchange="checkFile()">
                    <p id="fileTypeError" style="color: red; font-size: 14px; text-align: left; display: none;">Only image files are allowed.</p>
                    <p id="fileSizeError" style="color: red; font-size: 14px; text-align: left; display: none;">File size exceeds the limit. Maximum file size 1MB.</p>
                </div>

                <div class="form-group terms-condition">
                    <div class="checkbox-wrapper">
                        <input id="terms-condition" type="checkbox" value="" required>
                        <label for="terms-condition" >I agree to the <a href="#">terms and conditions</a>.</label>
                    </div>
                  
                    <div class="checkbox-wrapper">
                        <input id="age" type="checkbox" value="">
                        <label for="age">I am 18 years or older</label>
                    </div>
                </div>

                <div class="form-button">
                    <input type="submit" value="Daftar">

                    <div class="has-account">
                        <p>Belum punya akun? <a href="login">Masuk</a></p>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script>
        <?php if (isset($_SESSION['fail_message'])): ?>
            var notification = document.querySelector('.notification');
            notification.style.display = 'flex';

            setTimeout(function() {
                <?php unset($_SESSION['fail_message']); ?>
            }, 2000);
        <?php endif; ?>
    </script>
</body>
</html>