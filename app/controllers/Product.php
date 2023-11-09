    <?php 

class Product extends Controller {
    public function index($param = null) {
        $data["cssLinks"] = [
            BASEURL . "/public/css/home.css"
        ];

        switch ( $param ) {
            case "discount":
                $data["title"] = "Discount";
                $data["products"] = $this->model("ProductModel")->getDiscountProduct();
                break;

            case "popular":
                $data["title"] = "Popular";
                $data["products"] = $this->model("ProductModel")->getPopularProduct();
                break;

            case "latest":
                $data["title"] = "Latest";
                $data["products"] = $this->model("ProductModel")->getLatestProduct();
                break;

            default:
                if (isset($_POST["search"])) {
                    $data["title"] = "Search";
                    $data["products"] = $this->model("ProductModel")->searchProductByName($_POST["search"]);
                } else {
                    $data["title"] = ucwords($param);
                    $data["products"] = $this->model("ProductModel")->getProductByCategory($param);
                }
        }
        $data["categories"] = $this->model("CategoryModel")->getAll();

        $this->view("components/header", $data);
        $this->view("user/product", $data);
        $this->view("components/footer");
    }

    public function detail($id) {
        $data["cssLinks"] = [
            BASEURL . "/public/css/detail-product.css"
        ];
        $data["jsLinks"] = [
            BASEURL . "/public/js/detail-product.js"
        ];
        $data["product"] = $this->model("ProductModel")->getProductById($id);
        $data["reviews"] = $this->model("ReviewModel")->getReviewProduct($id);
        $data["categories"] = $this->model("CategoryModel")->getAll();

        $this->view("components/header", $data);
        $this->view("user/detail-product", $data);
        $this->view("components/footer");
    }

    public function admin() {
        $data["cssLinks"] = [
            BASEURL . "/public/css/admin.css",
            "https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css"
        ];
        $data["jsLinks"] = [
            "https://code.jquery.com/jquery-3.6.0.min.js",
            "https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js",
            "https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"
        ];
        $data["products"] = $this->model("ProductModel")->getAll();

        $this->view("components/header", $data);
        $this->view("admin/products", $data);
        $this->view("components/footer");
    }

    public function add() {
        $data["cssLinks"] = [
            BASEURL . "/public/css/admin.css"
        ];

        $data["title"] = "Tambah Produk";
        $data["action"] = "admin/products/add";
        $data["categories"] = $this->model("CategoryModel")->getAll();

        $data["product"][0]["kode_kategori"] = "";
        $data["product"][0]["nama_produk"] = "";
        $data["product"][0]["deskripsi"] = "";
        $data["product"][0]["harga"] = 10000;
        $data["product"][0]["diskon"] = 0;
        $data["product"][0]["stok"] = 1;

        $this->view("components/header", $data);
        $this->view("admin/product-form", $data);
        $this->view("components/footer");
    }

    public function insert() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $category = isset($_POST["category"]) ? $_POST["category"] : "";
            $name = isset($_POST["name"]) ? $_POST["name"] : "";
            $price = isset($_POST["price"]) ? $_POST["price"] : 0;
            $discount = isset($_POST["discount"]) ? $_POST["discount"] : 0;
            $stock = isset($_POST["stock"]) ? $_POST["stock"] : 0;
            $description = isset($_POST["description"]) ? $_POST["description"] : "";
            $thumbnail = isset($_FILES["thumbnail"]["name"]) ? $_FILES["thumbnail"]["name"] : "";

            $thumbnail = uniqid() . "_" . $_FILES["thumbnail"]["name"];
            $uploadDir = "./public/img/product/";
            $uploadedFile = $uploadDir . basename($thumbnail);
            if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $uploadedFile)) {
                $uploadedFile = $uploadDir . basename($thumbnail);
            } else {
                $_SESSION["fail_message"] = "Gagal mengunggah gambar.";
                exit;
            }

            $data_product = [
                "kode_kategori"=> $category,
                "nama_produk"=> $name,
                "harga"=> $price,
                "diskon"=> $discount,
                "stok"=> $stock,
                "deskripsi"=> $description,
                "thumbnail"=> $thumbnail
            ];

            $this->model("ProductModel")->add($data_product);
        }
    }

    public function edit($id) {
        $data["cssLinks"] = [
            BASEURL . "/public/css/admin.css"
        ];

        $data["title"] = "Edit Produk";
        $data["action"] = "admin/products/update/" . $id;
        $data["categories"] = $this->model("CategoryModel")->getAll();

        $data["product"] = $this->model("ProductModel")->getProductById($id);

        $this->view("components/header", $data);
        $this->view("admin/product-form", $data);
        $this->view("components/footer");
    }

    public function update($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $category = isset($_POST["category"]) ? $_POST["category"] : "";
            $name = isset($_POST["name"]) ? $_POST["name"] : "";
            $price = isset($_POST["price"]) ? $_POST["price"] : 0;
            $discount = isset($_POST["discount"]) ? $_POST["discount"] : 0;
            $stock = isset($_POST["stock"]) ? $_POST["stock"] : 0;
            $description = isset($_POST["description"]) ? $_POST["description"] : "";
            $thumbnail = isset($_FILES["thumbnail"]["name"]) ? $_FILES["thumbnail"]["name"] : "";

            if ($_FILES["thumbnail"]["name"] != "") {
                $thumbnail = uniqid() . "_" . $_FILES["thumbnail"]["name"];
                $uploadDir = "./public/img/product/";
                $uploadedFile = $uploadDir . basename($thumbnail);
                if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $uploadedFile)) {
                    $uploadedFile = $uploadDir . basename($thumbnail);
                } else {
                    $_SESSION["fail_message"] = "Gagal mengunggah gambar.";
                    exit;
                }
            }

            $data_product = [
                "id"=> $id,
                "kode_kategori"=> $category,
                "nama_produk"=> $name,
                "harga"=> $price,
                "diskon"=> $discount,
                "stok"=> $stock,
                "deskripsi"=> $description,
                "thumbnail"=> $thumbnail
            ];

            $this->model("ProductModel")->edit($data_product);
        }
    }

    public function delete($id) {
        $this->model("ProductModel")->delete($id);
    }
}