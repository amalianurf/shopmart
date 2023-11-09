<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopMart</title>
    <link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/public/img/logo/logo-icon.png" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/css/global.css">
    
    <?php if (isset($data["cssLinks"]) && is_array($data["cssLinks"])): ?>
        <?php foreach ($data["cssLinks"] as $cssLink): ?>
            <link rel="stylesheet" href="<?= $cssLink ?>">
        <?php endforeach; ?>
    <?php endif; ?>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" />
    <script src="<?= BASEURL; ?>/public/js/global.js"></script>

    <?php if (isset($data["jsLinks"]) && is_array($data["jsLinks"])): ?>
        <?php foreach ($data["jsLinks"] as $jsLink): ?>
            <script src="<?= $jsLink ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <header>
        <nav>
            <a href="<?= BASEURL; ?>"><img src="<?= BASEURL; ?>/public/img/logo/logo-color.svg" width="200px" alt="logo"></a>
            <?php if(isset($_SESSION["admin"]) && $_SESSION["admin"]): ?>
                <ul class="admin-features">
                    <li>
                        <a href="/shopmart/admin/users">Users</a>
                    </li>
                    <li>
                        <a href="/shopmart/admin/products">Products</a>
                    </li>
                    <li>
                        <a href="/shopmart/admin/categories">Categories</a>
                    </li>
                    <li>
                        <a href="/shopmart/admin/cart">Cart User</a>
                    </li>
                </ul>
            <?php else: ?>
                <ul>
                    <li class="dropdown">
                        <button>Category</button>
                        <div class="dropdown-content" id="myDropdown">
                            <?php foreach ($data["categories"] as $category): ?>
                                <a href="/shopmart/product/<?= strtolower($category["nama_kategori"]); ?>"><?= $category["nama_kategori"]; ?></a>
                            <?php endforeach ?>
                        </div>
                    </li>
                    <li>
                        <a href="/shopmart/product/discount">Discount</a>
                    </li>
                    <li>
                        <a href="/shopmart/product/popular">Popular</a>
                    </li>
                </ul>
            <?php endif ?>
            <div class="left-nav">
                <form action="<?= BASEURL; ?>/product" method="POST" class="search-wrapper">
                    <input type="text" name="search" id="search" placeholder="Search product">
                    <button><span class="material-symbols-outlined">search</span></button>
                </form>
                <?php if(!isset($_SESSION["admin"])): ?>
                    <a href="/shopmart/cart" class="cart-wrapper">
                        <span class="material-symbols-outlined">shopping_cart</span>
                        <span>Cart</span>
                    </a>
                <?php endif ?>

                <?php if(isset($_SESSION["status"]) && $_SESSION["status"] == "logged in"): ?>
                    <?php $name = $_SESSION["nama"]; ?>
                    <div class="dropdown">
                        <button class="account-wrapper"><span class="material-symbols-outlined">account_circle</span><?=$name?></button>
                        <div class="dropdown-content profile" id="myDropdown">
                            <?php if(!isset($_SESSION["admin"])): ?>
                                <a href="/shopmart/profile">Profile</a>
                            <?php endif ?>
                            <a href="/shopmart/logout">Logout</a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="button-wrapper">
                        <a href="/shopmart/registration" id="registerBtn">Register</a>
                        <a href="/shopmart/login" id="loginBtn">Login</a>
                    </div>
                <?php endif ?>
            </div>
        </nav>