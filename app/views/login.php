<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopMart | Login</title>
    <link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/public/img/logo/logo-icon.png" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/css/global.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/css/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <script src="<?= BASEURL; ?>/public/js/global.js"></script>
</head>
<body>
    <div class="bg-left"><img src="<?= BASEURL; ?>/public/img/Left.svg" width="60%" alt="bg-img"></div>
    <div class="bg-right"><img src="<?= BASEURL; ?>/public/img/Right.svg" width="60%" alt="bg-img"></div>
    <main>
        <div class="login">
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
            <h1>Login ShopMart</h1>
            <p>Masukkan email dan password yang telah didaftarkan sebelumnya.</p>
            <form action="<?= BASEURL; ?>/login/authentication" method="POST" enctype="multipart/form-data">
                <div class="form-group email">
                    <label for="email">Email</label>
                    <div class="form-icon">
                        <div class="icon">
                            <span class="material-symbols-rounded">mail</span>
                        </div>
                        <input type="email" id="email" name="email" placeholder="youremailaddress@mail.com" required />
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

                <div class="form-button">
                    <input type="submit" value="Masuk">

                    <div class="has-account">
                        <p>Belum punya akun? <a href="registration">Daftar</a></p>
                    </div>
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
</body>
</html>